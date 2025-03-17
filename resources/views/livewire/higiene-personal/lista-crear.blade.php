<div class="relative bg-white rounded-lg shadow dark:bg-gray-700" 
     x-data="{ openPopover: null }"
     @click.away="openPopover = null">
    <!-- Modal header -->
    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            BPH's: {{ $user->name }} {{ $user->lastname }}
        </h3>
        <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            wire:click="$dispatch('closeModal')">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Cerrar</span>
        </button>
    </div>

    <!-- Modal body -->
    <div class="p-4 md:p-5 space-y-4">
        <form class="space-y-4" wire:submit.prevent="submit">
            @foreach(['uniforme', 'higiene', 'salud', 'objetos'] as $field)
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="{{ $field }}" type="checkbox" wire:model="{{ $field }}"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="{{ $field }}"
                        class="ms-2 text-sm md:text-lg font-medium text-gray-900 dark:text-gray-300">
                        {{ ucfirst(str_replace('_', ' ', $field)) }}
                    </label>
                </div>
                <button type="button" 
                        @mouseenter="openPopover = '{{ $field }}'" 
                        @mouseleave="openPopover = null"
                        class="relative">
                    <svg class="w-5 h-5 ms-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                    </svg>
                    
                    <!-- Popover -->
                    <div x-show="openPopover === '{{ $field }}'" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute z-50 w-72 p-3 mt-2 text-sm bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-600 right-0">
                        @include('popovers.'.$field)
                    </div>
                </button>
            </div>
            @endforeach

            <!-- Campos de texto -->
            <div>
                <label for="observaciones" class="block mb-2 text-sm md:text-lg font-medium text-gray-900 dark:text-white">
                    Observaciones
                </label>
                <textarea id="observaciones" rows="4" wire:model="observaciones"
                    class="block p-2.5 w-full text-sm md:text-lg text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escriba alguna anormalidad al momento de la revisión"></textarea>
                @error('observaciones')<p class="text-red-500 font-thin">{{$message}}</p>@enderror
            </div>
            
            <div>
                <label for="correccion" class="block mb-2 text-sm md:text-lg font-medium text-gray-900 dark:text-white">
                    Acción Correctiva
                </label>
                <textarea id="correccion" rows="4" wire:model="correccion"
                    class="block p-2.5 w-full text-sm md:text-lg text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escriba la acción que realizó para resolver la observación"></textarea>
                @error('correccion')<p class="text-red-500 font-thin">{{$message}}</p>@enderror
            </div>

            <!-- Footer del modal -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 gap-3">
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm md:text-lg px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Registrar
                </button>
                <button type="button"
                    wire:click="$dispatch('closeModal')"
                    class="w-full py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>