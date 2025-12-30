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
        Schema::table('cancellations', function (Blueprint $table) {
            if (!Schema::hasColumn('cancellations', 'refund_amount')) {
                $table->decimal('refund_amount', 12, 2)->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cancellations', function (Blueprint $table) {
            if (Schema::hasColumn('cancellations', 'refund_amount')) {
                $table->dropColumn('refund_amount');
            }
        });
    }
};
