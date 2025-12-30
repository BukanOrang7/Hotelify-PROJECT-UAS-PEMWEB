<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Register our command so it is discoverable by the scheduler if auto-discovery is disabled
        \App\Console\Commands\CancelUnpaidBookings::class,
        \App\Console\Commands\UpdateBookingStatus::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Run the unpaid cancellation hourly, safe from overlapping
        $schedule->command('booking:cancel-unpaid')->hourly()->withoutOverlapping();

        // Keep existing booking status maintenance hourly as well (if desired)
        if (class_exists('\App\Console\Commands\UpdateBookingStatus')) {
            $schedule->command('booking:update-status')->hourly()->withoutOverlapping();
        }
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
