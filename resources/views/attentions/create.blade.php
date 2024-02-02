@extends('adminlte::page')

@section('title', 'Regitrar Solicitud Atención')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card m-auto">
        <div class="card-header bg-dark">
            <h4>Regitrar Solicitud Atención</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('attentions.store') }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Perro :</label>
                            <select name="dog_id" class="form-control select2">
                                @foreach ($dogs as $dog)
                                    <option></option>
                                    <option value="{{ $dog->id }}">{{ $dog->name }}</option>
                                @endforeach
                            </select>
                            @error('dog_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Signos Clínicos</label>
                            <input type="text" class="form-control" name="clinical_signs">
                            @error('clinical_signs')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nombre del Solicitante</label>
                            <input type="text" class="form-control" name="applicant_name">
                            @error('applicant_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('attentions.index') }}" class="btn btn-warning text-bold">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('js')
    <script>
        $('.select2').select2(
            {
                placeholder: 'Seleccione un Perro',
                allowClear: true,
                language: {
                    noResults: function() {
                        return "No hay resultados";
                    }
                }
            }
        );
    </script>
@stop
