@extends('adminlte::page')

@section('title', 'Contratos de Prestación de Servicios')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">Contratos de Prestación de Servicios</h4>
        <div class="float-right">
            <a href="{{ route('service_provision_contracts.create') }}" class="btn btn-primary mb-2 float-md-right">Registrar Contrato</a>
            <a href="{{ route('pdf_all_service_provision_contracts') }}" class="btn btn-info mb-2 mr-2 float-md-right" target="_blank">
                <i class="fas fa-file-pdf"></i> Contratos PDF
            </a>
            <form action="export_service_provision_contracts" method="POST" class="form-inline">
                @csrf
                <div class="form-group mr-2">
                    <label for="initial_date" class="mr-2">Desde:</label>
                    <input type="date" name="initial_date" id="initial_date" class="form-control">
                </div>
                <div class="form-group mr-2">
                    <label for="final_date" class="mr-2">Hasta:</label>
                    <input type="date" name="final_date" id="final_date" class="form-control">
                </div>
                <button type="submit" class="btn btn-success mr-2">
                    <i class="fas fa-calendar"></i> Consultar
                </button>
            </form>
        </div>
    </div>
    <table id="data" class="table table-bordered table-striped display responsive nowrap" width="100%">
        <thead class="bg-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Monto</th>
                <th>Fecha / Hora</th>
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
                <td>{{ $service_provision_contract->created_at->format('d-m-Y H:i:s ') }}</td>
                <td>
                    <form action="{{ route('service_provision_contracts.destroy', $service_provision_contract) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('service_provision_contracts', $service_provision_contract)}}" class="btn btn-primary" target="_blank"><i class="fas fa-file-pdf"></i></a>
                        {{-- <a href="{{ route('service_provision_contracts.edit', $service_provision_contract) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a> --}}
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
