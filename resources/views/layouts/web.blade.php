<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jay Cee Publications') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="{{ asset('jquery/jquery-3.7.1.slim.min.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/owl.css', 'resources/js/owl.js'])
    @yield('top-scripts')

    {{-- @production --}}
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5MLP6N5FZR"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-5MLP6N5FZR');
    </script>
    {{-- @endproduction --}}

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('web.partials.header')

        @yield('main')

    </div>
    @include('web.partials.footer')
    @yield('bottom-scripts')
</body>

</html>
