<?php

namespace App\View\Components\Table\Cell;

use Illuminate\View\Component;

class Name extends Component {
	public $first;
	public $last;

	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($first, $last) {
		$this->first = $first;
		$this->last = $last;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render() {
		return view('components.table.cell.name');
	}

}
