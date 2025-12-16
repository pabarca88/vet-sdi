<!-- MODAL INSUMOS -->
<div class="modal fade" tabindex="-1" id="modal_insumos">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="insumosModalLabel">Insumos para el tratamiento</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

                  <div class="form-row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="" class="floating-label-activo-sm">Profesional</label>
                              <input type="text" name="" id="" class="form-control form-control-sm" value="{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="" class="floating-label-activo-sm">Paciente</label>
                              <input type="text" name="" id="" class="form-control form-control-sm" value="{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}">
                          </div>
                      </div>
                      <div class="col-md-2" id="tipo_insumo_select">
                        <div class="form-group">
                            <label for="tipoInsumo" class="floating-label-activo-sm">Tipo de Insumo</label>
                            <select name="tipoInsumo" id="tipoInsumo" class="form-control form-control-sm" onchange="dame_marcas_implantes(this)">
                                <option value="0">Seleccione</option>
                                <option value="1">Implantes</option>
                                <option value="2">Instrumental Quirúrgico y Protésico</option>
                                <option value="3">Material de Sutura y Regeneración</option>
                                <option value="4">Insumos Descartables y Bioseguridad</option>
                                <option value="5">Injerto óseo</option>
                                <option value="6">Membranas</option>
                                <option value="7">Tornillos de fijación</option>
                                <option value="8">Aditamentos</option>
                                <option value="9">Otros Insumos</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4 d-none" id="marcas_implantes_select">
                        <div class="form-group">
                            <label for="marcasImplantes" class="floating-label-activo-sm">Marcas Implantes</label>
                            <select name="marcasImplantes" id="marcasImplantes" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                @foreach ($marcas_implantes as $marca)
                                    <option value="{{ $marca->id }}">{{ $marca->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4" id="insumos_select">
                          <div class="form-group">
                              <label for="" class="floating-label-activo-sm" id="titulo_tipo_insumo">Insumos</label>
                              <select name="nombreInsumo" data-titulo="Ex_cuello" data-seccion="Cuello"  id="nombreInsumo" class="form-control form-control-sm" >
                                @foreach ($materiales_implantologia as $m)
                                    <option value="{{ $m->id }}">{{ $m->descripcion }}</option>
                                @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                              <label for="" class="floating-label-activo-sm">Cantidad</label>
                              <input type="number" name="cantidad" id="cantidad" class="form-control form-control-sm">
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group">
                              <label for="" class="floating-label-activo-sm">Valor</label>
                              <input type="number" name="precio" id="precio" class="form-control form-control-sm">
                          </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Total</label>
                            <input type="text" name="total" id="total" class="form-control form-control-sm">
                        </div>
                    </div>
                      <div class="col-12">
                          <div class="form-group">
                              <label for="" class="floating-label-activo-sm">Observaciones</label>
                              <textarea class="form-control caja-texto form-control-sm mb-9" name="insumos_obs_tto" id="insumos_obs_tto" cols="30" rows="1" onfocus="this.rows = 4" onblur="this.rows=1"></textarea>
                          </div>

                      </div>

                      <button type="button" class="btn btn-outline-success btn-sm w-100 my-2" onclick="guardar_insumo()"><i class="fas fa-check"></i> + Agregar</button>
                  </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
    </div>
</div>
