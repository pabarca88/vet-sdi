<div id="m_lic_autor_compin" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="m_lic_autor_compin" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Solicita autorización a Compin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="#">Empleadores informados</h6>
                    </div>
                </div>

                <div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<p>Estimado paciente.<strong style="text-transform:uppercase"> {{ $paciente->rut }}  </strong>.</p>
                        <p>S.D.I Le solicita a usted: Confirmar mediante su aplicación la autorización a COMPIN ,para notificar por email,app o celular, la resolución dela licencia y acceder a sus datos previsionales de acuerdo al articulo 10 de la ley 19.628 de la república de Chile.</p>
                    </div>
                </div>

                <div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<p>En espera de respuesta.</p>
					</div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-danger-light btn-sm btn-block">Cancelar</button>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        @php
                            $url_temp_2 = ('Profesional/Paciente/Ficha_consulta?_token='.request('_token').'&id_hora_realizar='.request('id_hora_realizar').'&lugar_atencion_id='.request('lugar_atencion_id').'');
                            $ruta = ROUTE('check_sdi', ['id_recept' => $paciente->id_usuario,'urla'=> $url_temp_2.'&lic='.request('lic').'&compin=0','urln' => $url_temp_2.'&lic='.request('lic').'&compin=1&tab=licencia-tab', 'id_tipo' => 11]);
                        @endphp
                        <a href="{{ $ruta }}" class="btn btn-info btn-sm btn-block">Solicitar</a>
                    </div>
                </div>

            </div>
		</div>
	</div>
</div>

<script>
</script>
