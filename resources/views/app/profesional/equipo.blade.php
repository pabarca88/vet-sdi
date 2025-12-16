@extends('template.profesional.template')
@section('page-styles')
<style>
.ui-autocomplete {
        z-index: 9999999 !important;
        position: absolute;
        background: #fff;
        border: 1px solid #545454;
        padding: 6px;
        text-transform: uppercase;
        cursor: pointer;
    }
</style>
@endsection
@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb mt-2">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">
                                    <a href="#">Mantención de equipo</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 align-botton">
                                        <h4 class="text-white f-20 d-inline ml-4 mt-1 float-left">Equipos de trabajo</h4>
                                        <button type="button"
                                            class="btn btn-outline-light btn-sm d-inline float-right mr-4" onclick="sol_pabellon()">
                                            <i class="feather icon-plus"></i> Crear nuevo equipo
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-12">

                                    <table id="tabla_equipos_trabajo"
                                        class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-wrap text-center align-middle">Nombre</th>
                                                <th class="text-center align-middle">Descripcion</th>

                                                <th class="text-center align-middle">Habilitar</th>
                                                <th class="text-center align-middle">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($equipos as $equipo)
                                            <tr>
                                                <td class="align-middle text-center">{{ $equipo->nombre }}</td>
                                                <td class="align-middle text-center">{{ $equipo->descripcion }}</td>

                                                <td class="align-middle text-center">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox"
                                                            id="examen_{{ $equipo->id }}"
                                                            {{ $equipo->estado == 1 ? 'checked' : '' }}
                                                            onchange="cambiarEstadoEquipo(this, {{ $equipo->id }})">
                                                        <label for="examen_{{ $equipo->id }}" class="cr"></label>
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <button class="btn btn-outline-primary btn-sm btn-icon" onclick="ver_equipo({{ $equipo->id }})"><i class="fas fa-search"></i></button>
                                                    <button class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_equipo({{ $equipo->id }})"><i class="fas fa-trash"></i></button>
                                                    <button class="btn btn-outline-warning btn-sm btn-icon" onclick="editar_equipo({{ $equipo->id }})"><i class="fas fa-edit"></i></button>
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
            </div>
        </div>
    </div>
    <!-- MODALS -->
    <div id="ingreso_sol_pab_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ingreso_sol_pab_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Registro de nuevo equipo quirúrgico - <script>
                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                            var f=new Date();
                            document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                            </script></h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="$('#ingreso_sol_pab_modal').modal('hide')"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <!-- info equipo -->
                        <div class="form-group col-md-5 col-lg-5 col-xl-5">
                            <label class="floating-label-activo-sm">Nombre Equipo</label>
                            <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_nombre_equipo" id="ingreso_sol_pab_modal_nombre_equipo">
                        </div>
                        <div class="form-group col-md-5 col-lg-5 col-xl-5">
                            <label class="floating-label-activo-sm">Descripción Equipo</label>
                            <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_descripcion_equipo" id="ingreso_sol_pab_modal_descripcion_equipo">
                        </div>
                        <div class="form-group col-md-2 col-lg-2 col-xl-2">
                            <button type="button" class="btn btn-info btn-block btn-sm" onclick="crear_nuevo_equipo()"><i class="feather icon-save"></i> Equipo </button>
                        </div>

                        <!-- fromulario -->
                        <div class="form-group col-md-5">
                        <label class="floating-label-activo-sm">Posición </label>
                            <select class="form-control form-control-sm equipo_posicion" name="equipo_posicion_1" id="equipo_posicion_1">
                                <option value="">Seleccione</option>
                                <option value="CIRUJANO">CIRUJANO</option>
                                <option value="AYUDANTE">AYUDANTE</option>
                                <option value="ARSENALERO">ARSENALERO</option>
                                <option value="ANESTESISTA">ANESTESISTA</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                        <label class="floating-label-activo-sm">Profesional </label>
                            <input class="form-control form-control-sm equipo_profesional" type="text" name="equipo_profesional_1" id="equipo_profesional_1">
                            <input class="form-control form-control-sm equipo_profesional" type="hidden" name="equipo_profesional_id_1" id="equipo_profesional_id_1">
                        </div>
                        <div class="form-group col-md-2">
                            <button class="btn btn-xs btn-info btn-block" id="btn_registrar_profesional" onclick="guardar_profesional_equipo();"><i class="fa fa-check" aria-hidden="true"></i> Registrar</button>
                        </div>

                        <!-- formulario de nuevo profesional -->
                        <div class="form-row col-md-12" id="equipo_nuevo" style="display:none">
                        <div class="form-group col-md-12">
                            <span style="color:red; fond-size:10px">Profesional no registrado, Ingrese inforación:</span>
                        </div>

                        <div class="form-group col-md-3">Posición</div>
                        <div class="form-group col-md-3">Nombre</div>
                        <div class="form-group col-md-3">Apellido</div>
                        <div class="form-group col-md-3">Email</div>

                        <div class="form-group col-md-3">
                            <select class="form-control form-control-sm equipo_nuevo_posicion" name="equipo_nuevo_posicion_1" id="equipo_nuevo_posicion_1">
                                <option value="">Seleccione</option>
                                <option value="CIRUJANO">CIRUJANO</option>
                                <option value="AYUDANTE">AYUDANTE</option>
                                <option value="ARSENALERO">ARSENALERO</option>
                                <option value="ANESTESISTA">ANESTESISTA</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control form-control-sm equipo_nuevo_profesional_nombre" type="text" name="equipo_nuevo_profesional_nombre_1" id="equipo_nuevo_profesional_nombre_1">
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control form-control-sm equipo_nuevo_profesional_apellido" type="text" name="equipo_nuevo_profesional_apellido_1" id="equipo_nuevo_profesional_apellido_1">
                        </div>
                        <div class="form-group col-md-3">
                            <input class="form-control form-control-sm equipo_nuevo_profesional_email" type="text" name="equipo_nuevo_profesional_email_1" id="equipo_nuevo_profesional_email_1">
                        </div>
                        </div>

                        <div class="form-row col-md-12" id="lista_equipo_nuevo" style="display:none">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="equipo_pab_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="equipo_pab_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Ver equipo<script>
                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                            var f=new Date();
                            document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                            </script></h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="lista_profesionales_equipo"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" onclick="$('#equipo_pab_modal').modal('hide')"><i class="feather icon-x"></i> Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div id="equipo_pab_modal_editar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="equipo_pab_modal_editar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white mt-1 f-18" id="title_modal"> Modificar equipo<script>
                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                            var f=new Date();
                            document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                            </script></h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close" ><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="tit-gen mb-3">EQUIPO</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card-informacion">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm">Posición </label>
                                            <select class="form-control form-control-sm equipo_posicion" name="equipo_posicion_1_editar" id="equipo_posicion_1_editar">
                                                <option value="">Seleccione</option>
                                                <option value="CIRUJANO">CIRUJANO</option>
                                                <option value="AYUDANTE">AYUDANTE</option>
                                                <option value="ARSENALERO">ARSENALERO</option>
                                                <option value="ANESTESISTA">ANESTESISTA</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="floating-label-activo-sm">Profesional </label>
                                            <input class="form-control form-control-sm equipo_profesional ui-autocomplete-input" type="text" name="equipo_profesional_1_editar" id="equipo_profesional_1_editar" autocomplete="off">
                                            <input class="form-control form-control-sm equipo_profesional" type="hidden" name="equipo_profesional_id_1_editar" id="equipo_profesional_id_1_editar">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="btn btn-xs btn-info btn-block" id="btn_registrar_profesional" onclick="guardar_profesional_equipo_editar();"><i class="fa fa-check" aria-hidden="true"></i> Registrar</button>
                                        </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-row" id="lista_profesionales_editar">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal" ><i class="feather icon-x"></i> Cancelar</button>
                    <button type="button" class="btn btn-sm btn-info" onclick="modificar_equipo();"><i class="feather icon-save" ></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- DATOS DE VITAL IMPORTANCIA -->
    <input type="hidden" name="id_profesional" id="id_profesional" value="{{ $profesional->id }}">
    <input type="hidden" name="id_equipo_modificar" id="id_equipo_modificar" value="">
@endsection

@section('page-script')
<script>
    var tabla;
    $(document).ready(function ()
    {
        tabla = $('#tabla_equipos_trabajo').DataTable({
            createdRow: function(row, data, dataIndex) {
                // Aplicar clases a cada celda
                $('td', row).addClass('align-middle text-center');
            }
        });

        /** autocomplete de tipo cirugia */
        $("#ingreso_sol_pab_modal_operacion").autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('fonasa.buscar.por.nombre.autocomplete') }}",
                    type: 'get',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data.length);
                        if( data.length == 0 )
                        {
                            $('#ingreso_sol_pab_modal_cirugia').val('');
                        }
                        else
                        {
                            $('#ingreso_sol_pab_modal_cirugia').val('');
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                // Set selection
                $('#ingreso_sol_pab_modal_operacion').val(ui.item.label); // display the selected text
                $('#ingreso_sol_pab_modal_cirugia').val(ui.item.codigo); // save selected id to input

                return false;
            }
        });
    });

    function sol_pabellon() {
        $('#ingreso_sol_pab_modal').modal('show');
        cargar_lista_equipos('tabla_equipos_trabajo');
        profesional_autocomplete('equipo_profesional_1', 'equipo_profesional_id_1','equipo_nuevo');
    }

    function cargar_lista_equipos(id_tabla) {
        //let tabla = $('#tabla_equipos_trabajo').DataTable(); // Inicialización

        // Limpiar tabla antes de cargar nuevos datos
        tabla.clear().draw();

        let url = "{{ route('profesional.equipo.ver') }}";

        $.ajax({
            url: url,
            type: "get",
            data: {
                id_profesional: $('#id_profesional').val(),
            },
        })
        .done(function(resp) {
            if (resp.estado == 1) {
                // Recorrer los registros y agregarlos a la tabla
                $.each(resp.registros_, function(index, value) {
                    if(value.estado == 1){
                        var check = 'checked';
                    } else{
                        var check = '';
                    }
                    tabla.row.add([
                        value.nombre,
                        value.descripcion,
                        `<div class="switch switch-success d-inline m-r-10">
                            <input type="checkbox" id="examen_${value.id}" onchange="cambiarEstadoEquipo(this,${value.id})" ${check}>
                            <label for="examen_${value.id}" class="cr"></label>
                        </div>`,
                        `   <button class="btn btn-outline-primary btn-sm btn-icon" type="button" onclick="ver_equipo(${value.id})"><i class="fas fa-search"></i></button>
                            <button class="btn btn-outline-danger btn-sm btn-icon" type="button" onclick="eliminar_equipo(${value.id})"><i class="fas fa-trash"></i></button>
                            <button class="btn btn-outline-warning btn-sm btn-icon" onclick="editar_equipo(${value.id})"><i class="fas fa-edit"></i></button>
                        `
                    ]).draw(false);
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError);
        });
    }


    function crear_nuevo_equipo(){
        let nombre = $('#ingreso_sol_pab_modal_nombre_equipo').val();
        let descripcion = $('#ingreso_sol_pab_modal_descripcion_equipo').val();
        let url = "{{ ROUTE('profesional.equipo.crear') }}";

        let valido = 1;
        let mensaje = '';

        if(nombre == ''){
            valido = 0;
            mensaje += '<li>Nombre del equipo</li>';
        }
        if(descripcion == ''){
            valido = 0;
            mensaje += '<li>Descripción</li>';
        }

        if(lista_profesionales_eq_nuevo.length == 0){
            valido = 0;
            mensaje += '<li>Profesionales</li>';
        }

        if(valido == 0){
            swal({
                title:'Error',
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje
                    },
                },
                icon:'error'
            });

            return;
        }

        let data = {
            nombre: nombre,
            descripcion: descripcion,
            id_profesional: $('#id_profesional').val(),
            profesionales: lista_profesionales_eq_nuevo,
            _token: CSRF_TOKEN,
        }

        console.log(data);

        $.ajax({
            type:'post',
            url: url,
            data:data,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 1){
                    swal({
                        icon:'success',
                        title:'Exito',
                        text:'Equipo creado, ahora debe seleccionarlo',
                    });
                    $('#ingreso_sol_pab_modal').modal('hide');
                    $('#ingreso_sol_pab_modal_lista_profesionales').val('');
                    $('.lista_profesionales').html('');
                    cargar_lista_equipos('tabla_equipos_trabajo');
                    limpiar('lista_profesionales');
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

    function modificar_equipo(){
        let url = "{{ ROUTE('profesional.equipo.modificar') }}";
        let id_equipo_modificar = $('#id_equipo_modificar').val();
        let valido = 1;
        let mensaje = '';

        if(lista_profesionales_eq.length == 0){
            valido = 0;
            mensaje += '<li>Profesionales</li>';
        }

        if(valido == 0){
            swal({
                title:'Error',
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje
                    },
                },
                icon:'error'
            });

            return;
        }

        let data = {
            id_equipo_modificar: id_equipo_modificar,
            id_profesional: $('#id_profesional').val(),
            profesionales: lista_profesionales_eq,
            _token: CSRF_TOKEN,
        }

        console.log(data);

        $.ajax({
            type:'get',
            url: url,
            data:data,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 1){
                    swal({
                        icon:'success',
                        title:'Exito',
                        text:'Equipo creado, ahora debe seleccionarlo',
                    });
                    $('#equipo_pab_modal_editar').modal('hide');
                    $('#ingreso_sol_pab_modal_lista_profesionales').val('');
                    $('.lista_profesionales').html('');
                    cargar_lista_equipos('tabla_equipos_trabajo');
                    limpiar('lista_profesionales');
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

    function limpiar(div_destino){
        $('.'+div_destino).html('');
        $('#ingreso_sol_pab_modal_lista_profesionales').val('');
        $('#lista_profesionales').val('');
    }

    function profesional_autocomplete(select, input_id, div_nuevo)
    {
        console.log(select);
        $("#"+select).autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('profesional.buscar.por.nombre.autocomplete') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);
                        $('#'+div_nuevo).hide();
                        $('#'+input_id).val('')
                        $('#equipo_nuevo_posicion_1').val('');
                        $('#equipo_nuevo_profesional_nombre_1').val('');
                        $('#equipo_nuevo_profesional_apellido_1').val('');
                        $('#equipo_nuevo_profesional_email_1').val('');
                        if(data.length == 0 && request.term.length>0)
                        {
                            $('#'+div_nuevo).show();
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                // Set selection
                $('#'+select).val(ui.item.label); // display the selected text
                $('#'+input_id).val(ui.item.value); // save selected id to input
                return false;
            }
        });
    }

    function eliminar_equipo(id){
        swal({
            title: "¿Esta seguro que desea ELIMINAR el equipo?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Solicitar"],
            dangerMode: true,
        }).then((willDelete) => {
            if(willDelete){
                confirmar_eliminar_equipo(id);
            }
        });
    }

    function confirmar_eliminar_equipo(id){
        let url = "{{ ROUTE('profesional.equipo.eliminar') }}";
        let data = {
            id: id,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            data: data,
            url: url,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 1){
                    swal({
                        title:'Exito',
                        text:'Se ha eliminado el equipo',
                        icon:'success'
                    });
                    cargar_lista_equipos('tabla_equipos_trabajo');
                }else{
                    swal({
                        title:'Error',
                        text:'Ha ocurrido un problema',
                        icon:'error'
                    });
                }

            },
            error: function(error){
                console.log(error);
            }
        })
    }
    var lista_profesionales_eq = [];
    var lista_profesionales_eq_nuevo = [];

    function ver_equipo(id, tipo = null){
        console.log(id);


        if(tipo){
            $('#equipo_pab_modal_editar').modal('show');
            var div_destino = 'lista_profesionales_editar';
            profesional_autocomplete('equipo_profesional_1_editar', 'equipo_profesional_id_1_editar','equipo_nuevo');
        }else{
            $('#equipo_pab_modal').modal('show');
            var div_destino = 'lista_profesionales_equipo';
        }

        $('#lista_profesionales').val('');
        $('#lista_profesionales_editar').val('');
        $('#'+div_destino).empty('');

            let url = "{{ route('profesional.equipo.ver.profesional') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_profesional_mi_equipo: id,
                },
            })
            .done(function(resp) {
                console.log(resp);

                if (resp.estado == 1)
                {

                    var lista_id_profesionales = '';
                    $.each(resp.registros, function(index, value)
                    {
                        html = '';
                        html += '<div class="form-group col-md-6 col-lg-6 col-xl-6">';
                        html += '    <label class="floating-label-activo-sm">'+value.posicion+'</label>';
                        html += '    <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_'+index+'" id="ingreso_sol_pab_modal_'+index+'" value="'+value.profesional.nombre+' '+value.profesional.apellido_uno+'">';
                        html += '</div>';
                        if(tipo){
                        html += '<div class="form-group col-md-1 col-lg-1 col-xl-1" >';
                        html += '<button type="button" class="btn btn-xs btn-danger has-ripple aling-right" style="" onclick="eliminar_nuevo_profesional_editar('+index+')"><i class="feather icon-x" aria-hidden="true"></i><span class="ripple ripple-animate"></span></button>';
                        html += '</div>';
                        }

                    var temp_profesional = {
                        tipo: 'existente',
                        posicion: value.posicion,
                        profesional_nombre: value.profesional.nombre+' '+value.profesional.apellido_uno,
                        profesional_apellido: '',
                        profesional_email: '',
                        profesional_id: value.profesional.id,
                    }
                        if(tipo){
                            lista_profesionales_eq.push(temp_profesional);
                        }

                        lista_id_profesionales += value.id_tipo_especialidad+','+value.id_sub_tipo_especialidad+','+value.posicion+','+value.id_profesional+'|';
                        $('#ingreso_sol_pab_modal_lista_profesionales').val(lista_id_profesionales);
                        $('#'+div_destino).append(html);
                    });

                }
                else
                {
                    $('#'+div_destino).append('<h5>Sin registro de equipo</h5>');
                    $('#ingreso_sol_pab_modal_lista_profesionales').val('');
                }
                console.log(lista_profesionales_eq);
                console.log(lista_profesionales_eq_nuevo);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }


    function guardar_profesional_equipo()
    {
        if($('#equipo_profesional_id_1').val() != '')
        {
            var posicion_profesional = $('#equipo_posicion_1').val();
            var nombre_profesional = $('#equipo_profesional_1').val();
            var id_profesional = $('#equipo_profesional_id_1').val();

            var temp_profesional = {
                    tipo: 'existente',
                    posicion: posicion_profesional,
                    profesional_nombre: nombre_profesional,
                    profesional_apellido: '',
                    profesional_email: '',
                    profesional_id: id_profesional,
                }

            lista_profesionales_eq_nuevo.push(temp_profesional);
            mostrar_tabla_nuevos_profesionales();
            $('#equipo_posicion_1').val('');
            $('#equipo_profesional_1').val('');
            $('#equipo_profesional_id_1').val('');
        }
        else
        {
            var nuevo_posicion = $('#equipo_nuevo_posicion_1').val();
            var nuevo_profesional_nombre = $('#equipo_nuevo_profesional_nombre_1').val();
            var nuevo_profesional_apellido = $('#equipo_nuevo_profesional_apellido_1').val();
            var nuevo_profesional_email = $('#equipo_nuevo_profesional_email_1').val();
            var mensaje = '';
            var valido = 1;
            if(nuevo_posicion == '')
            {
                mensaje += 'Posicion - Campo requerido\n';
                $('#equipo_nuevo_posicion_1').focus();
                valido = 0;
            }
            if(nuevo_profesional_nombre == '')
            {
                mensaje += 'Nombre Profesional - Campo requerido\n';
                $('#equipo_nuevo_profesional_nombre_1').focus();
                valido = 0;
            }
            if(nuevo_profesional_apellido == '')
            {
                mensaje += 'Apellido Profesional - Campo requerido\n';
                $('#equipo_nuevo_profesional_apellido_1').focus();
                valido = 0;
            }
            if(nuevo_profesional_email == '')
            {
                mensaje += 'Email profesional - Campo requerido\n';
                $('#equipo_nuevo_profesional_email_1').focus();
                valido = 0;
            }
            if(valido == 1)
            {
                var temp_profesional = {
                    tipo: 'nuevo',
                    posicion: nuevo_posicion,
                    profesional_nombre: nuevo_profesional_nombre,
                    profesional_apellido: nuevo_profesional_apellido,
                    profesional_email: nuevo_profesional_email,
                }

                lista_profesionales_eq_nuevo.push(temp_profesional);

                mostrar_tabla_nuevos_profesionales();

                $('#equipo_nuevo_posicion_1').val('');
                $('#equipo_nuevo_profesional_nombre_1').val('');
                $('#equipo_nuevo_profesional_apellido_1').val('');
                $('#equipo_nuevo_profesional_email_1').val('');
            }
            else
            {
                swal({
					title: "Registro de Equipo.",
					text: mensaje,
					icon: "error",
				});
            }
        }
    }

    function guardar_profesional_equipo_editar()
    {
        if($('#equipo_profesional_id_1_editar').val() != '')
        {
            var posicion_profesional = $('#equipo_posicion_1_editar').val();
            var nombre_profesional = $('#equipo_profesional_1_editar').val();
            var id_profesional = $('#equipo_profesional_id_1_editar').val();

            var temp_profesional = {
                    tipo: 'existente',
                    posicion: posicion_profesional,
                    profesional_nombre: nombre_profesional,
                    profesional_apellido: '',
                    profesional_email: '',
                    profesional_id: id_profesional,
                }

            lista_profesionales_eq.push(temp_profesional);
            console.log(lista_profesionales_eq);
            mostrar_tabla_nuevos_profesionales_editar();
            $('#equipo_posicion_1_editar').val('');
            $('#equipo_profesional_1_editar').val('');
            $('#equipo_profesional_id_1_editar').val('');
        }
        // else
        // {
        //     var nuevo_posicion = $('#equipo_nuevo_posicion_1').val();
        //     var nuevo_profesional_nombre = $('#equipo_nuevo_profesional_nombre_1').val();
        //     var nuevo_profesional_apellido = $('#equipo_nuevo_profesional_apellido_1').val();
        //     var nuevo_profesional_email = $('#equipo_nuevo_profesional_email_1').val();
        //     var mensaje = '';
        //     var valido = 1;
        //     if(nuevo_posicion == '')
        //     {
        //         mensaje += 'Posicion - Campo requerido\n';
        //         $('#equipo_nuevo_posicion_1').focus();
        //         valido = 0;
        //     }
        //     if(nuevo_profesional_nombre == '')
        //     {
        //         mensaje += 'Nombre Profesional - Campo requerido\n';
        //         $('#equipo_nuevo_profesional_nombre_1').focus();
        //         valido = 0;
        //     }
        //     if(nuevo_profesional_apellido == '')
        //     {
        //         mensaje += 'Apellido Profesional - Campo requerido\n';
        //         $('#equipo_nuevo_profesional_apellido_1').focus();
        //         valido = 0;
        //     }
        //     if(nuevo_profesional_email == '')
        //     {
        //         mensaje += 'Email profesional - Campo requerido\n';
        //         $('#equipo_nuevo_profesional_email_1').focus();
        //         valido = 0;
        //     }
        //     if(valido == 1)
        //     {
        //         var temp_profesional = {
        //             tipo: 'nuevo',
        //             posicion: nuevo_posicion,
        //             profesional_nombre: nuevo_profesional_nombre,
        //             profesional_apellido: nuevo_profesional_apellido,
        //             profesional_email: nuevo_profesional_email,
        //         }

        //         lista_profesionales_eq_nuevo.push(temp_profesional);

        //         mostrar_tabla_nuevos_profesionales();

        //         $('#equipo_nuevo_posicion_1').val('');
        //         $('#equipo_nuevo_profesional_nombre_1').val('');
        //         $('#equipo_nuevo_profesional_apellido_1').val('');
        //         $('#equipo_nuevo_profesional_email_1').val('');
        //     }
        //     else
        //     {
        //         swal({
		// 			title: "Registro de Equipo.",
		// 			text: mensaje,
		// 			icon: "error",
		// 		});
        //     }
        // }
    }

    function eliminar_nuevo_profesional(index)
    {
        lista_profesionales_eq_nuevo.splice(index, 1);
        mostrar_tabla_nuevos_profesionales()
    }

    function eliminar_nuevo_profesional_editar(index)
    {
        console.log(lista_profesionales_eq);
        lista_profesionales_eq.splice(index, 1);
        console.log(lista_profesionales_eq);
        mostrar_tabla_nuevos_profesionales_editar()
    }

    function mostrar_tabla_nuevos_profesionales()
    {
        $('#lista_equipo_nuevo').hide();
        $('#ingreso_sol_pab_modal_lista_profesionales').val('');
        var html = '';
        $('#lista_equipo_nuevo').html(html);
        if(lista_profesionales_eq_nuevo.length>0)
        {
            $('#lista_equipo_nuevo').show();
            $.each(lista_profesionales_eq_nuevo, function (index, value)
            {
                var lista_id_profesionales = '';
                html = '';
                html += '<div class="form-group col-md-5 col-lg-5 col-xl-5" >';
                html += '    <label class="floating-label-activo-sm">'+value.posicion+'</label>';
                html += '    <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_'+index+'" id="ingreso_sol_pab_modal_'+index+'" value="'+value.profesional_nombre+' '+value.profesional_apellido+'" />';
                html += '</div>';
                html += '<div class="form-group col-md-1 col-lg-1 col-xl-1" >';
                html += '<button type="button" class="btn btn-xs btn-danger has-ripple aling-right" style="" onclick="eliminar_nuevo_profesional('+index+')"><i class="feather icon-x" aria-hidden="true"></i><span class="ripple ripple-animate"></span></button>';
                html += '</div>';
                $('#lista_equipo_nuevo').append(html);
                lista_id_profesionales += value.id_tipo_especialidad+','+value.id_sub_tipo_especialidad+','+value.posicion+','+value.id_profesional+'|';
                $('#ingreso_sol_pab_modal_lista_profesionales').val(lista_id_profesionales);
            });
        }
    }

    function mostrar_tabla_nuevos_profesionales_editar()
    {

        $('#ingreso_sol_pab_modal_lista_profesionales').val('');
        var html = '';
        $('#lista_profesionales_editar').html(html);
        if(lista_profesionales_eq.length>0)
        {
            $.each(lista_profesionales_eq, function (index, value)
            {
                var lista_id_profesionales = '';
                html = '';
                html += '<div class="form-group col-md-5 col-lg-5 col-xl-5" >';
                html += '    <label class="floating-label-activo-sm">'+value.posicion+'</label>';
                html += '    <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_'+index+'" id="ingreso_sol_pab_modal_'+index+'" value="'+value.profesional_nombre+' '+value.profesional_apellido+'" />';
                html += '</div>';
                html += '<div class="form-group col-md-1 col-lg-1 col-xl-1" >';
                html += '<button type="button" class="btn btn-xs btn-danger has-ripple aling-right" style="" onclick="eliminar_nuevo_profesional_editar('+index+')"><i class="feather icon-x" aria-hidden="true"></i><span class="ripple ripple-animate"></span></button>';
                html += '</div>';
                $('#lista_profesionales_editar').append(html);
                lista_id_profesionales += value.id_tipo_especialidad+','+value.id_sub_tipo_especialidad+','+value.posicion+','+value.id_profesional+'|';
                $('#ingreso_sol_pab_modal_lista_profesionales').val(lista_id_profesionales);
            });
        }
    }

    function editar_equipo(id){
        $('#id_equipo_modificar').val(id);
        ver_equipo(id,'editar');
    }

    function cargar_mi_equipo(id)
    {
        lista_profesionales_eq_nuevo = [];
        $('#ingreso_sol_pab_modal_lista_profesionales').val('');
        var div_destino = 'lista_profesionales_editar';
        var html = '';
        $('#'+div_destino).empty();


        let url = "{{ route('profesional.equipo.ver.profesional') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                id_profesional_mi_equipo: id,
            },
        })
        .done(function(resp) {
            console.log(resp);

            if (resp.estado == 1)
            {
                var lista_id_profesionales = '';
                $.each(resp.registros, function(index, value)
                {
                    html = '';
                    html += '<div class="form-group col-md-6 col-lg-6 col-xl-6">';
                    html += '    <label class="floating-label-activo-sm">'+value.posicion+'</label>';
                    html += '    <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_'+index+'" id="ingreso_sol_pab_modal_'+index+'" value="'+value.profesional.nombre+' '+value.profesional.apellido_uno+'">';
                    html += '</div>';
                    lista_id_profesionales += value.id_tipo_especialidad+','+value.id_sub_tipo_especialidad+','+value.posicion+','+value.id_profesional+'|';
                    $('#ingreso_sol_pab_modal_lista_profesionales').val(lista_id_profesionales);
                    $('#'+div_destino).append(html);
                });

            }
            else
            {
                $('#'+div_destino).append('<h5>Sin registro de equipo</h5>');
                $('#ingreso_sol_pab_modal_lista_profesionales').val('');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function cambiarEstadoEquipo(checkbox, id) {
        const habilitado = checkbox.checked ? 1 : 0;

        $.ajax({
            url: "{{ route('profesional.equipo.cambiar_estado') }}",
            method: "get",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                habilitado: habilitado
            },
            success: function (response) {
                console.log(response);
                if(response.estado == 1){
                    swal({
                        icon:'success',
                        title:'Exito',
                        text:'Se ha cambiado el estado'
                    });
                }else{
                    swal({
                        icon:'error',
                        title:'Error',
                        text:'Ha ocurrido un error'
                    });
                }
            },
            error: function () {
                console.error('Ocurrió un error al actualizar el estado');
                checkbox.checked = !checkbox.checked; // Revertir cambio si falla
            }
        });
    }

</script>
@endsection
