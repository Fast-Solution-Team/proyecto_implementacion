<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <link href="https://unpkg.com/tailwindcss@1.6.2/dist/tailwind.min.css" rel="stylesheet">
    <div class=" ml-5 mx-auto w px-5 rounded mt-10">
            <div class="container rounded bg-blue-200 max-w-md">
                <x-jet-label class="text-lg text-center font-bold " value="Efectuar Pago"/>
            </div>
           <div class="bg-blue-500 rounded">
               <select id="servicio" wire:model="servicio"
                       class="browser-default shadow appearance-none border rounded focus:border-blue-400 w-3/4 ml-5 mt-2 py-2 px-3 text-gray-700 mt-1 leading-tight"
                       name="servicio">
                   <option value="">{{"<<<Seleccione el Servicio>>>"}}</option>
                   <option value="1">Energia Electrica</option>
                   <option value="2">Internet</option>
                   <option value="3">Telefono</option>
                   <option value="4">Agua</option>
               </select>
               @error('servicio')
               <div><span class="ml-5 error text-red-800 font-bold italic">{{ $message }}</span></div>
               @enderror
               <div class="rounded">
                   <input wire:model="monto" id="monto" class="shadow appearance-none ml-5 mt-3 border rounded focus:border-red-400 w-3/4 py-2 px-3 text-gray-700 mt-1 leading-tight"  type="numeric" name="monto" placeholder="Ingrese un monto Ejem:1500"/>
               </div>
               @error('monto')
               <div><span class="ml-5 error text-red-800 font-bold italic">{{ $message }}</span></div>
               @enderror
               <div class="rounded">
                   <x-jet-button wire:click="store" class="ml-4 ml-5 mt-3 mb-5">ACEPTAR</x-jet-button>
               </div>
           </div>
    </div>
    <div>
        @if (session()->has('ok'))
            <div class="alert alert-success">
                @include('livewire.transacciones.ok_notificacion')
            </div>
        @endif
        @if (session()->has('error1'))
                <div class="alert alert-success">
                    @include('livewire.transacciones.error_notificacion')
                </div>
            @endif
            @if (session()->has('error2'))
                <div class="alert alert-success">
                    @include('livewire.transacciones.error_notificacion')
                </div>
            @endif
            @if (session()->has('error3'))
                <div class="alert alert-success">
                    @include('livewire.transacciones.error_notificacion')
                </div>
            @endif
    </div>

</div>
