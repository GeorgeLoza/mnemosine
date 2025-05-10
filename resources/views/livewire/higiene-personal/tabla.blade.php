<div>
    <!-- Filtros -->
    <div class="flex flex-wrap gap-4 mb-4 items-end p-4 bg-gray-50 rounded-lg">
        <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700">Fecha</label>
            <input type="date" wire:model.live.debounce.300ms="fecha" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
        
        <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700">Código</label>
            <input type="text" wire:model.live.debounce.300ms="codigo" placeholder="Buscar por código"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
        
        <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" wire:model.live.debounce.300ms="nombre" placeholder="Buscar por nombre"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
        
        <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700">Apellido</label>
            <input type="text" wire:model.live.debounce.300ms="apellido" placeholder="Buscar por apellido"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700">Sector</label>
            <select  wire:model.live.debounce.300ms="sector" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option selected>Todos</option>
                <option value="Panaderia">Panaderia</option>
                <option value="Almacenes">Almacenes</option>
              </select>
            
        </div>
        
        <button wire:click="resetFilters" 
                class="h-fit px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-md text-sm">
            Limpiar Filtros
        </button>
    </div>

    <!-- Tabla -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-h-[calc(100vh-250px)]">
        <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="sticky top-0 z-10 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-1">
                        #
                    </th>
                    <th scope="col" class="px-2 py-1">
                        fecha
                    </th>
                    <th scope="col" class="px-2 py-1">
                        codigo
                    </th>
                    <th scope="col" class="px-2 py-1">
                        trabajador
                    </th>
                    <th scope="col" class="px-2 py-1">
                        uniforme
                    </th>
                    <th scope="col" class="px-2 py-1">
                        higiene
                    </th>
                    <th scope="col" class="px-2 py-1">
                        salud
                    </th>
                    <th scope="col" class="px-2 py-1">
                        Sin objetos extraños
                    </th>
                    <th scope="col" class="px-2 py-1">
                        observaciones
                    </th>
                    <th scope="col" class="px-2 py-1">
                        correcciones
                    </th>
                    <th scope="col" class="px-2 py-1">
                        Supervisor
                    </th>
                    <th scope="col" class="px-2 py-1">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($higienes as $higiene)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-2 py-1.5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-2 py-1.5 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($higiene->tiempo)->format('H:i d/m/y') }}
                        </td>
                        <td class="px-2 py-1.5">
                            {{ $higiene->trabajador->codigo }}
                        </td>
                        <td class="px-2 py-1.5">
                            {{ $higiene->trabajador->name }}
                            {{ $higiene->trabajador->lastname }}
                        </td>
                        <td class="px-2 py-1.5 text-center text-white {{$higiene->uniforme ? 'bg-green-500' : 'bg-red-500'}}">
                            {{$higiene->uniforme ? 'Si' : 'No'}}
                        </td>
                        <td class="px-2 py-1.5 text-center text-white {{$higiene->higiene ? 'bg-green-500' : 'bg-red-500'}}">
                            {{$higiene->higiene ? 'Si' : 'No'}}
                        </td>
                        <td class="px-2 py-1.5 text-center text-white {{$higiene->salud ? 'bg-green-500' : 'bg-red-500'}}">
                            {{$higiene->salud ? 'Si' : 'No'}}
                        </td>
                        <td class="px-2 py-1.5 text-center text-white {{$higiene->objetos_extranos ? 'bg-green-500' : 'bg-red-500'}}">
                            {{$higiene->objetos_extranos ? 'Si' : 'No'}}
                        </td>
                        <td class="px-2 py-1.5">
                            {{ $higiene->observaciones }}
                        </td>
                        <td class="px-2 py-1.5">
                            {{ $higiene->correccion }}
                        </td>
                        <td class="px-2 py-1.5">
                            {{ $higiene->supervisor->name }} {{ $higiene->supervisor->lastname }}
                        </td>
                        <td class="px-2 py-1.5">
                            @if (auth()->user()->rol === 'Admi' ||
                                    (auth()->user()->rol === 'Supervisor' && now()->diffInMinutes($higiene->created_at) <= 60))
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    class="w-4 h-4 fill-red-600" wire:click="delete({{ $higiene->id }})"
                                    wire:confirm="Esta seguro que desea borrar al usuario?">
                                    <path
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                </svg>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Paginación -->
        <div class="sticky bottom-0 bg-white dark:bg-gray-800 pt-2">
            {{ $higienes->links() }}
        </div>
    </div>
    <div wire:loading>
        <div
            class="fixed inset-0 flex items-center justify-center bg-gray-50 bg-opacity-75 dark:bg-gray-800 dark:bg-opacity-75 z-50">
            <div role="status">
                <svg aria-hidden="true" class="w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>

