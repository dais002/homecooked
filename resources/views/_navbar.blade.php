<ul class="lg:flex items-center">
  <li class="mr-2">
    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded" href="{{ route('stores.index') }}">Stores</a>
  </li>
  <li class="mr-2">
    <form action="/logout" method="POST">
      @csrf
      <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-2 border border-gray-400 rounded shadow">
        Logout
      </button>
    </form>
  </li>
  <li class="">
    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-700 rounded" href="{{ route('cart.index') }}">Cart ({{ auth()->user()->cartTotal }})</a>
  </li>
</ul>