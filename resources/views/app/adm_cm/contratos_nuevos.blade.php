@extends('template.adm_cm.template')
@section('content')
<style>
    .select2-container--open{
        z-index: 9999999 !important;
    }
</style>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Escritorio Contabilidad / RRHH</h5>
                        </div>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.area_contabilidad') }}">Escritorio contabilidad</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-asistentes-tab" data-toggle="tab" href="#pills-asistentes" role="tab" aria-controls="pills-asistentes" aria-selected="false">Asistentes / Personal</a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-limpieza-mantencion-tab" data-toggle="tab" href="#pills-limpieza-mantencion" role="tab" aria-controls="pills-limpieza-mantencion" aria-selected="false">Limpieza y Mantención</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Profesionales contratados</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2  float-md-right">
                                                        <div class="btn-group mr-2 float-right mt- mb-">
                                                            <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_contratoprofesional">
                                                            <i class="feather icon-plus"></i> Registrar Contrato Profesional </button>
                                                            {{-- <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#liq_prof_institucion">
                                                                <i class="feather icon-plus"></i> Registrar Convenio Profesional </button> --}}
                                                                <button type="button" class="btn btn-sm btn-outline-light" onclick="asociar_profesional();">Asociar Otros profesionales</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" id="card_body_profesionales_contratados">
                                        <div style="overflow-x:auto;">
                                            <table id="tab_profesionales_cont_centroc" class="display table table-striped dt-responsive nowrap table-sm" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle">Nombre / Rut</th>
                                                        <th class="align-middle">Profesion</th>
                                                        <th class="align-middle">Tipo de Contrato / <br>Fecha contrato</th>
                                                        <th class="align-middle">Remuneración Mes</th>
                                                        <th class="align-middle">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($profesionales_contratados as $profesional)
                                                        <tr>
                                                            <td class="align-middle">
                                                                <span><strong>{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</strong></span><br>
                                                                <span>{{ $profesional->rut }}</span>
                                                            </td>
                                                            <td class="align-middle">
                                                                <span>{{ $profesional->especialidad }}</span><br>
                                                                <span>{{ $profesional->tipo_especialidad }}</span><br>
                                                                <span>{{ $profesional->sub_tipo_especialidad }}</span>
                                                            </td>
                                                            <td class="align-middle">
                                                                @if($profesional->contrato !== null)
                                                                    <span>{{ $profesional->contrato->tipo_contrato == 1 ? 'INDEFINIDO' : '' }}</span><br>
                                                                    <span>{{ $profesional->contrato->fecha_inicio }}</span>
                                                                @else
                                                                    <span>Convenio</span>
                                                                @endif
                                                            </td>
                                                            <td class="align-middle">
                                                                @if($profesional->contrato !== null)
                                                                    @if(!$profesional->es_convenio)
                                                                        <span>{{ $profesional->horas_semanales }} horas semanales <br> ${{ number_format($profesional->contrato->monto_imponible, 0, ",", ".") }}</span>
                                                                    @else
                                                                    <span> ${{ number_format($profesional->contrato->valor_fijo, 0, ",", ".") }}</span>
                                                                    @endif
                                                                @else
                                                                <span>Contrato no definido</span>
                                                                @endif
                                                            </td>
                                                            <td class="align-middle">
                                                                @if($profesional->contrato !== null)
                                                                    @if(!$profesional->es_convenio)
                                                                        <button type="button" class="btn btn-info btn-xxs" onclick="editar_datosprofesionalc({{ $profesional->id }});">
                                                                        <i class="feather icon-edit"></i> Editar</button>

                                                                        <button type="button" class="btn btn-danger btn-xxs" onclick="modal_desactivar_profesional({{ $profesional->id}}, {{ $profesional->contrato->id }}, '{{ $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos }}');">
                                                                        <i class="feather icon-x"></i> Desasociar</button>
                                                                    @else
                                                                        <button type="button" class="btn btn-info btn-xxs" onclick="editar_datosprofesionalc_convenio({{ $profesional->id }});">
                                                                        <i class="feather icon-edit"></i> Editar</button>

                                                                        <button type="button" class="btn btn-danger btn-xxs" onclick="modal_desactivar_profesional_convenio({{ $profesional->id}}, {{ $profesional->contrato->id }}, '{{ $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos }}');">
                                                                        <i class="feather icon-x"></i> Desasociar</button>
                                                                    @endif
                                                                @else
                                                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $profesional->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                                <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datoscuenta({{ $profesional->id }});" data-toggle="tooltip" data-placement="top" title="Depositar"><i class="fas fa-hand-holding-usd"></i></button>
                                                                <button type="button" class="btn btn-info btn-xxs disabled" onclick="editar_datosprofesionalc({{ $profesional->id }});">
                                                                    <i class="feather icon-edit"></i> Editar</button>
                                                                <button type="button" class="btn btn-danger btn-xxs" onclick="modal_desactivar_profesional({{ $profesional->id}}, 0, '{{ $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos }}');">
                                                                <i class="feather icon-x"></i> Desasociar</button>
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
                    </div>
                    <!--Cierre: Tab Profesionales de la salud-->

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
                                                        <div class="btn-group mr-2  float-md-right">
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
                                            <div style="overflow-x:auto;">
                                                <table id="administrativo_personal" class="display table table-striped dt-responsive nowrap table-sm" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle">Nombre / Rut</th>
                                                            <th class="align-middle">Cargo</th>
                                                            <th class="align-middle">Dirección</th>
                                                            <th class="align-middle">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($lista_administrativo)
                                                            @foreach ( $lista_administrativo as $administrativo)
                                                            <tr>
                                                                <td class="align-middle">
                                                                    <span><strong>{{ $administrativo->nombres.' '.$administrativo->apellido_uno.' '.$administrativo->apellido_dos }}</strong></span><br>
                                                                    <span>{{ $administrativo->rut }}</span>
                                                                </td>
                                                                <td class="align-middle">{{ $administrativo->contrato->tipo_empleado }}</td>
                                                                <td class="align-middle">
                                                                    {{ $administrativo->direccion()->first()->direccion }} #{{ $administrativo->direccion()->first()->numero_dir }}, {{ $administrativo->direccion()->first()->ciudad()->first()->nombre }}
                                                                </td>
                                                                <td class="align-middle">
                                                                    <!--Botón Modal-->
                                                                    <button type="button" class="btn btn-info btn-icon" onclick="contacto_administrador('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                                                                                                <!--Botón Modal-->
                                                                    <button type="button" class="btn btn-success btn-icon" onclick="datos_depositos('asistente publico',{{ $administrativo->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Datos bancarios para depósito"><i class="fas fa-hand-holding-usd"></i></button>
                                                                    <!--Botón Modal-->
                                                                    <button type="button" class="btn btn-purple btn-sm btn-icon" onclick="horario_administrativo_cm('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="feather icon-clock"></i></button>
                                                                    <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="roles_permisos_admin('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }},'{{ $administrativo->roles }}');" data-toggle="tooltip" data-placement="top" title="Roles y permisos"><i class="feather icon-settings"></i></button>
                                                                    <button type="button" class="btn btn-info btn-xxs" onclick="editar_datos_administrativo({{ $administrativo->id }});"><i class="feather icon-edit"></i> Editar</button>
                                                                    <button type="button" class="btn btn-danger btn-xxs" onclick="modal_desactivar_otros_profesionales('administrativo',{{ $administrativo->id}}, {{ $administrativo->contrato->id }}, '{{ $administrativo->nombres.' '.$administrativo->apellido_uno.' '.$administrativo->apellido_dos }}');"><i class="feather icon-x"></i> Desasociar</button>
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
                                                        <div class="btn-group mr-2 float-md-right">
                                                            <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_limpieza_mantencion();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo/a personal de limpieza y mantención</button>
                                                            {{-- <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                            <div class="dropdown-menu">
                                                                <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="Asociar_personal();">Asociar personal de limpieza y mantencion</button>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div style="overflow-x:auto;">
                                                <table id="limpieza_mantencion_personal" class="display table table-striped dt-responsive nowrap table-sm" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle">Nombre / Rut</th>
                                                            <th class="align-middle">Cargo</th>
                                                            <th class="align-middle">Tipo</th>
                                                            <th class="align-middle">Dirección</th>
                                                            <th class="align-middle">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($lista_mantencion)
                                                        @foreach ( $lista_mantencion as $administrativo)
                                                        <tr>
                                                            <td class="align-middle">
                                                                <span><strong>{{ $administrativo->nombre.' '.$administrativo->apellido_paterno.' '.$administrativo->apellido_materno }}</strong></span><br>
                                                                <span>{{ $administrativo->rut }}</span>
                                                            </td>
                                                            <td class="align-middle">{{ $administrativo->contrato->tipo_empleado }}</td>
                                                            <td class="align-middle">@if($administrativo->empresa) Empresa @else Persona @endif</td>
                                                            <td class="align-middle">
                                                                {{ $administrativo->direccion()->first()->direccion }} #{{ $administrativo->direccion()->first()->numero_dir }}, {{ $administrativo->direccion()->first()->ciudad()->first()->nombre }}
                                                            </td>
                                                            <td class="align-middle">
                                                                <!--Botón Modal-->
                                                                <button type="button" class="btn btn-info btn-icon" onclick="contacto_mantenedor('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                                <!--Botón Modal-->
                                                                <button type="button" class="btn btn-success btn-icon" onclick="datos_depositos_mantencion('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Datos bancarios para depósito"><i class="fas fa-hand-holding-usd"></i></button>
                                                                <!--Botón Modal-->
                                                                <button type="button" class="btn btn-purple btn-icon" onclick="horario_mantencion_cm('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="feather icon-clock"></i></button>
                                                                <!--Botón Modal-->
                                                                <button type="button" class="btn btn-warning btn-icon" onclick="roles_permisos_mantencion('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }});" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
                                                                <button type="button" class="btn btn-info btn-xxs" onclick="editar_datos_mantencion('{{ $administrativo->contrato->tipo_empleado }}',{{ $administrativo->id }});"><i class="feather icon-edit"></i> Editar</button>
                                                                <button type="button" class="btn btn-danger btn-xxs" onclick="modal_desactivar_otros_profesionales('mantencion',{{ $administrativo->id}}, {{ $administrativo->contrato->id }}, '{{ $administrativo->nombres.' '.$administrativo->apellido_uno.' '.$administrativo->apellido_dos }}');"><i class="feather icon-x-circle"></i> Desasociar</button>
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
                        </div>
                        <!--Cierre: Tab personal limpieza y mantencion-->
                </div>
                <!--Cierre: Pills-->
            </div>
        </div>
    </div>
</div>


@endsection

@section('modales')
    @include('app.contabilidad.modals.registrar_asistentes')
    @include('app.contabilidad.modals.liquidacion')
    @include('app.contabilidad.modals.datos_profesional')
    @include('app.contabilidad.modals.datoscuenta')
    @include('app.contabilidad.modals.contacto')
    @include('app.contabilidad.modals.contacto_ser')


    @include('app.adm_cm.modales.personal.registrar_personal')
    @include('app.adm_cm.modales.personal.registrar_personal_administrativo')

    @include('app.adm_cm.modales.personal.contacto_personal')
    @include('app.adm_cm.modales.personal.datos_banco')
    @include('app.adm_cm.modales.personal.horario_personal_administrativo')
    @include('app.adm_cm.modales.personal.horario_personal_mantencion')

    @include('app.contabilidad.modals.editar_asistentes')
    @include('app.adm_cm.modales.personal.editar_profesional')
    @include('app.adm_cm.modales.personal.editar_profesional_convenio')
    @include('app.adm_cm.modales.personal.editar_administrativos')
    @include('app.adm_cm.modales.personal.editar_mantencion')

    @include('app.adm_cm.modales.personal.finalizar_contrato')

    @include('app.adm_cm.modales.personal.registrar_personal_limpieza_mantencion')

    @include('app.adm_cm.modales.personal.permisos_rol_admin')
    @include('app.adm_cm.modal_adm.asociar_profesional')

    @include('app.adm_cm.modales.personal.asociar_personal')
    @include('app.adm_cm.amodales_nuevos.liquidacion_profesionales')
@endsection

@section('page-script')
<script type="text/javascript">


        $(document).ready(function() {
            {{--  FORMATEO DE RUT AGREGAR NUEVO PROFESIONAL   --}}
            $("#agregar_profesional_int_rut").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });

            $(".js-example-basic-multiple").select2();
            $('#add_empleado_dias_laborales_administrativo').select2({
                placeholder: "Seleccione los días laborales",
                allowClear: true
            });
            $('#edit_dias_laborales').select2({
                placeholder: "Seleccione los días laborales",
                allowClear: true
            });
            $('#add_empleado_rut_administrativo').rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });
        });
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

    function editar_datosprofesionalc(id){
        $('#editar_profesional_cm').modal('show');
        let url = "{{ url('Laboratorio/Profesionales/buscar') }}"+"/"+id;
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

    function editar_datosprofesionalc_convenio(id){
        $('#editar_profesional_cm_convenio').modal('show');
        let url = "{{ url('Laboratorio/Profesionales/buscar') }}"+"/"+id;
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
                    $('#editar_profesion_nuevo_profesional_convenio').val(data.registro.contrato.id_especialidad);
                    cargar_tipos_especialidad_convenio(data.registro.contrato.id_especialidad, data.registro.contrato.id_tipo_especialidad);
                    // data.direccion;
                    cargar_subtipo_especialidad_convenio(data.registro.contrato.id_tipo_especialidad, data.registro.contrato.id_subtipo_especialidad);
                    $('#editar_rut_nuevo_profesional_convenio').val(data.registro.contrato.rut);
                    $('#editar_nombre_nuevo_profesional_convenio').val(data.registro.contrato.nombres);
                    $('#editar_apellido1_nuevo_profesional_convenio').val(data.registro.contrato.apellido_uno);
                    $('#editar_apellido2_nuevo_profesional_convenio').val(data.registro.contrato.apellido_dos);
                    $('#editar_empleado_sexo_convenio').val(data.registro.sexo);
                    $('#editar_fecha_nacimiento_convenio').val(data.registro.fecha_nacimiento);
                    $('#editar_email_nuevo_profesional_convenio').val(data.registro.email);
                    $('#editar_telefono1_nuevo_profesional_convenio').val(data.registro.telefono_uno);
                    $('#editar_telefono2_nuevo_profesional_convenio').val(data.registro.telefono_dos);
                    $('#editar_direccion_nuevo_profesional_convenio').val(data.registro.direccion.direccion);
                    $('#editar_n_dpto_nuevo_profesional_convenio').val(data.registro.direccion.numero_dir);
                    $('#editar_region_nuevo_profesional_convenio').val(data.registro.direccion.ciudad.id_region);
                    try {
                        await buscar_ciudad_editar_prof_convenio(data.registro.direccion.ciudad.id_region);
                        $('#editar_comuna_nuevo_profesional_convenio').val(data.registro.direccion.id_ciudad);
                    } catch (error) {
                        console.error("Error al actualizar la ciudad:", error);
                    }
                    $('#editar_banco_nuevo_profesional_convenio').val(data.registro.contrato.id_banco);
                    $('#editar_n_cta_nuevo_profesional_convenio').val(data.registro.contrato.numero_cuenta);
                    $('#editar_sucursal_nuevo_profesional_convenio').val(data.registro.contrato.sucursal);
                    // dias laborales
                    $('#editar_dias_laborales_convenio').val(data.registro.contrato.dias_laborales.split(",")).select2();
                    $('#editar_hora_entrada_convenio').val(data.registro.contrato.hora_ingreso);
                    $('#editar_hora_salida_convenio').val(data.registro.contrato.hora_salida);
                    $('#editar_hora_entrada_colacion_convenio').val(data.registro.contrato.hora_inicio_colacion);
                    $('#editar_hora_salida_colacion_convenio').val(data.registro.contrato.hora_termino_colacion);
                }
            }else{

            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function editar_nuevo_empleado_administrativo(){
        let valido = 1;
        let mensaje = '';

        let id_administrativo = $('#edit_id_administrativo').val();
        let rut = $('#edit_rut_administrativo').val();
        let f_ingreso = $('#edit_fecha_inicio_administrativo').val();
        let nombre = $('#edit_nombre_administrativo').val();
        let apellido1 = $('#edit_apellido_uno_administrativo').val();
        let apellido2 = $('#edit_apellido_dos_administrativo').val();
        let sexo = $('#edit_sexo_administrativo').val();
        let fecha_nacimiento = $('#edit_fecha_nacimiento_administrativo').val();
        let email = $('#edit_email_administrativo').val();
        let telefono = $('#edit_telefono_administrativo').val();
        let direccion = $('#edit_direccion_administrativo').val();
        let region = $('#edit_region_administrativo').val();
        let ciudad = $('#edit_ciudad_administrativo').val();
        let numero = $('#edit_numero_administrativo').val();

        let fecha_inicio = $('#edit_fecha_inicio_administrativo').val();
        let fecha_termino = $('#edit_fecha_termino_administrativo').val();
        let monto_imponible = $('#edit_monto_imponible_administrativo').val();

        let locomocion = ( $('#edit_check_locomocion_administrativo').is(':checked')?1:0 );
        let locomocion_porcentaje = $('#edit_locomocion_porcentaje_administrativo').val();

        let colacion = ( $('#edit_check_colacion_administrativo').is(':checked')?1:0 );
        let colacion_porcentaje = $('#edit_colacion_porcentaje_administrativo').val();

        let asignacion_familiar = ( $('#edit_check_asignacion_familiar_administrativo').is(':checked')?1:0 );
        let asignacion_familiar_cantidad = $('#edit_asignacion_familiar_cantidad_administrativo').val();

        let caja_compensacion = ( $('#edit_check_caja_compensacion_administrativo').is(':checked')?1:0 );
        let caja_compensacion_porcentaje = $('#edit_caja_compensacion_porcentaje_administrativo').val();

        let dias_laborales = $('#edit_dias_laborales_administrativo').val();
        let hora_entrada = $('#edit_hora_entrada_administrativo').val();
        let hora_salida = $('#edit_hora_salida_administrativo').val();
        let hora_entrada_colacion = $('#edit_hora_entrada_colacion_administrativo').val();
        let hora_salida_colacion = $('#edit_hora_salida_colacion_administrativo').val();

        let tipo_empleado = $('#edit_tipo_contrato_administrativo').val();
        let tipo_contrato = $('#edit_check_contrato_indef_administrativo').val();
        let id_contrato = $('#edit_id_contrato_administrativo').val();

        if(rut == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el RUT del administrativo</li>';
        }
        if(f_ingreso == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la fecha de ingreso del administrativo</li>';
        }
        if(nombre == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el nombre del administrativo</li>';
        }
        if(apellido1 == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el primer apellido del administrativo</li>';
        }
        if(apellido2 == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el segundo apellido del administrativo</li>';
        }
        if(sexo == ''){
            valido = 0;
            mensaje += '<li>Debe seleccionar el sexo del administrativo</li>';
        }
        if(fecha_nacimiento == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la fecha de nacimiento del administrativo</li>';
        }
        if(email == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el correo electrónico del administrativo</li>';
        }
        if(telefono == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el teléfono del administrativo</li>';
        }
        if(direccion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la dirección del administrativo</li>';
        }
        if(region == ''){
            valido = 0;
            mensaje += '<li>Debe seleccionar la Región del administrativo</li>';
        }
        if(ciudad == ''){
            valido = 0;
            mensaje += '<li>Debe seleccionar la Ciudad del administrativo</li>';
        }
        if(numero == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el número de la dirección del administrativo</li>';
        }
        if(fecha_inicio == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la fecha de inicio del contrato del administrativo</li>';
        }
        // if(fecha_termino == '' && tipo_contrato != 1){
        //     valido = 0;
        //     mensaje += '<li>Debe ingresar la fecha de término del contrato del administrativo</li>';
        // }
        if(monto_imponible == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el monto imponible del administrativo</li>';
        }
        if(locomocion == 1 && locomocion_porcentaje == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el porcentaje de locomoción del administrativo</li>';
        }
        if(colacion == 1 && colacion_porcentaje == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el porcentaje de colación del administrativo</li>';
        }
        if(asignacion_familiar == 1 && asignacion_familiar_cantidad == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la cantidad de asignación familiar del administrativo</li>';
        }
        if(caja_compensacion == 1 && caja_compensacion_porcentaje == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el porcentaje de caja de compensación del administrativo</li>';
        }
        if(dias_laborales == null){
            valido = 0;
            mensaje += '<li>Debe seleccionar los días laborales del administrativo</li>';
        }
        if(hora_entrada == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la hora de entrada del administrativo</li>';
        }
        if(hora_salida == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la hora de salida del administrativo</li>';
        }
        if(hora_entrada_colacion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la hora de entrada de colación del administrativo</li>';
        }
        if(hora_salida_colacion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la hora de salida de colación del administrativo</li>';
        }

        if(valido == 0){
            swal({
                title: "Error",
                content:{
                    element: "ul",
                    attributes: {
                        innerHTML: mensaje
                    }
                },
                icon: "error",
            });
            return false;
        }
        else
        {
            let url = "{{ route('adm_cm.administrativo_editar') }}";
            $.ajax({
                url: url,
                type: "post",
                data:{
                    id_administrativo: id_administrativo,
                    rut: rut,
                    f_ingreso: f_ingreso,
                    nombre: nombre,
                    apellido1: apellido1,
                    apellido2: apellido2,
                    sexo: sexo,
                    fecha_nacimiento: fecha_nacimiento,
                    email: email,
                    telefono: telefono,
                    direccion: direccion,
                    region: region,
                    ciudad: ciudad,
                    numero: numero,
                    fecha_inicio: fecha_inicio,
                    fecha_termino: fecha_termino,
                    monto_imponible: monto_imponible,
                    locomocion: locomocion,
                    locomocion_porcentaje: locomocion_porcentaje,
                    colacion: colacion,
                    colacion_porcentaje: colacion_porcentaje,
                    asignacion_familiar: asignacion_familiar,
                    asignacion_familiar_cantidad: asignacion_familiar_cantidad,
                    caja_compensacion: caja_compensacion,
                    caja_compensacion_porcentaje: caja_compensacion_porcentaje,
                    dias_laborales: dias_laborales,
                    hora_entrada: hora_entrada,
                    hora_salida: hora_salida,
                    hora_entrada_colacion: hora_entrada_colacion,
                    hora_salida_colacion: hora_salida_colacion,
                    id_contrato: id_contrato,
                    tipo_empleado: tipo_empleado,
                    tipo_contrato: tipo_contrato,
                    id_lugar_atencion: "{{ $institucion->id_lugar_atencion }}",
                    id_institucion:"{{ $institucion->id }}",
                    _token: "{{ csrf_token() }}",
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null)
                {
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Exito",
                            text: "Administrativo editado correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                        })
                        .then((value) => {
                            location.reload();
                        });
                    }
                    else
                    {
                        swal({
                            title: "Error",
                            text: "Error al editar el administrativo",
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
                        text: "Error al editar el administrativo",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })
        }
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

    function cargar_tipos_especialidad_convenio(id_especialidad, id_tipo_especialidad = null){
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
                    $('#editar_especialidad_nuevo_profesional_convenio').empty();
                    $('#editar_especialidad_nuevo_profesional_convenio').append('<option value="">Seleccione el tipo de especialidad</option>');
                    data.registros.forEach(tipo => {
                        $('#editar_especialidad_nuevo_profesional_convenio').append('<option value="'+tipo.id+'">'+tipo.nombre+'</option>');
                    });

                    if(id_tipo_especialidad != null)
                        $('#editar_especialidad_nuevo_profesional_convenio').val(id_tipo_especialidad);
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

    function cargar_subtipo_especialidad_convenio(id_tipo_especialidad, id_subtipo_especialidad = null){
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
                    $('#editar_sub_especialidad_nuevo_profesional_convenio').empty();
                    $('#editar_sub_especialidad_nuevo_profesional_convenio').append('<option value="">Seleccione el subtipo de especialidad</option>');
                    data.registros.forEach(subtipo => {
                        $('#editar_sub_especialidad_nuevo_profesional_convenio').append('<option value="'+subtipo.id+'">'+subtipo.nombre+'</option>');
                    });

                    if(id_subtipo_especialidad != null)
                        $('#editar_sub_especialidad_nuevo_profesional_convenio').val(id_subtipo_especialidad);
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

    function registrar_nuevo_profesional(){

        let valido = 1;
        let mensaje = '';

        let id_institucion = $('#id_institucion').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_admin_creador = $('#id_admin_creador').val();
        let id_tipo_admin_creador = $('#id_tipo_admin_creador').val();
        let tipo_contrato = $('#tipo_contrato').val();

        let rut = $('#rut_nuevo_profesional').val();
        let f_ingreso = $('#f_ingreso_nuevo_profesional').val();
        let nombre = $('#nombre_nuevo_profesional').val();
        let apellido1 = $('#apellido1_nuevo_profesional').val();
        let apellido2 = $('#apellido2_nuevo_profesional').val();
        let sexo = $('#empleado_sexo').val();
        let fecha_nacimiento = $('#fecha_nacimiento').val();
        let email = $('#email_nuevo_profesional').val();

        let fecha_inicio = $('#empleado_fecha_inicio').val();
        let fecha_termino = $('#empleado_fecha_termino').val();
        let monto_imponible = $('#empleado_monto_imponible').val();

        let locomocion = ( $('#empleado_locomocion').val() == ''?'0':$('#empleado_locomocion').val() );
        var locomocion_porcentaje = '';
        if(locomocion == 1)
            locomocion_porcentaje = $('#empleado_locomocion_porcentaje').val();
        else
            locomocion_porcentaje = '0';

        let colacion = ( $('#empleado_colacion').val() == ''?'0':$('#empleado_colacion').val() );
        var colacion_porcentaje = '';
        if(colacion == 1)
            colacion_porcentaje = $('#empleado_colacion_porcentaje').val();
        else
            colacion_porcentaje = '0';

        let asignacion_familiar = ( $('#empleado_asignacion_familiar').val() == ''?'0':$('#empleado_asignacion_familiar').val() );
        var asignacion_familiar_cantidad = '';
        if(asignacion_familiar == 1)
            asignacion_familiar_cantidad = $('#empleado_asignacion_familiar_cantidad').val();
        else
            asignacion_familiar_cantidad = '0';

        let caja_compensacion = ( $('#empleado_caja_compensacion').val() == ''?'0':$('#empleado_caja_compensacion').val() );
        var caja_compensacion_porcentaje = '';
        if(caja_compensacion == 1)
            caja_compensacion_porcentaje = $('#empleado_caja_compensacion_porcentaje').val();
        else
            caja_compensacion_porcentaje = '0';

        let telefono1 = $('#telefono1_nuevo_profesional').val();
        let telefono2 = $('#telefono2_nuevo_profesional').val();
        let direccion = $('#direccion_nuevo_profesional').val();
        let numero = $('#n_dpto_nuevo_profesional').val();
        let region = $('#region_nuevo_profesional').val();
        let comuna = $('#comuna_nuevo_profesional').val();
        let dias_laborales = $('#dias_laborales').val();
        let hora_entrada = $('#hora_entrada').val();
        let hora_salida = $('#hora_salida').val();
        let hora_entrada_colacion = $('#hora_entrada_colacion').val();
        let hora_salida_colacion = $('#hora_salida_colacion').val();
        let cargo = $('#cargo_nuevo_profesional').val();
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
        if(sexo == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar el sexo del profesional</li>';
        }
        if(fecha_nacimiento == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la fecha de nacimiento del profesional</li>';
        }
        if(email == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el correo electr&oacute;nico del profesional</li>';
        }
        if(fecha_inicio == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la fecha de inicio del contrato del profesional</li>';
        }
        if(monto_imponible == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el monto imponible del profesional</li>';
        }
        if(telefono1 == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el tel&eacute;fono del profesional</li>';
        }
        if(direccion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la direcci&oacute;n del profesional</li>';
        }
        if(cargo == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar el cargo del profesional</li>';
        }
        if(region == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la regi&oacute;n del profesional</li>';
        }
        if(comuna == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la comuna del profesional</li>';
        }
        if(dias_laborales == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar los d&iacute;as laborales del profesional</li>';
        }
        if(hora_entrada == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la hora de entrada del profesional</li>';
        }
        if(hora_salida == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la hora de salida del profesional</li>';
        }
        if(hora_entrada_colacion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la hora de entrada de colaci&oacute;n del profesional</li>';
        }
        if(hora_salida_colacion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la hora de salida de colaci&oacute;n del profesional</li>';
        }
        if(cargo == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el cargo del profesional</li>';
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
            _token: "{{ csrf_token() }}",
            id_institucion: id_institucion,
            id_lugar_atencion: id_lugar_atencion,
            id_admin_creador: id_admin_creador,
            id_tipo_admin_creador: id_tipo_admin_creador,
            tipo_contrato: tipo_contrato,
            rut: rut,
            f_ingreso: f_ingreso,
            nombre: nombre,
            apellido1: apellido1,
            apellido2: apellido2,
            sexo: sexo,
            fecha_nacimiento: fecha_nacimiento,
            email: email,
            fecha_inicio: fecha_inicio,
            fecha_termino: fecha_termino,
            monto_imponible: monto_imponible,
            locomocion: locomocion,
            locomocion_porcentaje: locomocion_porcentaje,
            colacion: colacion,
            colacion_porcentaje: colacion_porcentaje,
            asignacion_familiar: asignacion_familiar,
            asignacion_familiar_cantidad: asignacion_familiar_cantidad,
            caja_compensacion: caja_compensacion,
            caja_compensacion_porcentaje: caja_compensacion_porcentaje,
            telefono1: telefono1,
            telefono2: telefono2,
            direccion: direccion,
            numero: numero,
            region: region,
            comuna: comuna,
            dias_laborales: dias_laborales,
            hora_entrada: hora_entrada,
            hora_salida: hora_salida,
            hora_entrada_colacion: hora_entrada_colacion,
            hora_salida_colacion: hora_salida_colacion,
            cargo: cargo,
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
                    });
                    $('#card_body_profesionales_contratados').empty();
                    $('#card_body_profesionales_contratados').append(data.v);
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
        let url = "{{ route('laboratorio.profesional_buscar', ['id_profesional' => '__id__']) }}";
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

    function contacto_administrador(tipo,id)
    {
        let url = "{{ route('adm_cm.administrativo_buscar') }}";

        $.ajax({
            url: url,
            type: "get",
            data:{
                id: id,
                tipo: tipo,
            },
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
                    title: "Problema al cargar informacion del Administrativo.",
                    icon: "error",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function contacto_mantenedor(tipo,id){
        let url = "{{ route('adm_cm.mantencion_buscar') }}";

        $.ajax({
            url: url,
            type: "get",
            data:{
                id: id,
                tipo: tipo,
            },
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
                    title: "Problema al cargar informacion del Mantenedor.",
                    icon: "error",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function eliminar_mantenedor(id){
        swal({
            title: '¿Estás seguro de eliminar este mantenedor?',
            text: "Esta acción no se puede revertir!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Eliminar"
            },
        })
        .then((value) => {
            if(value){
                confirmar_eliminar_mantenedor(id);
            }
        });
    }

    function activar_check(check, input_base, input_valor)
    {
        console.log(check, input_base, input_valor);
        if($('#'+check).prop('checked'))
        {
            $('#'+input_base).val(1);
            $('#'+input_valor).val(0);
            $('#'+input_valor).attr('disabled', false);
        }
        else
        {
            $('#'+input_base).val(0);
            $('#'+input_valor).val('N/A');
            $('#'+input_valor).attr('disabled', true);
        }
    }

    function editar_datos_administrativo(id) {
        $('#modal_editar_personal_administrativo').modal('show');
        var url = "{{ route('adm_cm.administrativo_buscar') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                id: id,
            },
        })
        .done(async function(data) {
            console.log(data);
            if (data != null) {
                if (data.estado == 1) {
                    $('#edit_id_administrativo').val(data.registro.id);
                    $('#edit_id_contrato_administrativo').val(data.registro.contrato.id);
                    $('#edit_tipo_contrato_administrativo').val(data.registro.contrato.tipo_empleado);
                    $('#edit_rut_administrativo').val(data.registro.rut);
                    $('#edit_nombre_administrativo').val(data.registro.nombres);
                    $('#edit_apellido_uno_administrativo').val(data.registro.apellido_uno);
                    $('#edit_apellido_dos_administrativo').val(data.registro.apellido_dos);
                    $('#edit_sexo_administrativo').val(data.registro.sexo);
                    $('#edit_fecha_nacimiento_administrativo').val(data.registro.fecha_nac);
                    $('#edit_email_administrativo').val(data.registro.email);
                    $('#edit_telefono_administrativo').val(data.registro.telefono_uno);
                    $('#edit_region_administrativo').val(data.registro.direccion.ciudad.id_region);
                    buscar_ciudad_editar_admin(data.registro.direccion.ciudad.id);
                    $('#edit_direccion_administrativo').val(data.direccion);
                    $('#edit_numero_administrativo').val(data.registro.direccion.numero_dir);
                    $('#edit_fecha_inicio_administrativo').val(data.registro.contrato.fecha_inicio);
                    $('#edit_check_contrato_indef_administrativo').val(data.registro.contrato.tipo_contrato);
                    if(data.registro.contrato.tipo_contrato == 1){
                        $('#edit_check_contrato_indef_administrativo').prop('checked', true);
                    }else{
                        $('#edit_check_contrato_indef_administrativo').prop('checked', false);
                    }

                    $('#edit_monto_imponible_administrativo').val(data.registro.contrato.monto_imponible);
                    contrato_indefinido('edit_check_contrato_indef_administrativo', 'edit_fecha_termino_administrativo');
                    $('#edit_fecha_termino_administrativo').val(data.registro.contrato.fecha_termino);

                    if(data.registro.contrato.locomocion == 1){
                        $('#edit_check_locomocion_administrativo').prop('checked', true);
                    }else{
                        $('#edit_check_locomocion_administrativo').prop('checked', false);
                    }
                    activar_check('edit_check_locomocion_administrativo', 'edit_locomocion_administrativo', 'edit_porcentaje_locomocion_administrativo');
                    $('#edit_locomocion_porcentaje_administrativo').val(data.registro.contrato.locomocion_porcentaje);

                    if(data.registro.contrato.colacion == 1){
                        $('#edit_check_colacion_administrativo').prop('checked', true);
                    }else{
                        $('#edit_check_colacion_administrativo').prop('checked', false);
                    }
                    activar_check('edit_check_colacion_administrativo', 'edit_colacion_administrativo', 'edit_porcentaje_colacion_administrativo');
                    $('#edit_colacion_porcentaje_administrativo').val(data.registro.contrato.colacion_porcentaje);

                    if(data.registro.contrato.asignacion_familiar == 1){
                        $('#edit_check_asignacion_familiar_administrativo').prop('checked', true);
                    }else{
                        $('#edit_check_asignacion_familiar_administrativo').prop('checked', false);
                    }
                    activar_check('edit_check_asignacion_familiar_administrativo', 'edit_asignacion_familiar_administrativo', 'edit_cantidad_asignacion_familiar_administrativo');
                    $('#edit_asignacion_familiar_cantidad_administrativo').val(data.registro.contrato.asignacion_familiar_cantidad);

                    if(data.registro.contrato.caja_compensacion == 1){
                        $('#edit_check_caja_compensacion_administrativo').prop('checked', true);
                    }else{
                        $('#edit_check_caja_compensacion_administrativo').prop('checked', false);
                    }
                    activar_check('edit_check_caja_compensacion_administrativo', 'edit_caja_compensacion_administrativo', 'edit_porcentaje_caja_compensacion_administrativo');
                    $('#edit_caja_compensacion_porcentaje_administrativo').val(data.registro.contrato.caja_compensacion_porcentaje);

                    $('#edit_dias_laborales_administrativo').val(data.registro.contrato.dias_laborales.split(",")).select2();
                    $('#edit_hora_entrada_administrativo').val(data.registro.contrato.hora_ingreso);
                    $('#edit_hora_salida_administrativo').val(data.registro.contrato.hora_salida);
                    $('#edit_hora_entrada_colacion_administrativo').val(data.registro.contrato.hora_inicio_colacion);
                    $('#edit_hora_salida_colacion_administrativo').val(data.registro.contrato.hora_termino_colacion);
                }
            } else {
                swal({
                    title: "Error",
                    text: "Error al cargar los datos del administrativo",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
            }
        })

    }

    function buscar_ciudad_editar_admin(id_ciudad = 0) {
        return new Promise((resolve, reject) => {
            let region = $('#edit_region_administrativo').val();
            console.log(region);
            let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    region: region,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#edit_ciudad_administrativo');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    });

                    if (id_ciudad != 0) {
                        ciudades.val(id_ciudad);
                    }

                    resolve(); // Resuelve la promesa cuando se hayan cargado las ciudades
                } else {
                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                    reject("Error al cargar las ciudades"); // Rechaza la promesa en caso de error
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
                reject(thrownError); // Rechaza la promesa en caso de fallo en la solicitud AJAX
            });
        });
    }

    function confirmar_eliminar_mantenedor(id){
        let _token = "{{ csrf_token() }}";

        let url = "{{ route('adm_cm.eliminar_personal_mantencion') }}";
        $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: _token,
                    id: id,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {

                    if (data.estado == 1) {
                        swal({
                            title: "Mantenedor eliminado",
                            text: data.msj,
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                        $('#card_body_mantenedores_contratados').empty();
                        $('#card_body_mantenedores_contratados').html(data.v);
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al eliminar el asistente",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                    }
                } else {

                    swal({
                        title: "Error",
                        text: "Error al eliminar el asistente",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
    }

    function registrar_administrativo(){
            $('#modal_agregar_personal_administrativo').modal('show');
    }

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
                console.log(data);
                /** encontrado */
                $('#agregar_profesional_id_profesional').val(data.registros[0].profesionales_id);
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
let url = "{{ route('adm_cm.asociar_profesional_existente')}}";

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



function registrar_limpieza_mantencion(){
    // abrir modal
    console.log('abrir modal');
    $('#registrar_personalaseoymantencion').modal('show');
}

</script>


@endsection

