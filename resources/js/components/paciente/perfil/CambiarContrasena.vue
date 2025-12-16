<template>
    <div class="tab-pane fade" id="pass" role="tabpanel" aria-labelledby="pass-tab">
        <div class="row">
            <div class="col-md-12">
                <!--Card Datos Rompe Clave-->
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between bg-info">
                        <h5 class="mb-0 text-white">Romper clave</h5>
                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right"
                            data-toggle="collapse" data-target=".rompeclave" aria-expanded="false"
                            aria-controls="rompeclave_1 rompeclave_2">
                            <i class="feather icon-edit"></i>
                        </button>
                    </div>
                    <!--Datos Rompe Clave-->
                    <div class="card-body border-top rompeclave collapse show" id="rompeclave_1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Autoriza romper clave?</label>
                                    <div class="col-sm-7 my-auto ml-2"> Si</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Autoriza acceso a datos confidenciales?</label>
                                    <div class="col-sm-7 my-auto ml-2"> Si </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Datos Rompe Clave-->
                    <!--(Editar)Datos Rompe Clave-->
                    <div class="card-body border-top rompeclave collapse" id="rompeclave_2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Autoriza romper clave?</label>
                                    <div class="col-sm-7 my-auto">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineRadio1" value="option1">
                                            <label class="form-check-label" for="rompeclave_si">Si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="rompeclave_no">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Autoriza acceso a datos confidenciales?</label>
                                    <!--hoy-->
                                    <div class="col-sm-7 my-auto">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineRadio1" value="option1">
                                            <label class="form-check-label" for="datos_confidenciales_si">Si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="datos_confidenciales_no">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    <p class="text-justify">
                                        Este botón autoriza a Salud Digital
                                        Integrada a entregar un rompe clave para que un
                                        <strong>PROFESIONAL DE UN SERVICIO DE URGENCIAS</strong> acceda
                                        a su Ficha Médica Única en el caso de que usted esé inconsciente
                                        o no este en condiciones de permitirlo personalmente. Tenga en
                                        cuenta que el acceder a sus datos médicos puede contribuir a
                                        salvar su vida o recuperar valiosos minutos que ayudarán en lo
                                        posible a disminuir las secuelas de una
                                        <strong>URGENCIA</strong>.
                                    </p>
                                    <p class="text-center">
                                        En el caso de que esta acción sea requerida una vez pasada la urgencia
                                        <br>
                                        <strong>SALUD DIGITAL INTEGRADA RECOMIENDA CAMBIAR SUS CLAVES DE ACCESO</strong>.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"></label>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger mr-2">Cancelar</button>
                                <button type="submit" class="btn btn-info">Guardar Cambios</button>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: (Editar) Rompe Clave-->
                </div>
                <!--Cierre: Card Rompe Clave-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!--Card Contraseña Personal-->
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between bg-info">
                        <h5 class="mb-0 text-white">Cambie su Contraseña Personal</h5>
                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right"
                            data-toggle="collapse" data-target=".pass_personal" aria-expanded="false"
                            aria-controls="pass_personal_1 pass_personal_2">
                            <i class="feather icon-edit"></i>
                        </button>
                    </div>
                    <!--Contraseña Personal-->
                    <div class="card-body border-top pass_personal collapse show" id="pass_personal_1">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label font-weight-bolder">Contraseña Actual</label>
                            <div class="col-sm-6 pt-2 ml-2"> •••••••• </div>
                        </div> 
                    </div>
                    <!--Cierre: Contraseña Personal-->
                    <!--(Editar)Contraseña Personal-->
                    <div class="card-body border-top pass_personal collapse" id="pass_personal_2">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label font-weight-bolder">Contraseña Actual</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Contraseña Actual">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label font-weight-bolder">Nueva Contraseña</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Nueva Contraseña">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label font-weight-bolder">Repita su Contraseña</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Repita la Contraseña">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"></label>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger mr-2">Cancelar</button>
                                <button type="submit" class="btn btn-info">Guardar Cambios</button>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: (Editar)Contraseña Personal-->
                </div>
                <!--Cierre: Card Contraseña Personal-->
            </div>
            <div class="col-md-6">
                <!--Card Contraseña Confidencial-->
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between bg-danger">
                        <h5 class="mb-0 text-white">Cambie su Contraseña Confidencial</h5>
                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right"
                            data-toggle="collapse" data-target=".pass_confidencial"
                            aria-expanded="false"
                            aria-controls="pass_confidencial_1 pass_confidencial_2">
                            <i class="feather icon-edit"></i>
                        </button>
                    </div>
                    <!--Contraseña Confidencial-->
                    <div class="card-body border-top pass_confidencial collapse show" id="pass_confidencial_1">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label font-weight-bolder">Contraseña Actual</label>
                            <div class="col-sm-6 pt-2 ml-2"> •••••••• </div>
                        </div>
                    </div>
                    <!--Cierre: Contraseña Confidencial-->
                    <!--(Editar)Contraseña Confidencial-->
                    <div class="card-body border-top pass_confidencial collapse" id="pass_confidencial_2">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label font-weight-bolder">Contraseña Actual</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Contraseña Actual">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label font-weight-bolder">Nueva Contraseña</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Nueva Contraseña">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label font-weight-bolder">Repita su Contraseña</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Repita la Contraseña">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"></label>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger mr-2">Cancelar</button>
                                <button type="submit" class="btn btn-info">Guardar Cambios</button>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: (Editar)Contraseña Confidencial-->
                </div>
                <!--Cierre: Card Contraseña Confidencial-->
            </div>
        </div>
    </div>
</template>
<script>
    export default {

    }
</script>
