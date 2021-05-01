<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class offerForm extends Component
{
    public $offer;

    /**
     * Create a new component instance.
     *
     * @param null $offer
     */
    public function __construct($offer = NULL)
    {
        $this->offer = $offer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.offer-form');
    }
}
