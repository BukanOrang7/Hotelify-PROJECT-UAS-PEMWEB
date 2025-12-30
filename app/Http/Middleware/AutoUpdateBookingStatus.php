<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Booking;
use Carbon\Carbon;

class AutoUpdateBookingStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Auto-update booking status based on checkout date
        $today = Carbon::now()->format('Y-m-d');

        // Update booked bookings to completed if checkout date has passed
        Booking::where('status', 'booked')
            ->where('check_out', '<', $today)
            ->update(['status' => 'completed']);

        // Update pending bookings to cancelled if checkout date has passed
        Booking::where('status', 'pending')
            ->where('check_out', '<', $today)
            ->update(['status' => 'cancelled']);

        return $next($request);
    }
}
