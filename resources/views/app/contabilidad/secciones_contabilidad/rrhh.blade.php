@extends('template.adm_cm.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Escritorio Contabilidad/RRHH</h5>
                        </div>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.area_contabilidad') }}">Escritorio Contabilidad</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="col-md-12">
            <!--Card Nav Pills-->
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-white" id="rrhh_cm" role="tablist">
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="pills-prof_salud-tab" data-toggle="tab" href="#pills-prof-salud" role="tab" aria-controls="pills-prof_salud" aria-selected="false">Profesionales de la salud</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="administrativos-tab" data-toggle="tab" href="#administrativos" role="tab" aria-controls="administrativos" aria-selected="false">Personal administrativo</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="limpieza-mantencion-tab" data-toggle="tab" href="#limpieza-mantencion" role="tab" aria-controls="limpieza-mantencion" aria-selected="false">Limpieza y Mantención</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-asistentes-tab" data-toggle="tab" href="#pills-asistentes" role="tab" aria-controls="pills-asistentes" aria-selected="false">Asistentes/Personal</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-limpieza-mantencion-tab" data-toggle="tab" href="#pills-limpieza-mantencion" role="tab" aria-controls="pills-limpieza-mantencion" aria-selected="false">Limpieza y Mantención</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <!--Cierre: Card Nav Pills-->
            <div class="tab-content" id="rrhh_cm">

                <!--Tab Profesionales de la salud-->
                <div class="tab-pane fade show active"id="pills-prof-salud" role="tabpanel" aria-labelledby="pills-prof-salud-tab">
                    <div class="row mb-n10">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="text-white f-20 mt-2 mb-2 float-left">Personal Contratado del Centro</h4>
                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="tab_profesionales_cont_centroc" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Nombre / Rut</th>
                                                <th class="text-center align-middle">Profesion</th>
                                                <th class="text-center align-middle">Tipo de Contrato/Fecha contrato</th>
                                                <th class="text-center align-middle">Contacto/cuenta</th>
                                                <th class="text-center align-middle">Remuneración Mes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($profesionales_contratados as $profesional)
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</strong></span><br>
                                                        <span>{{ $profesional->rut }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ $profesional->especialidad }}</span><br>
                                                        <span>{{ $profesional->tipo_especialidad }}</span><br>
                                                        <span>{{ $profesional->sub_tipo_especialidad }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        @if($profesional->contrato !== null)
                                                        <span>{{ $profesional->contrato->tipo_contrato == 1 ? 'INDEFINIDO' : '' }}</span><br>
                                                        <span>{{ $profesional->contrato->fecha_inicio }}</span>
                                                        @else
                                                        <span>Convenio</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $profesional->id }});" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-home"></i></button>
                                                        <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datoscuenta({{ $profesional->id }});" data-toggle="tooltip" data-placement="top" title="Depositar"><i class="fas fa-hand-holding-usd"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        @if($profesional->contrato !== null)
                                                        <span>{{ $profesional->horas_semanales }} horas semanales <br> ${{ number_format($profesional->contrato->monto_imponible, 0, ",", ".") }}</span>
                                                        @else
                                                        <span>Convenio</span>
                                                        @endif
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
                <!--Cierre: Tab Profesionales de la salud-->
                <!--Tab asistentes-->
                <div class="tab-pane fade" id="administrativos" role="tabpanel" aria-labelledby="administrativos-tab">
                    <div class="row mb-n10">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="text-white f-20 mt-2 mb-2 float-left">Asistentes del Centro</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group mr-2 float-right mt- mb-">
                                                     {{-- <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_contratoasistentes"><i class="fa fa-plus" aria-hidden="true"></i> Registrar Contrato nuevo/a asistente</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="tab_cont_asistentes_centroc" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Nombre / Rut</th>
                                                <th class="text-center align-middle">Cargo</th>
                                                <th class="text-center align-middle">Dirección</th>
                                                <th class="text-center align-middle">Contacto</th>
                                                <th class="text-center align-middle">Datos</th>
                                                <th class="text-center align-middle">Rol y permisos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($lista_administrativo)
                                                @foreach ( $lista_administrativo as $administrativo)
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>{{ $administrativo->nombres.' '.$administrativo->apellido_uno.' '.$administrativo->apellido_dos }}</strong></span><br>
                                                        <span>{{ $administrativo->rut }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">{{ $administrativo->contrato->tipo_empleado }}</td>
                                                    <td class="align-middle text-center">
                                                        {{ $administrativo->direccion()->first()->direccion }} #{{ $administrativo->direccion()->first()->numero_dir }}, {{ $administrativo->direccion()->first()->ciudad()->first()->nombre }}
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto_administrador('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="datos_depositos('asistente publico',{{ $administrativo->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_administrativo_cm('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="roles_permisos_admin('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }},'{{ $administrativo->roles }}');" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
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

                <!--Tab personal limpieza y mantencion-->
                <div class="tab-pane fade" id="limpieza-mantencion" role="tabpanel" aria-labelledby="limpieza-mantencion-tab">
                    <div class="row mb-n10">
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
                                                    {{-- <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_personalaseoymantencion"><i class="fa fa-plus" aria-hidden="true"></i> Registrar Personal mantención</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="tab_cont_limpieza_mantencionc" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Nombre / Rut</th>
                                                <th class="text-center align-middle">Cargo</th>
                                                <th class="text-center align-middle">Tipo</th>
                                                <th class="text-center align-middle">Dirección</th>
                                                <th class="text-center align-middle">Contacto</th>
                                                <th class="text-center align-middle">Datos</th>
                                                <th class="text-center align-middle">Rol y permisos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($lista_mantencion)
                                            @foreach ( $lista_mantencion as $administrativo)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span><strong>{{ $administrativo->nombre.' '.$administrativo->apellido_paterno.' '.$administrativo->apellido_materno }}</strong></span><br>
                                                    <span>{{ $administrativo->rut }}</span>
                                                </td>
                                                <td class="align-middle text-center">{{ $administrativo->contrato->tipo_empleado }}</td>
                                                <td class="align-middle text-center">@if($administrativo->empresa) Empresa @else Persona @endif</td>
                                                <td class="align-middle text-center">
                                                    {{ $administrativo->direccion()->first()->direccion }} #{{ $administrativo->direccion()->first()->numero_dir }}, {{ $administrativo->direccion()->first()->ciudad()->first()->nombre }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <!--Botón Modal-->
                                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto_mantenedor('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <!--Botón Modal-->
                                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="datos_depositos_mantencion('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>
                                                    <!--Botón Modal-->
                                                    <button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_mantencion_cm('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <!--Botón Modal-->
                                                    <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="roles_permisos_mantencion('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }});" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
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
                <!--Cierre: Tab personal limpieza y mantencion-->
            </div>
            <!--Cierre: Pills-->
        </div>
    </div>
</div>
    @include('app.contabilidad.modals.registrar_asistentes')
    @include('app.contabilidad.modals.liquidacion')
    @include('app.contabilidad.modals.datos_profesional')
    @include('app.contabilidad.modals.datoscuenta')
    @include('app.contabilidad.modals.contacto')
    @include('app.contabilidad.modals.contacto_ser')
    @include('app.contabilidad.modals.editar_profesional')
    @include('app.contabilidad.modals.editar_asistentes')
    @include('app.contabilidad.modals.aseo_mantencion_editar')
    @include('app.contabilidad.modals.aseo_mantencion')
    @include('app.adm_cm.modales.personal.finalizar_contrato')
@endsection
<script type="text/javascript">
    function liquidacion (){
        $('#liquidacion').modal('show');
    }
        function datoscuenta(){
        $('#datoscuenta').modal('show');
    }
        function liquidacionot (){
        $('#liquidacionot').modal('show');
    }
    function datoscuentaot(){
        $('#datoscuentaot').modal('show');
    }
    function contactoc(){ $('#contacto').modal('show');}

    // function editar_datosprofesionalc(){
    //     $('#editardatosprofesional').modal('show');
    // }
    function editar_datosprofesionalc(id){
        $('#editardatosprofesional').modal('show');
        let url = "https://med-sdi.cl/Laboratorio/Profesionales/buscar"+"/"+id;
        $.ajax({
            url: url,
            type: "get",
        })
        .done(async function(data) {
            console.log(data);
            if (data != null)
            {
                if(data.estado == 1)
                {
                    console.log(data.registro.contrato);
                    $('#id_profesional_edit').val(data.registro.id);
                    $('#id_contrato_edit').val(data.registro.contrato.id);

                    $('#edit_profesion_nuevo_profesional').val(data.registro.contrato.id_especialidad);
                   cargar_tipos_especialidad(data.registro.contrato.id_especialidad, data.registro.contrato.id_tipo_especialidad);
                    // data.direccion;
                    cargar_subtipo_especialidad(data.registro.contrato.id_tipo_especialidad, data.registro.contrato.id_subtipo_especialidad);

                    $('#edit_rut_nuevo_profesional').val(data.registro.rut);
                    $('#edit_f_ingreso_nuevo_profesional').val(data.registro.contrato.fecha_inicio);
                    $('#nombre_nuevo_profesional_edit').val(data.registro.nombre);
                    $('#edit_apellido1_nuevo_profesional').val(data.registro.apellido_uno);
                    $('#edit_apellido2_nuevo_profesional').val(data.registro.apellido_dos);
                    $('#edit_prof_sexo').val(data.registro.sexo);
                    $('#edit_fecha_nacimiento').val(data.registro.fecha_nac);
                    $('#edit_email_nuevo_profesional').val(data.registro.email);
                    $('#edit_telefono1_nuevo_profesional').val(data.registro.telefono_uno);
                    $('#edit_telefono2_nuevo_profesional').val(data.registro.telefono_dos);
                    $('#edit_direccion_nuevo_profesional').val(data.direccion);
                    $('#edit_numero_nuevo_profesional').val(data.registro.direccion.numero_dir);

                    // data.registro.direccion.id;
                    // $('#edit_region_nuevo_profesional').val(data.registro.direccion.ciudad.id_region);
                    console.log(data.registro.direccion.ciudad.id_region);
                    $('#edit_fecha_nacimiento').val(data.registro.fecha_nacimiento);

                    console.log(data.registro.direccion.ciudad.id_region);

                    $('#edit_region_nuevo_profesional').val(data.registro.direccion.ciudad.id_region);
                    try {
                            await buscar_ciudad_editar_prof(data.registro.direccion.ciudad.id_region);
                            $('#edit_comuna_nuevo_profesional').val(data.registro.direccion.id_ciudad);
                        } catch (error) {
                            console.error("Error al actualizar la ciudad:", error);
                        }

                    $('#edit_prof_monto_imponible').val(data.registro.contrato.monto_imponible);
                    $('#edit_banco_nuevo_profesional').val(data.registro.contrato.id_banco);
                    $('#edit_n_cta_nuevo_profesional').val(data.registro.contrato.numero_cuenta);
                    $('#edit_sucursal_nuevo_profesional').val(data.registro.contrato.sucursal);

                    console.log(data.registro.contrato.dias_laborales);
                    $('#edit_dias_laborales').val(data.registro.contrato.dias_laborales.split(",")).select2();
                    $('#edit_hora_entrada').val(data.registro.contrato.hora_ingreso);
                    $('#edit_hora_salida').val(data.registro.contrato.hora_salida);
                    $('#edit_hora_entrada_colacion').val(data.registro.contrato.hora_inicio_colacion);
                    $('#edit_hora_salida_colacion').val(data.registro.contrato.hora_termino_colacion);

                    $('#edit_prof_id_prof').val(data.registro.id);


                    $('#edit_prof_direccion').val(data.registro.direccion.direccion);
                    $('#edit_prof_numero').val(data.registro.direccion.numero_dir);


                    // data.registro.direccion.ciudad.id
                    // data.registro.direccion.ciudad.nombre

                    $('#edit_prof_id_contrato').val(data.registro.contrato.id);
                    $('#edit_prof_tipo_contrato').val(data.registro.contrato.tipo_prof);
                    // data.registro.contrato.id_prof;
                    $('#edit_prof_rut').val(data.registro.contrato.rut);
                    $('#edit_prof_nombre').val(data.registro.contrato.nombres);
                    $('#edit_prof_apellido_uno').val(data.registro.contrato.apellido_uno);
                    $('#edit_prof_apellido_dos').val(data.registro.contrato.apellido_dos);
                    $('#edit_prof_telefono').val(data.registro.contrato.telefono);
                    $('#edit_prof_email').val(data.registro.contrato.email);
                    // data.registro.contrato.id_institucion;
                    // data.registro.contrato.id_lugar_atencion;
                    // data.registro.contrato.tipo_contrato;

                    $('#edit_prof_check_contrato_indef').val(data.registro.contrato.tipo_contrato);
                    if(data.registro.contrato.tipo_contrato == 1)
                        $('#edit_prof_check_contrato_indef').prop('checked', true);
                    else
                        $('#edit_prof_check_contrato_indef').prop('checked', false);
                    contrato_indefinido('edit_prof_check_contrato_indef', 'edit_prof_cont_indefinido', 'edit_prof_fecha_termino');

                    $('#edit_prof_fecha_inicio').val(data.registro.contrato.fecha_inicio);
                    $('#edit_prof_fecha_termino').val(data.registro.contrato.fecha_termino);
                    $('#edit_prof_monto_imponible').val(data.registro.contrato.monto_imponible);

                    if(data.registro.contrato.locomocion == 1)
                        $('#edit_prof_check_locomocion').prop('checked', true);
                    else
                        $('#edit_prof_check_locomocion').prop('checked', false);
                    activar_check('edit_prof_check_locomocion', 'edit_prof_locomocion', 'edit_prof_locomocion_porcentaje');
                    $('#edit_prof_locomocion_porcentaje').val(data.registro.contrato.locomocion_porcentaje);

                    if(data.registro.contrato.colacion == 1)
                        $('#edit_prof_check_colacion').prop('checked', true);
                    else
                        $('#edit_prof_check_colacion').prop('checked', false);
                    activar_check('edit_prof_check_colacion', 'edit_prof_colacion', 'edit_prof_colacion_porcentaje');
                    $('#edit_prof_colacion_porcentaje').val(data.registro.contrato.colacion_porcentaje);

                    if(data.registro.contrato.asignacion_familiar == 1)
                        $('#edit_prof_check_asignacion_familiar').prop('checked', true);
                    else
                        $('#edit_prof_check_asignacion_familiar').prop('checked', false);
                    activar_check('edit_prof_check_asignacion_familiar', 'edit_prof_asignacion_familiar', 'edit_prof_asignacion_familiar_cantidad');
                    $('#edit_prof_asignacion_familiar_cantidad').val(data.registro.contrato.asignacion_familiar_cantidad);

                    if(data.registro.contrato.caja_compensacion == 1)
                        $('#edit_prof_check_caja_compensacion').prop('checked', true);
                    else
                        $('#edit_prof_check_caja_compensacion').prop('checked', false);
                    activar_check('edit_prof_check_caja_compensacion', 'edit_prof_caja_compensacion', 'edit_prof_caja_compensacion_porcentaje');
                    $('#edit_prof_caja_compensacion_porcentaje').val(data.registro.contrato.caja_compensacion_porcentaje);


                }
                else
                {

                }

            }
            else
            {
                swal({
                    title: "Error",
                    text: "Error al cargar las ciudades",
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

    function cargar_tipos_especialidad(id_especialidad, id_tipo_especialidad = null){
        let url = "{{ route('web.profesional.buscar_tipo_especialidad') }}";
        $.ajax({
            url: url,
            type: "get",
            data:{
                id_especialidad: id_especialidad
            },
        })
        .done(function(data) {
            console.log(data);
            if (data != null)
            {
                if(data.estado == 1)
                {
                    $('#edit_especialidad_nuevo_profesional').empty();
                    $('#edit_especialidad_nuevo_profesional').append('<option value="">Seleccione el tipo de especialidad</option>');
                    data.registros.forEach(tipo => {
                        $('#edit_especialidad_nuevo_profesional').append('<option value="'+tipo.id+'">'+tipo.nombre+'</option>');
                    });

                    if(id_tipo_especialidad != null)
                        $('#edit_especialidad_nuevo_profesional').val(id_tipo_especialidad);
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cargar los tipos de especialidad",
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
                    text: "Error al cargar los tipos de especialidad",
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

    function cargar_subtipo_especialidad(id_tipo_especialidad, id_subtipo_especialidad = null){
        let url = "{{ route('web.profesional.buscar_sub_tipo_especialidad') }}";
        $.ajax({
            url: url,
            type: "get",
            data:{
                id_tipo_especialidad: id_tipo_especialidad
            },
        })
        .done(function(data) {
            console.log(data);
            if (data != null)
            {
                if(data.estado == 1)
                {
                    $('#edit_sub_especialidad_nuevo_profesional').empty();
                    $('#edit_sub_especialidad_nuevo_profesional').append('<option value="">Seleccione el subtipo de especialidad</option>');
                    data.registros.forEach(subtipo => {
                        $('#edit_sub_especialidad_nuevo_profesional').append('<option value="'+subtipo.id+'">'+subtipo.nombre+'</option>');
                    });

                    if(id_subtipo_especialidad != null)
                        $('#edit_sub_especialidad_nuevo_profesional').val(id_subtipo_especialidad);
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cargar los subtipos de especialidad",
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
                    text: "Error al cargar los subtipos de especialidad",
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

    function editar_datosasistentec(){
        $('#editar_contratoasistentes').modal('show');
    }
    function editar_datos_empresac(){
        $('#editar_personalaseoymantencion').modal('show');
    }
    function registar_datos_empresac(){
        $('#registrar_personalaseoymantencion').modal('show');
    }

    function registrar_nuevo_profesional(){
        let rut = $('#rut_nuevo_profesional').val();
        let f_ingreso = $('#f_ingreso_nuevo_profesional').val();
        let nombre = $('#nombre_nuevo_profesional').val();
        let apellido1 = $('#apellido1_nuevo_profesional').val();
        let apellido2 = $('#apellido2_nuevo_profesional').val();
        let email = $('#email_nuevo_profesional').val();
        let telefono1 = $('#telefono1_nuevo_profesional').val();
        let telefono2 = $('#telefono2_nuevo_profesional').val();
        let direccion = $('#direccion_nuevo_profesional').val();
        let cargo = $('#cargo_nuevo_profesional').val();
        let region = $('#region_nuevo_profesional').val();
        let comuna = $('#comuna_nuevo_profesional').val();
        let profesion = $('#profesion_nuevo_profesional').val();
        let especialidad = $('#especialidad_nuevo_profesional').val();
        let sub_especialidad = $('#sub_especialidad_nuevo_profesional').val();
        let dias_atencion = $('#dias_atencion_nuevo_profesional').val();
        let horario = $('#horario_nuevo_profesional').val();
        let p_hora = $('#p_hora_nuevo_profesional').val();
        let correo_cont = $('#correo-cont').is(':checked');
        let banco = $('#banco_nuevo_profesional').val();
        let n_cta = $('#n_cta_nuevo_profesional').val();
        let sucursal = $('#sucursal_nuevo_profesional').val();

        let valido = 1;
        let mensaje = '';

        if(rut == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el rut del profesional</li>';
        }
        if(f_ingreso == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la fecha de ingreso del profesional</li>';
        }
        if(nombre == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el nombre del profesional</li>';
        }
        if(apellido1 == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el primer apellido del profesional</li>';
        }
        if(apellido2 == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el segundo apellido del profesional</li>';
        }
        if(email == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el correo electr&oacute;nico del profesional</li>';
        }
        if(telefono1 == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el tel&eacute;fono del profesional</li>';
        }
        if(direccion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la direcci&oacute;n del profesional</li>';
        }
        if(cargo == '' || cargo == 0){
            valido = 0;
            mensaje += '<li>Debe ingresar el cargo del profesional</li>';
        }
        if(region == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la regi&oacute;n del profesional</li>';
        }
        if(comuna == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la comuna del profesional</li>';
        }
        if(profesion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la profesi&oacute;n del profesional</li>';
        }
        if(especialidad == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la especialidad del profesional</li>';
        }
        if(sub_especialidad == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la sub-especialidad del profesional</li>';
        }
        if(dias_atencion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar los d&iacute;as de atenci&oacute;n del profesional</li>';
        }
        if(horario == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el horario del profesional</li>';
        }
        if(p_hora == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la cantidad de pacientes por hora del profesional</li>';
        }
        if(banco == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar el banco para el dep&oacute;sito del profesional</li>';
        }
        if(n_cta == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el n&uacute;mero de cuenta para el dep&oacute;sito del profesional</li>';
        }
        if(sucursal == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la sucursal para el dep&oacute;sito del profesional</li>';
        }

        if(valido == 0){
            swal({
                title: "Error",
                content:{
                    element: "div",
                    attributes: {
                        innerHTML: mensaje
                    }
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            })
            return false;
        }


        let data = {
            rut: rut,
            f_ingreso: f_ingreso,
            nombre: nombre,
            apellido1: apellido1,
            apellido2: apellido2,
            email: email,
            telefono1: telefono1,
            telefono2: telefono2,
            direccion: direccion,
            cargo: cargo,
            region: region,
            comuna: comuna,
            profesion: profesion,
            especialidad: especialidad,
            sub_especialidad: sub_especialidad,
            dias_atencion: dias_atencion,
            horario: horario,
            p_hora: p_hora,
            correo_cont: correo_cont,
            banco: banco,
            n_cta: n_cta,
            sucursal: sucursal,
            _token: '{{ csrf_token() }}'
        }


        let url = "{{ route('adm_cm.registrar_profesional') }}";
        $.ajax({
            url: url,
            type: "post",
            data: data,
        })
        .done(function(data) {
             console.log(data);
            if (data != null) {
                if(data.estado == 1){
                    swal({
                        title: "Registro Exitoso",
                        text: data.message,
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                }else{
                    swal({
                        title: "Error",
                        text: data.msj,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                }
            } else {
                swal({
                    title: "Error",
                    text: "Error al registrar profesional",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    /*-Modals personal-*/
    function contacto(id)
    {
            let url = "{{ route('adm_cm.profesional_buscar', ['id_profesional' => '__id__']) }}";
            url = url.replace('__id__', id);

            $.ajax({
                url: url,
                type: "get",
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {
                    /** encontrado */
                    $('#contacto_prof_rut').html(data.registro.rut);
                    $('#contacto_prof_email').html(data.registro.email);
                    $('#contacto_prof_telefono1').html(data.registro.telefono_uno);
                    $('#contacto_prof_telefono2').html(data.registro.telefono_dos);
                    $('#contacto_prof_direccion').html(data.direccion);
                    $('#contacto_usuario').modal('show');
                }
                else
                {
                    /** no encontrado */
                    swal({
                        title: "Problema al cargar informacion del Profesional.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    }

    function finalizar_contrato(id_profesional){
        swal({
            title: "Eliminar Área Profesional",
            text: "¿Está seguro que desea finalizar el contrato de profesional?",
            icon: "warning",
            buttons: ["Cancelar", "Aceptar"],
            DangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                confirmar_finalizar_contrato(id_profesional);
            }
        });
    }

    function confirmar_finalizar_contrato(id){
        let url = '{{ ROUTE("adm_cm.finalizar_contrato") }}';
        let data = {
            id: id,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            data: data,
            url: url,
            success: function(data){
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
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

</script>
