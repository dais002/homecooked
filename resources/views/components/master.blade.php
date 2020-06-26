<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Get Home Cooked!') }}</title>

  <!-- Scripts -->
  <script src="http://unpkg.com/turbolinks" defer></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://js.stripe.com/v3/" defer></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Pusher -->
  <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
  <script>
    Pusher.logToConsole = true;

    let pusher = new Pusher('{{env("PUSHER_APP_KEY")}}', {
      cluster: 'us3'
    });

    let channel = pusher.subscribe('my-channel');
    channel.bind('add-to-cart', (data) => {
      // fire off modal message
      document.getElementById('add-to-cart-modal').click();
    });

    channel.bind('order-complete', (data) => {
      alert(data.message);
      window.location.replace('http://localhost:8000/stores');
    })
  </script>

</head>

<body class="font-body">
  <div id="app" class="flex flex-col min-h-screen">

    <header class="container mx-auto max-w-screen-xlg">
      @if (auth()->check())
      @include ('_navbar')
      @endif

    </header>
    {{ $slot }}


    <footer class="container mx-auto max-w-screen-xlg bg-nav">
      @if (auth()->check())
      <div class="flex justify-center items-center">
        <a href="{{ route('stores.index') }}">
          <img class="w-48 h-24 object-fill my-4" src="/images/logo.svg" alt="logo">
        </a>
      </div>
      @endif
    </footer>
  </div>

</body>

</html>