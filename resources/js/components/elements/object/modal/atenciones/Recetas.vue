<template>
    <div id="m_cons_receta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_recetaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="m_cons_recetaLabel" style="font-size: 1.3rem; color: #3366CC;">Receta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="cerrarModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="table_recetas" class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Fecha</th>
                                <th class="text-center align-middle">Medicamento</th>
                                <th class="text-center align-middle">Dosis</th>
                                <th class="text-center align-middle">Posología</th>
                                <th class="text-center align-middle">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="r in recetas" :key="r.id"> 
                                <td class="text-center align-middle"> {{ format_date(r.created_at) }} </td>
                                <td class="text-center align-middle">{{ r.producto }}</td>
                                <td class="text-center align-middle">{{ r.presentacion }}</td>
                                <td class="text-center align-middle">{{ r.frecuencia }} cada {{ r.periodo }} Hrs</td>
                                <td class="text-center align-middle">{{ r.dosis }}</td>
                            </tr>
                        </tbody>
                    </table>
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
                recetas: [],
                dataTable: null,
                view: window.view,
            }
        },
        props:['idreceta'],
        methods: {
            async misRecetas() {
                await this.axios.get('/api/Paciente/getRecetasByFicha',{ 
                        params:{
                            code: this.idreceta,
                        }
                    })
                    .then(response => {
                        this.recetas = response.data.Recetas
                        $('#m_cons_receta').modal('show')
                    })
                    .catch(error => {
                        this.recetas = [];
                    })
                
                if(this.dataTable == null){
                    this.dataTable = $('#table_recetas').DataTable({
                        responsive: true,
                    });
                }
            },
            cerrarModal(){
                $('#m_cons_receta').modal('hide')
            },
            format_date(value){
                if (value) {
                    return moment(String(value)).format('DD/MM/YYYY')
                }
            },
        },
        watch: { 
            idreceta: function(newVal, oldVal) {
                if(newVal != ''){
                    this.misRecetas()
                    this.$root.$emit('changed-idreceta', '')
                }

            }
    }
    }
</script>