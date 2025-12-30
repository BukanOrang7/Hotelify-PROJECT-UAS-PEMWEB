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
        Schema::table('activity_logs', function (Blueprint $table) {
            if (! Schema::hasColumn('activity_logs', 'model_type')) {
                $table->string('model_type')->nullable()->after('action');
            }
            if (! Schema::hasColumn('activity_logs', 'model_id')) {
                $table->unsignedBigInteger('model_id')->nullable()->after('model_type');
            }
            if (! Schema::hasColumn('activity_logs', 'old_values')) {
                $table->json('old_values')->nullable()->after('model_id');
            }
            if (! Schema::hasColumn('activity_logs', 'new_values')) {
                $table->json('new_values')->nullable()->after('old_values');
            }
            if (! Schema::hasColumn('activity_logs', 'ip_address')) {
                $table->text('ip_address')->nullable()->after('new_values');
            }
            if (! Schema::hasColumn('activity_logs', 'user_agent')) {
                $table->text('user_agent')->nullable()->after('ip_address');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_logs', function (Blueprint $table) {
            if (Schema::hasColumn('activity_logs', 'user_agent')) $table->dropColumn('user_agent');
            if (Schema::hasColumn('activity_logs', 'ip_address')) $table->dropColumn('ip_address');
            if (Schema::hasColumn('activity_logs', 'new_values')) $table->dropColumn('new_values');
            if (Schema::hasColumn('activity_logs', 'old_values')) $table->dropColumn('old_values');
            if (Schema::hasColumn('activity_logs', 'model_id')) $table->dropColumn('model_id');
            if (Schema::hasColumn('activity_logs', 'model_type')) $table->dropColumn('model_type');
        });
    }
};
