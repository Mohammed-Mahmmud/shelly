<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'original_url' => $this->getUrl(), // Get the full URL of the image
        ];
    }

    /**
     * Transform an array of media items into a simple list of URLs.
     *
     * @param  $mediaCollection
     * @return array
     */
    public static function collectionToUrls($mediaCollection): array
    {
        return collect($mediaCollection)->map(function ($media) {
            return $media->getUrl();
        })->toArray();
    }
}
