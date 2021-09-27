<?php
namespace App\Domain\Shared;

/**
 * Base class for DTOs
 */
class DataTransferObject {

	/**
	 * Loop through supplied array and set props
	 */
	public function __construct(array $array) {
		foreach ($array as $prop => $value) {
			if (property_exists($this, $prop)) $this->$prop = $value;
		}
	}

	/**
	 * Convert to an array
	 */
	public function toArray(): array {
		return get_object_vars($this);
	}
}