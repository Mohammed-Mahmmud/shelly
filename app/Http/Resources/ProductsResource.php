<?php

namespace App\Http\Resources;

use App\Http\Resources\ArticlesResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\FeaturesResource;
use App\Http\Resources\ImageResource;
use App\Http\Resources\ProductTypeResource;
use App\Models\Category;
use App\Models\ProductUsing;
use App\Models\Technology;
use App\Models\Type;
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
            'filter_by_types' => Type::get(['id', 'title']),
            'filter_by_technologies' => Technology::get(['id', 'title']),
            'filter_by_using' => ProductUsing::get(['id', 'title']),
            'filter_by_categories' => Category::get(['id', 'title']),
            'sort_by' => ['title-ascending', 'title-descending', 'best-selling', 'price-ascending', 'price-descending', 'created-ascending', 'created-descending', 'manual'],


        ];
    }
}
