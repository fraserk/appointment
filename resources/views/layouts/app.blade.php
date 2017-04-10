<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
          <div class="off-canvas position-left reveal-for-medium" id="offCanvas" data-off-canvas>
            <div class="sidebarHeader">
              Appointy
            </div>
            {{--Off Canvas Menu  --}}
            <ul class="menu vertical">
              <li><a href="#">Dashboard</a></li>
              <li><a href="{{ route('services') }}">Services</a></li>
              <li><a href="#">Online Bookings</a></li>
              <li><a href="#">Clients</a></li>
              <li><a href="#">Staff</a></li>
              <li><a href="{{ route('settings') }}">Settings</a></li>
              <li><a href="{{ route('booking',auth()->user()) }}">Booking Page</a></li>
            </ul>
          </div>
          <div class="off-canvas-content" data-off-canvas-content>
            <div class="top-bar">
              <div class="top-bar-left">

              </div>
              <div class="top-bar-right">
                <ul class="menu">
                  @if(Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
              @else
                <li><a href="#">{{auth()->user()->email}}</a></li>
                <li>
                <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
              </li>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              @endif
                </ul>
              </div>

            </div>

            @yield('content')

          </div>
      </div>


    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>

    <script>
       $(document).foundation();
    </script>
</body>
</html>
