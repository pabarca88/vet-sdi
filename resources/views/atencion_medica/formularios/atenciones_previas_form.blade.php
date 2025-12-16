
    @if(isset($titulo) && $titulo == 'NO')
    {{--  nada  --}}
    @else

    @endif
   <div style="overflow-x:auto;"></div>
        <div class="table-responsive">
            <table id="table_atenciones_profesional_" class="display table dt-responsive nowrap table-xs"
                style="width:100%">
                <thead>
                    <tr>
                        <th class="d-none">ID</th>
                        <th>Fecha</th>
                        <th>Diagnóstico</th>
                        <th>Ficha clínica</th>
                        <th>Exámenes</th>
                        <th>Receta </th>
                        <th>Archivos</th>
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
                                    <button type="button" class="btn btn-xxs btn-info-light-c" @if (isset($f->id)) onclick="buscar_ficha_atencion({{ $f->id }});" @endif><i class="feather icon-file-text"></i> Ver</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-xxs btn-success-light-c" @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i class="feather icon-activity"></i> Ver</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-xxs btn-warning-light-c"  @if (isset($f->id)) onclick="buscar_receta({{ $f->id }});" @endif><i class="feather icon-file-plus"></i> Ver</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-xxs btn-purple-light-c" @if (isset($f->id)) onclick="buscar_archivos({{ $f->id }});" @endif><i class="feather icon-folder"></i> Ver</button>
                                </td>

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
   <!--MODALS-->
    @include('general.secciones_ficha.modal_atencion_previa.hist_cons_receta')
    @include('general.secciones_ficha.modal_atencion_previa.hist_cons_examen')
    @include('general.secciones_ficha.modal_atencion_previa.hist_cons_archivo')
    @include('general.secciones_ficha.modal_atencion_previa.hist_cons')




