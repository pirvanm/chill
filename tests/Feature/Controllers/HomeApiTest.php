<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Feature\Support\CreatesTestData;
use Tests\TestCase;

class HomeApiTest extends TestCase
{
    use DatabaseTransactions;
    use CreatesTestData;

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
