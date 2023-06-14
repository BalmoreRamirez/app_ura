@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Medicamento'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Medicamento</p>
                            <div class="ms-auto">   
                                <a href="#" class="btn btn-primary btn-sm" >Cargar datos</a>
                            <a href="{{url('/medicamento/create')}}" class="btn btn-primary btn-sm ">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0 text-center">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nombre</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Categoria</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Unidad</th>
                                        <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Stock</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Descripcion</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ac</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->nombre}}
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->categoria}}</p>                         
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->unidad}}</p>                                  
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->stock}}</p>                                   
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->descripcion}}</p>                                   
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                           data-toggle="tooltip" data-original-title="Edit user">
                                            Ac
                                        </a>
                                    </td>
                                </tr>
                                    @endforeach
                                

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth.footer')
    </div>
@endsection
