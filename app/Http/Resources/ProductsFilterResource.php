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
        // $test = Type::langTitle()->get();
        // dd($test);
        return [
            'filter_by_types' => Type::all()->map(function ($data) {
                return [
                    'id' => $data->id,
                    'title' => $data->getTranslation('title', app()->getLocale()),
                ];
            }),
            'filter_by_technologies' => Technology::all()->map(function ($data) {
                return [
                    'id' => $data->id,
                    'title' => $data->getTranslation('title', app()->getLocale()),
                ];
            }),
            'filter_by_using' => ProductUsing::all()->map(function ($data) {
                return [
                    'id' => $data->id,
                    'title' => $data->getTranslation('title', app()->getLocale()),
                ];
            }),
            'filter_by_categories' => Category::all()->map(function ($data) {
                return [
                    'id' => $data->id,
                    'title' => $data->getTranslation('title', app()->getLocale()),
                ];
            }),
            'sort_by' => ['title-ascending', 'title-descending', 'best-selling', 'price-ascending', 'price-descending', 'created-ascending', 'created-descending', 'manual'],
        ];
    }
}
