<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Emoney</title>

        <!-- Fonts -->
        <!-- Styles -->

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://unpkg.com/tailwindcss@1.6.2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./dist/styles.css">
        <link rel="stylesheet" href="./dist/all.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            @livewire('navigation-dropdown')

            <!-- Page Content -->
            <div class="bg-gray-200">
                <div class="flex flex-col float-left overflow-hidden">
                    <div class="w-64 h-screen bg-white border-r-4 border-blue-700">
                        <div class="flex items-center justify-center mt-10">
                            <label class="font-bold text-gray-800 text-3xl border-blue-700 border-b-4">TRANSACCIONES</label>
                        </div>

                        <nav class="mt-10">
                            <a class="flex items-center mt-5 py-2 px-8 text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500 focus:bg-gray-200 focus:text-gray-700 focus:font-bold focus:border-blue-500 focus: border-r-4" href="{{route('/servicioenviodinero')}}">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <span class="mx-4 font-medium">Envio de Dinero</span>
                            </a>

                            <a class="flex items-center mt-5 py-2 px-8 text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500 focus:bg-gray-200 focus:text-gray-700 focus:font-bold focus:border-blue-500 focus: border-r-4" href="{{route('pago.servicio')}}">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <span class="mx-4 font-medium">Pago de Servicios</span>
                            </a>
                            
                            <a class="flex items-center mt-5 py-2 px-8 text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-blue-500 focus:bg-gray-200 focus:text-gray-700 focus:font-bold focus:border-blue-500 focus: border-r-4" href="{{route('deposito.efectivo')}}">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <span class="mx-4 font-medium">Deposito Efectivo</span>
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
