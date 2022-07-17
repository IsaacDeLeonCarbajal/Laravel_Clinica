<div class="d-flex flex-row {{ $class }} p-0">
    <a class="flex-grow-1 col-4 p-1" href="{{ $show_action }}"><img class="col-12" src="{{ asset('img/show.png') }}" alt="Ver"></a>
    <a class="flex-grow-1 col-4 p-1" href="{{ $edit_action }}"><img class="col-12" src="{{ asset('img/edit.png') }}" alt="Editar"></a>
    <form class="flex-grow-1 col-4 p-1" action="{{ $destroy_action }}" method="POST">
        @csrf
        @method('delete')

        <button class="col-12" type="submit" style="height: 100%; background-color: transparent; background-image: url('{{ asset('img/destroy.png') }}'); background-size: 70% 60%; background-position: center; background-repeat: no-repeat; border-style: none;"></button>
        {{-- <a class="flex-grow-1 col-4 p-1" href="{{ $destroy_action }}"><img class="col-12" src="{{ asset('img/destroy.png') }}" alt="Eliminar"></a> --}}
    </form>
    {{-- Este botón era para pedir confirmación al elimiar un registro, pero no pude terminarlo --}}
    {{-- <button class="flex-grow-1 col-4 p-1" type="button" onclick="{{ $destroy_click }}" style="background-color: transparent; background-image: url('{{ asset('img/destroy.png') }}'); background-size: 70% 60%; background-position: center; background-repeat: no-repeat; border-style: none;"></button> --}}
</div>
