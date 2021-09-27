<?php
namespace App\Domain\Property\DataTransferObjects;

use App\Domain\Shared\DataTransferObject;
use Illuminate\Http\Request;

class CouncilTaxData extends DataTransferObject {

	protected $council_tax_band_id;

	public static function fromRequest(Request $request) {
		return new self([
			'council_tax_band_id' => $request->council_tax_band_id,
		]);
	}

	public static function fromArray(array $array) {
		return new self([
			'council_tax_band_id' => $array['council_tax_band'],
		]);
	}

	public function __get($name) {
		return $name;
	}

}