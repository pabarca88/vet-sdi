<div id="derivacion_periodoncista" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="derivacion_periodoncista" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Interconsulta a Periodoncia</h5>
                <h7 class="close text-white" style="font-size:15px">
                    <script>
                        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                   
                        var f=new Date();
                        document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                    </script>
                </h7>     
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body mb-0">
                <form id="interconsulta">
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Nombre</label>
                            <input type="text" class="form-control form-control-sm" name="" id="">
                        </div>
                        <div class="form-group col-sm-3 col-md-3">
                            <label class="floating-label-activo-sm">Rut</label>
                            <input type="person" class="form-control form-control-sm" name="" id="">
                        </div>
                        <div class="form-group col-sm-3 col-md-3">
                            <label class="floating-label-activo-sm">Edad</label>
                            <input type="number" class="form-control form-control-sm" name="" id="">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Dirección</label>
                            <input type="address" class="form-control form-control-sm" name="" id="">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Región </label>
                            <select id="region_comuna" name="region_comuna" class="form-control form-control-sm"  >
                                <option selected value="0">Seleccione una opción </option>
                                    <optgroup label="Región de Valparaíso"> 
                                        <option>Viña del Mar</option> 
                                        <option>Valparaíso</option> 
                                        <option>San Felipe</option>
                                        <option>etc...</option>
                                    </optgroup> 
                                    <optgroup label="Región Metropolitana"> 
                                        <option >Santiago</option> 
                                        <option >Maipú</option> 
                                        <option >etc...</option> 
                                    </optgroup>
                            </select>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm"> Comuna</label>
                            <select id="region_comuna" name="region_comuna" class="form-control form-control-sm"  >
                                <option selected value="0">Seleccione una opción </option>
                                    <optgroup label="Región de Valparaíso"> 
                                        <option>Viña del Mar</option> 
                                        <option>Valparaíso</option> 
                                        <option>San Felipe</option>
                                        <option>etc...</option>
                                    </optgroup> 
                                    <optgroup label="Región Metropolitana"> 
                                        <option >Santiago</option> 
                                        <option >Maipú</option> 
                                        <option >etc...</option> 
                                    </optgroup>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label-activo-sm">PCR</label>
                            <input type="text" class="form-control form-control-sm" name="" id="">
                        </div>
                        <div class="form-group col-sm-8 col-md-8">
                            <label class="floating-label-activo-sm">Hipotesís Diagnóstica:</label>
                            <input type="text" class="form-control form-control-sm" name="" id="">
                        </div>
                  
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Sintomatología</label>
                            <textarea style="width:100%" id="sint" name="sint" rows="2" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Exámenes</label>
                            <textarea style="width:100%"id="ex" name="ex" rows="2" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                        </div>
               
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Nombre Especialista</label>
                            <input type="text" class="form-control form-control-sm" name="" id="">
                        </div>
                        
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Se desea saber</label>
                            <textarea style="width:100%" id="sint" name="sint" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                        </div>
                        <div class="col-sm-12 col-md-12 text-center mb-2">
                            <!--<p class="mb-2">Saluda atentamente</p>-->
                            <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-sm btn-info">Enviar Interconsulta</button>
                        </div>
                    </div>
                </form>
                <a class="label collapsed" data-toggle="collapse" href="#responder-consulta" role="button" aria-expanded="false" aria-controls="responder-consulta">
                    <div class="card mb-3">
                        <div class="card-header align-middle">
                            <h6 class="float-left d-inline">RESPONDER INTERCONSULTA</h6>
                            <i id="responder-consulta" class="float-right f-18 d-inline fas fa-angle-down mb-0 collapse" style="cursor: pointer;" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>

				<div class="collapse" id="responder-consulta" style="">
					<div class="card-body">
                        <form id="responder-consulta">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Diagnóstico</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Tratamiento Realizado</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="2" name="" id=""></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Comentario</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="2" name="" id=""></textarea>
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <div class="form-group fill"> 
                                <script>
                                    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                   
                                    var f=new Date();
                                    document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                </script>
                            </div>
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">Nombre del profesional</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">Email</label>
                                    <input type="email" class="form-control form-control-sm" name="" id="">
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="floating-label-activo-sm">Fecha de control</label>
                                    <input type="date" class="form-control form-control-sm" name="" id="">
                                </div>
                                <div class="col-sm-12 col-md-12 text-center mb-2">
                                    <!--<p class="mb-2">Saluda atentamente</p>-->
                                    <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                                </div>
                            </div>
                            <div class="modal-footer pt-2 pb-0">
                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-sm btn-info">Enviar Respuesta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>