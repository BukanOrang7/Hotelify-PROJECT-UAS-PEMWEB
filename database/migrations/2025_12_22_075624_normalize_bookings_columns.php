<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add canonical booking fields and copy from legacy columns
        if (Schema::hasColumn('bookings', 'start_date') && ! Schema::hasColumn('bookings', 'check_in')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->date('check_in')->nullable();
            });
            \DB::table('bookings')->whereNotNull('start_date')->update(['check_in' => \DB::raw('start_date')]);
        }

        if (Schema::hasColumn('bookings', 'end_date') && ! Schema::hasColumn('bookings', 'check_out')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->date('check_out')->nullable();
            });
            \DB::table('bookings')->whereNotNull('end_date')->update(['check_out' => \DB::raw('end_date')]);
        }

        if (Schema::hasColumn('bookings', 'pax_or_rooms') && ! Schema::hasColumn('bookings', 'guest_count')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->integer('guest_count')->default(1);
            });
            \DB::table('bookings')->update(['guest_count' => \DB::raw('pax_or_rooms')]);
        }

        if (! Schema::hasColumn('bookings', 'guest_info')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->json('guest_info')->nullable();
            });
        }

        // Drop legacy columns if new ones exist
        Schema::table('bookings', function (Blueprint $table) {
            if (Schema::hasColumn('bookings', 'start_date') && Schema::hasColumn('bookings', 'check_in')) {
                $table->dropColumn('start_date');
            }
            if (Schema::hasColumn('bookings', 'end_date') && Schema::hasColumn('bookings', 'check_out')) {
                $table->dropColumn('end_date');
            }
            if (Schema::hasColumn('bookings', 'pax_or_rooms') && Schema::hasColumn('bookings', 'guest_count')) {
                $table->dropColumn('pax_or_rooms');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert columns: add legacy columns back if they do not exist
        Schema::table('bookings', function (Blueprint $table) {
            if (! Schema::hasColumn('bookings', 'start_date') && Schema::hasColumn('bookings', 'check_in')) {
                $table->date('start_date')->nullable();
            }
            if (! Schema::hasColumn('bookings', 'end_date') && Schema::hasColumn('bookings', 'check_out')) {
                $table->date('end_date')->nullable();
            }
            if (! Schema::hasColumn('bookings', 'pax_or_rooms') && Schema::hasColumn('bookings', 'guest_count')) {
                $table->integer('pax_or_rooms')->default(1);
            }
        });

        if (Schema::hasColumn('bookings', 'check_in') && Schema::hasColumn('bookings', 'start_date')) {
            \DB::table('bookings')->whereNotNull('check_in')->update(['start_date' => \DB::raw('check_in')]);
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropColumn('check_in');
            });
        }

        if (Schema::hasColumn('bookings', 'check_out') && Schema::hasColumn('bookings', 'end_date')) {
            \DB::table('bookings')->whereNotNull('check_out')->update(['end_date' => \DB::raw('check_out')]);
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropColumn('check_out');
            });
        }

        if (Schema::hasColumn('bookings', 'guest_count') && Schema::hasColumn('bookings', 'pax_or_rooms')) {
            \DB::table('bookings')->update(['pax_or_rooms' => \DB::raw('guest_count')]);
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropColumn('guest_count');
            });
        }

        if (Schema::hasColumn('bookings', 'guest_info')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropColumn('guest_info');
            });
        }
    }
};
