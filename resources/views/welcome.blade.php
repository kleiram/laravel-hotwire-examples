<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Hotwire Examples</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="min-w-full min-h-full flex items-center justify-center">
        <h1 class="text-8xl text-transparent font-extrabold bg-clip-text bg-gradient-to-r from-purple-700 to-pink-700">
            Hello, world!
        </h1>
    </body>
</html>
