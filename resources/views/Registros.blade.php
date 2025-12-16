@extends('template/template')
{{ view('template/header') }}
{{ view('template/menuProfesional') }}

@section('Content')


    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 text-white" style="font-size: 1.2rem;"><strong>Registro de Atención Médica
                                        Actual</strong></h5>
                                <h5><span class="badge badge-pill badge-info">03/07/2021</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Menú Pills-->
            <div class="row mx-4 mt-n4 mb-0">
                <div class="col-sm-12 sin_padding bg-info">
                    <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                                aria-controls="pills-home" aria-selected="true">
                                Ficha Clínica</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                href="#pills-formularios-atencion" role="tab" aria-controls="pills-formularios-atencion"
                                aria-selected="false">
                                Licencia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-fmu-tab" data-toggle="pill" href="#pills-fmu" role="tab"
                                aria-controls="pills-fmu" aria-selected="false">
                                Ficha Médica Única</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-atencion-previas-tab" data-toggle="pill"
                                href="#pills-atencion-previas" role="tab" aria-controls="pills-atencion-previas"
                                aria-selected="false">
                                Atenciones Médicas Previas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-examenes-tab " data-toggle="pill" href="#pills-examenes"
                                role="tab" aria-controls="pills-examenes" aria-selected="false">
                                Resultados de Examenes</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Cierre: Menú Pills-->

            <!--Contenido Pills-->
            <div class="row mx-4 mt-0" style=" height:780px; overflow: scroll;">
                <div class="col-sm-12 rounded-bottom" style="background-color: #fff;">
                    <div class="tab-content" id="pills-tabContent">
                        <!--Ficha Atención General-->
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="col-sm-12">
                                <h5 class="text-c-blue mt-5 mb-4" style="font-size: 1.1rem;">
                                    Ficha de Atención General
                                </h5>
                                <div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <form action="{{ route('crear.ficha_atencion') }}" method="post">
                                @csrf
                                <!--Formulario /Motivo de la Consulta-->

                                <!--REVISAR-->
                                <input type="hidden" name="examenes" id="examenes" value="">
                                <input type="hidden" name="medicamentos" id="medicamentos" value="">
                                <!--REVISAR-->

                                <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}"
                                    id="id_paciente_fc">
                                <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}"
                                    id="id_profesional_fc">
                                <div class="col-sm-12">
                                    <div class="card mb-3">
                                        <div class="card-header bg-info">
                                            <h6>Motivo de la Consulta</h6>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Descripción</label>
                                                    <input name="motivo_consulta" id="motivo_consulta" type="text"
                                                        value="{{ old('motivo_consulta') }}"
                                                        class="
                                                            form-control form-control-sm @error('motivo_consulta') is-invalid @enderror">
                                                    @error('motivo_consulta')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--Cierre: Formulario /Motivo de la Consulta-->

                                <!--Formulario / Antecedentes-->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Antecedentes</h6>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Descripción</label>
                                                    <textarea
                                                        class="form-control caja-texto form-control-sm @error('antecedentes') is-invalid @enderror"
                                                        rows="1" value="{{ old('antecedentes') }}" name="antecedentes"
                                                        id="antecedentes"></textarea>

                                                    @error('antecedentes')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--Cierre: Formulario / Antecedentes-->
                                <!--Formulario / Examen Físico-->
                                <div class="col-sm-12 mt-3">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Examen Físico</h6>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Descripción</label>
                                                    <textarea
                                                        class="form-control caja-texto form-control-sm @error('examen_fisico') is-invalid @enderror"
                                                        rows="1" value="{{ old('examen_fisico') }}" name="examen_fisico"
                                                        id="examen_fisico"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--Cierre: Formulario / Examen Físico-->
                                <!--Formulario / Diagnóstico-->
                                <div class="col-sm-12 mt-3">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Diagnóstico</h6>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Hipótesis Diagnóstica</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm @error('hipotesis_diagnostico') is-invalid @enderror"
                                                        value="{{ old('hipotesis_diagnostico') }}"
                                                        name="hipotesis_diagnostico" id="hipotesis_diagnostico">
                                                    @error('hipotesis_diagnostico')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Diagnóstico CIE-10</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm @error('diagnostico') is-invalid @enderror"
                                                        value="{{ old('diagnostico') }}" name="diagnostico"
                                                        id="diagnostico">

                                                    @error('diagnostico')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--Cierre: Formulario / Diagnóstico-->
                                <!--Otros Formularios-->
                                <div class="row px-3">
                                    <!--Modal Indicar Medicamentos-->
                                    <div id="modal_indicar_medicamentos" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="modal_indicar_examen" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info">
                                                    <h5 class="modal-title text-white mt-1" id="modal_indicar_medicamentos">
                                                        Indicar Medicamento</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-row">
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Ingrese Medicamento</label>
                                                                <select class="form-control form-control-sm"
                                                                    data-live-search="true" id="id_medicamento"
                                                                    name="id_medicamento">
                                                                    <option value="0">Seleccione</option>
                                                                    @if (isset($medicamento))
                                                                        @foreach ($medicamento as $m)
                                                                            <option value="{{ $m->id }}">
                                                                                {{ $m->nombre_medicamento }}</option>
                                                                        @endforeach
                                                                    @endif

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Seleccione
                                                                    Presentaci&oacute;n</label>
                                                                <select class="form-control form-control-sm"
                                                                    id="presentacion" name="presentacion">

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Seleccione Dosis</label>
                                                                <select class="form-control form-control-sm" id="dosis"
                                                                    name="dosis">

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Seleccione Frecuencia</label>
                                                                <select class="form-control form-control-sm" id="frecuencia"
                                                                    name="frecuencia">

                                                                    <option value="1">4 horas</option>
                                                                    <option value="2">6 horas</option>
                                                                    <option value="3">8 horas</option>
                                                                    <option value="4">12 horas</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Ingresé Comentarios</label>
                                                                <input type="text" name="comentario" id="comentario">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Periodo</label>
                                                                <select class="form-control form-control-sm" id="periodo"
                                                                    name="periodo">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">SOS</option>
                                                                    <option value="2">Dosis unica</option>
                                                                    <option value="3">3 d&iacute;as</option>
                                                                    <option value="4">5 d&iacute;as</option>
                                                                    <option value="5">7 d&iacute;as</option>
                                                                    <option value="6">10 d&iacute;as</option>
                                                                    <option value="7">15 d&iacute;as</option>
                                                                    <option value="8">30 d&iacute;as</option>
                                                                    <option value="9">Permanente</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <button type="button" id="agregar_medicamento"
                                                                class="btn btn-success btn-sm float-right"><i
                                                                    class="fa fa-plus"></i> Agregar
                                                                Medicamento</button>
                                                        </div>
                                                        <div class="col-sm-12 mt-3">
                                                            <!--**** Al agregar un medicamento, se debe cargar la tabla *****-->
                                                            <!--Tabla-->
                                                            <div class="table-responsive">
                                                                <p>Elementos en la Tabla:
                                                                <div id="adicionados1"></div>
                                                                </p>
                                                                <table id="tabla_medicamento"
                                                                    class="table table-bordered table-sm">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-center align-middle">
                                                                                Medicamento
                                                                            </th>
                                                                            <th class="text-center align-middle">
                                                                                Presentación</th>
                                                                            <th class="text-center align-middle">Dosis</th>
                                                                            <th class="text-center align-middle">Frecuencia
                                                                            </th>
                                                                            <th class="text-center align-middle">Periodo
                                                                            </th>
                                                                            <th class="text-center align-middle">
                                                                                Comentarios</th>
                                                                            <th class="text-center align-middle">Acción
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!--Cierre: Tabla-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-info">
                                                        Guardar</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--Cierre: Indicar Medicamentos-->
                                    <!--Modal Indicar Examenes-->
                                    <div id="modal_indicar_examen" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="modal_indicar_examen" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info">
                                                    <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">
                                                        Indicar
                                                        Examen</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-row">
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Tipo Examen</label>
                                                                <select class="form-control form-control-sm"
                                                                    name="tipo_examen" id="tipo_examen">
                                                                    <option value="0">Seleccione</option>
                                                                    @foreach ($tipo_examen as $te)
                                                                        <option value="{{ $te->id }}">
                                                                            {{ $te->nombre_tipo_examen }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Sub-tipo de Examen</label>
                                                                <select class="form-control form-control-sm"
                                                                    id="sub_tipo_examen" name="sub_tipo_examen">

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Examen</label>
                                                                <select class="form-control form-control-sm" id="examen"
                                                                    name="examen">

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Prioridad</label>
                                                                <select class="form-control form-control-sm" id="prioridad"
                                                                    name="prioridad">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">Baja</option>
                                                                    <option value="2">Media</option>
                                                                    <option value="3">Alta</option>
                                                                    <option value="4">Urgente</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <button type="button" id="agregar_examen"
                                                                class="btn btn-success btn-sm float-right">
                                                                <i lass="fa fa-plus"></i>
                                                                Agregar Examen
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-12 mt-3">
                                                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                                                            <!--Tabla-->
                                                            <div class="table-responsive">
                                                                <p>Elementos en la Tabla:
                                                                <div id="adicionados"></div>
                                                                </p>
                                                                <table id="tabla_examen"
                                                                    class="table table-bordered table-sm">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-center align-middle">Nombre
                                                                                Examen</th>
                                                                            <th class="text-center align-middle">Tipo</th>
                                                                            <th class="text-center align-middle">Prioridad
                                                                            </th>
                                                                            <th class="text-center align-middle">Acción
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="tb_tabla_examen">

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!--Cierre Tabla-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-info">
                                                        Guardar</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--Cierre: Indicar Examenes-->

                                    <div class="col-md-6 mx-auto">
                                        <!--Botón Modal 01 / Indicar Medicamentos-->
                                        <button type="button" class="btn btn-success btn-block btn-sm mt-1"
                                            data-toggle="modal" data-target="#modal_indicar_medicamentos"><i
                                                class="fa fa-plus"></i> Indicar
                                            Medicamento</button>
                                        <!--Cierre: Botón Modal 01 / Indicar Medicamentos-->
                                    </div>
                                    <div class="col-md-6 mx-auto">
                                        <!--Botón Modal 02 / Indicar Examenes-->
                                        <button type="button" class="btn btn-success btn-block btn-sm mt-1"
                                            data-toggle="modal" data-target="#modal_indicar_examen"><i
                                                class="fa fa-plus"></i> Indicar
                                            Examen</button>
                                        <!--Cierre: Botón Modal 02 / Indicar Examenes-->
                                    </div>
                                </div>
                                <div class="row px-3 mt-3 mb-3">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="cronico" name="cronico">
                                                <label for="cronico" class="cr"></label>
                                            </div>
                                            <label>¿Es enfermo crónico?</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="ges" name="ges">
                                                <label for="ges" class="cr"></label>
                                            </div>
                                            <label>Ges</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="confidencial" name="confidencial">
                                                <label for="confidencial" class="cr"></label>
                                            </div>
                                            <label>Confidencial</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" id="guardar_ficha" class="btn btn-info">Ingresar Ficha
                                                Atención</button>
                                            <button type="button" class="btn btn-success">Imprimir</button>
                                        </div>
                                    </div>
                                </div>
                            </form>


                        </div>
                        <!--Cierre: Ficha Atención General-->

                        <!--Formularios de Licencia-->
                        <div class="tab-pane fade" id="pills-formularios-atencion" role="tabpanel"
                            aria-labelledby="pills-formularios-atencion-tab">
                            <div class="row pl-2 pr-4">
                                <div class="col-md-12 mx-auto">
                                    <h5 class="text-c-blue mt-5 mb-4" style="font-size: 1.1rem;">Formulario de Licencias
                                        Médicas
                                    </h5>

                                    <span class="error" id="paciente" name="nombre_trabajador"></span>

                                    <div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <form method="post" action="{{ route('crear.licencia') }}">
                                <div class="row pl-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="tipo_licencia_1" checked>
                                                <label for="tipo_licencia_1" class="cr"></label>
                                            </div>
                                            <label>Enfermedad común o maternal</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="tipo_licencia_2" checked>
                                                <label for="tipo_licencia_2" class="cr"></label>
                                            </div>
                                            <label>Laboral</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Información del trabajador</h6>
                                        </div>
                                        <div class="card-body">
                                            <div id="paciente_buscar">
                                                <div class="form-row">
                                                    <div class="form-group fill col-md-4">
                                                        <label class="floating-label">
                                                            Previsión
                                                        </label>
                                                        <select class="form-control form-control-sm" name="prevision"
                                                            id="prevision">
                                                            <option value="0">Seleccione</option>
                                                            @foreach ($prevision as $p)
                                                                <option value="{{ $p->id }}">{{ $p->nombre }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Rut</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="rut_trabajador" id="rut_trabajador">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <button type="button" id="buscar_btn"
                                                            class="btn btn-sm btn-success btn-block"
                                                            onclick="buscarpaciente()">Verificar</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Empleador</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Nombre</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="nombre_empleador" id="nombre_empleador">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Rut</label>
                                                        <input type="person" class="form-control form-control-sm"
                                                            name="rut" id="rut">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Reposo</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Desde</label>
                                                        <input type="date" name="daterange"
                                                            class="form-control form-control-sm" />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Hasta</label>
                                                        <input type="date" name="daterange"
                                                            class="form-control form-control-sm" />
                                                    </div>
                                                    <div class="form-group fill col-md-4">
                                                        <label class="floating-label">
                                                            Tipo de reposo
                                                        </label>
                                                        <select class="form-control form-control-sm" name="tipo_reposo"
                                                            id="tipo_reposo">
                                                            <option>Seleccione una opción</option>
                                                            <option>Total</option>
                                                            <option>Mañana</option>
                                                            <option>Tarde</option>
                                                            <option>Otro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group fill col-md-4">
                                                        <label class="floating-label">
                                                            Lugar de reposo
                                                        </label>
                                                        <select class="form-control form-control-sm" name="tipo_reposo"
                                                            id="tipo_reposo">
                                                            <option>Seleccione una opción</option>
                                                            <option>Domicilio personal</option>
                                                            <option>Domicilio de familiar</option>
                                                            <option>Otro</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Dirección</label>
                                                        <input type="person" class="form-control form-control-sm"
                                                            name="direccion" id="direccion">
                                                    </div>
                                                    <div class="form-group col-sm-4 col-md-4">
                                                        <label class="floating-label">Región / Comuna</label>
                                                        <select id="region_comuna" name="region_comuna"
                                                            class="form-control form-control-sm">
                                                            <option selected value="0">Seleccione una opción </option>
                                                            <optgroup label="Región de Valparaíso">
                                                                <option>Viña del Mar</option>
                                                                <option>Valparaíso</option>
                                                                <option>San Felipe</option>
                                                                <option>etc...</option>
                                                            </optgroup>
                                                            <optgroup label="Región Metropolitana">
                                                                <option>Santiago</option>
                                                                <option>Maipú</option>
                                                                <option>etc...</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Información de licencia</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group fill col-md-4 mt-2">
                                                        <label class="floating-label">
                                                            Tipo de Licencia
                                                        </label>
                                                        <select class="form-control d-inline form-control-sm" name=""
                                                            id="">
                                                            <option>Seleccione</option>
                                                            <option>..</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div class="switch switch-success d-inline m-r-2">
                                                            <input type="checkbox" id="info_licencia_1" checked>
                                                            <label for="info_licencia_1" class="cr"></label>
                                                        </div>
                                                        <label>Recuperabilidad Laboral</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <div class="switch switch-success d-inline m-r-2">
                                                            <input type="checkbox" id="info_licencia_2" checked>
                                                            <label for="info_licencia_2" class="cr"></label>
                                                        </div>
                                                        <label>Inicio Trámite de Invalidez</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Diagnóstico principal</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group fill col-sm-6 col-md-6">
                                                        <label class="floating-label">
                                                            CIE-10
                                                        </label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="cie_10" id="cie_10">
                                                    </div>
                                                    <div class="form-group col-sm-6 col-md-6">
                                                        <label class="floating-label">Diagnóstico</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="descripcion" id="descripcion">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Otros antecedentes</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12">
                                                        <label class="floating-label">Descripción</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="descripcion" id="descripcion">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Examenes de apoyo</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <input type="file" class="form-control-file pb-3"
                                                    id="exampleFormControlFile1">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-info">Guardar Licencia</button>
                                        <button type="button" class="btn btn-success">Imprimir</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Cierre: Formularios de Licencia-->

                        <!--Acceso Ficha Médica Única (FMU)-->
                        <div class="tab-pane fade" id="pills-fmu" role="tabpanel" aria-labelledby="pills-fmu-tab">
                            <div class="row">
                                <!--Ingreso a Ficha Médica Única
                                                    <div class="col-md-4 mx-auto m-ingreso-ficha">

                                                        <div class="row">
                                                            <div class="col-sm-12 text-center">
                                                                <img src="../assets/images/iconos/candado.svg" alt=""
                                                                    class="img-fluid mb-4 wid-90">
                                                                <p class="f-w-400 mb-4">Ingrese uno de los códigos de seguridad que se le ha
                                                                    enviado por correo electrónico</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label class="floating-label" for="password">Código de
                                                                            seguridad</label>
                                                                        <input type="password" class="form-control form-control-sm" name=""
                                                                            id="" placeholder="">
                                                                    </div>
                                                                </form>
                                                                <button class="btn btn-sm btn-block btn-info mb-2">
                                                                    Acceder a Ficha Médica Única
                                                                </button>
                                                                <p class="mb-2 text-muted text-center">¿No has recibido los códigos de
                                                                    seguridad?<br> podemos <a href="recuperarclave.php"
                                                                        class="f-w-400 text-dark"> volver a enviarlos</a></p>
                                                            </div>
                                                        </div>
                                                        Cierre: Ingreso a Ficha Médica Única
                                                    </div>-->

                                <div class="col-md-11 mx-auto">
                                    <div id="accordion">
                                        <!--Antecedentes básicos del paciente-->
                                        <div class="card">
                                            <div class="card-header" id="headingUno">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse"
                                                        data-target="#collapseUno" aria-expanded="true"
                                                        aria-controls="collapseUno">
                                                        ANTECEDENTES BÁSICOS DEL PACIENTE
                                                    </button>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseUno" class="collapse bg-accordion"
                                                aria-labelledby="headingUno" data-parent="#accordion">
                                                <div class="card-body pt-1 pb-1">
                                                    <div class="row">
                                                        <div class="col-md-10 mx-auto">
                                                            <div class="card-deck mb-3">
                                                                <div class="card rounded mt-3 mb-3 border-primary">
                                                                    <div class="card-header titulo-card rounded-top">
                                                                        <h6 class="card-title titulo-text mt-2 mb-2">
                                                                            Información del Paciente</h6>
                                                                    </div>
                                                                    <div class="card-body pt-2 pb-1">
                                                                        <ul class="d-inline">
                                                                            <li class="mt-2 mb-2">
                                                                                <span><strong>Nombre:</strong></span>&nbsp;&nbsp;
                                                                                <span>{{ $paciente->nombre }}</span>
                                                                            </li>
                                                                            <li class="mt-2 mb-2">
                                                                                <span><strong>Apellidos:</strong></span>
                                                                                &nbsp;&nbsp;&nbsp;
                                                                                <span>{{ $paciente->apellido_uno }}</span>&nbsp;
                                                                                <span>{{ $paciente->apellido_dos }}</span>
                                                                            </li>
                                                                            <li class="mt-2 mb-2">
                                                                                <span><strong>Rut:</strong></span>
                                                                                &nbsp;&nbsp;&nbsp;
                                                                                <span>{{ $paciente->rut }}</span>
                                                                            </li>
                                                                            <li class="mt-2 mb-2">
                                                                                <span><strong>Edad:</strong></span>&nbsp;&nbsp;&nbsp;
                                                                                <span>{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}</span>
                                                                            </li>
                                                                            <li class="mt-2 mb-2">
                                                                                <span><strong>Teléfono:</strong></span>&nbsp;&nbsp;&nbsp;
                                                                                <span>
                                                                                    {{ $paciente->telefono_uno }}&nbsp;&nbsp;&nbsp;{{ $paciente->telefono_dos }}
                                                                                </span>
                                                                            </li>
                                                                            <li class="mt-2 mb-2">
                                                                                <span><strong>Dirección:</strong></span>&nbsp;&nbsp;&nbsp;
                                                                                <span>{{ $paciente->direccion }}</span>
                                                                            </li>
                                                                            <li class="mt-2 mb-2">
                                                                                <span><strong>Comuna/Región:</strong></span>&nbsp;&nbsp;&nbsp;
                                                                                <span>{{ $paciente->ciudad }},
                                                                                    {{ $paciente->region }}</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="card rounded mt-3 mb-3 border-primary">
                                                                    <div class="card-header titulo-card rounded-top">
                                                                        <h6 class="card-title text-danger mt-2 mb-2">
                                                                            Contacto de Emergencia</h6>
                                                                    </div>
                                                                    <div class="card-body pt-2 pb-1">
                                                                        <ul class="d-inline">
                                                                            <li class="mt-2 mb-2">
                                                                                <span><strong>Nombre:</strong></span>&nbsp;&nbsp;
                                                                                <span>{{ $contacto->nombre_contacto }}</span>
                                                                            </li>
                                                                            <li class="mt-2 mb-2">
                                                                                <span><strong>Apellidos:</strong></span>&nbsp;&nbsp;&nbsp;
                                                                                <span>{{ $contacto->apellido_uno_contacto }}</span>&nbsp;
                                                                                <span>{{ $contacto->apellido_dos_contacto }}</span>
                                                                            </li>
                                                                            <li class="mt-2 mb-2">
                                                                                <span><strong>Rut:</strong></span>&nbsp;&nbsp;&nbsp;
                                                                                <span>{{ $contacto->rut_contacto }}</span>
                                                                            </li>
                                                                            <li class="mt-2 mb-2">
                                                                                <span><strong>Edad:</strong></span>&nbsp;&nbsp;&nbsp;
                                                                                <span>{{ \Carbon\Carbon::parse($contacto->fecha_nac_contacto)->diff(\Carbon\Carbon::now())->format('%y') }}</span>
                                                                            </li>
                                                                            <li class="mt-2 mb-2">
                                                                                <span><strong>Teléfono:</strong></span>&nbsp;&nbsp;&nbsp;
                                                                                <span>
                                                                                    {{ $contacto->telefono_uno_contacto }}&nbsp;&nbsp;&nbsp;{{ $contacto->telefono_dos_contacto }}
                                                                                </span>
                                                                            </li>
                                                                            <li class="mt-2 mb-2">
                                                                                <span><strong>Dirección:</strong></span>&nbsp;&nbsp;&nbsp;
                                                                                <span>{{ $contacto->direccion_contacto }}</span>
                                                                            </li>
                                                                            <li class="mt-2 mb-2">
                                                                                <span><strong>Comuna/Región:</strong></span>&nbsp;&nbsp;&nbsp;
                                                                                <span>{{ $contacto->ciudad_contacto }},
                                                                                    {{ $contacto->region_contacto }}</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Card deck-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Resumen-->
                                        <div class="card">
                                            <div class="card-header bg-info" id="headingDos">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapse show" data-toggle="collapse"
                                                        data-target="#collapseDos" aria-expanded="false"
                                                        aria-controls="collapseDos">
                                                        RESUMEN
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseDos" class="collapse show" aria-labelledby="headingDos"
                                                data-parent="#accordion">
                                                <div class="card-body pt-1 pb-1">
                                                    <div class="card-body pt-1 pb-1">
                                                        <div class="row">
                                                            <div class="col-md-12 pl-1 pr-1">
                                                                <div class="card-deck">
                                                                    <div class="card rounded mt-3 mb-3 border-primary">
                                                                        <div class="card-header titulo-card rounded-top">
                                                                            <h6 class="card-title titulo-text mt-2 mb-2">
                                                                                Grupo Sanguíneo</h6>
                                                                        </div>
                                                                        <div class="card-body pt-3 pb-1">
                                                                            <p>
                                                                                @if (!$paciente->grupo_sanguineo == '')
                                                                                    @foreach ($grupo_sanguineo as $gs)
                                                                                        @if ($gs->id == $paciente->grupo_sanguineo)
                                                                                            {{ $gs->nombre_gs }}
                                                                                        @endif
                                                                                    @endforeach
                                                                                @else
                                                                                    Sin Registro
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card rounded mt-3 mb-3 border-primary">
                                                                        <div class="card-header titulo-card rounded-top">
                                                                            <h6 class="card-title titulo-text mt-2 mb-2">
                                                                                ¿Acepta Transfusiones?</h6>
                                                                        </div>
                                                                        <div class="card-body pt-3 pb-1">
                                                                            <p>@if ($paciente->pacepta_transfusion)Si @else No @endif</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card rounded mt-3 mb-3 border-primary">
                                                                        <div class="card-header titulo-card rounded-top">
                                                                            <h6 class="card-title titulo-text mt-2 mb-2">
                                                                                Enfermedades Crónicas</h6>
                                                                        </div>
                                                                        <div class="card-body pt-2 pb-1">
                                                                            @if (count($EnfeCronica) > 0)
                                                                                @foreach ($EnfeCronica as $ec)
                                                                                    <li type="disc">{{ $ec->Nombre }}
                                                                                    </li>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--Card deck-->
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 pl-1 pr-1">
                                                                <div class="card-deck mb-3">
                                                                    <div class="card rounded mt-3 mb-3 border-primary">
                                                                        <div class="card-header titulo-card rounded-top">
                                                                            <h6 class="card-title titulo-text mt-2 mb-2">
                                                                                Medicamentos de Uso Crónico</h6>
                                                                        </div>
                                                                        <div class="card-body pt-2 pb-1">
                                                                            @if (count($medica) > 0)
                                                                                @foreach ($medica as $me)
                                                                                    <li type="disc">
                                                                                        {{ $me->nombre_medicamento }}
                                                                                    </li>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="card rounded mt-3 mb-3 border-primary">
                                                                        <div class="card-header titulo-card rounded-top">
                                                                            <h6 class="card-title titulo-text mt-2 mb-2">
                                                                                Últimas Cirugías</h6>
                                                                        </div>
                                                                        <div class="card-body pt-3 pb-1">
                                                                            <ul>
                                                                                @if (count($operaciones) > 0)
                                                                                    @foreach ($operaciones as $op)
                                                                                        <li type="disc">
                                                                                            {{ \Carbon\Carbon::parse($op->fecha_operacion)->format('d/m/Y') }}
                                                                                            &nbsp;&nbsp;
                                                                                            {{ $op->nombre_operacion }}
                                                                                        </li>
                                                                                    @endforeach
                                                                                @endif
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card rounded mt-3 mb-3 border-primary">
                                                                        <div class="card-header titulo-card rounded-top">
                                                                            <h6 class="card-title titulo-text mt-2 mb-2">
                                                                                Alergias</h6>
                                                                        </div>
                                                                        <div class="card-body pt-3 pb-1">
                                                                            <ul>
                                                                                @if (count($alergias) > 0)
                                                                                    @foreach ($alergias as $al)
                                                                                        <li type="disc">
                                                                                            {{ $al->nombre_alergia }}
                                                                                        </li>
                                                                                    @endforeach
                                                                                @endif
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--Card deck-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Transfusiones y donación de órganos-->
                                        <div class="card">
                                            <div class="card-header" id="headingTres">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                                        data-target="#collapseTres" aria-expanded="false"
                                                        aria-controls="collapseTres">
                                                        TRANSFUSIONES Y DONACIÓN DE ÓRGANOS
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTres" class="collapse" aria-labelledby="headingTres"
                                                data-parent="#accordion">
                                                <div class="card-body bg-accordion pt-1 pb-1">
                                                    <div class="row">
                                                        <div class="col-md-12 pl-1 pr-1">
                                                            <div class="card-deck mb-3">
                                                                <div class="card rounded mt-3 mb-3 border-primary">
                                                                    <div class="card-header titulo-card rounded-top">
                                                                        <h6 class="card-title titulo-text mt-2 mb-2">
                                                                            Donante Total</h6>
                                                                    </div>
                                                                    <div class="card-body pt-3 pb-1">
                                                                        <p>@if ($paciente->dona_organos == '1') Si @else No @endif</p>
                                                                    </div>
                                                                </div>
                                                                <div class="card rounded mt-3 mb-3 border-primary">
                                                                    <div class="card-header titulo-card rounded-top">
                                                                        <h6 class="card-title titulo-text mt-2 mb-2">
                                                                            Donante Parcial</h6>
                                                                    </div>
                                                                    <div class="card-body pt-3 pb-1">
                                                                        <p>@if ($paciente->dona_organos == '2') Si @else No @endif</p>
                                                                    </div>
                                                                </div>
                                                                <div class="card rounded mt-3 mb-3 border-primary">
                                                                    <div class="card-header titulo-card rounded-top">
                                                                        <h6 class="card-title titulo-text mt-2 mb-2">
                                                                            Organos a Donar</h6>
                                                                    </div>
                                                                    <div class="card-body pt-3 pb-1">
                                                                        <ul>
                                                                            @foreach ($organosDonar as $od)
                                                                                <li type="disc">{{ $od->Nombre }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="card rounded mt-3 mb-3 border-primary">
                                                                    <div class="card-header titulo-card rounded-top">
                                                                        <h6 class="card-title titulo-text mt-2 mb-2">Acepta
                                                                            Transfusiones</h6>
                                                                    </div>
                                                                    <div class="card-body pt-3 pb-1">
                                                                        <p>@if ($paciente->dona_sangre)Si @else No @endif</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Card deck-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Información Confidencial-->
                                        @if (count($fichasConfi) > 0)
                                            <div class="card">
                                                <div class="card-header bg-primary" id="headingCuatro">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                            data-target="#collapseCuatro" aria-expanded="false"
                                                            aria-controls="collapseCuatro">INFORMACIÓN CONFIDENCIAL</button>
                                                    </h5>
                                                </div>
                                                <div id="collapseCuatro" class="collapse"
                                                    aria-labelledby="headingCuatro" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12">
                                                                <h5 class="text-c-blue text-center">Información
                                                                    confidencial</h5>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="tabla_informacion_confidencial"
                                                                class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                                                style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle">Fecha</th>
                                                                        <th class="text-center align-middle">Profesional
                                                                        </th>
                                                                        <th class="text-center align-middle">Hipótesis
                                                                            diagnóstica</th>
                                                                        <th class="text-center align-middle">Tratamiento 1
                                                                        </th>
                                                                        <th class="text-center align-middle">Tratamiento 2
                                                                        </th>
                                                                        <th class="text-center align-middle">Tratamiento 3
                                                                        </th>
                                                                        <th class="text-center align-middle">GES</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($fichasConfi as $confi)
                                                                        <tr>
                                                                            <td char="align-middle text-center">
                                                                                {{ \Carbon\Carbon::parse($confi->created_at)->format('d/m/Y') }}
                                                                            </td>
                                                                            <td char="align-middle">
                                                                                {{ $confi->profecional()->first()->nombre }}
                                                                                <br />
                                                                                {{ $confi->profecional()->first()->especialidad()->first()->txt_esp }}
                                                                            </td>
                                                                            <td char="align-middle text-center">
                                                                                {{ $confi->hipotesis_diagnostico }}</td>
                                                                            @for ($i = 0; $i < 3; $i++)
                                                                                @if (isset(
            $confi->receta()->first()->detalleReceta()->get()[$i]->medicamento,
        ))
                                                                                    <td char="align-middle text-center">
                                                                                        {{ $confi->receta()->first()->detalleReceta()->get()[$i]->medicamento }}
                                                                                        <br>
                                                                                        {{ $confi->receta()->first()->detalleReceta()->get()[$i]->periodo }}
                                                                                    </td>
                                                                                @else
                                                                                    <td char="align-middle text-center">
                                                                                    </td>
                                                                                @endif
                                                                            @endfor
                                                                            <td char="align-middle text-center">
                                                                                {{ $confi->ges }}</td>
                                                                        </tr>
                                                                    @endforeach


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <!--Control de patologías crónicas-->
                                        @if (false)
                                            <!-- Pendiente -->
                                            <div class="card">
                                                <div class="card-header" id="headingCinco">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                            data-target="#collapseCinco" aria-expanded="false"
                                                            aria-controls="collapseCinco">
                                                            CONTROL DE PATOLOGÍAS CRÓNICAS
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseCinco" class="collapse"
                                                    aria-labelledby="headingCinco" data-parent="#accordion">
                                                    <div class="accordion" id="accordion_patologias_cronicas">
                                                        <!--Tabla hipertensión arterial-->
                                                        <div class="card-header bg-cronicos pl-3"
                                                            id="accordion_patologias_cronicas">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link collapsed pl-3"
                                                                    data-toggle="collapse"
                                                                    data-target="#collapse_cronicos_hipertension"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse_cronicos_hipertension">
                                                                    HIPERTENSIÓN ARTERIAL
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="collapse_cronicos_hipertension" class="collapse"
                                                            aria-labelledby="heading_cronicos_hipertension"
                                                            data-parent="#accordion_patologias_cronicas">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <h5 class="text-c-blue text-center">Hipertensión
                                                                            arterial</h5>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                                <table id="tabla_hipertension"
                                                                    class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                                                    style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="align-middle text-center">Fecha</th>
                                                                            <th class="align-middle text-center">
                                                                                Profesional
                                                                            </th>
                                                                            <th class="align-middle text-center">
                                                                                P.Sistólica
                                                                            </th>
                                                                            <th class="align-middle text-center">
                                                                                P.Diastólica
                                                                            </th>
                                                                            <th class="align-middle text-center">Ideal</th>
                                                                            <th class="align-middle text-center">
                                                                                Tratamiento 1
                                                                            </th>
                                                                            <th class="align-middle text-center">
                                                                                Tratamiento 2
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>01/01/2021</td>
                                                                            <td>Jaime Kriman Astorga<br>
                                                                                Cardiología
                                                                            </td>
                                                                            <td>130 mmHg</td>
                                                                            <td>81 mmHg</td>
                                                                            <td>100/77 mmHg</td>
                                                                            <td>Aspirina 1 al día</td>
                                                                            <td>Cardevilol 1 al dia</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>01/01/2021</td>
                                                                            <td>Jaime Kriman Astorga<br>
                                                                                Cardiología
                                                                            </td>
                                                                            <td>130 mmHg</td>
                                                                            <td>81 mmHg</td>
                                                                            <td>100/77 mmHg</td>
                                                                            <td>Aspirina 1 al día</td>
                                                                            <td>Cardevilol 1 al dia</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>01/01/2021</td>
                                                                            <td>Jaime Kriman Astorga<br>
                                                                                Cardiología
                                                                            </td>
                                                                            <td>130 mmHg</td>
                                                                            <td>81 mmHg</td>
                                                                            <td>100/77 mmHg</td>
                                                                            <td>Aspirina 1 al día</td>
                                                                            <td>Cardevilol 1 al dia</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!--Tabla obesidad-->
                                                        <div class="card-header bg-cronicos pl-3"
                                                            id="accordion_patologias_cronicas">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link collapsed"
                                                                    data-toggle="collapse"
                                                                    data-target="#collapse_cronicos_obesidad"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse_cronicos_obesidad">
                                                                    OBESIDAD
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="collapse_cronicos_obesidad" class="collapse"
                                                            aria-labelledby="heading_cronicos_obesidad"
                                                            data-parent="#accordion_patologias_cronicas">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <h5 class="text-c-blue text-center">Obesidad</h5>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                                <table id="tabla_obesidad"
                                                                    class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                                                    style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="align-middle text-center">Fecha</th>
                                                                            <th class="align-middle text-center">
                                                                                Profesional
                                                                            </th>
                                                                            <th class="align-middle text-center">Peso</th>
                                                                            <th class="align-middle text-center">Variación
                                                                            </th>
                                                                            <th class="align-middle text-center">Ideal</th>
                                                                            <th class="align-middle text-center">
                                                                                Tratamiento 1
                                                                            </th>
                                                                            <th class="align-middle text-center">
                                                                                Tratamiento 2
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>01/01/2021</td>
                                                                            <td>Jaime Kriman Astorga<br>
                                                                                Cardiología
                                                                            </td>
                                                                            <td>100 Kg</td>
                                                                            <td>6 </td>
                                                                            <td>70kg</td>
                                                                            <td>Aspirina 1 al día</td>
                                                                            <td>Cardevilol 1 al dia</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>01/01/2021</td>
                                                                            <td>Jaime Kriman Astorga<br>
                                                                                Cardiología
                                                                            </td>
                                                                            <td>100 Kg</td>
                                                                            <td>-5 </td>
                                                                            <td>70kg</td>
                                                                            <td>Aspirina 1 al día</td>
                                                                            <td>Cardevilol 1 al dia</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>01/01/2021</td>
                                                                            <td>Jaime Kriman Astorga<br>
                                                                                Cardiología
                                                                            </td>
                                                                            <td>100 Kg</td>
                                                                            <td>-5 </td>
                                                                            <td>70kg</td>
                                                                            <td>Aspirina 1 al día</td>
                                                                            <td>Cardevilol 1 al dia</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>01/01/2021</td>
                                                                            <td>Jaime Kriman Astorga<br>
                                                                                Cardiología
                                                                            </td>
                                                                            <td>100 Kg</td>
                                                                            <td>-5 </td>
                                                                            <td>70kg</td>
                                                                            <td>Aspirina 1 al día</td>
                                                                            <td>Cardevilol 1 al dia</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!--Tabla diabetes-->
                                                        <div class="card-header bg-cronicos pl-3"
                                                            id="accordion_patologias_cronicas">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link" type="button"
                                                                    data-toggle="collapse"
                                                                    data-target="#collapse_cronicos_diabetes"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse_cronicos_diabetes">
                                                                    DIABETES
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="collapse_cronicos_diabetes" class="collapse"
                                                            aria-labelledby="heading_cronicos_diabetes"
                                                            data-parent="#accordion_patologias_cronicas">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <h5 class="text-c-blue text-center">Diabetes</h5>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                                <table id="tabla_diabetes"
                                                                    class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                                                    style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="align-middle text-center">
                                                                                Profesional
                                                                            </th>
                                                                            <th class="align-middle text-center">
                                                                                Especialidad
                                                                            </th>
                                                                            <th class="align-middle text-center">Fecha</th>
                                                                            <th class="align-middle text-center">Hipótesis
                                                                                Diagnóstica</th>
                                                                            <th class="align-middle text-center">
                                                                                Tratamiento
                                                                            </th>
                                                                            <th class="align-middle text-center">Ges</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Jaime Kriman Astorga</td>
                                                                            <td>Otorrinolaringología</td>
                                                                            <td>12/05/2021</td>
                                                                            <td>Hipótesis Diagnóstica</td>
                                                                            <td>Rellenar Campo</td>
                                                                            <td>No</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Jaime Kriman Astorga</td>
                                                                            <td>Otorrinolaringología</td>
                                                                            <td>12/05/2021</td>
                                                                            <td>Hipótesis Diagnóstica</td>
                                                                            <td>Rellenar Campo</td>
                                                                            <td>No</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Jaime Kriman Astorga</td>
                                                                            <td>Otorrinolaringología</td>
                                                                            <td>12/05/2021</td>
                                                                            <td>Hipótesis Diagnóstica</td>
                                                                            <td>Rellenar Campo</td>
                                                                            <td>No</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <!--Antecedentes obstétricos neonatales y control de niño sano-->
                                        @if (false)
                                            <!-- $paciente->sexo == 'M' -->
                                            <!-- Pendiente -->
                                            <div class="card">
                                                <div class="card-header" id="headingNueve">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                            data-target="#collapseNueve" aria-expanded="false"
                                                            aria-controls="collapseNueve">
                                                            ANTECEDENTES OBSTÉTRICOS NEONATALES Y CONTROL DE NIÑO SANO
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseNueve" class="collapse"
                                                    aria-labelledby="headingNueve" data-parent="#accordion">
                                                    <div class="accordion"
                                                        id="accordion_antecedentes_obstetricos_neonatales">
                                                        <!--Tabla control de embarazo-->
                                                        <div class="card-header bg-neonatologia pl-3"
                                                            id="accordion_antecedentes_obstetricos_neonatales">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link collapsed"
                                                                    data-toggle="collapse"
                                                                    data-target="#collapse_control_embarazo"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse_control_embarazo">
                                                                    CONTROL DE EMBARAZO
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="collapse_control_embarazo" class="collapse"
                                                            aria-labelledby="heading_control_embarazo"
                                                            data-parent="#accordion_antecedentes_obstetricos_neonatales">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <h5 class="text-c-blue text-center">Control de
                                                                            embarazo
                                                                        </h5>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                                <table id="tabla_control_embarazo"
                                                                    class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                                                    style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="align-middle text-center">Fecha</th>
                                                                            <th class="align-middle text-center">
                                                                                Profesional
                                                                            </th>
                                                                            <th class="align-middle text-center">Semana
                                                                                de<br>
                                                                                gestación
                                                                            </th>
                                                                            <th class="align-middle text-center">Peso</th>
                                                                            <th class="align-middle text-center">IMC</th>
                                                                            <th class="align-middle text-center">Altura
                                                                                <br>
                                                                                Útero
                                                                            </th>
                                                                            <th class="align-middle text-center">FPP</th>
                                                                            <th class="align-middle text-center">
                                                                                Tratamiento 1
                                                                            </th>
                                                                            <th class="align-middle text-center">
                                                                                Tratamiento 2
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="align-middle text-center">12/05/2021
                                                                            </td>
                                                                            <td class="align-middle">Jaime Kriman Astorga
                                                                                <br />Obstétra
                                                                            </td>
                                                                            <td class="align-middle text-center">16</td>
                                                                            <td class="align-middle text-center">95</td>
                                                                            <td class="align-middle text-center">20</td>
                                                                            <td class="align-middle text-center">10 cm</td>
                                                                            <td class="align-middle text-center">12/10/2021
                                                                            </td>
                                                                            <td class="align-middle">Aspirina 1 al dia
                                                                            </td>
                                                                            <td class="align-middle">Vitaminas 1 al dia
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!--Tabla parto-->
                                                        <div class="card-header bg-neonatologia pl-3"
                                                            id="accordion_antecedentes_obstetricos_neonatales">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link collapsed"
                                                                    data-toggle="collapse" data-target="#collapse_parto"
                                                                    aria-expanded="false" aria-controls="collapse_parto">
                                                                    PARTO
                                                                </button>
                                                            </h5>
                                                        </div>

                                                        <div id="collapse_parto" class="collapse"
                                                            aria-labelledby="heading_parto"
                                                            data-parent="#accordion_antecedentes_obstetricos_neonatales">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <h5 class="text-c-blue text-center">
                                                                            Parto
                                                                        </h5>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                                <div style="overflow-x:auto;">
                                                                    <table id="tabla_parto"
                                                                        class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                                                        style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="align-middle text-center">Fecha
                                                                                </th>
                                                                                <th class="align-middle text-center">
                                                                                    Obstetra
                                                                                </th>
                                                                                <th class="align-middle text-center">
                                                                                    Neonatólogo</th>
                                                                                <th class="align-middle text-center">
                                                                                    Matrón/a
                                                                                </th>
                                                                                <th class="align-middle text-center">Semana
                                                                                    de
                                                                                    gestación
                                                                                </th>
                                                                                <th class="align-middle text-center">Peso
                                                                                </th>
                                                                                <th class="align-middle text-center">Talla
                                                                                </th>
                                                                                <th class="align-middle text-center">
                                                                                    Perímetro
                                                                                    c</th>
                                                                                <th class="align-middle text-center">APGAR
                                                                                </th>
                                                                                <th class="align-middle text-center">
                                                                                    Observaciones</th>
                                                                                <th class="align-middle text-center">TTO y
                                                                                    PREV
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="align-middle text-center">
                                                                                    12/05/2021
                                                                                </td>
                                                                                <td class="align-middle">Jaime Kriman
                                                                                    Astorga<br />
                                                                                    Obstétra</td>
                                                                                <td class="align-middle">Francisco
                                                                                    Fernandez<br />
                                                                                    Neonatólogo</td>
                                                                                <td class="align-middle">Maria Oyarzún
                                                                                    valle
                                                                                </td>
                                                                                <td class="align-middle text-center">40
                                                                                </td>
                                                                                <td class="align-middle text-center">3000
                                                                                </td>
                                                                                <td class="align-middle text-center">50
                                                                                </td>
                                                                                <td class="align-middle text-center">45 cm
                                                                                </td>
                                                                                <td class="align-middle text-center">10
                                                                                </td>
                                                                                <td class="align-middle">Circular cuello
                                                                                </td>
                                                                                <td class="align-middle">Vitaminas</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="align-middle text-center">
                                                                                    12/05/2021
                                                                                </td>
                                                                                <td class="align-middle">Jaime Kriman
                                                                                    Astorga<br />
                                                                                    Obstétra</td>
                                                                                <td class="align-middle">Francisco
                                                                                    Fernandez<br />
                                                                                    Neonatólogo</td>
                                                                                <td class="align-middle">Maria Oyarzún
                                                                                    valle
                                                                                </td>
                                                                                <td class="align-middle text-center">40
                                                                                </td>
                                                                                <td class="align-middle text-center">3000
                                                                                </td>
                                                                                <td class="align-middle text-center">50
                                                                                </td>
                                                                                <td class="align-middle text-center">45 cm
                                                                                </td>
                                                                                <td class="align-middle text-center">10
                                                                                </td>
                                                                                <td class="align-middle">Circular cuello
                                                                                </td>
                                                                                <td class="align-middle">Vitaminas</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Tabla neonatologia-->
                                                        <div class="card-header bg-neonatologia pl-3"
                                                            id="accordion_antecedentes_obstetricos_neonatales">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link collapsed"
                                                                    data-toggle="collapse"
                                                                    data-target="#collapse_neonatologia"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse_neonatologia">
                                                                    NEONATOLOGÍA
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="collapse_neonatologia" class="collapse"
                                                            aria-labelledby="heading_neonatologia"
                                                            data-parent="#accordion_antecedentes_obstetricos_neonatales">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <h5 class="text-c-blue text-center">
                                                                            Neonatología
                                                                        </h5>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                                <div style="overflow-x:auto;">
                                                                    <table id="tabla_neonatologia"
                                                                        class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                                                        style="width:100%;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="align-middle text-center">Fecha
                                                                                </th>
                                                                                <th class="align-middle text-center">
                                                                                    Profesional</th>
                                                                                <th class="align-middle text-center">Semana
                                                                                    de
                                                                                    <br>
                                                                                    gestación
                                                                                </th>
                                                                                <th class="align-middle text-center">Peso
                                                                                </th>
                                                                                <th class="align-middle text-center">talla
                                                                                </th>
                                                                                <th class="align-middle text-center">
                                                                                    Perimetro
                                                                                    c</th>
                                                                                <th class="align-middle text-center">APGAR
                                                                                </th>
                                                                                <th class="align-middle text-center">
                                                                                    Sufrimiento Fetal</th>
                                                                                <th class="align-middle text-center">
                                                                                    Maniobras
                                                                                    x suf fetal
                                                                                </th>
                                                                                <th class="align-middle text-center">
                                                                                    Observaciones</th>
                                                                                <th class="align-middle text-center">TTO y
                                                                                    PREV
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="align-middle text-center">
                                                                                    12/05/2021
                                                                                </td>
                                                                                <td class="align-middle">Francisco
                                                                                    Fernandez
                                                                                    <br />Neonatólogo
                                                                                </td>
                                                                                <td class="align-middle text-center">40
                                                                                </td>
                                                                                <td class="align-middle text-center">3000
                                                                                </td>
                                                                                <td class="align-middle text-center">50
                                                                                </td>
                                                                                <td class="align-middle text-center">50 cm
                                                                                </td>
                                                                                <td class="align-middle text-center">10
                                                                                </td>
                                                                                <td class="align-middle text-center">No
                                                                                </td>
                                                                                <td class="align-middle text-center">No
                                                                                </td>
                                                                                <td class="align-middle">Asp de meconio
                                                                                </td>
                                                                                <td class="align-middle">Ninguna</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Tabla Control niño sano-->
                                                        <div class="card-header bg-neonatologia pl-3"
                                                            id="accordion_patologias_cronicas">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link collapsed"
                                                                    data-toggle="collapse" data-target="#collapse_niño_sano"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse_niño_sano">
                                                                    CONTROL NIÑO SANO
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="collapse_niño_sano" class="collapse"
                                                            aria-labelledby="heading_niño_sano"
                                                            data-parent="#accordion_antecedentes_obstetricos_neonatales">
                                                            <div class="accordion" id="accordion_niño_sano">
                                                                <!--Vacunas-->
                                                                <div class="card-header bg-neonatologia pl-5"
                                                                    id="accordion_niño_sano">
                                                                    <h5 class="mb-0">
                                                                        <button class="btn btn-link collapsed btn-block"
                                                                            data-toggle="collapse"
                                                                            data-target="#collapse_vacunas"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapse_vacunas">
                                                                            VACUNAS
                                                                    </h5>
                                                                </div>
                                                                <div id="collapse_vacunas" class="collapse"
                                                                    aria-labelledby="heading_vacunas"
                                                                    data-parent="#accordion_niño_sano">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12">
                                                                                <h5 class="text-c-blue text-center">
                                                                                    Vacunas
                                                                                </h5>
                                                                                <hr>
                                                                            </div>
                                                                        </div>
                                                                        <div class="dt-responsive table-responsive">
                                                                            <table id="tabla_vacunas"
                                                                                class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                                                                style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th char="align-middle text-center">
                                                                                            Fecha</th>
                                                                                        <th char="align-middle text-center">
                                                                                            Profesional
                                                                                            <br />vacunatorio
                                                                                        </th>
                                                                                        <th
                                                                                            char="align-middle  text-center">
                                                                                            Vacuna</th>
                                                                                        <th
                                                                                            char="align-middle  text-center">
                                                                                            Tolerancia</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td char="align-middle text-center">
                                                                                            12/05/2021</td>
                                                                                        <td char="align-middle">Gabriela
                                                                                            Astorga
                                                                                            <br />Las Condes
                                                                                        </td>
                                                                                        <td char="align-middle text-center">
                                                                                            Tetravalente
                                                                                        </td>
                                                                                        <td char="align-middle text-center">
                                                                                            Bueno</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td char="align-middle text-center">
                                                                                            12/05/2021</td>
                                                                                        <td char="align-middle">Gabriela
                                                                                            Astorga
                                                                                            <br />Las Condes
                                                                                        </td>
                                                                                        <td char="align-middle text-center">
                                                                                            Tetravalente
                                                                                        </td>
                                                                                        <td char="align-middle text-center">
                                                                                            Bueno</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td char="align-middle text-center">
                                                                                            12/05/2021</td>
                                                                                        <td char="align-middle">Gabriela
                                                                                            Astorga
                                                                                            <br />Las Condes
                                                                                        </td>
                                                                                        <td char="align-middle text-center">
                                                                                            Tetravalente
                                                                                        </td>
                                                                                        <td char="align-middle text-center">
                                                                                            Bueno</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--Control niño sano-->
                                                                <div class="card-header bg-neonatologia pl-5"
                                                                    id="accordion_niño_sano">
                                                                    <h5 class="mb-0">
                                                                        <button class="btn btn-link collapsed"
                                                                            data-toggle="collapse"
                                                                            data-target="#collapse_control_niño_sano"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapse_control_niño_sano">
                                                                            CONTROL NIÑO SANO
                                                                        </button>
                                                                    </h5>
                                                                </div>
                                                                <div id="collapse_control_niño_sano" class="collapse"
                                                                    aria-labelledby="heading_control_niño_sano"
                                                                    data-parent="#accordion_niño_sano">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12">
                                                                                <h5 class="text-c-blue text-center">
                                                                                    Control niño sano
                                                                                </h5>
                                                                                <hr>
                                                                            </div>
                                                                        </div>
                                                                        <div class="dt-responsive table-responsive">
                                                                            <table id="tabla_control_niño_sano"
                                                                                class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                                                                style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th
                                                                                            class="align-middle  text-center">
                                                                                            Fecha</th>
                                                                                        <th
                                                                                            class="align-middle text-center">
                                                                                            Profesional
                                                                                        </th>
                                                                                        <th
                                                                                            class="align-middle text-center">
                                                                                            Peso</th>
                                                                                        <th
                                                                                            class="align-middle text-center">
                                                                                            Talla</th>
                                                                                        <th
                                                                                            class="align-middle text-center">
                                                                                            Estado
                                                                                            nutricional</th>
                                                                                        <th
                                                                                            class="align-middle text-center">
                                                                                            Vacunas</th>
                                                                                        <th
                                                                                            class="align-middle text-center">
                                                                                            Indicaciones
                                                                                        </th>
                                                                                        <th
                                                                                            class="align-middle text-center">
                                                                                            Indicaciones
                                                                                        </th>
                                                                                        <th
                                                                                            class="align-middle text-center">
                                                                                            Indicaciones
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            12/05/2021</td>
                                                                                        <td class="align-middle">Gabriela
                                                                                            Astorga
                                                                                            <br />Pediatra
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            4500</td>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            55
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            Bueno</td>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            n/c</td>
                                                                                        <td class="align-middle">Apoyo
                                                                                            lactancia</td>
                                                                                        <td class="align-middle">Vit c 1
                                                                                            al
                                                                                            dia</td>
                                                                                        <td class="align-middle">Vit c 1
                                                                                            al
                                                                                            dia</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            12/05/2021</td>
                                                                                        <td class="align-middle">Gabriela
                                                                                            Astorga
                                                                                            <br />Pediatra
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            4500</td>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            55
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            Bueno</td>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            n/c</td>
                                                                                        <td class="align-middle">Apoyo
                                                                                            lactancia</td>
                                                                                        <td class="align-middle">Vit c 1
                                                                                            al
                                                                                            dia</td>
                                                                                        <td class="align-middle">Vit c 1
                                                                                            al
                                                                                            dia</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            12/05/2021</td>
                                                                                        <td class="align-middle">Gabriela
                                                                                            Astorga
                                                                                            <br />Pediatra
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            4500</td>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            55
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            Bueno</td>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            n/c</td>
                                                                                        <td class="align-middle">Apoyo
                                                                                            lactancia</td>
                                                                                        <td class="align-middle">Vit c 1
                                                                                            al
                                                                                            dia</td>
                                                                                        <td class="align-middle">Vit c 1
                                                                                            al
                                                                                            dia</td>
                                                                                    </tr>
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
                                        @endif
                                        <!--Tratamientos médicos-->
                                        @if (count($ficha) > 0)
                                            <div class="card">
                                                <div class="card-header" id="headingSeis">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                            data-target="#collapseSeis" aria-expanded="false"
                                                            aria-controls="collapSeis">
                                                            TRATAMIENTOS MÉDICOS
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseSeis" class="collapse" aria-labelledby="headingSeis"
                                                    data-parent="#accordion">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12">
                                                                <h5 class="text-c-blue text-center">Tratamientos médicos
                                                                </h5>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                        <table id="tabla_tratamientos_medicos"
                                                            class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                                            style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Profesional</th>
                                                                    <th>Especialidad</th>
                                                                    <th>Fecha</th>
                                                                    <th>Hipótesis Diagnóstica</th>
                                                                    <th>Tratamiento</th>
                                                                    <th>Ges</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($ficha as $fic)
                                                                    <tr>
                                                                        <td>{{ $fic->profecional()->first()->nombre }}
                                                                        </td>
                                                                        <td>{{ $fic->profecional()->first()->especialidad()->first()->txt_esp }}
                                                                        </td>
                                                                        <td>{{ \Carbon\Carbon::parse($fic->created_at)->format('d/m/Y') }}
                                                                        </td>
                                                                        <td>{{ $fic->hipotesis_diagnostico }}</td>
                                                                        <td>
                                                                            @if (isset(
            $fic->receta()->first()->detalleReceta()->first()->medicamento,
        ))
                                                                        </td>
                                                                        <td char="align-middle text-center">
                                                                            {{ $fic->receta()->first()->detalleReceta()->first()->medicamento }}
                                                                            <br>
                                                                            {{ $fic->receta()->first()->detalleReceta()->first()->periodo }}
                                                                        </td>
                                                                    @else
                                                                @endif
                                                                </td>
                                                                <td>{{ $fic->ges }}</td>
                                                                </tr>
                                        @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!--Tratamientos odontológicos-->
                            @if (false)
                                <!-- Pendiente -->
                                <div class="card">
                                    <div class="card-header" id="headingSiete">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseSiete" aria-expanded="false"
                                                aria-controls="collapseSiete">
                                                TRATAMIENTOS ODONTOLÓGICOS
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseSiete" class="collapse" aria-labelledby="headingSiete"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <h5 class="text-c-blue text-center">
                                                        Odontograma
                                                    </h5>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    INSERTAR ODONTOGRAMA CON JAVA
                                                    <img class="img-fluid text-center"
                                                        src="../assets/images/odontograma.png">
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <h5 class="text-c-blue text-center">Tratamientos odontológicos
                                                            </h5>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="tabla_odontologico_tratamiento"
                                                            class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                                            style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="align-middle text-center">Fecha</th>
                                                                    <th class="align-middle text-center">Profesional</th>
                                                                    <th class="align-middle text-center">Peso</th>
                                                                    <th class="align-middle text-center">Talla</th>
                                                                    <th class="align-middle text-center">Talla</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="align-middle text-center">12/05/2021</td>
                                                                    <td class="align-middle text-center">Gabriela Astorga
                                                                        <br />Pediatra
                                                                    </td>
                                                                    <td class="align-middle text-center">4500</td>
                                                                    <td class="align-middle text-center">55</td>
                                                                    <td class="align-middle text-center">Bueno</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="align-middle text-center">12/05/2021</td>
                                                                    <td class="align-middle text-center">Gabriela Astorga
                                                                        <br />Pediatra
                                                                    </td>
                                                                    <td class="align-middle text-center">4500</td>
                                                                    <td class="align-middle text-center">55</td>
                                                                    <td class="align-middle text-center">Bueno</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="align-middle text-center">12/05/2021</td>
                                                                    <td class="align-middle text-center">Gabriela Astorga
                                                                        <br />Pediatra
                                                                    </td>
                                                                    <td class="align-middle text-center">4500</td>
                                                                    <td class="align-middle text-center">55</td>
                                                                    <td class="align-middle text-center">Bueno</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <!--Tratamientos odontológicos por pieza-->
                            @if (false)
                                <!-- Pendiente -->
                                <div class="card">
                                    <div class="card-header" id="headingDiez">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseDiez" aria-expanded="false"
                                                aria-controls="collapseDiez">
                                                TRATAMIENTOS ODONTOLÓGICOS POR PIEZA
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseDiez" class="collapse" aria-labelledby="headingDiez"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <h5 class="text-c-blue text-center">Tratamientos odontológicos por
                                                        pieza
                                                    </h5>
                                                    <hr>
                                                </div>
                                            </div>
                                            <table id="tabla_odontologicos_pieza"
                                                class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Pieza N°</th>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Profesional</th>
                                                        <th class="text-center align-middle">Tratamiento</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center">1.1</td>
                                                        <td class="align-middle text-center">12/05/2021</td>
                                                        <td class="align-middle text-center">Javier Kriman
                                                            N<br />Implantología
                                                        </td>
                                                        <td class="align-middle text-center">Implante integrado</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle text-center">1.1</td>
                                                        <td class="align-middle text-center">12/05/2021</td>
                                                        <td class="align-middle text-center">Javier Kriman
                                                            N<br />Implantología
                                                        </td>
                                                        <td class="align-middle text-center">Implante integrado</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle text-center">1.1</td>
                                                        <td class="align-middle text-center">12/05/2021</td>
                                                        <td class="align-middle text-center">Javier Kriman
                                                            N<br />Implantología
                                                        </td>
                                                        <td class="align-middle text-center">Implante integrado</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <!--Tratamientos y antecendetes previos-->
                            @if (false)
                                <!-- Pendiente -->
                                <div class="card">
                                    <div class="card-header" id="headingOcho">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseOcho" aria-expanded="false"
                                                aria-controls="collapseOcho">
                                                TRATAMIENTOS Y ANTECEDENTES PREVIOS
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOcho" class="collapse" aria-labelledby="headingOcho"
                                        data-parent="#accordion">
                                        <div class="card-body bg-accordion">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <h5 class="text-c-blue text-center">Tratamientos y antecedentes previos
                                                    </h5>
                                                    <hr>
                                                </div>
                                            </div>
                                            <table id="tabla_tratamientos_antecedentes"
                                                class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle text-center">Fecha Recopilación</th>
                                                        <th class="align-middle text-center">Profesional</th>
                                                        <th class="align-middle text-center">RUT</th>
                                                        <th class="align-middle text-center">Diagnóstico</th>
                                                        <th class="align-middle text-center">Evolución</th>
                                                        <th class="align-middle text-center">Recopilado en:</th>
                                                        <th class="align-middle text-center">Relevancia</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center">12/05/2021</td>
                                                        <td class="align-middle">Jaime Kriman Astorga<br />Dermatología
                                                        </td>
                                                        <td class="align-middle text-center">00.000.000-1</td>
                                                        <td class="align-middle text-center">Apendicectomia</td>
                                                        <td class="align-middle text-center">Buena</td>
                                                        <td class="align-middle">Hospital Van Buren</td>
                                                        <td class="align-middle text-center">Media</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!--Accordion-->
                    </div>
                </div>
            </div>
            <!--Cierre: Acceso Ficha Médica Única (FMU)-->

            <!--Atenciones Médicas Previas-->
            <div class="tab-pane fade" id="pills-atencion-previas" role="tabpanel"
                aria-labelledby="pills-atencion-previas-tab">
                <div class="col-sm-12">
                    <h5 class="text-c-blue mt-5" style="font-size: 1.1rem;">
                        Atenciones Médicas Previas
                    </h5>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-sm-12 pb-4">
                        <table id="tabla-1" class="display table table-striped table-hover dt-responsive nowrap pb-4"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Diagnóstico</th>
                                    <th class="text-center align-middle">Recetas</th>
                                    <th class="text-center align-middle">Exámenes</th>
                                    <th class="text-center align-middle">Archivos </th>
                                    <th class="text-center align-middle">Ficha</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($ficha as $f)
                                    <tr>

                                        <td class="text-center align-middle">
                                            {{ \Carbon\Carbon::parse($f->created_at)->format('d/m/Y') }}
                                        </td>

                                        <td class="text-center align-middle">{{ $f->diagnostico }}</td>

                                        <td class="text-center align-middle">
                                            <button href="#!" class="btn btn-danger btn-sm"
                                                onclick="buscar_receta({{ $f->id }});">
                                                <i class="feather icon-file-plus"></i>Ver Receta
                                            </button>
                                        </td>

                                        <td class="text-center align-middle">
                                            <button href="#!" class="btn btn-secondary btn-sm"
                                                onclick="buscar_examenes({{ $f->id }});">
                                                <i class="feather icon-file-plus"></i>Ver Exámenes
                                            </button>
                                        </td>

                                        <td class="text-center align-middle">
                                            <button href="#!" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#m_cons_archivos"><i class="feather icon-folder"></i>Ver
                                                Archivos</button>
                                        </td>

                                        <form action="route()"></form>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#m_consultaant"><i class="feather icon-file-text"></i>Ver
                                                Ficha</button>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div id="m_consultaant" class="modal fade" tabindex="-1" role="dialog"
                            aria-labelledby="m_consultaantLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h5 class="modal-title text-white" id="m_consultaantLabel"
                                            style="font-size: 1.3rem; color: #3366CC;">consulta del..... </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="form-group fill">
                                                        <label class="floating-label" for="MotConsulta">Motivo
                                                            de Consulta</label>
                                                        <!--fin autollenado-->
                                                        <input id="MotConsulta" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="form-group fill">
                                                        <label class="floating-label"
                                                            for="AntConsulta">Antecedentes</label>
                                                        <!--fin autollenado-->
                                                        <input id="AntConsulta" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="form-group fill">
                                                        <label class="floating-label" for="ExFísico">Examen
                                                            Físico</label>
                                                        <!--fin autollenado-->
                                                        <input id="ExFísico" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="form-group fill">
                                                        <label class="floating-label" for="Dignóstico">Dignóstico</label>
                                                        <!--fin autollenado-->
                                                        <input id="Dignóstico" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="form-group fill">
                                                        <label class="floating-label" for="Receta">Receta</label>
                                                        <!--fin autollenado-->
                                                        <input id="Receta" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="form-group fill">
                                                        <label class="floating-label" for="Examenes">Examenes</label>
                                                        <!--fin autollenado-->
                                                        <input id="Examenes" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!--fin autollenado-->




                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cerrar</button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="m_cons_ex" class="modal fade" tabindex="-1" role="dialog"
                            aria-labelledby="m_cons_exLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h5 class="modal-title text-white" id="m_cons_exLabel"
                                            style="font-size: 1.3rem; color: #3366CC;">Examenes Solicitados
                                            el.... </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <table id="tabla-1"
                                                class="display table table-striped table-hover dt-responsive nowrap pb-4"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Tipo</th>
                                                        <th class="text-center align-middle">Urgencia</th>
                                                        <th class="text-center align-middle">Nombre</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle">27/07/2021</td>
                                                        <td class="text-center align-middle">Sangre</td>
                                                        <td class="text-center align-middle">Normal</td>
                                                        <td class="text-center align-middle">Hemograma y vhs
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center align-middle">27/07/2021</td>
                                                        <td class="text-center align-middle">
                                                            Otorrinolaríngologico</td>
                                                        <td class="text-center align-middle">Normal</td>
                                                        <td class="text-center align-middle">Rinomanometría
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center align-middle">27/07/2021</td>
                                                        <td class="text-center align-middle">Sangre</td>
                                                        <td class="text-center align-middle">Urgente</td>
                                                        <td class="text-center align-middle">Grupo Sanguíneo
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                        <!--fin autollenado-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="m_cons_receta" class="modal fade" tabindex="-1" role="dialog"
                            aria-labelledby="m_cons_recetaLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h5 class="modal-title text-white" id="id_ficha_receta"
                                            style="font-size: 1.3rem; color: #3366CC;"> </h5>

                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <table id="tabla_receta"
                                                class="display table table-striped table-hover dt-responsive nowrap pb-4"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Medicamento</th>
                                                        <th class="text-center align-middle">Dosis</th>
                                                        <th class="text-center align-middle">Frecuencia</th>
                                                        <th class="text-center align-middle">Cantidad</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </form>
                                        <!--fin autollenado-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="m_cons_examen" class="modal fade" tabindex="-1" role="dialog"
                            aria-labelledby="m_cons_examenLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h5 class="modal-title text-white" id="id_ficha_examen"
                                            style="font-size: 1.3rem; color: #3366CC;"> </h5>

                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <table id="tabla_examen_paciente"
                                                class="display table table-striped table-hover dt-responsive nowrap pb-4"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Tipo</th>
                                                        <th class="text-center align-middle">Nombre</th>
                                                        <th class="text-center align-middle">Ver(txt)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>

                                            </table>
                                        </form>
                                        <!--fin autollenado-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Atenciones Médicas Previas-->

            <!--Atenciones Resultados Examenes-->
            <div class="tab-pane fade" id="pills-examenes" role="tabpanel" aria-labelledby="pills-examenes-tab">
                <div class="row px-3">
                    <div class="col-sm-6 mt-5">
                        <h5 class="text-c-blue" style="font-size: 1.1rem;">
                            Resultado de Exámenes
                        </h5>
                    </div>
                    <div class="col-sm-6 mt-5">
                        <!--Modal 04 / Subir Examen-->
                        <div id="modal_adjuntar_examen" class="modal fade" tabindex="-1" role="dialog"
                            aria-labelledby="modal_adjuntar_examen" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h5 class="modal-title text-white mt-1" id="modal_adjuntar_examen">
                                            Adjuntar Examen</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-sm-12 mt-2">
                                                    <div class="form-group fill">
                                                        <label class="floating-label-activo-sm">Fecha</label>
                                                        <input type="date" class="form-control form-control-sm" name=""
                                                            id="">

                                                    </div>
                                                </div>
                                                <div class="col-sm-12 mt-2">
                                                    <div class="form-group fill">
                                                        <label class="floating-label">Nº de Orden</label>
                                                        <input type="number" name="" id="" type="text"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 mt-2">
                                                    <div class="form-group fill">
                                                        <label class="floating-label">Nombre del Examen</label>
                                                        <select class="form-control form-control-sm" name="" id="">
                                                            <option>Seleccione una opción</option>
                                                            <option>..</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 mt-2">
                                                    <div class="form-group fill">
                                                        <label class="floating-label-activo-sm">Tipo de
                                                            Examen</label>
                                                        <select class="form-control form-control-sm" name="" id="">
                                                            <option>Seleccione una opción</option>
                                                            <option>..</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 mt-2">
                                                    <form action="../assets/json/file-upload.php" class="dropzone">
                                                        <div class="fallback">
                                                            <input name="file" type="file" multiple />
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button type="button" class="btn btn-success btn-sm float-right"><i
                                                            class="fa fa-plus"></i> Agregar Examen</button>
                                                </div>
                                                <div class="col-sm-12 mt-3">
                                                    <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                                                    <!--Tabla-->
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center align-middle">Fecha
                                                                    </th>
                                                                    <th class="text-center align-middle">Nº
                                                                        Orden</th>
                                                                    <th class="text-center align-middle">Nombre
                                                                        del Examen</th>
                                                                    <th class="text-center align-middle">Tipo
                                                                    </th>
                                                                    <th class="text-center align-middle">Examen
                                                                    </th>
                                                                    <th class="text-center align-middle">Acción
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <td class="text-center align-middle">
                                                                    <span>03/12/20</span>
                                                                </td>
                                                                <td class="text-center align-middle">7217821
                                                                </td>
                                                                <td class="text-center align-middle">Ecografia
                                                                    Doppler</td>
                                                                <td class="text-center align-middle">
                                                                    Imagenología</td>
                                                                <td class="text-center align-middle"><button href="#!"
                                                                        class="btn btn-info btn-sm btn-icon"><i
                                                                            class="feather icon-file-text"></i></button>
                                                                </td>
                                                                <td class="text-center align-middle">
                                                                    <button href="#!"
                                                                        class="btn btn-danger btn-sm btn-icon"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Eliminar"><i
                                                                            class="feather icon-x"></i></button>
                                                                </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--Cierre Tabla-->
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-info">
                                            Guardar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--Cierre: Modal 04 / Subir Examen-->
                        <!--Botón Modal 04 / Subir Examen-->
                        <button type="button" class="btn btn-success btn-sm float-right mt-1" data-toggle="modal"
                            data-target="#modal_adjuntar_examen"><i class="fa fa-plus"></i> Agregar Examen</button>
                        <!--Cierre: Botón Modal 04 / Subir Examen-->
                    </div>
                </div>
                <hr>

                <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link-wizard active" id="examenes_general_tab" data-toggle="pill"
                            href="#pills_bandeja_entrada" role="tab" aria-controls="pills-home" aria-selected="true">Bandeja
                            de entrada</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-wizard" id="examenes_general_tab" data-toggle="pill"
                            href="#pills_examenes_general" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Examenes en general</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tablas_examenes">
                    <div class="tab-pane fade show active" id="pills_bandeja_entrada" role="tabpanel"
                        aria-labelledby="examenes_general_tab">
                        <div class="dt-responsive table-responsive pb-4">
                            <table id="tabla-2" class="display table table-striped table-hover dt-responsive nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Nº de Orden</th>
                                        <th class="text-center align-middle">Nombre del Examen</th>
                                        <th class="text-center align-middle">TIpo de Examen</th>
                                        <th class="text-center align-middle">Examen</th>
                                        <th class="text-center align-middle">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">23/05/2019</td>
                                        <td class="text-center align-middle">782638</td>
                                        <td class="text-center align-middle">Hemograma completo</td>
                                        <td class="text-center align-middle">Examen Sangre</td>
                                        <td class="text-center align-middle">
                                            <button href="#!" class="btn btn-info btn-sm"><i
                                                    class="feather icon-file-text"></i> Ver Examen</button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button href="#!" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip"
                                                data-placement="top" title="Eliminar"><i
                                                    class="feather icon-x"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills_examenes_general" role="tabpanel"
                        aria-labelledby="examenes_general_tab">
                        <div class="dt-responsive table-responsive pb-4">
                            <table id="tabla-3" class="display table table-striped table-hover dt-responsive nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Nº de Orden</th>
                                        <th class="text-center align-middle">Nombre del Examen</th>
                                        <th class="text-center align-middle">TIpo de Examen</th>
                                        <th class="text-center align-middle">Examen</th>
                                        <th class="text-center align-middle">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">23/05/2019</td>
                                        <td class="text-center align-middle">782638</td>
                                        <td class="text-center align-middle">Hemograma completo</td>
                                        <td class="text-center align-middle">Examen Sangre</td>
                                        <td class="text-center align-middle">
                                            <button href="#!" class="btn btn-info btn-sm"><i
                                                    class="feather icon-file-text"></i> Ver Ficha</button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button href="#!" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip"
                                                data-placement="top" title="Eliminar"><i
                                                    class="feather icon-x"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Atenciones Resultados Examenes-->
        </div>
    </div>
    </div>
    <!--Cierre:Contenido Pills-->

    <!--Sidebar 1-->
    <div class="bs-canvas-overlay bs-canvas-anim bg-dark position-fixed w-100 h-100"></div>
    <div id="antecedentes_paciente"
        class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px"
        data-offset="true">
        <header class="bs-canvas-header p-3 bg-info overflow-auto">
            <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true"
                    class="text-light">&times;</span></button>
            <h5 class="d-inline-block text-light mb-0 float-right">Antecedentes del paciente</h5>
        </header>
        <div class="bs-canvas-content">
            <div class="accordion" id="accordionExample">
                <div class="card-sidebar mb-0 rounded-0">
                    <div class="card-header-sidebar" id="headingOne">
                        <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i
                                class="feather icon-chevron-down fa-1x float-right"></i>
                            INFORMACIÓN DEL PACIENTE
                        </button>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body-sidebar">
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Nombres</label>
                                <div class="col-7 ml-2">
                                    {{ $paciente->nombre }}
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Apellidos</label>
                                <div class="col-7 ml-2">
                                    {{ $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Rut</label>
                                <div class="col-7 ml-2">
                                    {{ $paciente->rut }}
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Nacimiento</label>
                                <div class="col-7 ml-2">
                                    {{ $paciente->fecha_nac }}
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Edad</label>
                                <div class="col-7 ml-2">
                                    <span>{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}</span>
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Sexo</label>
                                <div class="col-7 ml-2">
                                    @if ($paciente->sexo == 'M')
                                        Masculino
                                    @else
                                        Femenino
                                    @endif
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Dirección</label>
                                <div class="col-7 ml-2">
                                    {{ $paciente->direccion }}
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Comuna / Región</label>
                                <div class="col-7 ml-2">
                                    Viña del Mar, Región de Valparaíso
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Correo Electrónico</label>
                                <div class="col-7 ml-2">
                                    {{ $paciente->email }}
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Teléfono</label>
                                <div class="col-7 ml-2">
                                    {{ $paciente->telefono_uno }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                {{ $paciente->fecha_nac }}
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionExample">
                        <div class="card-body-sidebar">
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Rut</label>
                                <div class="col-7 ml-2">
                                    0000000-0
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Nombre</label>
                                <div class="col-7 ml-2">
                                    Luis
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Primer Apellido</label>
                                <div class="col-7 ml-2">
                                    Sepúlveda
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Segundo Apellido</label>
                                <div class="col-7 ml-2">
                                    Pino
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Dirección</label>
                                <div class="col-7 ml-2">
                                    Calle Nº...
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Comuna / Región</label>
                                <div class="col-7 ml-2">
                                    Viña del Mar, Región de Valparaíso
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Correo Electrónico</label>
                                <div class="col-7 ml-2">
                                    paciente@gmail.com
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Teléfono</label>
                                <div class="col-7 ml-2">
                                    283764892
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                ANTECEDENTES MÉDICOS
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body-sidebar">
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Alergias e Intolerancias a
                                    medicamentos</label>
                                <div class="col-7 ml-2">
                                    <ul>
                                        @if (count($alergias) > 0)
                                            @foreach ($alergias as $al)
                                                <li type="disc">{{ $al->nombre_alergia }}</li>
                                            @endforeach
                                        @else
                                            Sin Registros
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Otras Alergias e
                                    Intolerancias</label>
                                <div class="col-7 ml-2">
                                    <ul>
                                        <li type="disc">Chocolate</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Operaciones</label>
                                <div class="col-7 ml-2">
                                    <ul>
                                        @if (count($operaciones) > 0)
                                            @foreach ($operaciones as $op)
                                                <li type="disc">
                                                    {{ \Carbon\Carbon::parse($op->fecha_operacion)->format('d/m/Y') }}
                                                    &nbsp;&nbsp;
                                                    {{ $op->nombre_operacion }}
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Incidentes en Cirugía</label>
                                <div class="col-7 ml-2">
                                    <ul>
                                        <li type="disc">??</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Grupo Sanguíneo</label>
                                <div class="col-7 ml-2">
                                    <p>
                                        @if (!$paciente->grupo_sanguineo == '')
                                            @foreach ($grupo_sanguineo as $gs)
                                                @if ($gs->id == $paciente->grupo_sanguineo)
                                                    {{ $gs->nombre_gs }}
                                                @endif
                                            @endforeach
                                        @else
                                            Sin Registro
                                        @endif

                                    </p>
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Acepta Transfusión de
                                    Sangre</label>
                                <div class="col-7 ml-2">
                                    @if ($paciente->pacepta_transfusion)Si @else No @endif
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">Donante de Órganos</label>
                                <div class="col-7 ml-2">
                                    @if ($paciente->dona_organos == '1') Donante Total @elseif ($paciente->dona_organos == '2')  Donante Parcial @else NO @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseCuatro" aria-expanded="false"
                                aria-controls="collapseThree">
                                PATOLOGÍAS CRÓNICAS
                            </button>
                        </h2>
                    </div>
                    <div id="collapseCuatro" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body-sidebar">
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">
                                    ¿Es paciente crónico?
                                </label>
                                <div class="col-7 ml-2">
                                    Si
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <label class="col-4 text-c-blue font-weight-bolder">
                                    Patologías Crónicas
                                </label>
                                <div class="col-7 ml-2">
                                    <ul>
                                        <li type="disc">Asma</li>
                                        <li type="disc">Hipertensión</li>
                                        <li type="disc">Diabetes tipo 1</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseCinco" aria-expanded="false"
                                aria-controls="collapseThree">
                                REGISTRO DE ATENCION MÉDICA ANUAL<i class="fas fa-angle-down float-right"></i>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseCinco" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body-sidebar">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 bg-info pt-3">
                                    <p>16 de Junio de 2016 - 13:00 hrs<br>
                                        Medicina General<br>
                                        Gripe<br>
                                        Dr.Jaime Kriman Astorga
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Cierre: Sidebar 1-->

    <!--Sidebar 2-->
    <div class="bs-canvas-overlay bs-canvas-anim bg-dark position-fixed w-100 h-100"></div>
    <div id="formularios_atencion"
        class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="300px"
        data-offset="true">
        <header class="bs-canvas-header p-3 bg-info overflow-auto">
            <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true"
                    class="text-light">&times;</span></button>
            <h5 class="d-inline-block text-light mb-0 float-right">Formularios Atención</h5>
        </header>
        <div class="bs-canvas-content">
            <div class="accordion" id="accordion_formularios_atencion">
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_form_generales">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapse_form_generales" aria-expanded="true"
                                aria-controls="collapse_form_generales"><i
                                    class="fas fa-angle-down my-auto float-right"></i>
                                FORMULARIOS GENERALES
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_form_generales" class="collapse" aria-labelledby="heading_form_generales"
                        data-parent="#accordion_formularios_atencion">
                        <div class="card-body-sidebar">
                            <!--Boton Modal Formulario certificado de reposo-->
                            <button type="button"
                                class="btn btn-sm btn-primary  btn-block accion_modal_certificado_reposo">Certificado
                                de reposo</button>

                            <!--Boton Modal Formulario de interconsulta-->
                            <button type="button"
                                class="btn btn-sm btn-primary  btn-block accion_modal_interconsulta">Interconsulta</button>

                            <!--Boton Modal Formulario de informe médico-->
                            <button type="button"
                                class="btn btn-sm btn-primary  btn-block accion_modal_inf_medico">Informe
                                Médico</button>

                            <!--Boton Modal formulario uso personal-->
                            <button type="button" class="btn btn-sm btn-primary  btn-block accion_modal_uso_personal">Uso
                                Personal</button>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_form_notificaciones">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapse_form_notificaciones" aria-expanded="false"
                                aria-controls="collapse_form_notificaciones">
                                FORMULARIOS DE NOTIFICACIÓN
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_form_notificaciones" class="collapse"
                        aria-labelledby="heading_form_notificaciones" data-parent="#accordion_formularios_atencion">
                        <div class="card-body-sidebar">
                            <!--Boton Modal Formulario Constancia Ges-->
                            <button type="button"
                                class="btn btn-sm btn-primary btn-block accion_modal_constancia_ges">Constancia
                                GES</button>

                            <!--Boton Modal Formulario Enfermedades de Declaración Obligatoria -->
                            <button type="button"
                                class="btn btn-sm btn-primary btn-block accion_modal_enfermedades_declaracion_obligatoria">Enfermedades
                                de Declaración Obligatoria</button>

                            <!--Boton Modal Formulario Reembolso Médico-->
                            <button type="button"
                                class="btn btn-sm btn-primary btn-block accion_modal_reembolso_medico">Reembolso
                                Médico</button>

                            <!--Boton Modal Formulario Reembolso Dental-->
                            <button type="button"
                                class="btn btn-sm btn-primary btn-block accion_modal_reembolso_dental">Reembolso
                                Dental</button>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_consentimientos_informados">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapse_consentimientos_informados"
                                aria-expanded="false" aria-controls="collapse_consentimientos_informados">
                                CONSENTIMIENTOS INFORMADOS GENERALES
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_consentimientos_informados" class="collapse"
                        aria-labelledby="heading_consentimientos_informados" data-parent="#accordion_formularios_atencion">
                        <div class="card-body-sidebar">
                            <!--Boton Modal Formulario Antestesia-->
                            <button type="button"
                                class="btn btn-sm btn-primary btn-block accion_modal_anestesia">Antestesia</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--Cierre: Sidebar 2-->
    </div>
    <!--Cierre: Container Completo-->

    <!--Modals Formularios generales-->
    <!---******* Modal Formulario certificado de reposo ********-->
    <div id="modal_certificado_reposo" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="modal_certificado_reposo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Certificado de reposo</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="form_certificado_reposo" method="post" action="{{ route('crear.reposo') }}">

                        @csrf
                        <input type="hidden" id="id_paciente_reposo" value="{{ $paciente->id }}"
                            name="id_paciente_reposo">
                        <input type="hidden" id="id_profesional_reposo" value="{{ $profesional->id }}"
                            name="id_profesional_reposo">

                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Nombre</label>
                                <input type="text" class="form-control form-control-sm"
                                    value="{{ $paciente->nombre . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}"
                                    name="reposo_paciente" id="reposo_paciente">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Rut</label>
                                <input type="person" class="form-control form-control-sm" value="{{ $paciente->rut }}"
                                    name="reposo_rut" id="reposo_rut">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Edad</label>
                                <input type="number" class="form-control form-control-sm" name="reposo_edad"
                                    id="reposo_edad">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 mb-1 mt-2">
                                <p class="text-c-blue">El Profesional que suscribe certifica que este paciente debe
                                    permanecer en reposo</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Desde</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_inicio"
                                    id="fecha_inicio">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Hasta</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_termino"
                                    id="fecha_termino">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Hipótesis Diagnóstica</label>
                                <textarea type="text" class="form-control form-control-sm" rows="2"
                                    name="hipotesis_reposo" id="hipotesis_reposo"></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Comentarios</label>
                                <textarea type="text" class="form-control form-control-sm" rows="2"
                                    name="comentarios_reposo" id="comentarios_reposo"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 text-center">
                                <!--<p class="mb-2">Saluda atentamente</p>-->
                                <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-info">Guardar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!---******* Modal Formulario de interconsulta ********-->
    <div id="modal_interconsulta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_interconsulta"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Interconsulta</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body mb-0">
                    <form id="interconsulta">
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Nombre</label>
                                <input type="text"
                                    value="{{ $paciente->nombre . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}"
                                    class="form-control form-control-sm" name="inter_nombre" id="inter_nombre">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Rut</label>
                                <input type="text" value="{{ $paciente->rut }}" class="form-control form-control-sm"
                                    name="inter_rut" id="inter_rut">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Edad</label>
                                <input type="number" class="form-control form-control-sm" name="inter_edad"
                                    id="inter_edad">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Dirección</label>
                                <input type="text" value="{{ $paciente->direccion }}"
                                    class="form-control form-control-sm" name="inter_dire" id="inter_dire">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Región / Comuna</label>
                                <select id="inter_region" name="inter_region" class="form-control form-control-sm">
                                    <option selected value="0">Seleccione una opción </option>
                                    <optgroup label="Región de Valparaíso">
                                        <option>Viña del Mar</option>
                                        <option>Valparaíso</option>
                                        <option>San Felipe</option>
                                        <option>etc...</option>
                                    </optgroup>
                                    <optgroup label="Región Metropolitana">
                                        <option>Santiago</option>
                                        <option>Maipú</option>
                                        <option>etc...</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </form>
                    <ul class="nav nav-pills mt-3 mb-4" id="pills-tab-interconsulta" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link-modal active" id="pills-tab-inter-especialidad" data-toggle="pill"
                                href="#pills-inter-especialidad" role="tab" aria-controls="pills-home"
                                aria-selected="true">Interconsulta Especialidad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-modal" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">Responder Interconsulta</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent-interconsulta">
                        <div class="tab-pane fade show active" id="pills-inter-especialidad" role="tabpanel"
                            aria-labelledby="pills-tab-inter-especialidad">
                            <form id="inter-especialidad" method="post" action="{{ route('crear.interconsulta') }}">
                                @csrf
                                <input type="hidden" id="id_paciente" value="{{ $paciente->id }}" name="id_paciente">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Nombre especialidad o especialista</label>
                                        <input type="text" class="form-control form-control-sm" name="especialidad"
                                            id="especialidad">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Hipótesis diagnóstica</label>
                                        <input type="text" class="form-control form-control-sm" name="hipotesis"
                                            id="hipotesis">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Se desea saber</label>
                                        <textarea type="text" class="form-control form-control-sm" rows="2"
                                            name="descripcion" id="descripcion"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-12 text-center mb-2">
                                        <!--<p class="mb-2">Saluda atentamente</p>-->
                                        <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                                    </div>
                                </div>
                                <div class="modal-footer pt-2 pb-0">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <form id="inter-especialidad">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Diagnóstico</label>
                                        <input type="text" class="form-control form-control-sm" name="diagnostico"
                                            id="diagnostico">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Tratamiento</label>
                                        <textarea type="text" class="form-control form-control-sm" rows="2"
                                            name="tratamiento" id="tratamiento"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Comentario</label>
                                        <textarea type="text" class="form-control form-control-sm" rows="2"
                                            name="comentario" id="comentario"></textarea>
                                    </div>
                                    <!--<div class="form-group col-sm-12 col-md-12">
                                                                                                                                                                                                            <label class="floating-label-activo-sm">Fecha</label>
                                                                                                                                                                                                            <input type="date" class="form-control form-control-sm" name="" id="">
                                                                                                                                                                                                        </div>-->
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Nombre del profesional</label>
                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label">Email</label>
                                        <input type="email" class="form-control form-control-sm" name="" id="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Fecha de control</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_control"
                                            id="fecha_control">
                                    </div>
                                    <div class="col-sm-12 col-md-12 text-center mb-2">
                                        <!--<p class="mb-2">Saluda atentamente</p>-->
                                        <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                                    </div>
                                </div>
                                <div class="modal-footer pt-2 pb-0">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-info">Guardar Respuesta</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---******* Modal Formulario informe médico ********-->
    <div id="modal_inf_medico" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_inf_medico"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Informe Médico</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="form_informe_medico" method="post" action="{{ route('crear.informe_medico') }}">
                        @csrf
                        <input type="hidden" name="profesional_informe" value="{{ $profesional->id }}"
                            name="profesional_informe">
                        <input type="hidden" name="paciente_informe" value="{{ $paciente->id }}" name="paciente_informe">
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Nombre</label>
                                <input type="text" class="form-control form-control-sm"
                                    value="{{ $paciente->nombre . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}"
                                    name="informe_nombre" id="informe_nombre">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Rut</label>
                                <input type="person" class="form-control form-control-sm" value="{{ $paciente->rut }}"
                                    name="informe_rut" id="informe_rut">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Edad</label>
                                <input type="number" class="form-control form-control-sm" name="informe_edad"
                                    id="informe_edad">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Dirección</label>
                                <input type="address" class="form-control form-control-sm"
                                    value="{{ $paciente->dirección }}" name="informe_direccion" id="informe_direccion">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Región / Comuna</label>
                                <select id="informe_region" name="informe_region" class="form-control form-control-sm">
                                    <option selected value="0">Seleccione una opción </option>
                                    <optgroup label="Región de Valparaíso">
                                        <option>Viña del Mar</option>
                                        <option>Valparaíso</option>
                                        <option>San Felipe</option>
                                        <option>etc...</option>
                                    </optgroup>
                                    <optgroup label="Región Metropolitana">
                                        <option>Santiago</option>
                                        <option>Maipú</option>
                                        <option>etc...</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_informe"
                                    id="fecha_informe">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <p class="text-c-blue mb-0 mt-3">El Profesional que suscribe informa que</p>
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Descripción</label>
                                <textarea type="text" class="form-control form-control-sm" rows="3"
                                    name="descripcion_informe" id="descripcion_informe"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 text-center">
                                <!--<p class="mb-2">Saluda atentamente</p>-->
                                <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-info">Guardar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!---******* Modal Formulario uso personal ********-->
    <div id="modal_uso_personal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_uso_personal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Uso Personal</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="form_uso_personal">
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Dirigido a</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Cargo</label>
                                <input type="person" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Mensaje</label>
                                <textarea type="text" class="form-control form-control-sm" rows="12" name="mensaje"
                                    id="mensaje"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 text-center">
                                <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modals Formularios de Notificación-->
    <!---******* Modal Formulario Constancia Ges ********-->
    <div id="modal_constancia_ges" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="modal_constancia_ges" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Constancia GES (Artículo 24 Ley 19.966)</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form method="post" action="{{ route('crear.constancia_ges') }}">
                    @csrf
                    <input type="hidden" name="id_paciente_ges" value="{{ $paciente->id }}" id="id_paciente_ges">
                    <div class="modal-body">
                        <div class="bt-wizard" id="wizard_constancia_ges">
                            <ul class="nav nav-pills">
                                <li class="tab-wizard-formularios"><a href="#datos_prestador_ges"
                                        class="nav-link-wizard rounded-0" data-toggle="tab">Datos del prestador</a></li>
                                <li class="tab-wizard-formularios"><a href="#datos_paciente_ges"
                                        class="nav-link-wizard rounded-0" data-toggle="tab">Datos del paciente</a></li>
                                <li class="tab-wizard-formularios"><a href="#informacion_medica_ges"
                                        class="nav-link-wizard rounded-0" data-toggle="tab">Información médica</a></li>
                                <li class="tab-wizard-formularios"><a href="#constancia_ges"
                                        class="nav-link-wizard rounded-0" data-toggle="tab">Constancia</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane pt-4 active show" id="datos_prestador_ges">

                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Datos del Prestador</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Nombre</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="nombre_prestador" id="nombre_prestador">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Dirección</label>
                                            <input type="address" class="form-control form-control-sm"
                                                name="direccion_prestador" id="direccion_prestador">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Nombre del responsable</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="nombre_responsable" id="nombre_responsable">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Rut del responsable</label>
                                            <input type="person" class="form-control form-control-sm"
                                                name="rut_responsable" id="rut_responsable">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane pt-4" id="datos_paciente_ges">

                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Datos del Paciente</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Nombre</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_paciente"
                                                value="{{ $paciente->nombre . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}"
                                                id="nombre_paciente">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Rut</label>
                                            <input type="person" class="form-control form-control-sm" name="rut_paciente"
                                                value="{{ $paciente->rut }}" id="rut_paciente">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Previsión</label>
                                            <select id="prevision" name="prevision" class="form-control form-control-sm">
                                                <option value="0">Selecione una opción</option>
                                                <option value="particular">Particular</option>
                                                <option value="fonasa">Fonasa</option>
                                                <option value="banmedica">Banmedica</option>
                                                <option value="colmena">Colmena</option>
                                                <option value="cruz verde">Cruz Verde</option>
                                                <option value="nueva masvida">Nueva MasVida</option>
                                                <option value="consalud">Consalud</option>
                                                <option value="control sin costo">Control sin costo</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Dirección</label>
                                            <input type="address" class="form-control form-control-sm"
                                                name="direccion_paciente" value="{{ $paciente->direccion }}"
                                                id="direccion_paciente">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Correo electrónico</label>
                                            <input type="email" class="form-control form-control-sm"
                                                value="{{ $paciente->email }}" name="email_paciente"
                                                id="email_paciente">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Teléfono</label>
                                            <input type="tel" class="form-control form-control-sm"
                                                value="{{ $paciente->teléfono_uno }}" name="telefono_paciente"
                                                id="telefono_paciente">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane pt-4" id="informacion_medica_ges">

                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Información Médica</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Confirmación diagnóstica GES</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="confirmacion_ges" id="confirmacion_ges">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">¿Confirmación diagnóstica?</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="confirmacion_diagnostica_2" id="confirmacion_diagnostica_2">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">¿Paciente con tratamiento?</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="paciente_tratamiento" id="paciente_tratamiento">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Notificación</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="fecha_notificacion" id="fecha_notificacion">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Hora</label>
                                            <input type="time" class="form-control form-control-sm" name="fecha"
                                                id="fecha">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane pt-4" id="constancia_ges">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <h6 class="text-c-blue mb-2 text-center">Constancia</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                                <p>Declaro que con esta <span>fecha</span> y
                                                    <span>hora</span>, he tomado conocimiento de que tengo derecho a acceder
                                                    a
                                                    las "Garantías Explícitas en Salud" GES, siempre que la atención sea
                                                    otorgada en la "Red de Prestadores" que me corresponde según Fonasa o la
                                                    Isapre a la que me encuentro adscrito/a.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 text-center">
                                            <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento
                                                en
                                                PDF</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!---******* Modal Formulario enfermedades de declaración obligatoria ********-->
    <div id="modal_enfermedades_declaracion_obligatoria" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="modal_enfermedades_declaracion_obligatoria" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Enfermedades de declaración obligatoria E.N.O</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>

                <form action="{{ route('crear.eno') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_paciente_eno" value="{{ $paciente->id }}" id="id_paciente_eno">
                    <input type="hidden" name="id_profesional_eno" value="{{ $profesional->id }}"
                        id="id_profesional_eno">
                    <div class="modal-body">
                        <div class="bt-wizard" id="enfermedades_declaracion_obligatoria">
                            <ul class="nav nav-pills">
                                <li class="tab-wizard-formularios"><a href="#ident_establecimiento_eno"
                                        class="nav-link-wizard rounded-0" data-toggle="tab">Identificación del
                                        establecimiento</a></li>
                                <li class="tab-wizard-formularios"><a href="#ident_paciente_eno"
                                        class="nav-link-wizard rounded-0" data-toggle="tab">Identificación del
                                        paciente</a>
                                </li>
                                <li class="tab-wizard-formularios"><a href="#ident_clinica_paciente_eno"
                                        class="nav-link-wizard rounded-0" data-toggle="tab">Información clínica del
                                        paciente</a></li>
                                <li class="tab-wizard-formularios"><a href="#notificacion_eno"
                                        class="nav-link-wizard rounded-0" data-toggle="tab">Notificación</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane pt-4 active show" id="ident_establecimiento_eno">

                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Identificación del establecimiento</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Nombre del establecimiento</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="nombre_establecimiento_ges" id="nombre_establecimiento_ges">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Código del establecimiento</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="codigo_establecimiento_ges" id="codigo_establecimiento_ges">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Nombre de oficina provincial</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="oficina_provincial" id="oficina_provincial">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Código de oficina provincial</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="codigo_oficina_provincial" id="codigo_oficina_provincial">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label">Nº de ficha clínica o código de control</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="id_ficha_clinica" id="id_ficha_clinica">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane pt-4" id="ident_paciente_eno">

                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Identificación del Paciente</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Rut</label>
                                            <input type="person" class="form-control form-control-sm" name="rut_paciente"
                                                value="{{ $paciente->rut }}" id="rut_paciente">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre completo</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_paciente"
                                                value="{{ $paciente->nombre . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}"
                                                id="nombre_paciente">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Sexo</label>
                                            <input type="text" class="form-control form-control-sm" name="sexo_paciente"
                                                value="{{ $paciente->sexo }}" id="sexo_paciente">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Nacimiento</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="nacimiento_paciente" value="{{ $paciente->fecha_nac }}"
                                                id="nacimiento_paciente">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Dirección</label>
                                            <input type="address" class="form-control form-control-sm"
                                                value="{{ $paciente->dirección }}" name="direccion_paciente"
                                                id="direccion_paciente">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Región / Comuna</label>
                                            <select id="prevision" name="prevision" class="form-control form-control-sm">
                                                <option selected value="0">Seleccione una opción </option>
                                                <optgroup label="Región de Valparaíso">
                                                    <option value="1">Viña del Mar</option>
                                                    <option value="2">Valparaíso</option>
                                                    <option value="3">San Felipe</option>
                                                    <option value="3">etc...</option>
                                                </optgroup>
                                                <optgroup label="Región Metropolitana">
                                                    <option value="10">Santiago</option>
                                                    <option value="11">Maipú</option>
                                                    <option value="12">etc...</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Correo electrónico</label>
                                            <input type="email" class="form-control form-control-sm" name="email_paciente"
                                                value="{{ $paciente->email }}" id="email_paciente">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Teléfono</label>
                                            <input type="tel" class="form-control form-control-sm"
                                                name="telefono_paciente" value="{{ $paciente->telefono_uno }}ac}}"
                                                id="telefono_paciente">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nacionalidad</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="nacionalidad_paciente" id="nacionalidad_paciente">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Código de nacionalidad</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="nacionalidad_paciente" id="nacionalidad_paciente">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Seleccione pueblo originario</label>
                                            <select class="form-control form-control-sm" id="pueblo_originario"
                                                name="pueblo_originario">
                                                <option value="0">Selecione una opción</option>
                                                <option value="1">Ninguna</option>
                                                <option value="2">Atacameño</option>
                                                <option value="3">Aimara</option>
                                                <option value="5">Colla</option>
                                                <option value="6">etc..</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Ocupación</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="ocupacion_paciente" value="{{ $paciente->profesion }}"
                                                id="ocupacion_paciente">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Condición</label>
                                            <select class="form-control form-control-sm" id="ocupacion_condicion"
                                                name="ocupacion_condicion">
                                                <option>Seleccione condición</option>
                                                <option>Inactivo/a</option>
                                                <option>Activo/a</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Categoría</label>
                                            <select class="form-control form-control-sm" id="ocupacion_categoria"
                                                name="ocupacion_categoria">
                                                <option>Seleccione categoría</option>
                                                <option>Patrón / Empresario</option>
                                                <option>Empleado</option>
                                                <option>Obrero</option>
                                                <option>Trabajador Independiente</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane pt-4" id="ident_clinica_paciente_eno">

                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Información clínica del paciente</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Diagnósico Confirmado</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="diagnostico_confirmado" id="diagnostico_confirmado">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">CIE-10</label>
                                            <input type="text" class="form-control form-control-sm" name="cie-10"
                                                id="cie-10">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-4 col-md-4">
                                            <label class="floating-label-activo-sm">Primeros síntomas</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="fecha_primeros_sintomas" id="fecha_primeros_sintomas">
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4">
                                            <label class="floating-label">País de contagio</label>
                                            <select class="form-control form-control-sm" id="vacunacion"
                                                name="vacunacion">
                                                <option>Seleccione una opción</option>
                                                <option>Chile</option>
                                                <option>Extranjero</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4">
                                            <label class="floating-label">País</label>
                                            <input type="text" class="form-control form-control-sm" name="pais" id="pais">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Antecedentes de Vacunación</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-4 col-md-4">
                                            <label class="floating-label">Vacunación</label>
                                            <select class="form-control form-control-sm" id="vacunacion"
                                                name="vacunacion">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                                <option>Ignorado</option>
                                                <option>No corresponde</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4">
                                            <label class="floating-label-activo-sm">Fecha última dosis</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="fecha_ultima_dosis" id="fecha_ultima_dosis">
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4">
                                            <label class="floating-label-activo-sm">Nº última dosis</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="numero_ultima_dosis" id="numero_ultima_dosis">
                                        </div>
                                    </div>
                                    <div class="form-row mt-0 pt-0">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <p class="mb-0 pb-0">Completar solo si la declaración corresponde a TBC
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Solo para TBC(NUEVO-RECAIDA)</label>
                                            <input type="text" class="form-control form-control-sm" name="nuevo_tbc"
                                                id="nuevo_tbc">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">RECAIDAS</label>
                                            <input type="text" class="form-control form-control-sm" name="recaidas_tbc"
                                                id="recaidas_tbc">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane pt-4" id="notificacion_eno">

                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Información del profesional que notifica</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Rut</label>
                                            <input type="person" class="form-control form-control-sm" name="rut" id="rut">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombres y Apellidos</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="nombre_apellidos" id="nombre_apellidos">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Teléfono</label>
                                            <input type="tel" class="form-control form-control-sm" name="telefono"
                                                id="telefono">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Correo Electrónico</label>
                                            <input type="email" class="form-control form-control-sm" name="correo"
                                                id="correo">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 class="text-c-blue">Notificación</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha"
                                                id="fecha">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Hora</label>
                                            <input type="time" class="form-control form-control-sm" name="fecha"
                                                id="fecha">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="text-c-blue text-center mt-3">Instructivo boletín notificación de
                                                enfermedades de declaración obligatoria (boletín E.N.O)</h5>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                                <ol class="px-2">
                                                    <li value="1">
                                                        <p>Los Items <strong>Nombre;
                                                                Establecimiento</strong>;<strong>Oficina
                                                                Provincial</strong>;<strong>Codigos
                                                                Asignados</strong>;<strong>Seremi</strong>;<strong>Nacionalidad</strong>;<strong>Pueblo
                                                                originario declarado</strong>;<strong> Comuna de
                                                                residencia</strong>, etc. <a href="https://deis.minsal.cl"
                                                                class="link-negro"> Los puede consultar acá. </a></p>
                                                    </li>
                                                    <li>
                                                        <p>Para el(la) enfermo(a) que presente 2 o más afecciones de
                                                            declaración
                                                            obligatoria, éstas deberán ser registradas en <span
                                                                class="auto-style1"><strong>FORMULARIOS
                                                                    SEPARADOS</strong></span> para cada una. Sólo en caso de
                                                            Tuberculosis se registrará en la 2da. línea otro diagnóstico
                                                            relacionado con esta afección.</p>
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 text-center">
                                            <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento
                                                en
                                                PDF</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="row justify-content-between mx-0 btn-page">
                                    <div class="col-sm-6 pl-0">
                                        <a href="#!" class="btn btn-success btn-sm button-previous">Anterior</a>
                                    </div>
                                    <div class="col-sm-6 text-md-right pr-0">
                                        <a href="#!" class="btn btn-success btn-sm button-next">Siguente</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!---******* Modal Formulario Reembolso gastos médicos ********-->
    <div id="modal_reembolso_medico" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="modal_reembolso_medico" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Reembolso de gastos médicos</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="bt-wizard" id="reembolso_gastos_medicos">
                        <ul class="nav nav-pills">
                            <li class="tab-wizard-formularios"><a href="#ident_asegurado_carga"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Identificacion del asegurado o
                                    carga</a></li>
                            <li class="tab-wizard-formularios"><a href="#ident_causa_solicitud"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Causa de la solicitud</a></li>
                            <li class="tab-wizard-formularios"><a href="#ant_reembolso"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Antecedentes del reembolso</a>
                            </li>
                            <li class="tab-wizard-formularios"><a href="#informe_medico"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Informe médico</a></li>
                            <li class="tab-wizard-formularios"><a href="#info_personal_tratante"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Profesional tratante</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane pt-4 active show" id="ident_asegurado_carga">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Identificacion del asegurado o carga</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Aseguradora</label>
                                            <input type="text" class="form-control form-control-sm" name="aseguradora"
                                                id="aseguradora">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nº Poliza</label>
                                            <input type="number" class="form-control form-control-sm" name="num_poliza"
                                                id="num_poliza">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Empresa asociada</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="empresa_asociada" id="empresa_asociada">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre Asegurado</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="nombre_asegurado" id="nombre_asegurado">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Rut asegurado</label>
                                            <input type="person" class="form-control form-control-sm" type="rut_asegurado"
                                                name="rut_asegurado">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Previsión</label>
                                            <select id="prevision" name="prevision" class="form-control form-control-sm">
                                                <option value="0">Selecione una opción</option>
                                                <option value="particular">Particular</option>
                                                <option value="fonasa">Fonasa</option>
                                                <option value="banmedica">Banmedica</option>
                                                <option value="colmena">Colmena</option>
                                                <option value="cruz verde">Cruz Verde</option>
                                                <option value="nueva masvida">Nueva MasVida</option>
                                                <option value="consalud">Consalud</option>
                                                <option value="control sin costo">Control sin costo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre del paciente</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_paciente"
                                                id="nombre_paciente">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Tipo de carga</label>
                                            <input type="text" class="form-control form-control-sm" name="tipo_carga"
                                                id="tipo_carga">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Edad</label>
                                            <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nº de carga</label>
                                            <input type="text" class="form-control form-control-sm" name="numero_carga"
                                                id="numero_carga">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="ident_causa_solicitud">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Causa de la solicitud</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Causa</label>
                                            <select class="form-control form-control-sm" id="causa" name="causa">
                                                <option>Accidente</option>
                                                <option>Continuidad de tratamiento</option>
                                                <option>Enfermedad</option>
                                                <option>Embarazo</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Especifique otro</label>
                                            <input type="text" class="form-control form-control-sm" type="causa_otro"
                                                name="causa_otro">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Diagnóstico</label>
                                            <input type="text" class="form-control form-control-sm"
                                                type="diagnostico_causa" name="diagnostico_causa">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">¿Continuidad de tratamiento?</label>
                                            <select class="form-control form-control-sm" id="causa" name="causa">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de accidente</label>
                                            <input type="date" class="form-control form-control-sm" type="fecha_accidente"
                                                name="fecha_accidente">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Lugar del accidente</label>
                                            <select class="form-control form-control-sm " id="lugar_accidente"
                                                name="lugar_accidente">
                                                <option>Seleccione una opción</option>
                                                <option>Vía Pública</option>
                                                <option>Hogar</option>
                                                <option>Trayecto al trabajo</option>
                                                <option>Trayecto al hogar</option>
                                                <option>Trabajo</option>
                                                <option>Tránsito</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                                <p>Por este medio certifico que los datos aportados son verdaderos y
                                                    autorizo al médico tratante hospitales o cualquier otra institución de
                                                    salud , para que suministre la información requerida de mi persona o
                                                    beneficiario, conforme lo dispone la LEY Nº 19.628 y el artículo 127 del
                                                    código Sanitario declaro también conocer y autorizar a que todos los
                                                    antecedentes en esta solicitud de reembolso serán del conocimiento de
                                                    las diferentes personas que participan en la evaluación, liquidación y
                                                    traslado de la misma , por lo que libero a la compañía aseguradora de
                                                    toda responsabilidad en el manejo de la misma. En el caso de requerir
                                                    confidencialidad, rogamos enviar en sobre cerrado al departamento de
                                                    salud con el rotulo de confidencial. Recuerde que en el caso de
                                                    accidente del tránsito, <strong>deberá presentar la liquidación del
                                                        seguro obligatorio de accidentes personales.</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="ant_reembolso">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Antecedentes del reembolso</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de prestación</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="fecha_prestación" id="fecha_prestación">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Bonos</label>
                                            <input type="text" class="form-control form-control-sm" name="bonos"
                                                id="bonos">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Total de documentos</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="total_documentos" id="total_documentos">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Boletas</label>
                                            <input type="text" class="form-control form-control-sm" name="boletas"
                                                id="boletas">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Recetas</label>
                                            <input type="text" class="form-control form-control-sm" name="recetas"
                                                id="recetas">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Diferencia reclamada</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="diferencia_reclamada" id="diferencia_reclamada">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Otros</label>
                                            <input type="text" class="form-control form-control-sm" name="otros"
                                                id="otros">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nº de reclamos</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="numero_reclamos" id="numero_reclamos">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de ingresos</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_ingreso"
                                                id="fecha_ingreso">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Otros</label>
                                            <input type="text" class="form-control form-control-sm" name="otros"
                                                id="otros">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Reclamo anterior</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="reclamo_anterior" id="reclamo_anterior">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Autorización del usuario</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="autorizacion_usuario" id="autorizacion_usuario">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="informe_medico">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Informe médico tratante</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de inicio de enfermedad</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="fecha_inicio_enfermedad" id="fecha_inicio_enfermedad">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha primera consulta médica</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="fecha_primera_consulta" id="fecha_primera_consulta">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de consulta</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_consulta"
                                                id="fecha_consulta">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre del paciente</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_paciente"
                                                id="nombre_paciente">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Edad</label>
                                            <input type="number" class="form-control form-control-sm" name="edad_paciente"
                                                id="edad_paciente">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Dirección</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="direccion_paciente" id="direccion_paciente">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Diagnóstico</label>
                                            <input type="text" class="form-control form-control-sm" name="diagnostico"
                                                id="diagnostico">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">¿Control?</label>
                                            <select class="form-control form-control-sm" id="control" name="control">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">¿Embarazo?</label>
                                            <select class="form-control form-control-sm" id="embarazo" name="embarazo">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nº de semanas</label>
                                            <select class="form-control form-control-sm" id="num_semanas"
                                                name="num_semanas">
                                                <option>Seleccione una opción</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>11</option>
                                                <option>12</option>
                                                <option>13</option>
                                                <option>14</option>
                                                <option>15</option>
                                                <option>16</option>
                                                <option>17</option>
                                                <option>18</option>
                                                <option>19</option>
                                                <option>20</option>
                                                <option>21</option>
                                                <option>22</option>
                                                <option>23</option>
                                                <option>24</option>
                                                <option>25</option>
                                                <option>26</option>
                                                <option>27</option>
                                                <option>28</option>
                                                <option>29</option>
                                                <option>30</option>
                                                <option>31</option>
                                                <option>32</option>
                                                <option>33</option>
                                                <option>34</option>
                                                <option>35</option>
                                                <option>36</option>
                                                <option>37</option>
                                                <option>38</option>
                                                <option>39</option>
                                                <option>40</option>
                                                <option>Más</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fur</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_fur"
                                                id="fecha_fur">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">¿Complicación en el embarazo?</label>
                                            <select class="form-control form-control-sm" id="complicacion_embarazo"
                                                name="complicacion_embarazo">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">¿Accidente?</label>
                                            <select class="form-control form-control-sm" id="accidente" name="accidente">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de accidente</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_accidente"
                                                id="fecha_accidente">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Tipo de accidente</label>
                                            <input type="text" class="form-control form-control-sm" name="tipo_accidente"
                                                id="tipo_accidente">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Lugar de accidente</label>
                                            <input type="text" class="form-control form-control-sm" name="lugar_accidente"
                                                id="lugar_accidente">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="info_personal_tratante">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Profesional tratante</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Rut</label>
                                            <input type="person" class="form-control form-control-sm"
                                                name="rut_profesional" id="rut_profesional">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="nombre_profesional" id="nombre_profesional">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Teléfono</label>
                                            <input type="tel" class="form-control form-control-sm"
                                                name="telefono_profesional" id="telefono_profesional">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Email</label>
                                            <input type="email" class="form-control form-control-sm"
                                                name="email_profesional" id="email_profesional">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Fecha del informe</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_informe"
                                                id="fecha_informe">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 text-center">
                                            <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento
                                                en PDF</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row justify-content-between mx-0 btn-page">
                                <div class="col-sm-6 pl-0">
                                    <a href="#!" class="btn btn-success btn-sm button-previous">Anterior</a>
                                </div>
                                <div class="col-sm-6 text-md-right pr-0">
                                    <a href="#!" class="btn btn-success btn-sm button-next">Siguente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!---******* Modal Formulario Reembolso gastos dentales ********-->
    <div id="modal_reembolso_dental" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="modal_reembolso_dental" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Reembolso de gastos dentales</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="bt-wizard" id="reembolso_gastos_dentales">
                        <ul class="nav nav-pills">
                            <li class="tab-wizard-formularios"><a href="#ident_asegurado_carga_dental"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Identificacion del asegurado o
                                    carga</a></li>
                            <li class="tab-wizard-formularios"><a href="#ident_causa_solicitud_dental"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Causa de la solicitud</a></li>
                            <li class="tab-wizard-formularios"><a href="#ant_reembolso_dental"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Antecedentes del reembolso</a>
                            </li>
                            <li class="tab-wizard-formularios"><a href="#informe_medico_dental"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Informe médico</a></li>
                            <li class="tab-wizard-formularios"><a href="#tratamientos_dentales"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Tratamientos dentales</a></li>
                            <li class="tab-wizard-formularios"><a href="#ortodoncia" class="nav-link-wizard rounded-0"
                                    data-toggle="tab">Ortodoncia</a></li>
                            <li class="tab-wizard-formularios"><a href="#info_profesional_tratante_dental"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Profesional tratante</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane pt-4 active show" id="ident_asegurado_carga_dental">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Identificacion del asegurado o carga</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Aseguradora</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="aseguradora_dental" id="aseguradora_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nº Poliza</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="num_poliza_dental" id="num_poliza_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Empresa asociada</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="empresa_asociada_dental" id="empresa_asociada_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre Asegurado</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="nombre_asegurado_dental" id="nombre_asegurado_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Rut asegurado</label>
                                            <input type="person" class="form-control form-control-sm"
                                                type="rut_asegurado_dental" name="rut_asegurado_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Previsión</label>
                                            <select id="prevision" name="prevision" class="form-control form-control-sm">
                                                <option value="0">Selecione una opción</option>
                                                <option value="particular">Particular</option>
                                                <option value="fonasa">Fonasa</option>
                                                <option value="banmedica">Banmedica</option>
                                                <option value="colmena">Colmena</option>
                                                <option value="cruz verde">Cruz Verde</option>
                                                <option value="nueva masvida">Nueva MasVida</option>
                                                <option value="consalud">Consalud</option>
                                                <option value="control sin costo">Control sin costo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre del paciente</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="nombre_paciente_dental" id="nombre_paciente_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Tipo de carga</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="tipo_carga_dental" id="tipo_carga_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Edad</label>
                                            <input type="number" class="form-control form-control-sm" name="edad"
                                                id="edad">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nº de carga</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="numero_carga_dental" id="numero_carga_dental">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="ident_causa_solicitud_dental">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Causa de la solicitud</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Causa</label>
                                            <select class="form-control form-control-sm" id="causa_dental"
                                                name="causa_dental">
                                                <option>Accidente</option>
                                                <option>Continuidad de tratamiento</option>
                                                <option>Enfermedad</option>
                                                <option>Embarazo</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Especifique otro</label>
                                            <input type="text" class="form-control form-control-sm"
                                                type="causa_otro_dental" name="causa_otro_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Diagnóstico</label>
                                            <input type="text" class="form-control form-control-sm"
                                                type="diagnostico_causa_dental" name="diagnostico_causa_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">¿Continuidad de tratamiento?</label>
                                            <select class="form-control form-control-sm" id="causa_dental"
                                                name="causa_dental">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de accidente</label>
                                            <input type="date" class="form-control form-control-sm"
                                                type="fecha_accidente_dental" name="fecha_accidente_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Lugar del accidente</label>
                                            <select class="form-control form-control-sm " id="lugar_accidente_dental"
                                                name="lugar_accidente_dental">
                                                <option>Seleccione una opción</option>
                                                <option>Vía Pública</option>
                                                <option>Hogar</option>
                                                <option>Trayecto al trabajo</option>
                                                <option>Trayecto al hogar</option>
                                                <option>Trabajo</option>
                                                <option>Tránsito</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                                <p>Por este medio certifico que los datos aportados son verdaderos y
                                                    autorizo al médico tratante hospitales o cualquier otra institución de
                                                    salud , para que suministre la información requerida de mi persona o
                                                    beneficiario, conforme lo dispone la LEY Nº 19.628 y el artículo 127 del
                                                    código Sanitario declaro también conocer y autorizar a que todos los
                                                    antecedentes en esta solicitud de reembolso serán del conocimiento de
                                                    las diferentes personas que participan en la evaluación, liquidación y
                                                    traslado de la misma , por lo que libero a la compañía aseguradora de
                                                    toda responsabilidad en el manejo de la misma. En el caso de requerir
                                                    confidencialidad, rogamos enviar en sobre cerrado al departamento de
                                                    salud con el rotulo de confidencial. Recuerde que en el caso de
                                                    accidente del tránsito, <strong>deberá presentar la liquidación del
                                                        seguro obligatorio de accidentes personales.</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="ant_reembolso_dental">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Antecedentes del reembolso</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de prestación</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="fecha_prestación_dental" id="fecha_prestación_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Bonos</label>
                                            <input type="text" class="form-control form-control-sm" name="bonos_dental"
                                                id="bonos_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Total de documentos</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="total_documentos_dental" id="total_documentos_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Boletas</label>
                                            <input type="text" class="form-control form-control-sm" name="boletas_dental"
                                                id="boletas_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Recetas</label>
                                            <input type="text" class="form-control form-control-sm" name="recetas_dental"
                                                id="recetas_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Diferencia reclamada</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="diferencia_reclamada_dental" id="diferencia_reclamada_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Otros</label>
                                            <input type="text" class="form-control form-control-sm" name="otros_dental"
                                                id="otros_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nº de reclamos</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="numero_reclamos_dental" id="numero_reclamos_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de ingresos</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="fecha_ingreso_dental" id="fecha_ingreso_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Otros</label>
                                            <input type="text" class="form-control form-control-sm" name="otros_dental"
                                                id="otros_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Reclamo anterior</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="reclamo_anterior_dental" id="reclamo_anterior_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Autorización del usuario</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="autorizacion_usuario_dental" id="autorizacion_usuario_dental">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="informe_medico_dental">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Informe médico tratante</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de inicio de enfermedad</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="fecha_inicio_enfermedad_dental" id="fecha_inicio_enfermedad_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha primera consulta médica</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="fecha_primera_consulta_dental" id="fecha_primera_consulta_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de consulta</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="fecha_consulta_dental" id="fecha_consulta_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre del paciente</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="nombre_paciente_dental" id="nombre_paciente_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Edad</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="edad_paciente_dental" id="edad_paciente_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Dirección</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="direccion_paciente_dental" id="direccion_paciente_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Diagnóstico</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="diagnostico_dental" id="diagnostico_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">¿Control?</label>
                                            <select class="form-control form-control-sm" id="control_dental"
                                                name="control_dental">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">¿Accidente?</label>
                                            <select class="form-control form-control-sm" id="accidente_dental"
                                                name="accidente_dental">
                                                <option>Seleccione una opción</option>
                                                <option>Si</option>
                                                <option>No</option>
                                                <option>Otro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de accidente</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="fecha_accidente_dental" id="fecha_accidente_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Tipo de accidente</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="tipo_accidente_dental" id="tipo_accidente_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Lugar de accidente</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="lugar_accidente_dental" id="lugar_accidente_dental">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="informe_medico_dental">

                            </div>
                            <div class="tab-pane pt-4" id="tratamientos_dentales">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Tratamientos dentales</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Prestación</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="presntación_dental" id="presntación_dental">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label class="floating-label">Nº</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="numero_prestacion_dental" id="numero_prestacion_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Cantidad</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="cantidad_dental" id="cantidad_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_dental"
                                                id="fecha_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Valor unitario</label>
                                            <input type="number" class="form-control form-control-sm" name="valor_dental"
                                                id="valor_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Total</label>
                                            <input type="number" class="form-control form-control-sm" name="total_dental"
                                                id="total_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Prestación</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="presntación_dental" id="presntación_dental">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label class="floating-label">Nº</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="numero_prestacion_dental" id="numero_prestacion_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Cantidad</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="cantidad_dental" id="cantidad_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_dental"
                                                id="fecha_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Valor unitario</label>
                                            <input type="number" class="form-control form-control-sm" name="valor_dental"
                                                id="valor_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Total</label>
                                            <input type="number" class="form-control form-control-sm" name="total_dental"
                                                id="total_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Laboratorio</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="laboratorio_dental" id="laboratorio_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Valor total reclamo</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="valor_reclamo_dental" id="valor_reclamo_dental">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="ortodoncia">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Ortodoncia</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Tipo de aparato</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="aparato_dental_ortodoncia" id="aparato_dental_ortodoncia">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de instalación</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="fecha_instalacion_ortodoncia" id="fecha_instalacion_ortodoncia">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Fecha de primer control</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="fecha_primer_control_ortodoncia" id="fecha_primer_control_ortodoncia">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Duración del tratamiento</label>
                                            <input type="texto" class="form-control form-control-sm"
                                                name="duracion_ortodoncia" id="duracion_ortodoncia">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Valor clínico del aparato</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="valor_aparato_ortodoncia" id="valor_aparato_ortodoncia">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Valor de controles clínicos</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="valor_clinico_ortodoncia" id="valor_clinico_ortodoncia">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane pt-4" id="info_profesional_tratante_dental">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Profesional tratante</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Rut</label>
                                            <input type="person" class="form-control form-control-sm"
                                                name="rut_profesional" id="rut_profesional">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Nombre</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="nombre_profesional" id="nombre_profesional">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Teléfono</label>
                                            <input type="tel" class="form-control form-control-sm"
                                                name="telefono_profesional_dental" id="telefono_profesional_dental">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Email</label>
                                            <input type="email" class="form-control form-control-sm"
                                                name="email_profesional_dental" id="email_profesional_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-sm-12">
                                            <h6 class="text-c-blue">Fecha del informe</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="fecha_informe_dental" id="fecha_informe_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 text-center">
                                            <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento
                                                en PDF</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row justify-content-between mx-0 btn-page">
                                <div class="col-sm-6 pl-0">
                                    <a href="#!" class="btn btn-success btn-sm button-previous">Anterior</a>
                                </div>
                                <div class="col-sm-6 text-md-right pr-0">
                                    <a href="#!" class="btn btn-success btn-sm button-next">Siguente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modals Formularios de Consentimientos informados generales-->
    <!---******* Modal Formulario Anestesia ********-->
    <div id="modal_anestesia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_anestesia"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Consentimiento informado anestesia</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label">Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="nombre" id="nombre">
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label">Rut</label>
                                <input type="person" class="form-control form-control-sm" name="rut" id="rut">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label">Dirección</label>
                                <input type="address" class="form-control form-control-sm" name="direccion"
                                    id="direccion">
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label">Región / Comuna</label>
                                <select id="region_comuna" name="region_comuna" class="form-control form-control-sm">
                                    <option selected value="0">Seleccione una opción </option>
                                    <optgroup label="Región de Valparaíso">
                                        <option>Viña del Mar</option>
                                        <option>Valparaíso</option>
                                        <option>San Felipe</option>
                                        <option>etc...</option>
                                    </optgroup>
                                    <optgroup label="Región Metropolitana">
                                        <option>Santiago</option>
                                        <option>Maipú</option>
                                        <option>etc...</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label">Edad</label>
                                <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_anestesi"
                                    id="fecha_anestesi">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <h6>En representeción de</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Nombre del paciente</label>
                                <input type="person" class="form-control form-control-sm" type="nombre_paciente"
                                    name="nombre_paciente">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Incapacitado en estos momentos por</label>
                                <input type="text" class="form-control form-control-sm" type="incapacitacion"
                                    name="incapacitacion">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <h6>Certifico que el profesional</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Nombre del profesional</label>
                                <input type="person" class="form-control form-control-sm" type="nombre_profesional"
                                    name="nombre_profesional">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <h6>Me ha informado acerca de los riesgos y el porqué considera necesario realizar el
                                    procedimiento</h6>
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label">Nombre y tipo de anestesia</label>
                                <input type="person" class="form-control form-control-sm" type="nombre_profesional"
                                    name="nombre_profesional">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 text-center">
                                <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en
                                    PDF</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Autoentificación</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </div>
        </div>
    </div>



    <!--Botón-->
    <div class="row">
        <div class="col-sm-12">
            <div class="boton-formularios">
                <input type="checkbox" id="btn-mas">
                <div class="redes">
                    <a id="boton_1" href="#" class="fas fa-user fa-2x" data-toggle="canvas"
                        data-target="#antecedentes_paciente" aria-expanded="false" aria-controls="bs-canvas-right">

                    </a>
                    <a id="boton_2" href="#" class="fas fa-notes-medical fa-2x" data-toggle="canvas"
                        data-target="#formularios_atencion" aria-expanded="false" aria-controls="bs-canvas-right"></a>
                </div>
                <div class="btn-mas">
                    <label for="btn-mas" class="fa fa-plus"></label>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Botón Flotante-->





@endsection

@section('js_inferior')

    {{ view('./template/js_inferior') }}

    <script>
        //funcion para capturar el tipo de examen y buscar los subtipo que estan relacionados con el
        $('#tipo_examen').change(function(e) {
            e.preventDefault();
            tipo_examen = $('#tipo_examen').val();

            $("#sub_tipo_examen").empty();
            $("#examen").empty();
            $.ajax({
                    url: '{{ route('listar.sub_tipo_examen') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        tipo_examen: tipo_examen
                    },
                })
                .done(function(response) {
                    $('#sub_tipo_examen').append(`<option value="0">Seleccione... </option>`);
                    for (var i = 0; i < response.length; i++) {
                        $('#sub_tipo_examen').append(`<option value="${response[i].id}">
                                       ${response[i].nombre_sub_tipo_examen}
                                  </option>`);
                    }
                })
                .fail(function() {
                    console.log("error");
                })

        });

        //funcion para capturar el sub tipo de examen y buscar los examenes que estan relacionados con el
        $('#sub_tipo_examen').change(function(e) {
            e.preventDefault();
            sub_tipo_examen = $('#sub_tipo_examen').val();
            $.ajax({
                    url: '{{ route('listar.examen') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        sub_tipo_examen: sub_tipo_examen
                    },
                })
                .done(function(response) {
                    $('#examen').append(`<option value="0">Seleccione... </option>`);
                    for (var i = 0; i < response.length; i++) {
                        $('#examen').append(`<option value="${response[i].id}">
                                       ${response[i].nombre_examen}
                                  </option>`);
                    }
                })
                .fail(function() {
                    console.log("error");
                })

        });


        $('#presentacion').change(function(e) {
            e.preventDefault();
            presentacion = $('#presentacion').val();

            $("#tipo_dosis").empty();
            $.ajax({
                    url: '{{ route('listar.dosis') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        presentacion: presentacion
                    },
                })
                .done(function(response) {
                    console.log(response)
                    //$('#dosis').append(`<option value="0">Seleccione... </option>`);
                    for (var i = 0; i < response.length; i++) {
                        $('#dosis').append(`<option value="${response[i].id}">
                                       ${response[i].nombre_dosis}
                                  </option>`);
                    }
                })
                .fail(function() {
                    console.log("error");
                })

        });

        //funcion para buscar un paciente
        function buscarpaciente() {

            url = '{{ route('buscar_paciente') }}'
            rut = $('#rut_trabajador').val();
            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        rut: rut
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    if (data != '') {


                        $('#paciente').text(data.nombre);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [day, month, year].join('-');
        }

        function buscar_receta(id_ficha_clinica) {

            url = '{{ route('buscar.recetas') }}';
            id_ficha = id_ficha_clinica;
            $('#tabla_receta tbody').empty();

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_ficha: id_ficha
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    if (data != '') {

                        console.log(data);

                        $('#id_ficha_receta').text('Receta de Ficha Clinica Nro: ' + id_ficha_clinica);
                        for (i = 0; i < data.length; i++) {
                            console.log(data[i]);

                            var fecha = formatDate(data[i].created_at);
                            //var salida = formato(fecha);
                            var medicamento = data[i].medicamento;
                            var dosis = data[i].dosis;
                            var frecuencia = data[i].frecuencia;
                            var presentacion = data[i].presentacion;
                            var j = 1; //contador para asignar id al boton que borrara la fila
                            var fila = '<tr class="tr_receta" id="row' + j + '"><td>' +
                                fecha + '</td><td>' +
                                medicamento +
                                '</td><td>' +
                                dosis +
                                '</td><td>' +
                                frecuencia +
                                '</td><td>' +
                                presentacion + '</td></tr>'; //esto seria lo que contendria la fila

                            j++;

                            $('#tabla_receta tbody').append(fila);

                        }





                    }
                    $('#m_cons_receta').modal('show');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function buscar_examenes(id_ficha_clinica) {

            url = '{{ route('buscar.examenes') }}';
            id_ficha = id_ficha_clinica;
            $('#tabla_examen_paciente tbody').empty();

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_ficha: id_ficha
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    if (data != '' || data == null) {

                        $('#id_ficha_examen').text('Examenes de Ficha Clinica Nro: ' + id_ficha_clinica);
                        for (i = 0; i < data.length; i++) {
                            console.log(data[i]);

                            var fecha = formatDate(data[i].created_at);
                            //var salida = formato(fecha);
                            var tipo_examen = data[i].tipo_examen;
                            var prioridad = data[i].prioridad;
                            var nombre_examen = data[i].nombre_examen;
                            var j = 1; //contador para asignar id al boton que borrara la fila
                            var fila = '<tr class="tr_examen" id="row' + j + '"><td>' +
                                fecha + '</td><td>' +
                                tipo_examen +
                                '</td><td>' +
                                prioridad +
                                '</td><td>' +
                                nombre_examen +
                                '</td></tr>'; //esto seria lo que contendria la fila

                            j++;

                            $('#tabla_examen_paciente tbody').append(fila);

                        }

                    }
                    $('#m_cons_examen').modal('show');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        /* $('#guardar_ficha').on('click', function(e) {
             e.preventDefault();

             var t = document.getElementById("tabla_examen"); //una tabla con id
             var trs = t.getElementsByClassName("tr_examen"); // cada row tiene clase
             var id
             for (var i = 0; i < trs.length; i++) {
                 var id = trs[i].innerHTML; //el contenido de cada tr

                 console.log(id);
             }

         });*/




        //funcion para agregar examenes a la tabla
        $(document).ready(function() {

            // Cambiar id del boton
            $(document).on("click", "#guardar_ficha", function(e) {
                var rows = [];
                $('#tabla_examen tr').each(function(i, n) {
                    if (i > 0) {
                        rol = {};
                        var data = $(this).find("td");
                        rol["tipo_examen"] = $.trim($(data[1]).text().split("\n").join(""));
                        rol["nombre_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                        rol["prioridad"] = $.trim($(data[2]).text().split("\n").join(""));
                        rows.push(rol);
                    }
                });
                $('#examenes').val(JSON.stringify(rows));

                var rows1 = [];
                $('#tabla_medicamento tr').each(function(i, n) {
                    if (i > 0) {
                        rol = {};
                        var data = $(this).find("td");
                        rol["medicamento"] = $.trim($(data[0]).text().split("\n").join(""));
                        rol["presentacion"] = $.trim($(data[1]).text().split("\n").join(""));
                        rol["dosis"] = $.trim($(data[2]).text().split("\n").join(""));
                        rol["frecuencia"] = $.trim($(data[3]).text().split("\n").join(""));
                        rol["periodo"] = $.trim($(data[4]).text().split("\n").join(""));
                        rol["comentario"] = $.trim($(data[5]).text().split("\n").join(""));
                        rows1.push(rol);
                    }
                });
                $('#medicamentos').val(JSON.stringify(rows1));
            });

            //obtenemos el valor de los input

            $('#agregar_examen').click(function() {
                var examen = $("#examen option:selected").text();
                var prioridad = $("#prioridad option:selected").text();
                var tipo_examen = $("#tipo_examen option:selected").text();
                var i = 1; //contador para asignar id al boton que borrara la fila
                var fila = '<tr class="tr_examen" id="row' + i + '"><td>' + examen + '</td><td>' +
                    tipo_examen +
                    '</td><td>' +
                    prioridad + '</td><td><button type="button" name="remove" id="' + i +
                    '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

                i++;

                $('#tabla_examen tr:first').after(fila);
                $("#adicionados").text(
                    ""
                ); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
                var nFilas = $("#tabla_examen tr").length;
                $("#adicionados").append(nFilas - 1);
                $("#sub_tipo_examen").empty();
                $("#examen").empty();

            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                //cuando da click obtenemos el id del boton
                $('#row' + button_id + '').remove(); //borra la fila
                //limpia el para que vuelva a contar las filas de la tabla
                $("#adicionados").text("");
                var nFilas = $("#tabla_examen tr").length;
                $("#adicionados").append(nFilas - 1);

            });

            $('#agregar_medicamento').click(function() {
                var medicamento = $("#id_medicamento option:selected").text();
                var presentacion = $("#presentacion option:selected").text();
                var dosis = $("#dosis option:selected").text();
                var frecuencia = $("#frecuencia option:selected").text();
                var periodo = $("#periodo option:selected").text();
                var comentario = $("#comentario").val();
                var i = 1; //contador para asignar id al boton que borrara la fila
                var fila = '<tr class="tr_medicamento" id="row' + i + '"><td>' +
                    medicamento + '</td><td>' +
                    presentacion + '</td><td>' +
                    dosis + '</td><td>' +
                    frecuencia + '</td><td>' +
                    periodo + '</td><td>' +
                    comentario + '</td><td><button type="button" name="remove" id="' + i +
                    '" class="btn btn-danger btn_remove1">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

                i++;

                $('#tabla_medicamento tr:first').after(fila);
                $("#adicionados1").text(
                    ""
                ); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
                var nFilas = $("#tabla_medicamento tr").length;
                $("#adicionados1").append(nFilas - 1);
                $("#presentacion").empty();
                $("#dosis").empty();
                //$("#frecuencia").empty();
                //$("#periodo").empty();
                $("#comentario").empty();


            });

            $(document).on('click', '.btn_remove1', function() {
                var button_id = $(this).attr("id");
                //cuando da click obtenemos el id del boton
                $('#row' + button_id + '').remove(); //borra la fila
                //limpia el para que vuelva a contar las filas de la tabla
                $("#adicionados").text("");
                var nFilas = $("#tabla_examen tr").length;
                $("#adicionados").append(nFilas - 1);

            });
        });
    </script>



    {{ view('./template/footer') }}

@endsection
