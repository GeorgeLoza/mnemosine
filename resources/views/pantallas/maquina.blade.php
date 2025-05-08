@extends('layout.app')

@section('titulo')
<div class="text-blue-500 font-light text-sm">PLP-PRO-610-PLA-01</div>
    <h1>PLAN MANTENIMIENTO DE MAQUINARIA Y EQUIPOS</h1>
    <div></div>
@endsection

@section('contenido')
    @livewire('mantenimiento.maquinaEquipo.tabla')
@endsection


