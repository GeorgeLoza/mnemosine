@extends('layout.app')

@section('titulo')
    <div></div>
    <h1>Detalle de Maquina</h1>
    <div></div>
@endsection

@section('contenido')
    @livewire('mantenimiento.maquinaEquipo.detalle', ['maquinaId' => $id])
@endsection


