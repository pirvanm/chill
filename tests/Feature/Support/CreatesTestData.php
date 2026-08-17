<?php

namespace Tests\Feature\Support;

use App\Models\Category;
use App\Models\Channel;
use App\Models\Playlist;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Str;

/**
 * Plain Eloquent fixture builders for the real (dump-derived) schema.
 * There are no model factories for these beyond User, so tests build
 * minimally-valid rows directly against the columns each table actually has.
 */
trait CreatesTestData
{
    /**
     * None of these models (other than User) declare $fillable, so Model::create() throws
     * MassAssignmentException -- build via direct property assignment instead, the same way the
     * app's own controllers construct these models.
     */
    private function build(string $class, array $attributes)
    {
        $model = new $class();
        foreach ($attributes as $key => $value) {
            $model->{$key} = $value;
        }
        $model->save();

        return $model;
    }

    protected function makeCategory(array $overrides = []): Category
    {
        return $this->build(Category::class, array_merge([
            'category_name' => 'Category ' . Str::random(8),
        ], $overrides));
    }

    protected function makeSubCategory(Category $category, array $overrides = []): SubCategory
    {
        return $this->build(SubCategory::class, array_merge([
            'name' => 'SubCategory ' . Str::random(8),
            'category_id' => $category->id,
        ], $overrides));
    }

    protected function makeChannel(array $overrides = []): Channel
    {
        return $this->build(Channel::class, array_merge([
            'channelId' => 'UC' . Str::random(22),
            'title' => 'Channel ' . Str::random(8),
            'description' => 'A test channel',
            'publishedAt' => now(),
            'thumbnail' => 'https://example.com/thumb.jpg',
        ], $overrides));
    }

    protected function makeVideo(array $overrides = []): Video
    {
        $channel = $overrides['channel_id'] ?? null;
        unset($overrides['channel_id']);

        return $this->build(Video::class, array_merge([
            'videoId' => Str::random(11),
            'title' => 'Video ' . Str::random(8),
            'description' => 'A test video',
            'thumbnail' => 'https://example.com/thumb.jpg',
            'publishedAt' => now(),
            'channel_id' => $channel ?? $this->makeChannel()->id,
            'category_id' => '1',
            'views' => 0,
        ], $overrides));
    }

    protected function makePlaylist(array $overrides = []): Playlist
    {
        return $this->build(Playlist::class, array_merge([
            'name' => 'Playlist ' . Str::random(8),
            'slug' => 'playlist-' . Str::random(8),
            'mode' => 'public',
        ], $overrides));
    }

    protected function makeUser(array $overrides = []): User
    {
        return $this->build(User::class, array_merge([
            'name' => 'Test User',
            'email' => Str::random(10) . '@example.com',
            'password' => bcrypt('password'),
        ], $overrides));
    }
}
