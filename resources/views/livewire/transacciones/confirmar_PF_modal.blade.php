<!-- component -->
<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 " xmlns:wire="http://www.w3.org/1999/xhtml">
<div  class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full">
    <div class="bg-white justify-center overflow-hidden border-4 border-blue-500 rounded-lg w-1/2">
        <div class="flex flex-col items-start  bg-white-medium">
            <div class="flex items-center bg-gray-200 w-full">
                <div class="text-gray-900 px-4 font-bold text-lg">Confirmacion del Pago</div>
                <svg class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                </svg>
            </div>
            <hr>
            <div class="pt-2">
                <p class="px-4">{{$mensaje_modal}}</p>
                <p class="px-4">{{$servicio_pagar}}</p>
                <p class="px-4">{{$monto_pagar}}</p>
            </div>
            <hr>
            <div class="ml-auto">
                <button wire:click.prevent="cerrarModal()" class="bg-red-500 hover:bg-red-700 mr-4 mb-4 text-white font-bold py-2 px-4 rounded">
                    Cancelar
                </button>
                <button wire:click.prevent="confirmarPago()" class="bg-green-500 hover:bg-green-700 mr-4 mb-4 text-white font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
</div>
