<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properties', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->string('reference')->unique();
			$table->string('address_line_1');
			$table->string('address_line_2')->nullable();
			$table->string('address_postcode');
			$table->string('address_city')->nullable();
			$table->decimal('latitude', 9, 6)->nullable();
			$table->decimal('longitude', 9, 6)->nullable();
			$table->foreignId('property_type_id');
			$table->string('status');
			$table->foreignId('council_tax_band_id');
			$table->string('main_image')->nullable();
			$table->json('images')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('properties');
	}

}
