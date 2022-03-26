<?php

namespace App\View\Components;

use Illuminate\View\Component;

class input extends Component
{
    public $type;
    public $label;
    public $name;
    public $placeholder;
    public $div_class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$label,$name,$placeholder,$div_class)
    {
        $this->type=$type;
        $this->label=$label;
        $this->name=$name;
        $this->placeholder=$placeholder;
        $this->$div_class = $div_class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
