<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
{{--<div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
            </div>
        </div>

        <div class="row bg-white shadow-sm rounded mx-3 mt-4">
            <div class="col-sm-12 mt-3">
                <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                <!--Tabla-->
                <div class="table-responsive">

                    <table id="tabla_examen" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Nombre Operaci&oacute;n</th>
                                <th class="text-center align-middle">Profesional</th>
                                <th class="text-center align-middle">Lugar</th>
                                <th class="text-center align-middle">Urgencia</th>
                                <th class="text-center align-middle">Fecha</th>
                                <th class="text-center align-middle"> Acci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($solicitudes_pabellon_quirurgico))
                                @foreach ($solicitudes_pabellon_quirurgico as $solicitud_pq)
                                    @if ($solicitud_pq->tipo_cirugia == 'quirurgica')
                                        <tr>
                                            <td class="text-center align-middle"> {{ $solicitud_pq->operacion }} </td>
                                            <td class="text-center align-middle">
                                                {{ $solicitud_pq->Profesional()->first()->nombre . ' ' . $solicitud_pq->Profesional()->first()->apellido_uno }}
                                            </td>
                                            <td class="text-center align-middle">
                                                {{ $solicitud_pq->LugarAtencion()->first()->nombre }}
                                            </td>
                                            <td class="text-center align-middle">
                                                @if ($solicitud_pq->grado_urgencia == 1)
                                                    Normal
                                                @else
                                                    Urgente
                                                @endif
                                            </td>
                                            <td class="text-center align-middle">
                                                {{ \Carbon\Carbon::parse($solicitud_pq->fecha_hora_operacion)->format('d-m-Y') }}
                                            </td>
                                            <td class="text-center align-middle">
                                                <a href="{{ ROUTE('cirugia.ingreso_paciente', $solicitud_pq->id) }}" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Ingreso Paciente"><i class="feather icon-activity"></i></a>
                                                <a href="{{ ROUTE('cirugia.protocolo_cirugia', $solicitud_pq->id) }}" class="btn btn-warning btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Protocolo Operatorio"><i class="feather icon-file-plus"></i></a>
                                                <a href="{{ ROUTE('cirugia.sala_recuperacion', $solicitud_pq->id) }}" class="btn btn-secondary btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Sala Recuperación"><i class="feather icon-edit"></i></a>
                                                <a href="{{ ROUTE('cirugia.sala_hospitalizacion', $solicitud_pq->id) }}" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Sala Hospitalización"><i class="feather icon-edit"></i></a>
                                                <a href="{{ ROUTE('cirugia.epicrisis_alta_medica', $solicitud_pq->id) }}" class="btn btn-primary btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Epicrisis y Alta Medica"><i class="feather icon-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <span>NO EXISTEN REGISTROS</span>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!--Cierre Tabla-->
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3 mb-0">
                        <h6 class="f-16 text-c-blue">Solicitud de pabellón quirúrgico</h6>
                        <hr>
                    </div>
                </div>
                <form id="form_solicitud_pabellon_quirurgico_dental" action="{{ route('cirugia.registrar_solicitud_pabellon_quirurgico') }}" method="POST">
                    @csrf
                    <input type="hidden" name="ficha_id_quirurgico" id="ficha_id_quirurgico" value=" @if ($ficha != null) {{ $ficha->id }} @endif">
                    <input type="hidden" name="paciente_quirurgico" id="paciente_quirurgico" value="{{ $paciente->id }}">
                    <input type="hidden" name="tipo_cirugia" id="tipo_cirugia" value="quirurgica">
                    <div class="row">
                        <!--Información y autorización-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Información y autorización clínica</h6>
                                </div>
                                <div class="card-body shadow-none">

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Clínica / Hospital</label>
                                            <select class="form-control form-control-sm" onchange="cargar_datos_lugar_atencion()" name="lugar_atencion_pabellon_quirurgico" id="lugar_atencion_pabellon_quirurgico">
                                                <option value="0">Seleccione...</option>
                                                @foreach ($lugares_atenciones as $lugares)
                                                    <option value="{{ $lugares->id }}">{{ $lugares->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Correo electrónico</label>
                                            <input type="Email" class="form-control form-control-sm" name="email_quirurgico" id="email_quirurgico">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Teléfono</label>
                                            <input type="tel" class="form-control form-control-sm" name="telefono_quirurgico" id="telefono_quirurgico">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Código</label>
                                            <input type="number" class="form-control form-control-sm" name="codigo_quirurgico" id="codigo_quirurgico">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <h6 class="text-secondary">00/00/000</h6>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Fecha y hora operación</label>
                                            <input type="datetime-local" class="form-control form-control-sm" name="fecha_hora_pabellon" id="fecha_hora_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Grado de urgencia</label>
                                            <select id="grado_urgencia_pabellon" name="grado_urgencia_pabellon" class="form-control form-control-sm">
                                                <option selected value="0">Seleccione</option>
                                                <option value="1">Normal</option>
                                                <option value="2">Urgente</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="button" class="btn btn-info btn-sm btn-block">Solicitar código</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Información paciente-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Información general del paciente</h6>
                                </div>
                                <div class="card-body shadow-none">

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Rut</label>
                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut" value="{{ $paciente->rut }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Nombre completo</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Edad</label>
                                            <input type="text" class="form-control form-control-sm" name="edad" id="edad" value="{{ $paciente->rut }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Previsión</label>
                                            <input type="text" class="form-control form-control-sm" name="prevision" id="prevision" value="{{ $paciente->Prevision()->first()->nombre }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Email</label>
                                            <input type="email" class="form-control form-control-sm" name="email" id="email" value="{{ $paciente->email }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Teléfono</label>
                                            <input type="tel" class="form-control form-control-sm" name="telefono" id="telefono" value="{{ $paciente->telefono_uno }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo">Patologías crónicas</label>
                                            <textarea class="form-control form-control-sm" id="patologias_cronicas_pabellon" name="patologias_cronicas_pabellon" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Información cirugia-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Información de la cirugía</h6>
                                </div>
                                <div class="card-body shadow-none">

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo">Operación</label>
                                            <input type="text" class="form-control form-control-sm" name="operacion_pabellon" id="operacion_pabellon">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo">Código</label>
                                            <input type="number" class="form-control form-control-sm" name="codigo_cirugia_pabellon" id="codigo_cirugia_pabellon">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo">Anestesia</label>
                                            <input type="text" class="form-control form-control-sm" name="anestesia_pabellon" id="anestesia_pabellon">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Equipo-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Equipo</h6>
                                </div>
                                <div class="card-body shadow-none">

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo">Cirujano</label>
                                            <input type="text" class="form-control form-control-sm" name="cirujano_pabellon" id="cirujano_pabellon" value="{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo">Ayudantes</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="ayudante_uno_pabellon" id="ayudante_uno_pabellon"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo">Anestesistas y ayudantes de anestesia</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="anestesista_pabellon" id="anestesista_pabellon"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo">Arsenalería</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="arsenaleria_pabellon" id="arsenaleria_pabellon"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo">Equipamiento especial</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="equipamiento_especial_pabellon" id="equipamiento_especial_pabellon"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo">Código de cirugía</label>
                                            <input type="number" class="form-control form-control-sm" name="codigo_cirugia_pabellon_1" id="codigo_cirugia_pabellon_1">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Otros profesionales-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Otros profesionales</h6>
                                </div>
                                <div class="card-body shadow-none">

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo">Especialidad 1</label>
                                            <input type="text" class="form-control form-control-sm" name="especialidad_uno_pabellon" id="especialidad_uno_pabellon">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo">Especialidad 2</label>
                                            <input type="text" class="form-control form-control-sm" name="especialidad_dos_pabellon" id="especialidad_dos_pabellon">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label-activo">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="2" name="comentarios_pabellon" id="comentarios_pabellon"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <button type="reset" class="btn btn-danger">Borrar formulario</button>
                            <button type="submit" class="btn btn-info">Enviar formulario</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>--}}
</div>
