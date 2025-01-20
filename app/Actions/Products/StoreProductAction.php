<?php

namespace App\Actions\Products;

use App\Events\Dashboard\ProductCreated;
use App\Helper\ImageHelper;
use App\Models\Product;

class StoreProductAction
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
            "stock" => [
                "en" => $data['stock_en'],
                "ar" => $data['stock_ar']
            ],
            "long_desc" => [
                "en" => $data['long_desc_en'],
                "ar" => $data['long_desc_ar']
            ],
            "price" => $data['price']
        ];
        $products = Product::create($formattedData);
        if (isset($data['images'])) {
            foreach ($data['images'] as $image) {
                $this->StoreImage($image, $products, 'images');
            }
        }

        if (isset($data['snippet_image'])) {
            $this->StoreImage($data['snippet_image'], $products, 'snippet_image');
        }

        ProductCreated::dispatch($products, $data['features'], $data['articles'], $type = 'create');

        toastr('data has been saved', 'success', 'success');
        return $products;
    }
}
