{{-- resources/views/livewire/mantenimiento/infrestructura/tabla.blade.php --}}
<div class="container mx-auto p-4">
    <div class="mb-4 flex justify-between items-center">
        <input type="text" wire:model.debounce.500ms="search" placeholder="Buscar..." class="input input-bordered w-full max-w-xs">
        <button onclick="Livewire.dispatch('openModal', { component: 'mantenimiento.infrestructura.crear' })" 
                class="btn btn-primary">
            <i class="fas fa-plus mr-2"></i> Nuevo
        </button>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-4 py-2">Código</th>
                    <th class="px-4 py-2">Área</th>
                    <th class="px-4 py-2">Subárea</th>
                    <th class="px-4 py-2">Infraestructura</th>
                    <th class="px-4 py-2">frecuencia</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border text-center">{{ $item->codigo_interno }}</td>
                    <td class="px-4 py-2 border text-center">{{ $item->area }}</td>
                    <td class="px-4 py-2 border text-center">{{ $item->subarea }}</td>
                    <td class="px-4 py-2 border text-center">{{ $item->infrestructura }}</td>
                    <td class="px-4 py-2 border text-center">{{ $item->frecuencia }}</td>
                    <td class="px-4 py-2 border text-center">
                        <button onclick="Livewire.dispatch('openModal', { component: 'mantenimiento.infrestructura.editar', arguments: { id: {{ $item->id }} } })" 
                                class="btn btn-sm btn-warning mr-2">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button wire:click="delete({{ $item->id }})" 
                                class="btn btn-sm btn-error" 
                                onclick="return confirm('¿Eliminar registro?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $registros->links() }}
    </div>
</div>