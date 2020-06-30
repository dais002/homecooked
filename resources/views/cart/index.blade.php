<x-app>
  <div class="flex justify-center">
    <h1 class="text-center mt-12 mb-8 border-b-8 border-nav tracking-wider font-bold">SHOPPING CART</h1>
  </div>

  <div class="container w-3/4 max-w-5xl mx-auto pb-2">
    @forelse ($items as $item)
    <div class="flex flex-col lg:flex-row justify-between bg-white mb-6 rounded-all p-6 shadow-lg">

      <div class="flex flex-col md:flex-row w-full">
        <div class="flex-none">
          <img src="{{ $item->image }}" alt="item-img" class="mx-auto rounded-all" style="width: 200px; height: 200px;">
        </div>
        <div class="mx-0 md:mx-4 p-2 flex flex-col justify-between w-full">
          <div class="text-center md:text-left">
            <p class="font-bold text-3xl tracking-wider mb-2 md:mb-0">{{ $item->name }}</p>
            <p class="font-oxygen text-md lg:text-lg mb-2 md:mb-0">{{ $item->description }}</p>
          </div>
          <div class="flex text-description justify-center md:justify-start">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M5.31305 14.6272C3.04571 13.8373 1.44831 12.828 0.564535 11.1715C-0.141169 9.8431 -0.195605 8.21014 0.459746 6.85151C1.68566 4.30575 4.55365 3.50764 6.81233 4.30705C7.23951 2.00438 9.27536 -0.0466217 12.0024 0.0664797C14.723 -0.0370301 16.7608 2.00553 17.1877 4.30676C19.4463 3.50734 22.3188 4.2978 23.5403 6.85122C24.1956 8.20984 24.1412 9.8428 23.4355 11.1712C22.6583 12.6369 21.3205 13.5954 19.4538 14.3448C19.422 17.2017 18.3735 19.5166 17.0965 19.5166H7.66393C6.42922 19.5166 5.40824 17.3528 5.31305 14.6272Z" fill="#969696" />
              <path d="M18.5703 22.1695C18.5703 21.1968 17.6418 20.4009 16.5069 20.4009H8.25346C7.11861 20.4009 6.19009 21.1968 6.19009 22.1695C6.19009 23.1422 7.11861 23.9381 8.25346 23.9381H16.5069C17.6418 23.9381 18.5703 23.1422 18.5703 22.1695Z" fill="#969696" />
            </svg>
            <p class="font-oxygen text-md lg:text-lg ml-2">{{ $item->store->name }}</p>
          </div>
        </div>
      </div>

      <div class="p-2 flex-none w-48 flex flex-col mx-auto lg:justify-between">
        <div class="flex justify-center lg:justify-end mb-2 lg:mb-0">
          <form action="{{ route('carts.items.update', ['cart' => auth()->user()->cart->id, 'item' => $item, 'quantity' => ($item->pivot->quantity * -1)]) }}" method="POST" class="text-center">
            @csrf
            @method('PUT')
            <button type="submit" class="tracking-wide text-red-500 border border-red-500 hover:bg-red-500 hover:border-none hover:text-white py-1 px-2 rounded-lg">Remove Item</button>
          </form>
        </div>

        <div class="font-oxygen flex justify-between mb-2 lg:mb-0">
          <p>Item Price:</p>
          <p class="tracking-wide">${{ number_format($item->price / 100, 2, '.', ',') }}</p>
        </div>

        <div>
          <div class="font-oxygen flex justify-between">
            <p>Quantity:</p>
            <div class="flex">
              <form action="{{ route('carts.items.update', ['cart' => auth()->user()->cart->id, 'item' => $item, 'quantity' => -1]) }}" method="POST" class="text-center">
                @csrf
                @method('PUT')
                <button type="submit" class="flex items-center">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM16 13H8C7.45 13 7 12.55 7 12C7 11.45 7.45 11 8 11H16C16.55 11 17 11.45 17 12C17 12.55 16.55 13 16 13Z" fill="#97BFA2" />
                  </svg>
                </button>
              </form>
              <p class="text-lg px-2">{{ $item->pivot->quantity }}</p>
              <form action="{{ route('carts.items.update', ['cart' => auth()->user()->cart->id, 'item' => $item, 'quantity' => 1]) }}" method="POST" class="text-center">
                @csrf
                @method('PUT')
                <button type="submit" class="flex items-center">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM16 13H13V16C13 16.55 12.55 17 12 17C11.45 17 11 16.55 11 16V13H8C7.45 13 7 12.55 7 12C7 11.45 7.45 11 8 11H11V8C11 7.45 11.45 7 12 7C12.55 7 13 7.45 13 8V11H16C16.55 11 17 11.45 17 12C17 12.55 16.55 13 16 13Z" fill="#97BFA2" />
                  </svg>
                </button>
              </form>
            </div>
          </div>
          <p class="text-sm text-description font-oxygen mb-2 lg:mb-0">( {{ $item->limit }} available )</p>
        </div>
        <hr>

        <div class="font-oxygen font-bold flex text-xl justify-between mb-2 lg:mb-0">
          <p>Total:</p>
          <p class="tracking-wide">${{ number_format($item->price / 100 * $item->pivot->quantity, 2, '.', ',') }}</p>
        </div>

      </div>
    </div>
    @empty
    <div class="flex flex-col items-center justify-center">
      <h2 class="mb-16 font-oxygen">There are no items in your cart.</h2>
      <button class="px-4 py-2 bg-darkblue rounded-lg text-white text-lg tracking-wider border-2 border-darkblue hover:bg-blue-700 hover:border-blue-700">
        <a href="{{ route('stores.index') }}">Return to Stores</a>
      </button>
    </div>
    @endforelse
  </div>

  @if (auth()->user()->cart->cartTotal !== 0)
  <form action="{{ route('order.store', ['cart' => auth()->user()->cart->id]) }}" method="POST">
    @csrf
    <div class="container w-3/4 max-w-5xl mx-auto pb-6 flex flex-col lg:flex-row mb-12 items-center lg:items-stretch lg:justify-between">
      <div class="w-4/5 lg:w-3/5 mb-4 lg:mb-0 lg:ml-10 min-w-350">
        <textarea class="outline-none shadow-lg resize-none w-full h-32 lg:h-full py-4 px-5 rounded-all font-oxygen" placeholder="Include a message to the chefs..." name="order-message" id="order-message"></textarea>
      </div>
      <div class="w-1/2 xlg:w-2/5 min-w-350 mx-10">
        <div class="bg-white mb-6 lg:mb-4 py-4 px-6 rounded-all shadow-lg">
          <p class="tracking-wider text-2xl font-bold border-b border-black text-center mb-2 pb-2">Order Summary:</p>
          <div>
            @foreach ($items as $item)
            <div class="font-oxygen flex justify-between pb-1">
              <p>{{ ucfirst($item->name) }}</p>
              <p class="tracking-wide">${{ number_format($item->price / 100 * $item->pivot->quantity, 2, '.', ',') }}</p>
            </div>
            @endforeach
            <div class="font-oxygen flex justify-between border-t border-black mt-1 pt-1 font-bold text-lg">
              <p>Total Due:</p>
              <p class="tracking-wide">${{ number_format(auth()->user()->cart->orderTotal / 100, 2, '.', ',') }}</p>
            </div>
          </div>
        </div>
        <div class="flex justify-around text-md xlg:text-lg">
          <button class="px-4 py-2 hover:bg-darkblue border-2 border-darkblue rounded-lg hover:text-white tracking-wider">
            <a href="{{ route('stores.index') }}">Continue Shopping</a>
          </button>
          <button type="submit" class="px-4 py-2 bg-darkblue rounded-lg text-white tracking-wider border-2 border-darkblue hover:bg-blue-700 hover:border-blue-700">Place Your Order</button>
        </div>
      </div>
  </form>
  @endif
</x-app>