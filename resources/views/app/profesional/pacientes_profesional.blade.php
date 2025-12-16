@extends('template.profesional.template')
@section('content')

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">

            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Mis clientes </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <!-- Tabla mis clientes -->
            <!--Este formulario muestra los pacientes que alguna vez atendió el profesional (relacion: id_paciente/id_profesional)-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-center bg-info">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg mb-1 align-botton d-flex justify-content-between">
                                <h4 class="text-white f-20 d-inline ml-4 mt-1 float-left">Mis clientes</h4>
                                <button class="btn btn-purple btn-sm  d-inline float-md-right" onclick="enviar_difusion_pacientes()"><i class="feather icon-mail"></i>  Enviar mensaje de difusión a mis clientes</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="table-responsive">
                                    <table id="" class="display table table-striped dt-responsive nowrap table-xs"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Mascota</th>
                                                <th>Especie</th>
                                                <th>Raza</th>
                                                <th>Convenio</th>
                                                <th>Chip-Tatuaje</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Daniela Sepúlveda Bravo<br><strong>18.382.693-K</strong></td>
                                                <td>Plumita</td>
                                                <td>Felino</td>
                                                <td>Mestizo</td>
                                                <td>-</td>
                                                <td>No</td>
                                                <td>Insertar botones despues</td>
                                            </tr>
                                            <tr>
                                                <td>Daniela Sepúlveda Bravo<br><strong>18.382.693-K</strong></td>
                                                <td>Noa</td>
                                                <td>Canino</td>
                                                <td>Yorkshire Terrier</td>
                                                <td>-</td>
                                                <td>Si</td>
                                                <td>Insertar botones despues</td>
                                            </tr>
                                            <tr>
                                                <td>Daniela Sepúlveda Bravo<br><strong>18.382.693-K</strong></td>
                                                <td>Manchitas</td>
                                                <td>Felino</td>
                                                <td>Mestizo</td>
                                                <td>-</td>
                                                <td>No</td>
                                                <td>Insertar botones despues</td>
                                            </tr>
                                            <tr>
                                                <td>Daniela Sepúlveda Bravo<br><strong>18.382.693-K</strong></td>
                                                <td>Perlitas</td>
                                                <td>Felino</td>
                                                <td>Mestizo</td>
                                                <td>-</td>
                                                <td>No</td>
                                                <td>Insertar botones despues</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cierre: Tabla mis pacientes -->
    </div>
    <!--Cierre: Container Completo-->

    <!--Modal envio de correo-->
    <div class="modal fade" id="modal_correo" tabindex="-1" role="dialog" aria-labelledby="enviar_email"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-center">
                    <h4 class="modal-title text-white w-100 font-weight-bold">Nuevo Correo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text">
                            <label data-error="wrong" data-success="right" for="form34">
                                @if (isset($p))
                                    {{ $p->nombres . ' ' . $p->apellido_uno . ' ' . $p->apellido_dos }}
                                @endif
                            </label>
                        </i><br>
                        <i class="fas fa-envelope prefix grey-text">
                            <label data-error="wrong" data-success="right" for="form29">
                                @if (isset($p))
                                    {{ $p->email }}
                                @endif

                            </label>
                        </i><br>

                        <i class="fas fa-tag prefix grey-text">
                            <label data-error="wrong" data-success="right" for="form32">
                                Asunto
                            </label>
                        </i>
                        <input type="text" id="titulo_email" name="titulo_email" class="form-control validate"><br>

                        <i class="fas fa-pencil prefix grey-text">
                            <label data-error="wrong" data-success="right" for="form8">
                                Mensaje
                            </label>
                        </i>
                        <textarea type="text" id="mensaje_email" name="mensaje_email" class="md-textarea form-control" rows="4"></textarea>

                    </div>

                </div>
                <div class="modal-footer bg-info d-flex justify-content-center">
                    <button class="btn btn-unique bg-white"
                        @if (isset($p)) onclick="enviar_email({{ $p->id }});" @endif>Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Presupuestos -->
<div class="modal fade" id="modalPresupuestos" tabindex="-1" role="dialog" aria-labelledby="modalPresupuestosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Historial de Presupuestos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Profesional</th>
                            <th>Total</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyPresupuestos">
                        <tr><td colspan="5" class="text-center">Cargando...</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


    <!--EMITIR DOCUMENTO-->
    <div class="modal fade" id="modal_emitir_doc" tabindex="-1" role="dialog" aria-labelledby="emitir_documento"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white w-100 font-weight-bold">Emitir documentos</h4>
                    <button type="button" class="close" onclick="cerrar_cta_banco_m();" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo">Seleccione documento</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione una opción</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h5>DESPUES DE SELECCIONAR, ACÁ SE CARGA EL FORMULARIO DEL DOCUMENTO.<h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <button type="button" class="btn btn-info"><i class="feather icon-check"></i> Emitir</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    @include('app.profesional.modales.autorizacion_ficha_medica_unica')
    @include('app.profesional.modales.mensaje_paciente')
    @include('app.profesional.modales.mensaje_difusion_pacientes')
@endsection

@section('page-script')
<script>
$(document).ready(function() {
    $('#pacientes-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("profesional.mis_pacientes.ajax") }}',
        columns: [
            { data: 'nombre_completo', name: 'nombre_completo' },
            { data: 'fecha_nacimiento', name: 'fecha_nacimiento' },
            { data: 'convenio', name: 'convenio' },
            { data: 'contacto', name: 'contacto' },
            { data: 'acciones', name: 'acciones', orderable: false, searchable: false },
            { data: 'mensaje', name: 'mensaje', orderable: false, searchable: false },
            { data: 'lugares_atencion', name: 'lugares_atencion', orderable: false, searchable: false },
        ]
    });
});
</script>

<script>

    function enviar_mensaje_paciente(id_paciente){
        $('#modalMensajePaciente').modal('show');
        $('#id_paciente_mensaje').val(id_paciente);
    }

    function enviar_difusion_pacientes(){
        $('#modalMensajeDifusionPacientes').modal('show');
    }

    function emitir_doc(){
        $('#modal_emitir_doc').modal('show');
    }

    function verPresupuestos(idPaciente) {
        $('#modalPresupuestos').modal('show');
        $('#tbodyPresupuestos').html('<tr><td colspan="5" class="text-center">Cargando...</td></tr>');

        $.ajax({
            url: '{{ route("profesional.presupuestos.paciente") }}',
            method: 'GET',
            data: { id: idPaciente },
            success: function(response) {
                console.log(response);
                if (response.length > 0) {
                    let rows = '';
                    response.forEach((item, index) => {
                        item.valor_total = parseFloat(item.valor_total).toLocaleString('es-CL', {
                            style: 'currency',
                            currency: 'CLP'
                        });
                        if(item.estado == 1){
                            item.estado = 'Pendiente';
                        } else if(item.estado == 0){
                            item.estado = 'Aceptado';
                        } else {
                            item.estado = 'Desconocido';
                        }
                        rows += `<tr>
                            <td>${index + 1}</td>
                            <td>${item.fecha}</td>
                            <td>${item.profesional_nombre} ${item.profesional_apellido_uno} ${item.profesional_apellido_dos}</td>
                            <td>${item.valor_total}</td>
                            <td>${item.estado}</td>
                        </tr>`;
                    });
                    $('#tbodyPresupuestos').html(rows);
                } else {
                    $('#tbodyPresupuestos').html('<tr><td colspan="5" class="text-center">Sin presupuestos</td></tr>');
                }
            },
            error: function() {
                $('#tbodyPresupuestos').html('<tr><td colspan="5" class="text-danger text-center">Error al cargar</td></tr>');
            }
        });
    }

</script>
@endsection
