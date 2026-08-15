<?php

namespace Tests\Feature\Controllers;

use App\Models\Tag;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Feature\Support\CreatesTestData;
use Tests\TestCase;

class TagApiTest extends TestCase
{
    use DatabaseTransactions;
    use CreatesTestData;

    public function testGetVideosReturnsVideosForATag()
    {
        $tag = new Tag();
        $tag->name = 'ambient';
        $tag->save();
        $video = $this->makeVideo();
        $tag->videos()->attach($video->id);

        $response = $this->postJson('/api/tag/get-videos', ['id' => $tag->id]);

        $response->assertStatus(200);
        $ids = collect($response->json('videos'))->pluck('id');
        $this->assertTrue($ids->contains($video->id));
    }

    public function testGetVideosCrashesForUnknownTagId()
    {
        // Documents existing behavior: Tag::find() returns null for an unknown id, and
        // $tag->videos is dereferenced right after with no null check.
        $response = $this->postJson('/api/tag/get-videos', ['id' => 999999]);

        $response->assertStatus(500);
    }

    public function testGetTagVideosIsDeadCodeThatAlwaysCrashes()
    {
        // Documents existing behavior: getTagVideos() references $videos/$tag without ever
        // defining them, so this route always 500s regardless of input.
        $response = $this->postJson('/api/tag', []);

        $response->assertStatus(500);
    }
}
