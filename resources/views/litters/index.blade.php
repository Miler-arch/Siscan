@extends('adminlte::page')

@section('title', 'Perros')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">CAMADAS</h4>
        <a href="{{ route('litters.create') }}" class="btn btn-primary float-right">Registrar Camada</a>
    </div>
    <table id="data" class="table table-bordered table-striped">
        <thead class=" bg-dark">
            <tr>
                <th>#</th>
                <th>Perro</th>
                <th>Raza</th>
                <th>Fecha de Nacimiento</th>
                <th>Cesarea</th>
                <th>Nacidos Machos</th>
                <th>Nacidos Hembras</th>
                <th>Muertes Machos</th>
                <th>Muertes Hembras</th>
                <th>Nota</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($litters as $index => $litter)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $litter->dog->name }}</td>
                <td>{{ $litter->race }}</td>
                <td>{{ $litter->birthdate }}</td>
                <td>{{ $litter->type_of_birth }}</td>
                <td>{{ $litter->born_male }}</td>
                <td>{{ $litter->born_female }}</td>
                <td>{{ $litter->male_death }}</td>
                <td>{{ $litter->female_death }}</td>
                <td>{{ $litter->note }}</td>
                <td>
                    <img src="{{ asset($litter->image) }}" alt="{{ $litter->name }}" class="img-fluid" width="50">
                </td>
                <td>
                    <form action="{{ route('litters.destroy', $litter) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('litters.show', $litter) }}" class="btn btn-info"><i class=" fas fa-eye"></i></a>
                        <a href="{{ route('litters.edit', $litter) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
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
