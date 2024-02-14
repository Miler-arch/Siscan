@extends('adminlte::page')

@section('title', 'Clientes')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">Clientes</h4>
        <a href="{{ route('clients.create') }}" class="btn btn-primary float-right">Registrar Cliente</a>
    </div>
    <table id="data" class="table table-bordered table-striped">
        <thead class="bg-dark">
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Carnet de Identidad</th>
                <th>Teléfono</th>
                <th>Teléfono de referencia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($clients as $index => $client)
            <tr>
                <td>{{ "A". str_pad($client->code, 7, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->ci}}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ $client->reference_phone }}</td>
                <td>
                    <form action="{{ route('clients.destroy', $client) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('clients.show', $client) }}" class="btn btn-info"><i class=" fas fa-eye"></i></a>
                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
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
