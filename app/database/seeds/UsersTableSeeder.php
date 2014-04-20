<?php

class UsersTableSeeder extends Seeder {

  public function run() {
    $user = new User;
    $user -> id = 'talkggc@gmail.com';
    $user -> email = 'talkggc@gmail.com';
    $user -> password = Hash::make('password');
    $user -> first_name = 'FirstName';
    $user -> last_name = 'LastName';
    $user -> role = 'Admin';
    $user -> save();

  }

}
