<?php

namespace App\Actions\Category;

use App\Helper\ImageHelper;
use App\Models\Category;

class UpdateCategoryAction
{
    use ImageHelper;
    public function handle(Category $category, array $data)
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
        ];

        $category->update($formattedData);

        if (isset($data['image'])) {
            $this->UpdateImage($data['image'], $category, 'category');
        }
        if (isset($data['icon'])) {
            $this->UpdateImage($data['icon'], $category, 'icon');
        }
        toastr('data has been updated', 'info', 'success');
        return $category;
    }
}
