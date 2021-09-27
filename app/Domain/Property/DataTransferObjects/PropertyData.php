<?php
namespace App\Domain\Property\DataTransferObjects;

use Illuminate\Http\Request;

class PropertyData {

	private AddressData $address;
	private ?string $council_tax_band_id;
	private ?string $id;
	private string $property_type_id;
	private ?string $status;
	private string $reference;

	public function __construct(array $array) {
		foreach ($array as $prop => $value) {
			if (property_exists($this, $prop)) $this->$prop = $value;
		}
	}

	/**
	 * Create this DTO froma request
	 */
	public static function fromRequest(Request $request) {
		return new self([
			'address' => AddressData::fromRequest($request),
			'council_tax_band_id' => $request->get('council_tax_band_id'),
			'id' => $request->get('id'),
			'property_type_id' => $request->get('property_type_id'),
			'status' => $request->get('status'), // classname of status
			'reference' => $request->get('reference'),
		]);
	}

	/**
	 * ID getter
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Status getter
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * Convert this DTO to an arrray
	 */
	public function toArray() {
		return get_object_vars($this);
	}
}