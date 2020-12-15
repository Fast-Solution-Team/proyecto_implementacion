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
                <div class="relative text-gray-600">
                    <input type="search" wire:model="search" placeholder="Search" class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
                    <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
      <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
    </svg>
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table text-grey-darkest table-striped" style="margin-top:20px;">
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
                            <th scope="col" colspan="2">&nbsp;</th>
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
                                <td>
                                    <button class="btn btn-sm btn-outline-danger py-0" wire:click="edit({{$usuario->id}})">
                                        Eliminar
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
