<!DOCTYPE html>
<html>
  <head>
    <title>ggc-talk</title>
    <link rel="shortcut icon" href="{{ asset('img/ggctalk-small.png'); }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css'); }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-2.0.3.min.js'); }}"></script>
    <script src="{{ asset('js/bootstrap.min.js'); }}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <!-- twitter bootstrap sample code  http://getbootstrap.com/examples/starter-template/# -->
  <body>
    <div class="container">
<<<<<<< Updated upstream
      <div class="navbar navbar-ggc navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">GGC Talk</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active">
                <a href="./">Home</a>
              </li>
              <li>
                <a href="{{ URL::to('location/showlist') }}">Maps</a>
              </li>
              <li>
                <a href="{{ URL::to('flickr') }}">Pics</a>
              </li>
              <li>
                <a href="{{ URL::to('imgrr') }}">Imgrr</a>
              </li>
              <li>
                <a href="#">TechTalks</a>
              </li>
              <li>
                <a href="{{ URL::to('housing') }}">Housing</a>
              </li>
              <li>
                <a href="#about">About</a>
              </li>
              <li class="dropbdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Developers </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="http://168.28.21.90:1080/" target="_blank">Redmine</a>
                  </li>
                  <li>
                    <a href="https://github.com/ggc-itec/ggc-talk" target="_blank">Github</a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              @if(Auth::guest())
              <li class="">
                {{ HTML::linkRoute('register', 'Register') }}
              </li>
              <li class="">
                {{ HTML::linkRoute('login', 'Login') }}
              </li>
              @elseif(Auth::check())
              @if(Auth::user() -> role == 'Admin')
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="">
                    {{ HTML::linkRoute('createUser', 'Create User') }}
                  </li>
                  <li class="">
                    {{ HTML::linkRoute('modUsers', 'Moderate Users') }}
                  </li>
                </ul>
              </li>
              @endif
              <li class="">
                {{ HTML::linkRoute('logout', 'Logout (' . Auth::user() -> first_name . ')') }}
              </li>
              @endif
            </ul>
          </div>
=======
    <div class="navbar navbar-ggc navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">GGC Talk</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="./">Home</a></li>
            <li><a href="{{ URL::to('location/showlist') }}">Maps</a></li>
            <li><a href="{{ URL::to('flickr') }}">Pics</a></li>
            <li><a href="{{ URL::to('imgrr') }}">Imgrr</a></li>
            <li><a href="#">TechTalks</a></li>
            <li><a href="{{ URL::to('housing') }}">Housing</a></li>
            <li><a href="#about">About</a></li>
            <li class="dropbdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 Developers
              </a>
              <ul class="dropdown-menu">
                <li><a href="http://168.28.21.90:1080/" target="_blank">Redmine</a></li>
                <li><a href="https://github.com/ggc-itec/ggc-talk" target="_blank">Github</a></li>              
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::guest())
              <li class="">{{ HTML::linkRoute('register', 'Register') }}</li>
              <li class="">{{ HTML::linkRoute('login', 'Login') }}</li>
            @elseif(Auth::check())
              <li class="">{{ HTML::linkRoute('logout', 'Logout (' . Auth::user() -> first_name . ')') }}</li>
            @endif
          </ul>
>>>>>>> Stashed changes
        </div>
      </div>

      <div style="overflow: auto;"class="jumbotron">
        @if(Session::has('alert'))
        <div class="alert alert-dismissable {{ Session::get('alert-class') }}">
          <button type="button" class="close" data-dismiss="alert">
            ×
          </button>
          {{ Session::get('alert') }}
        </div>
        @endif

        @yield('content')

      </div>

    </div>
  </body>

</html>
