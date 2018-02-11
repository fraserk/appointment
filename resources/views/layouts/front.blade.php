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
    <link href="/css/main.css" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="font-sans bg-teal-lightest">
    <div id="app" class="">
      <div class="bg-teal-darker ">
          <div class="container mx-auto container-lg">
            <div class="flex py-4 justify-between px-4 md:px-0 items-center">
              <div class="w-1/2 text-lg font-serif text-white font-medium">
                    <div class="font-">
                      appointy
                    </div>
              </div>
              <div class="w-1/2 text-right text-grey-lighter font-normal text-sm invisible md:visible ">
                <span class="mr-2">kimfraser@gmail.com</span>
                <span class="mr-2"><a class="no-underline text-grey-lighter" href="{{ route('booking',auth()->user()) }}">Booking Page</a> </span>
                <span class="mr-2"><a class="no-underline text-grey-lighter" href="{{ route('settings') }}">Settings</a> </span>
                 <a class="no-underline text-grey-lighter"href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </div>
          </div>
      </div>

      <div class="container container-lg mx-auto mt-4">
           @yield('content')
      </div>
      </div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @yield('scripts')
</body>
</html>
