<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Get Home Cooked!') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div id="app">
    <section class="px-8 py-4 mb-6">
      <header class="container mx-auto">
        <div class="flex justify-between">
          @if (auth()->check())
          <div class="">
            @include ('_navbar')
          </div>
          <img src="/images/main-logo.svg" alt="logo" class="h-24 rounded-lg">
          <div class="">
            @include ('_search')
          </div>
          @endif
        </div>
      </header>
    </section>
    {{ $slot }}
  </div>

  <!-- <script src="http://unpkg.com/turbolinks"></script> -->

</body>

</html>