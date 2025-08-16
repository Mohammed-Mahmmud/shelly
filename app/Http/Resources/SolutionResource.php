<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductTypeResource;

class SolutionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $types = $this->types()->with('products')->get();
        return [
            'id' => $this->id,
            'title' => $this->getTranslation('title', app()->getLocale()),
            'desc' => $this->getTranslation('desc', app()->getLocale()),
            'image' => $this->getFirstMediaUrl('solution'),
            'products' => $types->pluck('products')
                ->flatten()
                ->unique('id')
                ->map(fn($product) => [
                    'id'    => $product->id,
                    'title' => $product->getTranslation('title', app()->getLocale()),
                    'price' => $product->price,
                    'image' => $product->getFirstMediaUrl('snippet_image'),
                ])
                ->values(),
            ];
    }
}
