<?php

namespace App\View\Components\Card;

use App\Domain\Property\Models\Unit;
use Illuminate\View\Component;

class UnitRow extends Component {

	public Unit $unit;

	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct(Unit $unit) {
		$this->unit = $unit;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.card.unit-row');
	}

}
