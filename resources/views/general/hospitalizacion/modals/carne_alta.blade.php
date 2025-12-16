<div id="carne_alta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="carne_alta"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Carnet de alta</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close" onclick="cerrarcalta();"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <h6 class="mb-3">I.- Datos de hospitalización</h6>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="floating-label">Clínica / Hospital</label>
                            <input type="text" class="form-control form-control-sm" name="clinica_hospital" id="clinica_hospital" value="{{ $lugar_atencion->nombre }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Servicio</label>
                            <input type="text" class="form-control form-control-sm" name="servicio" id="servicio">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Rut paciente</label>
                            <input type="text" class="form-control form-control-sm" name="rut" id="rut" value="{{ $paciente->rut }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Desde</label>
                            {{-- <span>{{ \Carbon\Carbon::parse($epicrisis_alta_medica->inicio_hospitalizacion)->format('Y-m-d') }}</span>--}}
                        </div>
                        <div class="form-group col-md-4">
                            <label>Hasta</label>
                            {{-- <span>{{ \Carbon\Carbon::parse($epicrisis_alta_medica->fin_hospitalizacion)->format('Y-m-d') }}</span>--}}

                        </div>
                        <div class="form-group col-md-4">
                            <label>Total de días</label>
                            {{-- <span>{{ \Carbon\Carbon::parse($epicrisis_alta_medica->fin_hospitalizacion)->diff(\Carbon\Carbon::parse($epicrisis_alta_medica->inicio_hospitalizacion))->format('%d') }}</span>--}}
                        </div>
                    </div>
                    <div class="form-row">
                        <h6 class="my-3">II.- Dignósticos</h6>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="floating-label">Diagnósticos de ingreso</label>
                            <input class="form-control form-control-sm" name="" id="" value="">
                            {{--  value="{{ $epicrisis_alta_medica->diagnostico_ingreso }}">  --}}
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label">Diagnósticos de alta</label>
                            <input class="form-control form-control-sm" name="" id="" value="">
                            {{--  value="{{ $epicrisis_alta_medica->diagnostico_alta }}">  --}}
                        </div>
                    </div>
                    <div class="form-row">
                        <h6 class="my-3">III.- Tratamientos y cirugías realizadas</h6>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="floating-label">Tratamientos</label>
                            <input class="form-control form-control-sm" name="" id="" value="">
                            {{--  value="{{ $epicrisis_alta_medica->tratamientos_cirugias }}">  --}}
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label">Procedimientos quirúrgicos</label>
                            <input class="form-control form-control-sm" name="" id="" value="">
                            {{--  value="{{ $epicrisis_alta_medica->procedimientos_quirurgicos_cirugia }}">  --}}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="floating-label">Otros procedimientos y/o tratamientos</label>
                            <input class="form-control form-control-sm" name="" id="" value="">
                            {{--  value="{{ $epicrisis_alta_medica->otros_tratamientos_procedimientos }}">  --}}
                        </div>
                    </div>
                    <div class="form-row">
                        <h6 class="my-3">IV.- Controles y evolución intrahospitalaria</h6>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="floating-label">Tratamientos</label>
                            <input class="form-control form-control-sm" name="" id="" value="">
                                {{--  value="{{ $epicrisis_alta_medica->tratamientos_controles }}">  --}}
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label">Procedimientos quirúrgicos</label>
                            <input class="form-control form-control-sm" name="" id="" value="">
                                {{--  value="{{ $epicri sis_alta_medica->procedimientos_quirurgicos_controles }}">  --}}
                        </div>
                    </div>
                    <div class="form-row">
                        <h6 class="my-3">V.- Controles e indicaciones al alta</h6>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="floating-label-activo-sm">Fecha</label>
                            <input type="text" class="form-control form-control-sm" name="fecha" id="fecha" value="" disabled>
                                {{--  value="{{ \Carbon\Carbon::parse($e picrisis_alta_medica->fecha_control)->format('d-m-Y') }} " disabled>  --}}
                        </div>
                        <div class="form-group col-md-8">
                            <label class="floating-label">Indicaciones</label>
                            <input class="form-control form-control-sm" value="">
                            {{--  value="{{ $epicrisis_alta_medica->indicaciones_alta  }}">  --}}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="floating-label">Rut</label>
                            <input type="text" class="form-control form-control-sm" name="rut_profesional" id="rut_profesional"  value="">
                            {{--  value="{{ $profesional->rut }}">  --}}
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Nombre y Apellidos</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_profesional" id="nombre_profesional" value="">
                            {{--  value="{{ $profesional->nombre.''.$profesional->apellido_uno }}">  --}}
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Email</label>
                            <input type="text" class="form-control form-control-sm" name="email_profesional" id="email_profesional"value="">
                            {{--  id="email_profesional"value="{{ $profesional->email }} ">  --}}
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    /*CERRAR MODAL*/
    function cerrarcalta()
    {
        $('#carne_alta').modal('show');
    }
    function cerrarcalta() {
        $('#carne_alta').modal ('hide');
      }
</script>