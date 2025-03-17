@extends('layout.app')

@section('titulo')
    <div></div>
    <h1>Maquina</h1>
    <div></div>
@endsection

@section('contenido')
    @livewire('mantenimiento.maquinaEquipo.tabla')
@endsection


