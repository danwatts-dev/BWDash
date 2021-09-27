<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('units', function (Blueprint $table) {
			$table->id();
			$table->foreignId('property_id')->constrained();
			$table->string('unit_name');
			$table->integer('bathrooms')->nullable();
			$table->integer('bedrooms')->nullable();
			$table->string('size');
			$table->string('type');
			$table->integer('deposit_amount');
			$table->integer('rent');
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
		Schema::dropIfExists('units');
	}

}
