<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class CheckinController extends Controller
{
    public function form(Request $request)
    {
        $booking_code = $request->query('booking_code');
        return view('checkin.form', compact('booking_code'));
    }

    public function process(Request $request)
    {
        $request->validate(['booking_code'=>'required']);

        /** @var Booking $booking */
        $booking = Booking::where('booking_code', $request->booking_code)
            ->where('status','booked')
            ->firstOrFail();

        // Validasi tanggal check-in
        $today = Carbon::now()->format('Y-m-d');
        $checkInDate = $booking->check_in->format('Y-m-d');
        $checkOutDate = $booking->check_out->format('Y-m-d');

        // Check-in hanya bisa dilakukan pada tanggal check-in atau sebelum check-out
        if ($today < $checkInDate) {
            return back()->withErrors(['booking_code' => "Check-in hanya bisa dilakukan mulai tanggal {$booking->check_in->format('d M Y')}."]);
        }

        if ($today > $checkOutDate) {
            return back()->withErrors(['booking_code' => "Booking sudah melewati tanggal check-out ({$booking->check_out->format('d M Y')})."]);
        }

        $booking->update(['status'=>'checked_in']);

        return view('checkin.success', compact('booking'));
    }
}
