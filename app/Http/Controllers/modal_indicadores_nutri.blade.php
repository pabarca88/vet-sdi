<div id="m_indicadores_nutri" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_indicadores_nutri" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Frecuencia consumo alimentos</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="tablas_examenes" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active " id="uno_nutri_tab" data-toggle="pill" href="#uno_nutri_" role="tab" aria-controls="pills-home" aria-selected="true">Nec. Energética</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="dos_nutri_tab" data-toggle="pill" href="#dos_nutri_" role="tab" aria-controls="pills-home" aria-selected="true">Análisis</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="tres_nutri_tab" data-toggle="pill" href="#tres_nutri_" role="tab" aria-controls="pills-home" aria-selected="true">Leches</a>
                            </li>

                            <li class="nav-item">
                               <a class="nav-link-aten text-reset" id="cuatro_nutri_tab" data-toggle="pill" href="#cuatro_nutri_" role="tab" aria-controls="pills-home" aria-selected="true">Origen Animal</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link-aten text-reset" id="cinco_nutri_tab" data-toggle="pill" href="#cinco_nutri_" role="tab" aria-controls="pills-home" aria-selected="true">Cereales</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link-aten text-reset" id="seis_nutri_tab" data-toggle="pill" href="#seis_nutri_" role="tab" aria-controls="pills-home" aria-selected="true">Verduras</a>
                           </li>

                           <li class="nav-item text-reset">
                            	<a class="nav-link-aten text-reset" id="siete_nutri_tab" data-toggle="pill" href="#siete_nutri_" role="tab" aria-controls="pills-home" aria-selected="true">Frutas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="ocho_nutri_tab" data-toggle="pill" href="#ocho_nutri_" role="tab" aria-controls="pills-home" aria-selected="true">Leguminosas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="nueve_nutri_tab" data-toggle="pill" href="#nueve_nutri_" role="tab" aria-controls="pills-home" aria-selected="true">Lípidos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="diez_nutri_tab" data-toggle="pill" href="#diez_nutri" role="tab" aria-controls="pills-home" aria-selected="true">Azúcares</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="once_nutri_tab" data-toggle="pill" href="#once_nutri_" role="tab" aria-controls="pills-home" aria-selected="true">Sustitutos</a>
                            </li>
                        </ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
					    <div class="tab-content" id="pills-tablas_calculo_nutri">
							<!--NEC. ENERGÉTICA-->
					        <div class="tab-pane fade show active" id="uno_nutri_" role="tabpanel" aria-labelledby="uno_nutri_tab">
					        	<div class="form-row">
									<div class="col-12">
										<h6 class="tit-gen">Necesidad energética</h6>
									</div>
								</div>
					        	<div class="form-row">
					        		<div class="col-12">
										<div class="card-informacion">
											<div class="card-body">
												<div class="form-row">
													<div class="col-12 mt-2">
														<div class="form-group fill">
															<h6 class="tit-gen">Para peso teórico</h6>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="lnut_get" name="lnut_get" class="floating-label-activo-sm">GET</label>
															<input type="text" class="form-control form-control-sm" name="nut_pt_get" id="nut_pt_get">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">TMR</label>
															<input type="text" class="form-control form-control-sm" name="nut_pt_tmr" id="nut_pt_tmr">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">ETA</label>
															<input type="text" class="form-control form-control-sm" name="nut_pt_eta" id="nut_pt_eta">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">AF</label>
															<input type="text" class="form-control form-control-sm" name="nut_pt_af" id="nut_pt_af">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">TOTAL</label>
															<input type="text" class="form-control form-control-sm" name="nut_pt_total" id="nut_pt_total">
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<h6>Nutriente H. de Carbono</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Gramos</label>
															<input type="text" class="form-control form-control-sm" name="nut_pt_aphc" id="nut_pt_aphc" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Kilocalorías</label>
															<input type="text" class="form-control form-control-sm" name="nut_pt_kchc" id="nut_pt_kchc">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">% del GET</label>
															<input type="text" class="form-control form-control-sm" name="nut_pt_pghc" id="nut_pt_pghc">
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<h6 class="form_fono">Nutriente Proteínas</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Gramos</label>
															<input type="text" class="form-control form-control-sm" name="nut_pt_appr" id="nut_pt_appr" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Kilocalorías</label>
															<input type="text" class="form-control form-control-sm" name="nut_pt_kcpr" id="nut_pt_kcpr" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">% del GET</label>
															<input type="text" class="form-control form-control-sm" name="nut_pt_pgpr" id="nut_pt_pgpr" />
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<h6 class="form_fono">Nutriente Lípidos</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3  mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Gramos</label>
															<input type="text" class="form-control form-control-sm" name="nut_pt_apli" id="nut_pt_apli" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3  mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Kilocalorías</label>
															<input type="text" class="form-control form-control-sm" name="nut_pt_kcli" id="nut_pt_kcli">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3  mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">% del GET</label>
															<input type="text" class="form-control form-control-sm" name="nut_pt_pgli" id="nut_pt_pgli">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-row">
					        		<div class="col-12">
										<div class="card-informacion">
											<div class="card-body">
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3  mt-2">
														<div class="form-group fill">
															<h6 class="tit-gen">Para Peso Actual</h6>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">GET</label>
															<input type="text" class="form-control form-control-sm" name="nut_pa_get" id="nut_pa_get">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">TMR</label>
															<input type="text" class="form-control form-control-sm" name="nut_pa_tmr" id="nut_pa_tmr">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">ETA</label>
															<input type="text" class="form-control form-control-sm" name="nut_pa_eta" id="nut_pa_eta">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">AF</label>
															<input type="text" class="form-control form-control-sm" name="nut_pa_af" id="nut_pa_af">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">TOTAL</label>
															<input type="text" class="form-control form-control-sm" name="nut_pa_total" id="nut_pa_total">
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<h6>Nutriente H. de Carbono</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Gramos</label>
															<input type="text" class="form-control form-control-sm" name="nut_pa_aphc" id="nut_pa_aphc" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Kilocalorías</label>
															<input type="text" class="form-control form-control-sm" name="nut_pa_kchc" id="nut_pa_kchc">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">% del GET</label>
															<input type="text" class="form-control form-control-sm" name="nut_pa_pghc" id="nut_pa_pghc">
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<h6 class="form_fono">Nutriente Proteínas</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Gramos</label>
															<input type="text" class="form-control form-control-sm" name="nut_pa_appr" id="nut_pa_appr" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Kilocalorías</label>
															<input type="text" class="form-control form-control-sm" name="nut_pa_kcpr" id="nut_pa_kcpr" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">% del GET</label>
															<input type="text" class="form-control form-control-sm" name="nut_pa_pgpr" id="nut_pa_pgpr" />
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3">
														<div class="form-group fill">
															<h6 class="form_fono">Nutriente Lípidos</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3  mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Gramos</label>
															<input type="text" class="form-control form-control-sm" name="nut_pa_apli" id="nut_pa_apli" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3  mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Kilocalorías</label>
															<input type="text" class="form-control form-control-sm" name="nut_pa_kcli" id="nut_pa_kcli">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-3  mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">% del GET</label>
															<input type="text" class="form-control form-control-sm" name="nut_pa_pgli" id="nut_pa_pgli">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
					        </div>
							<!--ANÁLISIS-->
					        <div class="tab-pane fade show" id="dos_nutri_" role="tabpanel" aria-labelledby="dos_nutri_tab">
								<div class="form-row">
									<div class="col-12">
										<h6 class="tit-gen">Análisis</h6>
									</div>
								</div>
					        	<div class="form-row">
					        		<div class="col-12">
										<div class="card-informacion">
											<div class="card-body">
												<div class="form-row">
													<div class="col-sm-12 mt-3">
														<div class="form-group fill">
															<h6 class="tit-gen">Análisis de Recordatorio de 24 horas</h6>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-12 col-xl-2 mt-3">
														<div class="form-group fill">
															<h6 class="form_fono">Consumo Actual</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-2 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Kilocalorias</label>
															<input type="text" class="form-control form-control-sm" name="an_rec_ca_kc" id="an_rec_ca_kc" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-2 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">H. de Carbono (g)</label>
															<input type="text" class="form-control form-control-sm" name="an_rec_ca_hc" id="an_rec_ca_hc">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-2 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Proteínas(g)</label>
															<input type="text" class="form-control form-control-sm" name="an_rec_ca_pt" id="an_rec_ca_pt">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-3 col-xl-2 mt-3">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Lípidos(g)</label>
															<input type="text" class="form-control form-control-sm" name="an_rec_ca_li" id="an_rec_ca_li">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>


								<div class="form-row">
					        		<div class="col-12">
										<div class="card-informacion">
											<div class="card-body">
												<div class="form-row">
													<div class="col-sm-12 mt-3">
														<div class="form-group fill">
															<h6 class="tit-gen">Distribución energética del consumo actual</h6>
														</div>
													</div>
												</div>
												<div class="form-row">
												</div>
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-12 col-xl-3 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">Nutriente H. de Carbono</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Gramos</label>
															<input type="text" class="form-control form-control-sm" name="de_ca_hc_gr" id="de_c_hc_gr" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Kilocalorías</label>
															<input type="text" class="form-control form-control-sm" name="de_ca_hc_kc" id="de_c_hc_kc">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">% del CONSUMO ENERGÍA REAL</label>
															<input type="text" class="form-control form-control-sm" name="de_ca_hc_pce" id="de_ca_hc_pce">
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-12 col-xl-3 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">Nutriente Proteínas</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Gramos</label>
															<input type="text" class="form-control form-control-sm" name="de_ca_pr_gr" id="de_ca_pr_gr" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Kilocalorías</label>
															<input type="text" class="form-control form-control-sm" name="de_ca_pr_kc" id="de_ca_pr_kc" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">% del CONSUMO ENERGÍA REAL</label>
															<input type="text" class="form-control form-control-sm" name="de_ca_pr_pce" id="de_ca_pr_pce" />
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-12 col-xl-3 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">Nutriente Lípidos</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Gramos</label>
															<input type="text" class="form-control form-control-sm" name="de_ca_pr_gr" id="de_ca_pr_gr" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Kilocalorías</label>
															<input type="text" class="form-control form-control-sm" name="de_ca_pr_kc" id="de_ca_pr_kc">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">% del CONSUMO ENERG REAL</label>
															<input type="text" class="form-control form-control-sm" name="de_ca_pr_pce" id="de_ca_pr_pce">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>


								<div class="form-row">
					        		<div class="col-12">
										<div class="card-informacion">
											<div class="card-body">
												<div class="form-row">
													<div class="col-12 mt-2">
														<div class="form-group fill">
															<h6 class="tit-gen">Consumo Actual y % Adecuación</h6>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6>Consumo Recomendado 24 Hrs.</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Kilocalorías</label>
															<input type="text" class="form-control form-control-sm" name="cr_vc_kc" id="cr_vc_kc" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">H. de Carbono</label>
															<input type="text" class="form-control form-control-sm" name="cr_vc_pc" id="cr_vc_pc">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Proteínas</label>
															<input type="text" class="form-control form-control-sm" name="cr_vc_pt" id="cr_vc_pt">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Lípidos</label>
															<input type="text" class="form-control form-control-sm" name="cr_vc_li" id="cr_vc_li">
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">% A para peso Teórico</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Kilocalorías</label>
															<input type="text" class="form-control form-control-sm" name="cr_pt_kc" id="cr_pt_kc" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">H. de Carbono</label>
															<input type="text" class="form-control form-control-sm" name="cr_pt_hc" id="cr_pt_hc">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Proteínas</label>
															<input type="text" class="form-control form-control-sm" name="cr_pt_pt" id="cr_pt_pt">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Lípidos</label>
															<input type="text" class="form-control form-control-sm" name="cr_pt_li" id="cr_pt_li">
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">% A para peso Actual</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Kilocalorías</label>
															<input type="text" class="form-control form-control-sm" name="cr_pa_kc" id="cr_pa_kc" />
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">H. de Carbono</label>
															<input type="text" class="form-control form-control-sm" name="cr_pa_hc" id="cr_pa_hc">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Proteínas</label>
															<input type="text" class="form-control form-control-sm" name="cr_pa_pt" id="cr_pa_pt">
														</div>
													</div>
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Lípidos</label>
															<input type="text" class="form-control form-control-sm" name="cr_pa_li" id="cr_pa_li">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
					        </div>
							<!--LECHE-->
					        <div class="tab-pane fade show" id="tres_nutri_" role="tabpanel" aria-labelledby="tres_nutri_tab">
								<form>
									<div class="form-row">
										<div class="col-12">
											<h6 class="tit-gen">Leches</h6>
										</div>
									</div>
									<div id="leche" class="form-row">
										<div class="col-12">
											<div class="card-informacion">
												<div class="card-body">
													<div class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono"> Leche o yogur descremado</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="ld_d" id="ld_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="ld_s" id="ld_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="ld_q" id="ld_q">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="ld_m" id="ld_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono"> Leche o yogur semidescremada</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="lsd_d" id="lsd_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="lsd_s" id="lsd_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="lsd_qu" id="lsd_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="lsd_m" id="lsd_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono"> Leche ent. o yogur natural</h6>
															</div>
														</div>

														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="ln_d" id="ln_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="ln_s" id="ln_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="ln_qu" id="ln_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="ln_m" id="ln_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Leche Saborizada</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="ls_d" id="ls_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="ls_s" id="ls_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="ls_qu" id="ls_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="ls_m" id="ls_m">
															</div>
														</div>
														<div class="col-12 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Consumo Leche</label>
																<textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_lac" id="obs_lac"></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
					        </div>
							<!--ORIGEN ANIMAL-->
					        <div  class="tab-pane fade show" id="cuatro_nutri_"  role="tabpanel" aria-labelledby="cuatro_nutri_tab">
								<form>
									<div class="form-row">
										<div class="col-12">
											<h6 class="tit-gen">Origen Animal</h6>
										</div>
									</div>
									<div class="form-row">
										<div class="card-informacion">
											<div class="card-body">
												<div id="tit_o_anim" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono"> A.- Pechuga de pollo sin piel</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="pp_sp_d" id="pp_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="pp_sp_s" id="pp_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="pp_sp_qu" id="pp_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="pp_sp_m" id="pp_sp_m">
														</div>
													</div>
												</div>
                                                <div id="tit_o_anim" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono"> B.- Muslo o pierna, hígado de pollo.</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="mp_sp_d" id="mp_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="mp_sp_d" id="mp_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="mp_sp_d" id="mp_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="mp_sp_d" id="mp_sp_d">
														</div>
													</div>
												</div>
                                                <div id="alimentacion_mensual" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">C.- Pollo con piel</h6>
														</div>
													</div>

													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="pe_sp_d" id="pe_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="pe_sp_s" id="pe_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="pe_sp_qu" id="pe_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="pe_sp_m" id="pe_sp_m">
														</div>
													</div>
												</div>
												<div id="alimentacion_mensual" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">D.- Atún en agua</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="aa_sp_d" id="aa_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="aa_sp_s" id="aa_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="aa_sp_qu" id="aa_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="aa_sp_m" id="aa_sp_m">
														</div>
													</div>
												</div>
												<div id="alimentacion_mensual" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">E.- Queso cottage</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="qc_sp_d" id="qc_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="qc_sp_s" id="qc_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="qc_sp_qu" id="qc_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="qc_sp_m" id="qc_sp_m">
														</div>
													</div>
												</div>
												<div id="alimentacion_mensual" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">F.- Ternera</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="te_sp_d" id="te_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="te_sp_s" id="te_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="te_sp_qu" id="te_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="te_sp_m" id="te_sp_m">
														</div>
													</div>
												</div>

												<div id="alimentacion_mensual" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">G.- Barbacoa (maciza)</h6>
														</div>
													</div>

													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="bc_sp_d" id="bc_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="bc_sp_s" id="bc_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="bc_sp_qu" id="bc_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="bc_sp_m" id="bc_sp_m">
														</div>
													</div>
												</div>
												<div id="alimentacion_mensual" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">H.- Carne de cerdo sin grasa</h6>
														</div>
													</div>

													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="cce_sp_d" id="cce_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="cce_sp_s" id="cce_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="cce_sp_qu" id="cce_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="cce_sp_m" id="cce_sp_m">
														</div>
													</div>
												</div>
												<div id="alimentacion_mensual" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">I.- Pescado</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="cpe_sp_d" id="cpe_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="cpe_sp_s" id="cpe_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="cpe_sp_qu" id="cpe_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="cpe_sp_m" id="cpe_sp_m">
														</div>
													</div>
												</div>
												<div id="tit_o_anim" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">J.- Queso panela</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="cqp_sp_d" id="cqp_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="cqp_sp_s" id="cqp_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="cqp_sp_qu" id="cqp_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="cqp_sp_m" id="cqp_sp_m">
														</div>
													</div>
												</div>
												<div id="alimentacion_mensual" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">k.- Res magra (cuete, filete, falda, aguayón)</h6>
														</div>
													</div>

													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="crm_sp_d" id="crm_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="crm_sp_s" id="crm_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="crm_sp_qu" id="crm_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="crm_sp_m" id="crm_sp_m">
														</div>
													</div>
												</div>

												<div id="alimentacion_mensual" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">L.- Queso oaxaca</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="cqo_sp_d" id="cqo_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="cqo_sp_s" id="cqo_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="cqo_sp_qu" id="cqo_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="cqo_sp_m" id="cqo_sp_m">
														</div>
													</div>
												</div>
												<div id="tit_o_anim" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">LL.- Huevo entero</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="hv_sp_d" id="hv_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="hv_sp_s" id="hv_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="hv_sp_qu" id="hv_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="hv_sp_m" id="hv_sp_m">
														</div>
													</div>
												</div>
												<div id="alimentacion_mensual" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">O.- Mariscos</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="cma_sp_d" id="cma_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="cma_sp_m" id="cma_sp_m">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="cma_sp_qu" id="cma_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="" id=cma_sp_m"">
														</div>
													</div>
												</div>
												<div id="alimentacion_mensual" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">P.- Embutidos de cerdo</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="emb_sp_d" id="emb_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="emb_sp_s" id="emb_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="emb_sp_qu" id="emb_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="emb_sp_m" id="emb_sp_m">
														</div>
													</div>
												</div>
												<div id="alimentacion_mensual" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">Q.- Queso fuertes</h6>
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="qf_sp_d" id="qf_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="qf_sp_s" id="qf_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="qf_sp_qu" id="qf_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="qf_sp_m" id="qf_sp_m">
														</div>
													</div>
												</div>
												<div id="alimentacion_mensual" class="form-row">
													<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
														<div class="form-group fill">
															<h6 class="form_fono">R.- Cortes de carne con grasa</h6> <p>(arrachera, Lomo Vetado cortes tipo americano como: rib eye, t bone, etc)</p>
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Diario</label>
															<input type="text" class="form-control form-control-sm" name="cgr_sp_d" id="cgr_sp_d">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Semanal</label>
															<input type="text" class="form-control form-control-sm" name="cgr_sp_s" id="cgr_sp_s">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
															<input type="text" class="form-control form-control-sm" name="cgr_sp_qu" id="cgr_sp_qu">
														</div>
													</div>
													<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Mes</label>
															<input type="text" class="form-control form-control-sm" name="cgr_sp_m" id="cgr_sp_m">
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-12 mt-2">
														<div class="form-group">
															<label id="" name="" class="floating-label-activo-sm">Consumo productos de Origen animal</label>
															<textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_con_anim" id="obs_con_anim"></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
					        </div>
							<!--CREALES-->
					        <div class="tab-pane fade show" id="cinco_nutri_"   role="tabpanel" aria-labelledby="cinco_nutri_tab">
								<form>
									<div class="form-row">
										<div class="col-12">
											<h6 class="tit-gen">Cereales</h6>
										</div>
									</div>
									<div class="form-row">
										<div class="col-12">
											<div class="card-informacion">
												<div class="card-body">
													<div class="row">
														<div class="col-md-12">
														    <ul class="nav nav-tabs-aten nav-fill mb-3" id="tablas_tede" role="tablist">
														        <li class="nav-item">
														            <a class="nav-link-aten text-reset active"id="c_cereales_uno_tab" data-toggle="pill" href="#c_cereales_uno_" role="tab" aria-controls="pills-home" aria-selected="true">Cereales sin grasa</a>
														        </li>
														        <li class="nav-item">
														            <a class="nav-link-aten text-reset" id="sc_ereales_dos_tab" data-toggle="pill" href="#c_cereales_dos_" role="tab" aria-controls="pills-home" aria-selected="true">Cereales con grasa</a>
														        </li>
															</ul>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
														    <div class="tab-content" id="pills-tablas_tede">
																<!--CEREALES SIN GRASA-->
														        <div class="tab-pane fade show active" id="c_cereales_uno_" role="tabpanel" aria-labelledby="c_cereales_uno_tab">
														        	<div id="tit_o_anim" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Arroz al vapor</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_arv_d" id="cer_arv_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_arv_s" id="cer_arv_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_arv_qu" id="cer_arv_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_arv_m" id="cer_arv_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono"> Cereal industrializado</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_in_d" id="cer_in_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_in_s" id="cer_in_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_in_qu" id="cer_in_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_in_m" id="cer_in_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Choclo</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_ch_d" id="cer_ch_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_ch_s" id="cer_ch_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_ch_qu" id="cer_ch_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_ch_m" id="cer_ch_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Papa</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pp_d" id="cer_pp_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pp_s" id="cer_pp_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pp_qu" id="cer_pp_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pp_m" id="cer_pp_m">
																			</div>
																		</div>
																	</div>
																	<div id="tit_o_anim" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Galletas dulces o saladas</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_gd_d" id="cer_gd_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_gd_s" id="cer_gd_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_gd_qu" id="cer_gd_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_gd_m" id="cer_gd_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Palomitas naturales</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pln_d" id="cer_pln_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pln_s" id="cer_pln_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pln_qu" id="cer_pln_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pln_m" id="cer_pln_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Pan de centeno</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pc_d" id="cer_pc_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pc_s" id="cer_pc_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pc_qu" id="cer_pc_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pc_m" id="cer_pc_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Pan de molde: Pan integral</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pm_d" id="cer_pm_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pm_s" id="cer_pm_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pm_qu" id="cer_pm_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pm_m" id="cer_pm_m">
																			</div>
																		</div>
																	</div>
																	<div id="tit_o_anim" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono"> Pan de molde: Pan Blanco</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pmb_d" id="cer_pmb_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pmb_s" id="cer_pmb_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pmb_qu" id="cer_pmb_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pmb_m" id="cer_pmb_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Tortilla de maíz</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_tm_d" id="cer_tm_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_tm_s" id="cer_tm_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_tm_qu" id="cer_tm_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_tm_m" id="cer_tm_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Tortilla de harina</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_th_d" id="cer_th_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_th_s" id="cer_th_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_th_qu" id="cer_th_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_th_m" id="cer_th_m">
																			</div>
																		</div>
																	</div>
														        </div>
														        <!--CEREALES CON GRASA-->
														        <div class="tab-pane fade show" id="c_cereales_dos_" role="tabpanel" aria-labelledby="c_cereales_dos_tab">
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Arroz a la mexicana</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_am_d" id="cer_am_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_am_s" id="cer_am_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_am_qu" id="cer_am_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_am_m" id="cer_am_m">
																			</div>
																		</div>
																	</div>
																	<div id="tit_o_anim" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Pasta preparada <p> (con crema, mantequilla, margarina, aceite)</p></h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_ppp_d" id="cer_ppp_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_ppp_s" id="cer_ppp_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_ppp_qu" id="cer_ppp_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_ppp_m" id="cer_ppp_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Pan dulce</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pdd_d" id="cer_pdd_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pdd_s" id="cer_pdd_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pdd_qu" id="cer_pdd_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pdd_m" id="cer_pdd_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Con Embutidos de cerdo</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pce_d" id="cer_pce_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pce_s" id="cer_pce_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pce_qu" id="cer_pce_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_pce_m" id="cer_pce_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Hot cakes o waffles</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_hcw_d" id="cer_hcw_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_hcw_s" id="cer_hcw_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_hcw_qu" id="cer_hcw_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_hcw_m" id="cer_hcw_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Frituras</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_fri_d" id="cer_fri_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_fri_s" id="cer_fri_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_fri_qu" id="cer_fri_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_fri_m" id="cer_fri_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Empanadas, berlines, etc.</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="cer_ebe_d" id="cer_ebe_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_ebe_s" id="cer_ebe_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="cer_ebe_qu" id="cer_ebe_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="cer_ebe_m" id="cer_ebe_m">
																			</div>
																		</div>
																	</div>
														        </div>
                                                                 <div class="form-row">
                                                                    <div class="col-sm-12 mt-2">
                                                                        <div class="form-group">
                                                                            <label id="" name="" class="floating-label-activo-sm">Observaciones Consumo de Cereales</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="obs_c_cer" id="obs_c_cer"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
														    </div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
					        </div>
							<!--VERDURAS-->
					        <div class="tab-pane fade show" id="seis_nutri_" role="tabpanel" aria-labelledby="seis_nutri_tab">
								<form>
									<div class="form-row">
										<div class="col-12">
											<h6 class="tit-gen">Verduras</h6>
										</div>
									</div>
									<div class="form-row">
										<div class="col-12">
											<div class="card-informacion">
												<div class="card-body">
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Verduras: </h6><p>(crudas / ensaladas / cocidas / precocidos)</p>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="ver_vce_d" id="ver_vce_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="ver_vce_s" id="ver_vce_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="ver_vce_qu" id="ver_vce_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="ver_vce_m" id="ver_vce_m">
															</div>
														</div>
													</div>
													<div id="tit_o_anim" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Verduras enlatadas</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="ver_vel_d" id="ver_vel_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="ver_vel_s" id="ver_vel_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="ver_vel_qu" id="ver_vel_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="ver_vel_m" id="ver_vel_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Jugo de verduras</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="ver_jug_d" id="ver_jug_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="ver_jug_s" id="ver_jug_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="ver_jug_qu" id="ver_jug_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="ver_jug_m" id="ver_jug_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Sopa de verduras</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="ver_sv_d" id="ver_sv_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="ver_sv_s" id="ver_sv_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="ver_sv_qu" id="ver_sv_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="ver_sv_m" id="ver_sv_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Sopa de crema de Verdura</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="ver_scv_d" id="ver_scv_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="ver_scv_s" id="ver_scv_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="ver_scv_qu" id="ver_scv_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="ver_scv_m" id="ver_scv_m">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
					        </div>
					        <!--FRUTAS-->
							<div class="tab-pane fade show" id="siete_nutri_" role="tabpanel" aria-labelledby="siete_nutri_tab">
								<form>
									<div class="form-row">
										<div class="col-12">
											<h6 class="tit-gen">Frutas</h6>
										</div>
									</div>
									<div id="alimentacion_mensual" class="form-row">
										<div class="col-12">
											<div class="card-informacion">
												<div class="card-body">
													<div class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Frutas crudas</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="fr_frc_d" id="fr_frc_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="fr_frc_s" id="fr_frc_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="fr_frc_qu" id="fr_frc_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="fr_frc_m" id="fr_frc_m">
															</div>
														</div>
													</div>
													<div id="tit_o_anim" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Frutas congeladas / enlatadas</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="fr_frce_d" id="fr_frce_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="fr_frce_s" id="fr_frce_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="fr_frce_qu" id="fr_frce_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="fr_frce_m" id="fr_frce_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Jugo de frutas natural</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="fr_frna_d" id="fr_frna_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="fr_frna_s" id="fr_frna_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="fr_frna_qu" id="fr_frna_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="fr_frna_m" id="fr_frna_m">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
					        </div>
							<!--LEGUMINOSAS-->
					        <div class="tab-pane fade show" id="ocho_nutri_" role="tabpanel" aria-labelledby="ocho_nutri_tab">
								<form>
									<div class="form-row">
										<div class="col-12">
											<h6 class="tit-gen">Leguminosas</h6>
										</div>
									</div>
									<div id="alimentacion_mensual" class="form-row">
										<div class="col-12">
											<div class="card-informacion">
												<div class="card-body">
													<div class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Frijol, alubia, habas, lentejas, soya, garbanzo</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="leg_frna_d" id="leg_frna_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="leg_frna_s" id="leg_frna_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="leg_frna_qu" id="leg_frna_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="leg_frna_m" id="leg_frna_m">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
					        </div>
							<!--LIPIDOS-->
					        <div class="tab-pane fade show" id="nueve_nutri_" role="tabpanel" aria-labelledby="nueve_nutri_tab">
								<form>
									<div class="form-row">
										<div class="col-12">
											<h6 class="tit-gen">Lípidos</h6>
										</div>
									</div>
									<div class="form-row">
										<div class="col-12">
											<div class="card-informacion">
												<div class="card-body">
													<div class="row">
														<div class="col-md-12">
														    <ul class="nav nav-tabs-aten nav-fill mb-3" id="tablas_tede" role="tablist">
														        <li class="nav-item">
														            <a class="nav-link-aten text-reset active"id="ac_sat_uno_tab" data-toggle="pill" href="#ac_sat_uno_" role="tab" aria-controls="pills-home" aria-selected="true">Ácidos grasos saturados</a>
														        </li>
														        <li class="nav-item">
														            <a class="nav-link-aten text-reset" id="ac_poli_dos_tab" data-toggle="pill" href="#ac_poli_dos_" role="tab" aria-controls="pills-home" aria-selected="true"> Ácidos grasos poliinsaturados </a>
														        </li>
														        <li class="nav-item">
														            <a class="nav-link-aten text-reset" id="ac_mono_tres_tab" data-toggle="pill" href="#ac_mono_tres_" role="tab" aria-controls="pills-home" aria-selected="true"> Ácidos grasos monoinsaturados</a>
														        </li>
														        <li class="nav-item">
														            <a class="nav-link-aten text-reset" id="ac_trans_cuatro_tab" data-toggle="pill" href="#ac_trans_cuatro_" role="tab" aria-controls="pills-home" aria-selected="true"> Ácidos grasos trans</a>
														        </li>

															</ul>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
														    <div class="tab-content" id="pills-tablas_tede">
																<!--ÁCIDOS GRASOS SATURADOS-->
														        <div class="tab-pane fade show active" id="ac_sat_uno_" role="tabpanel" aria-labelledby="ac_sat_uno_tab">
														        	<div id="tit_o_anim" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Mantequilla</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_mant_d" id="lip_mant_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_mant_s" id="lip_mant_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_mant_qu" id="lip_mant_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_mant_m" id="lip_mant_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono"> Manteca</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_mat_d" id="lip_mat_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_mat_s" id="lip_mat_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_mat_qu" id="lip_mat_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_mat_m" id="lip_mat_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Chicharrón</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_chi_d" id="lip_chi_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_chi_s" id="lip_chi_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_chi_qu" id="lip_chi_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_chi_m" id="lip_chi_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Sustituto de crema</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_sc_d" id="lip_sc_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_sc_s" id="lip_sc_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_sc_qu" id="lip_sc_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_sc_m" id="lip_sc_m">
																			</div>
																		</div>
																	</div>
																	<div id="tit_o_anim" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Chorizo</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_cho_d" id="lip_cho_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_cho_s" id="lip_cho_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_cho_qu" id="lip_cho_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_cho_m" id="lip_cho_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Tocino</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_tc_d" id="lip_tc_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_tc_s" id="lip_tc_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_tc_qu" id="lip_tc_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_tc_m" id="lip_tc_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Crema</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_crem_d" id="lip_crem_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_crem_s" id="lip_crem_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_crem_qu" id="lip_crem_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_crem_m" id="lip_crem_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Mayonesa</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_may_d" id="lip_may_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_may_s" id="lip_may_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_may_qu" id="lip_may_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_may_m" id="lip_may_m">
																			</div>
																		</div>
																	</div>
																	<div id="tit_o_anim" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Aderezo cremoso para ensaladas</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_ade_d" id="lip_ade_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_ade_s" id="lip_ade_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_ade_qu" id="lip_ade_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_ade_m" id="lip_ade_m">
																			</div>
																		</div>
																	</div>
														        </div>
														        <!--ÁCIDOS GRASOS POLIINSATURADOS -->
														         <div class="tab-pane fade show" id="ac_poli_dos_" role="tabpanel" aria-labelledby="ac_poli_dos_tab">
													         		<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Aceites de maíz</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_ama_d" id="lip_ama_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_ama_s" id="lip_ama_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_ama_qu" id="lip_ama_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_ama_m" id="lip_ama_m">
																			</div>
																		</div>
																	</div>
																	<div id="tit_o_anim" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Aceites de Girasol</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_agi_d" id="lip_agi_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_agi_s" id="lip_agi_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_agi_qu" id="lip_agi_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_agi_m" id="lip_agi_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Vinagreta</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_vin_d" id="lip_vin_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_vin_s" id="lip_vin_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_vin_qu" id="lip_vin_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_vin_m" id="lip_vin_m">
																			</div>
																		</div>
																	</div>
														        </div>
														        <!--ÁCIDOS GRASOS MONOINSATURADOS -->
														         <div class="tab-pane fade show" id="ac_mono_tres_" role="tabpanel" aria-labelledby="ac_mono_tres_tab">
														         	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Oleaginósas</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_oleo_d" id="lip_oleo_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_oleo_s" id="lip_oleo_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_oleo_qu" id="lip_oleo_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_oleo_m" id="lip_oleo_m">
																			</div>
																		</div>
																	</div>
																	<div id="tit_o_anim" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Aceites de Oliva</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_aoli_d" id="lip_aoli_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_aoli_s" id="lip_aoli_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_aoli_qu" id="lip_aoli_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_aoli_m" id="lip_aoli_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Aceite de Canola</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_ac_d" id="lip_ac_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_ac_s" id="lip_ac_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_ac_qu" id="lip_ac_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_ac_m" id="lip_ac_m">
																			</div>
																		</div>
																	</div>
																	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Palta</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_pal_d" id="lip_pal_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_pal_s" id="lip_pal_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_pal_qu" id="lip_pal_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_pal_m" id="lip_pal_m">
																			</div>
																		</div>
																	</div>
														         </div>
														         <!--ÁCIDOS GRASOS TRANS -->
														         <div class="tab-pane fade show" id="ac_trans_cuatro_" role="tabpanel" aria-labelledby="ac_trans_cuatro_tab">
														         	<div id="alimentacion_mensual" class="form-row">
																		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
																			<div class="form-group fill">
																				<h6 class="form_fono">Margarina</h6>
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Diario</label>
																				<input type="text" class="form-control form-control-sm" name="lip_marg_d" id="lip_marg_d">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_marg_s" id="lip_marg_s">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																				<input type="text" class="form-control form-control-sm" name="lip_marg_qu" id="lip_marg_qu">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
																			<div class="form-group fill">
																				<label id="" name="" class="floating-label-activo-sm">Mes</label>
																				<input type="text" class="form-control form-control-sm" name="lip_marg_m" id="lip_marg_m">
																			</div>
																		</div>
																	</div>
														        </div>

                                                                <div class="form-row">
                                                                    <div class="col-sm-12 mt-2">
                                                                        <div class="form-group fill">
                                                                                <label id="" name="" class="floating-label-activo-sm">Observaciuones al consumo Lípidos</label>
                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="obs_con_lip" id="obs_con_lip"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
														    </div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
					        </div>
							<!--AZUCARES-->
					        <div class="tab-pane fade show"  id="diez_nutri" role="tabpanel" aria-labelledby="diez_nutri_tab">
								<form>
									<div class="form-row">
										<div class="col-12">
											<h6 class="tit-gen">Azúcares</h6>
										</div>
									</div>
									<div class="form-row">
										<div class="col-12">
											<div class="card-informacion">
												<div class="card-body">
													<div id="tit_o_anim" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono"> Agua Con  Sabor</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="az_as_d" id="az_as_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="az_as_s" id="az_as_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="az_as_qu" id="az_as_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="az_as_m" id="az_as_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono"> Jugos en Polvo</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="az_jp_d" id="az_jp_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="az_jp_s" id="az_jp_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="az_jp_qu" id="az_jp_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="az_jp_m" id="az_jp_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Azúcar</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="az_az_d" id="az_az_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="az_az_s" id="az_az_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="az_az_qu" id="az_az_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="az_az_m" id="az_az_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Dulce de Leche</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="az_dl_d" id="az_dl_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="az_dl_s" id="az_dl_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="az_dl_qu" id="az_dl_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="az_dl_m" id="az_dl_m">
															</div>
														</div>
													</div>
													<div id="tit_o_anim" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Mermelada</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="az_mer_d" id="az_mer_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="az_mer_s" id="az_mer_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="az_mer_qu" id="az_mer_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="az_mer_m" id="az_mer_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Miel</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="az_mi_d" id="az_mi_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="az_mi_s" id="az_mi_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="az_mi_qu" id="az_mi_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="az_mi_m" id="az_mi_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Caramelo</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="az_car_d" id="az_car_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="az_car_s" id="az_car_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="az_car_qu" id="az_car_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="az_car_m" id="az_car_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Chicle</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="az_chic_d" id="az_chic_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="az_chic_s" id="az_chic_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="az_chic_qu" id="az_chic_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="az_chic_m" id="az_chic_m">
															</div>
														</div>
													</div>
													<div id="tit_o_anim" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Chocolate en polvo</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="az_chocp_d" id="az_chocp_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="az_chocp_s" id="az_chocp_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="az_chocp_qu" id="az_chocp_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="az_chocp_m" id="az_chocp_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Gelatina</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="az_gel_d" id="az_gel_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="az_gel_s" id="az_gel_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="az_gel_qu" id="az_gel_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="az_gel_m" id="az_gel_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Helados de crema</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="az_hel_d" id="az_hel_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="az_hel_s" id="az_hel_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="az_hel_qu" id="az_hel_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="az_hel_m" id="az_hel_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Jugos industrializados</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="az_ji_d" id="az_ji_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="az_ji_s" id="az_ji_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="az_ji_qu" id="az_ji_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="az_ji_m" id="az_ji_m">
															</div>
														</div>
													</div>
													<div id="tit_o_anim" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Refrescos</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="az_rf_d" id="az_rf_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="az_rf_s" id="az_rf_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="az_rf_qu" id="az_rf_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="az_rf_m" id="az_rf_m">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<h6 class="form_fono">Salsa cátsup</h6>
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="az_ctch_d" id="az_ctch_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="az_ctch_s" id="az_ctch_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="az_ctch_qu" id="az_ctch_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="az_ctch_m" id="az_ctch_m">
															</div>
														</div>
													</div>
													<div class="col-sm-12 mt-2">
														<div class="form-group fill">
															<label id="" name="" class="floating-label-activo-sm">Observaciones al consumo de azúcares</label>
															<textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_con_az" id="obs_con_az"></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
					        </div>
							<!--SUSTITUTO-->
					        <div class="tab-pane fade show" id="once_nutri_" role="tabpanel" aria-labelledby="once_nutri_tab">
								<form>
									<div class="form-row">
										<div class="col-12">
											<h6 class="tit-gen">Sustituto</h6>
										</div>
									</div>
									<div class="form-row">
										<div class="col-12">
											<div class="card-informacion">
												<div class="card-body">
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Nombre</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_uno_nom" id="nut_sust_uno_nom">
															</div>
														</div>
														<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_uno_d" id="nut_sust_uno_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_uno_s" id="nut_sust_uno_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_uno_qu" id="nut_sust_uno_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_uno_m" id="nut_sust_uno_m">
															</div>
														</div>
														<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Observacion</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_uno_obs" id="nut_sust_uno_obs">
															</div>
														</div>
													</div>
													<div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Nombre</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_dos_nom" id="nut_sust_dos_nom">
															</div>
														</div>
														<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_dos_d" id="nut_sust_dos_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_dos_s" id="nut_sust_dos_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_dos_qu" id="nut_sust_dos_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_dos_m" id="nut_sust_dos_m">
															</div>
														</div>
														<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Observacion</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_dos_obs" id="nut_sust_dos_obs">
															</div>
														</div>
													</div>
                                                    <div id="alimentacion_mensual" class="form-row">
														<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Nombre</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_uno_nom" id="nut_sust_uno_nom">
															</div>
														</div>
														<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Diario</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_tres_d" id="nut_sust_tres_d">
															</div>
														</div>
														<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Semanal</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_tres_s" id="nut_sust_tres_s">
															</div>
														</div>
														<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Quincenal</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_tres_qu" id="nut_sust_tres_qu">
															</div>
														</div>
														<div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Mes</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_tres_m" id="nut_sust_tres_m">
															</div>
														</div>
														<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-2">
															<div class="form-group fill">
																<label id="" name="" class="floating-label-activo-sm">Observacion</label>
																<input type="text" class="form-control form-control-sm" name="nut_sust_tres_obs" id="nut_sust_tres_obs">
															</div>
														</div>
													</div>
											    </div>
										    </div>
									    </div>
                                    </div>
								</form>
					        </div>
					    </div>
					</div>
				</div>
			</div>
			 <div class="modal-footer">
		        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
		        <button type="button" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar</button>
	      </div>
		</div>
	</div>
</div>
