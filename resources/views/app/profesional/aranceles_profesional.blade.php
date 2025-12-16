@extends('template.profesional.template')

@section('page-styles')
<style>
p {
    color: #59636d;
    word-wrap: break-word !important;
    font-size: 14px;
}
.ui-autocomplete {
        z-index: 9999999 !important;
        position: absolute;
        background: #fff;
        border: 1px solid #545454;
        padding: 6px;
        text-transform: uppercase;
        cursor: pointer;
    }
</style>
@endsection

@section('content')

<div class="pcoded-main-container">
	<div class="pcoded-content  m-top">
		<!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12 mt-2">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('profesional.pacientes') }}" data-toggle="tooltip" data-placement="top" title="Volver a mis pacientes">Mis pacientes</a></li>
                            <li class="breadcrumb-item"><a href="#">Configuracion trabajos y aranceles</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="row bg-gris">
            <div class="col-12">
                <div class="card-informacion bg-purple mt-3">
                    <div class="card-body text-center">
                        <h5 class="text-white mb-0">Estimado Profesional {{ Auth::user()->name }} rogamos personalizar su listado de aranceles editando el procedimiento, número de bloques y valor.</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
             <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-3">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="f-18 text-white">UCO</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="floating-label-activo-sm" for="valor_uco">Valor UCO</label>
                                <input type="number" name="valor_uco" id="valor_uco" class="form-control form-control-sm" placeholder="Ingrese el valor de la UCO">
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-sm btn-block" type="button" onclick="recalcular_presupuestos()"><i class="feather icon-check"></i> Recalcular aranceles</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="f-18 text-white">Ingresar procedimiento &nbsp; &nbsp; {{ $profesional->TipoEspecialidad()->first()->nombre }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm" for="nombre_procedimiento_impl">Nombre del procedimiento</label>
                                    @if(isset($profesional) && $profesional->id_tipo_especialidad == 16)
                                    <input type="text" name="nombre_procedimiento_impl" id="nombre_procedimiento_impl" class="form-control form-control-sm">
                                    @else
                                    <input type="text" name="nombre_procedimiento" id="nombre_procedimiento" class="form-control form-control-sm" placeholder="Ingrese el nombre del procedimiento">
                                    @endif
                                </div>
                                <div class="col-md-12 mt-2 diagnostico_activo"></div>
                                <div class="col-md-12 mt-2 diagnostico_inactivo" style="display: none;"></div>
                                <input type="hidden" name="id_procedimiento" id="id_procedimiento">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cantidad_bloques_buscador" class="floating-label-activo-sm">Cantidad de bloques</label>
                                    <input type="number" name="cantidad_bloques_buscador" id="cantidad_bloques_buscador" class="form-control form-control-sm">
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cantidad_uco_buscador" class="floating-label-activo-sm">Cantidad de UCO</label>
                                    <input type="number" name="cantidad_uco_buscador" id="cantidad_uco_buscador" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="tiene_lab_buscador">
                                    <label class="form-check-label" for="existeLaboratorioDental">
                                        ¿Laboratorio?
                                    </label>
                                </div>
                            </div>
                        </div>
                        @if(isset($profesional) && $profesional->id_tipo_especialidad == 16)
                            <button class="btn btn-primary btn-sm my-2 btn-block" role="button" onclick="guardarTratamientoProfesional({{ $profesional->id_tipo_especialidad }})"><i class="feather icon-save"></i> Guardar</button>
                        @else
                            <button class="btn btn-primary btn-sm my-2 btn-block" role="button" onclick="guardarTratamientoProfesional({{ $profesional->id_tipo_especialidad }})"><i class="feather icon-save"></i> Guardar</button>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-9">
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="text-white d-inline">Trabajos y aranceles calculados con un valor de uco de $ <span id="valor_uco_header">{{ number_format($valor_uco,0,',','.') }}</span>
                            <button class="btn btn-light btn-xs float-md-right d-inline" data-bs-toggle="modal" data-bs-target="#modalAgregarDiagnosticoDental" type="button"><i class="fas fa-plus"></i> Agregar nuevo Diagnóstico/Trabajo</button>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="display table w-100 table-striped dt-responsive nowrap dataTable no-footer dtr-inline collapsed" id="table_procedimientos_propios_dental">
                            <thead>
                                <tr>
                                    <th>Procedimiento</th>
                                    <th>UCO</th>
                                    <th>Valor</th>
                                    <th>¿Laboratorio?</th>
                                    <th>Bloques</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($mis_trabajos_profesional))
                                @foreach ($mis_trabajos_profesional as $mi_trabajo)
                                    <tr>
                                        <td>{{ $mi_trabajo->descripcion }}</td>
                                        <td>{{ $mi_trabajo->cantidad_uco }}</td>
                                        <td>${{ number_format($mi_trabajo->valor,0,',','.') }}</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $mi_trabajo->id }}" id="existeLaboratorioDental{{ $mi_trabajo->id }}" onclick="guardarLaboratorio({{ $mi_trabajo->id }})" @if($mi_trabajo->laboratorio == 1) checked @endif>
                                                <label class="form-check-label" for="existeLaboratorioDental{{ $mi_trabajo->id }}">
                                                    ¿Laboratorio?
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{ $mi_trabajo->cantidad_bloques }}</td>
                                        <td>
                                            <button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-x"></i></button>
                                            <button class="btn btn-warning btn-icon" type="button" onclick="mostrar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-edit"></i></button>
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
<!-- Modal -->
<div class="modal fade" id="modalAgregarDiagnosticoDental" tabindex="-1" aria-labelledby="modalAgregarDiagnosticoDentalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalAgregarDiagnosticoDentalLabel">Agregar nuevo procedimiento / trabajo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="nombre_procedimiento_nuevo">Nombre del procedimiento</label>
                        <input type="text" name="nombre_procedimiento_nuevo" id="nombre_procedimiento_nuevo" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="cantidad_uco">Cantidad UCO</label>
                        <input type="number" name="cantidad_uco" id="cantidad_uco" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="cantidad_uco">Cantidad Bloques</label>
                        <input type="number" name="cantidad_bloques" id="cantidad_bloques" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="tiene_lab">
                            <label class="form-check-label" for="existeLaboratorioDental">
                                ¿Laboratorio?
                            </label>
                        </div>
                </div>
            </div>


            <button type="button" class="btn btn-info btn-sm float-right" id="btn_guardar_procedimiento" onclick="agregar_otro_procedimiento()"><i class="fas fa-plus"></i>  Agregar otro diagnostico</button>
            {{-- <table class="table w-100" id="table_procedimientos_propios_dental">
                <thead>
                    <tr>
                        <th>Procedimiento</th>
                        <th>UCO</th>
                        <th>¿Laboratorio?</th>
                        <th>Bloques</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mis_trabajos_profesional as $mi_trabajo)
                        <tr>
                            <td>{{ $mi_trabajo->descripcion }}</td>
                            <td>{{ $mi_trabajo->uco }}</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $mi_trabajo->id }}" id="existeLaboratorioDental{{ $mi_trabajo->id }}" onclick="guardarLaboratorio({{ $mi_trabajo->id }})" @if($mi_trabajo->laboratorio == 1) checked @endif>
                                    <label class="form-check-label" for="existeLaboratorioDental{{ $mi_trabajo->id }}">
                                        ¿Laboratorio?
                                    </label>
                                </div>
                            </td>
                            <td>{{ $mi_trabajo->cantidad_bloques }}</td>
                            <td>
                                <button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-x"></i></button>
                                <button class="btn btn-warning btn-icon" type="button" onclick="mostrar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-edit"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
        <!--<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>-->
        </div>
    </div>
</div>
@endsection

@section('page-script')
    <script>
        function recalcular_presupuestos(){
            var valor_uco = $('#valor_uco').val();
            if(valor_uco == ''){
                swal({
                    title: 'Error',
                    text: 'Debe ingresar el valor de la UCO',
                    icon: 'error'
                });
                return;
            }

            let url = "{{ route('profesional.recalcular_presupuestos') }}";
            let data = {
                valor_uco: valor_uco,
                _token: '{{ csrf_token() }}'
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);
                    if(response.status == "ok"){
                        $('#valor_uco_header').text(parseFloat(valor_uco).toLocaleString('es-CL', { minimumFractionDigits: 0, maximumFractionDigits: 0 }));
                        swal({
                            title: 'Éxito',
                            text: 'Se han recalculado los presupuestos correctamente',
                            icon: 'success'
                        });
                        let trabajos = response.mis_trabajos_profesional;
                        let table = $('#table_procedimientos_propios_dental').DataTable(); // Accede a la instancia de DataTable
                        // Limpia los datos de la tabla correctamente
                        table.clear();
                        // Agrega las nuevas filas
                        trabajos.forEach(trabajo => {
                            trabajo.valor = parseFloat(trabajo.valor).toLocaleString('es-CL', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
                            console.log(trabajo);
                            const isChecked = trabajo.laboratorio === 1 ? 'checked' : '';
                            table.row.add([
                                trabajo.descripcion,
                                trabajo.cantidad_uco,
                                '$'+trabajo.valor,

                                `
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="existeLaboratorioDental${trabajo.id}" onclick="guardarLaboratorioIndex(${trabajo.id})" ${isChecked}>
                                    <label class="form-check-label" for="existeLaboratorioDental${trabajo.id}" >
                                        ¿Laboratorio?
                                    </label>
                                </div>
                                `,
                                trabajo.cantidad_bloques,
                                `<button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento(${trabajo.id})"><i class="eather icon-x"></i></button>
                                <button class="btn btn-warning btn-icon" type="button" onclick="mostrar_procedimiento(${trabajo.id})"><i class="eather icon-edit"></i></button>`
                            ]);
                        });
                        // Dibuja la tabla nuevamente
                        table.draw();
                    }else{
                        swal({
                            title: 'Error',
                            text: 'No se han podido recalcular los presupuestos',
                            icon: 'error'
                        });
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function agregar_otro_procedimiento() {
            var nombre_procedimiento_nuevo = $('#nombre_procedimiento_nuevo').val();
            var cantidad_uco = $('#cantidad_uco').val();
            var tiene_lab = $('#tiene_lab').is(':checked') ? 1 : 0;
            if (nombre_procedimiento_nuevo == '' || cantidad_uco == '') {
                swal({
                    title: 'Error',
                    text: 'Debe ingresar el nombre del procedimiento y la cantidad de UCO',
                    icon: 'error'
                });
                return;
            }

            let data = {
                nombre_procedimiento_nuevo: nombre_procedimiento_nuevo,
                cantidad_uco: cantidad_uco,
                tiene_lab: tiene_lab,
                nuevo_procedimiento: true,
                _token: '{{ csrf_token() }}'
            }

            let url = "{{ route('profesional.agregar_procedimiento') }}";

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);

                    // Actualizar procedimientos propios
                    let procedimientos = response.procedimientos;
                    var table_procedimientos_propios = $('#table_procedimientos_propios_dental').DataTable();

                    // Limpia los datos de la tabla
                    table_procedimientos_propios.clear();

                    // Agrega las nuevas filas
                    procedimientos.forEach(p => {
                        p.valor = parseFloat(p.valor).toLocaleString('es-CL', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
                        const isChecked_p = p.laboratorio == 1 ? 'checked' : '';
                        table_procedimientos_propios.row.add([
                            p.descripcion,
                            p.uco,
                            '$'+p.valor,
                            `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="${p.id}" id="existeLaboratorioDental${p.id}" onclick="guardarLaboratorio(${p.id})" ${isChecked_p}>
                                <label class="form-check-label" for="existeLaboratorioDental${p.id}">
                                    ¿Laboratorio?
                                </label>
                            </div>
                            `,
                            p.cantidad_bloques,
                            `<button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento(${p.id})"><i class="fas feather icon-x"></i></button>
                            <button class="btn btn-warning btn-icon" type="button" onclick="mostrar_procedimiento(${p.id})"><i class="feather icon-edit"></i></button>`
                        ]);
                    });

                    // Redibuja la tabla
                    table_procedimientos_propios.draw();

                    // Actualizar la tabla DataTable
                    let trabajos = response.trabajos;
                    let table = $('#table_aranceles_dental').DataTable(); // Accede a la instancia de DataTable

                    // Limpia los datos de la tabla correctamente
                    table.clear();

                    // Agrega las nuevas filas
                    trabajos.forEach(trabajo => {
                        const isChecked = trabajo.laboratorio === 1 ? 'checked' : '';
                        table.row.add([
                            trabajo.descripcion,
                            trabajo.valor,
                            trabajo.uco,
                            `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="existeLaboratorioDental${trabajo.id}" onclick="guardarLaboratorioIndex(${trabajo.id})" ${isChecked}>
                                <label class="form-check-label" for="existeLaboratorioDental${trabajo.id}" >
                                    ¿Laboratorio?
                                </label>
                            </div>
                            `,
                            `<button class="btn btn-warning btn-icon" role="button" onclick="mostrar_procedimiento(${trabajo.id})"><i class="feather icon-edit"></i> Editar</button>`
                        ]);
                    });

                    // Dibuja la tabla nuevamente
                    table.draw();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }


        function eliminar_procedimiento(id){
            swal({
                title:'Eliminar Procedimiento Dental',
                text:'¿Está seguro que desea eliminar el procedimiento dental?',
                icon:'warning',
                buttons:["Cancelar","Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    confirmar_eliminar_procedimiento(id);
                }
            });
        }

        function confirmar_eliminar_procedimiento(id){
            console.log(id);
            let data = {
                id: id,
                _token: CSRF_TOKEN,
            }

            let url = '{{ ROUTE("profesional.eliminar_procedimiento") }}';

            $.ajax({
                type:'post',
                url: url,
                data: data,
                success: function(response){
                    console.log(response);
                    // Actualizar procedimientos propios
                    let procedimientos = response.procedimientos;
                    var table_procedimientos_propios = $('#table_procedimientos_propios_dental').DataTable();

                    // Limpia los datos de la tabla
                    table_procedimientos_propios.clear();

                    // Agrega las nuevas filas
                    procedimientos.forEach(p => {
                        p.valor = parseFloat(p.valor).toLocaleString('es-CL', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
                        const isChecked_p = p.laboratorio == 1 ? 'checked' : '';
                        table_procedimientos_propios.row.add([
                            p.descripcion,
                            p.uco,
                            '$'+p.valor,
                            `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="${p.id}" id="existeLaboratorioDental${p.id}" onclick="guardarLaboratorio(${p.id})" ${isChecked_p}>
                                <label class="form-check-label" for="existeLaboratorioDental${p.id}">
                                    ¿Laboratorio?
                                </label>
                            </div>
                            `,
                            p.cantidad_bloques,
                            `<button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento(${p.id})"><i class="feather icon-x"></i></button>
                            <button class="btn btn-warning btn-icon" type="button" onclick="mostrar_procedimiento(${p.id})"><i class="feather icon-edit"></i></button>`
                        ]);
                    });

                    // Redibuja la tabla
                    table_procedimientos_propios.draw();

                    // Actualizar la tabla DataTable
                    let trabajos = response.trabajos;
                    let table = $('#table_aranceles_dental').DataTable(); // Accede a la instancia de DataTable

                    // Limpia los datos de la tabla correctamente
                    table.clear();

                    // Agrega las nuevas filas
                    trabajos.forEach(trabajo => {
                        const isChecked = trabajo.laboratorio === 1 ? 'checked' : '';
                        table.row.add([
                            trabajo.descripcion,
                            trabajo.valor,
                            trabajo.uco,
                            `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="existeLaboratorioDental${trabajo.id}" onclick="guardarLaboratorioIndex(${trabajo.id})" ${isChecked}>
                                <label class="form-check-label" for="existeLaboratorioDental${trabajo.id}">
                                    ¿Laboratorio?
                                </label>
                            </div>
                            `,
                            `<button class="btn btn-warning btn-icon" role="button" onclick="mostrar_procedimiento(${trabajo.id})"><i class="feather icon-edit"></i> Editar</button>`
                        ]);
                    });

                    // Dibuja la tabla nuevamente
                    table.draw();
                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }

        function mostrar_procedimiento(id){
            console.log(id);
            let data = {
                id: id,
                _token: CSRF_TOKEN,
            }

            let url = '{{ ROUTE("profesional.mostrar_procedimiento") }}';

            $.ajax({
                type:'post',
                url: url,
                data: data,
                success: function(response){
                    console.log(response);
                    if(response.status == "ok"){
                        // swal({
                        //     title: 'Procedimiento dental',
                        //     text: 'Se ha encontrado el procedimiento dental',
                        //     icon: 'success'
                        // });
                        // abrir modal
                        $('#modalAgregarDiagnosticoDental').modal('show');
                        // llenar los campos del modal
                        $('#nombre_procedimiento_nuevo').val(response.procedimiento.descripcion);
                        $('#cantidad_uco').val(response.procedimiento.cantidad_uco);
                        $('#cantidad_bloques').val(response.procedimiento.cantidad_bloques);
                        $('#tiene_lab').prop('checked', response.procedimiento.laboratorio == 1 ? true : false);
                        $('#btn_guardar_procedimiento').attr('onclick', 'editarProcedimiento(' + id + ')');
                        $('#btn_guardar_procedimiento').text('Editar');
                        $('#btn_guardar_procedimiento').removeClass('btn-success');
                        $('#btn_guardar_procedimiento').addClass('btn-warning');


                    }


                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }

        function guardarLaboratorio(trabajoId) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var existeLaboratorio = $('#existeLaboratorioDental' + trabajoId).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('dental.guardarLaboratorio') }}", // Asegúrate de que esta ruta exista en tus rutas
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    trabajo_id: trabajoId,
                    existe_laboratorio: existeLaboratorio
                },
                success: function(response) {
                    return console.log(response);
                    // Actualizar procedimientos propios
                    let procedimientos = response.procedimientos;
                    $('#table_procedimientos_propios_dental').empty();
                    procedimientos.forEach(p => {
                        const isChecked_ = p.laboratorio === 1 ? 'checked' : '';
                        var html = '<tr>';
                        html += '<td>' + p.descripcion + '</td>';
                        html += '<td>' + p.uco + '</td>';
                        html += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="${p.id}" id="existeLaboratorioDental${p.id}" onclick="guardarLaboratorio(${p.id})" ${isChecked_}>
                                        <label class="form-check-label" for="existeLaboratorioDental${p.id}">
                                            ¿Laboratorio?
                                        </label>
                                    </div>
                                </td>`;
                        html += '<td><button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento(' + p.id + ')"><i class="feather icon-x"></i></button></td>';
                        html += '</tr>';
                        $('#table_procedimientos_propios_dental').append(html);
                    });

                    // Actualizar la tabla DataTable
                    let trabajos = response.trabajos;
                    let table = $('#table_aranceles_dental').DataTable(); // Accede a la instancia de DataTable

                    // Limpia los datos de la tabla correctamente
                    table.clear();

                    // Agrega las nuevas filas
                    trabajos.forEach(trabajo => {
                        const isChecked = trabajo.laboratorio === 1 ? 'checked' : '';
                        table.row.add([
                            trabajo.descripcion,
                            trabajo.valor,
                            trabajo.uco,
                            `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="existeLaboratorioDental${trabajo.id}" onclick="guardarLaboratorio(${trabajo.id})" ${isChecked}>
                                <label class="form-check-label" for="existeLaboratorioDental${trabajo.id}" >
                                    ¿Laboratorio?
                                </label>
                            </div>
                            `,
                            `<button class="btn btn-warning btn-icon" role="button" onclick="mostrar_procedimiento(${trabajo.id})"><i class="feather icon-edit"></i> Editar</button>`
                        ]);
                    });

                    // Dibuja la tabla nuevamente
                    table.draw();
                    // Maneja la respuesta del servidor aquí
                    alert('Estado del laboratorio guardado correctamente');
                },
                error: function(xhr, status, error) {
                    // Maneja los errores aquí
                    alert('Error al guardar el estado del laboratorio');
                }
            });
        }

        function guardarLaboratorioIndex(trabajoId){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var existeLaboratorio = $('#existeLaboratorioDental' + trabajoId).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('dental.guardarLaboratorio') }}", // Asegúrate de que esta ruta exista en tus rutas
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    trabajo_id: trabajoId,
                    existe_laboratorio: existeLaboratorio
                },
                success: function(response) {
                    console.log(response);
                    // Actualizar procedimientos propios
                    let procedimientos = response.procedimientos;
                    $('#table_procedimientos_propios_dental').empty();
                    procedimientos.forEach(p => {
                        const isChecked_ = p.laboratorio === 1 ? 'checked' : '';
                        var html = '<tr>';
                        html += '<td>' + p.descripcion + '</td>';
                        html += '<td>' + p.uco + '</td>';
                        html += `<td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="${p.id}" id="existeLaboratorioDental${p.id}" onclick="guardarLaboratorio(${p.id})" ${isChecked_}>
                                        <label class="form-check-label" for="existeLaboratorioDental${p.id}">
                                            ¿Laboratorio?
                                        </label>
                                    </div>
                                </td>`;
                        html += '<td><button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento(' + p.id + ')"><i class="feather icon-x"></i></button></td>';
                        html += '</tr>';
                        $('#table_procedimientos_propios_dental').append(html);
                    });
                    // Maneja la respuesta del servidor aquí
                    alert('Estado del laboratorio guardado correctamente');
                },
                error: function(xhr, status, error) {
                    // Maneja los errores aquí
                    alert('Error al guardar el estado del laboratorio');
                }
            });
        }

        function guardarTratamientoProfesional(especialidad){
            if(especialidad == 16){
                var nombre_procedimiento = $('#nombre_procedimiento_impl').val();
            }else{
                var nombre_procedimiento = $('#nombre_procedimiento').val();
            }
            var cantidad_bloques = $('#cantidad_bloques_buscador').val();
            var cantidad_uco = $('#cantidad_uco_buscador').val();
            var tiene_lab = $('#tiene_lab_buscador').is(':checked') ? 1 : 0;
            var valor_uco = $('#valor_uco').val();
            if(valor_uco == ''){
                swal({
                    title: 'Error',
                    text: 'Debe ingresar el valor de la UCO',
                    icon: 'error'
                });
                return;
            }

            if(nombre_procedimiento == '' || cantidad_bloques == '' || cantidad_uco == ''){
                swal({
                    title: 'Error',
                    text: 'Debe ingresar el nombre del procedimiento, la cantidad de bloques y la cantidad de UCO',
                    icon: 'error'
                });
                return;
            }

            let data = {
                nombre_procedimiento: nombre_procedimiento,
                cantidad_bloques: cantidad_bloques,
                cantidad_uco: cantidad_uco,
                tiene_lab: tiene_lab,
                nuevo_procedimiento: false,
                valor_uco: valor_uco,
                _token: '{{ csrf_token() }}'
            }

            console.log(data);

            let url = "{{ route('profesional.agregar_procedimiento') }}";

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);
                    if(response.status == 'ok' ){
                        swal({
                            title: 'Procedimiento guardado',
                            text: 'El procedimiento se ha guardado correctamente',
                            icon: 'success'
                        });
                        // limpiar campos
                        $('#nombre_procedimiento').val('');
                        $('#cantidad_bloques_buscador').val('');
                        $('#cantidad_uco_buscador').val('');
                        $('#tiene_lab_buscador').prop('checked', false);

                        // Actualizar procedimientos propios
                        let procedimientos = response.mis_trabajos_profesional;
                        var table_procedimientos_propios = $('#table_procedimientos_propios_dental').DataTable();

                        // Limpia los datos de la tabla
                        table_procedimientos_propios.clear();

                        // Agrega las nuevas filas
                        procedimientos.forEach(p => {
                            const isChecked_p = p.laboratorio == 1 ? 'checked' : '';
                            let valor = parseFloat(p.valor).toLocaleString('es-CL', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
                            table_procedimientos_propios.row.add([
                                p.descripcion,
                                p.cantidad_uco,
                                '$'+valor,
                                `
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="${p.id}" id="existeLaboratorioDental${p.id}" onclick="guardarLaboratorio(${p.id})" ${isChecked_p}>
                                    <label class="form-check-label" for="existeLaboratorioDental${p.id}">
                                        ¿Laboratorio?
                                    </label>
                                </div>
                                `,
                                p.cantidad_bloques,
                                `<button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento(${p.id})"><i class="feather icon-x"></i></button>
                                <button class="btn btn-warning btn-icon" type="button" onclick="mostrar_procedimiento(${p.id})"><i class="eather icon-edit"></i></button>`
                            ]);
                        });

                        // Redibuja la tabla
                        table_procedimientos_propios.draw();

                        // Actualizar la tabla DataTable
                        let trabajos = response.trabajos;
                        let table = $('#table_aranceles_dental').DataTable(); // Accede a la instancia de DataTable

                        // Limpia los datos de la tabla correctamente
                        table.clear();

                        // Agrega las nuevas filas
                        trabajos.forEach(trabajo => {
                            const isChecked = trabajo.laboratorio === 1 ? 'checked' : '';
                            table.row.add([
                                trabajo.descripcion,
                                trabajo.valor,
                                trabajo.uco,
                                `
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="existeLaboratorioDental${trabajo.id}" onclick="guardarLaboratorioIndex(${trabajo.id})" ${isChecked}>
                                    <label class="form-check-label" for="existeLaboratorioDental${trabajo.id}" >
                                        ¿Laboratorio?
                                    </label>
                                </div>
                                `,
                                `<button class="btn btn-warning btn-icon role="button" onclick="mostrar_procedimiento(${trabajo.id})"><i class="feather icon-edit"></i> Editar</button>`
                            ]);
                        });

                        // Dibuja la tabla nuevamente
                        table.draw();
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });

        }

        function editarProcedimiento(id){
            var nombre_procedimiento_nuevo = $('#nombre_procedimiento_nuevo').val();
            var cantidad_uco = $('#cantidad_uco').val();
            var cantidad_bloques = $('#cantidad_bloques').val();
            var tiene_lab = $('#tiene_lab').is(':checked') ? 1 : 0;
            var valor_uco = $('#valor_uco').val();
            if(valor_uco == ''){
                swal({
                    title: 'Error',
                    text: 'Debe ingresar el valor de la UCO',
                    icon: 'error'
                });
                return;
            }
            if (nombre_procedimiento_nuevo == '' || cantidad_uco == '') {
                swal({
                    title: 'Error',
                    text: 'Debe ingresar el nombre del procedimiento y la cantidad de UCO',
                    icon: 'error'
                });
                return;
            }

            let data = {
                id: id,
                nombre_procedimiento_nuevo: nombre_procedimiento_nuevo,
                cantidad_uco: cantidad_uco,
                cantidad_bloques: cantidad_bloques,
                tiene_lab: tiene_lab,
                nuevo_procedimiento: false,
                valor_uco: valor_uco,
                _token: '{{ csrf_token() }}'
            }

            let url = "{{ route('profesional.editar_procedimiento') }}";

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);
                    if(response.status === 'ok'){
                        swal({
                            title: 'Procedimiento editado',
                            text: 'El procedimiento se ha editado correctamente',
                            icon: 'success'
                        });
                        // ocultar modal
                        $('#modalAgregarDiagnosticoDental').modal('hide');
                        // Actualizar procedimientos propios
                        let procedimientos = response.procedimientos;
                        console.log(procedimientos);
                        var table_procedimientos_propios = $('#table_procedimientos_propios_dental').DataTable();

                        // Limpia los datos de la tabla
                        table_procedimientos_propios.clear();

                        // Agrega las nuevas filas
                        procedimientos.forEach(p => {
                            // formatear el valor a 0 decimales y separador de miles
                            p.valor = parseFloat(p.valor).toLocaleString('es-CL', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
                            const isChecked_p = p.laboratorio == 1 ? 'checked' : '';
                            table_procedimientos_propios.row.add([
                                p.descripcion,
                                p.cantidad_uco,
                                '$'+p.valor,
                                `
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="${p.id}" id="existeLaboratorioDental${p.id}" onclick="guardarLaboratorio(${p.id})" ${isChecked_p}>
                                    <label class="form-check-label" for="existeLaboratorioDental${p.id}">
                                        ¿Laboratorio?
                                    </label>
                                </div>
                                `,
                                p.cantidad_bloques,
                                `<button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento(${p.id})"><i class="eather icon-x"></i></button>
                                <button class="btn btn-warning btn-icon" type="button" onclick="mostrar_procedimiento(${p.id})"><i class="eather icon-edit"></i></button>`
                            ]);
                        });

                        // Redibuja la tabla
                        table_procedimientos_propios.draw();
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection
