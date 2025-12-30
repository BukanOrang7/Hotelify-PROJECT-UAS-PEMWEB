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
        if (Schema::hasColumn('transactions', 'method') && ! Schema::hasColumn('transactions', 'payment_method')) {
            Schema::table('transactions', function (Blueprint $table) {
                $table->string('payment_method')->nullable();
                $table->string('transaction_code')->nullable();
            });
            \DB::table('transactions')->update(['payment_method' => \DB::raw('method')]);
        } else {
            Schema::table('transactions', function (Blueprint $table) {
                if (! Schema::hasColumn('transactions', 'payment_method')) $table->string('payment_method')->nullable();
                if (! Schema::hasColumn('transactions', 'transaction_code')) $table->string('transaction_code')->nullable();
            });
        }

        // drop old 'method' column if both exist
        if (Schema::hasColumn('transactions', 'method') && Schema::hasColumn('transactions', 'payment_method')) {
            Schema::table('transactions', function (Blueprint $table) {
                $table->dropColumn('method');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
};
