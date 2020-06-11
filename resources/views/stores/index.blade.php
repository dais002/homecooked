<x-app>

  <div class="mx-auto max-w-screen-lg grid lg:grid-cols-4 lg:gap-4 md:grid-cols-3 md:gap-3 sm:grid-cols-2 sm:gap-2 border border-gray-300 rounded-lg">
    @foreach ($stores as $store)
    <div class="border-2 border-solid">
      <a href="{{ route('stores.show', $store->id) }}">
        <div class="m-2 text-center">
          <img src="{{ $store->logo }}" alt="" class="mx-auto" style="width: 170px; height: 170px;">
          <div class="flex-1">
            <h5 class="font-bold">
              {{ $store->name }}
            </h5>
            <p class="text-sm">
              {{ $store->cuisineType }}
            </p>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>

</x-app>