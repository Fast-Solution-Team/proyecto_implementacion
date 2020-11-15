<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />

                <x-jet-label for="second_name" value="{{ __('Second Name') }}" />
                <x-jet-input id="second_name" class="block mt-1 w-full" type="text" name="second_name" :value="old('second_name')" required autofocus autocomplete="second_name" />

                <x-jet-label for="lastname" value="{{ __('Lastname') }}" />
                <x-jet-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />

                <x-jet-label for="Second_lastname" value="{{ __('Second lastname') }}" />
                <x-jet-input id="second_lastname" class="block mt-1 w-full" type="text" name="second_lastname" :value="old('second_lastname')" required autofocus autocomplete="second_lastname" />

                <x-jet-label for="fec_nac" value="{{ __('Fecha de nacimiento') }}" />
                <x-jet-input id="fec_nac" class="block mt-1 w-full" type="date" name="fec_nac" :value="old('fec_nac')" required autofocus autocomplete="fec_nac" value="1995-01-01"/>

                <x-jet-label for="identidad" value="{{ __('Identidad') }}" />
                <x-jet-input id="identidad" class="block mt-1 w-full" type="number" name="identidad" :value="old('identidad')" required autofocus autocomplete="identidad" />

                <x-jet-label for="Sexo" value="{{ __('Genero') }}" />
                <select id="sexo" class="form-select" name="sexo">
                    <option value="">Genero...</option>
                    <option value="m">Masculino</option>
                    <option value="f">Femenino</option>
                </select>

                <x-jet-label for="direccion" value="{{ __('Direccion') }}" />
                <x-jet-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus autocomplete="direccion" />

            </div>
            <div class="mt-4">
                <x-jet-label for="departamento" value="{{ __('Departamento') }}" />
                <select id="depaartamento" class="form-select" name="departamento">
                    <option value="">Departamentos...</option>
                    <option value="Atlántida">Atlántida</option>
                    <option value="Colón">Colón</option>
                    <option value="Comayagua">Comayagua</option>
                    <option value="Copán">Copán</option>
                    <option value="Cortés">Cortés</option>
                    <option value="Choluteca">Choluteca</option>
                    <option value="El Paraíso">EL Paraíso</option>
                    <option value="Francisco Morazán">Francisco Morazán</option>
                    <option value="Gracias a Dios">Gracias a Dios</option>
                    <option value="Intibucá">Intibucá</option>
                    <option value="Islas de la Bahía">Islas de la Bahía</option>
                    <option value="La Paz">La Paz</option>
                    <option value="Lempira">Lempira</option>
                    <option value="Ocotepeque">Ocotepeque</option>
                    <option value="Olancho">Olancho</option>
                    <option value="Santa Bárbara">Santa Bárbara</option>
                    <option value="Valle">Valle</option>
                    <option value="Yoro">Yoro</option>
                </select>

                <x-jet-label for="municipio" value="{{ __('Municipio') }}" />
                <x-jet-input id="municipio" class="block mt-1 w-full" type="text" name="municipio" :value="old('municipio')" required autofocus autocomplete="municipio" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>

    </x-jet-authentication-card>
</x-guest-layout>
