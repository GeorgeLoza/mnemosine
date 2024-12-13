<div class="flex w-screen justify-center">
    <div
        class="w-full md:w-3/5 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-4" wire:submit.prevent="submit">
            <h5 class="text-xl font-bold text-gray-900 dark:text-white">BPH´S</h5>
            <div>
                <label for="codigo" class="block mb-1 text-sm md:text-lg font-medium text-gray-900 dark:text-white">Código</label>
                <input type="number" wire:model.live="codigo" name="codigo" id="codigo"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Codigo Soalpro" />
                @error('codigo')
                    <p class="mt-2 text-sm md:text-lg text-red-600 dark:text-red-500"> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nombre"
                    class="block mb-1 text-sm md:text-lg font-medium text-gray-900 dark:text-white">Trabajador</label>
                <input type="text" wire:model="nombre" name="nombre" id="nombre" disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm md:text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Nombre del trabajador" />
                @error('trabajador_id')
                    <p class="mt-2 text-sm md:text-lg text-red-600 dark:text-red-500"> {{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="uniforme" type="checkbox" wire:model.live="uniforme"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="uniforme"
                        class="ms-2 text-sm md:text-lg font-medium text-gray-900 dark:text-gray-300">Uniforme</label>
                </div>
                <button data-popover-target="popover-uniforme" data-popover-placement="bottom-end" type="button"><svg
                        class="w-5 h-5 ms-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"></path>
                    </svg><span class="sr-only">Show information</span></button>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="higiene" type="checkbox" wire:model.live="higiene"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="higiene"
                        class="ms-2 text-sm md:text-lg font-medium text-gray-900 dark:text-gray-300">Higiene</label>
                </div>
                <button data-popover-target="popover-higiene" data-popover-placement="bottom-end" type="button"><svg
                        class="w-5 h-5 ms-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"></path>
                    </svg><span class="sr-only">Show information</span></button>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="salud" type="checkbox" wire:model.live="salud"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="salud"
                        class="ms-2 text-sm md:text-lg font-medium text-gray-900 dark:text-gray-300">Salud</label>
                </div>
                <button data-popover-target="popover-salud" data-popover-placement="bottom-end" type="button"><svg
                        class="w-5 h-5 ms-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"></path>
                    </svg><span class="sr-only">Show information</span></button>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="objetos" type="checkbox" wire:model.live="objetos"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="objetos" class="ms-2 text-sm md:text-lg font-medium text-gray-900 dark:text-gray-300">Objetos
                        Extraños</label>
                </div>
                <button data-popover-target="popover-objetos" data-popover-placement="bottom-end" type="button"><svg
                        class="w-5 h-5 ms-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"></path>
                    </svg><span class="sr-only">Show information</span></button>
            </div>

            @if ($extra)
                <div>
                    <label for="observaciones"
                        class="block mb-2 text-sm md:text-lg font-medium text-gray-900 dark:text-white">Observaciones</label>
                    <textarea id="observaciones" rows="4" wire:model="observaciones" value="{{ old('observaciones') }}"
                        class="block p-2.5 w-full text-sm md:text-lg text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Escriba alguna anormalidad al momento de la revision."></textarea>
                </div>
                <div>
                    <label for="correccion"
                        class="block mb-2 text-sm md:text-lg font-medium text-gray-900 dark:text-white">Accion
                        Correctiva</label>
                    <textarea id="correccion" rows="4" wire:model="correccion" value="{{ old('correccion') }}"
                        class="block p-2.5 w-full text-sm md:text-lg text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Escriba la accion que realizo para resolver la observacion."></textarea>
                </div>
            @endif

            <button type="submit"
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm md:text-lg px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>
        </form>
    </div>

    {{-- porpovers --}}
    {{-- uniforme --}}
    <div data-popover id="popover-uniforme" role="tooltip"
        class="absolute z-10 invisible inline-block text-sm md:text-lg text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
        <div class="p-3 space-y-2">
            <h3 class="font-semibold text-gray-900 dark:text-white">Ropa de trabajo</h3>
            <p>El trabajador debe tener la camisa limpia, pantalon limpio, delantal limpio, zapatos limpios, gabacha
                limpia, barbijo limpio y mangas limpias.</p>
        </div>
        <div data-popper-arrow></div>
    </div>

    {{-- higiene --}}
    <div data-popover id="popover-higiene" role="tooltip"
        class="absolute z-10 invisible inline-block text-sm md:text-lg text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
        <div class="p-3 space-y-2">
            <h3 class="font-semibold text-gray-900 dark:text-white">Higiene del Personal</h3>
            <p>El trabajdor debe tener las uñas cortas y limpias, tambien no debe presentar heridas en las manos.</p>
            <h3 class="font-semibold text-gray-900 dark:text-white">Caso hombres:</h3>
            <p>Los trabajadores de genero masculino, deberean tener el cabello corto y tener la barba y bigote afeitado.
            </p>
            <h3 class="font-semibold text-gray-900 dark:text-white">Caso mujeres:</h3>
            <p>Las trabajadoras de genero femenino, deberean tener el cabello recogido y no deberean tener maquillaje.
            </p>
        </div>
        <div data-popper-arrow></div>
    </div>

    {{-- salud --}}
    <div data-popover id="popover-salud" role="tooltip"
        class="absolute z-10 invisible inline-block text-sm md:text-lg text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
        <div class="p-3 space-y-2">
            <h3 class="font-semibold text-gray-900 dark:text-white">Salud del trabajdor</h3>
            <p>El trabajador no debera contar con ninguna dificultad fisica que pueda poner en riesgo su vida, ademas de que no debe estar con alguna enfermedad que pueda ser un peligro para su misma persona, para la inocuidad del producto y del ambiente laboral.</p>
        </div>
        <div data-popper-arrow></div>
    </div>

    {{-- objetos extraños --}}
    <div data-popover id="popover-objetos" role="tooltip"
        class="absolute z-10 invisible inline-block text-sm md:text-lg text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
        <div class="p-3 space-y-2">
            <h3 class="font-semibold text-gray-900 dark:text-white">Objetos extraños</h3>
            <p>Los objetos extraños como ser: joyas, adornos, reloj, monedas, audifonos, basura, etc. estan estrictamente prohibidos al momento de ingresar a planta.</p>
        </div>
        <div data-popper-arrow></div>
    </div>

</div>
