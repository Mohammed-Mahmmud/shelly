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
            'title' => $this->getTRanslation('title', app()->getLocale()),
            'desc' => $this->getTRanslation('desc', app()->getLocale()),
            'slug' => $this->slug,
            // 'allProjects' => route('api.projects'),
        ];
    }
}
