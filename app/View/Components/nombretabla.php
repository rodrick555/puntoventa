<?php

namespace App\View\Components;

use Illuminate\View\Component;

class nombretabla extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $titulo1;
    public function __construct($titulo1)
    {
        
        $this ->titulo1=$titulo1;  
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nombretabla');
    }
}
