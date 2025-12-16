<div id="m_aconsentcirm" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="m_aconsentcirm"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Consentimiento Informado Cirugía Dental Mayor</h5>
                <h6 class="close text-white" style="font-size:15px;text-align:right">
                    <script>
                        var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                            "Octubre", "Noviembre", "Diciembre");

                        var f = new Date();
                        document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                    </script>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_cirugia_mayor">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body border-top info_basica collapse show" id="info_pcte">
                                <form>
                                    <div class="form-row">
                                        <label class="col-sm-4 col-form-label">Nombre Paciente</label>
                                        <div class="col-sm-4 my-auto ml-1 font-weight-bolder">
                                            <span id="nom_pcte">Juan Perez</span>
                                        </div>
                                        <label class="col-sm-4 col-form-label">Rut</label>
                                        <div class="col-sm-4 my-auto ml-1 font-weight-bolder">
                                            <span id="rut_pcte">7.774.655-4</span>
                                        </div>
                                        <label class="col-sm-4 col-form-label">Edad</label>
                                        <div class="col-sm-4 my-auto ml-1 font-weight-bolder">
                                            <span id="edad_pcte">40 años</span>
                                        </div>
                                        <label class="col-sm-4 col-form-label">Dirección</label>
                                        <div class="col-sm-6 my-auto ml-1 font-weight-bolder">
                                            <span id="edad_pcte">Las Azucenas 2520 dpto 20 Concón</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <h6>En representación de:</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Nombre del Responsable</label>
                            <input type="person" class="form-control form-control-sm" type="nombre_resp"
                                name="nombre_resp">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Paciente Incapacitado por:</label>
                            <input type="text" class="form-control form-control-sm" type="incapacitacion"
                                name="incapacitacion">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 col-md-6">
                            <label class="col-sm-6 col-form-label">
                                <h6>He consultado con el profesional:</h6>
                            </label>
                        </div>
                        <div class=" col-sm-6 col-md-6">
                            <label class="col-sm-6 col-form-label" id="cod_prof"><strong>Cristian peñafiel Perez Rut
                                    55445522-2<strong></label>
                            <!--auto-->
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="alert alert-secondary" role="alert">
                            <strong>Odontólogo</strong> Quién me ha explicado e informado, sobre los objetivos y
                            potenciales riesgos para mi salud, que este conlleva.
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Nombre y tipo de anestesia</label>
                            <input type="person" class="form-control form-control-sm" type="nombre_profesional"
                                name="nombre_profesional">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <button type="button" class="btn btn-sm btn-block btn-success">Solicitar código de
                                verificación</button><br>
                            <input type="person" class="form-control form-control-sm" type="cod_verificación_an"
                                name="cod_verificación_an">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="alert alert-success" role="alert">
                            Al entregar mi código de verificación, doy mi consentimiento para lo enunciado
                            precedentemente
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Ver documento en PDF</button>
                <button type="button" onclick="reset_form('form_cirugia_mayor')" class="btn btn-danger"
                    data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Enviar y Adjuntar Dodumento</button>
            </div>
        </div>
    </div>
</div>
