<!-- SOLICITADO POR -->
<div class="col-md-12">
    <div class="card-a">
        <div class="card-header-a" id="solicitado_por">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#solicitado_por_c" aria-expanded="false" aria-controls="solicitado_por_c">
                Solicitado por:
            </button>
        </div>
        <div id="solicitado_por_c" class="collapse show" aria-labelledby="solicitado_por" data-parent="#solicitado_por">
            <div class="card-body-aten-a">
                <div class="form-row">
                    <div class="form-group col-md-2" >
                        <input type="hidden" name="id_profesional_solicitado_por_uro_flujo" id="id_profesional_solicitado_por_uro_flujo" value="">
                        <label class="floating-label-activo-sm">RUT</label>
                        <input type="text" class="form-control form-control-sm" name="solicitado_por_rut_uro_flujo" id="solicitado_por_rut_uro_flujo"
                            onblur="cargar_profesional(this,'solicitado_por_uro_flujo', 'id_profesional_solicitado_por_uro_flujo', 'div_profesional_no_inscrito_uro_flujo', 'solicitado_por_nombre_uro_flujo', 'solicitado_por_apellido_uro_flujo', 'solicitado_por_telefono_uro_flujo', 'solicitado_por_email_uro_flujo', 'div_mensaje_uro_flujo', 'mensaje_solicitado_por_uro_flujo');"
                            onchange="cargar_profesional(this,'solicitado_por_uro_flujo', 'id_profesional_solicitado_por_uro_flujo', 'div_profesional_no_inscrito_uro_flujo', 'solicitado_por_nombre_uro_flujo', 'solicitado_por_apellido_uro_flujo', 'solicitado_por_telefono_uro_flujo', 'solicitado_por_email_uro_flujo', 'div_mensaje_uro_flujo', 'mensaje_solicitado_por_uro_flujo');"
                            onkeyup="cargar_profesional(this,'solicitado_por_uro_flujo', 'id_profesional_solicitado_por_uro_flujo', 'div_profesional_no_inscrito_uro_flujo', 'solicitado_por_nombre_uro_flujo', 'solicitado_por_apellido_uro_flujo', 'solicitado_por_telefono_uro_flujo', 'solicitado_por_email_uro_flujo', 'div_mensaje_uro_flujo', 'mensaje_solicitado_por_uro_flujo');">
                    </div>
                    <div class="form-group col-md-2" >
                        <label class="floating-label-activo-sm">Solicitado por</label>
                        <input type="text" class="form-control form-control-sm" name="solicitado_por_uro_flujo" id="solicitado_por_uro_flujo" readonly="readonly">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label-activo-sm">H.Diagnóstica</label>
                        <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_hipotesis" name="sospecha_diagnostica_uro_flujo" id="sospecha_diagnostica_uro_flujo" onchange="cargarIgual('sospecha_diagnostica_uro_flujo')">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label-activo-sm">Premedicación</label>
                        <input type="text" class="form-control form-control-sm" name="premed_uro_flujo" id="premed_uro_flujo">
                    </div>
                    <div class="form-group col-md-12" id="div_mensaje_cisto"  style="display: none;">
                        <span style="font-size: 10px;color: #ff0808;" id="mensaje_solicitado_por_uro_flujo"></span>
                    </div>
                </div>
                <div class="row" id="div_profesional_no_inscrito_uro_flujo" style="display: none;">
                    <div class="form-group col-md-3">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <input type="text" class="form-control form-control-sm"  name="solicitado_por_nombre_uro_flujo" id="solicitado_por_nombre_uro_flujo" onchange="actualizar_solicitado_por('solicitado_por_uro_flujo', 'solicitado_por_nombre_uro_flujo', 'solicitado_por_apellido_uro_flujo');">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="floating-label-activo-sm">Apellido</label>
                        <input type="text" class="form-control form-control-sm"  name="solicitado_por_apellido_uro_flujo" id="solicitado_por_apellido_uro_flujo" onchange="actualizar_solicitado_puro_flujo', 'solicitado_por_nombre_uro_flujo', 'solicitado_por_apellido_uro_flujo');">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="floating-label-activo-sm">Telefono</label>
                        <input type="text" class="form-control form-control-sm"  name="solicitado_por_telefono_uro_flujo" id="solicitado_por_telefono_uro_flujo" >
                    </div>
                    <div class="form-group col-md-3">
                        <label class="floating-label-activo-sm">Email</label>
                        <input type="text" class="form-control form-control-sm"  name="solicitado_por_email_uro_flujo" id="solicitado_por_email_uro_flujo" >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--INFORME URO_FLUJOMETRIA-->
<div class="col-sm-12 col-md-12">
    <div class="card-a">
        <div class="card-header-a" id="info-uro_flujo">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#info-uro_flujo-c" aria-expanded="false" aria-controls="info-uro_flujo-c">
            Informe
            </button>
        </div>
        <div id="info-uro_flujo-c" class="collapse show" aria-labelledby="info-uro_flujo" data-parent="#info-uro_flujo">
            <div class="card-body-aten-a">

                <div class="form-row">
                    <div class="col-md-3">
                        <label class="col-form-label font-weight-bolder">Volumen de Vaciado</label>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="floating-label">Descripción</label>
                        <input type="text" class="form-control form-control-sm" name="vol_vac_uro_flujo" id="vol_vac_uro_flujo">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <label class="col-form-label font-weight-bolder"> Qmax -Flujo</label>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="floating-label">Descripción</label>
                        <input type="text" class="form-control form-control-sm" name="q_flujo_uro_flujo" id="q_flujo_uro_flujo">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <label class="col-form-label font-weight-bolder">Morfología de la Curva</label>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="floating-label">Descripción</label>
                        <input type="text" class="form-control form-control-sm" name="m_curva_uro_flujo" id="m_curva_uro_flujo">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <label class="col-form-label font-weight-bolder">Residuo Post-Miccional</label>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="floating-label">Descripción</label>
                        <input type="text" class="form-control form-control-sm" name="residuo_uro_flujo" id="residuo_uro_flujo">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <label class="col-form-label font-weight-bolder">Comentarios</label>
                    </div>
                    <div class="form-group col-md-9">
                        <label class="floating-label">Descripción</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="comentrarios_uro_flujo" id="comentrarios_uro_flujo"></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--IMAGENES-->
<div class="col-sm-12 col-md-12">
    <div class="card-a">
        <div class="card-header-a" id="img">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#imagenes_uro_flujo" aria-expanded="false" aria-controls="imagenes_uro_flujo">
                Imagenes.
            </button>
        </div>
        <div id="img_uro_flujo-c" class="collapse show" aria-labelledby="img_uro_flujo" data-parent="#img_uro_flujo">
            <div class="card-body-aten-a">
                <!-- [ Main Content ] start -->
                <div class="dropzone" id="mis-imagenes-uro_flujo" action="{{ route('profesional.imagen.carga') }}">
                <!-- <div class="dropzone" id="mis-imagenes" action="{{ route('profesional.imagen.carga') }}" method="post"  > -->
                </div>
                <!-- [ file-upload ] end -->
            </div>
        </div>
    </div>
</div>


