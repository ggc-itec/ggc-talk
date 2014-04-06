<?php

class UsersController extends BaseController {

  public function showLogin() {
    return View::make('auth.login');
  }

  public function login() {
    $user = array('id' => Input::get('email'), 'password' => Input::get('password'));

    if (Auth::attempt($user, Input::has('remember'))) {
      return Redirect::route('home') -> with(array('alert' => 'You are successfully logged in.', 'alert-class' => 'alert-success'));
    } else {
      return Redirect::route('login') -> with(array('alert' => 'Your username/password combination was incorrect.', 'alert-class' => 'alert-danger')) -> withInput();
    }
  }

  public function logout() {
    Auth::logout();
    return Redirect::route('home') -> with(array('alert' => 'You are successfully logged out.', 'alert-class' => 'alert-success'));
  }

  public function showRegister() {
    return View::make('auth.register');
  }

  public function register() {
    $first_name = Input::get('first_name');
    $last_name = Input::get('last_name');
    $email = Input::get('email');
    $password = Input::get('password');
    $confirm_password = Input::get('confirm_password');
    
    
    $regex = preg_match('/\b\w*(@ggc.edu)\b/', $email);

    if (!$regex) {
      return Redirect::route('register') -> with(array('alert' => 'Not a valid @ggc.edu email address!', 'alert-class' => 'alert-danger'));
    }

    if (strcmp($password, $confirm_password) == 0) {
      $hashed_password = Hash::make($password);
      try {
        $user = new User;
        $user -> id = $email;
        $user -> first_name = $first_name;
        $user -> last_name = $last_name;
        $user -> password = $hashed_password;
        $user -> save();
      } catch (\Illuminate\Database\QueryException $e) {
        return Redirect::route('register') -> with(array('alert' => 'Error: Failed to register user in database.', 'alert-class' => 'alert-danger'));
      }

      $user = User::where('id', $email) -> first();
      Auth::login($user);

      return Redirect::route('home') -> with(array('alert' => 'Welcome! You have successfully created an account, and have been logged in.', 'alert-class' => 'alert-success'));
    }

    return Redirect::route('register') -> with(array('alert' => 'The attempt to create an account was unsuccessful!', 'alert-class' => 'alert-danger'));
  }

}
