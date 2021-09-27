<?php
namespace App\Domain\Tenancy\Actions;


use App\Models\Applicant;
use App\Domain\Tenants\Models\Tenant;

/**
 * Creates a new tenancy in 'pending' state
 */
class TenantFromApplicantAction {

	public function execute (
		Applicant $applicant
	): Tenant {
		if (!$applicant->isValid()) throw new \Exception();

		// create a tenant
		$tenant = Tenant::create([
			'person_id' => $applicant->person_id,
		]);

		// soft delete the applicant
		$applicant->delete($applicant->id);

		return $tenant;
	}

}