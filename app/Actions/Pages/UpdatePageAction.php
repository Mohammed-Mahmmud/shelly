<?php

namespace App\Actions\Pages;

use App\Helper\ImageHelper;
use App\Models\Page;

class       UpdatePageAction
{
    use ImageHelper;
    public function handle(Page $page, array $data)
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
        $page->update($formattedData);

        if (isset($data['images'])) {
            foreach ($data['images'] as $key => $image) {
                $this->UpdateImage($image, $page, 'banner-' . $key);
            }
        }
        if (isset($data['icon'])) {
            $this->UpdateImage($data['icon'], $page, 'icon');
        }
        toastr('data has been updated', 'info', 'success');
        return $page;
    }
}
