 <!-- Modal Editar contacto emergencia-->
 <div id="editar_contacto_emergencia" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="editar_contacto_emergencia" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <h5 class="modal-title text-white text-center">Editar contacto de emergencia</h5>
                 <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                         aria-hidden="true">×</span></button>
             </div>
             <div class="modal-body">
                 <form>
                     <input type="hidden" name="id_contacto" id="id_contacto" value="">
                     <div class="row">
                         <div class="col-sm-12 col-md-12">
                             <div class="form-group">
                                 <label id="label_rut_contacto" class="floating-label-activo">Rut</label>
                                 <input type="text" class="form-control" name="rut_contacto" id="rut_contacto"
                                     value="">
                             </div>
                         </div>
                         <div class="col-sm-12 col-md-12">
                             <div class="form-group">
                                 <label id="label_nombres_contacto" class="floating-label-activo">Nombres</label>
                                 <input type="text" class="form-control" name="nombres_contacto" id="nombres_contacto"
                                     value="">
                             </div>
                         </div>
                         <div class="col-sm-12 col-md-12">
                             <div class="form-group">
                                 <label id="label_apellido_uno_contacto" class="floating-label-activo">Primer Apellido</label>
                                 <input type="text" class="form-control" name="apellido_uno_contacto"
                                     id="apellido_uno_contacto" value="">
                             </div>
                         </div>
                         <div class="col-sm-12 col-md-12">
                             <div class="form-group">
                                 <label id="label_apellido_dos_contacto" class="floating-label-activo">Segundo Apellido</label>
                                 <input type="text" class="form-control" name="apellido_dos_contacto"
                                     id="apellido_dos_contacto" value="">
                             </div>
                         </div>
                         <div class="col-sm-8 col-md-8">
                             <div class="form-group">
                                 <label id="label_direccion_contacto" class="floating-label-activo">Dirección</label>
                                 <input type="address" class="form-control" name="direccion_contacto"
                                     id="direccion_contacto" value="">
                             </div>
                         </div>
                         <div class="col-sm-4 col-md-4">
                             <div class="form-group">
                                 <label id="label_numero_dir_contacto" class="floating-label-activo">Depto. | Ofic.</label>
                                 <input type="address" class="form-control" name="numero_dir_contacto"
                                     id="numero_dir_contacto" value="">
                             </div>
                         </div>
                         <div class="col-sm-12 col-md-12">
                             <div class="form-group">
                                 <label class="floating-label-activo activo">Regi&oacute;n</label>
                                 <select id="region_contacto_modificar" onchange="buscar_ciudad_general('region_contacto_modificar', 'ciudad_contacto_modificar', 0);"
                                     name="region_contacto_modificar" class="form-control" required>
                                     <option value="0">Seleccione</option>

                                     @foreach ($region as $reg)
                                         <option value="{{ $reg->id }}" selected> {{ $reg->nombre }} </option>
                                     @endforeach

                                 </select>
                             </div>
                         </div>

                         <div class="col-sm-12 col-md-12">
                             <div class="form-group">
                                 <label class="floating-label-activo-activo">Comuna</label>
                                 <select id="ciudad_contacto_modificar" name="ciudad_contacto_modificar"
                                     class="form-control">
                                     <option value="">Seleccione</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-sm-12 col-md-12">
                             <div class="form-group">
                                 <label id="label_email_contacto" class="floating-label-activo">Correo Electrónico</label>
                                 <input type="email" class="form-control" name="email_contacto" id="email_contacto"
                                     value="">
                             </div>
                         </div>
                         <div class="col-sm-12 col-md-12">
                             <div class="form-group">
                                 <label id="label_telefono_contacto" class="floating-label-activo">Tel&eacute;fono</label>
                                 <input type="tel" class="form-control" name="telefono_contacto"
                                     id="telefono_contacto" value="">
                             </div>
                         </div>

                         <div class="col-sm-12 col-md-12">
                             <div class="form-group">
                                 <label id="label_parentesco_contacto" class="floating-label-activo">Parentezco</label>
                                 <select id="parentezco_contacto" name="parentezco_contacto" class="form-control">
                                     <option>Seleccione una opción</option>
                                     <option>Pareja</option>
                                     <option>Padre</option>
                                     <option>Madre</option>
                                     <option>Hermano/a</option>
                                     <option>Abuelo/a</option>
                                     <option>Tío/a</option>
                                     <option>Primo/a</option>
                                     <option>Amigo/a</option>
                                     <option>Otro</option>
                                      <!--Si se selecciona "otro"
                                    deberia abrirse un input text para que el usuario escriba
                                    el parentezco-->
                                 </select>
                             </div>
                         </div>
                         <div class="col-sm-12 col-md-12">
                             <div class="form-group">
                                 <label id="label_prioridad_contacto" class="floating-label-activo">Prioridad</label>
                                 <select id="prioridad_contacto" name="prioridad_contacto" class="form-control">
                                     <option value="0">Seleccione una opción</option>
                                     <option value="1">1</option>
                                     <option value="2">2</option>
                                     <option value="3">3</option>
                                     <option value="4">4</option>
                                     <option value="5">5</option>
                                     <option value="6">6</option>
                                     <option value="7">7</option>
                                     <option value="8">8</option>
                                     <option value="9">9</option>
                                     <option value="10">10</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                 <button type="button" onclick="editar_contacto_emergencia();" class="btn btn-info">Guardar
                     Cambios</button>
             </div>
         </div>
     </div>
 </div>
