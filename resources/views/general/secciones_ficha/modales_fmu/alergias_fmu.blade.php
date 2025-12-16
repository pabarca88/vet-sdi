<div id="m_alergias_fmu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_alergias_fmu" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Alergias</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-xs">
                            <thead>
                                <tr>
                                    <th>Nombre Alergia</th>
                                    <th>Comentario</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody id="bloque-registros-6">
                                @if (isset($antecedentes))
                                    @foreach ($antecedentes as $data)
                                        @if($data->id_tipo_antecedente==6)
                                            <tr>
                                                <td>{{ $data->antecedente_data->nombre }}</td>
                                                <td>{{ $data->comentario }}</td>
                                                <td>{{ $data->antecedente_data->fecha_regitro }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" onclick="$('#m_alergias_fmu').modal('hide');">Cerrar</button>
            </div>
		</div>
	</div>
</div>
<script>
    function alergias_fmu() {
        $('#m_alergias_fmu').modal('show');
    }
</script>

