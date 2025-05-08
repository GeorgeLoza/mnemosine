<div class="overflow-x-auto">
    <div class="mb-4">
        <select wire:model.live="anio" class="p-2 border rounded">
            @for($i = date('Y') - 5; $i <= date('Y') + 1; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>

    <table class="min-w-full border-collapse">
        <thead>
            <tr>
                <th class="p-2 border bg-gray-100">Herramienta</th>
                @foreach($meses as $mes)
                    <th class="p-2 border bg-gray-100 text-center">{{ DateTime::createFromFormat('!m', $mes)->format('M') }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($herramientasConInspecciones as $data)
                <tr class="hover:bg-gray-50">
                    <td class="p-2 border">{{ $data['herramienta']->item }}</td>
                    @foreach($meses as $mes)
                        <td class="p-2 border text-center" x-data="{ showObservacion: false }">
                            @if($data['inspecciones'][$mes])
                                <div class="cursor-pointer" 
                                     @mouseover="showObservacion = true" 
                                     @mouseleave="showObservacion = false">
                                    @if($data['inspecciones'][$mes]['ok'])
                                        <svg class="w-5 h-5 text-green-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    @else
                                        <svg class="w-5 h-5 text-red-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    @endif
                                    
                                    <!-- Tooltip con observaciones -->
                                    <div x-show="showObservacion && !{{ $data['inspecciones'][$mes]['ok'] ? 'true' : 'false' }}" 
                                         class="absolute bg-white p-2 border rounded shadow-lg text-sm z-10">
                                        {{ $data['inspecciones'][$mes]['observaciones'] }}
                                    </div>
                                </div>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>