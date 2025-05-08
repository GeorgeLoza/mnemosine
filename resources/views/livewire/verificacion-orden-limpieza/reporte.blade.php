<div class="space-y-6">
    <button class=" cursor-pointer " wire:click="pdf" wire:loading.attr="disabled">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-red-500">
            <path
                d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
        </svg>
    </button>
    <!-- Filtros -->
    <div class="bg-white p-4 rounded-lg shadow-sm space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Fecha Inicio</label>
                <input type="date" wire:model.live="startDate"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Fecha Fin</label>
                <input type="date" wire:model.live="endDate"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Responsable</label>
                <select wire:model.live="selectedResponsable"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Todos</option>
                    @foreach ($responsables as $responsable)
                        <option value="{{ $responsable }}">{{ $responsable }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Área</label>
                <select wire:model.live="selectedArea"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Todas</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area }}">{{ $area }}</option>
                    @endforeach
                </select>
            </div>

        </div>
    </div>

    <!-- Tabla Diaria -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="px-4 py-3 bg-blue-50 border-b">
            <h3 class="text-sm font-semibold text-blue-800">Registros Diarios</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Responsable</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Área</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Detalle</th>
                        @foreach ($diarioRange as $dia)
                            <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">
                                {{ $dia->format('d/m') }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($reportes['diario'] as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm">{{ $item['orden']->responsable }}</td>
                            <td class="px-4 py-2 text-sm">{{ $item['orden']->area }}</td>
                            <td class="px-4 py-2 text-sm text-gray-600">{{ $item['orden']->detalle ?? '-' }}</td>
                            @foreach ($item['registros'] as $registro)
                                <td
                                    class="px-4 py-2 text-center text-sm {{ $registro['count'] > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $registro['count'] }}
                                </td>
                            @endforeach
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ 3 + count($diarioRange) }}"
                                class="px-4 py-4 text-center text-sm text-gray-500">No hay registros diarios</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabla Semanal -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="px-4 py-3 bg-blue-50 border-b">
            <h3 class="text-sm font-semibold text-blue-800">Registros Semanales</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Responsable</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Área</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Detalle</th>
                        @foreach ($semanalRange as $semana)
                            <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Sem.
                                {{ $semana['label'] }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($reportes['semanal'] as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm">{{ $item['orden']->responsable }}</td>
                            <td class="px-4 py-2 text-sm">{{ $item['orden']->area }}</td>
                            <td class="px-4 py-2 text-sm text-gray-600">{{ $item['orden']->detalle ?? '-' }}</td>
                            @foreach ($item['registros'] as $registro)
                                <td
                                    class="px-4 py-2 text-center text-sm {{ $registro['count'] > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $registro['count'] }}
                                </td>
                            @endforeach
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ 3 + count($semanalRange) }}"
                                class="px-4 py-4 text-center text-sm text-gray-500">No hay registros semanales</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabla Mensual -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="px-4 py-3 bg-blue-50 border-b">
            <h3 class="text-sm font-semibold text-blue-800">Registros Mensuales</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Responsable</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Área</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Detalle</th>
                        @foreach ($mensualRange as $mes)
                            <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">
                                {{ $mes['label'] }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($reportes['mensual'] as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm">{{ $item['orden']->responsable }}</td>
                            <td class="px-4 py-2 text-sm">{{ $item['orden']->area }}</td>
                            <td class="px-4 py-2 text-sm text-gray-600">{{ $item['orden']->detalle ?? '-' }}</td>
                            @foreach ($item['registros'] as $registro)
                                <td
                                    class="px-4 py-2 text-center text-sm {{ $registro['count'] > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $registro['count'] }}
                                </td>
                            @endforeach
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ 3 + count($mensualRange) }}"
                                class="px-4 py-4 text-center text-sm text-gray-500">No hay registros mensuales</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
