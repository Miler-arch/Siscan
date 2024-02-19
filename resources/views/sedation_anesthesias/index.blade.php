@extends('adminlte::page')

@section('title', 'Actas de Autorización para Sedación y Anestesia')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">Actas de Autorización para Sedación y Anestesia</h4>
        <a href="{{ route('sedation_anesthesias.create') }}" class="btn btn-primary float-right">Registrar Acta de Autorización para Sedación y Anestesia</a>
    </div>
    <table id="data" class="table table-bordered table-striped display responsive nowrap" width="100%">
        <thead class="bg-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Mascota</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sedationAnesthesias as $index => $sedation_anesthesia)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $sedation_anesthesia->client->name }}</td>
                <td>{{ $sedation_anesthesia->animal->name }}</td>
                <td>
                    <form action="{{ route('sedation_anesthesias.destroy', $sedation_anesthesia) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('sedation_anesthesias', $sedation_anesthesia)}}" class="btn btn-primary" target="_blank"><i class="fas fa-file-pdf"></i></a>
                        {{-- <a href="{{ route('sedation_anesthesias.edit', $sedation_anesthesia) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a> --}}
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
        $('.form-delete').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@stop
