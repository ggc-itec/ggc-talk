<?php

use Illuminate\Database\Migrations\Migration;

class CreateLocations extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locations', function($table) {
      $table -> increments('id');
      $table -> string('name', 128);
      $table -> string('longitude',100);
      $table -> string('latitude',100);
      $table -> string('description', 500);
    });
    
    DB::table('locations')->insert(array(
      'name' => 'A Building',
      'longitude' => '33.979700',
      'latitude' => '-84.001750',
      'description' => 'A challenging maze'
    ));
    
    DB::table('locations')->insert(array(
      'name' => 'B Building',
      'longitude' => '33.980700',
      'latitude' => '-84.005450',
      'description' => 'Where most ITEC classes take place'
    ));
    
    DB::table('locations')->insert(array(
      'name' => 'C Building',
      'longitude' => '33.980097',
      'latitude' => '-84.006042',
      'description' => 'A nice clean building'
    ));
    
    DB::table('locations')->insert(array(
      'name' => 'D Building',
      'longitude' => '',
      'latitude' => '',
      'description' => ''
    ));
    
    DB::table('locations')->insert(array(
      'name' => 'E Building',
      'longitude' => '33.979250',
      'latitude' => '-84.005650',
      'description' => 'Where the student center is located'
    ));
    
    DB::table('locations')->insert(array(
      'name' => 'H Building',
      'longitude' => '33.980080',
      'latitude' => '-84.003650',
      'description' => 'Health Science building'
    ));
    
    DB::table('locations')->insert(array(
      'name' => 'L Building',
      'longitude' => '33.979300',
      'latitude' => '-84.004650',
      'description' => 'Library is located here'
    ));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('locations');
	}

}
