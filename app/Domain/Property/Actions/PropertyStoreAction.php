<?php

namespace App\Domain\Property\Actions;

use App\Domain\Property\Models\Property;
use App\Domain\Property\DataTransferObjects\PropertyData;

final class PropertyStoreAction {

	public function execute(
		PropertyData $data
	): Property {
		$property = Property::create($data->toArray());
		return $property;
	}
}