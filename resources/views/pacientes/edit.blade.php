@extends('layouts.plantilla')

@section('title', 'Editar Paciente')

@section('header1', 'Editar información del paciente')

@section('content-list')
    <form action="{{ route('pacientes.update', ['paciente' => $paciente]) }}" method="POST">
        @csrf

        @method('put')

        <div class="col mb-3">
            <label class="form-text">NSS</label>
            <input class="col-4 form-control" value="{{ old('nss', $paciente->nss) }}" name="nss" type="text" maxlength="15" disabled>

            @error('nss')
                @component('layouts.alerta')
                    @slot('message', $message)
                @endcomponent
            @enderror
        </div>

        <div class="row row-cols-3">
            <div class="col mb-3">
                <label class="form-text">Nombre</label>
                <input class="form-control" value="{{ old('nombre', $paciente->nombre) }}" name="nombre" type="text">

                @error('nombre')
                    @component('layouts.alerta')
                        @slot('message', $message)
                    @endcomponent
                @enderror
            </div>

            <div class="col mb-3">
                <label class="form-text">Apellido Paterno</label>
                <input class="form-control" value="{{ old('apellido_paterno', $paciente->apellido_paterno) }}" name="apellido_paterno" type="text">

                @error('apellido_paterno')
                    @component('layouts.alerta')
                        @slot('message', $message)
                    @endcomponent
                @enderror
            </div>

            <div class="col mb-3">
                <label class="form-text">Apellido Materno</label>
                <input class="form-control" value="{{ old('apellido_materno', $paciente->apellido_materno) }}" name="apellido_materno" type="text">

                @error('apellido_materno')
                    @component('layouts.alerta')
                        @slot('message', $message)
                    @endcomponent
                @enderror
            </div>

            <div class="col">
                <label class="form-text">Telefono</label>
                <input class="form-control" value="{{ old('telefono', $paciente->telefono) }}" name="telefono" type="text">

                @error('telefono')
                    @component('layouts.alerta')
                        @slot('message', $message)
                    @endcomponent
                @enderror
            </div>

            <div class="col">
                <label class="form-text" name="genero_id">Genero</label>
                <select class="form-select" name="genero_id">
                    @foreach ($generos as $gen)
                        <option value="{{ $gen->id }}" {{ ($paciente->genero_id == $gen->id || $gen->id == old('genero_id')) ? 'selected' : '' }}>{{ $gen->genero }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-5">
            <a class="btn btn-secondary" href="{{ route('pacientes.index') }}">Regresar</a>
            <button class="btn btn-primary" type="submit">Actualizar</button>
        </div>
    </form>
@endsection
