<?php

use Illuminate\Database\Migrations\Migration;

class CreateHousingListings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('housing_listings', function($table) {
			$table -> increments('id');
			$table -> string('author', 64);
			$table -> string('title', 200);
			$table -> text('body');
			$table -> decimal('rent', 7, 2);
			$table -> integer('distance');
			$table -> string('type', 10);
			$table -> integer('bedrooms');
			$table -> string('city', 25);
			$table -> timestamps();
		});

		Schema::create('housing_pics', function($table) {
			$table -> increments('id');
			$table -> string('filename', 100);
			$table -> integer('listing_id') -> unsigned();
			$table -> foreign('listing_id') -> references('id') -> on('housing_listings');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('housing_pics');
		Schema::drop('housing_listings');
	}

}