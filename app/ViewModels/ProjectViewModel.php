<?php

namespace App\ViewModels;

use App\Models\Category;
use App\Models\Project;
use App\Models\TranslationKey;
use App\Models\Type;
use Spatie\ViewModels\ViewModel;

class ProjectViewModel extends ViewModel
{
    public $data, $type, $translation, $routeCreate, $routeView, $views;
    public function __construct($data = null)
    {
        $this->data = is_null($data) ? new Project(old()) : $data;
        $this->type = is_null($data) ? 'create' : 'edit';
        $this->translation = TranslationKey::get();
        $this->routeCreate = route('admin.projects.create');
        $this->routeView = route('admin.projects.index');
        $this->views = 'projects';
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
}
