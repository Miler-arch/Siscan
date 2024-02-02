@extends('adminlte::page')

@section('title', 'Registrar Camada')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card m-auto">
        <div class="card-header bg-dark">
            <h4>Registrar Camada</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('litters.store') }}" method="POST">
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
                        <label>Nombre :</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label>Raza :</label>
                        <select name="race" class="form-control">
                            <option disabled selected>Seleccione una Raza</option>
                            <option value="Pastor Aleman">Pastor Aleman</option>
                            <option value="Pastor Sable">Pastor Sable</option>
                            <option value="Labrador Retriever">Labrador Retriever</option>
                            <option value="Golden Retriever">Golden Retriever</option>
                            <option value="Pastor Belga Malinois">Pastor Belga Malinois</option>
                            <option value="Pastor Belga Groenendael">Pastor Belga Groenendael</option>
                            <option value="Coquer Spaniel">Coquer Spaniel</option>
                        </select>
                        @error('race')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha de Nacimiento :</label>
                            <input type="date" name="birthdate" class="form-control" value="{{old('date')}}">
                            @error('date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label>Tipo de Parto :</label>
                        <select name="type_of_birth" class="form-control">
                            <option disabled selected>Seleccione un Tipo de Parto</option>
                            <option value="Natural">Natural</option>
                            <option value="Cesarea">Cesarea</option>
                        </select>
                        @error('type_of_birth')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nacidos Machos :</label>
                            <input type="number" name="born_male" class="form-control" value="{{old('born_male')}}">
                            @error('born_male')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nacidos Hembras :</label>
                            <input type="number" name="born_female" class="form-control" value="{{old('born_female')}}">
                            @error('born_female')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Muertes Machos :</label>
                            <input type="number" name="male_death" class="form-control" value="{{old('male_death')}}">
                            @error('male_death')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Muertes Hembras :</label>
                            <input type="number" name="female_death" class="form-control" value="{{old('female_death')}}">
                            @error('female_death')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nota :</label>
                            <textarea name="note" class="form-control" rows="3">{{old('note')}}</textarea>
                            @error('note')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Foto :</label>
                            <input type="file" name="photo" id="photo">
                            @error('photo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('litters.index') }}" class="btn btn-warning text-bold">Cancelar</a>
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


