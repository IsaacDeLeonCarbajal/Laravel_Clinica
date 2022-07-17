@extends('layouts.plantilla')

@section('title', 'Editar Paciente')

@section('header1', 'Editar información del paciente')

@section('content-list')
    <form action="{{ route('pacientes.update', ['paciente' => $paciente]) }}" method="POST">
        @csrf

        @method('put')

        <div class="col mb-3">
            <label class="form-text">NSS</label>
            <input class="col-4 form-control" value="{{ $paciente->nss }}" name="nss" type="text" maxlength="15" disabled>
        </div>

        <div class="row row-cols-3">
            <div class="col mb-3">
                <label class="form-text">Nombre</label>
                <input class="form-control" value="{{ $paciente->nombre }}" name="nombre" type="text">
            </div>

            <div class="col mb-3">
                <label class="form-text">Apellido Paterno</label>
                <input class="form-control" value="{{ $paciente->apellido_paterno }}" name="apellido_paterno" type="text">
            </div>

            <div class="col mb-3">
                <label class="form-text">Apellido Materno</label>
                <input class="form-control" value="{{ $paciente->apellido_materno }}" name="apellido_materno" type="text">
            </div>

            <div class="col">
                <label class="form-text">Telefono</label>
                <input class="form-control" value="{{ $paciente->telefono }}" name="telefono" type="text">
            </div>

            <div class="col">
                <label class="form-text" name="genero_id">Genero</label>
                <select class="form-select" name="genero_id">
                    <option value="1">Femenino</option>
                    <option value="2" @if ($paciente->genero->id == '2') selected @endif>Masculino</option>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-5">
            <a class="btn btn-secondary" href="{{ route('pacientes.index') }}">Regresar</a>
            <button class="btn btn-primary" type="submit">Actualizar</button>
        </div>
    </form>
@endsection
