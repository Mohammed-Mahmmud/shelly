<?php

namespace App\ViewModels;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductUsing;
use App\Models\Technology;
use App\Models\TranslationKey;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Spatie\ViewModels\ViewModel;

class ProductViewModel extends ViewModel
{
    public $data, $type, $translation, $routeCreate, $routeView, $views;
    public function __construct($data = null)
    {
        $this->data = is_null($data) ? new Product(old()) : $data;
        $this->type = is_null($data) ? 'create' : 'edit';
        $this->translation = TranslationKey::get();
        $this->routeCreate = route('admin.products.create');
        $this->routeView = route('admin.products.index');
        $this->views = 'products';
    }
    public function action(): string
    {
        return is_null($this->data->id)
            ? route('admin.' . $this->views . '.store')
            : route('admin.' . $this->views . '.update', $this->data->id);
    }
    public function method(): string
    {
        return is_null($this->data->id) ? 'POST' : 'PUT';
    }
    public function categories()
    {
        return Category::get();
    }
    public function types()
    {
        return Type::get();
    }
    public function technologies()
    {
        return Technology::get();
    }
    public function productUsings()
    {
        return ProductUsing::get();
    }
}
