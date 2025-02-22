<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Category;
use App\Models\ProductUsing;
use App\Models\Technology;
use App\Models\Type;

class ProductsFilterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'filter_by_types' => Type::get(['id', 'title']),
            'filter_by_technologies' => Technology::get(['id', 'title']),
            'filter_by_using' => ProductUsing::get(['id', 'title']),
            'filter_by_categories' => Category::get(['id', 'title']),
            'sort_by' => ['title-ascending', 'title-descending', 'best-selling', 'price-ascending', 'price-descending', 'created-ascending', 'created-descending', 'manual'],
        ];
    }
}
