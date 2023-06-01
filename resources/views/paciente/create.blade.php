
@extends('adminlte::page')

@section('title', 'Paciente')

@section('content_header')
    <h1>Paciente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" class="form-control" id="title" name='title'
                           placeholder="Ingrese el nombre del artículo" minlength="5" maxlength="255"
                           value="">

                </div>

                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" id="slug" name='slug'
                           placeholder="Slug del artículo" readonly
                           value="">
                </div>

                <div class="form-group">
                    <label>Introducción</label>
                    <input type="text" class="form-control" id="introduction" name='introduction'
                           placeholder="Ingrese la introducción del artículo" minlength="5" maxlength="255"
                           value="">
                </div>

                <div class="form-group">
                    <label for="">Subir imagen</label>
                    <input type="file" class="form-control-file" id="image" name='image'>
                </div>

                <div class="form-group w-5">
                    <label for="">Desarrollo del artículo</label>
                    <textarea class="ckeditor form-control" id="body" name="body">{{ old('body') }}</textarea>
                </div>

                <label for="">Estado</label>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="">Privado</label>
                        <input class="form-check-input ml-2" type="radio" name='status'
                               id="status" value="0" checked>
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="">Público</label>
                        <input class="form-check-input ml-2" type="radio" name='status'
                               id="status" value="1">
                    </div>
                </div>

                <div class="form-group">
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Seleccione una categoría</option>
                    </select>
                </div>

                <input type="submit" value="Agregar artículo" class="btn btn-primary">
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
