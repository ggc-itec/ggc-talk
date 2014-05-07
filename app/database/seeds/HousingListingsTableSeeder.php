<?php

class HousingListingsTableSeeder extends Seeder {
	
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		
		Housing_listing::truncate();
		
		Housing_listing::create(array(
			'author' => 'jcampbe6@ggc.edu',
			'title' => 'roommate needed',
			'body' => 'my roommate move out, and now I have an empty room',
			'rent' => '250.00',
			'distance' => 10,
			'type' => 'apartment',
			'bedrooms' => 2,
			'city' => 'Lawrenceville'
		));
		
		Housing_listing::create(array(
			'author' => 'jcampbe6@ggc.edu',
			'title' => 'awesome condo',
			'body' => 'need someone to split the rent with',
			'rent' => '350.00',
			'distance' => 5,
			'type' => 'condo',
			'bedrooms' => 3,
			'city' => 'Lawrenceville'
		));
		
		Housing_listing::create(array(
			'author' => 'rsuave@ggc.edu',
			'title' => 'clean 2 bd apartment for the summer only',
			'body' => 'going out of town for the summer and need someone to take over rent',
			'rent' => '450.00',
			'distance' => 15,
			'type' => 'apartment',
			'bedrooms' => 2,
			'city' => 'Norcross'
		));
		
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}
