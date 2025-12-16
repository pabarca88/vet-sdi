<div id="indicar_lente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_lente" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Receta de lentes</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<form>
								<div class="form-row">
									<div class="col-md-3">
	                                    <label class="col-form-label font-weight-bolder text-c-blue">Tipo de lentes</label>
	                                </div>
	                                <div class="col-md-9">
										<select class="form-control form-control-sm" data-select2-id="10" tabindex="-1" aria-hidden="true">
											<option value="t" data-select2-id="0">Seleccione</option>
											<option value="1"> Opticos monofocales</option>
											<option value="2"> Opticos bifocales</option>
											<option value="3"> Opticos trifocales</option>
											<option value="3"> Progresivos</option>
											<option value="4"> Opticos de sol</option>														
											<option value="5"> Contacto</option> 
										</select>
	                                </div>
								</div>
							</form>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<label class="font-weight-bolder text-c-blue">Recetas</label>
						</div>
					    <div class="col-md-9">
					        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
					            <li class="nav-item">
					                <a class="nav-link-wizard active" id="lentes_cerca_tab" data-toggle="pill" href="#lentes_cerca" role="tab" aria-controls="lentes_cerca" aria-selected="true">Lentes de cerca</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-wizard" id="lentes_intermedio_tab" data-toggle="pill" href="#lentes_intermedio" role="tab" aria-controls="pills-home" aria-selected="true">Lentes intermedios</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-wizard" id="lentes_lejos_tab" data-toggle="pill" href="#lentes_lejos" role="tab" aria-controls="pills-home" aria-selected="true">Lentes de lejos</a>
					            </li>
					        </ul>
					    </div>
					</div>
					<div class="row">
					    <div class="col-md-12">
					        <div class="tab-content" id="pills-tablas_examenes">
					        	<!--Lentes de cerca-->
					            <div class="tab-pane fade show active" id="lentes_cerca" role="tabpanel" aria-labelledby="lentes_cerca_tab">
					                <div class="row">
					                	<div class="col-sm-12 col-md-12">
					                		<form>
					                			<div class="form-row">
					                				<div class="col-sm-12 col-md-12">
														<label class="label font-weight-bolder" type="label">OJO DERECHO</label>
													</div>
					                			</div>
					                			<div class="form-row">
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">Esfera</label>
														<select class="form-control form-control-sm" style="color:red" name="esfera" id="esfera">
															<optgroup>
																<option value="t" data-select2-id="0">N</option>
																<option value="1"> +0.25</option>
																<option value="2"> +0.5</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1</option>								
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option> 
																<option value="0"> N</option>
																<option value="17"> -0.25</option>
																<option value="18"> -0.5</option>
																<option value="19"> -0.75</option>
																<option value="20"> -1</option>														
																<option value="21"> -1.25</option>
																<option value="22"> -1.50</option>
																<option value="23"> -1.75</option>
																<option value="24"> -2</option>
																<option value="25"> -2.25</option>													
																<option value="26"> -2.5</option>
																<option value="27"> -2.75</option>
																<option value="28"> -3</option>
																<option value="29"> -3.25</option>
																<option value="30"> -3.5</option>													
																<option value="31"> -3.75</option>
																<option value="32"> -4</option> 
															</optgroup>
														</select>
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">Cilindro</label>
														<select class="form-control form-control-sm" style="color:red" name="cilindro" id="cilindro">
															<optgroup >
																<option value="t" data-select2-id="0">N</option>
																<option value="1"> +0.25</option>
																<option value="2"> +0.5</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1</option>														
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option>
																<option value="0"> N</option>
																<option value="17"> -0.25</option>
																<option value="18"> -0.5</option>
																<option value="19"> -0.75</option>
																<option value="20"> -1</option>														
																<option value="21"> -1.25</option>
																<option value="22"> -1.50</option>
																<option value="23"> -1.75</option>
																<option value="24"> -2</option>
																<option value="25"> -2.25</option>													
																<option value="26"> -2.5</option>
																<option value="27"> -2.75</option>
																<option value="28"> -3</option>
																<option value="29"> -3.25</option>
																<option value="30"> -3.5</option>													
																<option value="31"> -3.75</option>
																<option value="32"> -4</option> 
															</optgroup>
														</select>
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label">Valor eje</label>
														<input type="text" class="form-control form-control-sm" name="valor-eje" id="valor-eje">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">ADD</label>
														<select class="form-control form-control-sm" style="color:red" name="add" id="add">
															<optgroup>
																<option value="t" data-select2-id="0">+2</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1 </option>														
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option>
															</optgroup>
														</select>
					                				</div>
					                			</div>
					                			<div class="form-row">
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">Prisma</label>
														<input type="text" class="form-control form-control-sm" name="prisma" id="prisma">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">DIP</label>
														<input type="text" class="form-control form-control-sm" name="dip" id="dip">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">Otro</label>
														<input type="text" class="form-control form-control-sm" name="otro" id="otro">
					                				</div>
					                			</div>
					                			<div class="form-row">
					                				<div class="col-sm-12 col-md-12">
														<label class="label font-weight-bolder" type="label">OJO IZQUIERDO</label>
													</div>
					                			</div>
					                			<div class="form-row">
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">Esfera</label>
														<select class="form-control form-control-sm" style="color:#3366CC" name="esfera" id="esfera">
															<optgroup>
																<option value="t" data-select2-id="0">N</option>
																<option value="1"> +0.25</option>
																<option value="2"> +0.5</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1</option>								
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option> 
																<option value="0"> N</option>
																<option value="17"> -0.25</option>
																<option value="18"> -0.5</option>
																<option value="19"> -0.75</option>
																<option value="20"> -1</option>														
																<option value="21"> -1.25</option>
																<option value="22"> -1.50</option>
																<option value="23"> -1.75</option>
																<option value="24"> -2</option>
																<option value="25"> -2.25</option>													
																<option value="26"> -2.5</option>
																<option value="27"> -2.75</option>
																<option value="28"> -3</option>
																<option value="29"> -3.25</option>
																<option value="30"> -3.5</option>													
																<option value="31"> -3.75</option>
																<option value="32"> -4</option> 
															</optgroup>
														</select>
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">Cilindro</label>
														<select class="form-control form-control-sm" style="color:#3366CC" name="cilindro" id="cilindro">
															<optgroup >
																<option value="t" data-select2-id="0">N</option>
																<option value="1"> +0.25</option>
																<option value="2"> +0.5</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1</option>														
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option>
																<option value="0"> N</option>
																<option value="17"> -0.25</option>
																<option value="18"> -0.5</option>
																<option value="19"> -0.75</option>
																<option value="20"> -1</option>														
																<option value="21"> -1.25</option>
																<option value="22"> -1.50</option>
																<option value="23"> -1.75</option>
																<option value="24"> -2</option>
																<option value="25"> -2.25</option>													
																<option value="26"> -2.5</option>
																<option value="27"> -2.75</option>
																<option value="28"> -3</option>
																<option value="29"> -3.25</option>
																<option value="30"> -3.5</option>													
																<option value="31"> -3.75</option>
																<option value="32"> -4</option> 
															</optgroup>
														</select>
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label">Valor eje</label>
														<input type="text" class="form-control form-control-sm" name="valor-eje" id="valor-eje">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">ADD</label>
														<select class="form-control form-control-sm" style="color:#3366CC" name="add" id="add">
															<optgroup>
																<option value="t" data-select2-id="0">+2</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1 </option>														
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option>
															</optgroup>
														</select>
					                				</div>
					                			</div>
					                			<div class="form-row">
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">Prisma</label>
														<input type="text" class="form-control form-control-sm" name="prisma" id="prisma">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">DIP</label>
														<input type="text" class="form-control form-control-sm" name="dip" id="dip">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">Otro</label>
														<input type="text" class="form-control form-control-sm" name="otro" id="otro">
					                				</div>
					                			</div>	
			                                </form>
					                	</div>
					                </div>
					            </div>

					            <!--Lentes intermedios-->
					            <div class="tab-pane fade show" id="lentes_intermedio" role="tabpanel" aria-labelledby="lentes_intermedio_tab">
					                <div class="row">
					                	<div class="col-sm-12 col-md-12">
					                		<form>
					                			<div class="form-row">
					                				<div class="col-sm-12 col-md-12">
														<label class="label font-weight-bolder" type="label">OJO DERECHO</label>
													</div>
					                			</div>
					                			<div class="form-row">
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">Esfera</label>
														<select class="form-control form-control-sm" style="color:red" name="esfera" id="esfera">
															<optgroup>
																<option value="t" data-select2-id="0">N</option>
																<option value="1"> +0.25</option>
																<option value="2"> +0.5</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1</option>								
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option> 
																<option value="0"> N</option>
																<option value="17"> -0.25</option>
																<option value="18"> -0.5</option>
																<option value="19"> -0.75</option>
																<option value="20"> -1</option>														
																<option value="21"> -1.25</option>
																<option value="22"> -1.50</option>
																<option value="23"> -1.75</option>
																<option value="24"> -2</option>
																<option value="25"> -2.25</option>													
																<option value="26"> -2.5</option>
																<option value="27"> -2.75</option>
																<option value="28"> -3</option>
																<option value="29"> -3.25</option>
																<option value="30"> -3.5</option>													
																<option value="31"> -3.75</option>
																<option value="32"> -4</option> 
															</optgroup>
														</select>
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">Cilindro</label>
														<select class="form-control form-control-sm" style="color:red" name="cilindro" id="cilindro">
															<optgroup >
																<option value="t" data-select2-id="0">N</option>
																<option value="1"> +0.25</option>
																<option value="2"> +0.5</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1</option>														
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option>
																<option value="0"> N</option>
																<option value="17"> -0.25</option>
																<option value="18"> -0.5</option>
																<option value="19"> -0.75</option>
																<option value="20"> -1</option>														
																<option value="21"> -1.25</option>
																<option value="22"> -1.50</option>
																<option value="23"> -1.75</option>
																<option value="24"> -2</option>
																<option value="25"> -2.25</option>													
																<option value="26"> -2.5</option>
																<option value="27"> -2.75</option>
																<option value="28"> -3</option>
																<option value="29"> -3.25</option>
																<option value="30"> -3.5</option>													
																<option value="31"> -3.75</option>
																<option value="32"> -4</option> 
															</optgroup>
														</select>
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label">Valor eje</label>
														<input type="text" class="form-control form-control-sm" name="valor-eje" id="valor-eje">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">ADD</label>
														<select class="form-control form-control-sm" style="color:red" name="add" id="add">
															<optgroup>
																<option value="t" data-select2-id="0">+2</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1 </option>														
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option>
															</optgroup>
														</select>
					                				</div>
					                			</div>
					                			<div class="form-row">
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">Prisma</label>
														<input type="text" class="form-control form-control-sm" name="prisma" id="prisma">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">DIP</label>
														<input type="text" class="form-control form-control-sm" name="dip" id="dip">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">Otro</label>
														<input type="text" class="form-control form-control-sm" name="otro" id="otro">
					                				</div>
					                			</div>
					                			<div class="form-row">
					                				<div class="col-sm-12 col-md-12">
														<label class="label font-weight-bolder" type="label">OJO IZQUIERDO</label>
													</div>
					                			</div>
					                			<div class="form-row">
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">Esfera</label>
														<select class="form-control form-control-sm" style="color:#3366CC" name="esfera" id="esfera">
															<optgroup>
																<option value="t" data-select2-id="0">N</option>
																<option value="1"> +0.25</option>
																<option value="2"> +0.5</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1</option>								
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option> 
																<option value="0"> N</option>
																<option value="17"> -0.25</option>
																<option value="18"> -0.5</option>
																<option value="19"> -0.75</option>
																<option value="20"> -1</option>														
																<option value="21"> -1.25</option>
																<option value="22"> -1.50</option>
																<option value="23"> -1.75</option>
																<option value="24"> -2</option>
																<option value="25"> -2.25</option>													
																<option value="26"> -2.5</option>
																<option value="27"> -2.75</option>
																<option value="28"> -3</option>
																<option value="29"> -3.25</option>
																<option value="30"> -3.5</option>													
																<option value="31"> -3.75</option>
																<option value="32"> -4</option> 
															</optgroup>
														</select>
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">Cilindro</label>
														<select class="form-control form-control-sm" style="color:#3366CC" name="cilindro" id="cilindro">
															<optgroup >
																<option value="t" data-select2-id="0">N</option>
																<option value="1"> +0.25</option>
																<option value="2"> +0.5</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1</option>														
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option>
																<option value="0"> N</option>
																<option value="17"> -0.25</option>
																<option value="18"> -0.5</option>
																<option value="19"> -0.75</option>
																<option value="20"> -1</option>														
																<option value="21"> -1.25</option>
																<option value="22"> -1.50</option>
																<option value="23"> -1.75</option>
																<option value="24"> -2</option>
																<option value="25"> -2.25</option>													
																<option value="26"> -2.5</option>
																<option value="27"> -2.75</option>
																<option value="28"> -3</option>
																<option value="29"> -3.25</option>
																<option value="30"> -3.5</option>													
																<option value="31"> -3.75</option>
																<option value="32"> -4</option> 
															</optgroup>
														</select>
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label">Valor eje</label>
														<input type="text" class="form-control form-control-sm" name="valor-eje" id="valor-eje">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">ADD</label>
														<select class="form-control form-control-sm" style="color:#3366CC" name="add" id="add">
															<optgroup>
																<option value="t" data-select2-id="0">+2</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1 </option>														
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option>
															</optgroup>
														</select>
					                				</div>
					                			</div>
					                			<div class="form-row">
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">Prisma</label>
														<input type="text" class="form-control form-control-sm" name="prisma" id="prisma">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">DIP</label>
														<input type="text" class="form-control form-control-sm" name="dip" id="dip">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">Otro</label>
														<input type="text" class="form-control form-control-sm" name="otro" id="otro">
					                				</div>
					                			</div>	
			                                </form>
					                	</div>
					                </div>
					            </div>
					            <!--Lentes de lejos-->
					            <div class="tab-pane fade show " id="lentes_lejos" role="tabpanel" aria-labelledby="lentes_lejos_tab">
					             	<div class="row">
					                	<div class="col-sm-12 col-md-12">
					                		<form>
					                			<div class="form-row">
					                				<div class="col-sm-12 col-md-12">
														<label class="label font-weight-bolder" type="label">OJO DERECHO</label>
													</div>
					                			</div>
					                			<div class="form-row">
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">Esfera</label>
														<select class="form-control form-control-sm" style="color:red" name="esfera" id="esfera">
															<optgroup>
																<option value="t" data-select2-id="0">N</option>
																<option value="1"> +0.25</option>
																<option value="2"> +0.5</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1</option>								
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option> 
																<option value="0"> N</option>
																<option value="17"> -0.25</option>
																<option value="18"> -0.5</option>
																<option value="19"> -0.75</option>
																<option value="20"> -1</option>														
																<option value="21"> -1.25</option>
																<option value="22"> -1.50</option>
																<option value="23"> -1.75</option>
																<option value="24"> -2</option>
																<option value="25"> -2.25</option>													
																<option value="26"> -2.5</option>
																<option value="27"> -2.75</option>
																<option value="28"> -3</option>
																<option value="29"> -3.25</option>
																<option value="30"> -3.5</option>													
																<option value="31"> -3.75</option>
																<option value="32"> -4</option> 
															</optgroup>
														</select>
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">Cilindro</label>
														<select class="form-control form-control-sm" style="color:red" name="cilindro" id="cilindro">
															<optgroup >
																<option value="t" data-select2-id="0">N</option>
																<option value="1"> +0.25</option>
																<option value="2"> +0.5</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1</option>														
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option>
																<option value="0"> N</option>
																<option value="17"> -0.25</option>
																<option value="18"> -0.5</option>
																<option value="19"> -0.75</option>
																<option value="20"> -1</option>														
																<option value="21"> -1.25</option>
																<option value="22"> -1.50</option>
																<option value="23"> -1.75</option>
																<option value="24"> -2</option>
																<option value="25"> -2.25</option>													
																<option value="26"> -2.5</option>
																<option value="27"> -2.75</option>
																<option value="28"> -3</option>
																<option value="29"> -3.25</option>
																<option value="30"> -3.5</option>													
																<option value="31"> -3.75</option>
																<option value="32"> -4</option> 
															</optgroup>
														</select>
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label">Valor eje</label>
														<input type="text" class="form-control form-control-sm" name="valor-eje" id="valor-eje">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">ADD</label>
														<select class="form-control form-control-sm" style="color:red" name="add" id="add">
															<optgroup>
																<option value="t" data-select2-id="0">+2</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1 </option>														
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option>
															</optgroup>
														</select>
					                				</div>
					                			</div>
					                			<div class="form-row">
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">Prisma</label>
														<input type="text" class="form-control form-control-sm" name="prisma" id="prisma">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">DIP</label>
														<input type="text" class="form-control form-control-sm" name="dip" id="dip">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">Otro</label>
														<input type="text" class="form-control form-control-sm" name="otro" id="otro">
					                				</div>
					                			</div>
					                			<div class="form-row">
					                				<div class="col-sm-12 col-md-12">
														<label class="label font-weight-bolder" type="label">OJO IZQUIERDO</label>
													</div>
					                			</div>
					                			<div class="form-row">
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">Esfera</label>
														<select class="form-control form-control-sm" style="color:#3366CC" name="esfera" id="esfera">
															<optgroup>
																<option value="t" data-select2-id="0">N</option>
																<option value="1"> +0.25</option>
																<option value="2"> +0.5</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1</option>								
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option> 
																<option value="0"> N</option>
																<option value="17"> -0.25</option>
																<option value="18"> -0.5</option>
																<option value="19"> -0.75</option>
																<option value="20"> -1</option>														
																<option value="21"> -1.25</option>
																<option value="22"> -1.50</option>
																<option value="23"> -1.75</option>
																<option value="24"> -2</option>
																<option value="25"> -2.25</option>													
																<option value="26"> -2.5</option>
																<option value="27"> -2.75</option>
																<option value="28"> -3</option>
																<option value="29"> -3.25</option>
																<option value="30"> -3.5</option>													
																<option value="31"> -3.75</option>
																<option value="32"> -4</option> 
															</optgroup>
														</select>
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">Cilindro</label>
														<select class="form-control form-control-sm" style="color:#3366CC" name="cilindro" id="cilindro">
															<optgroup >
																<option value="t" data-select2-id="0">N</option>
																<option value="1"> +0.25</option>
																<option value="2"> +0.5</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1</option>														
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option>
																<option value="0"> N</option>
																<option value="17"> -0.25</option>
																<option value="18"> -0.5</option>
																<option value="19"> -0.75</option>
																<option value="20"> -1</option>														
																<option value="21"> -1.25</option>
																<option value="22"> -1.50</option>
																<option value="23"> -1.75</option>
																<option value="24"> -2</option>
																<option value="25"> -2.25</option>													
																<option value="26"> -2.5</option>
																<option value="27"> -2.75</option>
																<option value="28"> -3</option>
																<option value="29"> -3.25</option>
																<option value="30"> -3.5</option>													
																<option value="31"> -3.75</option>
																<option value="32"> -4</option> 
															</optgroup>
														</select>
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label">Valor eje</label>
														<input type="text" class="form-control form-control-sm" name="valor-eje" id="valor-eje">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-3">
					                					<label class="floating-label-activo-sm">ADD</label>
														<select class="form-control form-control-sm" style="color:#3366CC" name="add" id="add">
															<optgroup>
																<option value="t" data-select2-id="0">+2</option>
																<option value="3"> +0.75</option>
																<option value="4"> +1 </option>														
																<option value="5"> +1.25</option>
																<option value="6"> +1.50</option>
																<option value="7"> +1.75</option>
																<option value="8"> +2</option>
																<option value="9"> +2.25</option>													
																<option value="10"> +2.5</option>
																<option value="11"> +2.75</option>
																<option value="12"> +3</option>
																<option value="13"> +3.25</option>
																<option value="14"> +3.5</option>													
																<option value="15"> +3.75</option>
																<option value="16"> +4</option>
															</optgroup>
														</select>
					                				</div>
					                			</div>
					                			<div class="form-row">
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">Prisma</label>
														<input type="text" class="form-control form-control-sm" name="prisma" id="prisma">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">DIP</label>
														<input type="text" class="form-control form-control-sm" name="dip" id="dip">
					                				</div>
					                				<div class="form-group col-sm-12 col-md-4">
					                					<label class="floating-label">Otro</label>
														<input type="text" class="form-control form-control-sm" name="otro" id="otro">
					                				</div>
					                			</div>	
			                                </form>
					                	</div>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
					<hr class="mt-1">
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<form>
								<div class="form-group">
                                    <label class="floating-label">Comentarios</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="comentarios" id="comentarios"></textarea>
                                </div>
							</form>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-success btn-info btn-sm">Guardar</button>
				</div>
			</div>	
		</div>
	</div>
</div>
	<script type="text/javascript">
		function showContentlejos() {
			element = document.getElementById("contentlejos");
			check = document.getElementById("checklejos");
			if (check.checked) {
				element.style.display='block';
			}
			else {
				element.style.display='none';
			}
		}
	</script>
	<script type="text/javascript">
		function showContentinter() {
			element = document.getElementById("contentinter");
			check = document.getElementById("checkinter");
			if (check.checked) {
				element.style.display='block';
			}
			else {
				element.style.display='none';
			}
		}
	</script>