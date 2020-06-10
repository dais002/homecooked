<x-app>
  <div class="mx-auto flex justify-center items-end flex-wrap border border-gray-300 rounded-lg w-3/4">
    @foreach ($stores as $store)
    <div class="m-4 border-2 border-solid w-1/4">
      <a href="{{ route('stores.show', $store->id) }}">
        <div class="m-2 text-center">
          <img src="{{ $store->logo }}" alt="" class="" style="width: 170px; height: 170px;">
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