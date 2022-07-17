@extends('layouts.plantilla')

@section('title', 'Mostrar Doctor')

@section('header1', 'Información del doctor')

@section('content-list')
    <div class="d-flex flex-row mb-3">
        <div class="flex-grow-1">
            <label class="col-12 fs-6 text-secondary">Cédula</label>
            <label class="col-12 fs-4">{{ $doctor->cedula }}</label>
        </div>

        <a href="{{ route('consultas.index') }}?doctor={{ $doctor->id }}"><img class="col-12" src="{{ asset('img/show.png') }}" alt="Ver consultas"></a>
    </div>

    <div class="row row-cols-3">
        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Nombre</label>
            <label class="col-12 fs-4">{{ $doctor->nombre }}</label>
        </div>

        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Apellido Paterno</label>
            <label class="col-12 fs-4">{{ $doctor->apellido_paterno }}</label>
        </div>

        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Apellido Materno</label>
            <label class="col-12 fs-4">{{ $doctor->apellido_materno }}</label>
        </div>

        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Telefono</label>
            <label class="col-12 fs-4">{{ $doctor->telefono }}</label>
        </div>

        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Genero</label>
            <label class="col-12 fs-4">{{ $doctor->genero->genero }}</label>
        </div>

        <div class="col mb-3">
            <label class="col-12 fs-6 text-secondary">Sueldo</label>
            <label class="col-12 fs-4">{{ $doctor->sueldo }}</label>
        </div>

        <div class="col">
            <label class="col-12 fs-6 text-secondary">Especialidad</label>
            <label class="col-12 fs-4">{{ $doctor->especialidad->especialidad }}</label>
        </div>
    </div>

    <a class="btn btn-secondary mt-4" href="{{ route('doctores.index') }}">Regresar</a>
@endsection
