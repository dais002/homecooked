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
  <script src="https://js.stripe.com/v3/"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

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
          <a class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2" href="{{ route('login') }}">Login</a>
          @endguest


          @if (auth()->check())
          @include ('_navbar')
          @endif

        </div>
        <hr>
      </header>
      @if (auth()->check())
      <div class="mx-auto text-center mt-4 border border-black bg-gray-300 w-1/2">
        <h1>Logged in as '{{ auth()->user()->name }}'</h1>
        @if (auth()->user()->roles->count() === 0)
        <h3>No Authorization privileges.</h3>
        @else
        <h3>Authorization Privileges:<br>
          @foreach (auth()->user()->roles as $role)
          {{ $role->label }}<br>
          @endforeach
        </h3>
        @endif
      </div>
      @endif
    </section>
    {{ $slot }}
  </div>

  <script src="http://unpkg.com/turbolinks"></script>

  @yield('js')

</body>

</html>