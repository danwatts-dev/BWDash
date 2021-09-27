<?php
namespace App\Domain\Property\Casts;

use App\Domain\Property\DataTransferObjects\AddressData;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class AddressCast implements CastsAttributes
{

	/**
	 * Cast the given value.
	 *
	 * @param  \Illuminate\Database\Eloquent\Model  $model
	 * @param  string  $key
	 * @param  mixed  $value
	 * @param  array  $attributes
	 * @return \App\Models\Address
	 */
	public function get($model, $key, $value, $attributes) {
		return AddressData::fromArray($attributes);
	}

	/**
	 * Prepare the given value for storage.
	 *
	 * @param  \Illuminate\Database\Eloquent\Model  $model
	 * @param  string  $key
	 * @param  App\Domain\Property\DataTransferObjects\AddressData
	 * @param  array  $attributes
	 * @return array
	 */
	public function set($model, $key, $value, $attributes) {
		if (!$value instanceof AddressData) {
			throw new InvalidArgumentException('The given value is not an Address instance.');
		}

		return [
			'address_line_1' => $value->address_line_1,
			'address_line_2' => $value->address_line_2,
			'address_city' => $value->address_city,
			'address_postcode' => $value->address_postcode,
		];
	}
}