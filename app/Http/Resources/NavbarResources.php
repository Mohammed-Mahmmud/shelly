<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Page;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NavbarResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        $categories = Category::all()->map(function ($data) {
            return [
                'id' => $data->id,
                'desc' => $data->getTranslation('desc', app()->getLocale()),
                'title' => $data->getTranslation('title', app()->getLocale()),
                'icon' => $data->getFirstMediaUrl('icon'),
                'products' => route('api.products', ['filter_by_categories' => $data->id]),
            ];
        });
        $types =  Type::all()->map(function ($data) {
            return [
                'id' => $data->id,
                'title' => $data->getTranslation('title', app()->getLocale()),
                'products' => route('api.products', ['filter_by_types' => $data->id]),
            ];
        });
        $technologies = Technology::all()->map(function ($data) {
            return [
                'id' => $data->id,
                'title' => $data->getTranslation('title', app()->getLocale()),
                'products' => route('api.products', ['filter_by_technologies' => $data->id]),
            ];
        });
        return [
            'Products' =>
            [
                'Shop by solution' => $categories,
                'Shop by product type' => $types,
                'Shop by technology' => $technologies,
                'image' => Page::find(1)->getFirstMediaUrl('banner-0')
            ],
            'Solutions' =>
            [
                // 'Start your smart home' => 'd',
                // 'Start your smart home' => 'd',
                // 'Start your smart home' => 'd',
                // 'Start your smart home' => 'd',
            ],
            // 'id' => $this->id,
            // 'title' => $this->title,
            // 'slug' => $this->slug,
            // 'children' => PagesResources::collection($this->whenLoaded('childes')),
        ];
    }
}
