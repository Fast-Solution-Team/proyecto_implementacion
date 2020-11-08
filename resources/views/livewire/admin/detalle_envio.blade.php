<div wire:ignore.self id='detalleEnvio' class="modal-wrapper" xmlns:wire="http://www.w3.org/1999/xhtml">
        <div class="overlay close-modal"></div>
        <div class="modal">
            <div class="modal-content shadow-lg p-5">
                <div class="border-b p-2 pb-3 pt-0 mb-4">
                    <div class="flex justify-between items-center">
                        Detalle de billetera destino
                        <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                        <i class="fas fa-times text-gray-700"></i>
                    </span>
                    </div>
                </div>
                <!-- Modal content -->
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                    Billetera
                </label>
                {{$this->id_billetera}}
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                    Nombre
                </label>
                     {{$this->name}}

                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                    Identidad
                </label>
                {{$this->identidad}}
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                    Fecha de nacimiento
                </label>
                {{$this->fecha_nac}}
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                    Sexo
                </label>
                {{$this->sexo}}
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                    Correo
                </label>
                {{$this->email}}
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                    Direccion
                </label>
                {{$this->direccion}}





            </div>
        </div>
    </div>

