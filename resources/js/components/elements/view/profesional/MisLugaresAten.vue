<template>
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Mis lugares de atención</h5>
                        </div>
                        <ul class="breadcrumb" v-if="view == 'DENTAL'">
                            <li class="breadcrumb-item">
                                <router-link to="/Dental" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/Dental/Panel_Configuracion">Panel de configuración</router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/Dental/Panel_Configuracion/Mis_Lugares_Atencion">Mis Lugares de atención</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 pt-2">
                                <h4 class="text-white f-20">Mis lugares de atención</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="float-right">
                                    <div class="btn-group mb-2 mr-2">
                                        <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#nuevo_lugar_atencion">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            &nbsp;
                                            Agregar nuevo lugar de atención
                                        </button>
                                        <button type="button" class="btn  btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item btn  btn-primary" type="button" data-toggle="modal" data-target="#modal_agregar_lugar_existente">Desasociar o Agregar lugar de atención existente</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                        
                    
                        <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Nombre</th>
                                    <th class="text-center align-middle">Dirección</th>
                                    <th class="text-center align-middle">Tipo</th>
                                    <th class="text-center align-middle">Contacto</th>
                                    <th class="text-center align-middle">Lugar de<br> Atención</th>
                                    <th class="text-center align-middle">Asistentes</th>
                                    <th class="text-center align-middle">Horarios</th>
                                    <th class="text-center align-middle">Convenios y Valores</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle text-center">Prueba test</td>
                                    <td class="align-middle text-center">
                                        <span>Aqui, 123</span><br>
                                        <span>Viña del Mar</span>
                                    </td>
                                    <td class="align-middle text-center">Centro Médico</td>
                                    <td class="align-middle text-center">
                                        <span>a@a.cl</span><br>
                                        <span>123456789</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <!--Botón Modal-->
                                        <button type="button" class="btn btn-info btn-sm btn-icon  accion_editar_lugar_atencion" data-toggle="tooltip" data-placement="top" title="Configurar"><i class="feather icon-home"></i></button>
                                    </td>
                                    <td class="align-middle text-center">
                                        <!--Botón Modal-->
                                        <button type="button" class="btn btn-warning btn-sm btn-icon  accion_asistentes" data-toggle="tooltip" data-placement="top" title="Configurar"><i class="feather icon-user"></i></button>
                                    </td>
                                    <td class="align-middle text-center">
                                        <!--Botón Modal-->
                                        <button type="button" class="btn btn-primary btn-sm btn-icon  accion_editar_horarios" data-toggle="tooltip" data-placement="top" title="Configurar"><i class="feather icon-watch"></i></button>
                                    </td>
                                    <td class="align-middle text-center">
                                        <!--Botón Modal-->
                                        <button type="button" class="btn btn-success btn-sm btn-icon accion_editar_valores" data-toggle="tooltip" data-placement="top" title="Configurar"><i class="fas fa-dollar-sign"></i></button>
                                    </td>                                                                        
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <modalAddLugar :titulo="tituloAdd" :vista="vista"></modalAddLugar>
        <modalUpdLugar></modalUpdLugar>
    </div>

</template>
<script>
import modalAddLugar from '../../../elements/object/modal/lugares/Agregar.vue';
import modalUpdLugar from '../../../elements/object/modal/lugares/Editar.vue';
    export default {
        components: {
            modalAddLugar,
            modalUpdLugar,
        },
        data() {
            return {
                view: window.view,
                tituloAdd: 'Agregar nuevo lugar de atención',
                vista: '01',
            }
        },
        mounted() {
            this.$root.$on('reloadTable', (code) => {
                this.getMisLugares()
            })
        },
        methods: {
            async getMisLugares() {

            }
        },

    }
</script>
