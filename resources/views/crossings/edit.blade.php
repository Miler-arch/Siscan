@extends('adminlte::page')

@section('title', 'Editar Cruce')
@section('plugins.Datatables', false)

@section('content')
<div class="p-3">
    <div class="card w-50 m-auto">
        <div class="card-header bg-dark">
            <h4>Crear Perro</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('dogs.update', $dog) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nombre :</label>
                            <input type="text" name="name" value="{{$dog->name}}" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Padre :</label>
                            <input type="text" name="father" value="{{$dog->father}}" class="form-control">
                            @error('father')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Madre :</label>
                            <input type="text" name="mother" value="{{$dog->mother}}" class="form-control">
                            @error('mother')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Género :</label>
                            <div>
                                <label>Macho </label>
                                <input type="radio" name="gender" id="macho" value="macho" {{ ($dog->gender == "macho")? "checked" : "" }}>
                                <label>Hembra </label>
                                <input type="radio" name="gender" id="hembra" value="hembra" {{ ($dog->gender == "hembra")? "checked" : "" }}>
                            </div>
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-4">
                        <label>Raza :</label>
                        <select name="race" class="form-control">
                            <option selected disabled>Seleccione una Raza</option>
                            <option value="Pastor Aleman" {{ $dog->race == 'Pastor Aleman'? 'selected' : '' }}>Pastor Aleman</option>
                            <option value="Pastor Sable" {{ $dog->race == 'Pastor Sable'? 'selected' : '' }}>Pastor Sable</option>
                            <option value="Labrador Retriever" {{ $dog->race == 'Labrador Retriever'? 'selected' : '' }}>Labrador Retriever</option>
                            <option value="Golden Retriever" {{ $dog->race == 'Golden Retriever'? 'selected' : '' }}>Golden Retriever</option>
                            <option value="Pastor Belga Malinois" {{ $dog->race == 'Pastor Belga Malinois'? 'selected' : '' }}>Pastor Belga Malinois</option>
                            <option value="Pastor Belga Groenendael" {{ $dog->race == 'Pastor Belga Groenendael'? 'selected' : '' }}>Pastor Belga Groenendael</option>
                            <option value="Coquer Spaniel" {{ $dog->race == 'Coquer Spaniel'? 'selected' : '' }}>Coquer Spaniel</option>
                        </select>
                        @error('race')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Color :</label>
                            <input type="text" name="color" value="{{$dog->color}}" class="form-control">
                            @error('color')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tatuaje :</label>
                            <input type="text" name="tattoo" value="{{$dog->tattoo}}" class="form-control">
                            @error('tattoo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Chip :</label>
                            <input type="text" name="chip" value="{{$dog->chip}}" class="form-control">
                            @error('chip')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fecha de Nacimiento :</label>
                            <input type="date" name="birthdate" value="{{$dog->birthdate}}" class="form-control">
                            @error('birthdate')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Especialidad :</label>
                            <input type="text" name="specialty" value="{{$dog->specialty}}" class="form-control">
                            @error('specialty')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Foto :</label>
                            <input type="file" name="picture" id="picture">
                            @error('photo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('dogs.index') }}" class="btn btn-warning text-bold">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
