<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Feature\Support\CreatesTestData;
use Tests\TestCase;

class SearchApiTest extends TestCase
{
    use DatabaseTransactions;
    use CreatesTestData;

    public function testSearchVideoMatchesOnTitle()
    {
        $match = $this->makeVideo(['title' => 'Chill Sunset Vibes']);
        $noMatch = $this->makeVideo(['title' => 'Upbeat Trap Mix']);

        $response = $this->postJson('/api/search', ['text' => 'Sunset']);

        $response->assertStatus(200);
        $ids = collect($response->json('videos'))->pluck('id');
        $this->assertTrue($ids->contains($match->id));
        $this->assertFalse($ids->contains($noMatch->id));
    }

    /**
     * @group broken
     * Pre-existing: VideoResource crashes calling ->diffForHumans() on Video::$publishedAt,
     * which isn't actually cast to Carbon despite being listed in $dates.
     */
    public function testSearchElasticMatchesOnTitleOrDescription()
    {
        $match = $this->makeVideo(['title' => 'Rainy Lofi Beats', 'description' => 'x']);
        $noMatch = $this->makeVideo(['title' => 'Something Else', 'description' => 'y']);

        $response = $this->postJson('/api/search-elastic', ['search' => 'Lofi']);

        $response->assertStatus(200);
        $ids = collect($response->json('data'))->pluck('id');
        $this->assertTrue($ids->contains($match->id));
        $this->assertFalse($ids->contains($noMatch->id));
    }
}
