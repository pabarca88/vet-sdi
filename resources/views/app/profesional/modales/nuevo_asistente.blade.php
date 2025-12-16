<!--Modal nuevo asistente-->
<div id="nuevo_asistente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="nuevo_asistente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center" id="nuevo_asistente_titulo">
                    Registrar nuevo/a asistente
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="form_nuevo_asistente" id="form_nuevo_asistente" action="{{ route('profesional.crear_asistente') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="input-group mb-3">
                      <label class="floating-label-activo">Rut</label>
                        <input type="text" class="form-control form-control-sm" aria-describedby="button-addon2"  name="rut_nuevo_asistente" id="rut_nuevo_asistente">
                      <div class="input-group-append">
                        <button class="btn btn-info btn-sm" onclick="buscar_asistente_profesional();" type="button" id="button-addon2"><i class="feather icon-search"></i> Buscar
                        </button>
                      </div>
                    </div>
                </div>
                </div>
                <div class="row" id="inputs_nuevo_asistente" style="display:none">
                    <input type="hidden" id="id_asistente_registrado" name="id_asistente_registrado">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="alert alert-warning" role="alert">
                          Completa los datos para el registro.
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre_nuevo_asistente" id="nombre_nuevo_asistente" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido_nuevo_asistente" id="apellido_nuevo_asistente" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido_dos_nuevo_asistente" id="apellido_dos_nuevo_asistente" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email_nuevo_asistente" id="email_nuevo_asistente" type="email">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono_nuevo_asistente" id="telefono_nuevo_asistente" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-row" id="inputs_asistentes_dos" style="display:none">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Dirección&nbsp;/&nbsp;Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_asistente" id="direccion_nuevo_asistente" type="text">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Depto. | Ofic.</label>
                            <input class="form-control form-control-sm" name="numero_nuevo_asistente" id="numero_nuevo_asistente" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Region</label>
                            <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control form-control-sm" required>
                                <option value="">Seleccione...</option>
                                @foreach ($region as $reg)
                                @if (isset($region))
                                <option value="{{ $reg->id }}"> {{ $reg->nombre }} </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Comuna</label>
                            <select id="ciudad_agregar" name="ciudad_agregar" class="form-control form-control-sm" required>
                                <option value="">Seleccione...</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 py-0">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                <button type="submit" class="btn btn-info-light-c btn-sm"><i class="feather icon-check"></i> Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
