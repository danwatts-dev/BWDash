<?php
namespace App\ViewModels;

use App\Domain\Property\Models\Unit;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;

class UnitIndexViewModel implements Arrayable, Responsable {

	public function __construct($units = null) {
		$this->units = $units;
	}

	public function units(): Collection {
		return $this->units ?? collect([]);
	}

	// public function unitStatuses(): Collection {
	// 	return UnitState::all();
	// }

	public function toArray(): array {
		return [
			'units' => $this->units(),
		];
	}

	public function toResponse($request) {
		return response($this->toArray());
	}

}