<?php

namespace App\ViewModels;

use App\Models\Category;
use App\Models\Page;
use App\Models\Solution;
use App\Models\TranslationKey;
use App\Models\Type;
use Spatie\ViewModels\ViewModel;

class SolutionViewModel extends ViewModel
{
    public $data, $type, $translation, $routeCreate, $routeView, $views;
    public function __construct($data = null)
    {
        $this->data = is_null($data) ? new Solution(old()) : $data;
        $this->type = is_null($data) ? 'create' : 'edit';
        $this->translation = TranslationKey::get();
        $this->routeCreate = route('admin.solutions.create');
        $this->routeView = route('admin.solutions.index');
        $this->views = 'solutions';
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
    public function types()
    {
        return Type::get();
    }
    public function pages()
    {
        $parent = Page::where('slug', 'solutions')->first();
        return Page::active()->where('parent_id', $parent->id)->get();
    }
}
