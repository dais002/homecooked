<x-app>
  <div>
    <h1 class="text-center">Checkout Page</h1>

    <div class="container w-2/3 mx-auto">
      @forelse ($items as $item)


      <div class="flex justify-between bg-red-100">
        <div>
          {{ $item->pivot->quantity }}

        </div>
      </div>


      @empty

      @endforelse
    </div>
  </div>
</x-app>