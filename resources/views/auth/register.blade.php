<x-master>
    <div class="flex flex-col items-center mx-auto bg-white">
        <div class="bg-btn-green p-12 mt-20 mb-40  max-w-screen-sm rounded-all">
            <div class="">
                <img src="/images/logo.svg" alt="logo" style="height: 270px; width: 360px">
            </div>
            <div class="mx-auto px-12 py-8 rounded-all border border-white bg-storecard tracking-wider max-w-sm">

                <div class="flex justify-center font-bold tracking-widest text-center">
                    <div class="text-center text-2xl border-b-8 border-nav">CREATE ACCOUNT</div>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="my-6">
                        <label for="name" class="block mb-2 uppercase font-bold text-sm text-gray-700">
                            Name
                        </label>

                        <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" autocomplete="name" value="{{ old('name') }}" required>

                        @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block mb-2 uppercase font-bold text-sm text-gray-700">
                            Email
                        </label>

                        <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email" autocomplete="email" value="{{ old('email') }}" required>

                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block mb-2 uppercase font-bold text-sm text-gray-700">
                            Password
                        </label>

                        <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" autocomplete="current-password" required>

                        @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password-confirm" class="block mb-2 uppercase font-bold text-sm text-gray-700">
                            Re-enter Password
                        </label>

                        <input class="border border-gray-400 p-2 w-full" type="password" name="password_confirmation" id="password-confirm" required>

                        @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-700 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2 tracking-wider">
                            {{ __('Register') }}
                        </button>
                        <a href="{{ route('welcome') }}" class="text-xs text-gray-700 tracking-normal font-oxygen">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-master>