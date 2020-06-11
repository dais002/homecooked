<x-app>
  <!-- this is returning an empty array... :( :( :( -->
  <?php echo $store; ?>
  <!-- trying to get store_id passed through so i can create a new item -->
  <div class="container w-1/2 mx-auto p-10 bg-blue-200 rounded-lg">
    <h1 class="mb-4 text-center font-bold">Create a New Item</h1>
    <form action="stores.items.create" method="post" enctype="multipart/form-data">
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
        <label for="description" class="block mb-2 uppercase font-bold text-xs text-gray-700">
          Description:
        </label>
        <textarea type="text" class="border border-gray-400 p-2 w-full" name="description" id="description" required></textarea>
        @error('description')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="price" class="block mb-2 uppercase font-bold text-xs text-gray-700">
          Price:
        </label>
        <input type="text" class="border border-gray-400 p-2 w-full" name="price" id="price" required>
        @error('price')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="image" class="block mb-2 uppercase font-bold text-xs text-gray-700">
          Item Image:
        </label>
        <input type="text" class="border border-gray-400 p-2 w-full" name="image" id="image" required>
        @error('image')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="limit" class="block mb-2 uppercase font-bold text-xs text-gray-700">
          Quantity Available:
        </label>
        <input type="text" class="border border-gray-400 p-2 w-full" name="limit" id="limit" required>
        @error('limit')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
          Submit
        </button>
        <a href="{{ route('stores.index') }}" class="hover:underline">Cancel</a>
      </div>
    </form>
  </div>
</x-app>