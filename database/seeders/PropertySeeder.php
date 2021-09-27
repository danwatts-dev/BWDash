<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('properties')->insert([
			'address_line_1' => '1 Northfield Road',
			'address_postcode' => 'CV1 1AA',
			'address_city' => 'Coventry',
			'reference' => '1 Northfield',
			'property_type_id' => 1,
			'status' => 'active',
			'council_tax_band_id' => 1,
		]);

		DB::table('properties')->insert([
			'address_line_1' => '16a Queens Road',
			'address_postcode' => 'CV1 1AA',
			'address_city' => 'Coventry',
			'reference' => '16a Queens',
			'property_type_id' => 1,
			'status' => 'active',
			'council_tax_band_id' => 1,
		]);
	}

}
