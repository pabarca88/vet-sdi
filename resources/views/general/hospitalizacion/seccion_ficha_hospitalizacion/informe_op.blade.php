<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
    <div class='card-a'>
        <div class="col-md-12 py-0 px-2">
            <div class="row mx-0">
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <p>
                                <script>
                                    var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                        "Octubre", "Noviembre", "Diciembre");
                                    var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                    var f = new Date();

                                    document.write("<b>" + diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                        .getFullYear() + "</b>");
                                </script>
                            </p>
                        </div>
                        <div class="form-group col-md-8">
                            <h5 class="text-c-blue mt-2 d-inline">INFORME TRATAMIENTO OP.......</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--Evoluciones-->
                <div class="col-sm-12">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="floating-label">Diagnóstico Clínico</label>
                            <input type="text" class="form-control form-control-sm" name="info_hosp_op_dg_clinico" id="info_hosp_op_dg_clinico">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Diagnóstico Especialidad</label>
                            <input type="text" class="form-control form-control-sm" name="info_hosp_op_dg_especialidad" id="info_hosp_op_dg_especialidad">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Sesiones</label>
                            <input type="text" class="form-control form-control-sm" name="info_hosp_op_ses_real" id="info_hosp_op_ses_real">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">sesiones Pendientes</label>
                            <input type="text" class="form-control form-control-sm" name="info_hosp_op_ses_pend" id="info_hosp_op_ses_pend">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="floating-label">Tratamiento Realizado</label>
                            <input type="text" class="form-control form-control-sm" name="info_hosp_op_tto_realizado" id="info_hosp_op_tto_realizado">
                        </div>
                        <div class="form-group col-md-12">
                            <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="info_hosp_op_comentario" id="info_hosp_op_comentario"></textarea>
                        </div>
                        <div class="form-group col-md-8">
                            <label class="floating-label">Nombre Profesional</label>
                            <input type="text" class="form-control form-control-sm" name="info_hosp_op_nomb_prof" id="info_hosp_op_nomb_prof">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Proximo Control</label>
                            <input type="text" class="form-control form-control-sm" name="info_hosp_op_prox_cont" id="info_hosp_op_prox_cont">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-row">
                        <div class="form-group col-md-12 center-block">
                            <input type="submit" class="btn btn-info mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Informe">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

