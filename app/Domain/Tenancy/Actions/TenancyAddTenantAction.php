<?php
namespace App\Domain\Tenancy\Actions;

use App\Domain\Tenants\Models\Tenant;
use App\Domain\Tenancy\Models\Tenancy;

/**
 * Creates a new tenancy in 'pending' state
 */
class TenancyAddTenantAction {

	public function execute (
		Tenancy $tenancy,
		Tenant $tenant
	) {
		$tenancy->tenants()->save($tenant);
	}

}