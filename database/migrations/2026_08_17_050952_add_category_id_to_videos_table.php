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
        // Guarded: production already has this column via an out-of-band ALTER TABLE
        // (Video::category(), VideoResource and every admin filter assume it exists),
        // it was just never captured in a migration. This backfills it for fresh/local
        // databases without breaking `migrate` on an environment that already has it.
        if (!Schema::hasColumn('videos', 'category_id')) {
            Schema::table('videos', function (Blueprint $table) {
                $table->unsignedBigInteger('category_id')->nullable()->after('channel_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('videos', 'category_id')) {
            Schema::table('videos', function (Blueprint $table) {
                $table->dropColumn('category_id');
            });
        }
    }
};
