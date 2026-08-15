<?php

namespace App\Services;

use App\Models\Category;
use App\Models\ListCategoryVideos;
use App\Models\Playlist;
use App\Models\Video;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class VideoCatalogService
{
    public function byCategory(
        int $categoryId,
        ?int $subcategoryId = null,
        int $perPage = 500,
        bool $latest = true,
        ?string $status = null
    ): LengthAwarePaginator {
        $query = $latest ? Video::latest() : Video::query();
        $query->where('category_id', $categoryId);

        if ($subcategoryId !== null) {
            $query->where('subcategory_id', $subcategoryId);
        }
        if ($status !== null) {
            $query->where('status', $status);
        }

        return $query->paginate($perPage);
    }

    public function oneVideoPerCategory(): Collection
    {
        return Category::get()->map(function (Category $category) {
            return Video::where('category_id', $category->id)->first();
        })->filter()->values();
    }

    /** @return array<string, int> */
    public function statsByCategory(): array
    {
        $stats = ['count0' => Video::count()];

        for ($categoryId = 1; $categoryId <= 14; $categoryId++) {
            $stats["count{$categoryId}"] = Video::where('category_id', $categoryId)->count();
        }

        return $stats;
    }

    public function homePageVideos(): Collection
    {
        $playlist = Playlist::where('name', 'Home Page')->first();

        return $playlist ? $playlist->videos : collect();
    }

    public function categoryVideosList()
    {
        return ListCategoryVideos::get();
    }

    public function videoWithRelated(string $videoId): array
    {
        $video = Video::where('videoId', $videoId)->firstOrFail();

        $related = Video::whereNotIn('videoId', [$video->videoId])
            ->when($video->category, fn ($query) => $query->where('category_id', $video->category->id))
            ->inRandomOrder()
            ->paginate(100);

        return ['video' => $video, 'related' => $related, 'categories' => Category::get()];
    }

    public function chillHopWithRelated(string $videoId): array
    {
        $video = Video::where('videoId', $videoId)->first();
        $related = Video::whereNotIn('videoId', [$video->videoId])
            ->where('category_id', '1')
            ->paginate(30);

        return ['video' => $video, 'related' => $related];
    }
}
