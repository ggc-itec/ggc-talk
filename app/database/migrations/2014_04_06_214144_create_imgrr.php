<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgrr extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('imgrr_pics', function($table)
    {
      $table->increments('id');
      $table->string('author', 100);
      $table->string('title',100);
      $table->string('filename',100);
    });

    Schema::create('imgrr_comments', function($table)
    {
      $table->increments('id');
      $table->integer('imgrr_pic_id')->unsigned();
      $table->foreign('imgrr_pic_id')->references('id')->on('imgrr_pics');
      $table->string('comment',500);
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	  Schema::drop('imgrr_pics');
    Schema::drop('imgrr_comments');
	}

}
