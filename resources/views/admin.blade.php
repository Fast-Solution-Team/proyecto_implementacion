<!DOCTYPE html>
<html lang="en">

<head>
    @livewireStyles

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://unpkg.com/tailwindcss@1.6.2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Administrador</title>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-800">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <a href="{{route('dashboard')}}" class="text-white hover:text-yellow-400 hover:font-medium p-2">Inicio</a>
                </div>
                <div class="p-1 flex flex-row items-center">


                     <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">{{Auth::user()->name}} {{Auth::user()->lastname}}</a>

                </div>
            </div>
        </header>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                        {{ __('SALIR') }}
                    </x-jet-dropdown-link>
                </form>

                <ul class="list-reset flex flex-col">
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{route('/usuariosadmin')}}"
                           class="font-medium font-hairline hover:font-normal text-sm text-nav-item no-underline">
                           <i class="fas fa-users float-left mx-2"></i>
                            Usuarios
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>

                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{route('/retiros')}}"
                           class="font-medium font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-hand-holding-usd float-left mx-2"></i>
                            Retiros
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{route('/depositos')}}"
                           class="font-medium font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-credit-card float-left mx-2"></i>
                            Depositos
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>

                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{route('/pago')}}"
                           class="font-medium font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-shopping-cart float-left mx-2"></i>
                            Pago de Servicios
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{route('/envios')}}"
                           class="font-medium font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-credit-card float-left mx-2"></i>
                            Envio de dinero
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>

                    <li class="w-full h-full py-4 px-4 border-b border-300-border hover:bg-white-medium">
                        <a href="#" class=" font-normal font-hairline text-sm text-nav-item no-underline">

                           TRANSACCIONES

                        </a>
                    </li>

                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{route('efectuar.deposito')}}"
                           class="font-medium font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-user-check float-left mx-2"></i>
                            Efectuar Deposito
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>

                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{route('/servicioretiros')}}"
                           class="font-medium font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-user-check float-left mx-2"></i>
                            Efectuar Retiros
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>



                </ul>


            </aside>
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-300 flex-1 p-12 overflow-hidden">

            @yield('content')
                @livewireScripts

                @stack('scripts')
                <script type="text/javascript">





                </script>

            </main>

            <!--/Main-->
        </div>
        <!--Footer-->
        <footer class="bg-gray-800 text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; My Design</div>
        </footer>
        <!--/footer-->

    </div>

</div>
@stack('modals')
@livewireScripts
 </body>


<script src="{{asset('js/main.js')}} "></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="dashboard.js"></script>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
</script>
<!-- DATATABLES -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
</script>
<!-- BOOTSTRAP -->
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
</script>
<script>
    $(document).ready(function () {
        $('#tablax').DataTable({
            language: {
                processing: "Tratamiento en curso...",
                search: "Buscar&nbsp;:",
                lengthMenu: "Agrupar de _MENU_ usuarios.",
                info: "Mostrando del _START_ al _END_ de un total de _TOTAL_ usuarios.",
                infoEmpty: "No existen datos.",
                infoFiltered: "(filtrado de _MAX_ elementos en total)",
                infoPostFix: "",
                loadingRecords: "Cargando...",
                zeroRecords: "No se encontraron datos con tu busqueda",
                emptyTable: "No hay datos disponibles en la tabla.",
                paginate: {
                    first: "Primero",
                    previous: "Anterior",
                    next: "Siguiente",
                    last: "Ultimo"
                },
                aria: {
                    sortAscending: ": active para ordenar la columna en orden ascendente",
                    sortDescending: ": active para ordenar la columna en orden descendente"
                }
            },
            scrollY: 400,
            lengthMenu: [[10, 25, -1], [10, 25, "Todos"]],
        });
    });
</script>


</html>
