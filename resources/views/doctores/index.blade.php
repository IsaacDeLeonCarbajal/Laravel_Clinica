@extends('layouts.plantilla')

@section('title', 'Ver Doctores')

@section('header1', 'Doctores Registrados')

@section('content-list')
    <div class="row col-12 d-flex align-items-center fs-5 fw-bold border-bottom border-dark">
        <label class="col-2">Cédula</label>
        <label class="col-9">Nombre</label>
        <label class="col-1">Acciones</label>
    </div>

    @foreach ($doctores as $doc)
        <div class="row col-12 d-flex align-items-center fs-5 border-top">
            <label class="col-2 border-end border-dark">{{ $doc->cedula }}</label>
            <label class="col-9 border-end border-dark">{{ $doc->apellido_paterno }} {{ $doc->apellido_materno }} {{ $doc->nombre }} </label>
            @component('layouts.acciones')
                @slot('class', 'col-1')

                @slot('show_action')
                    {{ route('doctores.show', ['doctor' => $doc]) }}
                @endslot

                @slot('edit_action')
                    {{ route('doctores.edit', ['doctor' => $doc]) }}
                @endslot

                @slot('destroy_action')
                    {{ route('doctores.destroy', ['doctor' => $doc]) }}
                @endslot
            @endcomponent
        </div>
    @endforeach

@endsection

@section('content-footer')
    <a class="btn btn-secondary mb-3 me-3" href="{{ route('home') }}">Regresar</a>

    <a class="btn btn-primary mb-3 me-auto" href="{{ route('doctores.create') }}">Registrar Doctor</a>

    {{ $doctores->links() }}
@endsection
