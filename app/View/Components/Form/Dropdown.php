<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public  $label, $name, $value, $array, $multiple;
    public function __construct($array, $label, $name, $value, $multiple = true)
    {
        $this->array = $array;
        $this->label = $label ?? '';
        $this->name = $name ?? '';
        $this->value = $value ?? '';
        $this->multiple = $multiple ?? '';
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.dropdown');
    }
}
