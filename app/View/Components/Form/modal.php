<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modal extends Component
{
    /**
     * Create a new component instance.
     */
    public $id, $title, $action, $method;
    public function __construct($id, $title, $action, $method)
    {
        $this->id = $id;
        $this->title = $title;
        $this->action = $action;
        $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.modal');
    }
}
