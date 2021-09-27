<?php
namespace App\Domain\Property\DataTransferObjects;

use Illuminate\Http\Request;

class UnitData {

	private ?string $unit_name;
	private int $property_id;
	private ?int $bathrooms;
	private ?int $bedrooms;
	private ?string $size;
	private ?string $type;
	private ?string $deposit_amount;
	private ?int $rent;

	public function __construct(array $array) {
		foreach ($array as $prop => $value) {
			if (property_exists($this, $prop)) $this->$prop = $value;
		}
	}

	public static function fromRequest(Request $request) {
		return new self([
			'unit_name' => $request->get('unit_name'),
			'bathrooms' => $request->get('bathrooms'),
			'bedrooms' => $request->get('bedrooms'),
			'deposit_amount' => $request->get('deposit_amount'),
			'property_id' => $request->get('property_id'),
			'rent' => $request->get('rent'),
			'size' => $request->get('size'),
			'type' => $request->get('type'),
		]);
	}

	public function toArray() {
		return get_object_vars($this);
	}
}