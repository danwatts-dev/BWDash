<?php
namespace App\ViewModels;

use App\Models\Person;
use App\Models\Applicant;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;

class ApplicantFormViewModel implements Arrayable, Responsable {

	public function __construct(Person $person = null) {
		$this->person = $person;
	}

	public function person(): ?Person {
		return $this->person;
	}

	public function toArray(): array {
		return [
			'person' => $this->person(),
			'person_type' => 'applicant',
		];
	}

	public function toResponse($request) {
		return response($this->toArray());
	}

}