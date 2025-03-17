<div class="p-4">
    <button class=" cursor-pointer " wire:click="pdf" wire:loading.attr="disabled">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-red-500">
            <path
                d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
        </svg>
    </button>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-h-[calc(100vh-250px)]">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead
                class="sticky top-0 z-10 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="bg-gray-100">
                    <th scope="col" class=" px-2 py-1">#</th>
                    <th scope="col" class=" px-2 py-1">Tiempo</th>
                    <th scope="col" class=" px-2 py-1">Trabajador</th>
                    <th scope="col" class=" px-2 py-1">Detalle</th>
                    <th scope="col" class=" px-2 py-1">Esparatrapo</th>
                    <th scope="col" class=" px-2 py-1">Guante</th>
                    <th scope="col" class=" px-2 py-1">Responsable Inicio</th>
                    <th scope="col" class=" px-2 py-1">Responsable Fin</th>
                    <th scope="col" class=" px-2 py-1">Observaciones</th>
                    <th scope="col" class=" px-2 py-1">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($curaciones as $curacion)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-2 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-2 py-1.5 whitespace-nowrap">{{ $curacion->tiempo }}</td>
                        <td class="px-2 py-1.5 whitespace-nowrap">{{ $curacion->trabajador->name }}
                            {{ $curacion->trabajador->lastname }}</td>
                        <td class="px-2 py-1.5 whitespace-nowrap">{{ $curacion->detalle }}</td>
                        <td class="px-2 py-1.5 whitespace-nowrap">{{ $curacion->esparatrapo ? 'Sí' : 'No' }}</td>
                        <td class="px-2 py-1.5 whitespace-nowrap">{{ $curacion->guante ? 'Sí' : 'No' }}</td>
                        <td class="px-2 py-1.5 whitespace-nowrap">{{ $curacion->responsableInicio->name }}
                            {{ $curacion->responsableInicio->lastname }}</td>
                        <td class="px-2 py-1.5 whitespace-nowrap">
                            @if ($curacion->responsableFin)
                                {{ $curacion->responsableFin->name }} {{ $curacion->responsableFin->lastname }}
                            @endif
                        </td>
                        <td class="px-2 py-1.5 whitespace-nowrap">{{ $curacion->observaciones }}</td>
                        <td class="px-2 py-1.5 whitespace-nowrap">
                            <div class="flex gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-green-500 w-4 h-4"
                                    viewBox="0 0 512 512" wire:click="fin({{ $curacion->id }})">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                </svg>
                                <button
                                    onclick="Livewire.dispatch('openModal', { component: 'curaciones.editar', arguments: { curacionId: {{ $curacion->id }} } })"
                                    class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-blue-500 w-4 h-4"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                    </svg>
                                </button>



                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    class="w-4 h-4 fill-red-600" wire:click="delete({{ $curacion->id }})"
                                    wire:confirm="Esta seguro que desea borrar al usuario?">
                                    <path
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                </svg>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $curaciones->links() }}
    </div>
</div>
