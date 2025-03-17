<div>



    <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">

        {{-- turno central --}}
        <div class="bg-green-200 p-4 rounded-md md:max-h-[calc(100vh-400px)] relative overflow-x-auto">
            <h3 class="text-center font-bold text-lg">Administrativos</h3>
            @foreach ($usuariosC as $usuario)


                <div class="text-xs flex justify-between gap-1 mb-2">
                    <div class="text-nowrap  overflow-hidden uppercase">


                        {{ $usuario->lastname . ' ' . $usuario->name }}</div>


                    <div class="flex gap-5">
                        <button onclick="Livewire.dispatch('openModal', { component: 'higienePersonal.ListaCrear', arguments: {id : {{$usuario->id}}} })">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-6 h-6 fill-red-500">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                            </svg>
                        </button>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg " class="w-6 h-6 fill-green-500" wire:click="guardar({{$usuario->id}})"                                viewBox="0 0 512 512">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- turno 1 --}}
        <div class="bg-red-200 p-1 rounded-md md:max-h-[calc(100vh-400px)] relative overflow-x-auto">
            <h3 class="text-center font-bold text-lg">Embolsado</h3>
            @foreach ($usuariosT1 as $usuario)


                <div class="text-xs flex justify-between gap-1 mb-2">
                    <div class="text-nowrap  overflow-hidden uppercase">
                        {{ $usuario->lastname . ' ' . $usuario->name }}</div>


                    <div class="flex gap-5">
                        <button onclick="Livewire.dispatch('openModal', { component: 'higienePersonal.ListaCrear', arguments: {id : {{$usuario->id}}} })">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="w-6 h-6 fill-red-500">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                            </svg>
                        </button>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg " class="w-6 h-6 fill-green-500" wire:click="guardar({{$usuario->id}})"                                viewBox="0 0 512 512">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                            </svg>
                        </button>
                    </div>
                </div>


            @endforeach
        </div>

        {{-- turno 2 --}}
        <div class="bg-blue-200 p-1 rounded-md md:max-h-[calc(100vh-400px)] relative overflow-x-auto">
            <h3 class="text-center font-bold text-lg">Horno</h3>
            @foreach ($usuariosT2 as $usuario)
                <div class="text-xs flex justify-between gap-1 mb-2">
                    <div class="text-nowrap  overflow-hidden uppercase">
                        {{ $usuario->lastname . ' ' . $usuario->name }}</div>
                        <div class="flex gap-5">
                            <button onclick="Livewire.dispatch('openModal', { component: 'higienePersonal.ListaCrear', arguments: {id : {{$usuario->id}}} })">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="w-6 h-6 fill-red-500">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                </svg>
                            </button>
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg " class="w-6 h-6 fill-green-500" wire:click="guardar({{$usuario->id}})"                                viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                </svg>
                            </button>
                        </div>
                </div>
            @endforeach
        </div>

        {{-- turno 3 --}}
        <div class="bg-yellow-200 p-1 rounded-md md:max-h-[calc(100vh-400px)] relative overflow-x-auto">
            <h3 class="text-center font-bold text-lg">Producción</h3>
            @foreach ($usuariosT3 as $usuario)
                <div class="text-xs flex justify-between gap-1 mb-2">
                    <div class="text-nowrap  overflow-hidden uppercase">
                        {{ $usuario->lastname . ' ' . $usuario->name }}</div>
                        <div class="flex gap-5">
                            <button onclick="Livewire.dispatch('openModal', { component: 'higienePersonal.ListaCrear', arguments: {id : {{$usuario->id}}} })">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="w-6 h-6 fill-red-500">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                </svg>
                            </button>
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg " class="w-6 h-6 fill-green-500" wire:click="guardar({{$usuario->id}})"                                viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                </svg>
                            </button>
                        </div>
                </div>
            @endforeach
        </div>

        <div class="bg-purple-200 p-1 rounded-md md:max-h-[calc(100vh-400px)] relative overflow-x-auto">
            <h3 class="text-center font-bold text-lg">Burguer King</h3>
            @foreach ($usuariosT4 as $usuario)
                <div class="text-xs flex justify-between gap-1 mb-2">
                    <div class="text-nowrap  overflow-hidden uppercase">
                        {{ $usuario->lastname . ' ' . $usuario->name }}</div>
                        <div class="flex gap-5">
                            <button onclick="Livewire.dispatch('openModal', { component: 'higienePersonal.ListaCrear', arguments: {id : {{$usuario->id}}} })">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="w-6 h-6 fill-red-500">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                </svg>
                            </button>
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg " class="w-6 h-6 fill-green-500" wire:click="guardar({{$usuario->id}})"                                viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                </svg>
                            </button>
                        </div>
                </div>
            @endforeach
        </div>

        <div class="bg-gray-200 p-1 rounded-md md:max-h-[calc(100vh-400px)] relative overflow-x-auto">
            <h3 class="text-center font-bold text-lg">Repostería Fina</h3>
            @foreach ($usuariosT5 as $usuario)
                <div class="text-xs flex justify-between gap-1 mb-2">
                    <div class="text-nowrap  overflow-hidden uppercase">
                        {{ $usuario->lastname . ' ' . $usuario->name }}</div>
                        <div class="flex gap-5">
                            <button onclick="Livewire.dispatch('openModal', { component: 'higienePersonal.ListaCrear', arguments: {id : {{$usuario->id}}} })">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="w-6 h-6 fill-red-500">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                </svg>
                            </button>
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg " class="w-6 h-6 fill-green-500" wire:click="guardar({{$usuario->id}})"                                viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                </svg>
                            </button>
                        </div>
                </div>
            @endforeach
        </div>

        <div class="bg-gray-200 p-1 rounded-md md:max-h-[calc(100vh-400px)] relative overflow-x-auto">
            <h3 class="text-center font-bold text-lg">Almacenes</h3>
            @foreach ($usuariosT6 as $usuario)
                <div class="text-xs flex justify-between gap-1 mb-2">
                    <div class="text-nowrap  overflow-hidden uppercase">
                        {{ $usuario->lastname . ' ' . $usuario->name }}</div>
                        <div class="flex gap-5">
                            <button onclick="Livewire.dispatch('openModal', { component: 'higienePersonal.ListaCrear', arguments: {id : {{$usuario->id}}} })">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="w-6 h-6 fill-red-500">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                </svg>
                            </button>
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg " class="w-6 h-6 fill-green-500" wire:click="guardar({{$usuario->id}})"                                viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                </svg>
                            </button>
                        </div>
                </div>
            @endforeach
        </div>





    </div>    
</div>
