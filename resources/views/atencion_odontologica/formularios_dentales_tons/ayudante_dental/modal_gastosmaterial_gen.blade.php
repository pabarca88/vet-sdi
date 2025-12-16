 <div id="modal_gastosmaterial_gen" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="modal_gastosmaterial_gen" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header bg-info">
                 <h5 class="modal-title text-white mt-1" id="modal_gastosmaterial_gen"> Materiales e insumos Por paciente
                 </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                         aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form id="form_gastos_material_paciente"
                     action="{{ route('dental.registrar_gastos_material_paciente') }}" method="post">

                     @csrf
                     <input type="hidden" name="ficha_id_gastos_material_paciente"
                         id="ficha_id_gastos_material_paciente"
                         value="{{--   @if ($ficha != null) {{ $ficha->id }} @endif--}}">
                     <input type="hidden" name="paciente_material_paciente" id="paciente_material_paciente"
                         value="">

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
                                 <input type="text" name="rut_paciente_materiales_insumos"
                                     id="rut_pcte_materiales_insumos" class="form-control form-control-sm"
                                     value="" disabled>
                             </div>
                         </div>
                         <div class="col-sm-4 mt-2">
                             <div class="form-group fill">
                                 <label class="floating-label-activo-sm">Código de Trabajo</label>
                                 <input name="cod_trabajo_materiales_insumos" id="cod_trabajo_materiales_insumos"
                                     type="text" class="form-control form-control-sm">
                             </div>
                         </div>
                         <div class="col-sm-4 mt-2">
                             <div class="form-group fill">
                                 <label class="floating-label-activo-sm">Material</label>
                                 <select class="form-control form-control-sm" name="material_materiales_insumos"
                                     id="material_materiales_insumos">
                                     <option>Seleccione una opción</option>
                                     <optgroup label="Materiales" class="Materiales">
                                         <option value="1-1">mat-1</option>
                                         <option value="1-1">mat-1</option>
                                         <option value="1-1">mat-1</option>
                                         <option value="1-1">mat-1</option>
                                     </optgroup>
                                     <optgroup label="Otros" class="Otros Materiales">
                                         <option value="1-1">mat-1</option>
                                         <option value="1-1">mat-1</option>
                                         <option value="1-1">mat-1</option>
                                         <option value="1-1">mat-1</option>
                                     </optgroup>
                                 </select>
                             </div>
                         </div>
                         <div class="col-sm-2 mt-2">
                             <div class="form-group fill">
                                 <label class="floating-label-activo-sm">Cantidad</label>
                                 <input type="number" name="cantidad_material_materiales_insumos"
                                     id="cantidad_material_materiales_insumos" class="form-control form-control-sm">
                             </div>
                         </div>
                         <div class="col-sm-4 mt-2">
                             <div class="form-group fill">
                                 <label class="floating-label-activo-sm">Insumos</label>
                                 <select class="form-control form-control-sm" name="insumo_materiales_insumos"
                                     id="insumo_materiales_insumos">
                                     <option>Seleccione una opción</option>
                                     <optgroup label="Radiología Intraoral" class="Radiología Intraoral">
                                         <option value="1-1">RX PERIAPICAL PIEZA</option>
                                         <option value="1-2">RX PERIAPICAL TOTAL</option>
                                         <option value="1-3">RX PERIAPICAL GRUPO II</option>
                                         <option value="1-2">RX PERIAPICAL GRUPO V</option>
                                         <option value="1-3">RX BITE WING BILATERAL</option>
                                         <option value="1-3">RX BITE WING DER O IZQ</option>
                                     </optgroup>
                                     <optgroup label="Radiología Extraoral" class="Radiología Extraoral">
                                         <option value="1-1">RX PANORAMICA DIGITAL</option>
                                         <option value="1-2">TELERRADIOGRAFIA LATERAL</option>
                                         <option value="1-3">TELERRADIOGRAFIA FRONTAL</option>
                                         <option value="1-2">ANALISIS CEFALOMETRICO</option>
                                         <option value="1-3">ORTHO PACK (PANO-TELE -1ANALISIS)</option>
                                         <option value="1-3">RX MANO (EDAD OSEA)</option>
                                     </optgroup>
                                 </select>
                             </div>
                         </div>
                         <div class="col-sm-2 mt-2">
                             <div class="form-group fill">
                                 <label class="floating-label-activo-sm">Cantidad</label>
                                 <input type="number" name="cantidad_insumo_materiales_insumos"
                                     id="cantidad_insumo_materiales_insumos" class="form-control form-control-sm">
                             </div>
                         </div>
                         <div class="col-sm-4 mt-2">
                             <div class="form-group fill">
                                 <label class="floating-label-activo-sm">Instrumental</label>
                                 <select class="form-control form-control-sm" name="instrumental_materiales_insumos"
                                     id="instrumental_materiales_insumos">
                                     <option>Seleccione una opción</option>
                                     <optgroup label="Radiología Intraoral" class="Radiología Intraoral">
                                         <option value="1-1">RX PERIAPICAL PIEZA</option>
                                         <option value="1-2">RX PERIAPICAL TOTAL</option>
                                         <option value="1-3">RX PERIAPICAL GRUPO II</option>
                                         <option value="1-2">RX PERIAPICAL GRUPO V</option>
                                         <option value="1-3">RX BITE WING BILATERAL</option>
                                         <option value="1-3">RX BITE WING DER O IZQ</option>
                                     </optgroup>
                                     <optgroup label="Radiología Extraoral" class="Radiología Extraoral">
                                         <option value="1-1">RX PANORAMICA DIGITAL</option>
                                         <option value="1-2">TELERRADIOGRAFIA LATERAL</option>
                                         <option value="1-3">TELERRADIOGRAFIA FRONTAL</option>
                                         <option value="1-2">ANALISIS CEFALOMETRICO</option>
                                         <option value="1-3">ORTHO PACK (PANO-TELE -1ANALISIS)</option>
                                         <option value="1-3">RX MANO (EDAD OSEA)</option>
                                     </optgroup>
                                 </select>
                             </div>
                         </div>
                         <div class="col-sm-2 mt-2">
                             <div class="form-group fill">
                                 <label class="floating-label-activo-sm">Cantidad</label>
                                 <input type="number" name="cantidad_instrumental_materiales_insumos"
                                     id="cantidad_instrumental_materiales_insumos" class="form-control form-control-sm">
                             </div>
                         </div>
                         <div class="col-sm-4 mt-2">
                             <div class="form-group fill">
                                 <label class="floating-label-activo-sm">Instrumental Desechable</label>
                                 <select class="form-control form-control-sm"
                                     name="instrumental_desechable_materiales_insumos"
                                     id="instrumental_desechable_materiales_insumos">
                                     <option>Seleccione una opción</option>
                                     <optgroup label="Radiología Intraoral" class="Radiología Intraoral">
                                         <option value="1-1">RX PERIAPICAL PIEZA</option>
                                         <option value="1-2">RX PERIAPICAL TOTAL</option>
                                         <option value="1-3">RX PERIAPICAL GRUPO II</option>
                                         <option value="1-2">RX PERIAPICAL GRUPO V</option>
                                         <option value="1-3">RX BITE WING BILATERAL</option>
                                         <option value="1-3">RX BITE WING DER O IZQ</option>
                                     </optgroup>
                                     <optgroup label="Radiología Extraoral" class="Radiología Extraoral">
                                         <option value="1-1">RX PANORAMICA DIGITAL</option>
                                         <option value="1-2">TELERRADIOGRAFIA LATERAL</option>
                                         <option value="1-3">TELERRADIOGRAFIA FRONTAL</option>
                                         <option value="1-2">ANALISIS CEFALOMETRICO</option>
                                         <option value="1-3">ORTHO PACK (PANO-TELE -1ANALISIS)</option>
                                         <option value="1-3">RX MANO (EDAD OSEA)</option>
                                     </optgroup>
                                 </select>
                             </div>
                         </div>
                         <div class="col-sm-2 mt-2">
                             <div class="form-group fill">
                                 <label class="floating-label-activo-sm">Cantidad</label>
                                 <input type="number" name="cantidad_instrumental_desechable_materiales_insumos"
                                     id="cantidad_instrumental_desechable_materiales_insumos"
                                     class="form-control form-control-sm">
                             </div>
                         </div>
                         <div class="col-sm-4">
                             <label class="floating-label-activo-sm">Box</label>
                             <input name="box_materiales_insumos" id="box_materiales_insumos" type="text"
                                 class="form-control form-control-sm">
                         </div>
                         <div class="col-sm-4">
                             <label class="floating-label-activo-sm">Hora de Inicio</label>
                             <input type="time" name="hora_inicio__materiales_insumos"
                                 id="hora_inicio__materiales_insumos" class="form-control form-control-sm">
                         </div>
                         <div class="col-sm-4">
                             <label class="floating-label-activo-sm">Hora de Término</label>
                             <input type="time" name="hora_termino_materiales_insumos"
                                 id="hora_termino_materiales_insumos" class="form-control form-control-sm">
                         </div>
                         <br>
                         <div class="col-sm-12 mt-2">
                             <button type="button" class="btn btn-success btn-sm float-right">
                                 <i class="fa fa-plus"></i> Agregar uso de materiales e Insumos</button>
                         </div>
                         <div class="col-sm-12 mt-3">
                             <!--**** Al agregar un material, se debe cargar la tabla *****-->
                             <!--Tabla-->
                             <div class="table-responsive">
                                 <table class="table table-bordered table-sm">
                                     <thead>
                                         <tr>
                                             <th class="text-center align-middle">Fecha</th>
                                             <th class="text-center align-middle">rut</th>
                                             <th class="text-center align-middle">material</th>
                                             <th class="text-center align-middle">insumo</th>
                                             <th class="text-center align-middle">instrumental</th>
                                             <th class="text-center align-middle">Tiempo</th>
                                             <th class="text-center align-middle">Acción</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr>
                                             <td class="text-center align-middle"><span>03/12/22</span></td>
                                             <td class="text-center align-middle">7217821-5</td>
                                             <td class="text-center align-middle">resina<br>1 pqte</td>
                                             <td class="text-center align-middle">pasta pulido<br> 3 gr.</td>
                                             <td class="text-center align-middle">cajas cirugia<br>2</td>
                                             <td class="text-center align-middle">25 min</td>
                                             <td class="text-center align-middle">
                                                 <button class="btn btn-danger btn-sm btn-icon"><i
                                                         class="feather icon-x"></i></button>
                                             </td>
                                         </tr>
                                     </tbody>
                                 </table>
                                 <!--Cierre Tabla-->
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" onclick="reset_form('form_gastos_material_paciente')"
                             class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                         <button type="submit" class="btn btn-info">Guardar</button>
                     </div>
                 </form>
             </div>

         </div>
     </div>
 </div>
 <script>
    function gasto_material()
    {
        $('#modal_gastosmaterial_gen').modal('show');
    }
</script>
