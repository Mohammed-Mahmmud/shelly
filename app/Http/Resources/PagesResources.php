<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PagesResources extends JsonResource
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
            'name' => $this->getTranslation('name', app()->getLocale()),
            'title' => $this->getTranslation('title', app()->getLocale()),
            'desc' => $this->getTranslation('desc', app()->getLocale()),
            'slug' => $this->slug,
            // Add more fields as needed
        ];
    }
}
