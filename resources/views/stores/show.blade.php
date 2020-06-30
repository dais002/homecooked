<x-app>
  <div class="mx-auto text-center flex flex-col items-center justify-between p-6">
    <div>
      <img src="{{ $store->logo }}" alt="store-logo" class="my-6 mx-auto" style="border-radius: 50%; width: 200px; height: 200px;">
    </div>
    <h1 class="border-b-8 border-nav tracking-wider">{{ $store->name }}</h1>
    <div class="font-oxygen w-2/3 xlg:w-3/5">
      <h2 class="mt-4">{{ $store->description }}</h2>
      <div class="flex flex-col md:flex-row items-center justify-between text-lg text-description mt-4 mb-2">
        <div class="flex items-center mb-2 md:mb-0">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5.31305 14.6272C3.04571 13.8373 1.44831 12.828 0.564535 11.1715C-0.141169 9.8431 -0.195605 8.21014 0.459746 6.85151C1.68566 4.30575 4.55365 3.50764 6.81233 4.30705C7.23951 2.00438 9.27536 -0.0466217 12.0024 0.0664797C14.723 -0.0370301 16.7608 2.00553 17.1877 4.30676C19.4463 3.50734 22.3188 4.2978 23.5403 6.85122C24.1956 8.20984 24.1412 9.8428 23.4355 11.1712C22.6583 12.6369 21.3205 13.5954 19.4538 14.3448C19.422 17.2017 18.3735 19.5166 17.0965 19.5166H7.66393C6.42922 19.5166 5.40824 17.3528 5.31305 14.6272Z" fill="#969696" />
            <path d="M18.5703 22.1695C18.5703 21.1968 17.6418 20.4009 16.5069 20.4009H8.25346C7.11861 20.4009 6.19009 21.1968 6.19009 22.1695C6.19009 23.1422 7.11861 23.9381 8.25346 23.9381H16.5069C17.6418 23.9381 18.5703 23.1422 18.5703 22.1695Z" fill="#969696" />
          </svg>
          <p class="ml-2">{{ !$store->users->first() ? 'Unclaimed Store' : ucfirst($store->users->first()->name) }}</p>
        </div>
        <div class="flex items-center mb-2 md:mb-0">
          <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1038 2C8.23381 2 5.10381 5.13 5.10381 9C5.10381 13.17 9.52381 18.92 11.3438 21.11C11.7438 21.59 12.4738 21.59 12.8738 21.11C14.6838 18.92 19.1038 13.17 19.1038 9C19.1038 5.13 15.9738 2 12.1038 2ZM12.1038 11.5C10.7238 11.5 9.60381 10.38 9.60381 9C9.60381 7.62 10.7238 6.5 12.1038 6.5C13.4838 6.5 14.6038 7.62 14.6038 9C14.6038 10.38 13.4838 11.5 12.1038 11.5Z" fill="#969696" />
          </svg>

          <p class="ml-2">Los Angeles, CA</p>
        </div>
        <div class="flex items-center mb-2 md:mb-0">
          <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M18 0H2C0.9 0 0.01 0.9 0.01 2L0 14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2C20 0.9 19.1 0 18 0ZM17.6 4.25L10.53 8.67C10.21 8.87 9.79 8.87 9.47 8.67L2.4 4.25C2.15 4.09 2 3.82 2 3.53C2 2.86 2.73 2.46 3.3 2.81L10 7L16.7 2.81C17.27 2.46 18 2.86 18 3.53C18 3.82 17.85 4.09 17.6 4.25Z" fill="#969696" />
          </svg>

          <p class="ml-2">{{ !$store->users->first() ? 'placeholder@email.com' : strtolower($store->users->first()->email) }}</p>
        </div>
      </div>
    </div>
  </div>

  @can ('addItem', $store)
  <div class="flex justify-end mx-auto mb-4 w-3/4 max-w-4xl">
    <button class="px-4 py-2 bg-darkblue rounded-lg text-white text-lg text-right mr-4 xl:mr-0 tracking-wider hover:bg-blue-700">
      <a href="{{ route('stores.items.create', $store->id) }}">Add Item</a>
    </button>
  </div>
  @endcan

  <div class="container w-3/4 max-w-5xl mx-auto pb-6">

    @forelse ($store->items as $item)
    <div class="flex flex-col lg:flex-row justify-between bg-white mb-6 rounded-all p-6 shadow-lg">

      <div class="flex flex-col-reverse md:flex-row w-full lg:w-3/4">
        <div class="flex-none">
          <img src="{{ $item->image }}" alt="item-img" class="mx-auto rounded-all" style="width: 200px; height: 200px;">
        </div>
        <div class="md:ml-2 lg:ml-4 p-2 flex flex-col justify-between">
          <div class="mb-4 md:mb-0 text-center md:text-left">
            <p class="font-bold text-2xl lg:text-3xl tracking-wider">{{ $item->name }}</p>
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
          <h2 class="font-bold mb-2 lg:mb-4 tracking-wide">${{ number_format($item->price / 100, 2, '.', ',') }}</h2>
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

            <button type="submit" class="flex items-center px-4 py-2 bg-btn-green rounded-lg text-white text-lg hover:bg-darkblue">
              <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.91699 15.5002C4.90866 15.5002 4.09283 16.3252 4.09283 17.3335C4.09283 18.3418 4.90866 19.1668 5.91699 19.1668C6.92533 19.1668 7.75033 18.3418 7.75033 17.3335C7.75033 16.3252 6.92533 15.5002 5.91699 15.5002ZM0.416992 1.75016C0.416992 2.25433 0.829492 2.66683 1.33366 2.66683H2.25033L5.55033 9.62433L4.31283 11.861C3.64366 13.0893 4.52366 14.5835 5.91699 14.5835H16.0003C16.5045 14.5835 16.917 14.171 16.917 13.6668C16.917 13.1627 16.5045 12.7502 16.0003 12.7502H5.91699L6.92533 10.9168H13.7545C14.442 10.9168 15.047 10.541 15.3587 9.97266L18.6403 4.0235C18.9795 3.4185 18.5395 2.66683 17.8428 2.66683H4.27616L3.66199 1.356C3.51533 1.03516 3.18533 0.833496 2.83699 0.833496H1.33366C0.829492 0.833496 0.416992 1.246 0.416992 1.75016ZM15.0837 15.5002C14.0753 15.5002 13.2595 16.3252 13.2595 17.3335C13.2595 18.3418 14.0753 19.1668 15.0837 19.1668C16.092 19.1668 16.917 18.3418 16.917 17.3335C16.917 16.3252 16.092 15.5002 15.0837 15.5002Z" fill="white" />
              </svg>
              Add to Cart
            </button>
          </form>

          <x-modal submit-label="Ok">
            <x-slot name="trigger">
              <button hidden @click="on = true" id="add-to-cart-modal"></button>
            </x-slot>
            Added to cart!
          </x-modal>

        </div>
      </div>
    </div>
    @empty

    <p>No items avaialble at this time.</p>

    @endforelse
  </div>

</x-app>