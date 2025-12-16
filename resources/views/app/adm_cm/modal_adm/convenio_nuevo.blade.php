<!--datos convenio-->
<div id="nuevoConvenioInstitucion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="nuevoConvenioInstitucion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Convenio Usuario</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Nombre Convenio</label>
                            <input type="text" class="form-control" id="nombre_convenio" name="nombre_convenio">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tipo Convenio</label>
                            <select name="tipo_convenio" id="tipo_convenio" class="form-control">
                                <option value="0">Seleccione</option>
                                @foreach($tipos_convenio as $key_tc => $value_tc)
                                    <option value="{{ $value_tc->id }}">{{ $value_tc->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Porcentaje</label>
                            <input type="text" class="form-control" name="porcentaje_dcto" id="porcentaje_dcto">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tipo Convenio Inst</label>
                            <select name="tipo_convenio_institucion" id="tipo_convenio_institucion" class="form-control">
                                <option value="0">Seleccione</option>
                                @foreach($tipos_convenio_institucion as $key_tc => $value_tc)
                                    <option value="{{ $value_tc->id }}">{{ $value_tc->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Fecha Inicial</label>
                            <input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" id="fecha_inicial_pago_convenio" name="fecha_inicial_pago_convenio">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Fecha Final</label>
                            <input type="date" class="form-control" value="" id="fecha_final_pago_convenio" name="fecha_final_pago_convenio">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group ">
                            <label class="floating-label-activo-sm" for="productos_convenio_">Productos a Convenir</label>
                            <select class="form-control form-control-sm" name="productos_convenio_" id="productos_convenio_" multiple="multiple">
                                @foreach($tipoproducto_convenios as $tp)
                                    <option value="{{ $tp->id }}">{{ $tp->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Rut representante</label>
                            <input type="text" class="form-control" oninput="formatoRut(this)" id="rut_representante_convenio" name="rut_representante_convenio">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Nombre representante</label>
                            <input type="text" class="form-control" id="nombre_representante_convenio" name="nombre_representante_convenio">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Telefono</label>
                            <input type="text" class="form-control" id="telefono_representante_convenio" name="telefono_representante_convenio">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Email</label>
                            <input type="text" class="form-control" id="email_representante_convenio" name="email_representante_convenio">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Direccion</label>
                            <input type="text" class="form-control" id="direccion_representante_convenio" name="direccion_representante_convenio">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Observaciones</label>
                            <textarea name="observaciones_nuevo_convenio" id="observaciones_nuevo_convenio" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-outline-success btn-sm float-right" onclick="guardar_nuevo_convenio_institucion()"><i class="fas fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>


</script>
