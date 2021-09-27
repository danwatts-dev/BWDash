<?php
namespace App\Domain\Property\DataTransferObjects;

use Illuminate\Http\Request;

class AddressData {

	public function __construct(array $array) {
		foreach ($array as $prop => $value) {
			$this->$prop = $value;
		}
	}

	public static function fromRequest(Request $request) {
		return new self([
			'address_line_1' => $request->address_line_1,
			'address_line_2' => $request->address_line_2 ?? '',
			'address_city' => $request->address_city,
			'address_postcode' => $request->address_postcode,
		]);
	}

	public static function fromArray(array $array) {
		return new self([
			'address_line_1' => $array['address_line_1'],
			'address_line_2' => $array['address_line_2'],
			'address_city' => $array['address_city'],
			'address_postcode' => $array['address_postcode'],
		]);
	}

}