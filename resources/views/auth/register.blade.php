<x-master>
    <div class="container mx-auto flex justify-center">
        <div class="px-12 py-8 bg-gray-300 rounded-lg">
            <div class="col-md-8">
                <h1 class="font-bold mb-4 text-center">Create Account</h1>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-6">
                        <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Name
                        </label>
                        <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" required autocomplete="name">

                        @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Email
                        </label>
                        <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email" required autocomplete="email">

                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Password
                        </label>
                        <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required autocomplete="password">

                        @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password-confirm" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Re-enter Password
                        </label>
                        <input class="border border-gray-400 p-2 w-full" type="password" name="password_confirmation" id="password-confirm" required>
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-master>