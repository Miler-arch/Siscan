@extends('adminlte::page')

@section('title', 'Actas de Interamiento')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">Actas de Interamiento</h4>
        <a href="{{ route('internments.create') }}" class="btn btn-primary float-right">Registrar de Interamiento</a>
    </div>
    <table id="data" class="table table-bordered table-striped display responsive nowrap" width="100%">
        <thead class="bg-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Mascota</th>
                <th>Propietario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($internments as $index => $internment)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $internment->client->name }}</td>
                <td>{{ $internment->animal->name }}</td>
                <td>{{ $internment->type_client }}</td>
                <td>
                    <form action="{{ route('internments.destroy', $internment) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('internments', $internment)}}" class="btn btn-danger" target="_blank"><i class="fas fa-file-pdf"></i></a>
                        <a href="{{ route('internments.edit', $internment) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
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
            this.submit();
        });
    });
    </script>
@stop
