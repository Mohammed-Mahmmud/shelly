<?php

namespace App\View\Components\Dashboard\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ErrorVerify extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.layouts.error-verify');
    }
}
