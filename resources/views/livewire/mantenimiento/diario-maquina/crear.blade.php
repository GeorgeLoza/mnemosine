<div>
    @foreach ($maquinasPorLinea as $grupo)
        <div class="mb-4 p-4 bg-gray-100 shadow rounded-md">
            <h3 class="font-bold text-lg text-blue-600 mb-2">Línea: {{ $grupo['linea'] }}</h3>
            <ul class="list-disc pl-6">
                @foreach ($grupo['maquinas'] as $maquina)
                    <div class="flex justify-between">
                        <li>{{ $maquina['codigo_interno'] }} - {{ $maquina['tipo'] }} {{ $maquina['marca'] }}</li>
                        <div>
                            <button class="bg-green-500 rounded text-white p-1" wire:click="bien({{ $maquina['id'] }})">
                                Bueno
                            </button>
                            <button class="bg-red-500 rounded text-white p-1" wire:click="malo({{ $maquina['id'] }})">
                                Malo
                            </button>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
