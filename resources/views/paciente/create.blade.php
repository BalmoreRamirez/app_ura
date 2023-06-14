@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Paciente'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Paciente</p>
                            
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form role="form" method="POST" action="{{ url('/paciente') }}" >
                            @csrf                    
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nombre</label>
                                            <input class="form-control" type="text" name="nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Apellido</label>
                                            <input class="form-control" type="text" name="apellido" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Alergico a</label>
                                            <input class="form-control" type="text" name="alergico_a" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Club</label>
                                            <select class="form-select" aria-label="Default select example" name="club">
                                                <option>Seleccionar ...</option>
                                                @foreach ($data as $item)
                                                <option value="{{$item->id}}">{{$item->nombre}}</option>    
                                                @endforeach
                                            
                                              </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 
        @include('layouts.footers.auth.footer')
    </div>
@endsection
