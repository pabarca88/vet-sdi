@foreach ($servicios_internos as $index => $servicio)
<div class="tab-pane fade active {{ $index === 0 ? 'show' : '' }}" id="servicio{{ $servicio->id }}" role="tabpanel" aria-labelledby="servicio{{ $servicio->id }}-tab">
    <div class="row w-100">
        <div class="col-md-3">
            <div class="form-row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h6 class="t-aten">{{ $servicio->nombre_servicio }}</h6>
                    <p>Jefe del Servicio: {{ $servicio->jefe_servicio->nombre }} {{ $servicio->jefe_servicio->apellido_uno }} {{ $servicio->jefe_servicio->apellido_dos }}</p>
                    <p>N° de Camas: {{ $servicio->numero_camas }}</p>
                    <p>N° de Camas Disponibles: {{ $servicio->camas_disponibles }}</p>
                    <p>N° de Camas Ocupadas: {{ $servicio->camas_ocupadas }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <ul class="nav nav-tabs-secciones-info" id="insc-institucion" role="tablist">
                        <li class="nav-item-secciones-info">
                            <a class="nav-secciones-info text-uppercase active" id="p-salas_servicio-tab{{ $servicio->id }}" data-toggle="tab" href="#p-salas_servicio{{ $servicio->id }}" role="tab" aria-controls="p-salas_servicio{{ $servicio->id }}" aria-selected="false">Salas</a>
                        </li>
                        <li class="nav-item-secciones-info">
                            <a class="nav-secciones-info text-uppercase" id="p-profesionales_servicio-tab{{ $servicio->id }}" data-toggle="tab" href="#p-profesionales_servicio{{ $servicio->id }}" role="tab" aria-controls="p-profesionales_servicio{{ $servicio->id }}" aria-selected="true">Profesionales</a>
                        </li>
                        <li class="nav-item-secciones-info">
                            <a class="nav-secciones-info text-uppercase" id="p-tens_servicio-tab{{ $servicio->id }}" data-toggle="tab" href="#p-tens_servicio{{ $servicio->id }}" role="tab" aria-controls="p-tens_servicio{{ $servicio->id }}" aria-selected="true">Tens</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="form-row">
                <div class="tab-content w-100">
                    <div class="tab-pane fade active show" id="p-salas_servicio{{ $servicio->id }}" role="tabpanel" aria-labelledby="p-salas_servicio-tab{{ $servicio->id }}">
                        <div class="row">
                            @for ($i = 1; $i <= $servicio->numero_salas; $i++)
                                @php
                                    $id_sala_servicio = $servicio->id.'-'.$i;
                                    // Verificamos si la sala correspondiente ya tiene información en $servicio->salas
                                    $salaInfo = $servicio->salas->where('id_sala_servicio', $id_sala_servicio)->first();
                                @endphp
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-info">Sala {{ $i }}</div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nombre_sala{{ $servicio->id }}-{{ $i }}" class="floating-label-activo-sm">Nombre (opcional)</label>
                                                <input type="text" class="form-control form-control-sm" name="nombre_sala{{ $servicio->id }}-{{ $i }}" id="nombre_sala{{ $servicio->id }}-{{ $i }}" value="{{ $salaInfo->nombre_sala ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="tipo_sala{{ $servicio->id }}-{{ $i }}" class="floating-label-activo-sm">Tipo</label>
                                                <select name="tipo_sala{{ $servicio->id }}-{{ $i }}" id="tipo_sala{{ $servicio->id }}-{{ $i }}" class="form-control form-control-sm">
                                                    <option value="0">Seleccione</option>
                                                    <option value="M" {{ isset($salaInfo) && $salaInfo->tipo_sala === 'M' ? 'selected' : '' }}>Masculino</option>
                                                    <option value="F" {{ isset($salaInfo) && $salaInfo->tipo_sala === 'F' ? 'selected' : '' }}>Femenino</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cantidad_camas_servicio{{ $servicio->id }}-{{ $i }}" class="floating-label-activo-sm">Cantidad de camas</label>
                                                <input type="number" class="form-control form-control-sm" id="cantidad_camas_servicio{{ $servicio->id }}-{{ $i }}" value="{{ $salaInfo->cantidad_camas ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex">
                                            <button class="btn btn-primary btn-sm w-100" onclick="guardar_camas_sala({{ $servicio->id }}, {{ $i }}, '{{ $servicio->nombre_servicio }}')">
                                                <i class="fas fa-save"></i> Guardar
                                            </button>
                                            <button class="btn btn-warning btn-sm w-100" onclick="editar_camas_sala({{ $servicio->id }}, {{ $i }}, '{{ $servicio->nombre_servicio }}')">
                                                <i class="fas fa-edit"></i> Editar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>

                    </div>
                    <div class="tab-pane fade " id="p-profesionales_servicio{{ $servicio->id }}" role="tabpanel" aria-labelledby="p-profesionales_servicio-tab{{ $servicio->id }}">
                        <p>Profesionales {{ $servicio->nombre_servicio }}</p>

                        <div class="row">
                            <div class="col-3">

                                <button type="button" class="btn btn-sm btn-outline-primary has-ripple" onclick="asociar_profesional({{ $servicio->id }},'prof');"><i class="fa fa-plus" aria-hidden="true"></i> Asociar profesional<span class="ripple ripple-animate" ></span></button>
                            </div>
                            <div class="col-9" id="contenedor_profesionales_servicio">
                                <table id="tabla_profesionales_servicios{{ $servicio->id }}" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <th class="align-center">Nombre Profesional</th>
                                        <th class="align-center">Especialidad</th>
                                        <th class="align-center"></th>
                                    </thead>
                                    <tbody>
                                        @if (count($servicio->profesionales) > 0)
                                            @foreach ($servicio->profesionales as $profesional)
                                                <tr>
                                                    <td>{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</td>
                                                    <td>{{ $profesional->especialidad }} <br> {{ $profesional->tipo_especialidad }}</td>
                                                    <td><button class="btn btn-outline-danger btn-sm" onclick="desasociar_profesional_servicio({{ $profesional->id }},{{ $servicio->id }})"><i class="fas fa-trash"></i></button></td>
                                                </tr>
                                            @endforeach
                                        @else

                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="p-tens_servicio{{ $servicio->id }}" role="tabpanel" aria-labelledby="p-tens_servicio-tab{{ $servicio->id }}">
                        <p>Tens {{ $servicio->nombre_servicio }}</p>

                        <div class="row">
                            <div class="col-3">

                                <button type="button" class="btn btn-sm btn-outline-primary has-ripple" onclick="asociar_profesional({{ $servicio->id }},'tens');"><i class="fa fa-plus" aria-hidden="true"></i> Asociar profesional<span class="ripple ripple-animate" ></span></button>
                            </div>
                            <div class="col-9" id="contenedor_tens_servicio">
                                <table id="tabla_tens_servicios{{ $servicio->id }}" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <th class="align-center">Nombre Profesional</th>
                                        <th class="align-center">Especialidad</th>
                                        <th class="align-center"></th>
                                    </thead>
                                    <tbody>
                                        @if (isset($servicio->tens) && count($servicio->tens) > 0)
                                            @foreach ($servicio->tens as $profesional)
                                                <tr>
                                                    <td>{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</td>
                                                    <td>{{ $profesional->especialidad }} <br> {{ $profesional->tipo_especialidad }}</td>
                                                    <td><button class="btn btn-outline-danger btn-sm" onclick="desasociar_profesional_servicio({{ $profesional->id }},{{ $servicio->id }})"><i class="fas fa-trash"></i></button></td>
                                                </tr>
                                            @endforeach
                                        @else

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
@endforeach
