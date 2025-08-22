<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Marketplace Xlab') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=1">
        <link rel="alternate icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=1">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/desktop.css', 'resources/css/header-style.css'])
    </head>
    <body style="background: #F8F8F8;">
        <div style="background: #F8F8F8;" class="flex flex-col items-center justify-center min-h-screen py-4 sm:pt-0">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div style="background: #e2e2e2; padding: 20px; border-radius: 10px; width: 100%; max-width: 400px; margin-top: 20px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
