@extends('admin.layout')

@section('titulo')
Tablero de prestamos
@endsection

@section('contenido')
    @livewire('prestamos.prestamos-tabla')
@endsection