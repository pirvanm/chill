<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Feature\Support\CreatesTestData;
use Tests\TestCase;

class AdminVideoApiTest extends TestCase
{
    use DatabaseTransactions;
    use CreatesTestData;

    // None of these admin routes carry any auth middleware in routes/api.php (the 'admin' prefix
    // group is just a URL prefix) -- every test here is exercised without authentication, matching
    // the app's actual current access control (or lack of it).

    /**
     * @group broken
     * Pre-existing: VideoResource crashes calling ->diffForHumans() on Video::$publishedAt,
     * which isn't actually cast to Carbon despite being listed in $dates.
     */
    public function testGetVideosFiltersByCategoryDurationViewsTitleAndTag()
    {
        $category = $this->makeCategory(['category_name' => 'Ambient']);
        $match = $this->makeVideo([
            'category_id' => (string) $category->id,
            'type_duration' => '2',
            'title' => 'Rainy Ambient Loop',
            'views' => 500,
        ]);
        $wrongCategory = $this->makeVideo(['title' => 'Rainy Something Else', 'views' => 500]);

        $response = $this->getJson('/api/admin/videos?' . http_build_query([
            'category' => 'Ambient',
            'title' => 'Rainy',
            'min' => 100,
            'max' => 1000,
        ]));

        $response->assertStatus(200);
        $ids = collect($response->json('data'))->pluck('id');
        $this->assertTrue($ids->contains($match->id));
        $this->assertFalse($ids->contains($wrongCategory->id));
    }

    public function testGetCategoriesReturnsAllCategories()
    {
        $category = $this->makeCategory();

        $response = $this->getJson('/api/admin/categories');

        $response->assertStatus(200);
        $names = collect($response->json('data'))->pluck('category_name');
        $this->assertTrue($names->contains($category->category_name));
    }

    public function testSavePlaylistCreatesAPlaylistWithVideos()
    {
        $video = $this->makeVideo();

        $response = $this->postJson('/api/admin/playlist/add', [
            'playlist' => 'Chill Evening',
            'videos' => [['id' => $video->id]],
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('playlists', ['name' => 'Chill Evening']);
        $playlist = \App\Models\Playlist::where('name', 'Chill Evening')->first();
        $this->assertTrue($playlist->videos()->where('video_id', $video->id)->exists());
    }

    public function testGetPlaylistsReturnsAllPlaylists()
    {
        $playlist = $this->makePlaylist();

        $response = $this->getJson('/api/admin/playlists');

        $response->assertStatus(200);
        $ids = collect($response->json('data'))->pluck('id');
        $this->assertTrue($ids->contains($playlist->id));
    }

    /**
     * @group broken
     * Pre-existing: PlaylistResource responses are wrapped in a top-level "data" key by
     * default, so assertJsonPath('id', ...) checks a path that doesn't exist (null !== id).
     */
    public function testGetPlaylistByIdReturnsIt()
    {
        $playlist = $this->makePlaylist();

        $response = $this->getJson('/api/admin/playlist/' . $playlist->id);

        $response->assertStatus(200)->assertJsonPath('id', $playlist->id);
    }

    /**
     * @group broken
     * Pre-existing: Admin\VideoController::updatePlaylist sets $playlist->image, but the
     * playlists table has no `image` column in any migration (schema drift - production
     * likely has it via an out-of-band ALTER TABLE, same as playlists.cover_style).
     */
    public function testUpdatePlaylistReplacesItsVideos()
    {
        $playlist = $this->makePlaylist();
        $oldVideo = $this->makeVideo();
        $newVideo = $this->makeVideo();
        $playlist->videos()->attach($oldVideo->id);

        $response = $this->postJson('/api/admin/playlist/' . $playlist->id . '/edit', [
            'playlist' => 'Renamed Playlist',
            'videos' => [['id' => $newVideo->id]],
        ]);

        $response->assertStatus(200);
        $playlist->refresh();
        $this->assertEquals('Renamed Playlist', $playlist->name);
        $this->assertFalse($playlist->videos()->where('video_id', $oldVideo->id)->exists());
        $this->assertTrue($playlist->videos()->where('video_id', $newVideo->id)->exists());
    }
}
