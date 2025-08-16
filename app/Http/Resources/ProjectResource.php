<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'title' => $this->getTRanslation('title', app()->getLocale()),
            'desc' => $this->getTRanslation('desc', app()->getLocale()),
            'author' => $this->slug,
            'image' => $this->getFirstMediaUrl('image'),
            // 'allProjects' => route('api.projects'),
        ];
    }
}
