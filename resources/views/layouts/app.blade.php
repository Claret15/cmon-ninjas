<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <!-- CSRF Token --> --}}
<meta name="csrf-token" content="{{ csrf_token() }}">    <title>{{config('app.name', 'PYRA')}}</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    @yield('head')
</head>
<body>
    <main> 
        {{-- <div id="example"></div> <!-- React hook --> --}}
        @include('inc.navbar')
        @yield('content')
    </main>
</body>
</html>
