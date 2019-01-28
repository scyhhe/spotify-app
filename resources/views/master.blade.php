<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div class="hero is-success is-bold is-fullheight">
            <div id="app">
            {{-- SPA loads here --}}
            </div>
        </div>
    </body>
</html>
