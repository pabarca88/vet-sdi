@extends('template.template_mensajes')
@section('content')

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
        	<div class="page-header">
                <div class="page-block">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header-title">

                            </div>
                            <ul class="breadcrumb mb-4 pt-3">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top"
                                        title="Volver a mi escritorio">
                                        <i class="feather icon-home">
                                        </i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Mis mensajes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="row">
    			<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
    				<!--EMISOR DEL MENSAJE-->
    				<div class="card">
    					<div class="card-body py-2">
    						<div class="row">
    							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    								<div class="media">
        							 <img class="img-radius wid-50 align-self-center mr-3" src="{{ asset('images/iconos/usuario_profesional.svg') }}" alt="Foto perfil">
									  <div class="media-body">
                                        @if($mensaje->emisor)
									    	<h5 class="mt-0 pt-3 text-c-blue" id="nombre_emisor">{{ $mensaje->emisor->nombre }} {{ $mensaje->emisor->apellido_uno }}</h5>
                                        @else
                                            <h5 class="mt-0 pt-3 text-c-blue" id="nombre_emisor">Usuario #</h5>
                                        @endif
                                       </div>
									</div>
								</div>
    						</div>
    					</div>
    				</div>
    				<!--ASUNTO Y MENSAJE-->
    				<div class="card">
    					<div class="card-top">
    						<h5 class="text-c-blue">Mensaje</h5>
    					</div>
        				<div class="card-body">
        					<div class="row">
        						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        							<h5 class="text-c-blue text-uppercase" id="asunto_mensaje">{{ $mensaje->asunto }}</h5>
        							<p id="contenido_mensaje">{{ $mensaje->mensaje }}</p>
        						</div>
        					</div>
        				</div>
        			</div>
    			</div>
    			<!--BANDEJA DE MENSAJES-->
        		<div class="col-sm-12 col-md-6 col-lg-6 col-6">
                    <div class="card">
                        <div class="card-top">
                            <h5 class="text-c-blue">Mensajes recibidos</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                                    <script>
                                        const mensajes = @json($mensajes);
                                    </script>
                                    <table id="tablaMensajes" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Mensaje</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mensajes as $m)
                                                <tr onclick="mostrarMensaje({{ $m['id'] }})" style="cursor: pointer;">
                                                    <td>
                                                        <div class="media">
                                                            <img class="img-radius img-40" src="{{ asset('images/iconos/usuario_profesional.svg') }}" alt="Foto" style="width: 50px;">
                                                            <div class="media-body ml-3">
                                                                <h6 class="pro-title text-uppercase mb-1">
                                                                    {{ strtoupper($m['datos_mensaje']['titulo'] ?? 'Sin título') }}
                                                                </h6>
                                                                <small class="text-muted">
                                                                    {{ Str::limit($m['datos_mensaje']['mensaje'] ?? 'Sin mensaje', 60) }}
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($m['fecha_envio'])->format('d/m/Y') }}</td>
                                                </tr>
                                            @endforeach

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
    <!--Cierre: Container Completo-->
@endsection

@section('page-script')
<script>
    $(document).ready(function() {
        $('#tablaMensajes').DataTable({
            paging: true,
            pageLength: 5,
            lengthChange: false,
            searching: true,
            ordering: false,
            info: false,
            language: {
                search: "Buscar:",
                paginate: {
                    previous: "Anterior",
                    next: "Siguiente"
                },
                zeroRecords: "No se encontraron mensajes"
            }
        });
    });

    function mostrarMensaje(id) {
        $.ajax({
            url: `/profesional/mensaje/${id}/json`,
            type: 'GET',
            dataType: 'json',
            success: function(mensaje) {
                console.log(mensaje);
                $('#nombre_emisor').text(mensaje.emisor.name || 'Desconocido');
                $('#asunto_mensaje').text(mensaje.asunto || 'Sin asunto');
                $('#contenido_mensaje').text(mensaje.mensaje || 'Sin contenido');
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener el mensaje:', error);
            }
        });
    }

</script>

@endsection
