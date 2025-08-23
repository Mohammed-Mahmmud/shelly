<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->getTranslation('title', app()->getLocale()),
            'desc' => $this->desc ? $this->getTranslation('desc', app()->getLocale()) : '',
            'icon' => $this->getFirstMediaUrl('icon'),
        ];
    }
}
