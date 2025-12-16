
@extends('template.urgencia.template_profesional')
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
                            <h5 class="m-b-10 font-weight-bold">Escritorio Profesional Médico Urgencias</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('urgencia.profesional.home') }}">Mi escritorio </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--Cierre: Header-->
		<div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">

                    <h1>triage</h1>

                </div>
            </div>

        </div>
        <!--CIERRE: Row Botones -->
    </div>
</div>
<!--Cierre: Container Completo-->
@endsection

