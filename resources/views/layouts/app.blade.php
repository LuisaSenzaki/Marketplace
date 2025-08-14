<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Minha Página')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/header-style.css', 'resources/css/desktop.css'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    @include('header')

    <main>
        @yield('content')
    </main>
    @stack('scripts')
</body>
</html>