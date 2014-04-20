<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Confirm your email</h2>

    <div>
      To confirm your email address, go to this link: <a href="{{ URL::to('user/confirm', array($token)) }}">{{ URL::to('user/confirm', array($token)) }}</a>.
    </div>
  </body>
</html>