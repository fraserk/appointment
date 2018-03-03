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
        <header class="bg-white border-b">
            <div class="container container-lg mx-auto">
                <div class="flex items-center flex-wrap  h-48">
                    <div class="w-full text-2xl text-grey-darkest font-semibold ">
                        <img src="/images/tf.png" alt="">
                        <div class=" block text-lg"> Company Name</div>
                        <p class="text-xs text-grey-dark leading-normal">
                            433 Remsen Ave
                            Brooklyn NY 11212 <br />
                            tel:237-834-0666 - info@company.com
                        </p>
                        
                    </div>                                        
                </div>
            </div>
        </header>
        
            @yield('content')
      
      </div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>

</body>
</html>
