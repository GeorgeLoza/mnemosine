<div>

    <div class="flex flex-wrap gap-4 mb-4 items-end p-4 bg-gray-50 rounded-lg">

        <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700">Sustancia</label>
            <select wire:model.live.debounce.300ms="sustancia_id"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">Todas</option>
                @foreach ($sustancias as $sustancia)
                    <option value="{{ $sustancia->id }}">{{ $sustancia->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700">fecha inicio</label>
            <input type="date" wire:model.live.debounce.300ms="fecha_inicio" placeholder="Buscar por fecha inicio"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700">fecha fin</label>
            <input type="date" wire:model.live.debounce.300ms="fecha_fin" placeholder="Buscar por fecha fin"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <button wire:click="resetFilters" class="h-fit px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-md text-sm">
            Limpiar Filtros
        </button>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-1">
                        #
                    </th>
                    <th scope="col" class="px-2 py-1">
                        tiempo
                    </th>
                    <th scope="col" class="px-2 py-1">
                        item
                    </th>
                    <th scope="col" class="px-2 py-1">
                        tipo
                    </th>
                    <th scope="col" class="px-2 py-1">
                        cantidad
                    </th>
                    <th scope="col" class="px-2 py-1">
                        Saldo a la fecha
                    </th>
                    <th scope="col" class="px-2 py-1">
                        area
                    </th>
                    <th scope="col" class="px-2 py-1">
                        observaciones
                    </th>
                    <th scope="col" class="px-2 py-1">
                        encargado
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientos as $movimiento)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-2 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-2 py-1.5">
                            {{ $movimiento->tiempo }}
                        </td>
                        <td class="px-2 py-1.5">
                            {{ $movimiento->sustancia->nombre }}
                        </td>
                        <td class="px-2 py-1.5">
                            {{ $movimiento->tipo }}
                        </td>
                        <td class="px-2 py-1.5 flex text-{{$movimiento->tipo == 'Ingreso' ? 'green' : 'red'}}-500">
                            @if ($movimiento->tipo == 'Ingreso')
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                    class="w-3 h-3 fill-green-500">
                                    <path
                                        d="M182.6 137.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9s16.6 19.8 29.6 19.8l256 0c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                    class="w-3 h-3 fill-red-500">
                                    <path
                                        d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
                                </svg>
                            @endif

                            {{ $movimiento->cantidad / 1 }} {{ $movimiento->sustancia->unidad }}
                        </td>
                        <td class="px-2 py-1.5">
                            {{ $movimiento->saldo / 1 }} {{ $movimiento->sustancia->unidad }}
                        </td>
                        <td class="px-2 py-1.5">
                            {{ $movimiento->area }}
                        </td>
                        <td class="px-2 py-1.5">
                            {{ $movimiento->observaciones }}
                        </td>
                        <td class="px-2 py-1.5">
                            {{ $movimiento->user->name }} {{ $movimiento->user->lastname }}
                        </td>

                        <td class="px-2 py-1.5">
                            <div class=" flex gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="w-4 h-4 fill-green-600"
                                    wire:click="$dispatch('openModal', {component: 'sustancias.editar', arguments: {id: {{ $movimiento->id }}}})">
                                    <path
                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    class="w-4 h-4 fill-red-600" wire:click="delete({{ $movimiento->id }})"
                                    wire:confirm="Esta seguro que desea borrar al usuario?">
                                    <path
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                </svg>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Paginación -->
        {{ $movimientos->links() }}
    </div>
    <div wire:loading>
        <div
            class="fixed inset-0 flex items-center justify-center bg-gray-50 bg-opacity-75 dark:bg-gray-800 dark:bg-opacity-75 z-50">
            <div role="status">
                <svg aria-hidden="true" class="w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>
