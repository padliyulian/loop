<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('layouts.public.navbar')

        <div id="app" class="container my-4">
            @yield('content')
        </div>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
