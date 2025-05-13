<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>@yield('title')</title>
    <!-- CSS linked -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- JavaScript Library -->
    <script src="{{asset('js/app.js')}}"></script>

    <title>Document</title>
</head>

<body>
    @yield('main')
</body>

</html>