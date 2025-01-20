<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Repeater extends Component
{
    /**
     * Create a new component instance.
     */
    public $name, $title;
    public function __construct(string $name, string $title = '')
    {
        $this->name = $name;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.repeater');
    }
}
