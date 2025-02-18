<?php

namespace App\Http\Resources;

use App\Http\Resources\ArticlesResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\FeaturesResource;
use App\Http\Resources\ImageResource;
use App\Http\Resources\ProductTypeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        $data['title'] = $this->getTranslation('title', app()->getLocale());
        $data['desc'] = $this->getTranslation('desc', app()->getLocale());
        $data['long_desc'] = $this->getTranslation('long_desc', app()->getLocale());
        $data['features'] = FeaturesResource::collection($this->features);
        $data['articles'] = ArticlesResource::collection($this->articles);
        $data['product_categories'] = CategoryResource::collection($this->categories);
        $data['product_types'] = ProductTypeResource::collection($this->types);
        $data['product_technologies'] = ProductTypeResource::collection($this->technologies);
        $data['product_using'] = ProductTypeResource::collection($this->productUsings);

        $data['snippet_image'] = $this->getFirstMediaUrl('snippet_image');
        $filteredImages = $this->media->filter(function ($media) {
            return str_starts_with($media->collection_name, 'product-');
        });
        $data['images'] = ImageResource::collectionToUrls($filteredImages);
        return $data;
    }
}
