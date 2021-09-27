<?php
namespace App\View\Components\Field;

class Select extends Field {

	public $disabled;

	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct(string $name, bool $disabled = false, string $label = null, $displayErrors = true, $labelPosition = 'top') {
		parent::__construct($name, $label, $displayErrors, $labelPosition);
		$this->disabled = $disabled;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.field.select');
	}

}
