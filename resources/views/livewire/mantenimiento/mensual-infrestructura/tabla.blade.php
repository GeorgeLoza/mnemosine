<div class="p-4 space-y-4 " >
    <!-- Filtros -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
        <div>
            <label class="block text-sm font-medium text-gray-900 dark:text-white">Área:</label>
            <select wire:model.live="area" class="w-full p-2 text-sm border rounded">
                <option value="">Seleccione</option>
                @foreach ($areas as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-900 dark:text-white">Subárea:</label>
            <select wire:model.live="subarea" class="w-full p-2 text-sm border rounded"
                @if (count($subareas) == 0) disabled @endif>
                <option value="">Seleccione</option>
                @foreach ($subareas as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-900 dark:text-white">Frecuencia:</label>
            <select wire:model.live="frecuencia" class="w-full p-2 text-sm border rounded">
                <option value="">Seleccione</option>
                @foreach ($frecuencias as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Tabla -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-h-[calc(100vh-220px)] w-full">
        <table class="w-full text-xs text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-2 py-1">#</th>
                    <th class="px-2 py-1">Área</th>
                    <th class="px-2 py-1">Subárea</th>
                    <th class="px-2 py-1">Infraestructura</th>
                    <th class="px-2 py-1">Frecuencia</th>
                    <th class="px-2 py-1">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($infrestructuras as $orden)
                    <tr class="bg-white border-b hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-2 py-1">{{ $loop->iteration }}</td>
                        <td class="px-2 py-1">{{ $orden->area ?? '-' }}</td>
                        <td class="px-2 py-1">{{ $orden->subarea ?? '-' }}</td>
                        <td class="px-2 py-1">{{ $orden->infrestructura ?? '-' }}</td>
                        <td class="px-2 py-1">{{ $orden->frecuencia ?? '-' }}</td>
                        <td class="px-4 py-1 flex space-x-2">
                            <button wire:click="registrarBien({{ $orden->id }})" class="px-2 py-1 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="w-5 h-5 fill-green-500">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                </svg>
                            </button>
                            <button wire:click="abrirModal({{ $orden->id }})" class="px-2 py-1 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="w-5 h-5 fill-red-500">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">No hay registros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    @if ($showModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            
            <div class="bg-white p-6 rounded-lg max-w-md w-full">
                <div class="form-group mb-4">
                    <label for="desperfecto"
                        class="block mb-1 text-sm font-medium text-gray-900 dark:text-white capitalize">Desperfecto</label>
                    <input type="text" id="desperfecto" wire:model="desperfecto"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('desperfecto')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                    @enderror
                    
                </div>
                <div class="flex justify-end space-x-2">
                    <button wire:click="registrarObservado"
                        class="px-4 py-2 bg-blue-500 text-white rounded">Guardar</button>
                    <button wire:click="$set('showModal', false)"
                        class="px-4 py-2 bg-gray-500 text-white rounded">Cancelar</button>
                </div>
            </div>
        </div>
    @endif
</div>
