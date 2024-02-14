@extends('adminlte::page')

@section('title', 'Contratos de Prestación de Servicios')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">Contratos de Prestación de Servicios</h4>
        <a href="{{ route('service_provision_contracts.create') }}" class="btn btn-primary float-right">Registrar Contratos de Prestación de Servicios</a>
    </div>
    <table id="data" class="table table-bordered table-striped">
        <thead class="bg-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Monto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($service_provision_contracts as $index => $service_provision_contract)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $service_provision_contract->client->name }}</td>
                <td>{{ $service_provision_contract->date_start }}</td>
                <td>{{ $service_provision_contract->date_end }}</td>
                <td>{{ $service_provision_contract->amount }}</td>
                <td>
                    <form action="{{ route('service_provision_contracts.destroy', $service_provision_contract) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('service_provision_contracts', $service_provision_contract)}}" class="btn btn-danger" target="_blank"><i class="fas fa-file-pdf"></i></a>
                        <a href="{{ route('service_provision_contracts.edit', $service_provision_contract) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
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
