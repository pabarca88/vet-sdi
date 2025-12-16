<template>
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Atenciones Previas</h5>
                        </div>
                        <ul class="breadcrumb" v-if="view == 'DENTAL'">
                            <li class="breadcrumb-item">
                                <router-link to="/Dental" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/Dental/Mis_Pacientes" data-toggle="tooltip" data-placement="top" title="Volver a mis pacientes">Mis pacientes</router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link v-bind:to="'/Dental/Paciente/Atenciones_previas/' + idPaciente">Atenciones previas</router-link>
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-c-blue f-20 d-inline ml-4 my-1 py-1">Atenciones previas</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <table id="atenciones_previas" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Diagnóstico</th>
                                            <th class="text-center align-middle">Recetas</th>
                                            <th class="text-center align-middle">Exámenes</th>
                                            <th class="text-center align-middle">Archivos </th>
                                            <th class="text-center align-middle">Ficha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="f in fichas" :key="f.id">
                                            <td class="text-center align-middle">{{ format_date(f.created_at) }}</td>
                                            <td class="text-center align-middle">{{ f.hipotesis_diagnostico }}</td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-danger btn-sm" v-on:click="getRecetas(f.id)">
                                                    <i class="feather icon-file-plus"></i> 
                                                    Ver Receta
                                                </button>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-secondary btn-sm" v-on:click="getExamenes(f.id)">
                                                    <i class="feather icon-file-plus"></i> 
                                                    Ver Exámenes
                                                </button>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button href="#!" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m_cons_archivos">
                                                    <i class="feather icon-folder"></i> 
                                                    Ver Archivos
                                                </button>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#m_consultaant">
                                                    <i class="feather icon-file-text"></i> 
                                                    Ver Ficha
                                                </button>
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

        <modalReceta :idreceta="idreceta"></modalReceta>
        <modalExamenes :idexamen="idexamen"></modalExamenes>
    </div>
</template>
<script>
import moment from 'moment';
import modalReceta from '../../../elements/object/modal/atenciones/Recetas.vue';
import modalExamenes from '../../../elements/object/modal/atenciones/Examenes.vue';
    export default {
        components: {
            modalReceta,
            modalExamenes,
        },
        data() {
            return {
                idPaciente: this.$route.params.id,
                fichas: [],
                dataTable: null,
                view: window.view,

                idreceta: '',
                idexamen: '',
            }
        },
        mounted() {
            this.misAtenciones()
            
            this.$root.$on('changed-idexamen', (id) => {
                this.idexamen = id
            })

            this.$root.$on('changed-idreceta', (id) => {
                this.idreceta = id
            })
        },
        methods: {
            async misAtenciones() {
                await this.axios.get('/api/Paciente/getMisAtenciones',{ 
                        params:{
                            code: this.$route.params.id,
                        }
                    })
                    .then(response => {
                        this.fichas = response.data.Fichas
                    })
                    .catch(error => {
                        this.fichas = [];
                    })
                
                if(this.dataTable == null){
                    this.dataTable = $('#atenciones_previas').DataTable({
                        responsive: true,
                    });
                }
            },
            format_date(value){
                if (value) {
                    return moment(String(value)).format('DD/MM/YYYY')
                }
            },
            getRecetas(recs){
                this.idreceta = recs
                this.$emit('idReceta', recs)
            },

            getExamenes(exam){
                this.idexamen = exam
                this.$emit('idexamen', exam)
            },
        },
    }
</script>