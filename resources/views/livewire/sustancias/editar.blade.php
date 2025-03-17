<div>
    <form class="space-y-2" wire:submit.prevent="submit">
        <h5 class="text-xl font-bold text-gray-900 dark:text-white">Curacion leve y dotacion de esparadrapo</h5>

        <!-- Campo sustancia -->
        <div>
            <label for="sustancias"
                class=" capitalize block mb-1 text-sm md:text-md font-medium text-gray-900 dark:text-white">sustancias</label>
            <select id="sustancias" wire:model="sustancia_id"
                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                <option selected>Escoje una sustencia</option>
                @foreach ($sustancias as $sustancia)
                    <option value="{{ $sustancia->id }}">{{ $sustancia->nombre }}</option>
                @endforeach
            </select>
            @error('sustancias')
                <p class="mt-2 text-sm md:text-md text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="tipo"
                class=" capitalize block mb-1 text-sm md:text-md font-medium text-gray-900 dark:text-white">tipo</label>
            <select id="tipo" wire:model="tipo"
                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                <option selected>Escoje una tipo</option>
                <option value="Ingreso">Ingreso</option>
                <option value="Salida">Salida</option>
            </select>
            @error('tipo')
                <p class="mt-2 text-sm md:text-md text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>


        <div>
            <label for="cantidad" class="w-full block text-sm font-medium text-gray-900 dark:text-white">Cantidad:
            </label>
            <input type="number" wire:model="cantidad" name="cantidad" id="cantidad" step="any"
                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="Cantidad de la sustancia" />
            @error('cantidad')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="area" class="w-full capitalize block text-sm font-medium text-gray-900 dark:text-white">area:
            </label>
            <input type="text" wire:model="area" name="area" id="area"
                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="Para que area sera utilizada la sustancia" />
            @error('area')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>
        <!-- Observaciones  -->

        <div>
            <label for="observaciones"
                class="block mb-2 text-sm md:text-md font-medium text-gray-900 dark:text-white">Observaciones</label>
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
