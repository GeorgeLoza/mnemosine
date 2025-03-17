<div class=" p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-4 md:p-6 dark:bg-gray-800 dark:border-gray-700">
    <form wire:submit.prevent="submit" novalidate>
        @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Rendimiento</h5>
        <label for="codigo1" class="block mb-2 w-3/6 text-sm font-medium text-gray-900 dark:text-white">Usuario que Recepciono</label>
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
        <label for="codigo2" class="block mb-2 w-3/6 text-sm font-medium text-gray-900 dark:text-white">Usuario que Recepciono</label>
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
            <label for="rendimiento_teorico" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">rendimiento_teorico:</label>
            <input type="number" wire:model="rendimiento_teorico" name="rendimiento_teorico" id="rendimiento_teorico" 
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="" />
            @error('rendimiento_teorico')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="rendimiento_real" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">rendimiento_real:</label>
            <input type="number" wire:model="rendimiento_real" name="rendimiento_real" id="rendimiento_real" 
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="" />
            @error('rendimiento_real')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="cantidad_conforme" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">cantidad_conforme:</label>
            <input type="number" wire:model="cantidad_conforme" name="cantidad_conforme" id="cantidad_conforme" 
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="" />
            @error('cantidad_conforme')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="cantidad_no_conforme" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">cantidad_no_conforme:</label>
            <input type="number" wire:model="cantidad_no_conforme" name="cantidad_no_conforme" id="cantidad_no_conforme" 
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="" />
            @error('cantidad_no_conforme')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="cantidad_pedido" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">cantidad_pedido:</label>
            <input type="number" wire:model="cantidad_pedido" name="cantidad_pedido" id="cantidad_pedido" 
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="" />
            @error('cantidad_pedido')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="cantidad_contramuestra" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">cantidad_contramuestra:</label>
            <input type="number" wire:model="cantidad_contramuestra" name="cantidad_contramuestra" id="cantidad_contramuestra" 
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="" />
            @error('cantidad_contramuestra')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="muestra_micro" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">muestra_micro:</label>
            <input type="number" wire:model="muestra_micro" name="muestra_micro" id="muestra_micro" 
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="" />
            @error('muestra_micro')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="muestra_fisico" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">muestra_fisico:</label>
            <input type="number" wire:model="muestra_fisico" name="muestra_fisico" id="muestra_fisico" 
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="" />
            @error('muestra_fisico')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="canastillo_limpio" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">canastillo_limpio:</label>
            <input type="number" wire:model="canastillo_limpio" name="canastillo_limpio" id="canastillo_limpio" 
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="" />
            @error('canastillo_limpio')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="cantidad_bolsa" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">cantidad_bolsa:</label>
            <input type="number" wire:model="cantidad_bolsa" name="cantidad_bolsa" id="cantidad_bolsa" 
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="" />
            @error('cantidad_bolsa')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="calidad_sellado" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">calidad_sellado:</label>
            <input type="number" wire:model="calidad_sellado" name="calidad_sellado" id="calidad_sellado" 
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="" />
            @error('calidad_sellado')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="cantidad_embalado" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">cantidad_embalado:</label>
            <input type="number" wire:model="cantidad_embalado" name="cantidad_embalado" id="cantidad_embalado" 
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="" />
            @error('cantidad_embalado')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="calidad_embalado" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">calidad_embalado:</label>
            <input type="number" wire:model="calidad_embalado" name="calidad_embalado" id="calidad_embalado" 
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="" />
            @error('calidad_embalado')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="cantidad_canastillos" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">cantidad_canastillos:</label>
            <input type="number" wire:model="cantidad_canastillos" name="cantidad_canastillos" id="cantidad_canastillos" 
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="" />
            @error('cantidad_canastillos')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="total_merma" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">total_merma:</label>
            <input type="number" wire:model="total_merma" name="total_merma" id="total_merma" 
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="" />
            @error('total_merma')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
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
