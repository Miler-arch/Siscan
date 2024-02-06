@extends('adminlte::page')

@section('title', 'Registrar Historial Médico')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card m-auto">
        <div class="card-header bg-dark">
            <h4>Regitrar Historial Clínico</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('medical_histories.store') }}" method="POST">
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
                            <label>Anamnesis</label>
                            <input type="text" name="anamnesis" class="form-control" value="{{old('anamnesis')}}">
                            @error('anamnesis')
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

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Diagnóstico Presuntivo :</label>
                            <input type="text" name="presumptive_diagnosis" class="form-control" value="{{old('presumptive_diagnosis')}}">
                            @error('presumptive_diagnosis')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Examen Complementario :</label>
                            <input type="text" name="complementary_exam" class="form-control" value="{{old('complementary_exam')}}">
                            @error('complementary_exam')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tratamiento :</label>
                            <input type="text" name="treatment" class="form-control" value="{{old('treatment')}}">
                            @error('treatment')
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
