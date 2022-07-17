@extends('layouts.plantilla')

@section('title', 'Mostrar Paciente')

@section('header1', 'Información del paciente')

@section('content-list')
    <div class="d-flex flex-row mb-3">
        <div class="flex-grow-1">
            <label class="col-12 fs-6 text-secondary">NSS</label>
            <label class="fs-4">{{ $paciente->nss }}</label>
        </div>

        <a href="{{ route('consultas.index') }}?paciente={{ $paciente->id }}"><img class="col-12" src="{{ asset('img/show.png') }}" alt="Ver consultas"></a>
    </div>

    <div class="row row-cols-3">
        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Nombre</label>
            <label class="col-12 fs-4">{{ $paciente->nombre }}</label>
        </div>

        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Apellido Paterno</label>
            <label class="col-12 fs-4">{{ $paciente->apellido_paterno }}</label>
        </div>

        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Apellido Materno</label>
            <label class="col-12 fs-4">{{ $paciente->apellido_materno }}</label>
        </div>

        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Telefono</label>
            <label class="col-12 fs-4">{{ $paciente->telefono }}</label>
        </div>

        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Genero</label>
            <label class="col-12 fs-4">{{ $paciente->genero->genero }}</label>
        </div>
    </div>

    <a class="btn btn-secondary mt-4" href="{{ route('pacientes.index') }}">Regresar</a>
@endsection
