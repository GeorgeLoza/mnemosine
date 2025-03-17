<div class="container mx-auto p-4">
    
    <!-- Filtro -->
    <div class="mb-6">
        <select wire:model.live="filtro" class="border rounded p-2">
            <option value="todos">Todos</option>
            <option value="si">Con Verificación</option>
            <option value="no">Sin Verificación</option>
        </select>
    </div>

    <!-- Tablas por período -->
    @foreach($periodos as $periodo)
    <div class="mb-8">
        <h2 class="text-xl font-semibold mb-2">{{ Str::ucfirst($periodo) }}</h2>
        
        @foreach($datos as $area => $items)
        <div class="mb-4">
            <h3 class="font-medium bg-gray-100 p-2">{{ $area }}</h3>
            <table class="min-w-full border">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="py-2 px-4 border">Responsable</th>
                        <th class="py-2 px-4 border">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td class="py-2 px-4 border">{{ $item['responsable'] }}</td>
                        <td class="py-2 px-4 border text-center">
                            <span class="{{ $item[$periodo] === 'SI' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} px-2 py-1 rounded-full text-xs">
                                {{ $item[$periodo] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach

    </div>
    @endforeach

</div>