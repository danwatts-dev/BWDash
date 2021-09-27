<?php
namespace App\Domain\Tenancy\Actions;


use App\Domain\Property\Models\Unit;
use App\Domain\Tenancy\Models\Tenancy;
use App\Domain\Tenancy\DataTransferobjects\TenancyData;

/**
 * Creates a new tenancy in 'pending' state
 */
class TenancyStoreAction {

	public function execute (
		TenancyData $data
	) {
		// first check that the unit is ok to move in to
		if (!Unit::find($data->unitId())->isAvailable()) throw new \Exception();
		return Tenancy::create($data->toArray());
	}

}