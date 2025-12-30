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
        // Add canonical columns and copy values from legacy columns
        if (Schema::hasColumn('services', 'title') && ! Schema::hasColumn('services', 'name')) {
            Schema::table('services', function (Blueprint $table) {
                $table->string('name')->nullable();
            });
            \DB::table('services')->whereNotNull('title')->update(['name' => \DB::raw('title')]);
        }

        if (Schema::hasColumn('services', 'price') && ! Schema::hasColumn('services', 'price_per_night')) {
            Schema::table('services', function (Blueprint $table) {
                $table->decimal('price_per_night', 12, 2)->default(0);
            });
            \DB::table('services')->update(['price_per_night' => \DB::raw('price')]);
        }

        if (Schema::hasColumn('services', 'availability_status') && ! Schema::hasColumn('services', 'is_available')) {
            Schema::table('services', function (Blueprint $table) {
                $table->boolean('is_available')->default(true);
            });
            // copy truthy values
            \DB::table('services')->update(['is_available' => \DB::raw('CASE WHEN availability_status IN ("1","true","yes") THEN 1 ELSE 0 END')]);
        }

        // cleanup old columns if both new columns exist
        Schema::table('services', function (Blueprint $table) {
            if (Schema::hasColumn('services', 'title') && Schema::hasColumn('services', 'name')) {
                $table->dropColumn('title');
            }
            if (Schema::hasColumn('services', 'price') && Schema::hasColumn('services', 'price_per_night')) {
                $table->dropColumn('price');
            }
            if (Schema::hasColumn('services', 'availability_status') && Schema::hasColumn('services', 'is_available')) {
                $table->dropColumn('availability_status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Try to restore legacy columns if we removed them
        Schema::table('services', function (Blueprint $table) {
            if (! Schema::hasColumn('services', 'title') && Schema::hasColumn('services', 'name')) {
                $table->string('title')->nullable();
            }
            if (! Schema::hasColumn('services', 'price') && Schema::hasColumn('services', 'price_per_night')) {
                $table->decimal('price', 12, 2)->default(0);
            }
            if (! Schema::hasColumn('services', 'availability_status') && Schema::hasColumn('services', 'is_available')) {
                $table->string('availability_status')->nullable();
            }
        });

        if (Schema::hasColumn('services', 'name') && Schema::hasColumn('services', 'title')) {
            \DB::table('services')->whereNotNull('name')->update(['title' => \DB::raw('name')]);
            Schema::table('services', function (Blueprint $table) {
                $table->dropColumn('name');
            });
        }

        if (Schema::hasColumn('services', 'price_per_night') && Schema::hasColumn('services', 'price')) {
            \DB::table('services')->update(['price' => \DB::raw('price_per_night')]);
            Schema::table('services', function (Blueprint $table) {
                $table->dropColumn('price_per_night');
            });
        }

        if (Schema::hasColumn('services', 'is_available') && Schema::hasColumn('services', 'availability_status')) {
            \DB::table('services')->update(['availability_status' => \DB::raw('is_available')]);
            Schema::table('services', function (Blueprint $table) {
                $table->dropColumn('is_available');
            });
        }
    }
};
