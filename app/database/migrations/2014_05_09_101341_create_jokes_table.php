<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJokesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	 Schema::create('jokes', function($table)
	 {
      $table->increments('id');
      $table->string('joke', 500);
      $table->string('laughtrack', 50);
	  $table ->timestamps();
     });
    
    DB::table('jokes')->insert(array(
      'joke' => 'So two guys walk into a bar... Youd think one of them would have seen it coming.',
      'laughtrack' => 'Ohohohoho!'
    ));
    
    DB::table('jokes')->insert(array(
      'joke' => 'What did the mother Buffalo say when her boy left for college? BYE-SON!',
      'laughtrack' => '*groooaaan*'
    ));
    
    DB::table('jokes')->insert(array(
      'joke' => 'At first Bob didnt like his new haircut, but it started to grow on him.',
      'laughtrack' => 'Ahahahaha!'
    ));
    
    DB::table('jokes')->insert(array(
      'joke' => 'Why shouldnt you write with a broken pencil? BECAUSE ITS POINTLESS',
      'laughtrack' => 'Bwahahahaha!'
    ));
    
    DB::table('jokes')->insert(array(
      'joke' => 'They say that maturity is learning how to grow up, go to college, get a job, and then join in on this great mysterious adventure known as adulthood. Well, to that I say *PPTTTHHHH*',
      'laughtrack' => '*snrk* Heh.'
    ));
    
    DB::table('jokes')->insert(array(
      'joke' => 'A baby seal walks into a club...',
      'laughtrack' => '...Huh? Oh wait, I get it!'
    ));
    
    DB::table('jokes')->insert(array(
      'joke' => 'Two atoms are walking down the street together. One turns and says, "Hey, you just stole an electron from me!" "Are you sure?" asks the second atom. To which the first atom replies, Yeah, I\'m positive!',
       'laughtrack' => 'Heheheh. Heheh.'
    ));
    
    DB::table('jokes')->insert(array(
      'joke' => 'A neutron walks into a bar and asks "how much for a beer?" The bartender says, "for you? no charge."',
      'laughtrack' => 'Pffft, hahaha!'
    ));
    
    DB::table('jokes')->insert(array(
      'joke' => 'Theres two fish in a tank. One turns to the other and says "You man the guns, Ill drive"',
      'laughtrack' => 'GWAHAHAHAHAHAHA!!'
    ));
    }
    
	/**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::drop('jokes');
    }
	
}
