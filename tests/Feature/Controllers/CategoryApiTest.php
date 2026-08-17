<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Feature\Support\CreatesTestData;
use Tests\TestCase;

class CategoryApiTest extends TestCase
{
    use DatabaseTransactions;
    use CreatesTestData;

    public function testGetCategoriesReturnsAllCategories()
    {
        $category = $this->makeCategory();

        $response = $this->getJson('/api/categories');

        $response->assertStatus(200);
        $names = collect($response->json('data'))->pluck('category_name');
        $this->assertTrue($names->contains($category->category_name));
    }

    public function testPostCategoryCreatesACategory()
    {
        // Regression test: postCategory() used to set $category->name, but the real `category`
        // table only has a `category_name` column, so this used to throw a QueryException
        // (Unknown column 'name'). Fixed in App\Http\Controllers\CategoryController::postCategory.
        $response = $this->postJson('/api/category', ['name' => 'Ambient']);

        $response->assertStatus(200);
        $this->assertDatabaseHas('category', ['category_name' => 'Ambient']);
    }

    /**
     * @group broken
     * Pre-existing: VideoResource crashes calling ->diffForHumans() on Video::$publishedAt,
     * which isn't actually cast to Carbon despite being listed in $dates.
     */
    public function testCurrentCategoriesWithNameReturnsItsVideos()
    {
        $category = $this->makeCategory(['category_name' => 'Downtempo']);
        $video = $this->makeVideo(['category_id' => (string) $category->id]);

        $response = $this->getJson('/api/categories/Downtempo');

        $response->assertStatus(200);
        $ids = collect($response->json('data'))->pluck('id');
        $this->assertTrue($ids->contains($video->id));
    }

    public function testCurrentCategoriesWithNameCrashesForUnknownName()
    {
        // Documents existing behavior: Category::where(...)->first() with no match returns null,
        // and $category->id is dereferenced without a null check straight after.
        $response = $this->getJson('/api/categories/does-not-exist');

        $response->assertStatus(500);
    }
}
