<?php

namespace App\View\Components\Element;

use Illuminate\View\Component;

class DetailItem extends Component {

    public $icon;

	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($icon) {
		$this->icon = $icon;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.element.detail-item');
	}

}
