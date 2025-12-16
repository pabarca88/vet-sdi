<div id="otras_vac_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="otras_vac_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Otras vacunas </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <h6 class="mb-3">I.- Datos del lugar vacunación ( Hospital, Clínica o Consultorio)</h6>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="floating-label">Establecimiento</label>
                            <input type="text" class="form-control form-control-sm" name="clinica_hospital" id="clinica_hospital">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label">Servicio</label>
                            <input type="text" class="form-control form-control-sm" name="servicio" id="servicio">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label">Rut paciente</label>
                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label">Edad paciente</label>
                            <input type="number" class="form-control form-control-sm" name="edad" id="edad">
                        </div><!--Bloquear la vacuna si no corresponde a la edad-->
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="floating-label">Rut responsable</label>
                            <input type="text" class="form-control form-control-sm" name="rut_resp" id="rut_resp">
                        </div>
                        <div class="form-group col-md-8">
                            <label class="floating-label">Observaciones </label>
                            <input type="text" class="form-control form-control-sm" name="rut_resp" id="rut_resp">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="floating-label">Vacuna</label>
                            <select class="form-control form-control-sm" id="categoria">
                                <option>Seleccione</option>
                                <optgroup label="Haemophilus Influenza ">
                                    <option value="AL">ACT-HIB</option>
                                    <option value="LA">INFANRIX HEXA (Combinada)</option>
                                </optgroup>
                                <optgroup label="Hepatitis A y B">
                                    <option value="AL">TWINRIX (Desde los 15 Años)</option>
                                </optgroup>
                                <optgroup label="Hepatitis A">
                                    <option value="LA">AVAXIM Adulto y Pediátrico (< 1 año) </option>
                                    <option value="AL">HAVRIX Adulto y Junior (< 1 año)</option>
                                    <option value="LA">VAQTA Adulto y Pediátrico (< 1 año)</option>
                                </optgroup>
                                <optgroup label="Hepatitis B">
                                    <option value="AL">ENGERIX B Adulto (Desde los 15 Años)</option>
                                </optgroup>
                                <optgroup label="Difteria Tétanos,Tos Convulsiva">
                                    <option value="AL">BOOSTRIX (< 4 años)</option>
                                </optgroup>
                                <optgroup label="Virus Papiloma Humano">
                                    <option value="AL">CERVARIX (< 9 años)</option>
                                    <option value="LA">GARDASIL (< 9 años)</option>
                                </optgroup>
                                <optgroup label="Influenza Tetravalente">
                                    <option value="AL">FLUQUADRI</option>
                                </optgroup>
                                <optgroup label="Difteria Tétanos,Tos Convulsiva,Haemophilus;hepatitis A y B ">
                                    <option value="AL">INFANRIX HEXA < 2 meses)</option>
                                </optgroup>
                                <optgroup label="Meningitis A, C, Y, W-135">
                                    <option value="AL">MENVEO < 2 años)</option>
                                    <option value="AL">MENACTRA < 2 años)</option>
                                    <option value="AL">NIMENRIX < 2 años)</option>
                                </optgroup>
                                <optgroup label="Poliomielitis">
                                    <option value="AL">POLIO INYECTABLE (Adultos)</option>
                                </optgroup>
                                <optgroup label="Neumonía">
                                    <option value="AL">NEUMONÍA	PREVENAR 13 ( >2 años)</option>
                                </optgroup>
                                <optgroup label="Rotavirus (Oral)">
                                    <option value="AL">ROTARIX (entre 2 y 6 meses)</option>
                                    <option value="AL">ROTATEQ (entre 2 y 6 meses)</option>
                                </optgroup>
                                <optgroup label="Fiebre Amarilla (10 días antes de viaje)">
                                    <option value="AL">STAMARIL (9 meses a 60 años)</option>
                                </optgroup>
                                <optgroup label="Fiebre Tifoidea">
                                    <option value="AL">TYPHIM VI ANTITÍFICA(desde los 2 años)</option>
                                </optgroup>
                                <optgroup label="Tétanos">
                                    <option value="AL">TETAVAX (Adultos)</option>
                                </optgroup>
                                <optgroup label="Varicela">
                                    <option value="AL">VARILRIX (< 1 años)</option>
                                    <option value="AL">VARIVAX  (< 1 años)</option>
                                </optgroup>
                                <optgroup label="Rabia">
                                    <option value="AL">VERORAB (solo receta médica)</option>
                                </optgroup>
                                <optgroup label="Herpes Zoster">
                                    <option value="AL">ZOSTAVAX (solo receta médica)</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label">Vacuna Covid</label>
                            <select class="form-control form-control-sm" id="categoria">
                                <option>Seleccione</option>
                                <optgroup label="Sinovac">
                                    <option value="AL">1° Dosis</option>
                                    <option value="AL">2° Dosis</option>
                                    <option value="AL">3° Dosis</option>
                                    <option value="AL">4° Dosis</option>
                                </optgroup>
                                <optgroup label="Astraseneca">
                                    <option value="AL">1° Dosis</option>
                                    <option value="AL">2° Dosis</option>
                                    <option value="AL">3° Dosis</option>
                                    <option value="AL">4° Dosis</option>
                                </optgroup>
                                <optgroup label="Pfizer">
                                    <option value="AL">1° Dosis</option>
                                    <option value="AL">2° Dosis</option>
                                    <option value="AL">3° Dosis</option>
                                    <option value="AL">4° Dosis</option>
                                </optgroup>
                                <optgroup label="Otra">
                                    <option value="AL">1° Dosis</option>
                                    <option value="AL">2° Dosis</option>
                                    <option value="AL">3° Dosis</option>
                                    <option value="AL">4° Dosis</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar vacuna</button>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Vacuna</th>
                                            <th class="text-center align-middle">Dosis</th>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>Sinovac</span></td>
                                            <td class="text-center align-middle">4° Dosis</td>
                                            <td class="text-center align-middle">20/02/2022</td>
                                            <td class="text-center align-middle">
                                                <button href="#!" class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--Ojo pdf con codigo QR mas autentificación sdi-->
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm">
                Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>