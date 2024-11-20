<div class="p-4 bg-gray-100 min-h-screen">
    <div class="md:flex gap-2">
        <!-- Formulario -->
        <div class="md:w-2/6 mb-6 bg-white p-6 rounded shadow">
            <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                <h2 class="text-lg font-semibold mb-4">{{ $isEditMode ? 'Editar Registro' : 'Nuevo Registro' }}</h2>

                <!-- Campo Nombre -->
                <div class="mb-4">
                    <label for="nombre"
                        class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                    <input type="text" id="nombre" wire:model="nombre" placeholder="Ingrese un nombre"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    @error('nombre')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Selección de Sector -->
                <div class="mb-4">
                    <label for="sector_id"
                        class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Sector</label>
                    <select id="sector_id" wire:model="sector_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <option value="">Seleccione un sector</option>
                        @foreach ($sectores as $sector)
                            <option value="{{ $sector->id }}">{{ $sector->nombre }}</option>
                        @endforeach
                    </select>
                    @error('sector_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campos Booleanos -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-4">
                    @foreach (['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'] as $day)
                        @if ($day != 'viernes')
                            <div class="flex items-center space-x-2">
                                <input id="{{ $day }}_lo" type="checkbox" wire:model="{{ $day }}_lo"
                                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                    {{ $this->{$day . '_lo'} ? 'checked' : '' }}>
                                <label for="{{ $day }}_lo"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ ucfirst($day) }}
                                    LO </label>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input id="{{ $day }}_des" type="checkbox"
                                    wire:model="{{ $day }}_des"
                                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                    {{ $this->{$day . '_des'} ? 'checked' : '' }}>
                                <label for="{{ $day }}_des"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ ucfirst($day) }}
                                    DES </label>
                            </div>
                        @endif
                        <!-- Agregar campo adicional, como viernes_des_pro -->
                        @if ($day == 'viernes')
                            <div class="flex items-center space-x-2">
                                <input id="{{ $day }}_des_pro" type="checkbox"
                                    wire:model="{{ $day }}_des_pro"
                                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                    {{ $this->{$day . '_des_pro'} ? 'checked' : '' }}>
                                <label for="{{ $day }}_des_pro"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ ucfirst($day) }}
                                    DES PRO</label>
                            </div>
                        @endif
                    @endforeach
                </div>


                <!-- Botones -->
                <div class="flex items-center space-x-4">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                        {{ $isEditMode ? 'Actualizar' : 'Guardar' }}
                    </button>
                    <button type="button" wire:click="resetInputFields"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabla -->

        <div class="md:w-4/6 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead>
                    <tr>
                        <th class="px-2 py-1 text-center" rowspan="2">Nombre</th>
                        <th class="px-2 py-1 text-center" rowspan="2">Sector</th>
                        <th class="px-2 py-1 text-center" colspan="2">Lunes</th>
                        <th class="px-2 py-1 text-center" colspan="2">Martes</th>
                        <th class="px-2 py-1 text-center" colspan="2">Miercoles</th>
                        <th class="px-2 py-1 text-center" colspan="2">Jueves</th>
                        <th class="px-2 py-1 text-center" colspan="1">Viernes</th>
                        <th class="px-2 py-1 text-center" colspan="2">Sabado</th>
                        <th class="px-2 py-1 text-center" colspan="2">Domingo</th>
                        <th class="px-2 py-1 text-center" rowspan="2">Acciones</th>
                    </tr>
                    <tr>
                        <th class="px-2 py-1 text-center">L+O</th>
                        <th class="px-2 py-1 text-center">D</th>
                        <th class="px-2 py-1 text-center">L+O</th>
                        <th class="px-2 py-1 text-center">D</th>
                        <th class="px-2 py-1 text-center">L+O</th>
                        <th class="px-2 py-1 text-center">D</th>
                        <th class="px-2 py-1 text-center">L+O</th>
                        <th class="px-2 py-1 text-center">D</th>
                        <th class="px-2 py-1 text-center">DP</th>
                        <th class="px-2 py-1 text-center">L+O</th>
                        <th class="px-2 py-1 text-center">D</th>
                        <th class="px-2 py-1 text-center">L+O</th>
                        <th class="px-2 py-1 text-center">D</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-2 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $record->nombre }}</th>
                            <td class="px-2 py-1.5">{{ $record->sector->nombre }}</td>
                            <td class="px-2 py-1.5 text-center">
                                {{ $record->lunes_lo ? 'Sí' : 'No' }}</td>
                            <td class="px-2 py-1.5 text-center">
                                {{ $record->lunes_des ? 'Sí' : 'No' }}</td>
                            <td class="px-2 py-1.5 text-center">
                                {{ $record->martes_lo ? 'Sí' : 'No' }}</td>
                            <td class="px-2 py-1.5 text-center">
                                {{ $record->martes_des ? 'Sí' : 'No' }}</td>
                            <td class="px-2 py-1.5 text-center">
                                {{ $record->miercoles_lo ? 'Sí' : 'No' }}</td>
                            <td class="px-2 py-1.5 text-center">
                                {{ $record->miercoles_des ? 'Sí' : 'No' }}</td>
                            <td class="px-2 py-1.5 text-center">
                                {{ $record->jueves_lo ? 'Sí' : 'No' }}</td>
                            <td class="px-2 py-1.5 text-center">
                                {{ $record->jueves_des ? 'Sí' : 'No' }}</td>
                            <td class="px-2 py-1.5 text-center">
                                {{ $record->sabado_lo ? 'Sí' : 'No' }}</td>
                            <td class="px-2 py-1.5 text-center">
                                {{ $record->sabado_lo ? 'Sí' : 'No' }}</td>
                            <td class="px-2 py-1.5 text-center">
                                {{ $record->sabado_des ? 'Sí' : 'No' }}</td>
                            <td class="px-2 py-1.5 text-center">
                                {{ $record->domingo_lo ? 'Sí' : 'No' }}</td>
                            <td class="px-2 py-1.5 text-center">
                                {{ $record->domingo_des ? 'Sí' : 'No' }}</td>
                            <td class="px-2 py-1.5 text-center">
                                <button wire:click="edit({{ $record->id }})"
                                    class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 focus:outline-none">Editar</button>
                                <button wire:click="delete({{ $record->id }})"
                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 focus:outline-none">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginación -->
            {{ $records->links() }}
        </div>
    </div>
</div>
