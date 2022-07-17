@extends('layouts.plantilla')

@section('title', 'Editar Consulta')

@section('header1', 'Editar información de la consulta')

@section('content-list')
    <form action="{{ route('consultas.update', ['consulta' => $consulta]) }}" method="POST">
        @csrf

        @method('put')

        <div class="row row-cols-2">
            <div class="col mb-3">
                <label class="form-text">Paciente</label>
                <select class="form-select" name="paciente_id">
                    @foreach ($pacientes as $pac)
                        <option value="{{ $pac->id }}" @if ($pac->id == $consulta->paciente_id) selected @endif>{{ $pac->nss }} - {{ $pac->apellido_paterno }} {{ $pac->apellido_materno }} {{ $pac->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col mb-3">
                <label class="form-text">Doctor</label>
                <select class="form-select" name="doctor_id">
                    @foreach ($doctores as $doc)
                        <option value="{{ $doc->id }}" @if ($doc->id == $consulta->doctor_id) selected @endif>{{ $doc->cedula }} - {{ $doc->apellido_paterno }} {{ $doc->apellido_materno }} {{ $doc->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col mb-3">
                <label class="form-text">Padecimiento</label>
                <input class="form-control" value="{{ $consulta->padecimiento }}" name="padecimiento" type="text">
            </div>

            <div class="col mb-3">
                <label class="form-text">Tratamiento</label>
                <input class="form-control" value="{{ $consulta->tratamiento }}" name="tratamiento" type="text">
            </div>

            <div class="col mb-3">
                <label class="form-text">Fecha</label>
                <input class="form-control" value="{{ $consulta->fecha }}" name="fecha" type="date">
            </div>
        </div>

        <div class="d-flex justify-content-between mt-5">
            <a class="btn btn-secondary" href="{{ route('consultas.index') }}">Regresar</a>

            <button class="btn btn-primary" type="submit">Actualizar</button>
        </div>
    </form>
@endsection
