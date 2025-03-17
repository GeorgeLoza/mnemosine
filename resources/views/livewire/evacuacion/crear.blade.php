<div>
    <form wire:submit.prevent="save">
        <div>
            <label for="turno"
                class=" capitalize block mb-1 text-sm md:text-md font-medium text-gray-900 dark:text-white">turno</label>
            <select id="turno" wire:model="turno"
                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                <option selected>Escoje una turno</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            @error('turno')
                <p class="mt-2 text-sm md:text-md text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <h5 class="text-xl font-bold text-gray-900 dark:text-white">Evacucion de residuos</h5>
        <div class="grid grid-cols-2 md:grid-cols-3">
            @foreach (['zunino', 'molde', 'hiline', 'reposteria', 'hi_line_bk', 'grissin', 'hornos', 'codificado', 'embolsado_t1', 'embolsado_t2', 'embolsado_pan_molde', 'embolsado_bk', 'embolsado_reposteria', 'embolsado_grissin'] as $field)
                <div class="flex items-center mb-4">
                    <input id="{{ $field }}" type="checkbox" value="Bien" wire:model="{{ $field }}"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="{{ $field }}"
                        class="capitalize ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{ str_replace('_', ' ', $field) }}
                    </label>
                </div>
            @endforeach

        </div>
        <div>
            <label for="observacion"
                class="capitalize ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Observacion</label>
            <textarea id="observacion" rows="2" wire:model="observacion"
                class="block p-2.5 w-full text-sm md:text-lg text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escriba alguna anormalidad al momento de la revisión"></textarea>
        </div>

        <div>
            <label for="correccion"
                class="capitalize ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Acción
                Correctiva</label>
            <textarea id="correccion" rows="2" wire:model="correccion"
                class="block p-2.5 w-full text-sm md:text-lg text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escriba la acción que realizó para resolver la observación"></textarea>
        </div>
        <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm md:text-md px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Registrar
        </button>
    </form>
</div>
