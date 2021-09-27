<?php

namespace App\View\Components\Field;

use Illuminate\View\Component;

class Input extends Field {

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.field.input');
	}

}
