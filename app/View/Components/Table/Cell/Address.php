<?php

namespace App\View\Components\Table\Cell;

use Illuminate\View\Component;

class Address extends Component
{
    public $line1;
    public $line2;
    public $postcode;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($line1, $line2, $postcode)
    {
        $this->line1 = $line1;
        $this->line2 = $line2;
        $this->postcode = $postcode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.cell.address');
    }
}
