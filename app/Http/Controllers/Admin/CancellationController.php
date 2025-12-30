<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cancellation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CancellationController extends Controller
{
    /**
     * Menampilkan halaman kerangka (View)
     */
    public function index()
    {
        // Kita hitung total untuk statistik header (opsional, bisa dipindah ke AJAX juga jika mau full dynamic)
        $count = Cancellation::where('status', 'requested')->count();
        return view('admin.cancellations.index', compact('count'));
    }

    /**
     * Mengirim data JSON untuk DataTables
     */
    public function data()
    {
        // Eager load 'booking.user' untuk mencegah N+1 Query
        $data = Cancellation::with(['booking.user'])
            ->latest() // Urutkan dari yang terbaru
            ->get()
            ->map(function ($c) {
                // Siapkan data yang bersih untuk JS
                $userName = $c->booking->user->name ?? 'User Terhapus';
                $userEmail = $c->booking->user->email ?? '-';
                $bookingCode = $c->booking->booking_code ?? '-';
                
                return [
                    'id' => $c->id,
                    'booking_id' => $c->booking->id ?? null,
                    'booking_code' => $bookingCode,
                    'user_initial' => strtoupper(substr($userName, 0, 1)),
                    'user_name' => $userName,
                    'user_email' => $userEmail,
                    'reason' => $c->reason,
                    'reason_short' => Str::limit($c->reason, 50),
                    'status' => $c->status, // requested, approved, rejected
                    'created_at_formatted' => $c->created_at->format('d M Y, H:i'),
                    'created_at_timestamp' => $c->created_at->timestamp, // Untuk sorting
                    'updated_at_formatted' => $c->updated_at->format('d M Y, H:i'),
                ];
            });

        return response()->json(['data' => $data]);
    }

    public function approve(Cancellation $cancellation)
    {
        try {
            // Gunakan Schema check agar tidak error bila kolom belum ada
            $data = ['status' => 'approved'];
            if (\Illuminate\Support\Facades\Schema::hasColumn('cancellations', 'processed_by')) {
                $data['processed_by'] = auth()->id();
            }

            $cancellation->update($data);

            // Update status booking jika perlu
            if($cancellation->booking) {
                $cancellation->booking->update(['status' => 'cancelled']);
            }

            return response()->json(['success' => true, 'message' => 'Pengajuan disetujui.']);
        } catch (\Exception $e) {
            // Log error untuk debugging
            \Log::error('Error approving cancellation: '.$e->getMessage());
            return response()->json(['success' => false, 'message' => 'Gagal memproses pengajuan.'], 500);
        }
    }

    public function reject(Cancellation $cancellation)
    {
        try {
            $data = ['status' => 'rejected'];
            if (\Illuminate\Support\Facades\Schema::hasColumn('cancellations', 'processed_by')) {
                $data['processed_by'] = auth()->id();
            }

            $cancellation->update($data);

            return response()->json(['success' => true, 'message' => 'Pengajuan ditolak.']);
        } catch (\Exception $e) {
            \Log::error('Error rejecting cancellation: '.$e->getMessage());
            return response()->json(['success' => false, 'message' => 'Gagal memproses pengajuan.'], 500);
        }
    }
}