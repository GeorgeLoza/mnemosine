<div class="flex w-screen justify-center">
    <div
        class="w-full md:w-3/5 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" wire:submit.prevent="submit">
            <h5 class="text-2xl font-bold text-gray-900 dark:text-white">Lavado de mano</h5>
            <div>
                <label for="codigo" class="block mb-1 text-sm md:text-lg font-medium text-gray-900 dark:text-white">Código</label>
                <input type="number" wire:model.live="codigo" name="codigo" id="codigo"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Codigo Soalpro" />
                @error('codigo')
                    <p class="mt-2 text-sm md:text-lg text-red-600 dark:text-red-500"> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nombre"
                    class="block mb-1 text-sm md:text-lg font-medium text-gray-900 dark:text-white">Trabajador</label>
                <input type="text" wire:model="nombre" name="nombre" id="nombre" disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Nombre del trabajador" />
                @error('user_id')
                    <p class="mt-2 text-sm md:text-lg text-red-600 dark:text-red-500"> {{ $message }}</p>
                @enderror
            </div>




            <button type="submit"
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm md:text-lg px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>
        </form>
    </div>
</div>
