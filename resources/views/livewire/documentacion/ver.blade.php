<div>
    <div class="flex flex-col w-full gap-2 ">
        <div class="bg-gray-200 rounded p-4 flex flex-col gap-2 ">
            <div class="flex justify-between">
                <h1 class="uppercase font-bold text-gray-700 text-sm">{{ $doc->titulo }}</h1>
                <div class="flex gap-2">
                    <p class="text-blue-500 text-md font-bold">{{ $doc->codigo }}</p>
                    <button wire:click="$dispatch('openModal', {component: 'documentacion.editar', arguments: {id: {{ $doc->id }}}})"
                        class="fill-green-500 hover:fill-green-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5">
                            <path
                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="p-4 bg-gray-100 rounded shadow-sm">
                <h2 class="font-bold text-gray-700 uppercase text-sm mb-2">Información</h2>
                <div class="text-xs space-y-1">
                    <p>{{ $doc->descripcion }}</p>
                    <p><span class="font-bold text-gray-700">Tipo de Documento:</span> {{ $doc->tipo }}</p>
                    <p><span class="font-bold text-gray-700">Área:</span> {{ $doc->area }}</p>
                    <p><span class="font-bold text-gray-700">Versión:</span> {{ $doc->version }}</p>
                    <p><span class="font-bold text-gray-700">Estado:</span> {{ $doc->estado }}</p>
                    <p><span class="font-bold text-gray-700">Realizado por:</span> {{ $doc->creador->name ?? 'No Encontrado' }} {{ $doc->creador->lastname ?? '' }}</p>
                    <p><span class="font-bold text-gray-700">Fecha de Creación:</span> {{ \Carbon\Carbon::parse($doc->fecha_creacion)->format('d/M/Y') }}</p>
                    <p><span class="font-bold text-gray-700">Revisado por:</span> {{ $doc->revisor->name ?? 'No Encontrado' }} {{ $doc->revisor->lastname ?? '' }}</p>
                    <p><span class="font-bold text-gray-700">Fecha de Revisión:</span> {{ \Carbon\Carbon::parse($doc->fecha_revision)->format('d/M/Y') }}</p>
                    <p><span class="font-bold text-gray-700">Aprobado por:</span> {{ $doc->aprovador->name ?? 'No Encontrado' }} {{ $doc->aprovador->lastname ?? '' }}</p>
                    <p><span class="font-bold text-gray-700">Fecha de Aprobación:</span> {{ \Carbon\Carbon::parse($doc->fecha_aprobacion)->format('d/M/Y') }}</p>
                </div>
                
            </div>
        </div>

        <div class="h-full flex flex-col gap-2">
            <div class="h-1/2 bg-gray-200 rounded p-4">
                <h1 class="uppercase font-bold text-gray-700 text-lg">Procedimientos de la misma area</h1>
                <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead
                        class="sticky top-0 z-10 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th></th>
                            <th>
                                #
                            </th>
                            <th wire:click.prevent="sortBy('codigo')" class="px-2 py-1 cursor-pointer">
                                Código
                            </th>
                            <th wire:click.prevent="sortBy('titulo')" class="px-2 py-1 cursor-pointer">
                                Título
                            </th>
                            <th class="px-2 py-1">Tipo</th>
                            <th class="px-2 py-1">Versión</th>
                            <th class="px-2 py-1">Estado</th>
                            <th class="px-2 py-1">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($documentosArea as $doc)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th>
                                    <a href="{{ route('documentacion.ver', ['id' => $doc->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            class="h-5 w-5 fill-green-500">
                                            <path
                                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                        </svg>
                                    </a>
                                </th>
                                <th scope="row"
                                    class="px-2 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-2 py-1.5">{{ $doc->codigo }}</td>
                                <td class="px-2 py-1.5">{{ $doc->titulo }}</td>
                                <td class="px-2 py-1.5">{{ $doc->tipo }}</td>
                                <td class="px-2 py-1.5">{{ $doc->version }}</td>
                                <td class="px-2 py-1.5">
                                    @php
                                        $colores = [
                                            'Borrador' => 'bg-gray-200 text-gray-800',
                                            'Por Revisar' => 'bg-yellow-200 text-yellow-800',
                                            'Por Aprobar' => 'bg-blue-200 text-blue-800',
                                            'Vigente' => 'bg-green-200 text-green-800',
                                            'Obsoleto' => 'bg-red-200 text-red-800',
                                        ];
                                        $colorClase = $colores[$doc->estado] ?? 'bg-gray-100 text-gray-600';
                                    @endphp
                                    <span class="px-2 py-1 text-sm rounded-full {{ $colorClase }}">
                                        {{ $doc->estado }}
                                    </span>
                                </td>

                                <td class="px-2 py-1.5 flex gap-2">
                                    <div
                                        wire:click="$dispatch('openModal', {component: 'documentacion.editar', arguments: {id: {{ $doc->id }}}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="h-5 w-5 fill-green-500">
                                            <path
                                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                        </svg>
                                    </div>
                                    {{-- @if ($doc->pdf_path)
                                        <a href="{{ asset('storage/' . $doc->pdf_path) }}"
                                            download="{{ pathinfo($doc->pdf_path, PATHINFO_BASENAME) }}"
                                            type="application/pdf" class="text-green-500 hover:text-green-700 ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                class="h-5 w-5 fill-red-500">
                                                <path
                                                    d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                                            </svg>
                                        </a>
                                    @endif

                                    @if ($doc->word_path)
                                        <a href="{{ asset('storage/' . $doc->word_path) }}"
                                            download="{{ pathinfo($doc->word_path, PATHINFO_BASENAME) }}"
                                            class="text-green-500 hover:text-green-700 ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                                class="h-5 w-5 fill-blue-500">
                                                <path
                                                    d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM111 257.1l26.8 89.2 31.6-90.3c3.4-9.6 12.5-16.1 22.7-16.1s19.3 6.4 22.7 16.1l31.6 90.3L273 257.1c3.8-12.7 17.2-19.9 29.9-16.1s19.9 17.2 16.1 29.9l-48 160c-3 10-12 16.9-22.4 17.1s-19.8-6.2-23.2-16.1L192 336.6l-33.3 95.3c-3.4 9.8-12.8 16.3-23.2 16.1s-19.5-7.1-22.4-17.1l-48-160c-3.8-12.7 3.4-26.1 16.1-29.9s26.1 3.4 29.9 16.1z" />
                                            </svg>
                                        </a>
                                    @endif --}}


                                    <button wire:click="delete({{ $doc->id }})"
                                        onclick="return confirm('¿Seguro que deseas eliminar este documento?')"
                                        class="text-red-500 hover:text-red-700 ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="h-5 w-5 fill-red-500">
                                            <path
                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="h-1/2 bg-gray-200 rounded p-4">
                <h1 class="uppercase font-bold text-gray-700 text-lg">Documentos del mismo procedimiento</h1>
                <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead
                        class="sticky top-0 z-10 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th></th>
                            <th>
                                #
                            </th>
                            <th wire:click.prevent="sortBy('codigo')" class="px-2 py-1 cursor-pointer">
                                Código
                            </th>
                            <th wire:click.prevent="sortBy('titulo')" class="px-2 py-1 cursor-pointer">
                                Título
                            </th>
                            <th class="px-2 py-1">Tipo</th>
                            <th class="px-2 py-1">Versión</th>
                            <th class="px-2 py-1">Estado</th>
                            <th class="px-2 py-1">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($documentosProcedimiento as $doc)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th>
                                    <a href="{{ route('documentacion.ver', ['id' => $doc->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            class="h-5 w-5 fill-green-500">
                                            <path
                                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                        </svg>
                                    </a>
                                </th>
                                <th scope="row"
                                    class="px-2 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-2 py-1.5">{{ $doc->codigo }}</td>
                                <td class="px-2 py-1.5">{{ $doc->titulo }}</td>
                                <td class="px-2 py-1.5">{{ $doc->tipo }}</td>
                                <td class="px-2 py-1.5">{{ $doc->version }}</td>
                                <td class="px-2 py-1.5">
                                    @php
                                        $colores = [
                                            'Borrador' => 'bg-gray-200 text-gray-800',
                                            'Por Revisar' => 'bg-yellow-200 text-yellow-800',
                                            'Por Aprobar' => 'bg-blue-200 text-blue-800',
                                            'Vigente' => 'bg-green-200 text-green-800',
                                            'Obsoleto' => 'bg-red-200 text-red-800',
                                        ];
                                        $colorClase = $colores[$doc->estado] ?? 'bg-gray-100 text-gray-600';
                                    @endphp
                                    <span class="px-2 py-1 text-sm rounded-full {{ $colorClase }}">
                                        {{ $doc->estado }}
                                    </span>
                                </td>

                                <td class="px-2 py-1.5 flex gap-2">
                                    <div
                                        wire:click="$dispatch('openModal', {component: 'documentacion.editar', arguments: {id: {{ $doc->id }}}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="h-5 w-5 fill-green-500">
                                            <path
                                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                        </svg>
                                    </div>
                                    {{-- @if ($doc->pdf_path)
                                        <a href="{{ asset('storage/' . $doc->pdf_path) }}"
                                            download="{{ pathinfo($doc->pdf_path, PATHINFO_BASENAME) }}"
                                            type="application/pdf" class="text-green-500 hover:text-green-700 ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                class="h-5 w-5 fill-red-500">
                                                <path
                                                    d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                                            </svg>
                                        </a>
                                    @endif

                                    @if ($doc->word_path)
                                        <a href="{{ asset('storage/' . $doc->word_path) }}"
                                            download="{{ pathinfo($doc->word_path, PATHINFO_BASENAME) }}"
                                            class="text-green-500 hover:text-green-700 ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                                class="h-5 w-5 fill-blue-500">
                                                <path
                                                    d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM111 257.1l26.8 89.2 31.6-90.3c3.4-9.6 12.5-16.1 22.7-16.1s19.3 6.4 22.7 16.1l31.6 90.3L273 257.1c3.8-12.7 17.2-19.9 29.9-16.1s19.9 17.2 16.1 29.9l-48 160c-3 10-12 16.9-22.4 17.1s-19.8-6.2-23.2-16.1L192 336.6l-33.3 95.3c-3.4 9.8-12.8 16.3-23.2 16.1s-19.5-7.1-22.4-17.1l-48-160c-3.8-12.7 3.4-26.1 16.1-29.9s26.1 3.4 29.9 16.1z" />
                                            </svg>
                                        </a>
                                    @endif --}}


                                    <button wire:click="delete({{ $doc->id }})"
                                        onclick="return confirm('¿Seguro que deseas eliminar este documento?')"
                                        class="text-red-500 hover:text-red-700 ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="h-5 w-5 fill-red-500">
                                            <path
                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
</div>
