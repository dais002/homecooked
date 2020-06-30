<x-app>
  <div class="container w-3/4 md:w-1/2 xl:w-1/3 mx-auto p-10 bg-blue-200 rounded-all m-12 bg-storecard shadow-lg">
    <div class="flex justify-center font-bold tracking-widest text-center">
      <div class="mb-6 text-center text-2xl border-b-8 border-nav">EDIT ITEM - {{ $item->name }}</div>
    </div>
    <form action="{{ route('stores.items.update', ['store' => $store, 'item' => $item]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      <div class="mb-6">
        <label for="description" class="block mb-2 uppercase font-bold text-sm text-gray-700">
          Description:
        </label>
        <textarea type="text" class="border border-gray-400 p-2 w-full font-oxygen" name="description" id="description" required>{{ $item->description }}</textarea>
        @error('description')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="image" class="block mb-2 uppercase font-bold text-sm text-gray-700">
          Item Image URL:
        </label>
        <input value="{{ $item->image }}" type="text" class="border border-gray-400 p-2 w-full" name="image" id="image" required>
        @error('image')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="limit" class="block mb-2 uppercase font-bold text-sm text-gray-700">
          Quantity Available:
        </label>
        <input value="{{ $item->limit }}" type="number" class="border border-gray-400 p-2 w-full" name="limit" id="limit" required>
        @error('limit')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button type="submit" class="px-4 py-2 bg-darkblue rounded-lg text-white text-lg text-right mr-4 xl:mr-0 tracking-wider hover:bg-blue-700">
          Submit
        </button>
        <a href="{{ URL::previous() }}" class="hover:underline tracking-wider ml-4">Cancel</a>
      </div>
    </form>
  </div>
</x-app>