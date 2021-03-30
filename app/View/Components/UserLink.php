<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserLink extends Component
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.user-link');
    }
}