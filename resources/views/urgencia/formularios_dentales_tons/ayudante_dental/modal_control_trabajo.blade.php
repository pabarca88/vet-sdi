 <div id="modal_control_trabajo" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="modal_control_trabajo" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header bg-info">
                 <h5 class="modal-title text-white text-center">Identificador Orden de trabajo a Laboratorio</h5>
                 <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                         aria-hidden="true">×</span></button>
             </div>
             <div class="modal-body">
                 <form id="form_control_trabajo_laboratorio"
                     action="{{ route('dental.registrar_control_trabajo_laboratorio') }}" method="post">

                     @csrf
                     <input type="hidden" name="ficha_id_control_trabajo_laboratorio"
                         id="ficha_id_control_trabajo_laboratorio"
                         value="{{--  @if ($ficha != null) {{ $ficha->id }} @endif" --}}">
                     <input type="hidden" name="paciente_control_trabajo_laboratorio"
                         id="paciente_control_trabajo_laboratorio" value="">


                     <div class="form-row">
                         <div class="col-sm-4 mt-2">
                             <div class="form-group fill">
                                 <script>
                                     var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                         "Octubre", "Noviembre", "Diciembre");
                                     var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                     var f = new Date();
                                     document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                         .getFullYear());
                                 </script>
                             </div>
                         </div>
                         <div class="col-sm-4 mt-2">
                             <div class="form-group fill">
                                 <label class="floating-label-activo-sm">Rut Paciente</label>
                                 <input name="rut_paciente_control_trabajo_laboratorio"
                                     id="rut_paciente_control_trabajo_laboratorio" type="text"
                                     value="" disabled class="form-control form-control-sm">
                             </div>
                         </div>
                         <div class="col-sm-4 mt-2">
                             <div class="form-group fill">
                                 <label class="floating-label-activo-sm">N° Etiquetado</label>
                                 <input name="nro_etiquetado_control_trabajo_laboratorio"
                                     id="nro_etiquetado_control_trabajo_laboratorio" type="text"
                                     class="form-control form-control-sm">
                             </div>
                         </div>

                         <div class="form-group col-sm-4 col-md-4">
                             <label class="floating-label-activo-sm">Clinica</label>
                             <input type="text" class="form-control form-control-sm"
                                 name="clinica_control_trabajo_laboratorio" id="clinica_control_trabajo_laboratorio">
                         </div>
                         <div class="form-group col-sm-4 col-md-4">
                             <label class="floating-label-activo-sm">Dr/a.</label>
                             <input type="text" class="form-control form-control-sm"
                                 name="doctor_control_trabajo_laboratorio" id="doctor_control_trabajo_laboratorio">
                         </div>
                         <div class="form-group col-sm-4 col-md-4">
                             <label class="floating-label-activo-sm">Rut Profesional</label>
                             <input type="text" class="form-control form-control-sm"
                                 name="rut_profesional_control_trabajo_laboratorio"
                                 id="rut_profesional_control_trabajo_laboratorio">
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-sm-4 col-md-4">
                             <div class="form-group fill">
                                 <label class="floating-label-activo-sm">Enviar a Laboratorio</label>
                                 <select class="form-control form-control-sm"
                                     name="laboratorio_control_trabajo_laboratorio"
                                     id="laboratorio_control_trabajo_laboratorio">
                                     <option>Seleccione laboratorio</option>{{--
                                     @foreach ($laboratorios as $lab)
                                         <option value="{{ $lab->id }}">{{ $lab->nombre }} </option>
                                     @endforeach--}}

                                 </select>
                             </div>
                         </div>
                         <div class="form-group col-sm-4 col-md-4">
                             <label class="floating-label-activo-sm">fecha de envio</label>
                             <input type="date" class="form-control form-control-sm"
                                 name="fecha_envio_control_trabajo_laboratorio"
                                 id="fecha_envio_control_trabajo_laboratorio">
                         </div>
                         <div class="form-group col-sm-4 col-md-4">
                             <div class="form-group fill">
                                 <label class="floating-label-activo-sm">Grado de Urgencia</label>
                                 <select class="form-control form-control-sm"
                                     name="grado_urgencia_control_trabajo_laboratorio"
                                     id="grado_urgencia_control_trabajo_laboratorio">
                                     <option>Seleccione </option>
                                     <optgroup label="Urgencia" class="Urgencia">
                                         <option value="1">Regular</option>
                                         <option value="2">Urgente</option>
                                     </optgroup>
                                 </select>
                             </div>
                         </div>

                     </div>
                     <div class="form-row">
                         <div class="form-group col-sm-4 col-md-4">
                             <label class="floating-label-activo-sm">Guia</label>
                             <input type="" class="form-control form-control-sm" name="guia_control_trabajo_laboratorio"
                                 id="guia_control_trabajo_laboratorio">
                         </div>
                         <div class="form-group col-sm-4 col-md-4">
                             <label class="floating-label-activo-sm">Color</label>
                             <input type="" class="form-control form-control-sm"
                                 name="color_control_trabajo_laboratorio" id="color_control_trabajo_laboratorio">
                         </div>
                         <div class="form-group col-sm-4 col-md-4">
                             <label class="floating-label-activo-sm">Material</label>
                             <input type="" class="form-control form-control-sm"
                                 name="material_control_trabajo_laboratorio" id="material_control_trabajo_laboratorio">
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label-activo-sm">Trabajo a realizar</label>
                             <input type="" class="form-control form-control-sm"
                                 name="trabajo_realizar_control_trabajo_laboratorio"
                                 id="trabajo_realizar_control_trabajo_laboratorio">

                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label-activo-sm">Contenido del Envío</label>
                             <input type="" class="form-control form-control-sm"
                                 name="contenido_envio_control_trabajo_laboratorio"
                                 id="contenido_envio_control_trabajo_laboratorio">

                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label-activo-sm">Comentarios</label>
                             <input type="" class="form-control form-control-sm"
                                 name="comentarios_control_trabajo_laboratorio"
                                 id="comentarios_control_trabajo_laboratorio">

                         </div>
                     </div>
                     <div class="form-row">
                         <div class="col-sm-12 col-md-12 text-center">
                             <!--<p class="mb-2">Saluda atentamente</p>-->
                             <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                             <button type="button" class="btn btn-sm btn-info">Imprimir Etiqueta</button>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" onclick="reset_form('form_control_trabajo_laboratorio')"
                             class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                         <button type="submit" class="btn btn-info">Guardar</button>
                     </div>
                 </form>
             </div>

         </div>
     </div>
 </div>
 <script>
    function control_trab()
    {
        $('#modal_control_trabajo').modal('show');
    }
</script>
