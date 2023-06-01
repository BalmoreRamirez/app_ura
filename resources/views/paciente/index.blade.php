@extends('adminlte::page')

@section('title', 'Paciente')

@section('content_header')
    <h1>Paciente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <a class="btn btn-primary" href="#">Crear paciente</a>
            <a class="" href="#"><i class="fas fa-upload"></i></a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Alergico a</th>
                    <th>club</th>
                </tr>
                </thead>

                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->apellido}}</td>
                        <td>{{$item->alergico_a}}</td>
                        <td>{{$item->club}}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
