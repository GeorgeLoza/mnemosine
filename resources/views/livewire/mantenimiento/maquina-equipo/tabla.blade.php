<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="p-1">#</th>
                    <th class="px-2 py-1 whitespace-nowrap">Código Interno</th>
                    <th class="px-2 py-1 whitespace-nowrap">Código Contable</th>
                    <th class="px-2 py-1 whitespace-nowrap">Línea</th>
                    <th class="px-2 py-1 whitespace-nowrap">Tipo</th>
                    <th class="px-2 py-1 whitespace-nowrap">Marca</th>
                    <th class="px-2 py-1 whitespace-nowrap">Procedencia</th>
                    <th class="px-2 py-1 whitespace-nowrap">Voltaje</th>
                    <th class="px-2 py-1 whitespace-nowrap">Frecuencia</th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_rodamiento_dia </th>
                    <th class="px-2 py-1 whitespace-nowrap">verificacion_ruido_dia </th>
                    <th class="px-2 py-1 whitespace-nowrap">verificacion_vibracion_dia </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_retenes_dia </th>
                    <th class="px-2 py-1 whitespace-nowrap">correas_poleas_cadenas_dia </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_cinta_dia </th>
                    <th class="px-2 py-1 whitespace-nowrap">lubricacion_dia </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_motores_dia </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_sensores_dia </th>
                    <th class="px-2 py-1 whitespace-nowrap">limpieza_general_dia </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_botoneras_dia </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_parada_emergencia_dia </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_panel_electrico_dia </th>
                    <th class="px-2 py-1 whitespace-nowrap">calibracion_dia </th>
                    <th class="px-2 py-1 whitespace-nowrap">funcionamiento_dia </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_rodamiento_semestral </th>
                    <th class="px-2 py-1 whitespace-nowrap">verificacion_ruido_semestral </th>
                    <th class="px-2 py-1 whitespace-nowrap">verificacion_vibracion_semestral </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_retenes_semestral </th>
                    <th class="px-2 py-1 whitespace-nowrap">correas_poleas_cadenas_semestral </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_cinta_semestral </th>
                    <th class="px-2 py-1 whitespace-nowrap">lubricacion_semestral </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_motores_semestral </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_sensores_semestral </th>
                    <th class="px-2 py-1 whitespace-nowrap">limpieza_general_semestral </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_botoneras_semestral </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_parada_emergencia_semestral </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_panel_electrico_semestral </th>
                    <th class="px-2 py-1 whitespace-nowrap">calibracion_semestral </th>
                    <th class="px-2 py-1 whitespace-nowrap">funcionamiento_semestral </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_rodamiento_anual </th>
                    <th class="px-2 py-1 whitespace-nowrap">verificacion_ruido_anual </th>
                    <th class="px-2 py-1 whitespace-nowrap">verificacion_vibracion_anual </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_retenes_anual </th>
                    <th class="px-2 py-1 whitespace-nowrap">correas_poleas_cadenas_anual </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_cinta_anual </th>
                    <th class="px-2 py-1 whitespace-nowrap">lubricacion_anual </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_motores_anual </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_sensores_anual </th>
                    <th class="px-2 py-1 whitespace-nowrap">limpieza_general_anual </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_botoneras_anual </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_parada_emergencia_anual </th>
                    <th class="px-2 py-1 whitespace-nowrap">revision_panel_electrico_anual </th>
                    <th class="px-2 py-1 whitespace-nowrap">calibracion_anual </th>
                    <th class="px-2 py-1 whitespace-nowrap">funcionamiento_anual </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($maquinaEquipos as $index => $maquina)
                    <tr 
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="p-1 flex"> <a href="{{route('maquina.detalle', ['id' => $maquina->id]) }}" class="rounded-md mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-green-600 h-5 w-5"
                                viewBox="0 0 512 512">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                            </svg>
                        </a> <p>{{ $index + 1 }}</p></td>
                        <td class="px-2 py-1 whitespace-nowrap">{{ $maquina->codigo_interno }}</td>
                        <td class="px-2 py-1 whitespace-nowrap">{{ $maquina->codigo_contable }}</td>
                        <td class="px-2 py-1 whitespace-nowrap">{{ $maquina->linea }}</td>
                        <td class="px-2 py-1 whitespace-nowrap">{{ $maquina->tipo }}</td>
                        <td class="px-2 py-1 whitespace-nowrap">{{ $maquina->marca }}</td>
                        <td class="px-2 py-1 whitespace-nowrap">{{ $maquina->procedencia }}</td>
                        <td class="px-2 py-1 whitespace-nowrap">{{ $maquina->voltaje }}</td>
                        <td class="px-2 py-1 whitespace-nowrap">{{ $maquina->frecuencia }}</td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_rodamiento_dia ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_rodamiento_dia ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->verificacion_ruido_dia ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->verificacion_ruido_dia ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->verificacion_vibracion_dia ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->verificacion_vibracion_dia ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_retenes_dia ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_retenes_dia ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->correas_poleas_cadenas_dia ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->correas_poleas_cadenas_dia ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_cinta_dia ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_cinta_dia ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->lubricacion_dia ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->lubricacion_dia ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_motores_dia ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_motores_dia ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_sensores_dia ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_sensores_dia ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->limpieza_general_dia ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->limpieza_general_dia ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_botoneras_dia ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_botoneras_dia ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_parada_emergencia_dia ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_parada_emergencia_dia ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_panel_electrico_dia ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_panel_electrico_dia ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->calibracion_dia ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->calibracion_dia ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->funcionamiento_dia ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->funcionamiento_dia ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_rodamiento_semestral ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_rodamiento_semestral ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->verificacion_ruido_semestral ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->verificacion_ruido_semestral ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->verificacion_vibracion_semestral ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->verificacion_vibracion_semestral ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_retenes_semestral ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_retenes_semestral ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->correas_poleas_cadenas_semestral ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->correas_poleas_cadenas_semestral ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_cinta_semestral ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_cinta_semestral ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->lubricacion_semestral ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->lubricacion_semestral ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_motores_semestral ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_motores_semestral ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_sensores_semestral ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_sensores_semestral ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->limpieza_general_semestral ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->limpieza_general_semestral ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_botoneras_semestral ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_botoneras_semestral ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_parada_emergencia_semestral ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_parada_emergencia_semestral ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_panel_electrico_semestral ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_panel_electrico_semestral ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->calibracion_semestral ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->calibracion_semestral ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->funcionamiento_semestral ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->funcionamiento_semestral ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_rodamiento_anual ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_rodamiento_anual ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->verificacion_ruido_anual ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->verificacion_ruido_anual ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->verificacion_vibracion_anual ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->verificacion_vibracion_anual ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_retenes_anual ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_retenes_anual ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->correas_poleas_cadenas_anual ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->correas_poleas_cadenas_anual ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_cinta_anual ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_cinta_anual ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->lubricacion_anual ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->lubricacion_anual ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_motores_anual ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_motores_anual ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_sensores_anual ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_sensores_anual ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->limpieza_general_anual ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->limpieza_general_anual ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_botoneras_anual ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_botoneras_anual ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_parada_emergencia_anual ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_parada_emergencia_anual ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->revision_panel_electrico_anual ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->revision_panel_electrico_anual ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->calibracion_anual ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->calibracion_anual ? 'Si' : 'No' }} </td>
                        <td
                            class="px-2 py-1 whitespace-nowrap text-center text-white {{ $maquina->funcionamiento_anual ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $maquina->funcionamiento_anual ? 'Si' : 'No' }} </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
