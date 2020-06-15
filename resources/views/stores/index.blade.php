<x-app>
  <!-- <h1>Welcome </h1> -->
  <div class="mx-auto max-w-screen-lg grid grid-cols-2 gap-4 border border-gray-300 rounded-lg">
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
            @can ('delete_store', $store)
            <form action="stores/{{ $store->id }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="px-4 py-2 bg-red-100 border border-red-500 text-s font-bold">
                Delete Store
              </button>
            </form>
            @endcan
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
  <div>
    {{ $stores->links() }}
  </div>
</x-app>