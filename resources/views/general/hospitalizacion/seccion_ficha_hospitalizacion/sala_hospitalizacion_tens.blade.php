<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <input type="hidden" name="id_paciente_fc_hosp" value="{{ $paciente->id }}" id="id_paciente_fc_hosp">
    <input type="hidden" name="rut_paciente_fc_hosp" value="{{ $paciente->rut }}" id="rut_paciente_fc_hosp">
    <input type="hidden" name="prevision_paciente_fc_hosp" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc_hosp">
    <input type="hidden" name="id_profesional_fc_hosp" value="{{ $profesional->id }}" id="id_profesional_fc_hosp">
    <input type="hidden" name="id_lugar_atencion_hosp" id="id_lugar_atencion_hosp" value="{{ $id_lugar_atencion }}">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 py-0 px-3 ">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h6 class="tit-gen float-left d-inline pt-3">Atención de paciente en sala de hospitalización</h6>
                <div class="alert alert-warning-b py-1 px-0 float-right d-inline" >
                    <p class="p-10 d-inline font-weight-bolder">Servicio: </p>
                    <p class="p-10 d-inline">Nombre del servicio</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                <h6 class="t-aten d-inline float-left pt-1">Evoluciones</h6>
                                <button type="button" class="btn btn-info-light-c btn-sm btn-agregar-evolucion d-inline float-right"  data-id="1"><i class="feather icon-plus"></i> Nueva evolución</button>
                            </div>
                        </div>
                        <hr class="mt-1">
                        <div id="fomulario_base" class="div_evolucion">

                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                    <p>
                                        <script>
                                            var f = new Date();
                                            document.write(  + f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear() + " -/" + f.getHours()+ ":" + f.getMinutes() +" min " );
                                        </script>
                                    </p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-1">
                                    @if (isset($fichaAtencion) && $fichaAtencion->temperatura !=
                                    null)
                                    <label class="floating-label-activo-sm">Tº</label>
                                    <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="{{ $fichaAtencion->temperatura }}">
                                    @else
                                    <label class="floating-label-activo-sm">Tº</label>
                                    <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="{!! old('temperatura') !!}">
                                    @endif
                                </div>
                                <div class="form-group col-md-1">
                                    @if (isset($fichaAtencion) && $fichaAtencion->pulso != null)
                                    <label class="floating-label-activo-sm">Pulso</label>
                                    <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{{ $fichaAtencion->pulso }}">
                                    @else
                                    <label class="floating-label-activo-sm">Pulso</label>
                                    <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{!! old('pulso') !!}">
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    @if (isset($fichaAtencion) && $fichaAtencion->frecuencia_reposo
                                    != null)
                                    <label class="floating-label-activo-sm">Frec.
                                        Reposo</label>
                                    <input type="text" class="form-control form-control-sm" name="frecuencia_reposo" id="frecuencia_reposo" value="{{ $fichaAtencion->frecuencia_reposo }}">
                                    @else
                                    <label class="floating-label-activo-sm">Frec.
                                        Reposo</label>
                                    <input type="text" class="form-control form-control-sm" name="frecuencia_reposo" id="frecuencia_reposo" value="{!! old('frecuencia_reposo') !!}">
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    @if (isset($fichaAtencion) && $fichaAtencion->peso != null)
                                    <label class="floating-label-activo-sm">Peso</label>
                                    <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="{{ $fichaAtencion->peso }}">
                                    @else
                                    <label class="floating-label-activo-sm">Peso</label>
                                    <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="{!! old('peso') !!}">
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    @if (isset($fichaAtencion) && $fichaAtencion->talla != null)
                                    <label class="floating-label-activo-sm">Talla</label>
                                    <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="{{ $fichaAtencion->talla }}">
                                    @else
                                    <label class="floating-label-activo-sm">Talla</label>
                                    <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="{!! old('talla') !!}">
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    @if (isset($fichaAtencion) && $fichaAtencion->imc != null)
                                    <label class="floating-label-activo-sm">IMC</label>
                                    <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="{{ $fichaAtencion->imc }}">
                                    @else
                                    <label class="floating-label-activo-sm">IMC</label>
                                    <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="{!! old('imc') !!}">
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    @if (isset($fichaAtencion) && $fichaAtencion->estado_nutricional
                                    != null)
                                    <label class="floating-label-activo-sm">Estado
                                        Nutricional</label>
                                    <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">
                                    @else
                                    <label class="floating-label-activo-sm">Estado
                                        Nutricional</label>
                                    <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{!! old('estado_nutricional') !!}">
                                    @endif
                                </div>
                            </div>
                            <div class="form-row" id="form_1">
                                <div class="form-group col-md-3">
                                    @if (isset($fichaAtencion) && $fichaAtencion->presion_bi !=
                                    null)
                                    <label class="floating-label-activo-sm">BI</label>
                                    <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{{ $fichaAtencion->presion_bi }}">
                                    @else
                                    <label class="floating-label-activo-sm">BI</label>
                                    <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{!! old('presion_bi') !!}">
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    @if (isset($fichaAtencion) && $fichaAtencion->presion_bd !=
                                    null)
                                    <label class="floating-label-activo-sm">BD</label>
                                    <input type="text" class="form-control form-control-sm" name="presion_bd" id="presion_bd" value="{{ $fichaAtencion->presion_bd }}">
                                    @else
                                    <label class="floating-label-activo-sm">BD</label>
                                    <input type="text" class="form-control form-control-sm" name="presion_bd" id="presion_bd" value="{!! old('presion_bd') !!}">
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    @if (isset($fichaAtencion) && $fichaAtencion->presion_de_pie !=
                                    null)
                                    <label class="floating-label-activo-sm">De pié</label>
                                    <input type="text" class="form-control form-control-sm" name="presion_de_pie" id="presion_de_pie" value="{{ $fichaAtencion->presion_de_pie }}">
                                    @else
                                    <label class="floating-label-activo-sm">De pié</label>
                                    <input type="text" class="form-control form-control-sm" name="presion_de_pie" id="presion_de_pie" value="{!! old('presion_de_pie') !!}">
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    @if (isset($fichaAtencion) && $fichaAtencion->presion_sentado !=
                                    null)
                                    <label class="floating-label-activo-sm">Sentado</label>
                                    <input type="text" class="form-control form-control-sm" name="presion_sentado" id="presion_sentado" value="{{ $fichaAtencion->presion_sentado }}">
                                    @else
                                    <label class="floating-label-activo-sm">Sentado</label>
                                    <input type="text" class="form-control form-control-sm" name="presion_sentado" id="presion_sentado" value="{!! old('presion_sentado') !!}">
                                    @endif
                                </div>
                            </div>
                            <div class="form-row" id="form_2" >
                                <div class="form-group col-md-4">
                                    @if (isset($fichaAtencion) &&
                                    $fichaAtencion->ct_estado_conciencia != null)
                                    <label class="floating-label-activo-sm">Estado de conciencia</label>

                                    <input type="text" class="form-control form-control-sm" name="ct_estado_conciencia" id="ct_estado_conciencia" value="{{ $fichaAtencion->ct_estado_conciencia }}">
                                    @else
                                    <label class="floating-label-activo-sm">Estado de  conciencia</label>

                                    <input type="text" class="form-control form-control-sm" name="ct_estado_conciencia" id="ct_estado_conciencia" value="{!! old('ct_estado_conciencia') !!}">
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    @if (isset($fichaAtencion) && $fichaAtencion->ct_lenguaje !=
                                    null)
                                    <label class="floating-label-activo-sm">Lenguaje</label>
                                    <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{{ $fichaAtencion->ct_lenguaje }}">
                                    @else
                                    <label class="floating-label-activo-sm">Lenguaje</label>
                                    <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{!! old('ct_lenguaje') !!}">
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    @if (isset($fichaAtencion) && $fichaAtencion->ct_traslado != null)

                                    <label class="floating-label-activo-sm">Traslado</label>
                                    <input type="text" class="form-control form-control-sm" name="ct_traslado" id="ct_traslado" value="{{ $fichaAtencion->ct_traslado }}">
                                    @else
                                    <label class="floating-label-activo-sm">Traslado</label>
                                    <input type="text" class="form-control form-control-sm" name="ct_traslado" id="ct_traslado" value="{!! old('ct_traslado') !!}">
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                    <h6 class="t-aten d-inline float-left pt-1">Administración de tratamiento</h6>
                                    <button type="button" class="btn btn-info-light-c btn-sm btn-agregar-medicamentos d-inline float-right" data-id="1" ><i class="feather icon-plus"></i> Agregar Medicamento</button>
                                </div>
                            </div>

                            <div id="contenedor_medicamentos1">
                                <hr class="mt-1">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <label class="floating-label-activo-sm">Vía</label>
                                        <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Nombre Medicamento</label>
                                        <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <label class="floating-label-activo-sm">Tolerancia</label>
                                        <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Incidentes</label>
                                        <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">
                                    </div>
                                </div>
                            </div>

                        </div>




                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                <label class="floating-label-activo-sm">Observaciones Evolución y Tratamiento</label>
                                <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=4" onblur="this.rows=3;" id="hosp_op_evol" name="hosp_op_evol"></textarea>
                            </div>
                            <div class="form-group col-md-4">

                                <button type="button" class="btn btn-success-light-c"><i class="feather icon-save"></i>Guardar </button>
                            </div>
                        </div>

                        <div id="contenedor_evolucion">
                            {{--  <div id="evolucion" class="row">
                            </div>
                            <div id="contenedor_medicamentos">
                                <div id="medic" class="row">
                                </div>
                            </div>  --}}
                        </div>

                        <!--PAGINACIÓN-->
                        <!--Programar paginación para las evoluciones, ejemplo: Se muestran 8 y para ver las otras se usa la paginación-->
                        {{--  <div class="form-row">  --}}
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <nav aria-label="...">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item disabled">
                                            <a class="page-link">Anterior</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item active" aria-current="page">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Siguiente</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        {{--  </div>  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function(){
        /* Sacar la funcion "agregarPieza de este ámbito */
        $('.btn-agregar-evolucion').click(function(){
            agregarEvolucion();
        });
        /* Sacar la funcion "agregarPieza de este ámbito */
        $('.btn-agregar-medicamentos').click(function(){
            var id = $(this).attr('data-id');
            console.log(id);
            agregarmedicamentos(id);
        });
    });
    /* Ponemos "agregarEvolucion" en el ámbito de toda la página */
    function agregarEvolucion()
    {

        var pos = $('.div_evolucion').length+1;
        var html = '';
        {{--  html += '<div id="contenedor_evolucion">';  --}}
        html += '   <div id="evolucion'+pos+'" class="row div_evolucion">';
        html += '       <div class="col-sm-12">';
        {{--  html += '           <form>';  --}}
        html += '               <div class="form-row">';
        html += '                   <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        var f = new Date();
        html += '                       <input class="form-control form-control-sm" name="fecha" type="hidden" value="'+ f.getFullYear() + " -/ " + (f.getMonth() + 1) + "-" + f.getDate()+'">';
        html += '                       <input class="form-control form-control-sm" name="hora" type="hidden" value="'+ f.getHours()+ ":"+ f.getMinutes() +'">';
        html += f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear() + " -/ " + f.getHours()+ ":"+ f.getMinutes()+ " min.";
        html += '                   </div>';
        html += '               </div>';
        {{--  html += '<div class="form-row">';  --}}
        html += '               <div class="form-row">';
        html += '                   <div class="form-group col-md-1">';
        html += '                       <label class="floating-label-activo-sm">Tº</label>';
        html += '                       <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="">';
        html += '                   </div>';
        html += '                   <div class="form-group col-md-1">';
        html += '                       <label class="floating-label-activo-sm">Pulso</label>';
        html += '                       <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="">';
        html += '                   </div>';
        html += '                   <div class="form-group col-md-2">';
        html += '                       <label class="floating-label-activo-sm">Frec.Reposo</label>';
        html += '                       <input type="text" class="form-control form-control-sm" name="frecuencia_reposo" id="frecuencia_reposo" value="">';
        html += '                   </div>';
        html += '                   <div class="form-group col-md-2">';
        html += '                       <label class="floating-label-activo-sm">Peso</label>';
        html += '                       <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="">';
        html += '                   </div>';
        html += '                   <div class="form-group col-md-2">';
        html += '                      <label class="floating-label-activo-sm">Talla</label>';
        html += '                      <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="">';
        html += '                   </div>';
        html += '                   <div class="form-group col-md-2">';
        html += '                       <label class="floating-label-activo-sm">IMC</label>';
        html += '                       <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="">';
        html += '                   </div>';
        html += '                   <div class="form-group col-md-2">';
        html += '                       <label class="floating-label-activo-sm">Estado Nutricional</label>';
        html += '                       <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="">';
        html += '                   </div>';
        html += '               </div>';
        html += '               <div class="form-row" id="form_1">';
        html += '                   <div class="form-group col-md-3">';
        html += '                       <label class="floating-label-activo-sm">BI</label>';
        html += '                       <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="">';
        html += '                   </div>';
        html += '                   <div class="form-group col-md-3">';
        html += '                       <label class="floating-label-activo-sm">BD</label>';
        html += '                       <input type="text" class="form-control form-control-sm" name="presion_bd" id="presion_bd" value="">';
        html += '                   </div>';
        html += '                   <div class="form-group col-md-3">';
        html += '                       <label class="floating-label-activo-sm">De pié</label>';
        html += '                       <input type="text" class="form-control form-control-sm" name="presion_de_pie" id="presion_de_pie" value="">';
        html += '                   </div>';
        html += '                   <div class="form-group col-md-3">';
        html += '                       <label class="floating-label-activo-sm">Sentado</label>';
        html += '                       <input type="text" class="form-control form-control-sm" name="presion_sentado" id="presion_sentado" value="">';
        html += '                   </div>';
        html += '               </div>';
        html += '               <div class="form-row" id="form_2" >';
        html += '                   <div class="form-group col-md-4">';
        html += '                      <label class="floating-label-activo-sm">Estado de  conciencia</label>';
        html += '                      <input type="text" class="form-control form-control-sm" name="ct_estado_conciencia" id="ct_estado_conciencia" value="">';
        html += '                  </div>';
        html += '                  <div class="form-group col-md-4">';
        html += '                     <label class="floating-label-activo-sm">Lenguaje</label>';
        html += '                     <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="">';
        html += '                  </div>';
        html += '                  <div class="form-group col-md-4">';
        html += '                     <label class="floating-label-activo-sm">Traslado</label>';
        html += '                    <input type="text" class="form-control form-control-sm" name="ct_traslado" id="ct_traslado" value="">';
        html += '                  </div>';
        html += '               </div>';
        html += '               <div class="row">';
        html += '                   <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">';
        html += '                       <h6 class="t-aten d-inline float-left pt-1">Administración de tratamiento</h6>';
        html += '                       <button type="button" class="btn btn-info-light-c btn-sm btn-agregar-medicamentos d-inline float-right" data-id="'+pos+'" onclick="agregarmedicamentos('+pos+')"><i class="feather icon-plus"></i> Agregar Medicamento</button>';
        html += '                   </div>';
        html += '               </div>';

        html += '               <div id="contenedor_medicamentos'+pos+'">';
        html += '                   <hr class="mt-1">';
        html += '                   <div class="form-row">';
        html += '                       <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '                           <label class="floating-label-activo-sm">Vía</label>';
        html += '                           <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">';
        html += '                       </div>';
        html += '                       <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">';
        html += '                           <label class="floating-label-activo-sm">Nombre Medicamento</label>';
        html += '                           <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">';
        html += '                       </div>';
        html += '                       <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '                           <label class="floating-label-activo-sm">Tolerancia</label>';
        html += '                           <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">';
        html += '                       </div>';
        html += '                       <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">';
        html += '                           <label class="floating-label-activo-sm">Incidentes</label>';
        html += '                           <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">';
        html += '                       </div>';
        html += '                   </div>';
        html += '               </div>';

        html += '               <div class="form-row">';
        html += '                   <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">';
        html += '                       <label class="floating-label-activo-sm">Observaciones Evolución</label>';
        html += '                       <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=4" onblur="this.rows=3;" id="hosp_op_evol" name="hosp_op_evol"></textarea>';
        html += '                   </div>';
        html += '                   <div class="form-group col-md-4">';
        html += '                      <button type="button" class="btn btn-danger-light-c"><i class="feather icon-x"></i>Eliminar Evolución </button>';
        html += '                      <button type="button" class="btn btn-success-light-c"><i class="feather icon-save"></i>Guardar </button>';
        html += '                   </div>';
        html += '               </div>';
        html += '           </div>';
        {{--  html += '       </form>';  --}}
        html += '   </div>';
        html += '</div>';
        {{--  html += '</div>';  --}}

       $('#contenedor_evolucion').append(html);
    } // agregarEvolucion

    function agregarmedicamentos(id){
        var html = '';
        {{--  html += '<div id="contenedor_medicamentos">';  --}}
        html += '   <hr class="mt-1">';
        html += '   <div class="form-row">';
        html += '       <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '           <label class="floating-label-activo-sm">Vía</label>';
        html += '           <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">';
        html += '       </div>';
        html += '       <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">';
        html += '           <label class="floating-label-activo-sm">Nombre Medicamento</label>';
        html += '           <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">';
        html += '       </div>';
        html += '       <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '           <label class="floating-label-activo-sm">Tolerancia</label>';
        html += '           <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">';
        html += '       </div>';
        html += '       <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">';
        html += '           <label class="floating-label-activo-sm">Incidentes</label>';
        html += '           <input type="text" class="form-control form-control-sm" name="via_tto" id="via_tto" value="">';
        html += '       </div>';
        html += '   </div>';
        {{--  html += '</div>';  --}}
        $('#contenedor_medicamentos'+id).append(html);
    } // agregarEvolucion

    function IsNumeric(valor) {
        var log = valor.length;
        var sw = "S";
        for (x = 0; x < log; x++) {
            v1 = valor.substr(x, 1);
            v2 = parseInt(v1);
            //Compruebo si es un valor numérico
            if (isNaN(v2)) {
                sw = "N";
            }
        }
        if (sw == "S") {
            return true;
        } else {
            return false;
        }
    }

    var primerslap = false;
    var segundoslap = false;

    function formateafecha(fecha) {
        var long = fecha.length;
        var dia;
        var mes;
        var ano;

        if ((long >= 2) && (primerslap == false)) {
            dia = fecha.substr(0, 2);
            if ((IsNumeric(dia) == true) && (dia <= 31) && (dia != "00")) {
                fecha = fecha.substr(0, 2) + "/" + fecha.substr(3, 7);
                primerslap = true;
            } else {
                fecha = "";
                primerslap = false;
            }
        } else {
            dia = fecha.substr(0, 1);
            if (IsNumeric(dia) == false) {
                fecha = "";
            }
            if ((long <= 2) && (primerslap = true)) {
                fecha = fecha.substr(0, 1);
                primerslap = false;
            }
        }
        if ((long >= 5) && (segundoslap == false)) {
            mes = fecha.substr(3, 2);
            if ((IsNumeric(mes) == true) && (mes <= 12) && (mes != "00")) {
                fecha = fecha.substr(0, 5) + "/" + fecha.substr(6, 4);
                segundoslap = true;
            } else {
                fecha = fecha.substr(0, 3);;
                segundoslap = false;
            }
        } else {
            if ((long <= 5) && (segundoslap = true)) {
                fecha = fecha.substr(0, 4);
                segundoslap = false;
            }
        }
        if (long >= 7) {
            ano = fecha.substr(6, 4);
            if (IsNumeric(ano) == false) {
                fecha = fecha.substr(0, 6);
            } else {
                if (long == 10) {
                    if ((ano == 0) || (ano < 1900) || (ano > 2100)) {
                        fecha = fecha.substr(0, 6);
                    }
                }
            }
        }

        if (long >= 10) {
            fecha = fecha.substr(0, 10);
            dia = fecha.substr(0, 2);
            mes = fecha.substr(3, 2);
            ano = fecha.substr(6, 4);
            // Año no viciesto y es febrero y el dia es mayor a 28
            if ((ano % 4 != 0) && (mes == 02) && (dia > 28)) {
                fecha = fecha.substr(0, 2) + "/";
            }
        }
        return (fecha);
    }
</script>
