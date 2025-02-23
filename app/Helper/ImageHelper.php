<?php

namespace App\Helper;

use Intervention\Image\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;

trait ImageHelper
{
    public function StoreImage($data, $model, $nameImage)
    {
        if (!empty($data)) {
            $model->addMedia($data)->toMediaCollection($nameImage);
        }
    }
    public function StoreImages($data, $model, $nameImage)
    {
        if (!empty($data)) {
            if (is_array($data)) {
                foreach ($data as $image) {
                    $model->addMedia($image)->toMediaCollection($nameImage);
                }
            } else {
                $model->addMedia($data)->toMediaCollection($nameImage);
            }
        }
    }

    public function UpdateImage($data, $model, $nameImage)
    {
        if (!empty($data)) {
            if ($model->hasMedia($nameImage)) {
                $model->clearMediaCollection($nameImage);
            }
            $model->addMedia($data)->toMediaCollection($nameImage);
        }
    }
    public function UpdateImages($data, $model, $nameImage)
    {
        if (!empty($data)) {
            if ($model->hasMedia($nameImage)) {
                $model->clearMediaCollection($nameImage);
            }
            if (is_array($data)) {
                foreach ($data as $image) {
                    $model->addMedia($image)->toMediaCollection($nameImage);
                }
            } else {
                $model->addMedia($data)->toMediaCollection($nameImage);
            }
        }
    }

    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Delete image from media collection
     *
     * @param mixed $model
     * @param string $nameImage
     * @return void
     */
    /******  08575414-70e9-497a-a285-799aa3984b27  *******/
    public function DeleteImage($model, $nameImage)
    {
        $model->clearMediaCollection($nameImage);
    }
}
