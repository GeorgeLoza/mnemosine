@extends('layout.app')

@section('titulo')
<div class="hidden md:block text-blue-500 font-light text-sm">PLP-PRO-609-REG-01</div>
    <h1>Inspeccion Periodica</h1>
    <div></div>
@endsection

@section('contenido')
    <div class="md:flex gap-1">
        <div class="w-full md:w-1/2"> @livewire('mantenimiento.mensualInfrestructura.tabla')</div>
        <div class="w-full md:w-1/2"> @livewire('mantenimiento.mensualInfrestructura.reporte')</div>
    </div>
@endsection
