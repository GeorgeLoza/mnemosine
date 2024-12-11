<div class="flex gap-1 text-gray-900">
    <!-- Pendiente -->
    <div class="w-1/4 bg-yellow-200 dark:bg-yellow-500 p-2 rounded-xl">
        <h2 class="dark:text-white text-xl font-bold mb-2">Pendiente</h2>
        <div class="scrollbar-hide max-h-[calc(100vh-160px)] overflow-y-auto">
            @foreach ($orpsPendientes as $orp)
                <div class="bg-white pl-1  rounded-lg shadow cursor-pointer mb-1 flex justify-between  h-9">
                    <p class="text-xs font-bold w-11/12 p-1">{{ $orp->codigo }} - <span
                            class="font-normal">{{ $orp->producto->nombre }}</span> - {{ $orp->lote / 1 }}</p>
                    <div class="bg-purple-300 w-1/12 h-full flex justify-center items-center rounded-r-lg"  wire:click="siguiente({{ $orp->id }}, 'Programado')">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512" class="h-3 w-3">
                            <path
                                d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                        </svg>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Programado -->
    <div class="w-1/4 bg-purple-200 dark:bg-purple-500 p-2 rounded-lg">
        <h2 class="dark:text-white text-xl font-bold mb-2">Programado</h2>
        <div class="scrollbar-hide max-h-[calc(100vh-160px)] overflow-y-auto">
            @foreach ($orpsProgramados as $orp)
            <div class="bg-white rounded-lg shadow cursor-pointer mb-1 flex justify-between  h-9">
                <div class="bg-yellow-300 w-5 h-full flex justify-center items-center rounded-l-lg"  wire:click="siguiente({{ $orp->id }}, 'Pendiente')">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512" class="h-3 w-3 rotate-180">
                        <path
                            d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                    </svg>
                </div>
                <p class="text-xs font-bold w-10/12 p-1">{{ $orp->codigo }} - <span
                        class="font-normal">{{ $orp->producto->nombre }}</span> - {{ $orp->lote / 1 }}</p>
                <div class="bg-blue-300 w-5 h-full flex justify-center items-center rounded-r-lg"  wire:click=" siguiente({{ $orp->id }}, 'En proceso') " >
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512" class="h-3 w-3">
                        <path
                            d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                    </svg>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- En Proceso -->
    <div class="w-1/4 bg-blue-200 dark:bg-blue-500 p-2 rounded-lg">
        <h2 class="dark:text-white text-xl font-bold mb-2">En Proceso</h2>
        <div class="max-h-[calc(100vh-160px)] overflow-y-auto">
            @foreach ($orpsEnProceso as $orp)
            <div class="bg-white rounded-lg shadow cursor-pointer mb-1 flex justify-between  h-9">
                <div class="bg-purple-300 w-5 h-full flex justify-center items-center rounded-l-lg"  wire:click="siguiente({{ $orp->id }}, 'Programado')">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512" class="h-3 w-3 rotate-180">
                        <path
                            d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                    </svg>
                </div>
                <p class="text-xs font-bold w-10/12 p-1">{{ $orp->codigo }} - <span
                        class="font-normal">{{ $orp->producto->nombre }}</span> - {{ $orp->lote / 1 }}</p>
                <div class="bg-green-300 w-5 h-full flex justify-center items-center rounded-r-lg"  wire:click="siguiente({{ $orp->id }}, 'Completado')">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512" class="h-3 w-3">
                        <path
                            d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                    </svg>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Completado -->
    <div class="w-1/4 bg-green-200 dark:bg-green-500 p-2 rounded-lg">
        <h2 class="dark:text-white text-xl font-bold mb-2">Completado</h2>
        <div class="max-h-[calc(100vh-160px)] overflow-y-auto">
            @foreach ($orpsCompletados as $orp)
            <div class="bg-white rounded-lg shadow cursor-pointer mb-1 flex justify-between  h-9">
                <div class="bg-blue-300 w-1/12 h-full flex justify-center items-center rounded-l-lg"  wire:click="siguiente({{ $orp->id }}, 'En proceso')">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512" class="h-3 w-3 rotate-180">
                        <path
                            d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                    </svg>
                </div>
                <p class="text-xs font-bold w-11/12 p-1">{{ $orp->codigo }} - <span
                        class="font-normal">{{ $orp->producto->nombre }}</span> - {{ $orp->lote / 1 }}</p>
            </div>
            @endforeach
        </div>
    </div>


</div>
