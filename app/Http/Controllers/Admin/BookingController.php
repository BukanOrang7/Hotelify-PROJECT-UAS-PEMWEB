<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Traits\AutoCompleteBookingStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    use AutoCompleteBookingStatus;

    public function index()
    {
        $bookings = Booking::with('service','user')
            ->orderBy('check_in', 'asc')
            ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Return JSON data for DataTable (AJAX)
     */
    public function data()
    {
        try {
            // Auto-complete statuses before fetching data
            self::autoCompleteStatuses();

            /** @var \Illuminate\Database\Eloquent\Collection<Booking> $bookings */
            $bookings = Booking::with('service','user','cancellation')->orderBy('check_in', 'asc')->get()->map(function($b) {
                /** @var \App\Models\Transaction|null $tx */
                $tx = $b->transactions()->latest()->first();
                
                // Determine payment and price display
                if ($b->status === 'cancelled') {
                    $payment = '-';
                    $price = '-';
                } else {
                    $payment = ($tx && $tx->status === 'completed') ? 'Paid' : 'Pending';
                    $price = 'Rp'.number_format($b->total_price,0,',','.');
                }
                
                // Get display status
                $displayStatus = $b->status;
                if ($b->status === 'checked_in' && \Carbon\Carbon::parse($b->check_out)->isPast()) {
                    $displayStatus = 'completed';
                }
                
                $name = $b->guest_info['name'] ?? $b->user->name ?? '-';
                return [
                    'id' => $b->id,
                    'booking_code' => $b->booking_code,
                    'name' => $name,
                    'check_in' => $b->check_in ? $b->check_in->format('Y-m-d') : '-',
                    'service' => $b->service->name ?? '-',
                    'status' => $displayStatus,
                    'payment' => $payment,
                    'total_price' => $price,
                    'has_cancellation_request' => $b->cancellation && $b->cancellation->status === 'requested' ? true : false,
                ];
            });

            return response()->json(['data' => $bookings]);
        } catch (\Exception $e) {
            \Log::error('Failed to fetch admin bookings data: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal mengambil data reservasi. Silakan periksa log.'], 500);
        }
    }

    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    public function changeStatus(Request $request, Booking $booking)
    {
        $request->validate(['status' => 'required|in:pending,booked,checked_in,completed,cancelled']);
        $old = $booking->toArray();
        $booking->update(['status' => $request->status]);

        \App\Models\ActivityLog::create([
            'user_id' => $request->user()->id ?? null,
            'action' => 'update',
            'model_type' => 'Booking',
            'model_id' => $booking->id,
            'old_values' => json_encode(['status' => $old['status'] ?? null]),
            'new_values' => json_encode(['status' => $request->status]),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Status booking diperbarui');
    }

    /**
     * Update booking by admin (used to accept/reject cancellation requests)
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate(['status' => 'required|in:cancelled,active']);

        $old = $booking->toArray();

        // Map incoming 'active' to the actual active status used in DB (booked)
        $newStatus = $request->status === 'active' ? 'booked' : $request->status;

        $booking->update(['status' => $newStatus]);

        // If there's a related cancellation request, update its status accordingly
        $cancellation = $booking->cancellation;
        if ($cancellation) {
            if ($request->status === 'cancelled') {
                $updateData = ['status' => 'approved'];
            } else {
                $updateData = ['status' => 'rejected'];
            }
            if (\Illuminate\Support\Facades\Schema::hasColumn('cancellations', 'processed_by')) {
                $updateData['processed_by'] = $request->user()->id ?? null;
            }
            $cancellation->update($updateData);
        }

        // Log activity
        \App\Models\ActivityLog::create([
            'user_id' => $request->user()->id ?? null,
            'action' => 'update',
            'model_type' => 'Booking',
            'model_id' => $booking->id,
            'old_values' => json_encode(['status' => $old['status'] ?? null]),
            'new_values' => json_encode(['status' => $newStatus]),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Flash messages per spec
        if ($request->status === 'cancelled') {
            $message = 'Pembatalan reservasi berhasil disetujui.';
        } else {
            $message = 'Pengajuan pembatalan ditolak.';
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => $message]);
        }

        return back()->with('success', $message);
    }
}

