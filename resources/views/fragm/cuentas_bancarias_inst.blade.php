@foreach($cuentas_bancarias as $cuenta_bancaria)
<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between bg-info">
            <h5 class="mb-0 text-white">Agregar Datos depósitos</h5>
            <div>
                <button type="button" class="btn btn-light btn-sm btn-icon m-0 "  onclick="eliminar_cuenta_bancaria({{ $cuenta_bancaria->id }})">
                    <i class="feather icon-trash"></i>
                </button>
                <button type="button" class="btn btn-light btn-sm btn-icon m-0" data-toggle="collapse" data-target=".liquidaciones_{{ $cuenta_bancaria->id }}" aria-expanded="false" aria-controls="liquidaciones_1_{{ $cuenta_bancaria->id }} liquidaciones_2_{{ $cuenta_bancaria->id }}">
                    <i class="feather icon-edit"></i>
                </button>
            </div>

        </div>

        <div class="card-body border-top liquidaciones_{{ $cuenta_bancaria->id }} collapse show" id="liquidaciones_1_{{ $cuenta_bancaria->id }}">
            <form>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label font-weight-bolder">Rut</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label ">{{ $cuenta_bancaria->rut_titular }}</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label font-weight-bolder">Nombre Titular</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label ">{{ $cuenta_bancaria->nombre_titular }}</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label font-weight-bolder">Banco</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label">{{ $cuenta_bancaria->nombre_banco }}</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label font-weight-bolder">Email deposito</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label">{{ $cuenta_bancaria->email }}</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label font-weight-bolder">Tipo de Cuenta</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label">{{ $cuenta_bancaria->descripcion }}</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label font-weight-bolder">N° de Cuenta</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label">{{ $cuenta_bancaria->numero_cuenta }}</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label font-weight-bolder">Rut representante</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label">{{ $cuenta_bancaria->rut_representante }}</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label font-weight-bolder">Nombre representante</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="label">{{ $cuenta_bancaria->nombre_representante }}</label>
                    </div>
                </div>

            </form>
        </div>
        <div class="card-body liquidaciones_{{ $cuenta_bancaria->id }} collapse" id="liquidaciones_2_{{ $cuenta_bancaria->id }}">

            <div class="form-row">
                    <div class="col-sm-12 col-md-12 mb-2">
                        <h6 class="text-c-blue">INFORMACIÓN Y DATOS BANCO</h6>
                    </div>
                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                        <label class="floating-label-activo-sm">RUT:</label>
                        <input type="text" class="form-control form-control-sm" oninput="formatoRut(this)" name="edit_rut_titular_{{ $cuenta_bancaria->id }}" id="edit_rut_titular_{{ $cuenta_bancaria->id }}" value="{{ $cuenta_bancaria->rut_titular }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                        <label class="floating-label-activo-sm">Nombre Titular</label>
                        <input type="text" class="form-control form-control-sm" name="edit_nombre_titular_{{ $cuenta_bancaria->id }}" id="edit_nombre_titular_{{ $cuenta_bancaria->id }}" value="{{ $cuenta_bancaria->nombre_titular }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                        <label class="floating-label-activo-sm">Banco</label>
                        <select name="edit_banco_titular_{{ $cuenta_bancaria->id }}" id="edit_banco_titular_{{ $cuenta_bancaria->id }}" class="form-control form-control-sm">
                            <option value="0">Seleccione</option>
                            @foreach($bancos as $banco)
                            <option value="{{ $banco->id }}" @if($cuenta_bancaria->id_banco == $banco->id) selected @endif>{{ $banco->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                        <label class="floating-label-activo-sm">Email deposito</label>
                        <input type="text" class="form-control form-control-sm" name="edit_email_titular_{{ $cuenta_bancaria->id }}" id="edit_email_titular_{{ $cuenta_bancaria->id }}" value="{{ $cuenta_bancaria->email }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                        <label class="floating-label-activo-sm">Tipo de cuenta</label>
                        <select class="form-control form-control-sm" name="edit_tipo_cuenta_{{ $cuenta_bancaria->id }}" id="edit_tipo_cuenta_{{ $cuenta_bancaria->id }}">
                            <option value="0">Seleccione</option>
                            @foreach($tipo_cuentas_bancarias as $tipo_cuenta)
                            <option value="{{ $tipo_cuenta->id }}" @if($cuenta_bancaria->id_tipo_cuenta == $tipo_cuenta->id) selected @endif>{{ $tipo_cuenta->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                        <label class="floating-label-activo-sm">N° de cuenta</label>
                        <input type="text" class="form-control form-control-sm" name="edit_numero_cuenta_{{ $cuenta_bancaria->id }}" id="edit_numero_cuenta_{{ $cuenta_bancaria->id }}" value="{{ $cuenta_bancaria->numero_cuenta }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                        <label class="floating-label-activo-sm">Rut Representante</label>
                        <input type="text" class="form-control form-control-sm" name="edit_rut_representante_{{ $cuenta_bancaria->id }}" id="edit_rut_representante_{{ $cuenta_bancaria->id }}" value="{{ $cuenta_bancaria->rut_representante }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                        <label class="floating-label-activo-sm">Nombre Representante</label>
                        <input type="text" class="form-control form-control-sm" name="edit_nombre_representante_{{ $cuenta_bancaria->id }}" id="edit_nombre_representante_{{ $cuenta_bancaria->id }}" value="{{ $cuenta_bancaria->nombre_representante }}">
                    </div>
            </div>
            <button type="button" class="btn btn-outline-success btn-sm float-right" onclick="editar_cuenta_bancaria({{ $cuenta_bancaria->id }})"><i class="fas fa-save"></i> Editar</button>

        </div>

    </div>
</div>
@endforeach
