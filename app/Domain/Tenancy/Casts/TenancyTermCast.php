<?php
namespace App\Domain\Tenancy\Casts;

use App\Domain\Tenancy\DataTransferObjects\TenancyTermData;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class TenancyTermCast implements CastsAttributes
{

	/**
	 * Cast the given value.
	 *
	 * @param  \Illuminate\Database\Eloquent\Model  $model
	 * @param  string  $key
	 * @param  mixed  $value
	 * @param  array  $attributes
	 * @return TenancyTermData
	 */
	public function get($model, $key, $value, $attributes) {
		return TenancyTermData::fromArray($attributes);
	}

	/**
	 * Prepare the given value for storage.
	 *
	 * @param  \Illuminate\Database\Eloquent\Model  $model
	 * @param  string  $key
	 * @param  TenancyTermData
	 * @param  array  $attributes
	 * @return array
	 */
	public function set($model, $key, $value, $attributes) {
		if (!$value instanceof TenancyTermData) {
			throw new InvalidArgumentException('The given value is not a TenancyTermData instance.');
		}

		return [
			'term_in_months' => $value->term_in_months,
		];
	}
}