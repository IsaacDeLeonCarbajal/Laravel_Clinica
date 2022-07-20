@extends('layouts.plantilla')

@section('title', 'Registrar Paciente')

@section('header1', 'Registrar un nuevo paciente')

@section('content-list')
    <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf

        <div class="col mb-3">
            <label class="form-text">NSS</label>
            <input class="form-control" name="nss" type="text" value="{{ old('nss') }}" maxlength="15">

            @error('nss')
                @component('layouts.alerta')
                    @slot('message', $message)
                @endcomponent
            @enderror
        </div>

        <div class="row row-cols-3">
            <div class="col mb-3">
                <label class="form-text">Nombre</label>
                <input class="form-control" name="nombre" type="text">

                @error('nombre')
                    @component('layouts.alerta')
                        @slot('message', $message)
                    @endcomponent
                @enderror
            </div>

            <div class="col mb-3">
                <label class="form-text">Apellido Paterno</label>
                <input class="form-control" name="apellido_paterno" type="text">

                @error('apellido_paterno')
                    @component('layouts.alerta')
                        @slot('message', $message)
                    @endcomponent
                @enderror
            </div>

            <div class="col mb-3">
                <label class="form-text">Apellido Materno</label>
                <input class="form-control" name="apellido_materno" type="text">

                @error('apellido_materno')
                    @component('layouts.alerta')
                        @slot('message', $message)
                    @endcomponent
                @enderror
            </div>

            <div class="col mb-3">
                <label class="form-text">Telefono</label>
                <input class="form-control" name="telefono" type="text">

                @error('telefono')
                    @component('layouts.alerta')
                        @slot('message', $message)
                    @endcomponent
                @enderror
            </div>

            <div class="col mb-3">
                <label class="form-text" name="genero_id">Genero</label>
                <select class="form-select" name="genero_id">
                    @foreach ($generos as $gen)
                        <option value="{{ $gen->id }}" {{ old('genero_id') == $gen->id ? 'selected' : '' }}>{{ $gen->genero }}</option>
                    @endforeach
                </select>

                @error('genero_id')
                    @component('layouts.alerta')
                        @slot('message', $message)
                    @endcomponent
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a class="btn btn-secondary" href="{{ route('pacientes.index') }}">Regresar</a>

            <button class="btn btn-primary" type="submit">Registrar</button>
        </div>
    </form>
@endsection
