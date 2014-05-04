<?php

use Illuminate\Database\Migrations\Migration;

class CreateTechtalkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('techtalks', function($table)
        {
            $table ->increments('id');
            $table ->string('title');
            $table ->string('speaker');
            $table ->timestamps();
        });

        Schema::create('tech_comments', function($table)
        {
            $table ->string('username', 128);
            $table ->string('body', 500);
            $table ->integer('techtalk_id')->unsigned();
            $table ->foreign('techtalk_id')->references('id')->on('techtalks');
            $table ->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('tech_comments');
		Schema::drop('techtalks');
	}

}