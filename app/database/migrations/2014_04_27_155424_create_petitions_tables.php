<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetitionsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('petitions', function($table) {
			//Columns
			$table -> increments('id');
			$table -> string('class_name', 64);
			$table -> string('class_desc', 500);
			$table -> string('subject', 4);
			$table -> timestamps();
		});
		Schema::create('signees', function($table) {
			//Columns
			$table -> increments('id');
			$table -> string('user_id', 64);
			$table -> integer('petition_id') -> unsigned();
			//Table Constraints
			$table -> foreign('user_id') ->
						references('id') -> on('users') ->
						onUpdate('cascade') ->
						onDelete('cascade');
			$table -> foreign('petition_id') ->
						references('id') -> on('petitions') ->
						onUpdate('cascade') ->
						onDelete('cascade');
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
		Schema::drop('signee');
		Schema::drop('petition');
	}

}
