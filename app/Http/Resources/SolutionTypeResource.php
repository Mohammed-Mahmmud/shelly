<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SolutionTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id'          => $this->id,
            'solution_id' => $this->solutions->first()->id,
            'title'       => $this->getTranslation('title', app()->getLocale()),
            'desc'        => $this->desc ? $this->getTranslation('desc', app()->getLocale()) : '',
            'icon'        => $this->getFirstMediaUrl('icon'),
            'products'    => $this->relationLoaded('products')
                ? $this->products->map(function ($product) {
                    return [
                        'id'    => $product->id,
                        'title' => $product->getTranslation('title', app()->getLocale()),
                        'price' => $product->price,
                        'image' => $product->getFirstMediaUrl('snippet_image'),
                    ];
                })->values()
                : [],
        ];
    }
}
