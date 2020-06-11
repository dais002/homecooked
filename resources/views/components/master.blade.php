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
      <header class="container mx-auto max-w-screen-lg">
        <div class="flex justify-between items-center px-8">

          @if (auth()->check())
          @include ('_search')
          @endif

          <div class="flex items-center">
            <a href="{{ route('stores.index') }}">
              <img src="/images/logo.svg" alt="logo" class="h-24 rounded-lg">
            </a>
            <span class="font-bold text-lg">getHomeCooked</span>
          </div>

          @guest
          <a class="h-12 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="{{ route('login') }}">Login</a>
          @endguest


          @if (auth()->check())
          @include ('_navbar')
          @endif

        </div>
      </header>
    </section>
    {{ $slot }}
  </div>

  <!-- <script src="http://unpkg.com/turbolinks"></script> -->

</body>

</html>