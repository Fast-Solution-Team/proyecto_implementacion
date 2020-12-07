@extends('admin')

@section('content')
    <div>

    <div xmlns:wire="http://www.w3.org/1999/xhtml">



<div class="mt-10 sm:mt-0 ">
  <div class="md:grid md:grid-cols-3 md:gap-3 ">
    
    <div class="mt-5 md:mt-0 md:col-span-6">
      <form action="{{ route('depositos.update',$id) }}" method="POST">

      {{ csrf_field() }}
      {{ method_field('PUT') }}
                
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6 bg-gray-300">
          
          <br>


            <div class="col-span-6">
                <label for="street_address" class="block text-sm font-medium text-gray-700">Codigo de Cartera</label>
                <label class="block text-sm font-medium text-gray-700">{{$id}}</label>
               
                </div>

            <br>
            <div class="grid grid-cols-6 gap-6 "  >
               <div class="col-span-6 sm:col-span-5">
                <label class="block text-sm font-medium text-gray-700">Monto de Deposito</label>
                <input type="number" name="cantidad_dp" id="cantidad_dp" placeholder="XXXX.XX" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
              </div>          
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Aceptar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>


  <div class="hidden sm:block" aria-hidden="true">
  <div class="py-5">
    <div class="border-t border-gray-200"></div>
  </div>
</div>
   
    <div class="flex flex-col">
        <!-- Stats Row Starts Here -->
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
            <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                    {{ __('L.') }} {{Auth::user()->getSaldoAttribute()}}
                    </a>
                    <a href="#" class="no-underline text-white text-lg">
                        Saldo
                    </a>
                </div>
            </div>
            <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                    {{Auth::user()->getNumDepositos()}} 
                    </a>
                    <a href="#" class="no-underline text-white text-lg">
                        Depositos realizados
                    </a>
                </div>
            </div>



        </div>

        <!-- /Stats Row Ends Here -->

        <!-- Card Sextion Starts Here -->
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

            <!-- card -->

            <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">

                <div class="px-6 py-2 border-b border-light-grey">

                    <div class="font-bold text-xl">Depositos</div>
                </div>
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
                    <table class="table text-grey-darkest">
                        <thead class="bg-grey-dark text-white text-normal">
                        <tr>
                            <th scope="col">Id billetera</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Identidad</th>
                            <th scope="col">Domicilio</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Saldo anterior</th>
                            <th scope="col">Saldo posterior</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($depositos as $value )

                            <tr>

                                <td>{{$value->ID_BILLETERA}}</td>
                                <td>{{$value->name}} {{$value->second_name}} {{$value->lastname}} {{$value->second_lastname}}</td>
                                <td>{{$value->identidad}}</td>
                                <td>{{$value->direccion}}</td>
                                <td>{{$value->FECHA_MOVIMIENTO}}</td>
                                <td>{{$value->MONTO_TRANSACCION}}</td>
                                <td>{{$value->SALDO_ANTERIOR}}</td>
                                <td>{{$value->SALDO_POSTERIOR}}</td>




                            </tr>

                        @endforeach




                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /card -->

        </div>
        <!-- /Cards Section Ends Here -->

        <!-- Progress Bar -->
        <!--Profile Tabs-->
        <!--/Profile Tabs-->
    </div>
</div>

    </div>
@endsection
