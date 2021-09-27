<?php
namespace App\Domain\Property\States;

use Spatie\ModelStates\Transition;
use App\Domain\Property\Models\Property;
use Spatie\ModelStates\Exceptions\TransitionNotAllowed;

class ActiveToDisabled extends Transition {

	 /**
	 * Constructs the stuff
	 */
	public function __construct(Property $property) {
		$this->property = $property;
	}

	/**
	 * The property to disable
	 */
	private Property $property;

	/**
	 * Handles the transition and returns the transitioned property, or an exception
	 */
	public function handle(): Property {
		if ($this->property->active_tenancies) throw new TransitionNotAllowed('Cant disable a property with active tenancies');
		$this->property->status = new Disabled($this->property);
		$this->property->save();

		return $this->property;
	}
}