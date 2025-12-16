@extends('template.paciente_dependiente.template')
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
                                <a href="{{ ROUTE('paciente.dependiente.home', ['id_dependiente_activo' => $id_dependiente_activo]) }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('paciente.dependiente.receta', ['id_dependiente_activo' => $id_dependiente_activo]) }}">Mis documentos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--Botones-->
        <div class="row m-b-30">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card subir py-5">
                        <a href="{{ ROUTE('paciente.dependiente.receta.receta', ['id_dependiente_activo' => $id_dependiente_activo]) }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-100 text-center mb-3" src="{{ asset('images/iconos/recetas.svg') }}"
                                    alt="Mis Recetas">
                                <h4 class="titulos_tarjetas">
                                    Recetas
                                </h4>
                            </div>
                        </a>
                    </div>
                    <div class="card subir py-5">
                        <a href="{{ ROUTE('paciente.dependiente.receta.examen', ['id_dependiente_activo' => $id_dependiente_activo]) }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-100 text-center mb-3" src="{{ asset('images/iconos/examen.svg') }}"
                                    alt="Mis Examenes">
                                <h4 class="titulos_tarjetas">
                                    Exámenes
                                </h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--CIERRE:Botones-->
        <!--Botones-->
        <div class="row m-b-10">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card subir py-5">
                        <a href="{{ ROUTE('paciente.dependiente.receta.certificado',['id_dependiente_activo' => $id_dependiente_activo]) }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-100 text-center mb-3" src="{{ asset('images/iconos/certificado.svg') }}"
                                    alt="Mis Certificados">
                                <h4 class="titulos_tarjetas">
                                    Consentimientos informados
                                </h4>
                            </div>
                        </a>
                    </div>
                    <div class="card subir py-5">
                        <a href="{{ ROUTE('paciente.dependiente.receta.licencia',['id_dependiente_activo' => $id_dependiente_activo]) }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-100 text-center mb-3" src="{{ asset('images/iconos/licencia.svg') }}"
                                    alt="Mis Licencias">
                                <h4 class="titulos_tarjetas">
                                    Certificados
                                </h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--CIERRE:Botones-->
    </div>
</div>
<!--Cierre: Container Completo-->
@endsection
