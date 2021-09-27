<?php
namespace App\Domain\Shared\Traits;

trait HasPerson {

	// GETTERS //
	public function getNameAttribute() {
		return $this->person->name;
	}

}