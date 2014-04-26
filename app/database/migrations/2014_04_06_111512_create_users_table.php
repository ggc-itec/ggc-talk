<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('users', function(Blueprint $table) {
      $table -> string('id', 64) -> primary();
      $table -> string('email', 128);
      $table -> string('password', 64);
      $table -> string('first_name', 50);
      $table -> string('last_name', 50);
      $table -> string('role', 16);
      $table -> string('remember_token', 100);
      $table -> string('confirm_token', 100);
      $table -> integer('confirmed');
      $table -> timestamps();
    });

  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('users');
  }

}
