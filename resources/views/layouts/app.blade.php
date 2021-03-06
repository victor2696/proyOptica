<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lavina ERP') }}</title>

    <!-- Styles -->
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('css/appstyle.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header col-lg-12">
                <div class="col-lg-10">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" style="color: #3097D1;" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    </div>
                    <div class="col-lg-2">
                    <a href="{{ route('change_lang', ['lang' => 'es']) }}"><img alt='MX' src='images/mx-icon.png'></a>
                    <a href="{{ route('change_lang', ['lang' => 'en']) }}"><img alt='MX' src='images/usa-icon.png'></a>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        @if(Auth::user())
                            @if(Auth::user()->role_id == 1)
                                <li><a href="{{ url('/admin') }}">Admin</a></li>
                            @endif
                            @if(Auth::user()->role_id == 2)
                                <li><a href="{{ url('/manager') }}">Manager</a></li>
                            @endif
                            @if(Auth::user()->role_id == 3)
                                <li><a href="{{ url('/bowner') }}">Business Owner</a></li>
                            @endif
                            @if(Auth::user()->role_id == 4)
                                <li><a href="{{ url('/orders') }}">Order</a></li>
                            @endif
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            {{-- <li><a href="{{ url('/login') }}">Login</a></li> --}}
                            {{-- <li><a href="{{ url('/register') }}">Register</a></li> --}}
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ url('js/app.js') }}"></script>
</body>
</html>
