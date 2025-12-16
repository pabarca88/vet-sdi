<!-- Modal -->
<div class="modal fade" id="nuevos_insumos_dentales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevos insumos dentales</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

                <div class="mb-3">
                    <div class="form-group">
                        <label for="nombre" class="floating-label-activo-sm">Nombre del Insumo</label>
                        <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" required>
                    </div>

                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="codigo" class="floating-label-activo-sm">Código / SKU</label>
                        <input type="text" class="form-control form-control-sm" id="codigo" name="codigo">
                    </div>

                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="descripcion" class="floating-label-activo-sm">Descripción</label>
                        <textarea class="form-control form-control-sm" id="descripcion" name="descripcion" rows="3"></textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="cantidad" class="floating-label-activo-sm">Cantidad</label>
                        <input type="number" class="form-control form-control-sm" id="cantidad" name="cantidad" required min="1">
                    </div>

                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="unidad" class="floating-label-activo-sm">Unidad de Medida</label>
                        <select class="form-control form-control-sm" id="unidad" name="unidad">
                            <option value="caja">Caja</option>
                            <option value="frasco">Frasco</option>
                            <option value="paquete">Paquete</option>
                            <option value="unidad">Unidad</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="proveedor" class="floating-label-activo-sm">Proveedor</label>
                        <input type="text" class="form-control form-control-sm" id="proveedor" name="proveedor">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="fecha_vencimiento" class="floating-label-activo-sm">Fecha de Vencimiento</label>
                        <input type="date" class="form-control form-control-sm" id="fecha_vencimiento" name="fecha_vencimiento">
                    </div>

                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="costo" class="floating-label-activo-sm">Costo Unitario ($)</label>
                        <input type="number" step="0.01" class="form-control form-control-sm" id="costo" name="costo">
                    </div>

                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="fecha_ingreso" class="floating-label-activo-sm">Fecha de Ingreso</label>
                        <input type="date" class="form-control form-control-sm" id="fecha_ingreso" name="fecha_ingreso" value="{{ date('Y-m-d') }}" readonly>
                    </div>

                </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Registrar</button>
        </div>
      </div>
    </div>
  </div>
