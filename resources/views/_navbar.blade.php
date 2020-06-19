<nav class="tracking-wider flex flex-col items-center justify-between sm:text-center lg:flex-row h-48 sm:h-40 bg-nav lg:h-24 py-2 px-10 text-nav text-sm md:text-base lg:text-lg">
  <div class="flex items-center flex-col lg:flex-row">
    <div class="flex-none">
      <a href="{{ route('stores.index') }}">
        <img class="w-48 h-24 object-fill mr-6" src="/images/logo.svg" alt="logo">
      </a>
    </div>
    <div class="sm:hidden lg:flex">
      <h2 class="sm:text-md">Welcome, {{ auth()->user()->name }}!</h2>
    </div>
  </div>
  <div class="flex items-center">

    <a class="mr-6 border-b-4 border-solid hover:text-white hover:border-blue-700" href="{{ route('subscribe.index') }}" data-turbolinks="false">SHARE YOUR CREATION</a>

    <form action="/logout" method="POST">
      @csrf
      <button class="mr-6 tracking-widest border-b-4 border-transparent hover:border-blue-700 hover:border-double">
        LOGOUT
      </button>
    </form>

    <a class="px-4 py-2 bg-btn-green rounded-md hover:bg-blue-700" href="{{ route('cart.index') }}">SHOPPING CART ({{ auth()->user()->cart->cartTotal }})</a>

  </div>
</nav>