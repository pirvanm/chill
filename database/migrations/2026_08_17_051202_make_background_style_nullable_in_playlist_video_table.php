<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * background_style was created as UNIQUE NOT NULL with no default, which makes any
     * plain ->videos()->attach() (used by PlaylistService::attachVideo, the seeder, and
     * Admin\VideoController) fail with "doesn't have a default value". MySQL's UNIQUE
     * index allows multiple NULLs, so making it nullable keeps the constraint's intent
     * for rows that do set a value while unblocking normal attach() calls.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE playlist_video MODIFY background_style VARCHAR(255) NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE playlist_video MODIFY background_style VARCHAR(255) NOT NULL DEFAULT ''");
    }
};
