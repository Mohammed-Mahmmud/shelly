<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->where('status', 'active'));
        return [
            'id' => $this->id,
            'name' => $this->getTranslation('title', app()->getLocale()),
            'desc' => $this->getTRanslation('desc', app()->getLocale()),
            'author' => $this->slug,
            'image' => $this->getFirstMediaUrl('banner-0'),
            // 'data' => route('api.projects', [$this->id]),
            // 'childes' => ProjectsResource::collection($this->whenLoaded('childes')),
        ];
    }
}
