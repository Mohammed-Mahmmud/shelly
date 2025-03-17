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
            "stock" => $data['stock'],
            "long_desc" => [
                "en" => $data['long_desc_en'],
                "ar" => $data['long_desc_ar']
            ],
            "price" => $data['price']
        ];
        $product = Product::create($formattedData);
        if (isset($data['images'])) {
            foreach ($data['images'] as $key => $image) {
                $this->StoreImage($image, $product, 'product-' . $key);
            }
        }

        if (isset($data['snippet_image'])) {
            $this->StoreImage($data['snippet_image'], $product, 'snippet_image');
        }
        if (isset($data['hoverImage'])) {
            $this->StoreImage($data['hoverImage'], $product, 'hoverImage');
        }
        $product->types()->attach($data['types']);
        $product->categories()->attach($data['categories']);
        $product->technologies()->attach($data['technologies']);
        $product->productUsings()->attach($data['productUsings']);

        ProductCreated::dispatch($product, $data['features'], $data['articles'], $type = 'create');

        toastr('data has been saved', 'success', 'success');
        return $product;
    }
}
