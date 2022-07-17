@extends('layouts.plantilla')

@section('title', 'Salud Primero')

@section('content-other')
    <div class="col-12 text-center mt-5">
        <h1 class="col-12 mb-5 text-center">Clínica Salud Primero</h1>

        <img class="col-4 mb-5" src="{{ asset('img/logo.png') }}" alt="logo">
    </div>
@endsection

@section('content-list')
    <div class="col-12 text-center">
        <a class="col btn btn-secondary me-5 mb-3" href="{{ route('pacientes.index') }}">Pacientes</a>
        <a class="col btn btn-secondary me-5 mb-3" href="{{ route('doctores.index') }}">Doctores</a>
        <a class="col btn btn-secondary mb-3" href="{{ route('consultas.index') }}">Consultas</a>
    </div>
@endsection
