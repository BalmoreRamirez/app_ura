@extends('adminlte::page')

@section('title', 'Medicamento')

@section('content_header')
    <h1>Medicamento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="#">Crear medicamento</a>
            <a class="btn btn-primary " href="#">Subir Excel</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Descripcion</th>
                    <th>stock</th>
                </tr>
                </thead>

                <tbody id="medicamento">

                </tbody>
            </table>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $.ajax({
                type: "GET",
                url: "{{ route('getmedicamento') }}",
                success: function (response) {
                    response.forEach(element => {
                        let tr = `<tr>
                                    <td>${element.nombre}</td>
                                    <td>${element.categoria}</td>
                                    <td>${element.descripcion}</td>
                                    <td>${element.stock}</td>
                                  </tr>`;
                        $("#medicamento").append(tr);
                    });

                },
            });
        });
    </script>
@stop

