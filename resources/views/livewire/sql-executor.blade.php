<div class="p-4 bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-200">
    <h2 class="text-lg font-semibold">Ejecutar Consulta SQL</h2>

    <!-- Campo para ingresar la consulta SQL -->
    <textarea 
        wire:model="query" 
        placeholder="Introduce tu consulta SQL" 
        rows="5" 
        class="w-full border p-2 bg-gray-50 text-gray-800 border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700">
    </textarea>

    <!-- Botón para ejecutar la consulta -->
    <button 
        wire:click="execute" 
        class="bg-blue-500 text-white p-2 mt-2 rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700">
        Ejecutar
    </button>

    <!-- Mostrar resultados -->
    @if ($result)
        <div class="mt-4">
            <h3 class="text-md font-medium">Resultado:</h3>
            @if (is_array($result) && count($result) > 0)
                <!-- Contenedor con scroll horizontal -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-200 mt-2 dark:border-gray-700">
                        <thead>
                            <tr>
                                <!-- Generar encabezados dinámicos -->
                                @foreach (array_keys((array)$result[0]) as $column)
                                    <th class="border border-gray-300 p-2 bg-gray-100 dark:bg-gray-800 dark:border-gray-700">
                                        {{ $column }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Generar filas dinámicas -->
                            @foreach ($result as $row)
                                <tr>
                                    @foreach ((array)$row as $cell)
                                        <td class="border border-gray-300 p-2 dark:border-gray-700">
                                            {{ $cell }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="mt-2">No se encontraron resultados.</p>
            @endif
        </div>
    @endif

    <!-- Mostrar errores -->
    @if ($error)
        <div class="mt-4 text-red-500 dark:text-red-400">
            <strong>Error:</strong> {{ $error }}
        </div>
    @endif
</div>
