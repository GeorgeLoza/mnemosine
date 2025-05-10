<div>
    <div class="mb-4 grid grid-cols-1 md:grid-cols-6 gap-2">
        <div>
            <label>Numero OT</label>
            <input type="text" class="w-full border rounded px-2 py-1" wire:model.live.debounce.300ms="ot">
        </div>
        <div>
            <label>Estado</label>
            <select wire:model.live.debounce.300ms="estado" class="w-full border rounded px-2 py-1">
                <option value="">Todos</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Por Revisar">Por Revisar</option>
                <option value="Completado">Completado</option>
            </select>
        </div>
        {{-- <div>
            <label>Tipo</label>
            <select wire:model.live.debounce.300ms="tipo" class="w-full border rounded px-2 py-1">
                <option value="">Todos</option>
                <option value="Maquina">Maquina/Equipo</option>
                <option value="Infraestructura">Infraestructura</option>
            </select>
        </div> --}}

        <div>
            <label>Desde</label>
            <input type="date" wire:model.live.debounce.300ms="fecha_inicio" class="w-full border rounded px-2 py-1">
        </div>
        <div>
            <label>Hasta</label>
            <input type="date" wire:model.live.debounce.300ms="fecha_fin" class="w-full border rounded px-2 py-1">
        </div>
        <div class="flex items-end">
            <button wire:click="clearFilters" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                Limpiar
            </button>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-2 py-1 whitespace-nowrap">Acciones</th>
                    <th class="px-2 py-1 whitespace-nowrap">Fecha</th>
                    <th class="px-2 py-1 whitespace-nowrap">OT</th>
                    <th class="px-2 py-1 whitespace-nowrap">Solicitante</th>
                    <th class="px-2 py-1 whitespace-nowrap">Tipo</th>
                    <th class="px-2 py-1 whitespace-nowrap">Máquina</th>
                    <th class="px-2 py-1 whitespace-nowrap">Infrestructura</th>
                    <th class="px-2 py-1 whitespace-nowrap">Estado</th>
                    <th class="px-2 py-1 whitespace-nowrap">desperfecto</th>
                    <th class="px-2 py-1 whitespace-nowrap">Fecha Respuesta</th>
                    <th class="px-2 py-1 whitespace-nowrap">Mantenimiento</th>
                    <th class="px-2 py-1 whitespace-nowrap">Acciones</th>
                    <th class="px-2 py-1 whitespace-nowrap">Liberado por</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenes as $orden)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-2 py-1 whitespace-nowrap">
                            <div class="flex gap-4">

                            
                                <button
                                    onclick="Livewire.dispatch('openModal', { component: 'mantenimiento.ordenTrabajo.reporte', arguments: { id: {{ $orden->id }} } })"
                                    class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512" class="fill-green-500 w-4 h-4">
                                        <path
                                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                    </svg>
                                </button>

                                @if ($orden->created_at->diffInMinutes(now()) < 720)
                                    <button wire:click="delete({{ $orden->id }})" class="btn btn-success"
                                        wire:click="delete" wire:confirm="Seguro que desea eliminar el registro ?">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="fill-red-500 w-4 h-4">
                                            <path
                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                    </button>
                                @endif

                                @if ($orden->estado == 'Por Revisar')
                                    <button wire:click="approve({{ $orden->id }})" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-green-500 w-4 h-4"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                        </svg>
                                    </button>
                                @endif
                                @if ($orden->estado == 'Pendiente')
                                    <button
                                        onclick="Livewire.dispatch('openModal', { component: 'mantenimiento.ordenTrabajo.editar', arguments: { id: {{ $orden->id }} } })"
                                        class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-blue-500 w-4 h-4"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4l54.1 0 109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109 0-54.1c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7L352 176c-8.8 0-16-7.2-16-16l0-57.4c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                        </svg>
                                    </button>

                                    <button
                                        onclick="Livewire.dispatch('openModal', { component: 'mantenimiento.ordenTrabajo.verificacionHerramienta', arguments: { ot_id: {{ $orden->id }} } })"
                                        class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-blue-500 w-4 h-4"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32l288 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-288 0c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                        </svg>
                                    </button>
                                @endif


                                @if (auth()->user()->rol === 'Admi' ||
                                (auth()->user()->rol === 'Supervisor' && now()->diffInMinutes($orden->created_at) <= 60))
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                class="w-4 h-4 fill-red-600" wire:click="delete({{ $orden->id }})"
                                wire:confirm="Esta seguro que desea borrar al usuario?">
                                <path
                                    d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                            </svg>
@endif
                            </div>
                        </td>
                        <td class="px-2 py-1 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($orden->tiempo_solicitud)->format('d/M/Y') }}</td>
                        <td class="px-2 py-1 whitespace-nowrap">{{ $orden->numero_ot }}</td>
                        <td class="px-2 py-1 whitespace-nowrap">
                            {{ $orden->solicitante->name }} {{ $orden->solicitante->lastname }}</td>
                        <td class="px-2 py-1 whitespace-nowrap">
                            {{ $orden->maquinaEquipo ? 'Maquina/Equipo' : 'Infrestructura' }}</td>
                        <td class="px-2 py-1 whitespace-nowrap"> {{ $orden->maquinaEquipo->codigo_interno ?? ' ' }} -
                            {{ $orden->maquinaEquipo->tipo ?? 'N/A' }}</td>
                        <td class="px-2 py-1 whitespace-nowrap">
                            {{ $orden->mantenimiento_infrestructura_id ? $orden->mantenimientoInfrestructura?->infrestructura . ' / ' . $orden->mantenimientoInfrestructura?->subarea : 'N/A' }}
                        </td>
                        <td class="px-2 py-1 whitespace-nowrap">
                            @if ($orden->estado == 'Pendiente')
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $orden->estado }}</span>
                            @endif
                            @if ($orden->estado == 'Por Revisar')
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $orden->estado }}</span>
                            @endif
                            @if ($orden->estado == 'Completado')
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $orden->estado }}</span>
                            @endif
                        </td>
                        <td class="px-2 py-1 whitespace-nowrap">{{ $orden->desperfecto }}</td>
                        <td class="px-2 py-1 whitespace-nowrap">
                            @if ($orden->tiempo_respuesta)
                            {{ \Carbon\Carbon::parse($orden->tiempo_respuesta)->format('d/M/Y') }}
                            @else
                                -
                            @endif
                            </td>
                        <td class="px-2 py-1 whitespace-nowrap">
                            {{ $orden->user_tecnico ? $orden->tecnico->name . ' ' . $orden->tecnico->lastname : 'Sin asignar' }}
                        </td>
                        <td class="px-2 py-1 whitespace-nowrap">{{ $orden->accion }}</td>
                        <td class="px-2 py-1 whitespace-nowrap">
                            {{ $orden->user_aprobado ? $orden->aprobadoPor->name . ' ' . $orden->aprobadoPor->lastname : '-' }}
                        </td>



                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $ordenes->links() }}
    </div>
</div>
