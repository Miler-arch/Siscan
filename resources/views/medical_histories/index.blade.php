@extends('adminlte::page')

@section('title', 'Historias Medicas')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3">
        <h4 class="d-inline">Historial Clínico</h4>
        <a href="{{ route('medical_histories.create') }}" class="btn btn-primary float-right">Registrar Historial Clínico</a>
    </div>
    <table id="data" class="table table-bordered table-striped">
        <thead class=" bg-dark">
            <tr>
                <th>#</th>
                <th>Perro</th>
                <th>Anamnesis</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicalHistories as $index => $medicalHistory)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $medicalHistory->dog->name }}</td>
                <td>{{ $medicalHistory->anamnesis }}</td>
                <td>{{ $medicalHistory->date }}</td>
                <td>
                    <form action="{{ route('medical_histories.destroy', $medicalHistory) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('medical_histories.show', $medicalHistory) }}" class="btn btn-info"><i class=" fas fa-eye"></i></a>
                        <a href="{{ route('medical_histories.edit', $medicalHistory) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
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
            if (result.isConfirmed) {
                Swal.fire({
                title: "Eliminado!",
                text: "La informacion ha sido eliminada.",
                icon: "success",
                showConfirmButton: false,
                timer: 1500,
                }).then(() => {
                    this.submit();
                });
            }
        });
    });
    </script>
@stop
