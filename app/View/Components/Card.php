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

    public function __construct(public $dataDrawer, public $requiredPass, $icon = "", $title = "", $date = "", $id = "", $isThreeDotShow = "")
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
        $click = $this->requiredPass
            ? "showSecurityPanel('$this->dataDrawer')"
            : "enterDrawer('" . route('drawer.items', $this->dataDrawer) . "')";

        return view('components.card', [
            'click' => $click
        ]);
    }
}
