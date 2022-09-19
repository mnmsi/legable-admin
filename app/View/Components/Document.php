<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Document extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $icon;
    public $name;
    public $date;
    public $size;

    public function __construct($icon = "", $name = "", $date = "", $size)
    {
        $this->icon = $icon;
        $this->name = $name;
        $this->date = $date;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.document');
    }
}
