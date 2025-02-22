<?php

namespace App\ViewModels;

use App\Models\Page;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class PageViewModel extends ViewModel
{
    public $data, $type, $translation, $routeCreate, $routeView, $views;
    public function __construct($data = null)
    {
        $this->data = is_null($data) ? new Page(old()) : $data;
        $this->type = is_null($data) ? 'create' : 'edit';
        $this->translation = TranslationKey::get();
        $this->routeCreate = route('admin.pages.create');
        $this->routeView = route('admin.pages.index');
        $this->views = 'pages';
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
    public function pages()
    {
        return Page::active()->parents()->get(['id', 'slug', 'name']);
    }
}
