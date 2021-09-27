<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToPeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('people', function (Blueprint $table) {
			$table->string('middle_name')->after('first_name')->nullable();
			$table->string('home_phone')->nullable();
			$table->string('mobile_phone')->nullable();
			$table->string('email')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('people', function (Blueprint $table) {
			//
		});
	}

}
