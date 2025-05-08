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
    <div class="flex justify-center mb-4">
        <a href="{{ route('lavadoMano.index') }}" class="w-8">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-8 h-8 bg-transparent fill-transparent">
                <path
                    d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z" />
            </svg>
        </a>
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
