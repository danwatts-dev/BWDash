<?php
namespace App\View\Components\Field;

use Illuminate\View\Component;

abstract class Field extends Component {

	public $label;
	public $name;
	public $labelPosition;
	/**
	 * Show errors?
	 */
	public $displayErrors;

	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct(string $name, string $label = null, $displayErrors = true, $labelPosition = 'top') {
		$this->label = $label;
		$this->name = $name;
		$this->labelPosition = $labelPosition;
		$this->displayErrors = $displayErrors !== 'false';
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	abstract public function render();

}
