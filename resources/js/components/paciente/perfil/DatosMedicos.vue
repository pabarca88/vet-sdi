<template>
    <div class="tab-pane fade" id="datmedicos" role="tabpanel" aria-labelledby="datmedicos-tab">
        <div class="row">
            <div class="col-md-12">
                <!--Card Datos profesional-->
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between bg-c-blue">
                        <h5 class="mb-0 text-white">Datos del médico responsable del llenado y/o Actualización de datos</h5>
                    </div>
                    <!--Datos profesional-->
                    <div class="card-body border-top info_basica_sos collapse show" id="info_basica_sos_1">
                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Rut del Profesional</label>
                                    <div class="col-sm-7 my-auto ml-2">00000000-0</div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Nombres y Apellidos</label>
                                    <div class="col-sm-7 my-auto ml-2">Luis Armando Sepulveda Vera</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Fecha de Actualización</label>
                                    <div class="col-sm-7 my-auto ml-2"> 12/01/2021 </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Especialidad</label>
                                    <div class="col-sm-7 my-auto ml-2"> Medicina Interna </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Datos profesional-->
                </div>
                <!--Cierre: Card Datos profesional-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!--Card Datos Sangre Donación de Organos-->
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between bg-c-blue">
                        <h5 class="mb-0 text-white">Antecedentes I (Transfusiones y Donación de Órganos)</h5>
                    </div>
                    <!--Sangre Donación de Organo-->
                    <div class="card-body border-top info_residencial_sos collapse show" id="info_residencial_sos_1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Acepta Transfusión?</label>
                                    <div class="col-sm-7 col-form-label"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Donante de Sangre?</label>
                                    <div class="col-sm-7 col-form-label"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Grupo Sanguíneo</label>
                                    <div class="col-sm-7 col-form-label text-danger"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Comentarios de grupo sanguíneo</label>
                                    <div class="col-sm-7 col-form-label">Descripción</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Vacuna o Hepatitis</label>
                                    <div class="col-sm-7 col-form-label text-danger">Vacuna Hepatitis C</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Comentarios</label>
                                    <div class="col-sm-7 col-form-label">Descripción</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Donante Total de Órganos?</label>
                                    <div class="col-sm-7 col-form-label"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Donante Parcial de Órganos?</label>
                                    <div class="col-sm-7 col-form-label"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Órganos a donar</label>
                                    <div class="col-sm-7 col-form-label">No</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">Impedimento para donar</label>
                                    <div class="col-sm-7 col-form-label">Cancer Pancreático</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Sangre Donación de Organo-->
                </div>
                <!--Cierre: Datos Sangre Donación de Organos-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!--Card Datos medicos generales-->
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between bg-c-blue">
                        <h5 class="mb-0 text-white">Antecedentes II (Datos Médicos Generales)</h5>
                    </div>
                    <!--Datos medicos generales-->
                    <div class="card-body border-top info_contacto_sos collapse show" id="info_contacto_sos_1">     
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Alérgias e Intolerancias</label>
                            <div class="col-sm-7 my-auto ml-2">
                                <ul>
                                    <li>Penicilina</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Antecedentes Quirúrgicos</label>
                            <div class="col-sm-7 my-auto ml-2">
                                <ul>
                                    <li>Colecistectomía 1990</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Patologías Crónicas</label>
                            <div class="col-sm-7 my-auto ml-2">
                                <ul>
                                    <li>Diabetes</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Medicamentos de uso Crónico</label>
                            <div class="col-sm-7 my-auto ml-2">
                                <ul>
                                    <li>Aspirina</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Datos medicos generales-->
                </div>
                <!--Cierre: Datos medicos generales-->
            </div>
            <div class="col-md-6">
                <!--Card Datos Confidenciales-->
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between bg-c-blue">
                        <h5 class="mb-0 text-white">Antecedentes III (Datos Confidenciales)</h5>
                    </div>
                    <!--confidencial-->
                    <div class="card-body border-top info_confidencial_sos collapse show" id="info_confidencial_sos_1">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">¿Autoriza romper clave en caso de urgencia?</label>
                            <div class="col-sm-7 my-auto ml-2">Sí</div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Antecedentes Médicos</label>
                            <div class="col-sm-7 my-auto ml-2">
                                <ul>
                                    <li>Depresión</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Otros Antecedentes</label>
                            <div class="col-sm-7 my-auto ml-2">
                                <ul>
                                    <li>No</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Sangre Donación de Organo-->
                </div>
                <!--Cierre: Datos Sangre Donación de Organos-->
            </div>
        </div>
    </div>
</template>