<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @if (config('app.env') == 'prod')
        <link rel="stylesheet" href="{{ asset('../kindersoft/build/assets/app.css') }}">
    @else
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow dark:bg-gray-800">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    <x-footer />
    @if (config('app.env') == 'prod')
        <script src="{{ asset('../kindersoft/build/assets/app.js') }}"></script>
    @else
        @livewireScripts
    @endif
    <script src="{{ asset('/build/tinymce/js/tinymce/tinymce.js') }}"></script>
</body>

</html>
