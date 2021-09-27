<?php
namespace App\Domain\Tenancy\States;

use App\Domain\Tenancy\Models\Tenancy;

interface TenancyTransitionInterface {

	/**
	 * Runs the transition and update the state
	 */
	public function execute(Tenancy $tenancy): Tenancy;

}