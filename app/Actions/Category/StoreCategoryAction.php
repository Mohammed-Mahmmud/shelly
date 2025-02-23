<?php

namespace App\Actions\Category;

use App\Helper\ImageHelper;
use App\Models\Category;

class StoreCategoryAction
{
    use ImageHelper;
    public function handle(array $data)
    {
        // dd($data);
        $formattedData = [
            "title" => [
                "en" => $data['title_en'],
                "ar" => $data['title_ar']
            ],
            "desc" => [
                "en" => $data['desc_en'],
                "ar" => $data['desc_ar']
            ],
        ];
        $category = Category::create($formattedData);
        if (isset($data['image'])) {
            $this->StoreImage($data['image'], $category, 'category');
        }
        if (isset($data['icon'])) {
            $this->StoreImage($data['icon'], $category, 'icon');
        }
        toastr('data has been saved', 'success', 'success');
        return $category;
    }
}
