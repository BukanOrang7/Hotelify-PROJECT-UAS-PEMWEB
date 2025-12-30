<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateBookingStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto-update booking status ketika checkout date sudah terlewati';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now()->format('Y-m-d');
        $count = 0;

        // Update booked/checked_in bookings to completed if checkout date has passed
        $completedBookings = Booking::whereIn('status', ['booked', 'checked_in'])
            ->where('check_out', '<', $today)
            ->update(['status' => 'completed']);
        
        if ($completedBookings > 0) {
            $this->info("✓ {$completedBookings} booking(s) updated to 'completed'");
            $count += $completedBookings;
        }

        // Update pending bookings to cancelled if checkout date has passed
        $cancelledBookings = Booking::where('status', 'pending')
            ->where('check_out', '<', $today)
            ->update(['status' => 'cancelled']);
        
        if ($cancelledBookings > 0) {
            $this->info("✓ {$cancelledBookings} pending booking(s) auto-cancelled due to expired date");
            $count += $cancelledBookings;
        }

        if ($count === 0) {
            $this->info('No bookings need status update at this time.');
        } else {
            $this->line("\n✓ Total {$count} booking(s) updated successfully");
        }

        return Command::SUCCESS;
    }
}
