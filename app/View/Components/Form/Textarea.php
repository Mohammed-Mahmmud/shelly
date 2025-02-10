<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    /**
     * Create a new component instance.
     */
    public $name,  $class, $id, $style, $placeholder, $value, $required, $label, $rows;
    public function __construct($name, $rows = null, $id = null, $class = null, $style = null, $placeholder = null, $value = null, $required = false, $label = false)
    {
        $this->name = $name;
        $this->class = $class;
        $this->style = $style;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->required = $required;
        $this->label = $label;
        $this->rows = $rows;
        $this->id = $id ?? $name . '_' . uniqid();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.textarea');
    }
}
