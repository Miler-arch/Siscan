@extends('adminlte::page')

@section('title', 'Cruces')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3">
        <h4 class="d-inline">Cruces</h4>
        <a href="{{ route('crossings.create') }}" class="btn btn-primary float-right">Registrar Cruce</a>
    </div>
    <table id="data" class="table table-bordered table-striped">
        <thead class=" bg-dark">
            <tr>
                <th>#</th>
                <th>Perro Macho</th>
                <th>Perro Hembra</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($crossings as $index => $crossing)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if ($crossing->dog->gender == 'macho')
                        {{ $crossing->dog->name }}
                    @endif
                </td>
                <td>
                    {{ $crossing->female_dog }}
                </td>
                <td>{{ $crossing->date }}</td>
                <td>{{ $crossing->type }}</td>
                <td>
                    <form action="{{ route('crossings.destroy', $crossing) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('crossings.show', $crossing) }}" class="btn btn-info"><i class=" fas fa-eye"></i></a>
                        <a href="{{ route('crossings.edit', $crossing) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('js')
    <script>
        // . El punto es una clase
        // # El gato es un id
    $('.form-delete').submit(function(e){
        e.preventDefault();
        Swal.fire({
        title: "Estas seguro de eliminar?",
        text: "No podras recuperar esta informacion!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar!",
        cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                title: "Eliminado!",
                text: "La informacion ha sido eliminada.",
                icon: "success",
                showConfirmButton: false,
                timer: 1500,
                }).then(() => {
                    this.submit();
                });
            }
        });
    });
    </script>
@stop
