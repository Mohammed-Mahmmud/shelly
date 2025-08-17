<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SolutionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
                'id'    => $this->id,
                'title' => $this->getTranslation('title', app()->getLocale()),
                'desc'  => $this->getTranslation('desc', app()->getLocale()),
                'image' => $this->getFirstMediaUrl('solution'),
        ];
    }
}
