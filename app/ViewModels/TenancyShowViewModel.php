<?php
namespace App\ViewModels;

use App\Domain\Tenancy\Models\Tenancy;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;

class TenancyShowViewModel implements Arrayable, Responsable {

	public function __construct(Tenancy $tenancy = null) {
		$this->tenancy = $tenancy;
	}


	public function tenancy(): Tenancy {
		return $this->tenancy ?? new Tenancy();
	}

	/**
	 * Convert this view model as an array of key => values
	 */
	public function toArray(): array {
		return [
			'tenancy' => $this->tenancy(),
		];
	}

	/**
	 * Returns this view model as a response
	 */
	public function toResponse($request) {
		return response($this->toArray());
	}

}