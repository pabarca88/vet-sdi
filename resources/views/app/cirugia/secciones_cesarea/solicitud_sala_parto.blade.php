<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row bg-white shadow-sm rounded mx-3 mt-4">
            <div class="offset-col-4 col-sm-12 mt-3 align-middle">
                @if ($errors->any())
                    <span class="alert alert-warning ">{{ $errors->first() }}</span>
                @endif
            </div>
            <div class="col-sm-12 mt-3">

                <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                <!--Tabla-->
                <div class="table-responsive">

                    <table id="tabla_examen" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Tipo Hospitalización </th>
                                <th class="text-center align-middle">Profesional</th>
                                <th class="text-center align-middle">Lugar</th>

                                <th class="text-center align-middle">Urgencia
                                </th>
                                <th class="text-center align-middle">Fecha
                                </th>
                                <th class="text-center align-middle"> Acci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>


                            @if (isset($solicitudes_pabellon_obstetrico))
                                @foreach ($solicitudes_pabellon_obstetrico as $solicitud_po)
                                    <tr>
                                        <td class="text-center align-middle">
                                            {{-- {{ $solicitud_po->tipo_hospitalizacion }} --}}
                                            CESAREA
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ $solicitud_po->Profesional()->first()->nombre . ' ' . $solicitud_po->Profesional()->first()->apellido_uno }}
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ $solicitud_po->LugarAtencion()->first()->nombre }}
                                        </td>
                                        <td class="text-center align-middle">
                                            @if ($solicitud_po->grado_urgencia == 1)
                                                Normal
                                            @else
                                                Urgente
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ \Carbon\Carbon::parse($solicitud_po->fecha_hora_operacion)->format('d-m-Y') }}

                                        </td>
                                        <td class="text-center align-middle">

                                            <a href="{{ ROUTE('cirugia.ingreso_paciente_cesarea', $solicitud_po->id) }}"
                                                class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top"
                                                title="Ingreso Paciente"><i class="feather icon-activity"></i></a>

                                            <a href="{{ ROUTE('cirugia.protocolo_cesarea', $solicitud_po->id) }}"
                                                class="btn btn-warning btn-sm btn-icon" data-toggle="tooltip"
                                                data-placement="top" title="Protocolo Operatorio"><i
                                                    class="feather icon-file-plus"></i></a>

                                            <a href="{{ ROUTE('cirugia.recuperacion_cesarea', $solicitud_po->id) }}"
                                                class="btn btn-secondary btn-sm btn-icon" data-toggle="tooltip"
                                                data-placement="top" title="Sala Recuperación"><i
                                                    class="feather icon-edit"></i></a>

                                            <a href="{{ ROUTE('cirugia.sala_parto_cesarea', $solicitud_po->id) }}"
                                                class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip"
                                                data-placement="top" title="Sala Hospitalización"><i
                                                    class="feather icon-edit"></i></a>
                                            <a href="{{ ROUTE('cirugia.epicrisis_alta_medica_cesarea', $solicitud_po->id) }}"
                                                class="btn btn-primary btn-sm btn-icon" data-toggle="tooltip"
                                                data-placement="top" title="Epicrisis y Alta Medica"><i
                                                    class="feather icon-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td> <span>NO EXISTEN REGISTROS</span></td>
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
                        <h6 class="f-16 text-c-blue">Solicitud de sala de partos</h6>
                        <hr>
                    </div>
                </div>
                <form id="form_solicitud_pabellon_quirurgico_cesarea"
                    action="{{ route('cirugia.registrar_solicitud_pabellon_cesarea') }}" method="POST">

                    @csrf
                    {{-- <input type="hidden" name="ficha_id_quirurgico" id="ficha_id_quirurgico"
                        value=" @if ($ficha != null) {{ $ficha->id }} @endif"> --}}
                    <input type="hidden" name="paciente_cesarea" id="paciente_cesarea" value="{{ $paciente->id }}">
                    <input type="hidden" name="tipo_cirugia" id="tipo_cirugia" value="cesarea">

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
                                            <select class="form-control form-control-sm"
                                                onchange="cargar_datos_lugar_atencion()"
                                                name="lugar_atencion_pabellon_quirurgico"
                                                id="lugar_atencion_pabellon_quirurgico">
                                                <option value="0">Seleccione...</option>
                                                @foreach ($lugares_atenciones as $lugares)
                                                    <option value="{{ $lugares->id }}"> {{ $lugares->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Correo electrónico</label>
                                            <input type="Email" class="form-control form-control-sm"
                                                name="email_quirurgico" id="email_quirurgico">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Teléfono</label>
                                            <input type="tel" class="form-control form-control-sm"
                                                name="telefono_quirurgico" id="telefono_quirurgico">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Código</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="codigo_quirurgico" id="codigo_quirurgico">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <h6 class="text-secondary">00/00/000</h6>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Fecha y hora operación</label>
                                            <input type="datetime-local" class="form-control form-control-sm"
                                                name="fecha_hora_pabellon" id="fecha_hora_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Grado de urgencia</label>
                                            <select id="grado_urgencia_pabellon" name="grado_urgencia_pabellon"
                                                class="form-control form-control-sm">
                                                <option selected value="0">Seleccione</option>
                                                <option value="1">Normal</option>
                                                <option value="2">Urgente</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="button" class="btn btn-info btn-sm btn-block">Solicitar
                                                código</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Información paciente-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Información general de la paciente</h6>
                                </div>
                                <div class="card-body shadow-none">

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Rut</label>
                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut"
                                                value="{{ $paciente->rut }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Nombre completo</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre"
                                                id="nombre"
                                                value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Edad</label>
                                            <input type="text" class="form-control form-control-sm" name="edad"
                                                id="edad"
                                                value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Previsión</label>
                                            <input type="text" class="form-control form-control-sm" name="prevision"
                                                id="prevision" value="{{ $paciente->Prevision()->first()->nombre }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Correo electrónico</label>
                                            <input type="email" class="form-control form-control-sm" name="email"
                                                id="email" value="{{ $paciente->email }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Teléfono</label>
                                            <input type="tel" class="form-control form-control-sm" name="telefono"
                                                id="telefono" value="{{ $paciente->telefono_uno }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Patologías crónicas</label>
                                            <textarea class="form-control form-control-sm" name="patologias_cronicas" id="patologias_cronicas" rows="1"
                                                onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Cesareas previas</label>
                                            <textarea class="form-control form-control-sm" rows="1" name="cesareas_previas" id="cesareas_previas"
                                                onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Semanas de embarazo</label>
                                            <input type="text" class="form-control form-control-sm"
                                                id="semanas_embarazo" name="semanas_embarazo">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Evolución</label>
                                            <textarea class="form-control form-control-sm" name="evolucion" id="evolucion" rows="1" onfocus="this.rows=3"
                                                onblur="this.rows=1;"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Riesgo fetal</label>
                                            <textarea class="form-control form-control-sm" rows="1" name="riesgo_fetal" id="riesgo_fetal" onfocus="this.rows=3"
                                                onblur="this.rows=1;"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Riesgo materno</label>
                                            <textarea class="form-control form-control-sm" rows="1" name="riesgo_materno" id="riesgo_materno" onfocus="this.rows=3"
                                                onblur="this.rows=1;"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Patología embarazo</label>
                                            <textarea class="form-control form-control-sm" name="patologia_embarazo" id="patologia_embarazo" rows="1"
                                                onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Código de parto</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="codigo_parto" id="codigo_parto">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Anestesia</label>
                                            <input type="text" class="form-control form-control-sm" name="anestesia"
                                                id="anestesia">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Tipo de hospital</label>
                                            <select id="tipo_hospital" name="tipo_hospital"
                                                class="form-control form-control-sm">
                                                <option selected value="0">Seleccione</option>
                                                <option value="1">Publico</option>
                                                <option value="2">Privado</option>
                                            </select>
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
                                            <label class="floating-label">Cirujano</label>
                                            <input type="text" class="form-control form-control-sm" name="cirujano"
                                                id="cirujano"
                                                value="{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Ayudantes</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="ayudantes"
                                                id="ayudantes"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Anestesistas y ayudantes de
                                                anestesia</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                name="anestesista_pabellon" id="anestesista_pabellon"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Arsenalería</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                name="arsenaleria_pabellon" id="arsenaleria_pabellon"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Neonatólogo/a</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="neonatologo"
                                                id="neonatologo"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Enfermero/a</label>
                                            <input type="text" class="form-control form-control-sm" name="enfermero"
                                                id="enfermero">
                                        </div>
                                        {{-- <div class="form-group col-md-4">
                                            <label class="floating-label">Anestesia</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="anestesia_equipo" id="anestesia_equipo">
                                        </div> --}}
                                        {{-- <div class="form-group col-md-4">
                                            <label class="floating-label">Tipo de hospitalización</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="tipo_hospitalizacion" id="tipo_hospitalizacion">
                                        </div> --}}
                                        {{-- <div class="form-group col-md-4">
                                            <label class="floating-label">Grado de urgencia</label>
                                            <select id="g_urgencia" name="g_urgencia"
                                                class="form-control form-control-sm">
                                                <option selected value="0">Seleccione</option>
                                                <option>Normal</option>
                                                <option>Urgente</option>
                                            </select>
                                        </div> --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Otros profesionales-->
                        {{-- <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Otros profesionales</h6>
                                </div>
                                <div class="card-body shadow-none">

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Especialidad</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="especialidad_uno_pabellon" id="especialidad_uno_pabellon">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> --}}
                        <!--Otros profesionales-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Otros</h6>
                                </div>
                                <div class="card-body shadow-none">

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Comentarios y obserrvaciones</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                name="comentarios_pabellon" id="comentarios_pabellon"></textarea>
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
    </div>
</div>
