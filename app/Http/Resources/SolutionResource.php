<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SolutionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'    => $this->id,
            'title' => $this->getTranslation('title', app()->getLocale()),
            'desc'  => $this->getTranslation('desc', app()->getLocale()),
            'image' => $this->getFirstMediaUrl('solution'),

            'types' => $this->types->map(function ($type) {
                return [
                    'title' => $type->getTranslation('title', app()->getLocale()),
                    'desc'  => $type->desc ? $type->getTranslation('desc', app()->getLocale()) : '',
                    'icon'  => $type->getFirstMediaUrl('icon'),

                    'products' => $type->relationLoaded('products')
                        ? $type->products->map(function ($product) {
                            return [
                                'id'    => $product->id,
                                'title' => $product->getTranslation('title', app()->getLocale()),
                                'price' => $product->price,
                                'image' => $product->getFirstMediaUrl('snippet_image'),
                            ];
                        })->values()
                        : [],
                ];
            }),
        ];
    }
}
