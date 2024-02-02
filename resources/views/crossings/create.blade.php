@extends('adminlte::page')

@section('title', 'Crear Perro')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card m-auto">
        <div class="card-header bg-dark">
            <h4>Regitrar Cruce</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('crossings.store') }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Perro Macho:</label>
                            <select name="dog_id" class="form-control select2">
                                @foreach ($dogs as $dog)
                                    @if ($dog->gender == 'macho')
                                        <option></option>
                                        <option value="{{ $dog->id }}">{{ $dog->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('dog_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Perro Hembra:</label>
                            <select name="female_dog" class="form-control select2">
                                @foreach ($dogs as $dog)
                                    @if ($dog->gender == 'hembra')
                                        <option></option>
                                        <option value="{{ $dog->name }}">{{ $dog->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('dog_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Fecha :</label>
                            <input type="date" name="date" class="form-control" value="{{old('date')}}">
                            @error('date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tipo :</label>
                            <input type="text" name="type" class="form-control" value="{{old('type')}}">
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('crossings.index') }}" class="btn btn-warning text-bold">Cancelar</a>
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
