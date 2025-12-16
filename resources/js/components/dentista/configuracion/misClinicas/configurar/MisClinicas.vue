<template>
    <div class="tab-pane fade show active" id="clinicas-dental" role="tabpanel" aria-labelledby="clinicas-dental-tab">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="f-18 d-inline">Mis clínicas</h6>
                        <button type="button" class="btn btn-sm btn-info d-inline float-md-right float-md-right ml-4" v-on:click="openModalAgregar()">
                            <i class="feather icon-plus"></i> 
                            Registrar clínica
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="table_mis_clinicas" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">Nombre</th>
                            <th class="align-middle">Dirección</th>
                            <th class="align-middle">Contacto</th>
                            <th class="align-middle">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center" v-for="l in lugares" :key="l.id">
                            <td class="align-middle">
                                {{ l.nombre }}
                            </td>
                            <td class="align-middle">
                                <span>{{ l.direccion }}</span><br>
                                <span>{{ l.ciudad }}</span>
                            </td>
                            <td class="align-middle">
                                <span> {{ l.email }} </span><br>
                                <span>{{ l.telefono }}</span>
                            </td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-info btn-sm btn-icon"  data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="feather icon-edit"></i>
                                </button>
                                <button type="button" class="btn btn-warning btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Asistentes">
                                    <i class="feather icon-user"></i>
                                </button>
                                <button type="button" class="btn btn-primary btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Horario">
                                    <i class="feather icon-watch"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Previsiones">
                                    <i class="fas fa-dollar-sign"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <modalAgregar :titulo="tituloAgregar" :vista="vista"></modalAgregar>
        <modalEditar></modalEditar>

        <modalError  :msg="mesage"></modalError>
        <modalAlerta :msg="mesage"></modalAlerta>
        <modalExito  :msg="mesage"></modalExito>
    </div>
</template>
<script>
import moment from 'moment';
import modalAgregar from '../../../../elements/object/modal/lugares/Agregar.vue';
import modalEditar from '../../../../elements/object/modal/lugares/Editar.vue';
import modalAlerta from '../../../../elements/object/modal/Alerta.vue';
import modalExito from '../../../../elements/object/modal/Exito.vue';
import modalError from '../../../../elements/object/modal/Error.vue';
    export default {
        components: {
            modalAgregar,
            modalEditar,
            modalAlerta,
            modalExito,
            modalError,
        },
        data() {
            return {
                lugares: [],
                dataTable: null,
                view: window.view,

                mesage: '',
                tituloAgregar: 'Registrar clínica',
                vista: '02'
            }
        },
        mounted() {
            this.getMisClinicasDental()

            this.$root.$on('reloadTable', (code) => {
                this.getMisClinicasDental()
            })

            this.$root.$on('exito-modal', (messaje) => {
                this.mesage = messaje;
                $('#modal_exito').modal('show')
            })

            this.$root.$on('alert-modal', (messaje) => {
                this.mesage = messaje;
                $('#modal_alerta').modal('show')
            })

            this.$root.$on('error-modal', (messaje) => {
                this.mesage = messaje;
                $('#modal_error').modal('show')
            })

        },
        methods: {
            async getMisClinicasDental() {
                await this.axios.get('/api/Profesional/getMisClinicasDental',{ 
                        params:{
                            view: window.view,
                        }
                    })
                    .then(response => {
                        this.lugares = response.data.Lugares
                    })
                    .catch(error => {
                        this.lugares = []
                    })
                if(this.dataTable == null){
                    this.dataTable = $('#table_mis_clinicas').DataTable({
                        responsive: true,
                    });
                }
            },
            openModalAgregar(){
                $('#nuevo_lugar_atencion').modal('show');
            },
            format_date(value){
                if (value) {
                    return moment(String(value)).format('DD/MM/YYYY')
                }
            },
        },
    }
</script>