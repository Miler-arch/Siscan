@extends('adminlte::page')

@section('title', 'Ficha Clinica')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">Ficha Clinica</h4>
        <a href="{{ route('clinical_records.create') }}" class="btn btn-primary float-right">Registrar Ficha Clinica</a>
    </div>
    <table id="data" class="table table-bordered table-striped display responsive nowrap" width="100%">
        <thead class="bg-dark">
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Cliente</th>
                <th>Mascota</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clinical_records as $index => $clinical_record)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $clinical_record->user->name }}</td>
                <td>{{ $clinical_record->client->name }}</td>
                <td>{{ $clinical_record->animal->name }}</td>
                <td>
                    <form action="{{ route('clinical_records.destroy', $clinical_record) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('clinical_records_pdf', $clinical_record)}}" class="btn btn-danger" target="_blank"><i class="fas fa-file-pdf"></i></a>
                        <a href="{{ route('clinical_records.show', $clinical_record) }}" class="btn btn-info"><i class=" fas fa-eye"></i></a>
                        <a href="{{ route('clinical_records.edit', $clinical_record) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
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
