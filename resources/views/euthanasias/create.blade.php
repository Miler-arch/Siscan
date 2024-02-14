@extends('adminlte::page')

@section('title', 'Registrar Solicitud de Eutanasia')

@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card m-auto">
        <div class="card-header bg-dark">
            <h4>Registrar Solicitud de Eutanasia</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('euthanasias.store') }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cliente</label>
                            <select name="client_id" id="client_id" class="form-control select2">
                                @foreach ($clients as $client)
                                    <option></option>
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
                            <label>Mascota</label>
                            <select name="animal_id" id="animal_id" class="form-control select2">
                                @foreach ($animals as $animal)
                                    <option></option>
                                    <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                                @endforeach
                            </select>
                            @error('animal_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Doctor</label>
                            <input type="text" name="doctor" class="form-control" value="{{ old('doctor') }}" placeholder="Nombre del doctor">
                            @error('doctor')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Descripción de la solicitud">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <a href="{{ route('euthanasias.index') }}" class="btn btn-warning text-bold">Cancelar</a>
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
