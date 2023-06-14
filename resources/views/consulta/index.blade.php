@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Consulta'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Consulta</p>
                            <a href="{{url('/consulta/create')}}" class="btn btn-primary btn-sm ms-auto">Agregar</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0 text-center">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Rescatista</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Paciente</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Club</th>
                                        <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Alergico a</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ac</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->username}}
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->nombre}}</p>                                  
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->club}}</p>                                   
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->alergico_a}}</p>                                   
                                    </td>
                                    <td>
                                        <a href="{{ url('/consulta/'.$item->id)}}">
                                            <i class="fas fa-solid fa-eye"></i>
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
