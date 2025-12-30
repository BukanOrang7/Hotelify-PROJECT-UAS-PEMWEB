<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CancelUnpaidBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:cancel-unpaid {--hours=24 : Number of hours before unpaid booking is considered expired}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel bookings that are unpaid (payment_status = pending) older than X hours (default 24)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $hours = (int) $this->option('hours');
        // Use Booking scope which handles either 'payment_status' column or transactions fallback
        $query = Booking::unpaidOlderThan($hours);

        // Efficient bulk update: update matching rows in a single query
        $count = $query->update([
            'status' => 'cancelled',
            'updated_at' => Carbon::now(),
        ]);

        if ($count > 0) {
            $this->info("✓ {$count} booking(s) cancelled (payment pending older than {$hours} hour(s)).");
        } else {
            $this->info('No unpaid bookings to cancel at this time.');
        }

        return Command::SUCCESS;
    }
}
