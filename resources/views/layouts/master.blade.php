<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
        <title>Laravel My To-do list</title>
      
        <script src="{{ asset('js/app.js') }}" defer></script>
      
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://kit.fontawesome.com/8500f75e5b.js" crossorigin="anonymous"></script>
        <link href="{{ URL::to('css/styles.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('partials.navbar')
        @yield('content')
    </body>
</html>