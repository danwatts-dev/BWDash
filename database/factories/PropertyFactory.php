<?php

namespace Database\Factories;

use App\Domain\Property\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory {

	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Property::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'address_line_1' => $address = $this->faker->streetAddress(),
			'address_line_2' => ' ',
			'address_postcode' => $this->faker->postcode(),
			'address_city' => $this->faker->city(),
			'latitude' => 100.222,
			'longitude' => 144.555,
			'status' => ['active', 'disabled'][rand(0,1)],
			'main_image' => 'image.png',
			'property_type_id' => rand(1,3),
			'council_tax_band' => rand(1,3),
            'reference' => $address,

		];
	}

}
