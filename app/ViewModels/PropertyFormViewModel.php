<?php
namespace App\ViewModels;

use App\Domain\Property\Models\Property;
use App\Domain\Property\Models\PropertyType;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Arrayable;
use App\Models\CouncilTaxBand;
use Illuminate\Contracts\Support\Responsable;

class PropertyFormViewModel implements Arrayable, Responsable {

	public function __construct(Property $property = null) {
		$this->property = $property;
	}

	public function CouncilTaxBands(): Collection {
		return (CouncilTaxBand::all())->prepend(new CouncilTaxBand([]));
	}

	public function property(): Property {
		return $this->property ?? new Property();
	}

	public function propertytypes(): Collection {
		return PropertyType::all();
	}

	public function toArray(): array {
		return [
			'council_tax_bands' => $this->CouncilTaxBands(),
			'property' => $this->property(),
			'propertyTypes' => $this->propertyTypes(),
		];
	}

	public function toResponse($request) {
		return response($this->toArray());
	}

}