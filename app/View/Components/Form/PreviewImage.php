<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PreviewImage extends Component
{
    /**
     * Create a new component instance.
     */
    public $image, $width, $height, $alt;
    public function __construct($image, $width = null, $height = null, $alt = null)
    {
        $this->image = $image;
        $this->width = $width;
        $this->height = $height;
        $this->alt = $alt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.preview-image');
    }
}
