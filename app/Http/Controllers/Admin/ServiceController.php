<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admin.services.index');
    }

    /**
     * Return JSON data for DataTable (AJAX)
     */
    public function data()
    {
        // Mengambil semua data dari terbaru
        $services = Service::latest()->get()->map(function($s) {
            return [
                'id' => $s->id,
                'name' => $s->name, // Contoh: Kamar Melati 101
                'type' => $s->type, // TAMBAHAN: Tipe Kamar (Standard, Deluxe, dll)
                'price' => 'Rp '.number_format($s->price_per_night, 0, ',', '.'),
                'capacity' => $s->capacity,
                'status' => $s->is_available ? 'Aktif' : 'Nonaktif',
            ];
        });

        return response()->json(['data' => $services]);
    }

    // Method bookings() tetap sama seperti sebelumnya...
    public function bookings(Service $service)
    {
        $bookings = $service->bookings()
            ->with('user')
            ->latest('created_at')
            ->get()
            ->map(function($booking) {
                $status = $booking->status;
                if (in_array($status, ['booked', 'checked_in']) && \Carbon\Carbon::parse($booking->check_out)->isPast()) {
                    $status = 'completed';
                }
                return [
                    'id' => $booking->id,
                    'booking_code' => $booking->booking_code,
                    'guest_name' => $booking->guest_info['name'] ?? $booking->user->name,
                    'check_in' => \Carbon\Carbon::parse($booking->check_in)->format('d M Y, H:i'),
                    'check_out' => \Carbon\Carbon::parse($booking->check_out)->format('d M Y'),
                    'guest_count' => $booking->guest_count,
                    'total_price' => 'Rp ' . number_format($booking->total_price, 0, ',', '.'),
                    'status' => $status,
                    'status_label' => ucfirst(str_replace('_', ' ', $status)),
                ];
            });

        return response()->json(['data' => $bookings]);
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        // 1. Tambahkan validasi 'type'
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255', // WAJIB ADA
            'capacity' => 'required|integer|min:1',
            'price_per_night' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'is_available' => 'nullable|boolean'
        ]);

        // Default is_available jika tidak dikirim form
        $data['is_available'] = $request->has('is_available') ? $request->input('is_available') : 1;

        $service = Service::create($data);

        // Log activity (opsional, sesuaikan dengan sistem log Anda)
        if (class_exists(\App\Models\ActivityLog::class)) {
            \App\Models\ActivityLog::create([
                'user_id' => $request->user()->id ?? null,
                'action' => 'create',
                'model_type' => 'Service',
                'model_id' => $service->id,
                'new_values' => json_encode($service->toArray()),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil dibuat!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        // 2. Tambahkan validasi 'type' di update juga
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255', // WAJIB ADA
            'price_per_night' => 'required|numeric',
            'capacity' => 'required|integer',
            'is_available' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        $old = $service->toArray();
        $service->update($data);

        // Log activity
        if (class_exists(\App\Models\ActivityLog::class)) {
            \App\Models\ActivityLog::create([
                'user_id' => $request->user()->id ?? null,
                'action' => 'update',
                'model_type' => 'Service',
                'model_id' => $service->id,
                'old_values' => json_encode($old),
                'new_values' => json_encode($service->toArray()),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy(Request $request, Service $service)
    {
        $old = $service->toArray();
        $service->delete();

         // Log activity
         if (class_exists(\App\Models\ActivityLog::class)) {
            \App\Models\ActivityLog::create([
                'user_id' => $request->user()->id ?? null,
                'action' => 'delete',
                'model_type' => 'Service',
                'model_id' => $service->id,
                'old_values' => json_encode($old),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }

        return back()->with('success', 'Layanan berhasil dihapus');
    }
}