<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $title;
    public $subtitle;
    public $buttonText;
    public $buttonIcon;
    public $link;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $subtitle, $buttonIcon = "", $buttonText = "", $link = "", $id = "")
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->buttonIcon = $buttonIcon;
        $this->buttonText = $buttonText;
        $this->link = $link;
        $this->id = $id;
        $this->isBreadCrumb = $breadCrumb;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.breadcrumb');
    }
}

