<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Channel;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * Seeds a handful of channels and a batch of realistic-looking (but fake) videos so
 * chillapi2 has actual content to browse - PlaylistSeeder alone only creates empty
 * playlist shells if no videos exist yet to attach.
 */
class VideoSeeder extends Seeder
{
    private const CHANNEL_COUNT = 8;
    private const VIDEO_COUNT = 150;

    private const TITLE_TEMPLATES = [
        '%s Beats to Study To', 'Late Night %s', '%s Mix Vol. %d', 'Deep %s Session',
        '%s for Sleep', 'Coding %s Radio', '%s Instrumentals', 'Rainy Day %s',
    ];

    private const MOODS = [
        'Lo-Fi', 'Ambient', 'Chill', 'Jazz', 'Piano', 'Synthwave', 'Downtempo', 'Acoustic',
    ];

    public function run(): void
    {
        $categories = Category::all();
        if ($categories->isEmpty()) {
            $this->command?->warn('No categories found - run PlaylistSeeder first or seed categories.');
            return;
        }

        $channels = collect(range(1, self::CHANNEL_COUNT))->map(fn () => $this->makeChannel());

        for ($i = 1; $i <= self::VIDEO_COUNT; $i++) {
            $mood = Arr::random(self::MOODS);
            $title = sprintf(Arr::random(self::TITLE_TEMPLATES), $mood, random_int(1, 12));
            $durationSeconds = random_int(90, 5400);

            $video = new Video();
            $video->videoId = Str::random(11);
            $video->title = $title;
            $video->description = "A relaxing {$mood} mix, generated for chillapi2 testing.";
            $video->thumbnail = 'https://picsum.photos/seed/' . Str::random(8) . '/480/360';
            $video->publishedAt = now()->subDays(random_int(1, 900));
            $video->channel_id = $channels->random()->id;
            $video->category_id = $categories->random()->id;
            $video->views = random_int(0, 250000);
            $video->duration = gmdate('H:i:s', $durationSeconds);
            $video->type_duration = $durationSeconds < 1200 ? 1 : ($durationSeconds < 3000 ? 2 : 3);
            $video->status = 'active';
            $video->save();
        }
    }

    private function makeChannel(): Channel
    {
        $channel = new Channel();
        $channel->channelId = 'UC' . Str::random(22);
        $channel->title = Arr::random(self::MOODS) . ' Channel';
        $channel->description = 'A fake channel generated for chillapi2 testing.';
        $channel->customurl = null;
        $channel->publishedAt = now()->subDays(random_int(200, 2000));
        $channel->thumbnail = 'https://picsum.photos/seed/' . Str::random(8) . '/200/200';
        $channel->save();

        return $channel;
    }
}
