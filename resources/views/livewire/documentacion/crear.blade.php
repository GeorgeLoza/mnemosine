<div>
    <h2 class="text-2xl font-bold mb-2 text-gray-800">Nuevo Documento</h2>

    <form wire:submit.prevent="save" class="space-y-6" enctype="multipart/form-data">
        <div>
            <div class="flex gap-2">
                <!-- Sección Información Básica -->
                <div class="w-1/2">
                    <div class="space-y-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Código *</label>
                            <input type="text" wire:model="codigo"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('codigo')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Título *</label>
                            <input type="text" wire:model="titulo"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('titulo')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Descripción</label>
                            <textarea wire:model="descripcion" rows="3"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tipo Documento *</label>
                            <select wire:model="tipo"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Escoge un tipo</option>
                                <option value="Procedimiento">Procedimiento</option>
                                <option value="Instructivo">Instructivo</option>
                                <option value="Registro">Registro</option>
                                <option value="Plan">Plan</option>
                                <option value="Programa">Programa</option>
                                <option value="Política">Política</option>
                                <option value="Objetivos de Sistema de Gestion">Objetivos de Sistema de Gestion</option>
                                <option value="Manual de Sistema de Gestion">Manual de Sistema de Gestion</option>
                                <option value="Manual Operativo">Manual Operativo</option>
                                <option value="Protocolo">Protocolo</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Sección Clasificación -->
                <div class="w-1/2">
                    <div class="space-y-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Área en la que se encuentra *</label>
                            <select wire:model="area"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Escoge un Area</option>
                                <option value="Panaderia">Panaderia</option>
                                <option value="SIMA">SIMA</option>
                                <option value="Aseguramiento de la calidad">Aseguramiento de la calidad</option>
                                <option value="RRHH">Recursos Humanos</option>
                                <option value="Compras">Compras</option>
                                <option value="Ventas">Ventas</option>
                                <option value="Almacenes">Almacenes</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Versión *</label>
                            <input type="text" wire:model="version"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('version')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Estado *</label>
                            <select wire:model="estado"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Escoge un el estado Inicial </option>
                                <option value="Borrador">Borrador</option>
                                <option value="Por Revisar">Por Revisar</option>
                                <option value="Por Aprobar">Por Aprobar</option>
                                <option value="Vigente">Vigente</option>
                                <option value="Obsoleto">Obsoleto</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tipo de Presentación</label>
                            <select wire:model="presentacion"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Seleccionar presentación</option>
                                <option value="Fisico">Físico</option>
                                <option value="Digital">Digital</option>
                                <option value="FyD">FyD</option>
                            </select>
                            @error('presentacion')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Documento Referenciado</label>
                            <select wire:model="documento_referenciado_id"
                                class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Seleccionar...</option>
                                @foreach ($documentos as $doc)
                                    <option value="{{ $doc->id }}">{{ $doc->codigo }} - {{ $doc->titulo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div>

                </div>

                <div class="flex gap-2 bg-gray-100 rounded-md p-2 m-2 ">
                    <div class="w-1/2">
                        <label class="block text-sm font-medium text-gray-700">Archivo PDF</label>
                        <input type="file" wire:model="pdf_path"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">

                        @error('pdf_path')
                            <div class="mt-1 text-red-500 text-sm">
                                @if ($message == 'El archivo deb de ser tipo: pdf.')
                                    Formato no válido. Solo se aceptan PDF
                                @elseif($message == 'The pdf path may not be greater than 5120 kilobytes.')
                                    El archivo excede el límite de 5MB
                                @else
                                    Error al subir el archivo: {{ $message }}
                                @endif
                            </div>
                        @enderror

                        @if ($pdf_path)
                            <div class="mt-2 text-sm text-green-600">
                                Archivo listo: {{ $pdf_path->getClientOriginalName() }}
                                ({{ number_format($pdf_path->getSize() / 1024, 2) }} KB)
                            </div>
                        @endif
                    </div>
                    <div class="w-1/2">
                        <label class="block text-sm font-medium text-gray-700">Archivo Word</label>
                        <input type="file" wire:model="word_path"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        @error('word_path')
                            <div class="mt-1 text-red-500 text-sm">
                                @if ($message == 'El archivo deb de ser tipo: word.')
                                    Formato no válido. Solo se aceptan PDF
                                @elseif($message == 'The pdf path may not be greater than 5120 kilobytes.')
                                    El archivo excede el límite de 5MB
                                @else
                                    Error al subir el archivo: {{ $message }}
                                @endif
                            </div>
                        @enderror

                        @if ($word_path)
                            <div class="mt-2 text-sm text-green-600">
                                Archivo listo: {{ $word_path->getClientOriginalName() }}
                                ({{ number_format($word_path->getSize() / 1024, 2) }} KB)
                            </div>
                        @endif

                    </div>

                </div>
            </div>

            <!-- Sección Revisión y Aprobación -->
            <div class="col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Creador</label>
                        <select wire:model="creador_id"
                            class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Seleccionar creador...</option>
                            @foreach ($usuarios as $user)
                                <option value="{{ $user->id }}">{{ $user->name . ' ' . $user->lastname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha de creación</label>
                        <input type="date" wire:model="fecha_creacion"
                            class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Revisor</label>
                        <select wire:model="revisor_id"
                            class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Seleccionar revisor...</option>
                            @foreach ($usuarios as $user)
                                <option value="{{ $user->id }}">{{ $user->name . ' ' . $user->lastname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha Revisión</label>
                        <input type="date" wire:model="fecha_revision"
                            class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Aprobador</label>
                        <select wire:model="aprovador_id"
                            class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Seleccionar aprobador...</option>
                            @foreach ($usuarios as $user)
                                <option value="{{ $user->id }}">{{ $user->name . ' ' . $user->lastname }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha Aprobación</label>
                        <input type="date" wire:model="fecha_aprobacion"
                            class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-6">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">
                Guardar Documento
            </button>
        </div>
    </form>
</div>
