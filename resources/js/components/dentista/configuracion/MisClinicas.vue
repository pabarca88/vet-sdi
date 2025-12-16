<template>
    <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12 mb-4">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Administración de mis clinicas dentales</h5>
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
                                <li class="breadcrumb-item">
                                    <router-link to="/Dental/Panel_Configuracion/Mis_Clinicas">Administración de mis clinicas dentales</router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <!-- tab general -->
            <div class="user-profile user-card pt-0">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="configurar-tab" data-toggle="tab" href="#configurar" role="tab" aria-controls="configurar" aria-selected="true">Configurar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="asistentes-tab" data-toggle="tab" href="#asistentes" role="tab" aria-controls="asistentes" aria-selected="false">Personal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="laboratorio-tab" data-toggle="tab" href="#laboratorio" role="tab" aria-controls="laboratorio" aria-selected="false">Laboratorio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="insumos-tab" data-toggle="tab" href="#insumos" role="tab" aria-controls="insumos" aria-selected="false">Equipamientos e insumos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="convenios-tab" data-toggle="tab" href="#convenios" role="tab" aria-controls="convenios" aria-selected="false">Convenios</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tab general-->
            <!--Contenido de tab-->
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="myTabContent">
                        <!--Configurar clinicas-->
                        <panelConfigurar></panelConfigurar>

                        <!--Asistentes-->
                        <panelPersonal></panelPersonal>

                        <!--Laboratorio-->
                        <panelLaboratorio></panelLaboratorio>

                        <!--Insumos-->
                        <panelInsumos></panelInsumos>

                        <!--Convenios-->
                        <panelConvenios></panelConvenios>
                        
                    </div>
                </div>
            </div>
        </div>
</template>
<script>
import panelConfigurar from '../../dentista/configuracion/misClinicas/configurar/Configurar.vue';
import panelPersonal from '../../dentista/configuracion/misClinicas/personal/Personal.vue';
import panelLaboratorio from '../../dentista/configuracion/misClinicas/laboratorio/Laboratorio.vue';
import panelInsumos from '../../dentista/configuracion/misClinicas/insumos/Insumos.vue';
import panelConvenios from '../../dentista/configuracion/misClinicas/convenios/Convenios.vue';


    export default {
        components: {
            panelConfigurar,
            panelPersonal,
            panelLaboratorio,
            panelInsumos,
            panelConvenios
        },
    }
</script>