@extends('template.laboratorio.laboratorio_profesional.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">

            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Reportes</h5>

                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('comercial') }}">Administracion del centro médico</a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('comercial') }}">Reportes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <!--Card Nav Pills-->
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                        <li class="nav-item active">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="diario-tab" data-toggle="tab" href="#diario" role="tab" aria-controls="diario" aria-selected="false">Reporte Diario</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="mensual-tab" data-toggle="tab" href="#mensual" role="tab" aria-controls="mensual" aria-selected="false">Reporte Mensual</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="anual-tab" data-toggle="tab" href="#anual" role="tab" aria-controls="salidas" aria-selected="false">Reporte Anual</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-12 align-botton">
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Reportes</h4>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="Profesionales_cm">
                        <div class="tab-pane fade active show" id="diario" role="tabpanel" aria-labelledby="diario-tab">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fecha" class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control w-100" id="fecha_reporte_diario">

                                    </div>
                                    <button class="btn btn-outline-success btn-sm w-100 my-3" onclick="reporte_diario()">Buscar</button>
                                    <button class="btn btn-outline-dark btn-sm w-100 my-3" onclick="generar_reporte_diario()">Generar Reporte</button>
                                </div>
                                <div class="col-md-9" id="contenedor_reporte_diario">
                                    <table class="table w-100" id="tabla_reporte_diario">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="mensual" role="tabpanel" aria-labelledby="mensual-tab">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="mes" class="floating-label-activo-sm">Mes</label>
                                            <select class="form-control w-100" id="mes">
                                                <option value="0">Seleccione</option>
                                                <option value="1">Enero</option>
                                                <option value="2">Febrero</option>
                                                <option value="3">Marzo</option>
                                                <option value="4">Abril</option>
                                                <option value="5">Mayo</option>
                                                <option value="6">Junio</option>
                                                <option value="7">Julio</option>
                                                <option value="8">Agosto</option>
                                                <option value="9">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Noviembre</option>
                                                <option value="12">Diciembre</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="mes_year" class="floating-label-activo-sm">Mes</label>
                                            <select class="form-control w-100" id="mes_year">
                                                <option value="0">Seleccione</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button class="btn btn-outline-success btn-sm w-100 my-3" onclick="reporte_mensual()">Buscar</button>
                                    <button class="btn btn-outline-dark btn-sm w-100 my-3" onclick="generar_reporte_mensual()">Generar Reporte</button>
                                </div>
                                <div class="col-md-9" id="contenedor_reporte_mensual">
                                    <table class="table w-100" id="tabla_reporte_mensual">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="anual" role="tabpanel" aria-labelledby="anual-tab">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="year" class="floating-label-activo-sm">Año</label>
                                        <select class="form-control w-100" id="year">
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>

                                    </div>
                                    <button class="btn btn-outline-success btn-sm w-100 my-3" onclick="reporte_anual()">Buscar</button>
                                    <button class="btn btn-outline-dark btn-sm w-100 my-3" onclick="generar_reporte_anual()">Generar Reporte</button>
                                </div>
                                <div class="col-md-9" id="contenedor_reporte_anual">
                                    <table class="table w-100" id="tabla_reporte_anual">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script>
    function reporte_diario() {
        var fecha = $('#fecha_reporte_diario').val();
        if(fecha == '') {
            swal({
                title: "Error",
                text: "Debe seleccionar una fecha",
                icon: "error",
                button: "Aceptar"
            });
            return;
        }
        console.log(fecha);
        $.ajax({
            url: "{{ route('bodegas.reporte_diario') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                fecha: fecha
            },
            success: function(data) {
                console.log(data);
                $('#contenedor_reporte_diario').html(data.vista);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function generar_reporte_diario(){
        swal({
            title: "Generar reporte",
            text: "¿Está seguro de generar el reporte diario?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((aceptar) => {
            if(aceptar){
                confirmar_generar_reporte_diario();
            }
        })
    }

    function confirmar_generar_reporte_diario(){
        var fecha = $('#fecha_reporte_diario').val();
        if(fecha == '') {
            swal({
                title: "Error",
                text: "Debe seleccionar una fecha",
                icon: "error",
                button: "Aceptar"
            });
            return;
        }
        $.ajax({
            url: "{{ route('bodegas.generar_reporte') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                fecha: fecha,
                tipo: 'diario'
            },
            success: function(data) {
                console.log(data);
                if(data.ruta){
                    swal({
                        title: "Reporte generado",
                        text: "El reporte se ha generado correctamente",
                        icon: "success",
                        button: "Aceptar"
                    }).then(() => {
                        // Abrir el PDF en una ventana emergente
                        var width = 800;
                        var height = 600;
                        var left = (screen.width - width) / 2;
                        var top = (screen.height - height) / 2;
                        window.open(data.ruta, 'Reporte Diario', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                    });
                }else{
                    swal({
                        title: "Error",
                        text: "Ha ocurrido un error al generar el reporte",
                        icon: "error",
                        button: "Aceptar"
                    });
                }
            },
            error: function(error) {
                console.log(error);
                swal({
                    title: "Error",
                    text: "Ha ocurrido un error al generar el reporte",
                    icon: "error",
                    button: "Aceptar"
                });
            }
        });
    }

    function reporte_mensual(){
        var mes = $('#mes').val();
        var year = $('#mes_year').val();

        var valido = 1;
        var mensaje = '';

        if(mes == ''){
            valido = 0;
            mensaje += '<li>Debe seleccionar un mes</li>';
        }

        if(year == ''){
            valido = 0;
            mensaje += '<li>Debe seleccionar un año</li>';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content:{
                    element: 'div',
                    attributes:{
                        innerHTML: mensaje
                    }
                },
                icon: 'error'
            });
            return false;
        }

        $.ajax({
            url: "{{ route('bodegas.reporte_mensual') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                mes: mes,
                year: year
            },
            success: function(data) {
                console.log(data);
                $('#contenedor_reporte_mensual').html(data.vista);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function generar_reporte_mensual(){
        swal({
            title: "Generar reporte",
            text: "¿Está seguro de generar el reporte mensual?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((aceptar) => {
            if(aceptar){
                confirmar_generar_reporte_mensual();
            }
        })
    }

    function confirmar_generar_reporte_mensual(){
        var mes = $('#mes').val();
        var year = $('#mes_year').val();

        var valido = 1;
        var mensaje = '';

        if(mes == ''){
            valido = 0;
            mensaje += '<li>Debe seleccionar un mes</li>';
        }

        if(year == ''){
            valido = 0;
            mensaje += '<li>Debe seleccionar un año</li>';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content:{
                    element: 'div',
                    attributes:{
                        innerHTML: mensaje
                    }
                },
                icon: 'error'
            });
            return false;
        }

        $.ajax({
            url: "{{ route('bodegas.generar_reporte') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                mes: mes,
                anio: year,
                tipo: 'mensual'
            },
            success: function(data) {
                console.log(data);
                if(data.ruta){
                    swal({
                        title: "Reporte generado",
                        text: "El reporte se ha generado correctamente",
                        icon: "success",
                        button: "Aceptar"
                    }).then(() => {
                        // Abrir el PDF en una ventana emergente
                        var width = 800;
                        var height = 600;
                        var left = (screen.width - width) / 2;
                        var top = (screen.height - height) / 2;
                        window.open(data.ruta, 'Reporte Mensual', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                    });
                }else{
                    swal({
                        title: "Error",
                        text: "Ha ocurrido un error al generar el reporte",
                        icon: "error",
                        button: "Aceptar"
                    });
                }
            },
            error: function(error) {
                console.log(error);
                swal({
                    title: "Error",
                    text: "Ha ocurrido un error al generar el reporte",
                    icon: "error",
                    button: "Aceptar"
                });
            }
        });
    }

    function reporte_anual(){
        var year = $('#year').val();

        var valido = 1;
        var mensaje = '';

        if(year == ''){
            valido = 0;
            mensaje += '<li>Debe seleccionar un año</li>';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content:{
                    element: 'div',
                    attributes:{
                        innerHTML: mensaje
                    }
                },
                icon: 'error'
            });
            return false;
        }

        $.ajax({
            url: "{{ route('bodegas.reporte_anual') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                anio: year
            },
            success: function(data) {
                console.log(data);
                $('#contenedor_reporte_anual').html(data.vista);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function generar_reporte_anual(){
        swal({
            title: "Generar reporte",
            text: "¿Está seguro de generar el reporte anual?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((aceptar) => {
            if(aceptar){
                confirmar_generar_reporte_anual();
            }
        })
    }

    function confirmar_generar_reporte_anual(){
        var year = $('#year').val();

        var valido = 1;
        var mensaje = '';

        if(year == ''){
            valido = 0;
            mensaje += '<li>Debe seleccionar un año</li>';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content:{
                    element: 'div',
                    attributes:{
                        innerHTML: mensaje
                    }
                },
                icon: 'error'
            });
            return false;
        }

        $.ajax({
            url: "{{ route('bodegas.generar_reporte') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                anio: year,
                tipo: 'anual'
            },
            success: function(data) {
                console.log(data);
                if(data.ruta){
                    swal({
                        title: "Reporte generado",
                        text: "El reporte se ha generado correctamente",
                        icon: "success",
                        button: "Aceptar"
                    }).then(() => {
                        // Abrir el PDF en una ventana emergente
                        var width = 800;
                        var height = 600;
                        var left = (screen.width - width) / 2;
                        var top = (screen.height - height) / 2;
                        window.open(data.ruta, 'Reporte Anual', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                    });
                }else{
                    swal({
                        title: "Error",
                        text: "Ha ocurrido un error al generar el reporte",
                        icon: "error",
                        button: "Aceptar"
                    });
                }
            },
            error: function(error) {
                console.log(error);
                swal({
                    title: "Error",
                    text: "Ha ocurrido un error al generar el reporte",
                    icon: "error",
                    button: "Aceptar"
                });
            }
        });
    }
</script>
@endsection
