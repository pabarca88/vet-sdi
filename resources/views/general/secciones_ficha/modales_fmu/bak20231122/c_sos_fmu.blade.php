<div id="c_sos_fmu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_sos_fmu" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-danger">
				<h5 class="modal-title text-white mt-1">Contactos de emergencia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
{{-- 
                @if($pacientes_contacto_emergencia)
                    @foreach ( $pacientes_contacto_emergencia as $contacto_sos )
                        <div class="form-group">
                            <label for="nombre_contacto"><span style="font-weight:bold">NOMBRE</span>: <span id="nombre_contacto">{{$contacto_sos->ContactoEmergencia->nombre}}</span></label>
                        </div>
                        <div class="form-group">
                            <label for="apellido_contacto"><span style="font-weight:bold">APELLIDOS</span>: <span id="apellido_contacto">{{$contacto_sos->ContactoEmergencia->apellido_uno}} {{$contacto_sos->ContactoEmergencia->apellido_dos}}</span></label>
                        </div>
                        <div class="form-group">
                            <label for="rut_contacto"><span style="font-weight:bold">RUT</span>: <span id="rut_contacto">{{$contacto_sos->ContactoEmergencia->rut}}</span></label>
                        </div>
                        <div class="form-group">
                            <label for="edad_contacto"><span style="font-weight:bold">EDAD</span>: <span id="edad_contacto">{{\Carbon\Carbon::parse($contacto_sos->ContactoEmergencia->fecha_nac)->age}}</span></label>
                        </div>
                        <div class="form-group">
                            <label for="telefono_contacto"><span style="font-weight:bold">TELÉFONO</span>: <span id="telefono_contacto">{{$contacto_sos->ContactoEmergencia->telefono}}</span></label>
                        </div>
                        <div class="form-group">
                            <label for="direccion_contacto"><span style="font-weight:bold">PARENTEZCO</span>: <span id="direccion_contacto">{{$contacto_sos->ContactoEmergencia->parentezco}}</span></label>
                        </div>
                    @endforeach
                @endif --}}

                {{--  <div class="row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <div class="col-md-12"><h5>Contacto de Emergencia</h5></div>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <input type="text" class="form-control form-control-sm" value="" name="" id="" readonly>
                    </div>

                </div>  --}}
			</div>
		</div>
	</div>
</div>

<script>
    function c_sos_fmu() {
        $('#c_sos_fmu').modal('show');
    }
</script>
