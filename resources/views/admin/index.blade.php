@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-8">
                <div class="card mt-4">
                    <div class="card-body">
                            <div class="input-group">
                                <input type="search" class="form-control dropdown-toggle" placeholder="Buscar" id="mysearch">
                                <span class="mdi mdi-magnify search-icon"></span>
                                <button class="input-group-text btn btn-primary" type="submit">Search</button>
                            </div>
                            <ul id="showlist" tabindex='1' class="list-group"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{asset('js/search.js')}}" type="module"></script>
@stop
