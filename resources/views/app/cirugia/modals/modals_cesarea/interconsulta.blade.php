<!---******* Modal Formulario de interconsulta ********-->
<div id="modal_interconsulta" class="modal fade" tabindex="100" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Interconsulta</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body mb-0">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <input type="text" class="form-control form-control-sm" name="nombre_paciente_interconasulta"
                            placeholder="ingrese nombre" id="nombre_paciente_interconasulta"
                            value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Rut</label>
                        <input type="person" class="form-control form-control-sm" value="{{ $paciente->rut }}"
                            name="rut_paciente_interconasulta" id="rut_paciente_interconasulta">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Edad</label>
                        <input type="number" class="form-control form-control-sm" name="edad_paciente_interconasulta"
                            id="edad_paciente_interconasulta"
                            value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Dirección</label>
                        <input type="address" class="form-control form-control-sm"
                            name="direccion_paciente_interconasulta" id="direccion_paciente_interconasulta"
                            value="{{ $paciente->Direccion()->first()->direccion }}">
                    </div>

                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Regi&oacute;n</label>
                        <select id="region_paciente_interconsulta" name="region_paciente_interconsulta"
                            class="form-control form-control-sm">
                            <option value="0">Seleccione una opci&oacute;n </option>
                            @foreach ($regiones as $r)
                                @if ($r->id ==
    $paciente->Direccion()->first()->Ciudad()->first()->id_region)
                                    <option id="{{ $r->id }}" selected> {{ $r->nombre }} </option>
                                @endif
                                <option id="{{ $r->id }}"> {{ $r->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Ciudad</label>
                        <select id="region_paciente_interconsulta" name="region_paciente_interconsulta"
                            class="form-control form-control-sm">
                            <option value="0">Seleccione una opci&oacute;n </option>


                            @foreach ($ciudades as $c)
                                @if ($c->id ==
    $paciente->Direccion()->first()->Ciudad()->first()->id)
                                    <option id="{{ $c->id }}" selected> {{ $c->nombre }} </option>
                                @endif
                                <option id="{{ $c->id }}"> {{ $c->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <ul class="nav nav-pills mt-3 mb-4" id="pills-tab-interconsulta" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link-modal active" id="pills-tab-inter-especialidad" data-toggle="pill"
                            href="#pills-inter-especialidad" role="tab" aria-controls="pills-home"
                            aria-selected="true">Interconsulta Especialidad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-modal" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                            role="tab" aria-controls="pills-profile" aria-selected="false">Responder Interconsulta</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent-interconsulta">
                    <div class="tab-pane fade show active" id="pills-inter-especialidad" role="tabpanel"
                        aria-labelledby="pills-tab-inter-especialidad">
                        {{-- <form id="inter-especialidad" action="{{ route('dental.registrar_interconsulta') }}"
                            method="post">

                            @csrf --}}
                        {{-- <input type="hidden" name="ficha_id_interconsulta" id="ficha_id_interconsulta"
                                value=" @if ($ficha != null) {{ $ficha->id }} @endif"> --}}
                        <input type="hidden" name="paciente_interconsulta" id="paciente_interconsulta"
                            value="{{ $paciente->id }}">
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Nombre especialidad o especialista</label>
                                <input type="text" class="form-control form-control-sm"
                                    name="nombre_especialista_interconsulta" id="nombre_especialista_interconsulta">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                <input type="text" class="form-control form-control-sm" name="hipotesis_interconsulta"
                                    id="hipotesis_interconsulta">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Se desea saber</label>
                                <textarea type="text" class="form-control form-control-sm" rows="2" name="comentarios_interconsulta"
                                    id="comentarios_interconsulta"></textarea>
                            </div>
                            {{-- <div class="col-sm-12 col-md-12 text-center mb-2">
                                    <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                                </div> --}}
                        </div>
                        <div class="modal-footer pt-2 pb-0">
                            <button type="button" class="btn btn-danger" onclick="reset_form('inter-especialidad')"
                                data-dismiss="modal">Cancelar</button>
                            <button onclick="indicar_interconsulta_cirugia();" type="button"
                                class="btn btn-info">Agregar</button>
                        </div>
                        {{-- </form> --}}
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        {{-- <form id="inter-especialidad-respuesta"> --}}

                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Diagnóstico</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Tratamiento</label>
                                <textarea type="text" class="form-control form-control-sm" rows="2" name="" id=""></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Comentario</label>
                                <textarea type="text" class="form-control form-control-sm" rows="2" name="" id=""></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Nombre del profesional</label>
                                <input type="text" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Email</label>
                                <input type="email" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Fecha de control</label>
                                <input type="date" class="form-control form-control-sm" name="" id="">
                            </div>
                            <div class="col-sm-12 col-md-12 text-center mb-2">
                                <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                            </div>
                        </div>
                        <div class="modal-footer pt-2 pb-0">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-info">Guardar Respuesta</button>
                        </div>
                        {{-- </form> --}}
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                    <!--Tabla-->
                    <div class="table-responsive">
                        <p>Elementos en la Tabla:
                        <div id="adicionados"></div>
                        </p>
                        <table id="tabla_interconsulta" class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">
                                        Nombre Especialista
                                    </th>
                                    <th class="text-center align-middle">
                                        Hipotesis Diagnóstica
                                    </th>
                                    <th class="text-center align-middle">Se desea saber</th>
                                    </th>
                                    <th class="text-center align-middle">
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!--Cierre Tabla-->
                </div>
                <div class="modal-footer pt-2 pb-0">
                    <button type="button" onclick="alerta_registro_interconsulta()" data-dismiss="modal"
                        class="btn btn-info">Registrar</button>
                </div>

            </div>
        </div>
    </div>
</div>
