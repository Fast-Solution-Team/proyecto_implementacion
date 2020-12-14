<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <link href="https://unpkg.com/tailwindcss@1.6.2/dist/tailwind.min.css" rel="stylesheet">
    <div class=" ml-5 mx-auto w px-5 rounded mt-10">
            <div class="container rounded bg-blue-200 max-w-md">
                <x-jet-label class="text-lg text-center font-bold " value="Efectuar Deposito"/>
            </div>
           <div class="bg-blue-500 rounded">
          
                <div class="rounded">
                   <input wire:model="billetera" id="billetera" class="shadow appearance-none ml-5 mt-3 border rounded focus:border-red-400 w-3/4 py-2 px-3 text-gray-700 mt-1 leading-tight"  type="numeric" name="billetera" placeholder="Ingrese una billetera: Ejm:101021390128039"/>
               </div>
               <div class="rounded">
                   <input wire:model="monto" id="monto" class="shadow appearance-none ml-5 mt-3 border rounded focus:border-red-400 w-3/4 py-2 px-3 text-gray-700 mt-1 leading-tight"  type="numeric" name="monto" placeholder="Ingrese un monto Ejem:1500"/>
               </div>
              
               @error('billetera')
               <div><span class="ml-5 error text-red-800 font-bold italic">{{ $message }}</span></div>
               @enderror
               @error('monto')
               <div><span class="ml-5 error text-red-800 font-bold italic">{{ $message }}</span></div>
               @enderror
               <div class="rounded">
                   <x-jet-button wire:click.prevent="enviardinero()" class="ml-4 ml-5 mt-3 mb-5">Depositar</x-jet-button>
               </div>
           </div>
    </div>
    @if($openErrorBilletera == 'openErrorBilletera')
        @include('livewire.admin.error_billetara')
    @endif

    @if($openConfirmarEnvio == 'abrir')
        @include('livewire.admin.confimar_desposito')
    @endif

</div>
