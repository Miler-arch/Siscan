@extends('adminlte::page')

@section('title', 'Registrar Cliente')

@section('plugins.Select2', true)

@section('content')
<div class="p-3">
    <div class="card m-auto">
        <div class="card-header bg-dark">
            <h4>Registrar Cliente</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('clients.store') }}" method="POST">
            @csrf
                <div class="row">
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
                            <label>Carnet de Identidad</label>
                            <input type="number" name="ci" id="ci" class="form-control" value="{{old('ci')}}">
                            @error('ci')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Expedido</label>
                            <input type="text" name="expedition" id="expedition" class="form-control" value="{{old('expedition')}}">
                            @error('expedition')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" name="home" id="home" class="form-control" value="{{old('home')}}">
                            @error('home')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Calle</label>
                            <input type="text" name="street" id="street" class="form-control" value="{{old('street')}}">
                            @error('street')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Número</label>
                            <input type="text" name="number" id="number" class="form-control" value="{{old('number')}}">
                            @error('number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="number" name="phone" id="phone" class="form-control" value="{{old('phone')}}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Teléfono de referencia</label>
                            <input type="number" name="reference_phone" id="reference_phone" class="form-control" value="{{old('reference_phone')}}">
                            @error('reference_phone')
                                <span class="text-danger">{{ $message }}</span>
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
    <script>
        $('.select2').select2();
    </script>
@stop
