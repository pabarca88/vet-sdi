
<br>
    <div class="user-profile user-card mt-0 mt-n4" style="background-color: #ecf0f5!important;">
        <div class="col-md-12 py-0 px-1 shadow-none">
            <div class="row mx-0">
                <div class="col-md-12">
                </div>
            </div>
            <div class="row mx-1  mt-3">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h4 class="text-c-blue text-center mb-4 mt-3 f-26">Ficha Veterinaria Única</h4>
                    {{--<button type="button" class="btn btn-xs btn-danger d-inline float-right ml-2 mb-2"><i class="feather icon-x"></i> Cerrar</button> --}}
                </div>
            </div>
            <div class="row mx-1">
                <!--DATOS MÉDICOS-->
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row">
                        <!--NOMBRE-->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-3">
                            <div class="card rounded-xl" id="enf-cron">
                                        @php
                                            $cantidad_ante_cronicos = 0;
                                            $cantidad_ante_alergias = 0;
                                            $cantidad_ante_discapacidad = 0;
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
                                            @if($data->id_tipo_antecedente==8)
                                                @php
                                                    $cantidad_ante_discapacidad++;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <input type="hidden" name="id_paciente" id="id_paciente" value="{{ $paciente->id }}">
                                        <div class="row px-2 py-1">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="media">
                                                  <img class="img-radius img-fluid wid-70 mr-3 align-self-center" id="profile-image" src="{{ $paciente->foto_perfil ? $paciente->foto_perfil : asset('images/iconos/usuario_profesional.svg') }}" alt="User image">
                                                    <div class="media-body">
                                                        <div class="row">
                                                            <div class="col-12 mb-3">
                                                                <h6 class="f-16"><span class="text-c-blue">{{$paciente->nombres}} {{$paciente->apellido_uno}} {{$paciente->apellido_dos}} </span><br><small>N° Microchip ({{$paciente->rut}})</small><h6>
                                                            </div>

                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-2">
                                                                    <h6 class="f-16"><span class="text-c-blue">{{ \Carbon\Carbon::parse($paciente->fecha_nac)->age }} Años</span> <br><small>({{ date('d-m-Y', strtotime($paciente->fecha_nac)) }})</small></h6>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-2">
                                                                @php
                                                                    $sexos = array(
                                                                        'M' => 'Masculino',
                                                                        'F' => 'Femenino'
                                                                    );
                                                                @endphp
                                                                <h6 class="f-16"><span class="text-c-blue">{{$sexos[$paciente->sexo]}}</span></h6>
                                                                <p>Sexo</p>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-2">
                                                                <h6 class="f-16"><span class="text-c-blue">N/N</span></h6>
                                                                <p>Especie</p>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-2">
                                                                <h6 class="f-16"><span class="text-c-blue">-</span></h6>
                                                                <p>Raza</p>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-2">
                                                                <h6 class="f-16"><span class="text-c-blue">-</span></h6>
                                                                <p>Tamaño</p>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-2">
                                                                <h6 class="f-16"><span class="text-c-blue">Blanco</span></h6>
                                                                <p>Color</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
       
                                

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 col-xxl-9">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body px-2 py-1">
                                            <div class="media">
                                              <img src="{{ asset('images/iconos/gruposanguineo.png') }}"  class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="...">
                                              <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1 text-danger">Grupo Sanguíneo</h5>
                                                <h5 class="mt-0 text-danger">B+</h5>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body px-2 py-1">
                                            <div class="media">
                                              <img src="{{ asset('images/iconos/alergias.png') }}"  class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="...">
                                              <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1">Alergias</h5>
                                                <h5 class="mt-0 text-danger">SI</h5>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body px-2 py-1">
                                            <div class="media">
                                              <img src="{{ asset('images/iconos/peso.png') }}"  class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="...">
                                              <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1">Peso</h5>
                                                <h5 class="mt-0 text-info">2 kg y 34 gr</h5>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body px-2 py-1">
                                            <div class="media">
                                              <img src="{{ asset('images/iconos/enfermedad-cronica.png') }}"  class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="...">
                                              <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1">Paciente crónico</h5>
                                                <h5 class="mt-0 text-info">NO</h5>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body px-2 py-1">
                                             <div class="media">
                                            <img src="{{ asset('images/iconos/transfusion.jpg') }}"  class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="...">
                                              <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1">Transfusiones</h5>
                                                <h5 class="mt-0 text-danger">SI</h5>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body px-2 py-1">
                                             <div class="media">
                                            <img src="{{ asset('images/iconos/discapacidad.png') }}"  class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="...">
                                              <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1">Discapacidad</h5>
                                                <h5 class="mt-0">-</h5>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body px-2 py-1">
                                             <div class="media">
                                            <img src="{{ asset('images/iconos/esterilizacion.png') }}"  class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="...">
                                              <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1">Esterilizado/a</h5>
                                                <h5 class="mt-0 text-info">SI</h5>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body px-2 py-1">
                                             <div class="media">
                                            <img src="{{ asset('images/iconos/microchip.png') }}"  class="wid-35 rounded-xl mr-3 align-self-center mr-3" alt="...">
                                              <div class="media-body">
                                                <h5 class="mt-0 mb-1 pt-1">N° Microchip</h5>
                                                <h5 class="mt-0 text-info">38293892</h5>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <button class="btn btn-purple-light-c shadow-sm rounded-xl pt-3 pb-4 btn-block collapsed" type="button" data-toggle="collapse" data-target="#cabecera_info" aria-expanded="false" aria-controls="cabecera_info">
                                        <i class="feather icon-plus"></i> Ver más información
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--INFO-->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card  rounded-xl">
                                <div class="card-header-fmu border-none" style="border:0px!important;" id="enf-cron">
                                        @php
                                            $cantidad_ante_cronicos = 0;
                                            $cantidad_ante_alergias = 0;
                                            $cantidad_ante_discapacidad = 0;
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
                                            @if($data->id_tipo_antecedente==8)
                                                @php
                                                    $cantidad_ante_discapacidad++;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <input type="hidden" name="id_paciente" id="id_paciente" value="{{ $paciente->id }}">
                                </div>
                                <!--INFO OCULTA DEL PACIENTE, SE DESPLIEGA SI SE PRESIONA EL BTN-->
                                <div id="cabecera_info" class="collapse" aria-labelledby="enf-cron" data-parent="#cabecera_info">
                                    <div class="card-body pt-2" style="padding-top: 0px!important;">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pb-0">
                                                <ul class="nav nav-tabs profile-tabs nav-fill mt-1 mb-3" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset active" id="seccion_ident_contacto-tab" data-toggle="tab" href="#seccion_ident_contacto" role="tab" aria-controls="seccion_ident_contacto" aria-selected="true">Info. Del Responsable</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset" id="seccion_enfer_cronicas-tab" data-toggle="tab" href="#seccion_enfer_cronicas" role="tab" aria-controls="seccion_enfer_cronicas" aria-selected="false">Enfermedades Crónicas</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset" id="seccion_alergias-tab" data-toggle="tab" href="#seccion_alergias" role="tab" aria-controls="seccion_alergias" aria-selected="false">Alergias</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset" id="seccion_ultimas_cirugia-tab" data-toggle="tab" href="#seccion_ultimas_cirugia" role="tab" aria-controls="seccion_ultimas_cirugia" aria-selected="false">Últimas Cirugias</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset" id="seccion_ultimo_tratamiento-tab" data-toggle="tab" href="#seccion_ultimo_tratamiento" role="tab" aria-controls="seccion_ultimo_tratamiento" aria-selected="false">Últimos Tratamientos</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset" id="discap-tab" data-toggle="tab" href="#discap" role="tab" aria-controls="discap" aria-selected="false">Discapacidad</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 pb-2">
                                                <div class="tab-content" id="at-oftalmo">
                                                    {{-- INFORMACION DE RESPONSABLE --}}
                                                    <div class="tab-pane fade show active" id="seccion_ident_contacto" role="tabpanel" aria-labelledby="seccion_ident_contacto-tab">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
                                                               <div class="media">
                                                                    <img src="{{ asset('images/iconos/persona-info.png') }}"  class="wid-35 rounded-circle align-self-start mr-2" alt="...">
                                                                    <div class="media-body">
                                                                        <h6 class="mt-0 mb-1 pt-1">Responsable</h6>
                                                                        <h6 class="mt-0 text-c-blue">Daniela Sepúlveda</h6> <small class="mt-0 text-c-blue">18.382.693-K</small>
                                                                        
                                                                    </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
                                                                @if( $direccion )
                                                                  <div class="media">
                                                                        <img src="{{ asset('images/iconos/direccion-info.png') }}"  class="wid-35 rounded-circle align-self-start mr-2" alt="...">
                                                                        <div class="media-body">
                                                                            <h6 class="mt-0 mb-1 pt-1">Dirección</h6>
                                                                            <h6 class="mt-0 text-c-blue">{{$direccion->direccion}} {{$direccion->numero}}, {{$direccion->ciudad->nombre}}, {{$direccion->ciudad->region->nombre}}</h6>
                                                                        </div>
                                                                  </div>
                                                                @else
                                                                    
                                                                @endif
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
                                                                <div class="media">
                                                                    <img src="{{ asset('images/iconos/tel-info.png') }}"  class="wid-35 rounded-circle align-self-start mr-2" alt="...">
                                                                    <div class="media-body">
                                                                        <h6 class="mt-0 mb-1 pt-1">Teléfono</h6>
                                                                        <h6 class="mt-0 text-c-blue">{{$paciente->telefono_uno}} / {{$paciente->telefono_dos}}</h6>
                                                                    </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
                                                                <div class="media">
                                                                    <img src="{{ asset('images/iconos/email-info.png') }}"  class="wid-35 rounded-circle align-self-start mr-2" alt="...">
                                                                    <div class="media-body">
                                                                        <h6 class="mt-0 mb-1 pt-1">Email</h6>
                                                                        <h6 class="mt-0 text-c-blue">{{$paciente->email}}</h6>
                                                                    </div>
                                                               </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- informacion de enfermedades cronicas  --}}
                                                    <div class="tab-pane fade" id="seccion_enfer_cronicas" role="tabpanel" aria-labelledby="seccion_enfer_cronicas-tab">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table id="table_enfermedades_cronicas" class="display table table-striped table-xs table-bordered dt-responsive nowrap pb-4" style="width:100%">
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
                                                                <table id="table_alergias" class="display table table-bordered table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
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
                                                                <table id="table_alergias" class="display table table-bordered table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
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

                                                    {{-- ultimos tratamientos --}}
                                                    <div class="tab-pane fade" id="seccion_ultimo_tratamiento" role="tabpanel" aria-labelledby="seccion_ultimo_tratamiento-tab">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                {!! $datos->tratamientos_activos !!}
                                                            </div>
                                                        </div>

                                                    </div>

                                                    {{-- discapacidad --}}
                                                    <div class="tab-pane fade" id="discap" role="tabpanel" aria-labelledby="discap-tab">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table id="table_discapacidad" class="display table-bordered  table table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Discapacidad</th>
                                                                            <th>Grado</th>
                                                                            <th>Reversibilidad</th>
                                                                            <th>Fecha</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($antecedentes as $data)
                                                                            @if($data->id_tipo_antecedente==8)
                                                                                <tr>
                                                                                    <td>{{ $data->antecedente_data->discapacidad_tipo }}</td>
                                                                                    <td>{{ $data->antecedente_data->discapacidad_grado }}</td>
                                                                                    <td>{{ $data->antecedente_data->discapacidad_permanente }}</td>
                                                                                    <td>{{ date('d-m-Y', strtotime($data->antecedente_data->fecha_regitro)) }}</td>
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
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                            {{-- <button type="button" class="btn btn-xs btn-primary-light-c mb-1" onclick="cirugias_fmu();">Cirugías</button> --}}
                            {{-- <button type="button" class="btn btn-xs btn-primary-light-c mb-1" onclick="alergias_fmu();">Alergias</button> --}}
                            <button type="button" class="btn btn-xs btn-purple-light-c mb-1" onclick="responsables_fmu();"><i class="feather icon-users"></i> Responsables</button>
                            <button type="button" class="btn btn-xs btn-purple-light-c mb-1" onclick="confidencial_fmu();"><i class="feather icon-lock"></i> Información Confidencial</button>
                            {{-- <button type="button" class="btn btn-xs btn-primary-light-c mb-1" onclick="trat_act_fmu();"><i class="feather icon-file-plus"></i> Tratamientos activos</button> --}}
                            <button type="button" class="btn btn-xs btn-danger-light-c mb-1" onclick="c_sos_fmu();"><i class="feather icon-phone"></i> Contacto de emergencia</button>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Tratamientos en curso --}}
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                             <div class="card border-card-info h-100">
                                <div class="card-body px-2 py-3">
                                    <div class="media">
                                      <img src="{{ asset('images/iconos/tto-curso.png') }}" class=" wid-35 rounded-xl mr-3" alt="Tratamientos en curso">
                                      <div class="media-body">
                                        <h5 class="f-16 text-info font-weight-bold">Tratamientos en curso</h5>
                                        <ul>
                                                @if (isset($tratamiento_activo))
                                                    @foreach ( $tratamiento_activo as $receta)
                                                        @foreach ( $receta['detalle'] as $detalle)
                                                            @if ($detalle['id_tipo_control'] == 8)
                                                                <li style="font-size: 12px" class="text-capitalize"> <i class="fas fa-caret-right text-purple"></i>
                                                                    Receta Magistral<br/>&nbsp;&nbsp;
                                                                    <span style="font-size: 9px; font-weight: bold;">
                                                                        @php
                                                                            $producto_detalle_temp = json_decode($detalle['producto']);
                                                                            // var_dump($producto_detalle_temp[0]) ;
                                                                        @endphp
                                                                        @foreach ( $producto_detalle_temp as $det_temp)
                                                                            {{ $det_temp->nombre }}: {{ $det_temp->cantidad }} |
                                                                        @endforeach
                                                                    </span>
                                                                </li>
                                                            @else
                                                                <li style="font-size: 12px"><i class="fas fa-caret-right text-purple"></i>&nbsp;&nbsp;{{ $detalle['producto'] }}</li>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @else
                                                    <li>No hay registros</li>
                                                @endif
                                                <li></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Medicamentos crónicos --}}
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card border-card-danger h-100">
                                <div class="card-body px-2 py-3">
                                    <div class="media">
                                      <img src="{{ asset('images/iconos/meds-cronicos.png') }}" class="wid-35 rounded-xl mr-3" alt="Medicamentos Crónicos">
                                        <div class="media-body">
                                            <h5 class="f-16 text-danger font-weight-bold">Medicamentos crónicos</h5>
                                            <ul>
                                                <li>No hay registros</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Cirugías recientes --}}
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                             <div class="card  border-card-info h-100">
                                <div class="card-body px-2 py-3">
                                    <div class="media">
                                      <img src="{{ asset('images/iconos/ant-qx.png') }}" class=" wid-35 rounded-xl mr-3" alt="CX Recientes">
                                        <div class="media-body">
                                            <h5 class="f-16 text-info font-weight-bold">Cirugías recientes</h5>
                                            <ul>
                                                @if(isset($antecedentes))
                                                @foreach ($antecedentes as $data)
                                                    @if($data->id_tipo_antecedente==3)
                                                        {{-- <li>{!! $data->antecedente_data->procedimiento.'<br/>&nbsp;&nbsp;&nbsp;- '.substr($data->comentario, 0, 30) !!}</li> --}}
                                                        <li class="text-capitalize"> <i class="fas fa-caret-right text-info"></i> {!! $data->antecedente_data->procedimiento.' - '.$data->comentario !!}</li>
                                                    @else
                                                        {{-- <li>No hay registros</li> --}}
                                                    @endif
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Medicamentos recientes --}}
                        {{-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3"> --}}
                            {{-- <div class="card border-card-purple h-100"> --}}
                                {{-- <div class="card-body"> --}}
                                    {{-- <ul> --}}
                                        {{-- <li><strong>Medicamentos recientes</strong></li> --}}
                                        {{-- <li>No hay registros</li> --}}
                                    {{-- </ul> --}}
                                {{-- </div> --}}
                            {{-- </div> --}}
                        {{-- </div> --}}

                        {{-- Prótesis y ortesis --}}
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card border-card-info h-100">
                                <div class="card-body px-2 py-3">
                                    <div class="media">
                                      <img src="{{ asset('images/iconos/prot-ort.png') }}" class=" wid-35 rounded-xl mr-3" alt="Prótesis y Ortesis">
                                        <div class="media-body">
                                            <h5 class="f-16 text-info font-weight-bold">Prótesis y Ortesis</h5>
                                            <ul>
                                                <li>No hay registros</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--HISTORIAL MÉDICO-->
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                            <h5 class="f-20 text-c-blue mb-3">Historial médico</h5>
                        </div>

                         <!--HISTORIAL - Historial Médico-->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="histo_medico">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed"  type="button" data-toggle="collapse" data-target="#histo_medico_c" aria-expanded="false" aria-controls="histo_medico_c">
                                    Historial Médico
                                    </button>
                                </div>
                                <div id="histo_medico_c" class="collapse" aria-labelledby="histo_medico" data-parent="#histo_medico">
                                    <div class="card-body-aten-a">
                                        <div class="row mt-3">
                                            <div class="col-sm-12 pb-4">
                                                <table id="tabla_fmu_historal_medico" class="display table table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle">Fecha</th>
                                                            <th class="align-middle">Profesional</th>
                                                            <th class="align-middle">Diagnóstico</th>
                                                            <th class="align-middle">Ficha</th>
                                                            <th class="align-middle">Exámenes</th>
                                                            <th class="align-middle">Recetas</th>
                                                            <th class="align-middle">Archivos </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (isset($fichas) && $fichas->count() > 0)
                                                            @foreach ($fichas as $f)
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        {{ \Carbon\Carbon::parse($f->created_at)->format('d-m-Y') }}
                                                                    </td>

                                                                    <td class="align-middle">
                                                                        @if($f->profesional)
                                                                        {{ $f->profesional->nombre }} {{ $f->profesional->apellido_uno }} {{ $f->profesional->apellido_dos }}<br>

                                                                        @endif
                                                                    </td>

                                                                    <td class="align-middle">{{ $f->hipotesis_diagnostico ? $f->hipotesis_diagnostico : ''}}</td>

                                                                    <td class="align-middle">
                                                                        {{-- <a class="btn btn-xxs btn-info-light-c has-ripple"  @if (isset($f->id)) onclick="buscar_ficha_fmu({{ $f->id }});" @endif><i class="feather icon-file-plus"></i> Ver</a> --}}
                                                                        <button type="button" class="btn btn-xxs btn-info-light-c" @if (isset($f->id)) onclick="buscar_ficha_atencion_atencion_previa_fmu({{ $f->id }});" @endif><i class="feather icon-file-text"></i> Ver</button>
                                                                    </td>

                                                                    <td class="align-middle">
                                                                        {{-- <a class="badge badge-light-success" @if (isset($f->id)) onclick="buscar_examenes_fmu({{ $f->id }});" @endif><i class="feather icon-activity"></i> Ver</a> --}}
                                                                        <button type="button" class="btn btn-xxs btn-success-light-c" @if (isset($f->id)) onclick="buscar_examenes_fmu({{ $f->id }});" @endif><i class="feather icon-activity"></i> Ver</button>
                                                                    </td>

                                                                    <td class="align-middle">
                                                                        {{-- <a class="badge badge-light-warning"  @if (isset($f->id)) onclick="buscar_receta_fmu({{ $f->id }});" @endif><i class="feather icon-file-plus"></i> Ver</a> --}}
                                                                        <button type="button" class="btn btn-xxs btn-warning-light-c"  @if (isset($f->id)) onclick="buscar_receta_fmu({{ $f->id }});" @endif><i class="feather icon-file-plus"></i> Ver</button>
                                                                    </td>

                                                                    <td class="align-middle">
                                                                        {{-- <a class="badge badge-light-warning"  @if (isset($f->id)) onclick="buscar_archivo_fmu({{ $f->id }});" @endif><i class="feather icon-file-plus"></i> Ver</a> --}}
                                                                        <button type="button" class="btn btn-xxs btn-purple-light-c" @if (isset($f->id)) onclick="buscar_archivo_fmu({{ $f->id }});" @endif><i class="feather icon-folder"></i> Ver</button>
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

                        <!--HISTORIAL - Últimos Examenes-->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="ult_exam">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed"  type="button" data-toggle="collapse" data-target="#ult_exam_c" aria-expanded="false" aria-controls="ult_exam_c">
                                    Últimos Exámenes
                                    </button>
                                </div>
                                <div id="ult_exam_c" class="collapse" aria-labelledby="ult_exam" data-parent="#ult_exam">
                                    <div class="card-body-aten-fmu">
                                        <div class="row mt-3">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pb-4">
                                                <div class="table-responsive">
                                                    <table id="table_fmu_ultimos_examenes" class="display table table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Fecha</th>
                                                                <th>Nº de Orden</th>
                                                                <th>Nombre del Examen</th>
                                                                <th>Tipo de Examen</th>
                                                                <th>Examen</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($examenes_especialidad_realizados)
                                                                @foreach ($examenes_especialidad_realizados as $exam)
                                                                    @if ($exam->HoraMedica)
                                                                        @if ($exam->HoraMedica->id_estado == 6 )
                                                                            <tr>
                                                                                <td>{{ date('d-m-Y',strtotime($exam->HoraMedica->fecha_realizacion_consulta)) }}</td>
                                                                                <td>{{ $exam->id }}</td>
                                                                                <td>{{ $exam->nombre }}</td>
                                                                                <td>
                                                                                    @if ($exam->SubTipoEspecialidad)
                                                                                        {{ $exam->SubTipoEspecialidad->nombre }}
                                                                                    @else
                                                                                        -
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    <button type="button" class="btn btn btn-primary-light btn-xs" onclick="verExamenEspecialidad('{{ $exam->id }}',1);"><i class="feather icon-file-text"></i> Ver examen</button>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            @endif

                                                            {{-- RESULTADODE DE EXAMENES LABORATORIO --}}
                                                            @if ($resultado_examen)
                                                                @foreach ( $resultado_examen as $result_ex)
                                                                    <tr>
                                                                        <td>{{ date('d-m-Y',strtotime($result_ex->fecha_registro)) }}</td>
                                                                        <td>{{ $result_ex->id }}</td>
                                                                        {{-- <td>{{ $result_ex->nombre.' '.$result_ex->apellido_paterno.' '.$result_ex->apellido_materno }}</td> --}}
                                                                        <td>LABORATORIO</td>
                                                                        <td>
                                                                            @if ($result_ex->obj_tipo_examen)
                                                                                {{ $result_ex->obj_tipo_examen->nombre_examen }}
                                                                            @else
                                                                                -
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if ($result_ex->ResultadoExamenArchivo->count()>0)
                                                                                <button type="button" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_{{ $result_ex->id }}" onclick="verResultadoExamen('{{ $result_ex->id }}',1);"><i class="feather icon-file-text"></i> Ver examen</button>
                                                                            @else
                                                                                <button type="button" disabled="disabled" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_{{ $result_ex->id }}"><i class="feather icon-file-text"></i> Ver examen</button>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
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


                        <!--HISTORIAL - Registro vacunas -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="vacunas">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed"  type="button" data-toggle="collapse" data-target="#vacunas_c" aria-expanded="false" aria-controls="vacunas_c">
                                    Registro de Vacunas
                                    </button>
                                </div>
                                <div id="vacunas_c" class="collapse" aria-labelledby="vacunas" data-parent="#vacunas">
                                    <div class="card-body-aten-a">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table id="tabla_recetas_paciente_ro"
                                        class="display table table-striped dt-responsive nowrap table-sm"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">Edad</th>
                                                <th class="align-middle">Fecha dosis</th>
                                                <th class="align-middle">Vacuna</th>
                                                <th class="align-middle">Próx.Dosis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">
                                                   1 mes y 5 días
                                                </td>
                                                <td class="align-middle">
                                                    <span class="badge badge-secondary">00-00-2025</span>
                                                </td>
                                                <td class="align-middle">
                                                    Triplefelina
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-info">11-12-2025</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">
                                                   2 meses y 15 días
                                                </td> 
                                                <td class="align-middle">
                                                    <span class="badge badge-secondary">00-00-2025</span>
                                                </td>
                                                <td class="align-middle">
                                                    Triplefelina
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-info">11-12-2025</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">
                                                   4 meses y 19 días
                                                </td>
                                                <td class="align-middle">
                                                    <span class="badge badge-secondary">00-00-2025</span>
                                                </td>
                                                <td class="align-middle">
                                                    Rabia
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-info">11-12-2025</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--HISTORIAL - Registro desparasitación -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="desparasitacion">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed"  type="button" data-toggle="collapse" data-target="#desparasitacion_c" aria-expanded="false" aria-controls="desparasitacion_c">
                                    Registro de Desparasitación
                                    </button>
                                </div>
                                <div id="desparasitacion_c" class="collapse" aria-labelledby="desparasitacion" data-parent="#desparasitacion">
                                    <div class="card-body-aten-a">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table id="tabla_recetas_paciente_ro"
                                                                    class="display table table-striped dt-responsive nowrap table-sm"
                                                                    style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="align-middle">Fecha dosis</th>
                                                                            <th class="align-middle">Antiparasitario</th>
                                                                            <th class="align-middle">Tipo</th>
                                                                            <th class="align-middle">Próx.Dosis</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="align-middle">
                                                                                <span class="badge badge-secondary">00-00-2025</span>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                Milpro
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                Interno
                                                                            </td>
                                                                            <td class="align-middle text-center">
                                                                                <span class="badge badge-info">11-12-2025</span>
                                                                            </td>
                                                                        </tr>
                                                                         <tr>
                                                                            <td class="align-middle">
                                                                                <span class="badge badge-secondary">00-00-2025</span>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                Nextgard Combo
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                Interno y Externo
                                                                            </td>
                                                                            <td class="align-middle text-center">
                                                                                <span class="badge badge-info">11-12-2025</span>
                                                                            </td>
                                                                        </tr>
                                                                         <tr>
                                                                            <td class="align-middle">
                                                                                <span class="badge badge-secondary">00-00-2025</span>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                Frontlin
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                Externo
                                                                            </td>
                                                                            <td class="align-middle text-center">
                                                                                <span class="badge badge-info">11-12-2025</span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--HISTORIAL - Control de enfermedades cronicas -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="cont_enfer_cron">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed"  type="button" data-toggle="collapse" data-target="#cont_enfer_cron_c" aria-expanded="false" aria-controls="cont_enfer_cron_c">
                                    Control de Enfermedades Crónicas
                                    </button>
                                </div>
                                <div id="cont_enfer_cron_c" class="collapse" aria-labelledby="cont_enfer_cron" data-parent="#cont_enfer_cron">
                                    <div class="card-body-aten-a">
                                        <div class="row mt-3">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pb-4">
                                                <div class="table-responsive">
                                                    <table id="table_fmu_control_cronico" class="display table table-striped table-xs dt-responsive nowrap pb-4" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Fecha Toma</th>
                                                                <th>Tipo</th>
                                                                <th>Detalle</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($control_enfer_cronicas)
                                                                @foreach ( $control_enfer_cronicas as $control)
                                                                    <tr>
                                                                        <td>{{ $control['fecha'] }}</td>
                                                                        <td>{{ $control['tipo'] }}</td>
                                                                        <td>
                                                                            <ul>
                                                                                @foreach ($control['detalle'] as $key => $detalle)
                                                                                    <li><strong>{{ $key }}: {{ $detalle }}</strong></li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="3"> Sin registros </td>
                                                                </tr>
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

                        <!--HISTORIAL - Historial Quirúrgico -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="qx">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed"  type="button" data-toggle="collapse" data-target="#qx_c" aria-expanded="false" aria-controls="qx_c">
                                    Historial Quirúrgico
                                    </button>
                                </div>
                                <div id="qx_c" class="collapse" aria-labelledby="qx" data-parent="#qx">
                                    <div class="card-body-aten-a">
                                        <form>
                                            <div class="form-row">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--HISTORIAL - Historial odontologico -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-a">
                                <div class="card-header-a" id="odonto">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed"  type="button" data-toggle="collapse" data-target="#odonto_c" aria-expanded="false" aria-controls="odonto_c">
                                    Historial Odontológico
                                    </button>
                                </div>
                                <div id="odonto_c" class="collapse" aria-labelledby="odonto" data-parent="#odonto">
                                    <div class="card-body-aten-a">
                                        @include('atencion_odontologica.generales.odontograma_adulto')
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
<link rel="stylesheet" href="{{ asset('css/ficha_medica_unica.css') }}">
<!-- Estilo cards -->
{{-- <link rel="stylesheet" href="{{ asset('css/iconos-sdi.css') }}"> --}}

<style type="text/css">
    .auth-wrapper
    {
        background-color: #f3f3f3!important;
    }
</style>
{{-- @endsection --}}


<!-- SCRIPT -->
    <script>
        $(document).ready(function () {


            $('#table_fmu_ultimos_examenes').DataTable({
                    responsive: true,
                    "columnDefs": [
                        { "type": "date", "targets": 0 }
                    ]
            });


            $('#table_fmu_control_cronico').DataTable({
                    responsive: true,
                    "columnDefs": [
                        { "type": "date", "targets": 0 }
                    ]
            });

            $('#tabla_fmu_historal_medico').DataTable({
                    responsive: true,
                    "columnDefs": [
                        { "type": "date", "targets": 0 }
                    ]
            });
        });

        function formatDate(date)
        {
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

        {{-- ABRIR ARCHIVOS --}}
        function verExamenEspecialidad(id_examen)
        {
            if(id_examen != '')
            {
                var data ='id_examen_especialidad='+id_examen+'';
                Fancybox.show(
                    [{
                        src: '{{ route("pdf.examen_especialidad") }}?'+data,
                        type: "iframe",
                        preload: false,
                    }]
                );
            }
            else
            {
                swal({
                    title: "Ver Examen Especialidad",
                    text:"No Se encuentra examen",
                    icon: "error"
                });
            }
        }

        function verResultadoExamen(id_examen)
        {
            if(id_examen != '')
            {
                let url = "{{ route('resultado.examen.lab.archivo.ver') }}";
                var archivos = [];
                $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        id : id_examen
                    },
                })
                .done(function(data) {

                    console.log(data);
                    if (data.estado == 1)
                    {
                        $.each(data.registros, function (key, value)
                        {
                            var temp_type = 'image';
                            console.log(value.url.indexOf('.pdf'));
                            if(value.url.indexOf('.pdf') != -1)
                            {
                                temp_type = 'iframe';
                            }
                            else
                            {
                                temp_type = 'image';
                            }
                            archivos.push({
                                src: value.url,
                                type: temp_type,
                                preload: false,
                            });
                        });

                        if(archivos.length > 0)
                            Fancybox.show(archivos);

                    }
                    else
                    {
                        console.log('examen no revisado');
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else
            {
                swal({
                    title: "Ver Resultado de Examen Laboratorio",
                    text:"No Se encuentra resultado de examen Laboratorio",
                    icon: "error"
                });
            }
        }

        // function dame_id_paciente(){
        //     return $('#id_paciente_fc').val();
        // }
    </script>

@include('atencion_odontologica.modals.odontograma.modal_odontograma')



    <!-- Tablas ficha médica única-->
    <script src="{{ asset('js/tablas_patologias_cronicas_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_tratamientos_antecedentes_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_odontologia_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_obstetricos_control_fmu.js') }}"></script>
    <script src="{{ asset('js/tablas_informacion_confidencial_fmu.js') }}"></script>
    <script src="{{ asset('/js/ficha_medica/main.js') }}"></script>

    <!--Modals-->
    @include("general.secciones_ficha.modales_fmu.alergias_fmu")
    @include("general.secciones_ficha.modales_fmu.responsables_fmu")
    @include("general.secciones_ficha.modales_fmu.cirugias_fmu")
    @include("general.secciones_ficha.modales_fmu.confidencial_fmu")
    @include("general.secciones_ficha.modales_fmu.trat_act_fmu")
    {{-- @include("general.secciones_ficha.modales_fmu.c_sos_fmu",['datos' => $datos]) --}}
    @include("general.secciones_ficha.modales_fmu.c_sos_fmu")


    @include("general.secciones_ficha.modales_fmu.hist_medico_recetas_fmu")
    @include("general.secciones_ficha.modales_fmu.hist_medico_exa_fmu")
    @include("general.secciones_ficha.modales_fmu.hist_cons_fmu")
    @include("general.secciones_ficha.modales_fmu.hist_cons_archivo_fmu")
