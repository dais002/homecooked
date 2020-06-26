<x-app>

  <div class="mx-auto text-center flex flex-col items-center justify-between p-6">
    <div>
      <img src="{{ $store->logo }}" alt="store-logo" class="my-6 mx-auto" style="border-radius: 50%; width: 200px; height: 200px;">
    </div>
    <h1 class="border-b-8 border-button tracking-wider">{{ $store->name }}</h1>
    <div class="font-oxygen max-w-2xl">
      <h2 class="mt-4">{{ $store->description }}</h2>
      <div class="flex flex-col md:flex-row items-center justify-between text-lg text-description mt-4 mb-2">
        <p class="sm:pb-2">{{ auth()->user()->name }}</p>
        <p class="sm:pb-2">Los Angeles, CA</p>
        <p class="sm:pb-2">{{ auth()->user()->email }}</p>
      </div>
    </div>
  </div>

  @can ('addItem', $store)
  <div class="flex justify-end mx-auto mb-4 w-3/4 max-w-4xl">
    <button class="px-4 py-2 bg-blue-700 rounded-lg text-white text-lg text-right mr-4 xl:mr-0 tracking-wider hover:bg-blue-500">
      <a href="{{ route('stores.items.create', $store->id) }}">Add Item</a>
    </button>
  </div>
  @endcan

  <div class="container w-3/4 max-w-5xl mx-auto pb-6">
    @forelse ($store->items as $item)
    <div class="flex flex-col lg:flex-row justify-between bg-white mb-6 rounded-all p-6">

      <div class="flex flex-col-reverse md:flex-row w-full lg:w-3/4">
        <div class="flex-none">
          <img src="{{ $item->image }}" alt="item-img" class="mx-auto rounded-all" style="width: 200px; height: 200px;">
        </div>
        <div class="md:ml-2 lg:ml-4 p-2 flex flex-col justify-between">
          <div class="mb-4 md:mb-0 text-center md:text-left">
            <p class="font-bold text-2xl lg:text-3xl">{{ $item->name }}</p>
            <p class="font-oxygen text-sm md:text-md lg:text-lg">{{ $item->description }}</p>
          </div>
          @can('update', $item)
          <div class="flex text-center justify-center md:justify-start">
            <button class="px-2 py-1 lg:px-4 lg:py-2 bg-gray-500 hover:bg-gray-700 text-white text-sm lg:text-lg rounded-lg mr-4 md:mr-2 lg:mr-6 tracking-wider">
              <a href="{{ route('stores.items.edit', ['store' => $store, 'item' => $item]) }}">Edit Item</a>
            </button>
            <div>
              <form action="{{ route('stores.items.destroy', ['store' => $store->id, 'item' => $item->id]) }}" method="POST" class="text-center">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-2 py-1 lg:px-4 lg:py-2 bg-danger text-white text-sm lg:text-lg md:mr-6 tracking-wider hover:bg-red-700">Delete Item</button>
              </form>
            </div>
          </div>
          @endcan
        </div>
      </div>

      <div class="p-2 w-2/3 mx-auto mt-4 lg:mt-0 lg:w-1/4 flex flex-row-reverse lg:flex-col flex-none justify-between md:justify-around lg:justify-between">
        <div class="flex flex-col-reverse lg:flex-col justify-around">
          <h2 class="font-bold mb-2 lg:mb-4">${{ number_format($item->price / 100, 2, '.', ',') }}</h2>
          <p class="font-oxygen text-sm md:text-lg">Available: {{ $item->limit }}</p>
        </div>
        <div class="flex flex-col justify-between">
          <form action="{{ route('carts.items.update', ['cart' => auth()->user()->cart, 'item' => $item]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-2 lg:mb-4 font-oxygen">
              <span class="mr-1 text-sm md:text-lg">Quantity:</span>
              <select name="quantity" id="quantity" class="px-1 text-sm md:text-lg border border-grey-400">
                @for ($i = 1; $i <= $item->limit; $i++)
                  <option value="{{ $i }}">{{ $i }}</option>
                  @endfor
              </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-btn-green rounded-lg text-white text-lg hover:bg-blue-700">Add to Cart</button>
            <x-modal submit-label="Ok">
              <x-slot name="trigger">
                <button hidden @click="on = true" id="add-to-cart-modal" type="submit" class="px-4 py-2 bg-btn-green rounded-lg text-white text-lg hover:bg-blue-700">Add to Cart</button>
              </x-slot>
              Success! Item added to cart!
            </x-modal>
          </form>

        </div>


      </div>
    </div>
    @empty

    <p>No items avaialble at this time.</p>

    @endforelse
  </div>
</x-app>