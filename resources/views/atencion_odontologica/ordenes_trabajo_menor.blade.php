@foreach ($ordenes_trabajo_menor as $o)
    <div class="card-informacion">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label class="floating-label-activo-sm">N°
                        Identificación</label>
                    <input type="text" class="form-control form-control-sm" name="lab_id_trab" id="lab_id_trab"
                        value="{{ $o->nro_orden }}">
                </div>
                <div class="form-group col-md-2">
                    <label class="floating-label-activo-sm">
                        Valor Total</label>
                    <input type="text" class="form-control form-control-sm" name="lab_cost_tot" id="lab_cost_tot"
                        value="{{ number_format($o->valor_prestacion, 0, ',', '.') }}">
                </div>
                <div class="form-group col-md-2">
                    <label class="floating-label-activo-sm">
                        Abonos</label>
                    <input type="text" class="form-control form-control-sm" name="lab_abon" id="lab_abon"
                        value="0">
                </div>
                <div class="form-group col-md-2">
                    <label class="floating-label-activo-sm">
                        Valor Pendiente</label>
                    <input type="text" class="form-control form-control-sm" name="lab_val_pend" id="lab_val_pend"
                        value="{{ number_format($o->valor_prestacion, 0, ',', '.') }}">
                </div>
                <div class="form-group col-md-3 d-flex">
                    @if ($o->presupuesto == 1)
                        <button type="button" class="btn btn-icon btn-danger"
                            onclick="sacar_de_presupuesto_lab({{ $o->id }})"><i
                                class="fas fa-minus"></i></button>
                    @else
                        <button type="button" class="btn btn-icon btn-primary"
                            onclick="cargar_a_presupuesto_lab({{ $o->id }});"><i
                                class="feather icon-shopping-cart"></i>
                        </button>
                    @endif
                    <button type="button" class="btn btn-info btn-icon"onclick="info_lab({{ $o->id_laboratorio }});"><i
                            class="fas fa-info-circle"></i></button>
                </div>
                {{-- <div class="form-group col-md-3">
                                                                                            <button type="button" class="btn btn-info-light-c btn-block btn-xs btn-block mb-2"onclick="info_lab();"><i class="fa fa-plus"></i>  Ingresar abono</button><!--este boton hace el calculo del abono y lo anota-->
                                                                                        </div> --}}
            </div>
        </div>
    </div>
@endforeach
