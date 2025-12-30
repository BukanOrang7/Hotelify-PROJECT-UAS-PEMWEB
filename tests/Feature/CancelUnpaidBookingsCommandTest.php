<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

class CancelUnpaidBookingsCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_cancels_bookings_with_pending_transactions_older_than_24_hours()
    {
        // Prepare booking older than 48 hours
        $booking = Booking::create([
            'user_id' => null,
            'service_id' => 1,
            'booking_code' => 'TEST-1',
            'check_in' => now()->toDateString(),
            'check_out' => now()->addDays(1)->toDateString(),
            'guest_count' => 1,
            'total_price' => 100,
            'status' => 'pending',
            'guest_info' => []
        ]);

        // Create a pending transaction created 48 hours ago
        Transaction::create([
            'booking_id' => $booking->id,
            'amount' => 100,
            'payment_method' => null,
            'transaction_code' => null,
            'status' => 'pending',
            'payment_date' => null,
            'meta' => null,
            'created_at' => Carbon::now()->subDays(2),
            'updated_at' => Carbon::now()->subDays(2),
        ]);

        $this->artisan('booking:cancel-unpaid')->assertExitCode(0);

        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'status' => 'cancelled'
        ]);
    }

    /** @test */
    public function it_does_not_cancel_recent_pending_bookings()
    {
        $booking = Booking::create([
            'user_id' => null,
            'service_id' => 1,
            'booking_code' => 'TEST-2',
            'check_in' => now()->toDateString(),
            'check_out' => now()->addDays(1)->toDateString(),
            'guest_count' => 1,
            'total_price' => 100,
            'status' => 'pending',
            'guest_info' => []
        ]);

        Transaction::create([
            'booking_id' => $booking->id,
            'amount' => 100,
            'payment_method' => null,
            'transaction_code' => null,
            'status' => 'pending',
            'payment_date' => null,
            'meta' => null,
            'created_at' => Carbon::now()->subHours(12),
            'updated_at' => Carbon::now()->subHours(12),
        ]);

        $this->artisan('booking:cancel-unpaid')->assertExitCode(0);

        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'status' => 'pending'
        ]);
    }
}
