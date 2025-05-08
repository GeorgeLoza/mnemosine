<div class="relative w-full max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-3 border-b rounded-t dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white capitalize">
                Solicitar Orden de trabajo
            </h3>
            <button type="button" wire:click="cerrar"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Modal body -->
        <form class="p-4 md:p-5 text-left" wire:submit="submit" novalidate>



            <div class="form-group">
                <label for="desperfecto"
                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white capitalize">Desperfecto</label>
                <input type="text" id="desperfecto" wire:model="desperfecto"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('desperfecto')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                @enderror
            </div>

            @if ($tipoSeleccion === 'maquinaria')
                <div class="form-group">
                    <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white capitalize">
                        Máquina
                    </label>
                    <div class="relative mb-2">
                        <input type="text" wire:model.live="searchMaquina" placeholder="Buscar máquina..."
                            class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <svg class="absolute right-2.5 top-2.5 h-4 w-4 text-gray-500 dark:text-gray-400"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <select wire:model="maquina_equipo_id"
                        class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Seleccione una máquina</option>
                        @foreach ($maquinas as $maquina)
                            <option value="{{ $maquina->id }}">
                                {{ $maquina->codigo_interno }} - {{ $maquina->tipo }} ({{ $maquina->marca }})
                            </option>
                        @endforeach
                    </select>
                    @error('maquina_equipo_id')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            @else
                <div class="form-group">
                    <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white capitalize">
                        Infraestructura
                    </label>
                    <div class="relative mb-2">
                        <input type="text" wire:model.live="searchInfrestructura"
                            placeholder="Buscar infraestructura..."
                            class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <svg class="absolute right-2.5 top-2.5 h-4 w-4 text-gray-500 dark:text-gray-400"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <select wire:model="mantenimiento_infrestructura_id"
                        class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Seleccione infraestructura</option>
                        @foreach ($infrestructuras as $infrestructura)
                            <option value="{{ $infrestructura->id }}">

                                {{ $infrestructura->subarea }} - 
                                {{ $infrestructura->infrestructura }}
                            </option>
                        @endforeach
                    </select>
                    @error('mantenimiento_infrestructura_id')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            @endif

            <button type="submit"
                class="block text-white items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Agregar
            </button>

            <!-- Loading indicator (mantenido igual) -->
            <div wire:loading>
                <!-- ... mismo código de loading ... -->
            </div>
        </form>
    </div>
</div>
