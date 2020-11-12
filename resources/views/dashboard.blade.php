<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Esta sera la pagina de inicio') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}
    <link href="https://unpkg.com/tailwindcss@1.6.2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .w-70 {
            width: 20rem;
        }
    </style>
            <style>
                .w-70 {
                    width: 20rem;
                }
            </style>

            <section class="bg-blue-200 blog text-gray-700 body-font">
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                        <h1 class="md:text-3xl text-2xl font-bold title-font mb-2 text-blue-500"> Emoney</h1>
                        <p class="lg:w-1/2 w-full leading-relaxed font-bold text-base">
                            A traves de tu billetera electronica podras encontrar la forma mas rapida y segura para realizar tus transacciones mediante el sitio web.  </p>
                    </div>
                    <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
                        <div class="p-4 md:w-1/3 md:mb-0 mb-6 flex flex-col justify-center items-center max-w-sm mx-auto">
                            <div class="bg-gray-300 h-56 w-full rounded-lg shadow-md bg-cover bg-center" style="background-image: url(https://www.sabermassermas.com/wp-content/uploads/2018/08/transacciones-financieras.png)"></div>

                            <div class=" w-70 bg-white -mt-10 shadow-lg rounded-lg overflow-hidden p-5">

                                <div class="header-content inline-flex ">
                                    <div class="category-badge flex-1  h-4 w-4 m rounded-full m-1 bg-purple-100">
                                        <div class="h-2 w-2 rounded-full m-1 bg-purple-500 " ></div>
                                    </div>
                                    <div class="title-post font-medium">TRANSACCIONES</div>
                                </div>


                                <div class="summary-post text-base text-justify">Realiza tu envió de dinero y pago de servicios de manera mas segura y sin salir de tu casa, a través de tu billetera electrónica.
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold block rounded p-2 text-md " ><a href="{{route('tr.mostrar')}}">IR</a></button>
                                </div>

                            </div>
                        </div>

                        <div class="p-4 md:w-1/3 md:mb-0 mb-6 flex flex-col justify-center items-center max-w-sm mx-auto">
                            <div class="bg-gray-300 h-56 w-full rounded-lg shadow-md bg-cover bg-center" style="background-image: url(https://www.baccredomatic.com/sites/default/files/movil640x456-cambiopin.jpg)"></div>

                            <div class=" w-70 bg-white -mt-10 shadow-lg rounded-lg overflow-hidden p-5">

                                <div class="header-content inline-flex ">
                                    <div class="category-badge flex-1  h-4 w-4 m rounded-full m-1 bg-yellow-100">
                                        <div class="h-2 w-2 rounded-full m-1 bg-yellow-500 " ></div>
                                    </div>
                                    <div class="title-post font-medium">CAMBIO DE PIN</div>
                                </div>

                                <div class="summary-post text-base text-justify">Recuerda que tu nuevo pin: debe ser de 4 dígitos, solo debe contener números y no letras, no pueden ser números seguidos, ej. 1234, tampoco deben ser números repetidos, ej. 2222.
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold block rounded p-2 text-md " >IR</button>
                                </div>

                            </div>
                        </div>

                        <div class="p-4 md:w-1/3 md:mb-0 mb-6 flex flex-col justify-center items-center max-w-sm mx-auto">
                            <div class="bg-gray-300 h-56 w-full rounded-lg shadow-md bg-cover bg-center" style="background-image: url(https://www.binaria.com.ve/wp-content/uploads/2020/03/Reportes-peri%C3%B3dicos-1024x683.jpg)"></div>

                            <div class=" w-70 bg-white -mt-10 shadow-lg rounded-lg overflow-hidden p-5">

                                <div class="header-content inline-flex ">
                                    <div class="category-badge flex-1  h-4 w-4 m rounded-full m-1 bg-green-100">
                                        <div class="h-2 w-2 rounded-full m-1 bg-green-500 " ></div>
                                    </div>
                                    <div class="title-post font-medium">MOVIMIENTOS</div>
                                </div>

                                <div class="summary-post text-base text-justify">Te ayudara a obtener mayor información específica sobre alguna transacción que hayas realizado.
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold block rounded p-2 text-md " >IR</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
</x-app-layout>
