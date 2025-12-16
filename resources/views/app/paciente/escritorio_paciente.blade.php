@extends('template.usuario.template')
@section('content')
<div class="pcoded-main-container" >
    <div class="pcoded-content">
        <!--Header-->
  
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Escritorio Inicio</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('paciente.home') }}">Administrar mis mascotas y compañeros</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>+
        <!--Cierre: Header-->
        <!--Botones superiores-->

        <div class="row m-b-30">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card subir">
                        <a href="{{ ROUTE('paciente.dependientes.infante.definitiva', ['tipo_dependencia' => '1' ]) }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mt-1" src="{{ asset('images/iconos/huella.png') }}">
                                <h5 class="mt-2"> Mis Mascotas y Compañeros</h5>
                            </div>
                        </a>
                    </div>
                    <div class="card subir">
                          <a href="{{ ROUTE('paciente.mascotas.inscripcion_alimentos') }}"> 
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/alimento.png') }}">
                                <h5 class="mt-2"> Inscribir mi consumo de alimentos </h5>
                            </div>
                        </a>
                    </div>
                    <div class="card subir">
                        <a href="{{ ROUTE('paciente.mascotas.inscripcion_medicamentos') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mt-1" src="{{ asset('images/iconos/i-medic.svg') }}">
                                <h5 class="mt-2"> Inscribir Mis Medicamentos</h5>
                            </div>
                        </a>
                    </div>
                    {{--  <div class="card subir">
                        <a href="https://www.cronicos.cl/" class="btn" type="button">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/profesionales.svg') }}">
                                <h5 class="mt-2"> Controles de Crónicos</h5>
                            </div>
                        </a>
                        {{--  <a href="https://www.cronicos.cl/" class="btn" type="button">
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="card-body text-center">Controles de Crónicos </h5>
                                    <img class="wid-70 ml-auto" src="{{ asset('images/iconos/cronicos.svg') }}">
                                </div>
                            </div>
                        </a>  --}}
                        {{--  <a href="{{ ROUTE('check_sdi') }}?urla=Inicio&urln=Mi_Ficha_Medica">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/fmu.svg') }}">
                                <h5 class="mt-1"> Controles de Crónicos </h5>
                            </div>
                        </a>  --}}
                    {{--  </div>  --}}

                </div>
            </div>
        </div>

        <!--CIERRE: Row Botones -->
        <!--Row Mis Horas Médicas y Botón Examenes-->
        <div class="row m-b-30" >
            <div class="col-md-8">
                <div class="card h-100 pb-0" >
                    <div class="card-header text-center "style="background-color:rgb(122 37 155)">
                        <h4 class="text-white d-inline text-center f-22">Mis horas agendadas</h4>
                    </div>
                    <div class="card-body pt-4 pb-0" style="height:290px;">
                        <div class="dt-responsive table-responsive" style="height:290px;back">
                            <table id="simpletable" class="table table-striped table-bordered nowrap table-xs">
                                <thead>
                                    <tr>
                                        <th>Acción</th>
                                        <th>
                                            Mascota
                                        </th>
                                        <th>Profesional</th>
                                        <th>Información de Atención</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">
                                            <button href="#!" class="btn btn-success btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Confirmar hora">
                                                <i class="feather icon-check"></i>
                                            </button>
                                            <button href="#!" class="btn btn-danger btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Anular hora">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                           Plumita
                                        </td>
                                        <td>
                                            Nombre y Apellidos<br>
                                            Veterinaria General<br>
                                        </td>
                                        <td>
                                            Centro médico IST<br>
                                            Arlegui 212, Viña del Mar<br>
                                            21/05/2021 17:00 hrs
                                        </td>
                                        <td class="align-middle">
                                            <span class="badge badge-danger">Hora cancelada</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">
                                            <button href="#!" class="btn btn-success btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Confirmar Hora">
                                                <i class="feather icon-check"></i>
                                            </button>
                                            <button href="#!" class="btn btn-danger btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Anular Hora">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                           Perlita
                                        </td>
                                        <td>
                                            Nombre y Apellidos<br>
                                            Exámenes<br>
                                        </td>
                                        <td>
                                            Centro médico IST<br>
                                            Arlegui 212, Viña del Mar<br>
                                            21/05/2021 17:00 hrs
                                        </td>
                                        <td class="align-middle">
                                            <span class="badge badge-warning">Hora pendiente<br>por confirmar</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">
                                            <button href="#!" class="btn btn-success btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Confirmar Hora">
                                                <i class="feather icon-check"></i>
                                            </button>
                                            <button href="#!" class="btn btn-danger btn-sm btn-icon"
                                                data-toggle="tooltip" data-placement="top" title="Anular Hora">
                                                <i class="feather icon-x"></i>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                           Manchitas
                                        </td>
                                        <td>
                                            Nombre y Apellidos<br>
                                            Neurologo<br>
                                        </td>
                                        <td>
                                            Centro médico IST<br>
                                            Arlegui 212, Viña del Mar<br>
                                            21/05/2021 17:00 hrs
                                        </td>
                                        <td class="align-middle">
                                            <span class="badge badge-success">Hora confirmada</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card subir text-center h-100" >
                     
                        <a href="{{ ROUTE('paciente.mascotas.promociones_especiales') }}" >
                            <img class="img-fluid card-img-top" src="{{ asset('images/iconos/publicidad.png') }}"
                            alt="Flujo de caja"style="height:290px;">    
                        </a>
                        <div class="card-body"> 
                            <a href="{{ ROUTE('paciente.mascotas.promociones_generales') }}" class="btn  btn-arrastre">
                                <h5 style="font-size: 1.1rem;" class="card-title pt-2">Visitar Espacios Promocionales</h5>
                              
                            </a>
                        </div>
                   
                </div>
            </div>
            <!-- AGREGAR GEOLOCALIZACION -->
        </div>

        <!--Cierre: Botones acceso examenes y profesional no inscrito-->

        <!--Row Botones-->
        <div class="row">
            <div class="col-md-12">
                <div class="card-deck">
                 
                    
					<div class="card social-widget-card  opacidad px-0"style="background-color:rgb(122 37 155)">
						<a href="{{ route('app.descarga') }}" class="btn" type="button" target="_blank">
							<div class="card-body">
								<img class="wid-30 mb-3" src="{{ asset('images/iconos/lock.svg') }}">
								<h5 class="my-auto text-white">DESCARGA TU APLICACIÓN</h5>
							</div>
						</a>
					</div>
                </div>
            </div>
        </div>
        <!--Cierre: Row Botones-->
    </div>
</div>
@endsection

@section('page-script')
    <script>
        function confirmar(id)
        {
            $('.btn-confirmar-hora').attr('disabled', true);
            $('.btn-anular-hora').attr('disabled', true);

            let url = "{{ route('hora.medica.confirmar') }}";

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    id_hora_medica: id,
                    _token: CSRF_TOKEN,
                },
                success: function(data)
                {
                    if (data != null)
                    {
                        data = JSON.parse(data);
                        swal({
                            title: "Exito!",
                            text: "Se ha confirmado su hora medica",
                            type: "success",
                        });

                        cargar_horas_medicas();
                    }
                    else
                    {
                        swal({
                            title: "Error!",
                            text: "Se ha presentado un problema en la confirmación su hora medica.\n Intente de nuevo.",
                            type: "success",
                        });

                        cargar_horas_medicas();
                    }
                }
            });
        }

        function anular(id)
        {
            $('.btn-confirmar-hora').attr('disabled', true);
            $('.btn-anular-hora').attr('disabled', true);

            let url = "{{ route('hora.medica.cancelar') }}";

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    id_hora_medica: id,
                    _token: CSRF_TOKEN,
                },
                success: function(data)
                {
                    if (data != null)
                    {
                        data = JSON.parse(data);
                        swal({
                            title: "Exito!",
                            text: "Se ha Cancelado su hora medica",
                            type: "success",
                        });

                        cargar_horas_medicas();
                    }
                    else
                    {
                        swal({
                            title: "Error!",
                            text: "Se ha presentado un problema en la Cancelación su hora medica.\n Intente de nuevo.",
                            type: "success",
                        });

                        cargar_horas_medicas();
                    }
                }
            });
        }

        function cargar_horas_medicas()
        {
            let url = "{{ route('paciente.hora.medica.ver') }}";

            $('#horas_medicas_paciente tbody').html('');

            $.ajax({
                url: url,
                type: "GET",
                data: {},
                success: function(data) {
                    if(data != null)
                    {
                        if (data.estado == 1)
                        {
                            if(data.registros.length > 0)
                            {
                                $.each(data.registros, function (key, value) {
                                    var html = '';
                                    html += '<tr>';
                                    html += '    <td class="align-middle">';
                                    switch(value.id_estado)
                                    {
                                        case 1:
                                            html += '                <button class="btn btn-info btn-icon btn-confirmar-hora" data-toggle="tooltip" data-placement="top" title="Confirmar hora" onclick="confirmar('+value.id+');">';
                                            html += '                    <i class="feather icon-check"></i>';
                                            html += '                </button>';
                                            html += '                <button class="btn btn-danger btn-icon btn-anular-hora" data-toggle="tooltip" data-placement="top" title="Anular hora" onclick="anular('+value.id+');">';
                                            html += '                    <i class="feather icon-x"></i>';
                                            html += '                </button>';
                                            break

                                        case 2:
                                            html += '                <button class="btn btn-info btn-icon btn-confirmar-hora" data-toggle="tooltip" data-placement="top" title="Confirmar hora" disabled="disabled">';
                                            html += '                    <i class="feather icon-check"></i>';
                                            html += '                </button>';
                                            html += '                <button class="btn btn-danger btn-icon btn-anular-hora" data-toggle="tooltip" data-placement="top" title="Anular hora"  onclick="anular('+value.id+');">';
                                            html += '                    <i class="feather icon-x"></i>';
                                            html += '                </button>';
                                            break

                                        case 8:
                                            html += '                <button class="btn btn-info btn-icon btn-confirmar-hora" data-toggle="tooltip" data-placement="top" title="Confirmar hora" onclick="confirmar('+value.id+');">';
                                            html += '                    <i class="feather icon-check"></i>';
                                            html += '                </button>';
                                            html += '                <button class="btn btn-danger btn-icon btn-anular-hora" data-toggle="tooltip" data-placement="top" title="Anular hora" onclick="anular('+value.id+');">';
                                            html += '                    <i class="feather icon-x"></i>';
                                            html += '                </button>';
                                            break

                                        default:
                                            html += '                <button class="btn btn-info btn-icon btn-confirmar-hora" data-toggle="tooltip" data-placement="top" title="Confirmar hora" disabled="disabled">';
                                            html += '                    <i class="feather icon-check"></i>';
                                            html += '                </button>';
                                            html += '                <button class="btn btn-danger btn-icon btn-anular-hora" data-toggle="tooltip" data-placement="top" title="Anular hora" disabled="disabled">';
                                            html += '                    <i class="feather icon-x"></i>';
                                            html += '                </button>';
                                    }
                                    html += '    </td>';
                                    html += '    <td>';
                                    html += '        '+value.nombre_profesional+' '+value.apellido_uno_profesional+'<br>';
                                    // html += '        {{-- '+value.nombre_especialidad+' --}}';
                                    if (value.nombre_sub_tipo_especialidad != null)
                                        html += '            '+value.nombre_sub_tipo_especialidad+'';
                                    else
                                        html += '            '+value.nombre_tipo_especialidad+'';

                                    html += '    </td>';
                                    html += '    <td>';
                                    html += '        '+value.nombre_lugar_atencion+'<br>';
                                    html += '        '+value.direccion_lugar_atencion+', '+value.numero_dir_lugar_atencion+'<br>';

                                    // var dia_formato = moment(value.fecha_consulta).format('DD-MM-YYYY');
                                    // var hora_formato = moment(value.fecha_consulta+' '+value.hora_inicio).format('HH:mm');
                                    // html += '        <span style="font-weight:bold;">'+dia_formato+' '+hora_formato+'hrs</span>';

                                    var dia_hora_formato = moment(value.fecha_consulta+' '+value.hora_inicio).format('DD-MM-YYYY HH:mm');

                                    html += '        <span style="font-weight:bold;">'+dia_hora_formato+' hrs</span>';
                                    html += '    </td>';
                                    html += '    <td class="align-middle">';
                                    html += '        <span style="background-color: '+value.color_estado+'; padding: 5px; border-radius: 12%;">'+value.texto_estado+'</span>';
                                    html += '    </td>';
                                    html += '</tr>';
                                    $('#horas_medicas_paciente tbody').append(html);
                                });
                            }
                        }
                    }
                }
            });
        }
    </script>
@endsection
