<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>
    <body>
        <div id="app">
                <app-home></app-home>

        </div>
        <script src="{{ asset('js/app.js') }}"></script>

       
    </body>
</html>