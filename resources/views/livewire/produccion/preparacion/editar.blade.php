<div class=" p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-4 md:p-6 dark:bg-gray-800 dark:border-gray-700">
    <form wire:submit.prevent="submit" novalidate>
        @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Preparación</h5>
        @if ($etapa == 'Pre mezcla 1')
            <div>
                {{-- premezcla1 --}}
                <div class="flex items-center p-2">
                    <label for="azucar"
                        class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">azucar:
                    </label>
                    <input type="number" wire:model.live="azucar" name="azucar" id="azucar"
                        class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" />
                    @error('azucar')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center p-2">
                    <label for="leche"
                        class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">leche: </label>
                    <input type="number" wire:model.live="leche" name="leche" id="leche"
                        class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" />
                    @error('leche')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center p-2">
                    <label for="gluten"
                        class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">gluten:
                    </label>
                    <input type="number" wire:model.live="gluten" name="gluten" id="gluten"
                        class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" />
                    @error('gluten')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center p-2">
                    <label for="sal_yodada"
                        class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">sal yodada:
                    </label>
                    <input type="number" wire:model.live="sal_yodada" name="sal_yodada" id="sal_yodada"
                        class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" />
                    @error('sal_yodada')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center p-2">
                    <label for="propionato_calcio"
                        class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">propionato
                        calcio:
                    </label>
                    <input type="number" wire:model.live="propionato_calcio" name="propionato_calcio"
                        id="propionato_calcio"
                        class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" />
                    @error('propionato_calcio')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center p-2">
                    <label for="esteaoril_lactilato_sodio"
                        class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">esteaoril
                        lactilato
                        sodio : </label>
                    <input type="number" wire:model.live="esteaoril_lactilato_sodio" name="esteaoril_lactilato_sodio"
                        id="esteaoril_lactilato_sodio"
                        class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" />
                    @error('esteaoril_lactilato_sodio')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center p-2">
                    <label for="almidon"
                        class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">almidon :
                    </label>
                    <input type="number" wire:model.live="almidon" name="almidon" id="almidon"
                        class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" />
                    @error('almidon')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
            </div>
        @endif
        @if ($etapa == 'Pre mezcla 2')
            {{-- premezcla2 --}}
            <div>
                <div class="flex items-center p-2">
                    <label for="lecitina_soya"
                        class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">lecitina soya:
                    </label>
                    <input type="number" wire:model.live="lecitina_soya" name="lecitina_soya" id="lecitina_soya"
                        class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" />
                    @error('lecitina_soya')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center p-2">
                    <label for="extracto_malta"
                        class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">extracto
                        malta:
                    </label>
                    <input type="number" wire:model.live="extracto_malta" name="extracto_malta" id="extracto_malta"
                        class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" />
                    @error('extracto_malta')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
            </div>
        @endif
        @if ($etapa == 'Pre mezcla 3')
            {{-- premezcla3 --}}
            <div>
                <div class="flex items-center p-2">
                    <label for="manteca"
                        class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">manteca:
                    </label>
                    <input type="number" wire:model.live="manteca" name="manteca" id="manteca"
                        class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" />
                    @error('manteca')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center p-2">
                    <label for="emulsificante"
                        class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">emulsificante:
                    </label>
                    <input type="number" wire:model.live="emulsificante" name="emulsificante" id="emulsificante"
                        class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" />
                    @error('emulsificante')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
            </div>
        @endif

        @if ($etapa == 'Preparado Mestro')
            <div>
                {{-- preparador maestro --}}
                <div class="flex items-center p-2">
                    <label for="harina_trigo"
                        class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">harina_trigo:
                    </label>
                    <input type="number" wire:model.live="harina_trigo" name="harina_trigo" id="harina_trigo"
                        class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" />
                    @error('harina_trigo')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center p-2">
                    <label for="levadura"
                        class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">levadura:
                    </label>
                    <input type="number" wire:model.live="levadura" name="levadura" id="levadura"
                        class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" />
                    @error('levadura')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center p-2">
                    <label for="agua"
                        class="w-2/6 block text-sm font-medium text-gray-900 dark:text-white capitalize">agua: </label>
                    <input type="number" wire:model.live="agua" name="agua" id="agua"
                        class="w-4/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" />
                    @error('agua')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
            </div>
        @endif

        <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>

    </form>
</div>
