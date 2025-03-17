<div class=" p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-4 md:p-6 dark:bg-gray-800 dark:border-gray-700">
    <form wire:submit.prevent="submit" novalidate>
        @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Amasado</h5>
        
        
        <div class="flex items-center p-2">
            <label for="tiempo_amasado1" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Tiempo de amasado 1 CTTE:
            </label>
            <input type="number" wire:model="tiempo_amasado1" name="tiempo_amasado1" id="tiempo_amasado1"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="Tiempo de amasado" />
            @error('tiempo_amasado1')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="tiempo_amasado2" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Tiempo de amasado 2 con levadura:
            </label>
            <input type="number" wire:model="tiempo_amasado2" name="tiempo_amasado2" id="tiempo_amasado2"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="Tiempo de amasado" />
            @error('tiempo_amasado2')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="number" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Temperatura
            </label>
            <input type="text" wire:model="temperatura" name="temperatura" id="temperatura"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="Temperatura" />
            @error('temperatura')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="observaciones"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observaciones</label>
            <textarea id="observaciones" rows="4" wire:model="observaciones" value="{{ old('observaciones') }}"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escriba alguna anormalidad al momento de la revision."></textarea>
        </div>
        <div>
            <label for="correccion"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Accion
                Correctiva</label>
            <textarea id="correccion" rows="4" wire:model="correccion" value="{{ old('correccion') }}"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escriba la accion que realizo para resolver la observacion."></textarea>
        </div>




        <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>

    </form>
</div>
