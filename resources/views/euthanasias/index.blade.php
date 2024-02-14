@extends('adminlte::page')

@section('title', 'Solicitudes de Eutanasia')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">Solicitudes de Eutanasia</h4>
        <a href="{{ route('euthanasias.create') }}" class="btn btn-primary float-right">Registrar Solicitud de Eutanasia</a>
    </div>
    <table id="data" class="table table-bordered table-striped">
        <thead class="bg-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Mascota</th>
                <th>Doctor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($euthanasias as $index => $euthanasia)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $euthanasia->client->name }}</td>
                <td>{{ $euthanasia->animal->name }}</td>
                <td>{{ $euthanasia->doctor }}</td>
                <td>
                    <form action="{{ route('euthanasias.destroy', $euthanasia) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('euthanasias', $euthanasia)}}" class="btn btn-danger" target="_blank"><i class="fas fa-file-pdf"></i></a>
                        <a href="{{ route('euthanasias.edit', $euthanasia) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
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
