@extends('adminlte::page')

@section('title', 'Actas de Autorización de Anestesia y Cirugía')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content')
    <div class="card-header bg-dark mb-3 mt-2">
        <h4 class="d-inline">Actas de Autorización de Anestesia y Cirugía</h4>
        <div class="float-right">
            <a href="{{ route('anesthesia_surgeries.create') }}" class="btn btn-primary mb-2 float-md-right">Registrar Acta</a>
            <a href="{{ route('pdf_all_anesthesia_surgeries') }}" class="btn btn-info mb-2 mr-2 float-md-right" target="_blank">
                <i class="fas fa-file-pdf"></i> Actas PDF
            </a>
            <form action="export_anesthesia_surgeries" method="POST" class="form-inline">
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
                <th>Mascota</th>
                <th>Propietario</th>
                <th>Otro Propietario</th>
                <th>Fecha / Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anesthesiaSurgeries as $index => $anesthesiaSurgery)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $anesthesiaSurgery->client->name }}</td>
                <td>{{ $anesthesiaSurgery->animal->name }}</td>
                <td>{{ $anesthesiaSurgery->type_client }}</td>
                <td>{{ $anesthesiaSurgery->other_type_client }}</td>
                <td>{{ $anesthesiaSurgery->created_at->format('d-m-Y H:i:s ') }}</td>
                <td>
                    <form action="{{ route('anesthesia_surgeries.destroy', $anesthesiaSurgery) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('anesthesia_surgeries', $anesthesiaSurgery)}}" class="btn btn-primary" target="_blank"><i class="fas fa-file-pdf"></i></a>
                        {{-- <a href="{{ route('anesthesia_surgeries.edit', $anesthesiaAndSurgery) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a> --}}
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
        })
    </script>
@stop
