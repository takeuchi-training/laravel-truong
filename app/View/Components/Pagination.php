<?php

namespace App\View\Components;

use Illuminate\Http\Request;
use Illuminate\View\Component;

class Pagination extends Component
{
    public $lastPage;
    public $totalItems;
    public $currentPage;
    public $onEachSide;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($totalItems, $lastPage, $onEachSide = 3)
    {
        $this->lastPage = $lastPage;
        $this->totalItems = $totalItems;
        $this->onEachSide = $onEachSide;
        $this->currentPage = $this->getPage();
    }

    private function getPage() {
        return request()->page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pagination');
    }
}
