<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public $name, $accept, $type, $class, $style, $placeholder, $value, $required, $label;
    public function __construct($name, $type, $accept = null, $class = null, $style = null, $placeholder = null, $value = null, $required = false, $label = false)
    {
        $this->name = $name;
        $this->accept = $accept;
        $this->type = $type;
        $this->class = $class;
        $this->style = $style;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->required = $required;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
