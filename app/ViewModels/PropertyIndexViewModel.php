<?php
namespace App\ViewModels;

use App\Domain\Property\Models\Property;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;

class PropertyIndexViewModel implements Arrayable, Responsable {

	public function toArray(): array {
		return [
			'property_count' => Property::all()->count(),
			'properties' => Property::limit(10)->get(),
		];
	}

	public function toResponse($request) {
		return '';
	}

}