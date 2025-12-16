
@section('content')
    <!--****Container Completo****-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Liquidaciones a Profesionales</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.area_comercial') }}">Volver a Admin. Comercial</a></li>

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
                                    <a class="btn btn-outline-info active btn-sm mr-1 my-1" id="prof_salud-tab" data-toggle="tab" href="#prof-salud" role="tab" aria-controls="prof_-alud" aria-selected="false">Médicos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mr-1 my-1" id="odontologos-tab" data-toggle="tab" href="#odontologos" role="tab" aria-controls="odontologos" aria-selected="false">Odontólogos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mr-1 my-1" id="otros_prof-tab" data-toggle="tab" href="#otros_prof" role="tab" aria-controls="otros_prof" aria-selected="false">Otros Profesionales de la salud</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <!--Cierre: Card Nav Pills-->
                    <div class="tab-content" id="Profesionales_cm">
                        <!--Tab medicos-->
                        <div class="tab-pane fade active show" id="prof-salud" role="tabpanel" aria-labelledby="prof-salud-tab">
                            <div class="row mb-n4">
                            <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <div class="col-md-12">
                                                <div class="row">
													<div class="col-md-6">
                                                        <h4 class="text-white f-20 mt-2 mb-2 float-left">Liquidaciones profesionales médicos</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table id="aacm_liq_profesionales_med" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>

                                                        <th class="align-middle">Profesional</th>
                                                        <th class="align-middle">Fecha</th>
                                                        <th class="align-middle">Mes</th>
                                                        <th class="align-middle">N° Atenciones</th>
                                                        <th class="align-middle">Valor Total</th>
                                                        <th class="align-middle">Info</th>
                                                        <th class="align-middle">Detalle</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <span><strong>Jaime Kriman</strong></span><br>
                                                            <span>4.345.466-2</span><br>
                                                            <span>Otorrinolaringología</span>
                                                        </td>
                                                        <td class="align-middle">
                                                            <span>10/11/2023</span><br>
                                                        </td>
                                                        <td class="align-middle">
                                                            <span>octubre/20223</span><br>
                                                        </td>
                                                        <td class="align-middle">
                                                            <span>102</span><br>
                                                        </td>
                                                        <td class="align-middle">
                                                            <span>2.000.000</span><br>
                                                        </td>
                                                        <td class="align-middle">
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-success btn-icon" onclick="cuenta_corriente();" data-toggle="tooltip" data-placement="top" title="Datos bancarios"><i class="feather icon-credit-card"></i></button>
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="feather icon-file-text"></i></button>
                                                        </td>
                                                        <td class="align-middle">
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="liquidacion_prof_cm();" data-toggle="tooltip" data-placement="top" title="Liquidación"><i class="fas fa-dollar-sign"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Cierre: Tab medicos-->
                        <!--Tab odontologos-->
                        <div class="tab-pane fade" id="odontologos" role="tabpanel" aria-labelledby="odontologos-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h4 class="text-white f-20 mt-2 mb-2">Liquidaciones profesionales odontólogos</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <table id="liq_profesionales_od" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle">Fecha</th>
                                                            <th class="align-middle">Profesional</th>
                                                            <th class="align-middle">Periodo</th>
                                                            <th class="align-middle">N° Liquidación</th>
                                                            <th class="align-middle">Estado</th>
                                                            <th class="align-middle">Info</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle">
                                                                <span>10/11/2022</span><br>
                                                            </td>
                                                            <td class="align-middle">
                                                                <span><strong>J. Kriman</strong></span><br>
                                                                <span>4.345.466-2</span><br>
                                                                <span>Implantología</span>
                                                            </td>
                                                            <td class="align-middle">
                                                                <span>10/03/2022 a 17/03/2022</span><br>
                                                            </td>
                                                            <td class="align-middle">
                                                                <span>10202122</span><br>
                                                            </td>
                                                            <td class="align-middle">
                                                                <span>Pagada</span><br>
                                                            </td>
                                                            <td class="align-middle">
                                                                <!--Botón Modal-->
                                                                <button type="button" class="btn btn-info btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>

                                                                <!--Botón Modal-->
                                                                <button type="button" class="btn btn-success btn-icon" onclick="cuenta_corriente();" data-toggle="tooltip" data-placement="top" title="Datos bancarios"><i class="feather icon-credit-card"></i></button>

                                                                <!--Botón Modal-->
                                                                <button type="button" class="btn btn-purple btn-icon" onclick="horario_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="feather feather icon-clock"></i></button>
    															
                                                                <button type="button" class="btn btn-secondary btn-icon" onclick="liquidacion_prof_cm();" data-toggle="tooltip" data-placement="top" title="Liquidación"><i class="fas fa-dollar-sign"></i></button>
                                                                <!--Botón Modal-->
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
                        </div>
                        <!--Cierre: Tab odontologos-->
                        <!--Tab otros profesionales-->
                        <div class="tab-pane fade" id="otros_prof" role="tabpanel" aria-labelledby="otros_prof-tab">
                            <div class="row mb-n4">
                            <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <div class="col-md-12">
                                                <div class="row">
													<div class="col-md-6">
                                                        <h4 class="text-white f-20 mt-2 mb-2 float-left">Liquidaciones Otros Profesionales de la Salud</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-body">
                                                <table id="liq_profesionales_otros" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle">Fecha</th>
                                                            <th class="align-middle">Profesional</th>
                                                            <th class="align-middle">Periodo</th>
                                                            <th class="align-middle">N°Liquidación</th>
                                                            <th class="align-middle">Estado</th>
                                                            <th class="align-middle">Info</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle">
                                                                <span>10/11/2022</span><br>
                                                            </td>
                                                            <td class="align-middle">
                                                                <span><strong>J. Kriman</strong></span><br>
                                                                <span>4.345.466-2</span><br>
                                                                <span>Implantología</span>
                                                            </td>
                                                            <td class="align-middle">
                                                                <span>10/03/2022 a 17/03/2022</span><br>
                                                            </td>
                                                            <td class="align-middle">
                                                                <span>10202122</span><br>
                                                            </td>
                                                            <td class="align-middle">
                                                                <span>Pagada</span><br>
                                                            </td>
                                                            <td class="align-middle">
                                                                <!--Botón Modal-->
                                                                <button type="button" class="btn btn-info btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>

                                                                <!--Botón Modal-->
                                                                <button type="button" class="btn btn-success btn-icon" onclick="cuenta_corriente();" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="feather icon-credit-card"></i></button>
                                                                <!--Botón Modal-->
                                                                <button type="button" class="btn btn-purple btn-icon" onclick="horario_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="feather icon-clock"></i></button>

                                                               <!--Botón Modal-->
																<button type="button" class="btn btn-secondary btn-icon" onclick="liquidacion_prof_cm();" data-toggle="tooltip" data-placement="top" title="Liquidación"><i class="fas fa-dollar-sign"></i></button>
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
                        <!--Cierre: Tab personal administrativo-->

                    </div>
                    <!--Cierre: Pills-->
                </div>
                </div>
            </div>
        </div>
    </div>
    <!--****Cierre Container Completo****-->
    @include('general.seccion_escritorio.modal_liquidacion.liquidacion_profesionales')
    @include('general.seccion_escritorio.modal_liquidacion.registrar_profesional')
    @include('general.seccion_escritorio.modal_liquidacion.editar_profesional')
    @include('general.seccion_escritorio.modal_liquidacion.datos_banco')
    @include('general.seccion_escritorio.modal_liquidacion.horario_usuario')
    @include('general.seccion_escritorio.modal_liquidacion.convenio_usuario')
    @include('general.seccion_escritorio.modal_liquidacion.contacto_usuario')
@endsection

@section('page-script')
    <script>
        // script de vista de liquidacion
        function registrar_profesional(){
            $('#registrar_profesional_cm').modal('show');
        }

        function editar_datos_profesional (){
            $('#editar_profesional_cm').modal('show');
        }

        function cuenta_corriente (){
            $('#dat_bancarios').modal('show');
        }

        function contacto ()
        {
            let url = "";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    id: id
                },
            })
            .done(function(data) {
                if (data.estado == 1)
                {
                    /** encontrado */
                    $('#contacto_prof_email').html(data.registro.email);
                    $('#contacto_prof_telefono1').html(data.registro.telefono_uno);
                    $('#contacto_prof_telefono2').html(data.registro.telefono_dos);
                    $('#contacto_prof_direccion').html(data.direccion);
                    $('#contacto_usuario').modal('show');
                }
                else
                {
                    /** no encontrado */
                    swal({
                        title: "Problema al cargar informacion del Profesional.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
            $('#contacto_admin').modal('show');
        }

        function horario_profesional_cm (){
            $('#horario_usuario').modal('show');
        }

        function convenio_profesional_cm() {
            $('#convenio_usuario').modal('show');
        }



		function liquidacion_profesional() {
            $('#m_remuneraciones').modal('show');
        }

        function contacto () {
            $('#contacto_usuario').modal('show');
        }
		function liquidacion_prof_cm() {
        $('#liquid_prof_institucion').modal('show');
		}
		function cerrarModal() {
			$('#liquid_prof_institucion').modal('hide');
	    }
    </script>
@endsection
