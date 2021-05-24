<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1" />
    <meta name="csrf-token"
        content="{{ csrf_token() }}" />

    <!-- Theme Meta -->
    <meta name="theme-color"
        content="#000000" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" />

    <!-- Theme Styles -->
    <link rel="stylesheet"
        href="{{ asset('theme/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" />

    <!-- Styles -->
    <link rel="stylesheet"
        href="{{ mix('css/app.css') }}" />

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"
        defer></script>
</head>

<body class="antialiased text-gray-900">
    <x-frontend.navbar />
    <main>
        {{ $slot }}
    </main>
    <x-frontend.footer />
    @stack('script')
</body>

</html>
