@extends('adminlte::page')

@section('title', 'Perros')

@section('plugins.Datatables', true)

@section('content')
    <div class="card-header bg-dark mb-3">
        <h4 class="d-inline">LISTA DE CANES</h4>
        <a href="{{ route('dogs.create') }}" class="btn btn-primary float-right">Registrar Can</a>
    </div>
    <table id="data" class="table table-bordered table-striped">
        <thead class=" bg-dark">
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Raza</th>
                <th>Color</th>
                <th>Tatuaje</th>
                <th>Chip</th>
                <th>Especialidad</th>
                {{-- <th>Foto</th> --}}
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dogs as $index => $dog)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $dog->user->name }}</td>
                <td>{{ $dog->name }}</td>
                <td>{{ $dog->race }}</td>
                <td>{{ $dog->color }}</td>
                <td>{{ $dog->tattoo}}</td>
                <td>{{ $dog->chip }}</td>
                <td>{{ $dog->specialty }}</td>
                {{-- <td>{{ $dog->photo }}</td> --}}
                <td>
                    <form action="{{ route('dogs.destroy', $dog) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('dogs.show', $dog) }}" class="btn btn-info"><i class=" fas fa-eye"></i></a>
                        <a href="{{ route('dogs.edit', $dog) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@stop
