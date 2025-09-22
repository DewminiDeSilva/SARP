<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title ?? 'Logframe' }}</title>

  {{-- Keep Vite if you need Tailwind/app styles. Safe to remove if not used. --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    /* Remove all default spacing to make the table truly full page */
    html,body{height:100%;}
    body{margin:0;background:#fff;}
    main{min-height:100vh;}
  </style>

  @stack('styles')
</head>
<body>
  <main>
    @yield('content')
  </main>
  @stack('scripts')
</body>
</html>
