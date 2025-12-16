<template>
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Receta Online</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link to="/Paciente" data-toggle="tooltip"
                                    data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/Paciente/Receta_Online">Receta Online</router-link>
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
                        <router-link to="/Paciente/Receta_Online/Mis_Recetas">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-100 text-center mb-3"
                                    src="/images/iconos/recetas.svg"
                                    alt="Mis Recetas">
                                <h4 class="titulos_tarjetas">
                                    Mis Recetas
                                </h4>
                            </div>
                        </router-link>
                    </div>
                    <div class="card subir py-5">
                        <router-link to="/Paciente/Receta_Online/Mis_Examenes">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-100 text-center mb-3"
                                    src="/images/iconos/examen.svg"
                                    alt="Mis Examenes">
                                <h4 class="titulos_tarjetas">
                                    Mis Exámenes
                                </h4>
                            </div>
                        </router-link>
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
                        <router-link to="/Paciente/Receta_Online/Mis_Certificados">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-100 text-center mb-3"
                                    src="/images/iconos/certificado.svg"
                                    alt="Mis Certificados">
                                <h4 class="titulos_tarjetas">
                                    Mis Certificados
                                </h4>
                            </div>
                        </router-link>
                    </div>
                    <div class="card subir py-5">
                        <router-link to="/Paciente/Receta_Online/Mis_Licencias">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-100 text-center mb-3"
                                    src="/images/iconos/licencia.svg"
                                    alt="Mis Licencias">
                                <h4 class="titulos_tarjetas">
                                    Mis Licencias
                                </h4>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        <!--CIERRE:Botones-->
    </div>
</template>
