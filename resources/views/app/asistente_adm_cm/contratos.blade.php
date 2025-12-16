@extends('template.asistente_adm_cm.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Contratos de Personal</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('asistente_adm.cargar_contrato') }}">Contratos de Personal</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!--Card Nav Pills-->
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                            <li class="nav-item">
                                <a class="btn btn-outline-info active btn-sm mr-1 my-1" id="contrato_activo-tab" data-toggle="tab" href="#contrato_activo" role="tab" aria-controls="contrato_activo" aria-selected="false">Activos</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="contrato_nuevo-tab" data-toggle="tab" href="#contrato_nuevo" role="tab" aria-controls="contrato_nuevo" aria-selected="false">Nuevos</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="contrato_vencido-tab" data-toggle="tab" href="#contrato_vencido" role="tab" aria-controls="contrato_vencido" aria-selected="false">Vencidos</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="contrato_finalizado-tab" data-toggle="tab" href="#contrato_finalizado" role="tab" aria-controls="contrato_finalizado" aria-selected="false">Finalizados</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!--Cierre: Card Nav Pills-->
                <div class="tab-content" id="contratos_cm">

                    <!--Tab contrato_activo-->
                    <div class="tab-pane fade active show" id="contrato_activo" role="tabpanel" aria-labelledby="contrato_activo-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Contratos Activos</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="table_contratos_activos" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
													<th class="text-center align-middle">Tipo Empleado</th>
                                                    <th class="text-center align-middle">Datos Empleado</th>
													<th class="text-center align-middle">Tipo Contrato</th>
													<th class="text-center align-middle">Fecha Inicio</th>
													<th class="text-center align-middle">Fecha Termino</th>
                                                    <th class="text-center align-middle">Estado</th>
													<th class="text-center align-middle">Ver Detalle</th>
													<th class="text-center align-middle">Ver PDF</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($contratos_activos)
                                                    @foreach ($contratos_activos as $ca)
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                {{ $ca->tipo_empleado }}
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <div>{{ $ca->nombres.' '.$ca->apellido_uno.' '.$ca->apellido_dos }}</div>
                                                                <div>{{ $ca->telefono }}</div>
                                                                <div>{{ $ca->email }}</div>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                @if($ca->tipo_contrato == 2)
                                                                    DEFINIDO
                                                                @else
                                                                    INDEFINIDO
                                                                @endif
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                {{ $ca->fecha_inicio }}
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                @if($ca->tipo_contrato == 2)
                                                                    {{ $ca->fecha_termino }}
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                @if($ca->estado == 1)
                                                                    NUEVO
                                                                @elseif($ca->estado == 2)
                                                                    ACTIVO
                                                                @elseif($ca->estado == 3)
                                                                    VENCIDO
                                                                @elseif($ca->estado == 4)
                                                                    FINALIZADO
                                                                @elseif($ca->estado == 5)
                                                                    ANULADO
                                                                @endif
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="ver_detalle_contrato({{ $ca->id }});" data-toggle="tooltip" data-placement="top" title="Ver Detalle Contrato"><i class="fas fa-file-contract"></i></button>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="ver_pdf({{ $ca->id }});" data-toggle="tooltip" data-placement="top" title="Ver PDF"><i class="fas fa-file-pdf"></i></button>
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
                    <!--Cierre: Tab contrato_activo-->

                    <!--Tab contrato_nuevo-->
                    <div class="tab-pane fade" id="contrato_nuevo" role="tabpanel" aria-labelledby="contrato_nuevo-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Contratos Nuevos</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="table_contratos_nuevos" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
													<th class="text-center align-middle">Tipo Empleado</th>
                                                    <th class="text-center align-middle">Datos Empleado</th>
													<th class="text-center align-middle">Tipo Contrato</th>
													<th class="text-center align-middle">Fecha Inicio</th>
													<th class="text-center align-middle">Fecha Termino</th>
                                                    <th class="text-center align-middle">Estado</th>
													<th class="text-center align-middle">Ver Detalle</th>
													<th class="text-center align-middle">Ver PDF</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
													<td class="align-middle text-center">
                                                    </td>
                                                    <td class="align-middle text-center">
                                                    </td>
                                                    <td class="align-middle text-center">
                                                    </td>
                                                    <td class="align-middle text-center">
                                                    </td>
                                                    <td class="align-middle text-center">
                                                    </td>
                                                    <td class="align-middle text-center">
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="ver_detalle_contrato();" data-toggle="tooltip" data-placement="top" title="Ver Detalle Contrato"><i class="fab fa-eye"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm btn-icon" onclick="ver_pdf();" data-toggle="tooltip" data-placement="top" title="Ver PDF"><i class="fas fa-file-contract"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
                    <!--Cierre: Tab contrato_nuevo-->


                    <!--Tab contrato_vencido-->
                    <div class="tab-pane fade" id="contrato_vencido" role="tabpanel" aria-labelledby="contrato_vencido-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Contratos Vencidos</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
										<div class="card-body">
											<table id="table_contratos_vencidos" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Tipo Empleado</th>
                                                        <th class="text-center align-middle">Datos Empleado</th>
                                                        <th class="text-center align-middle">Tipo Contrato</th>
                                                        <th class="text-center align-middle">Fecha Inicio</th>
                                                        <th class="text-center align-middle">Fecha Termino</th>
                                                        <th class="text-center align-middle">Estado</th>
                                                        <th class="text-center align-middle">Ver Detalle</th>
                                                        <th class="text-center align-middle">Ver PDF</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                        </td>
                                                        <td class="align-middle text-center">
                                                        </td>
                                                        <td class="align-middle text-center">
                                                        </td>
                                                        <td class="align-middle text-center">
                                                        </td>
                                                        <td class="align-middle text-center">
                                                        </td>
                                                        <td class="align-middle text-center">
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="ver_detalle_contrato();" data-toggle="tooltip" data-placement="top" title="Ver Detalle Contrato"><i class="fab fa-eye"></i></button>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="ver_pdf();" data-toggle="tooltip" data-placement="top" title="Ver PDF"><i class="fas fa-file-contract"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Tab contrato_vencido-->

                    <!--Tab contrato_finalizado-->
                    <div class="tab-pane fade" id="contrato_finalizado" role="tabpanel" aria-labelledby="contrato_finalizado-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Contratos Finalizados</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
										<div class="card-body">
											<table id="table_contratos_finalizados" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Tipo Empleado</th>
                                                        <th class="text-center align-middle">Datos Empleado</th>
                                                        <th class="text-center align-middle">Tipo Contrato</th>
                                                        <th class="text-center align-middle">Fecha Inicio</th>
                                                        <th class="text-center align-middle">Fecha Termino</th>
                                                        <th class="text-center align-middle">Estado</th>
                                                        <th class="text-center align-middle">Ver Detalle</th>
                                                        <th class="text-center align-middle">Ver PDF</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                        </td>
                                                        <td class="align-middle text-center">
                                                        </td>
                                                        <td class="align-middle text-center">
                                                        </td>
                                                        <td class="align-middle text-center">
                                                        </td>
                                                        <td class="align-middle text-center">
                                                        </td>
                                                        <td class="align-middle text-center">
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="ver_detalle_contrato();" data-toggle="tooltip" data-placement="top" title="Ver Detalle Contrato"><i class="fab fa-eye"></i></button>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="ver_pdf();" data-toggle="tooltip" data-placement="top" title="Ver PDF"><i class="fas fa-file-contract"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Tab contrato_finalizado-->

                </div>
                <!--Cierre: Pills-->
            </div>
        </div>
	</div>
</div>
<!--****Cierre Container Completo****-->

@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            $('#table_contratos_activos').DataTable({
                responsive: true,
            });
            $('#table_contratos_vencidos').DataTable({
                responsive: true,
            });
            $('#table_contratos_finalizados').DataTable({
                responsive: true,
            });

            $(".cerrar_modal").click(function() {
                $("#ver_contrato_usuario").modal('hide');
            });
        });
		


        function ver_detalle_contrato(id)
        {
            let url = "{{ route('asistente_adm.detalle_contrato') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    id: id,
                }
            })
            .done(function(data) {
                if (data.estado == 1)
                {

                    console.log(data);

                    var tipo_contrato  = 'DEFINIDO';
                    if(data.registro.tipo_contrato == 1)
                        tipo_contrato  = 'INDEFINIDO';
                    $('#ver_contrato_tipo_contrato').html(tipo_contrato);
                    $('#ver_contrato_rut').html(data.registro.rut);
                    $('#ver_contrato_nombre').html(data.registro.nombres);
                    $('#ver_contrato_apellido_uno').html(data.registro.apellido_uno);
                    $('#ver_contrato_apellido_dos').html(data.registro.apellido_dos);
                    $('#ver_contrato_email').html(data.registro.email);
                    $('#ver_contrato_telefono').html(data.registro.telefono);
                    $('#ver_contrato_region').html(data.registro.persona.direccion.region);
                    $('#ver_contrato_ciudad').html(data.registro.persona.direccion.ciudad);
                    $('#ver_contrato_direccion').html(data.registro.persona.direccion.direccion);
                    $('#ver_contrato_numero').html(data.registro.persona.direccion.numero_dir);

                    let dias = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
                    var lab_dias_array = data.registro.dias_laborales.split(',');
                    var lab_dias_texto = '';
                    $.each(lab_dias_array, function( index, value ) {
                        lab_dias_texto += dias[value]+',';
                    });

                    $('#ver_contrato_dias_laborales').html(lab_dias_texto);

                    $('#ver_contrato_hora_entrada').html(data.registro.hora_ingreso);
                    $('#ver_contrato_hora_salida').html(data.registro.hora_salida);
                    $('#ver_contrato_hora_entrada_colacion').html(data.registro.hora_inicio_colacion);
                    $('#ver_contrato_hora_salida_colacion').html(data.registro.hora_termino_colacion);
                    {{--  $('#ver_contrato_clave_ingreso').html(data.registro.clave_ingreso);  --}}

                    $('#ver_contrato_usuario').modal('show');
                }
                else
                {
                    swal({
                        title: "Informacion del Profesional no encontrada",
                        icon: "error",
                        buttons: "Aceptar",
                        // DangerMode: true,
                    })
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
		
		
    </script>
@endsection


@section('modales')
    @include('app.asistente_adm_cm.modales.contrato_usuario')
@endsection
