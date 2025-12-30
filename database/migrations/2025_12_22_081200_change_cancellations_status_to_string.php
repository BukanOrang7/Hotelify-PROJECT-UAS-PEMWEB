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
        \DB::statement("ALTER TABLE `cancellations` MODIFY `status` VARCHAR(20) NOT NULL DEFAULT 'requested'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \DB::statement("ALTER TABLE `cancellations` MODIFY `status` ENUM('requested','approved','rejected') NOT NULL DEFAULT 'requested'");
    }
};
