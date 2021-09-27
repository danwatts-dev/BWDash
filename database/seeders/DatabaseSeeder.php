<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\PropertySeeder;
use Database\Seeders\CouncilTaxBandSeeder;

class DatabaseSeeder extends Seeder
{

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call([
			CouncilTaxBandSeeder::class,
			PersonSeeder::class,
		]);

		DB::table('property_types')->insert([
			'name' => 'HMO',
		]);
		DB::table('property_types')->insert([
			'name' => 'House',
		]);
		DB::table('property_types')->insert([
			'name' => 'Block',
		]);
	}

}
