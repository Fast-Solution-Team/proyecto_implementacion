<x-guest-layout>

    <div class="w-full flex flex-wrap">
        <!-- Register Section -->
        <div class="w-full md:w-1/2 flex flex-col">
            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-12">
                <a href="#" class="bg-black text-white font-bold text-xl p-4">Emoney</a>
            </div>
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">

                <p class="text-center text-3xl">Registro</p>
                <form method="POST" class="flex flex-col pt-3 md:pt-8" action="{{ route('register') }}">
                    @csrf
                    <x-jet-validation-errors class="mb-4"/>
                    <div class="row">
                        <div class="col s6">
                            <x-jet-label for="name" class="text-lg" value="{{ __('Nombre') }}"/>
                            <input id="name"
                                   class="shadow appearance-none border rounded focus:border-blue-400 w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                                   type="text" name="name" :value="old('name')"
                                   required
                                   autofocus autocomplete="name"/>
                        </div>
                        <div class="col s6">
                            <x-jet-label for="second_name" class="text-lg" value="{{ __('Segundo Nombre') }}"/>
                            <input id="second_name"
                                   class="shadow appearance-none border rounded focus:border-blue-400 w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                                   type="text" name="second_name"
                                   :value="old('second_name')" required autofocus autocomplete="second_name"/>
                        </div>
                        <div class="col s6">
                            <x-jet-label for="lastname" class="text-lg" value="{{ __('Apellido') }}"/>
                            <input id="lastname"
                                   class="shadow appearance-none border rounded focus:border-blue-400 w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                                   type="text" name="lastname"
                                   :value="old('lastname')" required autofocus autocomplete="lastname"/>
                        </div>
                        <div class="col s6">
                            <x-jet-label for="Second_lastname" class="text-lg" value="{{ __('Segundo Apellido') }}"/>
                            <input id="second_lastname"
                                   class="shadow appearance-none border rounded focus:border-blue-400 w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                                   type="text" name="second_lastname"
                                   :value="old('second_lastname')" required autofocus autocomplete="second_lastname"/>
                        </div>
                        <div class="col s12">
                            <x-jet-label for="fec_nac" class="text-lg" value="{{ __('Fecha de nacimiento') }}"/>
                            <input id="fec_nac"
                                   class="shadow appearance-none border rounded focus:border-blue-400 w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                                   type="date" name="fec_nac"
                                   :value="old('fec_nac')"
                                   required autofocus autocomplete="fec_nac" value="1995-01-01"/>
                        </div>
                        <div class="col s12">
                            <x-jet-label for="identidad" class="text-lg" value="{{ __('Identidad') }}"/>
                            <input id="identidad"
                                   class="shadow appearance-none border rounded focus:border-blue-400 w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                                   type="number" name="identidad"
                                   :value="old('identidad')" required autofocus autocomplete="identidad"/>
                        </div>
                        <div class="col s12">
                            <x-jet-label for="Sexo" class="text-lg" value="{{ __('Genero') }}"/>
                            <select id="sexo"
                                    class="browser-default shadow appearance-none border rounded focus:border-blue-400 w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                                    name="sexo">
                                <option value="">Genero...</option>
                                <option value="m">Masculino</option>
                                <option value="f">Femenino</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <x-jet-label for="direccion" class="text-lg" value="{{ __('Direccion') }}"/>
                            <input id="direccion"
                                   class="shadow appearance-none border rounded focus:border-blue-400 w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                                   type="text" name="direccion"
                                   :value="old('direccion')" required autofocus autocomplete="direccion"/>
                        </div>
                        <div class="mt-4 col s12">
                            <x-jet-label for="departamento" class="text-lg" value="{{ __('Departamento') }}"/>
                            <select id="depaartamento"
                                    class="browser-default shadow appearance-none border rounded focus:border-blue-400 w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                                    name="departamento">
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
                        </div>
                        <div class="col s12">
                            <x-jet-label for="municipio" class="text-lg" value="{{ __('Municipio') }}"/>
                            <input id="municipio"
                                   class="shadow appearance-none border rounded focus:border-blue-400 w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                                   type="text" name="municipio"
                                   :value="old('municipio')" required autofocus autocomplete="municipio"/>
                        </div>

                        <div class="mt-4 col s12">
                            <x-jet-label for="email" class="text-lg" value="{{ __('Email') }}"/>
                            <input id="email"
                                   class="shadow appearance-none border rounded focus:border-blue-400 w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                                   type="email" name="email"
                                   :value="old('email')"
                                   required/>
                        </div>

                        <div class="mt-4 col s6">
                            <x-jet-label for="password" class="text-lg" value="{{ __('Contraseña') }}"/>
                            <input id="password"
                                   class="shadow appearance-none border rounded focus:border-blue-400 w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                                   type="password" name="password" required
                                   autocomplete="new-password"/>
                        </div>

                        <div class="mt-4 col s6">
                            <x-jet-label for="password_confirmation" class="text-lg"
                                         value="{{ __('Confirmar Contraseña') }}"/>
                            <input id="password_confirmation"
                                   class="shadow appearance-none border rounded focus:border-blue-400 w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                                   type="password"
                                   name="password_confirmation" required autocomplete="new-password"/>
                        </div>
                    </div>
                    <div class="text-center pt-12 pb-12">
                        <a class="underline font-semibold" href="{{ route('login') }}">
                            {{ __('ya estas registrado?') }}
                        </a>

                        <x-jet-button class="ml-4 waves-effect pulse cyan">
                            {{ __('Guardar') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="responsive-img"
                 src="https://source.unsplash.com/IXUM4cJynP0">
        </div>
    </div>
</x-guest-layout>
