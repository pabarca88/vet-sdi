@extends('template.adm_cm.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Personal del Centro</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('institucion.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('institucion.home') }}">Personal</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!--Card Nav Pills-->
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="asistentes-tab" data-toggle="tab" href="#asistentes" role="tab" aria-controls="asistentes" aria-selected="false">Asistentes</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="administrativos-tab" data-toggle="tab" href="#administrativos" role="tab" aria-controls="administrativos" aria-selected="false">Personal administrativo</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="limpieza-mantencion-tab" data-toggle="tab" href="#limpieza-mantencion" role="tab" aria-controls="limpieza-mantencion" aria-selected="false">Limpieza y Mantención</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!--Cierre: Card Nav Pills-->
                <div class="tab-content" id="personal_cm">
                    <!--Tab asistentes-->
                    <div class="tab-pane fade active show" id="asistentes" role="tabpanel" aria-labelledby="asistentes-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Asistentes</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        @if(!$adm_medico)
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_personal();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo/a asistente</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        @endif
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="Asociar_personal();">Asociar asistente</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="asistentes_personal" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre / Rut</th>
                                                    <th class="text-center align-middle">Tipo</th>
                                                    <th class="text-center align-middle">Sucursales</th>
                                                    <th class="text-center align-middle">Contacto</th>
													<th class="text-center align-middle">Datos</th>
                                                    <th class="text-center align-middle">Rol y permisos</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($lista_asistente)
                                                    @foreach ( $lista_asistente as $asistente)
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <span><strong>{{ $asistente->nombres.' '.$asistente->apellido_uno.' '.$asistente->apellido_dos }}</strong></span><br>
                                                            <span>{{ $asistente->rut }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span><strong>{{ $asistente->asistente_tipo->nombre }}</strong></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            {{ $asistente->direccion()->first()->direccion }} #{{ $asistente->direccion()->first()->numero_dir }}, {{ $asistente->direccion()->first()->ciudad()->first()->nombre }}
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto('asistente publico',{{ $asistente->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="datos_depositos('asistente publico',{{ $asistente->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_profesional_cm('{{ $asistente->asistente_tipo->nombre }}',{{ $asistente->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="roles_permisos({{ $asistente->asistente_tipo->id }}, {{ $asistente->id_usuario }}, '{{ $asistente->roles }}');" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm" onclick="editar_datos_asistente({{ $asistente->id }});"><i class="feather icon-edit"></i> Editar</button>
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="modal_desactivar_asistente({{ $asistente->id}}, {{ $asistente->contrato->id }}, '{{ $asistente->nombres.' '.$asistente->apellido_uno.' '.$asistente->apellido_dos }}');"><i class="feather icon-x-circle"></i> Desasociar</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!--Cierre: Tab asistentes-->

                    <!--Tab personal administrativo-->
                    <div class="tab-pane fade" id="administrativos" role="tabpanel" aria-labelledby="administrativos-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Personal administrativo</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_administrativo();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo/a personal administrativo</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="Asociar_personal();">Asociar personal administrativo</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="administrativo_personal" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre / Rut</th>
                                                    <th class="text-center align-middle">Sucursales</th>
                                                    <th class="text-center align-middle">Contacto</th>
													<th class="text-center align-middle">Datos</th>
                                                    <th class="text-center align-middle">Rol y permisos</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Tab personal administrativo-->

                    <!--Tab personal limpieza y mantencion-->
                    <div class="tab-pane fade" id="limpieza-mantencion" role="tabpanel" aria-labelledby="limpieza-mantencion-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Limpieza y mantención</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_limpieza_mantencion();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo/a personal de limpieza y mantencion</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="Asociar_personal();">Asociar personal de limpieza y mantencion</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="limpieza_mantencion_personal" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre / Rut</th>
                                                    <th class="text-center align-middle">Sucursales</th>
                                                    <th class="text-center align-middle">Contacto</th>
													<th class="text-center align-middle">Datos</th>
                                                    <th class="text-center align-middle">Rol y permisos</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Tab personal limpieza y mantencion-->
                </div>
                <!--Cierre: Pills-->
            </div>
        </div>
    </div>
</div>
<!--****Cierre Container Completo****-->

@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            {{--  FORMATEO DE RUT AGREGAR NUEVO PROFESIONAL   --}}
            $("#agregar_profesional_int_rut").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });

            $(".js-example-basic-multiple").select2();

        })


        {{--  BUSQUEDA EN EL MODAL DE ASOCIAR NUEVO PROFESIONAL  --}}
        function buscar_profesional(){

            let id_lugar_atencion = $('#agregar_profesional_int_id_lugar_atencion').val();

            if(id_lugar_atencion == '')
            {
                swal({
                    title: "Debe seleccionar una sucursal",
                    icon: "error",
                });
                return false;
            }

            $('#agregar_profesional_btn_buscar_rut').attr('disabled', 'disabled');
            var rut = $('#agregar_profesional_int_rut').val();
            if(rut == ''){
                swal({
                    title: "Debe ingresar un RUT",
                    icon: "error",
                });
                return false;
            }
            if(!$.validateRut(rut))
            {
                swal({
                    title: "Debe ingresar un RUT valido",
                    icon: "error",
                });
                return false;
            }

            {{--  busqueda  --}}
            let profesional_inter = $('#profesional_inter');
            profesional_inter.find('option').remove();

            let url = "{{ route('profesional.buscador') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    rut: rut
                },
            })
            .done(function(data) {
                if (data.estado == 1)
                {
                    /** encontrado */
                    $('#agregar_profesional_texto_ver_nombre_profesional').html(data.registros[0].profesionales_nombre+' '+data.registros[0].profesionales_apellido_uno+' '+data.registros[0].profesionales_apellido_dos);
                    $('#agregar_profesional_texto_ver_telefono').html(data.registros[0].profesional_telefono_uno);
                    $('#agregar_profesional_texto_ver_email').html(data.registros[0].profesional_email);
                    $('#agregar_profesional_ver_nombre_profesional').val(data.registros[0].profesionales_nombre+' '+data.registros[0].profesionales_apellido_uno+' '+data.registros[0].profesionales_apellido_dos);
                    $('#agregar_profesional_ver_telefono').val(data.registros[0].profesional_telefono_uno);
                    $('#agregar_profesional_ver_email').val(data.registros[0].profesional_email);

                    $('#div_agregar_profesional_busqueda').hide();
                    $('#div_agregar_profesional_ver_info_prof').show();
                    $('#div_agregar_profesional_formulario_nuevo_prof').hide();
                }
                else
                {
                    /** no encontrado */
                    /** REALIZAR BUSQUEDA TABLA DE PROFESIONALES EXISTENTES EXTERNOS (POR HACER) */
                    let url = "{{ route('personas.buscador') }}";
                    $.ajax({
                        url: url,
                        type: "get",
                        data: {
                            rut: rut
                        },
                    })
                    .done(function(data2) {
                        if (data2.estado == 1)
                        {
                            /** encontrado */
                            $('#agregar_profesional_nuevo_apellido_p').val( data2.registros.appaterno );
                            $('#agregar_profesional_nuevo_apellido_m').val( data2.registros.apmaterno );
                            $('#agregar_profesional_nuevo_telefono').val( '' );
                            $('#agregar_profesional_nuevo_email').val( '' );

                            $('#div_agregar_profesional_busqueda').hide();
                            $('#div_agregar_profesional_ver_info_prof').hide();
                            $('#div_agregar_profesional_formulario_nuevo_prof').show();
                        }
                        else
                        {
                            /** no encontrado */
                            $('#agregar_profesional_nuevo_nombre').val();
                            $('#agregar_profesional_nuevo_apellido_p').val();
                            $('#agregar_profesional_nuevo_apellido_m').val();
                            $('#agregar_profesional_nuevo_telefono').val();
                            $('#agregar_profesional_nuevo_email').val();

                            $('#div_agregar_profesional_busqueda').hide();
                            $('#div_agregar_profesional_ver_info_prof').hide();
                            $('#div_agregar_profesional_formulario_nuevo_prof').show();

                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function regresar_a_busqueda()
        {
            $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
            $('#agregar_profesional_int_rut').val('');

            $('#div_agregar_profesional_busqueda').show();
            $('#div_agregar_profesional_ver_info_prof').hide();
            $('#div_agregar_profesional_formulario_nuevo_prof').hide();

            $('#agregar_profesional_id_profesional').val('');
            $('#agregar_profesional_texto_ver_nombre_profesional').html('');
            $('#agregar_profesional_texto_ver_telefono').html('');
            $('#agregar_profesional_texto_ver_email').html('');
            $('#agregar_profesional_ver_nombre_profesional').val('');
            $('#agregar_profesional_ver_telefono').val('');
            $('#agregar_profesional_ver_email').val('');

            $('#agregar_profesional_nuevo_nombre').val('');
            $('#agregar_profesional_nuevo_apellido_p').val('');
            $('#agregar_profesional_nuevo_apellido_m').val('');
            $('#agregar_profesional_nuevo_telefono').val('');
            $('#agregar_profesional_nuevo_email').val('');
        }

        function asociar_profesional_existente()
        {
            let id_lugar_atencion = $('#agregar_profesional_int_id_lugar_atencion').val();
            let id_profesional = $('#agregar_profesional_id_profesional').val();
            let url = "{{ route('laboratorio.asociar_profesional_existente')}}";

            $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: CSRF_TOKEN,
                    id_lugar_atencion: id_lugar_atencion,
                    id_profesional: id_profesional,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {

                    swal({
                        title: "Invitación al Profesional Realizada con Exito.",
                        text: "Profesional pendiente por confirmar.",
                        icon: "success",
                    });

                    $('#asociar_profesional_cm').modal('hide');

                    $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
                    $('#agregar_profesional_int_rut').val('');

                    $('#div_agregar_profesional_busqueda').show();
                    $('#div_agregar_profesional_ver_info_prof').hide();
                    $('#div_agregar_profesional_formulario_nuevo_prof').hide();

                    $('#agregar_profesional_id_profesional').val('');
                    $('#agregar_profesional_texto_ver_nombre_profesional').html('');
                    $('#agregar_profesional_texto_ver_telefono').html('');
                    $('#agregar_profesional_texto_ver_email').html('');
                    $('#agregar_profesional_ver_nombre_profesional').val('');
                    $('#agregar_profesional_ver_telefono').val('');
                    $('#agregar_profesional_ver_email').val('');

                    $('#agregar_profesional_nuevo_nombre').val('');
                    $('#agregar_profesional_nuevo_apellido_p').val('');
                    $('#agregar_profesional_nuevo_apellido_m').val('');
                    $('#agregar_profesional_nuevo_telefono').val('');
                    $('#agregar_profesional_nuevo_email').val('');
                }
                else
                {
                    swal({
                        title: "Invitación al Profesional Fallida.",
                        text: "Profesional pendiente por confirmar.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function asociar_nuevo_profesional()
        {
            let id_lugar_atencion = $('#agregar_profesional_int_id_lugar_atencion').val();
            let nombre = $('#agregar_profesional_nuevo_nombre').val();
            let apellido_p = $('#agregar_profesional_nuevo_apellido_p').val();
            let apellido_m = $('#agregar_profesional_nuevo_apellido_m').val();
            let telefono = $('#agregar_profesional_nuevo_telefono').val();
            let email = $('#agregar_profesional_nuevo_email').val();
            let url = "{{ route('adm_cm.asociar_profesional_nuevo')}}";

            $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: CSRF_TOKEN,
                    id_lugar_atencion: id_lugar_atencion,
                    nombre: nombre,
                    apellido_uno: apellido_p,
                    apellido_dos: apellido_m,
                    telefono: telefono,
                    email: email,
                },
            })
            .done(function(data) {
                if (data.estado == 1)
                {

                    swal({
                        title: "Invitación al Profesional Realizada con Exito.",
                        text: "Profesional pendiente por confirmar.",
                        icon: "success",
                    });

                    $('#asociar_profesional_cm').modal('hide');

                    $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
                    $('#agregar_profesional_int_rut').val('');

                    $('#div_agregar_profesional_busqueda').show();
                    $('#div_agregar_profesional_ver_info_prof').hide();
                    $('#div_agregar_profesional_formulario_nuevo_prof').hide();

                    $('#agregar_profesional_id_profesional').val('');
                    $('#agregar_profesional_texto_ver_nombre_profesional').html('');
                    $('#agregar_profesional_texto_ver_telefono').html('');
                    $('#agregar_profesional_texto_ver_email').html('');
                    $('#agregar_profesional_ver_nombre_profesional').val('');
                    $('#agregar_profesional_ver_telefono').val('');
                    $('#agregar_profesional_ver_email').val('');

                    $('#agregar_profesional_nuevo_nombre').val('');
                    $('#agregar_profesional_nuevo_apellido_p').val('');
                    $('#agregar_profesional_nuevo_apellido_m').val('');
                    $('#agregar_profesional_nuevo_telefono').val('');
                    $('#agregar_profesional_nuevo_email').val('');
                }
                else
                {
                    swal({
                        title: "Invitación al Profesional Fallida.",
                        text: "Profesional pendiente por confirmar.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function cargar_tabla_asistentes()
        {
            $('#asistentes_personal tbody').html('');
            $('#asistentes_personal').DataTable().clear();
            $('#asistentes_personal').DataTable().destroy();

            let url = "{{ route('adm_cm.personal.asistente') }}";
            $.ajax({
                url: url,
                type: "GET",
                data: {},
            })
            .done(function(data) {
                if (data != null) {
                    if(data.estado == 1)
                    {
                        $.each(data.registro, function (indexInArray, valueOfElement) {
                            html = '';
                            html += '<tr>';
                            html += '    <td class="align-middle text-center">';
                            html += '        <span><strong>'+valueOfElement.nombres+' '+valueOfElement.apellido_uno+' '+valueOfElement.apellido_dos+'</strong></span><br>';
                            html += '        <span>'+valueOfElement.rut+'</span>';
                            html += '    </td>';
                            html += '    <td class="align-middle text-center">';
                            html += '        <span><strong>'+valueOfElement.asistente_tipo.nombre+'</strong></span>';
                            html += '    </td>';
                            html += '    <td class="align-middle text-center">';
                            html += '        '+valueOfElement.direccion+' #'+valueOfElement.numero_dir+', '+valueOfElement.ciudad+'';
                            html += '    </td>';
                            html += '    <td class="align-middle text-center">';
                            html += '        <!--Botón Modal-->';
                            html += '        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto(\'asistente publico\','+valueOfElement.id+');" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>';
                            html += '    </td>';
                            html += '    <td class="align-middle text-center">';
                            html += '        <!--Botón Modal-->';
                            html += '        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="datos_depositos(\'asistente publico\', '+valueOfElement.id_usuario+');" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>';
                            html += '        <!--Botón Modal-->';
                            html += '        <button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_profesional_cm(\''+valueOfElement.asistente_tipo.nombre+'\','+valueOfElement.id+', '+valueOfElement.institucion.id_lugar_atencion+');" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>';
                            html += '    </td>';
                            html += '    <td class="align-middle text-center">';
                            html += '        <!--Botón Modal-->';
                            html += '        <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="roles_permisos('+valueOfElement.asistente_tipo.id+', '+valueOfElement.id_usuario+', \''+valueOfElement.roles+'\');" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>';
                            html += '    </td>';
                            html += '    <td class="align-middle text-center">';
                            html += '        <button type="button" class="btn btn-success btn-sm" onclick="editar_datos_asistente('+valueOfElement.id+');"><i class="feather icon-edit"></i> Editar</button>';
                            html += '        <button type="button" class="btn btn-danger btn-sm"><i class="feather icon-x-circle"></i> Desasociar</button>';
                            html += '    </td>';
                            html += '</tr>';

                            $('#asistentes_personal tbody').append(html);

                        });

                        $('#asistentes_personal').DataTable().destroy();
                        $('#asistentes_personal').DataTable({
                            responsive: true,
                        });
                    }
                    else
                    {
                        var mensaje = '';
                        if(data.error)
                        {
                            $.each(data.error, function (indexInArray, valueOfElement)
                            {
                                mensaje += valueOfElement+'\n';
                            });
                        }
                        else
                        {
                            mensaje += 'Intente nuevamente.';
                        }

                        swal({
                            title: "Carga de Personal Asistentes",
                            text: mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar personal",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

    </script>
@endsection

@section('modales')
    @include('app.adm_cm.modales.personal.registrar_personal')
    @include('app.adm_cm.modales.personal.contacto_personal')
    @include('app.adm_cm.modales.personal.datos_banco')
    @include('app.adm_cm.modales.personal.horario_personal')
    @include('app.adm_cm.modales.personal.permisos_rol')
    @include('app.adm_cm.modales.personal.editar_personal')

    @include('app.adm_cm.modales.personal.finalizar_personal')


    {{-- @include('app.adm_cm.modal_adm.asociar_profesional') --}}
    @include('app.adm_cm.modales.personal.asociar_personal')

@endsection
