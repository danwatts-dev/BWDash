<?php
namespace App\ViewModels;

use App\Models\Applicant;
use App\Domain\Property\Models\Unit;
use App\Domain\Property\Models\Property;
use App\Domain\Tenancy\DataTransferObjects\TenancyTermData;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;

class TenancyFormViewModel implements Arrayable, Responsable {

	public function __construct(Property $property = null) {
		$this->property = $property;
	}

	/**
	 * Returns a collection of all available properties
	 */
	public function units() {
		return Unit::available()->get();

	}

	/**
	 * Returns a collection of potential tenants
	 */
	public function applicants() {
		return Applicant::all();
	}

	/**
	 * Returns a collection of potential tenants
	 */
	public function termLengths(): array {
		return TenancyTermData::TERM_LENGTHS;
	}

	/**
	 * Convert this view model as an array of key => values
	 */
	public function toArray(): array {
		return [
			'units' => $this->units(),
			'unit_id' => request('unit_id') ?? null,
			'applicants' => $this->applicants(),
            'term_lengths' => $this->termLengths(),
		];
	}

	/**
	 * Returns this view model as a response
	 */
	public function toResponse($request) {
		return response($this->toArray());
	}

}