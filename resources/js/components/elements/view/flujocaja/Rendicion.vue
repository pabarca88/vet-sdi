<template>
    <div class="tab-pane fade" id="rendicion" role="tabpanel" aria-labelledby="rendicion-tab">
        <div class="card">
            <div class="card-header pt-3 pb-2">
                <h6 class="f-18">Rendiciones de caja</h6>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="rend-caja-dental" class="display table table-striped  dt-responsive nowrap table-xs" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th class="align-middle">Nº Doc.</th>
                                <th class="align-middle">Fecha de atención</th>
                                <th class="align-middle">Glosa</th>
                                <th class="align-middle">Paciente</th>
                                <th class="align-middle">Convenio</th>
                                <th class="align-middle">Valor total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center" v-for="b in bonos" :key="b.id">
                                <td class="align-middle">
                                    <span>{{ b.numero_bono }}</span>
                                </td>
                                <td class="align-middle">
                                    <span>{{ format_date(b.fecha_atencion) }}</span>
                                </td>
                                <td class="align-middle">
                                    <span>{{ b.glosa }} </span>
                                </td>
                                <td class="align-middle">
                                    <span>{{ b.PacienteNombre }}</span>
                                    <br>
                                    <span>{{ b.PacienteRut }}</span>
                                </td>
                                <td class="align-middle">
                                    {{ b.convenio }}
                                </td>
                                <td class="align-middle">
                                    $ {{ formatPrice(b.valor_atencion) }}
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="bg-tfoot">
                            <tr>
                                <th class="align-middle text-left" colspan="5" rowspan="1">Total</th>
                                <th class="align-middle text-center" colspan="1" rowspan="1">
                                    $ {{ formatPrice(this.total) }}
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-info" v-on:click="Rendicion()">Recibo caja conforme</button>
            </div>
        </div>
    </div>
</template>
<script>
import moment from 'moment';
    export default {
        data() {
            return {
                view: window.view,
                bonos: [],
                total: 0,
            }
        },
        mounted() {
            this.getRendicion()
        },
        methods: {
            async getRendicion(){
                await this.axios.get('/Contabilidad/FujoCaja/getRendicion')
                    .then(response => {
                        this.bonos = response.data.bonos
                        this.total = 0;
                        console.log('algo')
                        for (let i = 0; i < this.bonos.length; i++) {
                            const b = this.bonos[i];
                            this.total = this.total + b.valor_atencion
                        }
                    })
                    .catch(error => {
                        this.bonos = []
                        this.total = 0
                    })
                if(this.dataTable == null){
                    this.dataTable = $('#rend-caja-dental').DataTable({
                        responsive: true,
                    });
                }
            },
            async Rendicion(){
                await this.axios.get('/Contabilidad/FujoCaja/Rendicion')
                    .then(response => {
                        console.log('funciona')
                        this.getRendicion()
                    })
                    .catch(error => {
                        console.log('error')
                    })
                if(this.dataTable == null){
                    this.dataTable = $('#rend-caja-dental').DataTable({
                        responsive: true,
                    });
                }
            },
            format_date(value){
                if (value) {
                    return moment(String(value)).format('DD/MM/YYYY')
                }
            },
            formatPrice(value) {
                let val = (value/1).toFixed(0).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            }
        },

    }
</script>
