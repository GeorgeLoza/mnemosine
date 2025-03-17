<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Documento</h2>

    <form wire:submit.prevent="save" class="space-y-6" enctype="multipart/form-data">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Sección Información Básica -->
            <div class="col-span-2">
                <h3 class="text-lg font-semibold mb-4 text-blue-600">Información Básica</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Código *</label>
                        <input type="text" wire:model="codigo"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('codigo')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Título *</label>
                        <input type="text" wire:model="titulo"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('titulo')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea wire:model="descripcion" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>
                </div>
            </div>

            <!-- Sección Clasificación -->
            <div>
                <h3 class="text-lg font-semibold mb-4 text-blue-600">Clasificación</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tipo *</label>
                        <select wire:model="tipo"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option selected>Escoge un tipo</option>
                            <option value="Procedimiento">Procedimiento</option>
                            <option value="Instructivo">Instructivo</option>
                            <option value="Registro">Registro</option>
                            <option value="Plan">Plan</option>
                            <option value="Programa">Programa</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Área *</label>
                        <select wire:model="area"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option selected>Escoge un Area</option>
                            <option value="Panaderia">Panaderia</option>
                            <option value="SIMA">SIMA</option>
                            <option value="Aseguramiento de la calidad">Aseguramiento de la calidad</option>
                            <option value="RRHH">Recursos Humanos</option>
                            <option value="Compras">Compras</option>
                            <option value="Ventas">Ventas</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Versión *</label>
                        <input type="text" wire:model="version"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('version')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Estado *</label>
                        <select wire:model="estado"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option selected>Escoge un el estado Inicial </option>
                            <option value="Borrador">Borrador</option>
                            <option value="En Revisión">Por revisar</option>
                            <option value="En Revisión">Revisado</option>
                            <option value="Aprobado">Aprobado</option>
                            <option value="Obsoleto">Obsoleto</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Sección Referencias y Archivos -->
            <div>
                <h3 class="text-lg font-semibold mb-4 text-blue-600">Referencias y Archivos</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Documento Referenciado</label>
                        <select wire:model="documento_referenciado_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Seleccionar...</option>
                            @foreach ($documentos as $doc)
                                <option value="{{ $doc->id }}">{{ $doc->codigo }} - {{ $doc->titulo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Archivo PDF Actual</label>
                        @if ($current_pdf)
                            <div class="mt-2 text-sm text-green-600">
                                {{ basename($current_pdf) }}
                                <a href="{{ asset('storage/' . $current_pdf) }}" target="_blank"
                                    class="text-blue-500 hover:text-blue-700 ml-2">
                                    Ver
                                </a>
                            </div>
                        @else
                            <span class="text-red-500 text-sm">No hay archivo cargado</span>
                        @endif

                        <label class="block text-sm font-medium text-gray-700 mt-4">Actualizar PDF</label>
                        <input type="file" wire:model="new_pdf" accept=".pdf" class="mt-1 block w-full">
                        @error('new_pdf')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Archivo Word Actual</label>
                        @if ($current_word)
                            <div class="mt-2 text-sm text-green-600">
                                {{ basename($current_word) }}
                            </div>
                        @else
                            <span class="text-red-500 text-sm">No hay archivo cargado</span>
                        @endif

                        <label class="block text-sm font-medium text-gray-700 mt-4">Actualizar Word</label>
                        <input type="file" wire:model="new_word" class="mt-1 block w-full">
                        @error('new_word')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Sección Revisión y Aprobación -->
            <div class="col-span-2">
                <h3 class="text-lg font-semibold mb-4 text-blue-600">Revisión y Aprobación</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Revisor</label>
                        <select wire:model="revisor_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Seleccionar revisor...</option>
                            @foreach ($usuarios as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha Revisión</label>
                        <input type="date" wire:model="fecha_revision"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Aprobador</label>
                        <select wire:model="aprobador_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Seleccionar aprobador...</option>
                            @foreach ($usuarios as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha Aprobación</label>
                        <input type="date" wire:model="fecha_aprobacion"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
            </div> 
        </div>

        <div class="pt-6 flex justify-between">
            <button type="button" wire:click="cancel"
                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-md">
                Cancelar
            </button>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                Actualizar Documento
            </button>
        </div>
    </form>
</div>
