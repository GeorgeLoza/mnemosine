<div class=" p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-4 md:p-6 dark:bg-gray-800 dark:border-gray-700">
    <form wire:submit.prevent="submit" novalidate>
        @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">DISTRIBUCION</h5>



        <div class="flex items-center p-2">
            <label for="razon_social" class="block mb-2 w-3/6 text-sm font-medium text-gray-900 dark:text-white">Razon Social</label>
            <select id="razon_social" wire:model="razon_social"
                class="w-3/6 bg-gray-50 border p-1 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Escoge una razon social</option>
                <option value="BURGER KING - LA PAZ">BURGER KING - LA PAZ</option>
                <option value="BURGER KING - COCHABAMBA">BURGER KING - COCHABAMBA</option>
            </select>
        </div>

        <div class="flex items-center p-2">
            <label for="ubicacion" class="block mb-2 w-3/6 text-sm font-medium text-gray-900 dark:text-white">Buscar
                ubicacion</label>
            <select id="ubicacion" wire:model="ubicacion"
                class="w-3/6 bg-gray-50 border p-1 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Escoge un ubicacion</option>
                <option value="San Miguel">San Miguel</option>
                <option value="Prado">Prado</option>
                <option value="Obrajes">Obrajes</option>
                <option value="Irpavi">Irpavi</option>
                <option value="Multicine">Multicine</option>
                <option value="Saavedra">Saavedra</option>
                <option value="Jungla">Jungla</option>
                <option value="Ballivian">Ballivian</option>
                <option value="Huppermall">Huppermall</option>
                
            </select>
        </div>

        

        <div class="flex items-center p-2">
            <label for="cantidad" class="w-3/6 block text-sm font-medium text-gray-900 dark:text-white">Cantidad:
            </label>
            <input type="number" wire:model="cantidad" name="cantidad" id="cantidad"
                class="w-3/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                placeholder="" />
            @error('cantidad')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
            @enderror
        </div>
        




        <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>

    </form>
</div>
