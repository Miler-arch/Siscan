@extends('adminlte::page')

@section('title', 'Registrar Celo')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card m-auto">
        <div class="card-header bg-dark">
            <h4>Registrar Celo</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('jealousies.store') }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-md-3">
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

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Fecha Inicial :</label>
                            <input type="date" name="initial_date" class="form-control" value="{{old('initial_date')}}">
                            @error('initial_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Fecha Final :</label>
                            <input type="date" name="final_date" class="form-control" value="{{old('final_date')}}">
                            @error('final_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Fecha Proxima :</label>
                            <input type="date" name="next_date" class="form-control" value="{{old('next_date')}}">
                            @error('next_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descripción :</label>
                            <textarea name="description" class="form-control" rows="3">{{old('description')}}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('jealousies.index') }}" class="btn btn-warning text-bold">Cancelar</a>
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
        placeholder: "Seleccione un perro",
        width: '100%',
        language: {
            noResults: function() {
                return "No hay resultados";
            }
        }
    }
);
</script>
@stop


