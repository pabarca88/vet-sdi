<template>
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Configurar mis preferencias de derivación</h5>
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
                                <router-link to="/Dental/Panel_Configuracion/Mis_Derivaciones">Derivaciones</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-12 align-botton">
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Mis profesionales de interconsulta</h4>
                            <div class="btn-group float-right" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-light btn-sm" v-on:click="showAdd()">
                                    <i class="feather icon-plus"></i>
                                    Agregar interconsultor
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                        </div>
                    </div>
                    <table id="tabla_interconsulta" class="display table table-striped  table-sm table-hover dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Especialidad</th>
                                <th class="text-center align-middle">Nombre</th>
                                <th class="text-center align-middle">Contacto</th>
                                <th class="text-center align-middle">Editar</th>
                                <th class="text-center align-middle">Habilitar /<br> deshabilitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle text-center">
                                    <span>Endodoncia</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Jose Canales</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-info btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="contacto" v-on:click="showInfo(11)">
                                        <i class="feather icon-home"></i>
                                    </button>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-success btn-sm" v-on:click="showEdit(11)">
                                        <i class="feather icon-edit"></i>
                                        Editar
                                    </button>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="form-check">
                                      <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                    </div>
                                </td>                                                           
                            </tr>
                            <tr>
                                <td class="align-middle text-center">
                                    <span>Odontopediatría</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Valentina Carrasco</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="info_interconsultor();" data-toggle="tooltip" data-placement="top" title="contacto"><i class="feather icon-home"></i></button>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-success btn-sm" onclick="editar_interconsultor();"><i class="feather icon-edit"></i> Editar</button>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="form-check">
                                      <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                    </div>
                                </td>                                                          
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <modalAgregar></modalAgregar>
        <modalEditar></modalEditar>
        <modalInfo></modalInfo>

    </div>
</template>
<script>
import modalAgregar from '../../elements/object/modal/derivaciones/Agregar.vue';
import modalEditar from '../../elements/object/modal/derivaciones/Agregar.vue';
import modalInfo from '../../elements/object/modal/derivaciones/Info.vue';
    export default {
        components: {
            modalAgregar,
            modalEditar,
            modalInfo,
        },
        data() {
            return {
                derivaciones: [],
                dataTable: null,
            }
        },
        mounted() {
            this.getDerivaciones()
            
        },
        methods: {
            async getDerivaciones() {
                await this.axios.get('/api/getC10')
                    .then(response => {
                        console.log('algo')
                    })
                    .catch(error => {
                        this.derivaciones = []
                    })
                if(this.dataTable == null){
                    this.dataTable = $('#tabla_interconsulta').DataTable({
                        responsive: true,
                    });
                }    
            },

            showInfo(rut){
                $('#info_interconsultor').modal('show')
            },
            showAdd(){
                $('#agregar_interconsultor').modal('show')
            },
            showEdit(rut){
                $('#info_interconsultor').modal('show')
            }
        },
    }
</script>