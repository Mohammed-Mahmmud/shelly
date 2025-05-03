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
            'name' => $this->getTranslation('title', app()->getLocale()),
            'slug' => $this->slug,
            'data' => route('api.projects', [$this->id]),
            'childes' => ProjectsResource::collection($this->whenLoaded('childes')),
        ];
    }
}
