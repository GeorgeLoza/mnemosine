<div>
    <input type="text" wire:model="search" placeholder="Buscar por tiempo...">

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
                            <td
                                class="px-2 py-1.5 text-center text-gray-500 ">
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
