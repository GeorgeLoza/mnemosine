<div class=" p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-4 md:p-6 dark:bg-gray-800 dark:border-gray-700">
    <form wire:submit.prevent="submit" novalidate>
        @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Preparación</h5>
        <label for="preparacion" class="block mb-2 w-3/6 text-sm font-medium text-gray-900 dark:text-white">Responsable de
            pintado</label>
        <div class="flex items-center gap-2">
            <div class="w-2/6">
                <input type="number" wire:model.live="codigo1" name="codigo1" id="codigo1"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Codigo Soalpro" />
                @error('codigo1')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                @enderror
            </div>
            <div class="w-4/6">
                <input type="text" wire:model="nombre1" name="nombre1" id="nombre1" disabled
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Nombre del trabajador" />
                @error('trabajador_id1')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                @enderror
            </div>
        </div>
        <label for="preparacion" class="block mb-2 w-3/6 text-sm font-medium text-gray-900 dark:text-white">Responsable
            de
            decorado</label>
        <div class="flex items-center gap-2">
            <div class="w-2/6">
                <input type="number" wire:model.live="codigo2" name="codigo2" id="codigo2"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Codigo Soalpro" />
                @error('codigo2')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                @enderror
            </div>
            <div class="w-4/6">
                <input type="text" wire:model="nombre2" name="nombre2" id="nombre2" disabled
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Nombre del trabajador" />
                @error('trabajador_id2')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center p-2">
            <label for="preparacion" class="block mb-2 w-3/6 text-sm font-medium text-gray-900 dark:text-white">Buscar
                preparaciones</label>
            <select id="preparacion" wire:model="preparacion"
                class="w-3/6 bg-gray-50 border p-1 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Escoge una preparación</option>
                @foreach ($preparaciones as $preparacion)
                    <option value="{{ $preparacion }}">{{ $preparacion }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="peso_crudo1" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Peso Crudo:
            </label>
            <div class="flex gap-2">
                <div>
                    <input type="number" wire:model.live="peso_crudo1" name="peso_crudo1" id="peso_crudo1"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    @error('peso_crudo1')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="number" wire:model.live="peso_crudo2" name="peso_crudo2" id="peso_crudo2"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    @error('peso_crudo2')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="number" wire:model.live="peso_crudo3" name="peso_crudo3" id="peso_crudo3"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    @error('peso_crudo3')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="number" wire:model.live="peso_crudo4" name="peso_crudo4" id="peso_crudo4"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    @error('peso_crudo4')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="number" wire:model="peso_crudo_prom" name="peso_crudo_prom" id="peso_crudo_prom"
                        disabled
                        class="w-full bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg  block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label for="peso_ajonjoli1" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Peso con
                ajonjoli:
            </label>
            <div class="flex gap-2">
                <div>
                    <input type="number" wire:model.live="peso_ajonjoli1" name="peso_ajonjoli1" id="peso_ajonjoli1"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    @error('peso_ajonjoli1')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="number" wire:model.live="peso_ajonjoli2" name="peso_ajonjoli2" id="peso_ajonjoli2"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    @error('peso_ajonjoli2')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="number" wire:model.live="peso_ajonjoli3" name="peso_ajonjoli3" id="peso_ajonjoli3"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    @error('peso_ajonjoli3')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="number" wire:model.live="peso_ajonjoli4" name="peso_ajonjoli4" id="peso_ajonjoli4"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    @error('peso_ajonjoli4')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="number" wire:model="peso_ajonjoli_prom" name="peso_ajonjoli_prom"
                        id="peso_ajonjoli_prom" disabled
                        class="w-full bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg  block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                </div>
            </div>
        </div>

        <div class="flex justify-between mb-4">
            <div class="flex items-center">
                <input id="centreado" type="checkbox" wire:model="centreado"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="centreado" class="text-sm font-medium text-gray-900 dark:text-white">Centreado</label>
            </div>

            <div class="flex items-center">
                <input id="uniformidad" type="checkbox" wire:model="uniformidad"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="uniformidad" class="text-sm font-medium text-gray-900 dark:text-white">Uniformidad</label>
            </div>

            <div class="flex items-center">
                <input id="homogeneidad" type="checkbox" wire:model="homogeneidad"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="homogeneidad"
                    class="text-sm font-medium text-gray-900 dark:text-white">Homogeneidad</label>
            </div>
        </div>

        <div class="mb-4">
            <label for="observaciones"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observaciones</label>
            <textarea id="observaciones" rows="2" wire:model="observaciones" value="{{ old('observaciones') }}"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escriba alguna anormalidad al momento de la revision."></textarea>
        </div>
        <div class="mb-4">
            <label for="correccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Accion
                Correctiva</label>
            <textarea id="correccion" rows="2" wire:model="correccion" value="{{ old('correccion') }}"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escriba la accion que realizo para resolver la observacion."></textarea>
        </div>




        <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>

    </form>
</div>
