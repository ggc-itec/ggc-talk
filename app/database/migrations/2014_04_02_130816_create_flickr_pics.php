<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlickrPics extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('flickr_pics', function($table) {
      $table -> increments('id');
      $table -> string('name',200);
      $table -> string('url',200);
      $table -> string('published',200);
      $table -> string('content',1000);
      $table -> integer('upvotes');
      $table -> integer('downvotes');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('flickr_pics');
  }

}
