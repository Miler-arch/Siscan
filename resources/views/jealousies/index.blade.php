@extends('adminlte::page')

@section('title', 'Perros')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">CELOS</h4>
        <a href="{{ route('jealousies.create') }}" class="btn btn-primary float-right">Registrar Celo</a>
    </div>
    <table id="data" class="table table-bordered table-striped">
        <thead class=" bg-dark">
            <tr>
                <th>#</th>
                <th>Perro</th>
                <th>Fecha Inicial</th>
                <th>Fecha Final</th>
                <th>Fecha Proxima</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jealousies as $index => $jealousie)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $jealousie->dog->name }}</td>
                <td>{{ $jealousie->initial_date }}</td>
                <td>{{ $jealousie->final_date }}</td>
                <td>{{ $jealousie->next_date }}</td>
                <td>{{ $jealousie->description }}</td>
                <td>
                    @if ($jealousie->status == 1)
                        <span class="badge badge-success p-2">En celo</span>
                    @else
                        <span class="badge badge-danger p-2">No esta en celo</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('jealousies.destroy', $jealousie) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('jealousies.show', $jealousie) }}" class="btn btn-info"><i class=" fas fa-eye"></i></a>
                        <a href="{{ route('jealousies.edit', $jealousie) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
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
