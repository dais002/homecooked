<x-app>
  <section class="bg-searchcontainer">
    @include ('_search')
  </section>
  <div class="lg:mx-40">
    <div class="mt-16 mb-8 flex justify-around lg:justify-between">

      <h1 class="border-b-8 border-nav tracking-wider font-bold">LOCAL CHEFS</h1>
      @can ('addStore', 'owner')
      <button class="px-4 py-2 bg-darkblue rounded-lg text-white text-lg tracking-wider hover:bg-blue-700">
        <a href="{{ route('stores.create') }}">Add Store</a>
      </button>
      @endcan

    </div>

    <div class="flex flex-wrap justify-center xlg:justify-start -mx-10 xlg:-mx-4 mb-4 rounded-lg pb-12">

      @foreach ($stores as $store)
      <div class="flex-basis px-4 mb-8">
        <div class="shadow-lg rounded-all">
          <a href="{{ route('stores.show', $store->id) }}" class="rounded-img">
            <img src="{{ $store->logo }}" alt="store-logo" class="object-cover h-64 w-full rounded-img">
          </a>

          <div class="h-40 pt-2 pb-4 px-4 flex flex-col justify-between bg-storecard rounded-storetext">
            <a href="{{ route('stores.show', $store->id) }}">
              <h2 class="font-bold pb-1">{{ $store->name }}</h2>
              <p class="font-oxygen text-sm">{{ $store->description }}</p>
            </a>
            <div class="flex justify-between items-center">

              <a href="{{ route('stores.show', $store->id) }}" class="flex">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1038 2C8.23381 2 5.10381 5.13 5.10381 9C5.10381 13.17 9.52381 18.92 11.3438 21.11C11.7438 21.59 12.4738 21.59 12.8738 21.11C14.6838 18.92 19.1038 13.17 19.1038 9C19.1038 5.13 15.9738 2 12.1038 2ZM12.1038 11.5C10.7238 11.5 9.60381 10.38 9.60381 9C9.60381 7.62 10.7238 6.5 12.1038 6.5C13.4838 6.5 14.6038 7.62 14.6038 9C14.6038 10.38 13.4838 11.5 12.1038 11.5Z" fill="#969696" />
                </svg>

                <span>Los Angeles, CA</span>
              </a>

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
      </div>
      @endforeach

    </div>

  </div>
</x-app>