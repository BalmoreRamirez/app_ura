@extends('adminlte::page')

@section('title', 'Consulta')

@section('content_header')
    <h1>Consulta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="#">Crear paciente</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Paciente</th>
                    <th>Medicamento</th>
                </tr>
                </thead>

                <tbody>

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
