<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="{{ csrf_token() }}" name="csrf-token">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link href="https://fonts.bunny.net" rel="preconnect">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @if (config('app.env') == 'prod')
    <link href="{{ asset('../kindersoft/build/assets/app.css') }}" rel="stylesheet">
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
  <x-footer />

  @stack('modals')

  @if (config('app.env') == 'prod')
    <script src="{{ asset('../kindersoft/build/assets/app.js') }}"></script>
  @else
    @livewireScripts
  @endif
  <script src="{{ asset('/build/tinymce/js/tinymce/tinymce.js') }}"></script>
</body>

</html>
