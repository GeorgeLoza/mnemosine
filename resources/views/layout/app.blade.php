<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="manifest" href="/manifest.json">

    <script src="{{ asset('js/flowbite.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('build/assets/app-CtNlhPbr.css') }}">
    <script src="{{ asset('build/assets/app-BJi2HfH9.js ') }}" defer></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
    <title>Panaderia</title>
</head>

<body class="dark:bg-gray-800 dark:text-white">

    <nav class="bg-white border-gray-200 dark:bg-gray-900 fixed top-0 z-50 w-full">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 dark:fill-white" viewBox="0 0 512 512">
                    <path
                        d="M256 32C192 32 0 64 0 192c0 35.3 28.7 64 64 64V432c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V256c35.3 0 64-28.7 64-64C512 64 320 32 256 32z" />
                </svg>
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Panaderia</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium text-sm flex flex-col items-center p-4 md:p-1 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">


                    {{-- <!-- orp -->
                    <a href="{{ route('orp.index') }}"
                        class="flex items-center justify-between w-full py-2 px-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-gray-200 md:border-0 md:hover:text-gray-700 md:p-1 md:w-auto dark:text-white md:dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-gray-800 cursor-pointer">ORP
                    </a> --}}

                    @if (in_array(auth()->user()->rol, ['Admi', 'Visor', 'Jefatura', 'Supervisor']))
                        <!-- higienePersonal -->
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar-higienePersonal"
                            class="flex items-center justify-between w-full py-2 px-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-gray-200 md:border-0 md:hover:text-gray-700 md:p-1 md:w-auto dark:text-white md:dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-gray-800">Higiene
                            Personal
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar-higienePersonal"
                            class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="{{ route('higienePersonal.index') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Higiene
                                        del Personal</a>
                                </li>
                                <li>
                                    <a href="{{ route('lavadoMano.index') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Lavado
                                        de manos</a>
                                </li>
                                <li>
                                    <a href="{{ route('externoPersonal.index') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Personal
                                        Externo</a>
                                </li>
                                <li>
                                    <a href="{{ route('curacion.index') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Curacion
                                        / Dotacion</a>
                                </li>

                            </ul>

                        </div>
                    @endif
                    @if (in_array(auth()->user()->rol, ['Admi', 'Visor', 'Jefatura', 'Supervisor']))
                        <!-- limpiezaDesinfeccion -->
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar-limpiezaDesinfeccion"
                            class="flex items-center justify-between w-full py-2 px-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-gray-200 md:border-0 md:hover:text-gray-700 md:p-1 md:w-auto dark:text-white md:dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-gray-800">Limpieza
                            y desinfeccion
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar-limpiezaDesinfeccion"
                            class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="{{ route('verOrdLimDes.index') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Limpieza
                                        y desinfeccion</a>
                                </li>
                                <li>
                                    <a href="{{ route('sustancias.index') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Entrega de insumos</a>
                                </li>


                            </ul>

                        </div>
                    @endif

                    <!-- evacuacion de residuos -->
                    @if (in_array(auth()->user()->rol, ['Admi', 'Visor', 'Jefatura', 'Supervisor']))
                        <a href="{{ route('evacuacion.index') }}"
                            class="flex items-center justify-between w-full py-2 px-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-gray-200 md:border-0 md:hover:text-gray-700 md:p-1 md:w-auto dark:text-white md:dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-gray-800 cursor-pointer">Evacuación
                            de residuos
                        </a>
                    @endif


                    <!-- mantenimiento -->
                    @if (in_array(auth()->user()->rol, ['Admi', 'Visor', 'Jefatura', 'Supervisor', 'Mantenimiento']))
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar-mantenimiento"
                            class="flex items-center justify-between w-full py-2 px-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-gray-200 md:border-0 md:hover:text-gray-700 md:p-1 md:w-auto dark:text-white md:dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-gray-800">
                            Mantenimiento
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar-mantenimiento" 
                            class="z-50 relative hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                @if (in_array(auth()->user()->rol, ['Admi', 'Visor', 'Jefatura', 'Mantenimiento']))
                                    {{-- <li>
                                        <a href="{{ route('maquinas.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Plan Mantenimiento </a>
                                    </li> --}}

                                    <li>
                                        <a href="{{ route('revisionDiaria.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Revision
                                            diaria</a>
                                    </li>
                                @endif
                                @if (in_array(auth()->user()->rol, ['Admi', 'Visor', 'Jefatura', 'Supervisor', 'Mantenimiento']))
                                    <li>
                                        <a href="{{ route('OrdenTrabajo.index', ['tipo' => 'maquinaria']) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ordenes
                                            de trabajo</a>
                                    </li>
                                    {{-- <li>
                                        <a href="{{ route('herramienta.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Herramientas</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('inspeccionHerramienta.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Control
                                            de Herramientas</a>
                                    </li> --}}
                                @endif
                            </ul>

                        </div>
                    @endif



                    <!-- infrestructura -->

                    @if (in_array(auth()->user()->rol, ['Admi', 'Visor', 'Jefatura', 'Supervisor', 'Mantenimiento', 'Administracion']))
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar-infrestructura"
                            class="flex items-center justify-between w-full py-2 px-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-gray-200 md:border-0 md:hover:text-gray-700 md:p-1 md:w-auto dark:text-white md:dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-gray-800">
                            Infrestructura
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar-infrestructura"
                            class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">

                                @if (in_array(auth()->user()->rol, ['Admi', 'Visor', 'Supervisor', 'Jefatura', 'Mantenimiento', 'Administracion']))
                                    {{-- <li>
                                        <a href="{{ route('infrestructura.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Infrestructuras y Almacenes</a>
                                    </li> --}}

                                    <li>
                                        <a href="{{ route('revisionMensualInfres.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Inspeccion Periodica</a>
                                    </li>
                                    
                                @endif
                                @if (in_array(auth()->user()->rol, ['Admi', 'Visor', 'Jefatura', 'Supervisor', 'Mantenimiento', 'Administracion']))
                                    <li>
                                        <a href="{{ route('OrdenTrabajo.index', ['tipo' => 'infrestructura']) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ordenes
                                            de trabajo</a>
                                    </li>
                                @endif
                            </ul>

                        </div>
                    @endif
                    
                    <!-- configuracion -->
                    @if (in_array(auth()->user()->rol, ['Admi']))
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar-configuracion"
                            class="flex items-center justify-between w-full py-2 px-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-gray-200 md:border-0 md:hover:text-gray-700 md:p-1 md:w-auto dark:text-white md:dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-gray-800">Configuracion
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar-configuracion"
                            class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                {{-- <li>
                                <a href=""
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Areas</a>
                            </li> --}}
                                {{-- <li>
                                <a href="{{ route('ordLimDes.index') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Configuracion
                                    de OL-D</a>
                            </li> --}}
                                <li>
                                    <a href="{{ route('usuario.index') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Usuarios</a>
                                </li>
                            </ul>

                        </div>
                    @endif

                    <div class="flex items-center">
                        <div><button data-popover-target="popover-description" data-popover-placement="bottom-end"
                                type="button"><svg class="w-5 h-5 ms-2 text-gray-400 hover:text-gray-500"
                                    aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg><span class="sr-only">Show information</span></button>
                            <div data-popover id="popover-description" role="tooltip"
                                class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-500 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Para soporte, o reporte de
                                    fallo
                                    comunicarse con el siguiente numero</h3>
                                <p class="flex "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="w-4 h-4 mx-1 fill-gray-400 hover:fill-gray-500">
                                        <path d="M164.9
                                        24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 50.2 0 46 0 64C0 311.4 200.6 512
                                        448 512c18 0 33.8-12.1
                                        38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3
                                        11.6L504.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-50
                                        11.6-46.3l-40-96z" />
                                    </svg><span> : 69960519</span> </p>
                                <p class="flex "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                        class="w-4 h-4 mx-1 fill-gray-400 hover:fill-gray-500">
                                        <path
                                            d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-50.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 150.4 54.1 34.8 34.9 56.2 81.2 56.1 150.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-50.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-50.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                                    </svg><span> : 77540313</span> </p>

                            </div>
                        </div>

                        <div class="flex items-center ms-3 gap-3">
                            <div class="flex justify-center content-center gap-3 ">
                                <button type="button" class="flex text-sm" aria-expanded="false"
                                    data-dropdown-toggle="dropdown-user">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 fill-gray-600 dark:fill-gray-400" viewBox="0 0 512 512">
                                        <path
                                            d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-50.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 50.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                                id="dropdown-user">
                                <div class="px-4 py-3 space-y-2" role="none">



                                    <p class="text-sm text-gray-900 dark:text-white text-center" role="none">
                                        {{ auth()->user()->name }} {{ auth()->user()->lastname }}
                                    </p>

                                    <button class="flex gap-2 items-center hover:bg-gray-100 rounded-md px-2 py-1"
                                        onclick="Livewire.dispatch('openModal', { component: 'user.cambiarContrasena'})">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="fill-gray-500 h-4 w-4">
                                            <path
                                                d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
                                        </svg>
                                        <p class="font-normal">Cambiar contraseña</p>
                                    </button>

                                </div>
                                <ul class="py-1" role="none">


                                    <li>
                                        <form action="{{ route('logout') }}" method="POST"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-500 dark:hover:bg-gray-600 dark:hover:text-white">
                                            @csrf
                                            <button type="submit" role="menuitem">Cerrar Sesión</button>
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>


                </ul>
            </div>
        </div>
    </nav>

    <div class="flex justify-between text-sm md:text-lg text-center font-bold p-3 uppercase mt-20">
        @yield('titulo')
    </div>


    <div class="md:px-4">
        @yield('contenido')


    </div>
    @livewire('wire-elements-modal')
    <x-toaster-hub />
    @livewireScripts
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
