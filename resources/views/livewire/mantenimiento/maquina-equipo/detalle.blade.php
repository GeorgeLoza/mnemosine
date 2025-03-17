<div>

    <div class=" md:flex gap-2">
        {{-- card info --}}
        <div
            class="w-1/3 max-w-md p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">{{ $maquina->codigo_interno }}
                </h5>
                <p class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    {{ $maquina->codigo_contable }}
                </p>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="pt-3 pb-0 sm:pt-4">
                        <div class="flex items-center ">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $maquina->tipo }}
                                </p>
                                <p class="text-sm  text-gray-500 truncate dark:text-gray-400">
                                    <span class="font-bold"> Marca:</span> {{ $maquina->marca }}
                                </p>
                                <p class="text-sm  text-gray-500 truncate dark:text-gray-400">
                                    <span class="font-bold"> voltaje:</span> {{ $maquina->voltaje }}
                                </p>
                                <p class="text-sm  text-gray-500 truncate dark:text-gray-400">
                                    <span class="font-bold"> Frecuencia:</span> {{ $maquina->frecuencia }}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                {{ $maquina->evidencia }}
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        {{-- card detalle --}}
        <div
            class="w-2/3  p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Frecuencia de controles
                </h5>
                <p class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    Preventivo
                </p>
            </div>

            <div class="w-full">

                <table class="table-auto border-collapse border border-gray-500 w-full">
                    <thead>
                        <tr>
                            <th class="border border-gray-500 px-1 py-1"></th>
                            
                            <th style="writing-mode: vertical-rl; text-orientation: mixed;"
                                class="border border-gray-500 px-1 py-1">Revisión de rodamientos</th>
                            <th style="writing-mode: vertical-rl; text-orientation: mixed;"
                                class="border border-gray-500 px-1 py-1">Verificacion de ruidos</th>
                            <th style="writing-mode: vertical-rl; text-orientation: mixed;"
                                class="border border-gray-500 px-1 py-1">Verificacion de vibraciones</th>
                            <th style="writing-mode: vertical-rl; text-orientation: mixed;"
                                class="border border-gray-500 px-1 py-1">Revision de retenes</th>
                            <th style="writing-mode: vertical-rl; text-orientation: mixed;"
                                class="border border-gray-500 px-1 py-1">Revisión de correas / poleas / cadenas</th>
                            <th style="writing-mode: vertical-rl; text-orientation: mixed;"
                                class="border border-gray-500 px-1 py-1">Revisión de cintas</th>
                            <th style="writing-mode: vertical-rl; text-orientation: mixed;"
                                class="border border-gray-500 px-1 py-1">Verificación del sistema de lubricacion</th>
                                <th style="writing-mode: vertical-rl; text-orientation: mixed;"
                                class="border border-gray-500 px-1 py-1">Revisión de motores</th>
                                <th style="writing-mode: vertical-rl; text-orientation: mixed;"
                                class="border border-gray-500 px-1 py-1">Revision de sensores</th>
                                <th style="writing-mode: vertical-rl; text-orientation: mixed;"
                                class="border border-gray-500 px-1 py-1">Limpieza general</th>
                                <th style="writing-mode: vertical-rl; text-orientation: mixed;"
                                class="border border-gray-500 px-1 py-1">Revision de botoneras</th>
                                <th style="writing-mode: vertical-rl; text-orientation: mixed;"
                                class="border border-gray-500 px-1 py-1">Revision de paradas de emergencia</th>
                                <th style="writing-mode: vertical-rl; text-orientation: mixed;"
                                class="border border-gray-500 px-1 py-1">Revision de paneles electricos</th>
                                <th style="writing-mode: vertical-rl; text-orientation: mixed;"
                                class="border border-gray-500 px-1 py-1">Calibración</th>
                                <th style="writing-mode: vertical-rl; text-orientation: mixed;"
                                class="border border-gray-500 px-1 py-1">Prueba de funcionamiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Fila para Mantenimientos Diarios -->
                        <tr>
                            <td class="border border-gray-500 px-1 py-1 text-center font-bold">Diarios</td>
                            @foreach ($mantenimientosDia as $valor)
                                <td class="border border-gray-500 px-1 py-1 text-center text-white {{ $valor ? 'bg-green-500' : 'bg-red-500' }}">{{ $valor ? 'Sí' : 'No' }}</td>
                            @endforeach
                        </tr>

                        <!-- Fila para Mantenimientos Semestrales -->
                        <tr>
                            <td class="border border-gray-500 px-1 py-1 text-center font-bold">Semestrales</td>
                            @foreach ($mantenimientosSemestral as $valor)
                                <td class="border border-gray-500 px-1 py-1 text-center text-white {{ $valor ? 'bg-green-500' : 'bg-red-500' }}">{{ $valor ? 'Sí' : 'No' }}</td>
                            @endforeach
                        </tr>

                        <!-- Fila para Mantenimientos Anuales -->
                        <tr>
                            <td class="border border-gray-500 px-1 py-1 text-center font-bold">Anuales</td>
                            @foreach ($mantenimientosAnual as $valor)
                                <td class="border border-gray-500 px-1 py-1 text-center text-white {{ $valor ? 'bg-green-500' : 'bg-red-500' }}">{{ $valor ? 'Sí' : 'No' }}
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
