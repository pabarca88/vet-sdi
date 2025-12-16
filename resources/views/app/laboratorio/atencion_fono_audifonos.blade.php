<style>
    .badge-prestado {
            background: #f6ad55;
            color: #fff;
            font-weight: bold;
            padding: 6px 12px;
            border-radius: 8px;
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
        }
</style>
<div class="col-12 pl-0 mt-3">
    <ul class="nav nav-tabs-secciones mb-3" id="orl" role="tablist">
        <li class="nav-item-secciones">
            <a class="nav-secciones active text-uppercase" id="venta_audif-tab" data-toggle="tab" href="#venta_audif" role="tab" aria-controls="venta_audif" aria-selected="true">Venta de audífonos y repuestos</a>
        </li>
        <li class="nav-item-secciones">
            <a class="nav-secciones text-uppercase" id="cont_post_venta-tab" data-toggle="tab" href="#cont_post_venta" role="tab" onclick="cargar_datos_post_venta();" aria-controls="cont_post_venta" aria-selected="false">Control de audífonos post venta</a>
        </li>
        @if($profesional->id_tipo_institucion == 3)
            <li class="nav-item-secciones">
                <a class="nav-secciones text-uppercase" id="cotizacion_audif-tab" data-toggle="tab" href="#cotizacion_audif" role="tab" onclick="cargar_datos_cotizacion();" aria-controls="cotizacion_audif" aria-selected="false">Cotización de audífonos</a>
            </li>
        @else
            <li class="nav-item-secciones">
                <a class="nav-secciones text-uppercase" id="cotizacion_audif-tab" data-toggle="tab" href="#cotizacion_audif" role="tab" aria-controls="cotizacion_audif" aria-selected="false">Cotización de audífonos</a>
            </li>
        @endif
        <li class="nav-item-secciones">
            <a class="nav-secciones text-uppercase" id="prestamo_audif-tab" data-toggle="tab" href="#prestamo_audif" role="tab" onclick="cargar_datos_prestamo();" aria-controls="prestamo_audif" aria-selected="false">Préstamo de audífonos</a>
        </li>
        <li class="nav-item-secciones">
            <a class="nav-secciones text-uppercase" id="recepcion_audif-tab" data-toggle="tab" href="#recepcion_audif" role="tab" onclick="dame_historial_productos_prestados();" aria-controls="recepcion_audif" aria-selected="false">Recepción de audífonos</a>
        </li>
        @if($profesional->id_tipo_institucion == 3)
            <li class="nav-item-secciones">
                <a class="nav-secciones text-uppercase" id="campanas_promocionales-tab" data-toggle="tab" href="#campanas_promocionales" role="tab" onclick="historial_campanas_publicitarias()" aria-controls="campanas_promocionales" aria-selected="false">Campañas promocionales</a>
            </li>
        @endif
    </ul>
</div>
<div class="tab-content" id="tecn-orl-contenido">
    {{-- Venta de audifonos y repuestos --}}
    <div class="tab-pane fade show active" id="venta_audif" role="tabpanel" aria-labelledby="venta_audif-tab">
        <div class="div_form_examen_ocho_par">
            <div class="row">
                <div class="col-12">
                    <h6 class="tit-gen mb-2 mt-2">Información venta de audífonos</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="tab-content" id="myTabContent">
                        <!--TAB INFORMACIÓN PERSONAL-->
                        <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                            @if(isset($paciente))
                            <div class="card">
                                <div class="card-body pb-1">
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm">Motivo de Uso</label>
                                            <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ant_especialidad" id="ant_especialidad" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm">Observación General</label>
                                            <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_general" id="obs_general" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="pb-1">
                                    
                                    <!-- Paciente Seleccionado (oculto inicialmente) -->
                                   
                                    <div class="row d-none" id="card_paciente_seleccionado">
                                        <div class="col-12">
                                            <div class="card border-success mb-3" style="background-color: #d4edda;">
                                                <div class="card-body py-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                                <i class="feather icon-check text-white" style="font-size: 24px;"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="mb-0 text-success font-weight-bold">
                                                                Paciente Seleccionado
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <small class="text-muted d-block mb-0">RUT:</small>
                                                            <strong id="paciente_sel_rut" class="d-block">-</strong>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                            <small class="text-muted d-block mb-0">Nombre:</small>
                                                            <strong id="paciente_sel_nombre" class="d-block">-</strong>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                            <small class="text-muted d-block mb-0">Email:</small>
                                                            <strong id="paciente_sel_email" class="d-block">-</strong>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <small class="text-muted d-block mb-0">Teléfono:</small>
                                                            <strong id="paciente_sel_telefono" class="d-block">-</strong>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-right">
                                                            <button type="button" class="btn btn-sm btn-warning" onclick="deseleccionar_paciente()" title="Cambiar paciente">
                                                                <i class="feather icon-refresh-cw"></i> Cambiar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <input type="hidden" id="paciente_seleccionado_id" name="paciente_seleccionado_id" value="">
                                            <input type="hidden" id="paciente_seleccionado_id_post_venta" name="paciente_seleccionado_id_post_venta" value="">
                                        </div>
                                    </div>
                                    <div class="alert alert-warning mb-3" role="alert">
                                        <i class="feather icon-alert-triangle mr-2"></i> Para registrar una venta de audífonos, primero debe asociar un paciente o cliente a esta atención.
                                    </div>
                                    <!-- Buscador de Paciente -->
                                    <div class="card border-primary" id="card_busqueda_paciente">
                                        <div class="card-header bg-primary">
                                            <h6 class="text-white mb-0">
                                                <i class="feather icon-search mr-2"></i>
                                                Buscar Paciente
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- Tipo de búsqueda -->
                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <label class="font-weight-bold">Buscar por:</label>
                                                    <select class="form-control form-control-sm" id="tipo_busqueda_paciente" name="tipo_busqueda_paciente" disabled>
                                                        <option value="rut" selected>RUT</option>
                                                        <option value="nombre">Nombre</option>
                                                        <option value="email">Email</option>
                                                    </select>
                                                </div>

                                                <!-- Campo de búsqueda -->
                                                <div class="form-group col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                                    <label class="font-weight-bold">Término de búsqueda:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-sm" id="termino_busqueda_paciente" oninput="formatoRut(this)" name="termino_busqueda_paciente" placeholder="Ingrese RUT, nombre o email del paciente..." onkeypress="if(event.keyCode==13){buscar_paciente_venta(); return false;}">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary btn-sm" type="button" onclick="buscar_paciente_venta()">
                                                                <i class="feather icon-search"></i> Buscar
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <small class="form-text text-muted">
                                                        <i class="feather icon-info"></i> Presione Enter o haga clic en Buscar
                                                    </small>
                                                </div>

                                                <!-- Botón limpiar -->
                                                <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <label class="font-weight-bold d-block">&nbsp;</label>
                                                    <button class="btn btn-secondary btn-sm btn-block" type="button" onclick="limpiar_busqueda_paciente()">
                                                        <i class="feather icon-x"></i> Limpiar
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Resultados de búsqueda -->
                                            <div class="row mt-3">
                                                <div class="col-12">
                                                    <div id="resultados_busqueda_paciente"></div>
                                                    <div id="reserva_agregar_paciente_hora" style="display: none;">
                                                        
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Nombres</label>
                                                                    <input type="text" required class="form-control form-control-sm" name="venta_nombres_paciente" id="venta_nombres_paciente">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Primer Apellido</label>
                                                                    <input type="text" class="form-control form-control-sm" name="venta_apellido_uno" id="venta_apellido_uno">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                                    <input type="text" class="form-control form-control-sm" name="venta_apellido_dos" id="venta_apellido_dos">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">F. Nacimiento</label>
                                                                    <input type="date" class="form-control form-control-sm" name="venta_fecha_nac" id="venta_fecha_nac">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Sexo</label>
                                                                    <select id="venta_sexo" name="venta_sexo" class="form-control form-control-sm">
                                                                        <option value="0">Selecione una opci&oacute;n</option>
                                                                        <option value="F">Femenino</option>
                                                                        <option value="M">Masculino</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Profesión u Oficio</label>
                                                                    <select id="venta_profesion" name="venta_profesion" class="form-control form-control-sm">
                                                                        <option value="0">Selecione una opci&oacute;n</option>
                                                                        @if (isset($profesion_oficio))
                                                                            @foreach ($profesion_oficio as $prof_ofic)
                                                                                <option value="{{ $prof_ofic->id }}">{{ $prof_ofic->nombre }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                                                    <select id="venta_convenio" name="venta_convenio" class="form-control form-control-sm">
                                                                        <option value="0">Selecione una opci&oacute;n</option>
                                                                        @if (isset($prevision))
                                                                            @foreach ($prevision as $p)
                                                                                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9 col-md-9">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                                                    <input type="address" class="form-control form-control-sm" name="venta_direccion" id="venta_direccion">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3 col-md-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">N&uacute;mero</label>
                                                                    <input type="address" class="form-control form-control-sm" name="venta_numero_dir" id="venta_numero_dir">
                                                                </div>
                                                            </div>


                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Region</label>
                                                                    <select id="region_agregar_venta" onchange="buscar_ciudad_venta();" name="region_agregar_venta" class="form-control" required>
                                                                        <option value="0">Seleccione Regi&oacute;n</option>
                                                                        @if (isset($regiones))
                                                                            @foreach ($regiones as $reg)
                                                                                <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Ciudad</label>
                                                                    <select id="ciudad_agregar_venta" name="ciudad_agregar_venta" class="form-control" required>
                                                                        <option value="0">Seleccione Ciudad</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                                                    <input type="text" class="form-control form-control-sm" onblur="validar_email_venta()" name="venta_correo" id="venta_correo">
                                                                    <span id="mensaje_email_venta" style="display:none"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                                    <input type="tel" class="form-control form-control-sm" name="venta_telefono_uno" id="venta_telefono_uno">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-6">
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox" class="custom-control-input" id="reserva_hora_confirmacion" name="reserva_hora_confirmacion">
                                                                        <label class="custom-control-label" for="reserva_hora_confirmacion">Correo electr&oacute;nico</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox" class="custom-control-input" id="reserva_hora_sms" name="reserva_hora_sms">
                                                                        <label class="custom-control-label" for="sms">SMS</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" id="guardar_reserva_paciente" onclick="registrar_paciente_nuevo_venta();" class="btn btn-info">
                                                                Registrar Paciente y Seleccionar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif

                            <!-- Card busqueda de audifonos -->
                            <div class="card px-3 pb-0 pt-2">
                                <div class="row">

                                    <div class="card-body busqueda_audifono collapse show pt-0" id="busqueda_audifono-1">
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-row">
                                                        <!-- Tipo de búsqueda -->
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <label class="font-weight-bolder ml-0 mb-0">Tipo de Producto</label>
                                                            <select class="form-control form-control-sm" id="tipo_producto_busqueda" name="tipo_producto_busqueda">
                                                                <option value="">Todos</option>
                                                                <option value="1" selected>Audífonos</option>
                                                                <option value="2">Repuestos</option>
                                                                <option value="3">Pilas</option>
                                                            </select>
                                                        </div>

                                                        <!-- Campo de búsqueda -->
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="font-weight-bolder ml-0 mb-0">Buscar Producto</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control form-control-sm" name="buscar_producto" onkeypress="enter_buscar_productos_audifono(event)" id="buscar_producto" placeholder="Ingrese código, marca, modelo o nombre del producto">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-primary btn-sm" type="button" onclick="buscar_productos_audifonos()">
                                                                        <i class="feather icon-search"></i> Buscar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <small class="form-text text-muted">
                                                                Presione Enter o haga clic en Buscar para ver resultados
                                                            </small>
                                                        </div>
                                                        <!-- Botón del Carrito -->
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <label class="font-weight-bolder ml-0 mb-0">Carrito de Compras</label>
                                                            <div>
                                                                <button type="button" class="btn btn-success btn-block" onclick="obtenerCarrito()" id="btn-abrir-carrito">
                                                                    <i class="feather icon-shopping-cart"></i> Ver Carrito
                                                                    <span class="badge badge-light ml-1" id="badge-carrito-header" style="display:none;">0</span>
                                                                </button>
                                                                <small class="form-text text-muted text-center">
                                                                    <span id="total-carrito-header" style="display:none;">Total: $0.00</span>
                                                                </small>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div id="lista_audifonos"></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!--Card Información audifono-->
                            <div class="card px-3 pb-0 pt-2 d-none">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-info-light-c btn-icon m-0 float-right mb-n2" data-toggle="collapse" data-target=".info_audifono" aria-expanded="false" aria-controls="info_audifono-1 info_audifono-2">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>
                                    <div class="card-body info_audifono collapse show pt-0" id="info_audifono-1">
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="font-weight-bolder ml-0 mb-0">N° Serie aud. Izq</label>
                                                            {{--  <div> {{ $n_serie_aud_izq" }} </div>  --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                            {{--  <div> {{ $paciente->apellido_uno }}</div>  --}}
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                            {{--  <div> {{ $paciente->apellido_dos }}
                                                            </div>  --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                            <div>
                                                                {{--  @if ($paciente->sexo == 'F')
                                                                    Mujer
                                                                @elseif ($paciente->sexo == 'M')
                                                                    Hombre
                                                                @endif  --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="font-weight-bolder ml-0 mb-0">Fecha de entrega</label>
                                                            <div>
                                                                {{--  {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}  --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                            <div> Buena</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="font-weight-bolder ml-0 mb-0">N° Serie aud.Der</label>
                                                            {{--  <div> {{ $paciente->rut }} </div>  --}}
                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                            {{--  <div> {{ $paciente->apellido_uno }}</div>  --}}
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                            {{--  <div> {{ $paciente->apellido_dos }}
                                                            </div>  --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                            <div>
                                                                {{--  @if ($paciente->sexo == 'F')
                                                                    Mujer
                                                                @elseif ($paciente->sexo == 'M')
                                                                    Hombre
                                                                @endif  --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="font-weight-bolder ml-0 mb-0">Fecha de entrega</label>
                                                            <div>
                                                                {{--  {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}  --}}
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                            <div> Buena</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: audifono-->
                                    <!--(Editar)Datos audifono-->
                                    <div class="card-body info_audifono collapse pt-3" id="pinfo_audifono_2">
                                        <form>
                                            <div class="row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo">N° de serie audifono Izquierdo</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="N° serie" id="n_serie_aud_izq" name="n_serie_aud_izq" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label-activo">Marca</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Marca" id="marca_aud_izq" name="marca_aud_izq" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label-activo">Modelo</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Modelo" id="model_aud_izq" name="model_aud_izq" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label-activo">Fecha de entrega</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Fecha de entrega" id="fecha_ent_aud_izq"name="fecha_ent_aud_izq" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label-activo">Satisfacción</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Satsfacción" id="satisf_aud_izq" name="satisf_aud_izq" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo">N° de serie audifono Derecho</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="N° serie" id="n_serie_aud_der" name="n_serie_aud_der" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label-activo">Marca</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Marca" id="marca_aud_der" name="marca_aud_der" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label-activo">Modelo</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Modelo" id="model_aud_der" name="model_aud_der" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label-activo">Fecha de entrega</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Fecha de entrega" id="fecha_ent_aud_der"name="fecha_ent_aud_der" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label-activo">Satisfacción</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Satsfacción" id="satisf_aud_der" name="satisf_aud_der" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger-light-c btn-sm mr-2"><i class="feather icon-x"></i> Cancelar</button>
                                                    <button type="button" onclick="editar_paciente_datos_personales();" class="btn btn-sm btn-info-light-c"><i class="feather icon-save"></i> Guardar cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: (Editar)Datos audifono-->
                                </div>
                                </div>
                            <!--Cierre: Card Datos audifono-->


                        </div>
                    </div>
                </div>
            </div>
            @if(isset($paciente))
            <div class="row mt-4">
                <div class="col-12">
                    <h6 class="tit-gen mb-2">Carga de archivos</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="input_lista_archivo" id="input_lista_archivo" value="">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <!-- [ Main Content ] start -->
                                    <div class="dropzone" id="mis-archivos" action="{{ route('profesional.archivo.carga') }}">
                                    </div>
                                    <!-- [ file-upload ] end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    {{-- Control de audífonos post venta --}}
    <div class="tab-pane fade show" id="cont_post_venta" role="tabpanel" aria-labelledby="cont_post_venta-tab">
        <!-- Paciente Seleccionado para POST VENTA (oculto inicialmente) -->
       
        
        @if($profesional->id_tipo_institucion == 3)
        <h5 class="text-c-blue f-18 mb-3">
            <i class="feather icon-inbox mr-2"></i>
            Buscar Paciente para Control Post Venta de Audífonos
        </h5>
         
        <div class="row d-none" id="card_paciente_seleccionado_post_venta">
            <div class="col-12">
                <div class="card border-success mb-3" style="background-color: #d4edda;">
                    <div class="card-body py-2">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="feather icon-check text-white" style="font-size: 24px;"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h6 class="mb-0 text-success font-weight-bold">
                                    Paciente Seleccionado
                                </h6>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <small class="text-muted d-block mb-0">RUT:</small>
                                <strong id="paciente_sel_rut_post_venta" class="d-block">-</strong>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <small class="text-muted d-block mb-0">Nombre:</small>
                                <strong id="paciente_sel_nombre_post_venta" class="d-block">-</strong>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <small class="text-muted d-block mb-0">Email:</small>
                                <strong id="paciente_sel_email_post_venta" class="d-block">-</strong>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <small class="text-muted d-block mb-0">Teléfono:</small>
                                <strong id="paciente_sel_telefono_post_venta" class="d-block">-</strong>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-right">
                                <button type="button" class="btn btn-sm btn-warning" onclick="deseleccionar_paciente_post_venta()" title="Cambiar paciente">
                                    <i class="feather icon-refresh-cw"></i> Cambiar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Buscador de Paciente -->
        <div class="card border-primary" id="card_busqueda_paciente_post_venta">
            <div class="card-header bg-primary">
                <h6 class="text-white mb-0">
                    <i class="feather icon-search mr-2"></i>
                    Buscar Paciente
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Tipo de búsqueda -->
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="font-weight-bold">Buscar por:</label>
                        <select class="form-control form-control-sm" id="tipo_busqueda_paciente_post_venta" name="tipo_busqueda_paciente_post_venta" disabled>
                            <option value="rut" selected>RUT</option>
                            <option value="nombre">Nombre</option>
                            <option value="email">Email</option>
                        </select>
                    </div>

                    <!-- Campo de búsqueda -->
                    <div class="form-group col-sm-12 col-md-7 col-lg-7 col-xl-7">
                        <label class="font-weight-bold">Término de búsqueda:</label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="termino_busqueda_paciente_post_venta" oninput="formatoRut(this)" name="termino_busqueda_paciente_post_venta" placeholder="Ingrese RUT, nombre o email del paciente..." onkeypress="if(event.keyCode==13){buscar_paciente_venta_post_venta(); return false;}">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-sm" type="button" onclick="buscar_paciente_venta_post_venta()">
                                    <i class="feather icon-search"></i> Buscar
                                </button>
                            </div>
                        </div>
                        <small class="form-text text-muted">
                            <i class="feather icon-info"></i> Presione Enter o haga clic en Buscar
                        </small>
                    </div>


                    <!-- Botón limpiar -->
                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <label class="font-weight-bold d-block">&nbsp;</label>
                        <button class="btn btn-secondary btn-sm btn-block" type="button" onclick="limpiar_busqueda_paciente_post_venta()">
                            <i class="feather icon-x"></i> Limpiar
                        </button>
                    </div>
                </div>

                <!-- Resultados de búsqueda -->
                <div class="row mt-3">
                    <div class="col-12">
                        <div id="resultados_busqueda_paciente_post_venta"></div>
                        <div id="reserva_agregar_paciente_hora_post_venta" style="display: none;">            
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Nombres</label>
                                        <input type="text" required class="form-control form-control-sm" name="post_venta_nombres_paciente" id="post_venta_nombres_paciente">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Primer Apellido</label>
                                        <input type="text" class="form-control form-control-sm" name="post_venta_apellido_uno" id="post_venta_apellido_uno">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Segundo Apellido</label>
                                        <input type="text" class="form-control form-control-sm" name="post_venta_apellido_dos" id="post_venta_apellido_dos">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">F. Nacimiento</label>
                                        <input type="date" class="form-control form-control-sm" name="post_venta_fecha_nac" id="post_venta_fecha_nac">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Sexo</label>
                                        <select id="post_venta_sexo" name="post_venta_sexo" class="form-control form-control-sm">
                                            <option value="0">Selecione una opci&oacute;n</option>
                                            <option value="F">Femenino</option>
                                            <option value="M">Masculino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Profesión u Oficio</label>
                                        <select id="post_venta_profesion" name="post_venta_profesion" class="form-control form-control-sm">
                                            <option value="0">Selecione una opci&oacute;n</option>
                                            @if (isset($profesion_oficio))
                                                @foreach ($profesion_oficio as $prof_ofic)
                                                    <option value="{{ $prof_ofic->id }}">{{ $prof_ofic->nombre }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                        <select id="post_venta_convenio" name="post_venta_convenio" class="form-control form-control-sm">
                                            <option value="0">Selecione una opci&oacute;n</option>
                                            @if (isset($prevision))
                                                @foreach ($prevision as $p)
                                                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-md-9">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                        <input type="address" class="form-control form-control-sm" name="post_venta_direccion" id="post_venta_direccion">
                                    </div>
                                </div>

                                <div class="col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">N&uacute;mero</label>
                                        <input type="address" class="form-control form-control-sm" name="post_venta_numero_dir" id="post_venta_numero_dir">
                                    </div>
                                </div>


                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Region</label>
                                        <select id="region_agregar_post_venta" onchange="buscar_ciudad_post_venta();" name="region_agregar_post_venta" class="form-control" required>
                                            <option value="0">Seleccione Regi&oacute;n</option>
                                            @if (isset($regiones))
                                                @foreach ($regiones as $reg)
                                                    <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Ciudad</label>
                                        <select id="ciudad_agregar_post_venta" name="ciudad_agregar_post_venta" class="form-control" required>
                                            <option value="0">Seleccione Ciudad</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                        <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda_post_venta()" name="post_venta_correo" id="post_venta_correo">
                                        <span id="mensaje_email_post_venta" style="display:none"></span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                        <input type="tel" class="form-control form-control-sm" name="post_venta_telefono_uno" id="post_venta_telefono_uno">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="button" id="guardar_post_venta_paciente" onclick="registrar_paciente_nuevo_post_venta();" class="btn btn-info">
                                    Registrar Paciente y Seleccionar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
          @endif
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 pl-0 mt-1">
                        <ul class="nav nav-tabs-secciones mb-2" id="control-aud" role="tablist">
                            <li class="nav-item-secciones">
                                <a class="nav-secciones active text-uppercase" id="control-calibracion-tab" onclick="mis_audifonos()" data-toggle="tab" href="#control-calibracion" role="tab" aria-controls="control-calibracion" aria-selected="true">Control y calibracion de audifonos</a>
                            </li>
                            <li class="nav-item-secciones">
                                <a class="nav-secciones text-uppercase" id="control-mis-productos-tab" data-toggle="tab" href="#control-mis-productos" role="tab" aria-controls="control-mis-productos" aria-selected="false">Control de productos del paciente</a>
                            </li>

                        </ul>
                    </div>

                </div>
                <div class="tab-content" id="control-audContent">
                    <div class="tab-pane fade show active" id="control-calibracion" role="tabpanel" aria-labelledby="control-calibracion-tab">
                        <div class="row">


                            <div class="col-12">
                                <h5 class="text-c-blue f-18">Control de Audífonos</h5>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label class="floating-label-activo-sm">Control de Audifono</label>
                                                <select class="form-control form-control-sm" name="tipo_control_audifono" id="tipo_control_audifono" onchange="evaluar_tipo_control()">
                                                    <option selected>Seleccione</option>
                                                    <option>Propio</option>
                                                    <option>Otro proveedor</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm">Fecha de Control</label>
                                                        <input type="date" class="form-control form-control-sm" name="fecha_ex" id="fecha_ex" value="<?php echo date('Y-m-d') ?>">
                                                    </div>
                                                    @if(isset($profesional))
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm">Examinador</label>
                                                        <input type="text" class="form-control form-control-sm" name="profesional" id="profesional" value="{{ $profesional->nombre }}">
                                                    </div>
                                                    @endif
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm">Examen del Cae</label>
                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ex_fis_control_audif" id="ex_fis_control_audif" placeholder="sintomatología, examen conducto auditivo."></textarea>
                                                    </div>

                                                </div>
                                            </div>
                                            @if(isset($profesional) && isset($id_lugar_atencion))
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div id="pieza_dentalrx" class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-group">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-block"
                                                                onclick="hora_medica({{ $profesional->id }}, {{ $id_lugar_atencion }})"><i
                                                                    class="feather icon-calendar"></i> Agendar
                                                                hora</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-auto">
                                                        <div class="card-informacion"
                                                            style="border: 1px solid #6c9bd5;">
                                                            <div class="card-top text-center">
                                                                <h5 class="text-c-blue">PRÓXIMO CONTROL</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="form-row">
                                                                    <div
                                                                        class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                        <h5 class="text-c-blue"><i
                                                                                class="fas fa-calendar"></i>
                                                                            Fecha:</h5>
                                                                        <h5 class="font-weight-bold" id="proxima_fecha_atencion">
                                                                            {{ isset($proxima_fecha_atencion) ? $proxima_fecha_atencion : '' }}
                                                                        </h5>
                                                                    </div>
                                                                    <div
                                                                        class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                        <h5 class="text-c-blue"><i
                                                                                class="fas fa-clock"></i>
                                                                            Horario:</h5>
                                                                        <p id="proxima_hora_atencion"> <strong id="hora_inicio_atencion">{{ isset($hora_inicio_atencion) ? $hora_inicio_atencion : '--:--' }}</strong>
                                                                            a
                                                                            <strong id="hora_fin_atencion">{{ isset($hora_fin_atencion) ? $hora_fin_atencion : '--:--' }}</strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                <!--Card Información audifono-->

                                    <div class="row" id="lista_audifonos_control">
                                        <!--AUDIFONO IZQUIERDO-->
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="badge badge-izq">AUDÍFONO IZQUIERDO</div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">N° Serie</label>
                                                    {{--  <div> {{ $n_serie_aud_izq" }} </div>  --}}
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                    {{--  <div> {{ $paciente->apellido_uno }}</div>  --}}
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                    {{--  <div> {{ $paciente->apellido_dos }}
                                                    </div>  --}}
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                    <div>
                                                        {{--  @if ($paciente->sexo == 'F')
                                                            Mujer
                                                        @elseif ($paciente->sexo == 'M')
                                                            Hombre
                                                        @endif  --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Fecha de último control</label>
                                                    <div>
                                                        {{--  {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}  --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                    <div> Buena</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--AUDIFONO DERECHO-->
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="badge badge-der">AUDÍFONO DERECHO</div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">N° Serie</label>
                                                    {{--  <div> {{ $paciente->rut }} </div>  --}}
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Marca</label>

                                                    {{--  <div> {{ $paciente->apellido_uno }}</div>  --}}
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    {{--  <label class="font-weight-bolder ml-0 mb-0">Modelo</label>  --}}

                                                    {{--  <div> {{ $paciente->apellido_dos }}
                                                    </div>  --}}
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Modelo</label>
                                                    <div>
                                                        {{--  @if ($paciente->sexo == 'F')
                                                            Mujer
                                                        @elseif ($paciente->sexo == 'M')
                                                            Hombre
                                                        @endif  --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Fecha de último control</label>
                                                    <div>
                                                        {{--  {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}  --}}
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Satisfacción</label>
                                                    <div> Buena</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Formulario para audífonos de otro proveedor --}}
                                    <div class="row d-none" id="div_otro_proveedor">
                                        <div class="col-12">
                                            <div class="card border-info">
                                                <div class="card-header bg-info">
                                                    <h5 class="text-white mb-0">
                                                        <i class="feather icon-package mr-2"></i>
                                                        Registro de Audífono Externo
                                                    </h5>
                                                </div>
                                                <div class="card-body">
                                                    <form id="form_audifono_externo">
                                                        @if(isset($paciente))
                                                        <input type="hidden" id="id_paciente_externo" name="id_paciente" value="{{ $paciente->id }}">
                                                        @endif
                                                        <div class="row">
                                                            <div class="col-12 mb-3">
                                                                <h6 class="text-primary font-weight-bold">
                                                                    <i class="feather icon-info mr-1"></i>
                                                                    Información de Procedencia
                                                                </h6>
                                                                <hr class="mt-2">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Laboratorio / Proveedor <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control form-control-sm" id="procedencia_laboratorio" name="procedencia_laboratorio" placeholder="Ej: Audifono Center, Widex Chile, etc." required>
                                                                <small class="form-text text-muted">Nombre del laboratorio o proveedor externo</small>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Fecha de Adquisición <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control form-control-sm" id="fecha_adquisicion_ext" name="fecha_adquisicion" required>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mb-3 mt-2">
                                                                <h6 class="text-primary font-weight-bold">
                                                                    <i class="feather icon-headphones mr-1"></i>
                                                                    Datos del Audífono Izquierdo
                                                                </h6>
                                                                <hr class="mt-2">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">N° Serie Izquierdo</label>
                                                                <input type="text" class="form-control form-control-sm" id="n_serie_izq_ext" name="n_serie_izquierdo" placeholder="N° Serie">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">Marca <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control form-control-sm" id="marca_izq_ext" name="marca_izquierdo" placeholder="Ej: Phonak, Widex" required>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">Modelo <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control form-control-sm" id="modelo_izq_ext" name="modelo_izquierdo" placeholder="Modelo" required>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">Tipo</label>
                                                                <select class="form-control form-control-sm" id="tipo_izq_ext" name="tipo_izquierdo">
                                                                    <option value="">Seleccione</option>
                                                                    <option value="BTE">Retroauricular (BTE)</option>
                                                                    <option value="ITE">Intraauricular (ITE)</option>
                                                                    <option value="ITC">Intracanal (ITC)</option>
                                                                    <option value="CIC">Completamente en el canal (CIC)</option>
                                                                    <option value="RIC">Receptor en el canal (RIC)</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mb-3 mt-2">
                                                                <h6 class="text-primary font-weight-bold">
                                                                    <i class="feather icon-headphones mr-1"></i>
                                                                    Datos del Audífono Derecho
                                                                </h6>
                                                                <hr class="mt-2">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">N° Serie Derecho</label>
                                                                <input type="text" class="form-control form-control-sm" id="n_serie_der_ext" name="n_serie_derecho" placeholder="N° Serie">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">Marca <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control form-control-sm" id="marca_der_ext" name="marca_derecho" placeholder="Ej: Phonak, Widex" required>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">Modelo <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control form-control-sm" id="modelo_der_ext" name="modelo_derecho" placeholder="Modelo" required>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">Tipo</label>
                                                                <select class="form-control form-control-sm" id="tipo_der_ext" name="tipo_derecho">
                                                                    <option value="">Seleccione</option>
                                                                    <option value="BTE">Retroauricular (BTE)</option>
                                                                    <option value="ITE">Intraauricular (ITE)</option>
                                                                    <option value="ITC">Intracanal (ITC)</option>
                                                                    <option value="CIC">Completamente en el canal (CIC)</option>
                                                                    <option value="RIC">Receptor en el canal (RIC)</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mb-3 mt-2">
                                                                <h6 class="text-primary font-weight-bold">
                                                                    <i class="feather icon-file-text mr-1"></i>
                                                                    Información Adicional
                                                                </h6>
                                                                <hr class="mt-2">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Estado del Audífono</label>
                                                                <select class="form-control form-control-sm" id="estado_audifono_ext" name="estado_audifono">
                                                                    <option value="Excelente">Excelente</option>
                                                                    <option value="Bueno" selected>Bueno</option>
                                                                    <option value="Regular">Regular</option>
                                                                    <option value="Malo">Malo</option>
                                                                    <option value="Requiere reparación">Requiere reparación</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Motivo del Control</label>
                                                                <select class="form-control form-control-sm" id="motivo_control_ext" name="motivo_control">
                                                                    <option value="">Seleccione</option>
                                                                    <option value="Control rutinario">Control rutinario</option>
                                                                    <option value="Calibración">Calibración</option>
                                                                    <option value="Reparación">Reparación</option>
                                                                    <option value="Ajuste">Ajuste de volumen/programación</option>
                                                                    <option value="Limpieza">Limpieza profunda</option>
                                                                    <option value="Cambio de accesorios">Cambio de accesorios</option>
                                                                    <option value="Otro">Otro</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <label class="floating-label-activo-sm">Observaciones del Control</label>
                                                                <textarea class="form-control form-control-sm" id="observaciones_control_ext" name="observaciones" rows="3" placeholder="Describa el estado del audífono, problemas encontrados, ajustes realizados, etc."></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="alert alert-info mb-3" role="alert">
                                                                    <i class="feather icon-info mr-2"></i>
                                                                    <strong>Nota:</strong> Los campos marcados con <span class="text-danger">*</span> son obligatorios
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 d-flex justify-content-end">
                                                                <button type="button" class="btn btn-secondary btn-sm mr-2" onclick="cancelar_audifono_externo()">
                                                                    <i class="feather icon-x mr-1"></i>
                                                                    Cancelar
                                                                </button>
                                                                <button type="button" class="btn btn-primary btn-sm" onclick="guardar_audifono_externo()">
                                                                    <i class="feather icon-save mr-1"></i>
                                                                    Guardar Audífono Externo
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="lista_audifonos_externos"></div>
                                <!--Cierre: Card Datos audifono-->
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="control-mis-productos" role="tabpanel" aria-labelledby="control-mis-productos-tab">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <!-- Card Productos Paciente -->
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <h6 class="tit-gen mb-2">Productos del Paciente</h6>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div id="productos-lista" class="row"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-informacion">
                                                        <div class="card-header">
                                                            <h5 class="card-title">Detalle del Producto</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <input type="hidden" name="id_producto_seleccionado" id="id_producto_seleccionado" value="">
                                                            <div class="form-group">
                                                                <label for="" class="font-weight-bolder ml-0 mb-0">Imagen:</label> <br>
                                                                <img src="" alt="" class="img-fluid rounded" id="detalle-imagen" style="max-height: 150px; max-width: 200px; display: none;">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bolder ml-0 mb-0">Código Interno:</label>
                                                                <div id="detalle-codigo-interno">-</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bolder ml-0 mb-0">Nombre:</label>
                                                                <div id="detalle-nombre">-</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bolder ml-0 mb-0">Descripción:</label>
                                                                <div id="detalle-descripcion">-</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bolder ml-0 mb-0">Número de Serie:</label>
                                                                <div id="detalle-numero-serie">-</div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bolder ml-0 mb-0">Satisfacción:</label>
                                                                <select name="nivel_satisfaccion" id="nivel_satisfaccion" class="form-control form-control-sm">
                                                                    <option value="">Seleccione</option>
                                                                    <option value="1">1 - Muy Insatisfecho</option>
                                                                    <option value="2">2 - Insatisfecho</option>
                                                                    <option value="3">3 - Neutral</option>
                                                                    <option value="4">4 - Satisfecho</option>
                                                                    <option value="5">5 - Muy Satisfecho</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="font-weight-bolder ml-0 mb-0">Calificación:</label>
                                                                <div id="detalle-calificacion" class="rating-display">
                                                                    <span class="text-muted">Sin calificar</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bolder ml-0 mb-0">Observaciones:</label>
                                                                <textarea name="observaciones_satisfaccion" id="observaciones_satisfaccion" class="form-control form-control-sm" rows="3"></textarea>
                                                            </div>
                                                            <button type="button" class="btn btn-primary btn-sm w-100" id="btn-guardar-satisfaccion" onclick="guardar_evaluacion_producto()">Guardar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- Cotización de audífonos y accesorios --}}
    <div class="tab-pane fade show" id="cotizacion_audif" role="tabpanel" aria-labelledby="cotizacion_audif-tab">
      
            <div class="mx-2">
                @if(isset($paciente))
                <input type="hidden" id="id_paciente" name="id_paciente" value="{{ $paciente->id }}">
                @endif
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-c-blue f-18 mb-3">
                            <i class="feather icon-file-text mr-2"></i>
                            Cotización de Productos - Audífonos y Accesorios
                        </h5>
                    </div>
                </div>

                <!-- Información del Paciente/Cliente -->
                @if(isset($paciente))
                <div class="row">
                    <div class="col-12">
                        <div class="card border-primary">
                            <div class="card-header bg-primary">
                                <h6 class="text-white mb-0">
                                    <i class="feather icon-user mr-2"></i>
                                    Información del Cliente
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm">RUT Paciente</label>
                                        <input type="text" class="form-control form-control-sm" id="cotiz_rut_paciente" name="cotiz_rut_paciente" value="{{ $paciente->rut }}" readonly>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Nombre Completo</label>
                                        <input type="text" class="form-control form-control-sm" id="cotiz_nombre_paciente" name="cotiz_nombre_paciente" value="{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}" readonly>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm">Fecha Cotización</label>
                                        <input type="date" class="form-control form-control-sm" id="cotiz_fecha" name="cotiz_fecha" value="<?php echo date('Y-m-d') ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Teléfono Contacto</label>
                                        <input type="text" class="form-control form-control-sm" id="cotiz_telefono" name="cotiz_telefono" placeholder="Ej: +56 9 1234 5678" value="{{ $paciente->telefono_uno }}">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Email</label>
                                        <input type="email" class="form-control form-control-sm" id="cotiz_email" name="cotiz_email" placeholder="correo@ejemplo.com" value="{{ $paciente->email }}">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <label class="floating-label-activo-sm">Validez Cotización (días)</label>
                                        <select class="form-control form-control-sm" id="cotiz_validez" name="cotiz_validez">
                                            <option value="7">7 días</option>
                                            <option value="15" selected>15 días</option>
                                            <option value="30">30 días</option>
                                            <option value="60">60 días</option>
                                            <option value="90">90 días</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <!-- Buscador de Paciente para Cotización -->
                <div class="row">
                    <div class="col-12">
                        <div class="mb-1" id="card_advertencia_paciente_cotiz">
                            {{-- <div class="card-header bg-warning">
                                <h6 class="text-white mb-0">
                                    <i class="feather icon-alert-triangle mr-2"></i>
                                    Paciente Requerido para Cotización
                                </h6>
                            </div> --}}
                            <div class="mt-2">

                                <!-- Buscador -->
                                <div class="card border-primary" id="card_busqueda_paciente_cotiz">
                                    <div class="card-header bg-primary">
                                        <h6 class="text-white mb-0">
                                            <i class="feather icon-search mr-2"></i>
                                            Buscar Paciente / Cliente
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Tipo de búsqueda -->
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <label class="font-weight-bold">Buscar por:</label>
                                                <select class="form-control form-control-sm" id="tipo_busqueda_paciente_cotiz" name="tipo_busqueda_paciente_cotiz" disabled>
                                                    <option value="rut" selected>RUT</option>
                                                    <option value="nombre">Nombre</option>
                                                    <option value="email">Email</option>
                                                </select>
                                            </div>

                                            <!-- Campo de búsqueda -->
                                            <div class="form-group col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                                <label class="font-weight-bold">Término de búsqueda:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm" id="termino_busqueda_paciente_cotiz" oninput="formatoRut(this)" name="termino_busqueda_paciente_cotiz" placeholder="Ingrese RUT del paciente..." onkeypress="if(event.keyCode==13){buscar_paciente_cotizacion(); return false;}">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary btn-sm" type="button" onclick="buscar_paciente_cotizacion()">
                                                            <i class="feather icon-search"></i> Buscar
                                                        </button>
                                                    </div>
                                                </div>
                                                <small class="form-text text-muted">
                                                    <i class="feather icon-info"></i> Presione Enter o haga clic en Buscar
                                                </small>
                                            </div>

                                            <!-- Botón limpiar -->
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                <label class="font-weight-bold d-block">&nbsp;</label>
                                                <button class="btn btn-secondary btn-sm btn-block" type="button" onclick="limpiar_busqueda_paciente_cotiz()">
                                                    <i class="feather icon-x"></i> Limpiar
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Resultados de búsqueda -->
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <div id="resultados_busqueda_paciente_cotiz"></div>
                                                <div id="reserva_agregar_paciente_hora_cotiz" style="display: none;">
                                                    
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Nombres</label>
                                                                <input type="text" required class="form-control form-control-sm" name="cotiz_hora_nombres_paciente" id="cotiz_hora_nombres_paciente">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Primer Apellido</label>
                                                                <input type="text" class="form-control form-control-sm" name="cotiz_hora_apellido_uno" id="cotiz_hora_apellido_uno">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                                <input type="text" class="form-control form-control-sm" name="cotiz_hora_apellido_dos" id="cotiz_hora_apellido_dos">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">F. Nacimiento</label>
                                                                <input type="date" class="form-control form-control-sm" name="cotiz_hora_fecha_nac" id="cotiz_hora_fecha_nac">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Sexo</label>
                                                                <select id="cotiz_hora_sexo" name="cotiz_hora_sexo" class="form-control form-control-sm">
                                                                    <option value="0">Selecione una opci&oacute;n</option>
                                                                    <option value="F">Femenino</option>
                                                                    <option value="M">Masculino</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Profesión u Oficio</label>
                                                                <select id="cotiz_hora_profesion" name="cotiz_hora_profesion" class="form-control form-control-sm">
                                                                    <option value="0">Selecione una opci&oacute;n</option>
                                                                    @if (isset($profesion_oficio))
                                                                        @foreach ($profesion_oficio as $prof_ofic)
                                                                            <option value="{{ $prof_ofic->id }}">{{ $prof_ofic->nombre }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                                                <select id="cotiz_hora_convenio" name="cotiz_hora_convenio" class="form-control form-control-sm">
                                                                    <option value="0">Selecione una opci&oacute;n</option>
                                                                    @if (isset($prevision))
                                                                        @foreach ($prevision as $p)
                                                                            <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9 col-md-9">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                                                <input type="address" class="form-control form-control-sm" name="cotiz_hora_direccion" id="cotiz_hora_direccion">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3 col-md-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">N&uacute;mero</label>
                                                                <input type="address" class="form-control form-control-sm" name="cotiz_hora_numero_dir" id="cotiz_hora_numero_dir">
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Region</label>
                                                                <select id="region_agregar_cotiz" onchange="buscar_ciudad_cotiz();" name="region_agregar_cotiz" class="form-control" required>
                                                                    <option value="0">Seleccione Regi&oacute;n</option>
                                                                    @if (isset($regiones))
                                                                        @foreach ($regiones as $reg)
                                                                            <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Ciudad</label>
                                                                <select id="ciudad_agregar_cotiz" name="ciudad_agregar_cotiz" class="form-control" required>
                                                                    <option value="0">Seleccione Ciudad</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                                                <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda_cotiz()" name="cotiz_hora_correo" id="cotiz_hora_correo">
                                                                <span id="mensaje_email_cotiz" style="display:none"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                                <input type="tel" class="form-control form-control-sm" name="cotiz_hora_telefono_uno" id="cotiz_hora_telefono_uno">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="button" id="guardar_cotiz_paciente" onclick="registrar_paciente_nuevo_cotiz();" class="btn btn-info">
                                                            Registrar Paciente y Seleccionar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tarjeta de Paciente Seleccionado (siempre presente, mostrar/ocultar con JS) -->
                <div class="row" id="card_paciente_seleccionado_cotiz" style="display: none;">
                    <div class="col-12">
                        <div class="card border-success mb-3" style="background-color: #d4edda;">
                            <div class="card-body py-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="feather icon-check text-white" style="font-size: 24px;"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 text-success font-weight-bold">
                                            Paciente Seleccionado
                                        </h6>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <small class="text-muted d-block mb-0">RUT:</small>
                                        <strong id="cotiz_paciente_sel_rut" class="d-block">-</strong>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <small class="text-muted d-block mb-0">Nombre:</small>
                                        <strong id="cotiz_paciente_sel_nombre" class="d-block">-</strong>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <small class="text-muted d-block mb-0">Email:</small>
                                        <strong id="cotiz_paciente_sel_email" class="d-block">-</strong>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <small class="text-muted d-block mb-0">Teléfono:</small>
                                        <strong id="cotiz_paciente_sel_telefono" class="d-block">-</strong>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <small class="text-muted d-block mb-0">Expira en:</small>
                                        <select name="cotiz_validez" id="cotiz_validez" class="form-control form-control-sm">
                                            <option value="7">7 días</option>
                                            <option value="15" selected>15 días</option>
                                            <option value="30">30 días</option>
                                            <option value="60">60 días</option>
                                            <option value="90">90 días</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-right">
                                        
                                        <button type="button" class="btn btn-sm btn-warning" onclick="deseleccionar_paciente()" title="Cambiar paciente">
                                            <i class="feather icon-refresh-cw"></i> Cambiar
                                        </button>
                                    </div>
                                </div>

                                <!-- Campos hidden para sincronización -->
                                <input type="hidden" id="cotiz_rut_paciente" name="cotiz_rut_paciente" value="">
                                <input type="hidden" id="cotiz_nombre_paciente" name="cotiz_nombre_paciente" value="">
                                <input type="hidden" id="cotiz_telefono" name="cotiz_telefono" value="">
                                <input type="hidden" id="cotiz_email" name="cotiz_email" value="">
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                

                <!-- Búsqueda de Productos -->
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card border-success">
                            <div class="card-header bg-success">
                                <h6 class="text-white mb-0">
                                    <i class="feather icon-search mr-2"></i>
                                    Búsqueda de Productos
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Tipo de producto -->
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="font-weight-bolder ml-0 mb-0">Tipo de Producto</label>
                                        <select class="form-control form-control-sm" id="cotiz_tipo_producto" name="cotiz_tipo_producto">
                                            <option value="">Todos</option>
                                            <option value="1" selected>Audífonos</option>
                                            <option value="2">Repuestos</option>
                                            <option value="3">Pilas</option>
                                            <option value="4">Accesorios</option>
                                        </select>
                                    </div>

                                    <!-- Campo de búsqueda -->
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Buscar Producto</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" id="cotiz_buscar_producto" name="cotiz_buscar_producto" placeholder="Código, marca, modelo o nombre del producto">
                                            <div class="input-group-append">
                                                <button class="btn btn-success btn-sm" type="button" onclick="buscar_productos_cotizacion()">
                                                    <i class="feather icon-search"></i> Buscar
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Resumen -->
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="font-weight-bolder ml-0 mb-0">Productos en Cotización</label>
                                        <div class="alert alert-info mb-0 py-2 text-center">
                                            <strong id="cotiz_cantidad_items" class="f-16">0</strong> productos
                                        </div>
                                    </div>
                                </div>

                                <!-- Resultados de búsqueda -->
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div id="cotiz_lista_productos_busqueda"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Productos Cotizados -->
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card border-info">
                            <div class="card-header bg-info">
                                <h6 class="text-white mb-0">
                                    <i class="feather icon-shopping-bag mr-2"></i>
                                    Productos Cotizados
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-sm" id="tabla_productos_cotizacion">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="15%">Código</th>
                                                <th width="30%">Producto</th>
                                                <th width="10%" class="text-center">Cantidad</th>
                                                <th width="12%" class="text-right">Precio Unit.</th>
                                                <th width="10%" class="text-center">Desc. %</th>
                                                <th width="13%" class="text-right">Subtotal</th>
                                                <th width="5%" class="text-center">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cotiz_tbody_productos">
                                            <tr id="cotiz_row_vacio">
                                                <td colspan="8" class="text-center text-muted py-4">
                                                    <i class="feather icon-inbox f-20 d-block mb-2"></i>
                                                    No hay productos agregados a la cotización
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Observaciones y Totales -->
                                <div class="row mt-3">
                                    <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Observaciones / Condiciones Especiales</label>
                                            <textarea class="form-control form-control-sm" id="cotiz_observaciones" name="cotiz_observaciones" rows="4" placeholder="Ej: Incluye garantía de fábrica, instalación sin costo, etc."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Forma de Pago</label>
                                            <select class="form-control form-control-sm" id="cotiz_forma_pago" name="cotiz_forma_pago">
                                                <option value="Efectivo">Efectivo</option>
                                                <option value="Transferencia">Transferencia Bancaria</option>
                                                <option value="Tarjeta Débito">Tarjeta de Débito</option>
                                                <option value="Tarjeta Crédito">Tarjeta de Crédito</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Varios">Varios</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span>Subtotal:</span>
                                                    <strong id="cotiz_subtotal">$0</strong>
                                                </div>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span>Descuento Total:</span>
                                                    <strong id="cotiz_descuento_total" class="text-danger">-$0</strong>
                                                </div>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span>IVA (19%):</span>
                                                    <strong id="cotiz_iva">$0</strong>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <span class="f-18 font-weight-bold">TOTAL:</span>
                                                    <strong id="cotiz_total" class="f-20 text-primary">$0</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Botones de Acción -->
                                <div class="row mt-3">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary btn-sm mr-2" onclick="limpiar_cotizacion()">
                                            <i class="feather icon-x mr-1"></i>
                                            Limpiar
                                        </button>
                                        <button type="button" class="btn btn-warning btn-sm mr-2" onclick="guardar_borrador_cotizacion()">
                                            <i class="feather icon-save mr-1"></i>
                                            Guardar Borrador
                                        </button>
                                        <button type="button" class="btn btn-info btn-sm mr-2" onclick="vista_previa_cotizacion()">
                                            <i class="feather icon-eye mr-1"></i>
                                            Vista Previa
                                        </button>
                                        <button type="button" class="btn btn-success btn-sm mr-2" onclick="generar_cotizacion()">
                                            <i class="feather icon-file-text mr-1"></i>
                                            Generar Cotización
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="enviar_cotizacion_email()">
                                            <i class="feather icon-send mr-1"></i>
                                            Enviar por Email
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Historial de Cotizaciones -->
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">
                                    <i class="feather icon-clock mr-2"></i>
                                    Historial de Cotizaciones del Paciente
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-sm" id="tabla_historial_cotizaciones">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>N° Cotización</th>
                                                <th>Fecha</th>
                                                <th>Válida Hasta</th>
                                                <th>Productos</th>
                                                <th class="text-right">Total</th>
                                                <th>Estado</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody_historial_cotizaciones">
                                            <tr>
                                                <td colspan="7" class="text-center text-muted py-3">
                                                    <i class="feather icon-file-text f-18 d-block mb-2"></i>
                                                    No hay cotizaciones previas
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
       
    </div>

    {{-- Prestamo de audifonos --}}
    <div class="tab-pane fade show" id="prestamo_audif" role="tabpanel" aria-labelledby="prestamo_audif-tab">
        @if(isset($paciente))
        <div class="row">
            <div class="col-12">
                <div class="card border-primary">
                    <div class="card-header bg-primary">
                        <h6 class="text-white mb-0">
                            <i class="feather icon-user mr-2"></i>
                            Información del Cliente
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm">RUT Paciente</label>
                                <input type="text" class="form-control form-control-sm" id="cotiz_rut_paciente" name="cotiz_rut_paciente" value="{{ $paciente->rut }}" readonly>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm">Nombre Completo</label>
                                <input type="text" class="form-control form-control-sm" id="cotiz_nombre_paciente" name="cotiz_nombre_paciente" value="{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}" readonly>
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm">Fecha Cotización</label>
                                <input type="date" class="form-control form-control-sm" id="cotiz_fecha" name="cotiz_fecha" value="<?php echo date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="floating-label-activo-sm">Teléfono Contacto</label>
                                <input type="text" class="form-control form-control-sm" id="cotiz_telefono" name="cotiz_telefono" placeholder="Ej: +56 9 1234 5678" value="{{ $paciente->telefono_uno }}">
                            </div>
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="floating-label-activo-sm">Email</label>
                                <input type="email" class="form-control form-control-sm" id="cotiz_email" name="cotiz_email" placeholder="correo@ejemplo.com" value="{{ $paciente->email }}">
                            </div>
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="floating-label-activo-sm">Validez Cotización (días)</label>
                                <select class="form-control form-control-sm" id="cotiz_validez" name="cotiz_validez">
                                    <option value="7">7 días</option>
                                    <option value="15" selected>15 días</option>
                                    <option value="30">30 días</option>
                                    <option value="60">60 días</option>
                                    <option value="90">90 días</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <h5 class="text-c-blue f-18 mb-3">
            <i class="feather icon-inbox mr-2"></i>
            Préstamo de Audífonos - Selección de Paciente
        </h5>
        <!-- Buscador de Paciente para Préstamo -->
        <div class="row">
            <div class="col-12">
                <div class="mt-1" id="card_advertencia_paciente_prestamo">
                    
                    <div class="mt-1">

                        <!-- Buscador -->
                        <div class="card border-primary" id="card_busqueda_paciente_prestamo">
                            <div class="card-header bg-primary">
                                <h6 class="text-white mb-0">
                                    <i class="feather icon-search mr-2"></i>
                                    Buscar Paciente / Cliente
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Tipo de búsqueda -->
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="font-weight-bold">Buscar por:</label>
                                        <select class="form-control form-control-sm" id="tipo_busqueda_paciente_prestamo" name="tipo_busqueda_paciente_prestamo" disabled>
                                            <option value="rut" selected>RUT</option>
                                            <option value="nombre">Nombre</option>
                                            <option value="email">Email</option>
                                        </select>
                                    </div>

                                    <!-- Campo de búsqueda -->
                                    <div class="form-group col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                        <label class="font-weight-bold">Término de búsqueda:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" id="termino_busqueda_paciente_prestamo" oninput="formatoRut(this)" name="termino_busqueda_paciente_prestamo" placeholder="Ingrese RUT del paciente..." onkeypress="if(event.keyCode==13){buscar_paciente_prestamo(); return false;}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-sm" type="button" onclick="buscar_paciente_prestamo()">
                                                    <i class="feather icon-search"></i> Buscar
                                                </button>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted">
                                            <i class="feather icon-info"></i> Presione Enter o haga clic en Buscar
                                        </small>
                                    </div>

                                    <!-- Botón limpiar -->
                                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <label class="font-weight-bold d-block">&nbsp;</label>
                                        <button class="btn btn-secondary btn-sm btn-block" type="button" onclick="limpiar_busqueda_paciente_prestamo()">
                                            <i class="feather icon-x"></i> Limpiar
                                        </button>
                                    </div>
                                </div>

                                <!-- Resultados de búsqueda -->
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div id="resultados_busqueda_paciente_prestamo"></div>
                                        <div id="reserva_agregar_paciente_hora_prestamo" style="display: none;">   
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Nombres</label>
                                                        <input type="text" required class="form-control form-control-sm" name="prestamo_nombres" id="prestamo_nombres">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Primer Apellido</label>
                                                        <input type="text" class="form-control form-control-sm" name="prestamo_apellido_uno" id="prestamo_apellido_uno">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                        <input type="text" class="form-control form-control-sm" name="prestamo_apellido_dos" id="prestamo_apellido_dos">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">F. Nacimiento</label>
                                                        <input type="date" class="form-control form-control-sm" name="prestamo_fecha_nac" id="prestamo_fecha_nac">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Sexo</label>
                                                        <select id="prestamo_sexo" name="prestamo_sexo" class="form-control form-control-sm">
                                                            <option value="0">Selecione una opci&oacute;n</option>
                                                            <option value="F">Femenino</option>
                                                            <option value="M">Masculino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Profesión u Oficio</label>
                                                        <select id="prestamo_profesion" name="prestamo_profesion" class="form-control form-control-sm">
                                                            <option value="0">Selecione una opci&oacute;n</option>
                                                            @if (isset($profesion_oficio))
                                                                @foreach ($profesion_oficio as $prof_ofic)
                                                                    <option value="{{ $prof_ofic->id }}">{{ $prof_ofic->nombre }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                                        <select id="prestamo_convenio" name="prestamo_convenio" class="form-control form-control-sm">
                                                            <option value="0">Selecione una opci&oacute;n</option>
                                                            @if (isset($prevision))
                                                                @foreach ($prevision as $p)
                                                                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9 col-md-9">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                                        <input type="address" class="form-control form-control-sm" name="prestamo_direccion" id="prestamo_direccion">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3 col-md-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">N&uacute;mero</label>
                                                        <input type="address" class="form-control form-control-sm" name="prestamo_numero_dir" id="prestamo_numero_dir">
                                                    </div>
                                                </div>


                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Region</label>
                                                        <select id="region_agregar_prestamo" onchange="buscar_ciudad_prestamo();" name="region_agregar_prestamo" class="form-control" required>
                                                            <option value="0">Seleccione Regi&oacute;n</option>
                                                            @if (isset($regiones))
                                                                @foreach ($regiones as $reg)
                                                                    <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Ciudad</label>
                                                        <select id="ciudad_agregar_prestamo" name="ciudad_agregar_prestamo" class="form-control" required>
                                                            <option value="0">Seleccione Ciudad</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                                        <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda_prestamo()" name="prestamo_correo" id="prestamo_correo">
                                                        <span id="mensaje_email_prestamo" style="display:none"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                        <input type="tel" class="form-control form-control-sm" name="prestamo_telefono" id="prestamo_telefono">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" id="guardar_prestamo_paciente" onclick="registrar_paciente_nuevo_prestamo();" class="btn btn-info">
                                                    Registrar Paciente y Seleccionar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tarjeta de Paciente Seleccionado (siempre presente, mostrar/ocultar con JS) -->
        <div class="row" id="card_paciente_seleccionado_prestamo" style="display: none;">
            <div class="col-12">
                <div class="card border-success mb-3" style="background-color: #d4edda;">
                    <div class="card-body py-2">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="feather icon-check text-white" style="font-size: 24px;"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h6 class="mb-0 text-success font-weight-bold">
                                    Paciente Seleccionado
                                </h6>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <small class="text-muted d-block mb-0">RUT:</small>
                                <strong id="prestamo_paciente_sel_rut" class="d-block">-</strong>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <small class="text-muted d-block mb-0">Nombre:</small>
                                <strong id="prestamo_paciente_sel_nombre" class="d-block">-</strong>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <small class="text-muted d-block mb-0">Email:</small>
                                <strong id="prestamo_paciente_sel_email" class="d-block">-</strong>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <small class="text-muted d-block mb-0">Teléfono:</small>
                                <strong id="prestamo_paciente_sel_telefono" class="d-block">-</strong>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-right">
                                <button type="button" class="btn btn-sm btn-warning" onclick="deseleccionar_paciente()" title="Cambiar paciente">
                                    <i class="feather icon-refresh-cw"></i> Cambiar
                                </button>
                            </div>
                        </div>

                        <!-- Campos hidden para sincronización -->
                        <input type="hidden" id="prestamo_rut_paciente" name="prestamo_rut_paciente" value="">
                        <input type="hidden" id="prestamo_nombre_paciente" name="prestamo_nombre_paciente" value="">
                        <input type="hidden" id="prestamo_telefono" name="prestamo_telefono" value="">
                        <input type="hidden" id="prestamo_email" name="prestamo_email" value="">
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        <!-- Contenido del préstamo de audífonos aquí -->
        <!-- Card busqueda de audifonos -->
        <div class="card px-3 pb-0 pt-2">
            <div class="row">

                <div class="card-body busqueda_audifono collapse show pt-0" id="busqueda_audifono-1">
                    <form>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-row">
                                    <!-- Tipo de búsqueda -->
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="font-weight-bolder ml-0 mb-0">Tipo de Producto</label>
                                        <select class="form-control form-control-sm" id="tipo_producto_busqueda_prestamo" name="tipo_producto_busqueda_prestamo">
                                            <option value="">Todos</option>
                                            <option value="1" selected>Audífonos</option>
                                            <option value="2">Repuestos</option>
                                            <option value="3">Pilas</option>
                                        </select>
                                    </div>

                                    <!-- Campo de búsqueda -->
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Buscar Producto</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" name="buscar_producto_prestamo" id="buscar_producto_prestamo" onkeyup="enter_buscar_productos_audifono_prestamo(event)" placeholder="Ingrese código, marca, modelo o nombre del producto">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-sm" type="button" onclick="buscar_productos_audifonos_prestamo()">
                                                    <i class="feather icon-search"></i> Buscar
                                                </button>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted">
                                            Presione Enter o haga clic en Buscar para ver resultados
                                        </small>
                                    </div>
                                    <!-- Botón del Carrito -->
                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="font-weight-bolder ml-0 mb-0">Carrito de Préstamo</label>
                                        <div>
                                            <button type="button" class="btn btn-success btn-block" onclick="obtenerCarritoPrestamo()" id="btn-abrir-carrito-prestamo">
                                                <i class="feather icon-shopping-cart"></i> Ver Carrito
                                                <span class="badge badge-light ml-1" id="badge-carrito-prestamo-header" style="display:none;">0</span>
                                            </button>
                                            <small class="form-text text-muted text-center">
                                                <span id="total-carrito-prestamo-header" style="display:none;">Total: $0.00</span>
                                            </small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div id="lista_audifonos_prestamo"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Recepcion de audifonos --}}
    <div class="tab-pane fade show" id="recepcion_audif" role="tabpanel" aria-labelledby="recepcion_audif-tab">
        @if(isset($paciente))

        @else
        <!-- Contenido del recepción de audífonos aquí -->
        <div class="row">
            <div class="col-12">
                <div class="mt-1">
                        <h5 class="text-c-blue f-18 mb-3">
                            <i class="feather icon-inbox mr-2"></i>
                            Recepción de Audífonos en Préstamo
                        </h5>
                        <!-- Tarjeta de Paciente Seleccionado (siempre presente, mostrar/ocultar con JS) -->
                        <div class="row" id="card_paciente_seleccionado_recepcion" style="display: none;">
                            <div class="col-12">
                                <div class="card border-success mb-3" style="background-color: #d4edda;">
                                    <div class="card-body py-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                    <i class="feather icon-check text-white" style="font-size: 24px;"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h6 class="mb-0 text-success font-weight-bold">
                                                    Paciente Seleccionado
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <small class="text-muted d-block mb-0">RUT:</small>
                                                <strong id="recepcion_paciente_sel_rut" class="d-block">-</strong>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                <small class="text-muted d-block mb-0">Nombre:</small>
                                                <strong id="recepcion_paciente_sel_nombre" class="d-block">-</strong>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                <small class="text-muted d-block mb-0">Email:</small>
                                                <strong id="recepcion_paciente_sel_email" class="d-block">-</strong>
                                            </div>
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <small class="text-muted d-block mb-0">Teléfono:</small>
                                                <strong id="recepcion_paciente_sel_telefono" class="d-block">-</strong>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-right">
                                                <button type="button" class="btn btn-sm btn-warning" onclick="deseleccionar_paciente()" title="Cambiar paciente">
                                                    <i class="feather icon-refresh-cw"></i> Cambiar
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Campos hidden para sincronización -->
                                        <input type="hidden" id="recepcion_rut_paciente" name="recepcion_rut_paciente" value="">
                                        <input type="hidden" id="recepcion_nombre_paciente" name="recepcion_nombre_paciente" value="">
                                        <input type="hidden" id="recepcion_telefono" name="recepcion_telefono" value="">
                                        <input type="hidden" id="recepcion_email" name="recepcion_email" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- Buscador de Paciente para Recepción -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mt-1" id="card_advertencia_paciente_recepcion">
                                    
                                    <div class="mt-1">

                                        <!-- Buscador -->
                                        <div class="card border-primary" id="card_busqueda_paciente_recepcion">
                                            <div class="card-header bg-primary">
                                                <h6 class="text-white mb-0">
                                                    <i class="feather icon-search mr-2"></i>
                                                    Buscar Paciente / Cliente
                                                </h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <!-- Tipo de búsqueda -->
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="font-weight-bold">Buscar por:</label>
                                                        <select class="form-control form-control-sm" id="tipo_busqueda_paciente_recepcion" name="tipo_busqueda_paciente_recepcion" disabled>
                                                            <option value="rut" selected>RUT</option>
                                                            <option value="nombre">Nombre</option>
                                                            <option value="email">Email</option>
                                                        </select>
                                                    </div>

                                                    <!-- Campo de búsqueda -->
                                                    <div class="form-group col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                                        <label class="font-weight-bold">Término de búsqueda:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm" id="termino_busqueda_paciente_recepcion" oninput="formatoRut(this)" name="termino_busqueda_paciente_recepcion" placeholder="Ingrese RUT del paciente..." onkeypress="if(event.keyCode==13){buscar_paciente_recepcion(); return false;}">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary btn-sm" type="button" onclick="buscar_paciente_recepcion()">
                                                                    <i class="feather icon-search"></i> Buscar
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <small class="form-text text-muted">
                                                            <i class="feather icon-info"></i> Presione Enter o haga clic en Buscar
                                                        </small>
                                                    </div>

                                                    <!-- Botón limpiar -->
                                                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <label class="font-weight-bold d-block">&nbsp;</label>
                                                        <button class="btn btn-secondary btn-sm btn-block" type="button" onclick="limpiar_busqueda_paciente_recepcion()">
                                                            <i class="feather icon-x"></i> Limpiar
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Resultados de búsqueda -->
                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <div id="resultados_busqueda_paciente_recepcion"></div>
                                                        
                                                        <div id="reserva_agregar_paciente_hora_recepcion" style="display: none;">   
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Nombres</label>
                                                                        <input type="text" required class="form-control form-control-sm" name="recepcion_nombres" id="recepcion_nombres">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Primer Apellido</label>
                                                                        <input type="text" class="form-control form-control-sm" name="recepcion_apellido_uno" id="recepcion_apellido_uno">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                                        <input type="text" class="form-control form-control-sm" name="recepcion_apellido_dos" id="recepcion_apellido_dos">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">F. Nacimiento</label>
                                                                        <input type="date" class="form-control form-control-sm" name="recepcion_fecha_nac" id="recepcion_fecha_nac">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Sexo</label>
                                                                        <select id="recepcion_sexo" name="recepcion_sexo" class="form-control form-control-sm">
                                                                            <option value="0">Selecione una opci&oacute;n</option>
                                                                            <option value="F">Femenino</option>
                                                                            <option value="M">Masculino</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Profesión u Oficio</label>
                                                                        <select id="recepcion_profesion" name="recepcion_profesion" class="form-control form-control-sm">
                                                                            <option value="0">Selecione una opci&oacute;n</option>
                                                                            @if (isset($profesion_oficio))
                                                                                @foreach ($profesion_oficio as $prof_ofic)
                                                                                    <option value="{{ $prof_ofic->id }}">{{ $prof_ofic->nombre }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                                                        <select id="recepcion_convenio" name="recepcion_convenio" class="form-control form-control-sm">
                                                                            <option value="0">Selecione una opci&oacute;n</option>
                                                                            @if (isset($prevision))
                                                                                @foreach ($prevision as $p)
                                                                                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-9 col-md-9">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                                                        <input type="address" class="form-control form-control-sm" name="recepcion_direccion" id="recepcion_direccion">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-3 col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">N&uacute;mero</label>
                                                                        <input type="address" class="form-control form-control-sm" name="recepcion_numero_dir" id="recepcion_numero_dir">
                                                                    </div>
                                                                </div>


                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Region</label>
                                                                        <select id="region_agregar_recepcion" onchange="buscar_ciudad_recepcion();" name="region_agregar_recepcion" class="form-control" required>
                                                                            <option value="0">Seleccione Regi&oacute;n</option>
                                                                            @if (isset($regiones))
                                                                                @foreach ($regiones as $reg)
                                                                                    <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Ciudad</label>
                                                                        <select id="ciudad_agregar_recepcion" name="ciudad_agregar_recepcion" class="form-control" required>
                                                                            <option value="0">Seleccione Ciudad</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                                                        <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda_recepcion()" name="recepcion_correo" id="recepcion_correo">
                                                                        <span id="mensaje_email_recepcion" style="display:none"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                                                        <input type="tel" class="form-control form-control-sm" name="recepcion_telefono" id="recepcion_telefono">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="button" id="guardar_recepcion_paciente" onclick="registrar_paciente_nuevo_recepcion();" class="btn btn-info">
                                                                    Registrar Paciente y Seleccionar
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
        @endif
        <!-- Agrega más contenido según sea necesario -->
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered" id="tabla_historial_productos_prestados">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Producto</th>
                            <th>Estado</th>
                            <th>Observaciones</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_historial_productos_prestados">
                        <tr>
                            <td colspan="6" class="text-center text-muted py-3">
                                <i class="feather icon-inbox f-18 d-block mb-2"></i>
                                No hay productos en préstamo
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($profesional->id_tipo_institucion == 3)

        <div class="tab-pane fade show" id="campanas_promocionales" role="tabpanel" aria-labelledby="campanas_promocionales-tab">
            <div class="mt-1">
                <div class="mt-1">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="text-c-blue f-18 mb-3">
                                <i class="feather icon-megaphone mr-2"></i>
                                Campañas Promocionales
                            </h5>
                        </div>
                    </div>

                    <!-- Formulario para crear campaña -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card border-info">
                                <div class="card-header bg-info">
                                    <h6 class="text-white mb-0">
                                        <i class="feather icon-mail mr-2"></i>
                                        Nueva Campaña de Email
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <form id="form_campana_promocional" onsubmit="enviar_campana_promocional(); return false;" enctype="multipart/form-data">
                                    
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold">Título de la Campaña</label>
                                                <input type="text" class="form-control" id="campana_titulo" name="campana_titulo" maxlength="100" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold">Remitente</label>
                                                <input type="email" class="form-control" id="campana_remitente" name="campana_remitente" value="{{ $profesional->email ?? '' }}" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="font-weight-bold">Mensaje</label>
                                                   <textarea class="form-control" id="campana_mensaje" name="campana_mensaje" rows="6" placeholder="Escribe aquí el contenido del correo..." ></textarea>
                                                   <small class="form-text text-muted">Puedes dar formato al mensaje usando el editor.</small>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold">Destinatarios</label>
                                                <div id="campana_destinatarios_checks">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="campana_destinatarios[]" id="check_pacientes" value="pacientes" checked onclick="actualizar_lista_destinatarios()">
                                                        <label class="form-check-label" for="check_pacientes">Todos los Pacientes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="campana_destinatarios[]" id="check_profesionales" value="profesionales" onclick="actualizar_lista_destinatarios()">
                                                        <label class="form-check-label" for="check_profesionales">Todos los Profesionales</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="campana_destinatarios[]" id="check_personal" value="personal" onclick="actualizar_lista_destinatarios()">
                                                        <label class="form-check-label" for="check_personal">Personal del Centro</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="campana_destinatarios[]" id="check_custom" value="custom" onclick="actualizar_lista_destinatarios()">
                                                        <label class="form-check-label" for="check_custom">Seleccionar manualmente</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold">Filtros adicionales</label>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="filtro_sexo_m" name="filtro_sexo[]" value="M">
                                                        <label class="form-check-label" for="filtro_sexo_m">Masculino</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="filtro_sexo_f" name="filtro_sexo[]" value="F">
                                                        <label class="form-check-label" for="filtro_sexo_f">Femenino</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="filtro_tercera_edad" name="filtro_tercera_edad" value="1">
                                                        <label class="form-check-label" for="filtro_tercera_edad">Tercera Edad (+65)</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="filtro_pacientes_audifonos" name="filtro_pacientes_audifonos" value="1">
                                                        <label class="form-check-label" for="filtro_pacientes_audifonos">Pacientes con Audífonos</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6" id="div_destinatarios_custom" style="display:none;">
                                                <label class="font-weight-bold">Correos manuales (separados por coma)</label>
                                                <input type="text" class="form-control" id="campana_destinatarios_custom" name="campana_destinatarios_custom" placeholder="correo1@dominio.com, correo2@dominio.com">
                                            </div>
                                        </div>
                                       
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="font-weight-bold">Vista Previa de Destinatarios</label>
                                                <div class="border p-2" style="height: 100px; overflow-y: auto; background-color: #f8f9fa;">
                                                    <small id="lista_destinatarios_preview" class="text-muted">Ningún destinatario seleccionado.</small>
                                                </div>
                                                <small class="form-text text-muted">Aquí se mostrarán los correos electrónicos de los destinatarios seleccionados.</small>
                                            </div>
                                        </div>
                                        <!-- dropzone -->
                                        <div class="form-row">
                                            <!-- Archivos Adjuntos -->
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold">Archivos Adjuntos</label>
                                                <input type="file" name="archivos[]" id="archivos" multiple class="form-control">
                                            </div>
                                            <!-- Imágenes en la campaña -->
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold">Imágenes en la campaña</label>
                                                <input type="file" name="imagenes[]" id="imagenes" multiple class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12 text-right">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="feather icon-send"></i> Enviar Campaña
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Historial de campañas enviadas -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-secondary">
                                <div class="card-header bg-secondary">
                                    <h6 class="text-white mb-0">
                                        <i class="feather icon-list mr-2"></i>
                                        Historial de Campañas
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-sm" id="tabla_historial_campanas">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Título</th>
                                                    <th>Fecha</th>
                                                    <th>Remitente</th>
                                                    <th>Destinatarios</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="campanas_promocionales_lista">
                                                <tr>
                                                    <td colspan="6" class="text-center text-muted py-3">
                                                        <i class="feather icon-mail f-18 d-block mb-2"></i>
                                                        No hay campañas promocionales enviadas
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- modal modal_detalle_campana -->
<div class="modal fade" id="modal_detalle_campana" tabindex="-1" role="dialog" aria-labelledby="modal_detalle_campana_label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content shadow-lg rounded">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title font-weight-bold" id="modal_detalle_campana_label">
                    <i class="feather icon-megaphone mr-2"></i> Detalle de Campaña Promocional
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_detalle_campana_body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card border-primary h-100">
                            <div class="card-body py-2">
                                <h6 class="font-weight-bold text-primary mb-2"><i class="feather icon-tag mr-1"></i> Título</h6>
                                <p id="detalle_campana_titulo" class="mb-0 text-dark">-</p>
                                <hr>
                                <h6 class="font-weight-bold text-primary mb-2"><i class="feather icon-user mr-1"></i> Remitente</h6>
                                <p id="detalle_campana_remitente" class="mb-0 text-dark">-</p>
                                <hr>
                                <h6 class="font-weight-bold text-primary mb-2"><i class="feather icon-users mr-1"></i> Destinatarios</h6>
                                <p id="detalle_campana_destinatarios" class="mb-0 text-dark">-</p>
                                <hr>
                                <h6 class="font-weight-bold text-primary mb-2"><i class="feather icon-paperclip mr-1"></i> Detalle envio</h6>
                                <div id="detalle_campana_detalle_envio" class="bg-light p-2 rounded text-dark" style="min-height: 80px;">-</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card border-info h-100">
                            <div class="card-body py-2">
                                <h6 class="font-weight-bold text-info mb-2"><i class="feather icon-message-square mr-1"></i> Mensaje</h6>
                                <div id="detalle_campana_mensaje" class="bg-light p-2 rounded text-dark" style="min-height: 120px;">-</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                    <i class="feather icon-x"></i> Cerrar
                </button>
                <button type="button" class="btn btn-success" id="btn_enviar_campana" style="display:none;" onclick="enviarCampanaPendiente()">
                    <i class="feather icon-send"></i> Enviar/Procesar campaña
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabla_historial_campanas').DataTable();
        $('#tabla_historial_productos_prestados').DataTable();
        // Inicialización de pestañas
        $('#atencionTabs a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });

        // Cargar historial de cotizaciones si hay paciente seleccionado
        @if(isset($paciente))
            cargar_historial_cotizaciones("{{ $paciente->rut }}");
        @endif

        // Cargar campañas promocionales si aplica
        @if($profesional->id_tipo_institucion == 3)
            cargar_historial_campanas();
        @endif
    });
    /**
 * Buscar paciente para venta de audífonos
 */
function buscar_paciente_venta() {
    const tipoBusqueda = $('#tipo_busqueda_paciente').val();
    const termino = $('#termino_busqueda_paciente').val().trim();

    if (!termino || termino === '') {
        swal('Atención', 'Por favor ingrese un término de búsqueda', 'warning');
        return;
    }

    // Mostrar loader
    $('#resultados_busqueda_paciente').html(`
        <div class="text-center py-4">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Buscando...</span>
            </div>
            <p class="mt-2">Buscando pacientes...</p>
        </div>
    `);

    // Petición AJAX (ajusta la ruta según tu configuración)
    $.ajax({
        url: "{{ route('profesional.buscar_rut_paciente') }}",
        method: 'GET',
        dataType: 'json', // Especificamos que esperamos JSON
        data: {
            tipo: tipoBusqueda,
            rut: termino
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log('Respuesta recibida:', response);
            console.log('Tipo de respuesta:', typeof response);

            // Si la respuesta es un objeto paciente directamente
            if (response && response.id) {
                mostrar_resultado_paciente(response);
                $('#reserva_agregar_paciente_hora').hide();
            } else {
                $('#resultados_busqueda_paciente').html(`
                    <div class="alert alert-warning">
                        <i class="feather icon-alert-circle mr-2"></i>
                        No se encontró ningún paciente con ese RUT.
                    </div>
                `);
                $('#reserva_agregar_paciente_hora').show();
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en búsqueda:', xhr);
            console.error('Status:', status);
            console.error('Error:', error);

            let mensajeError = 'Error al buscar pacientes. Por favor intente nuevamente.';

            // Si hay una respuesta JSON del servidor con mensaje de error
            if (xhr.responseJSON && xhr.responseJSON.message) {
                mensajeError = xhr.responseJSON.message;
            }

            $('#resultados_busqueda_paciente').html(`
                <div class="alert alert-danger">
                    <i class="feather icon-alert-circle mr-2"></i>
                    ${mensajeError}
                </div>
            `);
        }
    });
}

/**
 * Buscar paciente para atencion productos post venta
 */

 function buscar_paciente_venta_post_venta() {
    const tipoBusqueda = $('#tipo_busqueda_paciente_post_venta').val();
    const termino = $('#termino_busqueda_paciente_post_venta').val().trim();

    if (!termino || termino === '') {
        swal('Atención', 'Por favor ingrese un término de búsqueda', 'warning');
        return;
    }

    // Mostrar loader
    $('#resultados_busqueda_paciente_post_venta').html(`
        <div class="text-center py-4">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Buscando...</span>
            </div>
            <p class="mt-2">Buscando pacientes...</p>
        </div>
    `);

    // Petición AJAX (ajusta la ruta según tu configuración)
    $.ajax({
        url: "{{ route('profesional.buscar_rut_paciente') }}",
        method: 'GET',
        dataType: 'json', // Especificamos que esperamos JSON
        data: {
            tipo: tipoBusqueda,
            rut: termino
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log('Respuesta recibida:', response);
            console.log('Tipo de respuesta:', typeof response);

            // Si la respuesta es un objeto paciente directamente
            if (response && response.id) {
                mostrar_resultado_paciente_post_venta(response);
                $('#reserva_agregar_paciente_hora_post_venta').hide();
            } else {
                $('#resultados_busqueda_paciente_post_venta').html(`
                    <div class="alert alert-warning">
                        <i class="feather icon-alert-circle mr-2"></i>
                        No se encontró ningún paciente con ese RUT.
                    </div>
                `);
                $('#reserva_agregar_paciente_hora_post_venta').show();
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en búsqueda:', xhr);
            console.error('Status:', status);
            console.error('Error:', error);

            let mensajeError = 'Error al buscar pacientes. Por favor intente nuevamente.';

            // Si hay una respuesta JSON del servidor con mensaje de error
            if (xhr.responseJSON && xhr.responseJSON.message) {
                mensajeError = xhr.responseJSON.message;
            }

            $('#resultados_busqueda_paciente').html(`
                <div class="alert alert-danger">
                    <i class="feather icon-alert-circle mr-2"></i>
                    ${mensajeError}
                </div>
            `);
        }
    });
}

/**
 * bUSCAR PACIENTE PARA PRÉSTAMO DE AUDÍFONOS
 */

function buscar_paciente_prestamo(){
    const tipoBusqueda = $('#tipo_busqueda_paciente_prestamo').val();
    const termino = $('#termino_busqueda_paciente_prestamo').val().trim();

    if (!termino || termino === '') {
        swal('Atención', 'Por favor ingrese un término de búsqueda', 'warning');
        return;
    }

    // Mostrar loader
    $('#resultados_busqueda_paciente_prestamo').html(`
        <div class="text-center py-4">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Buscando...</span>
            </div>
            <p class="mt-2">Buscando pacientes...</p>
        </div>
    `);

    // Petición AJAX (ajusta la ruta según tu configuración)
    $.ajax({
        url: "{{ route('profesional.buscar_rut_paciente') }}",
        method: 'GET',
        dataType: 'json', // Especificamos que esperamos JSON
        data: {
            tipo: tipoBusqueda,
            rut: termino
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log('Respuesta recibida:', response);
            console.log('Tipo de respuesta:', typeof response);

            // Si la respuesta es un objeto paciente directamente
            if (response && response.id) {
                mostrar_resultado_paciente_prestamo(response);
                $('#reserva_agregar_paciente_hora_prestamo').hide();
            } else {
                $('#resultados_busqueda_paciente_prestamo').html(`
                    <div class="alert alert-warning">
                        <i class="feather icon-alert-circle mr-2"></i>
                        No se encontró ningún paciente con ese RUT.
                    </div>
                `);
                $('#reserva_agregar_paciente_hora_prestamo').show();
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en búsqueda:', xhr);
            console.error('Status:', status);
            console.error('Error:', error);

            let mensajeError = 'Error al buscar pacientes. Por favor intente nuevamente.';

            // Si hay una respuesta JSON del servidor con mensaje de error
            if (xhr.responseJSON && xhr.responseJSON.message) {
                mensajeError = xhr.responseJSON.message;
            }

            $('#resultados_busqueda_paciente_prestamo').html(`
                <div class="alert alert-danger">
                    <i class="feather icon-alert-circle mr-2"></i>
                    ${mensajeError}
                </div>
            `);
        }
    });
}

/**
 * Buscar paciente para recepción de audífonos
 */
    function buscar_paciente_recepcion(){
        const tipoBusqueda = $('#tipo_busqueda_paciente_recepcion').val();
        const termino = $('#termino_busqueda_paciente_recepcion').val().trim();
    
        if (!termino || termino === '') {
            swal('Atención', 'Por favor ingrese un término de búsqueda', 'warning');
            return;
        }
    
        // Mostrar loader
        $('#resultados_busqueda_paciente_recepcion').html(`
            <div class="text-center py-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Buscando...</span>
                </div>
                <p class="mt-2">Buscando pacientes...</p>
            </div>
        `);
    
        // Petición AJAX (ajusta la ruta según tu configuración)
        $.ajax({
            url: "{{ route('profesional.buscar_rut_paciente') }}",
            method: 'GET',
            dataType: 'json', // Especificamos que esperamos JSON
            data: {
                tipo: tipoBusqueda,
                rut: termino
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Respuesta recibida:', response);
                console.log('Tipo de respuesta:', typeof response);
    
                // Si la respuesta es un objeto paciente directamente
                if (response && response.id) {
                    mostrar_resultado_paciente_recepcion(response);
                    $('#reserva_agregar_paciente_hora_recepcion').hide();
                } else {
                    $('#resultados_busqueda_paciente_recepcion').html(`
                        <div class="alert alert-warning">
                            <i class="feather icon-alert-circle mr-2"></i>
                            No se encontró ningún paciente con ese RUT.
                        </div>
                    `);
                    $('#reserva_agregar_paciente_hora_recepcion').show();
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en búsqueda:', xhr);
                console.error('Status:', status);
                console.error('Error:', error);
    
                let mensajeError = 'Error al buscar pacientes. Por favor intente nuevamente.';
    
                // Si hay una respuesta JSON del servidor con mensaje de error
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    mensajeError = xhr.responseJSON.message;
                }
    
                $('#resultados_busqueda_paciente_recepcion').html(`
                    <div class="alert alert-danger">
                        <i class="feather icon-alert-circle mr-2"></i>
                        ${mensajeError}
                    </div>
                `);
            }
        });
    }

/**
 * Formatear RUT
 */
function formatoRut(rut)
    {
        var valor = rut.value.replace('.','');
        valor = valor.replace(/\-/g,'');

        cuerpo = valor.slice(0,-1);
        dv = valor.slice(-1).toUpperCase();
        rut.value = cuerpo + '-'+ dv

        if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

        suma = 0;
        multiplo = 2;

        for(i=1;i<=cuerpo.length;i++)
        {
            index = multiplo * valor.charAt(cuerpo.length - i);
            suma = suma + index;
            if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
        }

        dvEsperado = 11 - (suma % 11);
        dv = (dv == 'K')?10:dv;
        dv = (dv == 0)?11:dv;

        if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

        rut.setCustomValidity('');
    }

/**
 * Mostrar resultado de búsqueda de un solo paciente (por RUT)
 */
function mostrar_resultado_paciente(paciente) {
    const nombre = `${paciente.nombres || ''} ${paciente.apellido_uno || ''} ${paciente.apellido_dos || ''}`.trim();
    const rut = paciente.rut || 'N/A';
    const email = paciente.email || 'Sin email';
    const telefono = paciente.telefono_uno || paciente.telefono || 'Sin teléfono';
    const edad = paciente.edad || 'N/A';
    const prevision = paciente.prevision?.nombre || 'Sin previsión';

    let html = `
        <div class="card border-success mb-3">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="mb-2">
                            <i class="feather icon-user text-success mr-2"></i>
                            ${nombre}
                        </h5>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">RUT:</small>
                                <strong>${rut}</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Edad:</small>
                                <strong>${edad} años</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Teléfono:</small>
                                <strong>${telefono}</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Email:</small>
                                <strong>${email}</strong>
                            </div>
                            <div class="col-md-12 mb-2">
                                <small class="text-muted d-block">Previsión:</small>
                                <strong>${prevision}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="button" class="btn btn-success btn-lg btn-block"
                                onclick="seleccionar_paciente_venta(${paciente.id}, '${rut}', '${nombre}', '${telefono}', '${email}')">
                            <i class="feather icon-check-circle mr-2"></i>
                            Seleccionar Paciente
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-sm btn-block mt-2"
                                onclick="limpiar_busqueda_paciente()">
                            <i class="feather icon-x mr-1"></i>
                            Buscar otro
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;

    $('#resultados_busqueda_paciente').html(html);
}

/**
 *
 * Mostrar resultado de búsqueda de un solo paciente (por RUT) para post venta
 */
function mostrar_resultado_paciente_post_venta(paciente) {
    const nombre = `${paciente.nombres || ''} ${paciente.apellido_uno || ''} ${paciente.apellido_dos || ''}`.trim();
    const rut = paciente.rut || 'N/A';
    const email = paciente.email || 'Sin email';
    const telefono = paciente.telefono_uno || paciente.telefono || 'Sin teléfono';
    const edad = paciente.edad || 'N/A';
    const prevision = paciente.prevision?.nombre || 'Sin previsión';

    let html = `
        <div class="card border-success mb-3">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="mb-2">
                            <i class="feather icon-user text-success mr-2"></i>
                            ${nombre}
                        </h5>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">RUT:</small>
                                <strong>${rut}</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Edad:</small>
                                <strong>${edad} años</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Teléfono:</small>
                                <strong>${telefono}</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Email:</small>
                                <strong>${email}</strong>
                            </div>
                            <div class="col-md-12 mb-2">
                                <small class="text-muted d-block">Previsión:</small>
                                <strong>${prevision}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="button" class="btn btn-success btn-lg btn-block"
                                onclick="seleccionar_paciente_post_venta(${paciente.id}, '${rut}', '${nombre}', '${telefono}', '${email}')">
                            <i class="feather icon-check-circle mr-2"></i>
                            Seleccionar Paciente
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-sm btn-block mt-2"
                                onclick="limpiar_busqueda_paciente()">
                            <i class="feather icon-x mr-1"></i>
                            Buscar otro
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;

    $('#resultados_busqueda_paciente_post_venta').html(html);
}


/** 
 * MOSTRAR RESULTADO DE BÚSQUEDA DE UN SOLO PACIENTE (POR RUT) PARA PRÉSTAMO DE AUDÍFONOS
 */

function mostrar_resultado_paciente_prestamo(paciente) {
    const nombre = `${paciente.nombres || ''} ${paciente.apellido_uno || ''} ${paciente.apellido_dos || ''}`.trim();
    const rut = paciente.rut || 'N/A';
    const email = paciente.email || 'Sin email';
    const telefono = paciente.telefono_uno || paciente.telefono || 'Sin teléfono';
    const edad = paciente.edad || 'N/A';
    const prevision = paciente.prevision?.nombre || 'Sin previsión';

     let html = `
        <div class="card border-success mb-3">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="mb-2">
                            <i class="feather icon-user text-success mr-2"></i>
                            ${nombre}
                        </h5>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">RUT:</small>
                                <strong>${rut}</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Edad:</small>
                                <strong>${edad} años</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Teléfono:</small>
                                <strong>${telefono}</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Email:</small>
                                <strong>${email}</strong>
                            </div>
                            <div class="col-md-12 mb-2">
                                <small class="text-muted d-block">Previsión:</small>
                                <strong>${prevision}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="button" class="btn btn-success btn-lg btn-block"
                                onclick="seleccionar_paciente_prestamo(${paciente.id}, '${rut}', '${nombre}', '${telefono}', '${email}')">
                            <i class="feather icon-check-circle mr-2"></i>
                            Seleccionar Paciente
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-sm btn-block mt-2"
                                onclick="limpiar_busqueda_paciente()">
                            <i class="feather icon-x mr-1"></i>
                            Buscar otro
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;

    $('#resultados_busqueda_paciente_prestamo').html(html);
}

function validar_email_venta(){
        if ($("#venta_correo").val().indexOf('@', 0) == -1 || $("#venta_correo")
            .val().indexOf(
                '.', 0) == -1) {
            swal({
                title: "El correo electrónico introducido no es correcto.",
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            })
            // alert('El correo electrónico introducido no es correcto.');
            $("#guardar_reserva_paciente").prop('disabled', true);
            return false;
        }

        let email = $('#venta_correo').val();
        let url = "#";

        $.ajax({
            url: url,
            type: "get",
            data: {

                email: email,

            }

        })
        .done(function(data) {
            if (data == 'fail') {

                // console.log(data);

                $('#mensaje_email_venta').text('el email ya esta en nuestros registros');
                $('#mensaje_email_venta').show();
                $('#venta_correo').focus();

                $("#guardar_reserva_paciente").prop('disabled', true);

            } else {
                $('#mensaje_email_venta').text('');
                $('#mensaje_email_venta').hide();
                $("#guardar_reserva_paciente").prop('disabled', false);
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

/**
 * Mostrar resultado de búsqueda de paciente en la sección de recepción
 * */
 function mostrar_resultado_paciente_recepcion(paciente) {
    const nombre = `${paciente.nombres || ''} ${paciente.apellido_uno || ''} ${paciente.apellido_dos || ''}`.trim();
    const rut = paciente.rut || 'N/A';
    const email = paciente.email || 'Sin email';
    const telefono = paciente.telefono_uno || paciente.telefono || 'Sin teléfono';
    const edad = paciente.edad || 'N/A';
    const prevision = paciente.prevision?.nombre || 'Sin previsión';

    let html = `
        <div class="card border-success mb-3">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="mb-2">
                            <i class="feather icon-user text-success mr-2"></i>
                            ${nombre}
                        </h5>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">RUT:</small>
                                <strong>${rut}</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Edad:</small>
                                <strong>${edad} años</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Teléfono:</small>
                                <strong>${telefono}</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Email:</small>
                                <strong>${email}</strong>
                            </div>
                            <div class="col-md-12 mb-2">
                                <small class="text-muted d-block">Previsión:</small>
                                <strong>${prevision}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="button" class="btn btn-success btn-lg btn-block"
                                onclick="seleccionar_paciente_recepcion(${paciente.id}, '${rut}', '${nombre}', '${telefono}', '${email}')">
                            <i class="feather icon-check-circle mr-2"></i>
                            Seleccionar Paciente
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-sm btn-block mt-2"
                                onclick="limpiar_busqueda_paciente()">
                            <i class="feather icon-x mr-1"></i>
                            Buscar otro
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;

    $('#resultados_busqueda_paciente_recepcion').html(html);
}

/**
 * Seleccionar paciente UNIFICADO - Sincroniza en ambas pestañas (Venta y Post Venta)
 */
function seleccionar_paciente_venta(id, rut, nombre, telefono, email) {
    // Guardar ID del paciente en TODOS los campos hidden (incluyendo el de la vista padre)
    $('#paciente_seleccionado_id').val(id);
    $('#paciente_seleccionado_id_post_venta').val(id);
    $('#id_paciente_fc').val(id); // Campo de la vista padre

    // Actualizar card de VENTA
    $('#paciente_sel_rut').text(rut);
    $('#paciente_sel_nombre').text(nombre);
    $('#paciente_sel_email').text(email);
    $('#paciente_sel_telefono').text(telefono);
    $('#card_paciente_seleccionado').removeClass('d-none');
    $('#card_busqueda_paciente').hide();

    // Actualizar card de POST VENTA (si existe)
    if ($('#card_paciente_seleccionado_post_venta').length > 0) {
        $('#paciente_sel_rut_post_venta').text(rut);
        $('#paciente_sel_nombre_post_venta').text(nombre);
        $('#paciente_sel_email_post_venta').text(email);
        $('#paciente_sel_telefono_post_venta').text(telefono);
        $('#card_paciente_seleccionado_post_venta').removeClass('d-none');

        $('#card_busqueda_paciente_post_venta').hide();
    }

    // Actualizar card de COTIZACIÓN (si existe)
    if ($('#card_paciente_seleccionado_cotiz').length > 0) {
        $('#cotiz_rut_paciente').val(rut);
        $('#cotiz_nombre_paciente').val(nombre);
        $('#cotiz_telefono').val(telefono || '');
        $('#cotiz_email').val(email || '');

        $('#cotiz_paciente_sel_rut').text(rut);
        $('#cotiz_paciente_sel_nombre').text(nombre);
        $('#cotiz_paciente_sel_telefono').text(telefono);
        $('#cotiz_paciente_sel_email').text(email || 'No registrado');

        $('#card_paciente_seleccionado_cotiz').show();
        $('#card_busqueda_paciente_cotiz').hide();
    }

    // Actualizar card de PRÉSTAMO DE AUDÍFONOS (si existe)
    if ($('#card_paciente_seleccionado_prestamo').length > 0) {
        $('#prestamo_paciente_sel_rut').text(rut);
        $('#prestamo_paciente_sel_nombre').text(nombre);
        $('#prestamo_paciente_sel_email').text(email);
        $('#prestamo_paciente_sel_telefono').text(telefono);
        
        $('#card_paciente_seleccionado_prestamo').show();
        $('#card_busqueda_paciente_prestamo').hide();

        $('#card_advertencia_paciente_prestamo').hide();
        $('#card_busqueda_paciente_prestamo').hide();
    }

    // Actualizar card de RECEPCIÓN DE AUDÍFONOS (si existe)
    if ($('#card_paciente_seleccionado_recepcion').length > 0) {
        $('#recepcion_paciente_sel_rut').text(rut);
        $('#recepcion_paciente_sel_nombre').text(nombre);
        $('#recepcion_paciente_sel_email').text(email);
        $('#recepcion_paciente_sel_telefono').text(telefono);
        
        $('#card_paciente_seleccionado_recepcion').show();
        $('#card_busqueda_paciente_recepcion').hide();

        $('#card_advertencia_paciente_recepcion').hide();
        $('#card_busqueda_paciente_recepcion').hide();
    }

    // Limpiar resultados de búsqueda de TODAS las pestañas
    $('#resultados_busqueda_paciente').html('');
    $('#termino_busqueda_paciente').val('');
    $('#resultados_busqueda_paciente_post_venta').html('');
    $('#termino_busqueda_paciente_post_venta').val('');
    $('#resultados_busqueda_paciente_cotiz').html('');
    $('#termino_busqueda_paciente_cotiz').val('');
    $('#resultados_busqueda_paciente_prestamo').html('');
    $('#termino_busqueda_paciente_prestamo').val('');

    // Cargar productos del paciente seleccionado (para post venta)
    if (typeof mis_productos === 'function') {
        mis_productos(id);
    }
    if (typeof mis_audifonos === 'function') {
        mis_audifonos(id);
    }

    // Mensaje de éxito
    swal({
        title: 'Paciente seleccionado',
        text: `${nombre} ha sido seleccionado para toda la atención`,
        icon: 'success',
        timer: 1500,
        buttons: false
    });

    console.log(`Paciente ID ${id} seleccionado y sincronizado en todos los campos (id_paciente_fc incluido)`);
}

/**
 * Seleccionar paciente para post venta - Llama a la función unificada
 */
function seleccionar_paciente_post_venta(id, rut, nombre, telefono, email) {
    // Reutilizar la función unificada
    seleccionar_paciente_venta(id, rut, nombre, telefono, email);
}



/**
 * Deseleccionar paciente UNIFICADO - Limpia en ambas pestañas
 */
function deseleccionar_paciente() {
    swal({
        title: '¿Cambiar paciente?',
        text: "Se perderá la selección actual en todas las pestañas",
        icon: 'warning',
        buttons: {
            cancel: {
                text: 'Cancelar',
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: 'Sí, cambiar',
                value: true,
                closeModal: true
            }
        }
    }).then((willChange) => {
        if (willChange) {
            // Limpiar TODOS los campos hidden (incluyendo el de la vista padre)
            $('#paciente_seleccionado_id').val('');
            $('#paciente_seleccionado_id_post_venta').val('');
            $('#id_paciente_fc').val(''); // Campo de la vista padre

            // Limpiar campos de cotización
            $('#cotiz_rut_paciente').val('');
            $('#cotiz_nombre_paciente').val('');
            $('#cotiz_telefono').val('');
            $('#cotiz_email').val('');

            $('#card_busqueda_paciente').show();
            $('#card_advertencia_paciente').show();

            // Ocultar TODAS las cards de paciente seleccionado
            $('#card_paciente_seleccionado').addClass('d-none');
            if ($('#card_paciente_seleccionado_post_venta').length > 0) {
                $('#card_paciente_seleccionado_post_venta').addClass('d-none');
                $('#card_advertencia_paciente_post_venta').show();
                $('#card_busqueda_paciente_post_venta').show();
            }
            if ($('#card_paciente_seleccionado_cotiz').length > 0) {
                $('#card_paciente_seleccionado_cotiz').hide();
                $('#card_advertencia_paciente_cotiz').show();
                $('#card_busqueda_paciente_cotiz').show();
            }

            if($('#card_paciente_seleccionado_prestamo').length > 0) {
                $('#card_paciente_seleccionado_prestamo').hide();
                $('#card_advertencia_paciente_prestamo').show();
                $('#card_busqueda_paciente_prestamo').show();
            }

            if($('#card_paciente_seleccionado_recepcion').length > 0) {
                $('#card_paciente_seleccionado_recepcion').hide();
                $('#card_advertencia_paciente_recepcion').show();
                $('#card_busqueda_paciente_recepcion').show();
            }

            // Limpiar campos de búsqueda de TODAS las pestañas
            $('#termino_busqueda_paciente').val('');
            $('#resultados_busqueda_paciente').html('');
            $('#termino_busqueda_paciente_post_venta').val('');
            $('#resultados_busqueda_paciente_post_venta').html('');
            $('#termino_busqueda_paciente_cotiz').val('');
            $('#resultados_busqueda_paciente_cotiz').html('');
            $('#termino_busqueda_paciente_prestamo').val('');
            $('#resultados_busqueda_paciente_prestamo').html('');
            $('#termino_busqueda_paciente_recepcion').val('');
            $('#resultados_busqueda_paciente_recepcion').html('');

            // Limpiar listas de productos
            $('#productos-lista').html('');
            $('#lista_audifonos_control').html('');

            swal('Paciente deseleccionado', 'Puede buscar otro paciente', 'success');

            console.log('Todos los campos de paciente limpiados (incluyendo id_paciente_fc y cotización)');
        }
    });
}/**
 * Deseleccionar paciente desde post venta - Llama a la función unificada
 */
function deseleccionar_paciente_post_venta() {
    deseleccionar_paciente();
}

/**
 * Registrar paciente para VENTA
 */
function registrar_paciente_nuevo_venta() {
    // Lógica para registrar el paciente en la venta
    console.log('Registrar nuevo paciente para venta');
    let rut_paciente_venta = $('#termino_busqueda_paciente').val();
    if (rut_paciente_venta == '')
    {
        swal({
            title: "Error!",
            text: "Debe ingresar el Rut",
            icon: "error",
            type: "danger",
            DangerMode: true,
        });
        return false;
    }

    let venta_nombre_paciente = $('#venta_nombres_paciente').val();
    if (venta_nombre_paciente == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar los nombres del paciente",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let venta_primer_apellido = $('#venta_apellido_uno').val();
    if (venta_primer_apellido == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar el primer apellido",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let venta_segundo_apellido = $('#venta_apellido_dos').val();
    if (venta_segundo_apellido == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar el segundo apellido",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });

        return;

    }
    let venta_fecha_nac = $('#venta_fecha_nac').val();
    if (venta_fecha_nac == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar la fecha de nacimiento",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;
    }

    let venta_sexo = $('#venta_sexo').val();
    if (venta_sexo == '0') {

        swal({
            title: "Error!",
            text: "Debe seleccionar el del sexo del paciente",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });

        return;
    }
    let venta_convenio = $('#venta_convenio').val();
    if (venta_convenio == '0') {

        swal({
            title: "Error!",
            text: "Debe seleccionar la previsión del paciente",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    let venta_direccion = $('#venta_direccion').val();
    if (venta_direccion == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar una dirección",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    let venta_numero_dir = $('#venta_numero_dir').val();
    {{--
    if (venta_numero_dir == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar un numero a su dirección",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    --}}

    let venta_region = $('#region_agregar_venta').val();
    if (venta_region == '' || venta_region == '0' || venta_region == 'null' || venta_region == null) {

        swal({
            title: "Error!",
            text: "Debe ingresar la región y la ciudad",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let venta_comuna = $('#ciudad_agregar_venta').val();
    if (venta_comuna == '' || venta_comuna == '0' || venta_comuna == 'null' || venta_comuna == null) {

        swal({
            title: "Error!",
            text: "Debe ingresar la región y la ciudad",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let venta_email = $('#venta_correo').val();
    let venta_telefono_uno = $('#venta_telefono_uno').val();
    let venta_result_codigo_validacion = $('#result_codigo_validacion').val();

    let fechaNacimiento = new Date(venta_fecha_nac);
    let hoy = new Date();
    let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

    // Comprobamos si el mes y el día de la fecha de nacimiento ya pasaron en el año actual
    if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy.getDate() < fechaNacimiento.getDate())) {
        edad--;
    }

    // if( edad > 18 )
    if( $('#paciente_dependiente').prop('checked') == false )
    {
        if (venta_email == '') {

            if(venta_telefono_uno == '' && (venta_result_codigo_validacion =='' || venta_result_codigo_validacion =='0') )
            {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el email o teléfono",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
                return;
            }
            else
            {
                if(venta_result_codigo_validacion =='0')
                {
                    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
                    if (caract.test(venta_email) == false){
                        swal({
                            title: "Error!",
                            text: "Debe ingresar el email o teléfono",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,
                        });
                        return;
                    }
                }
            }
        }
        else
        {

            if (venta_telefono_uno == '')
            {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el teléfono",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
                return;
            }
            else
            {
                if(venta_telefono_uno == '' && (venta_result_codigo_validacion =='' || venta_result_codigo_validacion =='0'))
                {
                    swal({
                        title: "Error!",
                        text: "Debe validar el teléfono",
                        icon: "error",
                        type: "danger",
                        DangerMode: true,
                    });
                    return;
                }
            }
        }
    }

    let data = {
        rut: rut_paciente_venta,
        nombres: venta_nombre_paciente,
        apellido_uno: venta_primer_apellido,
        apellido_dos: venta_segundo_apellido,
        fecha_nacimiento: venta_fecha_nac,
        sexo: venta_sexo,
        prevision_id: venta_convenio,
        direccion: venta_direccion,
        numero_direccion: venta_numero_dir,
        comuna_id: venta_comuna,
        email: venta_email,
        telefono_uno: venta_telefono_uno,
    }

    console.log('Datos para registrar paciente cotización:', data);

    let url = "{{ route('paciente.laboratorio.registrar') }}";

    $.ajax({
        url: url,
        type: "post",
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    })
    .done(function(data) {
        console.log('Respuesta al registrar paciente cotización:', data);
        if (data != null) {

            if (data.estado == 'ok') {
                swal({
                    title: "Éxito!",
                    text: "Paciente registrado correctamente",
                    icon: "success",
                    type: "success",
                    timer: 2000,
                    buttons: false,
                });

                // Seleccionar el paciente recién creado
                seleccionar_paciente_venta(data.paciente.id, data.paciente.rut, data.paciente.nombres + ' ' + data.paciente.apellido_uno, data.paciente.telefono_uno, data.paciente.email);

                // Cerrar modal
                $('#reserva_agregar_paciente_hora_cotiz').hide();

            } else {
                swal({
                    title: "Error!",
                    text: "Error al registrar el paciente",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
            }
        }
    })
}

/**
 * Registrar paciente para POST VENTA
 */
function registrar_paciente_nuevo_post_venta() {
    // Lógica para registrar el paciente en la venta
    console.log('Registrar nuevo paciente para venta');
    let rut_paciente_venta = $('#termino_busqueda_paciente_post_venta').val();
    if (rut_paciente_venta == '')
    {
        swal({
            title: "Error!",
            text: "Debe ingresar el Rut",
            icon: "error",
            type: "danger",
            DangerMode: true,
        });
        return false;
    }

    let venta_nombre_paciente = $('#post_venta_nombres_paciente').val();
    if (venta_nombre_paciente == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar los nombres del paciente",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let venta_primer_apellido = $('#post_venta_apellido_uno').val();
    if (venta_primer_apellido == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar el primer apellido",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let venta_segundo_apellido = $('#post_venta_apellido_dos').val();
    if (venta_segundo_apellido == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar el segundo apellido",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });

        return;

    }
    let venta_fecha_nac = $('#post_venta_fecha_nac').val();
    if (venta_fecha_nac == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar la fecha de nacimiento",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;
    }

    let venta_sexo = $('#post_venta_sexo').val();
    if (venta_sexo == '0') {

        swal({
            title: "Error!",
            text: "Debe seleccionar el del sexo del paciente",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });

        return;
    }
    let venta_convenio = $('#post_venta_convenio').val();
    if (venta_convenio == '0') {

        swal({
            title: "Error!",
            text: "Debe seleccionar la previsión del paciente",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    let venta_direccion = $('#post_venta_direccion').val();
    if (venta_direccion == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar una dirección",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    let venta_numero_dir = $('#post_venta_numero_dir').val();
    {{--
    if (venta_numero_dir == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar un numero a su dirección",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    --}}

    let venta_region = $('#post_venta_region').val();
    if (venta_region == '' || venta_region == '0' || venta_region == 'null' || venta_region == null) {

        swal({
            title: "Error!",
            text: "Debe ingresar la región y la ciudad",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let venta_comuna = $('#post_venta_comuna').val();
    if (venta_comuna == '' || venta_comuna == '0' || venta_comuna == 'null' || venta_comuna == null) {

        swal({
            title: "Error!",
            text: "Debe ingresar la región y la ciudad",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let venta_email = $('#post_venta_correo').val();
    let venta_telefono_uno = $('#post_venta_telefono_uno').val();
    let venta_result_codigo_validacion = $('#post_result_codigo_validacion').val();

    let fechaNacimiento = new Date(venta_fecha_nac);
    let hoy = new Date();
    let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

    // Comprobamos si el mes y el día de la fecha de nacimiento ya pasaron en el año actual
    if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy.getDate() < fechaNacimiento.getDate())) {
        edad--;
    }

    // if( edad > 18 )
    if( $('#post_paciente_dependiente').prop('checked') == false )
    {
        if (venta_email == '') {

            if(venta_telefono_uno == '' && (venta_result_codigo_validacion =='' || venta_result_codigo_validacion =='0') )
            {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el email o teléfono",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
                return;
            }
            else
            {
                if(venta_result_codigo_validacion =='0')
                {
                    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
                    if (caract.test(venta_email) == false){
                        swal({
                            title: "Error!",
                            text: "Debe ingresar el email o teléfono",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,
                        });
                        return;
                    }
                }
            }
        }
        else
        {

            if (venta_telefono_uno == '')
            {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el teléfono",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
                return;
            }
            else
            {
                if(venta_telefono_uno == '' && (venta_result_codigo_validacion =='' || venta_result_codigo_validacion =='0'))
                {
                    swal({
                        title: "Error!",
                        text: "Debe validar el teléfono",
                        icon: "error",
                        type: "danger",
                        DangerMode: true,
                    });
                    return;
                }
            }
        }
    }

    let data = {
        rut: rut_paciente_venta,
        nombres: venta_nombre_paciente,
        apellido_uno: venta_primer_apellido,
        apellido_dos: venta_segundo_apellido,
        fecha_nacimiento: venta_fecha_nac,
        sexo: venta_sexo,
        prevision_id: venta_convenio,
        direccion: venta_direccion,
        numero_direccion: venta_numero_dir,
        comuna_id: venta_comuna,
        email: venta_email,
        telefono_uno: venta_telefono_uno,
    }

    console.log('Datos para registrar paciente post:', data);

    let url = "{{ route('paciente.laboratorio.registrar') }}";

    $.ajax({
        url: url,
        type: "post",
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    })
    .done(function(data) {
        console.log('Respuesta al registrar paciente cotización:', data);
        if (data != null) {

            if (data.estado == 'ok') {
                swal({
                    title: "Éxito!",
                    text: "Paciente registrado correctamente",
                    icon: "success",
                    type: "success",
                    timer: 2000,
                    buttons: false,
                });

                // Seleccionar el paciente recién creado
                seleccionar_paciente_venta(data.paciente.id, data.paciente.rut, data.paciente.nombres + ' ' + data.paciente.apellido_uno, data.paciente.telefono_uno, data.paciente.email);

                // Cerrar modal
                $('#reserva_agregar_paciente_hora_post_venta').hide();

            } else {
                swal({
                    title: "Error!",
                    text: "Error al registrar el paciente",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
            }
        }
    })
}

function registrar_paciente_nuevo_recepcion(){
    // Lógica para registrar el paciente en la venta
    console.log('Registrar nuevo paciente para recepcion');
    let rut_paciente_recepcion = $('#termino_busqueda_paciente_recepcion').val();
    if (rut_paciente_recepcion == '')
    {
        swal({
            title: "Error!",
            text: "Debe ingresar el Rut",
            icon: "error",
            type: "danger",
            DangerMode: true,
        });
        return false;
    }
    let recepcion_nombres = $('#recepcion_nombres').val();
    if (recepcion_nombres == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar los nombres del paciente",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;
    }
    let recepcion_apellido_uno = $('#recepcion_apellido_uno').val();
    if (recepcion_apellido_uno == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar el primer apellido",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    let recepcion_apellido_dos = $('#recepcion_apellido_dos').val();
    if (recepcion_apellido_dos == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar el segundo apellido",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });

        return;

    }
    let recepcion_fecha_nac = $('#recepcion_fecha_nac').val();
    if (recepcion_fecha_nac == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar la fecha de nacimiento",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;
    }
    let recepcion_sexo = $('#recepcion_sexo').val();
    if (recepcion_sexo == '0') {

        swal({
            title: "Error!",
            text: "Debe seleccionar el del sexo del paciente",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });

        return;
    }
    let recepcion_prevision = $('#recepcion_prevision').val();
    if (recepcion_prevision == '0') {

        swal({
            title: "Error!",
            text: "Debe seleccionar la previsión del paciente",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    let recepcion_direccion = $('#recepcion_direccion').val();
    if (recepcion_direccion == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar una dirección",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    let recepcion_numero_dir = $('#recepcion_numero_dir').val();
    {{--
    if (recepcion_numero_dir == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar un numero a su dirección",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    --}}

    let recepcion_region = $('#recepcion_region').val();
    if (recepcion_region == '' || recepcion_region == '0' || recepcion_region == 'null' || recepcion_region == null) {

        swal({
            title: "Error!",
            text: "Debe ingresar la región y la ciudad",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let recepcion_comuna = $('#recepcion_comuna').val();
    if (recepcion_comuna == '' || recepcion_comuna == '0' || recepcion_comuna == 'null' || recepcion_comuna == null) {

        swal({
            title: "Error!",
            text: "Debe ingresar la región y la ciudad",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let recepcion_email = $('#recepcion_email').val();
    let recepcion_telefono_uno = $('#recepcion_telefono_uno').val();
    let recepcion_result_codigo_validacion = $('#recepcion_result_codigo_validacion').val();

    let fechaNacimiento = new Date(recepcion_fecha_nac);
    let hoy = new Date();
    let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

    // Comprobamos si el mes y el día de la fecha de nacimiento ya pasaron en el año actual
    if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy.getDate() < fechaNacimiento.getDate())) {
        edad--;
    }

    // if( edad > 18 )
    if( $('#recepcion_paciente_dependiente').prop('checked') == false )
    {
        if (recepcion_email == '') {

            if(recepcion_telefono_uno == '' && (recepcion_result_codigo_validacion =='' || recepcion_result_codigo_validacion =='0') )
            {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el email o teléfono",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
                return;
            }
            else
            {
                if(recepcion_result_codigo_validacion =='0')
                {
                    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
                    if (caract.test(recepcion_email) == false){
                        swal({
                            title: "Error!",
                            text: "Debe ingresar el email o teléfono",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,
                        });
                        return;
                    }
                }
            }
        }
        else
        {

            if (recepcion_telefono_uno == '')
            {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el teléfono",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
                return;
            }
            else
            {
                if(recepcion_telefono_uno == '' && (recepcion_result_codigo_validacion =='' || recepcion_result_codigo_validacion =='0'))
                {
                    swal({
                        title: "Error!",
                        text: "Debe validar el teléfono",
                        icon: "error",
                        type: "danger",
                        DangerMode: true,
                    });
                    return;
                }
            }
        }
    }

    let data = {
        rut: rut_paciente_recepcion,
        nombres: recepcion_nombres,
        apellido_uno: recepcion_apellido_uno,
        apellido_dos: recepcion_apellido_dos,
        fecha_nacimiento: recepcion_fecha_nac,
        sexo: recepcion_sexo,
        prevision_id: recepcion_convenio,
        direccion: recepcion_direccion,
        numero_direccion: recepcion_numero_dir,
        comuna_id: recepcion_comuna,
        email: recepcion_email,
        telefono_uno: recepcion_telefono_uno,
    }
    console.log('Datos para registrar paciente recepcion:', data);
}

function buscar_ciudad_venta(id_ciudad=0) {
    var region = $('#region_agregar_venta').val();

    let url = "{{ route('home.buscar_ciudad_region') }}";
    $.ajax({
        url: url,
        type: "get",
        data: {
            //_token: _token,
            region: region,
        },
    })
    .done(function(data) {
        if (data != null) {
            data = JSON.parse(data);

            let ciudades_agregar = $('#ciudad_agregar_venta');

            ciudades_agregar.find('option').remove();
            ciudades_agregar.append('<option value="0">seleccione</option>');
            $(data).each(function(i, v) { // indice, valor
                ciudades_agregar.append('<option value="' + v.id + '">' + v.nombre +
                    '</option>');
            })

            if(id_ciudad != 0)
            {
                ciudades_agregar.val(id_ciudad);

            }

        } else {

            swal({
                title: "Error",
                text: "Error al cargar las ciudades",
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            })
            // alert('No se pudo Cargar las ciudades');
        }

    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
    });
};

function buscar_ciudad_post_venta(id_ciudad=0) {
    var region = $('#region_agregar_post_venta').val();

    let url = "{{ route('home.buscar_ciudad_region') }}";
    $.ajax({
        url: url,
        type: "get",
        data: {
            //_token: _token,
            region: region,
        },
    })
    .done(function(data) {
        if (data != null) {
            data = JSON.parse(data);

            let ciudades_agregar = $('#ciudad_agregar_post_venta');

            ciudades_agregar.find('option').remove();
            ciudades_agregar.append('<option value="0">Seleccione</option>');
            $(data).each(function(i, v) { // indice, valor
                ciudades_agregar.append('<option value="' + v.id + '">' + v.nombre +
                    '</option>');
            })

            if(id_ciudad != 0)
            {
                ciudades_agregar.val(id_ciudad);

            }

        } else {

            swal({
                title: "Error",
                text: "Error al cargar las ciudades",
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            })
            // alert('No se pudo Cargar las ciudades');
        }

    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
    });
};

function buscar_ciudad_prestamo(id_ciudad=0) {
    var region = $('#region_agregar_prestamo').val();

    let url = "{{ route('home.buscar_ciudad_region') }}";
    $.ajax({
        url: url,
        type: "get",
        data: {
            //_token: _token,
            region: region,
        },
    })
    .done(function(data) {
        if (data != null) {
            data = JSON.parse(data);

            let ciudades_agregar = $('#ciudad_agregar_prestamo');

            ciudades_agregar.find('option').remove();
            ciudades_agregar.append('<option value="0">seleccione</option>');
            $(data).each(function(i, v) { // indice, valor
                ciudades_agregar.append('<option value="' + v.id + '">' + v.nombre +
                    '</option>');
            })

            if(id_ciudad != 0)
            {
                ciudades_agregar.val(id_ciudad);

            }

        } else {

            swal({
                title: "Error",
                text: "Error al cargar las ciudades",
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            })
            // alert('No se pudo Cargar las ciudades');
        }

    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
    });
};

function buscar_ciudad_cotiz(id_ciudad=0) {
    var region = $('#region_agregar_cotiz').val();

    let url = "{{ route('home.buscar_ciudad_region') }}";
    $.ajax({
        url: url,
        type: "get",
        data: {
            //_token: _token,
            region: region,
        },
    })
    .done(function(data) {
        if (data != null) {
            data = JSON.parse(data);

            let ciudades_agregar = $('#ciudad_agregar_cotiz');

            ciudades_agregar.find('option').remove();
            ciudades_agregar.append('<option value="0">seleccione</option>');
            $(data).each(function(i, v) { // indice, valor
                ciudades_agregar.append('<option value="' + v.id + '">' + v.nombre +
                    '</option>');
            })

            if(id_ciudad != 0)
            {
                ciudades_agregar.val(id_ciudad);

            }

        } else {

            swal({
                title: "Error",
                text: "Error al cargar las ciudades",
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            })
            // alert('No se pudo Cargar las ciudades');
        }

    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
    });
};

function buscar_ciudad_recepcion(id_ciudad=0) {
    var region = $('#region_agregar_recepcion').val();

    let url = "{{ route('home.buscar_ciudad_region') }}";
    $.ajax({
        url: url,
        type: "get",
        data: {
            //_token: _token,
            region: region,
        },
    })
    .done(function(data) {
        if (data != null) {
            data = JSON.parse(data);

            let ciudades_agregar = $('#ciudad_agregar_recepcion');

            ciudades_agregar.find('option').remove();
            ciudades_agregar.append('<option value="0">seleccione</option>');
            $(data).each(function(i, v) { // indice, valor
                ciudades_agregar.append('<option value="' + v.id + '">' + v.nombre +
                    '</option>');
            })

            if(id_ciudad != 0)
            {
                ciudades_agregar.val(id_ciudad);

            }

        } else {

            swal({
                title: "Error",
                text: "Error al cargar las ciudades",
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            })
            // alert('No se pudo Cargar las ciudades');
        }

    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
    });
};

/**
 * Limpiar búsqueda de paciente UNIFICADO - Limpia ambas pestañas
 */
function limpiar_busqueda_paciente() {
    $('#termino_busqueda_paciente').val('');
    $('#resultados_busqueda_paciente').html('');
    $('#tipo_busqueda_paciente').val('rut');
    $('#reserva_agregar_paciente_hora').hide();
    if ($('#termino_busqueda_paciente_post_venta').length > 0) {
        $('#termino_busqueda_paciente_post_venta').val('');
        $('#resultados_busqueda_paciente_post_venta').html('');
        $('#tipo_busqueda_paciente_post_venta').val('rut');
    }

    if( $('#termino_busqueda_paciente_cotiz').length > 0) {
        $('#termino_busqueda_paciente_cotiz').val('');
        $('#resultados_busqueda_paciente_cotiz').html('');
        $('#tipo_busqueda_paciente_cotiz').val('rut');
    }

    if( $('#termino_busqueda_paciente_prestamo').length > 0) {
        $('#termino_busqueda_paciente_prestamo').val('');
        $('#resultados_busqueda_paciente_prestamo').html('');
        $('#tipo_busqueda_paciente_prestamo').val('rut');
    }
}

/**
 * Limpiar búsqueda de paciente POST VENTA
 */
function limpiar_busqueda_paciente_post_venta() {
    $('#termino_busqueda_paciente_post_venta').val('');
    $('#resultados_busqueda_paciente_post_venta').html('');
    $('#tipo_busqueda_paciente_post_venta').val('rut');
}

/**
 * Buscar paciente para COTIZACIÓN
 */
function buscar_paciente_cotizacion() {
    const termino = $('#termino_busqueda_paciente_cotiz').val().trim();

    if (!termino) {
        swal({
            icon: 'warning',
            title: 'Búsqueda vacía',
            text: 'Por favor ingrese un RUT para buscar',
            timer: 2000
        });
        return;
    }

    // Mostrar loader
    $('#resultados_busqueda_paciente_cotiz').html(`
        <div class="text-center py-3">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Buscando...</span>
            </div>
            <p class="mt-2">Buscando paciente...</p>
        </div>
    `);

    // Realizar búsqueda
    $.ajax({
        url: "{{ route('profesional.buscar_rut_paciente') }}",
        type: 'get',
        dataType: 'json',
        data: {
            rut: termino
        },
        success: function(response) {
            console.log('Respuesta búsqueda cotización:', response);

            if (response && response.id) {
                mostrar_resultado_paciente_cotiz(response);
                $('#reserva_agregar_paciente_hora_cotiz').hide();
            } else {
                $('#resultados_busqueda_paciente_cotiz').html(`
                    <div class="alert alert-warning">
                        <i class="feather icon-alert-circle"></i>
                        No se encontró ningún paciente con ese RUT
                    </div>
                `);
                $('#reserva_agregar_paciente_hora_cotiz').show();
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en búsqueda cotización:', {xhr, status, error});
            $('#resultados_busqueda_paciente_cotiz').html(`
                <div class="alert alert-danger">
                    <i class="feather icon-alert-circle"></i>
                    Error al buscar paciente. Intente nuevamente.
                </div>
            `);
        }
    });
}

/**
 * Mostrar resultado de búsqueda de paciente para COTIZACIÓN
 */
function mostrar_resultado_paciente_cotiz(paciente) {
    if (!paciente) {
        $('#resultados_busqueda_paciente_cotiz').html('');
        return;
    }

    const nombre = `${paciente.nombres || ''} ${paciente.apellido_uno || ''} ${paciente.apellido_dos || ''}`.trim();
    const rut = paciente.rut || 'N/A';
    const email = paciente.email || 'Sin email';
    const telefono = paciente.telefono_uno || paciente.telefono || 'Sin teléfono';
    const edad = paciente.edad || 'N/A';
    const prevision = paciente.prevision?.nombre || 'Sin previsión';

    let html = `
        <div class="card border-success mb-3">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="mb-2">
                            <i class="feather icon-user text-success mr-2"></i>
                            ${nombre}
                        </h5>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">RUT:</small>
                                <strong>${rut}</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Edad:</small>
                                <strong>${edad} años</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Teléfono:</small>
                                <strong>${telefono}</strong>
                            </div>
                            <div class="col-md-6 mb-2">
                                <small class="text-muted d-block">Email:</small>
                                <strong>${email}</strong>
                            </div>
                            <div class="col-md-12 mb-2">
                                <small class="text-muted d-block">Previsión:</small>
                                <strong>${prevision}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="button" class="btn btn-success btn-lg btn-block"
                                onclick="seleccionar_paciente_cotizacion(${paciente.id}, '${rut}', '${nombre}', '${telefono}', '${email}')">
                            <i class="feather icon-check-circle mr-2"></i>
                            Seleccionar Paciente
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-sm btn-block mt-2"
                                onclick="limpiar_busqueda_paciente_cotizacion()">
                            <i class="feather icon-x mr-1"></i>
                            Buscar otro
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;

    $('#resultados_busqueda_paciente_cotiz').html(html);
}

/**
 * Seleccionar paciente para COTIZACIÓN
 */
function seleccionar_paciente_cotizacion(id, rut, nombre, telefono, email) {
    console.log('Seleccionando paciente para cotización:', {id, rut, nombre, telefono, email});

    // Actualizar campos ocultos de cotización
    $('#cotiz_rut_paciente').val(rut);
    $('#cotiz_nombre_paciente').val(nombre);
    $('#cotiz_telefono').val(telefono || '');
    $('#cotiz_email').val(email || '');

    // Actualizar tarjeta de paciente seleccionado en cotización
    $('#cotiz_paciente_sel_rut').text(rut);
    $('#cotiz_paciente_sel_nombre').text(nombre);
    $('#cotiz_paciente_sel_telefono').text(telefono || 'No registrado');
    $('#cotiz_paciente_sel_email').text(email || 'No registrado');

    // Sincronizar con el sistema unificado
    // Actualizar el campo principal id_paciente_fc
    $('#id_paciente_fc').val(id);

    // Actualizar los otros campos de sincronización
    $('#paciente_seleccionado_id').val(id);
    $('#paciente_seleccionado_id_post_venta').val(id);

    // Actualizar tarjeta de VENTA (ID correcto: card_paciente_seleccionado)
    if ($('#card_paciente_seleccionado').length) {
        $('#paciente_sel_rut').text(rut);
        $('#paciente_sel_nombre').text(nombre);
        $('#paciente_sel_email').text(email);
        $('#paciente_sel_telefono').text(telefono || 'No registrado');
        $('#card_paciente_seleccionado').removeClass('d-none');
    }

    // Actualizar tarjeta de POST VENTA
    if ($('#card_paciente_seleccionado_post_venta').length) {
        $('#paciente_sel_rut_post_venta').text(rut);
        $('#paciente_sel_nombre_post_venta').text(nombre);
        $('#paciente_sel_email_post_venta').text(email);
        $('#paciente_sel_telefono_post_venta').text(telefono || 'No registrado');
        $('#card_paciente_seleccionado_post_venta').removeClass('d-none');
    }

    // Actualizar tarjeta de PRÉSTAMO DE AUDÍFONOS (si existe)
    if ($('#card_paciente_seleccionado_prestamo').length > 0) {
        $('#prestamo_paciente_sel_rut').text(rut);
        $('#prestamo_paciente_sel_nombre').text(nombre);
        $('#prestamo_paciente_sel_email').text(email);
        $('#prestamo_paciente_sel_telefono').text(telefono || 'No registrado');
        
        $('#card_paciente_seleccionado_prestamo').show();
        $('#card_busqueda_paciente_prestamo').hide();
    }

    // Actualizar tarjeta de RECEPCIÓN DE AUDÍFONOS (si existe)
    if ($('#card_paciente_seleccionado_recepcion').length > 0) {
        $('#recepcion_paciente_sel_rut').text(rut);
        $('#recepcion_paciente_sel_nombre').text(nombre);
        $('#recepcion_paciente_sel_email').text(email);
        $('#recepcion_paciente_sel_telefono').text(telefono || 'No registrado');
        
        $('#card_paciente_seleccionado_recepcion').show();
        $('#card_busqueda_paciente_recepcion').hide();
    }

    // Ocultar resultados de búsqueda, advertencia y mostrar tarjeta de seleccionado en cotización
    $('#resultados_busqueda_paciente_cotiz').html('');
    $('#termino_busqueda_paciente_cotiz').val('');
    $('#card_advertencia_paciente_cotiz').hide();
    $('#card_busqueda_paciente_cotiz').hide();
    $('#card_busqueda_paciente_prestamo').hide();
    $('#card_paciente_seleccionado_cotiz').show();
    $('#card_advertencia_paciente_prestamo').hide();

    // Cargar productos del paciente seleccionado (para post venta)
    if (typeof mis_productos === 'function') {
        mis_productos(id);
    }
    if (typeof mis_audifonos === 'function') {
        mis_audifonos(id);
    }

    if(typeof cargar_historial_cotizaciones === 'function') {
          cargar_historial_cotizaciones();
    }

    // Mensaje de confirmación
    swal({
        title: 'Paciente seleccionado',
        text: `${nombre} ha sido seleccionado para toda la atención`,
        icon: 'success',
        timer: 1500,
        buttons: false
    });

    console.log(`Paciente ID ${id} seleccionado desde cotización y sincronizado en todas las pestañas (id_paciente_fc incluido)`);
}

/**
 * Seleccionar paciente para PRÉSTAMO DE AUDÍFONOS
 */

function seleccionar_paciente_prestamo(id, rut, nombre, telefono, email) {
    // Actualizar campo único de paciente
    $('#paciente_seleccionado_id').val(id);
    $('#id_paciente_fc').val(id);

    // Actualizar tarjeta de préstamo
    $('#prestamo_paciente_sel_rut').text(rut);
    $('#prestamo_paciente_sel_nombre').text(nombre);
    $('#prestamo_paciente_sel_telefono').text(telefono || 'No registrado');
    $('#prestamo_paciente_sel_email').text(email || 'No registrado');
    $('#card_paciente_seleccionado_prestamo').show();
    $('#card_busqueda_paciente_prestamo').hide();

    // Actualizar tarjeta de VENTA (ID correcto: card_paciente_seleccionado)
    if ($('#card_paciente_seleccionado').length) {
        $('#paciente_sel_rut').text(rut);
        $('#paciente_sel_nombre').text(nombre);
        $('#paciente_sel_email').text(email);
        $('#paciente_sel_telefono').text(telefono || 'No registrado');
        $('#card_paciente_seleccionado').removeClass('d-none');

        $('#card_busqueda_paciente').hide();
    }

    // Actualizar tarjeta de POST VENTA
    if ($('#card_paciente_seleccionado_post_venta').length) {
        $('#paciente_sel_rut_post_venta').text(rut);
        $('#paciente_sel_nombre_post_venta').text(nombre);
        $('#paciente_sel_email_post_venta').text(email);
        $('#paciente_sel_telefono_post_venta').text(telefono || 'No registrado');
        $('#card_paciente_seleccionado_post_venta').removeClass('d-none');

        $('#card_busqueda_paciente_post_venta').hide();
    }

    if ($('#card_paciente_seleccionado_cotiz').length) {
        $('#cotiz_paciente_sel_rut').text(rut);
        $('#cotiz_paciente_sel_nombre').text(nombre);
        $('#cotiz_paciente_sel_telefono').text(telefono || 'No registrado');
        $('#cotiz_paciente_sel_email').text(email || 'No registrado');
        $('#card_paciente_seleccionado_cotiz').show();
    }

    // actualizar tarjeta de RECEPCIÓN DE AUDÍFONOS (si existe)
    if ($('#card_paciente_seleccionado_recepcion').length > 0) {
        $('#recepcion_paciente_sel_rut').text(rut);
        $('#recepcion_paciente_sel_nombre').text(nombre);
        $('#recepcion_paciente_sel_email').text(email);
        $('#recepcion_paciente_sel_telefono').text(telefono || 'No registrado');
        
        $('#card_paciente_seleccionado_recepcion').show();
        $('#card_busqueda_paciente_recepcion').hide();
    }

    // Ocultar resultados de búsqueda, advertencia y mostrar tarjeta de seleccionado en cotización
    $('#resultados_busqueda_paciente_prestamo').html('');
    $('#termino_busqueda_paciente_prestamo').val('');
    $('#card_advertencia_paciente_prestamo').hide();
    $('#card_busqueda_paciente_prestamo').hide();
    $('#card_paciente_seleccionado_prestamo').show();
    // Mensaje de confirmación
    swal({
        title: 'Paciente seleccionado',
        text: `${nombre} ha sido seleccionado para el préstamo de audífonos`,
        icon: 'success',
        timer: 1500,
        buttons: false
    });

    console.log(`Paciente ID ${id} sincronizado en todas las pestañas`);
}

/**
 * Seleccionar paciente para RECEPCIÓN
 */
function seleccionar_paciente_recepcion(id, rut, nombre, telefono, email) {
    // Actualizar campo único de paciente
    $('#paciente_seleccionado_id').val(id);
    $('#id_paciente_fc').val(id);

    // Actualizar tarjeta de recepcion
    $('#recepcion_paciente_sel_rut').text(rut);
    $('#recepcion_paciente_sel_nombre').text(nombre);
    $('#recepcion_paciente_sel_telefono').text(telefono || 'No registrado');
    $('#recepcion_paciente_sel_email').text(email || 'No registrado');
    $('#card_paciente_seleccionado_recepcion').show();
    $('#card_busqueda_paciente_recepcion').hide();

    // Actualizar tarjeta de VENTA (ID correcto: card_paciente_seleccionado)
    if ($('#card_paciente_seleccionado').length) {
        $('#paciente_sel_rut').text(rut);
        $('#paciente_sel_nombre').text(nombre);
        $('#paciente_sel_email').text(email);
        $('#paciente_sel_telefono').text(telefono || 'No registrado');
        $('#card_paciente_seleccionado').removeClass('d-none');

        $('#card_busqueda_paciente').hide();
    }

    // Actualizar tarjeta de POST VENTA
    if ($('#card_paciente_seleccionado_post_venta').length) {
        $('#paciente_sel_rut_post_venta').text(rut);
        $('#paciente_sel_nombre_post_venta').text(nombre);
        $('#paciente_sel_email_post_venta').text(email);
        $('#paciente_sel_telefono_post_venta').text(telefono || 'No registrado');
        $('#card_paciente_seleccionado_post_venta').removeClass('d-none');

        $('#card_busqueda_paciente_post_venta').hide();
    }

    if ($('#card_paciente_seleccionado_cotiz').length) {
        $('#cotiz_paciente_sel_rut').text(rut);
        $('#cotiz_paciente_sel_nombre').text(nombre);
        $('#cotiz_paciente_sel_telefono').text(telefono || 'No registrado');
        $('#cotiz_paciente_sel_email').text(email || 'No registrado');
        $('#card_paciente_seleccionado_cotiz').show();
    }

    // Actualizar card de PRÉSTAMO DE AUDÍFONOS (si existe)
    if ($('#card_paciente_seleccionado_prestamo').length > 0) {
        $('#prestamo_paciente_sel_rut').text(rut);
        $('#prestamo_paciente_sel_nombre').text(nombre);
        $('#prestamo_paciente_sel_email').text(email);
        $('#prestamo_paciente_sel_telefono').text(telefono);
        
        $('#card_paciente_seleccionado_prestamo').show();
        $('#card_busqueda_paciente_prestamo').hide();

        $('#card_advertencia_paciente_prestamo').hide();
        $('#card_busqueda_paciente_prestamo').hide();
    }

    // Ocultar resultados de búsqueda, advertencia y mostrar tarjeta de seleccionado en cotización
    $('#resultados_busqueda_paciente_prestamo').html('');
    $('#termino_busqueda_paciente_prestamo').val('');
    $('#card_advertencia_paciente_prestamo').hide();
    $('#card_busqueda_paciente_prestamo').hide();
    $('#card_paciente_seleccionado_prestamo').show();
    // Mensaje de confirmación
    swal({
        title: 'Paciente seleccionado',
        text: `${nombre} ha sido seleccionado para el préstamo de audífonos`,
        icon: 'success',
        timer: 1500,
        buttons: false
    });
    dame_historial_productos_prestados();
    console.log(`Paciente ID ${id} sincronizado en todas las pestañas`);
}

/**
 * Limpiar búsqueda de paciente COTIZACIÓN
 */
function limpiar_busqueda_paciente_cotiz() {
    $('#termino_busqueda_paciente_cotiz').val('');
    $('#resultados_busqueda_paciente_cotiz').html('');
    $('#reserva_agregar_paciente_hora_cotiz').hide();
}

/**
 * Cargar datos de cotización cuando se activa la pestaña
 */
function cargar_datos_cotizacion() {
    // Verificar si hay un paciente seleccionado en cualquiera de los campos
    const idPaciente = $('#id_paciente_fc').val() || $('#paciente_seleccionado_id').val() || $('#paciente_seleccionado_id_post_venta').val();

    console.log('Cargando datos cotización para paciente ID:', idPaciente);

    if (idPaciente && idPaciente !== '') {
        // Sincronizar el ID en todos los campos si solo existe en uno
        if (!$('#id_paciente_fc').val()) $('#id_paciente_fc').val(idPaciente);
        if (!$('#paciente_seleccionado_id').val()) $('#paciente_seleccionado_id').val(idPaciente);
        if (!$('#paciente_seleccionado_id_post_venta').val()) $('#paciente_seleccionado_id_post_venta').val(idPaciente);

        // Obtener datos del paciente de las tarjetas existentes
        let rut = '';
        let nombre = '';
        let telefono = '';
        let email = '';

        // Intentar obtener de la tarjeta de venta
        if ($('#paciente_sel_rut').length && $('#paciente_sel_rut').text()) {
            rut = $('#paciente_sel_rut').text();
            nombre = $('#paciente_sel_nombre').text();
            telefono = $('#paciente_sel_telefono').text();
            email = $('#paciente_sel_email').text() || '';
        }
        // Si no, intentar de la tarjeta de post venta
        else if ($('#paciente_sel_rut_post_venta').length && $('#paciente_sel_rut_post_venta').text()) {
            rut = $('#paciente_sel_rut_post_venta').text();
            nombre = $('#paciente_sel_nombre_post_venta').text();
            telefono = $('#paciente_sel_telefono_post_venta').text();
            email = $('#paciente_sel_email_post_venta').text() || '';
        }

        if (rut && nombre) {
            console.log('Datos del paciente obtenidos de tarjeta existente:', {rut, nombre, telefono, email});

            // Actualizar campos ocultos
            $('#cotiz_rut_paciente').val(rut);
            $('#cotiz_nombre_paciente').val(nombre);
            $('#cotiz_telefono').val(telefono !== 'No registrado' ? telefono : '');
            $('#cotiz_email').val(email !== 'No registrado' ? email : '');

            // Actualizar tarjeta de paciente seleccionado
            $('#cotiz_paciente_sel_rut').text(rut);
            $('#cotiz_paciente_sel_nombre').text(nombre);
            $('#cotiz_paciente_sel_telefono').text(telefono);
            $('#cotiz_paciente_sel_email').text(email || 'No registrado');

            // Mostrar tarjeta de paciente y ocultar búsqueda/advertencia
            $('#card_advertencia_paciente_cotiz').hide();
            $('#card_busqueda_paciente_cotiz').hide();
            $('#card_paciente_seleccionado_cotiz').show();
        } else {
            console.log('No se pudieron obtener datos del paciente de las tarjetas');
            // Mostrar búsqueda si no hay datos
            $('#card_advertencia_paciente_cotiz').show();
            $('#card_busqueda_paciente_cotiz').show();
            $('#card_paciente_seleccionado_cotiz').hide();
        }
    } else {
        console.log('No hay paciente seleccionado en ningún campo');
        // Mostrar búsqueda si no hay paciente
        $('#card_advertencia_paciente_cotiz').show();
        $('#card_busqueda_paciente_cotiz').show();
        $('#card_paciente_seleccionado_cotiz').hide();
    }
}

/**
 * Cargar datos de post venta cuando se activa la pestaña
 */
function cargar_datos_post_venta() {
    // Verificar si hay un paciente seleccionado en cualquiera de los campos
    const idPaciente = $('#id_paciente_fc').val() || $('#paciente_seleccionado_id').val() || $('#paciente_seleccionado_id_post_venta').val();

    console.log('Cargando datos post venta para paciente ID:', idPaciente);

    if (idPaciente && idPaciente !== '') {
        // Sincronizar el ID en todos los campos si solo existe en uno
        if (!$('#id_paciente_fc').val()) $('#id_paciente_fc').val(idPaciente);
        if (!$('#paciente_seleccionado_id').val()) $('#paciente_seleccionado_id').val(idPaciente);
        if (!$('#paciente_seleccionado_id_post_venta').val()) $('#paciente_seleccionado_id_post_venta').val(idPaciente);

        // Cargar productos del paciente
        if (typeof mis_productos === 'function') {
            mis_productos(idPaciente);
        }

        // Cargar audífonos del paciente
        if (typeof mis_audifonos === 'function') {
            mis_audifonos(idPaciente);
        }

        // Cargar próxima atención
        if (typeof proxima_atencion_paciente === 'function') {
            proxima_atencion_paciente();
        }

        // Cargar historial de calibraciones
        if (typeof dame_historial_calibraciones_audifono === 'function') {
            dame_historial_calibraciones_audifono(idPaciente);
        }

        // Cargar historial de reparaciones
        if (typeof dame_historial_reparaciones_audifono === 'function') {
            dame_historial_reparaciones_audifono(idPaciente);
        }
    } else {
        console.log('No hay paciente seleccionado para cargar datos de post venta');

        // Mostrar mensaje si no hay paciente
        $('#lista_audifonos_control').html(`
            <div class="col-12">
                <div class="alert alert-info">
                    <i class="feather icon-info mr-2"></i>
                    Por favor seleccione un paciente para ver sus audífonos y productos
                </div>
            </div>
        `);
    }
} 

/**
 * Cargar datos de préstamo cuando se activa la pestaña
 */
function cargar_datos_prestamo() {
    // Verificar si hay un paciente seleccionado en cualquiera de los campos
    const idPaciente = $('#id_paciente_fc').val() || $('#paciente_seleccionado_id').val() || $('#paciente_seleccionado_id_post_venta').val();

    console.log('Cargando datos préstamo para paciente ID:', idPaciente);

    if (idPaciente && idPaciente !== '') {
        // Sincronizar el ID en todos los campos si solo existe en uno
        if (!$('#id_paciente_fc').val()) $('#id_paciente_fc').val(idPaciente);
        if (!$('#paciente_seleccionado_id').val()) $('#paciente_seleccionado_id').val(idPaciente);
        if (!$('#paciente_seleccionado_id_post_venta').val()) $('#paciente_seleccionado_id_post_venta').val(idPaciente);

        if(typeof cargar_historial_prestamos_audifonos === 'function') {
            cargar_historial_prestamos_audifonos();
        }
    } else {
        console.log('No hay paciente seleccionado para cargar datos de préstamo');
    }
}

function enter_buscar_productos_audifono(event) {
    if (event.key === 'Enter') {
        event.preventDefault(); // Evitar el comportamiento por defecto del Enter
        buscar_productos_audifonos(); // Llamar a la función de búsqueda
    }
}

// Búsqueda de productos (audífonos y repuestos) para venta
        function buscar_productos_audifonos() {
            let termino_busqueda = $('#buscar_producto').val().trim();
            let tipo_producto = $('#tipo_producto_busqueda').val();

            // Validar que haya al menos 2 caracteres
            if (termino_busqueda.length < 2 && termino_busqueda.length > 0) {
                swal({
                    icon: 'warning',
                    title: 'Búsqueda muy corta',
                    text: 'Por favor ingrese al menos 2 caracteres para buscar.'
                });
                return;
            }

            // Mostrar indicador de carga
            $('#lista_audifonos').html('<div class="text-center py-4"><i class="fas fa-spinner fa-spin fa-2x"></i><p class="mt-2">Buscando productos...</p></div>');

            // URL de la ruta que debes crear en tu backend
            let url = "{{ route('laboratorio.profesional.buscar_productos_audifonos') }}";

            $.ajax({
                url: url,
                type: "GET",
                data: {
                    termino: termino_busqueda,
                    tipo_producto: tipo_producto
                },
            })
            .done(function(data) {
                console.log('Resultados de búsqueda:', data);
                mostrar_resultados_busqueda_audifonos(data.productos || []);
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Error en búsqueda:', textStatus, errorThrown);
                $('#lista_audifonos').html(
                    '<div class="alert alert-danger">' +
                    '<i class="feather icon-alert-circle"></i> Error al buscar productos. Por favor intente nuevamente.' +
                    '</div>'
                );
            });
        }

        function enter_buscar_productos_audifono_prestamo(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Evitar el comportamiento por defecto del Enter
                buscar_productos_audifonos_prestamo(); // Llamar a la función de búsqueda
            }
        }

        // Busqueda de productos (audífonos y repuestos) para prestamo
        function buscar_productos_audifonos_prestamo() {
            let termino_busqueda = $('#buscar_producto_prestamo').val().trim();
            let tipo_producto = $('#tipo_producto_busqueda_prestamo').val();

            // Validar que haya al menos 2 caracteres
            if (termino_busqueda.length < 2 && termino_busqueda.length > 0) {
                swal({
                    icon: 'warning',
                    title: 'Búsqueda muy corta',
                    text: 'Por favor ingrese al menos 2 caracteres para buscar.'
                });
                return;
            }

            // Mostrar indicador de carga
            $('#lista_audifonos_prestamo').html('<div class="text-center py-4"><i class="fas fa-spinner fa-spin fa-2x"></i><p class="mt-2">Buscando productos...</p></div>');

            // URL de la ruta que debes crear en tu backend
            let url = "{{ route('laboratorio.profesional.buscar_productos_audifonos') }}";

            $.ajax({
                url: url,
                type: "GET",
                data: {
                    termino: termino_busqueda,
                    tipo_producto: tipo_producto
                },
            })
            .done(function(data) {
                console.log('Resultados de búsqueda:', data);
                mostrar_resultados_busqueda_audifonos_prestamo(data.productos || []);
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Error en búsqueda:', textStatus, errorThrown);
                $('#lista_audifonos_prestamo').html(
                    '<div class="alert alert-danger">' +
                    '<i class="feather icon-alert-circle"></i> Error al buscar productos. Por favor intente nuevamente.' +
                    '</div>'
                );
            });
        }

        // Mostrar resultados de búsqueda
        function mostrar_resultados_busqueda_audifonos(productos) {
            let html = '';
            console.log('Productos encontrados:', productos);
            if (productos.length > 0) {
                html += '<div class="alert alert-info mb-3">';
                html += '<i class="feather icon-info"></i> Se encontraron <strong>' + productos.length + '</strong> productos.';
                html += '</div>';

                html += '<div class="row">';

                $.each(productos, function(index, producto) {
                    // Construir URL de imagen
                    let imagenUrl = producto.image_path || '';
                    if (imagenUrl && !imagenUrl.startsWith('http')) {
                        imagenUrl = '/' + imagenUrl;
                    }

                    // Card de producto
                    html += '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3">';
                    html += '    <div class="card h-100 shadow-sm hover-shadow">';
                    html += '        <div class="card-body p-2">';

                    // Imagen del producto
                    html += '            <div class="text-center mb-2">';
                    html += '                <img src="' + (imagenUrl || '/images/no-image.png') + '" ';
                    html += '                     alt="' + (producto.nombre || 'Producto') + '" ';
                    html += '                     class="img-fluid rounded" ';
                    html += '                     style="max-height: 150px; object-fit: contain;" ';
                    html += '                     onerror="this.src=\'/images/no-image.png\'">';
                    html += '            </div>';

                    // Información del producto
                    html += '            <h6 class="mb-1 font-weight-bold text-truncate" title="' + (producto.nombre || 'Sin nombre') + '">';
                    html += '                ' + (producto.nombre || 'Sin nombre');
                    html += '            </h6>';

                    html += '            <small class="text-muted d-block mb-1">';
                    html += '                <strong>Código:</strong> ' + (producto.codigo_interno || 'N/A');
                    html += '            </small>';

                    html += '            <small class="text-muted d-block mb-1">';
                    html += '                <strong>Marca:</strong> ' + (producto.marca || 'N/A');
                    html += '            </small>';

                    html += '            <small class="text-muted d-block mb-1">';
                    html += '                <strong>Tipo:</strong> ' + (producto.tipo_producto || 'N/A');
                    html += '            </small>';

                    // Stock
                    let stockClass = producto.stock_actual > producto.stock_minimo ? 'text-success' : 'text-danger';
                    html += '            <small class="d-block mb-2 ' + stockClass + '">';
                    html += '                <strong>Stock:</strong> ' + (producto.stock_actual || 0) + ' unidades';
                    html += '            </small>';

                    // Botones de acción
                    html += '            <div class="btn-group btn-group-sm w-100">';
                    html += '                <button type="button" class="btn btn-primary btn-sm" onclick="seleccionar_producto_audifono(' + producto.id + ', ' + producto.precio_venta + ')" title="Seleccionar producto">';
                    html += '                    <i class="feather icon-check"></i> Seleccionar';
                    html += '                </button>';
                    html += '                <button type="button" class="btn btn-info btn-sm" onclick="ver_detalle_producto_audifono(' + producto.id + ')" title="Ver detalles">';
                    html += '                    <i class="feather icon-eye"></i>';
                    html += '                </button>';
                    html += '            </div>';

                    html += '        </div>';
                    html += '    </div>';
                    html += '</div>';
                });

                html += '</div>';
            } else {
                html += '<div class="alert alert-warning text-center">';
                html += '    <i class="feather icon-search"></i> ';
                html += '    <strong>No se encontraron productos</strong><br>';
                html += '    <small>Intente con otros términos de búsqueda</small>';
                html += '</div>';
            }

            $('#lista_audifonos').html(html);
        }

        // Mostrar resultados de búsqueda para préstamo
        function mostrar_resultados_busqueda_audifonos_prestamo(productos) {
            let html = '';
            console.log('Productos encontrados para préstamo:', productos);
            if (productos.length > 0) {
                html += '<div class="alert alert-info mb-3">';
                html += '<i class="feather icon-info"></i> Se encontraron <strong>' + productos.length + '</strong> productos.';
                html += '</div>';

                html += '<div class="row">';

                $.each(productos, function(index, producto) {
                    // Construir URL de imagen
                    let imagenUrl = producto.image_path || '';
                    if (imagenUrl && !imagenUrl.startsWith('http')) {
                        imagenUrl = '/' + imagenUrl;
                    }

                    // Card de producto
                    html += '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3">';
                    html += '    <div class="card h-100 shadow-sm hover-shadow">';
                    html += '        <div class="card-body p-2">';

                    // Imagen del producto
                    html += '            <div class="text-center mb-2">';
                    html += '                <img src="' + (imagenUrl || '/images/no-image.png') + '" ';
                    html += '                     alt="' + (producto.nombre || 'Producto') + '" ';
                    html += '                     class="img-fluid rounded" ';
                    html += '                     style="max-height: 150px; object-fit: contain;" ';
                    html += '                     onerror="this.src=\'/images/no-image.png\'">';
                    html += '            </div>';

                    // Información del producto
                    html += '            <h6 class="mb-1 font-weight-bold text-truncate" title="' + (producto.nombre || 'Sin nombre') + '">';
                    html += '                ' + (producto.nombre || 'Sin nombre');
                    html += '            </h6>';

                    html += '            <small class="text-muted d-block mb-1">';
                    html += '                <strong>Código:</strong> ' + (producto.codigo_interno || 'N/A');
                    html += '            </small>';

                    html += '            <small class="text-muted d-block mb-1">';
                    html += '                <strong>Marca:</strong> ' + (producto.marca || 'N/A');
                    html += '            </small>';

                    html += '            <small class="text-muted d-block mb-1">';
                    html += '                <strong>Tipo:</strong> ' + (producto.tipo_producto || 'N/A');
                    html += '            </small>';

                    // Stock
                    let stockClass = producto.stock_actual > producto.stock_minimo ? 'text-success' : 'text-danger';
                    html += '            <small class="d-block mb-2 ' + stockClass + '">';
                    html += '                <strong>Stock:</strong> ' + (producto.stock_actual || 0) + ' unidades';
                    html += '            </small>';

                    // Botones de acción
                    html += '            <div class="btn-group btn-group-sm w-100">';
                    html += '                <button type="button" class="btn btn-primary btn-sm" onclick="seleccionar_producto_audifono_prestamo(' + producto.id + ', ' + producto.precio_venta + ')" title="Seleccionar producto">';
                    html += '                    <i class="feather icon-check"></i> Seleccionar';
                    html += '                </button>';
                    html += '                <button type="button" class="btn btn-info btn-sm" onclick="ver_detalle_producto_audifono_prestamo(' + producto.id + ')" title="Ver detalles">';
                    html += '                    <i class="feather icon-eye"></i>';
                    html += '                </button>';
                    html += '            </div>';

                    html += '        </div>';
                    html += '    </div>';
                    html += '</div>';
                });

                html += '</div>';
            } else {
                html += '<div class="alert alert-warning text-center">';    
                html += '    <i class="feather icon-search"></i> ';
                html += '    <strong>No se encontraron productos</strong><br>';
                html += '    <small>Intente con otros términos de búsqueda</small>';
                html += '</div>';
            }
            $('#lista_audifonos_prestamo').html(html);
        }


        // Limpiar búsqueda
        function limpiar_busqueda_audifonos() {
            $('#buscar_producto').val('');
            $('#tipo_producto_busqueda').val('9'); // Volver a audífonos por defecto
            $('#lista_audifonos').html(
                '<div class="alert alert-info text-center">' +
                '<i class="feather icon-search"></i> Ingrese un término de búsqueda para encontrar productos.' +
                '</div>'
            );
        }

 function mis_productos(){
            let url = "{{ route('laboratorio.paciente.producto.listar') }}";
            let data = {
                id_paciente: $('#id_paciente_fc').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: url,
                type: "GET",
                data: data,
            })
            .done(function(response) {
                console.log(response);
                $('#productos-lista').empty();
                let productos = response.productos;
                if(productos.length > 0){
                    let productosPropios = [];
                    productos.forEach(function(producto){
                        console.log(producto);
                        let imagenUrl = producto.producto.image_path || '';
                        if (imagenUrl && !imagenUrl.startsWith('http')) {
                            imagenUrl = '/' + imagenUrl;
                        }

                        let esPrestado = producto.estado == 2; // O producto.producto.estado == 2 según tu estructura
                        if(esPrestado){
                            return; // Saltar este producto si está prestado
                        }else{
                            productosPropios.push(producto);
                        }

                        let item = `
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <img src="${imagenUrl}" class="img-fluid rounded" style="width: 200px; height: 200px;" alt="${producto.producto.nombre}">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">${producto.producto.nombre}</h5>
                                        <p class="card-text">Código: ${producto.producto.codigo_interno || 'N/A'}</p>
                                        <p class="card-text">Marca: ${producto.producto.marca ? producto.producto.marca.nombre : 'N/A'}</p>
                                        <p class="card-text">Tipo: ${producto.producto.tipo_producto ? producto.producto.tipo_producto.nombre : 'N/A'}</p>
                                        <p class="card-text">Stock Actual: ${producto.producto.stock_actual || 0}</p>
                                        <p class="card-text">Precio: $${parseFloat(producto.producto.precio_venta).toFixed(0)}</p>
                                        <button class="btn btn-primary mt-auto" onclick="dame_producto(${producto.id})">Revisar</button>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('#productos-lista').append(item);
                    });
                } else {
                    $('#productos-lista').append('<p>No se encontraron productos.</p>');
                }
               
            })
            .fail(function(jqXHR) {
                console.error('Error al obtener productos:', jqXHR);
            });
        }

        function mis_audifonos(){
            // Mostrar mensaje de carga
            $('#lista_audifonos_control').html(`
                <div class="col-12">
                    <div class="loading-message">
                        <i class="feather icon-loader"></i>
                        <h5 class="mt-3">Cargando audífonos...</h5>
                        <p class="text-muted">Por favor espere un momento</p>
                    </div>
                </div>
            `);

            let id_paciente = $('#paciente_seleccionado_id').val();
            if(id_paciente === ''){
                $('#lista_audifonos_control').html(`
                    <div class="col-12">
                        <div class="alert alert-warning text-center">
                            <i class="feather icon-alert-circle"></i>
                            Por favor seleccione un paciente para ver sus audífonos.
                        </div>
                    </div>
                `);
                return;
            }

            let url = "{{ route('laboratorio.paciente.producto.listar') }}";
            let data = {
                id_paciente: $('#paciente_seleccionado_id').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: url,
                type: "GET",
                data: data,
            })
            .done(function(response) {
                console.log(response);
                $('#lista_audifonos_control').empty();
                let productos = response.productos;

                if(productos.length > 0){
                    productos.forEach(function(producto){
                        let esPrestado = producto.estado == 2; // O producto.producto.estado == 2 según tu estructura

                        let bandaPrestado = '';
                        let botones = '';
                        if (esPrestado) {
                            bandaPrestado = `
                                <span class="badge badge-prestado" style="position: absolute; top: 10px; right: 10px; background: #f6ad55; color: #fff; font-weight: bold; padding: 6px 12px; border-radius: 8px; z-index: 10;">
                                    <i class="feather icon-clock"></i> Prestado
                                </span>
                            `;
                           
                            
                        }else{
                             botones = `
                                <!-- Botones de acción -->
                                        <div class="botones-accion" style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-top: 10px; width: 100%;">
                                            <button type="button"
                                                    class="btn-accion btn-calibracion"
                                                    onclick="calib_audif(); dame_audifono(${producto.id}, 'calibracion'); dame_historial_calibraciones_audifono()"
                                                    style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 12px 6px; border: none; border-radius: 8px; font-size: 0.75rem; font-weight: 600; cursor: pointer; text-align: center; background: #5a67d8; background-color: #5a67d8; color: white; box-shadow: 0 2px 6px rgba(0,0,0,0.12); min-width: 0; width: 100%;">
                                                <i class="feather icon-settings" style="font-size: 1.5rem; margin-bottom: 4px; display: block;"></i>
                                                <span style="display: block; line-height: 1.2; font-size: 0.75rem;">Calibración</span>
                                            </button>
                                            <button type="button"
                                                    class="btn-accion btn-reparacion"
                                                    onclick="reparacion_audif(); dame_audifono(${producto.id}, 'reparacion'); dame_historial_reparaciones_audifono()"
                                                    style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 12px 6px; border: none; border-radius: 8px; font-size: 0.75rem; font-weight: 600; cursor: pointer; text-align: center; background: #ed8936; background-color: #ed8936; color: white; box-shadow: 0 2px 6px rgba(0,0,0,0.12); min-width: 0; width: 100%;">
                                                <i class="feather icon-settings" style="font-size: 1.5rem; margin-bottom: 4px; display: block;"></i>
                                                <span style="display: block; line-height: 1.2; font-size: 0.75rem;">Reparación</span>
                                            </button>
                                        </div>
                            `;
                        }
                        // Filtrar solo audífonos
                        if(producto.producto.tipo_producto && producto.producto.tipo_producto.nombre.toLowerCase() !== 'audífonos'){
                            return;
                        }

                        console.log(producto);

                        // Procesar imagen
                        let imagenUrl = producto.producto.image_path || '';
                        if (imagenUrl && !imagenUrl.startsWith('http')) {
                            imagenUrl = '/' + imagenUrl;
                        }
                        if (!imagenUrl) {
                            imagenUrl = '/images/no-image.png';
                        }

                        // Determinar clase de stock
                        let stockActual = parseInt(producto.producto.stock_actual) || 0;
                        let stockClase = 'stock-alto';
                        let stockTexto = 'Stock disponible';

                        if (stockActual === 0) {
                            stockClase = 'stock-bajo';
                            stockTexto = 'Sin stock';
                        } else if (stockActual <= 5) {
                            stockClase = 'stock-medio';
                            stockTexto = 'Stock bajo';
                        } else if (stockActual <= 10) {
                            stockClase = 'stock-medio';
                            stockTexto = 'Stock medio';
                        }

                        // Obtener datos
                        let nombre = producto.producto.nombre || 'Sin nombre';
                        let codigo = producto.producto.codigo_interno || 'N/A';
                        let marca = producto.producto.marca ? producto.producto.marca.nombre : 'N/A';
                        let tipo = producto.producto.tipo_producto ? producto.producto.tipo_producto.nombre : 'N/A';
                        let precio = parseFloat(producto.producto.precio_venta || 0).toLocaleString('es-CL');
                        let lado = producto.lado || 'Ambos lados';

                        let item = `
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                                <div class="card card-audifono h-100">
                                     ${bandaPrestado}
                                    <!-- Imagen del producto -->
                                    <div class="imagen-container">
                                        <img src="${imagenUrl}"
                                             class="card-img-top"
                                             alt="${nombre}"
                                             onerror="this.src='/images/no-image.png'">
                                        <span class="badge badge-stock ${stockClase}">
                                            <i class="feather icon-package"></i> ${stockTexto} (${stockActual} unidades)
                                        </span>
                                    </div>

                                    <!-- Cuerpo de la card -->
                                    <div class="card-body-audifono" style="padding: 15px;">
                                        <!-- Icono y nombre -->
                                        <div class="producto-header">
                                            <i class="feather icon-headphones icon-producto"></i>
                                            <h6 class="producto-nombre">${nombre}</h6>
                                        </div>

                                        <!-- Información compacta -->
                                        <div class="producto-info">
                                            <div class="info-row">
                                                <i class="feather icon-tag"></i>
                                                <span>Código: <strong>${codigo}</strong></span>
                                            </div>
                                            <div class="info-row">
                                                <i class="feather icon-award"></i>
                                                <span>Marca: <strong>${marca}</strong></span>
                                            </div>
                                            <div class="info-row">
                                                <i class="feather icon-headphones"></i>
                                                <span>Tipo: <strong>${tipo}</strong></span>
                                            </div>
                                            <div class="info-row">
                                                <i class="feather icon-headphones"></i>
                                                <span>Lado: <strong>${lado}</strong></span>
                                            </div>
                                        </div>

                                        <!-- Precio -->
                                        <div class="producto-precio">
                                            $${precio}
                                        </div>

                                        ${botones}
                                        
                                    </div>
                                </div>
                            </div>
                        `;

                        $('#lista_audifonos_control').append(item);
                    });

                    // Agregar eventos hover a los botones después de crearlos
                    $('#lista_audifonos_control .btn-calibracion').hover(
                        function() {
                            $(this).css({
                                'background': '#4c51bf',
                                'background-color': '#4c51bf',
                                'transform': 'translateY(-2px)',
                                'box-shadow': '0 4px 12px rgba(0,0,0,0.2)'
                            });
                        },
                        function() {
                            $(this).css({
                                'background': '#5a67d8',
                                'background-color': '#5a67d8',
                                'transform': 'translateY(0)',
                                'box-shadow': '0 2px 6px rgba(0,0,0,0.12)'
                            });
                        }
                    );

                    $('#lista_audifonos_control .btn-reparacion').hover(
                        function() {
                            $(this).css({
                                'background': '#dd6b20',
                                'background-color': '#dd6b20',
                                'transform': 'translateY(-2px)',
                                'box-shadow': '0 4px 12px rgba(0,0,0,0.2)'
                            });
                        },
                        function() {
                            $(this).css({
                                'background': '#ed8936',
                                'background-color': '#ed8936',
                                'transform': 'translateY(0)',
                                'box-shadow': '0 2px 6px rgba(0,0,0,0.12)'
                            });
                        }
                    );
                } else {
                    // Mensaje cuando no hay productos
                    let emptyMessage = `
                        <div class="col-12">
                            <div class="empty-message">
                                <i class="feather icon-inbox"></i>
                                <h5 class="mt-3">No se encontraron audífonos</h5>
                                <p class="text-muted">Este paciente no tiene audífonos registrados en el sistema.</p>
                            </div>
                        </div>
                    `;
                    $('#lista_audifonos_control').append(emptyMessage);
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al obtener productos:', jqXHR);

                // Mostrar mensaje de error amigable
                $('#lista_audifonos_control').html(`
                    <div class="col-12">
                        <div class="alert alert-danger text-center" role="alert">
                            <i class="feather icon-alert-circle" style="font-size: 2rem;"></i>
                            <h5 class="mt-3">Error al cargar los audífonos</h5>
                            <p>No se pudieron obtener los datos del servidor. Por favor intente nuevamente.</p>
                            <button class="btn btn-danger mt-2" onclick="mis_audifonos()">
                                <i class="feather icon-refresh-cw"></i> Reintentar
                            </button>
                        </div>
                    </div>
                `);
            });
        }

        /**
         * Mostrar calificación con estrellas
         * @param {number|null} satisfaccion - Nivel de satisfacción (1-5 o null)
         */
        function mostrarCalificacionEstrellas(satisfaccion) {
            const container = $('#detalle-calificacion');

            // Si no hay calificación
            if (!satisfaccion || satisfaccion === null || satisfaccion === 0) {
                container.html('<span class="text-muted">Sin calificar</span>');
                return;
            }

            // Textos descriptivos por nivel
            const textos = {
                1: 'Muy insatisfecho',
                2: 'Insatisfecho',
                3: 'Neutral',
                4: 'Satisfecho',
                5: 'Muy satisfecho'
            };

            // Generar estrellas
            let estrellasHTML = '<div class="rating-display">';
            estrellasHTML += '<div class="rating-stars">';

            for (let i = 1; i <= 5; i++) {
                if (i <= satisfaccion) {
                    // Estrella llena
                    estrellasHTML += `<i class="fas fa-star rating-${satisfaccion}"></i>`;
                } else {
                    // Estrella vacía
                    estrellasHTML += '<i class="far fa-star star-empty"></i>';
                }
            }

            estrellasHTML += '</div>';
            estrellasHTML += `<span class="rating-text">(<span class="rating-value">${satisfaccion}/5</span> - ${textos[satisfaccion]})</span>`;
            estrellasHTML += '</div>';

            container.html(estrellasHTML);
        }

        function guardar_evaluacion_producto(){
            let id_producto = $('#id_producto_seleccionado').val();
            let id_paciente = $('#id_paciente_fc').val();
            let satisfaccion = $('#nivel_satisfaccion').val();
            let observaciones = $('#observaciones_satisfaccion').val();
            if(!id_producto){
                swal('Error', 'No se ha seleccionado ningún producto', 'error');
                return;
            }
            if(!satisfaccion || satisfaccion < 1 || satisfaccion > 5){
                swal('Error', 'Debe seleccionar una valoración válida', 'error');
                return;
            }

            let url = "{{ route('laboratorio.paciente.producto.evaluar') }}";
            let data = {
                id_producto: id_producto,
                id_paciente: id_paciente,
                satisfaccion: satisfaccion,
                observaciones: observaciones,
                _token: CSRF_TOKEN
            };

            $.ajax({
                url: url,
                type: "POST",
                data: data,
            })
            .done(function(response) {
                console.log(response);
                if(response.estado === 1){
                    // Actualizar visualización de estrellas
                    mostrarCalificacionEstrellas(satisfaccion);

                    swal({
                        icon: 'success',
                        title: '¡Gracias por su evaluación!',
                        text: response.mensaje || 'Su valoración ha sido registrada.',
                        buttons: false,
                        timer: 2000
                    });

                    // Limpiar formulario
                    $('#nivel_satisfaccion').val('');
                    $('#observaciones_satisfaccion').val('');

                    // Opcional: recargar lista de productos
                    // cargar_productos_paciente();
                } else {
                    swal('Error', response.mensaje || 'No se pudo guardar la evaluación', 'error');
                }
            })
            .fail(function(jqXHR) {
                console.error('Error al guardar evaluación:', jqXHR);
                swal('Error', 'No se pudo comunicar con el servidor', 'error');
            });
        }

         function dame_historial_calibraciones_audifono(){
            var id_paciente = $('#paciente_seleccionado_id').val();
            if(id_paciente === ''){
                $('#cuerpo_historial_calibraciones_audifono').html(`
                    <tr>
                        <td colspan="5" class="text-center">
                            <div class="alert alert-warning mb-0">
                                <i class="feather icon-alert-circle"></i>
                                Por favor seleccione un paciente para ver su historial de calibraciones.
                            </div>
                        </td>
                    </tr>
                `);
                return;
            }
            $.ajax({
                type: "POST",
                url: "{{ route('laboratorio.profesional.dame_historial_calibraciones_audifono') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    id_paciente: id_paciente
                },
                success: function (response) {
                    console.log(response);
                    if(response.estado == 1){
                        var historial = response.data;
                        var tbody = $('#cuerpo_historial_calibraciones_audifono');
                        tbody.empty();

                        if(historial.length > 0){
                            historial.forEach(function(calibracion) {
                                var fila = `
                                    <tr>
                                        <td>${calibracion.motivo_control || 'N/A'}</td>
                                        <td>${calibracion.estado_audifono || 'N/A'}</td>
                                        <td>${calibracion.nombre_producto || 'N/A'} - ${calibracion.marca_producto || 'N/A'}</td>
                                        <td>${calibracion.acciones_calibrado || 'N/A'}</td>
                                        <td>${calibracion.opinion_paciente || 'N/A'}</td>
                                    </tr>
                                `;
                                tbody.append(fila);
                            });
                        } else {
                            tbody.append('<tr><td colspan="5" class="text-center">No hay historial de calibraciones</td></tr>');
                        }
                    }
                },
                error: function (xhr) {
                    console.error('Error al cargar historial:', xhr);
                }
            });
        }

        function dame_historial_productos_prestados(){
            let id_paciente = $('#paciente_seleccionado_id').val();
            if(id_paciente == undefined || id_paciente === ''){
                id_paciente = $('#id_paciente_fc').val();
            }
            let url = "{{ route('laboratorio.profesional.dame_historial_productos_prestados') }}";
            let data = {
                id_paciente: id_paciente,
                _token: CSRF_TOKEN
            };

            $.ajax({
                url: url,
                type: "POST",
                data: data,
            })
            .done(function(response) {
                console.log(response);
                if(response.estado === 1){
                    // Procesar los préstamos de audífonos
                    let table_productos_prestados = $('#tabla_historial_productos_prestados').DataTable();
                    table_productos_prestados.clear().draw();
                    let prestamos = response.data;
                    console.log(prestamos);
                    prestamos.forEach(function(prestamo) {
                        let fecha_inicio = new Date(prestamo.fecha_compra).toLocaleDateString('es-CL');
                        let fecha_fin = prestamo.fecha_devolucion ? new Date(prestamo.fecha_devolucion).toLocaleDateString('es-CL') : 'N/A';
                        let image_url = prestamo.producto.image_path || '';
                        let tiene_garantia = prestamo.tiene_garantia;
                        let tipo_garantia = prestamo.tipo_garantia;
                        let valor_garantia = prestamo.valor_garantia;

                        if(tiene_garantia){
                            fecha_fin += ' (Garantía: ' + tipo_garantia + ', Valor: $' + parseFloat(valor_garantia).toLocaleString('es-CL') + ')';
                        }

                        let fila = [
                            '<img src="' + (image_url ? (image_url.startsWith('http') ? image_url : '/' + image_url) : '/images/no-image.png') + '" alt="Producto" style="width: 50px; height: 50px; object-fit: contain;" onerror="this.src=\'/images/no-image.png\'">',
                            fecha_inicio,
                            fecha_fin,
                            prestamo.producto.nombre + ' - ' + prestamo.producto.marca_producto,
                            prestamo.estado_prestamo_text ? prestamo.estado_prestamo_text : 'N/A',
                            prestamo.observaciones ? prestamo.observaciones : 'N/A',
                            '<button class="btn btn-sm btn-danger" onclick="DevolverProducto(' + prestamo.id + ')">Devolver</button>'
                        ];
                            table_productos_prestados.row.add(fila).draw();
                    });
                } else {
                    swal('Error', response.mensaje || 'No se pudo obtener el historial de préstamos', 'error');
                }
            })
        }

        function dame_historial_reparaciones_audifono(){
        let id_producto = $('#id_producto').val();
        let id_paciente = $('#paciente_seleccionado_id').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional_fc').val();

        let url = "{{ route('laboratorio.profesional.dame_historial_reparaciones_audifono') }}";
        let data = {
            id_producto: id_producto,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            _token: CSRF_TOKEN
        };

        $.ajax({
            url: url,
            type: "POST",
            data: data,
        })
        .done(function(response) {
            console.log(response);
            if(response.estado === 1){
                // Procesar las reparaciones de audífono
                let table = $('#tabla_historial_reparaciones_audifono').DataTable();
                table.clear().draw();
                let reparaciones = response.data;
                reparaciones.forEach(function(reparacion) {
                    let fecha = new Date(reparacion.created_at).toLocaleDateString('es-CL');
                    let hora = new Date(reparacion.created_at).toLocaleTimeString('es-CL', { hour: '2-digit', minute: '2-digit' });
                    let fila = [
                        fecha + ' ' + hora,
                        reparacion.motivo_reparacion_text,
                        reparacion.estado_reparacion_text,
                        reparacion.marca_producto + ' ' + reparacion.nombre_producto,
                        reparacion.acciones_reparacion,
                        reparacion.opinion_paciente,
                        reparacion.nombre_producto_reparo
                    ];
                    table.row.add(fila).draw();
                });
            } else {
                swal('Error', response.mensaje || 'No se pudo obtener el historial de reparaciones', 'error');
            }
        })
    }



     function evaluar_tipo_control(){
        let tipo_control = $('#tipo_control_audifono').val();
        console.log('Tipo de control seleccionado:', tipo_control);
        if(tipo_control === 'Otro proveedor'){
            $('#div_otro_proveedor').removeClass('d-none');
            $('#lista_audifonos_control').addClass('d-none');
            dame_audifonos_externos();
        } else {
            $('#div_otro_proveedor').addClass('d-none');
            $('#lista_audifonos_control').removeClass('d-none');
        }
    }

    function dame_audifonos_externos(){
        let id_paciente = $('#id_paciente_externo').val();
        let url = "{{ route('laboratorio.audifono.externo.listar') }}";
        let data = {
            id_paciente: id_paciente,
            _token: CSRF_TOKEN
        };

        // Mostrar mensaje de carga
        $('#lista_audifonos_externos').html(`
            <div class="col-12">
                <div class="loading-message">
                    <i class="feather icon-loader"></i>
                    <h5 class="mt-3">Cargando audífonos externos...</h5>
                    <p class="text-muted">Por favor espere un momento</p>
                </div>
            </div>
        `);
        $.ajax({
            url: url,
            type: "GET",
            data: data,
        })
        .done(function(response) {
            console.log(response);
            $('#lista_audifonos_externos').empty();
            let audifonos = response.audifonos;
            if(audifonos.length > 0){
                audifonos.forEach(function(audifono){
                    console.log(audifono);

                    // Formatear fecha
                    let fechaAdq = new Date(audifono.fecha_adquisicion);
                    let fechaAdqStr = fechaAdq.toLocaleDateString('es-CL');

                    let item = `
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">Proveedor: ${audifono.procedencia_laboratorio}</h5>
                                    <p class="card-text">Fecha Adquisición: ${fechaAdqStr}</p>
                                    <hr>
                                    <h6>Audífono Izquierdo</h6>
                                    <p class="card-text">Marca: ${audifono.marca_izquierdo || 'N/A'}</p>
                                    <p class="card-text">Modelo: ${audifono.modelo_izquierdo || 'N/A'}</p>
                                    <p class="card-text">N° Serie: ${audifono.n_serie_izquierdo || 'N/A'}</p>
                                    <hr>
                                    <h6>Audífono Derecho</h6>
                                    <p class="card-text">Marca: ${audifono.marca_derecho || 'N/A'}</p>
                                    <p class="card-text">Modelo: ${audifono.modelo_derecho || 'N/A'}</p>
                                    <p class="card-text">N° Serie: ${audifono.n_serie_derecho || 'N/A'}</p>
                                    <hr>
                                    <p class="card-text">Estado: ${audifono.estado_audifono || 'N/A'}</p>
                                    <p class="card-text">Motivo Control: ${audifono.motivo_control || 'N/A'}</p>
                                    <p class="card-text">Observaciones: ${audifono.observaciones || 'N/A'}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    $('#lista_audifonos_externos').append(item);
                });
            } else {
                $('#lista_audifonos_externos').append('<p>No se encontraron audífonos externos.</p>');
            }
        })
        .fail(function(jqXHR) {
            console.error('Error al obtener audífonos externos:', jqXHR);
            $('#lista_audifonos_externos').html('<p>Error al cargar audífonos externos.</p>');
        });

    }

    function DevolverProducto(id_mis_producto){
        swal({
            title: '¿Devolver producto?',
            text: '¿Está seguro que desea devolver este producto?',
            icon: 'warning',
            buttons: {
                cancel: {
                    text: 'Cancelar',
                    value: null,
                    visible: true,
                    className: 'btn-secondary',
                    closeModal: true,
                },
                confirm: {
                    text: 'Sí, devolver',
                    value: true,
                    visible: true,
                    className: 'btn-primary',
                    closeModal: false
                }
            }
        }).then((confirmar) => {
            if (confirmar) {
                let url = "{{ route('laboratorio.paciente.producto.devolver') }}";
                let data = {
                    id_mis_producto: id_mis_producto,
                    _token: CSRF_TOKEN
                };

                $.ajax({
                    url: url,
                    type: "POST",
                    data: data,
                })
                .done(function(response) {
                    console.log(response);
                    if(response.estado === 1){
                        swal({
                            icon: 'success',
                            title: 'Producto devuelto',
                            text: response.mensaje || 'El producto ha sido devuelto correctamente',
                            buttons: false,
                            timer: 2000
                        })
                        .then(() => {
                            // Recargar historial de productos prestados
                            dame_historial_productos_prestados();
                        });
                        
                    } else {
                        swal('Error', response.mensaje || 'No se pudo devolver el producto', 'error');
                    }
                })
                .fail(function(jqXHR) {
                    console.error('Error al devolver producto:', jqXHR);
                    swal('Error', 'No se pudo comunicar con el servidor', 'error');
                });
            }
        });
    }

        /**
         * Validar formulario de audífono externo
         * @returns {boolean}
         */
        function validar_formulario_audifono_externo(){
            let errores = [];

            // Validar procedencia
            if($('#procedencia_laboratorio').val().trim() === ''){
                errores.push('Debe ingresar el laboratorio o proveedor');
            }

            // Validar fecha de adquisición
            if($('#fecha_adquisicion_ext').val() === ''){
                errores.push('Debe ingresar la fecha de adquisición');
            }

            // Validar audífono izquierdo
            if($('#marca_izq_ext').val().trim() === ''){
                errores.push('Debe ingresar la marca del audífono izquierdo');
            }
            if($('#modelo_izq_ext').val().trim() === ''){
                errores.push('Debe ingresar el modelo del audífono izquierdo');
            }

            // Validar audífono derecho
            if($('#marca_der_ext').val().trim() === ''){
                errores.push('Debe ingresar la marca del audífono derecho');
            }
            if($('#modelo_der_ext').val().trim() === ''){
                errores.push('Debe ingresar el modelo del audífono derecho');
            }

            if(errores.length > 0){
                let mensaje = '<ul class="text-left mb-0">';
                errores.forEach(function(error){
                    mensaje += '<li>' + error + '</li>';
                });
                mensaje += '</ul>';

                swal({
                    icon: 'warning',
                    title: 'Faltan datos obligatorios',
                    content: {
                        element: 'div',
                        attributes: {
                            innerHTML: mensaje
                        }
                    }
                });
                return false;
            }

            return true;
        }

        /**
         * Obtener datos del formulario de audífono externo
         * @returns {Object}
         */
        function obtener_datos_audifono_externo(){
            return {
                id_paciente: $('#id_paciente_externo').val(),
                procedencia_laboratorio: $('#procedencia_laboratorio').val().trim(),
                fecha_adquisicion: $('#fecha_adquisicion_ext').val(),

                // Audífono izquierdo
                n_serie_izquierdo: $('#n_serie_izq_ext').val().trim(),
                marca_izquierdo: $('#marca_izq_ext').val().trim(),
                modelo_izquierdo: $('#modelo_izq_ext').val().trim(),
                tipo_izquierdo: $('#tipo_izq_ext').val(),

                // Audífono derecho
                n_serie_derecho: $('#n_serie_der_ext').val().trim(),
                marca_derecho: $('#marca_der_ext').val().trim(),
                modelo_derecho: $('#modelo_der_ext').val().trim(),
                tipo_derecho: $('#tipo_der_ext').val(),

                // Información adicional
                estado_audifono: $('#estado_audifono_ext').val(),
                motivo_control: $('#motivo_control_ext').val(),
                observaciones: $('#observaciones_control_ext').val().trim(),

                // Datos del control
                fecha_control: $('#fecha_ex').val(),
                examinador: $('#profesional').val(),
                examen_cae: $('#ex_fis_control_audif').val(),

                _token: CSRF_TOKEN
            };
        }

        /**
         * Guardar audífono externo
         */
        function guardar_audifono_externo(){
            console.log('Guardando audífono externo...');

            // Validar formulario
            if(!validar_formulario_audifono_externo()){
                return;
            }

            // Obtener datos
            let datos = obtener_datos_audifono_externo();
            console.log('Datos a enviar:', datos);

            // Mostrar confirmación
            swal({
                title: '¿Guardar audífono externo?',
                text: 'Se registrará el audífono del proveedor: ' + datos.procedencia_laboratorio,
                icon: 'question',
                buttons: {
                    cancel: {
                        text: 'Cancelar',
                        value: null,
                        visible: true,
                        className: 'btn-secondary',
                        closeModal: true,
                    },
                    confirm: {
                        text: 'Sí, guardar',
                        value: true,
                        visible: true,
                        className: 'btn-primary',
                        closeModal: false
                    }
                }
            }).then((confirmar) => {
                if (confirmar) {
                    // Aquí irá la petición AJAX cuando esté listo el backend
                    console.log('Datos que se enviarían al backend:', datos);

                    // Simulación de guardado exitoso (comentar cuando esté el backend)
                    // setTimeout(function(){
                    //     swal({
                    //         icon: 'success',
                    //         title: 'Audífono registrado',
                    //         text: 'El audífono externo ha sido registrado correctamente',
                    //         buttons: false,
                    //         timer: 2000
                    //     }).then(() => {
                    //         limpiar_formulario_audifono_externo();
                    //         // Opcional: recargar lista de audífonos
                    //         // mis_audifonos();
                    //     });
                    // }, 500);

                    let url = "{{ route('laboratorio.audifono.externo.guardar') }}";
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: datos,
                    })
                    .done(function(response) {
                        console.log('Respuesta del servidor:', response);
                        if(response.estado === 1){
                            swal({
                                icon: 'success',
                                title: 'Audífono registrado',
                                text: response.mensaje || 'El audífono externo ha sido registrado correctamente',
                                buttons: false,
                                timer: 2000
                            }).then(() => {
                                limpiar_formulario_audifono_externo();
                                // Recargar lista de audífonos
                                mis_audifonos();
                            });
                        } else {
                            swal('Error', response.mensaje || 'No se pudo guardar el audífono', 'error');
                        }
                    })
                    .fail(function(jqXHR) {
                        console.error('Error al guardar:', jqXHR);
                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error al guardar el audífono externo'
                        });
                    });

                }
            });
        }

        /**
         * Limpiar formulario de audífono externo
         */
        function limpiar_formulario_audifono_externo(){
            $('#form_audifono_externo')[0].reset();
            $('#procedencia_laboratorio').val('');
            $('#fecha_adquisicion_ext').val('');

            // Audífono izquierdo
            $('#n_serie_izq_ext').val('');
            $('#marca_izq_ext').val('');
            $('#modelo_izq_ext').val('');
            $('#tipo_izq_ext').val('');

            // Audífono derecho
            $('#n_serie_der_ext').val('');
            $('#marca_der_ext').val('');
            $('#modelo_der_ext').val('');
            $('#tipo_der_ext').val('');

            // Información adicional
            $('#estado_audifono_ext').val('Bueno');
            $('#motivo_control_ext').val('');
            $('#observaciones_control_ext').val('');

            console.log('Formulario limpiado');
        }

        /**
         * Cancelar registro de audífono externo
         */
        function cancelar_audifono_externo(){
            swal({
                title: '¿Cancelar registro?',
                text: 'Se perderán los datos ingresados',
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: 'No, continuar editando',
                        value: null,
                        visible: true,
                        className: 'btn-secondary',
                        closeModal: true,
                    },
                    confirm: {
                        text: 'Sí, cancelar',
                        value: true,
                        visible: true,
                        className: 'btn-danger',
                        closeModal: true
                    }
                }
            }).then((confirmar) => {
                if (confirmar) {
                    limpiar_formulario_audifono_externo();
                    $('#tipo_control_audifono').val('Seleccione');
                    evaluar_tipo_control();
                    swal({
                        icon: 'info',
                        title: 'Registro cancelado',
                        buttons: false,
                        timer: 1500
                    });
                }
            });
        }

        function enviar_campana_promocional(){
            swal({
                title: '¿Enviar campaña promocional?',
                text: '¿Estás seguro de enviar esta campaña a los destinatarios seleccionados?',
                icon: 'info',
                buttons: {
                    cancel: {
                        text: 'Cancelar',
                        value: null,
                        visible: true,
                        className: 'btn-secondary',
                        closeModal: true,
                    },
                    confirm: {
                        text: 'Sí, enviar',
                        value: true,
                        visible: true,
                        className: 'btn-primary',
                        closeModal: false
                    }
                }
            }).then((confirmar) => {
                if (confirmar) {
                    enviar_campana_promocional_confirmar();
                }
            })
        }

        function enviar_campana_promocional_confirmar() {
            // Obtener datos del formulario
            var titulo = $('#campana_titulo').val().trim();
            var remitente = $('#campana_remitente').val().trim();
            var mensaje = window.editorVppb ? window.editorVppb.getData().trim() : $('#campana_mensaje').val().trim();
            var destinatarios = $('#campana_destinatarios').val();
            var destinatarios_custom = $('#campana_destinatarios_custom').val().trim();
            var id_lugar_atencion = $('#id_lugar_atencion').val();
            var id_institucion = '{{ $profesional->id }}';
        
            // Validación básica
            if (!titulo || !remitente || !mensaje) {
                swal({ icon: 'warning', title: 'Faltan datos', text: 'Completa todos los campos obligatorios.' });
                return;
            }
            if (destinatarios === 'custom' && !destinatarios_custom) {
                swal({ icon: 'warning', title: 'Faltan correos', text: 'Debes ingresar al menos un correo manual.' });
                return;
            }
        
            // Mostrar loader
            swal({
                title: 'Enviando campaña...',
                html: 'Esto puede tardar unos segundos.',
                allowOutsideClick: false,
                didOpen: () => { Swal.showLoading(); }
            });
        
            // Preparar FormData
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('titulo', titulo);
            formData.append('remitente', remitente);
            formData.append('mensaje', mensaje);
            formData.append('destinatarios', destinatarios);
            formData.append('destinatarios_custom', destinatarios_custom);
            formData.append('id_lugar_atencion', id_lugar_atencion);
            formData.append('id_institucion', id_institucion);
            $("input[name='campana_destinatarios[]']:checked").each(function(i, el) {
                formData.append('campana_destinatarios[]', el.value);
            });
            $("input[name='filtro_sexo[]']:checked").each(function(i, el) {
                formData.append('filtro_sexo[]', el.value);
            });
            formData.append('filtro_tercera_edad', $("#filtro_tercera_edad").is(":checked") ? 1 : 0);
            formData.append('filtro_pacientes_audifonos', $("#filtro_pacientes_audifonos").is(":checked") ? 1 : 0);
            formData.append('campana_destinatarios_custom', $("#campana_destinatarios_custom").val());
        
            // Adjuntar archivos (input tipo file, múltiple)
            var archivos = $('#archivos')[0]?.files;
            if (archivos && archivos.length > 0) {
                for (var i = 0; i < archivos.length; i++) {
                    formData.append('archivos[]', archivos[i]);
                }
            }
            // Adjuntar imágenes (input tipo file, múltiple)
            var imagenes = $('#imagenes')[0]?.files;
            if (imagenes && imagenes.length > 0) {
                for (var i = 0; i < imagenes.length; i++) {
                    formData.append('imagenes[]', imagenes[i]);
                }
            }
        
            $.ajax({
                url: '{{ route("laboratorio.registrar_campania_publicitaria") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    swal.close();
                    if (response.success) {
                        swal({ icon: 'success', title: 'Campaña enviada', text: response.message || 'Los correos fueron enviados correctamente.' });
                        $('#form_campana_promocional')[0].reset();
                        $('#div_destinatarios_custom').hide();
                        historial_campanas_publicitarias();
                    } else {
                        swal({ icon: 'error', title: 'Error', text: response.message || 'No se pudo enviar la campaña.' });
                    }
                },
                error: function(xhr) {
                    swal.close();
                    swal({ icon: 'error', title: 'Error', text: 'Ocurrió un error al enviar la campaña.' });
                }
            });
        }

        function actualizar_lista_destinatarios() {
            var tipo = $('#campana_destinatarios').val();
            if (tipo === 'custom') {
                $('#div_destinatarios_custom').show();
            } else {
                $('#div_destinatarios_custom').hide();
            }
        }

        function historial_campanas_publicitarias(){
            let url = "{{ route('laboratorio.historial_campanias_publicitarias') }}";
            let id_institucion = '{{ $profesional->id }}';

            let data = {
                _token: CSRF_TOKEN,
                id_institucion: id_institucion,
            };

            $.ajax({
                url: url,
                type: "POST",
                data: data,
            }).done(function(response) {
                console.log(response);
                if(response.estado === 1){
                    let table = $('#tabla_historial_campanas').DataTable();
                    table.clear().draw();
                    let campanas = response.data;
                    console.log(campanas);
                    campanas.forEach(function(campana) {
                        console.log(campana);
                        let fecha = new Date(campana.created_at).toLocaleDateString('es-CL');
                        let hora = new Date(campana.created_at).toLocaleTimeString('es-CL', { hour: '2-digit', minute: '2-digit' });
                        let fila = [
                            campana.titulo,
                            fecha + ' ' + hora,
                            campana.remitente,
                            campana.destinatarios,
                            campana.estado,
                            '<button class="btn btn-sm btn-info" onclick="ver_detalle_campana(' + campana.id + ')"><i class="feather icon-eye"></i> Ver detalle</button>'
                        ];
                        table.row.add(fila).draw();
                    });

                } else {
                    swal('Error', response.mensaje || 'No se pudo obtener el historial de campañas', 'error');
                }
            })

        }

        function ver_detalle_campana(id_campania){
            let url = "{{ route('laboratorio.detalle_campania_publicitaria') }}";
            let data = {
                _token: CSRF_TOKEN,
                id_campania: id_campania,
            };

            $.ajax({
                url: url,
                type: "POST",
                data: data,
            }).done(function(response) {
                console.log(response);
                if(response.estado === 1){
                    let campana = response.data;
                    $('#detalle_campana_titulo').text(campana.titulo);
                    $('#detalle_campana_remitente').text(campana.remitente);
                    $('#detalle_campana_destinatarios').text(campana.destinatarios);
                    $('#detalle_campana_detalle_envio').text(campana.log_envio);
                    $('#detalle_campana_mensaje').html(campana.mensaje);
                    // ...cargar datos en el modal...
                    if (campana.estado === 'pendiente') {
                        $('#btn_enviar_campana').show().data('id', campana.id);
                    } else {
                        $('#btn_enviar_campana').hide();
                    }
                    $('#modal_detalle_campana').modal('show');
                } else {
                    swal('Error', response.mensaje || 'No se pudo obtener el detalle de la campaña', 'error');
                }
            })
        }

        function enviarCampanaPendiente() {
            var idCampana = $('#btn_enviar_campana').data('id');
            $.ajax({
                url: '/ruta/para/enviar/campana/' + idCampana,
                type: 'POST',
                data: {_token: CSRF_TOKEN},
                success: function(response) {
                    swal('Campaña procesada', 'La campaña fue enviada correctamente.', 'success');
                    $('#modal_detalle_campana').modal('hide');
                    // Recargar historial si es necesario
                },
                error: function(xhr) {
                    swal('Error', 'No se pudo procesar la campaña.', 'error');
                }
            });
        }

         /**
         * Vaciar carrito completo
         */
        function vaciarCarritoCompleto() {
            swal({
                title: '¿Vaciar carrito?',
                text: 'Se eliminarán todos los productos del carrito',
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Sí, vaciar",
                        value: true,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    }
                },
                dangerMode: true
            }).then((willEmpty) => {
                if (willEmpty) {
                    let url = "{{ route('laboratorio.carrito.vaciar') }}";

                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: {
                            _token: CSRF_TOKEN
                        },
                    })
                    .done(function(response) {
                        if (response.estado === 1) {
                            carritoData = {
                                items: [],
                                total: 0,
                                cantidad_items: 0
                            };

                            actualizarBadgeCarrito();
                            swal.close();

                            swal({
                                icon: 'success',
                                title: 'Carrito vaciado',
                                text: 'Se eliminaron todos los productos',
                                buttons: false,
                                timer: 1500
                            });
                        } else {
                            swal({
                                icon: 'error',
                                title: 'Error',
                                text: response.mensaje || 'No se pudo vaciar el carrito'
                            });
                        }
                    })
                    .fail(function(jqXHR) {
                        console.error('Error al vaciar carrito:', jqXHR);
                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error al comunicarse con el servidor'
                        });
                    });
                }
            });
        }

        /**
         * Vaciar carrito de préstamos completo
         */
        function vaciarCarritoPrestamoCompleto() {
            swal({
                title: '¿Vaciar carrito de préstamos?',
                text: 'Se eliminarán todos los productos del carrito de préstamos',
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Sí, vaciar",
                        value: true,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    }
                },
                dangerMode: true
            }).then((willEmpty) => {
                if (willEmpty) {
                    let url = "{{ route('laboratorio.carrito_prestamos.vaciar') }}";

                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: {
                            id_paciente: $('#id_paciente_fc').val(),
                            _token: CSRF_TOKEN
                        },
                    })
                    .done(function(response) {
                        console.log('Respuesta al vaciar carrito de préstamos:', response);
                        if (response.estado === 1) {
                            carritoPrestamoData = {
                                items: [],
                                total: 0,
                                cantidad_items: 0
                            };

                            actualizarBadgeCarritoPrestamo();
                            swal.close();

                            swal({
                                icon: 'success',
                                title: 'Carrito de préstamos vaciado',
                                text: 'Se eliminaron todos los productos',
                                buttons: false,
                                timer: 1500
                            });
                        } else {
                            swal({
                                icon: 'error',
                                title: 'Error',
                                text: response.mensaje || 'No se pudo vaciar el carrito de préstamos'
                            });
                        }
                    })
                    .fail(function(jqXHR) {
                        console.error('Error al vaciar carrito de préstamos:', jqXHR);
                        swal({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error al comunicarse con el servidor'
                        });
                    });
                }
            }); 
        }

/**
 * Registrar paciente para COTIZACIÓN
 */
function registrar_paciente_nuevo_cotiz() {
    // Lógica para registrar el paciente en la cotización
    console.log('Registrar nuevo paciente para cotización');
    let rut_paciente_cotiz = $('#termino_busqueda_paciente_cotiz').val();
    if (rut_paciente_cotiz == '')
    {
        swal({
            title: "Error!",
            text: "Debe ingresar el Rut",
            icon: "error",
            type: "danger",
            DangerMode: true,
        });
        return false;
    }

    let cotiz_hora_nombre = $('#cotiz_hora_nombres_paciente').val();
    if (cotiz_hora_nombre == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar los nombres del paciente",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let cotiz_hora_primer_apellido = $('#cotiz_hora_apellido_uno').val();
    if (cotiz_hora_primer_apellido == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar el primer apellido",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let cotiz_hora_segundo_apellido = $('#cotiz_hora_apellido_dos').val();
    if (cotiz_hora_segundo_apellido == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar el segundo apellido",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });

        return;

    }
    let cotiz_hora_fecha_nac = $('#cotiz_hora_fecha_nac').val();
    if (cotiz_hora_fecha_nac == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar la fecha de nacimiento",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;
    }

    let cotiz_hora_sexo = $('#cotiz_hora_sexo').val();
    if (cotiz_hora_sexo == '0') {

        swal({
            title: "Error!",
            text: "Debe seleccionar el del sexo del paciente",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });

        return;
    }
    let cotiz_hora_convenio = $('#cotiz_hora_convenio').val();
    if (cotiz_hora_convenio == '0') {

        swal({
            title: "Error!",
            text: "Debe seleccionar la previsión del paciente",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    let cotiz_hora_direccion = $('#cotiz_hora_direccion').val();
    if (cotiz_hora_direccion == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar una dirección",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    let cotiz_hora_numero_dir = $('#cotiz_hora_numero_dir').val();
    {{--
    if (cotiz_hora_numero_dir == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar un numero a su dirección",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    --}}

    let cotiz_hora_region = $('#region_agregar_cotiz').val();
    if (cotiz_hora_region == '' || cotiz_hora_region == '0' || cotiz_hora_region == 'null' || cotiz_hora_region == null) {

        swal({
            title: "Error!",
            text: "Debe ingresar la región y la ciudad",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let cotiz_hora_comuna = $('#ciudad_agregar_cotiz').val();
    if (cotiz_hora_comuna == '' || cotiz_hora_comuna == '0' || cotiz_hora_comuna == 'null' || cotiz_hora_comuna == null) {

        swal({
            title: "Error!",
            text: "Debe ingresar la región y la ciudad",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let cotiz_hora_email = $('#cotiz_hora_correo').val();
    let cotiz_hora_telefono_uno = $('#cotiz_hora_telefono_uno').val();
    let cotiz_result_codigo_validacion = $('#result_codigo_validacion').val();

    let fechaNacimiento = new Date(cotiz_hora_fecha_nac);
    let hoy = new Date();
    let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

    // Comprobamos si el mes y el día de la fecha de nacimiento ya pasaron en el año actual
    if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy.getDate() < fechaNacimiento.getDate())) {
        edad--;
    }

    // if( edad > 18 )
    if( $('#paciente_dependiente').prop('checked') == false )
    {
        if (cotiz_hora_email == '') {

            if(cotiz_hora_telefono_uno == '' && (cotiz_result_codigo_validacion =='' || cotiz_result_codigo_validacion =='0') )
            {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el email o teléfono",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
                return;
            }
            else
            {
                if(cotiz_result_codigo_validacion =='0')
                {
                    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
                    if (caract.test(cotiz_hora_email) == false){
                        swal({
                            title: "Error!",
                            text: "Debe ingresar el email o teléfono",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,
                        });
                        return;
                    }
                }
            }
        }
        else
        {

            if (cotiz_hora_telefono_uno == '')
            {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el teléfono",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
                return;
            }
            else
            {
                if(cotiz_hora_telefono_uno == '' && (cotiz_result_codigo_validacion =='' || cotiz_result_codigo_validacion =='0'))
                {
                    swal({
                        title: "Error!",
                        text: "Debe validar el teléfono",
                        icon: "error",
                        type: "danger",
                        DangerMode: true,
                    });
                    return;
                }
            }
        }
    }

    let data = {
        rut: rut_paciente_cotiz,
        nombres: cotiz_hora_nombre,
        apellido_uno: cotiz_hora_primer_apellido,
        apellido_dos: cotiz_hora_segundo_apellido,
        fecha_nacimiento: cotiz_hora_fecha_nac,
        sexo: cotiz_hora_sexo,
        prevision_id: cotiz_hora_convenio,
        direccion: cotiz_hora_direccion,
        numero_direccion: cotiz_hora_numero_dir,
        comuna_id: cotiz_hora_comuna,
        email: cotiz_hora_email,
        telefono_uno: cotiz_hora_telefono_uno,
    }

    console.log('Datos para registrar paciente cotización:', data);

    let url = "{{ route('paciente.laboratorio.registrar') }}";

    $.ajax({
        url: url,
        type: "post",
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    })
    .done(function(data) {
        console.log('Respuesta al registrar paciente cotización:', data);
        if (data != null) {

            if (data.estado == 'ok') {
                swal({
                    title: "Éxito!",
                    text: "Paciente registrado correctamente",
                    icon: "success",
                    type: "success",
                    timer: 2000,
                    buttons: false,
                });

                // Seleccionar el paciente recién creado
                seleccionar_paciente_venta(data.paciente.id, data.paciente.rut, data.paciente.nombres + ' ' + data.paciente.apellido_uno, data.paciente.telefono_uno, data.paciente.email);

                // Cerrar modal
                $('#reserva_agregar_paciente_hora_cotiz').hide();

            } else {
                swal({
                    title: "Error!",
                    text: "Error al registrar el paciente",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
            }
        }
    })
}

function registrar_paciente_nuevo_prestamo() {
    // Lógica para registrar el paciente en el préstamo
    console.log('Registrar nuevo paciente para préstamo');
    let rut_paciente_prestamo = $('#termino_busqueda_paciente_prestamo').val();
    if (rut_paciente_prestamo == '')
    {
        swal({
            title: "Error!",
            text: "Debe ingresar el Rut",
            icon: "error",
            type: "danger",
            DangerMode: true,
        });
        return false;
    }

    let prestamo_nombres = $('#prestamo_nombres').val();
    if (prestamo_nombres == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar los nombres del paciente",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let prestamo_apellido_uno = $('#prestamo_apellido_uno').val();
    if (prestamo_apellido_uno == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar el primer apellido",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let prestamo_apellido_dos = $('#prestamo_apellido_dos').val();
    if (prestamo_apellido_dos == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar el segundo apellido",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });

        return;

    }
    let prestamo_fecha_nac = $('#prestamo_fecha_nac').val();
    if (prestamo_fecha_nac == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar la fecha de nacimiento",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;
    }

    let prestamo_sexo = $('#prestamo_sexo').val();
    if (prestamo_sexo == '0') {

        swal({
            title: "Error!",
            text: "Debe seleccionar el del sexo del paciente",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });

        return;
    }
    let prestamo_convenio = $('#prestamo_convenio').val();
    if (prestamo_convenio == '0') {

        swal({
            title: "Error!",
            text: "Debe seleccionar la previsión del paciente",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    let prestamo_direccion = $('#prestamo_direccion').val();
    if (prestamo_direccion == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar una dirección",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    let prestamo_numero_dir = $('#prestamo_numero_dir').val();
    {{--
    if (prestamo_numero_dir == '') {

        swal({
            title: "Error!",
            text: "Debe ingresar un numero a su dirección",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }
    --}}

    let prestamo_region = $('#region_agregar_prestamo').val();
    if (prestamo_region == '' || prestamo_region == '0' || prestamo_region == 'null' || prestamo_region == null) {

        swal({
            title: "Error!",
            text: "Debe ingresar la región y la ciudad",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let prestamo_comuna = $('#ciudad_agregar_prestamo').val();
    if (prestamo_comuna == '' || prestamo_comuna == '0' || prestamo_comuna == 'null' || prestamo_comuna == null) {

        swal({
            title: "Error!",
            text: "Debe ingresar la región y la ciudad",
            icon: "error",
            type: "danger",
            DangerMode: true,

        });
        return;

    }

    let prestamo_email = $('#prestamo_correo').val();
    let prestamo_telefono_uno = $('#prestamo_telefono_uno').val();
    let prestamo_result_codigo_validacion = $('#result_codigo_validacion').val();

    let fechaNacimiento = new Date(prestamo_fecha_nac);
    let hoy = new Date();
    let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

    // Comprobamos si el mes y el día de la fecha de nacimiento ya pasaron en el año actual
    if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy.getDate() < fechaNacimiento.getDate())) {
        edad--;
    }

    // if( edad > 18 )
    if( $('#paciente_dependiente').prop('checked') == false )
    {
        if (prestamo_email == '') {

            if(prestamo_telefono_uno == '' && (prestamo_result_codigo_validacion =='' || prestamo_result_codigo_validacion =='0') )
            {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el email o teléfono",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
                return;
            }
            else
            {
                if(prestamo_result_codigo_validacion =='0')
                {
                    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
                    if (caract.test(prestamo_email) == false){
                        swal({
                            title: "Error!",
                            text: "Debe ingresar el email o teléfono",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,
                        });
                        return;
                    }
                }
            }
        }
        else
        {

            if (prestamo_telefono_uno == '')
            {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el teléfono",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
                return;
            }
            else
            {
                if(prestamo_telefono_uno == '' && (prestamo_result_codigo_validacion =='' || prestamo_result_codigo_validacion =='0'))
                {
                    swal({
                        title: "Error!",
                        text: "Debe validar el teléfono",
                        icon: "error",
                        type: "danger",
                        DangerMode: true,
                    });
                    return;
                }
            }
        }
    }

    let data = {
        rut: rut_paciente_cotiz,
        nombres: cotiz_hora_nombre,
        apellido_uno: cotiz_hora_primer_apellido,
        apellido_dos: cotiz_hora_segundo_apellido,
        fecha_nacimiento: cotiz_hora_fecha_nac,
        sexo: cotiz_hora_sexo,
        prevision_id: cotiz_hora_convenio,
        direccion: cotiz_hora_direccion,
        numero_direccion: cotiz_hora_numero_dir,
        comuna_id: cotiz_hora_comuna,
        email: cotiz_hora_email,
        telefono_uno: cotiz_hora_telefono_uno,
    }

    console.log('Datos para registrar paciente cotización:', data);

    let url = "{{ route('paciente.laboratorio.registrar') }}";

    $.ajax({
        url: url,
        type: "post",
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    })
    .done(function(data) {
        console.log('Respuesta al registrar paciente cotización:', data);
        if (data != null) {

            if (data.estado == 'ok') {
                swal({
                    title: "Éxito!",
                    text: "Paciente registrado correctamente",
                    icon: "success",
                    type: "success",
                    timer: 2000,
                    buttons: false,
                });

                // Seleccionar el paciente recién creado
                seleccionar_paciente_venta(data.paciente.id, data.paciente.rut, data.paciente.nombres + ' ' + data.paciente.apellido_uno, data.paciente.telefono_uno, data.paciente.email);

                // Cerrar modal
                $('#reserva_agregar_paciente_hora_prestamo').hide();

            } else {
                swal({
                    title: "Error!",
                    text: "Error al registrar el paciente",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
            }
        }
    })
}
</script>
