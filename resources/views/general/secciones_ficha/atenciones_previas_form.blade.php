        <div class="user-profile user-card mt-0 bg-fondo-gris">
            <div class="col-md-12 py-0 px-2 shadow-none">
                <div class="row mx-0">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        @if (isset($titulo) && $titulo == 'NO')
                            {{--  nada  --}}
                        @else
                    </div>
                    @endif
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h4 class="text-c-blue mt-3 f-20">Historial de atenciones</h4>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="dt-responsive table-responsive">
                                            <table id="table_atenciones_profesional"
                                                class="display table table-striped dt-responsive nowrap align-middle table-xs"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="d-none">ID</th>
                                                        <th>Fecha</th>
                                                        <th>Diagnóstico</th>
                                                        <th>Ficha clínica</th>
                                                        @if($profesional->id_tipo_especialidad != 8 && $profesional->id_especialidad != 16 && $profesional->id_sub_tipo_especialidad != 121)
                                                        <th>Ev. Especialidad</th>
                                                        @endif
                                                        <th>Exámenes</th>
                                                        <th>Recetas</th>

                                                        @if ($profesional->id_especialidad == 2)
                                                            <th>Presupuestos</th>
                                                        @endif
                                                        @if ($profesional->id_especialidad == 2)
                                                            <th>Tratamientos </th>
                                                        @endif
                                                        @if ($profesional->id_especialidad == 2)
                                                            <th>Evoluciones </th>
                                                        @endif

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if (isset($fichas) && $fichas->count() > 0)
                                                        @foreach ($fichas as $f)
                                                            <tr>
                                                                <td class="d-none">
                                                                    {{ $f->id }}
                                                                </td>
                                                                <td>
                                                                    {{ \Carbon\Carbon::parse($f->created_at)->format('d/m/Y') }}
                                                                </td>

                                                                <td>{{ $f->hipotesis_diagnostico }}</td>

                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-xxs btn-info-light-c"
                                                                        @if (isset($f->id)) onclick="buscar_ficha_atencion_atencion_previa({{ $f->id }});" @endif><i
                                                                            class="feather icon-file-text"></i>
                                                                        Ver</button>
                                                                </td>
                                                                @if($profesional->id_tipo_especialidad != 8 && $profesional->id_especialidad != 16 && $profesional->id_sub_tipo_especialidad != 121)
                                                                <td><button type="button"
                                                                            class="btn btn-xxs btn-primary-light-c"
                                                                            @if (isset($f->id)) onclick="buscar_evaluaciones_especialidad({{ $f->id }});" @endif><i
                                                                                class="feather icon-folder"></i>
                                                                            Ver</button></td>
                                                                @endif
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-xxs btn-success-light-c"
                                                                        @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i
                                                                            class="feather icon-activity"></i>
                                                                        Ver</button>
                                                                </td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-xxs btn-warning-light-c"
                                                                        @if (isset($f->id)) onclick="buscar_receta({{ $f->id }});" @endif><i
                                                                            class="feather icon-file-plus"></i>
                                                                        Ver</button>
                                                                </td>

                                                                @if ($profesional->id_especialidad == 2)
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-xxs btn-purple-light-c"
                                                                            @if (isset($f->id)) onclick="generar_pdf_historial({{ $f->id }});" @endif><i
                                                                                class="feather icon-folder"></i>
                                                                            PDF</button>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-xxs btn-success-light-c"
                                                                            @if (isset($f->id)) onclick="buscar_trabajos({{ $f->id }});" @endif>
                                                                            Tratamientos </button>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-xxs btn-primary-light-c"
                                                                            onclick="buscar_evoluciones({{ $f->id }})">Evoluciones</button>
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <span style="text-align: center">
                                                            <h5>No existen registros</h5>
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

        <!--MODALS-->
        @include('general.secciones_ficha.modal_atencion_previa.hist_cons_receta')
        @include('general.secciones_ficha.modal_atencion_previa.hist_cons_examen')
        @include('general.secciones_ficha.modal_atencion_previa.hist_cons_archivo')
        @include('general.secciones_ficha.modal_atencion_previa.hist_trabajos_dental')
        @include('general.secciones_ficha.modal_atencion_previa.hist_evoluciones_dental')
        @include('general.secciones_ficha.modal_atencion_previa.hist_cons')
        @include('general.secciones_ficha.modal_atencion_previa.evaluaciones_especialidad')
        <script>
            $(document).ready(function() {
                $('#table_atenciones_profesional').DataTable({
                    responsive: true,
                    order: [[0, 'desc']]
                });
            });
        </script>
