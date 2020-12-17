<div class="w-full" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="flex flex-wrap justify-between items-center mb-16">
        <input type="hidden" wire:model="selected_id">
        <div class="w-auto pr-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">Nombre</label>
            <input wire:model="name" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border {{ $errors->has('name') ? ' border-red-500' : 'border-gray-200' }} rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white">
            @error('name')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-auto px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">Email</label>
            <input wire:model="email" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border {{ $errors->has('email') ? ' border-red-500' : 'border-gray-200' }} rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" >
            @error('email')
            <span class="text-red-500 text-xs italic py-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-auto px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">Estado cliente</label>
            <input wire:model="estado_cliente" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border {{ $errors->has('estado_cliente') ? ' border-red-500' : 'border-gray-200' }} rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @error('estado_cliente')
            <span class="text-red-500 text-xs italic py-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-auto px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="rol_asign">Rol:</label>
            <input wire:model="rol_asign" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border {{ $errors->has('rol_asign') ? ' border-red-500' : 'border-gray-200' }} rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" >
            @error('rol_asign')
            <span class="text-red-500 text-xs italic py-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-auto pl-3 text-right">
            <button wire:click="update()" class="px-3 py-2 bg-orange-200 text-orange-500 hover:bg-orange-500 hover:text-orange-100 rounded">Actualizar Usuario</button>
        </div>
    </div>
</div>
