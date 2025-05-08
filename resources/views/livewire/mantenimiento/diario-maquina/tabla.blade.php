<div class="overflow-x-auto p-2">
    <table class="min-w-full bg-white border border-gray-300 text-xs text-gray-700">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 text-left border-b border-gray-300">Código</th>
                <th class="px-4 py-2 text-left border-b border-gray-300">Máquina</th>
                @foreach ($dates as $date)
                    <th class="px-4 py-2 text-center border-b border-gray-300 whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($date)->format('d/m') }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($maquinas as $maquinaData)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b border-gray-300 font-medium">
                        {{ $maquinaData['maquina']->codigo_interno }}
                    </td>
                    <td class="px-4 py-2 border-b border-gray-300">
                        {{ $maquinaData['maquina']->tipo }} - {{ $maquinaData['maquina']->marca }}
                    </td>
                    
                    @foreach ($dates as $date)
                        @php
                            $revisiones = $maquinaData['data'][$date] ?? null;
                            $revisionesMalas = $revisiones ? $revisiones->where('estado', 'mal') : collect();
                        @endphp
                        
                        <td class="px-4 py-2 text-center border-b border-gray-300 align-top">
                            @if($revisionesMalas->isNotEmpty())
                                <div class="text-red-500 space-y-1">
                                    @foreach($revisionesMalas as $revision)
                                        <div class="flex items-center justify-center gap-1">
                                            <span>❌</span>
                                            <small class="text-red-700 italic break-all text-[0.7rem]">
                                                {{ $revision->observaciones ? "OT: ".$revision->observaciones : 'Sin observaciones' }}
                                            </small>
                                        </div>
                                    @endforeach
                                </div>
                            @elseif($revisiones)
                                <span class="text-green-500 text-lg">✔️</span>
                            @else
                                <span class="text-gray-300 text-lg">✔️</span>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>