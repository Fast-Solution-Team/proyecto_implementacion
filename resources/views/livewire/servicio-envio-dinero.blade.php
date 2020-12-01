<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <main class="bg-white-500 flex-1 p-3 overflow-hidden">

        <div class="flex flex-col">
     <div class="   flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <!--Horizontal form-->
        <div class="  mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-1/2">
            <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                Envio de dinero
            </div>
            <div class=" bg-gray-500 p-3">
                <form class="w-full">
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/4">
                            <label class="block text-grey font-regular md:text-right mb-1 md:mb-0 pr-4"
                                   for="inline-full-name">
                                Billetera
                            </label>
                        </div>
                        <div class="md:w-3/4">
                            <input wire:model="billetera" class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                   id="inline-full-name" type="text" >
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/4">
                            <label class="block text-grey font-regular md:text-right mb-1 md:mb-0 pr-4"
                                   for="inline-username">
                                Monto
                            </label>
                        </div>
                        <div class="md:w-3/4">
                            <input wire:model="monto" class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                   id="inline-username" type="text"
                                   placeholder="10000">
                        </div>
                    </div>

                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                            <button wire:click.prevent="enviardinero()" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                    type="button">
                               Enviar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    </main>
@if($openErrorBilletera == 'openErrorBilletera')
@include('livewire.transacciones.error_billetera')
    @endif

    @if($openConfirmarEnvio == 'abrir')
        @include('livewire.transacciones.moddal_confirmar_envio')
    @endif
</div>
</div>

