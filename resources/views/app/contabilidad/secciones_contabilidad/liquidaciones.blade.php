@extends('template.adm_cm.template')
@section('content')
    <!--****Container Completo****-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Escritorio Contabilidad liquidaciones</h5>
                            </div>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather  icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.area_contabilidad') }}">Volver
                                        escritorio Contabilidad</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills bg-white" id="liquidaciones_cm" role="tablist">
                                    <li class="nav-item">
                                        <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="pills-home-tab"
                                            data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                                            aria-selected="true">Profesionales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-profile-tab"
                                            data-toggle="pill" href="#pills-profile" role="tab"
                                            aria-controls="pills-profile" aria-selected="false">Otros Profesionales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-nomina-tab"
                                            data-toggle="pill" href="#pills-nomina" role="tab"
                                            aria-controls="pills-nomina" aria-selected="false">Nómina</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-outline-info btn-sm mr-1 my-1" id="pills-reporte-tab"
                                            data-toggle="pill" href="#pills-reporte" role="tab"
                                            aria-controls="pills-reporte" aria-selected="false">Reportes</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="row mb-n10">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info">
                                                <div class="col-md-12 align-botton">
                                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Liquidaciones a
                                                        Profesionales </h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                    </div>
                                                </div>
                                                <div style="overflow-x:auto;">
                                                    <table id="tabla_pago_prof_centro"
                                                        class="display table table-striped table-hover dt-responsive nowrap"
                                                        style="width:99%">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center align-middle">Nombre / Rut</th>
                                                                <th class="text-center align-middle">Profesion</th>
                                                                <th class="text-center align-middle">Tipo de Contrato/Fecha
                                                                    contrato</th>
                                                                <th class="text-center align-middle">Contacto/cuenta</th>
                                                                <th class="text-center align-middle">Remuneración Mes</th>
                                                                <th class="text-center align-middle">Acción</th>
                                                            </tr>

                                                        </thead>
                                                        <tbody>
                                                            @foreach ($profesionales_contratados as $profesional)
                                                            @if(!$profesional->contrato)
                                                                <tr>
                                                                    <td class="align-middle text-center">
                                                                        <span><strong>{{ $profesional->nombre }}
                                                                                {{ $profesional->apellido_uno }}
                                                                                {{ $profesional->apellido_dos }}</strong></span><br>
                                                                        <span>{{ $profesional->rut }}</span>
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        <span>{{ $profesional->especialidad }}</span><br>
                                                                        <span>{{ $profesional->tipo_especialidad }}</span><br>
                                                                        <span>{{ $profesional->sub_tipo_especialidad }}</span>
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        @if ($profesional->contrato !== null)
                                                                            <span>{{ $profesional->contrato->tipo_contrato == 1 ? 'INDEFINIDO' : '' }}</span><br>
                                                                            <span>{{ $profesional->contrato->fecha_inicio }}</span>
                                                                        @else
                                                                            <span>Convenio</span>
                                                                        @endif
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        <button type="button"
                                                                            class="btn btn-info btn-sm btn-icon"
                                                                            onclick="contacto({{ $profesional->id }});"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Ver"><i
                                                                                class="feather icon-home"></i></button>
                                                                        <button type="button"
                                                                            class="btn btn-success btn-sm btn-icon"
                                                                            onclick="datoscuenta({{ $profesional->id }});"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Depositar"><i
                                                                                class="fas fa-hand-holding-usd"></i></button>
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        @if ($profesional->contrato !== null)
                                                                            @if (!$profesional->es_convenio)
                                                                                <span>{{ $profesional->horas_semanales }}
                                                                                    horas semanales <br>
                                                                                    ${{ number_format($profesional->contrato->monto_imponible, 0, ',', '.') }}</span>
                                                                            @else
                                                                                <span>
                                                                                    ${{ number_format($profesional->contrato->valor_fijo, 0, ',', '.') }}</span>
                                                                            @endif
                                                                        @else
                                                                            <span>Contrato no definido</span>
                                                                        @endif
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        {{-- <button type="button" class="btn btn-success btn-sm" onclick="liquidacionot({{ $profesional->id }},{{ $profesional->contrato !== null ? $profesional->contrato->id : 3}});">
                                                            <i class="feather icon-edit"></i> Liquidación</button> --}}
                                                                        <button type="button"
                                                                            class="btn btn-success btn-sm"
                                                                            onclick="liquidar({{ $profesional->id }},{{ $profesional->contrato !== null ? $profesional->contrato->id : 3 }});">
                                                                            <i class="feather icon-edit"></i>
                                                                            Liquidar</button>
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
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="row mb-n10">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info">
                                                <div class="col-md-12 align-botton">
                                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Liquidaciones a Otros
                                                        Profesionales de La Salud</h4>
                                                    <button type="button"
                                                        class="btn btn-outline-light btn-sm d-inline float-right mr-4"
                                                        data-toggle="modal" data-target="#registrar_profesional">
                                                        <i class="feather icon-plus"></i> Registrar Datos Profesional
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                    </div>
                                                </div>
                                                <div style="overflow-x:auto;">
                                                    <table id="tabla_pago_otprof_centro"
                                                        class="display table table-striped table-hover dt-responsive nowrap"
                                                        style="width:99%">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center align-middle">Nombre / Rut</th>
                                                                <th class="text-center align-middle">Prof/esp</th>
                                                                <th class="text-center align-middle">Mes</th>
                                                                <th class="text-center align-middle">N° Atenciones</th>
                                                                <th class="text-center align-middle">Valor Total</th>
                                                                <th class="text-center align-middle">Porcentaje</th>
                                                                <th class="text-center align-middle">T. Descuentos</th>
                                                                <th class="text-center align-middle">V. a Pagar</th>
                                                                <th class="text-center align-middle">Datos Cuenta</th>
                                                                <th class="text-center align-middle">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($profesionales as $profesional)
                                                                @if ($profesional->contrato !== null)
                                                                    <tr>
                                                                        <td class="align-middle text-center">
                                                                            <span><strong>{{ $profesional->nombre }}
                                                                                    {{ $profesional->apellido_uno }}
                                                                                    {{ $profesional->apellido_dos }} <br>
                                                                                    {{ $profesional->rut }} </strong>
                                                                            </span></td>
                                                                        <td class="align-middle text-center">
                                                                            {{ $profesional->especialidad }} <br>
                                                                            {{ $profesional->tipo_especialidad }}</td>
                                                                        <td class="align-middle text-center"></td>
                                                                        <td class="align-middle text-center"></td>
                                                                        <td class="align-middle text-center"></td>
                                                                        <td class="align-middle text-center"></td>
                                                                        <td class="align-middle text-center"></td>
                                                                        <td class="align-middle text-center"></td>
                                                                        <td class="align-middle text-center">
                                                                            <button type="button"
                                                                                class="btn btn-info btn-sm btn-icon"
                                                                                onclick="contacto({{ $profesional->id }});"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title="Depositar"><i
                                                                                    class="feather icon-home"></i></button>
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            <button type="button"
                                                                                class="btn btn-success btn-sm"
                                                                                onclick="liquidacionot({{ $profesional->id }},{{ $profesional->contrato->id }});">
                                                                                <i class="feather icon-edit"></i>
                                                                                Liquidación</button>
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
                            <div class="tab-pane fade" id="pills-nomina" role="tabpanel"
                                aria-labelledby="pills-nomina-tab">
                                <div class="row mb-n10">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info">
                                                <div class="col-md-12 align-botton">
                                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Nómina de Profesionales
                                                    </h4>
                                                    <button type="button"
                                                        class="btn btn-outline-light btn-sm d-inline float-right mr-4"
                                                        data-toggle="modal" data-target="#registrar_profesional">
                                                        <i class="feather icon-plus"></i> Registrar Profesional
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                    </div>
                                                </div>
                                                <div style="overflow-x:auto;">
                                                    <table id="tabla_nomina_prof"
                                                        class="display table table-striped table-hover dt-responsive nowrap"
                                                        style="width:99%">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center align-middle">Nombre / Rut</th>
                                                                <th class="text-center align-middle">Fecha de Ingreso</th>
                                                                <th class="text-center align-middle">Contacto</th>
                                                                <th class="text-center align-middle">Profesión/Espec.</th>
                                                                <th class="text-center align-middle">Dias atención</th>
                                                                <th class="text-center align-middle">Centro</th>
                                                                <th class="text-center align-middle">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <span><strong>Juan Sanchez</strong></span><br>
                                                                    <span>17.345.466-2</span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <span><strong>02/1/2020</strong></span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <!--Botón Modal-->
                                                                    <button type="button"
                                                                        class="btn btn-info btn-sm btn-icon"
                                                                        onclick="contactoc();" data-toggle="tooltip"
                                                                        data-placement="top" title="Ver"><i
                                                                            class="feather icon-home"></i></button>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <span><strong>Dermatólogo</strong></span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <span>lunes y viernes </span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <span>Plaza Oeste</span>
                                                                </td>

                                                                <td class="align-middle text-center">
                                                                    <button type="button" class="btn btn-success btn-sm"
                                                                        onclick="editar_datosprofesional();">
                                                                        <i class="feather icon-edit"></i> Editar</button>
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm btn-icon-sm">
                                                                        <i class="feather icon-x-circle"></i> D</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <span><strong>Maria Cornejo</strong></span><br>
                                                                    <span>17.345.466-2</span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <span><strong>02/10/2021</strong></span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <!--Botón Modal-->
                                                                    <button type="button"
                                                                        class="btn btn-info btn-sm btn-icon"
                                                                        onclick="contactoc();" data-toggle="tooltip"
                                                                        data-placement="top" title="Ver"><i
                                                                            class="feather icon-home"></i></button>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <span><strong>kinesióloga</strong></span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <span>martes y jueves </span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <span>Plaza Oeste</span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <button type="button" class="btn btn-success btn-sm"
                                                                        onclick="editar_datosprofesional();">
                                                                        <i class="feather icon-edit"></i> Editar</button>
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm btn-icon-sm">
                                                                        <i class="feather icon-x-circle"></i> D</button>
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
                            <div class="tab-pane fade" id="pills-reporte" role="tabpanel"
                                aria-labelledby="pills-reporte-tab">
                                <div class="row mb-n10">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info">
                                                <div class="col-md-12 align-botton">
                                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Reporte de Liquidaciones
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2 mb-3">
                                                        <div class="d-flex justify-content-between align-items-start">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="mes_reporte">Mes</label>
                                                                <select name="mes_reporte" id="mes_reporte" class="form-control form-control-sm w-100">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">Enero</option>
                                                                    <option value="2">Febrero</option>
                                                                    <option value="3">Marzo</option>
                                                                    <option value="4">Abril</option>
                                                                    <option value="5">Mayo</option>
                                                                    <option value="6">Junio</option>
                                                                    <option value="7">Julio</option>
                                                                    <option value="8">Agosto</option>
                                                                    <option value="9">Septiembre</option>
                                                                    <option value="10">Octubre</option>
                                                                    <option value="11">Noviembre</option>
                                                                    <option value="12">Diciembre</option>
                                                                </select>
                                                            </div>
                                                            <button class="btn btn-success btn-sm float-right"><i class="fas fa-search"></i></button>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-start">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="fecha_reporte">Fecha</label>
                                                                <input type="date" name="fecha_reporte" id="fecha_reporte" class="form-control form-control-sm w-100">
                                                            </div>
                                                            <button class="btn btn-success btn-sm float-right" onclick="buscar_liquidaciones()"><i class="fas fa-search"></i></button>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-10">
                                                        <div style="overflow-x:auto;">
                                                            <table id="tabla_prof_liquidaciones"
                                                                class="display table table-striped table-hover dt-responsive nowrap"
                                                                style="width:99%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle">Nombre / Rut</th>
                                                                        <th class="text-center align-middle">Fecha de Ingreso</th>
                                                                        <th class="text-center align-middle">Fecha de Termino</th>
                                                                        <th class="text-center align-middle">Contacto</th>
                                                                        <th class="text-center align-middle">Profesión/Espec.</th>
                                                                        <th class="text-center align-middle">Acción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($liquidaciones as $liquidacion)
                                                                    <tr>
                                                                        <td class="align-middle text-center">
                                                                            <span><strong>{{ $liquidacion->nombre }} {{ $liquidacion->apellido_uno }} {{ $liquidacion->apellido_dos }}</strong></span><br>
                                                                            <span>{{ $liquidacion->rut }}</span>
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            <span><strong>{{ $liquidacion->fecha_inicio }}</strong></span>
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            <span><strong>{{ $liquidacion->fecha_termino }}</strong></span>
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            <!--Botón Modal-->
                                                                            <button type="button"
                                                                                class="btn btn-info btn-sm btn-icon"
                                                                                onclick="contactoc();" data-toggle="tooltip"
                                                                                data-placement="top" title="Ver"><i
                                                                                    class="feather icon-home"></i></button>
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            <span><strong>{{ $liquidacion->especialidad }}</strong><br><strong>{{ $liquidacion->tipo_especialidad }}</strong></span>
                                                                        </td>

                                                                        <td class="align-middle text-center">
                                                                            <button type="button" class="btn btn-outline-success btn-sm"
                                                                                onclick="generar_pdf_liquidacion_reporte({{ $liquidacion->id_profesional }});">
                                                                                <i class="fas fa-eye"></i> Ver</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="id_profesional" id="id_profesional" value="">
    <input type="hidden" name="id_institucion" id="id_institucion" value="{{ $institucion->id }}">
    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion"
        value="{{ $institucion->id_lugar_atencion }}">
    <input type="hidden" name="id_contrato" id="id_contrato" value="">
@endsection

@include('app.contabilidad.modals.liquidacion')
@include('app.adm_cm.amodales_nuevos.liquidacion_profesionales_bak')
@include('app.adm_cm.modal_adm.contacto_usuario')

<script type="text/javascript">
    function liquidacion() {
        $('#liquidacion').modal('show');
    }

    function datoscuenta() {
        $('#datoscuenta').modal('show');
    }

    function liquidacionot(id, id_contrato) {
        $('#id_profesional').val(id);
        $('#id_contrato').val(id_contrato);
        let url = "{{ ROUTE('adm_cm.liquidacion_profesional') }}";
        let data = {
            id: id,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type: 'post',
            data: data,
            url: url,
            success: function(resp) {
                console.log(resp);
                let profesional = resp.profesional;
                let liquidaciones = resp.liquidaciones;
                $('#rut_prof').val(profesional.rut);
                $('#tbody_liquidaciones_profesional').empty();
                liquidaciones.forEach(liquidacion => {
                    $('#tbody_liquidaciones_profesional').append(`
                        <tr>
                            <td>` + liquidacion.fecha + ` </td>
                            <td></td>
                            <td>` + liquidacion.numero_atenciones + `</td>
                            <td>` + liquidacion.porcentaje + `</td>
                            <td>` + liquidacion.descuentos + `</td>
                            <td>` + liquidacion.total +
                        `</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" onclick="generar_pdf_liquidacion(` +
                        liquidacion.id + `)">PDF </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_liquidacion(` +
                        liquidacion.id + `)"><i class="fas fa-trash"> </i> </button>
                            </td>
                        </tr>
                        `);
                });
                $('#liquidacion').modal('show');
            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }

    function liquidar(id, id_contrato) {
        let url = "{{ route('laboratorio.profesional_buscar', ['id_profesional' => '__id__']) }}";
        url = url.replace('__id__', id);
        $('#id_profesional').val(id);
        $.ajax({
                url: url,
                type: "get",
            })
            .done(function(data) {
                console.log(data);
                let options1 = { style: 'currency', currency: 'CLP' };
                let numberFormat1 = new Intl.NumberFormat('es-CL', options1);
                if (data.estado == 1) {
                    /** encontrado */
                    // abrir nuevo modal de liquidacion a profesional
                    $('#liquidar_prof').modal('show');
                    $('#nombre_profesional_liquidacion').html(data.registro.nombre + ' ' + data.registro
                        .apellido_uno + ' ' + data.registro.apellido_dos);
                    let convenios = data.convenios;
                    let cuentas = data.cuentas;
                    console.log(cuentas);
                    $('#convenios_profesional_liquidacion').empty();
                    $('#valor_profesional_liquidacion').empty();
                    $('#tipo_atencion_liquidacion').empty();
                    $('#contenedor_cuentas_bancarias_profesional').empty();
                    convenios.forEach((c) => {
                        $('#convenios_profesional_liquidacion').append(c.convenios);
                        $('#valor_profesional_liquidacion').append(numberFormat1.format(c.valor));
                        $('#tipo_atencion_liquidacion').append(c.tipo_atencion);
                    });
                    cuentas.forEach((cuenta) => {
                        $('#contenedor_cuentas_bancarias_profesional').append(
                            `<div class="col-md-6">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-start">
                                        <div>
                                            <h5 class="card-title">`+cuenta.banco.nombre+`</h5>
                                            <p class="card-text">`+cuenta.numero_control+`</p>
                                            <p class="card-text">`+cuenta.otro+`</p>
                                        </div>

                                        <a href="#" class="btn btn-primary" onclick="seleccionar_cuenta(`+cuenta.banco.id+`,`+cuenta.numero_control+`)">Seleccionar</a>
                                    </div>
                                </div>
                            </div>
                            `
                        );
                    });

                } else {
                    /** no encontrado */
                    swal({
                        title: "Problema al cargar informacion del Profesional.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    }

    function seleccionar_cuenta(id_banco, numero_cuenta){
        $('#banco_nuevo_profesional_convenio').val(id_banco);
        $('#n_cta_nuevo_profesional_convenio').val(numero_cuenta);
    }

    function datoscuentaot() {
        $('#datoscuentaot').modal('show');
    }

    function contactoc() {
        $('#contacto').modal('show');
    }

    function editar_datosprofesional() {
        $('#editar_profesional').modal('show');
    }

    function contacto(id) {
        let url = "{{ route('laboratorio.profesional_buscar', ['id_profesional' => '__id__']) }}";
        url = url.replace('__id__', id);

        $.ajax({
                url: url,
                type: "get",
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1) {
                    /** encontrado */
                    $('#contacto_prof_rut').html(data.registro.rut);
                    $('#contacto_prof_email').html(data.registro.email);
                    $('#contacto_prof_telefono1').html(data.registro.telefono_uno);
                    $('#contacto_prof_telefono2').html(data.registro.telefono_dos);
                    $('#contacto_prof_direccion').html(data.direccion);
                    $('#contacto_usuario').modal('show');
                } else {
                    /** no encontrado */
                    swal({
                        title: "Problema al cargar informacion del Profesional.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    }

    function generar_pdf_liquidacion_reporte(id_profesional){
        swal({
                title: 'Generar PDF de liquidación',
                text: '¿Está seguro que desea generar la liquidación',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                DangerMode: true
            })
            .then((willDelete) => {
                if (willDelete) {
                    confirmar_generar_pdf_liquidacion_reporte(id_profesional);
                }
            })
    }

    function confirmar_generar_pdf_liquidacion_reporte(id_profesional) {

        let id_institucion = $('#id_institucion').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let url = "{{ route('adm_cm.generar_pdf_liquidacion') }}";

        let data = {
            id_profesional: id_profesional,
            id_institucion: id_institucion,
            id_lugar_atencion: id_lugar_atencion,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url:url,
            data: data,
            success: function(data){
                console.log(data);
                if(data == 'error'){
                    swal({
                        title:'Error',
                        text:'Primero debe generar la liquidación.',
                        icon:'error',
                        button:"Aceptar"
                    });
                    return false;
                }
                if(data.ruta){
                    swal({
                        title: "Reporte generado",
                        text: "El reporte se ha generado correctamente",
                        icon: "success",
                        button: "Aceptar"
                    }).then(() => {
                        // Abrir el PDF en una ventana emergente
                        var width = 800;
                        var height = 600;
                        var left = (screen.width - width) / 2;
                        var top = (screen.height - height) / 2;
                        window.open(data.ruta, 'Reporte Diario', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                    });
                }else{
                    swal({
                        title: "Error",
                        text: "Ha ocurrido un error al generar el reporte",
                        icon: "error",
                        button: "Aceptar"
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

    function generar_pdf_liquidacion() {
        swal({
                title: 'Generar PDF de liquidación',
                text: '¿Está seguro que desea generar la liquidación',
                icon: 'warning',
                buttons: ['Cancelar', 'Aceptar'],
                DangerMode: true
            })
            .then((willDelete) => {
                if (willDelete) {
                    confirmar_generar_pdf_liquidacion();
                }
            })
    }

    function confirmar_generar_pdf_liquidacion() {

        let id_profesional = $('#id_profesional').val();
        let id_institucion = $('#id_institucion').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let url = "{{ route('adm_cm.generar_pdf_liquidacion') }}";

        let data = {
            id_profesional: id_profesional,
            id_institucion: id_institucion,
            id_lugar_atencion: id_lugar_atencion,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url:url,
            data: data,
            success: function(data){
                console.log(data);
                if(data == 'error'){
                    swal({
                        title:'Error',
                        text:'Primero debe generar la liquidación.',
                        icon:'error',
                        button:"Aceptar"
                    });
                    return false;
                }
                if(data.ruta){
                    swal({
                        title: "Reporte generado",
                        text: "El reporte se ha generado correctamente",
                        icon: "success",
                        button: "Aceptar"
                    }).then(() => {
                        // Abrir el PDF en una ventana emergente
                        var width = 800;
                        var height = 600;
                        var left = (screen.width - width) / 2;
                        var top = (screen.height - height) / 2;
                        window.open(data.ruta, 'Reporte Diario', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                    });
                }else{
                    swal({
                        title: "Error",
                        text: "Ha ocurrido un error al generar el reporte",
                        icon: "error",
                        button: "Aceptar"
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

    function eliminar_liquidacion(id) {
        swal({
                title: "Eliminar Liquidacion",
                text: "¿Está seguro que desea eliminar la liquidacion?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    confirmar_eliminar_liquidacion(id);
                }
            });
    }

    function confirmar_eliminar_liquidacion(id) {
        let url = "{{ ROUTE('adm_cm.eliminar_liquidacion_profesional') }}";
        let data = {
            id: id,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type: 'post',
            data: data,
            url: url,
            success: function(resp) {
                console.log(resp);
                if (resp.estado == 'OK') {
                    swal({
                        title: 'Exito',
                        text: resp.mensaje,
                        icon: 'success'
                    });
                } else {
                    swal({
                        title: 'error',
                        text: resp.mensaje,
                        icon: 'error'
                    });
                }
            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }

    function buscar_liquidaciones(){
        swal({
            title:'info',
            text:'en construccion',
            icon:'info'
        });
    }
</script>
