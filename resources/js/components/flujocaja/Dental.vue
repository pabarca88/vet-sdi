<template>
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12 mb-4">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Flujo de caja</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link to="/Dental" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/Dental/Flujo_Caja">Flujo de caja</router-link>
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
                                    <a class="nav-link text-reset active" id="presupuesto-tab" data-toggle="tab" 
                                        href="#presupuesto" role="tab" aria-controls="presupuesto" aria-selected="true">
                                        Gestion de presupuestos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-reset" id="rendicion-tab" data-toggle="tab" 
                                        href="#rendicion" role="tab" aria-controls="rendicion" aria-selected="false">
                                        Rendiciones de caja
                                    </a>
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
            <div class="col-md-12 mt-4">
                <div class="tab-content" id="myTabContent">
                    <!--Gestion presupuesto-->
                    <Presupuesto></Presupuesto>
                    
                    <!--Rendición caja-->
                    <Rendiciones></Rendiciones>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Rendiciones from '../elements/view/flujocaja/Rendicion.vue'
import Presupuesto from '../elements/view/flujocaja/Presupuesto.vue'
    export default {
        components: {
            Rendiciones,
            Presupuesto,
        },
    }
</script>
