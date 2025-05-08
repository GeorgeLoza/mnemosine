<div class="max-w-4xl mx-auto p-4">
    <form wire:submit.prevent="save">
        <div class="space-y-6">
            <div>
                <label class="block font-medium">Fecha de Inspección</label>
                <input type="date" wire:model="tiempo" class="w-full p-2 border rounded">
                @error('tiempo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="bg-white shadow rounded-lg p-4">
                <div class="flex items-center justify-between mb-4">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" wire:model="selectAll">
                        <span>Seleccionar todas las herramientas</span>
                    </label>
                </div>

                <div class="space-y-2">
                    @foreach($herramientas as $herramienta)
                    <div class="border rounded p-2" x-data="{ selected: false }">
                        <div class="flex items-center justify-between">
                            <label class="flex items-center space-x-2 flex-1">
                                <input type="checkbox" 
                                    wire:model="seleccion.{{ $herramienta->id }}" 
                                    value="{{ $herramienta->id }}"
                                    x-model="selected"
                                    class="form-checkbox">
                                <span class="font-medium">{{ $herramienta->item }}</span>
                                <span class="text-sm text-gray-500">(Stock: {{ $herramienta->cantidad ?? 'N/A' }})</span>
                            </label>
                        </div>

                        <div x-show="selected" class="mt-2 pl-8 space-y-2">
                            <div>
                                <label>Cantidad Verificada</label>
                                <input type="number" 
                                    wire:model="seleccion.{{ $herramienta->id }}.cantidad" 
                                    class="w-full p-1 border rounded">
                                @error('seleccion.'.$herramienta->id.'.cantidad')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label>Observaciones (opcional)</label>
                                <textarea 
                                    wire:model="seleccion.{{ $herramienta->id }}.observaciones" 
                                    class="w-full p-1 border rounded"></textarea>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                Guardar Inspecciones Seleccionadas
            </button>
        </div>
    </form>
</div>