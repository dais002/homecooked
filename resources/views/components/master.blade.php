<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Get Home Cooked!') }}</title>

  <!-- Scripts -->
  <script src="https://js.stripe.com/v3/"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="http://unpkg.com/turbolinks" defer></script>
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="font-body">
  <div id="app">

    <header class="container mx-auto max-w-screen-xlg">
      @if (auth()->check())
      @include ('_navbar')
      @endif
    </header>
    {{ $slot }}
  </div>


  @yield('js')

</body>

</html>