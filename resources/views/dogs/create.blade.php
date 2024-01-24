@extends('adminlte::page')

@section('title', 'Crear Perro')

@section('content')
<div class="p-3">
    <div class="card w-50 m-auto">
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
                            <input type="text" name="name" required class="form-control" placeholder="Nombre">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Padre :</label>
                            <input type="text" name="father" required class="form-control" placeholder="Padre">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Madre :</label>
                            <input type="text" name="mother" required class="form-control" placeholder="Madre">
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
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Raza :</label>
                        <select name="race" required class="form-control">
                            <option value="">Seleccione una Raza</option>
                            <option value="Pastor Aleman">Pastor Aleman</option>
                            <option value="Pastor Sable">Pastor Sable</option>
                            <option value="Labrador Retriever">Labrador Retriever</option>
                            <option value="Golden Retriever">Golden Retriever</option>
                            <option value="Pastor Belga Malinois">Pastor Belga Malinois</option>
                            <option value="Pastor Belga Groenendael">Pastor Belga Groenendael</option>
                            <option value="Coquer Spaniel">Coquer Spaniel</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Color :</label>
                            <input type="text" name="color" required class="form-control" placeholder="Color">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tatuaje :</label>
                            <input type="text" name="tattoo" required class="form-control" placeholder="Tatuaje">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Chip :</label>
                            <input type="text" name="chip" required class="form-control" placeholder="Chip">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fecha de Nacimiento :</label>
                            <input type="date" name="birthdate" required class="form-control" placeholder="Fecha de Nacimiento">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Especialidad :</label>
                            <input type="text" name="specialty" required class="form-control" placeholder="Especialidad">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Foto :</label>
                            <input type="file" name="photo">
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
