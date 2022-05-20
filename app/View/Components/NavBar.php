<?php

namespace App\View\Components;

use Illuminate\Http\Request;
use Illuminate\View\Component;

class NavBar extends Component
{
    public $message;

    public $isErrorMessage;

    public $path;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $isErrorMessage, Request $request)
    {
        $this->message = $message;
        $this->isErrorMessage = $isErrorMessage;
        $this->path = $request->path();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-bar');
    }
}
