<?php

namespace App\Domain\Property\Actions;

use App\Domain\Property\Models\Property;
use App\Domain\Property\DataTransferObjects\PropertyData;

final class PropertyUpdateAction {

	public function execute(PropertyData $data): Property {
		$property = Property::find($data->getId());

		if ($property->status != $data->getStatus()) $property->status->transitionTo($data->getStatus());

		$property->update($data->toArray());
		$property->save();

		return $property;
	}
}