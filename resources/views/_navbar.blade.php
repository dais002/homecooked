<nav class="tracking-wider flex flex-col items-center justify-between sm:text-center lg:flex-row h-48 sm:h-40 bg-darkblue lg:h-24 py-2 px-10 text-nav text-sm md:text-base lg:text-lg">
  <div class="flex items-center flex-col lg:flex-row">
    <div class="flex-none">
      <a href="{{ route('stores.index') }}">
        <img class="w-48 h-24 object-fill mr-6" src="/images/logo.svg" alt="logo">
      </a>
    </div>
    <div class="sm:hidden lg:flex font-oxygen">
      <span class="text-md md:text-3xl">Welcome, {{ ucfirst(auth()->user()->name) }}!</span>
    </div>

  </div>
  <div class="flex items-center mb-2 md:mb-0">
    @if (auth()->user()->subscriptions->isEmpty())
    <a class="mr-6 border-b-4 border-solid hover:text-white hover:border-nav" href="{{ route('subscribe.index') }}" data-turbolinks="false">HOME-CHEF SIGN-UP</a>
    @elseif (auth()->user()->stores->count() > 0)
    <a class="mr-6 border-b-4 border-solid hover:text-white hover:border-nav" href="{{ route('stores.show', auth()->user()->stores->first()) }}" data-turbolinks="false">MANAGE YOUR STORE</a>
    @else
    <a class="mr-6 border-b-4 border-solid hover:text-white hover:border-nav" href="{{ route('stores.create') }}" data-turbolinks="false">CREATE YOUR STORE</a>
    @endif

    <form action="/logout" method="POST">
      @csrf
      <button class="mr-6 tracking-widest border-b-4 border-transparent hover:border-nav hover:border-double">
        LOGOUT
      </button>
    </form>

    <a class="flex items-center px-4 py-2 bg-btn-green rounded-md hover:bg-blue-700" href="{{ route('cart.index') }}">
      <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.91699 15.5002C4.90866 15.5002 4.09283 16.3252 4.09283 17.3335C4.09283 18.3418 4.90866 19.1668 5.91699 19.1668C6.92533 19.1668 7.75033 18.3418 7.75033 17.3335C7.75033 16.3252 6.92533 15.5002 5.91699 15.5002ZM0.416992 1.75016C0.416992 2.25433 0.829492 2.66683 1.33366 2.66683H2.25033L5.55033 9.62433L4.31283 11.861C3.64366 13.0893 4.52366 14.5835 5.91699 14.5835H16.0003C16.5045 14.5835 16.917 14.171 16.917 13.6668C16.917 13.1627 16.5045 12.7502 16.0003 12.7502H5.91699L6.92533 10.9168H13.7545C14.442 10.9168 15.047 10.541 15.3587 9.97266L18.6403 4.0235C18.9795 3.4185 18.5395 2.66683 17.8428 2.66683H4.27616L3.66199 1.356C3.51533 1.03516 3.18533 0.833496 2.83699 0.833496H1.33366C0.829492 0.833496 0.416992 1.246 0.416992 1.75016ZM15.0837 15.5002C14.0753 15.5002 13.2595 16.3252 13.2595 17.3335C13.2595 18.3418 14.0753 19.1668 15.0837 19.1668C16.092 19.1668 16.917 18.3418 16.917 17.3335C16.917 16.3252 16.092 15.5002 15.0837 15.5002Z" fill="white" />
      </svg>
      SHOPPING CART ({{ auth()->user()->cart->cartTotal }})</a>

  </div>
</nav>