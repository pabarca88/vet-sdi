 <div id="modal_pedido_insumos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_pedido_insumos"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header bg-info">
                 <h5 class="modal-title text-white text-center">Pedido de Insumos / Materiales</h5>
                 <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                         aria-hidden="true">×</span></button>
             </div>
             <div class="modal-body mb-0">
                 <form id="form_pedido_insumos_materiales"
                     action="{{ route('dental.registrar_pedido_insumos_materiales') }}" method="post">
                     <div class="form-row">
                         <div class="form-group col-sm-12 col-md-12">
                             <script>
                                 var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                     "Octubre", "Noviembre", "Diciembre");
                                 var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                 var f = new Date();
                                 document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                     .getFullYear());
                             </script>
                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label">Tipo de Artículo :</label>
                             <select id="tipo_insumo_material" name="tipo_insumo_material"
                                 class="form-control form-control-sm">
                                 <option value="0">Seleccione una opción </option>
                                 <option value="insumo">Insumo</option>
                                 <option value="material">Material</option>

                             </select>
                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label">Nombre Insumo o Material</label>
                             <input type="text" class="form-control form-control-sm" name="nombre_insumo_material"
                                 id="nombre_insumo_material">
                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label">Pedir a :</label>
                             <select id="lugar_pedido_insumo_material" name="lugar_pedido_insumo_material"
                                 class="form-control form-control-sm">
                                 <option value="0">Seleccione una opción </option>
                                 <option value="1">Bodega del Centro</option>
                                 <option value="2">Proveedor</option>
                                 <option value="3">Otro</option>
                             </select>
                         </div>

                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label">Cantidad</label>
                             <input type="number" class="form-control form-control-sm" name="cantidad_insumo_material"
                                 id="cantidad_insumo_material">
                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label">Uso en:</label>
                             <input type="text" class="form-control form-control-sm" name="uso_cantidad_insumo_material"
                                 id="uso_cantidad_insumo_material">
                         </div>

                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label">Nombre Proveedor</label>
                             <input type="text" class="form-control form-control-sm"
                                 name="nombre_proveedor_cantidad_insumo_material"
                                 id="nombre_proveedor_cantidad_insumo_material">
                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label">Dirección</label>
                             <input type="text" class="form-control form-control-sm"
                                 name="direccion_proveedor_cantidad_insumo_material"
                                 id="direccion_proveedor_cantidad_insumo_material">
                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label">Email</label>
                             <input type="email" class="form-control form-control-sm"
                                 name="email_proveedor_cantidad_insumo_material"
                                 id="email_proveedor_cantidad_insumo_material">
                         </div>
                         <div class="col-sm-12 col-md-12 text-center mb-2">
                             <button type="button" class="btn btn-sm btn-primary">Ver documento en
                                 PDF</button>
                         </div>

                         <div class="modal-footer pt-2 pb-0">
                             <button type="button" onclick="reset_form('form_pedido_insumos_materiales')"
                                 class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                             <button type="submit" class="btn btn-info">Guardar</button>
                         </div>
                     </div>
                 </form>
                 <!---*******  Pedido insumos con autorización administrador genera petición de código autorización********-->
                 <!--<ul class="nav nav-pills mt-3 mb-4" id="pills-ext" role="tablist">
                     <li class="nav-item">

                         <a class="nav-link-modal" id="pills-tab-extcvb" data-toggle="pill" href="#extcvb" role="tab"
                             aria-controls="pills-tab-extcvb" aria-selected="false">Solicitar Visto Bueno</a>
                     </li>
                 </ul>
                -->

             </div>
         </div>
     </div>
 </div>
 <script>
    function ped_materiales()
    {
        $('#modal_pedido_insumos').modal('show');
    }
</script>
