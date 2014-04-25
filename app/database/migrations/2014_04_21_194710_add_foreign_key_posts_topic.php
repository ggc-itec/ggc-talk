<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeyPostsTopic extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(Schema::hasTable('Posts_topic'))
		{
			Schema::table('posts', function(Blueprint $table)
			{
				$table->foreign('topic_id')->references('id')->on('Posts_topic')
				->onDelete('cascade')
				->onUpdate('cascade');
			});
		}
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