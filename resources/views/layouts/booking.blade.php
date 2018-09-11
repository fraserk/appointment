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
<body class="font-sans bg-white">
    <div id="app">
        <header class="">
            <div class="container container-lg mx-auto">
                <div class="flex items-center flex-wrap  p-4 ">
                    <div class="w-full text-2xl text-grey-darkest font-semibold rounded ">
                       @yield('ProfileHeader')
                    </div>                                        
                </div>
            </div>
        </header>
        <section>
            <div class="container container-lg mx-auto">
                <div class="flex flex-wrap">
                    <div class="w-full m-4 p-4">
                        @yield('content')
                        
                    </div>
                </div>
    
            </div>

        </section>
      
      </div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>

</body>
</html>
