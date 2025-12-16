<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="exam_odurg_ped">
            <button
                class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed"
                type="button" data-toggle="collapse" data-target="#exam_odurg_ped_c"
                aria-expanded="false" aria-controls="exam_odurg_ped_c">
                Urgencia Odontológica
            </button>
        </div>
        <div id="exam_odurg_ped_c" class="collapse" aria-labelledby="exam_odurg_ped"
            data-parent="#exam_odurg_ped">
            <div class="card-body-aten-a shadow-none">
                <div id="form-od-ped">

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="urg_adulto">
                                <!--DOLOR URGENCIA-->
                                <div class="tab-pane fade show active"
                                    id="examen_od_urg_general" role="tabpanel"
                                    aria-labelledby="examen_od_urg_general-tab">
                                    <div class="form-row mt-4">
                                        <div class="col-sm-2">
                                            <div class="nav flex-column nav-pills mb-3"
                                                id="v-pills-tab" role="tablist"
                                                aria-orientation="vertical">
                                                <a class="nav-link-aten text-reset backdrop:active"
                                                    id="mot_urgencia_tab"
                                                    data-toggle="tab" href="#mot_urgencia"
                                                    role="tab"
                                                    aria-controls="mot_urgencia"
                                                    aria-selected="false" onclick="$('#motivo_urg_odped').select2();">Motivo
                                                    consulta</a>
                                                @if($profesional->id_tipo_especialidad != 19)
                                                <a class="nav-link-aten text-reset "
                                                    id="eval_urg_ad_tab" data-toggle="tab"
                                                    href="#eval_urg_ad" role="tab"
                                                    aria-controls="eval_urg_ad"
                                                    aria-selected="true"
                                                    onclick="$('#paciente_piezas_dentales_urg').select2(); $('#table_piezas_odonto_urg').DataTable(); $('#table_insumos_urg').DataTable();">Eval.
                                                    Diagnóstica Adulto</a>
                                                    @endif
                                                <a class="nav-link-aten text-reset"
                                                    id="eval_urg_ped_tab"
                                                    data-toggle="tab" href="#eval_urg_ped"
                                                    role="tab"
                                                    aria-controls="eval_urg_ped"
                                                    aria-selected="false" onclick="$('#paciente_piezas_dentales_ex_odped_urg').select2(); $('#table_piezas_odonto_urg_ped').DataTable();">Eval. Diagnóstico
                                                    pediátrica</a>
                                                <a class="nav-link-aten text-reset"
                                                    id="ind_urgencia_tab"
                                                    data-toggle="tab" onclick="proxima_atencion_paciente()" href="#ind_urgencia"
                                                    role="tab"
                                                    aria-controls="ind_urgencia"
                                                    aria-selected="false">Indicaciones</a>
                                                <a class="nav-link-aten text-reset" id="presup_urgencia_tab" data-toggle="tab" href="#presup_urgencia" role="tab" aria-controls="presup_urgencia"
                                                    aria-selected="false" onclick="$('#presup_estado_pago_urg').DataTable(); $('#presup_estado_pago_gral_urg').DataTable();actualizar_presupuesto_urgencia()">Presupuesto Urgencia</a>
                                                {{--  <a class="nav-link-aten text-reset" id="fotos_oped_tab" data-toggle="tab" href="#fotos_oped" role="tab" aria-controls="fotos_oped" aria-selected="false">Fotos</a>  --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-10 ">
                                            <div class="tab-content"
                                                id="v-pills-tabContent">
                                                <div class="tab-pane fade show active"
                                                    id="mot_urgencia" role="tabpanel"
                                                    aria-labelledby="mot_urgencia_tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div
                                                                class="col-sm-10 col-md-3 col-lg-3 col-xl-3 ">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="floating-label-activo-sm">Derivado
                                                                        por:</label>
                                                                    <select
                                                                        name="derivado_por_odontop"
                                                                        id="derivado_por_odontop"
                                                                        class="form-control form-control-sm"
                                                                        onchange="evaluar_para_carga_detalle('derivado_por_odontop','div_derivado_por_odontop','obs_derivado_por_odontop',3);">
                                                                        <option
                                                                            value="1">
                                                                            Consulta
                                                                            espontánea
                                                                        </option>
                                                                        <option
                                                                            value="2">
                                                                            Servicio de
                                                                            urgencia
                                                                        </option>
                                                                        <option
                                                                            value="3">
                                                                            Otro Profesional
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group"
                                                                    id="div_derivado_por_odontop"
                                                                    style="display:none;">
                                                                    <label
                                                                        class="floating-label-activo-sm">Nombre
                                                                        otro
                                                                        profesional</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                        name="obs_derivado_por_odontop" id="obs_derivado_por_odontop"></textarea>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                                                <label
                                                                    class="floating-label-activo-sm"
                                                                    for="Motivo de la Urgencia">Motivo
                                                                    de la Urgencia</label>
                                                                <select
                                                                    class="js-example-basic-multiple select2"
                                                                    name="motivo_urg_odped"
                                                                    id="motivo_urg_odped"
                                                                    multiple="multiple">
                                                                    <option value="Dolor">
                                                                        Dolor</option>
                                                                    <option value="Edema">
                                                                        Edema</option>
                                                                    <option value="compromiso estado">
                                                                        compromiso estado
                                                                        general</option>
                                                                    <option value="Accidente Bucal">
                                                                        Accidente Bucal
                                                                    </option>
                                                                    <option value="Accidente con compromiso bucal">
                                                                        Accidente con
                                                                        compromiso bucal
                                                                    </option>
                                                                    <option value="Otro">
                                                                        Otro
                                                                        motivo(Observaciones)
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div
                                                                class="col-sm-10 col-md-3 col-lg-3 col-xl-3">
                                                                <label
                                                                    class="floating-label-activo-sm">Observaciones
                                                                    motivo consulta</label>
                                                                <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=5" onblur="this.rows=2;"
                                                                    name="obs_motivo_urg" id="obs_motivo_urg"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show "
                                                    id="eval_urg_ad" role="tabpanel"
                                                    aria-labelledby="eval_urg_ad_tab">

                                                    <div class="form-row">
                                                        <!--TABLA SELECCION DE PIEZAS O GRUPOS DE PIEZAS-->
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                            <div class="card-informacion">
                                                                <div class="card-top">
                                                                    <h6
                                                                        class="text-uppercase text-c-blue">
                                                                        Tratamientos en
                                                                        piezas o grupos</h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="form-row">
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div
                                                                                class="table-responsive">
                                                                                <table
                                                                                    id="table_piezas_odonto_urg"
                                                                                    class="display table table-striped dt-responsive nowrap table-sm dataTable no-footer dtr-inline w-100 mt-2">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Pieza ó Grupo</th>
                                                                                            <th>Tratamiento
                                                                                            </th>
                                                                                            <th>Valor
                                                                                            </th>
                                                                                            <th>Accion</th>
                                                                                            <th>Estado</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($odontograma as $o)
                                                                                            @if ($o->urgencia == 1)
                                                                                                <tr>
                                                                                                    <td>{{ $o->pieza }}
                                                                                                    </td>
                                                                                                    <td>{{ $o->descripcion }}
                                                                                                    </td>
                                                                                                    <td>${{ number_format($o->valor, 0, ',', '.') }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma_urg({{ $o->id }})"><i class="feather icon-x"></i></button>
                                                                                                        <button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza_urg({{$o->id}})"><i class="feather icon-repeat"></i> </button>
                                                                                                    </td>
                                                                                                    @php
                                                                                                        if($o->estado == 0){
                                                                                                            $estado = "PENDIENTE";
                                                                                                        }else if($o->estado == 1){
                                                                                                            $estado = "FINALIZADO";
                                                                                                        }else if($o->estado == 2){
                                                                                                            $estado = "EN PROCESO";
                                                                                                        }else if($o->estado == 3){
                                                                                                            $estado = "CITADO A CONTROL";
                                                                                                        }else{
                                                                                                            $estado = "";
                                                                                                        }

                                                                                                    @endphp
                                                                                                    <td>{{$estado}} </td>
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
                                                    <div class="form-row mt-2">
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h6 class="tit-gen">
                                                                Planificación del
                                                                tratamiento</h6>
                                                        </div>
                                                    </div>


                                                    <div class="form-row">
                                                        <!--SELECCION DE PIEZAS O GRUPOS DE PIEZAS-->
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                            <div class="card-informacion">
                                                                <div class="card-top">
                                                                    <h6
                                                                        class="text-uppercase text-c-blue">
                                                                        Seleccione por pieza
                                                                        o grupo de piezas
                                                                    </h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row my-2">
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div
                                                                                class="custom-control custom-switch">
                                                                                <input
                                                                                    type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="max_sup_urg"
                                                                                    onclick="seleccionar_maxilar_superior_urg()">
                                                                                <label
                                                                                    class="custom-control-label"
                                                                                    for="max_sup_urg">Seleccione
                                                                                    maxilar
                                                                                    superior</label>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div
                                                                                class="custom-control custom-switch">
                                                                                <input
                                                                                    type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="max_inf_urg"
                                                                                    onclick="seleccionar_maxilar_inferior_urg()">
                                                                                <label
                                                                                    class="custom-control-label"
                                                                                    for="max_inf_urg">Seleccione
                                                                                    maxilar
                                                                                    inferior</label>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div
                                                                                class="custom-control custom-switch">
                                                                                <input
                                                                                    type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="piezas_presup_urg"
                                                                                    onclick="seleccionar_piezas_urg()">
                                                                                <label
                                                                                    class="custom-control-label"
                                                                                    for="piezas_presup_urg">Piezas
                                                                                    Urgencia</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-8 col-xxl-8">
                                                                            @include('atencion_odontologica.generales.odontograma_adulto_grupos_urg')
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-4 mt-2">
                                                                            <div
                                                                                class="form-row">
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div
                                                                                        class="form-group">
                                                                                        <label
                                                                                            for=""
                                                                                            class="floating-label-activo-sm">Grupos</label>
                                                                                        <select
                                                                                            class="js-example-basic-multiple"
                                                                                            name="paciente_piezas_dentales_urg"
                                                                                            id="paciente_piezas_dentales_urg"
                                                                                            multiple="multiple">
                                                                                            <option
                                                                                                value="1.1">
                                                                                                1.1
                                                                                            </option>
                                                                                            <option
                                                                                                value="1.2">
                                                                                                1.2
                                                                                            </option>
                                                                                            <option
                                                                                                value="1.3">
                                                                                                1.3
                                                                                            </option>
                                                                                            <option
                                                                                                value="1.4">
                                                                                                1.4
                                                                                            </option>
                                                                                            <option
                                                                                                value="1.5">
                                                                                                1.5
                                                                                            </option>
                                                                                            <option
                                                                                                value="1.6">
                                                                                                1.6
                                                                                            </option>
                                                                                            <option
                                                                                                value="1.7">
                                                                                                1.7
                                                                                            </option>
                                                                                            <option
                                                                                                value="1.8">
                                                                                                1.8
                                                                                            </option>
                                                                                            <option
                                                                                                value="2.1">
                                                                                                2.1
                                                                                            </option>
                                                                                            <option
                                                                                                value="2.2">
                                                                                                2.2
                                                                                            </option>
                                                                                            <option
                                                                                                value="2.3">
                                                                                                2.3
                                                                                            </option>
                                                                                            <option
                                                                                                value="2.4">
                                                                                                2.4
                                                                                            </option>
                                                                                            <option
                                                                                                value="2.5">
                                                                                                2.5
                                                                                            </option>
                                                                                            <option
                                                                                                value="2.6">
                                                                                                2.6
                                                                                            </option>
                                                                                            <option
                                                                                                value="2.7">
                                                                                                2.7
                                                                                            </option>
                                                                                            <option
                                                                                                value="2.8">
                                                                                                2.8
                                                                                            </option>
                                                                                            <option
                                                                                                value="3.1">
                                                                                                3.1
                                                                                            </option>
                                                                                            <option
                                                                                                value="3.2">
                                                                                                3.2
                                                                                            </option>
                                                                                            <option
                                                                                                value="3.3">
                                                                                                3.3
                                                                                            </option>
                                                                                            <option
                                                                                                value="3.4">
                                                                                                3.4
                                                                                            </option>
                                                                                            <option
                                                                                                value="3.5">
                                                                                                3.5
                                                                                            </option>
                                                                                            <option
                                                                                                value="3.6">
                                                                                                3.6
                                                                                            </option>
                                                                                            <option
                                                                                                value="3.7">
                                                                                                3.7
                                                                                            </option>
                                                                                            <option
                                                                                                value="3.8">
                                                                                                3.8
                                                                                            </option>
                                                                                            <option
                                                                                                value="4.1">
                                                                                                4.1
                                                                                            </option>
                                                                                            <option
                                                                                                value="4.2">
                                                                                                4.2
                                                                                            </option>
                                                                                            <option
                                                                                                value="4.3">
                                                                                                4.3
                                                                                            </option>
                                                                                            <option
                                                                                                value="4.4">
                                                                                                4.4
                                                                                            </option>
                                                                                            <option
                                                                                                value="4.5">
                                                                                                4.5
                                                                                            </option>
                                                                                            <option
                                                                                                value="4.6">
                                                                                                4.6
                                                                                            </option>
                                                                                            <option
                                                                                                value="4.7">
                                                                                                4.7
                                                                                            </option>
                                                                                            <option
                                                                                                value="4.8">
                                                                                                4.8
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div
                                                                                        class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm">Tratamiento</label>
                                                                                        <input
                                                                                            type="text"
                                                                                            name="diag_presupuesto_pieza_g_urg"
                                                                                            id="diag_presupuesto_pieza_g_urg"
                                                                                            placeholder="DESCRIBA EL TRATAMIENTO POR PIEZA O GRUPO DE PIEZAS"
                                                                                            class="form-control form-control-sm tratamiento-urg-autocomplete ui-autocomplete-input"
                                                                                            autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <button
                                                                                        type="button"
                                                                                        class="btn btn-primary btn-sm btn-block"
                                                                                        onclick="cargar_a_presupuesto_urg()"><i
                                                                                            class="feather icon-save"></i>
                                                                                        Guardar
                                                                                        piezas</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--TABLA SELECCION DE PIEZAS O GRUPOS DE PIEZAS-->

                                                        <!--TABLA INSUMOS-->
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                            <div class="card-informacion">
                                                                <div class="card-top">
                                                                    <h6
                                                                        class="text-uppercase text-c-blue d-inline">
                                                                        Insumos</h6>
                                                                    <button type="button"
                                                                        class="btn btn-info btn-xxs float-md-right d-inline d-inline"
                                                                        onclick="abrir_modal_insumos_urg()"><i
                                                                            class="fas fa-plus"></i>
                                                                        Agregar
                                                                        Insumos/Urgencia</button>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="form-row">
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div
                                                                                class="table-responsive">
                                                                                <table
                                                                                    id="table_insumos_urg"
                                                                                    class="display table table-striped dt-responsive nowrap table-sm dataTable no-footer dtr-inline w-100 mt-2">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <td>Insumo
                                                                                            </td>
                                                                                            <td>Observaciones
                                                                                            </td>
                                                                                            <td>Cantidad
                                                                                            </td>
                                                                                            <td>Valor
                                                                                            </td>
                                                                                            <td>Total
                                                                                            </td>
                                                                                            <td>Acciones
                                                                                            </td>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @if (isset($insumos_tratamientos))
                                                                                            @foreach ($insumos_tratamientos as $t)
                                                                                                @php $total = $t->cantidad * $t->valor @endphp
                                                                                                @if ($t->urgencia == 0)
                                                                                                    @continue
                                                                                                @endif
                                                                                                <tr>
                                                                                                    <td>{{ $t->insumos }}
                                                                                                        {{ $t->nombre_marca }}
                                                                                                    </td>
                                                                                                    <td>{{ $t->observaciones }}
                                                                                                    </td>
                                                                                                    <td>{{ $t->cantidad }}
                                                                                                    </td>
                                                                                                    <td>{{ number_format($t->valor) }}
                                                                                                    </td>
                                                                                                    <td>{{ number_format($total) }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        @if ($t->presupuesto == 0 || $t->presupuesto == null)
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="btn btn-icon btn-primary"
                                                                                                                onclick="cargar_a_presupuesto_insumo({{ $t->id }}, 'urg')"><i
                                                                                                                    class="feather icon-shopping-cart"></i></button>
                                                                                                        @else
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="btn btn-icon btn-danger"
                                                                                                                onclick="sacar_de_presupuesto_insumo({{ $t->id }}, 'urg')"><i
                                                                                                                    class="fas fa-minus"></i></button>
                                                                                                        @endif
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-icon btn-warning"
                                                                                                            onclick="dame_insumo({{ $t->id }}, 'urg')"><i
                                                                                                                class="feather icon-edit"></i></button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-icon btn-danger"
                                                                                                            onclick="eliminar_insumo({{ $t->id }}, 'urg')"><i
                                                                                                                class="feather icon-x"></i></button>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="form-row mt-2">
                                                                        <div
                                                                            class="col-12 d-flex justify-content-end">
                                                                            <button
                                                                                type="button"
                                                                                class="btn btn-success btn-xxs"
                                                                                onclick="abrirModalCorreo()"><i
                                                                                    class="fas fa-email"></i>
                                                                                Enviar por
                                                                                correo</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show " id="eval_urg_ped" role="tabpanel" aria-labelledby="eval_urg_ped_tab">

                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="card-informacion">
                                                                <div class="card-top">
                                                                    <h6 class="text-uppercase text-c-blue">Tratamientos en piezas o grupos</h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div
                                                                        class="table-responsive">
                                                                        <table
                                                                            id="table_piezas_odonto_urg_ped"
                                                                            class="display table table-striped dt-responsive nowrap table-sm dataTable no-footer dtr-inline w-100 mt-2">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Pieza ó Grupo</th>
                                                                                    <th>Tratamiento
                                                                                    </th>
                                                                                    <th>Valor
                                                                                    </th>
                                                                                    <th>Accion</th>
                                                                                    <th>Estado</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($odontograma as $o)
                                                                                    @if ($o->urgencia == 1)
                                                                                        <tr>
                                                                                            <td>{{ $o->pieza }}
                                                                                            </td>
                                                                                            <td>{{ $o->descripcion }}
                                                                                            </td>
                                                                                            <td>${{ number_format($o->valor, 0, ',', '.') }}
                                                                                            </td>
                                                                                            <td>
                                                                                                <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma_urg({{ $o->id }})"><i class="feather icon-x"></i></button>
                                                                                                <button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza_urg({{$o->id}})"><i class="feather icon-repeat"></i> </button>
                                                                                            </td>
                                                                                            @php
                                                                                                if($o->estado == 0){
                                                                                                    $estado = "PENDIENTE";
                                                                                                }else if($o->estado == 1){
                                                                                                    $estado = "FINALIZADO";
                                                                                                }else if($o->estado == 2){
                                                                                                    $estado = "EN PROCESO";
                                                                                                }else if($o->estado == 3){
                                                                                                    $estado = "CITADO A CONTROL";
                                                                                                }else{
                                                                                                    $estado = "";
                                                                                                }

                                                                                            @endphp
                                                                                            <td>{{$estado}} </td>
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
                                                    <!--PEGAR EVAL CON ODONTOGRAMA PEDIATRICO(PLANIF DE TRATAMIENTO)-->
                                                    <div class="form-row">
                                                        <!--SELECCION DE PIEZAS O GRUPOS DE PIEZAS-->
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                            <div class="card-informacion">
                                                                <div class="card-top">
                                                                    <h6
                                                                        class="text-uppercase text-c-blue">
                                                                        Seleccione por pieza
                                                                        o grupo de piezas
                                                                    </h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row my-2">
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div
                                                                                class="custom-control custom-switch">
                                                                                <input
                                                                                    type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="max_sup_odped_urg"
                                                                                    onclick="seleccionar_maxilar_superior_odped_urg()">
                                                                                <label
                                                                                    class="custom-control-label"
                                                                                    for="max_sup_odped_urg">Seleccione
                                                                                    maxilar
                                                                                    superior</label>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div
                                                                                class="custom-control custom-switch">
                                                                                <input
                                                                                    type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="max_inf_odped_urg"
                                                                                    onclick="seleccionar_maxilar_inferior_odped_urg()">
                                                                                <label
                                                                                    class="custom-control-label"
                                                                                    for="max_inf_odped_urg">Seleccione
                                                                                    maxilar
                                                                                    inferior</label>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div
                                                                                class="custom-control custom-switch">
                                                                                <input
                                                                                    type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="piezas_presup_odped_urg"
                                                                                    onclick="seleccionar_piezas_odped_urg()"
                                                                                    checked>
                                                                                <label
                                                                                    class="custom-control-label"
                                                                                    for="piezas_presup_odped_urg">Piezas urgencia</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-8 col-xxl-8">
                                                                            @include('atencion_odontologica.generales.odontograma_ped_grupos_odped_urg')
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-4 mt-2">
                                                                            <div
                                                                                class="form-row">
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div
                                                                                        class="form-group">
                                                                                        <label
                                                                                            for=""
                                                                                            class="floating-label-activo-sm">Grupos</label>
                                                                                        <select
                                                                                            class="js-example-basic-multiple"
                                                                                            name="paciente_piezas_dentales_ex_odped_urg"
                                                                                            id="paciente_piezas_dentales_ex_odped_urg"
                                                                                            multiple="multiple">
                                                                                            <option
                                                                                                value="5.1">
                                                                                                5.1
                                                                                            </option>
                                                                                            <option
                                                                                                value="5.2">
                                                                                                5.2
                                                                                            </option>
                                                                                            <option
                                                                                                value="5.3">
                                                                                                5.3
                                                                                            </option>
                                                                                            <option
                                                                                                value="5.4">
                                                                                                5.4
                                                                                            </option>
                                                                                            <option
                                                                                                value="5.5">
                                                                                                5.5
                                                                                            </option>
                                                                                            <option
                                                                                                value="6.1">
                                                                                                6.1
                                                                                            </option>
                                                                                            <option
                                                                                                value="6.2">
                                                                                                6.2
                                                                                            </option>
                                                                                            <option
                                                                                                value="6.3">
                                                                                                6.3
                                                                                            </option>
                                                                                            <option
                                                                                                value="6.4">
                                                                                                6.4
                                                                                            </option>
                                                                                            <option
                                                                                                value="6.5">
                                                                                                6.5
                                                                                            </option>
                                                                                            <option
                                                                                                value="8.5">
                                                                                                8.5
                                                                                            </option>
                                                                                            <option
                                                                                                value="8.4">
                                                                                                8.4
                                                                                            </option>
                                                                                            <option
                                                                                                value="8.3">
                                                                                                8.3
                                                                                            </option>
                                                                                            <option
                                                                                                value="8.2">
                                                                                                8.2
                                                                                            </option>
                                                                                            <option
                                                                                                value="8.1">
                                                                                                8.1
                                                                                            </option>
                                                                                            <option
                                                                                                value="7.1">
                                                                                                7.1
                                                                                            </option>
                                                                                            <option
                                                                                                value="7.2">
                                                                                                7.2
                                                                                            </option>
                                                                                            <option
                                                                                                value="7.3">
                                                                                                7.3
                                                                                            </option>
                                                                                            <option
                                                                                                value="7.4">
                                                                                                7.4
                                                                                            </option>
                                                                                            <option
                                                                                                value="7.5">
                                                                                                7.5
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Diagnostico</label>
                                                                                        <select class="form-control form-control-sm" name="diag_presupuesto_diagnostico_odped_urg" id="diag_presupuesto_diagnostico_odped_urg">
                                                                                            <option value="">SELECCIONE DIAGNOSTICO</option>
                                                                                            @foreach ($diagnosticos as $d)
                                                                                                <option
                                                                                                    value="{{ $d->id }}">
                                                                                                    {{ $d->descripcion }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div
                                                                                        class="form-group">
                                                                                        <label
                                                                                            class="floating-label-activo-sm">Tratamiento</label>
                                                                                        <input
                                                                                            type="text"
                                                                                            name="diag_presupuesto_pieza_g_odped_urg"
                                                                                            id="diag_presupuesto_pieza_g_odped_urg"
                                                                                            placeholder="DESCRIBA EL TRATAMIENTO POR PIEZA O GRUPO DE PIEZAS"
                                                                                            class="form-control form-control-sm tratamiento-urg-autocomplete ui-autocomplete-input"
                                                                                            autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <button
                                                                                        type="button"
                                                                                        class="btn btn-primary btn-sm btn-block"
                                                                                        onclick="cargar_a_presupuesto_odped_g_urg()"><i
                                                                                            class="feather icon-save"></i>
                                                                                        Guardar
                                                                                        piezas</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--TABLA SELECCION DE PIEZAS O GRUPOS DE PIEZAS-->

                                                        <!--TABLA INSUMOS-->
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                            <div class="card-informacion">
                                                                <div class="card-top">
                                                                    <h6
                                                                        class="text-uppercase text-c-blue d-inline">
                                                                        Insumos</h6>
                                                                    <button type="button"
                                                                        class="btn btn-info btn-xxs float-md-right d-inline d-inline"
                                                                        onclick="abrir_modal_insumos_urg()"><i
                                                                            class="fas fa-plus"></i>
                                                                        Agregar
                                                                        Insumos</button>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="form-row">
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div
                                                                                class="table-responsive">
                                                                                <table
                                                                                    id="table_insumos_odped_urg"
                                                                                    class="display table table-striped dt-responsive nowrap table-sm dataTable no-footer dtr-inline w-100 mt-2">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <td>Insumo
                                                                                            </td>
                                                                                            <td>Observaciones
                                                                                            </td>
                                                                                            <td>Cantidad
                                                                                            </td>
                                                                                            <td>Valor
                                                                                            </td>
                                                                                            <td>Total
                                                                                            </td>
                                                                                            <td>Acciones
                                                                                            </td>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($insumos_tratamientos as $t)
                                                                                        @if($t->urgencia == 1)
                                                                                            @php $total = $t->cantidad * $t->valor @endphp
                                                                                            <tr>
                                                                                                <td>{{ $t->insumos }}
                                                                                                    {{ $t->nombre_marca }}
                                                                                                </td>
                                                                                                <td>{{ $t->observaciones }}
                                                                                                </td>
                                                                                                <td>{{ $t->cantidad }}
                                                                                                </td>
                                                                                                <td>{{ number_format($t->valor) }}
                                                                                                </td>
                                                                                                <td>{{ number_format($total) }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    @if ($t->presupuesto == 0 || $t->presupuesto == null)
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-icon btn-primary"
                                                                                                            onclick="cargar_a_presupuesto_insumo({{ $t->id }})"><i
                                                                                                                class="feather icon-shopping-cart"></i></button>
                                                                                                    @else
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-icon btn-danger"
                                                                                                            onclick="sacar_de_presupuesto_insumo({{ $t->id }})"><i
                                                                                                                class="fas fa-minus"></i></button>
                                                                                                    @endif
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        class="btn btn-icon btn-warning"
                                                                                                        onclick="dame_insumo({{ $t->id }})"><i
                                                                                                            class="feather icon-edit"></i></button>
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        class="btn btn-icon btn-danger"
                                                                                                        onclick="eliminar_insumo({{ $t->id }})"><i
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
                                                                    <div
                                                                        class="form-row mt-2">
                                                                        <div
                                                                            class="col-12 d-flex justify-content-end">
                                                                            <button
                                                                                type="button"
                                                                                class="btn btn-success btn-xxs"
                                                                                onclick="abrirModalCorreo()"><i
                                                                                    class="fas fa-email"></i>
                                                                                Enviar por
                                                                                correo</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show "
                                                    id="ind_urgencia" role="tabpanel"
                                                    aria-labelledby="ind_urgencia_tab">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-row">
                                                            <div
                                                                class="col-sm-10 col-md-6 col-lg-6 col-xl-6 ">
                                                                <div class="form-group">
                                                                    <label
                                                                        class="floating-label-activo-sm"
                                                                        for="est_ct_prisma">Medidas
                                                                        especiales</label>
                                                                    <select
                                                                        class="form-control form-control-sm"
                                                                        id="me_urg_odped"
                                                                        name="me_urg_odped"
                                                                        onchange="evaluar_para_carga_detalle('me_urg_odped','div_me_urg_odped','obs_me_urg_odped',6);">>
                                                                        <option
                                                                            value="0">
                                                                            Seleccione
                                                                        </option>
                                                                        <option
                                                                            value="1">
                                                                            Hospitalizar
                                                                        </option>
                                                                        <option
                                                                            value="2">
                                                                            Profilaxis
                                                                            Infección
                                                                            derivado a su
                                                                            casa</option>
                                                                        <option
                                                                            value="3">
                                                                            Antibiótico +
                                                                            analgesicos
                                                                            derivado a su
                                                                            casa</option>
                                                                        <option
                                                                            value="4">
                                                                            Examenes de
                                                                            sangre</option>
                                                                        <option
                                                                            value="5">
                                                                            Examenes
                                                                            Radiológicos
                                                                        </option>
                                                                        <option
                                                                            value="6">
                                                                            Derivado a otro
                                                                            especiaqlista
                                                                        </option>
                                                                        <option
                                                                            value="6">
                                                                            Otras
                                                                            medidas(describir)
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group"
                                                                    id="div_me_urg_odped"
                                                                    style="display:none;">
                                                                    <label
                                                                        class="floating-label-activo-sm"
                                                                        for="obs_me_urg_odped">Otras
                                                                        medidas<i>(describir)
                                                                            Tipo</i></label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                        name="obs_me_urg_odped" id="obs_me_urg_odped"></textarea>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-sm-10 col-md-6 col-lg-6 col-xl-6 ">
                                                                <div id="ind_urg"
                                                                    class="form-row">
                                                                    <div
                                                                        class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                        <div
                                                                            class="form-group">
                                                                            <button
                                                                                type="button"
                                                                                class="btn btn-outline-primary btn-block"
                                                                                onclick="hora_medica_pedir({{ $profesional->id }}, {{ $id_lugar_atencion }})"><i
                                                                                    class="feather icon-calendar"></i>
                                                                                Agendar
                                                                                hora</button>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mx-auto">
                                                                        <div class="card-informacion"
                                                                            style="border: 1px solid #6c9bd5;">
                                                                            <div
                                                                                class="card-top text-center">
                                                                                <h5
                                                                                    class="text-c-blue">
                                                                                    PRÓXIMO
                                                                                    CONTROL
                                                                                </h5>
                                                                            </div>
                                                                            <div
                                                                                class="card-body">
                                                                                <div
                                                                                    class="form-row">
                                                                                    <div
                                                                                        class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                                        <h5
                                                                                            class="text-c-blue">
                                                                                            <i
                                                                                                class="fas fa-calendar"></i>
                                                                                            Fecha:
                                                                                        </h5>
                                                                                        <h5
                                                                                            class="font-weight-bold">
                                                                                            <span id="proxima_fecha_atencion"> {{ isset($proxima_fecha_atencion) ? $proxima_fecha_atencion : '' }} </span>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                                        <h5
                                                                                            class="text-c-blue">
                                                                                            <i
                                                                                                class="fas fa-clock"></i>
                                                                                            Horario:
                                                                                        </h5>
                                                                                        <p id="proxima_hora_atencion"> <strong>{{ isset($hora_inicio_atencion) ? $hora_inicio_atencion : '--:--' }}</strong>
                                                                                            a
                                                                                            <strong>{{ isset($hora_fin_atencion) ? $hora_fin_atencion : '--:--' }}</strong>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-sm-12 col-md-612 col-lg-12 col-xl-12 mb-4 ">
                                                                <label
                                                                    class="floating-label-activo-sm"
                                                                    for="obs_me_urg_odped">Observaciones</i></label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                    name="obs_ind_urgencia" id="obs_ind_urgencia"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show" id="presup_urgencia" role="tabpanel"
                                                    aria-labelledby="presup_urgencia_tab">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h6 class="tit-gen">Abonos y estados de pago Urgencia</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                            <form>
                                                                {{-- <div class="form-row">
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
                                                                                            name="subtotal_presup_urg" id="subtotal_presup_urg"
                                                                                            value="{{ $presupuesto ? number_format($presupuesto->valor_total, 0, ',', '.') : '' }}">
                                                                                    </div>
                                                                                    <div class="form-group col-md-2">
                                                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                                                        <input type="text" class="form-control form-control-sm"
                                                                                            name="descuento_presup_urg" id="descuento_presup_urg">
                                                                                    </div>
                                                                                    <div class="form-group col-md-2">
                                                                                        <label class="floating-label-activo-sm">Total</label>
                                                                                        <input type="text" class="form-control form-control-sm"
                                                                                            name="total_presup_urg" id="total_presup_urg">
                                                                                    </div>
                                                                                    <div class="form-group col-md-2">
                                                                                        <label class="floating-label-activo-sm">Abonos</label>
                                                                                        <input type="text" class="form-control form-control-sm"
                                                                                            name="abonos_presup_urg" id="abonos_presup_urg"
                                                                                            value="{{ number_format($valor_abonado, 0, ',', '.') }}">
                                                                                    </div>
                                                                                    <div class="form-group col-md-2">
                                                                                        <button type="button" class="btn btn-info btn-block btn-sm"
                                                                                            onclick="pagar_presupuesto_urg();"><i
                                                                                                class="fa fa-plus"></i> Ingresar Abono</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
                                                                {{-- <div class="form-row">
                                                                    <div class="col-md-12">
                                                                        @foreach ($convenios_prevision as $c)
                                                                            @if ($paciente->prevision->nombre == $c->nombre_convenio)
                                                                                <p class="promo-banner font-weight-bold my-3">{{ $paciente->prevision->nombre }}
                                                                                    {{ $c->porcentaje }} % {{ $c->descripcion }}
                                                                                    <button type="button"
                                                                                        class="btn btn-info btn-sm btn-icon"
                                                                                        onclick="aplicar_convenio_tratamiento_urg({{ $c->id }})"><i
                                                                                            class="fas fa-check"></i></button>
                                                                                    <button type="button"
                                                                                        class="btn btn-light btn-sm btn-icon"
                                                                                        onclick="generar_pdf_urg()"><i
                                                                                            class="fas fa-print"></i></button>
                                                                                    <span id="mensaje" class="badge badge-success"></span>
                                                                                    <input type="hidden" name="tiene_dcto" id="tiene_dcto"
                                                                                        value="0">
                                                                                </p>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>

                                                                </div> --}}
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
                                                                                            <table id="presup_estado_pago_urg"
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
                                                                                                        @if ($o->urgencia == 1 )
                                                                                                            @php
                                                                                                                if($o->estado == 0){
                                                                                                                    $estado = "PENDIENTE";
                                                                                                                }else if($o->estado == 1){
                                                                                                                    $estado = "FINALIZADO";
                                                                                                                }else if($o->estado == 2){
                                                                                                                    $estado = "EN PROCESO";
                                                                                                                }else if($o->estado == 3){
                                                                                                                    $estado = "CITADO A CONTROL";
                                                                                                                }else{
                                                                                                                    $estado = "";
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
                                                                                            <table id="presup_estado_pago_gral_urg"
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
                                                                                                        @if ($o->urgencia == 1)
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
                                                                                        <table id="presup_insumos_pago_urg"
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
                                                                                                    @if ($t->urgencia == 1)
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
                                                                        <p id="valores_examenes_presupuesto_conf_urg">$0</p>
                                                                    </div>

                                                                    <!-- Total Piezas -->
                                                                    <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 my-2">
                                                                        <h5 class="mb-0 text-c-blue">Total Piezas</h5>
                                                                        <p id="valores_piezas_presupuesto_conf_urg"></p>
                                                                    </div>

                                                                    <!-- Insumos -->
                                                                    <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 my-2">
                                                                        <h5 class="mb-0 text-c-blue">Insumos</h5>
                                                                        <p id="valores_insumos_presupuesto_conf_urg"></p>
                                                                    </div>

                                                                    <!-- Descuentos -->
                                                                    <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 my-2">
                                                                        <h5 class="mb-0 text-c-blue">Descuentos</h5>
                                                                        <p id="valores_descuentos_presupuesto_conf_urg">$0.00</p>
                                                                    </div>

                                                                    <div
                                                                        class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 my-2 bg-naranjo  rounded-pill py-1 my-1">
                                                                        <h5 class="text-white">Total Final</h5>
                                                                        <p class="text-white" id="valores_total_final_presupuesto_conf_urg">$
                                                                            </p>
                                                                    </div>


                                                                    <div
                                                                        class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 my-2 bg-info rounded-pill py-1 my-1">
                                                                        <h5 class="text-white">Abonado</h5>
                                                                        <p class="text-white" id="valores_total_abonado_presupuesto_conf_urg"> $0
                                                                            </p>
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

                                                            <button type="button" class="btn btn-info text-center"
                                                                onclick="pagar_presupuesto_urg()"><i class="fas fa-plus"></i> Pagar</button>
                                                            <button type="button" class="btn btn-warning text-center"
                                                                onclick="finalizar_atencion_urg()"><i class="fas fa-plus"></i> Finalizar atención</button>
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
<!-- modalPagoUrgencia -->
<div id="modalPagoUrgencia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalPagoUrgenciaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPagoUrgenciaLabel">Pago de Urgencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div id="info_pagos_urgencia">
                            <!-- Resumen de Pagos -->
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="card border-success">
                                        <div class="card-body text-center p-3">
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <i class="feather icon-check-circle text-success mr-2" style="font-size: 1.5rem;"></i>
                                                <h6 class="card-title mb-0 text-success">Abonos</h6>
                                            </div>
                                            <h4 class="text-success mb-0" id="monto_abonado_urgencia">$0</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-info">
                                        <div class="card-body text-center p-3">
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <i class="feather icon-check-circle text-info mr-2" style="font-size: 1.5rem;"></i>
                                                <h6 class="card-title mb-0 text-info">Total Deuda</h6>
                                            </div>
                                            <h4 class="text-info mb-0" id="total_deuda_urgencia">$0</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-warning">
                                        <div class="card-body text-center p-3">
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <i class="feather icon-clock text-warning mr-2" style="font-size: 1.5rem;"></i>
                                                <h6 class="card-title mb-0 text-warning">Pendiente</h6>
                                            </div>
                                            <h4 class="text-warning mb-0" id="monto_pendiente_urgencia">$0</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Barra de Progreso -->
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted">Progreso de Pago</small>
                                    <small class="text-muted" id="porcentaje_pago_urgencia">0%</small>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%"
                                        id="barra_progreso_urgencia" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>

                            <!-- Tabla de Pagos Realizados -->
                            <div class="mt-4" id="seccion_pagos_realizados" style="display: none;">
                                <h6 class="text-muted mb-3">
                                    <i class="feather icon-list mr-2"></i>
                                    Historial de Pagos
                                </h6>
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover" id="tabla_pagos_urgencia">
                                        <thead class="thead-light">
                                            <tr class="text-center">
                                                <th>Fecha</th>
                                                <th>Monto</th>
                                                <th>Método</th>
                                                <th>Profesional</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody_pagos_urgencia">
                                            <!-- Los pagos se cargarán aquí dinámicamente -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <hr class="my-3">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="monto_pago_urgencia" class="floating-label-activo-sm">Monto a Pagar</label>
                            <input type="number" class="form-control form-control-sm" id="monto_pago_urgencia" name="monto_pago_urgencia">
                        </div>
                        <div class="form-group">
                            <label for="metodo_pago_urgencia" class="floating-label-activo-sm">Método de Pago</label>
                            <select class="form-control form-control-sm" id="metodo_pago_urgencia" name="metodo_pago_urgencia">
                                <option value="">Seleccione</option>
                                <option value="efectivo">Efectivo</option>
                                <option value="tarjeta">Tarjeta</option>
                            </select>
                        </div>
                    </div>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="procesarPagoUrgencia()">Procesar Pago</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- modal_cambio_estado_tto_urg -->
<div id="modal_cambio_estado_tto_urg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_cambio_estado_tto_urg" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="insumosModalLabel">Estado del tratamiento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
          </div>
          <div class="modal-body">

              <div class="form-group">
                <label for="estado_tto_urg" class="floating-label-activo-sm">Estado del tratamiento</label>
                <select class="form-control form-control-sm" id="estado_tto_urg" name="estado_tto_urg">
                  <option value="0">Pendiente</option>
                  <option value="3">Citado a control</option>
                  <option value="2">En proceso</option>
                  <option value="1">Finalizado</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label for="observaciones_tto_urg" class="floating-label-activo-sm">Observaciones</label>
                <textarea class="form-control form-control-sm" id="observaciones_tto_urg" name="observaciones_tto_urg" rows="3"></textarea>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" onclick="guardarCambiosTratamientoUrgencia()"><i class="fas fa-save"></i> Guardar cambios</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
    </div>
</div>
<!-- modal_cambio_estado_tto_urg -->
<div id="modal_cambio_estado_tto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_cambio_estado_tto_urg" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="insumosModalLabel">Estado del tratamiento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
          </div>
          <div class="modal-body">

              <div class="form-group">
                <label for="estado_tto" class="floating-label-activo-sm">Estado del tratamiento</label>
                <select class="form-control form-control-sm" id="estado_tto" name="estado_tto">
                  <option value="0">Pendiente</option>
                  <option value="3">Citado a control</option>
                  <option value="2">En proceso</option>
                  <option value="1">Finalizado</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label for="observaciones_tto" class="floating-label-activo-sm">Observaciones</label>
                <textarea class="form-control form-control-sm" id="observaciones_tto" name="observaciones_tto" rows="3"></textarea>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" onclick="guardarCambiosTratamiento()"><i class="fas fa-save"></i> Guardar cambios</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
    </div>
</div>
<!-- DATOS DE VITAL IMPORTANCIA -->
<input type="hidden" name="id_insumo_editar" id="id_insumo_editar" value="">
<script>

    function actualizar_presupuesto_urgencia() {
        // Obtener valores del formulario

        const id_dcto = $('#tiene_dcto').val();

        // Crear objeto JSON con los datos del formulario
        const data = {
            _token: '{{ csrf_token() }}', // Token CSRF
            id_ficha_atencion: $('#id_fc').val(),
            id_paciente: $('#id_paciente').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_dcto: id_dcto
        };

        $.ajax({
            type: 'post',
            url: '{{ ROUTE("dental.actualizar_presupuesto_urg") }}',
            data: data,
            beforeSend: function(){
                swal({
                    title: 'Cargando...',
                    text: 'Por favor, espere.',
                    icon: 'info',
                    buttons: false,
                    closeOnClickOutside: false
                });
            },
            success: function(response) {
                swal.close();
                console.log('Éxito:', response);

                if (response.estado == 1) {
                    // swal({
                    //     title: 'Exito',
                    //     text: response.mensaje,
                    //     icon: 'success'
                    // });

                    let table_piezas_odontograma = $('#presup_estado_pago_urg').DataTable();

                    // Limpiar la tabla antes de agregar nuevas filas
                    table_piezas_odontograma.clear().draw();

                    let odontograma = response.odontograma;

                    // Recorrer el odontograma y agregar nuevas filas
                    odontograma.forEach(function(odonto) {

                        if (odonto.presupuesto == 1 && odonto.urgencia == 1) {
                            if (odonto.estado_pago == 'ok') {
                                var clase = 'bg-success';
                            } else if (odonto.estado_pago == 'incompleto') {
                                var clase = 'bg-warning';
                            } else {
                                var clase = 'bg-danger';
                            }

                            if(odonto.estado == 0){
                                var estado = 'PENDIENTE';
                            }else if(odonto.estado == 1){
                                var estado = 'TERMINADO';
                            }else if(odonto.estado == 2){
                                var estado = 'EN PROCESO';
                            }else{
                                var estado = 'CITADO A CONTROL';
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

                    let table_insumos_pagos = $('#presup_insumos_pago_urg').DataTable();
                    table_insumos_pagos.clear();
                    console.log(insumos);
                    insumos.forEach(insumo => {
                        if(insumo.urgencia == 1){
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
                        }


                    });
                    table_insumos_pagos.draw();
                    let monto_abonado = response.pagos;
                    let total_deuda = response.total_deuda;
                    let monto_pendiente = total_deuda - monto_abonado;

                    $('#monto_abonado_urgencia').text(formatoMoneda(monto_abonado));
                    $('#total_deuda_urgencia').text(formatoMoneda(total_deuda));
                    $('#monto_pendiente_urgencia').text(formatoMoneda(monto_pendiente));

                    // Actualizar barra de progreso
                    let porcentaje = (monto_abonado / total_deuda) * 100;
                    $('#barra_progreso_urgencia').css('width', porcentaje + '%');
                    $('#porcentaje_pago_urgencia').text(Math.round(porcentaje) + '%');

                    // Cargar tabla de pagos
                    cargarTablaPagosUrgencia(response.pagos_urgencia);
                    $('#montoAbonado').val(formatoMoneda(parseInt(response.suma_pagado)));
                    $('#valores_abonado_presupuesto').html(formatoMoneda(0));
                    $('#valores_total_abonado_presupuesto_conf').html(formatoMoneda(parseInt(0)));
                    $('#valores_total_final_presupuesto_conf_urg').html(formatoMoneda(parseInt(response.insumos_por_pagar) + parseInt(response.piezas_por_pagar)));
                    $('#valores_insumos_presupuesto_conf_urg').html(formatoMoneda(response.insumos_por_pagar));
                    $('#valores_piezas_presupuesto_conf_urg').html(formatoMoneda(response.piezas_por_pagar));
                    $('#total_abonado_presupuesto').val(parseInt(0));
                    $('#total_adeudado_presupuesto').val(parseInt(response.suma_adeudado));
                    $('#abonos_presup').val(formatoMoneda(0));
                    $('#subtotal_presup').val(formatoMoneda(0));
                    $('#valores_total_abonado_presupuesto_conf_urg').html(formatoMoneda(parseInt(response.pagos)));
                    let todos = response.todos;

                    // let table_ = $('#presup_estado_pago_gral_urg').DataTable();

                    // // Limpiar la tabla antes de agregar nuevas filas
                    // table_.clear().draw();

                    // // Recorrer el odontograma y agregar nuevas filas
                    // todos.forEach(function(odonto) {

                    //     if (odonto.presupuesto == 1) {
                    //         if (odonto.estado_pago == 'ok') {
                    //             var clase = 'bg-success';
                    //         } else if (odonto.estado_pago == 'incompleto') {
                    //             var clase = 'bg-warning';
                    //         } else {
                    //             var clase = 'bg-danger';
                    //         }
                    //         if (odonto.atendido == 0) {
                    //             var estado = 'PENDIENTE';
                    //         } else {
                    //             var estado = 'TERMINADO';
                    //         }
                    //         // Agregar una nueva fila a la tabla
                    //         let rowNode = table_.row.add([
                    //             odonto.localizacion,
                    //             odonto.diagnostico_tratamiento,
                    //             formatoMoneda(formatoMoneda(odonto.valor)),
                    //             0,
                    //             formatoMoneda(odonto.valor),
                    //             ' <div class="circle ' + clase + '"></div>',
                    //             estado
                    //         ]).draw(false).node();

                    //         // Agregar clases a la fila
                    //         $(rowNode).addClass('text-center align-middle status-circle');
                    //     }

                    // });
                } else {
                    console.log('Error:', response.mensaje);
                }
            },
            error: function(error) {
                console.log(error);
            }
        })
    }

    function finalizar_atencion_urg(){
        swal({
            title: 'Advertencia',
            text: '¿Está seguro de finalizar la atención de urgencia?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true
        }).then((aceptar) => {
            if (aceptar) {
                confirmar_finalizar_atencion_urg();
            }
        })
    }

    function confirmar_finalizar_atencion_urg(){
        let id_hora_medica = $('#hora_medica').val();
        let id_paciente = $('#id_paciente').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let motivo = $('#motivo_urg_odped').val();
        let derivado_por = $('#derivado_por_odontop').val();

        let valido = 1;
        let mensaje = "";

        if(motivo == "Otro"){
            motivo = $('#obs_motivo_urg').val();
        }
        if(derivado_por == 3){
            derivado_por = $('#obs_derivado_por_odontop').val();
        }

        if(motivo.length == 0){
            valido = 0;
            mensaje += "Debe seleccionar al menos un motivo. ";
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content:{
                    element: 'div',
                    attributes: {
                        innerHTML: mensaje
                    }
                },
                icon: 'error',
                button: 'Aceptar'
            });
            return false;
        }

        let data = {
            id_hora_medica: id_hora_medica,
            id_paciente: id_paciente,
            id_ficha_atencion: id_ficha_atencion,
            id_lugar_atencion: id_lugar_atencion,
            motivo: motivo,
            derivado_por: derivado_por,
            _token: CSRF_TOKEN
        }
        console.log(data);

        let url = "{{ route('dental.finalizar_atencion_urg') }}";

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(response);
                if (response.estado == 'ok') {
                    swal({
                        title: 'Éxito',
                        text: response.mensaje,
                        icon: 'success',
                        button: 'Aceptar'
                    }).then(() => {
                        // Redirigir a la página de inicio o a donde sea necesario
                        window.location.href = "{{ route('profesional.mi_agenda') }}" + "?lugares_atencion=" + data.id_lugar_atencion;
                    });
                } else {
                    swal({
                        title: 'Error',
                        text: response.mensaje,
                        icon: 'error',
                        button: 'Aceptar'
                    });
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }



     // Función para cargar la tabla de pagos de urgencia
    function cargarTablaPagosUrgencia(pagos) {
            console.log(pagos);
            const tbody = $('#tbody_pagos_urgencia');
            tbody.empty();

            if (pagos && pagos.length > 0) {
                $('#seccion_pagos_realizados').show();

                pagos.forEach(function(pago) {
                    const fecha = pago.created_at ? new Date(pago.created_at).toLocaleDateString('es-CL') : 'N/A';
                    const profesional = pago.nombre_profesional + ' ' + pago.apellido_uno || 'N/A';

                    const fila = `
                        <tr class="text-center">
                            <td class="align-middle">${fecha}</td>
                            <td class="align-middle">
                                <span class="badge badge-success">${formatoMoneda(pago.total)}</span>
                            </td>
                            <td class="align-middle">
                                <span class="badge badge-${pago.metodo_pago === 'efectivo' ? 'primary' : 'info'}">
                                    ${pago.metodo_pago.charAt(0).toUpperCase() + pago.metodo_pago.slice(1)}
                                </span>
                            </td>
                            <td class="align-middle">${profesional}</td>
                            <td class="align-middle">
                                <button type="button"
                                        class="btn btn-danger btn-sm"
                                        onclick="eliminarPagoUrgencia(${pago.id})"
                                        title="Eliminar pago">
                                    <i class="feather icon-trash-2"></i>
                                </button>
                            </td>
                        </tr>
                    `;
                    tbody.append(fila);
                });
            } else {
                $('#seccion_pagos_realizados').hide();
            }
        }

        // Función para eliminar un pago de urgencia
        function eliminarPagoUrgencia(idPago) {
            swal({
                title: "¿Está seguro?",
                text: "Esta acción eliminará el pago de forma permanente.",
                icon: "warning",
                buttons: ["Cancelar", "Eliminar"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    confirmarEliminarPagoUrgencia(idPago);
                }
            });
        }

        // Función para confirmar la eliminación del pago
        function confirmarEliminarPagoUrgencia(idPago) {
            let data = {
                id_pago: idPago,
                id_ficha_atencion: $('#id_fc').val(),
                id_paciente: $('#id_paciente_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                _token: CSRF_TOKEN
            };

            $.ajax({
                url: '{{ route("dental.eliminar_pago_urgencias_dental") }}',
                method: 'POST',
                data: data,
                beforeSend: function() {
                    swal({
                        title: 'Eliminando...',
                        text: 'Por favor, espere.',
                        icon: 'info',
                        buttons: false,
                        closeOnClickOutside: false
                    });
                },
                success: function(response) {
                    console.log(response);
                    swal.close();

                    if (response.estado == 'ok') {
                        swal({
                            title: "Éxito",
                            text: "El pago ha sido eliminado correctamente.",
                            icon: "success",
                        }).then(() => {
                            // Actualizar la información después de eliminar
                            actualizar_presupuesto_urgencia();
                        });
                    } else {
                        swal({
                            title: "Error",
                            text: response.mensaje || "Error al eliminar el pago.",
                            icon: "error",
                        });
                    }
                },
                error: function(xhr, status, error) {
                    swal.close();
                    console.error('Error:', xhr.responseText);
                    swal({
                        title: "Error",
                        text: "Error en la comunicación con el servidor.",
                        icon: "error",
                    });
                }
            });
        }

        function cambiar_estado_pieza_urg(id){
            // abrir modal de cambio de estado
            $('#modal_cambio_estado_tto_urg').modal('show');
            $('#id_tratamiento_urgencia').val(id);
        }

        function cambiar_estado_pieza(id){
            // abrir modal de cambio de estado
            $('#modal_cambio_estado_tto').modal('show');
            $('#id_tratamiento').val(id);
        }

        function cambiar_estado_pieza_evolucion(count){
            console.log(count);
            // abrir modal de cambio de estado
            $('#modal_cambio_estado_tto').modal('show');
            let id = $('#proc_evol' + count).val();
            $('#id_tratamiento').val(id);
        }

        function cargar_a_presupuesto_urg() {
            // preguntar si desea eliminar
            swal({
                    title: "Cargar Piezas",
                    text: "¿Está seguro que desea cargar el grupo de piezas?",
                    icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    DangerMode: true,
                })
                .then((willLoad) => {
                    if (willLoad) {
                        cargar_a_presupuesto_urg_confirmar();
                    }
                });
        }

        function cargar_a_presupuesto_odped_g_urg(){
            swal({
                title: "Cargar Piezas",
                text: "¿Está seguro que desea cargar el grupo de piezas?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                DangerMode: true,
            })
            .then((willLoad) => {
                if (willLoad) {
                    cargar_a_presupuesto_odped_g_urg_confirmar();
                }
            });
        }

        function cargar_a_presupuesto_odped_g_urg_confirmar(){
            console.log('cargando');
            // Obtener los valores seleccionados en el select
            var piezasSeleccionadas = $('#paciente_piezas_dentales_ex_odped_urg').val();
            var ttoPiezas = $('#diag_presupuesto_pieza_g_odped_urg').val();
            var diagnostico = $('#diag_presupuesto_diagnostico_odped_urg').val();

            let valido = 1;
            let mensaje = '';

            if (piezasSeleccionadas.length == 0) {
                valido = 0;
                mensaje += '<li>Piezas seleccionadas </li>'
            }
            if (ttoPiezas == '') {
                valido = 0;
                mensaje += '<li>Tratamiento </li>';
            }
            if (diagnostico == '' || diagnostico == 0) {
                valido = 0;
                mensaje += '<li>Diagnóstico </li>';
            }

            if (valido == 0) {
                swal({
                    title: "Campos requeridos",
                    content: {
                        element: "ul",
                        attributes: {
                            innerHTML: mensaje
                        }
                    },
                    icon: "error",
                });
                return false;
            }

            console.log(piezasSeleccionadas, ttoPiezas);

            let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto_period') }}";
            let data = {
                piezas: piezasSeleccionadas,
                tto: ttoPiezas,
                diagnostico: diagnostico,
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_paciente: $('#id_paciente_fc').val(),
                id_presupuesto: $('#id_presupuesto').val(),
                urgencia: 1,
                _token: "{{ csrf_token() }}"
            }
            console.log(data);
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.status == 1) {
                        swal({
                            icon: 'success',
                            title: 'Info',
                            text: resp.mensaje
                        });
                        let odontograma = resp.odontograma_paciente;
                        odontograma_global = resp.odontograma_paciente;
                        let html = '';
                        odontograma.forEach(function(odonto) {
                            html += '<tr>';
                            html += '<td>' + odonto.fecha + '</td>';
                            html += '<td>' + odonto.tratamiento + '</td>';
                            html += '<td>' + odonto.caras + '</td>';
                            html += '<td>' + odonto.pieza + '</td>';
                            html += '<td>' + odonto.diagnostico + '</td>';
                            html += '<td>' + formatoMoneda(odonto.valor) + '</td>';
                            html += '<td>';
                            html += '<div class="form-check">';
                            html += '<input class="form-check-input" type="checkbox" value="' + odonto
                                .id + '" '
                            html += odonto.presupuesto == 1 ? 'checked ' : '';
                            html += 'onchange="togglePresupuesto(' + odonto.id + ', this.checked)">';
                            html += '<label class="form-check-label"></label>';
                            html += '</div>';
                            html += '</td>';
                            html += '<td>';
                            html += '<div class="form-check">';
                            html +=
                                '<input class="form-check-input checkbox-seleccion" type="checkbox" value="' +
                                odonto.id + '" ';
                            html += 'id="seleccionCheck' + odonto.id + '" ';
                            html += 'onchange="toggleSeleccion(' + odonto.id + ', this.checked)">';
                            html += '<label class="form-check-label" for="seleccionCheck' + odonto.id +
                                '"></label>';
                            html += '</div>';
                            html += '</td>';
                            html += '</tr>';
                        });
                        $('#contenedor_examenes_grupos_dentales').empty();
                        $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
                        $('#table_odontograma tbody').html(html);
                        $('#contenedor_piezas_dentales_presupuesto').empty();
                        $('#table_trabajos_presupuesto tbody').empty();
                        $('#numero_pieza_post_impl2000').empty();
                        // id que representa el select de piezas pre implante
                        $('#numero_pieza_tto_impl1000').empty();
                        // Este array almacenará solo las piezas únicas
                        let piezasUnicas = [];

                        // Este Set sirve para verificar si ya existe una pieza (más rápido que indexOf)
                        let piezasAgregadas = new Set();
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
                                $('#table_trabajos_presupuesto tbody').append(`
                                    <tr>
                                        <td>${odonto.fecha}</td>
                                        <td>${odonto.diagnostico} </td>
                                        <td>${odonto.caras} </td>
                                        <td>${odonto.pieza} </td>
                                        <td>${odonto.tratamiento} </td>
                                        <td>${formatoMoneda(odonto.valor)} </td>
                                        <td> </td>
                                        <td>
                                            <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                        </td>
                                    </tr>
                                `);
                                // ✅ Si la pieza no se ha agregado aún, la incluimos en el array
                                if (!piezasAgregadas.has(odonto.pieza)) {
                                    piezasAgregadas.add(odonto.pieza);
                                    piezasUnicas.push(odonto.pieza);
                                }
                            }
                        });
                        console.log(resp.valores);
                        let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let valores_insumos = resp.valores[2];
                        let valores_lab = resp.valores[3];
                        let total_general = valores_boca_general + valores_odontograma + valores_insumos +
                            valores_lab;
                        $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                        $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                        $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                        $('#subtotal_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                        $('#total_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                        $('#total_presupuesto_dental').val(total_general);
                        $('#total_presupuesto').val(formatoMoneda(total_general));

                        let table_urg = $('#table_piezas_odonto_urg_ped').DataTable();
                        table_urg.clear().draw();

                        odontograma.forEach(function(pieza) {
                                if(pieza.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else if(pieza.estado == 1){
                                    var estado = 'TERMINADO';
                                }else if(pieza.estado == 2){
                                    var estado = 'EN PROCESO';
                                }else{
                                    var estado = 'CITADO A CONTROL';
                                }
                                if (pieza.presupuesto == 1 && pieza.urgencia == 1) {
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_urg.row.add([
                                        pieza.pieza,
                                        pieza.descripcion,
                                        formatoMoneda(formatoMoneda(pieza.valor)),
                                        '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma_urg(' +
                                        pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                        '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza_urg(' +
                                        pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                        estado

                                    ]).draw(false).node(); // Obtener el nodo de la fila
                                }
                        });

                        let table_urg_gral = $('#table_piezas_odonto_urg').DataTable();
                        table_urg_gral.clear().draw();

                        odontograma.forEach(function(pieza) {
                                if(pieza.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else if(pieza.estado == 1){
                                    var estado = 'TERMINADO';
                                }else if(pieza.estado == 2){
                                    var estado = 'EN PROCESO';
                                }else{
                                    var estado = 'CITADO A CONTROL';
                                }
                                if (pieza.presupuesto == 1 && pieza.urgencia == 1) {
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_urg_gral.row.add([
                                        pieza.pieza,
                                        pieza.descripcion,
                                        formatoMoneda(formatoMoneda(pieza.valor)),
                                        '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma_urg(' +
                                        pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                        '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza_urg(' +
                                        pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                        estado

                                    ]).draw(false).node(); // Obtener el nodo de la fila
                                }
                        });


                        $('#monto_total').html(formatoMoneda(valores_insumos) + ' + ' + formatoMoneda(
                            valores_odontograma + valores_boca_general) + ' = ' + formatoMoneda(
                            total_general));

                        let table = $('#presup_estado_pago').DataTable();
                        table.clear().draw();

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

                                if(odonto.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else if(odonto.estado == 1){
                                    var estado = 'TERMINADO';
                                }else if(odonto.estado == 2){
                                    var estado = 'EN PROCESO';
                                }else{
                                    var estado = 'CITADO A CONTROL';
                                }
                                // Agregar una nueva fila a la tabla
                                let rowNode = table.row.add([
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
                        //limpiar_formulario_cargar_presupuesto_g();
                        $('#table_pagos_reasignar_odontograma tbody').empty();
                        odontograma.forEach(function(odonto) {
                            if (odonto.presupuesto == 1) {
                                let fila = `<tr>
                            <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                            <td>${odonto.pieza}</td>
                            <td>${formatoMoneda(odonto.valor)}</td>
                            <td><button type="button" class="btn btn-danger" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                        </tr>`;
                                $('#table_pagos_reasignar_odontograma tbody').append(fila);
                            }
                        });
                        // $('#paciente_piezas_dentales_ex').val(null).trigger('change');
                        $('#odon_adults').empty();
                        $('#odon_adults').append(resp.odontograma_paciente_vista);
                        $('#odonto_adulto').empty();
                        $('#odonto_adulto').append(resp.odontograma_paciente_vista);
                    } else {
                        swal({
                            icon: 'error',
                            title: 'info',
                            text: resp.mensaje
                        });
                    }


                    $('#tratamiento_presupuesto tbody').empty();
                    let presupuesto = resp.presupuesto;
                    console.log(presupuesto);
                    $('#tratamiento_presupuesto tbody').append(`
            <tr>
                <td class="text-center align-middle">${presupuesto.fecha}</td>
                <td class="text-center align-middle">${presupuesto.id}</td>
                <td class="text-center align-middle">${presupuesto.aprobado}</td>
                <td class="text-center align-middle">Sector I</td>
                <td class="text-center align-middle">${presupuesto.boca}</td>

                <td class="text-center align-middle">
                    <div class="form-group col-md-4">
                        <div class="switch switch-success d-inline m-r-2">
                            <input type="checkbox" id="info_finalizado" checked="">
                            <label for="info_finalizado" class="cr"></label>
                        </div>
                        <label>Realizado?</label>
                    </div>
                </td>
                <td class="text-center align-middle">
                    ${presupuesto.fecha}
                </td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()" ;="">
                        <i class="fa fa-plus"></i> Trabajar en pieza
                    </button>
                </td>
            </tr>
            `);

                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });
        }

        function guardarCambiosTratamientoUrgencia(){
            let id_tratamiento = $('#id_tratamiento_urgencia').val();
            let estado = $('#estado_tto_urg').val();
            let data = {
                id_tratamiento: id_tratamiento,
                estado: estado,
                id_ficha_atencion: $('#id_fc').val(),
                id_paciente: $('#id_paciente_fc').val(),
                id_profesional: $('#id_profesional').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                observaciones: $('#observaciones_tto_urg').val(),
                _token: CSRF_TOKEN
            }

            let url = "{{ route('dental.guardarCambiosTratamientoUrgencia') }}";
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if(resp.mensaje == 'OK'){
                        swal({
                            title: "Pieza guardada",
                            text: "Pieza guardada correctamente",
                            icon: "success",
                            button: "Aceptar",
                        });
                    }

                    $('#modal_cambio_estado_tto_urg').modal('hide');

                    let odontograma = resp.odontograma;
                    odontograma_global = resp.odontograma;

                    let table = $('#presup_estado_pago_urg').DataTable();
                    // Limpiar la tabla antes de agregar nuevas filas
                    table.clear().draw();

                    // Recorrer el odontograma y agregar nuevas filas
                    odontograma.forEach(function(odonto) {

                        if (odonto.urgencia == 1) {
                            if(odonto.estado_pago == 'ok'){
                                var clase = 'bg-success';
                            }else if(odonto.estado_pago == 'incompleto'){
                                var clase = 'bg-warning';
                            }else{
                                var clase = 'bg-danger';
                            }

                            if(odonto.estado == 0){
                                var estado = 'PENDIENTE';
                            }else if(odonto.estado == 1){
                                var estado = 'TERMINADO';
                            }else if(odonto.estado == 2){
                                var estado = 'EN PROCESO';
                            }else{
                                var estado = 'CITADO A CONTROL';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table.row.add([
                                odonto.descripcion,
                                odonto.pieza,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                0,
                                formatoMoneda(formatoMoneda(odonto.valor)),
                                '<div class="circle '+clase+'"></div>',
                                estado, // Columna vacía

                            ]).draw(false).node(); // Obtener el nodo de la fila

                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }
                    });

                    let table_urg = $('#table_piezas_odonto_urg').DataTable();
                    table_urg.clear().draw();

                    odontograma.forEach(function(pieza) {
                            if(pieza.estado == 0){
                                var estado = 'PENDIENTE';
                            }else if(pieza.estado == 1){
                                var estado = 'TERMINADO';
                            }else if(pieza.estado == 2){
                                var estado = 'EN PROCESO';
                            }else{
                                var estado = 'CITADO A CONTROL';
                            }
                            if (pieza.presupuesto == 1 && pieza.urgencia == 1) {
                                // Agregar una nueva fila a la tabla
                                let rowNode = table_urg.row.add([
                                    pieza.pieza,
                                    pieza.descripcion,
                                    formatoMoneda(formatoMoneda(pieza.valor)),
                                    '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma_urg(' +
                                    pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                    '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza_urg(' +
                                    pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                    estado

                                ]).draw(false).node(); // Obtener el nodo de la fila
                            }
                    });

                    let table_odped = $('#table_piezas_odonto_urg_ped').DataTable();
                    // Limpiar la tabla antes de agregar nuevas filas
                    table_odped.clear().draw();

                    odontograma.forEach(function(pieza) {
                        if (pieza.urgencia == 1) {
                            if(pieza.estado == 0){
                                var estado = 'PENDIENTE';
                            }else if(pieza.estado == 1){
                                var estado = 'TERMINADO';
                            }else if(pieza.estado == 2){
                                var estado = 'EN PROCESO';
                            }else{
                                var estado = 'CITADO A CONTROL';
                            }
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_odped.row.add([
                                pieza.pieza,
                                pieza.descripcion,
                                formatoMoneda(formatoMoneda(pieza.valor)),
                                '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma_urg(' +
                                pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza_urg(' +
                                pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                estado

                            ]).draw(false).node(); // Obtener el nodo de la fila
                        }
                    });

                }
            });
        }


        function cargar_a_presupuesto_urg_confirmar() {
            // Obtener los valores seleccionados en el select
            var piezasSeleccionadas = $('#paciente_piezas_dentales_urg').val();
            var ttoPiezas = $('#diag_presupuesto_pieza_g_urg').val();

            let valido = 1;
            let mensaje = '';

            if (piezasSeleccionadas.length == 0) {
                valido = 0;
                mensaje += '<li>Piezas seleccionadas </li>'
            }
            if (ttoPiezas == '') {
                valido = 0;
                mensaje += '<li>Tratamiento </li>';
            }

            if (valido == 0) {
                swal({
                    title: "Campos requeridos",
                    content: {
                        element: "ul",
                        attributes: {
                            innerHTML: mensaje
                        }
                    },
                    icon: "error",
                });
                return false;
            }

            console.log(piezasSeleccionadas, ttoPiezas);

            let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto_period') }}";
            let data = {
                piezas: piezasSeleccionadas,
                tto: ttoPiezas,
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_paciente: $('#id_paciente_fc').val(),
                id_presupuesto: $('#id_presupuesto').val(),
                urgencia: 1,
                _token: "{{ csrf_token() }}"
            }
            console.log(data);
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.status == 1) {
                        swal({
                            icon: 'success',
                            title: 'Info',
                            text: resp.mensaje
                        });
                        let odontograma = resp.odontograma_paciente;
                        odontograma_global = resp.odontograma_paciente;
                        let html = '';
                        odontograma.forEach(function(odonto) {
                            html += '<tr>';
                            html += '<td>' + odonto.fecha + '</td>';
                            html += '<td>' + odonto.tratamiento + '</td>';
                            html += '<td>' + odonto.caras + '</td>';
                            html += '<td>' + odonto.pieza + '</td>';
                            html += '<td>' + odonto.diagnostico + '</td>';
                            html += '<td>' + formatoMoneda(odonto.valor) + '</td>';
                            html += '<td>';
                            html += '<div class="form-check">';
                            html += '<input class="form-check-input" type="checkbox" value="' + odonto
                                .id + '" '
                            html += odonto.presupuesto == 1 ? 'checked ' : '';
                            html += 'onchange="togglePresupuesto(' + odonto.id + ', this.checked)">';
                            html += '<label class="form-check-label"></label>';
                            html += '</div>';
                            html += '</td>';
                            html += '<td>';
                            html += '<div class="form-check">';
                            html +=
                                '<input class="form-check-input checkbox-seleccion" type="checkbox" value="' +
                                odonto.id + '" ';
                            html += 'id="seleccionCheck' + odonto.id + '" ';
                            html += 'onchange="toggleSeleccion(' + odonto.id + ', this.checked)">';
                            html += '<label class="form-check-label" for="seleccionCheck' + odonto.id +
                                '"></label>';
                            html += '</div>';
                            html += '</td>';
                            html += '</tr>';
                        });
                        $('#contenedor_examenes_grupos_dentales').empty();
                        $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
                        $('#table_odontograma tbody').html(html);
                        $('#contenedor_piezas_dentales_presupuesto').empty();
                        $('#table_trabajos_presupuesto tbody').empty();
                        $('#numero_pieza_post_impl2000').empty();
                        // id que representa el select de piezas pre implante
                        $('#numero_pieza_tto_impl1000').empty();
                        // Este array almacenará solo las piezas únicas
                        let piezasUnicas = [];

                        // Este Set sirve para verificar si ya existe una pieza (más rápido que indexOf)
                        let piezasAgregadas = new Set();
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
                                $('#table_trabajos_presupuesto tbody').append(`
                            <tr>
                                <td>${odonto.fecha}</td>
                                <td>${odonto.diagnostico} </td>
                                <td>${odonto.caras} </td>
                                <td>${odonto.pieza} </td>
                                <td>${odonto.tratamiento} </td>
                                <td>${formatoMoneda(odonto.valor)} </td>
                                <td> </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                </td>
                            </tr>
                        `);
                                // ✅ Si la pieza no se ha agregado aún, la incluimos en el array
                                if (!piezasAgregadas.has(odonto.pieza)) {
                                    piezasAgregadas.add(odonto.pieza);
                                    piezasUnicas.push(odonto.pieza);
                                }
                            }
                        });
                        console.log(resp.valores);
                        let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let valores_insumos = resp.valores[2];
                        let valores_lab = resp.valores[3];
                        let total_general = valores_boca_general + valores_odontograma + valores_insumos +
                            valores_lab;
                        $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                        $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                        $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                        $('#subtotal_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                        $('#total_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                        $('#total_presupuesto_dental').val(total_general);
                        $('#total_presupuesto').val(formatoMoneda(total_general));

                        let table_urg = $('#table_piezas_odonto_urg').DataTable();
                        table_urg.clear().draw();

                        odontograma.forEach(function(pieza) {
                                if(pieza.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else if(pieza.estado == 1){
                                    var estado = 'TERMINADO';
                                }else if(pieza.estado == 2){
                                    var estado = 'EN PROCESO';
                                }else{
                                    var estado = 'CITADO A CONTROL';
                                }
                                if (pieza.presupuesto == 1 && pieza.urgencia == 1) {
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_urg.row.add([
                                        pieza.pieza,
                                        pieza.descripcion,
                                        formatoMoneda(formatoMoneda(pieza.valor)),
                                        '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma_urg(' +
                                        pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                        '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza_urg(' +
                                        pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                        estado

                                    ]).draw(false).node(); // Obtener el nodo de la fila
                                }
                        });



                        $('#monto_total').html(formatoMoneda(valores_insumos) + ' + ' + formatoMoneda(
                            valores_odontograma + valores_boca_general) + ' = ' + formatoMoneda(
                            total_general));

                        let table = $('#presup_estado_pago').DataTable();
                        table.clear().draw();

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

                                if(odonto.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else if(odonto.estado == 1){
                                    var estado = 'TERMINADO';
                                }else if(odonto.estado == 2){
                                    var estado = 'EN PROCESO';
                                }else{
                                    var estado = 'CITADO A CONTROL';
                                }
                                // Agregar una nueva fila a la tabla
                                let rowNode = table.row.add([
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
                        //limpiar_formulario_cargar_presupuesto_g();
                        $('#table_pagos_reasignar_odontograma tbody').empty();
                        odontograma.forEach(function(odonto) {
                            if (odonto.presupuesto == 1) {
                                let fila = `<tr>
                            <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                            <td>${odonto.pieza}</td>
                            <td>${formatoMoneda(odonto.valor)}</td>
                            <td><button type="button" class="btn btn-danger" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                        </tr>`;
                                $('#table_pagos_reasignar_odontograma tbody').append(fila);
                            }
                        });
                        // $('#paciente_piezas_dentales_ex').val(null).trigger('change');
                        $('#odon_adults').empty();
                        $('#odon_adults').append(resp.odontograma_paciente_vista);
                        $('#odonto_adulto').empty();
                        $('#odonto_adulto').append(resp.odontograma_paciente_vista);
                    } else {
                        swal({
                            icon: 'error',
                            title: 'info',
                            text: resp.mensaje
                        });
                    }


                    $('#tratamiento_presupuesto tbody').empty();
                    let presupuesto = resp.presupuesto;
                    console.log(presupuesto);
                    $('#tratamiento_presupuesto tbody').append(`
            <tr>
                <td class="text-center align-middle">${presupuesto.fecha}</td>
                <td class="text-center align-middle">${presupuesto.id}</td>
                <td class="text-center align-middle">${presupuesto.aprobado}</td>
                <td class="text-center align-middle">Sector I</td>
                <td class="text-center align-middle">${presupuesto.boca}</td>

                <td class="text-center align-middle">
                    <div class="form-group col-md-4">
                        <div class="switch switch-success d-inline m-r-2">
                            <input type="checkbox" id="info_finalizado" checked="">
                            <label for="info_finalizado" class="cr"></label>
                        </div>
                        <label>Realizado?</label>
                    </div>
                </td>
                <td class="text-center align-middle">
                    ${presupuesto.fecha}
                </td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()" ;="">
                        <i class="fa fa-plus"></i> Trabajar en pieza
                    </button>
                </td>
            </tr>
            `);

                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });
        }

        function seleccionar_maxilar_superior_urg() {
            const superiorActivo = document.getElementById("max_sup_urg").checked;
            document.getElementById('piezas_presup_urg').checked = false;
            const piezas = document.querySelectorAll('.pieza_urg');
            const select = $('#paciente_piezas_dentales_urg');

            piezas.forEach(pieza => {
                const codigo = pieza.getAttribute('data-pieza_urg');

                if (codigo.startsWith('1.') || codigo.startsWith('2.')) {
                    if (superiorActivo) {
                        pieza.classList.add('seleccionada');

                        // Selecciona en el Select2 si existe la opción
                        if (select.find("option[value='" + codigo + "']").length > 0) {
                            select.find("option[value='" + codigo + "']").prop("selected", true);
                        }
                    } else {
                        pieza.classList.remove('seleccionada');

                        // Deselecciona en el Select2
                        if (select.find("option[value='" + codigo + "']").length > 0) {
                            select.find("option[value='" + codigo + "']").prop("selected", false);
                        }
                    }
                }
            });

            // Refresca el select2 para que se vea reflejado el cambio
            select.trigger('change');
        }

        function seleccionar_maxilar_inferior_urg() {
            const inferiorActivo = document.getElementById("max_inf_urg").checked;
            document.getElementById('piezas_presup_urg').checked = false;
            const piezas = document.querySelectorAll('.pieza_urg');
            const select = $('#paciente_piezas_dentales_urg');

            piezas.forEach(pieza => {
                const codigo = pieza.getAttribute('data-pieza_urg');

                if (codigo.startsWith('3.') || codigo.startsWith('4.')) {
                    if (inferiorActivo) {
                        pieza.classList.add('seleccionada');

                        // Selecciona en el Select2 si existe la opción
                        if (select.find("option[value='" + codigo + "']").length > 0) {
                            select.find("option[value='" + codigo + "']").prop("selected", true);
                        }
                    } else {
                        pieza.classList.remove('seleccionada');

                        // Deselecciona en el Select2
                        if (select.find("option[value='" + codigo + "']").length > 0) {
                            select.find("option[value='" + codigo + "']").prop("selected", false);
                        }
                    }
                }
            });

            // Refresca el select2 para que se vea reflejado el cambio
            select.trigger('change');
        }

        function seleccionar_maxilar_inferior_odped_urg() {
            const inferiorActivo = document.getElementById("max_inf_odped_urg").checked;
            document.getElementById('piezas_presup_odped_urg').checked = false;
            const piezas = document.querySelectorAll('.pieza_odped_urg');
            const select = $('#paciente_piezas_dentales_ex_odped_urg');

            piezas.forEach(pieza => {
                const codigo = pieza.getAttribute('data-pieza_odpediat_urg');

                if (codigo.startsWith('7.') || codigo.startsWith('8.')) {
                    if (inferiorActivo) {
                        pieza.classList.add('seleccionada');

                        // Selecciona en el Select2 si existe la opción
                        if (select.find("option[value='" + codigo + "']").length > 0) {
                            select.find("option[value='" + codigo + "']").prop("selected", true);
                        }
                    } else {
                        pieza.classList.remove('seleccionada');

                        // Deselecciona en el Select2
                        if (select.find("option[value='" + codigo + "']").length > 0) {
                            select.find("option[value='" + codigo + "']").prop("selected", false);
                        }
                    }
                }
            });

            // Refresca el select2 para que se vea reflejado el cambio
            select.trigger('change');
        }

        function seleccionar_maxilar_superior_odped_urg(){
            const superiorActivo = document.getElementById("max_sup_odped_urg").checked;
            document.getElementById('piezas_presup_odped_urg').checked = false;
            const piezas = document.querySelectorAll('.pieza_odped_urg');
            const select = $('#paciente_piezas_dentales_ex_odped_urg');

            piezas.forEach(pieza => {
                const codigo = pieza.getAttribute('data-pieza_odpediat_urg');

                if (codigo.startsWith('5.') || codigo.startsWith('6.')) {
                    if (superiorActivo) {
                        pieza.classList.add('seleccionada');

                        // Selecciona en el Select2 si existe la opción
                        if (select.find("option[value='" + codigo + "']").length > 0) {
                            select.find("option[value='" + codigo + "']").prop("selected", true);
                        }
                    } else {
                        pieza.classList.remove('seleccionada');

                        // Deselecciona en el Select2
                        if (select.find("option[value='" + codigo + "']").length > 0) {
                            select.find("option[value='" + codigo + "']").prop("selected", false);
                        }
                    }
                }
            });

            // Refresca el select2 para que se vea reflejado el cambio
            select.trigger('change');
        }

        function seleccionar_piezas_urg() {
            const checkbox = document.getElementById('piezas_presup_urg');
            // Seleccionar el <select> y actualizar sus valores
            const piezasSelect = $('#paciente_piezas_dentales_urg');
            // Si está desmarcado
            if (!checkbox.checked) {
                // 1. Limpiar select2
                piezasSelect.val(null).trigger('change');

                // 2. Quitar clase seleccionada a todas las piezas
                $('.pieza_implantologia_rehab').removeClass('seleccionada');

                return; // Salimos de la función
            }
            // Desmarcar los switches de maxilares
            document.getElementById('max_sup_urg').checked = false;
            document.getElementById('max_inf_urg').checked = false;

            // Aquí puedes agregar lógica para seleccionar solo piezas de presupuesto si lo necesitas
            // Supongamos que ya tienes este JSON cargado
            const odontograma = odontograma_global;

            // Filtrar solo las piezas donde urgencia es igual a 1 y obtener piezas únicas
            const piezasUrgencia = odontograma.filter(item => item.urgencia == 1);
            const piezasUnicas = [...new Set(piezasUrgencia.map(item => item.pieza))];


            piezasSelect.val(piezasUnicas).trigger('change');

            // Marcar visualmente las piezas en el odontograma
            piezasUnicas.forEach(pieza => {
                $(`.pieza_urg[data-pieza_urg="${pieza}"]`).addClass('seleccionada');
            });
            // Escuchar cambios en el Select2 para actualizar el odontograma visual
            piezasSelect.on('change', function() {
                const piezasSeleccionadas = $(this).val() || [];

                // Recorre todas las piezas visuales
                $('.pieza_urg').each(function() {
                    const piezaNumero = $(this).data('pieza_urg').toString();

                    if (piezasSeleccionadas.includes(piezaNumero)) {
                        $(this).addClass('seleccionada');
                    } else {
                        $(this).removeClass('seleccionada');
                    }
                });
            });
        }

        function seleccionar_piezas_odped_urg () {

            const checkbox = document.getElementById('piezas_presup_odped_urg');
            // Seleccionar el <select> y actualizar sus valores
            const piezasSelect = $('#paciente_piezas_dentales_ex_odped_urg');
            // Si está desmarcado
            if (!checkbox.checked) {
                // 1. Limpiar select2
                piezasSelect.val(null).trigger('change');

                // 2. Quitar clase seleccionada a todas las piezas
                $('.pieza_odped_urg').removeClass('seleccionada');

                return; // Salimos de la función
            }
            // Desmarcar los switches de maxilares
            document.getElementById('max_inf_odped').checked = false;
            document.getElementById('max_sup_odped').checked = false;



            // Aquí puedes agregar lógica para seleccionar solo piezas de presupuesto si lo necesitas
            // Supongamos que ya tienes este JSON cargado
            const odontograma = odontograma_global;

            // Filtrar solo las piezas donde urgencia es igual a 1 y obtener piezas únicas
            const piezasUrgencia = odontograma.filter(item => item.urgencia == 1);
            const piezasUnicas = [...new Set(piezasUrgencia.map(item => item.pieza))];


            piezasSelect.val(piezasUnicas).trigger('change');

            // Marcar visualmente las piezas en el odontograma
            piezasUnicas.forEach(pieza => {
                $(`.pieza_odped_urg[data-pieza_odpediat_urg="${pieza}"]`).addClass('seleccionada');
            });
            // Escuchar cambios en el Select2 para actualizar el odontograma visual
            piezasSelect.on('change', function() {
                const piezasSeleccionadas = $(this).val() || [];

                // Recorre todas las piezas visuales
                $('.pieza_urg').each(function() {
                    const piezaNumero = $(this).data('pieza_urg').toString();

                    if (piezasSeleccionadas.includes(piezaNumero)) {
                        $(this).addClass('seleccionada');
                    } else {
                        $(this).removeClass('seleccionada');
                    }
                });
            });
        }

        function abrir_modal_insumos_urg() {
            $('#modal_insumos_urgencias').modal('show');
        }



        function dame_marcas_implantes_urgencias(value, tipo = 'nuevo') {
            let id_tipo_insumo = value.value;
            console.log(id_tipo_insumo);
            let tipo_insumo_text = value.options[value.selectedIndex].text;

            $('#titulo_tipo_insumo_urgencia').html(tipo_insumo_text);

            if (tipo == 'editar') {
                // $('#marcas_implantes_select_editar').addClass('d-none');
                // $('#insumos_select_editar').removeClass('d-none');
            }

            let url = '{{ ROUTE('dental.dame_implantes_dental') }}';
            let data = {
                id_tipo_insumo: id_tipo_insumo,
                _token: CSRF_TOKEN
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (tipo == 'editar') {
                        // $('#nombreInsumo_editar').empty();
                        // let insumos = resp;
                        // insumos.forEach(e => {
                        //     $('#nombreInsumo_editar').append(`
                    //     <option value="${e.id}"> ${e.descripcion} </option>
                    //     `);
                        // });
                        // return;
                    } else {
                        $('#nombreInsumo_urg').empty();
                        let insumos = resp;
                        insumos.forEach(e => {
                            $('#nombreInsumo_urg').append(`
                        <option value="${e.id}"> ${e.descripcion} </option>
                        `);
                        });
                    }

                },
                error: function(error) {
                    console.log(error.responseText);
                }
            })
        }


        function guardar_insumo_urgencias() {
            let nombreInsumo = $('#nombreInsumo_urg option:selected').text();
            let tipoInsumo = $('#tipoInsumo_urg').val();
            if (tipoInsumo == 1) {
                var marcaInsumo = $('#marcasImplantes_urg option:selected').text();
            } else {
                var marcaInsumo = '';
            }
            var idMarcaInsumo = $('#marcasImplantes_urg').val();
            console.log(idMarcaInsumo);
            let tipoInsumo_text = $('#tipoInsumo_urg option:selected').text();
            let cantidad = $('#cantidad_urg').val();
            let precio = $('#precio_urg').val();
            let total = $('#total_urg').val();

            console.log(tipoInsumo);

            let mensaje = '';
            let valido = 1;

            if (nombreInsumo == '') {
                valido = 0;
                mensaje += '<li>Nombre insumo </li>';
            }
            if (tipoInsumo == 0) {
                valido = 0;
                mensaje += '<li>Tipo de Insumo </li>';
            }
            if (cantidad == '' || cantidad <= 0) {
                valido = 0;
                mensaje += '<li>Cantidad </li>';
            }
            if (precio == '' || cantidad <= 0) {
                valido = 0;
                mensaje += '<li>Precio </li>';
            }

            if (valido == 1) {
                let data = {
                    insumos: nombreInsumo,
                    idTipoInsumo: tipoInsumo,
                    tipoInsumo: tipoInsumo_text,
                    marcaInsumo: marcaInsumo,
                    idMarcaInsumo: idMarcaInsumo,
                    cantidad: cantidad,
                    valor: precio,
                    total: total,
                    id_paciente: $('#id_paciente_fc').val(),
                    id_ficha_atencion: $('#id_fc').val(),
                    observaciones: $('#insumos_obs_tto').val(),
                    urgencia: 1,
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
                            let nuevo_insumo = resp.insumo;
                            cargar_a_presupuesto_insumo(nuevo_insumo.id);
                            $('#modal_insumos').modal('hide');
                            //limpiar_formulario_insumo();
                            let insumos = resp.insumos;
                            console.log(insumos);
                            let table = $('#table_insumos_urg').DataTable();

                            //Limpiar la tabla sin perder la configuración de DataTables
                            table.clear();



                            //Recorrer el array de insumos y agregarlos a la tabla
                            insumos.forEach(insumo => {
                                if (insumo.urgencia == 1) {
                                    let total = insumo.cantidad * insumo.valor;
                                    // Botones de acción
                                    if (insumo.presupuesto == 0 || insumo.presupuesto == null) {
                                        // Botones de acción
                                        var botones = `
                                        <td>
                                            <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                                <i class="feather icon-shopping-cart"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>`;
                                    } else {
                                        var botones = `
                                        <td>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>`;
                                    }
                                    table.row.add([
                                        insumo.insumos + ' ' + insumo
                                        .nombre_marca, // Nombre del insumo
                                        insumo.observaciones,
                                        insumo.cantidad, // Cantidad utilizada
                                        formatoMoneda(insumo.valor), // Unidad de medida
                                        formatoMoneda(total),
                                        botones
                                    ]);
                                }

                            });

                            //Dibujar la tabla nuevamente con los nuevos datos
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
            }



        }

        function cargar_a_presupuesto_insumo(id) {
            let data = {
                id: id,
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_paciente: $('#id_paciente_fc').val(),
                tipo: 'insumo',
                _token: CSRF_TOKEN
            }

            let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto') }}";
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.status == 1) {
                        swal({
                            icon: 'success',
                            title: 'Info',
                            text: resp.mensaje
                        });
                        let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let valores_insumos = resp.valores[2];
                        let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                        $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                        $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                        $('#valores_insumos_presupuesto').html(formatoMoneda(valores_insumos));
                        $('#valores_insumos_presupuesto_conf').html(formatoMoneda(valores_insumos));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                        $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                        $('#subtotal_insumos').val(formatoMoneda(valores_insumos));
                        $('#total_presupuesto').val(formatoMoneda(total_general));
                        $('#total_insumos').val(formatoMoneda(valores_insumos));
                        $('#total_presupuesto_dental').val(total_general);
                        $('#subtotal_presup').val(formatoMoneda(total_general));
                        $('#monto_total').html(formatoMoneda(valores_insumos) + ' + ' + formatoMoneda(
                            valores_odontograma + valores_boca_general) + ' = ' + formatoMoneda(
                            total_general));
                        $('#monto_adeudado').html(formatoMoneda(total_general - valores_insumos));
                        //limpiar_formulario_insumo();
                        let insumos = resp.insumos;
                        console.log(insumos);
                        let table = $('#table_insumos_odon_gral').DataTable();
                        let table_urg = $('#table_insumos_urg').DataTable();
                        let table_odped = $('#table_insumos_odped_urg').DataTable();
                        let table_odped_ = $('#table_insumos_odped').DataTable();

                        //Limpiar la tabla sin perder la configuración de DataTables
                        table.clear();
                        table_urg.clear();
                        table_odped.clear();
                        table_odped_.clear();

                        //Recorrer el array de insumos y agregarlos a la tabla
                        insumos.forEach(insumo => {
                            let total = insumo.cantidad * insumo.valor;
                            if (insumo.presupuesto == 0 || insumo.presupuesto == null) {
                                // Botones de acción
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                            <i class="feather icon-shopping-cart"></i>
                                        </button>
                                        <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                        <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                            } else {
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                        <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                            }
                            if (insumo.urgencia == 0) {
                                table.row.add([
                                    `${insumo.insumos} ${insumo.nombre_marca}`,
                                    insumo.observaciones,
                                    insumo.cantidad, // Cantidad utilizada
                                    formatoMoneda(insumo.valor), // Unidad de medida
                                    formatoMoneda(total),
                                    botones
                                ]);
                                table_odped_.row.add([
                                    `${insumo.insumos} ${insumo.nombre_marca}`,
                                    insumo.observaciones,
                                    insumo.cantidad, // Cantidad utilizada
                                    formatoMoneda(insumo.valor), // Unidad de medida
                                    formatoMoneda(total),
                                    botones
                                ]);
                            } else {
                                table_urg.row.add([
                                    `${insumo.insumos} ${insumo.nombre_marca}`,
                                    insumo.observaciones,
                                    insumo.cantidad, // Cantidad utilizada
                                    formatoMoneda(insumo.valor), // Unidad de medida
                                    formatoMoneda(total),
                                    botones
                                ]);
                                table_odped.row.add([
                                    `${insumo.insumos} ${insumo.nombre_marca}`,
                                    insumo.observaciones,
                                    insumo.cantidad, // Cantidad utilizada
                                    formatoMoneda(insumo.valor), // Unidad de medida
                                    formatoMoneda(total),
                                    botones
                                ]);
                            }

                        });

                        //Dibujar la tabla nuevamente con los nuevos datos
                        table.draw();
                        table_urg.draw();
                        table_odped.draw();
                        table_odped_.draw();

                        $('#contenedor_insumos').empty();
                        insumos.forEach(insumo => {
                            if (insumo.presupuesto == 1 && insumo.urgencia == 0) {
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
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="">
                                                    </div>
                                                    <div class="form-group col-md-3 col-lg-2 fill">
                                                        <label class="floating-label-activo-sm">Total Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
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

                        let table_insumos = $('#presup_insumos_pago').DataTable();

                        //Limpiar la tabla sin perder la configuración de DataTables
                        table_insumos.clear();

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
                                let rowNode = table_insumos.row.add([
                                    `${insumo.insumos} ${insumo.nombre_marca}`,
                                    insumo.observaciones,
                                    insumo.cantidad, // Nombre del insumo
                                    formatoMoneda(insumo.valor), // Cantidad utilizada
                                    0, // Unidad de medida
                                    formatoMoneda(total),
                                    ' <div class="circle ' + clase + '"></div>',
                                    ''

                                ]).draw(false).node();
                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            }

                        });

                        $('#tratamiento_presupuesto tbody').empty();
                        let presupuesto = resp.presupuesto;
                        console.log(presupuesto);
                        $('#tratamiento_presupuesto tbody').append(`
                        <tr>
                            <td class="text-center align-middle">${presupuesto.fecha}</td>
                            <td class="text-center align-middle">${presupuesto.id}</td>
                            <td class="text-center align-middle">${presupuesto.aprobado}</td>
                            <td class="text-center align-middle">Sector I</td>
                            <td class="text-center align-middle">${presupuesto.boca}</td>

                            <td class="text-center align-middle">
                                <div class="form-group col-md-4">
                                    <div class="switch switch-success d-inline m-r-2">
                                        <input type="checkbox" id="info_finalizado" checked="">
                                        <label for="info_finalizado" class="cr"></label>
                                    </div>
                                    <label>Realizado?</label>
                                </div>
                            </td>
                            <td class="text-center align-middle">
                            ${presupuesto.fecha}
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()" ;="">
                                    <i class="fa fa-plus"></i> Trabajar en pieza
                                </button>
                            </td>
                        </tr>
                        `);

                        $('#table_pagos_reasignar_insumos tbody').empty();
                        insumos.forEach(insumo => {
                            if (insumo.presupuesto == 1) {
                                let total = insumo.cantidad * insumo.valor;
                                $('#table_pagos_reasignar_insumos tbody').append(`
                                <tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${total}" data-id="${insumo.id}" data-info="insumo"></td>
                                    <td>${insumo.insumos} ${insumo.nombre_marca}</td>
                                    <td>${insumo.cantidad}</td>
                                    <td>${formatoMoneda(insumo.valor)}</td>
                                    <td>${formatoMoneda(total)}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>
                                </tr>
                            `);
                            }

                        });
                    }
                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });
        }

        function sacar_de_presupuesto_insumo(id) {
            let url = "{{ ROUTE('dental.sacar_tratamiento_presupuesto') }}";
            let data = {
                id: id,
                tipo: 'insumo',
                id_paciente: $('#id_paciente_fc').val(),
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                _token: "{{ csrf_token() }}"
            }
            console.log(data);
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.status == 1) {
                        swal({
                            icon: 'success',
                            title: 'Info',
                            text: resp.mensaje
                        });

                        let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let valores_insumos = resp.valores[2];
                        let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                        $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                        $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                        $('#valores_insumos_presupuesto').html(formatoMoneda(valores_insumos));
                        $('#valores_insumos_presupuesto_conf').html(formatoMoneda(valores_insumos));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                        $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                        $('#subtotal_insumos').val(formatoMoneda(valores_insumos));
                        $('#total_insumos').val(formatoMoneda(valores_insumos));
                        $('#total_presupuesto').val(formatoMoneda(total_general));
                        $('#total_presupuesto_dental').val(total_general);
                        //limpiar_formulario_insumo();

                        let insumos = resp.insumos;
                        let table = $('#table_insumos_odon_gral').DataTable();
                        let table_urg = $('#table_insumos_urg').DataTable();
                        let table_odped = $('#table_insumos_odped_urg').DataTable();
                        let table_odped_ = $('#table_insumos_odped').DataTable();
                        //Limpiar la tabla sin perder la configuración de DataTables
                        table.clear();
                        table_urg.clear();
                        table_odped.clear();
                        table_odped_.clear();

                        //Recorrer el array de insumos y agregarlos a la tabla
                        insumos.forEach(insumo => {
                            let total = insumo.cantidad * insumo.valor;
                            if (insumo.presupuesto == 0 || insumo.presupuesto == null) {
                                // Botones de acción
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                            <i class="feather icon-shopping-cart"></i>
                                        </button>
                                        <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                        <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                            } else {
                                var botones = `
                                    <td>
                                        <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                        <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                            <i class="feather icon-x"></i>
                                        </button>
                                    </td>`;
                            }
                            if (insumo.urgencia == 0) {
                                table.row.add([
                                    `${insumo.insumos} ${insumo.nombre_marca}`,
                                    insumo.observaciones,
                                    insumo.cantidad, // Cantidad utilizada
                                    formatoMoneda(insumo.valor), // Unidad de medida
                                    formatoMoneda(total),
                                    botones
                                ]);
                                table_odped_.row.add([
                                    `${insumo.insumos} ${insumo.nombre_marca}`,
                                    insumo.observaciones,
                                    insumo.cantidad, // Cantidad utilizada
                                    formatoMoneda(insumo.valor), // Unidad de medida
                                    formatoMoneda(total),
                                    botones
                                ]);
                            } else {
                                table_urg.row.add([
                                    `${insumo.insumos} ${insumo.nombre_marca}`,
                                    insumo.observaciones,
                                    insumo.cantidad, // Cantidad utilizada
                                    formatoMoneda(insumo.valor), // Unidad de medida
                                    formatoMoneda(total),
                                    botones
                                ]);
                                table_odped.row.add([
                                    `${insumo.insumos} ${insumo.nombre_marca}`,
                                    insumo.observaciones,
                                    insumo.cantidad, // Cantidad utilizada
                                    formatoMoneda(insumo.valor), // Unidad de medida
                                    formatoMoneda(total),
                                    botones
                                ]);
                            }

                        });

                        //Dibujar la tabla nuevamente con los nuevos datos
                        table.draw();
                        table_urg.draw();
                        table_odped.draw();
                        table_odped_.draw();

                        $('#contenedor_insumos').empty();
                        insumos.forEach(insumo => {
                            if (insumo.presupuesto == 1 && insumo.urgencia == 0) {
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
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="">
                                                    </div>
                                                    <div class="form-group col-md-3 col-lg-2 fill">
                                                        <label class="floating-label-activo-sm">Total Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
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

                        console.log(insumos);
                        let table_insumos = $('#presup_insumos_pago').DataTable();

                        //Limpiar la tabla sin perder la configuración de DataTables
                        table_insumos.clear();

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
                                let rowNode = table_insumos.row.add([
                                    `${insumo.insumos} ${insumo.nombre_marca}`,
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

                        //Dibujar la tabla nuevamente con los nuevos datos
                        table_insumos.draw();
                    } else {
                        swal({
                            icon: 'error',
                            title: 'info',
                            text: resp.mensaje
                        });
                    }


                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });
        }

        function dame_insumo(id){
        $('#id_insumo_editar').val(id);
        let url = '{{ ROUTE("dental.dame_insumo_tto") }}';
        let data = {
            id: id,
            _token: CSRF_TOKEN
        };
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            beforeSend: function(){
                swal({
                    title: "Cargando insumo...",
                    text: "Por favor, espere.",
                    icon: "info",
                    buttons: false,
                    closeOnClickOutside: false,
                    closeOnEsc: false
                });
            },
            success: function(resp){
                console.log(resp);
                swal.close();
                if(resp.mensaje == 'ok'){
                    $('#modal_insumos_editar').modal('show');
                    let insumo = resp.insumo;
                    $('#id_insumo_editar').val(insumo.id);
                    $('#tipoInsumo_editar').val(insumo.id_tipo_insumo);

                    $('#cantidad_editar').val(insumo.cantidad);
                    $('#precio_editar').val(insumo.valor);
                    $('#total_editar').val(insumo.total);
                    $('#insumos_obs_tto_editar').val(insumo.observaciones);
                    let total = insumo.cantidad * insumo.valor;
                    $('#total_editar').val(total);
                    dame_marcas_implantes_editar(insumo.id_tipo_insumo, insumo.insumos, insumo.id_marca);
                }else{
                    swal({
                        title: "Error al cargar el insumo",
                        text: resp.detalle,
                        icon: "error",
                        buttons: "Aceptar"
                    });
                }
            },
            error: function(error) {
                console.error("Error al cargar el insumo:", error);
                swal({
                    title: "Error al cargar el insumo",
                    text: "Por favor, intente nuevamente.",
                    icon: "error",
                    buttons: "Aceptar"
                });
            }
        });
    }

    function dame_marcas_implantes_editar(id, nombreInsumoSeleccionado = null, idMarcaSeleccionada = null){
        console.log(idMarcaSeleccionada);
        let url = '{{ ROUTE("dental.dame_implantes_dental") }}';
        if(id == 1){
            $('#marcas_implantes_select_editar').removeClass('d-none');
            $('#insumos_select_editar').addClass('d-none');
        }else{
            $('#marcas_implantes_select_editar').addClass('d-none');
            $('#insumos_select_editar').removeClass('d-none');
        }
        let data = {
            id_tipo_insumo: id,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                $('#nombreInsumo_editar').empty();
                let insumos = resp;

                insumos.forEach(e => {
                    $('#nombreInsumo_editar').append(`
                        <option value="${e.id}" ${nombreInsumoSeleccionado === e.descripcion ? 'selected' : ''}> ${e.descripcion} </option>
                    `);
                });
                if(idMarcaSeleccionada){
                    $('#marcasImplantes_editar').val(idMarcaSeleccionada);
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

    function editar_insumo_confirmar(){
        let id_tipo_insumo = $('#tipoInsumo_editar').val();
        if(id_tipo_insumo == 1){
            var marcaInsumo = $('#marcasImplantes_editar option:selected').text();
        }else{
            var marcaInsumo = '';
        }
        let data = {
            id: $('#id_insumo_editar').val(),
            id_tipo_insumo: $('#tipoInsumo_editar').val(),
            id_insumo: $('#nombreInsumo_editar').val(),
            insumos: $('#nombreInsumo_editar option:selected').text(),
            id_marca: $('#marcasImplantes_editar').val(),
            observaciones: $('#insumos_obs_tto_editar').val(),
            marca_insumo: marcaInsumo,
            cantidad: $('#cantidad_editar').val(),
            precio: $('#precio_editar').val(),
            id_paciente: $('#id_paciente_fc').val(),
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_presupuesto: $('#id_presupuesto').val(),
            _token: CSRF_TOKEN
        }
        let url = '{{ ROUTE("dental.editar_insumos_tto") }}';
        $.ajax({
            url: url,
            type:'post',
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'ok'){
                    swal({
                        icon:'success',
                        text:'Se a editado insumos correctamente',
                        title:'Exito'
                    });
                    $('#modal_insumos_editar').modal('hide');
                    // Actualiza la tabla o realiza otras acciones necesarias
                    let valores_boca_general = resp.valores[0];
                    let valores_odontograma = resp.valores[1];
                    let valores_insumos = resp.valores[2];
                    let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                    $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                    $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                    $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                    $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                    $('#valores_insumos_presupuesto').html(formatoMoneda(valores_insumos));
                    $('#valores_insumos_presupuesto_conf').html(formatoMoneda(valores_insumos));
                    $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                    $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                    $('#subtotal_insumos').val(formatoMoneda(valores_insumos));
                    $('#total_presupuesto').val(formatoMoneda(total_general));
                    $('#total_insumos').val(formatoMoneda(valores_insumos));
                    $('#total_presupuesto_dental').val(total_general);
                    $('#subtotal_presup').val(formatoMoneda);
                    $('#monto_total').html(formatoMoneda(valores_insumos)+' + '+formatoMoneda(valores_odontograma + valores_boca_general)+' = '+formatoMoneda(total_general));
                    $('#monto_adeudado').html(formatoMoneda(total_general - valores_insumos));


                    let insumos = resp.insumos;
                    console.log(insumos);
                    let table = $('#table_insumos_preimplante').DataTable();

                    //Limpiar la tabla sin perder la configuración de DataTables
                    table.clear();

                    //Recorrer el array de insumos y agregarlos a la tabla
                    insumos.forEach(insumo => {
                        let total = insumo.cantidad * insumo.valor;
                        if(insumo.presupuesto == 0 || insumo.presupuesto == null){
                                // Botones de acción
                            var botones = `
                                <td>
                                    <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                        <i class="feather icon-shopping-cart"></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>`;
                        }else{
                            var botones = `
                                <td>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>`;
                        }
                        table.row.add([
                            insumo.insumos + ' ' + insumo.nombre_marca,         // Nombre del insumo
                            insumo.observaciones,
                            insumo.cantidad,       // Cantidad utilizada
                            formatoMoneda(insumo.valor),         // Unidad de medida
                            formatoMoneda(total),
                            botones
                        ]);
                    });

                    //Dibujar la tabla nuevamente con los nuevos datos
                    table.draw();

                    $('#contenedor_insumos').empty();
                    insumos.forEach(insumo => {
                        if(insumo.presupuesto == 1 && insumo.urgencia == 0){
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
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="">
                                                </div>
                                                <div class="form-group col-md-3 col-lg-2 fill">
                                                    <label class="floating-label-activo-sm">Total Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
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

                    let table_insumos = $('#presup_insumos_pago').DataTable();

                    //Limpiar la tabla sin perder la configuración de DataTables
                    table_insumos.clear();

                    insumos.forEach(insumo => {
                        let total = insumo.cantidad * insumo.valor;
                        if(insumo.presupuesto == 1){
                            if(insumo.estado_pago == 'ok'){
                                var clase = 'bg-success';
                            }else if(insumo.estado_pago == 'intermedio'){
                                var clase = 'bg-warning';
                            }else{
                                var clase = 'bg-danger';
                            }
                            let rowNode = table_insumos.row.add([
                            `${insumo.insumos} ${insumo.nombre_marca}`,
                            insumo.observaciones,
                            insumo.cantidad,         // Nombre del insumo
                            formatoMoneda(insumo.valor),       // Cantidad utilizada
                            0,         // Unidad de medida
                            formatoMoneda(total),
                            ' <div class="circle '+clase+'"></div>',
                            ''

                        ]).draw(false).node();
                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }

                    });

                    table_insumos.draw();

                    $('#table_pagos_reasignar_insumos tbody').empty();
                    insumos.forEach(insumo => {
                        if(insumo.presupuesto == 1){
                            let total = insumo.cantidad * insumo.valor;
                            $('#table_pagos_reasignar_insumos tbody').append(`
                            <tr>
                                <td><input type="checkbox" class="valor-checkbox" data-valor="${total}" data-id="${insumo.id}" data-info="insumo"></td>
                                <td>${insumo.insumos} ${insumo.nombre_marca}</td>
                                <td>${insumo.cantidad}</td>
                                <td>${formatoMoneda(insumo.valor)}</td>
                                <td>${formatoMoneda(total)}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        `);
                        }

                    });
                    let $select = $('#prot_implante_man');

                    // Limpiar opciones actuales
                    $select.empty();

                    // Agregar nuevas opciones desde resp.insumos
                    resp.insumos.forEach(insumo => {
                        let text = insumo.insumos + ' ' + insumo.nombre_marca;
                        let option = new Option(text, insumo.id, false, false); // false para no seleccionar
                        $select.append(option);
                    });

                    // Refrescar Select2
                    $select.trigger('change');
                    let table_urg = $('#table_insumos_urg').DataTable();
                    let table_odped = $('#table_insumos_odped_urg').DataTable();

                    table_urg.clear();
                    table_odped.clear();

                    //Recorrer el array de insumos y agregarlos a la tabla
                    insumos.forEach(insumo => {
                        let total = insumo.cantidad * insumo.valor;
                        if (insumo.presupuesto == 0 || insumo.presupuesto == null) {
                            // Botones de acción
                            var botones = `
                                <td>
                                    <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                        <i class="feather icon-shopping-cart"></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="feather icon-x"></i>
                                    </button>
                                </td>`;
                        } else {
                            var botones = `
                                <td>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="feather icon-x"></i>
                                    </button>
                                </td>`;
                        }
                        if (insumo.urgencia == 0) {

                        } else {
                            table_urg.row.add([
                                `${insumo.insumos} ${insumo.nombre_marca}`,
                                insumo.observaciones,
                                insumo.cantidad, // Cantidad utilizada
                                formatoMoneda(insumo.valor), // Unidad de medida
                                formatoMoneda(total),
                                botones
                            ]);
                            table_odped.row.add([
                                `${insumo.insumos} ${insumo.nombre_marca}`,
                                insumo.observaciones,
                                insumo.cantidad, // Cantidad utilizada
                                formatoMoneda(insumo.valor), // Unidad de medida
                                formatoMoneda(total),
                                botones
                            ]);
                        }

                    });

                    table_urg.draw();
                    table_odped.draw();
                    dame_insumos_tratamiento();
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function pagar_presupuesto_urg(){
        $('#modalPagoUrgencia').modal('show');

        // Cargar la información de pagos al abrir el modal
        actualizar_presupuesto_urgencia();
    }

     function procesarPagoUrgencia(){
            let monto = $('#monto_pago_urgencia').val();
            let metodo = $('#metodo_pago_urgencia').val();
            let id_ficha_atencion = $('#id_fc').val();
            let id_paciente = $('#id_paciente_fc').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let id_profesional = $('#id_profesional').val();

            if(monto && metodo) {
                let data = {
                    monto: monto,
                    metodo: metodo,
                    id_ficha_atencion: id_ficha_atencion,
                    id_paciente: id_paciente,
                    id_lugar_atencion: id_lugar_atencion,
                    id_profesional: id_profesional,
                    _token: CSRF_TOKEN
                }

                console.log(data);
                // Enviar los datos por AJAX
                $.ajax({
                    url: '{{ ROUTE("dental.confirmar_pago_urgencias_dental") }}',
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
                            actualizar_presupuesto_urgencia();
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
                                            <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id},'urg')"><i class="feather icon-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>`;
                                } else {
                                    var botones = `
                                        <td>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                                <i class="fas fa-save"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id},'urg')"><i class="feather icon-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
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

                            // Limpiar formulario después del pago exitoso
                            $('#monto_pago_urgencia').val('');
                            $('#metodo_pago_urgencia').val('');
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
            } else {
                swal({
                    title: "Error",
                    text: "Por favor, complete todos los campos.",
                    icon: "error",
                    button: "Aceptar",
                });
            }
        }
</script>
