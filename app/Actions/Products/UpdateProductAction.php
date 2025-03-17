<?php

namespace App\Actions\Products;

use App\Events\Dashboard\ProductCreated;
use App\Helper\ImageHelper;
use App\Models\Product;

class UpdateProductAction
{
    use ImageHelper;
    public function handle(Product $product, array $data)
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

        $product->update($formattedData);

        if (isset($data['images'])) {
            foreach ($data['images'] as $key => $image) {
                $this->UpdateImage($image, $product, 'product-' . $key);
            }
        }

        if (isset($data['snippet_image'])) {
            $this->UpdateImage($data['snippet_image'], $product, 'snippet_image');
        }
        if (isset($data['hoverImage'])) {
            $this->UpdateImage($data['hoverImage'], $product, 'hoverImage');
        }
        if (isset($data['types'])) {
            $product->types()->sync($data['types']);
        }
        if (isset($data['categories'])) {
            $product->categories()->sync($data['categories']);
        }
        if (isset($data['technologies'])) {
            $product->technologies()->sync($data['technologies']);
        }
        if (isset($data['productUsings'])) {
            $product->productUsings()->sync($data['productUsings']);
        }

        ProductCreated::dispatch($product, $data['features'], $data['articles'], $type = 'edit');
        toastr('data has been updated', 'info', 'success');
        return $product;
    }
}
