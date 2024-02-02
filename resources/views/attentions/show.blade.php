@extends('adminlte::page')

@section('title', 'Crear Perro')

@section('content')
<div class="p-3">
    <div class="card w-50 m-auto bg-dark">
        <div class="card-body">
            <ul>
                <li>Padre: {{$dog->father}}</li>
                <li>Madre: {{$dog->mother}}</li>
                <li>Género: {{$dog->gender}}</li>
                <li>Fecha Nacimiento: {{$dog->birthdate}}</li>
            </ul>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('dogs.index') }}" class="btn btn-primary w-25">Volver</a>
        </div>
    </div>
</div>
@stop
