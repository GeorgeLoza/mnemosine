<div class="relative overflow-auto max-h-[80vh] border rounded-md shadow">
    <table class="min-w-full text-sm  text-gray-700 dark:text-gray-200 text-center">
        <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 sticky top-0 z-30">
            <tr>
                <th class="sticky left-0 z-50 bg-gray-100 dark:bg-gray-700 p-1 text-center">#</th>
                <th class="sticky left-[50px] z-30 bg-gray-100 dark:bg-gray-700 px-2 py-1">Código Interno</th>
                <th class="sticky left-[119px] z-30 bg-gray-100 dark:bg-gray-700 px-2 py-1">Código Contable</th>
                <th class="sticky left-[205px] z-30 bg-gray-100 dark:bg-gray-700 px-2 py-1">Línea</th>
                <th class="sticky left-[300px] z-30 bg-gray-100 dark:bg-gray-700 px-2 py-1">Tipo</th>
                <th class="sticky left-[440px] z-30 bg-gray-100 dark:bg-gray-700 px-2 py-1">Marca</th>
                <th class="z-30 bg-gray-100 dark:bg-gray-700 px-2 py-1">Procedencia</th>
                <th class="z-30 bg-gray-100 dark:bg-gray-700 px-2 py-1">Voltaje</th>
                <th class="z-30 bg-gray-100 dark:bg-gray-700 px-2 py-1">Frecuencia</th>

                {{-- Puedes agregar más columnas aquí normalmente --}}
                @php
                    $campos = [
                        'revision_rodamiento_dia',
                        'verificacion_ruido_dia',
                        'verificacion_vibracion_dia',
                        'revision_retenes_dia',
                        'correas_poleas_cadenas_dia',
                        'revision_cinta_dia',
                        'lubricacion_dia',
                        'revision_motores_dia',
                        'revision_sensores_dia',
                        'limpieza_general_dia',
                        'revision_botoneras_dia',
                        'revision_parada_emergencia_dia',
                        'revision_panel_electrico_dia',
                        'calibracion_dia',
                        'funcionamiento_dia',
                        'revision_rodamiento_semestral',
                        'verificacion_ruido_semestral',
                        'verificacion_vibracion_semestral',
                        'revision_retenes_semestral',
                        'correas_poleas_cadenas_semestral',
                        'revision_cinta_semestral',
                        'lubricacion_semestral',
                        'revision_motores_semestral',
                        'revision_sensores_semestral',
                        'limpieza_general_semestral',
                        'revision_botoneras_semestral',
                        'revision_parada_emergencia_semestral',
                        'revision_panel_electrico_semestral',
                        'calibracion_semestral',
                        'funcionamiento_semestral',
                        'revision_rodamiento_anual',
                        'verificacion_ruido_anual',
                        'verificacion_vibracion_anual',
                        'revision_retenes_anual',
                        'correas_poleas_cadenas_anual',
                        'revision_cinta_anual',
                        'lubricacion_anual',
                        'revision_motores_anual',
                        'revision_sensores_anual',
                        'limpieza_general_anual',
                        'revision_botoneras_anual',
                        'revision_parada_emergencia_anual',
                        'revision_panel_electrico_anual',
                        'calibracion_anual',
                        'funcionamiento_anual',
                    ];
                @endphp

                @foreach ($campos as $campo)
                    <th class="px-2 py-2 text-center align-bottom max-h-32"
                        style="writing-mode: vertical-rl; transform: rotate(180deg);">
                        {{ str_replace('_', ' ', ucfirst($campo)) }}
                    </th>
                @endforeach


            </tr>
        </thead>
        <tbody>
            @foreach ($maquinaEquipos as $index => $maquina)
                <tr
                    class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 border-b dark:border-gray-600">
                    <td class="sticky left-0 z-10 bg-white dark:bg-gray-800 p-1 text-center" nowrap>
                        <a href="{{ route('maquina.detalle', ['id' => $maquina->id]) }}" class="inline-block mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-green-600 h-5 w-5"
                                viewBox="0 0 512 512">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                            </svg>
                        </a>
                        <span>{{ $index + 1 }}</span>
                    </td>
                    <td class="sticky left-[50px] z-10 bg-white dark:bg-gray-800 px-2 py-1 whitespace-nowrap">
                        {{ $maquina->codigo_interno }}</td>
                    <td class="sticky left-[119px] z-10 bg-white dark:bg-gray-800 px-2 py-1 whitespace-nowrap">
                        {{ $maquina->codigo_contable }}</td>
                    <td class="sticky left-[205px] z-10 bg-white dark:bg-gray-800 px-2 py-1 whitespace-nowrap">
                        {{ $maquina->linea }}</td>
                    <td class="sticky left-[300px] z-10 bg-white dark:bg-gray-800 px-2 py-1 whitespace-nowrap">
                        {{ $maquina->tipo }}</td>
                    <td class="sticky left-[440px] z-10 bg-white dark:bg-gray-800 px-2 py-1 whitespace-nowrap">
                        {{ $maquina->marca }}</td>
                    <td class="bg-white dark:bg-gray-800 px-2 py-1 whitespace-nowrap">
                            {{ $maquina->procedencia }}</td>
                            <td class="bg-white dark:bg-gray-800 px-2 py-1 whitespace-nowrap">
                                {{ $maquina->voltaje }}</td>
                                <td class="bg-white dark:bg-gray-800 px-2 py-1 whitespace-nowrap">
                                    {{ $maquina->frecuencia }}</td>

                    @foreach ($campos as $campo)
                        @php
                            $valor = $maquina->$campo ?? '';
                            $esBooleano = is_bool($valor) || $valor === 0 || $valor === 1;
                        @endphp
                        <td
                            class="px-2 py-1 text-center whitespace-nowrap 
                            @if ($esBooleano) text-white {{ $valor ? 'bg-green-500' : 'bg-red-500' }} @endif">
                            {{ $esBooleano ? ($valor ? 'Si' : 'No') : $valor }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
