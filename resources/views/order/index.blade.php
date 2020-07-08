<x-app>
  <div class="flex flex-col items-center my-12 font-oxygen font-bold">
    <h1 class="mb-6">Order processed!</h1>
    <h1 class="mb-6">Please check your email {{auth()->user()->email}} for confirmation.</h1>
    <h1>Thank you for your support.</h1>
  </div>

  <div class="flex justify-center">
    <a class="px-4 py-2 bg-darkblue rounded-lg text-white tracking-wider border-2 border-darkblue hover:bg-blue-700 hover:border-blue-700" href="{{ route('stores.index') }}">Back to Stores</a>
  </div>
</x-app>