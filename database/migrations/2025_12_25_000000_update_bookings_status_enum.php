<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update any bookings with 'cancellation_requested' status back to 'booked'
        // since cancellation is now handled separately without changing booking status
        DB::table('bookings')
            ->where('status', 'cancellation_requested')
            ->update(['status' => 'booked']);

        // Change the enum to remove 'cancellation_requested' and add 'completed'
        Schema::table('bookings', function (Blueprint $table) {
            $table->enum('status', ['pending', 'booked', 'checked_in', 'completed', 'cancelled'])
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->enum('status', ['pending', 'booked', 'checked_in', 'checked_out', 'cancelled', 'cancellation_requested'])
                ->change();
        });
    }
};
