    <div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
        <div class="col-md-12 py-0 px-2 shadow-none">
            <div class="row mx-0">
                <div class="col-md-12">
                </div>
            </div>
            <div class="row mx-1 mt-1">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-0 pt-3">
                            <h4 class="text-c-blue float-left d-inline">Ficha Médica Única</h4>
                            {{--<button type="button" class="btn btn-xs btn-danger d-inline float-right ml-2 mb-2"><i class="feather icon-x"></i> Cerrar</button> --}}
                            {{--<button type="button" class="btn btn-xs btn-primary d-inline float-right ml-2 mb-2"><i class="feather icon-printer"></i> Imprimir</button>--}}
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                            <div class="card shadow">
                                <div class="card-body pb-0 pt-2 pb-2">
                                    <div class="row align-middle">
                                        <div class="col-sm-12 col-md-2">
                                            <img class="img-fluid wid-70 rounded-circle mt-2 " src="{{ asset('images/iconos/paciente-f.svg') }}">
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <p><i class="feather icon-user"></i><strong> Paciente</strong> <br><span id="nombre">{{$paciente->nombres}}{{$paciente->apellido_uno}} {{$paciente->apellido_dos}}</span><br>(<strong> Rut </strong>{{$paciente->rut}} )
                                            </p>
                                        </div>
                                        <div class="col-sm-6  col-md-2">
                                            <p><i class="feather icon-calendar"></i><strong> Edad</strong> <br>{{ $paciente->edad }} <br> {{$paciente->fecha_nac}}</p>
                                        </div>
                                        <div class="col-sm-6  col-md-2">
                                            <p><i class="feather icon-user"></i><strong> Sexo</strong> <br>{{$paciente->sexo}}</p>
                                        </div>
                                        <div class="col-sm-6  col-md-3">
                                            <p><i class="feather icon-home"></i><strong> Dirección</strong> <br>Jorge Llanos, 153. Los Andes. Región de Valparaíso <br>{{$paciente->telefono_uno}} / {{$paciente->telefono_dos}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <!--INFORMACIÓN PACIENTE-->
                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-c-blue">Información del paciente</h6>
                                    <hr>
                                    <ul>
                                        <li><i class="feather icon-droplet"></i><strong> Grupo sanguíneo</strong></li>
                                        <li class="text-danger"><span id="grupo_sanguineo" >
                                            </span></li>
                                    </ul>
                                    <ul>
                                        <li><i class="feather icon-heart "></i> <strong>Paciente crónico</strong></li>
                                        <li>Diabetes</li>
                                        <li>Hipertensión</li>
                                        <li>Cáncer de colon</li>
                                    </ul>
                                    <ul>
                                        <li><i class=""></i> <strong>Alergias medicamentos</strong></li>
                                        <li>Diabetes</li>
                                    </ul>
                                    <ul>
                                        <li><i class=""></i> <strong>Alergias generales</strong></li>
                                        <li>Diabetes</li>
                                    </ul>
                                    <ul>
                                        <li><i class=""></i> <strong>Cirugías</strong></li>
                                        <li>Diabetes</li>
                                    </ul>
                                    <ul>
                                        <li><i class=""></i> <strong>Medicamentos de uso crónico</strong></li>
                                        <li>Diabetes</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--LADO DERECHO-->
                        <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="enf-cron">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#cabecera_info" aria-expanded="false" aria-controls="cabecera_info">
                                                @php
                                                    $cantidad_ante_cronicos = 0;
                                                    $cantidad_ante_alergias = 0;
                                                @endphp
                                                @foreach ($antecedentes as $data)
                                                    @if($data->id_tipo_antecedente==2)
                                                        @php
                                                            $cantidad_ante_cronicos++;
                                                        @endphp
                                                    @endif
                                                    @if($data->id_tipo_antecedente==6)
                                                        @php
                                                            $cantidad_ante_alergias++;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                {{$paciente->nombres}} {{$paciente->apellido_uno}} {{$paciente->apellido_dos}}; <span style="font-weight: bold;">{{ \Carbon\Carbon::parse($paciente->fecha_nac)->age }} Años</span>; Grupo sanguíneo: <span style="color: #ff0000;font-weight: bold;">{{$grupo_sanguineo->nombre_gs}}</span> Paciente Crónico: {!! ($antecedentes_paciente->transfusion == '1'?'<span style="color: #ff0000;font-weight: bold;">SI</span>':'<span style="color: #000000;font-weight: bold;">NO</span>') !!}; Transfuciones: {!! ($cantidad_ante_cronicos > 0?'<span style="color: #ff0000;font-weight: bold;">SI</span>':'<span style="color: #000000;font-weight: bold;">NO</span>') !!}; Alergias:{!! ($cantidad_ante_alergias > 0?'<span style="color: #ff0000;font-weight: bold;">SI</span>':'<span style="color: #000000;font-weight: bold;">NO</span>') !!}
                                            </button>
                                        </div>

                                        <div id="cabecera_info" class="collapse" aria-labelledby="enf-cron" data-parent="#cabecera_info">
                                            <div class="card-body-aten-a">
                                                <div class="row mt-3">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pb-4">
                                                        <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="seccion_ident_contacto-tab" data-toggle="tab" href="#seccion_ident_contacto" role="tab" aria-controls="seccion_ident_contacto" aria-selected="true">Identificacion y Contacto</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="seccion_enfer_cronicas-tab" data-toggle="tab" href="#seccion_enfer_cronicas" role="tab" aria-controls="seccion_enfer_cronicas" aria-selected="false">Enfermedades Cronicas</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="seccion_alergias-tab" data-toggle="tab" href="#seccion_alergias" role="tab" aria-controls="seccion_alergias" aria-selected="false">Alergias</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="seccion_ultimas_cirugia-tab" data-toggle="tab" href="#seccion_ultimas_cirugia" role="tab" aria-controls="seccion_ultimas_cirugia" aria-selected="false">Ultimas Cirugias</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="seccion_ultimo_tratamiento-tab" data-toggle="tab" href="#seccion_ultimo_tratamiento" role="tab" aria-controls="seccion_ultimo_tratamiento" aria-selected="false">Ultimos Tratamientos</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="tab-content" id="at-oftalmo">
                                                            {{-- INFORMACION DE CONTACTO --}}
                                                            <div class="tab-pane fade show active" id="seccion_ident_contacto" role="tabpanel" aria-labelledby="seccion_ident_contacto-tab">
                                                                <div class="row align-middle">
                                                                    <div class="col-sm-6 col-md-3">
                                                                        <p>
                                                                            <i class="feather icon-user"></i>
                                                                            <strong> Paciente</strong><br>
                                                                            <label for="inputEmail4">
                                                                                <span id="nombre">Nombre: <strong>{{$paciente->nombres}}</strong><br> Apellidos: <strong>{{$paciente->apellido_uno}} {{$paciente->apellido_dos}}</strong></span><br>
                                                                                <span>RUT: <strong>{{$paciente->rut}}</strong></span>
                                                                            </label>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-sm-6  col-md-3">
                                                                        <p>
                                                                            <i class="feather icon-calendar"></i>
                                                                            <strong> F. Nacimiento - Edad</strong><br>
                                                                            <span>Edad: <strong>{{ \Carbon\Carbon::parse($paciente->fecha_nac)->age }}</strong><span><br>
                                                                            <span>FN: <strong>{{ date('d-m-Y', strtotime($paciente->fecha_nac)) }}</strong><span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-sm-6  col-md-2">
                                                                        @php
                                                                            $sexos = array(
                                                                                'M' => 'Masculino',
                                                                                'F' => 'Femenino'
                                                                            );
                                                                        @endphp
                                                                        <p><i class="feather icon-user"></i><strong> Sexo</strong> <br>{{$sexos[$paciente->sexo]}}</p>
                                                                    </div>
                                                                    <div class="col-sm-6  col-md-4">
                                                                        <p><i class="feather icon-home"></i><strong> Dirección</strong> <br>{{$direccion->direccion}} {{$direccion->numero}}, {{$direccion->ciudad}},{{$direccion->region}} <br>{{$paciente->telefono_uno}} / {{$paciente->telefono_dos}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- informacion de enfermedades cronicas  --}}
                                                            <div class="tab-pane fade" id="seccion_enfer_cronicas" role="tabpanel" aria-labelledby="seccion_enfer_cronicas-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <table id="table_enfermedades_cronicas" class="display table table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>NOMBRE</th>
                                                                                    <th>COMENTARIO</th>
                                                                                    <th>PROFESIONAL</th>
                                                                                    <th>FECHA</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($antecedentes as $data)
                                                                                    @if($data->id_tipo_antecedente==2)
                                                                                        <tr>
                                                                                            <td>{{ $data->antecedente_data->nombre }} </td>
                                                                                            <td>{{ $data->comentario }} </td>
                                                                                            <td>{{ $data->antecedente_data->profesional }}  <br/>{{ $data->antecedente_data->rut_responsable }}</td>
                                                                                            <td>{{ date('d-m-Y', strtotime($data->antecedente_data->fecha_regitro)) }} </td>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- informacion de alergias --}}
                                                            <div class="tab-pane fade" id="seccion_alergias" role="tabpanel" aria-labelledby="seccion_alergias-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <table id="table_alergias" class="display table table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>NOMBRE</th>
                                                                                    <th>COMENTARIO</th>
                                                                                    <th>FECHA</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($antecedentes as $data)
                                                                                    @if($data->id_tipo_antecedente==6)
                                                                                        <tr>
                                                                                            <td>{{ $data->antecedente_data->nombre }}</td>
                                                                                            <td>{{ $data->antecedente_data->comentario }}</td>
                                                                                            <td>{{ date('d-m-Y', strtotime($data->antecedente_data->fecha_regitro)) }}</td>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- informacion de cirugias --}}
                                                            <div class="tab-pane fade" id="seccion_ultimas_cirugia" role="tabpanel" aria-labelledby="seccion_ultimas_cirugia-tab">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <table id="table_alergias" class="display table table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>FECHA CIRUGIA</th>
                                                                                    <th>PROCEDIMIENTO</th>
                                                                                    <th>COMENTARIO</th>
                                                                                    <th>PROFESIONAL</th>
                                                                                    <th>FECHA REGISTRO</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($antecedentes as $data)
                                                                                    @if($data->id_tipo_antecedente==3)
                                                                                        <tr>
                                                                                            <td>{{ date('d-m-Y', strtotime($data->antecedente_data->fecha)) }}</td>
                                                                                            <td>{{ $data->antecedente_data->procedimiento }}</td>
                                                                                            <td>{{ $data->antecedente_data->comentario }}</td>
                                                                                            <td>{{ $data->antecedente_data->profesional }} <br/>{{ $data->antecedente_data->rut_responsable }}</td>
                                                                                            <td>{{ date('d-m-Y', strtotime($data->antecedente_data->fecha_regitro)) }}</td>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="tab-pane fade" id="seccion_ultimo_tratamiento" role="tabpanel" aria-labelledby="seccion_ultimo_tratamiento-tab">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        {!! $datos->tratamientos_activos !!}
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
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                    {{-- <button type="button" class="btn btn-xs btn-primary-light-c mb-1" onclick="cirugias_fmu();">Cirugías</button> --}}
                                    {{-- <button type="button" class="btn btn-xs btn-primary-light-c mb-1" onclick="alergias_fmu();">Alergias</button> --}}
                                    <button type="button" class="btn btn-xs btn-primary-light-c mb-1" onclick="responsables_fmu();"><i class="feather icon-users"></i> Responsables</button>
                                    <button type="button" class="btn btn-xs btn-primary-light-c mb-1" onclick="confidencial_fmu();"><i class="feather icon-lock"></i> Confidencial</button>
                                    {{-- <button type="button" class="btn btn-xs btn-primary-light-c mb-1" onclick="trat_act_fmu();"><i class="feather icon-file-plus"></i> Tratamientos activos</button> --}}
                                    <button type="button" class="btn btn-xs btn-danger mb-1" onclick="c_sos_fmu();"><i class="feather icon-phone"></i> Contacto de emergencia</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <div class="card border-card-primary h-100">
                                        <div class="card-body">
                                            <ul>
                                                <li><strong>Tratamientos en curso</strong></li>
                                                <li>No hay registros</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <div class="card border-card-primary h-100">
                                        <div class="card-body">
                                            <ul>
                                                <li><strong>Cirugías recientes</strong></li>
                                                <li>No hay registros</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <div class="card border-card-primary h-100">
                                        <div class="card-body">
                                            <ul>
                                                <li><strong>Medicamentos recientes</strong></li>
                                                <li>No hay registros</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <div class="card border-card-primary h-100">
                                        <div class="card-body">
                                            <ul>
                                                <li><strong>Prótesis y ortesis</strong></li>
                                                <li>No hay registros</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                    <h5 class="text-c-blue mt-2">Historia médica</h5>
                                </div>
                                <!--HISTORIAL-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="enf-cron">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#enf-cron-c" aria-expanded="false" aria-controls="enf-cron-c">
                                            Control de enfermedades crónicas
                                            </button>
                                        </div>
                                        <div id="enf-cron-c" class="collapse" aria-labelledby="enf-cron" data-parent="#mot-consulta">
                                            <div class="card-body-aten-a shadow-none">
                                                <form>
                                                    <div class="form-row">

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--HISTORIAL-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="mot-consulta">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#odonto-c" aria-expanded="false" aria-controls="odonto-c">
                                            Historial odontológico
                                            </button>
                                        </div>
                                        <div id="odonto-c" class="collapse" aria-labelledby="odonto" data-parent="#mot-consulta">
                                            <div class="card-body-aten-a shadow-none">
                                                <form>
                                                    <div class="form-row">

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--HISTORIAL-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="nino-sano">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#nino-sano-c" aria-expanded="false" aria-controls="nino-sano-c">
                                            Historial de niño sano
                                            </button>
                                        </div>
                                        <div id="nino-sano-c" class="collapse" aria-labelledby="mot-consulta" data-parent="#nino-sano">
                                            <div class="card-body-aten-a shadow-none">
                                                <form>
                                                    <div class="form-row">

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--HISTORIAL-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="etc">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#etc-c" aria-expanded="false" aria-controls="etc-c">
                                            Historial Médico
                                            </button>
                                        </div>
                                        <div id="etc-c" class="collapse" aria-labelledby="etc" data-parent="#mot-consulta">
                                            <div class="card-body-aten-a shadow-none">
                                                <div class="row">
                                                    <div class="col-sm-12 pb-4">
                                                        <table id="table_atenciones_profesional" class="display table table-striped dt-responsive nowrap table-xs pb-4" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center align-middle">Fecha</th>
                                                                    <th class="text-center align-middle">Profesional</th>
                                                                    <th class="text-center align-middle">Diagnóstico</th>
                                                                    <th class="text-center align-middle">Recetas</th>
                                                                    <th class="text-center align-middle">Exámenes</th>
                                                                    <!--<th class="text-center align-middle">Archivos </th>
                                                                    <th class="text-center align-middle">Ficha</th>-->
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @if (isset($fichas) && $fichas->count() > 0)
                                                                    @foreach ($fichas as $f)
                                                                        <tr>
                                                                            <td class="text-center align-middle">
                                                                                {{ \Carbon\Carbon::parse($f->created_at)->format('d/m/Y') }}
                                                                            </td>

                                                                            <td class="text-center align-middle">{{ $f->profesional->nombre }} {{ $f->profesional->apellido_uno }} {{ $f->profesional->apellido_dos }}<br>
                                                                                @foreach ($especialidad as $esp)
                                                                                    @if($esp->id==$f->profesional->id_especialidad)
                                                                                    <b>{{ $esp->nombre }}<b><br>
                                                                                    @endif
                                                                                @endforeach
                                                                                {{--@foreach ($sub_tipo_especialidad as $sub_esp)
                                                                                    @if($sub_esp->id==$f->profesional->id_sub_tipo_especialidad)
                                                                                <b>{{ $sub_esp->nombre }}<b><br>
                                                                                    @endif
                                                                                @endforeach --}}
                                                                            </td>

                                                                            <td class="text-center align-middle">{{ $f->hipotesis_diagnostico }}</td>

                                                                            <td class="text-center align-middle">
                                                                                <a class="badge badge-light-warning"  @if (isset($f->id)) onclick="buscar_receta({{ $f->id }});" @endif><i class="feather icon-file-plus"></i> Ver</a>
                                                                            </td>

                                                                            <td class="text-center align-middle">
                                                                                <a class="badge badge-light-success" @if (isset($f->id)) onclick="buscar_examenes_fmu({{ $f->id }});" @endif><i class="feather icon-activity"></i> Ver</a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    <span>
                                                                        <h5>no existen registros</h5>
                                                                    </span>
                                                                @endif
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
    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/ficha_medica_unica.css?t=<?=time()?>'>
    <!-- Estilo cards -->
    <link rel="stylesheet" href="{{ asset('css/iconos-sdi.css') }}">





    <style type="text/css">
        .auth-wrapper{

        background-color: #f3f3f3!important;

        }
    </style>



    @include('template.include.nocomplatible')

  {{--  @include("atencion_medica.secciones_ficha.modales_fmu.responsables")
    @include("atencion_medica.secciones_ficha.modales_fmu.cirugias")
    @include("atencion_medica.secciones_ficha.modales_fmu.alergias")
    @include("atencion_medica.secciones_ficha.modales_fmu.confidencial")
    @include("atencion_medica.secciones_ficha.modales_fmu.trat_act")
    @include("atencion_medica.secciones_ficha.modales_fmu.c_sos")
    {{--  @include("atencion_medica.secciones_ficha.modales_fmu.hist_medico_exa")  --}}
  {{--  @include("atencion_medica.secciones_ficha.modales_fmu.hist_medico_examenes")
    @include("atencion_medica.secciones_ficha.modales_fmu.hist_medico_recetas")
    @include("atencion_medica.secciones_ficha.modales_fmu.hist_medico")--}}



    <!-- Tablas ficha médica única-->
    <script src="{{ asset('js/tablas_patologias_cronicas_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_tratamientos_antecedentes_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_odontologia_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_obstetricos_control_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_informacion_confidencial_fmu.js') }}"></script>
    <script src="{{ asset('/js/ficha_medica/main.js') }}"></script>





	<!--Modals-->

	<script>
		function responsables_fmu() {
	        $('#responsables').modal('show');
	    	}

	   	function c_sos_fmu() {
	        $('#c_sos').modal('show');
	    }

	    function cirugias_fmu() {
	        $('#cirugias').modal('show');
	    }

	    function alergias_fmu() {
	        $('#alergias').modal('show');
	    }

	    function confidencial_fmu() {
	        $('#confidencial').modal('show');
	    }

	    function trat_act_fmu() {
	        $('#trat_act').modal('show');
	    }

        function buscar_receta(id_ficha_clinica)
        {

            {{--  url = '{{ route('buscar.recetas') }}';  --}}
            url = "{{ route('detalle_receta.ver_medicamentos') }}";
            id_ficha = id_ficha_clinica;
            $('#tabla_receta tbody').empty();

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_ficha: id_ficha
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    if (data != null) {

                        $('#id_ficha_receta').text('Receta de Paciente: ' + data.paciente.nombre_paciente);

                        if(data.estado == 1)
                        {
                            $('#tabla_atenciones_previas_receta tbody').html('');
                            $.each(data.registros, function(index, value)
                            {
                                var fecha = formatDate(value.created_at);
                                //var salida = formato(fecha);
                                var medicamento = value.producto;
                                var presentacion = value.presentacion;
                                var posologia = value.posologia;
                                var via_administracion = value.via_administracion;
                                var periodo = value.periodo;
                                var uso_cronico = value.uso_cronico;
                                var cantidad_compr = value.cantidad_compra;

                                if(uso_cronico == 1)
                                    uso_cronico = 'USO CRONICO';
                                else
                                    uso_cronico = 'NORMAL';

                                var j = 1; //contador para asignar id al boton que borrara la fila
                                var fila =  '<tr class="tr_receta" id="row' + j + '">'+
                                                '<td>' + fecha + '</td>'+
                                                '<td>' + medicamento + '</td>'+
                                                '<td>' + presentacion + '</td>'+
                                                '<td>' + posologia + '</td>'+
                                                '<td>' + via_administracion + '</td>'+
                                                '<td>' + periodo + '</td>'+
                                                '<td>' + uso_cronico + '</td>'+
                                                '<td>' + cantidad_compr + '</td>'+
                                            '</tr>';
                                            //esto seria lo que contendria la fila

                                $('#tabla_atenciones_previas_receta tbody').append(fila);
                            });
                        }
                        else
                        {
                            $('#tabla_atenciones_previas_receta tbody').html('');
                            var fila = '<tr><td colspan="8"><span><h5>no existen registros</h5></span></td></tr>';
                            $('#tabla_atenciones_previas_receta tbody').append(fila);
                        }

                    } else {
                        $('#tabla_atenciones_previas_receta tbody').html('');
                        var fila = '<tr><td colspan="8"><span><h5>no existen registros</h5></span></td></tr>';
                        $('#tabla_atenciones_previas_receta tbody').append(fila);
                    }
                    $('#m_cons_receta').modal('show');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

                $('#tabla_atenciones_previas_receta').dataTable().fnClearTable();
                $('#tabla_atenciones_previas_receta').dataTable().fnDestroy();
                $('#tabla_atenciones_previas_receta').DataTable({
                    responsive: true,
                    "bPaginate": false,
                });

            }


            function buscar_examenes_fmu(id_ficha_clinica)
                        {

                        {{-- url = "{{ route('buscar.examenes_ficha') }}"; --}}
                        url = "{{ route('examenes.ver_examenes') }}";
                        id_ficha = id_ficha_clinica;
                        $('#table_atecion_previa_tabla_examen_paciente tbody').html('');

                        $.ajax({
                                url: url,
                                type: "get",
                                data: {
                                    id_ficha_atencion: id_ficha
                                },
                                dataType: "json",
                            })
                            .done(function(data) {
                                if (data != null) {

                                    $('#id_ficha_examen').text('Exámenes de: ' + data.paciente.nombre_paciente);
                                    if(data.estado == 1)
                                    {
                                        $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                                        var j = 1; //contador para asignar id al boton que borrara la fila
                                        $.each(data.registros, function(index, value)
                                        {
                                            var fecha = formatDate(value.created_at);
                                            //var salida = formato(fecha);
                                            var examen = value.examen;
                                            var tipo_examen = value.tipo_examen;
                                            var prioridad = value.id_prioridad;

                                            switch (prioridad) {
                                                case 1:
                                                    prioridad = 'Baja';
                                                    break;
                                                case 2:
                                                    prioridad = 'Media';
                                                    break;
                                                case 3:
                                                    prioridad = 'Alta';
                                                    break;
                                                case 4:
                                                    prioridad = 'Urgente';
                                                    break;

                                                default:
                                                    prioridad = 'Sin Prioridad';
                                                    break;
                                            }

                                            var fila = '';
                                            fila += '<tr class="tr_examen" id="row' + j + '">';
                                            fila += '    <td class="text-center align-middle">' + fecha + '</td>';
                                            fila += '    <td class="text-center align-middle">' + examen + '</td>';
                                            fila += '    <td class="text-center align-middle">' + tipo_examen + '</td>';
                                            fila += '    <td class="text-center align-middle">' + prioridad + '</td>';
                                            fila += '</tr>'; //esto seria lo que contendria la fila

                                            j++;

                                            $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);

                                        });
                                    }
                                    else
                                    {
                                        $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                                        var fila = '<tr><td colspan="4"><span><h5>no existen registros</h5></span></td></tr>';
                                        $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);
                                    }

                                }
                                else
                                {
                                    $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                                    var fila = '<tr><td colspan="4"><span><h5>no existen registros</h5></span></td></tr>'
                                    $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);
                                }
                                $('#m_cons_ex').modal('show');
                            })
                            .fail(function(jqXHR, ajaxOptions, thrownError) {
                                console.log(jqXHR, ajaxOptions, thrownError)
                            });

                            $('#table_atecion_previa_tabla_examen_paciente').dataTable().fnClearTable();
                            $('#table_atecion_previa_tabla_examen_paciente').dataTable().fnDestroy();
                            $('#table_atecion_previa_tabla_examen_paciente').DataTable({
                                responsive: true,
                                "bPaginate": false,
                            });

                    }


                    function buscar_archivos(id_ficha_clinica)
                    {

                        url = "{{ route('ficha_atencion.ver_archivos') }}";
                        id_ficha = id_ficha_clinica;
                        $('#table_atenciones_previas_archivos tbody').html('');

                        $.ajax({
                                url: url,
                                type: "get",
                                data: {
                                    id_ficha_atencion: id_ficha
                                },
                                dataType: "json",
                            })
                            .done(function(data) {
                                if (data != null) {

                                    $('#m_cons_archivosLabel').text('Documentos de esta consulta del Paciente: ' + data.paciente.nombre);
                                    if(data.estado == 1)
                                    {
                                        $('#table_atenciones_previas_archivos tbody').html('');
                                        var j = 1; //contador para asignar id al boton que borrara la fila
                                        $.each(data.registros, function(index, value)
                                        {
                                            var fecha = formatDate(value.fecha);
                                            var tipo = value.tipo;
                                            var id = value.id;
                                            var id_ficha_archivo = value.id_ficha;
                                            var url = value.url;

                                            var metodo='';
                                            switch (tipo) {
                                                case 'Certificado de Reposo':
                                                    metodo = 'ver_pdf_certificado_reposo';
                                                    break;
                                                case 'Interconsulta':
                                                    metodo = '';
                                                    break;
                                                case 'Informen Medico':
                                                    metodo = 'ver_pdf_informe_medico';
                                                    break;
                                                case 'Uso Personal':
                                                    metodo = 'ver_pdf_uso_personal';
                                                    break;

                                                default:
                                                    metodo = '';
                                                    break;
                                            }

                                            var fila = '';
                                            fila += '<tr class="tr_examen" id="row' + j + '">';
                                            fila += '    <td class="text-center align-middle">' + fecha + '</td>';
                                            fila += '    <td class="text-center align-middle">' + tipo + '</td>';
                                            if(metodo != '')
                                                fila += '    <td class="text-center align-middle"><div onclick="'+metodo+'('+id_ficha_archivo+'); $(\'#m_cons_archivos\').modal(\'hide\');" class="btn btn-success btn-sm has-ripple"><i class="feather icon-folder"></i> Ver Archivo</div></td>';
                                            else
                                                fila += '    <td class="text-center align-middle"><div class="btn btn-success btn-sm has-ripple disabled"><i class="feather icon-folder"></i> Ver Archivo</div></td>';
                                            fila += '</tr>';

                                            j++;

                                            $('#table_atenciones_previas_archivos tbody').append(fila);

                                        });
                                    }
                                    else
                                    {
                                        $('#table_atenciones_previas_archivos tbody').html('');
                                        var fila = '<tr><td colspan="3"><span><h5>no existen registros</h5></span></td></tr>';
                                        $('#table_atenciones_previas_archivos tbody').append(fila);
                                    }

                                }
                                else
                                {
                                    $('#table_atenciones_previas_archivos tbody').html('');
                                    var fila = '<tr><td colspan="3"><span><h5>no existen registros</h5></span></td></tr>'
                                    $('#table_atenciones_previas_archivos tbody').append(fila);
                                }
                                $('#m_cons_archivos').modal('show');
                            })
                            .fail(function(jqXHR, ajaxOptions, thrownError) {
                                console.log(jqXHR, ajaxOptions, thrownError)
                            });

                            $('#table_atenciones_previas_archivos').dataTable().fnClearTable();
                            $('#table_atenciones_previas_archivos').dataTable().fnDestroy();
                            $('#table_atenciones_previas_archivos').DataTable({
                                responsive: true,
                                "bPaginate": false,
                            });



                    }

                    function  buscar_ficha_atencion(id_ficha_atencion)
                    {
                        let url = "{{ route('ficha_clinica.get_ficha') }}";


                        $.ajax({
                                url: url,
                                type: 'GET',
                                data: {
                                    id_ficha_atencion: id_ficha_atencion,
                                },
                            })
                            .done(function(response) {

                                if (response != '') {

                                    if (response['estado'] == '1')
                                    {
                                        $('#m_consultaantLabel').html( 'Datos de Consulta de: '+response.paciente.nombre);
                                        $('#label_motivo').html(response.registros.motivo);
                                        $('#label_examen_fisico').html(response.registros.examen_fisico);
                                        $('#label_antecedentes').html(response.registros.antecedentes);
                                        $('#label_diagnostico').html(response.registros.hipotesis_diagnostico);


                                    } else {
                                        $('#label_motivo').html('');
                                        $('#label_examen_fisico').html('');
                                        $('#label_antecedentes').html('');
                                        $('#label_diagnostico').html('');
                                    }
                                    $('#m_consultaant').modal('show');
                                }
                            })
                            .fail(function(e) {
                                console.log("error");
                                console.log(e);
                            });
                    }

                    function formatDate(date) {
                        var d = new Date(date),
                            month = '' + (d.getMonth() + 1),
                            day = '' + d.getDate(),
                            year = d.getFullYear();

                        if (month.length < 2)
                            month = '0' + month;
                        if (day.length < 2)
                            day = '0' + day;

                        return [day, month, year].join('-');
                    }

    </script>

