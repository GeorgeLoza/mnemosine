<div>
    <div>
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-3 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white capitalize">
                        Crear nuevo documento
                    </h3>
                    <button type="button" wire:click="cerrar"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5 text-left" wire:submit.prevent="save" novalidate>
                    <div>
                        <label for="titulo" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Título</label>
                        <input type="text" id="titulo" wire:model="titulo"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('titulo') <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p> @enderror
                    </div>

                    <div class="mt-4">
                        <label for="descripcion"
                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                        <textarea id="descripcion" wire:model="descripcion"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        @error('descripcion') <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p> @enderror
                    </div>

                    <div class="mt-4">
                        <label for="categoria" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                        <select id="categoria" wire:model="categoria"
                            class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Seleccione una categoría</option>
                            <option value="Manual">Manual</option>
                            <option value="Guía">Guía</option>
                            <option value="Procedimiento">Procedimiento</option>
                        </select>
                        @error('categoria') <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p> @enderror
                    </div>

                    <div class="mt-4">
                        <label for="archivo" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Archivo</label>
                        <input type="file" id="archivo" wire:model="archivo"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        @error('archivo') <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p> @enderror
                    </div>

                    <button type="submit"
                        class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Guardar
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
