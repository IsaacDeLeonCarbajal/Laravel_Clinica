@extends('layouts.plantilla')

@section('title', 'Editar Doctor')

@section('header1', 'Editar información del doctor')

@section('content-list')
    <form action="{{ route('doctores.update', ['doctor' => $doctor]) }}" method="POST">
        @csrf

        @method('put')

        <div class="col mb-3">
            <label class="form-text">Cédula</label>
            <input class="form-control" value="{{$doctor->cedula}}" name="cedula" type="text" disabled>
        </div>

        <div class="row row-cols-3">
            <div class="col mb-3">
                <label class="form-text">Nombre</label>
                <input class="form-control" value="{{$doctor->nombre}}" name="nombre" type="text">
            </div>

            <div class="col mb-3">
                <label class="form-text">Apellido Paterno</label>
                <input class="form-control" value="{{$doctor->apellido_paterno}}" name="apellido_paterno" type="text">
            </div>

            <div class="col mb-3">
                <label class="form-text">Apellido Materno</label>
                <input class="form-control" value="{{$doctor->apellido_materno}}" name="apellido_materno" type="text">
            </div>

            <div class="col mb-3">
                <label class="form-text">Telefono</label>
                <input class="form-control" value="{{$doctor->telefono}}" name="telefono" type="text">
            </div>

            <div class="col mb-3">
                <label class="form-text">Genero</label>
                <select class="form-select" name="genero_id">
                    <option value="1">Femenino</option>
                    <option value="2" @if($doctor->genero_id == '2') selected @endif>Masculino</option>
                </select>
            </div>

            <div class="col mb-3">
                <label class="form-text">Sueldo</label>
                <input class="form-control" value="{{$doctor->sueldo}}" name="sueldo" type="text">
            </div>

            <div class="col">
                <label class="form-text">Especialidad</label>
                <select class="form-select" name="especialidad_id"">
                    @foreach ($especialidades as $esp)
                        <option value="{{ $esp->id }}" @if($doctor->especialidad_id == $esp->id) selected @endif>{{ $esp->especialidad }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a class="btn btn-secondary" href="{{ route('doctores.index') }}">Regresar</a>

            <button class="btn btn-primary" type="submit">Registrar</button>
        </div>
    </form>
@endsection
