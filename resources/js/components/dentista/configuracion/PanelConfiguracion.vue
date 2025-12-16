<template>
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Panel de Configuración</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link to="/Dental" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/Dental/Panel_Configuracion">Panel de configuración</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--Botones-->
        <div class="row m-b-10">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card subir py-3">
                        <router-link to="/Dental/Panel_Configuracion/Mis_Lugares_Atencion">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-90 text-center mb-3" src="/images/iconos/lugar.svg" alt="Mis Lugares de Atención">
                                <h5>
                                    Configurar mis lugares de atención
                                </h5>
                            </div>
                         </router-link>
                    </div>
                    <div class="card subir py-4">
                        <router-link to="/Dental/Panel_Configuracion/Mis_Clinicas">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-90 text-center mb-3" src="/images/iconos/lugar.svg" alt="Mis Lugares de Atención">
                                <h5>
                                   Administración de mis clinicas dentales
                                </h5>
                            </div>
                         </router-link>
                    </div>
                    <div class="card subir py-4">
                        <router-link to="/Dental/Panel_Configuracion/Mis_Derivaciones">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-90 text-center mb-3" src="/images/iconos/diagnosticos_frecuentes.svg" alt="Diagnósticos Frecuentes">
                                <h5>
                                   Mis derivaciones
                                </h5>
                            </div>
                         </router-link>
                    </div> 
                </div>
            </div>
        </div>
        <div class="row m-b-10">
            <div class="col-md-12">
                <div class="card-deck"><!--estas tres  igual que escritorio medico-->
                    <div class="card subir py-4">
                        <router-link to="/Dental/Panel_Configuracion/Configuracion_C10">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-90 text-center mb-3" src="/images/iconos/diagnosticos_cie10.svg" alt="Diagnósticos Frecuentes CIE 10">
                                <h5>Diagnósticos frecuentes CIE 10</h5>
                            </div>
                         </router-link>
                    </div>
                    <div class="card subir py-4">
                        <a href="diagnosticos_frecuentes_configuracion.php">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-90 text-center mb-3" src="/images/iconos/diagnosticos_frecuentes.svg" alt="Diagnósticos Frecuentes">
                                <h5>
                                   Diagnósticos frecuentes
                                </h5>
                            </div>
                         </a>
                    </div>
                    <div class="card subir py-4">
                        <a href="examenes_frecuentes_configuracion.php">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-90 text-center mb-3" src="/images/iconos/examenes_frecuentes.svg" alt="Examenes Frecuentes">
                                <h5>
                                   Exámenes frecuentes
                                </h5>
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
                    <div class="card subir py-12">
                        <a href="#">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="/images/iconos/usuario_asistente.svg">
                                <h5 class="mt-2">Contrate secretaria online</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--CIERRE:Botones-->   
    </div>
</template>