@extends('layout.app')

@section('titulo')
    <div></div>
    <h1>Inspeccion Mensual de herramientas</h1>
    <div></div>
@endsection

@section('contenido')
    @livewire('mantenimiento.inspeccionHerramienta.tabla')
    @livewire('mantenimiento.inspeccionHerramienta.reporte')
@endsection


