<?php

namespace App\ViewModels\Settings;

use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use Spatie\ViewModels\ViewModel;

class SettingViewModel extends ViewModel
{
    public $setting;
    public $type;

    public function __construct(Setting $setting, string $type = 'create')
    {
        $this->setting = $setting;
        $this->type = $type;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function views(): string
    {
        return 'settings';
    }

    public function action(): string
    {
        if ($this->type === 'create') {
            return route('admin.settings.store');
        }

        return route('admin.settings.update', $this->setting->id);
    }

    public function method(): string
    {
        return $this->type === 'create' ? 'POST' : 'PUT';
    }

    public function setting(): Setting
    {
        return $this->setting;
    }
}
