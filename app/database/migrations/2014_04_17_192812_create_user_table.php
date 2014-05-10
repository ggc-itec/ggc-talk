<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
  public function up()
  {
    Schema::create('flickr_pics', function($table) {
      $table -> increments('user_id');
      $table -> string('user_name', 25);
      $table -> string('user_email', 25);
      $table -> string('user_first', 25);
      $table -> string('user_last', 25);
    });
  }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}