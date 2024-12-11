<div>
    <div class="border border-gray-400 rounded p-2 mb-2">
        <h1 class="font-bold uppercase">Información</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <p class="font-bold">Codigo: <span class="font-normal">{{ $orp->codigo }}</span></p>
            <p class="font-bold">Producto: <span class="font-normal">{{ $orp->producto->nombre }}</span></p>
            <p class="font-bold">Preparaciones: <span class="font-normal">{{ $orp->lote / 1 }}</span></p>
        </div>
    </div>
    <div class="border border-gray-400 rounded p-2">
        <h1 class="font-bold uppercase">Preparacion de insumos</h1>
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                <tr>
                    <th>#</th>
                    <th>item</th>
                    <th>cantidad Estimada</th>
                    <th>cantidad Real</th>
                    @for ($i = 1; $i <= $preparacion; $i++)
                        <th>{{ $i }} PP</th>
                    @endfor

                    @if ($saldo_preparacion > 0)
                        <th>{{ number_format($saldo_preparacion, 2) }} PP</th>
                    @endif

                </tr>
            </thead>
            @php
                $contadorRes = -1;
            @endphp
            <tbody>
                @foreach ($receta as $grupo)
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <td colspan="20" class="font-bold text-center text-gray-900 dark:text-white uppercase">
                            <div class="flex justify-between px-4 py-1">
                                <div></div>
                                <h2>{{ $grupo->etapa }}</h2>
                                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                                    wire:click="$dispatch('openModal', {component: 'produccion.preparacion.crear', arguments: {etapa: '{{ $grupo->etapa }}', orp: '{{ $orp->id }}'}})">
                                    +
                                </button>

                            </div>

                        </td>
                    </tr>

                    @foreach ($grupo->recetas as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="p-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->parent->iteration }}.{{ $loop->iteration }}
                            </th>
                            <td>{{ $item->item->nombre }}</td>
                            <td>{{ $item->cantidad * $orp->lote }} kg.</td>

                            <td>
                                @php
                                    $contadorRes = $contadorRes + 1;
                                @endphp

                                {{ $resultados[$contadorRes] ?? 'sin datos' }}

                            </td>
                            @for ($i = 1; $i <= $preparacion; $i++)
                                <td>{{ $item->cantidad / 1 }}</td>
                            @endfor

                            @if ($saldo_preparacion > 0)
                                <td>{{ $item->cantidad * number_format($saldo_preparacion, 2) }}</td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach

            </tbody>
        </table>
    </div>



    <ul>
        @foreach ($resultados as $index => $valor)
            <li>Elemento {{ $index }}: {{ $valor }}</li>
        @endforeach
    </ul>
    {{-- {{ $premezcla1_resultados}}
    {{ $premezcla2_resultados}}
    {{ $premezcla3_resultados}}
    {{ $preMaestro_resultados}} --}}
    {{-- {{$resultados}} --}}
</div>
