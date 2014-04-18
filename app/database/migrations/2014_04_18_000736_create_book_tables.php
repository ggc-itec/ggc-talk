<?php

use Illuminate\Database\Migrations\Migration;

class CreateBookTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
		public function up()
	{
		
	  Schema::create('book_table', function($table) 
	  {
     	$table -> increments('book_id');
      	$table -> string('book_title',25);
      	$table -> string('book_author',25);
      	$table -> string('book_ISBN10',15);
      	$table -> string('book_ISBN13',15);
		$table -> string('book_edition', 25);
		$table -> string('book_condition', 25);
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