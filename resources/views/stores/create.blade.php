<x-app>
  <div class="container w-1/2 mx-auto p-10 bg-blue-200 rounded-lg">
    <h1 class="mb-4 text-center font-bold">Create Store</h1>
    <form action="{{ route('stores.store') }}" method="post">
      @csrf

      <div class="mb-6">
        <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
          Name:
        </label>
        <input type="text" class="border border-gray-400 p-2 w-full" name="name" id="name" required>
        @error('name')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="logo" class="block mb-2 uppercase font-bold text-xs text-gray-700">
          Logo URL:
        </label>
        <input type="text" class="border border-gray-400 p-2 w-full" name="logo" id="logo" required>
        @error('logo')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
          Submit
        </button>
        <a href="{{ URL::previous() }}" class="hover:underline">Cancel</a>
      </div>
    </form>
  </div>
</x-app>