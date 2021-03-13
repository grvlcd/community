<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostComment extends Component
{
    public $comments;
    public function __construct($comments)
    {
        $this->comments = $comments;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.post-comment');
    }
}
