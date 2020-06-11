<x-app>
  <div class="mx-auto text-center mb-6">
    <h1 class="mb-4">Welcome to {{ $store->name }}</h1>
    <img src="{{ $store->logo }}" alt="store-logo" class="mb-6 mx-auto">
    <div>
      <!-- this route works for now... how would you rewrite this? -->
      <a href="{{ route('stores.items.create', $store->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded-full">Add Item</a>
    </div>
  </div>

  <div class="container w-3/5 mx-auto">
    @forelse ($store->items as $item)
    <div class="flex justify-between bg-red-100 border border-black border-dotted mb-4">
      <div class="p-3 flex-1 grid grid-cols-2 grid-rows-3">
        <div class="row-start-1 row-span-2 col-start-1 col-span-2">
          <h2>{{ $item->name }}</h2>
          <p>{{ $item->description }}</p>
        </div>
        <div>
          <h3>Price: ${{ $item->price / 100 }}</h3>
          <h4>Available: {{ $item->limit }}</h4>
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