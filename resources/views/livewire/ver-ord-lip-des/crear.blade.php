<div>


    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-2 text-sm">
        @foreach ($sectores as $sector)
            <div id="accordion-open" data-accordion="open"
                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                <div class="text-md font-medium text-gray-900 dark:text-white p-2">
                    <h2 id="accordion-open-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full p-1 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-{{ $sector->id }}" aria-expanded="false"
                            aria-controls="accordion-open-body-1">
                            <span class="flex items-center">{{ $sector->nombre }}</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                </div>



                <div id="accordion-{{ $sector->id }}" class="hidden p-2"
                    aria-labelledby="accordion-{{ $sector->id }}"  >
                    <ul>
                        @foreach ($sector->ordLimDes as $ordLimDes)
                            @php
                                $mostrarLimpieza = $ordLimDes->{$diaActual . '_lo'} == 1;
                                $mostrarDesinfeccion = $ordLimDes->{$diaActual . '_des'} == 1;
                                $mostrarProfunda = $diaActual == 'viernes' && $ordLimDes->viernes_des_pro == 1;
                            @endphp

                            @if ($mostrarLimpieza || $mostrarDesinfeccion || $mostrarProfunda)
                                <li class="mb-3 flex justify-between items-center">
                                    <h6>{{ $ordLimDes->nombre }}</h6>
                                    <div class="flex gap-3">
                                        @if ($mostrarLimpieza)
                                            <div class="form-check flex items-center gap-1">
                                                <input type="checkbox"
                                                    wire:model.live="estados.{{ $ordLimDes->id }}.limpieza" onclick='event.stopPropagation()'
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                    id="limpieza-{{ $ordLimDes->id }}">
                                                <label class="text-sm text-gray-900 dark:text-gray-300"
                                                    for="limpieza-{{ $ordLimDes->id }}">
                                                    LO
                                                </label>
                                            </div>
                                        @endif

                                        @if ($mostrarDesinfeccion)
                                            <div class="form-check flex items-center gap-1">
                                                <input type="checkbox"
                                                    wire:model.live="estados.{{ $ordLimDes->id }}.desinfeccion" onclick='event.stopPropagation()'
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                    id="desinfeccion-{{ $ordLimDes->id }}">
                                                <label class="text-sm text-gray-900 dark:text-gray-300"
                                                    for="desinfeccion-{{ $ordLimDes->id }}">
                                                    D
                                                </label>
                                            </div>
                                        @endif

                                        @if ($mostrarProfunda)
                                            <div class="form-check flex items-center gap-1">
                                                <input type="checkbox"
                                                    wire:model.live="estados.{{ $ordLimDes->id }}.profunda" onclick='event.stopPropagation()'
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                    id="profunda-{{ $ordLimDes->id }}">
                                                <label class="text-sm text-gray-900 dark:text-gray-300"
                                                    for="profunda-{{ $ordLimDes->id }}">
                                                    DP
                                                </label>
                                            </div>
                                        @endif
                                    </div>



                                </li>
                                @if (
                                    (!$estados[$ordLimDes->id]['limpieza'] && $mostrarLimpieza) ||
                                        (!$estados[$ordLimDes->id]['desinfeccion'] && $mostrarDesinfeccion) ||
                                        (!$estados[$ordLimDes->id]['profunda'] && $mostrarProfunda))
                                    <div class="mt-2">
                                        <label for="observaciones-{{ $ordLimDes->id }}"
                                            class="text-sm text-gray-700">Observaciones</label>
                                        <input type="text" wire:model="estados.{{ $ordLimDes->id }}.observaciones"
                                            id="observaciones-{{ $ordLimDes->id }}"
                                            class="w-full border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    </div>
                                    <div class="mt-2">
                                        <label for="correccion-{{ $ordLimDes->id }}"
                                            class="text-sm text-gray-700">Correcciones</label>
                                        <input type="text" wire:model="estados.{{ $ordLimDes->id }}.correccion"
                                            id="correccion-{{ $ordLimDes->id }}"
                                            class="w-full border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                    <button wire:click="registrarPorSector({{ $sector->id }})"
                        class="bg-green-500 text-white rounded-md px-2 py-1">
                        Registrar {{ $sector->nombre }}
                    </button>
                </div>

            </div>
        @endforeach
    </div>
</div>

