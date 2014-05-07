<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHousingListingContactInfo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('housing_listings', function($table) {
			$table -> boolean('hasPic');
			$table -> string('alternateEmail');
			$table -> string('contactPhone');
			$table -> boolean('displayAuthor_Email');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('housing_listings', function($table) {
			$table -> dropColumn('hasPic');
			$table -> dropColumn('alternateEmail');
			$table -> dropColumn('contactPhone');
			$table -> dropColumn('displayAuthor_Email');
		});
	}

}
