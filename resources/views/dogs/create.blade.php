@extends('adminlte::page')

@section('title', 'Registrar Perro')

@section('content')
<div class="p-3">
    <div class="card m-auto">
        <div class="card-header bg-dark">
            <h4>Crear Perro</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('dogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nombre :</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Padre :</label>
                            <input type="text" name="father" class="form-control" value="{{old('father')}}">
                            @error('father')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Madre :</label>
                            <input type="text" name="mother" class="form-control" value="{{old('mother')}}">
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
                                <input type="radio" name="gender" value="macho">
                                <label>Hembra </label>
                                <input type="radio" name="gender" value="hembra">
                            </div>
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
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

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Color :</label>
                            <input type="text" name="color" class="form-control" value="{{old('color')}}">
                            @error('color')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tatuaje :</label>
                            <input type="text" name="tattoo" class="form-control" value="{{old('tattoo')}}">
                            @error('tattoo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Chip :</label>
                            <input type="text" name="chip" class="form-control" value="{{old('chip')}}">
                            @error('chip')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fecha de Nacimiento :</label>
                            <input type="date" name="birthdate" class="form-control" value="{{old('birthdate')}}">
                            @error('birthdate')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Especialidad :</label>
                            <input type="text" name="specialty" class="form-control" value="{{old('specialty')}}">
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
