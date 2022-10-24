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
    public $isThreeDotShow;

    public function __construct(public $dataDrawer, public $requiredPass, $icon = "", $title = "", $date = "", $id = "", $isThreeDotShow = "", public $click = "")
    {
        $this->icon           = $icon;
        $this->title          = $title;
        $this->date           = $date;
        $this->id             = $id;
        $this->isThreeDotShow = $isThreeDotShow;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public
    function render()
    {
        return view('components.card');
    }
}
