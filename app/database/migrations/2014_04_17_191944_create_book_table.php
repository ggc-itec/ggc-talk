<?php

use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
	  Schema::create('books', function($table) 
	  {
     	$table -> increments('book_id');
      	$table -> string('book_title',25);
      	$table -> string('book_author',25);
      	$table -> string('book_ISBN10',15);
      	$table -> string('book_ISBN13',15);
		$table -> string('book_edition', 25) -> nullable();
		$table -> string('book_condition', 25) -> nullable();
    });
	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book_table');
	}

}