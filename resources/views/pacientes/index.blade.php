@extends('layouts.plantilla')

@section('title', 'Ver Pacientes')

@section('header1', 'Pacientes Registrados')

@section('content-list')
    <div class="row col-12 d-flex align-items-center fs-5 fw-bold border-bottom border-dark">
        <label class="col-2">NSS</label>
        <label class="col-9">Nombre</label>
        <label class="col-1">Acciones</label>
    </div>

    @foreach ($pacientes as $pac)
        <div class="row col-12 d-flex align-items-center fs-5 border-top">
            <label class="col-2 border-end border-dark">{{ $pac->nss }}</label>
            <label class="col-9 border-end border-dark">{{ $pac->apellido_paterno }} {{ $pac->apellido_materno }} {{ $pac->nombre }}</label>
            @component('layouts.acciones')
                @slot('class', 'col-1')

                @slot('show_action')
                    {{ route('pacientes.show', ['paciente' => $pac]) }}
                @endslot

                @slot('edit_action')
                    {{ route('pacientes.edit', ['paciente' => $pac]) }}
                @endslot

                @slot('destroy_action')
                    {{ route('pacientes.destroy', ['paciente' => $pac]) }}
                @endslot
            @endcomponent
        </div>
    @endforeach

    {{-- <dialog id="dlg-eliminar">
        <form action=urlDestroy method="POST">
            @csrf

            @method('delete')

            <h1 id="titulo-dialog"></h1>
        </form>
    </dialog>

    <script>
        /*
            No se pudo
            No pude hacer que se pida una confirmación al quere eliminar un registro
            ¿Cómo cambiar el action del form en el dialog dinámicamente?
        */
        /*
        function eliminar(idPaciente) {
            //Pasar parámetros al 'route'
            var urlDestroy = "{{ route('pacientes.destroy', ':idPaciente') }}";
            urlDestroy = urlDestroy.replace(":idPaciente", idPaciente);

            $.ajax({
                url: "{{ route('pacientes.get') }}",
                method: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    paciente_id: idPaciente
                },
                success: function(result) {
                    jQuery("#titulo-dialog").html("Eliminar paciente: " + result.paciente.nombre);
                    console.log(result.genero);
                    console.log(result.consultas.length);

                    document.getElementById("dlg-eliminar").showModal();
                }
            });
        }
        */
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> --}}
@endsection

@section('content-footer')
    <a class="btn btn-secondary mb-3 me-3" href="{{ route('home') }}">Regresar</a>

    <a class="btn btn-primary mb-3 me-auto" href="{{ route('pacientes.create') }}">Registrar Paciente</a>

    {{ $pacientes->links() }}
@endsection
