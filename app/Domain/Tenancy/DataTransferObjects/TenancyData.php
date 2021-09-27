<?php
namespace App\Domain\Tenancy\DataTransferobjects;

use DateTime;
use Illuminate\Http\Request;
use App\Domain\Shared\DataTransferObject;
use App\Domain\Tenancy\DataTransferObjects\TenancyTermData;
use App\Domain\Tenancy\States\TenancyState;

class TenancyData extends DataTransferObject {

	protected ?int $unit_id = null;
	protected ?TenancyTermData $term_in_months = null;
	protected ?DateTime $start_date = null;
	protected ?TenancyState $status = null;
	// protected ?Contract $contract = null;

	/**
	 * Returns a new self hydrated by a request
	 */
	public static function fromRequest(Request $request) {
		return new self([
			'unit_id' => $request->unit_id,
			'term_in_months' => TenancyTermData::fromRequest($request),
			'terminates' => new \DateTime($request->start_date),
			'status' => $request->status,
		]);
	}

	/**
	 * Return unit id
	 */
	public function unitId() {
		return $this->unit_id;
	}
}