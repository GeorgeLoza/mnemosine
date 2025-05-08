{{-- resources/views/livewire/mantenimiento/infrestructura/editar.blade.php --}}
<x-modal-component maxWidth="lg" :isOpen="$isOpen">
    <div class="p-4">
        <h3 class="text-lg font-bold mb-4">Editar Registro</h3>
        
        <div class="space-y-4">
            <div>
                <label>Código Interno:</label>
                <input type="text" wire:model="codigo_interno" class="input input-bordered w-full">
            </div>
            
            <div>
                <label>Área:</label>
                <input type="text" wire:model="area" class="input input-bordered w-full" required>
            </div>
            
            <div>
                <label>Subárea:</label>
                <input type="text" wire:model="subarea" class="input input-bordered w-full" required>
            </div>
            
            <div>
                <label>Infrestructura:</label>
                <input type="text" wire:model="infrestructura" class="input input-bordered w-full" required>
            </div>
        </div>

        <div class="modal-footer mt-4 flex justify-end space-x-2">
            <button wire:click="closeModal" class="btn">Cancelar</button>
            <button wire:click="update" class="btn btn-primary">Actualizar</button>
        </div>
    </div>
</x-modal-component>