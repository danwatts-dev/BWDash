<?php
namespace App\Domain\Tenancy\DataTransferObjects;

use App\Domain\Shared\DataTransferObject;
use Exception;
use Illuminate\Http\Request;

class TenancyTermData extends DataTransferObject {

	/**
	 * Number of months this tenancy wil run for
	 */
	public int $term_in_months;

	/**
	 * Valid term lengths
	 */
	const TERM_LENGTHS = [
		6,
		12,
		18,
		24,
	];

	/**
	 * Returns a new self hydrated by a request
	 */
	public static function fromRequest(Request $request): self {
		if (!in_array($request->term_in_months, self::TERM_LENGTHS)) throw new Exception('Not a valid term length');
		return new self([
			'term_in_months' => $request->term_in_months,
		]);
	}

	public static function fromArray(array $array) {
		return new self([
			'term_in_months' => $array['term_in_months'],
		]);
	}
}