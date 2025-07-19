<?php

namespace App\Http\Resources;

use App\Models\Page;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Resources\ImageResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ProjectsResource;
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
                // 'desc' > $data->getTranslation('desc', app()->getLocale()),
                'image' => $data->getFirstMediaUrl('banner-0'),
            ];
        });

        $projectsCate = Page::active()->where('slug', 'projects')->with(['childes'])->first();

        return [
            "name" => $this->getTranslation('name', app()->getLocale()),
            "title" => $this->getTranslation('title', app()->getLocale()),
            "desc" => $this->getTranslation('desc', app()->getLocale()),
            'headerImage' => ImageResource::collectionToUrls($filteredImages),
            'products' => ProductsResource::collection(Product::latest()->take(15)->get()),
            'solutions' => $solutionsChilds,
            'projects' => ProjectResource::collection(Project::active()->get()),
            'projects_categories' => ProjectsResource::collection($projectsCate->childes)
        ];
    }
}
