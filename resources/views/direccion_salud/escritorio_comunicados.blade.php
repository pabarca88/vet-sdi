@extends('template.direccion_salud.template')

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
                            <li class="breadcrumb-item"><a href="{{ ROUTE('ministerio.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('ministerio.home') }}">Ministerio</a></li>
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
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="profesionales-tab" data-toggle="tab" href="#profesionales" role="tab" aria-controls="profesionales" aria-selected="false">Profesionales</a>
                            </li>
                            <li class="nav-item active">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pacientes-tab" data-toggle="tab" href="#pacientes" role="tab" aria-controls="pacientes" aria-selected="false">Pacientes</a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="directores_hosp-tab" data-toggle="tab" href="#directores_hosp" role="tab" aria-controls="directores_hosp" aria-selected="false">Directores medicos Hospital</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="directores_cm-tab" data-toggle="tab" href="#directores_cm" role="tab" aria-controls="otros_prof" aria-selected="false">Directores medicos CM</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="laboratorios-tab" data-toggle="tab" href="#laboratorios" role="tab" aria-controls="otros_prof" aria-selected="false">Laboratorios</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!--Cierre: Card Nav Pills-->
                <div class="tab-content" id="Profesionales_cm">
                    <!--Tab medicos-->
                    <div class="tab-pane fade active show" id="profesionales" role="tabpanel" aria-labelledby="profesionales-tab">
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
                                                        <button type="button" class="btn btn-sm btn-outline-light mr-3" onclick="enviar_mensaje_difusion()"><i class="feather icon-mail"></i> Difusión</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="table-responsive">
                                                    <table id="profesionales_ministerio" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="align-middle">Nombre / Rut</th>
                                                                <th class="align-middle">Especialidad</th>
                                                                <th class="align-middle">L. Atencion</th>
                                                                <th class="align-middle">Contacto</th>
                                                                <th class="align-middle">Mensaje</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(isset($lista_profesionales) && count($lista_profesionales) > 0)
                                                                @foreach ($lista_profesionales as $prof_medico )
                                                                    <tr>
                                                                        <td class="align-middle">
                                                                            <span><strong>{{ $prof_medico->nombre.' '.$prof_medico->apellido_uno.' '.$prof_medico->apellido_dos }}</strong></span><br>
                                                                            <span>{{ $prof_medico->rut }}</span>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <span>{{ $prof_medico->TipoEspecialidad->nombre ?? 'Sin especialidad' }}</span>
                                                                            @if (!empty($prof_medico->id_sub_tipo_especialidad))
                                                                                <br>
                                                                                <span>{{ $prof_medico->SubTipoEspecialidad->nombre }}</span>
                                                                            @endif
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <span>{{ $prof_medico->LugaresAtencion->first()->nombre ?? 'Sin lugar' }}</span>
                                                                        </td>
                                                                            <td class="align-middle text-center">
                                                                                <!--Botón Modal convenios-->
                                                                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="contacto({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fas fa-phone"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal roles y permisos-->
                                                                                <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="mensaje({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Mensaje" ><i class="feather icon-mail"></i></button>
                                                                                <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="historial({{ $prof_medico->id }});"  data-toggle="tooltip" data-placement="top" title="Historial"><i class="feather icon-mail"></i></button>
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

                    <!--Tab Pacientes-->
                    <div class="tab-pane fade" id="pacientes" role="tabpanel" aria-labelledby="pacientes-tab">
                        <div class="row">
                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Pacientes</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    {{-- <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_asistente();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo odontólogo</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_profesional();">Asociar odontólogo</button>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
										<div class="row">
                                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="table-responsive">
        											<table id="pacientes_ministerio" class="display table table-striped dt-responsive nowrap" style="width:100%">
        												<thead>
        													<tr>
        														<th class="align-middle">Nombre / Rut</th>
        														<th class="align-middle">Nacimiento</th>
        														<th class="align-middle">Convenio</th>
        														<th class="align-middle">Contacto</th>
        														<th class="align-middle">Mensaje</th>
        													</tr>
        												</thead>
        												<tbody>
        													@if(isset($lista_pacientes) && $lista_pacientes->count() > 0)
                                                            @foreach($lista_pacientes as $paciente)
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <span><strong>{{ $paciente->nombre.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos }}</strong></span><br>
                                                                        <span>{{ $paciente->rut }}</span>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <span>{{ $paciente->fecha_nac }}</span>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <span>Fonasa</span>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <!--Botón Modal contacto -->
                                                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $paciente->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <!--Botón Modal roles y permisos-->
                                                                        <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="mensaje({{ $paciente->id }});" data-toggle="tooltip" data-placement="top" title="Ver" ><i class="feather icon-mail"></i></button>
                                                                        <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="historial({{ $paciente->id }});"  data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-mail"></i></button>
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

                    <!--Tab Directores Hospital-->
                    <div class="tab-pane fade" id="directores_hosp" role="tabpanel" aria-labelledby="directores_hosp-tab">
                        <div class="row">
                          <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                           <div class="col-md-6">
                                                <h4 class="text-white f-20 mt-2 mb-2 float-left">Directores Medicos Hospital</h4>
                                            </div>
                                            <div class="col-md-6">
                                                {{-- <div class="btn-group mr-2 float-right mt- mb-">
                                                    <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_administrativo();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo profesional</button>
                                                    <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                    <div class="dropdown-menu">
                                                        <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_profesional();">Asociar Otros profesionales</button>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="table-responsive">
            										<table id="directores_hosp_ministerio" class="display table table-striped dt-responsive nowrap" style="width:100%">
            											<thead>
            												<tr>
            													<th class="align-middle">Nombre / Rut</th>
            													<th class="align-middle">Profesión/Especialidad</th>
            													<th class="align-middle">L. Atencion</th>
            													<th class="align-middle">Contacto</th>
            													<th class="align-middle">Info</th>
            													<th class="align-middle">Mensaje</th>
            												</tr>
            											</thead>
            											<tbody>
            												@if(isset($lista_directores_cm) && $lista_directores_cm->count() > 0)
                                                            @foreach($lista_directores_cm as $director_cm)
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <span><strong>{{ $director_cm->nombre.' '.$director_cm->apellido_uno.' '.$director_cm->apellido_dos }}</strong></span><br>
                                                                        <span>{{ $director_cm->rut }}</span>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        {{-- <span>{{ $prof_medico->TipoEspecialidad()->first()->nombre }}</span>
                                                                        @if (!empty($prof_medico->id_sub_tipo_especialidad))
                                                                            <br>
                                                                            <span>{{ $prof_medico->SubTipoEspecialidad()->first()->nombre }}</span>
                                                                        @endif --}}
                                                                    </td>
                                                                    <td class="align-middle">

                                                                    </td>
                                                                    <td class="align-middle">
                                                                            <!--Botón Modal contacto -->
                                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $director_cm->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <!--Botón Modal deposito-->
                                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datos_depositos({{ $director_cm->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Datos bancarios"><i class="feather icon-credit-card"></i></button>

                                                                            <!--Botón Modal horario-->
                                                                            {{-- <button type="button" class="btn btn-purple btn-sm btn-icon" onclick="horario_profesional_cm({{ $prof_medico->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y días de atención"><i class="feather icon-clock"></i></button> --}}
                                                                        </td>

                                                                        <td class="align-middle">
                                                                            <!--Botón Modal roles y permisos-->
                                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="mensaje({{ $director_cm->id }});" data-toggle="tooltip" data-placement="top" title="Ver" ><i class="feather icon-mail"></i></button>
                                                                            <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="historial({{ $director_cm->id }});"  data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-mail"></i></button>
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
                    <!-- Tab Directores CM -->
                    <div class="tab-pane fade" id="directores_cm" role="tabpanel" aria-labelledby="directores_cm-tab">
                        <div class="row">
                          <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                           <div class="col-md-6">
                                                <h4 class="text-white f-20 mt-2 mb-2 float-left">Directores Medicos CM</h4>
                                            </div>
                                            <div class="col-md-6">
                                                {{-- <div class="btn-group mr-2 float-right mt- mb-">
                                                    <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_administrativo();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo profesional</button>
                                                    <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                    <div class="dropdown-menu">
                                                        <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_profesional();">Asociar Otros profesionales</button>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="table-responsive">
            										<table id="directores_cm_ministerio" class="display table table-striped dt-responsive nowrap" style="width:100%">
            											<thead>
            												<tr>
            													<th class="align-middle">Nombre / Rut</th>
            													<th class="align-middle">Profesión/Especialidad</th>
            													<th class="align-middle">L. Atencion</th>
            													<th class="align-middle">Contacto</th>
            													<th class="align-middle">Info</th>
            													<th class="align-middle">Mensaje</th>
            												</tr>
            											</thead>
            											<tbody>
            												@if(isset($lista_directores_cm) && $lista_directores_cm->count() > 0)
                                                            @foreach($lista_directores_cm as $director_cm)
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <span><strong>{{ $director_cm->nombre.' '.$director_cm->apellido_uno.' '.$director_cm->apellido_dos }}</strong></span><br>
                                                                        <span>{{ $director_cm->rut }}</span>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        {{-- <span>{{ $prof_medico->TipoEspecialidad()->first()->nombre }}</span>
                                                                        @if (!empty($prof_medico->id_sub_tipo_especialidad))
                                                                            <br>
                                                                            <span>{{ $prof_medico->SubTipoEspecialidad()->first()->nombre }}</span>
                                                                        @endif --}}
                                                                    </td>
                                                                    <td class="align-middle">

                                                                    </td>
                                                                    <td class="align-middle">
                                                                            <!--Botón Modal contacto -->
                                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $director_cm->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <!--Botón Modal deposito-->
                                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datos_depositos({{ $director_cm->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Datos bancarios"><i class="feather icon-credit-card"></i></button>

                                                                            <!--Botón Modal horario-->
                                                                            {{-- <button type="button" class="btn btn-purple btn-sm btn-icon" onclick="horario_profesional_cm({{ $prof_medico->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y días de atención"><i class="feather icon-clock"></i></button> --}}
                                                                        </td>

                                                                        <td class="align-middle">
                                                                            <!--Botón Modal roles y permisos-->
                                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="mensaje({{ $director_cm->id }});" data-toggle="tooltip" data-placement="top" title="Ver" ><i class="feather icon-mail"></i></button>
                                                                            <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="historial({{ $director_cm->id }});"  data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-mail"></i></button>
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

                    <!-- Tab Laboratorios -->
                    <div class="tab-pane fade" id="laboratorios" role="tabpanel" aria-labelledby="laboratorios-tab">
                        <div class="row">
                          <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                           <div class="col-md-6">
                                                <h4 class="text-white f-20 mt-2 mb-2 float-left">Laboratorios</h4>
                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="table-responsive">
            										<table id="laboratorios_ministerio" class="display table table-striped dt-responsive nowrap" style="width:100%">
            											<thead>
            												<tr>
            													<th class="align-middle">Nombre / Rut</th>
            													<th class="align-middle">Profesión/Especialidad</th>
            													<th class="align-middle">L. Atencion</th>
            													<th class="align-middle">Contacto</th>
            													<th class="align-middle">Info</th>
            													<th class="align-middle">Mensaje</th>
            												</tr>
            											</thead>
            											<tbody>
            												@if(isset($lista_laboratorios) && $lista_laboratorios->count() > 0)
                                                            @foreach($lista_laboratorios as $director_cm)
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <span><strong>{{ $director_cm->nombre.' '.$director_cm->apellido_uno.' '.$director_cm->apellido_dos }}</strong></span><br>
                                                                        <span>{{ $director_cm->rut }}</span>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        {{-- <span>{{ $prof_medico->TipoEspecialidad()->first()->nombre }}</span>
                                                                        @if (!empty($prof_medico->id_sub_tipo_especialidad))
                                                                            <br>
                                                                            <span>{{ $prof_medico->SubTipoEspecialidad()->first()->nombre }}</span>
                                                                        @endif --}}
                                                                    </td>
                                                                    <td class="align-middle">

                                                                    </td>
                                                                    <td class="align-middle">
                                                                            <!--Botón Modal contacto -->
                                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $director_cm->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <!--Botón Modal deposito-->
                                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datos_depositos({{ $director_cm->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Datos bancarios"><i class="feather icon-credit-card"></i></button>

                                                                            <!--Botón Modal horario-->
                                                                            {{-- <button type="button" class="btn btn-purple btn-sm btn-icon" onclick="horario_profesional_cm({{ $prof_medico->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y días de atención"><i class="feather icon-clock"></i></button> --}}
                                                                        </td>

                                                                        <td class="align-middle">
                                                                            <!--Botón Modal roles y permisos-->
                                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="mensaje({{ $director_cm->id }});" data-toggle="tooltip" data-placement="top" title="Ver" ><i class="feather icon-mail"></i></button>
                                                                            <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="historial({{ $director_cm->id }});"  data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-mail"></i></button>
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
@include('direccion_salud.modal.mensaje_difusion')
@include('app.adm_cm.modal_adm.mensaje_profesional')
@include('app.adm_cm.modal_adm.contacto_usuario')
@include('app.adm_cm.modal_adm.historial_mensajes')
@endsection

@section('page-script')
<script>
        var myDropzone;
        var myDropzone_profesional;
        document.addEventListener('DOMContentLoaded', function() {
            $('#select_receptores').select2({
                allowClear: true,
                width: '100%'
            });
        });

       // inicializar dropzone de mensaje de difusion
        Dropzone.autoDiscover = false;
        myDropzone = new Dropzone("#mis-archivos-difusion-ministerio", {
            url: "{{ route('ministerio.imagen.carga') }}",
            autoProcessQueue: false,
            addRemoveLinks: true,
            uploadMultiple: true,
            parallelUploads: 5,
            maxFiles: 5,
            maxFilesize: 10,
            acceptedFiles: 'image/*, .pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx',
            dictDefaultMessage: 'Arrastra los archivos aquí para subirlos',
            dictFallbackMessage: 'Su navegador no soporta arrastrar y soltar para subir archivos.',
            dictFallbackText: 'Por favor utilice el fallback formado abajo para subir sus archivos como en los viejos tiempos.',
            dictFileTooBig: 'El archivo es muy grande (MiB). Tamaño máximo: MiB.',
            dictInvalidFileType: 'No puedes subir archivos de este tipo.',
            dictResponseError: 'Server responded with code.',
            dictCancelUpload: 'Cancelar subida',
            dictUploadCanceled: 'Subida cancelada.',
            dictCancelUploadConfirmation: '¿Estás seguro de que quieres cancelar esta subida?',
            dictRemoveFile: 'Eliminar archivo',
            dictMaxFilesExceeded: 'No puedes subir más archivos.',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            init: function() {
                console.log('init');
                var submitButton = document.querySelector("#submit-all");
                submitButton.addEventListener("click", function() {
                    myDropzone.processQueue(); // Procesar la cola de archivos
                });
                this.on("sendingmultiple", function(file, xhr, formData) {
                    // Agregar datos adicionales al formulario si es necesario
                    formData.append("additionalData", "value");
                });

                this.on("successmultiple", function(files, response) {
                    // Manejar la respuesta de éxito
                    console.log("Archivos subidos correctamente:", response);
                    alert("Archivos subidos correctamente");
                });

                this.on("errormultiple", function(files, response) {
                    // Manejar la respuesta de error
                    console.log("Error al subir los archivos:", response);
                    alert("Error al subir los archivos");
                });

                this.on("completemultiple", function(files) {
                    // Manejar la finalización de la subida
                    console.log("Subida completada para los archivos:", files);
                    // Puedes eliminar los archivos de la lista si lo deseas
                    files.forEach(file => myDropzone.removeFile(file));
                });
            }
        });

        // inicializar dropzone de mensaje a profesional
        var myDropzone_profesional = new Dropzone("#mis-archivos-a-profesional", {
            url: "{{ route('profesional.archivo.carga') }}",
            autoProcessQueue: false,
            addRemoveLinks: true,
            uploadMultiple: true, // Permitir múltiples archivos
            parallelUploads: 5,
            maxFiles: 5,
            maxFilesize: 10, // Máximo 10MB
            acceptedFiles: 'application/pdf,.doc,.docx,.xls,.xlsx,.csv',
            dictDefaultMessage: 'Arrastra los archivos aquí para subirlos!!',
            dictFallbackMessage: 'Su navegador no soporta arrastrar y soltar para subir archivos.',
            dictFallbackText: 'Por favor utilice el fallback formado abajo para subir sus archivos como en los viejos tiempos.',
            dictFileTooBig: 'El archivo es muy grande (MiB). Tamaño máximo: MiB.',
            dictInvalidFileType: 'No puedes subir archivos de este tipo.',
            dictResponseError: 'El servidor respondió con el código .',
            dictCancelUpload: 'Cancelar subida',
            dictUploadCanceled: 'Subida cancelada.',
            dictCancelUploadConfirmation: '¿Estás seguro de que quieres cancelar esta subida?',
            dictRemoveFile: 'Eliminar archivo',
            dictMaxFilesExceeded: 'No puedes subir más archivos.',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            init: function() {
                var submitButton = document.querySelector("#submit-all-profesional");
                submitButton.addEventListener("click", function() {
                    myDropzone_profesional.processQueue(); // Procesar la cola de archivos
                });

                this.on("sendingmultiple", function(file, xhr, formData) {
                    // Agregar datos adicionales al formulario si es necesario
                    formData.append("additionalData", "value");
                });

                this.on("successmultiple", function(files, response) {
                    // Manejar la respuesta de éxito
                    console.log("Archivos subidos correctamente:", response.errors);
                    alert("Archivos subidos correctamente");
                });

                this.on("errormultiple", function(files, response) {
                    // Manejar la respuesta de error
                    console.log("Error al subir los archivos:", response);
                    alert("Error al subir los archivos");
                });

                this.on("completemultiple", function(files) {
                    // Manejar la finalización de la subida
                    console.log("Subida completada para los archivos:", files);
                    // Puedes eliminar los archivos de la lista si lo deseas
                    files.forEach(file => myDropzone_profesional.removeFile(file));
                });
            }
        });
    function enviar_mensaje_difusion(){
        $('#modal_mensaje_difusion').modal('show');
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
                $('#historial_mensajes_profesional_body').html(html);
            },
            error: function(error){
                console.log(error);
            }
        })
    }

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

</script>
@endsection
