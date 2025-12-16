<div id="modal_orden_trabajoM" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_orden_trabajoM"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Orden de trabajo mayor</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form_orden_trabajo_mayor" action="{{ route('dental.registrar_orden_trabajo_mayor') }}"
                    method="post">

                    @csrf
                    <input type="hidden" name="ficha_id_trabajo_mayor" id="ficha_id_trabajo_mayor"
                       {{--   value=" @if ($ficha != null) {{ $ficha->id }}@endif">--}}
                    <input type="hidden" name="paciente_trabajo_mayor" id="paciente_trabajo_mayor"
                        value="">

                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label">N° Orden</label>
                            <!--correlativo-->
                            <input type="text" class="form-control form-control-sm" name="nro_orden_trabajo_mayor"
                                id="nro_orden_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <script>
                                var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                    "Octubre", "Noviembre", "Diciembre");
                                var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                var f = new Date();
                                document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                    .getFullYear());
                            </script>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label">Clinica/Dr./Dra</label>
                            <input type="text" class="form-control form-control-sm" name="clinica_doctor_trabajo_mayor"
                                id="clinica_doctor_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label">Rut Profesional</label>
                            <input type="text" class="form-control form-control-sm" name="rut_profesional_trabajo_mayor"
                                id="rut_profesional_trabajo_mayor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label">Nombre Paciente</label>
                            <!--correlativo-->
                            <input type="text" class="form-control form-control-sm" name="paciente_nombre_trabajo_mayor"
                                id="paciente_nombre_trabajo_mayor"
                                value=""
                                disabled>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Rut Paciente</label>
                            <input type="text" class="form-control form-control-sm" name="paciente_rut_trabajo_mayor"
                                id="paciente_rut_trabajo_mayor" value="" disabled>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label">Guia</label>
                            <input type="text" class="form-control form-control-sm" name="guia_trabajo_mayor"
                                id="guia_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label">Color</label>
                            <input type="text" class="form-control form-control-sm" name="color_trabajo_mayor"
                                id="color_trabajo_mayor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label">Urgencia</label>
                            <input type="text" class="form-control form-control-sm" name="urgencia_trabajo_mayor"
                                id="urgencia_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label">Material</label>
                            <input type="text" class="form-control form-control-sm" name="material_trabajo_mayor"
                                id="material_trabajo_mayor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label">Trabajo a realizar</label>
                            <input type="text" class="form-control form-control-sm"
                                name="trabajo_realizar_trabajo_mayor" id="trabajo_realizar_trabajo_mayor">

                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label">Comentarios</label>
                            <input type="text" class="form-control form-control-sm" name="comentarios_trabajo_mayor"
                                id="comentarios_trabajo_mayor">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <h6 Style="text-align:center">Protesis c/implante</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label">Marca Implante</label>
                            <input type="text" class="form-control form-control-sm" name="marca_implante_trabajo_mayor"
                                id="marca_implante_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label">Medida Implante</label>
                            <input type="text" class="form-control form-control-sm" name="medida_implante_trabajo_mayor"
                                id="medida_implante_trabajo_mayor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <h6 Style="text-align:center">Aditamentos</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label">N° Replicas</label>
                            <input type="text" class="form-control form-control-sm" name="nro_replicas_trabajo_mayor"
                                id="nro_replicas_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label">N° Tornillos</label>
                            <input type="text" class="form-control form-control-sm" name="nro_tornillos_trabajo_mayor"
                                id="nro_tornillos_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label">Otros</label>
                            <input type="text" class="form-control form-control-sm" name="otros_trabajo_mayor"
                                id="otros_trabajo_mayor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <h6 Style="text-align:center">Proximas Citas</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-4 col-md-3">
                            <label class="floating-label">Cubetas</label>
                            <input type="text" class="form-control form-control-sm" name="cubetas_trabajo_mayor"
                                id="cubetas_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label class="floating-label">P.Articulación</label>
                            <input type="text" class="form-control form-control-sm" name="p_articulacion_trabajo_mayor"
                                id="p_articulacion_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label class="floating-label">P. Dientes</label>
                            <input type="text" class="form-control form-control-sm" name="p_dientes_trabajo_mayor"
                                id="p_dientes_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label class="floating-label">P. Metal</label>
                            <input type="text" class="form-control form-control-sm" name="p_metal_trabajo_mayor"
                                id="p_metal_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label">Bizcocho</label>
                            <input type="text" class="form-control form-control-sm" name="bizcocho_trabajo_mayor"
                                id="bizcocho_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label">Terminación</label>
                            <input type="text" class="form-control form-control-sm" name="terminacion_trabajo_mayor"
                                id="terminacion_trabajo_mayor">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label">Compostura</label>
                            <input type="text" class="form-control form-control-sm" name="compostura_trabajo_mayor"
                                id="compostura_trabajo_mayor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 text-center">
                            <!--<p class="mb-2">Saluda atentamente</p>-->
                            <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    function lab_dent_mayor() {
        $('#modal_orden_trabajoM').modal('show');
    }
</script>
