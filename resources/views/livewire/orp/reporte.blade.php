<div>
    <div class="border border-gray-400 rounded p-2 mb-2">
        <h1 class="font-bold uppercase">Información</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <p class="whitespace-nowrap py-1 font-bold">Codigo: <span class="font-normal">{{ $orp->codigo }}</span></p>
            <p class="whitespace-nowrap py-1 font-bold">Producto: <span
                    class="font-normal">{{ $orp->producto->nombre }}</span>
            </p>
            <p class="whitespace-nowrap py-1 font-bold">Preparaciones: <span
                    class="font-normal">{{ $orp->lote / 1 }}</span>
            </p>
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
                                <div>
                                    <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                                        wire:click="$dispatch('openModal', {component: 'produccion.preparacion.crear', arguments: {etapa: '{{ $grupo->etapa }}', orp: '{{ $orp->id }}'}})">
                                        +
                                    </button>

                                    <button class="bg-blue-500 text-white rounded px-2 font-bold text-md"
                                        wire:click="$dispatch('openModal', {component: 'produccion.preparacion.editar', arguments: {etapa: '{{ $grupo->etapa }}', orp: '{{ $orp->id }}'}})">
                                        Editar
                                    </button>
                                </div>


                            </div>

                        </td>
                    </tr>

                    @foreach ($grupo->recetas as $item)
                        <tr
                            class="bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="p-1 font-medium text-gray-900 whitespace-nowrap py-1 dark:text-white">
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
    {{-- <div class="border border-gray-400 rounded p-2">
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
                    <th>Tiempo de amasado CTTE [min]</th>
                    <th>Tiempo de amasado con levadura [min]</th>
                    <th>Temperatura de masa [°C]</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($amasado as $dato)
                    <tr
                        class="bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="p-1 font-medium text-gray-900 whitespace-nowrap py-1 dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td>{{ $dato->preparacion / 1 }}</td>
                        <td>{{ $dato->created_at }}</td>
                        <td>{{ $dato->tiempo_amasado1 }}</td>
                        <td>{{ $dato->tiempo_amasado2 }}</td>
                        <td>{{ $dato->temperatura }}</td>
                        <td><button class="bg-blue-500 text-white rounded px-2 font-bold text-md"
                                wire:click="$dispatch('openModal', {component: 'produccion.amasado.editar', arguments: {id: '{{ $dato->id }}', orp: '{{ $orp->id }}'}})">
                                Editar
                            </button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

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

        <div class="flex w-full">
            <div
                class="flex-1 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
                <p class="whitespace-nowrap py-1 ">Cantidad PP</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">Hora Inicio</p>
                <p class="whitespace-nowrap py-1 ">Tiempo de amasado CTTE [min]</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">Tiempo de amasado con levadura [min]</p>
                <p class="whitespace-nowrap py-1 ">Temperatura de masa [°C]</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">Opciones</p>
            </div>
            @foreach ($amasado as $dato)
                <div class="flex-1 text-center text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400 ">
                    <p class="whitespace-nowrap py-1 ">{{ $dato->preparacion / 1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">{{ $dato->created_at }}</p>
                    <p class="whitespace-nowrap py-1 ">{{ $dato->tiempo_amasado1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">{{ $dato->tiempo_amasado2 }}</p>
                    <p class="whitespace-nowrap py-1 ">{{ $dato->temperatura }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200"><button
                            class="bg-blue-500 text-white rounded px-2 font-bold text-md"
                            wire:click="$dispatch('openModal', {component: 'produccion.amasado.editar', arguments: {id: '{{ $dato->id }}', orp: '{{ $orp->id }}'}})">
                            Editar
                        </button></p>
                </div>
            @endforeach

        </div>
    </div>


    {{-- decorado --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">Decorado y pintado</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.decorado.crear', arguments: {etapa: '{{ $grupo->etapa }}', orp: '{{ $orp->id }}'}})">
                    +
                </button>
                <button class="bg-blue-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.decorado.editar', arguments: {etapa: '{{ $grupo->etapa }}', orp: '{{ $orp->id }}'}})">
                    Editar
                </button>
            </div>
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
                            class="bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="p-1 font-medium text-gray-900 whitespace-nowrap py-1 dark:text-white">
                                {{ $loop->parent->iteration }}.{{ $loop->iteration }}
                            </th>
                            <td>{{ $item->item->nombre }}</td>
                            <td class="text-center">{{ $item->cantidad * $orp->lote }} </td>

                            <td class="text-green-600 dark:text-green-500 text-center">
                                @php
                                    $contadorRes = $contadorRes + 1;
                                @endphp

                                {{ $resultado_decoracion[$contadorRes] ?? 'Sin datos' }}

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
    {{-- <div class="border border-gray-400 rounded p-2">
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
                    <tr class="bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="p-1 font-medium text-gray-900 whitespace-nowrap py-1 dark:text-white">
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

                        <td><button class="bg-blue-500 text-white rounded px-2 font-bold text-md"
                                wire:click="$dispatch('openModal', {component: 'produccion.divisionFormadoDecorado.editar', arguments: {id: '{{ $dato->id }}', orp: '{{ $orp->id }}'}})">
                                Editar
                            </button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}


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

        <div class="flex w-full">
            <div
                class="flex-1 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
                <p class="whitespace-nowrap py-1 ">Cantidad PP</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">peso crudo (g)</p>
                <p class="whitespace-nowrap py-1 ">peso crudo prom. (g)</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">peso ajonjoli (g)</p>
                <p class="whitespace-nowrap py-1 ">peso ajonjoli prom. (g)</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">centreado</p>
                <p class="whitespace-nowrap py-1 ">uniformidad</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">homogeneidad</p>
                <p class="whitespace-nowrap py-1 ">opciones</p>
            </div>
            @foreach ($division as $dato)
                <div class="flex-1 text-center text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400 ">
                    <p class="whitespace-nowrap py-1 ">{{ $dato->preparacion / 1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">{{ $dato->peso_crudo1 / 1 }} -
                        {{ $dato->peso_crudo2 / 1 }} - {{ $dato->peso_crudo3 / 1 }} -
                        {{ $dato->peso_crudo4 / 1 }}</p>
                    <p class="whitespace-nowrap py-1 ">
                        {{ ($dato->peso_crudo1 + $dato->peso_crudo2 + $dato->peso_crudo3 + $dato->peso_crudo4) / 4 }}
                    </p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">{{ $dato->peso_ajonjoli1 / 1 }} -
                        {{ $dato->peso_ajonjoli2 / 1 }} - {{ $dato->peso_ajonjoli3 / 1 }} -
                        {{ $dato->peso_ajonjoli4 / 1 }}</p>
                    <p class="whitespace-nowrap py-1 ">
                        {{ ($dato->peso_ajonjoli1 + $dato->peso_ajonjoli2 + $dato->peso_ajonjoli3 + $dato->peso_ajonjoli4) / 4 }}
                    </p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">
                        {{ $dato->centreado ? 'SI' : 'NO' }}
                    </p>
                    <p class="whitespace-nowrap py-1 ">
                        {{ $dato->uniformidad ? 'SI' : 'NO' }}
                    </p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">
                        {{ $dato->homogeneidad ? 'SI' : 'NO' }}
                    </p>
                    <p class="whitespace-nowrap py-1 ">
                        <button class="bg-blue-500 text-white rounded px-2 font-bold text-md"
                            wire:click="$dispatch('openModal', {component: 'produccion.divisionFormadoDecorado.editar', arguments: {id: '{{ $dato->id }}', orp: '{{ $orp->id }}'}})">
                            Editar
                        </button>
                    </p>
                </div>
            @endforeach

        </div>
    </div>


    {{-- fermentacion --}}
    {{-- <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">Fermentacion</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.fermentacion.crear', arguments: { orp: '{{ $orp->id }}'}})">
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
                        class="bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="p-1 font-medium text-gray-900 whitespace-nowrap py-1 dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td>{{ $dato->preparacion / 1 }}</td>
                        <td>{{ $dato->ncamara }}</td>
                        <td>{{ $dato->hora_inicio }}</td>
                        <td>{{ $dato->humedad }}</td>
                        <td>{{ $dato->temperatura }}</td>
                        <td>{{ $dato->hora_salida }}</td>
                        <td><button class="bg-blue-500 text-white rounded px-2 font-bold text-md"
                                wire:click="$dispatch('openModal', {component: 'produccion.fermentacion.editar', arguments: {id: '{{ $dato->id }}', orp: '{{ $orp->id }}'}})">
                                Editar
                            </button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

    {{-- fermentacion --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">Fermentacion</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.fermentacion.crear', arguments: { orp: '{{ $orp->id }}'}})">
                    +
                </button>
            </div>
        </div>

        <div class="flex w-full">
            <div
                class="flex-1 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
                <p class="whitespace-nowrap py-1 ">Cantidad PP</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">Numero camara</p>
                <p class="whitespace-nowrap py-1 ">hora inicio</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">%humedad</p>
                <p class="whitespace-nowrap py-1 ">temperatura [C]</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">hora salida</p>
                <p class="whitespace-nowrap py-1 ">Opciones</p>
            </div>
            @foreach ($fermentacion as $dato)
                <div class="flex-1 text-center text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400 ">
                    <p class="whitespace-nowrap py-1 ">{{ $dato->preparacion / 1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">{{ $dato->ncamara }}</p>
                    <p class="whitespace-nowrap py-1 ">{{ $dato->hora_inicio }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">{{ $dato->humedad }}</p>
                    <p class="whitespace-nowrap py-1 ">{{ $dato->temperatura }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $dato->hora_salida }}</p>
                    <p class="whitespace-nowrap py-1 "><button
                            class="bg-blue-500 text-white rounded px-2 font-bold text-md"
                            wire:click="$dispatch('openModal', {component: 'produccion.fermentacion.editar', arguments: {id: '{{ $dato->id }}', orp: '{{ $orp->id }}'}})">
                            Editar
                        </button></p>
                </div>
            @endforeach

        </div>
    </div>
    {{-- horneado --}}
    {{-- <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">horneado</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.horneado.crear', arguments: { orp: '{{ $orp->id }}'}})">
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
                        class="bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="p-1 font-medium text-gray-900 whitespace-nowrap py-1 dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td>{{ $dato->preparacion / 1 }}</td>
                        <td>
                            @if ($dato->verificacion_corte)
                                SI
                            @else
                                NO
                            @endif
                        </td>
                        <td>{{ $dato->nhorno }}</td>
                        <td>{{ $dato->tiempo_horneado }}</td>
                        <td>{{ $dato->temperatura }}</td>
                        <td>{{ $dato->temperatura_nucleo }}</td>
                        <td><button class="bg-blue-500 text-white rounded px-2 font-bold text-md"
                                wire:click="$dispatch('openModal', {component: 'produccion.horneado.editar', arguments: {id: '{{ $dato->id }}', orp: '{{ $orp->id }}'}})">
                                Editar
                            </button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}


    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">horneado</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.horneado.crear', arguments: { orp: '{{ $orp->id }}'}})">
                    +
                </button>
            </div>
        </div>

        <div class="flex w-full">
            <div
                class="flex-1 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
                <p class="whitespace-nowrap py-1 ">Cantidad PP</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">Verificacion de corte</p>
                <p class="whitespace-nowrap py-1 ">N horno</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">tiempo horneado</p>
                <p class="whitespace-nowrap py-1 ">temperatura [C]</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">temperatura de nucleo</p>
                <p class="whitespace-nowrap py-1 ">Opciones</p>
            </div>
            @foreach ($horneado as $dato)
                <div class="flex-1 text-center text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400 ">
                    <p class="whitespace-nowrap py-1 ">{{ $dato->preparacion / 1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">
                        {{ $dato->verificacion_corte ? 'SI' : 'NO' }}
                    </p>
                    <p class="whitespace-nowrap py-1 ">{{ $dato->nhorno }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $dato->tiempo_horneado }}</p>
                    <p class="whitespace-nowrap py-1 ">{{ $dato->temperatura }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $dato->temperatura_nucleo }}</p>
                    <p class="whitespace-nowrap py-1 "><button
                            class="bg-blue-500 text-white rounded px-2 font-bold text-md"
                            wire:click="$dispatch('openModal', {component: 'produccion.horneado.editar', arguments: {id: '{{ $dato->id }}', orp: '{{ $orp->id }}'}})">
                            Editar
                        </button></p>
                </div>
            @endforeach
        </div>

    </div>

    {{-- balances --}}
    {{-- Preparacion --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">Balance</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.balance.crear', arguments: { orp: '{{ $orp->id }}'}})">
                    +
                </button>
            </div>
        </div>
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                    <th>#</th>
                    <th>Item</th>
                    <th>Cantidad Estimada [kg]</th>
                    <th>Cantidad Real [kg]</th>
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
                $totalesEstimados = 0;
                $totalesReales = 0;
                $totalesPP = array_fill(0, $preparacion, 0);
                $totalSaldo = 0;
            @endphp
            <tbody>
                @foreach ($receta as $grupo)
                    @foreach ($grupo->recetas as $item)
                        @php
                            $contadorRes++;
                            $cantidadEstimada = (float) ($item->cantidad * $orp->lote);
                            $cantidadReal = (float) ($resultados[$contadorRes] ?? 0);
                            $totalesEstimados += $cantidadEstimada;
                            $totalesReales += $cantidadReal;
                        @endphp
                        @for ($i = 1; $i <= $preparacion; $i++)
                            @php
                                $ppValue = (float) ($item->cantidad / 1);
                                $totalesPP[$i - 1] += $ppValue;
                            @endphp
                        @endfor
                        @if ($saldo_preparacion > 0)
                            @php
                                $saldoValue = (float) ($item->cantidad * number_format($saldo_preparacion, 2));
                                $totalSaldo += $saldoValue;
                            @endphp
                        @endif
                    @endforeach
                @endforeach
                <tr class=" font-bold">
                    <td colspan="2" class="text-center">Balance masa crudo [kg]</td>
                    <td class="text-center">{{ $totalesEstimados }}</td>
                    <td class="text-center">{{ $totalesReales }}</td>
                    @for ($i = 0; $i < $preparacion; $i++)
                        <td class="text-center">{{ $totalesPP[$i] }}</td>
                    @endfor
                    @if ($saldo_preparacion > 0)
                        <td class="text-center">{{ $totalSaldo }}</td>
                    @endif
                </tr>
                <tr class="font-bold">
                    <td colspan="2" class="text-center">Rendimiento teorico [unid]</td>
                    <td class="text-center">{{ ($totalesEstimados / 0.105) * 0.97 }}</td>
                    <td class="text-center">{{ ($totalesReales / 0.105) * 0.97 }}</td>
                    @for ($i = 0; $i < $preparacion; $i++)
                        <td class="text-center">{{ (($totalesPP[$i] ?? 0) / 0.105) * 0.97 }}</td>
                    @endfor
                    @if ($saldo_preparacion > 0)
                        <td class="text-center">{{ (($totalSaldo ?? 0) / 0.105) * 0.97 }}</td>
                    @endif
                </tr>
                <tr class="font-bold">
                    <td colspan="2" class="text-center">rendimiento real [unid]</td>
                    <td class="text-center">-</td>
                    <td class="text-center">-</td>
                    @foreach ($balance as $dato)
                        <td class="text-center">{{ $dato->cantidad }}</td>
                    @endforeach
                </tr>

            </tbody>

        </table>
    </div>

    {{-- cantidad --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">cantidad</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.cantidadPreparada.crear', arguments: { orp: '{{ $orp->id }}'}})">
                    +
                </button>
            </div>
        </div>

        <div class="flex w-full">
            <div
                class="flex-1 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
                <p class="whitespace-nowrap py-1 ">Cantidad PP</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">CANTIDAD DE PRODUCTO COCIDO ENVIADO POR PP [unid]</p>
                <p class="whitespace-nowrap py-1 ">CANTIDAD DE PRODUCTO COCIDO RECEPCIONADO POR PP [unid]</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">DIFERENCIA</p>
                <p class="whitespace-nowrap py-1 ">TEMPERATURA DE VACIADO [°C]</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">Opciones</p>
            </div>
            @foreach ($cantidadPreparada as $dato)
                <div class="flex-1 text-center text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400 ">
                    <p class="whitespace-nowrap py-1 ">{{ $dato->preparacion / 1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">{{ $dato->cantidad_producto_enviado }}</p>
                    <p class="whitespace-nowrap py-1  ">{{ $dato->cantidad_producto_recepcionado }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">
                        {{ $dato->cantidad_producto_recepcionado - $dato->cantidad_producto_enviado }}</p>
                    <p class="whitespace-nowrap py-1 ">{{ $dato->temperatura_vaciado }}</p>

                    <p class="whitespace-nowrap py-1 bg-gray-200"><button
                            class="bg-blue-500 text-white rounded px-2 font-bold text-md"
                            wire:click="$dispatch('openModal', {component: 'produccion.cantidadPreparada.editar', arguments: {id: '{{ $dato->id }}', orp: '{{ $orp->id }}'}})">
                            Editar
                        </button></p>
                </div>
            @endforeach
        </div>

    </div>


    {{-- corte --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">corte</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.corte.crear', arguments: { orp: '{{ $orp->id }}'}})">
                    +
                </button>
            </div>
        </div>

        <div class="flex w-full">
            <div
                class="flex-1 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
                <p class="whitespace-nowrap py-1 ">Cantidad PP</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">TEMPERATURA DE CORTE [°C]</p>
                <p class="whitespace-nowrap py-1 ">CALIBRACIÓN DEL CORTADOR</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">Opciones</p>
            </div>
            @foreach ($corte as $dato)
                <div class="flex-1 text-center text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400 ">
                    <p class="whitespace-nowrap py-1 ">{{ $dato->preparacion / 1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">
                        {{ $dato->temperatura_corte }}
                    </p>
                    <p class="whitespace-nowrap py-1 ">
                        {{ $dato->calibracion ? 'SI' : 'NO' }}
                    </p>

                    <p class="whitespace-nowrap py-1 bg-gray-200"><button
                            class="bg-blue-500 text-white rounded px-2 font-bold text-md"
                            wire:click="$dispatch('openModal', {component: 'produccion.cantidadPreparada.editar', arguments: {id: '{{ $dato->id }}', orp: '{{ $orp->id }}'}})">
                            Editar
                        </button></p>
                </div>
            @endforeach
        </div>

    </div>

    {{-- metal --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">Detectora de metales</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.metal.crear', arguments: { orp: '{{ $orp->id }}'}})">
                    +
                </button>
            </div>
        </div>

        <div class="flex w-full">
            <div
                class="flex-1 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
                <p class="whitespace-nowrap py-1 ">Cantidad PP</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">FERROSO </p>
                <p class="whitespace-nowrap py-1 ">NO FERROSO </p>
                <p class="whitespace-nowrap py-1  bg-gray-200">SUS (INOX)</p>
                <p class="whitespace-nowrap py-1 ">Opciones</p>
            </div>
            @foreach ($metal as $dato)
                <div class="flex-1 text-center text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400 ">
                    <p class="whitespace-nowrap py-1 ">{{ $dato->preparacion / 1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">
                        {{ $dato->ferroso ? 'SI' : 'NO' }}
                    </p>
                    <p class="whitespace-nowrap py-1  ">
                        {{ $dato->no_ferroso ? 'SI' : 'NO' }}
                    </p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $dato->sus_inox ? 'SI' : 'NO' }}</p>

                    <p class="whitespace-nowrap py-1 "><button
                            class="bg-blue-500 text-white rounded px-2 font-bold text-md"
                            wire:click="$dispatch('openModal', {component: 'produccion.cantidadPreparada.editar', arguments: {id: '{{ $dato->id }}', orp: '{{ $orp->id }}'}})">
                            Editar
                        </button></p>
                </div>
            @endforeach
        </div>

    </div>

    
    {{-- Dimensiones --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">Dimensiones</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.dimension.crear', arguments: { orp: '{{ $orp->id }}'}})">
                    +
                </button>
            </div>
        </div>

        <div class="flex w-full">
            <div
                class="flex-1 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
                <p class="whitespace-nowrap py-1 ">Cantidad PP</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">ALTURA TOTAL [cm] </p>
                <p class="whitespace-nowrap py-1 ">DIAMETRO [cm]</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">ALTURA DE LA BASE [cm]</p>
                <p class="whitespace-nowrap py-1 ">ALTURA FETA DEL CENTRO [cm]</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">ALTURA DEL SPLIT [mm]</p>
                <p class="whitespace-nowrap py-1 ">ANCHO DEL SPLIT [mm]</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">PESO [g]</p>
                <p class="whitespace-nowrap py-1 ">Opciones</p>
            </div>
            @foreach ($dimension as $dato)
                <div class="flex-1 text-center text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400 ">
                    <p class="whitespace-nowrap py-1 ">{{ $dato->preparacion / 1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">{{ $dato->altura_total }}</p>
                    <p class="whitespace-nowrap py-1  ">{{ $dato->diametro }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $dato->altura_base }}</p>
                    <p class="whitespace-nowrap py-1  ">{{ $dato->altura_feta_centro }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $dato->altura_split }}</p>
                    <p class="whitespace-nowrap py-1 ">{{ $dato->ancho_split }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $dato->peso }}</p>
                    <p class="whitespace-nowrap py-1 "><button
                            class="bg-blue-500 text-white rounded px-2 font-bold text-md"
                            wire:click="$dispatch('openModal', {component: 'produccion.cantidadPreparada.editar', arguments: {id: '{{ $dato->id }}', orp: '{{ $orp->id }}'}})">
                            Editar
                        </button></p>
                </div>
            @endforeach
        </div>

    </div>

    {{-- Organoleptico --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">CARACTERISTICAS ORGANOLEPTICAS</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.organoleptico.crear', arguments: { orp: '{{ $orp->id }}'}})">
                    +
                </button>
            </div>
        </div>

        <div class="flex w-full">
            <div
                class="flex-1 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
                <p class="whitespace-nowrap py-1 ">Cantidad PP</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">Textura </p>
                <p class="whitespace-nowrap py-1 ">Olor</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">Sabor</p>
                <p class="whitespace-nowrap py-1 ">%humedad</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">Opciones</p>
            </div>
            @foreach ($organoleptico as $dato)
                <div class="flex-1 text-center text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400 ">
                    <p class="whitespace-nowrap py-1 ">{{ $dato->preparacion / 1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">{{ $dato->textura }}</p>
                    <p class="whitespace-nowrap py-1  ">{{ $dato->olor }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $dato->sabor }}</p>
                    <p class="whitespace-nowrap py-1 ">{{ $dato->humedad }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200"><button
                            class="bg-blue-500 text-white rounded px-2 font-bold text-md"
                            wire:click="$dispatch('openModal', {component: 'produccion.cantidadPreparada.editar', arguments: {id: '{{ $dato->id }}', orp: '{{ $orp->id }}'}})">
                            Editar
                        </button></p>
                </div>
            @endforeach
        </div>

    </div>

    {{-- Seleccion Visual  --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">Seleccion Visual [unid]</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.seleccion.crear', arguments: { orp: '{{ $orp->id }}'}})">
                    +
                </button>
            </div>
        </div>

        <div class="flex w-full">
            <div
                class="flex-1 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
                <p class="whitespace-nowrap py-1 ">Color de corteza</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">Color de la Base </p>
                <p class="whitespace-nowrap py-1 ">Aspecto de la miga</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">Deformidad por corte</p>
                <p class="whitespace-nowrap py-1 ">Agujeros de aire</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">Huecos por desgrane</p>
                <p class="whitespace-nowrap py-1 ">Insuficiente Ajonjoli en la corteza</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">Exceso Ajonjoli en la corteza</p>
                <p class="whitespace-nowrap py-1 ">Arrugas en la superficie</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">Globos o ampollas en superficie</p>
                <p class="whitespace-nowrap py-1 ">Harina en la base</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">simetria</p>
                <p class="whitespace-nowrap py-1 ">Hundimiento en la base</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">presencia beso</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">Total</p>
            </div>


            @if ($seleccion)
                <div class="flex-1 text-center text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400 ">
                    <p class="whitespace-nowrap py-1 ">{{ $seleccion->color_corteza / 1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">{{ $seleccion->color_base / 1 }}</p>
                    <p class="whitespace-nowrap py-1  ">{{ $seleccion->aspecto_miga / 1 }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $seleccion->deformidad_corte / 1 }}</p>
                    <p class="whitespace-nowrap py-1 ">{{ $seleccion->agujero_aire / 1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">{{ $seleccion->huecos_desgrane / 1 }}</p>
                    <p class="whitespace-nowrap py-1  ">{{ $seleccion->insuficiencia_ajonjoli / 1 }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $seleccion->exceso_ajonjoli / 1 }}</p>
                    <p class="whitespace-nowrap py-1 ">{{ $seleccion->arrugas_superficie / 1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">{{ $seleccion->globos_superficie / 1 }}</p>
                    <p class="whitespace-nowrap py-1  ">{{ $seleccion->harina_base / 1 }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $seleccion->simetria / 1 }}</p>
                    <p class="whitespace-nowrap py-1 ">{{ $seleccion->hundimiento_base / 1 }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $seleccion->presencio_beso / 1 }}</p>
                    <p class="whitespace-nowrap py-1 font-bold">{{ $seleccion->total_merma / 1 }}</p>

                </div>
            @endif
        </div>

    </div>

    {{-- Rendimiento cantidad  --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">Rendimiento</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.rendimiento.crear', arguments: { orp: '{{ $orp->id }}'}})">
                    +
                </button>
            </div>
        </div>

        <div class="flex w-full">
            <div
                class="flex-1 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 font-bold">
                <p class="whitespace-nowrap py-1 ">RENDIMIENTO TEORICO [Unid]</p>
                <p class="whitespace-nowrap py-1  bg-gray-200">RENDIMIENTO REAL [Unid]</p>
                <p class="whitespace-nowrap py-1 ">CANTIDAD PRODUCTO CONFORME [unid]</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">CANTIDAD PRODUCTO NO CONFORME [unid]</p>
                <p class="whitespace-nowrap py-1 ">CANTIDAD DE PEDIDO [unid]</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">CANTIDAD CONTRAMUESTRA [unid]</p>
                <p class="whitespace-nowrap py-1 ">CANTIDAD MUESTRA MICROBIOLIGÍA [unid]</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">CANTIDAD MUESTRA FISICOQUÍMICO [unid]</p>
                <p class="whitespace-nowrap py-1 ">CANASTILLOS LIMPIOS</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">CANTIDAD POR BOLSA [unid]</p>
                <p class="whitespace-nowrap py-1 ">CALIDAD DE SELLADO</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">CANTIDAD POR EMBALADO [unid]</p>
                <p class="whitespace-nowrap py-1 ">CALIDAD DE EMBALADO</p>
                <p class="whitespace-nowrap py-1 bg-gray-200">CANTIDAD POR CANASTILLOS [unid]</p>
            </div>


            @if ($rendimiento)
                <div class="flex-1 text-center text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400 ">
                    <p class="whitespace-nowrap py-1 ">{{ $rendimiento->rendimiento_teorico / 1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">{{ $rendimiento->rendimiento_real / 1 }}</p>
                    <p class="whitespace-nowrap py-1  ">{{ $rendimiento->cantidad_conforme / 1 }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $rendimiento->cantidad_no_conforme / 1 }}</p>
                    <p class="whitespace-nowrap py-1 ">{{ $rendimiento->cantidad_pedido / 1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">{{ $rendimiento->cantidad_contramuestra / 1 }}</p>
                    <p class="whitespace-nowrap py-1  ">{{ $rendimiento->muestra_micro / 1 }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $rendimiento->muestra_fisico / 1 }}</p>
                    <p class="whitespace-nowrap py-1 ">{{ $rendimiento->canastillo_limpio / 1 }}</p>
                    <p class="whitespace-nowrap py-1  bg-gray-200">{{ $rendimiento->cantidad_bolsa / 1 }}</p>
                    <p class="whitespace-nowrap py-1  ">{{ $rendimiento->calidad_sellado / 1 }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $rendimiento->cantidad_embalado / 1 }}</p>
                    <p class="whitespace-nowrap py-1 ">{{ $rendimiento->calidad_embalado / 1 }}</p>
                    <p class="whitespace-nowrap py-1 bg-gray-200">{{ $rendimiento->cantidad_canastillos / 1 }}</p>

                </div>
            @endif
        </div>

    </div>

    {{-- Distribucion  --}}
    <div class="border border-gray-400 rounded p-2">
        <div class="flex justify-between">
            <h2 class="font-bold uppercase">Distribucion</h2>
            <div>
                <button class="bg-green-500 text-white rounded px-2 font-bold text-md"
                    wire:click="$dispatch('openModal', {component: 'produccion.distribucion.crear', arguments: { orp: '{{ $orp->id }}'}})">
                    +
                </button>
            </div>
        </div>

        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                    
                    <th>razon social</th>
                    <th>Ubicacion</th>
                    <th>Cantidad [unid]</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($distribucion as $dato)
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <td>{{ $dato->razon_social }}</td>
                        <td>{{ $dato->ubicacion }}</td>
                        <td>{{ $dato->cantidad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
