<?php
namespace App\Domain\Tenancy\Casts;

use App\Domain\Property\DataTransferObjects\AddressData;
use App\Domain\Tenancy\States\TenancyState;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class TenancyStateCast implements CastsAttributes
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
		return new $attributes['status']($model);
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
		if (!$value instanceof TenancyState) {
			throw new InvalidArgumentException('The given value is not an TenancyState instance.');
		}

		return get_class($value);
	}
}