<div class="row">
    <div class="col-sm-12 col-md-12">
        <div style="overflow-x:auto;">
            <div class="table-responsive">
                <table id="especialidades_cm" class="display table table-striped table-xs dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-wrap align-middle">Tipo Especialidad</th>
                            <th class="text-wrap align-middle">SubTipo Especialidad</th>
                            <th class="text-wrap align-middle">N° Profesionales</th>
                            <th class="text-wrap align-right">Acción</th>
                            {{-- <th></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($especialidades_cm))
                        @foreach($especialidades_cm as $especialidad)
                        <tr>
                            <td class="align-middle">{{ $especialidad->nombre }}</td>
                            <td class="align-middle">{{ $especialidad->sub_tipo }}</td>
                            <td class="align-middle">{{ $especialidad->num_profesionales }}</td>
                            {{-- <td class="align-middle">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="esp-{{ $especialidad->id }}" onchange="cambiarEstadoEspecialidad({{ $especialidad->id }})" @if($especialidad->estado == 1) checked @endif>
                                    <label class="custom-control-label" for="esp-{{ $especialidad->id }}"></label>
                                </div>
                            </td> --}}
                            <td class="align-middle">
                                <button type="button" class="btn btn-warning btn-icon" onclick="dame_especialidad_cm({{ $especialidad->id }})"><i class="feather icon-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_especialidad_cm({{ $especialidad->id }});"><i class="feather icon-x"></i></button>
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

<script>
    $(document).ready(function() {
        $('#especialidades_cm').DataTable();
    });
</script>
