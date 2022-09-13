<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $icon;
    public $title;
    public $date;
    public $id;

    public function __construct($icon = "", $title = "", $date = "", $id = "")
    {
        $this->icon = $icon;
        $this->title = $title;
        $this->date = $date;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
