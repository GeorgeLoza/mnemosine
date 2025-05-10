<div>
    <div class="flex flex-wrap gap-4 mb-4 items-end">
        
        <div class="flex gap-4">
            <div class="flex flex-col">
                <label class="text-sm font-medium">Fecha Inicio</label>
                <input type="date" wire:model.live="fechaInicio" 
                       class="p-2 border rounded-md text-sm">
            </div>
            
            <div class="flex flex-col">
                <label class="text-sm font-medium">Fecha Fin</label>
                <input type="date" wire:model.live="fechaFin" 
                       class="p-2 border rounded-md text-sm">
            </div>
        </div>
    </div>
    <!-- Tabla -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-h-[calc(100vh-250px)]">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead
                class="sticky top-0 z-10 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-1" nowrap>
                        #
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        Tiempo
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        Turno
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        Zunino
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        molde
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        Hi-Line
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        Reposteria
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        HI LINE - BK
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        grissin
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        HORNOS
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        codificado
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        EMBOLSADO T1
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        EMBOLSADO T2
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        EMBOLSADO PAN MOLDE
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        EMBOLSADO BK
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        EMBOLSADO REPOSTERIA
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        EMBOLSADO DE GRISSIN
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        Responsable
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        observaciones
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        correcciones
                    </th>
                    <th scope="col" class="px-2 py-1" nowrap>
                        Acciones
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($evacuaciones as $evacuacion)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-2 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-2 py-1.5 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($evacuacion->tiempo)->format('H:i d/m/y') }}
                        </td>
                        <td class="px-2 py-1.5">
                            {{ $evacuacion->turno }}
                        </td>
                        @foreach (['zunino', 'molde', 'hiline', 'reposteria', 'bk', 'grissin', 'hornos', 'codificado', 'embolsado_t1', 'embolsado_t2', 'embolsado_pan_molde', 'embolsado_bk', 'embolsado_reposteria', 'embolsado_grissin'] as $field)
                            <td class="px-2 py-1.5 text-center text-gray-500 ">
                                {{ $evacuacion->$field == 1 ? '✔️' : '-' }}
                            </td>
                        @endforeach

                        <td class="px-2 py-1.5">
                            {{ $evacuacion->user->name }}
                            {{ $evacuacion->user->lastname }}
                        </td>
                        <td class="px-2 py-1.5">
                            {{ $evacuacion->observaciones }}
                        </td>
                        <td class="px-2 py-1.5">
                            {{ $evacuacion->correccion }}
                        </td>
                        <td class="px-2 py-1.5">
                            @if (auth()->user()->rol === 'Admi' ||
                                    (auth()->user()->rol === 'Supervisor' && now()->diffInMinutes($evacuacion->created_at) <= 60))
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    class="w-4 h-4 fill-red-600" wire:click="delete({{ $evacuacion->id }})"
                                    wire:confirm="Esta seguro que desea borrar al usuario?">
                                    <path
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                </svg>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Paginación -->
        <div class="sticky bottom-0 bg-white dark:bg-gray-800 pt-2">
            {{ $evacuaciones->links() }}
        </div>
    </div>


</div>
