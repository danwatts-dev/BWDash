<?php

namespace App\View\Components\field;

use Illuminate\View\Component;

class AlpineButton extends Component {

	public $color;
	public $label;
	public $url;

	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($color, $label, $url) {
		$this->color = $color;
		$this->label = $label;
		$this->url = $url;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.field.alpine-button');
	}

}
