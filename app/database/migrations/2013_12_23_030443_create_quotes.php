<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreateQuotes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('quotes', function(Blueprint $table) {
      $table->increments('id');
      $table->string('quote', 500);
      $table->string('name',100);
    });
    
    DB::table('quotes')->insert(array(
      'quote' => 'Everybody is a genius. But if you judge a fish by its ability to climb a tree, it will live its whole life believing that it is stupid',
      'name' => 'Albert Einstein'
    ));
    
    DB::table('quotes')->insert(array(
      'quote' => 'Creativity is intelligence having fun',
      'name' => 'Albert Einstein'
    ));
    
    DB::table('quotes')->insert(array(
      'quote' => 'If a cluttered desk is a sign of a cluttered mind, of what, then, is an empty desk a sign?',
      'name' => 'Albert Einstein'
    ));
    
    DB::table('quotes')->insert(array(
      'quote' => 'Once you stop learning, you start dying',
      'name' => 'Albert Einstein'
    ));
    
    DB::table('quotes')->insert(array(
      'quote' => 'I live in that solitude which is painful in youth, but delicious in the years of maturity',
      'name' => 'Albert Einstein'
    ));
    
    DB::table('quotes')->insert(array(
      'quote' => 'Where there is love, there is no imposition',
      'name' => 'Albert Einstein'
    ));
    
    DB::table('quotes')->insert(array(
      'quote' => 'If I had 60 minutes to solve a problem, I\'d spend 55 minutes defining it, and 5 minutes solving it',
      'name' => 'Albert Einstein'
    ));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
    Schema::drop('quotes');
	}

}