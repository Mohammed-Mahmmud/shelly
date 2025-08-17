<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectsResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            'name' => $this->getTranslation('title', app()->getLocale()) ?? '',
            'desc' => $this->getTRanslation('desc', app()->getLocale()),
            'author' => $this->slug ?? '',
            'image' => $this->getFirstMediaUrl('image') ?? null,
            // 'data' => route('api.project', [$this->id]),
            // 'childes' => ProjectsResource::collection($this->whenLoaded('childes')),
        ];
    }
}
