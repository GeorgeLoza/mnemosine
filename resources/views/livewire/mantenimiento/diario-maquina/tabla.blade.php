<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 text-xs text-gray-700">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left border-b border-gray-300">Código</th>
                <th class="px-4 py-2 text-left border-b border-gray-300">Máquina</th>
                @foreach ($dates as $date)
                    <th class="px-4 py-2 text-center border-b border-gray-300">{{ \Carbon\Carbon::parse($date)->format('d/m') }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($maquinas as $maquinaData)
                <tr>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $maquinaData['maquina']->codigo_interno }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $maquinaData['maquina']->tipo }} - {{ $maquinaData['maquina']->marca }}</td>
                    @foreach ($dates as $date)
                        <td class="px-4 py-2 text-center border-b border-gray-300">
                            @if ($maquinaData['data'][$date] === 'bien')
                                <span class="text-green-500">✔️</span>
                            @elseif ($maquinaData['data'][$date] === 'mal')
                                <span class="text-red-500">❌</span>
                            @else
                                <span class="text-gray-500">✔️</span>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
