<div>
    <div class="border border-gray-400 rounded p-2 mb-2">
        <h1 class="font-bold uppercase">Información</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <p class="font-bold">Codigo: <span class="font-normal">{{ $orp->codigo }}</span></p>
            <p class="font-bold">Producto: <span class="font-normal">{{ $orp->producto->nombre }}</span></p>
            <p class="font-bold">Preparaciones: <span class="font-normal">{{ $orp->lote / 1 }}</span></p>
        </div>
    </div>
    {{-- preparacion --}}
    <div class="border border-gray-400 rounded p-2">
        <h2 class="font-bold uppercase">Preparacion de insumos</h2>
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                    <th>#</th>
                    <th>item</th>
                    <th>cantidad Estimada [kg]</th>
                    <th>cantidad Real [kg]</th>
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
                            <td class="text-center">{{ $item->cantidad * $orp->lote }} </td>

                            <td class="text-green-600 dark:text-green-500 text-center">
                                @php
                                    $contadorRes = $contadorRes + 1;
                                @endphp

                                {{ $resultados[$contadorRes] ?? 'Sin datos' }}

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
    {{-- amasado --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">Amasado</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.amasado.crear', arguments: { orp: '{{ $orp->id }}'}})">
                    +
                </button>
            </div>
        </div>

        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                    <th>#</th>
                    <th>preparacion</th>
                    <th>hora inicio</th>
                    <th>Tempo de amasado CTTE [min]</th>
                    <th>Tempo de amasado con levadura [min]</th>
                    <th>Temperatura de masa [°C]</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($amasado as $dato)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="p-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td>{{ $dato->preparacion / 1 }}</td>
                        <td>{{ $dato->created_at }}</td>
                        <td>{{ $dato->tiempo_amasado1 }}</td>
                        <td>{{ $dato->tiempo_amasado2 }}</td>
                        <td>{{ $dato->temperatura }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- decorado --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">Decorado y pintado</h2>
            <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                wire:click="$dispatch('openModal', {component: 'produccion.decorado.crear', arguments: {etapa: '{{ $grupo->etapa }}', orp: '{{ $orp->id }}'}})">
                +
            </button>
        </div>
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                    <th>#</th>
                    <th>item</th>
                    <th>cantidad Estimada [kg]</th>
                    <th>cantidad Real [kg]</th>
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
                @foreach ($recetaDecorado as $grupo)
                    @foreach ($grupo->recetas as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="p-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->parent->iteration }}.{{ $loop->iteration }}
                            </th>
                            <td>{{ $item->item->nombre }}</td>
                            <td class="text-center">{{ $item->cantidad * $orp->lote }} </td>

                            <td class="text-green-600 dark:text-green-500 text-center">
                                @php
                                    $contadorRes = $contadorRes + 1;
                                @endphp

                                {{ $resultados[$contadorRes] ?? 'Sin datos' }}

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
    {{-- division formado Decorado --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">division formado decorado</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.divisionFormadoDecorado.crear', arguments: { orp: '{{ $orp->id }}'}})">
                    +
                </button>
            </div>
        </div>

        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                    <th>#</th>
                    <th>preparacion</th>
                    <th colspan="4">peso crudo (g) </th>
                    <th>peso crudo prom. (g)</th>
                    <th colspan="4">peso ajonjoli (g) </th>
                    <th>peso ajonjoli prom. (g)</th>
                    <th>centreado</th>
                    <th>uniformidad</th>
                    <th>homogeneidad</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($division as $dato)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="p-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td>{{ $dato->preparacion / 1 }}</td>
                        <td>{{ $dato->peso_crudo1 / 1 }}</td>
                        <td>{{ $dato->peso_crudo2 / 1 }}</td>
                        <td>{{ $dato->peso_crudo3 / 1 }}</td>
                        <td>{{ $dato->peso_crudo4 / 1 }}</td>
                        <td>{{ ($dato->peso_crudo1 + $dato->peso_crudo2 + $dato->peso_crudo3 + $dato->peso_crudo4) / 4 }}
                        </td>
                        <td>{{ $dato->peso_ajonjoli1 / 1 }}</td>
                        <td>{{ $dato->peso_ajonjoli2 / 1 }}</td>
                        <td>{{ $dato->peso_ajonjoli3 / 1 }}</td>
                        <td>{{ $dato->peso_ajonjoli4 / 1 }}</td>
                        <td>{{ ($dato->peso_ajonjoli1 + $dato->peso_ajonjoli2 + $dato->peso_ajonjoli3 + $dato->peso_ajonjoli4) / 4 }}
                        </td>
                        <td>
                            @if ($dato->centreado)
                            SI
                            @else
                            NO
                            @endif
                        </td>
                        <td>
                            @if ($dato->uniformidad)
                            SI
                            @else
                            NO
                            @endif
                        </td>
                        <td>
                            @if ($dato->homogeneidad)
                            SI
                            @else
                            NO
                            @endif
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- fermentacion --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">Fermentacion</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.amasado.crear', arguments: { orp: '{{ $orp->id }}'}})">
                    +
                </button>
            </div>
        </div>

        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                    <th>#</th>
                    <th>preparacion</th>
                    <th>N Camara</th>
                    <th>hora inicio</th>
                    <th>% humedad</th>
                    <th>Temperatura [°C]</th>
                    <th>hora final</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($fermentacion as $dato)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="p-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td>{{ $dato->preparacion / 1 }}</td>
                        <td>{{ $dato->ncamara }}</td>
                        <td>{{ $dato->hora_inicio }}</td>
                        <td>{{ $dato->humedad }}</td>
                        <td>{{ $dato->temperatura }}</td>
                        <td>{{ $dato->hora_salida }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- horneado --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">horneado</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.amasado.crear', arguments: { orp: '{{ $orp->id }}'}})">
                    +
                </button>
            </div>
        </div>

        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                    <th>#</th>
                    <th>preparacion</th>
                    <th>Verificacion de corte</th>
                    <th>N horno</th>
                    <th>tiempo horneado</th>
                    <th>temperatura [°C]</th>
                    <th>temperatura nucleo[°C]</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($horneado as $dato)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="p-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td>{{ $dato->preparacion / 1 }}</td>
                        <td>{{ $dato->verificacion_corte }}</td>
                        <td>{{ $dato->nhorno }}</td>
                        <td>{{ $dato->tiempo_horneado }}</td>
                        <td>{{ $dato->temperatura }}</td>
                        <td>{{ $dato->temperatura_nucleo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
