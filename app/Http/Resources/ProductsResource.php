<?php

namespace App\Http\Resources;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ImageResource;
use App\Http\Resources\ProductTypeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $filteredImages = $this->media->filter(function ($media) {
            return str_starts_with($media->collection_name, 'product-');
        });

        return [
            'id' => $this->id,
            'title' => $this->getTranslation('title', app()->getLocale()),
            'desc' => $this->getTranslation('desc', app()->getLocale()),
            'price' => $this->price,
            'stock' => $this->stock,
            'product_categories' => CategoryResource::collection($this->categories),
            'product_types' => ProductTypeResource::collection($this->types),
            'product_technologies' => ProductTypeResource::collection($this->technologies),
            'product_using' => ProductTypeResource::collection($this->productUsings),
            'snippet_image' => $this->getFirstMediaUrl('snippet_image'),
            'hover_image' => $this->getFirstMediaUrl('hoverImage'),
            'images' => ImageResource::collectionToUrls($filteredImages),

        ];
    }
}
