<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Content extends Component
{
    public $title;
    public $url;
    public $id;
    public $status;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $requiredPass, public $type, $title, $url, $id, $status = true)
    {
        $this->title  = $title;
        $this->url    = $url;
        $this->id     = $id;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $click = $this->requiredPass
            ? "showSecurityPanel('$this->id', '$this->title', '$this->type')"
            : "showContent('" . route('file.get.file', $this->id) . "')";

        return view('components.content', compact('click'));
    }
}
