<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class total extends Component
{
    /**
     * Create a new component instance.
     */public $totalincome;
    public function __construct($totalincome)
    {
        $this->totalincome = $totalincome;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.total');
    }
}