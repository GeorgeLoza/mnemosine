@extends('layout.app')

@section('titulo')
<div class="text-blue-500 font-light text-sm">PLP-PRO-601-REG-03</div>
    <h1>Personal Externo</h1>
    <!--Boton Crear -->
    <!--Boton Crear -->
    <a href="{{route("mobile.higieneExterno")}}">
        <button class="px-2 py-1 bg-green-500 rounded-lg text-xs text-white uppercase">
            nuevo</button>
    </a>

@endsection
@section('contenido')
    @livewire('PersonalExterno.tabla')
@endsection


