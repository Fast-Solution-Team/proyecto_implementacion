@extends('transacciones')

@section('content')
  

<div class="mt-10 sm:mt-0 ">
  <div class="md:grid md:grid-cols-3 md:gap-3 ">
    
    <div class="mt-5 md:mt-0 md:col-span-6">
      <form action="{{ route('deposito.update',$id) }}" method="POST">

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


              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="city" class="block text-sm font-medium text-gray-700">Cuenta deposito</label>
                <label for="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">{{$saldo}}</label>
                <div hidden>
                 <input type="input" name="usuario" id="usuario" value="{{$usuario}}">
             
                </div>
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
   
  
@endsection
