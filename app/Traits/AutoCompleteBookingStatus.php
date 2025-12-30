<?php

namespace App\Traits;

use App\Models\Booking;
use Carbon\Carbon;

trait AutoCompleteBookingStatus
{
    /**
     * Auto-complete pending/booked bookings that have passed checkout date
     * pending -> cancelled
     * booked -> completed
     */
    public static function autoCompleteStatuses()
    {
        $today = Carbon::now()->format('Y-m-d');

        // Auto-cancel pending bookings that passed checkout
        Booking::where('status', 'pending')
            ->where('check_out', '<', $today)
            ->update(['status' => 'cancelled']);

        // Auto-complete booked bookings that passed checkout
        Booking::where('status', 'booked')
            ->where('check_out', '<', $today)
            ->update(['status' => 'completed']);
    }
}
