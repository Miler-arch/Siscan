@extends('adminlte::page')

@section('title', 'Mascotas')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">Mascotas</h4>
        <a href="{{ route('animals.create') }}" class="btn btn-primary float-right">Registrar Mascota</a>
        <a href="{{ route('animals_pdf')}}" class="float-right btn btn-danger mr-1" target="_blank"><i class="fas fa-file-pdf"></i> Lista de Clientes</a>
    </div>
    <table id="data" class="table table-bordered table-striped">
        <thead class="bg-dark">
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Cliente</th>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Raza</th>
                <th>Género</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animals as $index => $animal)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $animal->user->name }}</td>
                <td>{{ $animal->client->name }}</td>
                <td>{{ $animal->name }}</td>
                <td>{{ $animal->specie }}</td>
                <td>{{ $animal->race }}</td>
                <td>{{ $animal->gender }}</td>
                <td>
                    <form action="{{ route('animals.destroy', $animal) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        {{-- <a href="{{ route('history_dog', $animal)}}" class="btn btn-danger" target="_blank"><i class="fas fa-file-pdf"></i></a> --}}
                        <a href="{{ route('animals.show', $animal) }}" class="btn btn-info"><i class=" fas fa-eye"></i></a>
                        <a href="{{ route('animals.edit', $animal) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
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
        // . El punto es una clase
        // # El gato es un id
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
