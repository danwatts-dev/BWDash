<?php

namespace App\View\Components\Element;

use Illuminate\View\Component;

class ActionButton extends Component
{
	public $color;

	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($color = 'green')
	{
		$this->color = $color;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.element.action-button');
	}

}
