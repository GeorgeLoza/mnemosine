@extends('layout.app')

@section('titulo')
    <div></div>
    <h1>revision diaria</h1>
    <div></div>
@endsection

@section('contenido')
    <div class="md:flex gap-1">
        <div class="w-full md:w-1/3"> @livewire('mantenimiento.diarioMaquina.crear')</div>
        <div class="w-full md:w-2/3"> @livewire('mantenimiento.diarioMaquina.tabla')</div>
    </div>
@endsection
