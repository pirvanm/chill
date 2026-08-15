<?php

namespace Tests\Feature\Controllers;

use Alaouy\Youtube\Facades\Youtube;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Feature\Support\CreatesTestData;
use Tests\TestCase;

class ChannelApiTest extends TestCase
{
    use DatabaseTransactions;
    use CreatesTestData;

    public function testGetChannelsReturnsPaginatedChannels()
    {
        $channel = $this->makeChannel();

        $response = $this->getJson('/api/channels');

        $response->assertStatus(200);
        $ids = collect($response->json('data'))->pluck('id');
        $this->assertTrue($ids->contains($channel->id));
    }

    public function testAddChannelVideosCreatesChannelAndVideosFromYoutube()
    {
        $channelId = 'UCbrandnewchannel0000000';

        Youtube::shouldReceive('getChannelById')->with($channelId)->andReturn((object) [
            'snippet' => (object) [
                'title' => 'New Channel',
                'description' => 'desc',
                'publishedAt' => '2024-01-01T00:00:00Z',
                'thumbnails' => (object) ['medium' => (object) ['url' => 'https://example.com/c.jpg']],
            ],
        ]);

        Youtube::shouldReceive('listChannelVideos')->andReturn([
            'info' => ['totalResults' => 1],
            'results' => [
                (object) ['id' => (object) ['videoId' => 'chanVid001']],
            ],
        ]);

        Youtube::shouldReceive('getVideoInfo')->with('chanVid001')->andReturn((object) [
            'snippet' => (object) [
                'title' => 'Channel Video',
                'description' => 'desc',
                'thumbnails' => (object) ['medium' => (object) ['url' => 'https://example.com/v.jpg']],
                'publishedAt' => '2024-01-01T00:00:00Z',
                'tags' => null,
            ],
            'contentDetails' => (object) ['duration' => 'PT3M'],
            'statistics' => (object) ['viewCount' => '10'],
        ]);

        $response = $this->postJson('/api/admin/add-channel-videos', [
            'channel' => $channelId,
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('channels', ['channelId' => $channelId, 'title' => 'New Channel']);
        $this->assertDatabaseHas('videos', ['videoId' => 'chanVid001', 'title' => 'Channel Video']);
    }

    public function testAddChannelVideosSkipsVideosAlreadyInDatabase()
    {
        $channel = $this->makeChannel();
        $existing = $this->makeVideo(['channel_id' => $channel->id]);

        Youtube::shouldReceive('listChannelVideos')->andReturn([
            'info' => ['totalResults' => 1],
            'results' => [
                (object) ['id' => (object) ['videoId' => $existing->videoId]],
            ],
        ]);
        // getVideoInfo should never be called since the video already exists.
        Youtube::shouldReceive('getVideoInfo')->never();

        $response = $this->postJson('/api/admin/add-channel-videos', [
            'channel' => $channel->channelId,
        ]);

        $response->assertStatus(200);
    }
}
