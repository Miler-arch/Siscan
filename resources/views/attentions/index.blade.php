@extends('adminlte::page')

@section('title', 'Solicitud Atención Veterinaria')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
<div class="card-header bg-dark mb-3">
    <h4 class="d-inline">Solicitud Atención Veterinaria</h4>
    <a href="{{ route('attentions.create') }}" class="btn btn-primary float-right ml-2">Registrar Solicitud Atención Veterinaria</a>
    <a href="{{ route('attentions.pdf') }}" class="btn btn-danger float-right" target="_blank"><i class="fas fa-file-pdf"></i>Exportar Solicitud</a>

</div>
<table id="data" class="table table-bordered table-striped">
    <thead class=" bg-dark">
        <tr>
            <th>#</th>
            <th>Perro</th>
            <th>Signos Clínicos</th>
            <th>Nombre del Solicitante</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($attentions as $index => $attention)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $attention->dog->name }}</td>
            <td>{{ $attention->clinical_signs }}</td>
            <td>{{ $attention->applicant_name }}</td>
            <td>
                <form action="{{ route('attentions.destroy', $attention) }}" method="POST" class="form-delete">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('attentions.show', $attention) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('attentions.edit', $attention) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
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
