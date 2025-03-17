<div class="mx-auto p-4 flex">

    <div>
    <!-- Formulario -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Item -->
                <div>
                    <label class="block text-gray-700">Item</label>
                    <input type="text" wire:model="item" class="w-full border rounded p-2">
                    @error('item') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Marca -->
                <div>
                    <label class="block text-gray-700">Marca</label>
                    <input type="text" wire:model="marca" class="w-full border rounded p-2">
                    @error('marca') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Detalle -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700">Detalle</label>
                    <textarea wire:model="detalle" class="w-full border rounded p-2" rows="2"></textarea>
                    @error('detalle') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Última Compra -->
                <div>
                    <label class="block text-gray-700">Última Compra</label>
                    <input type="date" wire:model="ultima_compra" class="w-full border rounded p-2">
                    @error('ultima_compra') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Observaciones -->
                <div>
                    <label class="block text-gray-700">Observaciones</label>
                    <textarea wire:model="observaciones" class="w-full border rounded p-2" rows="2"></textarea>
                </div>
            </div>

            <!-- Botón -->
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                {{ $isEdit ? 'Actualizar' : 'Guardar' }}
            </button>
        </form>
    </div>
</div>
<div>
    <!-- Tabla de Productos -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Item</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Marca</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Última Compra</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($herramientas as $producto)
                    <tr>
                        <td class="px-6 py-4">{{ $producto->item }}</td>
                        <td class="px-6 py-4">{{ $producto->marca }}</td>
                        <td class="px-6 py-4">{{ $producto->ultima_compra }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <button 
                                wire:click="edit({{ $producto->id }})" 
                                class="text-yellow-500 hover:text-yellow-700"
                            >
                                ✏️ Editar
                            </button>
                            <button 
                                wire:click="delete({{ $producto->id }})" 
                                class="text-red-500 hover:text-red-700"
                                onclick="return confirm('¿Eliminar este producto?')"
                            >
                                🗑️ Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>