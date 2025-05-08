@extends('layout.app')

@section('titulo')
    <div class="text-blue-500 font-light text-sm">
        @if ($tipo=="infrestructura")
        PLP-PRO-609-REG-03
        @else
        PLP-PRO-610-REG-02
        @endif
    </div>
    <h1>Orden de trabajo - 

        @if ($tipo=="infrestructura")
            Infrestructura
        @else
        Maquinaria  
        @endif
    </h1>
    <div>
        <button
            class="px-2 py-1 bg-green-500 rounded-lg text-xs text-white uppercase"
            onclick="Livewire.dispatch('openModal', {
                component: 'mantenimiento.ordenTrabajo.crear',
                arguments: { tipoSeleccion: @js($tipo) }
            })">
            nuevo
        </button>
    </div>
    
@endsection

@section('contenido')


@livewire('mantenimiento.ordenTrabajo.tabla',['tipos' => $tipo])

@endsection


