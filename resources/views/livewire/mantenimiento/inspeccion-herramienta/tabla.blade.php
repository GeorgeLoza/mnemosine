<div>
    <div class="flex justify-between items-center mb-4">
        <input type="text" wire:model.live="search" placeholder="Buscar por herramienta..." class="p-2 border rounded">
        <button class="px-2 py-1 bg-green-500 rounded-lg text-xs text-white uppercase"
            onclick="Livewire.dispatch('openModal', { component: 'mantenimiento.inspeccionHerramienta.crear' })">
            nuevo</button>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-1">
                        Herramienta
                    </th>
                    <th scope="col" class="px-2 py-1">
                        tiempo
                    </th>
                    <th scope="col" class="px-2 py-1">
                        opciones
                    </th>
                    
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($inspecciones as $inspeccion)
                    <tr>
                        <td class="px-2 py-1 whitespace-nowrap">{{ $inspeccion->herramienta->item }}</td>
                        <td class="px-2 py-1">{{ $inspeccion->tiempo }}</td>
                        <td class="px-2 py-1">

                            <button wire:click="confirmDelete({{ $inspeccion->id }})"
                                class="text-red-600 hover:text-red-900 ml-2">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal de confirmación de eliminación -->
    @if ($confirmingDelete)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-4 rounded">
                <p>¿Estás seguro de eliminar esta inspección?</p>
                <div class="mt-4 flex justify-end">
                    <button wire:click="delete({{ $confirmingDelete }})"
                        class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                    <button wire:click="confirmingDelete = null"
                        class="ml-2 bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                </div>
            </div>
        </div>
    @endif
</div>
