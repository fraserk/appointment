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
    <div id="app">
        <header class="bg-white">
            <div class="container container-lg mx-auto">
                <div class="flex items-center flex-wrap  h-32 p-4">
                    <div class="w-full text-2xl text-grey-darkest font-semibold ">
                       @yield('ProfileHeader')
                    </div>                                        
                </div>
            </div>
        </header>
        <section class="bg-blue-darkest mb-4">
        <div class="container container-lg mx-auto ">
            <div class="flex flex-wrap">
                <div class="w-full  p-4">
                    <span class="text-4xl text-grey-lightest font-thin">Book an Appointment</span>
                </div>
            </div>
        </div>
    </section>
        <div class="container container-lg mx-auto h-full">
            <div class="flex flex-wrap md:-mx-2">
                <div class=" w-full md:w-1/5 md:px-2 mb-4  md:mb-0 bg-white md:h-screen p-2 -mt-4 p-2 ">
                    <p class="text-lg text-grey-darker mb-4 mt-4 font-semibold px-4">About us</p>
                    <p class="text-sm leading-normal px-4">Want a totally new look? This service includes a 15 minute consultation to find out what you want and what can work with your hair type.</p>

                </div>
                <div class="flex-1 px-2">
                    @yield('content')
                    
                </div>
            </div>

        </div>
      
      </div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>

</body>
</html>
