<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRMI extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('internships', function($table)
    {
      $table->increments('id');
      $table->string('companyName', 100);
      $table->string('position',100);
      $table->string('started',100);
	  $table->string('compensation',100);
	  $table->string('hrPerWeek',100);
	  $table->string('comments',255);
	  $table->string('creatorID', 255);
		  
	  $table->integer('challenge')->default(1);
	  $table->integer('networking')->default(1);
	  $table->integer('social')->default(1);
	  $table->integer('importance')->default(1);
	  $table->integer('experience')->default(1);

	 
    });

    
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	  Schema::drop('internships');
	}

}
