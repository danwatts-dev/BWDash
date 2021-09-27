<?php

namespace App\View\Components\Field;

use Illuminate\View\Component;

class Option extends Component
{

	public $selected;

	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct(bool $selected = false)
	{
		$this->selected = $selected;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.field.option');
	}

}
