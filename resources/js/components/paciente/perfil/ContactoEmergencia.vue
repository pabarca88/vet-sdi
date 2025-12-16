<template>
    <div class="tab-pane fade" id="emergencia" role="tabpanel" aria-labelledby="emergencia-tab">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h5 class="text-white d-inline float-left mt-1">Contactos de emergencia</h5>
                        <button type="button"
                            class="btn btn-outline-light btn-sm d-inline float-right mr-4"
                            data-toggle="modal" data-target="#agregar_contacto_emergencia" v-on:click="modalCreContacto()">
                            <i class="feather icon-plus"></i> 
                            Agregar contacto
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="overflow-x:auto;">
                                    <table id="contactos_emergencia"
                                        class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="align-middle text-center">Prioridad</th>
                                                <th class="align-middle text-center">Nombre</th>
                                                <th class="align-middle text-center">Parentezco</th>
                                                <th class="align-middle text-center">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="c in contactos" :key="c.id">
                                                <td class="align-middle text-center">
                                                    {{ c.prioridad }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ c.nombre }}<br>{{ c.apellido_uno }} {{ c.apellido_dos }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ c.pivot.relacion }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button id="btn_info_contacto" class="btn btn-info btn-sm rounded-circle"
                                                        title="Información de contacto" data-placement="top" v-on:click="getContacto(c.rut)">
                                                            <i class="feather icon-phone-call"></i>
                                                    </button>
                                                    <button id="btn_editar_contacto" class="btn btn-warning btn-sm rounded-circle"
                                                        title="Editar contacto" data-placement="top" v-on:click="getUpdContacto(c.rut)">
                                                            <i class="feather icon-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm rounded-circle" data-toggle="tooltip"
                                                        title="Eliminar contacto" v-on:click="delContacto(c.rut)">
                                                            <i class="feather icon-x"></i>
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
        </div>
        <modalInfo :rutinfo="rutinfo"></modalInfo>
        <modalUpd :rutupd="rutupd"></modalUpd>

        <div id="agregar_contacto_emergencia" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="agregar_contacto_emergencia" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title text-white text-center">Agregar contacto de emergencia</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h6 class="text-c-blue ml-1 mb-3">Ingrese los datos de su contacto de emergencia</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-floating form-group">
                                    <label class="floating-label">Rut</label>
                                    <input type="person" class="form-control" v-model="txtRut">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Nombres</label>
                                    <input type="text" class="form-control" v-model="txtNombre">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Primer Apellidos</label>
                                    <input type="text" class="form-control" v-model="txtApellido1">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Segundo Apellidos</label>
                                    <input type="text" class="form-control" v-model="txtApellido2">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Dirección</label>
                                    <input type="address" class="form-control" v-model="txtDireccion">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Número</label>
                                    <input type="address" class="form-control" v-model="txtNumDir">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Region</label>
                                    <select class="form-control" v-model="txtRegion">
                                        <option value="S">Seleccione una opción</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Comuna</label>
                                    <select class="form-control" v-model="txtComuna">
                                        <option value="S">Seleccione una opción</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" v-model="txtEmail">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Teléfono</label>
                                    <input type="tel" class="form-control" v-model="txtTelefono">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Parentezco</label>
                                    <select class="form-control" v-model="txtParentesco">
                                        <option value="">Seleccione una opción</option>
                                        <option value="Pareja">Pareja</option>
                                        <option value="Padre">Padre</option>
                                        <option value="Madre">Madre</option>
                                        <option value="Hermano/a">Hermano/a</option>
                                        <option value="Abuelo/a">Abuelo/a</option>
                                        <option value="Tío/a">Tío/a</option>
                                        <option value="Primo/a">Primo/a</option>
                                        <option value="Amigo/a">Amigo/a</option>
                                        <option value="Otro">Otro</option>
                                        <!--Si se selecciona "otro"
                                            deberia abrirse un input text para que el usuario escriba
                                            el parentezco-->
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Prioridad</label>
                                    <select class="form-control" v-model="txtPrioridad">
                                        <option value="0">Seleccione una opción</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                        </div>
        				<div class="modal-footer">
        					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        					<button type="submit" class="btn btn-info" v-on:click="creContacto()">Guardar Contacto</button>
        				</div>
                    </div>

                </div>
            </div>
        </div>
        

    </div>
</template>
<script>
import modalInfo from '../../elements/object/modal/contacto/InfoContacto.vue';
import modalUpd from '../../elements/object/modal/contacto/UpdContacto.vue';
    export default {
        components: {
            modalInfo,
            modalUpd,
        },
        data() {
            return {
                contactos: [],
                regiones: [],
                dataTable: null,

                txtRut: null,
                txtNombre: null,
                txtApellido1: null,
                txtApellido2: null,
                txtDireccion: null,
                txtNumDir: null,
                txtRegion: null,
                txtComuna: null,
                txtEmail: null,
                txtTelefono: null,
                txtParentesco: null,
                txtPrioridad: null,

                rutinfo: '',
                rutupd: '',
            }
        },
        mounted() {
            this.getContactos()
            this.$root.$on('reset', (rut) => {
                this.getContactos()
            })
            this.$root.$on('changed-rutinfo', (rut) => {
                this.rutinfo = rut
            })
            this.$root.$on('changed-rutupd', (rut) => {
                this.rutupd = rut
            })
        },
        methods: {
            async getContactos(){
                await this.axios.get('../api/paciente/getContacto',{ 
                    params:{
                            code: window.code,
                        }
                    })
                    .then(response => {
                        this.contactos = response.data.Conctacto 
                    })
                    .catch(error => {
                        this.previsiones = []
                    })
                if(this.dataTable == null){
                    this.dataTable = $('#contactos_emergencia').DataTable({
                        responsive: true,
                    });
                }
                
            },
            async delContacto(rut){

                await this.axios.get('/api/delContacto',{ 
                    params:{
                        rut: rut,
                        code: window.code,
                    }
                })
                .then(response => {
                    this.getContactos()
                })
                .catch(error => {
                    console(error)
                })
            },  
            getContacto(rut){
                this.rutinfo = rut
                this.$emit('rutinfo', rut)
            },
            getUpdContacto(rut){
                this.rutupd = rut
                this.$emit('rutupd', rut)
            },
            modalCreContacto(){
                this.txtRut = null
                this.txtNombre = null
                this.txtApellido1 = null
                this.txtApellido2 = null
                this.txtDireccion = null
                this.txtNumDir = null
                this.txtRegion = null
                this.txtComuna = null
                this.txtEmail = null
                this.txtTelefono = null
                this.txtParentesco = null
                this.txtPrioridad = null
            },
        }
    }
</script>