<div class="p-4">
    <!-- Selector de Año -->
    <div class="mb-4">
        <select wire:model.live="anio" class="border rounded p-2">
            @foreach($aniosDisponibles as $anio)
                <option value="{{ $anio }}">{{ $anio }}</option>
            @endforeach
        </select>
    </div>

    <!-- Tabla de Reporte -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-h-[calc(100vh-220px)] w-full">
        <table class="w-full text-xs text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-2 py-1">Area</th>
                    <th class="px-2 py-1">Infraestructura</th>
                    @foreach($meses as $mes)
                        <th class="px-2 py-1">{{ $mes }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($reporte as $item)
                    <tr class="bg-white border-b hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-2 py-1">{{ $item['subarea'] }}</td>
                        <td class="px-2 py-1">{{ $item['infraestructura'] }}</td>
                        @foreach($item['meses'] as $mes => $valor)
                            <td class="px-2 py-1">
                                {!! $valor !!}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>