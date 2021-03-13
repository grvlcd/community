<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostCardDetail extends Component
{
    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.post-card-detail');
    }
}
