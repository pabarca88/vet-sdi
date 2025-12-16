<template>
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Diagnósticos CIE 1O</h5>
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
                                <router-link to="/Dental/Panel_Configuracion/Configuracion_C10">Configuración Diagnósticos CIE 1O</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="text-white f-20 text-center mb-0">Diagnósticos Frecuentes CIE-10</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <table id="tabla_configuracion_cie10" class="display table table-striped table-hover dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-wrap text-center align-middle" style="width: 6rem;">Código</th>
                                            <th class="text-center align-middle">Descripción</th>
                                            <th class="text-center align-middle">Activar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="c in c10" :key="c.id">
                                            <td class="text-wrap text-center align-middle">
                                                {{ c.codigo }}
                                            </td>
                                            <td class="align-middle text-center">
                                                {{ c.descripcion }}
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="diagnostico">
                                                    <label for="diagnostico" class="cr"></label>
                                                </div>
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

    <modalCargando></modalCargando>

    </div>
</template>
<script>
import modalCargando from '../../elements/object/modal/Load.vue';
    export default {
        components: {
            modalCargando,
        },
        data() {
            return {
                c10: [],
                dataTable: null,
            }
        },
        mounted() {
            $('#cargando_modal').modal('show')
            this.getC10()
        },
        methods: {
            async getC10() {
                await this.axios.get('/api/getC10')
                    .then(response => {
                        this.c10 = response.data.c10
                    })
                    .catch(error => {
                        this.c10 = []
                    })
                if(this.dataTable == null){
                    this.dataTable = $('#tabla_configuracion_cie10').DataTable({
                        responsive: true,
                    });
                }
                $('#cargando_modal').modal('hide');
    
            },
        },
    }
</script>