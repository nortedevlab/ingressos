<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Laravel 12 + React + TS</title>
    @viteReactRefresh
    @vite('resources/js/app.tsx')
</head>
<body>
<div id="app"></div>
</body>
</html>
