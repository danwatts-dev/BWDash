<?php
namespace App\Domain\Property\Casts;

use InvalidArgumentException;
use App\Domain\Property\DataTransferObjects\CouncilTaxData;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class CouncilTaxCast implements CastsAttributes
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
		return CouncilTaxData::fromArray($attributes);
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
		if (!$value instanceof CouncilTaxData) {
			throw new InvalidArgumentException('The given value is not a Council Tax instance.');
		}

		return [
			'council_tax_band' => $value->council_tax_band,
		];
	}
}