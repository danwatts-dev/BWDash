<?php
namespace App\ViewModels;

use App\Domain\Property\Models\Unit;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Arrayable;
// use App\Domain\Property\UnitStates\UnitState;
use Illuminate\Contracts\Support\Responsable;

class UnitFormViewModel implements Arrayable, Responsable {

	public function __construct(Unit $unit = null) {
		$this->unit = $unit;
	}

	public function unit(): Unit {
		return $this->unit ?? new Unit();
	}

	// public function unitStatuses(): Collection {
	// 	return UnitState::all();
	// }

	public function toArray(): array {
		return [
			'unit' => $this->unit(),
			// 'unitStatuses' => $this->unitStatuses(),
		];
	}

	public function toResponse($request) {
		return response($this->toArray());
	}

}