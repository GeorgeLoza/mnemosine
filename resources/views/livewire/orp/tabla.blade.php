<div>
    <div class="flex justify-end mb-2 gap-2">
        <select wire:model.live='f_estado'
            class="block  p-2 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Escoge un estado</option>
            <option value="Pendiente"> Pendiente</option>
            <option value="Programado"> Programado</option>
            <option value="Cancelado"> Cancelado</option>
            <option value="En proceso"> En proceso</option>
            <option value="Completado"> Completado</option>
        </select>

        <!--Boton importar -->
        <button class="p-2 bg-blue-500 rounded-lg"
            onclick="Livewire.dispatch('openModal', { component: 'orp.importar' })">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 512 512">
                <path
                    d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
            </svg></button>
        <!--Boton Crear -->
        <button class="p-2 bg-green-500 rounded-lg"
            onclick="Livewire.dispatch('openModal', { component: 'orp.crear' })">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-white" viewBox="0 0 448 512">
                <path
                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
            </svg></button>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  overflow-y-auto h-[28rem] overflow-hidden">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-1 py-0 sticky top-0 left-0 z-30 bg-white dark:bg-gray-700"
                        wire:click="sortBy('codigo')">
                        ORP
                    </th>
                    {{-- fecha --}}
                    <th scope="col"
                        class="px-3 py-1 sticky top-0 left-0 z-30 bg-white dark:bg-gray-700 overflow-x-auto"
                        wire:click="sortBy('tiempo_elaboracion')">
                        fecha
                    </th>
                    {{--  --}}
                    <th scope="col" nowrap class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        Código
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        Nombre Producto
                    </th>
                    <th scope="col" class="px-1 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        Destino
                    </th>
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('lote')">
                        PP
                    </th>
                    {{-- categoria --}}
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        categoria
                    </th>
                    {{-- fin categoria --}}
                    <th scope="col" class="px-2 py-1 sticky top-0 bg-white dark:bg-gray-700 "
                        wire:click="sortBy('estado')">
                        estado
                    </th>
                    <th scope="col" class=" hidden px-2 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('tiempo_elaboracion')">
                        Programación
                    </th>
                    <th scope="col" nowrap class=" hidden px-2 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('fecha_vencimiento1')">
                        Fecha Vencimiento 1
                    </th>
                    <th scope="col" nowrap class=" hidden px-2 py-1 sticky top-0 bg-white dark:bg-gray-700"
                        wire:click="sortBy('fecha_vencimiento2')">
                        Fecha Vencimiento 2
                    </th>

                    <th scope="col" class=" gap-2 px-2 py-1 sticky top-0 bg-white dark:bg-gray-700">
                        opciones
                        <button wire:click="show_filtro">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-700 dark:fill-gray-300"
                                viewBox="0 0 512 512">
                                <path
                                    d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
                            </svg>
                        </button>

                    </th>

                </tr>
            </thead>
            <tbody class="">
                @if ($filtro == true)
                    <!-- fila de filtros -->
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 sticky z-20 top-6">


                        <th class="sticky bg-gray-200 dark:bg-gray-800 p-1 left-0 z-30">
                            <input type="" wire:model.live='f_codigo' placeholder="Filtrar por Orp"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        {{-- filtro fecha --}}

                        <th class="sticky bg-gray-200 dark:bg-gray-800 p-1 left-0 z-30">
                            <input type="text" wire:model.live='f_tiempoElaboracion' placeholder="Filtrar por fecha"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        {{-- fin filtro fecha --}}
                        <th class="p-1">
                            <input type="text" wire:model.live='f_codigoProducto' placeholder="Filtrar por código"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_nombreProducto' placeholder="Filtrar por Nombre"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">

                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_lote' placeholder="Filtrar por Lote"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>



                        {{-- filtro categoria --}}
                        <th class="p-1">
                            <select wire:model.live='f_grupo'
                                class="block p-2 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ">
                                <option selected class="font-light">CAT</option>
                                <option value="UHT"> UHT</option>
                                <option value="HTST"> HTST</option>

                            </select>
                        </th>
                        {{-- fin filtro categoria --}}
                        <th class="p-1 ">
                            <select wire:model.live='f_estado'
                                class="block  p-2 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected class="font-normal">Estado</option>
                                <option value="Pendiente"> Pendiente</option>
                                <option value="Programado"> Programado</option>
                                <option value="Cancelado"> Cancelado</option>
                                <option value="En proceso"> En proceso</option>
                                <option value="Completado"> Completado</option>
                            </select>
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_tiempoElaboracion'
                                placeholder="Filtrar por Elaboración"
                                class=" hidden block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_fechaVencimiento1'
                                placeholder="Filtrar por Vencimiento"
                                class=" hidden block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th class="p-1">
                            <input type="text" wire:model.live='f_fechaVencimiento2'
                                placeholder="Filtrar por Vencimiento"
                                class=" hidden block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>



                        <th class="p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" wire:click="limpiarFiltros" viewBox="0 0 576 512"
                                class="h-5 w-5 fill-green-600 dark:fill-green-500">
                                <path
                                    d="M290.7 57.4L57.4 290.7c-25 25-25 65.5 0 90.5l80 80c12 12 28.3 18.7 45.3 18.7H288h9.4H512c17.7 0 32-14.3 32-32s-14.3-32-32-32H387.9L518.6 285.3c25-25 25-65.5 0-90.5L381.3 57.4c-25-25-65.5-25-90.5 0zM297.4 416H288l-105.4 0-80-80L227.3 211.3 364.7 348.7 297.4 416z" />
                            </svg>
                        </th>
                    </tr>
                @endif
                @foreach ($orps as $orp)
                    <tr
                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row"
                            class="sticky flex py-1  bg-white  p-1 left-0 z-10 px-1  font-medium text-gray-900 whitespace-nowrap dark:text-white dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50  dark:hover:bg-gray-600 rounded-lg">
                            {{-- <!--boton reporte ORP--> {{ route('orp.report', ['id' => $orp->id]) }} --}}
                            <a href="{{route('orp.report', ['id' => $orp->id]) }}" class="rounded-md mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-green-600 h-5 w-5"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                </svg>
                            </a>
                            {{ $orp->codigo }}
                        </th>

                        <td class="px-0 overflow-x-auto" nowrap>
                            {{ $orp->tiempo_elaboracion }}
                        </td>

                        <td class="px-2 " nowrap>
                            {{ $orp->producto->codigo }}
                        </td>
                        <td class="px-1 overflow-x-auto  md:w-8 " nowrap>
                            <div class="whitespace-nowrap " data-popover-target="popover-{{ $orp->id }}">
                                {{ Str::limit($orp->producto->nombre, 35) }}</div>
                            <div data-popover id="popover-{{ $orp->id }}" role="tooltip"
                                class="absolute z-10 invisible  text-center inline-block w-auto text-xs text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800 px-1">
                            </div>

                        </td>
                        <td class="px-2 " nowrap>
                            {{ $orp->producto->destino }}
                        </td>
                        <td class="px-2 ">
                            {{ $orp->lote / 1 }}
                        </td>
                        <td class="px-2 " nowrap>
                            {{ $orp->producto->categoria }}
                        </td>
                        <td class="px-2 border-r  " nowrap>

                            @if ($orp->estado == 'Pendiente')
                                <span
                                    class="flex items-center text-xs font-medium me-3 text-yellow-500 uppercase"><span
                                        class="flex w-2.5 h-2.5 bg-yellow-500  rounded-full me-1.5 flex-shrink-0 text-xs"></span>{{ $orp->estado }}</span>
                            @endif

                            @if ($orp->estado == 'En proceso')
                                <span class="flex items-center text-xs font-medium me-3 text-blue-500 uppercase"><span
                                        class="flex w-2.5 h-2.5 bg-blue-600  rounded-full me-1.5 flex-shrink-0"></span>{{ $orp->estado }}</span>
                            @endif

                            @if ($orp->estado == 'Completado')
                                <span
                                    class="flex items-center text-xs font-medium me-3 text-green-500 uppercase "><span
                                        class="flex w-2.5 h-2.5 bg-green-500 rounded-full me-1.5 flex-shrink-0"></span>{{ $orp->estado }}</span>
                            @endif

                            @if ($orp->estado == 'Rechazado')
                                <span class="flex items-center text-xs font-medium me-3 text-red-500 uppercase"><span
                                        class="flex w-2.5 h-2.5 bg-red-500  rounded-full me-1.5 flex-shrink-0"></span>{{ $orp->estado }}</span>
                            @endif

                            @if ($orp->estado == 'Cancelado')
                                <span class="flex items-center text-xs font-medium me-3 text-red-600 uppercase"><span
                                        class="flex w-2.5 h-2.5 bg-red-600 rounded-full me-1.5 flex-shrink-0"></span>{{ $orp->estado }}</span>
                            @endif
                            @if ($orp->estado == 'Programado')
                                <span
                                    class="flex items-center text-xs font-medium me-3 text-purple-500 uppercase"><span
                                        class="flex w-2.5 h-2.5 bg-purple-600  rounded-full me-1.5 flex-shrink-0"></span>{{ $orp->estado }}</span>
                            @endif
                        </td>
                        <td class="px-2  hidden ">
                            {{ $orp->tiempo_elaboracion }}
                        </td>
                        <td class="px-2  hidden ">
                            {{ $orp->fecha_vencimiento1 }}
                        </td>
                        <td class="px-2  hidden ">
                            {{ $orp->fecha_vencimiento2 }}
                        </td>

                        <td class="flex items-center px-2  gap-1 ">
                            <!--boton para programar-->
                            @if ($orp->estado == 'Pendiente')
                                <button class="p-2 rounded-md " wire:click="programar({{ $orp->id }})">
                                    <span
                                        class=" text-purple-700 text-xs font-medium me-2 px-2.5 py-0.5 rounded  dark:text-purple-300 border">Programar</span>
                                </button>
                            @endif
                            <!--boton para cancelar-->

                            <button class="p-2 rounded-md whitespace-nowrap"
                                wire:click="cancelar({{ $orp->id }})">
                                <span
                                    class=" text-red-700 text-xs font-medium me-2 px-2.5 py-0.5 rounded  dark:text-red-400 border-collapse border border-red-500  ">Cancelar</span>
                            </button>

                            <!--boton para pendiente-->
                            @if ($orp->estado != 'Pendiente')
                                <button class="p-2 rounded-md whitespace-nowrap"
                                    wire:click="pendiente({{ $orp->id }})">
                                    <span
                                        class=" text-yellow-700 text-xs font-medium me-2 px-2.5 py-0.5 rounded  dark:text-yellow-300 border">Pendiente</span>
                                </button>
                            @endif

                            <!--boton para cambiar estado en proceso-->
                            @if ($orp->estado == 'Programado')
                                <button class="p-2 rounded-md whitespace-nowrap"
                                    wire:click="iniciar({{ $orp->id }})">
                                    <span
                                        class=" row text-blue-700 text-xs font-medium me-2 px-2.5 py-0.5 rounded  dark:text-blue-300 border">En
                                        Proceso</span>
                                </button>
                            @endif

                            <!--boton para cambiar estado en completado-->
                            @if ($orp->estado == 'En proceso')
                                <button class="p-2 rounded-md whitespace-nowrap"
                                    wire:click="completar({{ $orp->id }})">
                                    <span
                                        class=" text-green-700 text-xs font-medium me-2 px-2.5 py-0.5 rounded  dark:text-green-300 border">Completado</span>
                                </button>
                            @endif








                            <svg onclick="Livewire.dispatch('openModal', { component: 'orp.editar', arguments: { id: {{ $orp->id }} } })"
                                xmlns="http://www.w3.org/2000/svg" class="h-4 w-10 fill-blue-600 dark:fill-blue-500"
                                viewBox="0 0 512 512">
                                <path
                                    d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                            </svg>


                            <svg onclick="Livewire.dispatch('openModal', { component: 'orp.eliminar', arguments: { id: {{ $orp->id }} } })"
                                xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-red-600 dark:fill-red-500"
                                viewBox="0 0 448 512">
                                <path
                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                            </svg>

                        </td>
                    </tr>
                @endforeach


            </tbody>

        </table>
    </div>

    @if (!$aplicandoFiltros)
        <div>
            {{ $orps->links('pagination::tailwind') }}
        </div>
    @endif



</div>
