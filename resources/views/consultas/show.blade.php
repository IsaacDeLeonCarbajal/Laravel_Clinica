@extends('layouts.plantilla')

@section('title', 'Mostrar Consulta')

@section('header1', 'Información de la consulta')

@section('content-list')
    <div class="row row-cols-2">
        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Paciente</label>
            <label class="col-12 fs-4">{{ $consulta->paciente->nss }} - {{ $consulta->paciente->apellido_paterno }} {{ $consulta->paciente->apellido_materno }} {{ $consulta->paciente->nombre }}</label>
        </div>

        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Doctor</label>
            <label class="col-12 fs-4">{{ $consulta->doctor->cedula }} - {{ $consulta->doctor->apellido_paterno }} {{ $consulta->doctor->apellido_materno }} {{ $consulta->doctor->nombre }}</label>
        </div>

        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Padecimiento</label>
            <label class="col-12 fs-4">{{ $consulta->padecimiento }}</label>
        </div>

        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Tratamiento</label>
            <label class="col-12 fs-4">{{ $consulta->tratamiento }}</label>
        </div>

        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Fecha</label>
            <label class="col-12 fs-4">{{ $consulta->fecha }}</label>
        </div>
    </div>

    <a class="btn btn-secondary mt-4" href="{{ route('consultas.index') }}">Regresar</a>
@endsection
