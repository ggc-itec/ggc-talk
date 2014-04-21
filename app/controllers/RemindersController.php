<?php

class RemindersController extends Controller {

  /**
   * Display the password reminder view.
   *
   * @return Response
   */
  public function getRemind() {
    return View::make('auth.password.remind');
  }

  /**
   * Handle a POST request to remind a user of their password.
   *
   * @return Response
   */
  public function postRemind() {
    $response = Password::remind(Input::only('email'), function($message) {
      $message -> subject('Password Reminder');
    });

    switch ($response) {
      case Password::INVALID_USER :
        return Redirect::back() -> with(array(
          'alert' => 'Error: Invalid User',
          'alert-class' => 'alert-warning'
        ));

      case Password::REMINDER_SENT :
        return Redirect::back() -> with(array(
          'alert' => 'A reminder has been sent!',
          'alert-class' => 'alert-info'
        ));
    }
  }

  /**
   * Display the password reset view for the given token.
   *
   * @param  string  $token
   * @return Response
   */
  public function getReset($token = null) {
    if (is_null($token))
      App::abort(404);

    return View::make('auth.password.reset') -> with('token', $token);
  }

  /**
   * Handle a POST request to reset a user's password.
   *
   * @return Response
   */
  public function postReset() {
    $credentials = Input::only('email', 'password', 'password_confirmation', 'token');
    $email = Input::get('email');
    
    $response = Password::reset($credentials, function($user, $password) {
      $user -> password = Hash::make($password);
      $user -> save();
    });

    switch ($response) {
      case Password::INVALID_PASSWORD :
        return Redirect::back() -> with(array(
          'alert' => 'Invalid password!',
          'alert-class' => 'alert-warning'
        ));
      case Password::INVALID_TOKEN :
        return Redirect::back() -> with(array(
          'alert' => 'Invalid token!',
          'alert-class' => 'alert-warning'
        ));
      case Password::INVALID_USER :
        return Redirect::back() -> with(array(
          'alert' => 'Invalid user!',
          'alert-class' => 'alert-warning'
        ));
      case Password::PASSWORD_RESET :
        $user = User::where('id', $email) -> first();
        Auth::login($user);
        return Redirect::route('home') -> with(array(
          'alert' => 'Your password has been reset!',
          'alert-class' => 'alert-info'
        ));
    }
  }

}
