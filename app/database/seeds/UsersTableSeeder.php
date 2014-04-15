<?php

class UsersTableSeeder extends Seeder {

  public function run()
  {
    DB::table('users')->delete();
    
    User::create(array(
      'id' => 'admin@admin.com',
      'password' => Hash::make('admin'),
      'first_name' => 'FirstName',
      'last_name' => 'LastName',
      'role' => 'Admin'
    ));

  }

}
