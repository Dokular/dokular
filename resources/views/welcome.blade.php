<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dokular - vehicle licence, road worthiness, and insurance renewal</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="app">
            <App></App>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
