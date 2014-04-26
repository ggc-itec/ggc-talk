<?php

/*
 * This is the controller for the User model.
 *
 */

class UserController extends BaseController {

  // Create login view
  public function showLogin() {
    return View::make('auth.login');
  }

  // Attempt to login a user
  public function login() {

    $user = array(
      'id' => Input::get('email'),
      'password' => Input::get('password'),
      'confirmed' => 1
    );

    if (Auth::attempt($user, Input::has('remember'))) {
      return Redirect::route('home') -> with(array(
        'alert' => 'You are successfully logged in.',
        'alert-class' => 'alert-success'
      ));
    } else {
      return Redirect::route('login') -> with(array(
        'alert' => 'Your username/password combination was incorrect or you have not confirmed your email address.',
        'alert-class' => 'alert-danger'
      )) -> withInput();
    }
  }

  // Logout a logged in user
  public function logout() {
    Auth::logout();
    return Redirect::route('home') -> with(array(
      'alert' => 'You are successfully logged out.',
      'alert-class' => 'alert-success'
    ));
  }

  // Create register view
  public function showRegister() {
    return View::make('auth.register');
  }

  // Attempt to register a new user
  public function register() {
    $first_name = Input::get('first_name');
    $last_name = Input::get('last_name');
    $email = Input::get('email');
    $password = Input::get('password');
    $confirm_password = Input::get('confirm_password');

    $regex = preg_match('/\b\w*(@ggc.edu)\b/', $email);

    // If the email does not end with a @ggc.edu email address
    if (!$regex) {
      return Redirect::route('register') -> with(array(
        'alert' => 'Not a valid @ggc.edu email address!',
        'alert-class' => 'alert-danger'
      ));
    }

    // Attempt to saved a new user to the database
    if (strcmp($password, $confirm_password) == 0) {
      $hashed_password = Hash::make($password);
      try {
        $user = new User;
        $user -> id = $email;
        $user -> email = $email;
        $user -> first_name = $first_name;
        $user -> last_name = $last_name;
        $user -> password = $hashed_password;
        $user -> role = 'Standard';
        $user -> confirm_token = str_random(100);
        $user -> confirmed = 0;
        $user -> save();

        $data = array('token' => $user -> confirm_token);
        Mail::send('emails.auth.confirm', $data, function($message) use ($user) {
          $message -> to($user -> email, $user -> first_name . ' ' . $user -> last_name) -> subject('Confirm your email address for GGC Talk');
        });

      } catch (\Illuminate\Database\QueryException $e) {
        return Redirect::route('register') -> with(array(
          'alert' => 'Error: Failed to register user in database.',
          'alert-class' => 'alert-danger'
        ));
      }

      // Login the new user
      $user = User::where('id', $email) -> first();
      //Auth::login($user);

      return Redirect::route('home') -> with(array(
        'alert' => 'Welcome! You have successfully created an account. A confirmation email has been sent to ' . $user -> email,
        'alert-class' => 'alert-success'
      ));
    }

    return Redirect::route('register') -> with(array(
      'alert' => 'The attempt to create an account was unsuccessful!',
      'alert-class' => 'alert-danger'
    ));
  }

  public function confirm($token) {
    $user = User::where('confirm_token', $token) -> first();
    $user -> confirmed = 1;
    $user -> save();
    Auth::login($user);
    return Redirect::route('home') -> with(array(
      'alert' => 'Welcome! You have successfully confirmed your email. You have been logged in.',
      'alert-class' => 'alert-success'
    ));

  }

  public function listUsers() {
    $users = User::all() -> reverse();
    return View::make('auth.admin.users', compact('users'));
  }

  public function create() {
    $first_name = Input::get('first_name');
    $last_name = Input::get('last_name');
    $email = Input::get('email');
    $password = Input::get('password');
    $role = Input::get('role');

    $regex = preg_match('/\b\w*(@ggc.edu)\b/', $email);

    // If the email does not end with a @ggc.edu email address
    if (!$regex) {
      return Redirect::route('createUser') -> with(array(
        'alert' => 'Not a valid @ggc.edu email address!',
        'alert-class' => 'alert-danger'
      ));
    }

    $hashed_password = Hash::make($password);

    $user = new User;
    $user -> id = $email;
    $user -> email = $email;
    $user -> first_name = $first_name;
    $user -> last_name = $last_name;
    $user -> password = $hashed_password;
    $user -> role = $role;
    $user -> confirmed = 1;
    $user -> save();

    return Redirect::route('modUsers') -> with(array(
      'alert' => 'Successfully created user',
      'alert-class' => 'alert-success'
    ));
  }

  public function edit(User $user) {
    return View::make('auth.admin.user.edit', compact('user'));
  }

  public function save(User $user) {
    $email = Input::get('email');
    $first_name = Input::get('first_name');
    $last_name = Input::get('last_name');
    $password = Input::get('password');
    $role = Input::get('role');

    $user -> id = $email;
    $user -> email = $email;
    $user -> first_name = $first_name;
    $user -> last_name = $last_name;

    if (!empty($password)) {
      $hashed_pw = Hash::make($password);
      $user -> password = $hashed_pw;
    }

    $user -> role = $role;
    $user -> save();

    return Redirect::route('modUsers') -> with(array(
      'alert' => 'Successfully edited user',
      'alert-class' => 'alert-success'
    ));
  }

  public function showDelete(User $user) {
    return View::make('auth.admin.user.delete', compact('user'));
  }

  public function delete(User $user) {

    try {
      $userId = $user -> id;
      $user -> delete();

    } catch(\Illuminate\Database\QueryException $e) {
      return Redirect::route('modUsers') -> with(array(
        'alert' => 'Error: Failed to delete user.',
        'alert-class' => 'alert-danger'
      ));
    }

    return Redirect::route('modUsers') -> with(array(
      'alert' => "You have successfully deleted user $userId.",
      'alert-class' => 'alert-success'
    ));
  }

  public function showAccount() {
    $user = Auth::user();
    return View::make('auth.account', compact('user'));
  }

  public function saveAccount() {
    $user = Auth::user();

    $first_name = Input::get('first_name');
    $last_name = Input::get('last_name');
    $password = Input::get('password');
    $confirm_password = Input::get('confirm_password');

    if (!empty($password)) {
      if (strcmp($password, $confirm_password) == 0) {
        $hashed_pw = Hash::make($password);
        $user -> password = $hashed_pw;
      } else {
        return Redirect::route('account') -> with(array(
          'alert' => 'Error: Passwords do not match!',
          'alert-class' => 'alert-danger'
        ));
      }
    }

    $user -> first_name = $first_name;
    $user -> last_name = $last_name;

    $user -> save();

    return Redirect::route('home') -> with(array(
      'alert' => 'You have successfully updated your account information.',
      'alert-class' => 'alert-success'
    ));
  }

}
