<div>
    <h1 class="text-gray-700 uppercase text-lg font-bold">Control de herramientas / repuestos</h1>
    <form class="p-4 md:p-5 text-left" wire:submit.prevent="submit" novalidate>
        <div class="md:flex gap-1 w-full">
            <div class="md:w-3/5">
                <label for="herramienta" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Herramienta / Repuesto</label>
                <input type="text" id="herramienta" wire:model='herramienta'
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="md:w-1/5">
                <label for="cantidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Cantidad</label>
                <input type="number" id="cantidad" wire:model='cantidad_ingreso'
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <button type="submit"
                class="md:w-1/5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 mt-6 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Agregar</button>
        </div>
    </form>

    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Herramienta</th>
                    <th scope="col" class="px-6 py-3">Cantidad ingreso</th>
                    <th scope="col" class="px-6 py-3">Cantidad salida</th>
                    <th scope="col" class="px-6 py-3">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($herramientasRepuestos as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->herramienta }}
                        </td>
                        <td class="px-6 py-4">{{ $item->cantidad_ingreso }}</td>
                        
                        <td class="px-6 py-4" x-data="{ editMode: false, value: '{{ $item->cantidad_salida ?? 0 }}' }">
                            <template x-if="!editMode">
                                <span @click="editMode = true; $nextTick(() => $refs.input.focus())" class="cursor-pointer text-gray-700">
                                    {{ $item->cantidad_salida ?? '—' }}
                                </span>
                            </template>
                        
                            <template x-if="editMode">
                                <input
                                    x-ref="input"
                                    type="number"
                                    x-model="value"
                                    @keydown.enter="
                                        editMode = false;
                                        $wire.cantidad_salida[{{ $item->id }}] = value;
                                        $wire.guardarSalida({{ $item->id }});
                                    "
                                    @blur="
                                        editMode = false;
                                        $wire.cantidad_salida[{{ $item->id }}] = value;
                                        $wire.guardarSalida({{ $item->id }});
                                    "
                                    class="w-20 text-center border border-gray-300 rounded p-1 text-xs focus:ring-blue-500 focus:border-blue-500"
                                />
                            </template>
                        </td>
                        
                        
                        <td class="px-6 py-4">
                            <div class="flex gap-2 justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    wire:click="delete({{ $item->id }})"
                                    wire:confirm="¿Seguro que deseas eliminar este registro?"
                                    class="h-4 w-4 fill-red-500 cursor-pointer">
                                    <path
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32S433.7 96 416 96H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128h384v320c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16v224c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16v224c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16v224c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                </svg>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
