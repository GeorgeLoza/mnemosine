<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-2 py-1 whitespace-nowrap">OT</th>
                    <th class="px-2 py-1 whitespace-nowrap">Solicitante</th>
                    <th class="px-2 py-1 whitespace-nowrap">Tipo</th>
                    <th class="px-2 py-1 whitespace-nowrap">Máquina</th>
                    <th class="px-2 py-1 whitespace-nowrap">Estado</th>
                    <th class="px-2 py-1 whitespace-nowrap">desperfecto</th>
                    <th class="px-2 py-1 whitespace-nowrap">Mantenimiento</th>
                    <th class="px-2 py-1 whitespace-nowrap">Acciones</th>
                    <th class="px-2 py-1 whitespace-nowrap">opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenes as $orden)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-2 py-1 whitespace-nowrap">{{ $orden->numero_ot }}</td>
                        <td class="px-2 py-1 whitespace-nowrap">
                            {{ $orden->solicitante->name }}{{ $orden->solicitante->lastname }}</td>
                        <td class="px-2 py-1 whitespace-nowrap">{{ $orden->maquinaEquipo ? 'Maquina/Equipo' : 'Infrestructura' }}</td>
                        <td class="px-2 py-1 whitespace-nowrap"> {{ $orden->maquinaEquipo->codigo_interno ?? ' ' }} -
                            {{ $orden->maquinaEquipo->tipo ?? 'N/A' }}</td>
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
                            {{ $orden->user_tecnico ? $orden->tecnico->name . ' ' . $orden->tecnico->lastname : 'Sin asignar' }}
                        </td>
                        <td class="px-2 py-1 whitespace-nowrap">{{ $orden->accion }}</td>

                        <td class="px-2 py-1 whitespace-nowrap">
                            <div class="flex gap-2">
                                <button wire:click="approve({{ $orden->id }})" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-green-500 w-4 h-4"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                    </svg>
                                </button>

                                <button
                                    onclick="Livewire.dispatch('openModal', { component: 'mantenimiento.ordenTrabajo.editar', arguments: { id: {{ $orden->id }} } })"
                                    class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-blue-500 w-4 h-4"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4l54.1 0 109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109 0-54.1c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7L352 176c-8.8 0-16-7.2-16-16l0-57.4c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $ordenes->links() }}
    </div>
</div>
