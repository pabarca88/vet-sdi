@extends('template.adm_cm.template')
@section('content')

<!--****Container Completo****-->
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
                            <h5 class="m-b-10 font-weight-bold">Profesionales del centro</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="adm_cm.home">Profesionales</a></li>
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
                            <li class="nav-item active">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="prof_salud-tab" data-toggle="tab" href="#prof-salud" role="tab" aria-controls="prof_-alud" aria-selected="false">Médicos</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="odontologos-tab" data-toggle="tab" href="#odontologos" role="tab" aria-controls="odontologos" aria-selected="false">Odontólogos</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="otros_prof-tab" data-toggle="tab" href="#otros_prof" role="tab" aria-controls="otros_prof" aria-selected="false">Otros Profesionales de la salud</a>
                            </li>
							<!--
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="personal_inst-tab" data-toggle="tab" href="#personal_inst" role="tab" aria-controls="otros_prof" aria-selected="false">Personal Institucional</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!--Cierre: Card Nav Pills-->
                <div class="tab-content" id="Profesionales_cm">
                    <!--Tab medicos-->
                    <div class="tab-pane fade active show" id="prof-salud" role="tabpanel" aria-labelledby="prof-salud-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Profesionales médicos</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light mr-3" onclick="enviar_mensaje_difusion()" @if(!$adm_medico) disabled @endif><i class="feather icon-mail"></i> Difusión</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="asociar_profesional();" @if(!$adm_medico) disabled @endif><i class="fa fa-plus" aria-hidden="true"></i> Asociar profesional</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="table-responsive">
                                                    <table id="profesionales_personal" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="align-middle">Nombre / Rut</th>
                                                                <th class="align-middle">Especialidad</th>
                                                                <th class="align-middle">Sucursales</th>
                                                                <th class="align-middle">Contacto</th>
            													<th class="align-middle">Info</th>
            													<th class="align-middle">Convenio</th>
                                                                <th class="align-middle">Mensaje</th>
                                                                <th class="align-middle">Historial</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($lista_profesionales['MEDICO'])
                                                                @foreach ($lista_profesionales['MEDICO'] as $prof_medico )
                                                                    <tr>
                                                                        <td class="align-middle">
                                                                            <span><strong>{{ $prof_medico->nombre.' '.$prof_medico->apellido_uno.' '.$prof_medico->apellido_dos }}</strong></span><br>
                                                                            <span>{{ $prof_medico->rut }}</span>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <span>{{ $prof_medico->TipoEspecialidad()->first()->nombre }}</span>
                                                                            @if (!empty($prof_medico->id_sub_tipo_especialidad))
                                                                                <br>
                                                                                <span>{{ $prof_medico->SubTipoEspecialidad()->first()->nombre }}</span>
                                                                            @endif
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            @foreach($prof_medico->LugaresAtencion()->get() as $key_lugar => $value_lugar)
                                                                                {{--  COMPLETAR CUANDO TENGAMOS SUCURSALES  --}}
                                                                                @if($institucion->id_lugar_atencion == $value_lugar->id)
                                                                                    <span>{{ $value_lugar->Direccion()->first()->direccion.', '.$value_lugar->Direccion()->first()->ciudad->nombre  }}</span><br>
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td class="align-middle">
                                                                                <!--Botón Modal contacto -->
                                                                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal deposito-->
                                                                                <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datos_depositos({{ $prof_medico->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Datos bancarios"><i class="feather icon-credit-card"></i></button>

                                                                                <!--Botón Modal horario-->
                                                                                <button type="button" class="btn btn-purple btn-sm btn-icon" onclick="horario_profesional_cm({{ $prof_medico->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y días de atención"><i class="feather icon-clock"></i></button>
                                                                            </td>
                                                                            <td class="align-middle text-center">
                                                                                <!--Botón Modal convenios-->
                                                                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm({{ $prof_medico->id }},{{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="feather icon-file-text"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal roles y permisos-->
                                                                                <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="mensaje({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Ver" @if(!$adm_medico) disabled @endif><i class="feather icon-mail"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal roles y permisos-->
                                                                                <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="historial({{ $prof_medico->id }});" @if(!$adm_medico) disabled @endif data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-mail"></i></button>
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
                        </div>
					</div>
                    <!--Cierre: Tab medicos-->

                    <!--Tab odontologos-->
                    <div class="tab-pane fade" id="odontologos" role="tabpanel" aria-labelledby="odontologos-tab">
                        <div class="row">
                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Profesionales odontólogos</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button class="btn btn-sm btn-outline-light" type="button"  onclick="asociar_profesional();">Asociar odontólogo</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
										<div class="row">
                                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="table-responsive">
        											<table id="profesionales_odonto" class="display table table-striped dt-responsive nowrap" style="width:100%">
        												<thead>
        													<tr>
        														<th class="align-middle">Nombre / Rut</th>
        														<th class="align-middle">Especialidad</th>
        														<th class="align-middle">Sucursales</th>
        														<th class="align-middle">Contacto</th>
        														<th class="align-middle">Info</th>
        														<th class="align-middle">Convenio</th>
        														<th class="align-middle">Mensajes</th>
                                                                <th class="align-middle">Historial</th>
        													</tr>
        												</thead>
        												<tbody>
        													@if($lista_profesionales['ODONTOLOG'])
                                                                @foreach ($lista_profesionales['ODONTOLOG'] as $prof_medico )
                                                                    <tr>
                                                                        <td class="align-middle">
                                                                            <span><strong>{{ $prof_medico->nombre.' '.$prof_medico->apellido_uno.' '.$prof_medico->apellido_dos }}</strong></span><br>
                                                                            <span>{{ $prof_medico->rut }}</span>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <span>{{ $prof_medico->TipoEspecialidad()->first()->nombre }}</span>
                                                                            @if (!empty($prof_medico->id_sub_tipo_especialidad))
                                                                                <br>
                                                                                <span>{{ $prof_medico->SubTipoEspecialidad()->first()->nombre }}</span>
                                                                            @endif
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            @foreach($prof_medico->LugaresAtencion()->get() as $key_lugar => $value_lugar)
                                                                                {{--  COMPLETAR CUANDO TENGAMOS SUCURSALES  --}}
                                                                                @if($institucion->id_lugar_atencion == $value_lugar->id)
                                                                                    <span>{{ $value_lugar->Direccion()->first()->direccion.', '.$value_lugar->Direccion()->first()->ciudad->nombre  }}</span><br>
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td class="align-middle">
                                                                                <!--Botón Modal contacto -->
                                                                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal deposito-->
                                                                                <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datos_depositos({{ $prof_medico->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Datos bancarios"><i class="feather icon-credit-card"></i></button>

                                                                                <!--Botón Modal horario-->
                                                                                <button type="button" class="btn btn-purple btn-sm btn-icon" onclick="horario_profesional_cm({{ $prof_medico->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y días de atención"><i class="feather icon-clock"></i></button>
                                                                            </td>
                                                                            <td class="align-middle text-center">
                                                                                <!--Botón Modal convenios-->
                                                                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="feather icon-file-text"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal roles y permisos-->
                                                                                <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="mensaje({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Ver" @if(!$adm_medico) disabled @endif><i class="feather icon-mail"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal roles y permisos-->
                                                                                <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="historial({{ $prof_medico->id }});" @if(!$adm_medico) disabled @endif data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-mail"></i></button>
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
                        </div>
                    </div>
                    <!--Cierre: Tab odontologos-->

                    <!--Tab otros profesionales-->
                    <div class="tab-pane fade" id="otros_prof" role="tabpanel" aria-labelledby="otros_prof-tab">
                        <div class="row">
                          <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                           <div class="col-md-6">
                                                <h4 class="text-white f-20 mt-2 mb-2 float-left">Otros profesionales de la salud</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group mr-2 float-right mt- mb-">
                                                    <button type="button" class="btn btn-sm btn-outline-light" onclick="asociar_profesional();">Asociar Otros profesionales</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="table-responsive">
            										<table id="profesionales_otros" class="display table table-striped dt-responsive nowrap" style="width:100%">
            											<thead>
            												<tr>
            													<th class="align-middle">Nombre / Rut</th>
            													<th class="align-middle">Profesión/Especialidad</th>
            													<th class="align-middle">Sucursales</th>
            													<th class="align-middle">Contacto</th>
            													<th class="align-middle">Info</th>
            													<th class="align-middle">Convenio</th>
                                                                <th class="align-middle">Mensaje</th>
                                                                <th class="align-middle">Historial</th>
            												</tr>
            											</thead>
            											<tbody>
            												@if($lista_profesionales['OTROS'])
                                                                @foreach ($lista_profesionales['OTROS'] as $prof_medico )
                                                                    <tr>
                                                                        <td class="align-middle">
                                                                            <span><strong>{{ $prof_medico->nombre.' '.$prof_medico->apellido_uno.' '.$prof_medico->apellido_dos }}</strong></span><br>
                                                                            <span>{{ $prof_medico->rut }}</span>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <span>{{ $prof_medico->TipoEspecialidad()->first()->nombre }}</span>
                                                                            @if (!empty($prof_medico->id_sub_tipo_especialidad))
                                                                                <br>
                                                                                <span>{{ $prof_medico->SubTipoEspecialidad()->first()->nombre }}</span>
                                                                            @endif
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            @foreach($prof_medico->LugaresAtencion()->get() as $key_lugar => $value_lugar)
                                                                                {{--  COMPLETAR CUANDO TENGAMOS SUCURSALES  --}}
                                                                                @if($institucion->id_lugar_atencion == $value_lugar->id)
                                                                                    <span>{{ $value_lugar->Direccion()->first()->direccion.', '.$value_lugar->Direccion()->first()->ciudad->nombre  }}</span><br>
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td class="align-middle">
                                                                                <!--Botón Modal contacto -->
                                                                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal deposito-->
                                                                                <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datos_depositos({{ $prof_medico->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Datos bancarios"><i class="feather icon-credit-card"></i></button>

                                                                                <!--Botón Modal horario-->
                                                                                <button type="button" class="btn btn-purple btn-sm btn-icon" onclick="horario_profesional_cm({{ $prof_medico->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y días de atención"><i class="feather icon-clock"></i></button>
                                                                            </td>
                                                                            <td class="align-middle text-center">
                                                                                <!--Botón Modal convenios-->
                                                                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="feather icon-file-text"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal roles y permisos-->
                                                                                <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="mensaje({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Ver" @if(!$adm_medico) disabled @endif><i class="feather icon-mail"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal roles y permisos-->
                                                                                <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="historial({{ $prof_medico->id }});" @if(!$adm_medico) disabled @endif data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-mail"></i></button>
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
                        </div>
                    </div>
                    <!--Cierre: Tab personal administrativo-->
                </div>
                </div>
			</div>
		</div>
	</div>
</div>
<!--****Cierre Container Completo****-->
<input type="hidden" name="id_profesional_mensaje" id="id_profesional_mensaje" value="">
@endsection

@section('js-profesionales')
    <script>
$(document).ready(function(){
        $('#msj_para_difusion').select2();
        $('#adjunto').dropzone();
    });
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

        /** Modals datos bancarios */
        function datos_depositos(id) {

            $('#liquidaciones').html('');
            $('#liquidacion_pills').html('');
            let url = "{{ route('profesional.liquidacion_ver_profesional') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_seccion: id
                },
            })
            .done(function(data) {
                if (data.estado == 1)
                {
                    console.log(data.registros);
                    /** encontrado */
                    $('#liquidaciones').html('');
                    $('#liquidacion_pills').html('');


                    $.each(data.registros, function( index, element ) {
                        /** pills */
                        var html_p = '';
                        html_p += '<li class="nav-item">';
                        if(element.principal == 1)
                            html_p += '    <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="liquidacion_'+index+'-tab" data-toggle="tab" href="#liquidacion_'+index+'" role="tab" aria-controls="liquidacion_'+index+'" aria-selected="true">'+element.banco.nombre+'</a>';
                        else
                            html_p += '    <a class="btn btn-outline-info btn-sm mr-1 my-1" id="liquidacion_'+index+'-tab" data-toggle="tab" href="#liquidacion_'+index+'" role="tab" aria-controls="liquidacion_'+index+'" aria-selected="false">'+element.banco.nombre+'</a>';
                        html_p += '</li>';
                        $('#liquidacion_pills').append(html_p);

                        /** cuerpo */
                        var activo = ' active show ';

                        var html = '';
                        html += '<!-- tab '+index+'-->';
                        if(element.principal == 1)
                            html += '<div class="tab-pane fade '+activo+'" id="liquidacion_'+index+'" role="tabpanel" aria-labelledby="liquidacion_'+index+'-tab">';
                        else
                            html += '<div class="tab-pane fade " id="liquidacion_'+index+'" role="tabpanel" aria-labelledby="liquidacion_'+index+'-tab">';
                        html += '<div class="row info-basica" id="info-basica-1">';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_rut">'+element.serie+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Titular</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_nombre">'+element.autor+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Banco</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_banco">'+element.banco.nombre+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Cuenta</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_cuenta">'+element.numero_control+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Tipo Cuenta</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_tipo_cuenta">'+element.otro+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Correo electrónico</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_email">'+element.email+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Principal</label>';
                        if(element.principal == 1)
                            html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_principal">Principal</div>';
                        else
                            html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_principal">Opcional</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '</div>';
                        html += '</div>';
                        $('#liquidaciones').append(html);
                    });

                    $('#dat_bancarios').modal('show');
                }
                else
                {
                    /** no encontrado */
                    swal({
                        title: "El Profesional no posee cuentas registradas.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        /** Modals Horario */
        function horario_profesional_cm(id_profesional, id_lugar_atencion) {

            $('#mi_horario_table tbody').html('');
            let url = "{{ route('adm_cm.prof_horario_lugar_atencion') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_profesional: id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                },
            })
            .done(function(data) {
                console.log(data.length);
                if (data != null && data.length > 0) {
                    data = data;
                    console.log(data);

                    for (i = 0; i < data.length; i++) {
                        let id = data[i].id;
                        let hora_inicio = data[i].hora_inicio;
                        let hora_termino = data[i].hora_termino;
                        let dia = '';
                        dias = data[i].dia.split(',');
                        for (let i = 0; i < dias.length; i++) {
                            if (dias[i] == 1) {
                                dia += 'Lunes '
                            } else if (dias[i] == 2) {
                                dia += 'Martes '
                            } else if (dias[i] == 3) {
                                dia += 'Miercoles '
                            } else if (dias[i] == 4) {
                                dia += 'Jueves '
                            } else if (dias[i] == 5) {
                                dia += 'Viernes '
                            }
                        }

                        let j = 1; //contador para asignar id al boton que borrara la fila
                        var fila = '';
                        fila += '<tr class="tr_horario" id="row' + j +'">';
                        fila += '<td class="align-left">' + dia + '</td>';
                        fila += '<td class="align-left">'+hora_inicio + '</td>';
                        fila += '<td class="align-left">' + hora_termino + '</td>';
                        fila += '</tr>';

                        j++;

                        $('#mi_horario_table tbody').append(fila);
                        // $('#mi_horario_table').dataTable({
                        //     "searching": false,
                        //     responsive: true,
                        // })

                        $('#horario_usuario').modal('show');

                    }

                } else {
                    swal({
                        title: "El Profesional no ha configurado su horario.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function mensaje(id) {
            console.log(id);
            let url = "{{ ROUTE('adm_cm.dame_profesional_cm') }}";
            $.ajax({
                type:'post',
                url: url,
                data:{
                    id:id,
                    _token:CSRF_TOKEN
                },
                success: function(resp){
                    $('#id_profesional_mensaje').val(id);
                    console.log(resp);
                    let profesional = resp.profesional;
                    $('#para_destino').val(profesional.nombre+" "+profesional.apellido_uno+" "+profesional.apellido_dos);
                    $('#mensaje_profesional').modal('show');
                },
                error: function(error){
                    console.log(error);
                }
            })

        }

        function enviar_mensaje_difusion() {
            $('#mensaje_difusion').modal('show');
        }

        function historial(id){
            // abrir modal de historial
            $('#historial_mensajes_profesional').modal('show');
            let url = "{{ ROUTE('adm_cm.historial_mensajes_profesional',['id' => '__ID__']) }}";
            url = url.replace('__ID__',id);

            $.ajax({
                type:'get',
                url: url,
                success: function(resp){
                    console.log(resp);
                    let mensajes = resp.mensajes;
                    let html = '';
                    if(mensajes.length == 0){
                        html += '<div class="row">';
                        html += '<div class="col-md-12">';
                        html += '<div class="card">';
                        html += '<div class="card-header">';
                        html += '<h4 class="card-title">No hay mensajes</h4>';
                        html += '</div>';
                        html += '<div class="card-body">';
                        html += '<p>No hay mensajes enviados a este profesional.</p>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }else{
                        mensajes.forEach(mensaje => {
                            html += '<div class="row">';
                            html += '<div class="col-md-12">';
                            html += '<div class="card">';
                            html += '<div class="card-header">';
                            html += '<h4 class="card-title">'+mensaje.datos_mensaje.titulo+'</h4>';
                            html += '</div>';
                            html += '<div class="card-body">';
                            html += '<p>'+mensaje.datos_mensaje.mensaje+'</p>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                        });
                    }

                    $('#historial_mensajes_profesional_body').html(html);
                },
                error: function(error){
                    console.log(error);
                }
            })
        }

    </script>
@endsection

@section('page-script')
<script>

</script>
@endsection

@section('modales-profesionales_inst')
    @include('app.adm_cm.modal_adm.asociar_profesional')
    @include('app.adm_cm.modal_adm.mensaje_profesional')
    @include('app.adm_cm.modal_adm.mensaje_difusion')
    @include('app.adm_cm.modal_adm.historial_mensajes')

    @include('app.adm_cm.modal_adm.datos_banco')
    @include('app.adm_cm.modal_adm.horario_usuario')
    @include('app.adm_cm.modal_adm.convenio_usuario')
    @include('app.adm_cm.modal_adm.contacto_usuario')
    {{-- @include('app.adm_cm.modales.personal.contacto_personal') --}}
    {{--  @include('app.adm_cm.modal_adm.editar_profesional')  --}}
    {{--  @include('app.adm_cm.modal_adm.registrar_profesional')  --}}
    {{--  @include('app.adm_cm.modal_adm.roles_permisos_prof')  --}}
    @include('app.adm_cm.modal_adm.liquidacion_profesionales')
@endsection


