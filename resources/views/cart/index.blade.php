<x-app>
  <div>
    <h1 class="text-center">Checkout Page</h1>

    <div class="container w-2/3 mx-auto">
      @forelse ($items as $item)

      <div class="flex justify-between bg-red-100 border border-black border-dotted mb-4">
        <div class="p-3 flex-1 flex flex-col justify-between">
          <div class="flex justify-between">
            <div>
              <h2 class="font-bold">{{ $item->name }}</h2>
              <p class="mb-2">{{ $item->description }}</p>
            </div>
            <div>
              <form action="{{ route('carts.items.destroy', ['cart' => auth()->user()->cart->id, 'item' => $item->id, 'item_id' => $item->id]) }}" method="POST" class="text-center">
                @csrf
                @method('DELETE')

                <div class="m-0">
                  <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-700 rounded-lg">Remove</button>
                </div>
              </form>
            </div>
          </div>
          <div class="flex justify-between">
            <div>
              <h3 class="mb-2">Price: ${{ number_format($item->price / 100, 2, '.', ',') }}</h3>
              <h4>Available: {{ $item->limit }}</h4>
            </div>
            <div class="form-quantity-buttons">
              <div>
                <p for="quantity" class="">Quantity: {{ $item->pivot->quantity }}</p>
              </div>
              <div class="flex">
                <form action="{{ route('carts.items.update', ['cart' => auth()->user()->cart->id, 'item' => $item->id, 'action' => 'increase', 'item_id' => $item->id]) }}" method="POST" class="text-center">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-700 rounded-lg">Increase</button>
                </form>

                <form action="{{ route('carts.items.update', ['cart' => auth()->user()->cart->id, 'item' => $item->id, 'action' => 'decrease', 'item_id' => $item->id]) }}" method="POST" class="text-center">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-700 rounded-lg">Decrease</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="p-2">
          <img src="{{ $item->image }}" alt="item-img" class="mx-auto">
        </div>
      </div>


      @empty

      <div>
        <p>There are no items in your cart.</p>
      </div>
      @endforelse

      @if (auth()->user()->cartTotal !== 0)
      <div>
        <form action="{{ route('order.store', ['cart' => auth()->user()->cart->id]) }}" method="POST" class="text-center">
          @csrf
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-700 rounded-lg">Complete Order</button>
        </form>
      </div>
      @endif
    </div>
  </div>
</x-app>