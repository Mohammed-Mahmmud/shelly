<?php

namespace App\Helper;


trait ImageHelper
{
    public function StoreImage($data, $model, $nameImage)
    {
        if (!empty($data)) {
            $optimizedImage = $data;
            $model->addMedia($optimizedImage)->toMediaCollection($nameImage);
        }
    }
    //If No multi images

    public function UpdateImage($data, $model, $nameImage)
    {
        if (!empty($data)) {
            $optimizedImage = $data;
            $model->clearMediaCollection($nameImage);
            $model->addMedia($optimizedImage)->toMediaCollection($nameImage);
        }
    }

    public function DeleteImage($model, $nameImage)
    {
        $model->clearMediaCollection($nameImage);
    }
}
