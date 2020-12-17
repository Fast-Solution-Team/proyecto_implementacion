<div xmlns:wire="http://www.w3.org/1999/xhtml">

   <div class="flex flex-col">
        <!-- Stats Row Starts Here -->


        <!-- /Stats Row Ends Here -->

        <!-- Card Sextion Starts Here -->
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

            <!-- card -->

            <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">

                <div class="px-6 py-2 border-b border-light-grey">

                    <div class="font-bold text-xl">Usuarios</div>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Sorry!</strong> invalid input.<br><br>
                        <ul style="list-style-type:none;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if($updateMode)
                    @include('livewire.edit-User')
                @endif
                <!-- component -->
                <div class="table-responsive">
                    <table class="table text-grey-darkest table-striped" style="margin-top:20px;" id="tablax">
                        <thead class="bg-gray-800 text-white text-normal">
                        <tr>
                            <th scope="col">Id billetera</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Identidad</th>
                            <th scope="col">Fecha de Nacimineto</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Estado cliente</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Saldo</th>
                            <th scope="col">rol</th>
                            <th scope="col" colspan="1">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->id_billetera}}</td>
                                <td>{{$usuario->name}} {{$usuario->second_name}} {{$usuario->lastname}} {{$usuario->second_lastname}}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->identidad}}</td>
                                <td>{{$usuario->fec_nac}}</td>
                                <td>{{$usuario->sexo}}</td>
                                <td>{{$usuario->estado_cliente}}</td>
                                <td>{{$usuario->direccion}} / {{$usuario->getDepto()}} / {{$usuario->getMunicipio()}}</td>
                                <td>{{$usuario->getSaldoAttribute()}}</td>
                                <td>{{ implode( ", ",$usuario->getRoleNames()->toArray())}}</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-danger py-0" wire:click="edit({{$usuario->id}})">
                                        Editar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$usuarios->links('pagination-links')}}
            </div>
            <!-- /card -->

        </div>
        <!-- /Cards Section Ends Here -->

        <!-- Progress Bar -->
        <!--Profile Tabs-->
        <!--/Profile Tabs-->
    </div>
</div>
