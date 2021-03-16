<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostCarousel extends Component
{
    public $images;

    public function __construct($images)
    {
        $this->images = $images;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.post-carousel');
    }
}
