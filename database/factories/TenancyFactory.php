<?php

namespace Database\Factories;

use App\Domain\Tenancy\Models\Tenancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenancyFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Tenancy::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'term_in_months' => '6',
			'expires' => $this->faker->dateTimeBetween('now', '+12 months'),
		];
	}

}
