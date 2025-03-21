<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="manifest" href="/manifest.json">

    <script src="{{ asset('js/flowbite.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('build/assets/app-BJ82HC5b.css') }}">
    <script src="{{ asset('build/assets/app-BJi2HfH9.js ') }}" defer></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
    <title>Panaderia</title>
</head>

<body class="dark:bg-gray-800 dark:text-white">

    <nav class="bg-white border-gray-200 dark:bg-gray-900">
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


                    <!-- orp -->
                    <a href="{{ route('orp.index') }}"
                        class="flex items-center justify-between w-full py-2 px-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-gray-200 md:border-0 md:hover:text-gray-700 md:p-1 md:w-auto dark:text-white md:dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-gray-800 cursor-pointer">ORP
                    </a>


                    <!-- higienePersonal -->
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar-higienePersonal"
                        class="flex items-center justify-between w-full py-2 px-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-gray-200 md:border-0 md:hover:text-gray-700 md:p-1 md:w-auto dark:text-white md:dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-gray-800">Higiene
                        Personal
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar-higienePersonal"
                        class="z-30 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
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

                    <!-- limpiezaDesinfeccion -->
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar-limpiezaDesinfeccion"
                        class="flex items-center justify-between w-full py-2 px-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-gray-200 md:border-0 md:hover:text-gray-700 md:p-1 md:w-auto dark:text-white md:dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-gray-800">Limpieza
                        y desinfeccion
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar-limpiezaDesinfeccion"
                        class="z-30 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route('verOrdLimDes.index') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Limpieza
                                    y desinfeccion</a>
                            </li>
                            <li>
                                <a href="{{ route('sustancias.index') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sustancias
                                    Peligrosas</a>
                            </li>


                        </ul>

                    </div>

                    <!-- evacuacion de residuos -->
                    <a href="{{ route('evacuacion.index') }}"
                        class="flex items-center justify-between w-full py-2 px-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-gray-200 md:border-0 md:hover:text-gray-700 md:p-1 md:w-auto dark:text-white md:dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-gray-800 cursor-pointer">Evacuación
                        de residuos
                    </a>

                    <!-- mantenimiento -->
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar-mantenimiento"
                        class="flex items-center justify-between w-full py-2 px-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-gray-200 md:border-0 md:hover:text-gray-700 md:p-1 md:w-auto dark:text-white md:dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-gray-800">
                        Mantenimiento
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar-mantenimiento"
                        class="z-30 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                            aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route('maquinas.index') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Maquinas
                                    y Equipos</a>
                            </li>
                            <li>
                                <a href="{{ route('revisionDiaria.index') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Revision
                                    diaria</a>
                            </li>
                            <li>
                                <a href="{{ route('OrdenTrabajo.index') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ordenes
                                    de trabajo</a>
                            </li>
                        </ul>

                    </div>
                    <!-- configuracion -->
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
                        class="z-30 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                            aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href=""
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Areas</a>
                            </li>
                            <li>
                                <a href="{{ route('ordLimDes.index') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Configuracion
                                    de OL-D</a>
                            </li>
                            <li>
                                <a href="{{ route('usuario.index') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Usuarios</a>
                            </li>
                        </ul>

                    </div>

                    <li>
                        <form action="{{ route('logout') }}" method="POST"
                            class="p-2 hover:bg-slate-600 hover:fill-white rounded ">
                            @csrf
                            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="w-5 h-5 ">
                                    <path
                                        d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                                </svg></button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="flex justify-between text-sm md:text-lg text-center font-bold p-3 uppercase ">
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
