@extends('layouts.plantilla')

@section('title', 'Registrar Consulta')

@section('header1', 'Registrar una nueva consulta')

@section('content-list')
    <form action="{{ route('consultas.store') }}" method="POST">
        @csrf

        <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-3">
                <label class="form-text">Paciente</label>
                <select class="form-select" name="paciente_id">
                    @foreach ($pacientes as $pac)
                        <option value="{{ $pac->id }}" @if (isset($paciente_id) && $paciente_id == $pac->id) selected @endif>{{ $pac->nss }} - {{ $pac->apellido_paterno }} {{ $pac->apellido_materno }} {{ $pac->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col mb-3">
                <label class="form-text">Doctor</label>
                <div class="row col-12 m-0">
                    <div class="col-4 m-0 p-0">
                        <select id="slc-especialidad" class="col-4 form-select">
                            @foreach ($especialidades as $esp)
                                <option value="{{ $esp->id }}"">{{ $esp->especialidad }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-8 m-0 p-0">
                        <select id="slc-doctor" class="col form-select" name="doctor_id">
                            @foreach ($doctores as $doc)
                                @if ($doc->especialidad_id == $especialidades[0]->id)
                                    <option value="{{ $doc->id }}">{{ $doc->cedula }} - {{ $doc->apellido_paterno }} {{ $doc->apellido_materno }} {{ $doc->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col mb-3">
                <label class="form-text">Padecimiento</label>
                <input class="form-control" name="padecimiento" type="text" value="{{ old('padecimiento') }}">

                @error('padecimiento')
                    @component('layouts.alerta')
                        @slot('message', $message)
                    @endcomponent
                @enderror
            </div>

            <div class="col mb-3">
                <label class="form-text">Tratamiento</label>
                <input class="form-control" name="tratamiento" type="text" value="{{ old('tratamiento') }}">

                @error('tratamiento')
                    @component('layouts.alerta')
                        @slot('message', $message)
                    @endcomponent
                @enderror
            </div>

            <div class="col mb-3">
                <label class="form-text">Fecha</label>
                <input class="form-control" name="fecha" type="date" value="{{ old('fecha') }}">

                @error('fecha')
                    @component('layouts.alerta')
                        @slot('message', $message)
                    @endcomponent
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-between mt-5">
            <a class="btn btn-secondary" href="{{ route('consultas.index') }}">Regresar</a>

            <button class="btn btn-primary" type="submit">Registrar</button>
        </div>
    </form>
@endsection

@section('content-footer')
    <script>
        document.getElementById("slc-especialidad").addEventListener('change', function() {
            $.ajax({
                url: "{{ route('doctores.por_especialidad') }}",
                method: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    especialidad_id: this.value
                },
                success: function(result) {
                    let slc = document.getElementById("slc-doctor");
                    slc.innerHTML = "";

                    for (let i = 0; i < result.length; i++) {
                        slc.innerHTML += "<option value='" + result[i].id + "'>" + result[i].cedula + " - " + result[i].apellido_paterno + " " + result[i].apellido_paterno + " " + result[i].nombre + "</option>";
                    }
                }
            });
        });
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@endsection
