@extends('adminlte::page')

@section('title', 'Compromisos de Pago')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">Compromisos de Pago</h4>
        <a href="{{ route('payment_commitments.create') }}" class="btn btn-primary float-right">Registrar Compromiso de Pago</a>
    </div>
    <table id="data" class="table table-bordered table-striped display responsive nowrap" width="100%">
        <thead class="bg-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha de Pago</th>
                <th>Monto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payment_commitments as $index => $payment_commitment)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $payment_commitment->client->name }}</td>
                <td>{{ $payment_commitment->date }}</td>
                <td>{{ $payment_commitment->amount }}</td>
                <td>
                    <form action="{{ route('payment_commitments.destroy', $payment_commitment) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('payment_commitments_client', $payment_commitment)}}" class="btn btn-primary" target="_blank"><i class="fas fa-file-pdf"></i></a>
                        {{-- <a href="{{ route('payment_commitments.edit', $payment_commitment) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a> --}}
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
