@extends('adminlte::page')

@section('title', 'Registrar Acta de Autorización de Anestesia y Cirugía')

@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card m-auto">
        <div class="card-header bg-dark">
            <h4>Registrar Acta de Autorización de Anestesia y Cirugía</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('anesthesia_surgeries.store') }}" method="POST">
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
                            <label>Propietario</label>
                            <select name="type_client" id="type_client" class="form-control">
                                <option selected disabled>Seleccione una opción</option>
                                <option value="Propietario">Propietario</option>
                                <option value="Representante del Propietario">Representante del Propietario</option>
                            </select>
                            @error('type_client')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Otro</label>
                            <input type="text" name="other_type_client" id="other_type_client" class="form-control">
                            @error('other_type_client')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <a href="{{ route('anesthesia_surgeries.index') }}" class="btn btn-warning text-bold">Cancelar</a>
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
