<x-guest-layout>


        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
    <div class="w-full flex flex-wrap">

        <!-- Login Section -->
        <div class="w-full md:w-1/2 flex flex-col">

            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
                <a href="#" class="bg-black text-white font-bold text-xl p-4">Logo</a>
            </div>
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="font-bold uppercase text-gray-800 text-center text-3xl">Bienvenido</p>
                <x-jet-validation-errors class="mb-4" />
        <form method="POST"  class="flex flex-col pt-3 md:pt-8" action="{{ route('login') }}">
            @csrf
            <div class="flex flex-col pt-4">
                <label for="email" class="font-bold uppercase text-gray-800 text-lg">Correo</label>
                <input id="email" class="shadow appearance-none border rounded focus:border-blue-400 w-full py-2 px-3 text-gray-700 mt-1 leading-tight" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <div class="flex flex-col pt-4">
                <label for="password" class="font-bold uppercase text-gray-800 text-lg">Contraseña</label>
                <input id="password" class="shadow appearance-none border rounded focus:border-blue-400 w-full py-2 px-3 text-gray-700 mt-1 leading-tight"  type="password" name="password" required autocomplete="current-password" />
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="text-lg" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-800">{{ __('Recordarme') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Olvidaste tu Contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Entrar') }}
                </x-jet-button>
            </div>
        </form>
                <div class="text-center pt-12 pb-12">
                    <p>No tienes una Cuenta? <a href="{{ route('register') }}" class="underline font-semibold">Registrate Aqui</a></p>
                </div>
            </div>

        </div>

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="https://source.unsplash.com/IXUM4cJynP0">
        </div>
    </div>

</x-guest-layout>
