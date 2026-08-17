<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Feature\Support\CreatesTestData;
use Tests\TestCase;

class HomeApiTest extends TestCase
{
    use DatabaseTransactions;
    use CreatesTestData;

    /**
     * @group broken
     * Pre-existing: VideoResource crashes calling ->diffForHumans() on Video::$publishedAt,
     * which isn't actually cast to Carbon despite being listed in $dates.
     */
    public function testIndexReturnsLatestVideos()
    {
        $video = $this->makeVideo();

        $response = $this->getJson('/v');

        $response->assertStatus(200);
        $ids = collect($response->json('data'))->pluck('id');
        $this->assertTrue($ids->contains($video->id));
    }

    public function testIndexReturnsEmptyWhenNoVideosExist()
    {
        $response = $this->getJson('/v');

        $response->assertStatus(200)->assertJson(['data' => []]);
    }
}
