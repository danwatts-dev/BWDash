<?php
namespace App\Domain\Tenancy\Actions;

use App\Models\Person;
use App\Domain\Property\Models\Unit;
use App\Domain\Property\Models\Property;
use App\Domain\Tenancy\DataTransferobjects\TenancyData;
use App\Models\Applicant;
use Illuminate\Validation\ValidationException;

/**
 * Creates a new tenancy in 'pending' state
 */
class InitiateTenancyAction {

	private $tenantFromApplicant;
	private $tenancyStore;
	private $AddTenants;

	public function __construct(
		TenantFromApplicantAction $tenantFromApplicant,
		TenancyStoreAction $tenancyStore,
		TenancyAddTenantAction $AddTenants
	) {
		$this->tenantFromApplicant = $tenantFromApplicant;
		$this->tenancyStore = $tenancyStore;
		$this->AddTenants = $AddTenants;
	}

	/**
	 * Executes the action
	 */
	public function execute (
		TenancyData $tenancyData,
		Applicant $applicant,
	): bool {

		// first check we have a valid applicant and convert them into a tenant
		$tenant = $this->tenantFromApplicant->execute($applicant);

		// now try and create the tenancy agaisnt the unit
		$tenancy = $this->tenancyStore->execute($tenancyData);

		// finally add the tenants
		$this->AddTenants->execute($tenancy, $tenant);

		return true;
	}

}