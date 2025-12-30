<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create()
    {
        // Ketersediaan ditentukan berdasarkan tanggal, bukan kolom is_available
        $services = Service::all();
        return view('booking.create', compact('services'));
    }

    // AJAX price check
    public function checkPrice(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'guest_count' => 'required|integer|min:1'
        ]);

        /** @var Service $service */
        $service = Service::findOrFail($request->service_id);
        
        // Check capacity
        if ($request->guest_count > $service->capacity) {
            return response()->json([
                'error' => "Jumlah tamu tidak boleh melebihi kapasitas kamar ({$service->capacity} orang)"
            ], 422);
        }

        // Cek ketersediaan untuk mencegah double booking
        $overlap = $service->bookings()
            ->where('status', '!=', 'cancelled')
            ->where(function ($q) use ($request) {
                $q->where('check_in', '<', $request->check_out)
                  ->where('check_out', '>', $request->check_in);
            })->exists();

        if ($overlap) {
            return response()->json(['error' => 'Kamar tidak tersedia pada rentang tanggal tersebut.'], 422);
        }
        
        $nights = Carbon::parse($request->check_in)->diffInDays(Carbon::parse($request->check_out));
        $nights = max(1, $nights);
        // Price is per room, not per person
        $total = $service->price_per_night * $nights;

        return response()->json([
            'nights' => $nights,
            'price_per_night' => (float)$service->price_per_night,
            'total' => number_format($total, 2, '.', ''),
            'capacity' => $service->capacity
        ]);
    }

    public function store(Request $request)
    {
        // If user not authenticated, save booking intent to session and redirect to login
        if (!$request->user()) {
            $request->session()->put('booking_intent', $request->only(['service_id', 'check_in', 'check_out', 'guest_count']));
            return redirect()->route('login')->with('status', 'Silakan masuk untuk melanjutkan pemesanan. Data booking telah disimpan.');
        }

        $data = $request->validate([
            'service_id' => 'required|exists:services,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'guest_count' => 'nullable|integer|min:1',
        ]);

        $service = Service::findOrFail($data['service_id']);
        
        // Default guest_count to service capacity if not provided or set to 1
        $guestCount = isset($data['guest_count']) && (int)$data['guest_count'] > 0 ? (int)$data['guest_count'] : $service->capacity;

        // Validate capacity
        if ($guestCount > $service->capacity) {
            return back()->withErrors(['guest_count' => "Jumlah tamu tidak boleh melebihi kapasitas kamar ({$service->capacity} orang)"]);
        }

        // Cegah double booking: pastikan tidak ada booking yang overlap pada kamar ini
        $overlap = Booking::where('service_id', $service->id)
            ->where('status', '!=', 'cancelled')
            ->where(function ($q) use ($data) {
                $q->where('check_in', '<', $data['check_out'])
                  ->where('check_out', '>', $data['check_in']);
            })->exists();

        if ($overlap) {
            return back()->withErrors(['service' => 'Kamar tidak tersedia pada rentang tanggal tersebut. Silakan pilih tanggal lain atau kamar lain.'])->withInput();
        }
        
        $nights = Carbon::parse($data['check_in'])->diffInDays(Carbon::parse($data['check_out']));
        $nights = max(1, $nights);
        // Price is per room, not per person
        $total = $service->price_per_night * $nights;

        $user = $request->user();

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'service_id' => $service->id,
            'booking_code' => 'AR-' . now()->format('Ymd') . '-' . strtoupper(Str::random(4)),
            'check_in' => $data['check_in'],
            'check_out' => $data['check_out'],
            'guest_count' => $guestCount,
            'total_price' => $total,
            'status' => 'pending',
            'guest_info' => [
                'name' => $user->name ?? null,
                'email' => $user->email ?? null,
                'phone' => $user->phone ?? null,
            ]
        ]);

        // create a pending transaction placeholder
        Transaction::create([
            'booking_id' => $booking->id,
            'amount' => $booking->total_price,
            'payment_method' => null,
            'transaction_code' => null,
            'status' => 'pending',
            'meta' => null
        ]);

        return redirect()->route('booking.payment', $booking);
    }

    public function success(Booking $booking)
    {
        return view('booking.success', compact('booking'));
    }
}
