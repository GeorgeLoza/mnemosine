<div class=" p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-4 md:p-6 dark:bg-gray-800 dark:border-gray-700">
    <form wire:submit.prevent="submit" novalidate>
        @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Dimensiones</h5>
        <div class="flex items-center p-2">
            <label for="codigo" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Código de responsable: </label>
            <input type="number" wire:model.live="codigo" name="codigo" id="codigo"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="Codigo Soalpro" />
            @error('codigo')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center p-2">
            <label for="nombre" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Trabajador:
            </label>
            <input type="text" wire:model="nombre" name="nombre" id="nombre" disabled
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="Nombre del trabajador" />
            @error('trabajador_id')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="preparacion" class="block mb-2 w-3/6 text-sm font-medium text-gray-900 dark:text-white">Buscar preparaciones</label>
            <select id="preparacion" wire:model="preparacion"
                class="w-3/6 bg-gray-50 border p-1 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Escoge una preparación</option>
                @foreach ($preparaciones as $preparacion)
                    <option value="{{ $preparacion }}">{{ $preparacion }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center p-2">
            <label for="altura_total" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Altura Total [cm]:
            </label>
            <input type="number" wire:model="altura_total" name="altura_total" id="altura_total"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('altura_total')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="diametro" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Diemetro [cm]:
            </label>
            <input type="number" wire:model="diametro" name="diametro" id="diametro"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder=" " />
            @error('diametro')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center p-2">
            <label for="altura_base" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Altura Base [cm]
            </label>
            <input type="number" wire:model="altura_base" name="altura_base" id="altura_base"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('altura_base')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="altura_feta_centro" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Altura Feta Centro [cm]
            </label>
            <input type="number" wire:model="altura_feta_centro" name="altura_feta_centro" id="altura_feta_centro"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('altura_feta_centro')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="altura_split" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Altura Split [cm]
            </label>
            <input type="number" wire:model="altura_split" name="altura_split" id="altura_split"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('altura_split')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="ancho_split" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Ancho Split [cm]
            </label>
            <input type="number" wire:model="ancho_split" name="ancho_split" id="ancho_split"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('ancho_split')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="peso" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Peso [cm]
            </label>
            <input type="number" wire:model="peso" name="peso" id="peso"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('peso')
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
