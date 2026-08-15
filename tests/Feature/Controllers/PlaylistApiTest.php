<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Feature\Support\CreatesTestData;
use Tests\TestCase;

class PlaylistApiTest extends TestCase
{
    use DatabaseTransactions;
    use CreatesTestData;

    public function testGetPublicPlaylistReturnsGroupedPlaylistLists()
    {
        $this->makePlaylist(['name' => 'Top Chill', 'mode' => 'public']);

        $response = $this->getJson('/api/playlists');

        $response->assertStatus(200)->assertJsonStructure(['playlists', 'all', 'top', 'chill']);
    }

    public function testCreatePublicPlaylistCreatesASlugifiedPlaylist()
    {
        $response = $this->postJson('/api/playlists', ['name' => 'My Cool Mix']);

        $response->assertStatus(200);
        $this->assertDatabaseHas('playlists', ['name' => 'My Cool Mix', 'mode' => 'Public']);
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
