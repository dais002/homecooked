<x-app>
  <div class="mx-auto text-center mb-6">
    <h1 class="mb-4">Welcome to {{ $store->name }}</h1>
    <img src="{{ $store->logo }}" alt="store-logo" class="mb-6 mx-auto">
    @can ('manager')
    <div class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded-full w-1/2 mx-auto">
      <a href="{{ route('stores.items.create', $store->id) }}">Add Item</a>
    </div>
    @endcan
  </div>

  <div class="container w-2/3 mx-auto">
    @forelse ($store->items as $item)
    <div class="flex justify-between bg-red-100 border border-black border-dotted mb-4">
      <div class="p-3 flex-1 flex flex-col justify-between">
        <div class="flex justify-between">
          <div>
            <h2 class="font-bold">{{ $item->name }}</h2>
            <p class="mb-2">{{ $item->description }}</p>
          </div>
          @can('manager')
          <div class="flex">
            <div>
              <a class="flex items-center bg-gray-500 hover:bg-gray-700 text-lg font-bold py-2 px-4 border border-black rounded-full" href="{{ route('stores.items.edit', ['store' => $store, 'item' => $item]) }}">Edit Item</a>
            </div>
            <div>
              <form action="{{ route('stores.items.destroy', ['store' => $store->id, 'item' => $item->id]) }}" method="POST" class="text-center">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-lg font-bold py-2 px-4 border border-black rounded-full">Delete Item</button>
              </form>
            </div>
          </div>

          @endcan
        </div>
        <div class="flex justify-between">
          <div>
            <h3 class="mb-2">Price: ${{ number_format($item->price / 100, 2, '.', ',') }}</h3>
            <h4>Available: {{ $item->limit }}</h4>
          </div>
          <div>
            <form action="{{ route('carts.items.store', ['cart' => auth()->user()->cart->id, 'item_id' => $item->id]) }}" method="POST" class="text-center">
              @csrf
              <div class="mb-2">
                <span class="mr-1 text-lg">Quantity:</span>
                <select name="quantity" id="quantity" class="px-1 border border-grey-400">
                  @for ($i = 1; $i <= $item->limit; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
              </div>
              <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-700 rounded-lg">Add to Cart</button>
            </form>
          </div>
        </div>
      </div>
      <div class="p-2">
        <img src="{{ $item->image }}" alt="item-img" class="mx-auto">
      </div>
    </div>
    @empty

    <p>No items avaialble at this time.</p>

    @endforelse
  </div>
</x-app>