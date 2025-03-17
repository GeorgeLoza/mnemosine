<div class="p-4 space-y-4">
    <!-- Filtros -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Responsable:</label>
            <select wire:model.live="responsable"
                class="block w-full p-2 mb-1 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Seleccione</option>
                @foreach ($responsables as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Área:</label>
            <select wire:model.live="area"
                class="block w-full p-2 mb-1 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                {{ count($areas) > 0 ? '' : 'disabled' }}>
                <option value="">Seleccione</option>
                @foreach ($areas as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grupo:</label>
            <select wire:model.live="grupo"
                class="block w-full p-2 mb-1 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                {{ count($grupos) > 0 ? '' : 'disabled' }}>
                <option value="">Seleccione</option>
                @foreach ($grupos as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Período:</label>
            <select wire:model.live="periodo"
                class="block w-full p-2 mb-1 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                {{ count($periodos) > 0 ? '' : 'disabled' }}>
                <option value="">Seleccione</option>
                @foreach ($periodos as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <!-- Tabla de Resultados -->
    <div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-h-[calc(100vh-220px)]">
            <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="bg-gray-200">
                        <th class="px-2 py-1">#</th>
                        <th class="px-2 py-1">Detalle</th>
                        <th class="px-2 py-1">Area</th>
                        <th class="px-2 py-1">Frecuencia</th>
                        <th class="px-2 py-1">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ordenes as $orden)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-2 py-1 font-medium  whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-4 py-1">{{ $orden->detalle ?? '-' }}</td>
                            <td class="px-4 py-1">{{ $orden->area ?? '-' }}</td>
                            <td class="px-4 py-1">{{ $orden->periodo ?? '-' }}</td>
                            <td class="px-4 py-1 flex space-x-2">
                                <button wire:click="registrarBien({{ $orden->id }})"
                                    class="px-2 py-1 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="w-5 h-5 fill-green-500">
                                        <path
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                    </svg>
                                </button>
                                <button wire:click="abrirModal({{ $orden->id }})" class="px-2 py-1 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512" class="w-5 h-5 fill-red-500">
                                        <path
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">No hay registros que coincidan con los filtros
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    @if ($showModal)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg">
                <h2 class="text-lg font-bold mb-2">Observaciones</h2>
                <textarea wire:model="observaciones" class="w-full p-2 border rounded-lg" placeholder="Escriba observaciones"></textarea>
                <textarea wire:model="correccion" class="w-full p-2 border rounded-lg mt-2" placeholder="Escriba corrección"></textarea>
                <button wire:click="registrarObservado"
                    class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">Guardar</button>
                <button wire:click="$set('showModal', false)"
                    class="mt-4 px-4 py-2 bg-gray-500 text-white rounded-lg">Cancelar</button>
            </div>
        </div>
    @endif
</div>
