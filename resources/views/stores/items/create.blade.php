<x-app>
  <div class="container w-3/4 md:w-1/2 xl:w-1/3 mx-auto p-10 bg-blue-200 rounded-all m-12 bg-storecard shadow-lg">
    <div class="flex justify-center font-bold tracking-widest text-center">
      <div class="mb-6 text-center text-2xl border-b-8 border-button">CREATE A NEW ITEM</div>
    </div>
    <form action="{{ route('stores.items.store', ['store' => $store]) }}" method="post">
      @csrf

      <div class="mb-6">
        <label for="name" class="block mb-2 uppercase font-bold text-sm text-gray-700">
          Name:
        </label>
        <input type="text" class="border border-gray-400 p-2 w-full" name="name" id="name" required>
        @error('name')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="description" class="block mb-2 uppercase font-bold text-sm text-gray-700">
          Description:
        </label>
        <textarea type="text" class="border border-gray-400 p-2 w-full font-oxygen" name="description" id="description" required></textarea>
        @error('description')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="price" class="block mb-2 uppercase font-bold text-sm text-gray-700">
          Price:
        </label>
        <input type="text" class="border border-gray-400 p-2 w-full" name="price" id="price" required>
        @error('price')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="image" class="block mb-2 uppercase font-bold text-sm text-gray-700">
          Item Image:
        </label>
        <input type="text" class="border border-gray-400 p-2 w-full" name="image" id="image" required>
        @error('image')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="limit" class="block mb-2 uppercase font-bold text-sm text-gray-700">
          Quantity Available:
        </label>
        <input type="number" class="border border-gray-400 p-2 w-full" name="limit" id="limit" required>
        @error('limit')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button type="submit" class="bg-blue-700 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2 tracking-wider">
          Submit
        </button>
        <a href=" {{ URL::previous() }}" class="hover:underline tracking-wider">Cancel</a>
      </div>
    </form>
  </div>
</x-app>