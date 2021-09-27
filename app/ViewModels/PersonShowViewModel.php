<?php
namespace App\ViewModels;

use App\Models\Person;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;

class PersonShowViewModel implements Arrayable, Responsable {

	public function __construct(Person $person = null) {
		$this->person = $person;
	}

	public function person(): Person {
		return $this->person ?? new Person();
	}

	/**
	 * Convert this view model as an array of key => values
	 */
	public function toArray(): array {
		return [
			'person' => $this->person(),
		];
	}

	/**
	 * Returns this view model as a response
	 */
	public function toResponse($request) {
		return response($this->toArray());
	}

}