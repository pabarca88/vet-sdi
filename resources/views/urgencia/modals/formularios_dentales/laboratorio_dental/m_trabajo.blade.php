 <div id="modal_orden_trabajo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_orden_trabajo"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header bg-info">
                 <h5 class="modal-title text-white text-center">Orden de trabajo menor</h5>
                 <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                         aria-hidden="true">×</span></button>
             </div>
             <div class="modal-body">
                 <form id="form_orden_trabajo_menor" action="{{ route('dental.registrar_orden_trabajo_menor') }}"
                     method="post">

                     @csrf
                     <input type="hidden" name="ficha_id_trabajo_menor" id="ficha_id_trabajo_menor"
                         value="{{--   @if ($ficha != null) {{ $ficha->id }}@endif"--}}">
                     <input type="hidden" name="paciente_trabajo_menor" id="paciente_trabajo_menor"
                         value="{{ $paciente->id }}">

                     <div class="form-row">

                         <div class="form-group col-sm-6 col-md-6">
                             <script>
                                 var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                     "Octubre", "Noviembre", "Diciembre");
                                 var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                 var f = new Date();
                                 document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                     .getFullYear());
                             </script>
                         </div>

                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label">N° Orden</label>
                             <!--correlativo-->
                             <input type="text" class="form-control form-control-sm" name="nro_orden_trabajo_menor"
                                 id="nro_orden_trabajo_menor">
                         </div>

                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label">Clinica/Dr./Dra</label>
                             <input type="text" class="form-control form-control-sm" name="clinica_doctor"
                                 id="clinica_doctor">
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label">Rut Profesional</label>
                             <input type="text" class="form-control form-control-sm" name="rut_profesional"
                                 id="rut_profesional">
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label">Nombre Paciente</label>
                             <!--correlativo-->
                             <input type="text" class="form-control form-control-sm" name="paciente_trabajo_menor"
                                 id="paciente_trabajo_menor"
                                 value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}"
                                 disabled>
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label-activo-sm">Rut Paciente</label>
                             <input type="text" class="form-control form-control-sm" name="paciente_trabajo_mayor"
                                 id="paciente_trabajo_mayor" value="{{ $paciente->rut }}" disabled>
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label">Guia</label>
                             <input type="text" class="form-control form-control-sm" name="guia" id="guia">
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label">Color</label>
                             <input type="text" class="form-control form-control-sm" name="color" id="color">
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label">Urgencia</label>
                             <input type="text" class="form-control form-control-sm" name="urgencia" id="urgencia">
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                             <label class="floating-label">Material</label>
                             <input type="text" class="form-control form-control-sm" name="material" id="material">
                         </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label">Trabajo a realizar</label>
                             <input type="text" class="form-control form-control-sm" name="trabajo_realizar"
                                 id="trabajo_realizar">
                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label">Comentarios</label>
                             <input type="" class="form-control form-control-sm" name="comentarios_trabajo_menor"
                                 id="comentarios_trabajo_menor">
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
 <script>
    function lab_dent_menor()
    {
        $('#modal_orden_trabajo').modal('show');
    }
</script>
