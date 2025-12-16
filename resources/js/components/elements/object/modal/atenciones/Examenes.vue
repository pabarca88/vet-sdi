<template>
    <div id="m_cons_ex" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_exLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="m_cons_exLabel" style="font-size: 1.3rem; color: #3366CC;">Examenes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="cerrarModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <table id="table_examenes" class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Tipo</th>
                                    <th class="text-center align-middle">Urgencia</th>
                                    <th class="text-center align-middle">Nombre</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="e in examenes" :key="e.id">
                                    <td class="text-center align-middle"> {{ format_date(e.created_at) }} </td>
                                    <td class="text-center align-middle"> {{ e.examen }} </td>
                                    <td class="text-center align-middle"> {{ e.id_prioridad }} </td>
                                    <td class="text-center align-middle">{{ e.tipo_examen }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <!--fin autollenado-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="cerrarModal()">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>     
    </div>
</template>
<script>
import moment from 'moment';
    export default {
        data() {
            return {
                examenes: [],
                dataTable: null,
                view: window.view,
            }
        },
        props:['idexamen'],
        methods: {
            async misExamenes() {
                await this.axios.get('/api/Paciente/getExamenesByFicha',{ 
                        params:{
                            code: this.idexamen,
                        }
                    })
                    .then(response => {
                        this.examenes = response.data.Examenes
                        $('#m_cons_ex').modal('show')
                    })
                    .catch(error => {
                        this.examenes = [];
                    })
                
                if(this.dataTable == null){
                    this.dataTable = $('#table_examenes').DataTable({
                        responsive: true,
                    });
                }
            },
            cerrarModal(){
                $('#m_cons_ex').modal('hide')
            },
            format_date(value){
                if (value) {
                    return moment(String(value)).format('DD/MM/YYYY')
                }
            },
        },
        watch: { 
            idexamen: function(newVal, oldVal) {
                if(newVal != ''){
                    this.misExamenes()
                    this.$root.$emit('changed-idexamen', '')
                }

            }
    }
    }
</script>