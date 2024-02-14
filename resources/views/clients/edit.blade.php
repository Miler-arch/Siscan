@extends('adminlte::page')

@section('title', 'Editar Cliente')
@section('plugins.Datatables', false)


@section('content')
<div class="p-3">
    <div class="card m-auto">
        <div class="card-header bg-dark">
            <h4>Crear Cliente</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('clients.update', $client) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nombre :</label>
                            <input type="text" name="name" value="{{$client->name}}" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Carnet de Identidad :</label>
                            <input type="number" name="ci" value="{{$client->ci}}" class="form-control">
                            @error('ci')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Teléfono :</label>
                            <input type="number" name="phone" value="{{$client->phone}}" class="form-control">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Teléfono de referencia :</label>
                            <input type="number" name="reference_phone" value="{{$client->reference_phone}}" class="form-control">
                            @error('reference_phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('clients.index') }}" class="btn btn-warning text-bold">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('js')
@stop
