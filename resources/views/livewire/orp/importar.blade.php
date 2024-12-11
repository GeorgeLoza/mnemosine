<div>
    <h2 class="text-2xl mb-4 text-gray-800 dark:text-gray-200 font-bold ">Importar ORP</h2>
    <div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Subir:</label>
                        <form wire:submit.prevent="importarRegistros"
                            class=" items-center align-middle content-center gap-1  mb-2">
                            <input wire:model="archivoCsv"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 mb-2"
                                id="file_input" type="file">
                            <input type="submit" value="Agregar"
                                class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                        </form>
    </div>
</div>