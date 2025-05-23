<?php

namespace App\ViewModels;

use App\Models\Category;
use Spatie\ViewModels\ViewModel;
use App\Models\TranslationKey;

class CategoryViewModel extends ViewModel
{
    public $data, $type, $translation, $routeCreate, $routeView, $views;
    public function __construct($data = null)
    {
        $this->data = is_null($data) ? new Category(old()) : $data;
        $this->type = is_null($data) ? 'create' : 'edit';
        $this->translation = TranslationKey::get();
        $this->routeCreate = route('admin.product.categories.create');
        $this->routeView = route('admin.product.categories.index');
        $this->views = 'categories';
    }
    public function action(): string
    {
        return is_null($this->data->id)
            ? route('admin.product.' . $this->views . '.store')
            : route('admin.product.' . $this->views . '.update', $this->data->id);
    }
    public function method(): string
    {
        return is_null($this->data->id) ? 'POST' : 'PUT';
    }
}
