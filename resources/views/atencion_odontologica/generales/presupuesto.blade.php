<style>
    .status-circle .circle {
        width: 20px;
        height: 20px;
        background-color: red;
        border-radius: 50%;
        display: inline-block;
        border: 2px solid #fff;
        /* Opcional: Borde blanco para mejor visibilidad */
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        /* Opcional: Sombra suave */
    }

    .promo-banner {
        background-color: #1a49a3!important;
        color: #fff;
        padding: 15px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        /* animation: pulse 1.5s infinite alternate; */
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        100% {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }
    }
</style>

<div id="form-presup_dent">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-10" id="od_grl" role="tablist">
                                @if (!$paciente->es_adulto)
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset " id="od_pac_depend_tab" data-toggle="tab"
                                            href="#od_pac_depend" role="tab" aria-controls="od_pac_depend"
                                            aria-selected="true">Paciente Menor de edad y Dependientes</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="od_convenios_vigentes-tab" data-toggle="tab"
                                        href="#od_convenios_vigentes" role="tab"
                                        aria-controls="od_convenios_vigentes" aria-selected="true">Convenios
                                        vigentes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="od_presup_clinico-tab"
                                        data-toggle="tab" href="#od_presup_clinico" role="tab"
                                        aria-controls="od_presup_clinico" aria-selected="true">Presupuesto Clinico</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="od_laboratorio-tab" data-toggle="tab"
                                        href="#od_laboratorio" role="tab" aria-controls="od_laboratorio"
                                        aria-selected="true">Laboratorio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="od__presup_gral-tab" data-toggle="tab"
                                        href="#od__presup_gral" role="tab" aria-controls="od__presup_gral"
                                        aria-selected="true">Presupuesto General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="od_abonos_pres-tab" data-toggle="tab"
                                        href="#od_abonos_pres" role="tab" aria-control="od_abonos_pres"
                                        aria-selected="false" onclick="actualizar_presupuesto()">Abonos y Estados de Pago</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="tab-content" id="od_grl">
                <!--DEPENDIENTES-->
                <div class="tab-pane fade  {{ !$paciente->es_adulto ? 'show active' : '' }}" id="od_pac_depend"
                    role="tabpanel" aria-labelledby="od_pac_depend_tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist"
                                                aria-orientation="vertical">
                                                <a class="nav-link-aten text-reset active " id="od_at_menor-tab"
                                                    data-toggle="tab" href="#od_at_menor" role="tab"
                                                    aria-controls="od_at_menor" aria-selected="false">Identificación
                                                </a>
                                                <a class="nav-link-aten text-reset" id="od_at_acomp_a-tab"
                                                    data-toggle="tab" href="#od_at_acomp_a" role="tab"
                                                    aria-controls="od_at_acomp_a" aria-selected="true">Acompañantes
                                                    Autorizados</a>
                                                <a class="nav-link-aten text-reset" id="od_at_res_p-tab"
                                                    data-toggle="tab" href="#od_at_res_p" role="tab"
                                                    aria-controls="od_at_res_p" aria-selected="true">Responsable del
                                                    Pago </a>
                                                <a class="nav-link-aten text-reset" id="od_at_part-tab"
                                                    data-toggle="tab" href="#od_at_part" role="tab"
                                                    aria-controls="od_at_part"
                                                    aria-selected="false">Particularidades</a>
                                                <a class="nav-link-aten text-reset" id="od_at_perm-tab"
                                                    data-toggle="tab" href="#od_at_perm" role="tab"
                                                    aria-controls="od_at_perm" aria-selected="false">Solicitar
                                                    Permisos</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="od_at_menor"
                                                    role="tabpanel" aria-labelledby="od_at_menor-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Rut</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_pte_rut"id="od_id_pte_rut"
                                                                    value="{{ $paciente->rut }}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Nombre y
                                                                    Apellidos</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_pte_nomb"id="od_id_pte_nomb"
                                                                    value="{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}">
                                                            </div>
                                                            <div class="form-group col-md-2" id="form_0">
                                                                <label class="floating-label-activo-sm">FN</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_pte_fn"id="od_id_pte_fn">
                                                            </div>
                                                            <div class="form-group col-md-2" id="form_0">
                                                                <label class="floating-label-activo-sm">Edad</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_pte_edad"id="od_id_pte_edad"
                                                                    value="{{ $paciente->edad }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="floating-label-activo-sm">Observaciones
                                                                    </label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo"
                                                                        data-seccion="Oídos Audición" data-tipo="general" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                        name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show" id="od_at_acomp_a" role="tabpanel"
                                                    aria-labelledby="od_at_acomp_a-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label-activo-sm">Rut</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_rut"id="od_id_aca_rut">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Nombre y
                                                                    Apellidos</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_nomb"id="od_id_aca_nomb">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label
                                                                    class="floating-label-activo-sm">Parentezco</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_rut"id="od_id_aca_rut">
                                                            </div>
                                                            <div class="form-group col-md-2" id="form_0">
                                                                <label
                                                                    class="floating-label-activo-sm">Teléfono</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_tel"id="od_id_aca_tel">
                                                            </div>
                                                            <div class="form-group col-md-2" id="form_0">
                                                                <label class="floating-label-activo-sm">Email</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_email"id="od_id_aca_email">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="floating-label-activo-sm">Observaciones
                                                                    </label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo"
                                                                        data-seccion="Oídos Audición" data-tipo="general" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                        name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show" id="od_at_res_p" role="tabpanel"
                                                    aria-labelledby="od_at_res_p-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Rut</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_rut"id="od_id_aca_rut">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Nombre y
                                                                    Apellidos</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_nomb"id="od_id_aca_nomb">
                                                            </div>
                                                            <div class="form-group col-md-2" id="form_0">
                                                                <label
                                                                    class="floating-label-activo-sm">Teléfono</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_tel"id="od_id_aca_tel">
                                                            </div>
                                                            <div class="form-group col-md-2" id="form_0">
                                                                <label class="floating-label-activo-sm">Email</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="od_id_aca_email"id="od_id_aca_email">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary btn-block btn-sm"
                                                                        onclick="abrir_modal_guardar_aceptar_pago(' ');"><i
                                                                            class="fas fa-save"></i> Aceptar
                                                                        Presupuesto y pago</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="od_at_part" role="tabpanel"
                                                    aria-labelledby="od_at_part-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Observaciones
                                                                    Acerca del tipo de Paciente</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico"
                                                                    data-seccion="Oídos Audición" data-tipo="general" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                    name="obs_ex_biom" id="obs_ex_biom"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="od_at_perm" role="tabpanel"
                                                    aria-labelledby="od_at_perm-tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="floating-label-activo-sm">Autorización
                                                                        Vigente</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="od_est_aut_v"id="od_est_aut_venc">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="floating-label-activo-sm">Autorización
                                                                        Vencida</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        name="od_est_aut_venc"id="od_est_aut_venc">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary btn-block btn-sm"
                                                                        onclick="abrir_modal_guardar_aceptar_pago(' ');"><i
                                                                            class="fas fa-save"></i> Solicitar o
                                                                        Renovar autorización</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label
                                                                    class="floating-label-activo-sm">Observaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico"
                                                                    data-seccion="Oídos Audición" data-tipo="general" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                    name="obs_ex_biom" id="obs_ex_biom"></textarea>
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
                <!--CONVENIOS VIGENTES-->
                <div class="tab-pane fade show" id="od_convenios_vigentes" role="tabpanel"
                    aria-labelledby="od_convenios_vigentes_tab">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="tit-gen">Convenios Vigentes</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card mb-3 borde-azul">
                                <div class="card-body">
                                     <p class="font-weight-bold"><span class="text-c-blue">Convenio del paciente:</span> {{ $paciente->prevision->nombre }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row row-cols-1 row-cols-md-2 row-cols-lg-6 row-cols-xl-3 row-cols-xxl-5">
                        @if ($convenios_prevision->count() > 0)
                            @foreach ($convenios_prevision as $c)
                                <div class="col-md-3 mb-2">
                                    <div class="card-informacion">
                                        <div class="card-body">
                                            <div class="media">
                                                <img src="{{ asset('images/iconos/usuario_profesional.svg') }}"
                                                    class="mr-3 mt-2 wid-70 rounded-circle" alt="...">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-1">{{ $c->nombre_convenio }}</h5>
                                                    <p class="mb-2">{{ $c->porcentaje }} % {{ $c->descripcion }}</p>
                                                    <a href="#" class="btn btn-primary btn-sm"
                                                        @if ($paciente->prevision->nombre == $c->nombre_convenio) onclick="aplicar_convenio_tratamiento({{ $c->id }})" @endif>Aplicar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <span class="badge badge-danger">No ha configurado sus convenios. Puede ir directamente
                                desde este <a href="{{ route('profesional.mis_propios_convenios') }}">link </a></span>
                        @endif

                    </div>
                </div>
                <!--PRESUPUESTO CLÍNICO-->
                <div class="tab-pane fade show active" id="od_presup_clinico" role="tabpanel"
                    aria-labelledby="od_presup_clinico_tab">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="tit-gen">Presupuesto Clínico</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <form>
                                <div class="form-row" id="contenedor_piezas_dentales_presupuesto">
                                    @foreach ($odontograma as $o)
                                        @if ($o->presupuesto == 1 && $o->urgencia == 0)
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-informacion">
                                                    <div class="card-body pb-0">
                                                        <div class="form-row">
                                                            <div
                                                                class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1">
                                                                <label class="floating-label-activo-sm">Pieza</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="{{ $o->pieza }}">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4">
                                                                <label
                                                                    class="floating-label-activo-sm">Prestación</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="prestación" id="prestación"
                                                                    value="{{ $o->descripcion }}">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                                                <label
                                                                    class="floating-label-activo-sm">Sub-Total</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="${{ number_format($o->valor, 0, ',', '.') }}">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                                <label
                                                                    class="floating-label-activo-sm">Descuento</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                                                <label class="floating-label-activo-sm">Total
                                                                    prestación</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="${{ number_format($o->valor, 0, ',', '.') }}">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                                <button type="button"
                                                                    class="btn btn-danger btn-icon"
                                                                    onclick="eliminar_odontograma({{ $o->id }})"><i
                                                                        class="feather icon-x"></i> </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="form-row" id="contenedor_todos">
                                    @foreach ($todos as $diagnostico)
                                        @if ($diagnostico->presupuesto == 1)
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-informacion">
                                                    <div class="card-body pb-0">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label
                                                                    class="floating-label-activo-sm">{{ $diagnostico->localizacion }}</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label
                                                                    class="floating-label-activo-sm">Prestación</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="prestación" id="prestación"
                                                                    value="{{ $diagnostico->diagnostico_tratamiento }}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label
                                                                    class="floating-label-activo-sm">Sub-Total</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="{{ number_format($diagnostico->valor, 0, ',', '.') }}">
                                                            </div>
                                                            <div
                                                                class="form-group col-sm-12 col-md-3">
                                                                <label
                                                                    class="floating-label-activo-sm">Descuento</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Total
                                                                    prestación</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="{{ number_format($diagnostico->valor, 0, ',', '.') }}">
                                                            </div>
                                                            <div class="form-group col-md-1 d-flex">
                                                                <button type="button"
                                                                    class="btn btn-danger btn-icon"
                                                                    onclick="sacar_de_presupuesto({{ $diagnostico->id }},'gral', this)"><i
                                                                        class="feather icon-x"></i> </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="form-row" id="contenedor_insumos">
                                    @foreach ($insumos_tratamientos as $diagnostico)
                                        @if ($diagnostico->presupuesto == 1 && $diagnostico->urgencia == 0)
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-informacion">
                                                    <div class="card-body pb-0">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12 col-lg-4">
                                                                <label class="floating-label-activo-sm">Insumo</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="insumo_pres" id="insumo_pres"
                                                                    value="{{ $diagnostico->insumos }} {{ $diagnostico->nombre_marca }}">
                                                            </div>
                                                            <div class="form-group col-md-3 col-lg-1">
                                                                <label
                                                                    class="floating-label-activo-sm">Cantidad</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="cantidad_pres" id="cantidad_pres"
                                                                    value="{{ $diagnostico->cantidad }}">
                                                            </div>
                                                            <div class="form-group col-md-3 col-lg-2">
                                                                <label
                                                                    class="floating-label-activo-sm">Sub-Total</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="{{ number_format($diagnostico->valor, 0, ',', '.') }}">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-2 col-lg-2">
                                                                <label
                                                                    class="floating-label-activo-sm">Descuento</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="{{ $diagnostico->descuento }}">
                                                            </div>
                                                            <div class="form-group col-md-3 col-lg-2">
                                                                <label class="floating-label-activo-sm">Total
                                                                    Prestación</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="pieza" id="pieza"
                                                                    value="{{ number_format($diagnostico->valor * $diagnostico->cantidad, 0, ',', '.') }}">
                                                            </div>
                                                            <div
                                                                class="form-group col-md-1 col-lg-1 d-flex">

                                                                <button type="button"
                                                                    class="btn btn-danger btn-icon"
                                                                    onclick="eliminar_insumo({{ $diagnostico->id }},'gral')"><i
                                                                        class="feather icon-x"></i> </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </form>
                            <div id="valores">
                                </br>
                            </div>
                            <div class="container-fluid mt-3 mb-2">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
                                        <h6 class="tit-gen">Detalle de valores del Presupuesto Clínico</h6>
                                    </div>
                                </div>
                                <div class="row align-items-center bg-light p-3 text-center rounded-xl borde-presupuesto font-weight-bold">
                                    <!-- Total -->
                                    <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 my-2">
                                        <h5 class="text-c-blue mb-0">Total Grupo/Boca</h5>
                                        <p id="valores_examenes_presupuesto">$ {{ number_format($valores, 0, ',', '.') }}
                                        </p>
                                    </div>

                                    <!-- Total Piezas -->
                                    <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 my-2">
                                        <h5 class="text-c-blue mb-0">Total Piezas</h5>
                                        <p id="valores_piezas_presupuesto">$
                                            {{ number_format($valores_piezas, 0, ',', '.') }}</p>
                                    </div>

                                    <!-- Insumos -->
                                    <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 my-2">
                                        <h5 class="text-c-blue mb-0">Insumos</h5>
                                        <p id="valores_insumos_presupuesto">$
                                            {{ number_format($valores_insumos, 0, ',', '.') }}</p>
                                    </div>

                                    <!-- Descuentos -->
                                    <div class="col-sm-12 col-md-6 col-lg-1 col-xl-1 col-xxl-1 my-2">
                                        <h5 class="text-c-blue mb-0">Laboratorio</h5>
                                        <p id="valores_laboratorio">${{ number_format($valores_laboratorio,0,',','.') }}</p>
                                    </div>

                                    <!-- Descuentos -->
                                    <div class="col-sm-12 col-md-6 col-lg-1 col-xl-1 col-xxl-1 my-2">
                                        <h5 class="text-c-blue mb-0">Descuentos</h5>
                                        <p id="valores_descuentos_presupuesto">$0.00</p>
                                    </div>

                                    <!-- Total Final -->
                                    <div
                                        class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2 bg-naranjo rounded-pill py-1 my-1">
                                        <h5 class="text-white mb-0">Total Final</h5>
                                        <p class="text-white" id="valores_total_final_presupuesto">$
                                            {{ number_format($valores + $valores_piezas + $valores_insumos + $valores_laboratorio, 0, ',', '.') }}
                                        </p>
                                    </div>

                                    <!-- Abonos -->
                                    <div
                                        class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2 bg-info rounded-pill py-1 my-1">
                                        <h5 class="text-white mb-0">Abonado</h5>
                                        <p class="text-white" id="valores_abonado_presupuesto">$
                                            {{ number_format($valor_abonado, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                    <button type="button" class="btn btn-info my-2"
                                        onclick="pedir_autorizacion_presupuesto_dental()"><i class="fas fa-check"></i>
                                        Solicitar autorización de presupuesto</button>
                                    <button type="button" class="btn btn-primary" onclick="generar_pdf()">
                                        <i class="fa fa-file"></i> Documento PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--LABORATORIO-->
                <div class="tab-pane fade show" id="od_laboratorio" role="tabpanel"
                    aria-labelledby="od_laboratorio-tab">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="tit-gen">Laboratorio</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-sm-2">
                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab"
                                                role="tablist" aria-orientation="vertical">
                                                <a class="nav-link-aten text-reset" id="od_laboratorio_trab-tab"
                                                    data-toggle="tab" href="#od_laboratorio_trab" role="tab"
                                                    aria-controls="od_laboratorio_trab"
                                                    aria-selected="false">Estados Trabajos</a>
                                                <a class="nav-link-aten text-reset" id="costo_presupuesto_trab-tab"
                                                    data-toggle="tab" href="#costo_presupuesto_trab"
                                                    role="tab" aria-controls="costo_presupuesto_trab"
                                                    aria-selected="false">Costo/Presupuesto Lab</a>
                                                <a class="nav-link-aten text-reset" id="od_lab_estadopago-tab"
                                                    data-toggle="tab" href="#od_lab_estadopago" role="tab"
                                                    aria-controls="od_lab_estadopago" aria-selected="false">Estados
                                                    de Pago</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-10 col-xl-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <!--ESTADOS DE TRABAJO-->
                                                <div class="tab-pane fade show active" id="od_laboratorio_trab"
                                                    role="tabpanel" aria-labelledby="od_laboratorio_trab-tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h6 class="sub-aten">Estados de trabajo</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12" >
                                                            <div id="contenedor_ordenes_trabajos_menores_dental">
                                                                @if (isset($ordenes_tm))
                                                                    @foreach ($ordenes_tm as $o)
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card-informacion">
                                                                                    <div class="card-body">
                                                                                        <div class="form-row">
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Nombre
                                                                                                    Laboratorio</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_nom"
                                                                                                    id="lab_nom"
                                                                                                    value="{{ $o->nombre_lab }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Trabajo
                                                                                                    Requerido</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_ord_trab"
                                                                                                    id="lab_ord_trab"
                                                                                                    value="{{ $o->trabajo_realizar }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">F.envío</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_fenv"
                                                                                                    id="lab_fenv"
                                                                                                    value="{{ $o->fecha_envio }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">F.entrega</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_fent"
                                                                                                    id="lab_fent"
                                                                                                    value="{{ $o->fecha_entrega }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Estado</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_est"
                                                                                                    id="lab_est"
                                                                                                    value="{{ $o->estado == 1 ? 'Pendiente' : 'Otro' }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">N°
                                                                                                    Identificación</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_id_trab"
                                                                                                    id="lab_id_trab"
                                                                                                    value="{{ $o->nro_orden }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div
                                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Observaciones</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4"
                                                                                                    onblur="this.rows=1;" name="obs_est_trab_lab" id="obs_est_trab_lab"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>

                                                        </div>

                                                        <div class="col-sm-12 col-md-12">
                                                            <div id="contenedor_ordenes_trabajos_mayores_dental">
                                                                @if (isset($ordenes_tmy))
                                                                    @foreach ($ordenes_tmy as $o)
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card-informacion">
                                                                                    <div class="card-body">
                                                                                        <div class="form-row">
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Nombre
                                                                                                    Laboratorio</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_nom"
                                                                                                    id="lab_nom"
                                                                                                    value="{{ $o->nombre_lab }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Trabajo
                                                                                                    Requerido</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_ord_trab"
                                                                                                    id="lab_ord_trab"
                                                                                                    value="{{ $o->trabajo_realizar }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">F.envío</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_fenv"
                                                                                                    id="lab_fenv"
                                                                                                    value="{{ $o->fecha_envio }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">F.entrega</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_fent"
                                                                                                    id="lab_fent"
                                                                                                    value="{{ $o->fecha_entrega }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Estado</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_est"
                                                                                                    id="lab_est"
                                                                                                    value="{{ $o->estado == 1 ? 'Pendiente' : 'Otro' }}">
                                                                                            </div>
                                                                                            <div
                                                                                                class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">N°
                                                                                                    Identificación</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-sm"
                                                                                                    name="lab_id_trab"
                                                                                                    id="lab_id_trab"
                                                                                                    value="{{ $o->nro_orden }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div
                                                                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <label
                                                                                                    class="floating-label-activo-sm">Observaciones</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4"
                                                                                                    onblur="this.rows=1;" name="obs_est_trab_lab" id="obs_est_trab_lab"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--PRESUPUESTO LAB-->
                                                <div class="tab-pane fade show" id="costo_presupuesto_trab"
                                                    role="tabpanel" aria-labelledby="costo_presupuesto_trab-tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h6 class="sub-aten">Presupuesto Laboratorio</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12" id="contenedor_ordenes_trabajos_menores_dental_presup">

                                                                @foreach ($ordenes_tm as $o)
                                                                    <div class="card-informacion">
                                                                        <div class="card-body">
                                                                            <div class="form-row">
                                                                                <div class="form-group col-md-3">
                                                                                    <label class="floating-label-activo-sm">N°
                                                                                        Identificación</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        name="lab_id_trab" id="lab_id_trab" value="{{ $o->nro_orden }}">
                                                                                </div>
                                                                                <div class="form-group col-md-2">
                                                                                    <label class="floating-label-activo-sm">
                                                                                        Valor Total</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        name="lab_cost_tot"
                                                                                        id="lab_cost_tot" value="{{ number_format($o->valor_prestacion, 0, ',', '.') }}">
                                                                                </div>
                                                                                <div class="form-group col-md-2">
                                                                                    <label class="floating-label-activo-sm">
                                                                                        Abonos</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        name="lab_abon" id="lab_abon" value="0">
                                                                                </div>
                                                                                <div class="form-group col-md-2">
                                                                                    <label class="floating-label-activo-sm">
                                                                                        Valor Pendiente</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        name="lab_val_pend"
                                                                                        id="lab_val_pend" value="{{ number_format($o->valor_prestacion, 0, ',', '.') }}">
                                                                                </div>
                                                                                <div class="form-group col-md-3 d-flex">
                                                                                    @if($o->presupuesto == 1)
                                                                                        <button type="button"
                                                                                            class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_lab({{ $o->id }},'menor')" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar de presupuesto"><i
                                                                                                class="fas fa-minus"></i></button>
                                                                                    @else
                                                                                        <button type="button"
                                                                                            class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_lab({{ $o->id }},'menor');" data-bs-toggle="tooltip" data-bs-placement="top" title="Cargar a presupuesto" ><i
                                                                                                class="feather icon-shopping-cart"></i>
                                                                                            </button>
                                                                                    @endif
                                                                                    <button type="button"
                                                                                        class="btn btn-info btn-icon"onclick="info_lab({{ $o->id_laboratorio }});"><i
                                                                                            class="fas fa-info-circle"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                        </div>
                                                        <div class="col-md-12" id="contenedor_ordenes_trabajos_mayores_dental_presup">
                                                            @foreach ($ordenes_tmy as $o)
                                                                <div class="card-informacion">
                                                                    <div class="card-body">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-3">
                                                                                <label class="floating-label-activo-sm">N°
                                                                                    Identificación</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    name="lab_id_trab" id="lab_id_trab" value="{{ $o->nro_orden }}">
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <label class="floating-label-activo-sm">
                                                                                    Valor Total</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    name="lab_cost_tot"
                                                                                    id="lab_cost_tot" value="{{ number_format($o->valor_prestacion, 0, ',', '.') }}">
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <label class="floating-label-activo-sm">
                                                                                    Abonos</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    name="lab_abon" id="lab_abon" value="0">
                                                                            </div>
                                                                            <div class="form-group col-md-2">
                                                                                <label class="floating-label-activo-sm">
                                                                                    Valor Pendiente</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    name="lab_val_pend"
                                                                                    id="lab_val_pend" value="{{ number_format($o->valor_prestacion, 0, ',', '.') }}">
                                                                            </div>
                                                                            <div class="form-group col-md-3 d-flex">
                                                                                @if($o->presupuesto == 1)
                                                                                    <button type="button"
                                                                                        class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_lab({{ $o->id }},'mayor')" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar de presupuesto"><i
                                                                                            class="fas fa-minus"></i></button>
                                                                                @else
                                                                                    <button type="button"
                                                                                        class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_lab({{ $o->id }},'mayor');" data-bs-toggle="tooltip" data-bs-placement="top" title="Cargar a presupuesto" ><i
                                                                                            class="feather icon-shopping-cart"></i>
                                                                                        </button>
                                                                                @endif
                                                                                <button type="button"
                                                                                    class="btn btn-info btn-icon"onclick="info_lab({{ $o->id_laboratorio }});"><i
                                                                                        class="fas fa-info-circle"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="form-row" id="resumen_costos_lab">
                                                        <div class="col-12">
                                                            <h6 class="sub-aten">Resumen de costos</h6>
                                                        </div>

                                                        @php $suma = 0; @endphp
                                                        @foreach ($ordenes_tm as $o)
                                                            @if($o->presupuesto == 1)
                                                                @php $suma += $o->valor_prestacion; @endphp
                                                            @endif
                                                        @endforeach
                                                        @foreach ($ordenes_tmy as $o)
                                                            @if($o->presupuesto == 1)
                                                                @php $suma += $o->valor_prestacion; @endphp
                                                            @endif
                                                        @endforeach
                                                        <div class="col-md-6 offset-md-3">
                                                            <div class="card border-success shadow-sm">
                                                                <div class="card-body text-center">
                                                                    <h5 class="card-title mb-1">Total Prestaciones en Presupuesto</h5>
                                                                    <h4 class="text-success font-weight-bold">{{ number_format($suma, 0, ',', '.') }} CLP</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--ESTADOS DE PAGO-->
                                                <div class="tab-pane fade show " id="od_lab_estadopago"
                                                    role="tabpanel" aria-labelledby="od_lab_estadopago-tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h6 class="sub-aten">Estados de pago</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="card-informacion">
                                                                <div class="card-body">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label-activo-sm">N°
                                                                                de presupuesto</label>
                                                                            <select name="n_presupuesto"
                                                                                id="n_presupuesto"
                                                                                class="form-control form-control-sm">
                                                                                <option value="0">Seleccione
                                                                                </option>
                                                                                @if (isset($presupuesto))
                                                                                    <option
                                                                                        value="{{ $presupuesto->id }}">
                                                                                        {{ $presupuesto->id }}
                                                                                    </option>
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-8">
                                                                            <label
                                                                                class="floating-label-activo-sm">Nombre
                                                                                Laboratorio</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="lab_nom" id="lab_nom">
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label-activo-sm">N°
                                                                                Identificación</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="lab_id_trab" id="lab_id_trab">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label
                                                                                class="floating-label-activo-sm">F.pago</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="lab_fenv" id="lab_fenv">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label
                                                                                class="floating-label-activo-sm">Cantidad</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="lab_fent" id="lab_fent">
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            <label class="floating-label-activo-sm">
                                                                                Valor Total</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="lab_cost_tot"
                                                                                id="lab_cost_tot">
                                                                        </div>
                                                                        <div class="form-group col-md-3">
                                                                            <label class="floating-label-activo-sm">
                                                                                Valor Pendiente</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="lab_cost_tot"
                                                                                id="lab_cost_tot">
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label
                                                                                class="floating-label-activo-sm">Observaciones</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2"
                                                                                onblur="this.rows=1;" name="obs_est_trab_lab" id="obs_est_trab_lab"></textarea>
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
                    </div>
                </div>
                <!--PRESUPUESTO GENERAL-->
                <div class="tab-pane fade show" id="od__presup_gral" role="tabpanel"
                    aria-labelledby="od__presup_gral-tab">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="tit-gen">Presupuesto general</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <h6 class="text-c-blue pt-2">Laboratorio</h6>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="subtotal_lab" id="subtotal_lab">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Descuento</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="descuento_lab" id="descuento_lab">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Total Laboratorio</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="total_lab" id="total_lab">
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <h6 class="text-c-blue pt-2">Clínico</h6>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="subtotal_clinico" id="subtotal_clinico"
                                                    value="{{ number_format($valores + $valores_piezas, 0, ',', '.') }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Descuento</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="descuento_clinico" id="descuento_clinico"
                                                    value="0">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Total Clínico</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="total_clinico" id="total_clinico"
                                                    value="{{ number_format($valores + $valores_piezas, 0, ',', '.') }}">
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <h6 class="text-c-blue pt-2">Insumos no incluidos</h6>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="subtotal_insumos" id="subtotal_insumos"
                                                    value="{{ number_format($valores_insumos, 0, ',', '.') }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Descuento</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="descuento_insumos" id="descuento_insumos"
                                                    value="0">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Total Insumos</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="total_insumos" id="total_insumos"
                                                    value="{{ number_format($valores_insumos, 0, ',', '.') }}">
                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="card"
                                        style="border: 2px solid #4268b0 !important;box-shadow: 0px 0px 8px 1px rgb(48 65 148 / 25%), 0px 10px 9px -6px rgb(69 75 135 / 10%) !important;">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <h5 class="tit-gen">Valor final</h5>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label-activo-sm">Total presupuesto</label>
                                                    @php $suma = $valores + $valores_piezas + $valores_insumos; @endphp
                                                    <input type="text" class="form-control"
                                                        name="total_presupuesto" id="total_presupuesto"
                                                        value="{{ number_format($suma, 0, ',', '.') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--ABONOS Y ESTADOS DE PAGO-->
                <div class="tab-pane fade show" id="od_abonos_pres" role="tabpanel"
                    aria-labelledby="od_abonos_pres-tab">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h6 class="tit-gen">Abonos y estados de pago</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <form>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                        <div class="card mb-0">
                                            <div class="card-body pb-1 mb-0">
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Presupuesto N°</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="" id=""
                                                            value="{{ $presupuesto ? $presupuesto->id : '' }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="subtotal_presup" id="subtotal_presup"
                                                            value="{{ $presupuesto ? number_format($presupuesto->valor_total, 0, ',', '.') : '' }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="descuento_presup" id="descuento_presup">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Total</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="total_presup" id="total_presup">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Abonos</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="abonos_presup" id="abonos_presup"
                                                            value="{{ number_format($valor_abonado, 0, ',', '.') }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <button type="button" class="btn btn-info btn-block btn-sm"
                                                            onclick="pagar_presupuesto();"><i
                                                                class="fa fa-plus"></i> Ingresar Abono</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        @foreach ($convenios_prevision as $c)
                                            @if ($paciente->prevision->nombre == $c->nombre_convenio)
                                                <p class="promo-banner font-weight-bold my-3">{{ $paciente->prevision->nombre }}
                                                    {{ $c->porcentaje }} % {{ $c->descripcion }}
                                                    <button type="button"
                                                        class="btn btn-info btn-sm btn-icon"
                                                        onclick="aplicar_convenio_tratamiento({{ $c->id }})"><i
                                                            class="fas fa-check"></i></button>
                                                    <button type="button"
                                                        class="btn btn-light btn-sm btn-icon"
                                                        onclick="generar_pdf()"><i
                                                            class="fas fa-print"></i></button>
                                                    <span id="mensaje" class="badge badge-success"></span>
                                                    <input type="hidden" name="tiene_dcto" id="tiene_dcto"
                                                        value="0">
                                                </p>
                                            @endif
                                        @endforeach
                                    </div>

                                </div>
                                <!--P. POR PIEZAS-->
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                        <div class="card-informacion">
                                            <div class="card-top">
                                                <h6 class="text-uppercase text-c-blue">Presupuesto por pieza</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="dt-responsive table-responsive pb-4">
                                                            <table id="presup_estado_pago"
                                                                class="display table table-striped dt-responsive nowrap table-sm"
                                                                style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="align-middle">Prestación</th>
                                                                        <th class="align-middle">Pieza</th>
                                                                        <th class="align-middle">Valor total</th>
                                                                        <th class="align-middle">Descuento</th>
                                                                        <th class="align-middle">Valor a pagar</th>
                                                                        <th class="align-middle">Estado de pago</th>
                                                                        <th class="align-middle">Estado Prestación
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($odontograma as $o)
                                                                        @if ($o->presupuesto == 1 && $o->urgencia == 0)
                                                                            @php
                                                                                if ($o->estado == 0) {
                                                                                    $estado = 'PENDIENTE';
                                                                                } elseif ($o->estado == 1) {
                                                                                    $estado = 'TERMINADO';
                                                                                    # code...
                                                                                }

                                                                                switch ($o->estado_pago) {
                                                                                    case 'ok':
                                                                                        $color = 'bg-success';
                                                                                        break;
                                                                                    case 'incompleto':
                                                                                        $color = 'bg-warning';
                                                                                        break;
                                                                                    default:
                                                                                        $color = 'bg-danger';
                                                                                        break;
                                                                                }
                                                                            @endphp
                                                                            <tr>
                                                                                <td class="text-center align-middle">
                                                                                    {{ $o->descripcion }}</td>
                                                                                <td class="text-center align-middle">
                                                                                    {{ $o->pieza }}</td>
                                                                                <td class="text-center align-middle">
                                                                                    {{ number_format($o->valor, 0, ',', '.') }}
                                                                                </td>
                                                                                <td class="text-center align-middle">0
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    {{ number_format($o->valor, 0, ',', '.') }}
                                                                                </td>
                                                                                <td
                                                                                    class="text-center align-middle status-circle">
                                                                                    <div
                                                                                        class="circle {{ $color }}">
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    {{ $estado }}
                                                                                </td>

                                                                            </tr>
                                                                        @endif
                                                                    @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--P. POR GRUPOS-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                        <div class="card">
                                            <div class="card-top">
                                                <h6 class="text-uppercase text-c-blue">Presupuesto por grupos</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
                                                        <div class="dt-responsive table-responsive pb-4">
                                                            <table id="presup_estado_pago_gral"
                                                                class="display table table-striped dt-responsive nowrap table-sm w-100">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle">
                                                                            Prestación</th>
                                                                        <th class="text-center align-middle">Grupo
                                                                        </th>
                                                                        <th class="text-center align-middle">Valor
                                                                            total</th>
                                                                        <th class="text-center align-middle">Descuento
                                                                        </th>
                                                                        <th class="text-center align-middle">Valor a
                                                                            pagar</th>
                                                                        <th class="text-center align-middle">Estado
                                                                            Pago</th>
                                                                        <th class="text-center align-middle">Estado
                                                                            Prestación</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($todos as $o)
                                                                        @if ($o->presupuesto == 1)
                                                                            @php
                                                                                if ($o->estado == 1) {
                                                                                    $estado = 'PENDIENTE';
                                                                                } elseif ($o->estado == 0) {
                                                                                    $estado = 'TERMINADO';
                                                                                    # code...
                                                                                }

                                                                                switch ($o->estado_pago) {
                                                                                    case 'ok':
                                                                                        $color = 'bg-success';
                                                                                        break;
                                                                                    case 'incompleto':
                                                                                        $color = 'bg-warning';
                                                                                        break;
                                                                                    default:
                                                                                        $color = 'bg-danger';
                                                                                        break;
                                                                                }
                                                                            @endphp
                                                                            <tr>
                                                                                <td class="text-center align-middle">
                                                                                    {{ $o->diagnostico_tratamiento }}
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    {{ $o->localizacion }}</td>
                                                                                <td class="text-center align-middle">
                                                                                    ${{ number_format($o->valor, 0, ',', '.') }}
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    $0</td>
                                                                                <td class="text-center align-middle">
                                                                                    ${{ number_format($o->valor, 0, ',', '.') }}
                                                                                </td>
                                                                                <td
                                                                                    class="text-center align-middle status-circle">
                                                                                    <div
                                                                                        class="circle {{ $color }}">
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    {{ $estado }}
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--INSUMOS Y GASTOS GENERALES-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                        <div class="card">
                                            <div class="card-top">
                                                <h6 class="text-uppercase text-c-blue">Insumos y gastos generales</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
                                                        <table id="presup_insumos_pago"
                                                            class="display table table-striped dt-responsive nowrap table-sm w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th class="align-middle">Insumo</th>
                                                                    <th class="align-middle">Observaciones</th>
                                                                    <th class="align-middle">Cantidad</th>
                                                                    <th class="align-middle">Sub-total</th>
                                                                    <th class="align-middle">Descuento</th>
                                                                    <th class="align-middle">Total</th>
                                                                    <th class="align-middle">Estado de pago</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($insumos_tratamientos as $t)
                                                                    @if ($t->presupuesto == 1)
                                                                        @php $total = $t->cantidad * $t->valor @endphp
                                                                        @php
                                                                            $color = 'bg-danger'; // por defecto: error
                                                                            if ($t->estado_pago == 'ok') {
                                                                                $color = 'bg-success';
                                                                            } elseif ($t->estado_pago == 'incompleto') {
                                                                                $color = 'bg-warning';
                                                                            }
                                                                        @endphp

                                                                        <tr>
                                                                            <td class="align-middle">
                                                                                {{ $t->insumos }}
                                                                                {{ $t->nombre_marca }}</td>
                                                                            <td class="align-middle">
                                                                                {{ $t->observaciones }}
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                {{ $t->cantidad }}</td>
                                                                            <td class="align-middle">
                                                                                {{ number_format($t->valor) }}</td>
                                                                            <td class="align-middle">0</td>
                                                                            <td class="align-middle">
                                                                                {{ number_format($total) }}</td>
                                                                            <td class="align-middle status-circle">
                                                                                <div
                                                                                    class="circle {{ $color }}">
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--TOTAL VALOR-->
                                <div class="form-row align-items-center bg-light mx-1 p-3 text-center rounded-xl font-weight-bold borde-presupuesto"
                                   >
                                    <!-- Total -->
                                    <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 my-2">
                                        <h5 class="mb-0 text-c-blue">Total Grupo/Boca</h5>
                                        <p id="valores_examenes_presupuesto_conf">$
                                            {{ number_format($valores, 0, ',', '.') }}</p>
                                    </div>

                                    <!-- Total Piezas -->
                                    <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 my-2">
                                        <h5 class="mb-0 text-c-blue">Total Piezas</h5>
                                        <p id="valores_piezas_presupuesto_conf">$
                                            {{ number_format($valores_piezas, 0, ',', '.') }}</p>
                                    </div>

                                    <!-- Insumos -->
                                    <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 my-2">
                                        <h5 class="mb-0 text-c-blue">Insumos</h5>
                                        <p id="valores_insumos_presupuesto_conf">$
                                            {{ number_format($valores_insumos, 0, ',', '.') }}</p>
                                    </div>

                                    <!-- Laboratorio -->
                                    <div class="col-sm-12 col-md-6 col-lg-1 col-xl-1 col-xxl-1 my-2">
                                        <h5 class="mb-0 text-c-blue">Laboratorio</h5>
                                        <p id="valores_laboratorio_conf">${{ number_format($valores_laboratorio, 0, ',', '.') }}</p>
                                    </div>

                                    <!-- Descuentos -->
                                    <div class="col-sm-12 col-md-6 col-lg-1 col-xl-1 col-xxl-1 my-2">
                                        <h5 class="mb-0 text-c-blue">Descuentos</h5>
                                        <p id="valores_descuentos_presupuesto_conf">$0.00</p>
                                    </div>

                                    <div
                                        class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 my-2 bg-naranjo  rounded-pill py-1 my-1">
                                        <h5 class="text-white">Total Final</h5>
                                        <p class="text-white" id="valores_total_final_presupuesto_conf">$
                                            {{ number_format($valores + $valores_piezas + $valores_insumos + $valores_laboratorio, 0, ',', '.') }}
                                        </p>
                                    </div>


                                    <div
                                        class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 my-2 bg-info rounded-pill py-1 my-1">
                                        <h5 class="text-white">Abonado</h5>
                                        <p class="text-white" id="valores_total_abonado_presupuesto_conf">
                                            ${{ number_format($valor_abonado, 0, ',', '.') }}</p>
                                    </div>


                                    {{-- <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-3 my-2">
                                            @php $total_pago = $valores + $valores_piezas + $valores_insumos; @endphp
                                                <button type="button" class="btn btn-outline-primary btn-sm" style="width: 85px;" onclick="reasignar_presupuesto({{ $total_pago }}, {{ $valor_abonado }},{{ $valores_insumos }})">Reasignar Pago</button>
                                                <button type="button" class="btn btn-outline-success btn-sm" onclick="pagar_presupuesto()">Pagar</button>
                                            </div> --}}


                                    <!-- Total Final -->
                                    {{-- <div class="col-md-12 d-flex justify-content-between">
                                                <div class="bg-naranjo bg-naranjo rounded-pill py-1 my-1">
                                                    <h5 class="text-white">Total Final</h5>
                                                    <p class="text-white" id="valores_total_final_presupuesto_conf">$ {{ number_format($valores + $valores_piezas + $valores_insumos,0,',','.') }}</p>
                                                </div>
                                                <div class="bg-sucess bg-success rounded-pill py-1 my-1">
                                                    <h5 class="text-white">Abonado</h5>
                                                    <p class="text-white" id="valores_total_abonado_presupuesto_conf">${{ number_format($valor_abonado,0,',','.') }}</p>
                                                </div>
                                                @php $total_pago = $valores + $valores_piezas + $valores_insumos; @endphp
                                                <button type="button" class="btn btn-outline-primary btn-sm" style="width: 85px;" onclick="reasignar_presupuesto({{ $total_pago }}, {{ $valor_abonado }},{{ $valores_insumos }})">Reasignar Pago</button>
                                                <button type="button" class="btn btn-outline-success btn-sm" onclick="pagar_presupuesto()">Pagar</button>
                                            </div> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="form-row  mx-auto mt-3">
                        @php $total_pago = $valores + $valores_piezas + $valores_insumos; @endphp
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <button type="button" class="btn btn-purple text-center"
                                onclick="reasignar_presupuesto({{ $total_pago }}, {{ $valor_abonado }},{{ $valores_insumos }})"><i
                                    class="fas fa-money-check-alt"></i> Reasignar Pago</button>
                            <button type="button" class="btn btn-info text-center"
                                onclick="pagar_presupuesto()"><i class="fas fa-plus"></i> Pagar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<input type="hidden" id="total_presupuesto_dental" value="{{ $valores + $valores_piezas + $valores_insumos }}">

<!-- MODAL INSUMOS -->
<!-- Modal -->
<div class="modal fade" id="insumosModal" tabindex="-1" aria-labelledby="insumosModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                            <input type="text" name="" id=""
                                class="form-control form-control-sm"
                                value="{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Paciente</label>
                            <input type="text" name="" id=""
                                class="form-control form-control-sm"
                                value="{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">N° Pieza</label>
                            <input type="text" name="numero_pieza_tto_modal" id="numero_pieza_tto_modal"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Tratamiento</label>
                            <input type="text" name="tto_modal" id="tto_modal"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Insumos</label>
                            <input type="text" name="insumos_tto" id="insumos_tto"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Cantidad</label>
                            <input type="number" name="insumos_cantidad_tto" id="insumos_cantidad_tto"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Valor</label>
                            <input type="number" name="insumos_valor_tto" id="insumos_valor_tto"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="form-control caja-texto form-control-sm mb-9" name="insumos_obs_tto_modal" id="insumos_obs_tto_modal"
                                cols="30" rows="1" onfocus="this.rows = 4" onblur="this.rows=1"></textarea>
                        </div>

                    </div>

                    <button type="button" class="btn btn-outline-success btn-sm w-100 my-2"
                        onclick="agregar_insumos_tto()"><i class="fas fa-check"></i> + Agregar</button>
                </div>
                <table class="table table-bordered table-xs w-100" id="table_insumos_tto">
                    <thead>
                        <th>insumo</th>
                        <th>cantidad</th>
                        <th>valor</th>
                        <th>observaciones</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Solicitar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PAGOS -->
<div class="modal fade" id="modalPagoPresupuesto" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
            </div>
            <div class="modal-body">
           		<div class="form-row">
        			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    	<div class="card-informacion borde-presupuesto">
                    		<div class="card-body px-2 pt-2 pb-0">
                    			<div class="form-row">
                    				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    					<h6 class="text-uppercase text-c-blue mb-1">Saldo pendiente</h6>
					                     <h6 class="f-14 badge badge-warning mb-3" id="diferencia_pago"></h6>
					                    <form id="pagoForm" class="mt-2">
					                    	 </div>
				                        <!-- Total a pagar (deshabilitado) -->
				                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
				                            <div class="form-group">
				                                <label for="total" class="floating-label-activo-sm">Total a pagar</label>
				                                <input type="text" class="form-control form-control-sm" id="total_pago"
				                                    value="" readonly>
				                            </div>
				                        </div>
                    				</div>
                    			</div>
                    		</div>
                    	</div>
                	</div>


            		<div class="form-row">
            			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        	<div class="card-informacion">
                        		<div class="card-body px-2">
                        			<div class="form-row">
				                		<!-- Monto del pago -->
				                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group">
				                            <label for="montoPago" class="floating-label-activo-sm">Monto del Pago</label>
				                            <input type="text" class="form-control form-control-sm" id="montoPago" name="montoPago"
				                                required>
				                        </div>
				                        <!-- Monto abonado -->
				                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group">
				                            <label for="montoAbonado" class="floating-label-activo-sm">Monto Abonado</label>
				                            <input type="text" class="form-control form-control-sm" id="montoAbonado"
				                                value="${{ number_format($valor_abonado, 0, ',', '.') }}" disabled required>
				                        </div>
				                        <!-- Método de pago -->
				                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group">
				                            <label for="metodoPago" class="floating-label-activo-sm">Método de Pago</label>
				                            <select class="form-control form-control-sm" id="metodoPago" required>
				                                <option value="" selected disabled>Seleccione un método</option>
				                                <option value="efectivo">Efectivo</option>
				                                <option value="tarjeta">Tarjeta</option>
				                                <option value="transferencia">Transferencia Bancaria</option>
				                            </select>
				                        </div>
				                        <!--Convenio-->
				                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group">
				                            <label class="floating-label-activo-sm">Convenio</label>
				                            <select id="bono_prevision" name="bono_prevision"
				                                class="form-control form-control-sm">
				                                <option value="0">Selecione una opción</option>
				                                @foreach ($prevision as $prev)
				                                    <option value="{{ $prev->id }}">{{ $prev->nombre }}</option>
				                                @endforeach
				                            </select>
				                            {{-- <div class="input-group-append">
				                            <button class="btn btn-outline-primary btn-sm" type="button" onclick="$('#bono_prevision_txt').hide();$('#bono_prevision').show();"><i class="feather icon-edit"></i></button>
				                        		</div> --}}
				                        </div>
				                        <!-- Botón de envío  / BTN CONFIRMACION PAGO-->
				                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-2">
				                            <button type="button" class="btn btn-info btn-sm" onclick="confirmar_pago()"><i class="feather icon-check"></i> Confirmar Pago</button>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>
            		</div>
                </form>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        	<div class="card-informacion">
                        		<div class="card-body px-2">
                        			<div class="form-row">
                        				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
				                            <div class="table-responsive">
				                                <table class="table table-responsive table-xs" id="table_pagos_presupuesto">
				                                    <thead>
				                                        <tr>
				                                            <th>Fecha</th>
				                                            <th>Metodo de pago</th>
				                                            <th>Pago</th>
				                                            <th>Acciones</th>
				                                        </tr>

				                                    </thead>
				                                    <tbody>
				                                        @foreach ($pagos_tratamientos_dentales as $pago)
				                                            <tr>
				                                                <td>{{ $pago->fecha_pago }}</td>
				                                                <td>{{ $pago->metodo_pago }}</td>
				                                                <td>{{ number_format($pago->total, 0, ',', '.') }}</td>
				                                                <td>
				                                                    <button type="button" class="btn btn-primary btn-icon"><i
				                                                            class="fas fa-search"></i></button>
				                                                    <button type="button" class="btn btn-danger btn-icon"
				                                                        onclick="eliminar_pago_dental({{ $pago->id }})"><i
				                                                            class="feather icon-x"></i></button>
				                                                </td>
				                                            </tr>
				                                        @endforeach
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
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>-->
        </div>
    </div>
</div>

<!-- MODAL REASIGNACIÓN PRESUPUESTO -->
<div class="modal fade" id="modalReasignarPresupuesto" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reasignación del presupuesto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
            </div>
            <div class="modal-body" id="modal_body_reasignar_presupuesto">
                <div class="form-row">
                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
	                	<div class="card-informacion borde-presupuesto">
	                		<div class="card-body p-2">
	                			<div class="form-row">
				                    <div class="col-md-6">
				                        <div>
				                            <h6 class="text-uppercase text-c-blue mb-1">Monto Total</h6>
				                            <input type="hidden" id="total_presupuesto_a_pagar"
				                                value="{{ $valores_piezas + $valores + $valores_insumos }}">
				                            <input type="hidden" name="total_abonado_presupuesto" id="total_abonado_presupuesto"
				                                value="{{ $valor_abonado }}">
				                            <input type="hidden" name="total_adeudado_presupuesto"
				                                id="total_adeudado_presupuesto"
				                                value="{{ $valores_piezas + $valores + $valores_insumos - $valor_abonado }}">
				                            <p id="monto_total" class="badge badge-warning mb-3">
				                                {{ number_format($valores_insumos, 0, ',', '.') }} +
				                                {{ number_format($valores_piezas, 0, ',', '.') }} =
				                                {{ number_format($valores_piezas + $valores + $valores_insumos, 0, ',', '.') }}
				                            </p>
				                            <h6 class="text-uppercase text-c-blue mb-1">Monto Abonado</h6>
				                            <p id="monto_abonado" class="badge badge-info mb-3">
				                                + {{ number_format($valor_abonado, 0, ',', '.') }}
				                            </p>
				                            <h6 class="text-uppercase text-c-blue mb-1">Monto Adeudado</h6>
				                            <p id="monto_adeudado" class="badge badge-danger">
				                                -
				                                {{ number_format($valores_piezas + $valores + $valores_insumos - $valor_abonado, 0, ',', '.') }}
				                            </p>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
				                        <p class="alert alert-sucess-b" id="info_pagos_seleccionados"></p>
				                    </div>
			                    </div>
			                </div>
		                </div>
		            </div>
                </div>

                <div class="form-row">
                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
	                	<div class="card-informacion">
	                		<div class="card-top">
	                			<h6 class="text-uppercase text-c-blue">Presupuesto por pieza</h6>
	                		</div>
	                		<div class="card-body px-2 py-1">
	                			<div class="form-row">
	                				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						                <div class="table-responsive">
						                    <table class="table table-bordered table-striped table-xs" id="table_pagos_reasignar_odontograma">
						                        <thead>
						                            <tr>
						                                <th>Seleccionar</th>
						                                <th>Nombre</th>
						                                <th>Valor</th>
						                                <th>Acciones</th>
						                            </tr>
						                        </thead>
						                        <tbody>
						                            @foreach ($odontograma as $o)
						                                @if ($o->presupuesto == 1)
						                                    <tr>
						                                        <td><input type="checkbox" class="valor-checkbox"
						                                                data-valor="{{ $o->valor }}" data-id="{{ $o->id }}"
						                                                data-info="odonto"></td>
						                                        <td>{{ $o->pieza }}</td>
						                                        <td>${{ number_format($o->valor, 0, ',', '.') }}</td>
						                                        <td>
						                                            <button type="button" class="btn btn-danger btn-sm"
						                                                onclick="eliminar_odontograma({{ $o->id }})"><i
						                                                    class="feather icon-x"></i></button>
						                                        </td>
						                                    </tr>
						                                @endif
						                            @endforeach
						                        </tbody>
						                    </table>
						                </div>
				               		</div>
						         </div>
		            		</div>
	            		</div>
	            	</div>
	            </div>

                <div class="form-row">
                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
	                	<div class="card-informacion">
	                		<div class="card-top">
	                			<h6 class="text-uppercase text-c-blue">Presupuesto por grupo de piezas</h6>
	                		</div>
	                		<div class="card-body px-2 py-1">
	                			<div class="form-row">
		                			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						                <div class="table-responsive">
						                    <table class="table table-bordered table-striped table-xs" id="table_pagos_reasignar_grupos">
						                        <thead>
						                            <tr>
						                                <th>Seleccionar</th>
						                                <th>Nombre</th>
						                                <th>Valor</th>
						                                <th>Acciones</th>
						                            </tr>
						                        </thead>
						                        <tbody>
						                            @foreach ($todos as $o)
						                                @if ($o->presupuesto == 1)
						                                    <tr>
						                                        <td><input type="checkbox" class="valor-checkbox"
						                                                data-valor="{{ $o->valor }}" data-id="{{ $o->id }}"
						                                                data-info="gral"></td>
						                                        <td>{{ $o->diagnostico_tratamiento }}</td>
						                                        <td>${{ number_format($o->valor, 0, ',', '.') }}</td>
						                                        <td>
						                                            <button type="button" class="btn btn-danger btn-sm"
						                                                onclick="eliminar_diagnostico({{ $o->id }},'gral',this)"><i
						                                                    class="feather icon-x"></i></button>
						                                        </td>
						                                    </tr>
						                                @endif
						                            @endforeach
						                        </tbody>
						                    </table>
						                </div>
						            </div>
					        	</div>
	            			</div>
	            		</div>
	            	</div>
            	</div>
		        <div class="form-row">
		        	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
	                	<div class="card-informacion">
	                		<div class="card-top">
	                			<h6 class="text-uppercase text-c-blue">Insumos y gastos generales</h6>
	                		</div>
	                		<div class="card-body px-2 py-1">
	                			<div class="form-row">
	                				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						                <div class="table-responsive">
						                    <table class="table table-bordered table-striped table-xs" id="table_pagos_reasignar_insumos">
						                        <thead>
						                            <tr>
						                                <th>Seleccionar</th>
						                                <th>Nombre</th>
						                                <th>Cantidad</th>
						                                <th>Valor Unitario</th>
						                                <th>Total</th>
						                                <th>Acciones</th>
						                            </tr>
						                        </thead>
						                        <tbody>
						                            @foreach ($insumos_tratamientos as $i)
						                                @if ($i->presupuesto == 1)
						                                    @php $total = $i->cantidad * $i->valor; @endphp
						                                    <tr>
						                                        <td><input type="checkbox" class="valor-checkbox"
						                                                data-valor="{{ $total }}" data-id="{{ $i->id }}"
						                                                data-info="insumo"></td>
						                                        <td>{{ $i->insumos }} {{ $i->nombre_marca }}</td>
						                                        <td>{{ $i->cantidad }}</td>
						                                        <td>${{ number_format($i->valor, 0, ',', '.') }}</td>
						                                        <td>${{ number_format($i->cantidad * $i->valor, 0, ',', '.') }}</td>
						                                        <td>
						                                            <button type="button" class="btn btn-danger btn-sm"
						                                                onclick="eliminar_insumo({{ $i->id }})"><i
						                                                    class="feather icon-x"></i></button>
						                                        </td>
						                                    </tr>
						                                @endif
						                            @endforeach
						                        </tbody>
						                    </table>
						                </div>
					             	</div>
			    				</div>
	    					</div>
	    				</div>
	    			</div>
    			</div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <div type="button" class="btn btn-info" onclick="reasignar_presupuesto_modal()"><i class="feather icon-check
                            "></i>
                            Reasignar Pago
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- info_lab_modal -->
<div class="modal fade" id="info_lab_modal" tabindex="-1" aria-labelledby="info_lab_modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="info_lab_modalLabel">Información del Laboratorio</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label class="font-weight-bold">Nombre:</label>
                        <div id="info_lab_nombre"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold">Dirección:</label>
                        <div id="info_lab_direccion"></div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label class="font-weight-bold">Teléfono:</label>
                        <div id="info_lab_telefono"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold">Email:</label>
                        <div id="info_lab_email"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DATOS DE VITAL IMPORTANCIA -->
<input type="hidden" id="id_pieza_tto">
<input type="hidden" id="tipo_tto">
<script>
    const valoresSeleccionados = [];

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.valor-checkbox').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                const id = parseInt(this.getAttribute('data-id'));
                const info = this.getAttribute('data-info');
                const valor = parseInt(this.getAttribute('data-valor'));

                if (this.checked) {
                    // Si no existe ya, lo agregamos en el orden del clic
                    if (!valoresSeleccionados.some(v => v.id === id && v.info === info)) {
                        valoresSeleccionados.push({ id, info, valor });
                    }
                } else {
                    // Si se desmarca, lo quitamos del array
                    const index = valoresSeleccionados.findIndex(v => v.id === id && v.info === info);
                    if (index !== -1) {
                        valoresSeleccionados.splice(index, 1);
                    }
                }
            });
        });
    });

    $(document).ready(function() {
        $('#table_pagos_presupuesto').DataTable();
    })
    const verModalAgregar = (fun, tipo, id) => {

        $('#agregar-antecedente').show();
        $('#modificar-antecedente').hide();

        var html = '';

        switch (tipo) {
            case 1:
                html += `
                    <table>
                        <tr>
                            <td>Procedimiento</td>
                            <td><input class="form-control" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Incidente</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
                break;

            case 2:
                html += `
                    <table>
                        <tr>
                            <td>Nombre</td>
                            <td><input class="form-control" type="text" id="nombre"></td>
                        </tr>
                        <tr>
                            <td>Comentario</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
                break;

            case 3:
                html += `
                    <table>
                        <tr>
                            <td>Fecha Cirugía</td>
                            <td><input class="form-control" type="date" id="fecha"></td>
                        </tr>
                        <tr>
                            <td>Procedimiento</td>
                            <td><input class="form-control" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Incidente</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
                break;

            case 4:
                html += `
                    <table>
                        <tr>
                            <td>Procedimiento</td>
                            <td><input class="form-control" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Detalle</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
                break;


            case 5:

                html += `
                    <table>
                        <tr>
                            <td>Nombre antecedente</td>
                            <td><input class="form-control form-control-sm" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Institución</td>
                            <td><textarea class="form-control form-control-sm" id="institucion"></textarea></td>
                        </tr>
                        <tr>
                            <td>Fecha Evento</td>
                            <td><input class="form-control" type="date" id="fecha"></td>
                        </tr>
                    </table>
                `;
                break;

            case 6:
                html += `
                    <table>
                        <tr>
                            <td>Nombre alergia</td>
                            <td><input class="form-control form-control-sm" type="text" id="nombre"></td>
                        </tr>
                        <tr>
                            <td>Detalle</td>
                            <td><textarea class="form-control form-control-sm" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
                break;

            case 7:
                html += `
                    <table>
                        <tr>
                            <td>Nombre Medicamento</td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control form-control-sm" type="text" id="nombre_medicamento_cronico">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Dosis</td>
                            <td><textarea class="form-control" id="dosis"></textarea></td>
                        </tr>

                    </table>
                `;
                break;
            case 8:
                html += `
                    <table>
                        <tr>
                            <td>Tipo de Discapacidad</td>
                            <td>
                                <select class="form-control form-control-sm" name="discapacidad_tipo" id="discapacidad_tipo">
                                    <option value="Auditíva">Auditíva</option>
                                    <option value="Visual">Visual</option>
                                    <option value="Locomotora">Locomotora </option>
                                    <option value="Neurológica">Neurológica</option>
                                    <option value="Fonoarticulatoria">Fonoarticulatoria</option>
                                    <option value="Cognitiva">Cognitiva</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Grado</td>
                            <td>
                                <input class="form-control form-control-sm" type="text" id="discapacidad_grado">
                            </td>
                        </tr>
                        <tr>
                            <td>Permanente</td>
                            <td>
                                <select class="form-control form-control-sm" name="discapacidad_permanente" id="discapacidad_permanente">
                                    <option value="si">SI</option>
                                    <option value="no">NO</option>
                                </select>
                            </td>
                        </tr>

                    </table>
                `;
                break;
        }

        $('#body-modal-inputs').html(html);
        if (tipo == 7)
            activarMedicamentos('nombre_medicamento_cronico');
        $('#tipo-antecedente-m').val(tipo);
        $('#modal-ingreso').modal(fun);

        if (id != 0) {
            $('#agregar-antecedente').hide();
            $('#modificar-antecedente').show();
            $('#id-antecedente-m').val(id);
            cargarDatosAntecedente(id);
        }

    }

    function verModalAgregarInsumos(id_tto, objetivo, tto, tipo = null) {
        dame_tratamientos_pieza(id_tto);
        limpiar_formulario_insumo();
        console.log(objetivo, tipo);
        $('#insumosModal').modal('show');
        $('#numero_pieza_tto_modal').val(objetivo);
        $('#tto_modal').val(tto);
        $('#id_pieza_tto').val(id_tto);
        $('#tipo_tto').val(tipo);
    }

    function dame_tratamientos_pieza(id) {
        let url = '{{ ROUTE('dental.dame_insumos_tratamiento') }}';
        let data = {
            id: id,
            id_paciente: dame_id_paciente(),
            id_ficha_atencion: $('#id_fc').val(),
            _token: CSRF_TOKEN
        }

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                let insumos = resp.insumos;
                console.log(insumos);
                let table = $('#table_insumos_tto').DataTable();

                // Limpiar la tabla sin perder la configuración de DataTables
                table.clear();

                // Recorrer el array de insumos y agregarlos a la tabla
                insumos.forEach(insumo => {
                    table.row.add([
                        insumo.insumos + ' ' + insumo.nombre_marca, // Nombre del insumo
                        insumo.cantidad, // Cantidad utilizada
                        insumo.valor, // Unidad de medida
                        insumo.observaciones // Descripción u observaciones
                    ]);
                });

                // Dibujar la tabla nuevamente con los nuevos datos
                table.draw();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function agregar_insumos_tto() {
        let insumos = $('#insumos_tto').val();
        let cantidad = $('#insumos_cantidad_tto').val();
        let valor = $('#insumos_valor_tto').val();
        let observaciones = $('#insumos_obs_tto_modal').val();
        let id_tto = $('#id_pieza_tto').val();

        let valido = 1;
        let mensaje = '';

        if (insumos == '') {
            valido = 0;
            mensaje += '<li>Debe ingresar insumos </li>';
        }

        if (cantidad == '') {
            valido = 0;
            mensaje += '<li>Debe ingresar cantidad </li>';
        }

        if (valor == '') {
            valido = 0;
            mensaje += '<li>Debe ingresar valor </li>';
        }

        if (valido == 1) {
            let data = {
                insumos: insumos,
                cantidad: cantidad,
                valor: valor,
                id_tto: id_tto,
                id_paciente: dame_id_paciente(),
                id_ficha_atencion: $('#id_fc').val(),
                tipo: $('#tipo_tto').val(),
                _token: CSRF_TOKEN
            }

            console.log(data);

            let url = '{{ ROUTE('dental.agregar_insumos_tto') }}';
            $.ajax({
                url: url,
                type: 'post',
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'ok') {
                        swal({
                            icon: 'success',
                            text: 'Se a agregado los insumos correctamente',
                            title: 'Exito'
                        });
                        limpiar_formulario_insumo();
                        let insumos = resp.insumos;
                        console.log(insumos);
                        let table = $('#table_insumos_tto').DataTable();

                        // Limpiar la tabla sin perder la configuración de DataTables
                        table.clear();

                        // Recorrer el array de insumos y agregarlos a la tabla
                        insumos.forEach(insumo => {
                            table.row.add([
                                insumo.insumos + ' ' + insumo
                                .nombre_marca, // Nombre del insumo
                                insumo.cantidad, // Cantidad utilizada
                                insumo.valor, // Unidad de medida
                                insumo.observaciones // Descripción u observaciones
                            ]);
                        });

                        // Dibujar la tabla nuevamente con los nuevos datos
                        table.draw();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });

            return false;
        }
    }

    function limpiar_formulario_insumo() {
        $('#insumos_tto').val('');
        $('#insumos_cantidad_tto').val('');
        $('#insumos_valor_tto').val('');
        $('#insumos_obs_tto_modal').val('');
        //    $('#id_pieza_tto').val('');
    }

    function pagar_presupuesto() {
        total = $('#total_presupuesto_dental').val();
        console.log(formatoMoneda(parseInt(total)));
        // abrir modal
        $('#modalPagoPresupuesto').modal('show');
        $('#total_pago').val(formatoMoneda(parseInt(total)));
        let id_hora_medica = $('#hora_medica').val();
        console.log(id_hora_medica);
        let url = "{{ ROUTE('dental.dame_bono_pago') }}";
        let data = {
            id_hora_medica: id_hora_medica,
            id_ficha_atencion: $('#id_fc').val(),
            id_presupuesto: $('#id_presupuesto').val(),
            _token: CSRF_TOKEN
        }

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                let valor_presupuesto = $('#total_presupuesto_dental').val();
                let valor_abonado = resp.valor_atencion;
                let deuda = valor_presupuesto - valor_abonado;
                $('#diferencia_pago').html(formatoMoneda(deuda));
                $('#bono_prevision').val(resp.convenio);
                //$('#montoAbonado').val(formatoMoneda(resp.valor_atencion));
            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }

    function confirmar_pago() {
        // Obtener valores del formulario
        const total_pago = $('#total_pago').val().replace(/[^0-9]/g, '');
        const montoPago = $('#montoPago').val().replace(/[^0-9]/g, '');
        const montoAbonado = $('#montoAbonado').val().replace(/[^0-9]/g, '');
        const metodoPago = $('#metodoPago').val();
        const bonoPrevision = $('#bono_prevision').val();
        const id_dcto = $('#tiene_dcto').val();

        // Verificar que todos los campos requeridos estén completos
        if (!montoPago || !montoAbonado || !metodoPago) {
            console.error('Por favor complete todos los campos obligatorios.');
            swal({
                title: 'Error',
                icon: 'error',
                text: 'Por favor complete todos los campos obligatorios.',
            })
            return;
        }


        // Crear objeto JSON con los datos del formulario
        const data = {
            _token: '{{ csrf_token() }}', // Token CSRF
            total_pago: total_pago,
            monto_pago: montoPago,
            monto_abonado: montoAbonado,
            metodo_pago: metodoPago,
            bono_prevision: bonoPrevision,
            id_ficha_atencion: $('#id_fc').val(),
            id_paciente: $('#id_paciente').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_dcto: id_dcto
        };

        // Enviar los datos por AJAX
        $.ajax({
            url: '{{ ROUTE("dental.confirmar_pago_presupuesto_dental") }}',
            method: 'POST',
            data: data,
            success: function(response) {
                console.log('Éxito:', response);
                if (response.estado == 1) {
                    swal({
                        title: 'Exito',
                        text: response.mensaje,
                        icon: 'success'
                    });
                    let pagos = response.pagos;
                    let table = $('#table_pagos_presupuesto').DataTable();
                    // Limpiar la tabla antes de agregar nuevas filas
                    table.clear().draw();
                    pagos.forEach(function(pago) {
                        let rowNode = table.row.add([
                            pago.fecha_pago,
                            pago.metodo_pago,
                            formatoMoneda(pago.total),
                            `<td>
                                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-search"></i></button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_pago_dental(${pago.id})"><i class="feather icon-x"></i></button>
                            </td>`
                        ]).draw(false).node();

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');
                    });
                    let table_piezas_odontograma = $('#presup_estado_pago').DataTable();

                    // Limpiar la tabla antes de agregar nuevas filas
                    table_piezas_odontograma.clear().draw();

                    let odontograma = response.odontograma;

                    // Recorrer el odontograma y agregar nuevas filas
                    odontograma.forEach(function(odonto) {

                        if (odonto.presupuesto == 1) {
                            if (odonto.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (odonto.estado_pago == 'incompleto') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }

                            if (odonto.estado == 0) {
                                var estado = 'PENDIENTE';
                            } else {
                                var estado = 'TERMINADO';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_piezas_odontograma.row.add([
                                odonto.descripcion,
                                odonto.pieza,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                0,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                '<div class="circle ' + clase + '"></div>',
                                estado, // Columna vacía

                            ]).draw(false).node(); // Obtener el nodo de la fila

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }
                    });

                    let insumos = response.insumos;
                    console.log(insumos);
                    let table_insumos = $('#table_insumos_preimplante').DataTable();

                    //Limpiar la tabla sin perder la configuración de DataTables
                    table_insumos.clear();

                    //Recorrer el array de insumos y agregarlos a la tabla
                    insumos.forEach(insumo => {
                        let total = insumo.cantidad * insumo.valor;
                        if (insumo.presupuesto == 0 || insumo.presupuesto == null) {
                            // Botones de acción
                            var botones = `
                                <td>
                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                        <i class="fas fa-save"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="feather icon-x"></i>
                                    </button>
                                </td>`;
                        } else {
                            var botones = `
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                        <i class="fas fa-save"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="feather icon-x"></i>
                                    </button>
                                </td>`;
                        }

                        table_insumos.row.add([
                            insumo.insumos + ' ' + insumo.nombre_marca, // Nombre del insumo
                            insumo.observaciones,
                            insumo.cantidad, // Cantidad utilizada
                            insumo.valor, // Unidad de medida
                            total,
                            botones
                        ]);
                    });
                    let table_insumos_pagos = $('#presup_insumos_pago').DataTable();
                    table_insumos_pagos.clear();
                    console.log(insumos);
                    insumos.forEach(insumo => {
                        let total = insumo.cantidad * insumo.valor;
                        if (insumo.presupuesto == 1) {
                            if (insumo.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (insumo.estado_pago == 'intermedio') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }
                            let rowNode = table_insumos_pagos.row.add([
                                insumo.insumos + ' ' + insumo.nombre_marca,
                                insumo.observaciones,
                                insumo.cantidad, // Nombre del insumo
                                formatoMoneda(insumo.valor), // Cantidad utilizada
                                0, // Unidad de medida
                                formatoMoneda(total),
                                ' <div class="circle ' + clase + '"></div>',

                            ]).draw(false).node();

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }

                    });
                    table_insumos_pagos.draw();
                    $('#montoAbonado').val(formatoMoneda(parseInt(response.suma_pagado)));
                    $('#valores_abonado_presupuesto').html(formatoMoneda(parseInt(response.suma_pagado)));
                    $('#valores_total_abonado_presupuesto_conf').html(formatoMoneda(parseInt(response
                        .suma_pagado)));
                    $('#total_abonado_presupuesto').val(parseInt(response.suma_pagado));
                    $('#total_adeudado_presupuesto').val(parseInt(response.suma_adeudado));
                    $('#abonos_presup').val(formatoMoneda(response.suma_pagado));
                    let todos = response.todos;

                    let table_ = $('#presup_estado_pago_gral').DataTable();

                    // Limpiar la tabla antes de agregar nuevas filas
                    table_.clear().draw();

                    // Recorrer el odontograma y agregar nuevas filas
                    todos.forEach(function(odonto) {

                        if (odonto.presupuesto == 1) {
                            if (odonto.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (odonto.estado_pago == 'intermedio') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }
                            if (odonto.estado == 0) {
                                var estado = 'PENDIENTE';
                            } else {
                                var estado = 'TERMINADO';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_.row.add([
                                odonto.localizacion,
                                odonto.diagnostico_tratamiento,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                0,
                                formatoMoneda(odonto.valor),
                                ' <div class="circle ' + clase + '"></div>',
                                estado
                            ]).draw(false).node();

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }

                    });
                     actualizar_presupuesto();
                } else {
                    swal({
                        title: 'error',
                        text: response.mensaje,
                        icon: 'error'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', xhr.responseText);
            }
        });
    }

    function eliminar_pago_dental(id) {
        swal({
            title: "¿Esta seguro que desea ELIMINAR el Pago?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Solicitar"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                confirmar_eliminar_pago_dental(id);
            }
        });
    }

    function confirmar_eliminar_pago_dental(id) {
        let url = "{{ ROUTE('dental.eliminar_pago_presupuesto_dental') }}";
        const id_dcto = $('#tiene_dcto').val();
        let data = {
            id: id,
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_paciente: $('#id_paciente').val(),
            monto_abonado: $('#abonos_presup').val(),
            total_presupuesto: $('#total_presupuesto_dental').val(),
            id_dcto: id_dcto,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                if (resp.estado == 'ok') {
                    swal({
                        title: 'Exito',
                        text: resp.mensaje,
                        icon: 'success'
                    });
                    let pagos = resp.pagos;
                    let table = $('#table_pagos_presupuesto').DataTable();
                    // Limpiar la tabla antes de agregar nuevas filas
                    table.clear().draw();
                    pagos.forEach(function(pago) {
                        let rowNode = table.row.add([
                            pago.fecha_pago,
                            pago.metodo_pago,
                            formatoMoneda(pago.total),
                            `<td>
                            <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-search"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_pago_dental(${pago.id})"><i class="feather icon-x"></i></button>
                        </td>`
                        ]).draw(false).node();

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');


                    });

                    let odontograma = resp.odontograma;
                    let table_piezas_odontograma = $('#presup_estado_pago').DataTable();

                    // Limpiar la tabla antes de agregar nuevas filas
                    table_piezas_odontograma.clear().draw();

                    // Recorrer el odontograma y agregar nuevas filas
                    odontograma.forEach(function(odonto) {

                        if (odonto.presupuesto == 1) {
                            if (odonto.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (odonto.estado_pago == 'incompleto') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }

                            if (odonto.estado == 0) {
                                var estado = 'PENDIENTE';
                            } else {
                                var estado = 'TERMINADO';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_piezas_odontograma.row.add([
                                odonto.descripcion,
                                odonto.pieza,
                                formatoMoneda(odonto.valor),
                                formatoMoneda(odonto.valor_descuento),
                                formatoMoneda(odonto.valor - odonto.valor_descuento),
                                '<div class="circle ' + clase + '"></div>',
                                estado, // Columna vacía

                            ]).draw(false).node(); // Obtener el nodo de la fila

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }
                    });
                    let insumos = resp.insumos;

                    let table_insumos_pagos = $('#presup_insumos_pago').DataTable();
                    table_insumos_pagos.clear();
                    console.log(insumos);
                    insumos.forEach(insumo => {
                        let total = insumo.cantidad * insumo.valor;
                        if (insumo.presupuesto == 1) {
                            if (insumo.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (insumo.estado_pago == 'intermedio') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }
                            let rowNode = table_insumos_pagos.row.add([
                                insumo.insumos + ' ' + insumo.nombre_marca,
                                insumo.observaciones,
                                insumo.cantidad, // Nombre del insumo
                                formatoMoneda(insumo.valor), // Cantidad utilizada
                                formatoMoneda(insumo.valor_descuento), // Unidad de medida
                                formatoMoneda(insumo.nuevo_valor),
                                ' <div class="circle ' + clase + '"></div>',

                            ]).draw(false).node();

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }

                    });
                    table_insumos_pagos.draw();

                    $('#contenedor_piezas_dentales_presupuesto').empty();
                    odontograma.forEach(function(odonto) {
                        if (odonto.presupuesto == 1) {
                            $('#contenedor_piezas_dentales_presupuesto').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-informacion">
                                            <div class="card-body pb-0">
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Pieza</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label-activo-sm">Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label-activo-sm">Total prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                    </div>
                                                    <div class="form-group col-md-2 d-flex justify-content-center">
                                                        <button type="button" class="btn btn-danger-light-c btn-sm btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            `);
                        }
                    });

                    $('#contenedor_insumos').empty();
                    insumos.forEach(insumo => {
                        if (insumo.presupuesto == 1) {
                            let total = insumo.cantidad * insumo.valor;
                            $('#contenedor_insumos').append(`
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-informacion">
                                        <div class="card-body pb-0">
                                            <div class="form-row">
                                                <div class="form-group col-md-2 fill">
                                                    <label class="floating-label-activo-sm">Insumo</label>
                                                    <input type="text" class="form-control form-control-sm" name="insumo_pres" id="insumo_pres" value="${insumo.insumos} ${insumo.nombre_marca}">
                                                </div>
                                                <div class="form-group col-md-3 fill">
                                                    <label class="floating-label-activo-sm">Cantidad</label>
                                                    <input type="text" class="form-control form-control-sm" name="cantidad_pres" id="cantidad_pres" value="${insumo.cantidad}">
                                                </div>
                                                <div class="form-group col-md-2 fill">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="">
                                                </div>
                                                <div class="form-group col-md-2 fill">
                                                    <label class="floating-label-activo-sm">Total Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                </div>
                                                <div class="form-group col-md-2 d-flex justify-content-center">

                                                    <button type="button" class="btn btn-danger-light-c btn-icon" onclick="eliminar_insumo(${insumo.id})"><i class="feather icon-x"> </i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                        }

                    });

                    let valores_boca_general = resp.valores[0];
                    let valores_odontograma = resp.valores[1];
                    let valores_insumos = resp.valores[2];
                    let descuentos = resp.descuentos;
                    let suma_pagado = resp.suma_pagado;
                    let total_general = valores_boca_general + valores_odontograma + valores_insumos -
                        descuentos;
                    $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                    $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                    $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                    $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                    $('#valores_descuentos_presupuesto').html(formatoMoneda(resp.descuentos));
                    $('#valores_descuentos_presupuesto_conf').html(formatoMoneda(resp.descuentos));
                    $('#valores_laboratorio_conf').html(formatoMoneda(resp.total_lab));
                    $('#descuento_presup').val(formatoMoneda(resp.descuentos));
                    $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                    $('#total_presup').val(formatoMoneda(total_general));
                    $('#subtotal_clinico').val(formatoMoneda(total_general));
                    $('#total_clinico').val(formatoMoneda(total_general));
                    // guardamos el total en un input hidden
                    $('#total_presupuesto_dental').val(total_general);
                    $('#subtotal_presup').val(formatoMoneda(resp.total_general));
                    $('#valores_total_abonado_presupuesto_conf').html(formatoMoneda(parseInt(
                        suma_pagado)));
                    $('#montoAbonado').val(formatoMoneda(parseInt(suma_pagado)));
                    let todos = resp.todos;

                    let table_ = $('#presup_estado_pago_gral').DataTable();

                    // Limpiar la tabla antes de agregar nuevas filas
                    table_.clear().draw();

                    // Recorrer el odontograma y agregar nuevas filas
                    todos.forEach(function(odonto) {

                        if (odonto.presupuesto == 1) {
                            if (odonto.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (odonto.estado_pago == 'incompleto') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }
                            if (odonto.estado == 0) {
                                var estado = 'PENDIENTE';
                            } else {
                                var estado = 'TERMINADO';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_.row.add([
                                odonto.localizacion,
                                odonto.diagnostico_tratamiento,
                                formatoMoneda(odonto.valor),
                                formatoMoneda(0),
                                formatoMoneda(odonto.nuevo_valor),
                                ' <div class="circle ' + clase + '"></div>',
                                estado
                            ]).draw(false).node();

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }

                    });
                    actualizar_presupuesto();
                }
            },
            error: function(error) {
                console.log(error.responseText);
            }
        });
    }

    function reasignar_presupuesto() {
        console.log('reasignando');
        $('#modalReasignarPresupuesto').modal('show');
        let abonado = $('#total_abonado_presupuesto').val();
        let adeudado = $('#total_adeudado_presupuesto').val();
        $('#monto_abonado').html('+' + formatoMoneda(abonado));
        $('#monto_adeudado').html('-' + formatoMoneda(adeudado));
        // limpiamos los check con clase valor-checkbox
        $('.valor-checkbox').prop('checked', false);
        totalSeleccionado = 0;
    }

    function reasignar_presupuesto_modal() {
        swal({
            title: "¿Esta seguro que desea Reasignar el presupuesto?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Confirmar"],
            dangerMode: true,
        }).then((confirm) => {
            if(confirm){
                confirmar_reasignar_presupuesto_modal();
            }
        });
    }

    function confirmar_reasignar_presupuesto_modal(){
        // Crear objeto JSON con los datos del formulario
        const data = {
            _token: '{{ csrf_token() }}', // Token CSRF
            valores: valoresSeleccionados,
            valorPresupuestoTotal: $('#total_presupuesto_a_pagar').val(),
            valorAbonado: $('#total_abonado_presupuesto').val(),
            valorAdeudado: $('#total_adeudado_presupuesto').val(),
            id_ficha_atencion: $('#id_fc').val(),
            id_paciente: $('#id_paciente').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
        };

        console.log('Orden de clics:', valoresSeleccionados);


        // Enviar los datos por AJAX
        $.ajax({
            url: '{{ ROUTE("dental.reasignar_presupuesto_dental") }}', // Reemplaza con la URL de tu endpoint en el controlador
            method: 'POST',
            data: data,
            success: function(response) {
                console.log('Éxito:', response);
                if (response.estado == 1) {
                    swal({
                        title: 'Exito',
                        text: response.mensaje,
                        icon: 'success'
                    });


                    let table_piezas_odontograma = $('#presup_estado_pago').DataTable();

                    // Limpiar la tabla antes de agregar nuevas filas
                    table_piezas_odontograma.clear().draw();

                    let odontograma = response.odontograma;

                    // Recorrer el odontograma y agregar nuevas filas
                    odontograma.forEach(function(odonto) {
                        if (odonto.presupuesto == 1) {
                            if (odonto.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (odonto.estado_pago == 'incompleto') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }
                            if (odonto.estado == 0) {
                                var estado = 'PENDIENTE';
                            } else {
                                var estado = 'TERMINADO';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_piezas_odontograma.row.add([
                                odonto.descripcion,
                                odonto.pieza,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                0,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                '<div class="circle ' + clase + '"></div>',
                                estado, // Columna vacía

                            ]).draw(false).node(); // Obtener el nodo de la fila

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }
                    });

                    let insumos = response.insumos;
                    console.log(insumos);
                    let table_insumos_pagos = $('#presup_insumos_pago').DataTable();
                    table_insumos_pagos.clear();
                    console.log(insumos);
                    insumos.forEach(insumo => {
                        let total = insumo.cantidad * insumo.valor;
                        if (insumo.presupuesto == 1) {
                            if (insumo.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (insumo.estado_pago == 'intermedio') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }
                            let rowNode = table_insumos_pagos.row.add([
                                insumo.insumos + ' ' + insumo.nombre_marca,
                                insumo.observaciones,
                                insumo.cantidad, // Nombre del insumo
                                formatoMoneda(insumo.valor), // Cantidad utilizada
                                0, // Unidad de medida
                                formatoMoneda(total),
                                ' <div class="circle ' + clase + '"></div>',

                            ]).draw(false).node();

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }

                    });
                    table_insumos_pagos.draw();

                    let todos = response.todos;

                    let table_todos = $('#presup_estado_pago_gral').DataTable();
                    // Limpiar la tabla antes de agregar nuevas filas
                    table_todos.clear().draw();
                    // Recorrer el odontograma y agregar nuevas filas
                    todos.forEach(function(odonto) {
                        if (odonto.presupuesto == 1) {
                            if (odonto.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (odonto.estado_pago == 'incompleto') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }
                            if (odonto.estado == 0) {
                                var estado = 'TERMINADO';
                            } else {
                                var estado = 'PENDIENTE';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_todos.row.add([
                                odonto.localizacion,
                                odonto.diagnostico_tratamiento,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                0,
                                formatoMoneda(odonto.valor),
                                ' <div class="circle ' + clase + '"></div>',
                                estado
                            ]).draw(false).node();

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }

                    });
                } else {
                    swal({
                        title: 'error',
                        text: response.mensaje,
                        icon: 'error'
                    });
                }
            },
        });
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let totalSeleccionado = 0;
        let totalPresupuesto = $('#total_presupuesto_a_pagar').val();

        function actualizarTotal(valor, agregar) {
            let totalAbonado = parseInt($('#total_abonado_presupuesto').val()) || 0;
            let totalAdeudado = parseInt($('#total_adeudado_presupuesto').val()) || 0;

            totalSeleccionado += agregar ? valor : -valor;
            console.log('Total seleccionado:', totalSeleccionado);
            console.log('Total presupuesto:', totalPresupuesto);
            console.log('Total abonado:', totalAbonado);

            if (totalAbonado < totalSeleccionado) {
                var clase = 'text-danger';
                var texto = 'El monto seleccionado supera el total abonado';
                var diferencia = totalSeleccionado - totalAbonado;
            } else {
                var clase = 'text-success';
                var texto = 'Monto seleccionado correcto';
                var diferencia = totalAbonado - totalSeleccionado;
            }

            document.getElementById('info_pagos_seleccionados').innerHTML = `
                Total seleccionado: ${formatoMoneda(totalSeleccionado)}<br>
                ${texto}<br>
                Diferencia: ${formatoMoneda(diferencia)}
            `;

            document.getElementById('info_pagos_seleccionados').className = clase;
        }

        document.addEventListener('change', function(event) {
            if (event.target.classList.contains('valor-checkbox')) {
                const valor = parseInt(event.target.getAttribute('data-valor'));
                actualizarTotal(valor, event.target.checked);
            }
        });
    });

    function aplicar_convenio_tratamiento(id) {
        swal({
            title: "¿Esta seguro que desea aplicar el descuento?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Confirmar"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                confirmar_aplicar_convenio_tratamiento(id);
            }
        });
    }

    function confirmar_aplicar_convenio_tratamiento(id) {
        let data = {
            id: id,
            id_paciente: $('#id_paciente').val(),
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            monto_abonado: $('#abonos_presup').val(),
            _token: CSRF_TOKEN
        }
        let url = "{{ ROUTE('profesional.aplicar_convenio_tratamiento') }}";
        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                $('#mensaje').html('Descuento aplicado');
                $('#tiene_dcto').val(id);
                // Cambiar el botón para que pase a ser "Quitar convenio"
                const boton = document.querySelector(
                    `button[onclick="aplicar_convenio_tratamiento(${id})"]`);
                if (boton) {
                    boton.classList.remove('btn-outline-success');
                    boton.classList.add('btn-danger');
                    boton.innerHTML = '<i class="fas fa-times"></i>';
                    boton.setAttribute('onclick', `quitar_convenio_tratamiento(${id})`);
                }
                let odontograma = resp.odontograma;
                let table_piezas_odontograma = $('#presup_estado_pago').DataTable();

                // Limpiar la tabla antes de agregar nuevas filas
                table_piezas_odontograma.clear().draw();

                // Recorrer el odontograma y agregar nuevas filas
                odontograma.forEach(function(odonto) {

                    if (odonto.presupuesto == 1) {
                        if (odonto.estado_pago == 'ok') {
                            var clase = 'bg-success';
                        } else if (odonto.estado_pago == 'incompleto') {
                            var clase = 'bg-warning';
                        } else {
                            var clase = 'bg-danger';
                        }

                        if (odonto.estado == 0) {
                            var estado = 'PENDIENTE';
                        } else {
                            var estado = 'TERMINADO';
                        }
                        // Agregar una nueva fila a la tabla
                        let rowNode = table_piezas_odontograma.row.add([
                            odonto.descripcion,
                            odonto.pieza,
                            formatoMoneda(odonto.valor),
                            formatoMoneda(odonto.valor_descuento),
                            formatoMoneda(odonto.valor - odonto.valor_descuento),
                            '<div class="circle ' + clase + '"></div>',
                            estado, // Columna vacía

                        ]).draw(false).node(); // Obtener el nodo de la fila

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');
                    }
                });

                let insumos = resp.insumos;

                let table_insumos_pagos = $('#presup_insumos_pago').DataTable();
                table_insumos_pagos.clear();
                console.log(insumos);
                insumos.forEach(insumo => {
                    let total = insumo.cantidad * insumo.valor;
                    if (insumo.presupuesto == 1) {
                        if (insumo.estado_pago == 'ok') {
                            var clase = 'bg-success';
                        } else if (insumo.estado_pago == 'incompleto') {
                            var clase = 'bg-warning';
                        } else {
                            var clase = 'bg-danger';
                        }
                        let rowNode = table_insumos_pagos.row.add([
                            insumo.insumos + ' ' + insumo.nombre_marca,
                            insumo.observaciones,
                            insumo.cantidad, // Nombre del insumo
                            formatoMoneda(insumo.valor), // Cantidad utilizada
                            formatoMoneda(insumo.valor_descuento), // Unidad de medida
                            formatoMoneda(insumo.nuevo_valor),
                            ' <div class="circle ' + clase + '"></div>',

                        ]).draw(false).node();

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');
                    }

                });
                table_insumos_pagos.draw();

                $('#contenedor_piezas_dentales_presupuesto').empty();
                odontograma.forEach(function(odonto) {
                    if (odonto.presupuesto == 1) {
                        $('#contenedor_piezas_dentales_presupuesto').append(`
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-informacion">
                                    <div class="card-body pb-0">
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1 fill">
                                                <label class="floating-label-activo-sm">Pieza</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4 fill">
                                                <label class="floating-label-activo-sm">Prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                <label class="floating-label-activo-sm">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(odonto.valor)}" >
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                <label class="floating-label-activo-sm">Descuento</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(odonto.valor_descuento)}">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                <label class="floating-label-activo-sm">Total prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(odonto.valor - odonto.valor_descuento)}" >
                                            </div>
                                            <div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    `);
                    }
                });

                $('#contenedor_insumos').empty();
                insumos.forEach(insumo => {
                    if (insumo.presupuesto == 1) {
                        let total = insumo.cantidad * insumo.valor;
                        $('#contenedor_insumos').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-informacion">
                                            <div class="card-body pb-0">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12 col-lg-4 fill">
                                                        <label class="floating-label-activo-sm">Insumo</label>
                                                        <input type="text" class="form-control form-control-sm" name="insumo_pres" id="insumo_pres" value="${insumo.insumos} ${insumo.nombre_marca}">
                                                    </div>
                                                    <div class="form-group col-md-3 col-lg-1 fill">
                                                        <label class="floating-label-activo-sm">Cantidad</label>
                                                        <input type="text" class="form-control form-control-sm" name="cantidad_pres" id="cantidad_pres" value="${insumo.cantidad}">
                                                    </div>
                                                    <div class="form-group col-md-3 col-lg-2 fill">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-2 col-lg-2">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(insumo.valor_descuento)}">
                                                    </div>
                                                    <div class="form-group col-md-3 col-lg-2 fill">
                                                        <label class="floating-label-activo-sm">Total Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total - insumo.valor_descuento)}">
                                                    </div>
                                                    <div class="form-group col-md-1 col-lg-1 d-flex">

                                                        <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_insumo(${insumo.id})"><i class="feather icon-x"> </i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `);
                    }

                });

                let valores_boca_general = resp.valores[0];
                let valores_odontograma = resp.valores[1];
                let valores_insumos = resp.valores[2];
                let valores_laboratorio = resp.valores[3];
                let descuentos = resp.descuentos;
                let total_general = valores_boca_general + valores_odontograma + valores_insumos + valores_laboratorio -
                    descuentos;
                $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                $('#valores_descuentos_presupuesto').html(formatoMoneda(resp.descuentos));
                $('#valores_descuentos_presupuesto_conf').html(formatoMoneda(resp.descuentos));
                $('#valores_laboratorio_conf').html(formatoMoneda(resp.total_lab));
                $('#descuento_presup').val(formatoMoneda(resp.descuentos));
                $('#descuento_clinico').val(formatoMoneda(resp.descuentos));
                $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                $('#total_presup').val(formatoMoneda(total_general));
                $('#subtotal_clinico').val(formatoMoneda(valores_odontograma));
                $('#total_clinico').val(formatoMoneda(total_general));
                $('#total_presupuesto').val(formatoMoneda(total_general));
                // guardamos el total en un input hidden
                $('#total_presupuesto_dental').val(total_general);
                $('#subtotal_presup').val(formatoMoneda(resp.total_general));
                let todos = resp.todos;

                let table = $('#presup_estado_pago_gral').DataTable();

                // Limpiar la tabla antes de agregar nuevas filas
                table.clear().draw();

                // Recorrer el odontograma y agregar nuevas filas
                todos.forEach(function(odonto) {

                    if (odonto.presupuesto == 1) {
                        if (odonto.estado_pago == 'ok') {
                            var clase = 'bg-success';
                        } else if (odonto.estado_pago == 'incompleto') {
                            var clase = 'bg-warning';
                        } else {
                            var clase = 'bg-danger';
                        }
                        if (odonto.estado == 0) {
                            var estado = 'PENDIENTE';
                        } else {
                            var estado = 'TERMINADO';
                        }
                        // Agregar una nueva fila a la tabla
                        let rowNode = table.row.add([
                            odonto.localizacion,
                            odonto.diagnostico_tratamiento,
                            formatoMoneda(odonto.valor),
                            formatoMoneda(odonto.valor_descuento),
                            formatoMoneda(odonto.nuevo_valor),
                            ' <div class="circle ' + clase + '"></div>',
                            estado
                        ]).draw(false).node();

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');
                    }

                });

                $('#contenedor_todos').empty();
                todos.forEach(t => {
                    if(t.presupuesto == 1){
                         $('#contenedor_todos').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label-activo-sm">${t.localizacion}</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-md-6 fill">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${t.diagnostico_tratamiento}">
                                                        </div>
                                                        <div class="form-group col-md-4 fill">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor_descuento)}">
                                                        </div>
                                                        <div class="form-group col-md-4 fill">
                                                            <label class="floating-label-activo-sm">Total
                                                                prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.nuevo_valor)}">
                                                        </div>
                                                        <div class="form-group col-md-1 fill">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="sacar_de_presupuesto(${t.id},'gral')"><i class="feather icon-x"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>`
                                );
                    }
                });
            },
            error: function(error) {
                console.log(error.responseText);
            }
        });
    }

    function quitar_convenio_tratamiento(id) {
        console.log(id);
        let url = "{{ ROUTE('dental.dame_prestaciones_presupuesto') }}";
        let data = {
            id: id,
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_paciente: $('#id_paciente').val(),
            monto_abonado: $('#abonos_presup').val(),
            tiene_dcto: $('#tiene_dcto').val(),
            monto_abonado: $('#abonos_presup').val(),
            _token: CSRF_TOKEN
        }

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                $('#mensaje').html('Descuento retirado');
                $('#tiene_dcto').val(0);
                // Cambiar el botón para que vuelva a ser "Aplicar convenio"
                const boton = document.querySelector(
                `button[onclick="quitar_convenio_tratamiento(${id})"]`);
                if (boton) {
                    boton.classList.remove('btn-danger');
                    boton.classList.add('btn-outline-success');
                    boton.innerHTML = '<i class="fas fa-check"></i>';
                    boton.setAttribute('onclick', `aplicar_convenio_tratamiento(${id})`);
                }
                let odontograma = resp.odontograma;
                let table_piezas_odontograma = $('#presup_estado_pago').DataTable();

                // Limpiar la tabla antes de agregar nuevas filas
                table_piezas_odontograma.clear().draw();

                // Recorrer el odontograma y agregar nuevas filas
                odontograma.forEach(function(odonto) {

                    if (odonto.presupuesto == 1) {
                        if (odonto.estado_pago == 'ok') {
                            var clase = 'bg-success';
                        } else if (odonto.estado_pago == 'incompleto') {
                            var clase = 'bg-warning';
                        } else {
                            var clase = 'bg-danger';
                        }

                        if (odonto.estado == 0) {
                            var estado = 'PENDIENTE';
                        } else {
                            var estado = 'TERMINADO';
                        }
                        // Agregar una nueva fila a la tabla
                        let rowNode = table_piezas_odontograma.row.add([
                            odonto.descripcion,
                            odonto.pieza,
                            formatoMoneda((odonto.valor)),
                            0,
                            formatoMoneda((odonto.valor)),
                            '<div class="circle ' + clase + '"></div>',
                            estado, // Columna vacía

                        ]).draw(false).node(); // Obtener el nodo de la fila

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');
                    }
                });

                $('#contenedor_piezas_dentales_presupuesto').empty();
                odontograma.forEach(function(odonto) {
                    if (odonto.presupuesto == 1) {
                        $('#contenedor_piezas_dentales_presupuesto').append(`
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1 fill">
                                                            <label class="floating-label-activo-sm">Pieza</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4 fill">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Total prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `);
                    }
                });

                let insumos = resp.insumos;

                let table_insumos_pagos = $('#presup_insumos_pago').DataTable();
                table_insumos_pagos.clear();
                console.log(insumos);
                insumos.forEach(insumo => {
                    let total = insumo.cantidad * insumo.valor;
                    if (insumo.presupuesto == 1) {
                        if (insumo.estado_pago == 'ok') {
                            var clase = 'bg-success';
                        } else if (insumo.estado_pago == 'intermedio') {
                            var clase = 'bg-warning';
                        } else {
                            var clase = 'bg-danger';
                        }
                        let rowNode = table_insumos_pagos.row.add([
                            insumo.insumos + ' ' + insumo.nombre_marca,
                            insumo.observaciones,
                            insumo.cantidad, // Nombre del insumo
                            formatoMoneda(insumo.valor), // Cantidad utilizada
                            0, // Unidad de medida
                            formatoMoneda(total),
                            ' <div class="circle ' + clase + '"></div>',

                        ]).draw(false).node();

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');
                    }

                });
                table_insumos_pagos.draw();

                $('#contenedor_insumos').empty();
                insumos.forEach(insumo => {
                    if (insumo.presupuesto == 1) {
                        let total = insumo.cantidad * insumo.valor;
                        let dcto = insumo.valor - insumo.valor_descuento;
                        $('#contenedor_insumos').append(`
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-informacion">
                                    <div class="card-body pb-0">
                                        <div class="form-row">
                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">Insumo</label>
                                                <input type="text" class="form-control form-control-sm" name="insumo_pres" id="insumo_pres" value="${insumo.insumos} ${insumo.nombre_marca}">
                                            </div>
                                            <div class="form-group col-md-3 fill">
                                                <label class="floating-label-activo-sm">Cantidad</label>
                                                <input type="text" class="form-control form-control-sm" name="cantidad_pres" id="cantidad_pres" value="${insumo.cantidad}">
                                            </div>
                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">Sub-Total</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(insumo.valor)}">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="floating-label-activo-sm">Descuento</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="">
                                            </div>
                                            <div class="form-group col-md-2 fill">
                                                <label class="floating-label-activo-sm">Total Prestación</label>
                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                            </div>
                                            <div class="form-group col-md-2 d-flex justify-content-center">

                                                <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_insumo(${insumo.id})"><i class="feather icon-x"> </i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    }

                });

                let valores_boca_general = resp.valores[0];
                let valores_odontograma = resp.valores[1];
                let valores_insumos = resp.valores[2];
                let valores_laboratorio = resp.valores[3];
                let total_general = valores_boca_general + valores_odontograma + valores_insumos + valores_laboratorio;

                $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                $('#descuento_presup').val('$' + 0);
                $('#valores_descuentos_presupuesto').text('$' + 0);
                $('#valores_descuentos_presupuesto_conf').text('$' + 0);
                $('#valores_laboratorio_conf').text(formatoMoneda(resp.total_lab));
                $('#total_presup').val(formatoMoneda(total_general));
                $('#subtotal_clinico').val(formatoMoneda(valores_odontograma));
                $('#total_clinico').val(formatoMoneda(valores_odontograma));
                $('#total_presupuesto').val(formatoMoneda(total_general));
                $('#descuento_clinico').val(0);
                // guardamos el total en un input hidden
                $('#total_presupuesto_dental').val(total_general);
                $('#subtotal_presup').val(formatoMoneda(total_general));
                let todos = resp.todos;

                let table_todos = $('#presup_estado_pago_gral').DataTable();

                // Limpiar la tabla antes de agregar nuevas filas
                table_todos.clear().draw();

                // Recorrer el odontograma y agregar nuevas filas
                todos.forEach(function(odonto) {

                    if (odonto.presupuesto == 1) {
                        if (odonto.estado_pago == 'ok') {
                            var clase = 'bg-success';
                        } else if (odonto.estado_pago == 'incompleto') {
                            var clase = 'bg-warning';
                        } else {
                            var clase = 'bg-danger';
                        }
                        if (odonto.estado == 0) {
                            var estado = 'PENDIENTE';
                        } else {
                            var estado = 'TERMINADO';
                        }
                        // Agregar una nueva fila a la tabla
                        let rowNode = table_todos.row.add([
                            odonto.localizacion,
                            odonto.diagnostico_tratamiento,
                            formatoMoneda(odonto.valor),
                            0,
                            formatoMoneda(odonto.valor),
                            ' <div class="circle ' + clase + '"></div>',
                            estado
                        ]).draw(false).node();

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');
                    }

                });

                $('#contenedor_todos').empty();
                todos.forEach(t => {
                    if(t.presupuesto == 1){
                        $('#contenedor_todos').append(`
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-informacion">
                                                        <div class="card-body pb-0">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label class="floating-label-activo-sm">${t.localizacion}</label>
                                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                                </div>
                                                                <div class="form-group col-md-6 fill">
                                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${t.diagnostico_tratamiento}">
                                                                </div>
                                                                <div class="form-group col-md-4 fill">
                                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3">
                                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                                </div>
                                                                <div class="form-group col-md-4 fill">
                                                                    <label class="floating-label-activo-sm">Total
                                                                        prestación</label>
                                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                                </div>
                                                                <div class="form-group col-md-1 fill">
                                                                    <button type="button" class="btn btn-danger btn-icon" onclick="sacar_de_presupuesto(${t.id},'gral')"><i class="feather icon-x"></i> </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>`
                                        );
                    }
                });
                actualizar_presupuesto();
            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }

    /*-Agendar hora medica-*/
    function hora_medica(id_profesional, id_lugar_atencion) {
        $('#modal_reserva_hora_lugar_atencion').val('');
        $('#modal_reserva_dias_atencion').val('');
        $('#modal_reserva_fecha').val('');
        $('#modal_reserva_hora_lista_horas').html('');
        // asigno id profesioanl
        $('#modal_reserva_hora_id_profesional').val(id_profesional);

        // cargo lugares de atencion  y asigno lugar con hora mas proxima
        lugar_atencion_profesional($('#modal_reserva_hora_id_profesional'), 'modal_reserva_hora_lugar_atencion',
            id_lugar_atencion)

        $('#reservar_hora').modal('show');
    }

    function info_lab(id_lab) {
        let url = "{{ ROUTE('dental.info_laboratorio') }}";
        let data = {
            id_lab: id_lab,
            _token: CSRF_TOKEN
        }
        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                $('#info_lab_nombre').html(resp.laboratorio.nombre);
                $('#info_lab_direccion').html(resp.direccion.direccion+' '+resp.direccion.numero_dir);
                $('#info_lab_telefono').html(resp.laboratorio.telefono);
                $('#info_lab_email').html(resp.laboratorio.email);
                $('#info_lab_modal').modal('show');
            },
            error: function(error) {
                console.log(error.responseText);
            }
        });
    }
</script>
