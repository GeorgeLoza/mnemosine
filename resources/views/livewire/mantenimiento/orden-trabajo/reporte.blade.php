<div class="p-6 bg-white rounded-xl shadow-xl text-gray-800 space-y-6">

    <div class="flex justify-between items-center border-b pb-4">
        <h2 class="text-2xl font-bold">Reporte de Orden de Trabajo</h2>
        <span class="text-sm text-gray-500">#OT-{{ $orden->numero_ot }}</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">

        {{-- Datos generales --}}
        <div>
            <h3 class="font-semibold text-gray-700 mb-1">Información general</h3>
            <div class="space-y-1">
                <p><strong>Tipo de OT:</strong> {{ $orden->tipo_ot }}</p>
                <p><strong>Estado:</strong> {{ ucfirst($orden->estado) }}</p>
                <p><strong>Tiempo de solicitud:</strong>
                    {{ \Carbon\Carbon::parse($orden->tiempo_solicitud)->format('d/m/y') }}</p>
                <p><strong>Tiempo de respuesta:</strong>
                    {{ $orden->tiempo_respuesta ? \Carbon\Carbon::parse($orden->tiempo_respuesta)->format('d/m/y') : 'No registrado' }}
                </p>
            </div>
        </div>

        {{-- Usuarios involucrados --}}
        <div>
            <h3 class="font-semibold text-gray-700 mb-1">Usuarios</h3>
            <div class="space-y-1">
                <p><strong>Solicitante:</strong>
                    {{ $orden->solicitante ? $orden->solicitante->name . ' ' . $orden->solicitante->lastname : 'Desconocido' }}
                </p>

                <p><strong>Técnico asignado:</strong>
                    {{ $orden->tecnico ? $orden->tecnico->name . ' ' . $orden->tecnico->lastname : 'No asignado' }}</p>

                <p><strong>Aprobado por:</strong>
                    {{ $orden->aprobadoPor ? $orden->aprobadoPor->name . ' ' . $orden->aprobadoPor->lastname : 'No aprobado aún' }}
                </p>

            </div>
        </div>

        {{-- Equipo o Infraestructura --}}
        <div>
            <h3 class="font-semibold text-gray-700 mb-1">Equipo / Infraestructura</h3>
            <div class="space-y-1">
                @if ($orden->maquinaEquipo)
                    <p><strong>Máquina o equipo:</strong> {{ $orden->maquinaEquipo->_interno }}</p>
                    <p><strong>Tipo:</strong> {{ $orden->maquinaEquipo->tipo ?? 'No registrado' }}</p>
                    <p><strong>Marca:</strong> {{ $orden->maquinaEquipo->marca ?? 'No registrado' }}</p>
                    <p><strong>Modelo:</strong> {{ $orden->maquinaEquipo->modelo ?? 'No registrado' }}</p>
                @endif

                @if ($orden->mantenimientoInfrestructura)
                    <p><strong>Área:</strong> {{ $orden->mantenimientoInfrestructura->area ?? 'No especificada' }}</p>
                    <p><strong>Subárea:</strong>
                        {{ $orden->mantenimientoInfrestructura->subarea ?? 'No especificada' }}</p>
                    <p><strong>Infraestructura:</strong>
                        {{ $orden->mantenimientoInfrestructura->infraestructura ?? 'No especificada' }}</p>
                @endif




            </div>
        </div>

        {{-- Desperfecto y acción --}}
        <div>
            <h3 class="font-semibold text-gray-700 mb-1">Detalles</h3>
            <div class="space-y-1">
                <p><strong>Desperfecto:</strong></p>
                <p class="bg-gray-100 p-2 rounded">{{ $orden->desperfecto }}</p>

                <p class="mt-2"><strong>Acción realizada:</strong></p>
                <p class="bg-gray-100 p-2 rounded">{{ $orden->accion ?? 'Pendiente de acción' }}</p>
            </div>
        </div>
    </div>

    @if ($herramientas->count())
        <h3 class="text-xl font-bold mt-6 mb-2 text-gray-800">Herramientas y Repuestos Utilizados</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded shadow">
                <thead class="bg-gray-100 text-gray-700 text-xs">
                    <tr>
                        <th class="px-4 py-2 border">Herramienta</th>
                        <th class="px-4 py-2 border">Cantidad Ingreso</th>
                        <th class="px-4 py-2 border">Responsable Ingreso</th>
                        <th class="px-4 py-2 border">Cantidad Salida</th>
                        <th class="px-4 py-2 border">Responsable Salida</th>

                    </tr>
                </thead>
                <tbody class="text-xs text-gray-800">
                    @foreach ($herramientas as $verif)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $verif->herramienta }}</td>
                            <td class="px-4 py-2 text-center">{{ $verif->cantidad_ingreso ?? '-' }}</td>
                            <td class="px-4 py-2">
                                {{ $verif->userIngreso ? $verif->userIngreso->name . ' ' . $verif->userIngreso->lastname : '-' }}
                            </td>


                            <td class="px-4 py-2 text-center">{{ $verif->cantidad_salida ?? '-' }}</td>
                            <td class="px-4 py-2">
                                {{ $verif->userSalida ? $verif->userSalida->name . ' ' . $verif->userSalida->lastname : '-' }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="flex justify-end mt-4">
        <button class=" cursor-pointer " wire:click="pdf" wire:loading.attr="disabled">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-red-500">
                <path
                    d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
            </svg>
        </button>
    </div>
</div>
