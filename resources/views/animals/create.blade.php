@extends('adminlte::page')

@section('title', 'Registrar Ficha Clinica')

@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card m-auto">
        <div class="card-header bg-dark">
            <h4>Registrar Ficha Clinica</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('animals.store') }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cliente</label>
                            <select name="client_id" id="client_id" class="form-control select2">
                                <option></option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Especie</label>
                            <select name="specie" id="specie" class="form-control">
                                <option selected disabled>Seleccione una especie</option>
                                <option value="Canino">Canino</option>
                                <option value="Felino">Felino</option>
                                <option value="Ave">Ave</option>
                                <option value="Reptil">Reptil</option>
                                <option value="Roedor">Roedor</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Raza</label>
                            <input type="text" name="race" id="race" class="form-control" value="{{old('race')}}"">
                            @error('race')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Género</label><br>
                            Macho
                            <input type="radio" name="gender" id="gender" value="Macho">
                            Hembra
                            <input type="radio" name="gender" id="gender" value="Hembra">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pelaje</label>
                            <input type="text" name="fur" id="fur" class="form-control" value="{{old('fur')}}">
                            @error('fur')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('animals.index') }}" class="btn btn-warning text-bold">Cancelar</a>
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
                placeholder: "Seleccione un cliente",
                allowClear: true
            }
        );
    </script>
@stop
