<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Playlist;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * Seeds ~100 realistic public playlists spread across categories, countries and
 * durations, attaching real existing videos so the popularity/duration/category/
 * country filters on GET /api/playlists have real data to exercise.
 *
 * Run with: php artisan db:seed --class="Database\Seeders\PlaylistSeeder"
 */
class PlaylistSeeder extends Seeder
{
    private const PLAYLIST_COUNT = 100;

    private const COUNTRIES = [
        'US', 'GB', 'DE', 'FR', 'ES', 'IT', 'RO', 'JP', 'IN', 'BR',
        'CA', 'AU', 'NL', 'SE', 'PL', 'MX', 'CN', 'KR', 'PT', 'TR',
    ];

    private const FALLBACK_CATEGORIES = [
        'Chill', 'Lo-Fi', 'Ambient', 'Rock', 'Techno', 'Meditation', 'Downtempo', 'Classical',
    ];

    private const NAME_TEMPLATES = [
        '%s Vibes', '%s Sessions', 'Ultimate %s Mix', '%s Focus', '%s Nights',
        'Deep %s', '%s Radio', '%s Flow', 'Pure %s', '%s Collection',
    ];

    public function run(): void
    {
        $categories = Category::all();
        if ($categories->isEmpty()) {
            $categories = collect(self::FALLBACK_CATEGORIES)->map(fn (string $name) => $this->makeCategory($name));
        }

        $videoIds = Video::query()->inRandomOrder()->limit(2000)->pluck('id');
        if ($videoIds->isEmpty()) {
            $this->command?->warn('No videos found — seeding playlists without attached videos.');
        }

        for ($i = 1; $i <= self::PLAYLIST_COUNT; $i++) {
            $category = $categories->random();
            $name = sprintf(Arr::random(self::NAME_TEMPLATES), $category->category_name);

            $playlist = Playlist::create([
                'name' => $name,
                'slug' => Str::slug($name, '-') . '-' . Str::random(6),
                'mode' => 'public',
                'category_id' => $category->id,
                'country' => Arr::random(self::COUNTRIES),
            ]);

            if ($videoIds->isNotEmpty()) {
                $attachCount = min(random_int(4, 20), $videoIds->count());
                $playlist->videos()->attach($videoIds->random($attachCount)->all());
            }
        }
    }

    private function makeCategory(string $name): Category
    {
        $category = new Category();
        $category->category_name = $name;
        $category->save();

        return $category;
    }
}
