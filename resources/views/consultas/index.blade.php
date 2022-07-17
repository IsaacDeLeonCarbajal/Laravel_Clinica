@extends('layouts.plantilla')

@section('title', 'Ver Consultas')

@section('header1', 'Consultas Registradas')

@section('content-list')
    <div class="row col-12 d-flex align-items-center fs-5 fw-bold border-bottom border-dark">
        <label class="col">Paciente</label>
        <label class="col">Doctor</label>
        <label class="col-2">Fecha</label>
        <label class="col-1">Acciones</label>
    </div>

    @foreach ($consultas as $con)
        <div class="row col-12 d-flex align-items-center fs-5 border-top">
            <label class="col border-end border-dark">{{ $con->paciente->nss }} - {{ $con->paciente->apellido_paterno }} {{ $con->paciente->apellido_materno }}</label>
            <label class="col border-end border-dark">{{ $con->doctor->cedula }} - {{ $con->doctor->apellido_paterno }} {{ $con->doctor->apellido_materno }}</label>
            <label class="col-2 border-end border-dark">{{ $con->fecha }}</label>
            @component('layouts.acciones')
                @slot('class', 'col-1')

                @slot('show_action')
                    {{ route('consultas.show', ['consulta' => $con]) }}
                @endslot

                @slot('edit_action')
                    {{ route('consultas.edit', ['consulta' => $con]) }}
                @endslot

                @slot('destroy_action')
                    {{ route('consultas.destroy', ['consulta' => $con]) }}
                @endslot
            @endcomponent
        </div>
    @endforeach
@endsection

@section('content-footer')
    <a class="btn btn-secondary mb-3 me-3" href="@if (isset($paciente) || isset($doctor)) {{ url()->previous() }} @else {{ route('home') }} @endif">Regresar</a>

    <a class="btn btn-primary mb-3 me-auto" href="{{ route('consultas.create') }}">Registrar Consulta</a>

    {{ $consultas->links() }}
@endsection
