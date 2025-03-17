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
                <th class="px-2 py-1" >Embolsado Pan Molde</th>
                <th class="px-2 py-1" nowrap>Embolsado BK</th>
                <th class="px-2 py-1" >Embolsado Repostería</th>
                <th class="px-2 py-1" >Embolsado Grissin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reporte as $fila)
                <tr>
                    <td class="px-2 py-1.5 text-center" nowrap>{{ \Carbon\Carbon::parse($fila['fecha'])->format('d/m/y') }}</td>
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