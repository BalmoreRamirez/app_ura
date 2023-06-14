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
                        <form id="enviarConsulta">
                            @csrf
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input"
                                                   class="form-control-label">Rescatista</label>
                                            <input class="form-control" type="text" value="{{$username}}"
                                                   name="rescatista" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Club</label>
                                            <select class="form-select" id="id_club" name="club">
                                                <option selected>Buscar...</option>
                                                @foreach ($data as $item)
                                                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Paciente</label>
                                            <select class="form-select" id="id_paciente" name="paciente">
                                            </select>
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
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                    q>
                                                    Ac
                                                </th>
                                            </tr>

                                            </thead>
                                            <tbody id="lista_consulta">

                                            <tr>
                                                <td>

                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                            </tr>

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
        var current = 0;
        //Agregar fila nueva
        $("#agregar_cuadro").on("click", function (e) {
            e.preventDefault();

            current = current + 1;

            var select = "<select class='form-control medicamento' id='select_product_"+current+"'></select>";
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: '{{url('listaMedicamentoParaSelect')}}',
                success: function (response) {
                    console.log(response);
                    response.forEach(element => {
                        var row = `<option value="${element.id}" >${element.nombre}</option>`;
                        $("#select_product_"+current+"").append(row);
                    });
                },
            });

            let tr = `
                    <tr>
                        <td>
                            <textarea class="form-control cuadro" type="text" value=""></textarea>
                        <td>
                            ${select}
                        </td>
                        <td>
                            <input class="form-control cantidad" type="text" value="">
                        </td>
                        <td class="delete_row"><i class="fas fa-solid fa-trash"></i><td>
                    </tr>  `;
            $("#lista_consulta").append(tr);
        });

        // Cargar el select de pacientes
        $("#id_club").on("change", function () {
            let selectedOption = $(this).val();

            $.ajax({
                url: '{{url('listaPacientePorId')}}',
                type: 'POST',
                data: {
                    id: selectedOption,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $("#id_paciente").empty();
                    $('#id_paciente').append('<option selected>Buscar...</option>')
                    response.forEach(item => {
                        let tr = `<option value="${item.id}"> ${item.nombre} </option>`;
                        $("#id_paciente").append(tr);
                    });

                    if (response.length == 0) {
                        $('#id_paciente').append('<option selected>No hay datos...</option>')
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });

        $('#enviarConsulta').submit(function(e) {
            e.preventDefault();
            let formulario = $(this);
            let info = formulario.serialize();
            let products = [];

            $('tr').each(function() {
                let cuadro = $(this).find('.cuadro').val();
                let medicamento = $(this).find('.medicamento option:selected').val();
                let cantidad = $(this).find('.cantidad').val();

                if (cuadro && medicamento && cantidad) {
                    let item = {
                        'cuadro': cuadro,
                        'medicamento': medicamento,
                        'cantidad': cantidad
                    };
                    products.push(item);
                }
            });
            console.log(products);
            console.log(info);
            $.ajax({
                url: '{{ url('guardarPaciente') }}',
                type: 'POST',
                data: {
                    formulario: info,
                    products: products
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    formulario[0].reset();
                    window.location.href = '/consulta';
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });

    });

    // Borra fila
    $(document).on('click', '.delete_row', function (e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    });


</script>
