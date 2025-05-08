<div>
    <button class=" cursor-pointer " wire:click="pdf" wire:loading.attr="disabled">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-red-500">
            <path
                d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
        </svg>
    </button>

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

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-h-[calc(100vh-250px)]">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead
                class="sticky top-0 z-10 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center">
                    <th class="px-2 py-1" nowrap>Fecha</th>
                    <th class="px-2 py-1" nowrap>Zunino</th>
                    <th class="px-2 py-1" nowrap>Molde</th>
                    <th class="px-2 py-1" nowrap>Hiline</th>
                    <th class="px-2 py-1" nowrap>Repostería</th>
                    <th class="px-2 py-1" nowrap>BK</th>
                    <th class="px-2 py-1" nowrap>Grissin</th>
                    <th class="px-2 py-1" nowrap>Hornos</th>
                    <th class="px-2 py-1" nowrap>Codificado</th>
                    <th class="px-2 py-1" nowrap>Embolsado T1</th>
                    <th class="px-2 py-1" nowrap>Embolsado T2</th>
                    <th class="px-2 py-1">Embolsado Pan Molde</th>
                    <th class="px-2 py-1" nowrap>Embolsado BK</th>
                    <th class="px-2 py-1">Embolsado Repostería</th>
                    <th class="px-2 py-1">Embolsado Grissin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reporte as $fila)
                    <tr>
                        <td class="px-2 py-1.5 text-center" nowrap>
                            {{ \Carbon\Carbon::parse($fila['fecha'])->format('d/m/y') }}
                            (06:01)
                            a
                            {{ \Carbon\Carbon::parse($fila['fecha'])->addDay()->format('d/m/y') }}
                            (06:00)
                        </td>
                        <td class="px-2 py-1.5 text-center">{{ $fila['zunino'] }}</td>
                        <td class="px-2 py-1.5 text-center">{{ $fila['molde'] }}</td>
                        <td class="px-2 py-1.5 text-center">{{ $fila['hiline'] }}</td>
                        <td class="px-2 py-1.5 text-center">{{ $fila['reposteria'] }}</td>
                        <td class="px-2 py-1.5 text-center">{{ $fila['bk'] }}</td>
                        <td class="px-2 py-1.5 text-center">{{ $fila['grissin'] }}</td>
                        <td class="px-2 py-1.5 text-center">{{ $fila['hornos'] }}</td>
                        <td class="px-2 py-1.5 text-center">{{ $fila['codificado'] }}</td>
                        <td class="px-2 py-1.5 text-center">{{ $fila['embolsado_t1'] }}</td>
                        <td class="px-2 py-1.5 text-center">{{ $fila['embolsado_t2'] }}</td>
                        <td class="px-2 py-1.5 text-center">{{ $fila['embolsado_pan_molde'] }}</td>
                        <td class="px-2 py-1.5 text-center">{{ $fila['embolsado_bk'] }}</td>
                        <td class="px-2 py-1.5 text-center">{{ $fila['embolsado_reposteria'] }}</td>
                        <td class="px-2 py-1.5 text-center">{{ $fila['embolsado_grissin'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
