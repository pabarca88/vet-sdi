@extends('template.dental.template_period')
@section('styles')
    <style>
    .imagen_rx{
        width: 200px;
        height: 200px;
    }
    .ui-autocomplete {
        z-index: 9999999 !important;
        position: absolute;
    }
    </style>
@endsection
@section('Content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN PERIODÓNCIA</strong></h5>
                                <p class="font-italic mt-0 mb-0 text-white">
                                    @php
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        $fecha = \Carbon\Carbon::parse(now());
                                        $mes = $meses[($fecha->format('n')) - 1];
                                        $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                    @endphp
                                    {{ $fecha }}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!-- TAB ATENCIÓN -->
            <div class="user-profile user-card pt-0">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab" href="#atender" role="tab" aria-controls="atender" aria-selected="true">Atender paciente</a>
                                    </li>
                                    {{--  <li class="nav-item">
										@if(!empty(session('lic_token')) && session('lic_estado') == 1)
										<a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#licencia" role="tab" aria-controls="licencia" aria-selected="false" onclick="cargar_licencias();">Licencia</a>
										@else
											<a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#" role="tab" aria-controls="licencia" aria-selected="false" onclick="abrir_autorizacion();">Licencia</a>
										@endif
                                    </li>
                                    <li class="nav-item">
                                        @if (request('token'))
                                            <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu" role="tab" aria-controls="fmu" aria-selected="false">FMU</a>
                                        @else
                                            @php
                                                $url_temp = 'Profesional/Paciente/Ficha_consulta?_token='.request('_token').'&id_hora_realizar='.request('id_hora_realizar').'&lugar_atencion_id='.request('lugar_atencion_id').'';
                                            @endphp
                                            <a class="nav-link text-reset" id="fmu-tab" href="{{ ROUTE('check_sdi', ['id_recept' => $paciente->id_usuario,'urla'=> $url_temp,'urln' => $url_temp, 'id_tipo' => 9]) }}">FMU</a>
                                        @endif
                                    </li>  --}}
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de consultas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="band_exam_tab" data-toggle="tab" href="#band_exam" role="tab" aria-controls="band_exam" aria-selected="false">Exámenes</a>
                                    </li>
                                    {{--  <li class="nav-item">
                                        <a class="nav-link text-reset" id="hospitalizacion-tab" data-toggle="tab" href="#hospitalizacion" role="tab" aria-controls="Paciente hospitalizado" aria-selected="false">Hospitalización</a>
                                    </li>  --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tab general-->
            <!--Contenido de tab-->
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="at-od_periodoncia">
                        <!--Atender paciente-->
                        <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                            @include('atencion_odontologica.secciones_especialidad.ficha_periodoncia')
                        </div>
                        <!--Licencia-->
                        <!--Licencia-->
                        <div class="tab-pane fade show" id="licencia" role="tabpanel" aria-labelledby="licencia-tab">
                            @include('general.secciones_ficha.licencia')
                        </div>
                        <!--Ficha Médica Única-->
                        <div class="tab-pane fade show" id="fmu" role="tabpanel" aria-labelledby="fmu-tab">
                            @include('general.secciones_ficha.fmu')
                        </div>
                        <!--Atenciones previas-->
                        <div class="tab-pane fade show" id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                            @include('general.secciones_ficha.atenciones_previas_form')
                        </div>
                         <!--Exámenes-->
                        <div class="tab-pane fade show" id="band_exam" role="tabpanel" aria-labelledby="band_exam_tab">
                            @include('general.secciones_ficha.bandeja_examenes')
                        </div>
                        <!--Hospitalización-->
						<div class="tab-pane fade show" id="hospitalizacion" role="tabpanel" aria-labelledby="hospitalizacion-tab">
                            @include('general.hospitalizacion.hospitalizacion')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SIDE BAR IMPLANTOLOGIA -->
        @include("atencion_odontologica.modales"){{-- base de botones de sidebar --}}
        @include("atencion_odontologica.include.sidebar_derecho_odonto_period"){{-- modales y data de sidebar especialidad --}}

        <!--Modals de especialidad -->
        <!--Modals de especialidad -->
        @include("atencion_odontologica.formularios.Antecedentes_dentales.anestesia")
        @include("atencion_odontologica.formularios.Antecedentes_dentales.hemorragias")
        @include("atencion_odontologica.formularios.Antecedentes_dentales.fracturas")
        @include('atencion_odontologica.include.modales.imagenes_paciente_dental')
        @include('atencion_odontologica.include.modales.imagen_paciente_dental')
        @include('atencion_odontologica.generales.includes.modales.recomendaciones_generales_implan')
        @include('atencion_odontologica.generales.includes.modales.recomendaciones_especiales_implan')
           @include('atencion_odontologica.formularios_dentales_tons.laboratorio_dental.m_trabajo')
        @include('atencion_odontologica.formularios_dentales_tons.laboratorio_dental.m_trabajoM')

        <!--Modals formularios generales-->
        {{--  @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_examenes")
        @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_medicamentos")
        @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.m_interconsulta")  --}}

    </div>
	@include('app.profesional.modales.boton_flotante_agenda_autorizacion')
@endsection
@section('js_inferior')
<script>
     $(document).ready(function () {

            $('#tabla_antecedentes_paciente').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                }
            });
        });
        

    function cargar_a_presupuesto(id, tipo = null){
        let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto') }}";
        let data = {
            id: id,
            tipo: tipo,
             _token: "{{ csrf_token() }}"
        }
        console.log(data);
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(tipo == null){
                    if(resp.status == 1){
                        swal({
                            icon:'success',
                            title:'Info',
                            text: resp.mensaje
                        });
                        let odontograma = resp.odontograma_paciente;
                        let html = '';
                        odontograma.forEach(function(odonto){
                            html += '<tr>';
                            html += '<td>'+odonto.fecha+'</td>';
                            html += '<td>'+odonto.tratamiento+'</td>';
                            html += '<td>'+odonto.caras+'</td>';
                            html += '<td>'+odonto.pieza+'</td>';
                            html += '<td>'+odonto.diagnostico+'</td>';
                            html += '<td>'+odonto.valor+'</td>';
                            html += '<td>';
                            html += '<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma('+odonto.id+')"><i class="feather icon-x"></i>Eliminar</button>';
                            if(odonto.presupuesto == 0){
                                html += '<button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('+odonto.id+')"><i class="fas fa-save"></i>Cargar a presupuesto</button>';
                            }else{
                                html += '<button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto('+odonto.id+')"><i class="fas fa-trash"></i>Sacar de presupuesto</button>';
                            }

                            html += '</td>';
                            html += '</tr>';
                        });

                        $('#table_odontograma tbody').html(html);
                        $('#contenedor_piezas_dentales_presupuesto').empty();
                        $('#table_trabajos_presupuesto tbody').empty();
                        odontograma.forEach(function(odonto){
                            if(odonto.presupuesto == 1){
                                    $('#contenedor_piezas_dentales_presupuesto').append(`
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Pieza</label>
                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Prestación</label>
                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.tratamiento}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.valor}" >
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label class="floating-label-activo-sm">Descuento</label>
                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Total prestación</label>
                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.valor}" >
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                        </div>
                                    `);
                                    $('#table_trabajos_presupuesto tbody').append(`
                                        <tr>
                                            <td>${odonto.fecha}</td>
                                            <td>${odonto.diagnostico} </td>
                                            <td>${odonto.caras} </td>
                                            <td>${odonto.pieza} </td>
                                            <td>${odonto.tratamiento} </td>
                                            <td>${odonto.valor} </td>
                                            <td> </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                            </td>
                                        </tr>
                                    `);
                                }
                            });
                            let valores_boca_general = resp.valores[0];
                            let valores_odontograma = resp.valores[1];
                            let total_general = valores_boca_general + valores_odontograma;
                            $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                            $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                            $('#subtotal_clinico').val(formatoMoneda(total_general));
                            $('#total_clinico').val(formatoMoneda(total_general));
                    }else{
                        swal({
                            icon:'error',
                            title:'info',
                            text: resp.mensaje
                        });
                    }
                }else{
                    swal({
                            icon:'success',
                            title:'Info',
                            text: 'Examen cargado a presupuesto con éxito.'
                        });
                    let maxilar_superior_gral_diagnosticos = resp.maxilar_superior_gral_diagnosticos;
                    $('#contenedor_maxilar_superior_gral_diagnosticos_presupuesto').empty();
                    $('#tbody_diagnosticos').empty();
                    maxilar_superior_gral_diagnosticos.forEach(diagnostico => {
                        if(diagnostico.presupuesto == 1){
                            $('#contenedor_maxilar_superior_gral_diagnosticos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                </div>
                            `);
                        }
                        let html = `<tr>
                                <td class="text-center align-middle">${diagnostico.fecha}</td>
                                <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                <td class="text-center align-middle">${diagnostico.comentario}</td>
                                <td class="text-center align-middle">${diagnostico.valor}</td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico(${diagnostico.id},'gral')"><i class="feather icon-x"></i></button>
                                    ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                </td>
                            </tr>`;
                        $('#tbody_diagnosticos').append(html);
                    });
                    let maxilar_superior_gral_diagnosticos_endo = resp.maxilar_superior_gral_diagnosticos_endo;
                    $('#contenedor_maxilar_superior_endo_diagnosticos_presupuesto').empty();
                    $('#tbody_diagnosticos_endo').empty();
                    maxilar_superior_gral_diagnosticos_endo.forEach(diagnostico => {
                    if(diagnostico.presupuesto == 1){
                        $('#contenedor_maxilar_superior_endo_diagnosticos_presupuesto').append(`
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Prestación</label>
                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Sub-Total</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="floating-label-activo-sm">Descuento</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Total prestación</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                            </div>
                        `);
                    }
                    let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>
                                    <td class="text-center align-middle">${diagnostico.valor} </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico(${diagnostico.id},'endo')"><i class="feather icon-x"></i></button>
                                         ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_diagnosticos_endo').append(html);
                    });
                    let maxilar_superior_gral_tratamientos = resp.maxilar_superior_gral_tratamientos;
                    $('#contenedor_maxilar_superior_gral_tratamientos_presupuesto').empty();
                    $('#tbody_tratamientos').empty();
                    maxilar_superior_gral_tratamientos.forEach(diagnostico => {
                    if(diagnostico.presupuesto == 1){
                        $('#contenedor_maxilar_superior_gral_tratamientos_presupuesto').append(`
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Prestación</label>
                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Sub-Total</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="floating-label-activo-sm">Descuento</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Total prestación</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                            </div>
                        `);
                    }
                    $('#tbody_tratamientos').append(`
                        <tr>
                            <td class="text-center align-middle">${diagnostico.fecha}</td>
                            <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : diagnostico.diagnostico_tratamiento}</td>
                            <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                            <td class="text-center align-middle">${diagnostico.comentario}</td>
                            <td class="text-center align-middle">${diagnostico.valor} </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento(${diagnostico.id},'gral')"><i
                                        class="feather icon-x"></i></button>
                                        ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                            </td>
                        </tr>
                    `);
                    });
                    let maxilar_superior_gral_tratamientos_endo = resp.maxilar_superior_gral_tratamientos_endo;
                    $('#contenedor_maxilar_superior_endo_tratamientos_presupuesto').empty();
                    $('#tbody_tratamientos_endo').empty();
                    maxilar_superior_gral_tratamientos_endo.forEach(diagnostico => {
                    if(diagnostico.presupuesto == 1){
                        $('#contenedor_maxilar_superior_endo_tratamientos_presupuesto').append(`
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Prestación</label>
                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Sub-Total</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="floating-label-activo-sm">Descuento</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Total prestación</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                            </div>
                        `);
                    }
                    $('#tbody_tratamientos_endo').append(`
                        <tr>
                            <td class="text-center align-middle">${diagnostico.fecha}</td>
                            <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : t.diagnostico_tratamiento}</td>
                            <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                            <td class="text-center align-middle">${diagnostico.comentario}</td>
                            <td class="text-center align-middle">${diagnostico.valor} </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento(${diagnostico.id},'endo')"><i
                                        class="feather icon-x"></i></button>
                                         ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                            </td>
                        </tr>
                        `);
                    });

                    let maxilar_inferior_gral_diagnosticos = resp.maxilar_inferior_gral_diagnosticos;
                    $('#contenedor_maxilar_inferior_gral_diagnosticos_presupuesto').empty();
                    $('#tbody_diagnosticos_max_inf').empty();
                    maxilar_inferior_gral_diagnosticos.forEach(diagnostico => {
                        if(diagnostico.presupuesto == 1){
                            $('#contenedor_maxilar_inferior_gral_diagnosticos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                </div>
                            `);
                        }
                        let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>
                                    <td class="text-center align-middle">${diagnostico.valor} </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_max_inf(${diagnostico.id},'gral')"><i class="feather icon-x"></i></button>
                                         ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_diagnosticos_max_inf').append(html);
                    });
                    let maxilar_inferior_gral_diagnosticos_endo = resp.maxilar_inferior_gral_diagnosticos_endo;
                    $('#contenedor_maxilar_inferior_endo_diagnosticos_presupuesto').empty();
                    $('#tbody_diagnosticos_max_inf_endo').empty();
                    maxilar_inferior_gral_diagnosticos_endo.forEach(diagnostico => {
                    if(diagnostico.presupuesto == 1){
                        $('#contenedor_maxilar_inferior_endo_diagnosticos_presupuesto').append(`
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Prestación</label>
                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Sub-Total</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="floating-label-activo-sm">Descuento</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Total prestación</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                            </div>
                        `);
                    }
                    let valor = new Intl.NumberFormat("de-DE").format(diagnostico.valor);
                    let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>
                                    <td class="text-center align-middle">${valor} </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_max_inf(${diagnostico.id},'endo')"><i class="feather icon-x"></i></button>
                                        ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                            $('#tbody_diagnosticos_max_inf_endo').append(html);
                    });
                    let maxilar_inferior_gral_tratamientos = resp.maxilar_inferior_gral_tratamientos;
                    $('#contenedor_maxilar_inferior_gral_tratamientos_presupuesto').empty();
                    $('#tbody_tratamientos_max_inf').empty();
                    maxilar_inferior_gral_tratamientos.forEach(diagnostico => {
                    if(diagnostico.presupuesto == 1){
                        $('#contenedor_maxilar_inferior_gral_tratamientos_presupuesto').append(`
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Prestación</label>
                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Sub-Total</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="floating-label-activo-sm">Descuento</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Total prestación</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                            </div>
                        `);
                    }
                    let valor = new Intl.NumberFormat("de-DE").format(diagnostico.valor);
                    $('#tbody_tratamientos_max_inf').append(`
                        <tr>
                            <td class="text-center align-middle">${diagnostico.fecha}</td>
                            <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : diagnostico.diagnostico_tratamiento}</td>
                            <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                            <td class="text-center align-middle">${diagnostico.comentario}</td>
                            <td class="text-center align-middle">${valor}</td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_max_inf(${diagnostico.id},'gral')"><i
                                        class="feather icon-x"></i></button>
                                        ${diagnostico.terminado == 1 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : ''}
                            </td>
                        </tr>
                        `);
                    });
                    let maxilar_inferior_gral_tratamientos_endo = resp.maxilar_inferior_gral_tratamientos_endo;
                    $('#contenedor_maxilar_inferior_endo_tratamientos_presupuesto').empty();
                    $('#tbody_tratamientos_max_inf_endo').empty();
                    maxilar_inferior_gral_tratamientos_endo.forEach(diagnostico => {
                    if(diagnostico.presupuesto == 1){
                        $('#contenedor_maxilar_inferior_endo_tratamientos_presupuesto').append(`
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Prestación</label>
                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Sub-Total</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="floating-label-activo-sm">Descuento</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Total prestación</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                            </div>
                        `);
                    }
                    let valor = new Intl.NumberFormat("de-DE").format(diagnostico.valor);
                    $('#tbody_tratamientos_max_inf_endo').append(`
                            <tr>
                                <td class="text-center align-middle">${diagnostico.fecha}</td>
                                <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : diagnostico.diagnostico_tratamiento}</td>
                                <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                <td class="text-center align-middle">${diagnostico.comentario}</td>
                                <td class="text-center align-middle">${valor}</td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_max_inf(${diagnostico.id},'endo')"><i
                                            class="feather icon-x"></i></button>
                                            ${diagnostico.terminado == 1 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : ''}
                                </td>
                            </tr>
                        `);
                    });


                    let boca_completa_gral_diagnosticos = resp.boca_completa_gral_diagnosticos;
                    $('#contenedor_boca_completa_gral_diagnosticos_presupuesto').empty();
                    $('#tbody_diagnosticos_boca_compl').empty();
                    boca_completa_gral_diagnosticos.forEach(diagnostico => {
                        if(diagnostico.presupuesto == 1){
                            $('#contenedor_boca_completa_gral_diagnosticos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                </div>
                            `);
                        }
                        let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>

                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_boca_compl(${diagnostico.id},'gral')"><i class="feather icon-x"></i></button>
                                        ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                                $('#tbody_diagnosticos_boca_compl').append(html);
                    });
                    let boca_completa_gral_diagnosticos_endo = resp.boca_completa_gral_diagnostico_endo;
                    $('#contenedor_boca_completa_endo_diagnosticos_presupuesto').empty();
                    $('#tbody_diagnosticos_boca_compl_endo').empty();
                    boca_completa_gral_diagnosticos_endo.forEach(diagnostico => {
                    if(diagnostico.presupuesto == 1){
                        $('#contenedor_boca_completa_endo_diagnosticos_presupuesto').append(`
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Prestación</label>
                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Sub-Total</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="floating-label-activo-sm">Descuento</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Total prestación</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                            </div>
                        `);
                    }
                    let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>

                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_boca_compl(${diagnostico.id},'endo')"><i class="feather icon-x"></i></button>
                                        ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_diagnosticos_boca_compl_endo').append(html);
                    });
                    let boca_completa_gral_tratamientos = resp.boca_completa_gral_tratamientos;
                    $('#contenedor_boca_completa_gral_tratamientos_presupuesto').empty();
                    $('#tbody_tratamientos_boca_compl').empty();
                    boca_completa_gral_tratamientos.forEach(diagnostico => {
                    if(diagnostico.presupuesto == 1){
                        $('#contenedor_boca_completa_gral_tratamientos_presupuesto').append(`
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Prestación</label>
                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Sub-Total</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="floating-label-activo-sm">Descuento</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Total prestación</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                            </div>
                        `);
                    }
                    $('#tbody_tratamientos_boca_compl').append(`
                        <tr>
                            <td class="text-center align-middle">${diagnostico.fecha}</td>
                            <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : diagnostico.diagnostico_tratamiento}</td>
                            <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                            <td class="text-center align-middle">${diagnostico.comentario}</td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_boca_compl(${diagnostico.id},'gral')"><i
                                        class="feather icon-x"></i></button>
                                ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                            </td>
                        </tr>
                        `);
                    });
                    let boca_completa_gral_tratamientos_endo = resp.boca_completa_gral_tratamientos_endo;
                    $('#contenedor_boca_completa_endo_tratamientos_presupuesto').empty();
                    $('#tbody_tratamientos_boca_compl_endo').empty();
                    maxilar_superior_gral_tratamientos_endo.forEach(diagnostico => {
                    if(diagnostico.presupuesto == 1){
                        $('#contenedor_boca_completa_endo_tratamientos_presupuesto').append(`
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Prestación</label>
                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Sub-Total</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="floating-label-activo-sm">Descuento</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Total prestación</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                            </div>
                        `);
                    }
                    $('#tbody_tratamientos_boca_compl_endo').append(`
                        <tr>
                            <td class="text-center align-middle">${diagnostico.fecha}</td>
                            <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : diagnostico.diagnostico_tratamiento}</td>
                            <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                            <td class="text-center align-middle">${diagnostico.comentario}</td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_boca_compl(${diagnostico.id},'endo')"><i
                                        class="feather icon-x"></i></button>
                                ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                            </td>
                        </tr>
                        `);
                    });
                    let valores_boca_general = resp.valores[0];
                    let valores_odontograma = resp.valores[1];
                    let total_general = valores_boca_general + valores_odontograma;
                    $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                    $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                    $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                    $('#subtotal_clinico').val(formatoMoneda(total_general));
                    $('#total_clinico').val(formatoMoneda(total_general));
                }

                $('#tratamiento_presupuesto tbody').empty();
                let presupuesto = resp.presupuesto;
                console.log(presupuesto);
                $('#tratamiento_presupuesto tbody').append(`
                <tr>
                    <td class="text-center align-middle">${presupuesto.fecha}</td>
                    <td class="text-center align-middle">${presupuesto.id}</td>
                    <td class="text-center align-middle">${presupuesto.aprobado}</td>
                    <td class="text-center align-middle">Sector I</td>
                    <td class="text-center align-middle">${presupuesto.boca}</td>

                    <td class="text-center align-middle">
                        <div class="form-group col-md-4">
                            <div class="switch switch-success d-inline m-r-2">
                                <input type="checkbox" id="info_finalizado" checked="">
                                <label for="info_finalizado" class="cr"></label>
                            </div>
                            <label>Realizado?</label>
                        </div>
                    </td>
                    <td class="text-center align-middle">
                       ${presupuesto.fecha}
                    </td>
                    <td class="text-center align-middle">
                        <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()" ;="">
                            <i class="fa fa-plus"></i> Trabajar en pieza
                        </button>
                    </td>
                </tr>
                `);

            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }

    function sacar_de_presupuesto(id, tipo = null){
        let url = "{{ ROUTE('dental.sacar_tratamiento_presupuesto') }}";
        let data = {
            id: id,
            tipo:tipo,
             _token: "{{ csrf_token() }}"
        }
        console.log(data);
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(tipo == null){
                    if(resp.status == 1){
                        swal({
                            icon:'success',
                            title:'Info',
                            text: resp.mensaje
                        });
                        let odontograma = resp.odontograma_paciente;
                        let html = '';
                        odontograma.forEach(function(odonto){
                            html += '<tr>';
                            html += '<td>'+odonto.fecha+'</td>';
                            html += '<td>'+odonto.tratamiento+'</td>';
                            html += '<td>'+odonto.caras+'</td>';
                            html += '<td>'+odonto.pieza+'</td>';
                            html += '<td>'+odonto.diagnostico+'</td>';
                            html += '<td>'+odonto.valor+'</td>';
                            html += '<td>';
                            html += '<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma('+odonto.id+')"><i class="feather icon-x"></i>Eliminar</button>';
                            if(odonto.presupuesto == 0){
                                html += '<button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('+odonto.id+')"><i class="fas fa-save"></i>Cargar a presupuesto</button>';
                            }else{
                                html += '<button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto('+odonto.id+')"><i class="fas fa-trash"></i>Sacar de presupuesto</button>';
                            }

                            html += '</td>';
                            html += '</tr>';
                        });

                        $('#table_odontograma tbody').html(html);
                        $('#contenedor_piezas_dentales_presupuesto').empty();
                        $('#table_trabajos_presupuesto tbody').empty();
                        odontograma.forEach(function(odonto){
                            if(odonto.presupuesto == 1 && odonto.urgencia == 0){
                                    $('#contenedor_piezas_dentales_presupuesto').append(`
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Pieza</label>
                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo-sm">Prestación</label>
                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.tratamiento}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.valor}" >
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label class="floating-label-activo-sm">Descuento</label>
                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Total prestación</label>
                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.valor}" >
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                        </div>
                                    `);
                                    $('#table_trabajos_presupuesto tbody').append(`
                                        <tr>
                                            <td>${odonto.fecha}</td>
                                            <td>${odonto.diagnostico} </td>
                                            <td>${odonto.caras} </td>
                                            <td>${odonto.pieza} </td>
                                            <td>${odonto.tratamiento} </td>
                                            <td>${odonto.valor} </td>
                                            <td> </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                            </td>
                                        </tr>
                                    `);
                                }
                            });
                            let valores_boca_general = resp.valores[0];
                            let valores_odontograma = resp.valores[1];
                            let total_general = valores_boca_general + valores_odontograma;
                            $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                            $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                            $('#subtotal_clinico').val(formatoMoneda(total_general));
                            $('#total_clinico').val(formatoMoneda(total_general));
                    }else{
                        swal({
                            icon:'error',
                            title:'info',
                            text: resp.mensaje
                        });
                    }
                }else{
                    if(resp.status == 1){
                        let maxilar_superior_gral_diagnosticos = resp.maxilar_superior_gral_diagnosticos;
                        $('#contenedor_maxilar_superior_gral_diagnosticos_presupuesto').empty();
                        $('#tbody_diagnosticos').empty();
                        maxilar_superior_gral_diagnosticos.forEach(diagnostico => {
                            if(diagnostico.presupuesto == 1 && diagnostico.urgencia == 0){
                                $('#contenedor_maxilar_superior_gral_diagnosticos_presupuesto').append(`
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label-activo-sm">Prestación</label>
                                        <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label class="floating-label-activo-sm">Descuento</label>
                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Total prestación</label>
                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                    </div>
                                `);
                            }
                            let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>
                                    <td class="text-center align-middle">${diagnostico.valor}</td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico(${diagnostico.id},'gral')"><i class="feather icon-x"></i></button>
                                        ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                            $('#tbody_diagnosticos').append(html);
                        });
                        let maxilar_superior_gral_diagnosticos_endo = resp.maxilar_superior_gral_diagnosticos_endo;
                        $('#contenedor_maxilar_superior_endo_diagnosticos_presupuesto').empty();
                        $('#tbody_diagnosticos_endo').empty();
                        maxilar_superior_gral_diagnosticos_endo.forEach(diagnostico => {
                        if(diagnostico.presupuesto == 1 && diagnostico.urgencia == 0){
                            $('#contenedor_maxilar_superior_endo_diagnosticos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                </div>
                            `);
                        }
                        let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>
                                    <td class="text-center align-middle">${diagnostico.valor} </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico(${diagnostico.id},'endo')"><i class="feather icon-x"></i></button>
                                         ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_diagnosticos_endo').append(html);
                        });

                        let maxilar_superior_gral_tratamientos = resp.maxilar_superior_gral_tratamientos;
                        $('#contenedor_maxilar_superior_gral_tratamientos_presupuesto').empty();
                        $('#tbody_tratamientos').empty();

                        maxilar_superior_gral_tratamientos.forEach(diagnostico => {
                        if(diagnostico.presupuesto == 1 && diagnostico.urgencia == 0){
                            $('#contenedor_maxilar_superior_gral_tratamientos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                </div>
                            `);
                        }
                            $('#tbody_tratamientos').append(`
                                <tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>
                                    <td class="text-center align-middle">${diagnostico.valor} </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento(${diagnostico.id},'gral')"><i
                                                class="feather icon-x"></i></button>
                                                ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>
                            `);
                        });
                        let maxilar_superior_gral_tratamientos_endo = resp.maxilar_superior_gral_tratamientos_endo;
                        $('#contenedor_maxilar_superior_endo_tratamientos_presupuesto').empty();
                        $('#tbody_tratamientos_endo').empty();
                        maxilar_superior_gral_tratamientos_endo.forEach(diagnostico => {
                        if(diagnostico.presupuesto == 1 && diagnostico.urgencia == 0){
                            $('#contenedor_maxilar_superior_endo_tratamientos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                </div>
                            `);
                        }
                        $('#tbody_tratamientos_endo').append(`
                        <tr>
                            <td class="text-center align-middle">${diagnostico.fecha}</td>
                            <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : t.diagnostico_tratamiento}</td>
                            <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                            <td class="text-center align-middle">${diagnostico.comentario}</td>
                            <td class="text-center align-middle">${diagnostico.valor} </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento(${diagnostico.id},'endo')"><i
                                        class="feather icon-x"></i></button>
                                         ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                            </td>
                        </tr>
                        `);
                        });

                        let maxilar_inferior_gral_diagnosticos = resp.maxilar_inferior_gral_diagnosticos;
                        $('#contenedor_maxilar_inferior_gral_diagnosticos_presupuesto').empty();
                        $('#tbody_diagnosticos_max_inf').empty();
                        maxilar_inferior_gral_diagnosticos.forEach(diagnostico => {
                            if(diagnostico.presupuesto == 1 && diagnostico.urgencia == 0){
                                $('#contenedor_maxilar_inferior_gral_diagnosticos_presupuesto').append(`
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label-activo-sm">Prestación</label>
                                        <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label class="floating-label-activo-sm">Descuento</label>
                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Total prestación</label>
                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                    </div>
                                `);
                            }
                            let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>
                                    <td class="text-center align-middle">${diagnostico.valor} </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_max_inf(${diagnostico.id},'gral')"><i class="feather icon-x"></i></button>
                                         ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_diagnosticos_max_inf').append(html);
                        });
                        let maxilar_inferior_gral_diagnosticos_endo = resp.maxilar_inferior_gral_diagnosticos_endo;
                        $('#contenedor_maxilar_inferior_endo_diagnosticos_presupuesto').empty();
                        $('#tbody_diagnosticos_max_inf_endo').empty();
                        maxilar_inferior_gral_diagnosticos_endo.forEach(diagnostico => {
                        if(diagnostico.presupuesto == 1 && diagnostico.urgencia == 0){
                            $('#contenedor_maxilar_inferior_endo_diagnosticos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                </div>
                            `);
                        }
                        let valor = new Intl.NumberFormat("de-DE").format(diagnostico.valor);
                        let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>
                                    <td class="text-center align-middle">${valor} </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_max_inf(${diagnostico.id},'endo')"><i class="feather icon-x"></i></button>
                                        ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                            $('#tbody_diagnosticos_max_inf_endo').append(html);
                        });
                        let maxilar_inferior_gral_tratamientos = resp.maxilar_inferior_gral_tratamientos;
                        $('#contenedor_maxilar_inferior_gral_tratamientos_presupuesto').empty();
                        $('#tbody_tratamientos_max_inf').empty();
                        maxilar_inferior_gral_tratamientos.forEach(diagnostico => {
                        if(diagnostico.presupuesto == 1 && diagnostico.urgencia == 0){
                            $('#contenedor_maxilar_inferior_gral_tratamientos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                </div>
                            `);
                        }
                        let valor = new Intl.NumberFormat("de-DE").format(diagnostico.valor);
                        $('#tbody_tratamientos_max_inf').append(`
                        <tr>
                            <td class="text-center align-middle">${diagnostico.fecha}</td>
                            <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : diagnostico.diagnostico_tratamiento}</td>
                            <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                            <td class="text-center align-middle">${diagnostico.comentario}</td>
                            <td class="text-center align-middle">${valor}</td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_max_inf(${diagnostico.id},'gral')"><i
                                        class="feather icon-x"></i></button>
                                        ${diagnostico.terminado == 1 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : ''}
                            </td>
                        </tr>
                        `);
                        });
                        let maxilar_inferior_gral_tratamientos_endo = resp.maxilar_inferior_gral_tratamientos_endo;
                        $('#contenedor_maxilar_inferior_endo_tratamientos_presupuesto').empty();
                        $('#tbody_tratamientos_max_inf_endo').empty();
                        maxilar_inferior_gral_tratamientos_endo.forEach(diagnostico => {
                        if(diagnostico.presupuesto == 1 && diagnostico.urgencia == 0){
                            $('#contenedor_maxilar_inferior_endo_tratamientos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                </div>
                            `);
                        }
                        $('#tbody_tratamientos_max_inf_endo').append(`
                            <tr>
                                <td class="text-center align-middle">${t.fecha}</td>
                                <td class="text-center align-middle">${t.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : t.diagnostico_tratamiento}</td>
                                <td class="text-center align-middle">${t.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                <td class="text-center align-middle">${t.comentario}</td>
                                <td class="text-center align-middle">${t.valor}</td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_max_inf(${t.id},'endo')"><i
                                            class="feather icon-x"></i></button>
                                            ${t.terminado == 1 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${t.id},'gral');"><i class="fas fa-save"> </i> </button>` : ''}
                                </td>
                            </tr>
                        `);
                        });


                        let boca_completa_gral_diagnosticos = resp.boca_completa_gral_diagnosticos;
                        $('#contenedor_boca_completa_gral_diagnosticos_presupuesto').empty();
                        $('#tbody_diagnosticos_boca_compl').empty();
                        boca_completa_gral_diagnosticos.forEach(diagnostico => {
                            if(diagnostico.presupuesto == 1 && diagnostico.urgencia == 0){
                                $('#contenedor_boca_completa_gral_diagnosticos_presupuesto').append(`
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label-activo-sm">Prestación</label>
                                        <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label class="floating-label-activo-sm">Descuento</label>
                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Total prestación</label>
                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                    </div>
                                `);
                            }
                            let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>

                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_boca_compl(${diagnostico.id},'gral')"><i class="feather icon-x"></i></button>
                                        ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                                $('#tbody_diagnosticos_boca_compl').append(html);
                        });
                        let boca_completa_gral_diagnosticos_endo = resp.boca_completa_gral_diagnostico_endo;
                        $('#contenedor_boca_completa_endo_diagnosticos_presupuesto').empty();
                        $('#tbody_diagnosticos_boca_compl_endo').empty();
                        boca_completa_gral_diagnosticos_endo.forEach(diagnostico => {
                        if(diagnostico.presupuesto == 1 && diagnostico.urgencia == 0){
                            $('#contenedor_boca_completa_endo_diagnosticos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                </div>
                            `);
                        }
                        let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>

                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_boca_compl(${diagnostico.id},'endo')"><i class="feather icon-x"></i></button>
                                        ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_diagnosticos_boca_compl_endo').append(html);
                        });
                        let boca_completa_gral_tratamientos = resp.boca_completa_gral_tratamientos;
                        $('#contenedor_boca_completa_gral_tratamientos_presupuesto').empty();
                        $('#tbody_tratamientos_boca_compl').empty();
                        boca_completa_gral_tratamientos.forEach(diagnostico => {
                        if(diagnostico.presupuesto == 1 && diagnostico.urgencia == 0){
                            $('#contenedor_boca_completa_gral_tratamientos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                </div>
                            `);
                        }
                        $('#tbody_tratamientos_boca_compl').append(`
                        <tr>
                            <td class="text-center align-middle">${diagnostico.fecha}</td>
                            <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : diagnostico.diagnostico_tratamiento}</td>
                            <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                            <td class="text-center align-middle">${diagnostico.comentario}</td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_boca_compl(${diagnostico.id},'gral')"><i
                                        class="feather icon-x"></i></button>
                                ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                            </td>
                        </tr>
                        `);
                        });
                        let boca_completa_gral_tratamientos_endo = resp.boca_completa_gral_tratamientos_endo;
                        $('#contenedor_boca_completa_endo_tratamientos_presupuesto').empty();
                        $('#tbody_tratamientos_boca_compl_endo').empty();
                        maxilar_superior_gral_tratamientos_endo.forEach(diagnostico => {
                        if(diagnostico.presupuesto == 1 && diagnostico.urgencia == 0){
                            $('#contenedor_boca_completa_endo_tratamientos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" onclick="verModalAgregar('show',1,0)">Ver Estado Trabajo</button>
                                </div>
                            `);
                        }
                        $('#tbody_tratamientos_boca_compl_endo').append(`
                        <tr>
                            <td class="text-center align-middle">${diagnostico.fecha}</td>
                            <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : diagnostico.diagnostico_tratamiento}</td>
                            <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                            <td class="text-center align-middle">${diagnostico.comentario}</td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_boca_compl(${diagnostico.id},'endo')"><i
                                        class="feather icon-x"></i></button>
                                ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral');"><i class="fas fa-save"> </i> </button>`}
                            </td>
                        </tr>
                        `);
                        });
                        swal({
                            icon:'success',
                            title:'Info',
                            text: 'Examen retirado con éxito.'
                        });

                        let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let total_general = valores_boca_general + valores_odontograma;
                        $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                        $('#subtotal_clinico').val(formatoMoneda(total_general));
                        $('#total_clinico').val(formatoMoneda(total_general));
                    }

                }

            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }

    function eliminar_pieza_dental_pieza(id,tipo){
    swal({
        title: 'Advertencia',
        text: '¿Está seguro de eliminar esta pieza?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        dangerMode: true
    })
    .then((aceptar) => {
        if (aceptar) {
            confirmar_eliminar_pieza_dental_pieza(id, tipo);
        } else {
            Swal.fire('Cancelado', 'La pieza no fue eliminada :(', 'error');
        }
    });
}

function confirmar_eliminar_pieza_dental_pieza(id, tipo){
    let url = "{{ ROUTE('profesional.eliminar_pieza_dental_pieza') }}";
    let data = {
        _token: CSRF_TOKEN,
        id_paciente: $('#id_paciente').val(),
        id: id,
        id_ficha_atencion: $('#id_fc').val(),
        id_lugar_atencion: $('#id_lugar_atencion').val(),
        tipo: tipo
    }

    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                let examenes = resp.examenes;
                if(tipo == 'gral'){
                    $('#contenedor_pieza_dental_endo_gral').empty();
                    $('#contenedor_pieza_dental_endo_gral').append(resp.v);

                    $('#planificacion_examenes_gral').empty();
                    examenes.forEach(examen => {
                        $('#planificacion_examenes_gral').append(`
                            <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                            <option selected="" value="1">Uniradicular</option>
                                            <option value="2">Biradicular</option>
                                            <option value="2">Triradicular</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Convenio</label>
                                        <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                            <option selected="" value="1">Convenio</option>
                                            <option value="2">Sin Convenio</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        `);
                    });
                }else if(tipo == 'endo'){
                    $('#contenedor_pieza_dental_endo').empty();
                    $('#contenedor_pieza_dental_endo').append(resp.v);
                    $('#planificacion_examenes_endo').empty();
                    examenes.forEach(examen => {
                        $('#planificacion_examenes_endo').append(`
                            <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                            <option selected="" value="1">Uniradicular</option>
                                            <option value="2">Biradicular</option>
                                            <option value="2">Triradicular</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Convenio</label>
                                        <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                            <option selected="" value="1">Convenio</option>
                                            <option value="2">Sin Convenio</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        `);
                    });
                }else{
                    $('#contenedor_pieza_dental_odontop_examen').empty();
                    $('#contenedor_pieza_dental_odontop_examen').append(resp.v);
                    $('#planificacion_examenes_odontop').empty();
                    examenes.forEach(examen => {
                        $('#planificacion_examenes_odontop').append(`
                        <div class="form-row">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                    <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                        <option selected="" value="1">Uniradicular</option>
                                        <option value="2">Biradicular</option>
                                        <option value="2">Triradicular</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Convenio</label>
                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                        <option selected="" value="1">Convenio</option>
                                        <option value="2">Sin Convenio</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        `);
                    });
                }
                swal({
                    title:'Exito',
                    text:'Se ha eliminado con éxito',
                    icon:'success'
                });

                $('#contenedor_examenes_grupos_dentales').empty();
                $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}

</script>
@endsection
