@extends('layout.app')

@section('titulo')
    <div></div>
    <h1>Infrestructura</h1>
    <div></div>
@endsection

@section('contenido')
    @livewire('mantenimiento.infrestructura.tabla')
@endsection


