<div class=" p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-4 md:p-6 dark:bg-gray-800 dark:border-gray-700">
    <form wire:submit.prevent="submit" novalidate>
        @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Seleccion visual</h5>
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
            <label for="color_corteza" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Color Corteza:
            </label>
            <input type="number" wire:model="color_corteza" name="color_corteza" id="color_corteza"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('color_corteza')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="color_base" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">color_base:
            </label>
            <input type="number" wire:model="color_base" name="color_base" id="color_base"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('color_base')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="aspecto_miga" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">aspecto_miga:
            </label>
            <input type="number" wire:model="aspecto_miga" name="aspecto_miga" id="aspecto_miga"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('aspecto_miga')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="deformidad_corte" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">deformidad_corte:
            </label>
            <input type="number" wire:model="deformidad_corte" name="deformidad_corte" id="deformidad_corte"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('deformidad_corte')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="agujero_aire" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">agujero_aire:
            </label>
            <input type="number" wire:model="agujero_aire" name="agujero_aire" id="agujero_aire"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('agujero_aire')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="huecos_desgrane" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">huecos_desgrane:
            </label>
            <input type="number" wire:model="huecos_desgrane" name="huecos_desgrane" id="huecos_desgrane"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('huecos_desgrane')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="insuficiencia_ajonjoli" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">insuficiencia_ajonjoli:
            </label>
            <input type="number" wire:model="insuficiencia_ajonjoli" name="insuficiencia_ajonjoli" id="insuficiencia_ajonjoli"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('insuficiencia_ajonjoli')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="exceso_ajonjoli" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">exceso_ajonjoli:
            </label>
            <input type="number" wire:model="exceso_ajonjoli" name="exceso_ajonjoli" id="exceso_ajonjoli"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('exceso_ajonjoli')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="arrugas_superficie" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">arrugas_superficie:
            </label>
            <input type="number" wire:model="arrugas_superficie" name="arrugas_superficie" id="arrugas_superficie"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('arrugas_superficie')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="globos_superficie" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">globos_superficie:
            </label>
            <input type="number" wire:model="globos_superficie" name="globos_superficie" id="globos_superficie"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('globos_superficie')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="harina_base" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">harina_base:
            </label>
            <input type="number" wire:model="harina_base" name="harina_base" id="harina_base"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('harina_base')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center p-2">
            <label for="simetria" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">simetria:
            </label>
            <input type="number" wire:model="simetria" name="simetria" id="simetria"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('simetria')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="hundimiento_base" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">hundimiento_base:
            </label>
            <input type="number" wire:model="hundimiento_base" name="hundimiento_base" id="hundimiento_base"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('hundimiento_base')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center p-2">
            <label for="presencio_beso" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">presencio_beso:
            </label>
            <input type="number" wire:model="presencio_beso" name="presencio_beso" id="presencio_beso"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('presencio_beso')
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
