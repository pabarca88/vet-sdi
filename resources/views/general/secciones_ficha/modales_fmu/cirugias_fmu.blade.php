<div id="cirugias_fmu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cirugias_fmu" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Cirugias</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-xs">
                            <thead>
                                <tr>
                                    <th>Fecha Proc.</th>
                                    <th>Procedimiento</th>
                                    <th>Incidente</th>
                                    <th>Profesional</th>
                                    <th>Fecha data</th>
                                </tr>
                            </thead>
                            <tbody id="bloque-registros-3">
                                @if (isset($antecedentes))
                                    @foreach ($antecedentes as $data)
                                        @if($data->id_tipo_antecedente==3)
                                            <tr>
                                                <td>{{ date('d-m-Y', strtotime($data->antecedente_data->fecha)) }}</td>
                                                <td>{{ $data->antecedente_data->procedimiento }}</td>
                                                <td>{{ $data->antecedente_data->comentario }}</td>
                                                <td>{{ $data->antecedente_data->profesional }}</td>
                                                <td>{{ date('d-m-Y', strtotime($data->antecedente_data->fecha_regitro)) }}</td>
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
                <button type="button" class="btn btn-sm btn-danger" onclick="$('#cirugias_fmu').modal('hide');">Cerrar</button>
            </div>
		</div>
	</div>
</div>
<script>
    function cirugias_fmu() {
        $('#cirugias_fmu').modal('show');
    }
</script>
