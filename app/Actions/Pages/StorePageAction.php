<?php

namespace App\Actions\Pages;

use App\Helper\ImageHelper;
use App\Models\Page;

class StorePageAction
{
    use ImageHelper;
    public function handle(array $data)
    {
        $formattedData = [
            "title" => [
                "en" => $data['title_en'],
                "ar" => $data['title_ar']
            ],
            "desc" => [
                "en" => $data['desc_en'],
                "ar" => $data['desc_ar']
            ],
            "parent_id" => $data['parent_id'] ?? null,
            "name" => [
                "en" => $data['name_en'],
                "ar" => $data['name_ar']
            ],
            "status" => $data['status'],
            "slug" => $data['slug']
        ];
        $page = Page::create($formattedData);
        if (isset($data['images'])) {
            foreach ($data['images'] as $key => $image) {
                $this->StoreImage($image, $page, 'banner-' . $key);
            }
        }
        if (isset($data['icon'])) {
            $this->StoreImage($data['icon'], $page, 'icon');
        }
        toastr('data has been saved', 'success', 'success');
        return $page;
    }
}
