<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostForm extends Component
{
    public $community;

    public function __construct($community)
    {
        $this->community = $community;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.post-form');
    }
}
