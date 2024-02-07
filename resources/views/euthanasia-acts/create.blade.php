@extends('adminlte::page')

@section('title', 'Registrar Acta Consejo Consultivo Eutanasia Canina')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card m-auto">
        <div class="card-header bg-dark">
            <h4>Registrar Acta Consejo Consultivo Eutanasia Canina</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('euthanasia_acts.store') }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-md-6">
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

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Motivo :</label>
                            <input type="text" name="reason" class="form-control" value="{{ old('reason') }}">
                            @error('reason')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Considerando :</label>
                            <input type="text" name="considering" class="form-control" value="{{ old('considering') }}">
                            @error('considering')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Por lo tanto :</label>
                            <input type="text" name="therefore" class="form-control" value="{{ old('therefore') }}">
                            @error('therefore')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Resolver :</label>
                            <input type="text" name="solve" class="form-control" value="{{ old('solve') }}">
                            @error('solve')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Observacion :</label>
                            <input type="text" name="observation" class="form-control" value="{{ old('observation') }}">
                            @error('observation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('euthanasia_acts.index') }}" class="btn btn-warning text-bold">Cancelar</a>
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
