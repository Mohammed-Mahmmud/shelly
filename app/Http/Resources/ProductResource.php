<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        $data['snippet_image'] = $this->getFirstMediaUrl('snippet_image');
        // $data['images'] = $this->getMediaUrl('images');
        // dd($data);
        return $data;
    }
}
