<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;

class FixBookingGuestCounts extends Command
{
    protected $signature = 'booking:fix-guest-counts';

    protected $description = 'Set guest_count to service.capacity when guest_count is missing or <= 1';

    public function handle()
    {
        $bookings = Booking::with('service')->where(function($q){
            $q->whereNull('guest_count')->orWhere('guest_count', '<=', 1);
        })->get();

        $count = 0;
        foreach ($bookings as $b) {
            if ($b->service) {
                $b->guest_count = $b->service->capacity;
                $b->save();
                $count++;
            }
        }

        $this->info("Updated {$count} booking(s) to use service capacity as guest_count.");
        return Command::SUCCESS;
    }
}
