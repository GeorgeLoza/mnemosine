<div class=" p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-4 md:p-6 dark:bg-gray-800 dark:border-gray-700">
    <form wire:submit.prevent="submit" novalidate>
        @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">CARACTERISTICAS ORGANOLEPTICAS</h5>
        <div class="flex items-center p-2">
            <label for="codigo" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Código de
                responsable: </label>
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



        <div class="flex items-center p-2">
            <label for="textura" class="block mb-2 w-3/6 text-sm font-medium text-gray-900 dark:text-white">Buscar
                textura</label>
            <select id="textura" wire:model="textura"
                class="w-3/6 bg-gray-50 border p-1 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Escoge una textura</option>
                <option value="Crocante">Crocante</option>
                <option value="Suave y esponjoso">Suave y esponjoso</option>
                <option value="Escamosa">Escamosa</option>
                <option value="Compacta">Compacta</option>
                <option value="Tierna">Tierna</option>
                <option value="Aireada">Aireada</option>
                <option value="Pegajosa y Humeda">Pegajosa y Humeda</option>
                <option value="Masticable">Masticable</option>
            </select>
        </div>

        <div class="flex items-center p-2">
            <label for="sabor" class="block mb-2 w-3/6 text-sm font-medium text-gray-900 dark:text-white">Buscar
                sabor</label>
            <select id="sabor" wire:model="sabor"
                class="w-3/6 bg-gray-50 border p-1 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Escoge un sabor</option>
                <option value="Dulce">Dulce</option>
                <option value="Salado">Salado</option>
                <option value="Acido">Acido</option>
                <option value="Ahumado">Ahumado</option>
                <option value="Especiado">Especiado</option>
                <option value="Caracteristico">Caracteristico</option>
            </select>
        </div>

        <div class="flex items-center p-2">
            <label for="olor" class="block mb-2 w-3/6 text-sm font-medium text-gray-900 dark:text-white">Buscar
                sabor</label>
            <select id="olor" wire:model="olor"
                class="w-3/6 bg-gray-50 border p-1 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Escoge un olor</option>
                <option value="Aromas Clasicos">Aromas Clasicos</option>
                <option value="Aromas Especiados">Aromas Especiados</option>
                <option value="Aromas naturales">Aromas naturales</option>
                <option value="caracteristico">caracteristico</option>
                
            </select>
        </div>

        <div class="flex items-center p-2">
            <label for="humedad" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">% Humedad:
            </label>
            <input type="number" wire:model="humedad" name="humedad" id="humedad"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="Temperatura de corte" />
            @error('humedad')
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
            <label for="correccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Accion
                Correctiva</label>
            <textarea id="correccion" rows="4" wire:model="correccion" value="{{ old('correccion') }}"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escriba la accion que realizo para resolver la observacion."></textarea>
        </div>




        <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>

    </form>
</div>
