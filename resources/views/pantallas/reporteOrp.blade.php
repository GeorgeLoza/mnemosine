@extends('layout.app')

@section('titulo')
    <div></div>
    <h1>reporte orp</h1>
    <div></div>
@endsection

@section('contenido')
    @livewire('orp.reporte', ['orpId' => $id])
@endsection


