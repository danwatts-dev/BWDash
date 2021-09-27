<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Row extends Component
{
	public $dot = 'text-black';
	public $dotTooltip;
	public $alpine = false;

	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($dot = "", $dotTooltip = "", $alpine = "") {
		$this->dot = $dot;
		$this->dotTooltip = $dotTooltip;
		$this->alpine = $alpine;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.table.row');
	}

}
