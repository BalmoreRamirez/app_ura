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
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Rescatista</label>
                                        <input class="form-control" type="text" value="{{ $username }}"
                                            name="rescatista" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Club</label>
                                        <select class="form-select" id="id_club" name="club">
                                            <option selected>Buscar...</option>
                                            @foreach ($data as $item)
                                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Paciente</label>
                                        <select class="form-select" id="id_paciente" name="paciente">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <button class="btn btn-primary btn-sm ms-auto" id="agregarConsulta" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Agregar consulta
                                </button>

                            </div>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Cuadro
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Medicamento
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Cantidad
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                q>
                                                Ac
                                            </th>
                                        </tr>

                                    </thead>
                                    <tbody id="lista_consulta">

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- Agregar medicamento -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Consulta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formulario">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Medicamento</label>
                                        <select name="medicamento" id="medicamento" class="form-control">
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Medicamento de medicamento</label>
                                        <input type="number" class="form-control" id="cantidad" name="cantidad">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Diagnostico del paciente</label>
                                        <textarea name="cuadro" id="cuadro" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Salir</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" id="guardarDatos" class="btn btn-primary">Guardar
                                        consulta</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection


<script src="{{ asset('assets/js/jquery.js') }}"></script>

<script>
    $(document).ready(function() {
        $("#agregarConsulta").attr('disabled', true);
        // Listar los medicamento
        $.ajax({
            url: '{{ url('listaMedicamentoParaSelect') }}',
            type: "GET",
            dataType: 'json',
            success: function(response) {
                console.log(response)
                $("#medicamento").empty();
                $('#medicamento').append('<option selected>Seleciona el paciente...</option>')
                response.forEach(item => {
                    let tr = `<option value="${item.id}"> ${item.nombre} </option>`;
                    $("#medicamento").append(tr);
                });
            },
            error: function(xhr, status, error) {
                console.log(error)
                console.log(xhr.responseText);
            }
        });


        // Listar los clubes 

        $("#id_club").on("change", function() {
            let selectedOption = $(this).val();
            $.ajax({
                url: '{{ url('listaPacientePorId') }}',
                type: 'POST',
                data: {
                    id: selectedOption,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response)
                    $("#id_paciente").empty();
                    $('#id_paciente').append(
                        '<option selected>Seleciona el paciente...</option>')
                    response.forEach(item => {
                        let tr =
                            `<option value="${item.id}"> ${item.nombre} </option>`;
                        $("#id_paciente").append(tr);
                    });

                    if (response.length == 0) {
                        $('#id_paciente').append(
                            '<option selected>No hay datos...</option>');                          
                        $('#id_paciente').attr('disabled', true);
                        $("#lista_consulta").empty();
                        $("#agregarConsulta").attr('disabled', true);
                    } else {
                        $('#id_paciente').attr('disabled', false);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error)
                    console.log(xhr.responseText);
                }
            });
        });

        // Listar los pacientes dependiendo del club
        $("#id_paciente").on("change", function() {
            let idPaciente = $(this).val();


            if (idPaciente != 0) {
                cargarTabla(idPaciente);
            }
            if (idPaciente != 0) {
                $("#agregarConsulta").attr('disabled', false);
            }
        });


    });

    $(document).on("click", '#guardarDatos', function(e) {
        let valor = $("#id_paciente option:selected").val();
        e.preventDefault();
        let formData = $("#formulario").serialize();
        formData += '&valor=' + encodeURIComponent(valor);
        console.log(formData);
        $.ajax({
            url: '{{ url('guardarPaciente') }}',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#exampleModal').modal('hide');

                if (valor != 0) {
                    cargarTabla(valor);
                }


            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });


    function cargarTabla(id) {

        $.ajax({
            url: '{{ url('/consulta/consultaPorPaciente') }}',
            type: 'POST',
            data: {
                id: id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log(response);
                if (response.length <= 0) {
                    $("#lista_consulta").empty();
                    let tr = `<tr>
                                    <td colspan="4">
                                        No hay datos
                                    <td>
                                </tr>`;
                    $("#lista_consulta").append(tr);
                } else {
                    $("#lista_consulta").empty();
                    response.forEach(element => {
                        let row = `
                                    <tr>
                                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">${element.cuadroCaso}</td>
                                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">${element.medicamento}</td>
                                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">${element.cantidad}</td>
                                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NN</td>
                                    </tr>
                                    `;
                        $("#lista_consulta").append(row);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log(error)
                console.log(xhr.responseText);
            }
        });

    }
</script>
