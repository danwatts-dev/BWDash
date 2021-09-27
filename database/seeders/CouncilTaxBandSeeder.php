<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouncilTaxBandSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('council_tax_bands')->insert([
			'name' => 'A',
			'annual_charge' => 1000,
		]);

		DB::table('council_tax_bands')->insert([
			'name' => 'B',
			'annual_charge' => 1000,
		]);

		DB::table('council_tax_bands')->insert([
			'name' => 'C',
			'annual_charge' => 1000,
		]);

		DB::table('council_tax_bands')->insert([
			'name' => 'D',
			'annual_charge' => 1000,
		]);

		DB::table('council_tax_bands')->insert([
			'name' => 'E',
			'annual_charge' => 1000,
		]);
	}

}
