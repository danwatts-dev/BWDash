<?php
namespace App\Domain\Tenancy\Actions;

use App\Domain\Tenancy\DataTransferobjects\TenancyData;
use App\Domain\Tenancy\Models\Tenancy;

/**
 * Updates a tenancy in the db
 */
class TenancyUpdateAction {

	private TenancyChangeStateAction $tenancyChangeStateAction;

	public function __construct(TenancyChangeStateAction $tenancyChangeStateAction) {
		$this->tenancyChangeStateAction = $tenancyChangeStateAction;
	}

	public function execute (
		Tenancy $tenancy,
		TenancyData $data
	) {
		$tenancy->fill($data->toArray());
		$this->tenancyChangeStateAction->execute($tenancy, $data->status);
		$tenancy->save();
	}

}