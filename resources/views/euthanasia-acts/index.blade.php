@extends('adminlte::page')

@section('title', 'Acta Consejo Consultivo Eutanasia Canina')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
<div class="card-header bg-dark mb-3">
    <h4 class="d-inline">Acta Consejo Consultivo Eutanasia Canina</h4>
    <a href="{{ route('euthanasia_acts.create') }}" class="btn btn-primary float-right ml-2">Registrar Eutanasia Canina</a>
</div>
<table id="data" class="table table-bordered table-striped">
    <thead class=" bg-dark">
        <tr>
            <th>#</th>
            <th>Detalle</th>
            <th>Observación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($euthanasia_acts as $euthanasia_act)
        <tr>
            <td>{{ $euthanasia_act->id }}</td>
            <td>{{ $euthanasia_act->reason }}</td>
            <td>{{ $euthanasia_act->observation }}</td>
            <td>
                <a href="{{ route('euthanasia_pdf', $euthanasia_act->id) }}" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
                <a href="{{ route('euthanasia_acts.show', $euthanasia_act->id) }}" class="btn btn-info">Ver</a>
                <a href="{{ route('euthanasia_acts.edit', $euthanasia_act->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('euthanasia_acts.destroy', $euthanasia_act->id) }}" method="POST" class="form-delete d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach

            {{-- $table->unsignedBigInteger('dog_id');
            $table->string('reason');
            $table->string('considering');
            $table->string('therefore');
            $table->string('solve');
            $table->string('observation'); --}}
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
