@extends('adminlte::page')

@section('title', 'Actas de Autorización de Anestesia y Cirugía')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">Actas de Autorización de Anestesia y Cirugía</h4>
        <a href="{{ route('anesthesia_surgeries.create') }}" class="btn btn-primary float-right">Registrar Actas de Autorización de Anestesia y Cirugía</a>
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
            @foreach ($anesthesiaAndSurgeries as $index => $anesthesiaAndSurgery)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $anesthesiaAndSurgery->client->name }}</td>
                <td>{{ $anesthesiaAndSurgery->animal->name }}</td>
                <td>{{ $anesthesiaAndSurgery->type_client }}</td>
                <td>
                    <form action="{{ route('anesthesia_surgeries.destroy', $anesthesiaAndSurgery) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('anesthesia_surgeries', $anesthesiaAndSurgery)}}" class="btn btn-danger" target="_blank"><i class="fas fa-file-pdf"></i></a>
                        <a href="{{ route('anesthesia_surgeries.edit', $anesthesiaAndSurgery) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
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
