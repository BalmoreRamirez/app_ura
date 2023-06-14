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

                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form role="form" method="POST"
                              action={{ route('profile.update') }} enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input"
                                                   class="form-control-label">Rescatista</label>
                                            <input class="form-control" type="text" value="{{$consultaData->rescatista}}"
                                                   disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Club</label>
                                            <input class="form-control" type="text" value="{{$consulta}}"
                                                   disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Paciente</label>
                                            <input class="form-control" type="text" value="{{$consultaData->paciente}}"
                                                   disabled>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-primary btn-sm ms-auto" id="agregar_cuadro">Agregar
                                            cuadro
                                        </button>

                                    </div>
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0 text-center">
                                            <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Cuadro
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Medicamento
                                                </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Cantidad
                                                </th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Ac
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody id="lista_consulta">
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>
                                                        <input class="form-control cuadro" type="text"
                                                               value="{{$item->cuadroCaso}}" disabled>
                                                    <td>
                                                        <input class="form-control medicamento" type="text"
                                                               value="{{$item->idMedicamento}}" disabled>
                                                    </td>
                                                    <td>
                                                        <input class="form-control cantidad" type="text"
                                                               value="{{$item->cantidad}}" disabled>
                                                    </td>
                                                    <td class="delete_row"><i class="fas fa-solid fa-trash"></i>
                                                    <td disabled>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Guardar consulta</button>
                            </div>


                        </form>

                        <!-- Agregar medicamento -->

                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth.footer')
    </div>
@endsection
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script>
    $(document).ready(function () {

        //Agregar fila nueva
        $("#agregar_cuadro").on("click", function (e) {
            e.preventDefault();

            let tr = `
                    <tr>
                        <td>
                            <textarea class="form-control" type="text" value="" name="username"></textarea>
                        <td>
                            <input class="form-control" type="text" value="" name="username">
                        </td>
                        <td>
                            <input class="form-control" type="text" value="" name="username">
                        </td>
                        <td class="delete_row"><i class="fas fa-solid fa-trash"></i><td>
                    </tr>  `;
            $("#lista_consulta").append(tr);
        });
    });

    // Borra fila
    $(document).on('click', '.delete_row', function (e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    });


</script>
