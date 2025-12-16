<div id="m_alergias_fmu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_alergias_fmu" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Alergias</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body"> {{--  
                @if($paciente_alergias)
                    @foreach ( $paciente_alergias as $alergia )
                        @php
                            $alergia_array = json_decode($alergia->data);
                        @endphp
                        <div class="form-group">
                            <label><span style="font-weight:bold">TIPO</span>: <span>{{  $alergia_array->nombre }}</span></label>
                        </div>
                        <div class="form-group">
                            <label><span style="font-weight:bold">ALERGICO</span>: <span>{{ $alergia_array->comentario }}</span></label>
                        </div>
                    @endforeach
                @endif
 --}}
			</div>
		</div>
	</div>
</div>
<script>
    function alergias_fmu() {
        $('#m_alergias_fmu').modal('show');
    }
</script>

