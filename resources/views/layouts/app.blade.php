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
                    <div class="">
                      appointy
                    </div>
              </div>
              <div class="w-1/2 text-right text-grey-lighter font-normal text-sm invisible md:visible ">
                <span class="mr-2">kimfraser@gmail.com</span>
                <span class="mr-2"><a class="no-underline text-grey-lighter" href="{{ route('schedule.create') }}">Settings</a> </span>
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
      <div class="bg-white border-b text-sm">
        <div class="container container-lg mx-auto flex px-4 md:px-0">
            <div class="flex -mb-px mr-4">
              <a href="/home" class=" flex no-underline border-b border-blue-dark py-4">Dashboard</a>
            </div>
            <div class="flex -mb-px mr-4">
              <a href="{{ route('services') }}" class=" flex no-underline border-transparent border-b hover:border-grey-dark py-4 text-grey-darker">Services</a>
            </div>
            <div class="flex -mb-px mr-4">
              <a href="#" class=" flex no-underline border-transparent border-b hover:border-grey-dark py-4 text-grey-darker">Bookings</a>
            </div>
            <div class="flex -mb-px mr-4">
              <a href="#" class=" flex no-underline border-transparent border-b hover:border-grey-dark py-4 text-grey-darker">Clients</a>
            </div>
            @if(Auth()->check())
            <div class="flex -mb-px mr-4">
              <a href="{{route('provider.index',auth()->user()->company_id)}}" class=" flex no-underline border-transparent border-b hover:border-grey-dark py-4 text-grey-darker">Staff</a>
            </div>
            @endif
        </div>
      </div>
      <div class="container container-lg mx-auto mt-4">
           @yield('content')
      </div>
      </div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>

</body>
</html>
