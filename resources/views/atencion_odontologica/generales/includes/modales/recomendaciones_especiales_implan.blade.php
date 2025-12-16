<div id="m_ind_es_implante" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_ind_es_implante" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Recomendaciones Personales Posterior a Implante Dental</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form_orden_trabajo_menor" action="{{ route('dental.registrar_orden_trabajo_menor') }}"
                    method="post">

                    @csrf
                    <input type="hidden" name="ficha_id_implantologia" id="ficha_id_implantologia" value="{{--   @if ($ficha != null) {{ $ficha->id }}@endif"--}}">

                    <input type="hidden" name="id_paciente" id="id_paciente" value="">


                    <div class="form-row">
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
                    </div>
                    <div class="form-row">
                        <div class="col-sm-8 col-md-8">
                            <img src="{{ asset('images/dental/indicaciones_implante.png') }}" class="w-100" alt="recomendaciones">
                            
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Nombre Paciente</label>
                                    <!--correlativo-->
                                    <input type="text" class="form-control form-control-sm" name="nombre_pcte_rec_imp_esp" id="nombre_pcte_rec_imp_esp" value=""disabled>
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Nombre Implantólogo</label>
                                    <input type="text" class="form-control form-control-sm" name="nomb_imp_rec_esp"  id="nomb_imp_rec_esp" value="" disabled>
        
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Recomendaciones especiales para usted</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="obs_rec_esp_impl" id="obs_rec_esp_impl"></textarea>
                                </div>
                            </div>
        
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Próximo control</label>
                                    <input type="date" class="form-control form-control-sm" name="prox_cont_imp_rec_esp" id="prox_cont_imp_rec_esp">
        
                                </div>
        
                            </div>
                        </div>
                    </div>
                    


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('m_ind_es_implante');">Enviar al Paciente</button>
            </div>
        </div>
    </div>
</div>

<script>
    function recomendaciones_esp_implante() {
        $('#m_ind_es_implante').modal('show');
    }

</script>
