<div>
    <form class="space-y-2" wire:submit.prevent="submit">
        <h5 class="text-xl font-bold text-gray-900 dark:text-white">Curacion leve y dotacion de esparadrapo</h5>
        
        <!-- Campo Código -->
        <div>
            <label for="codigo" class="block mb-1 text-sm md:text-md font-medium text-gray-900 dark:text-white">Código</label>
            <input type="number" wire:model.live="codigo" name="codigo" id="codigo"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="Codigo Soalpro" />
            @error('codigo')
                <p class="mt-2 text-sm md:text-md text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Trabajador -->
        <div>
            <label for="nombre" class="block mb-1 text-sm md:text-md font-medium text-gray-900 dark:text-white">Trabajador</label>
            <input type="text" wire:model="nombre" name="nombre" id="nombre" disabled
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="Nombre del trabajador" />
            @error('trabajador_id')
                <p class="mt-2 text-sm md:text-md text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="detalle" class="block mb-2 text-sm md:text-md font-medium text-gray-900 dark:text-white">Detalle </label>
            <textarea id="detalle" rows="4" wire:model="detalle"
                class="block p-2.5 w-full text-sm md:text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escriba la situacion por la cual el trabajador necesita de la dotacion"></textarea>
        </div>
        <div class="flex gap-4">
        <div class="flex items-center p-2">
            <div class="flex items-center">
                <input id="esparatrapo" type="checkbox" wire:model="esparatrapo"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="esparatrapo" class="text-sm font-medium text-gray-900 dark:text-white">Esparadrapo</label>
            </div>
        </div>

        <div class="flex items-center p-2">
            <div class="flex items-center">
                <input id="guante" type="checkbox" wire:model="guante"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="guante" class="text-sm font-medium text-gray-900 dark:text-white">Guante(s)</label>
            </div>
        </div>
    </div>
        <!-- Observaciones  -->
        
        <div>
            <label for="observaciones" class="block mb-2 text-sm md:text-md font-medium text-gray-900 dark:text-white">Observaciones</label>
            <textarea id="observaciones" rows="4" wire:model="observaciones"
                class="block p-2.5 w-full text-sm md:text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escriba alguna anormalidad al momento de la revisión"></textarea>
        </div>
        
        
        

        <!-- Botón de envío -->
        <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm md:text-md px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Registrar
        </button>
    </form>
</div>
