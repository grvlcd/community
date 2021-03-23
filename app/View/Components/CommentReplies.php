<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CommentReplies extends Component
{
    public $replies;

    public function __construct($replies)
    {
        $this->replies = $replies;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.comment-replies');
    }
}
