<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @livewireStyles

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Emoney</title>
</head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            @livewire('navigation-dropdown')

            <!-- Page Content -->
            <div class=" bg-white">
                <div class="flex flex-col float-left overflow-hidden">
                    <div class=" w-64 h-screen bg-white border-r-4  border-blue-700 ">
                        <div class="flex items-center justify-center mt-10">
                            <label class="font-bold text-gray-800 text-3xl border-blue-700 border-b-4">MOVIMIENTOS</label>
                        </div>

                        <nav class="mt-10">
                            <a class="flex items-center mt-5 py-2 px-8 text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500 focus:bg-gray-200 focus:text-gray-700 focus:font-bold focus:border-blue-500 focus: border-r-4" href="{{route('/retiroscliente')}}">
                                <svg class="h-6 w-6 text-gray-600"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"/>  <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                                    <path d="M4 6v6a8 3 0 0 0 16 0v-6" />
                                    <path d="M4 12v6a8 3 0 0 0 16 0v-6" /></svg>

                                <span class="mx-4 font-medium">Retiros</span>
                            </a>

                            <a class="flex items-center mt-5 py-2 px-8 text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500 focus:bg-gray-200 focus:text-gray-700 focus:font-bold focus:border-blue-500 focus: border-r-4" href="{{route('/depositoscliente')}}">
                                <svg class="h-6 w-6 text-gray-600"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"/>
                                </svg>

                                <span class="mx-4 font-medium">Depositos</span>
                            </a>

                            <a class="flex items-center mt-5 py-2 px-8 text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500 focus:bg-gray-200 focus:text-gray-700 focus:font-bold focus:border-blue-500 focus: border-r-4" href="{{route('/pagoscliente')}}">
                                <svg class="h-6 w-6 text-gray-600"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>


                                <span class="mx-4 font-medium">Pago de Servicios</span>
                            </a>

                            <a class="flex items-center mt-5 py-2 px-8 text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500 focus:bg-gray-200 focus:text-gray-700 focus:font-bold focus:border-blue-500 focus: border-r-4" href="{{route('/envioscliente')}}">
                                <svg class="h-6 w-6 text-gray-600"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 0 0 0 4h2a2 2 0 0 1 0 4h-2a2 2 0 0 1 -1.8 -1" />  <path d="M12 6v2m0 8v2" /></svg>

                                <span class="mx-4 font-medium">Envio de Dinero</span>
                            </a>

                            <a class="flex items-center mt-5 py-2 px-8 text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500 focus:bg-gray-200 focus:text-gray-700 focus:font-bold focus:border-blue-500 focus: border-r-4" href="{{route('/recibidoscliente')}}">
                                <svg class="h-6 w-6 text-gray-600"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="12" y1="1" x2="12" y2="23" />  <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" /></svg>

                                <span class="mx-4 font-medium">Dinero Recibido</span>
                            </a>
                        </nav>
                    </div>
                </div>
                <main class="bg-white overflow-hidden">
                    @yield('content')
                    @livewireScripts
                    @stack('scripts')
                </main>

            </div>

        </div>
        @stack('modals')
    </body>
</html>
