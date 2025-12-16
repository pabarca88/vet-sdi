<template>
    <div id="nuevo_lugar_atencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_sucursal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" >{{ titulo }}</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" v-on:click="cerrarModal()">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Nombre</label>
                                <input class="form-control form-control-sm" type="text" v-model="txtNombre">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Rut</label>
                                <input class="form-control form-control-sm" type="text" v-model="txtRut">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Dirección</label>
                                <input class="form-control form-control-sm" type="text" v-model="txtDireccion">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Número</label>
                                <input class="form-control form-control-sm" type="text" v-model="txtNumero">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Región</label>
                                <select class="form-control form-control-sm" v-model="txtRegion" v-on:change="getInfoCiudad()">
                                    <option :value="0">Seleccione una opción</option>
                                    <option v-for="r in regiones" :key="r.id" :value="r.id">{{ r.sigla }}&ensp;{{ r.nombre }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Comuna</label>
                                <select class="form-control form-control-sm" v-model="txtComuna">
                                    <option :value="0">Seleccione una opción</option>
                                    <option v-for="c in ciudad" :key="c.id" :value="c.id">{{ c.nombre }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Correo Electrónico</label>
                                <input class="form-control form-control-sm" type="email" v-model="txtEmail">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Teléfono</label>
                                <input class="form-control form-control-sm" type="text" v-model="txtTelefono">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" v-on:click="cerrarModal()">Cancelar</button>
                    <button type="submit" class="btn btn-info btn-sm" v-on:click="AgregarLugarAtencion()">Registrar</button>
                </div>
            </div>
        </div>        
    </div>
</template>
<script>
    export default {
        data() {
            return {
                view: window.view,
                regiones: [],
                ciudad: [],

                txtNombre: null,
                txtRut: null,
                txtDireccion: null,
                txtNumero: null,
                txtEmail: null,
                txtTelefono: null,

                txtRegion: 0,
                txtComuna: 0,
            }
        },
        props:['titulo', 'vista'],
        mounted() {
            this.getInfoRegiones()

            this.txtNombre = ''
            this.txtRut = ''
            this.txtDireccion = ''
            this.txtNumero = ''
            this.txtEmail = ''
            this.txtTelefono = ''
            this.txtRegion = 0
            this.txtComuna = 0
        },
        methods: {
            async AgregarLugarAtencion() {
                if(this.validateInput()){
                    // Mensage de validacion de datos
                    this.$root.$emit('alert-modal', 'Datos Imcompletos o invalidos')
                    return;
                }
                await this.axios.get('/api/Profesional/newLugarAtencion',{ 
                        params:{
                            view: window.view,
                            nombre: this.txtNombre,
                            rut: this.txtRut,
                            email: this.txtEmail,
                            telefono: this.txtTelefono,

                            direccion: this.txtDireccion,
                            numerodir: this.txtNumero,

                            region: this.txtRegion,
                            comuna: this.txtComuna,

                            vista: this.vista,
                        }
                    })
                    .then(response => {
                        switch (response.data.status) {
                            // Caso de Exito
                            case '00':
                                $('#nuevo_lugar_atencion').modal('hide');
                                this.$root.$emit('exito-modal', 'Centro agregadi Exitosamente')
                                this.$root.$emit('reloadTable', '')
                                break;
                            // Caso de error validacion
                            case '01':
                                this.$root.$emit('alert-modal', response.data.mesagge)                          
                                $('#modal_alerta').modal('show')
                                break;
                            // Caso de error interno
                            case '02':
                                this.$root.$emit('error-modal', 'Ha ocurrido un error, por favor inténtelo de nuevo más tarde.') 
                                break;
                        }

                    })
                    .catch(error => {
                        this.$root.$emit('error-modal', 'Ha ocurrido un error, por favor inténtelo de nuevo más tarde.') 
                    })
            },
            async getInfoRegiones(){
                await this.axios.get('/api/Utils/getRegionesAll')
                    .then(response => {
                        this.regiones = response.data.Regiones
                    })
                    .catch(error => {
                        this.region = []
                    })
            },
            async getInfoCiudad(){
                await this.axios.get('/api/Utils/getCuidades',{ 
                    params:{
                            region: this.txtRegion,
                        }
                    })
                    .then(response => {
                        this.ciudad = response.data.Ciudad
                    })
                    .catch(error => {
                        this.ciudad = []
                    })
            },
            cerrarModal(){
                $('#nuevo_lugar_atencion').modal('hide');
            },
            validateInput(){
                if(!!this.txtNombre){
                    return true;
                }
                if(!!this.txtRut){
                    return true;
                }
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.txtEmail)) {
                    return true;
                }
            }
        },
    }
</script>