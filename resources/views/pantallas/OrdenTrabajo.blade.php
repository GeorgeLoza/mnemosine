@extends('layout.app')

@section('titulo')
    <div></div>
    <h1>Orden de trabajo</h1>
    <div><button class="px-2 py-1 bg-green-500 rounded-lg text-xs text-white uppercase"
        onclick="Livewire.dispatch('openModal', { component: 'mantenimiento.ordenTrabajo.crear' })">
        nuevo</button></div>
@endsection

@section('contenido')

    @livewire('mantenimiento.ordenTrabajo.tabla')

@endsection


