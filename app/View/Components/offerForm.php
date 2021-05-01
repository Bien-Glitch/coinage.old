<?php

namespace App\View\Components;

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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.offer-form');
    }
}
