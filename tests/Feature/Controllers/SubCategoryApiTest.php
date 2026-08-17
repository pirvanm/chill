<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Feature\Support\CreatesTestData;
use Tests\TestCase;

class SubCategoryApiTest extends TestCase
{
    use DatabaseTransactions;
    use CreatesTestData;

    public function testPostSubCategoryCreatesASubCategory()
    {
        $category = $this->makeCategory();

        $response = $this->postJson('/api/subcategory', [
            'name' => 'Deep House',
            'category' => ['id' => $category->id],
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('sub_categories', ['name' => 'Deep House', 'category_id' => $category->id]);
    }

    public function testGetSubCategoryWithCategoryReturnsOnlyItsOwnSubcategories()
    {
        $category = $this->makeCategory();
        $other = $this->makeCategory();
        $mine = $this->makeSubCategory($category);
        $this->makeSubCategory($other);

        $response = $this->getJson('/api/subcategories-with-category/' . $category->id);

        $response->assertStatus(200);
        $names = collect($response->json('subcategories'))->pluck('name');
        $this->assertEquals([$mine->name], $names->all());
    }
}
