<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Drawer extends Component
{
    public $title;
    public $url;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $dataDrawer, public $requiredPass, public $drawerName, $title, $url, $id = '')
    {
        $this->title = $title;
        $this->url   = $url;
        $this->id    = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $click = $this->requiredPass
            ? "showSecurityPanel('$this->dataDrawer', '$this->drawerName')"
            : "enterDrawer('" . route('drawer.items', $this->dataDrawer) . "', this)";

        return view('components.drawer', [
            'click' => $click
        ]);
    }
}
