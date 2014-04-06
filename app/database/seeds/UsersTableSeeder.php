<?php

class UsersTableSeeder extends Seeder {

  public function run()
  {
    DB::table('users')->delete();
    
    User::create(array(
      'id' => 'test@test.com',
      'password' => Hash::make('password'),
      'first_name' => 'First',
      'last_name' => 'Last'
    ));

  }

}
