<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Feature\Support\CreatesTestData;
use Tests\TestCase;

class PlaylistApiTest extends TestCase
{
    use DatabaseTransactions;
    use CreatesTestData;

    public function testGetPublicPlaylistReturnsPaginatedPlaylists()
    {
        $this->makePlaylist(['name' => 'Top Chill', 'mode' => 'public']);

        $response = $this->getJson('/api/playlists');

        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                '*' => ['id', 'name', 'slug', 'mode', 'country', 'category', 'video_count', 'total_views', 'total_duration_seconds', 'duration_bucket'],
            ],
            'links',
            'meta',
        ]);
    }

    public function testGetPublicPlaylistFiltersByCategory()
    {
        $category = $this->makeCategory();
        $otherCategory = $this->makeCategory();
        $matching = $this->makePlaylist(['category_id' => $category->id]);
        $this->makePlaylist(['category_id' => $otherCategory->id]);

        $response = $this->getJson('/api/playlists?category_id=' . $category->id);

        $response->assertStatus(200);
        $ids = collect($response->json('data'))->pluck('id');
        $this->assertTrue($ids->contains($matching->id));
        $this->assertCount(1, $ids);
    }

    public function testGetPublicPlaylistFiltersByCountry()
    {
        $matching = $this->makePlaylist(['country' => 'RO']);
        $this->makePlaylist(['country' => 'US']);

        $response = $this->getJson('/api/playlists?country=RO');

        $response->assertStatus(200);
        $ids = collect($response->json('data'))->pluck('id');
        $this->assertTrue($ids->contains($matching->id));
        $this->assertCount(1, $ids);
    }

    public function testGetPublicPlaylistFiltersByDurationBucket()
    {
        $quick = $this->makePlaylist();
        $quick->videos()->attach($this->makeVideo(['duration' => '00:10:00'])->id);

        $long = $this->makePlaylist();
        $long->videos()->attach($this->makeVideo(['duration' => '02:00:00'])->id);

        $response = $this->getJson('/api/playlists?duration=long');

        $response->assertStatus(200);
        $ids = collect($response->json('data'))->pluck('id');
        $this->assertTrue($ids->contains($long->id));
        $this->assertFalse($ids->contains($quick->id));
    }

    public function testGetPublicPlaylistSortsByPopularityByDefault()
    {
        $lessPopular = $this->makePlaylist();
        $lessPopular->videos()->attach($this->makeVideo(['views' => 10])->id);

        $morePopular = $this->makePlaylist();
        $morePopular->videos()->attach($this->makeVideo(['views' => 1000])->id);

        $response = $this->getJson('/api/playlists');

        $response->assertStatus(200);
        $ids = collect($response->json('data'))->pluck('id');
        $this->assertTrue($ids->search($morePopular->id) < $ids->search($lessPopular->id));
    }

    public function testCreatePublicPlaylistCreatesASlugifiedPlaylist()
    {
        $response = $this->postJson('/api/playlists', ['name' => 'My Cool Mix']);

        $response->assertStatus(200);
        $this->assertDatabaseHas('playlists', ['name' => 'My Cool Mix', 'mode' => 'public']);
    }

    public function testAddVideoToPlaylistAttachesTheVideo()
    {
        $playlist = $this->makePlaylist();
        $video = $this->makeVideo();

        $response = $this->postJson('/api/add-to-playlists', [
            'playlist' => $playlist->slug,
            'video' => $video->videoId,
        ]);

        $response->assertStatus(200);
        $this->assertTrue($playlist->videos()->where('video_id', $video->id)->exists());
    }

    public function testGetPlaylistBySlugReturnsItsVideos()
    {
        $playlist = $this->makePlaylist();
        $video = $this->makeVideo();
        $playlist->videos()->attach($video->id);

        $response = $this->getJson('/api/playlists/' . $playlist->slug);

        $response->assertStatus(200);
        $ids = collect($response->json('data'))->pluck('id');
        $this->assertTrue($ids->contains($video->id));
    }

    public function testPlaylistsPilotRouteIsUnreachableBehindTheSlugRoute()
    {
        // Route ordering bug in routes/api.php: '/playlists/{slug}' is registered before
        // '/playlists/pilot', so this request is actually captured by getPlaylistbySlug('pilot')
        // rather than the intended getPilot(). Since no playlist has slug "pilot", that resolves to
        // a null Playlist and crashes on `$playlist->videos` (documenting current behavior).
        $response = $this->getJson('/api/playlists/pilot');

        $response->assertStatus(500);
    }
}
