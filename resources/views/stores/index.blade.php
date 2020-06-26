<x-app>
  <section class="bg-searchcontainer">
    @include ('_search')
  </section>
  <div class="mx-12 md:mx:24 lg:mx-40">
    <div class="mt-16 mb-8 flex justify-between">
      <h1 class="border-b-8 border-button tracking-wider font-bold">LOCAL CHEFS</h1>
      @if (auth()->user()->role === 'admin' || auth()->user()->role === 'manager')
      <div class="text-right">
        <h2>{{ auth()->user()->role }} privileges</h2>
      </div>
      @endif
    </div>
    <div class="flex flex-wrap justify-center xlg:justify-between -mx-10 xlg:-mx-4 mb-4 rounded-lg pb-12">

      @foreach ($stores as $store)
      <div class="flex-basis px-4 mb-8">
        <a href="{{ route('stores.show', $store->id) }}">
          <img src="{{ $store->logo }}" alt="store-logo" class="object-fit h-64 w-full rounded-img">
        </a>

        <div class="h-40 p-4 flex flex-col justify-between bg-storecard rounded-storetext">
          <a href="{{ route('stores.show', $store->id) }}">
            <h2 class="font-bold mb-2">{{ $store->name }}</h2>
            <p class="font-oxygen text-sm">{{ $store->description }}</p>
          </a>
          <div class="flex justify-between items-center">
            <p>Los Angeles, CA</p>
            @can ('admin', $store)
            <div>
              <form action="{{ route('stores.destroy', ['store' => $store]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-2 py-1 bg-danger text-white text-sm">
                  Delete Store
                </button>
              </form>
            </div>
            @endcan
          </div>
        </div>
      </div>
      @endforeach

    </div>

  </div>
</x-app>