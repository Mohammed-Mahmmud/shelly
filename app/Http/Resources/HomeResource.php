<?php

namespace App\Http\Resources;

use App\Models\Page;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $filteredImages = $this->media->filter(function ($media) {
            return str_starts_with($media->collection_name, 'banner-');
        });
        $solutionsPage = Page::where('slug', 'solutions')->first();
        $solutionsChilds = $solutionsPage->childes->map(function ($data) {
            return [
                'id' => $data->id,
                'title' => $data->getTranslation('title', app()->getLocale()),
                'icon' => $data->getFirstMediaUrl('icon'),
                'image' => $data->getFirstMediaUrl('banner-0'),
                'solution' => route('api.solutions', [$data->id]),
            ];
        });

        $projectsCate = Page::active()->where('slug', 'projects')->with(['childes'])->first();

        return [
            "name" => $this->getTranslation('name', app()->getLocale()),
            "title" => $this->getTranslation('title', app()->getLocale()),
            "desc" => $this->getTranslation('desc', app()->getLocale()),
            'headerImage' => ImageResource::collectionToUrls($filteredImages),
            'products' => route('api.products'),
            'solutions' =>
            [
                'Start your smart home' => $solutionsChilds,
            ],
            'projects' => ProjectResource::collection(Project::active()->get()),
            'projects_categories' => ProjectsResource::collection($projectsCate->childes)
        ];
    }
}
