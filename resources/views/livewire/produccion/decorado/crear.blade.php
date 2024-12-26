<div class=" p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-4 md:p-6 dark:bg-gray-800 dark:border-gray-700">
    <form wire:submit.prevent="submit" novalidate>
        @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Decorado y Pintado</h5>
        <div class="flex items-center p-2">
            <label for="codigo" class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white">Código: </label>
            <input type="number" wire:model.live="codigo" name="codigo" id="codigo"
                class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="Codigo Soalpro" />
            @error('codigo')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center p-2">
            <label for="nombre" class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white">Trabajador:
            </label>
            <input type="text" wire:model="nombre" name="nombre" id="nombre" disabled
                class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="Nombre del trabajador" />
            @error('trabajador_id')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div>
            {{-- decorado --}}
            <div class="flex items-center p-2">
                <label for="huevo"
                    class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">huevo en polvo:
                </label>
                <input type="number" wire:model.live="huevo" name="huevo" id="huevo"
                    class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="" />
                @error('huevo')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center p-2">
                <label for="semilla"
                    class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">Semilla de ajonjoli: </label>
                <input type="number" wire:model.live="semilla" name="semilla" id="semilla"
                    class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="" />
                @error('semilla')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center p-2">
                <label for="polenta"
                    class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">polenta:
                </label>
                <input type="number" wire:model.live="polenta" name="polenta" id="polenta"
                    class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="" />
                @error('polenta')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                @enderror
            </div>
        </div>

        <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>

    </form>
</div>
