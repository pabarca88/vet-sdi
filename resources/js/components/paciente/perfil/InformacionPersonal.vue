<template>
    <div class="tab-pane fade show active" id="info_personal" role="tabpanel" aria-labelledby="personal-tab">
        <div class="row">
            <div class="col-md-6">
                <!--Card Información Básica-->
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between bg-info">
                        <h5 class="mb-0 text-white">Datos Personales</h5>
                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right"
                            data-toggle="collapse" data-target=".info_basica" aria-expanded="false"
                            aria-controls="info_basica-1 info_basica-2" v-on:click="changedPersonal()">
                            <i class="feather icon-edit"></i>
                        </button>
                    </div>
                    <!--Datos Personales-->
                    <div class="card-body border-top info_basica collapse show" id="info_basica-1">
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label font-weight-bolder">Rut</label>
                                <div class="col-sm-6 my-auto ml-2">{{ this.paciente.rut}}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label font-weight-bolder">Nombre</label>
                                <div class="col-sm-6 my-auto ml-2">{{ this.paciente.nombres}}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label font-weight-bolder">Primer Apellido</label>
                                <div class="col-sm-6 my-auto ml-2">{{ this.paciente.apellido_uno}}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label font-weight-bolder">Segundo Apellido</label>
                                <div class="col-sm-6 my-auto ml-2">{{ this.paciente.apellido_dos}}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label font-weight-bolder">Sexo</label>
                                <div class="col-sm-6 my-auto ml-2" v-if="this.paciente.sexo == 'F'">Mujer</div>
                                <div class="col-sm-6 my-auto ml-2" v-if="this.paciente.sexo == 'M'">Hombre</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label font-weight-bolder">Nacimiento</label>
                                <div class="col-sm-6 my-auto ml-2">
                                    {{ formatDate() }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label font-weight-bolder">Previsión</label>
                                <div class="col-sm-6 my-auto ml-2">{{ this.prevision.nombre}}</div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="card-body border-top info_basica collapse" id="pinfo_basica_2">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="Rut" disabled v-model="txtRut">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="Nombre" v-model="txtNombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Primer Apellido</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="Primer Apellido" v-model="txtApellido1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Segundo Apellido</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="Segundo Apellido" v-model="txtApellido2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
                            <div class="col-sm-7 my-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="radHom" name="radSexo" type="radio" value="M" v-model="txtSexo">
                                    <label class="form-check-label" for="radHom">Hombre</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="radMuj" name="radSexo" type="radio" value="F" v-model="txtSexo">
                                    <label class="form-check-label" for="radMuj">Mujer</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" data-date-format="DD-YYYY-MM" v-model="txtFechaNac">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-sm-4 col-form-label font-weight-bolder">Previsión</label>
                            <div class="col-sm-7">
                                <select class="form-control" v-model="txtPrevision">
                                    <option value="0">Seleccione su previsión</option>
                                    <option v-for="p in previsiones" :key="p.id" :value="p.id">{{ p.nombre }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"></label>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                <button type="submit" class="btn btn-info" v-on:click="updInfoPersonal()">Guardar Cambios</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <!--Card Contacto-->
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between bg-info">
                        <h5 class="mb-0 text-white">Contacto</h5>
                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right"
                            data-toggle="collapse" data-target=".info_contacto" aria-expanded="false"
                            aria-controls="info_contacto_1 info_contacto_2" v-on:click="changedContacto()">
                            <i class="feather icon-edit"></i>
                        </button>
                    </div>
                    <!--Contacto-->
                    <div class="card-body border-top info_contacto collapse show" id="info_contacto_1">
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label font-weight-bolder">Correo Electrónico</label>
                                <div class="col-sm-6 my-auto ml-2">{{ this.paciente.email}}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono 1</label>
                                <div class="col-sm-6 my-auto ml-2">{{ this.paciente.telefono_uno}}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono 2</label>
                                <div class="col-sm-6 my-auto ml-2">{{ this.paciente.telefono_dos}}</div>
                            </div>
                        </form>
                    </div>
                    <!--Cierre: Contacto-->
                    <!--(Editar) Contacto-->
                    <div class="card-body border-top info_contacto collapse " id="info_contacto_2">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label font-weight-bolder">Correo Electrónico</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Correo Electrónico" v-model="txtEmail">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-sm-5 col-form-label font-weight-bolder">Teléfono 1</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Teléfono" v-model="txtFono1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-sm-5 col-form-label font-weight-bolder">Teléfono 2</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Teléfono" v-model="txtFono2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"></label>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger mr-2">Cancelar</button>
                                <button type="submit" class="btn btn-info" v-on:click="updInfoContacto()">Guardar Cambios</button>
                            </div>
                        </div>
                    </div>
                    <!--(Editar) Contacto-->
                </div>
                <!--Cierre: Card Contacto-->
                <!--Card Residencia-->
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between bg-info">
                        <h5 class="mb-0 text-white">Residencia</h5>
                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right"
                            data-toggle="collapse" data-target=".info_residencial" aria-expanded="false"
                            aria-controls="info_residencial_1 info_residencial_2" v-on:click="changedResidencia()">
                            <i class="feather icon-edit"></i>
                        </button>
                    </div>
                    <!--Residencia-->
                    <div class="card-body border-top info_residencial collapse show" id="info_residencial_1">
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                <div class="col-sm-6 my-auto ml-2">
                                    {{ this.direccion.Ciudad }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                <div class="col-sm-6 my-auto ml-2" v-if="this.direccion.direccion !== undefined">
                                    {{this.direccion.direccion }}, #{{ this.direccion.numero_dir  }}
                                </div>
                                <div class="col-sm-6 my-auto ml-2" v-if="this.direccion.direccion == undefined"></div>
                            </div>
                        </form>
                    </div>
                    <!--Cierre: Residencia-->
                    <!--(Editar) Residencia-->
                    <div class="card-body border-top info_residencial collapse " id="info_residencial_2">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label font-weight-bolder">Region</label>
                            <div class="col-sm-6">
                                <select class="form-control" v-model="txtRegion" id="selRegion" v-on:change="getInfoCiudad()">
                                    <option v-for="r in region" :key="r.id" :value="r.id">{{ r.sigla }}&ensp;{{ r.nombre   }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                            <div class="col-sm-6">
                                <select class="form-control" v-model="txtComuna">
                                    <option v-for="c in ciudad" :key="c.id" :value="c.id">{{ c.nombre }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Dirección" v-model="txtDireccion">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-sm-5 col-form-label font-weight-bolder">Número</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Número" v-model="txtNumDir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"></label>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger mr-2">Cancelar</button>
                                <button type="submit" class="btn btn-info" v-on:click="updInfoResidencia()">Guardar Cambios</button>
                            </div>
                        </div>
                    </div>
                    <!--(Editar) Residencia-->
                </div>
                <!--Cierre: Card Residencia-->
            </div>
        </div>

        <modalExito :msg="mesage" ></modalExito>
        <modalError :msg="mesage" ></modalError>
        <modalAlerta :msg="mesage" ></modalAlerta>
    </div>
</template>
<script>
import moment from 'moment'
import modalExito from '../../elements/object/modal/Exito.vue';
import modalError from '../../elements/object/modal/Error.vue';
import modalAlerta from '../../elements/object/modal/Alerta.vue';
    export default {
        components: {
            modalExito,
            modalError,
            modalAlerta
        },
        data() {
            return {
                paciente: [],
                prevision: [],
                direccion: [],
                previsiones: [],
                ciudad: [],
                region: [],

                txtRut: null,
                txtNombre: null,
                txtApellido1: null,
                txtApellido2: null,
                txtSexo: null,
                txtFechaNac: null,
                txtPrevision: null,

                txtEmail: null,
                txtFono1: null,
                txtFono2: null,

                txtComuna: null,
                txtDireccion: null,
                txtNumDir: null,
                txtRegion: null,

                mesage: '',
            }
        },
        mounted() {
            this.getInfoPaciente()
            this.getInfoPrevision()
            this.getInfoRegiones()
        },
        methods: {
            async getInfoPaciente(){
                await this.axios.get('../api/paciente/getInfoPerfil',{ 
                    params:{
                            code: window.code,
                        }
                    })
                    .then(response => {
                        this.paciente = response.data.Paciente
                        this.prevision = response.data.Prevision
                        this.direccion = response.data.Direccion
                        this.txtRegion = response.data.Direccion.Region
                    })
                    .catch(error => {
                       
                        this.paciente = []
                        this.prevision = []
                        this.direccion = []
                    })
            },
            async getInfoPrevision(){
                await this.axios.get('../api/getPrevisionesAll')
                    .then(response => {
                        this.previsiones = response.data.Presiones
                    })
                    .catch(error => {
                        this.previsiones = []
                    })
            },
            async getInfoRegiones(){
                await this.axios.get('../api/getRegionesAll')
                    .then(response => {
                        this.region = response.data.Regiones
                    })
                    .catch(error => {
                        this.region = []
                    })
            },
            async getInfoCiudad(){
                await this.axios.get('../api/getCuidades',{ 
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
            async updInfoContacto(){
                await this.axios.get('../api/paciente/updPerfilContacto',{ 
                    params:{
                            email: this.txtEmail,
                            fono1: this.txtFono1,
                            fono2: this.txtFono2,
                            paciente : this.paciente.id
                        }
                    })
                    .then(response => {
                        if(response.data.status == 1){
                            this.paciente.email = this.txtEmail
                            this.paciente.telefono_uno = this.txtFono1
                            this.paciente.telefono_dos = this.txtFono2
                            $('#modal_exito').modal('show')
                            this.dataChange('Su Informacion de Contacto a sido actualizado correctamente.')
                            $('[data-target=".info_contacto"]').click()
                        }else{
                            this.dataChange(response.data.mesage)
                            this.mesage = response.data.mesage
                            $('#modal_error').modal('show')
                        }
                    })
                    .catch(error => {
                        this.dataChange('Ha Ocurrido un error, Por Favor vuelva a intentarlo más tarde.')
                        this.mesage = 'Ha Ocurrido un error, Por Favor vuelva a intentarlo más tarde.'
                        $('#modal_error').modal('show')
                    })
            },
            async updInfoPersonal(){
                await this.axios.get('../api/paciente/updInfoPersonal',{ 
                    params:{
                            paciente: this.paciente.id,
                            rut: this.txtRut,
                            nombres: this.txtNombre,
                            apellido1: this.txtApellido1,
                            apellido2: this.txtApellido2,
                            sexo: this.txtSexo,
                            fechaNac: this.txtFechaNac,
                            prevision: this.txtPrevision,
                        }
                    })
                    .then(response => {
                        if(response.data.status == 1){
                            this.paciente.rut = this.txtRut 
                            this.paciente.nombres = this.txtNombre
                            this.paciente.apellido_uno = this.txtApellido1
                            this.paciente.apellido_dos = this.txtApellido2
                            this.paciente.sexo = this.txtSexo
                            this.paciente.fecha_nac = this.txtFechaNac
                            this.paciente.id_prevision = this.txtPrevision
                            this.prevision = response.data.Prevision
                            this.dataChange('Su Informacion Personal a sido actualizado correctamente.')
                            $('#modal_exito').modal('show')
                            $('[data-target=".info_basica"]').click()
                        }else{
                            this.dataChange(response.data.mesage)
                            this.mesage = response.data.mesage
                            $('#modal_error').modal('show')
                        }
                    })
                    .catch(error => {
                        this.dataChange('Ha Ocurrido un error, Por Favor vuelva a intentarlo más tarde.')
                        this.mesage = 'Ha Ocurrido un error, Por Favor vuelva a intentarlo más tarde.'
                        $('#modal_error').modal('show')
                    })
            },
            async updInfoResidencia(){
                await this.axios.get('../api/paciente/updPerfilResidencia',{ 
                    params:{
                            paciente : this.paciente.id,
                            ciudad: this.txtComuna,
                            direccion: this.txtDireccion,
                            numero: this.txtNumDir,
                        }
                    })
                    .then(response => {
                        if(response.data.status == 1){
                            this.direccion.id_ciudad = this.txtComuna
                            this.direccion.direccion = this.txtDireccion
                            this.direccion.numero_dir = this.txtNumDir
                            this.direccion.Ciudad = response.data.ciudad
                            this.dataChange('Su residencia a sido actualizado correctamente.')
                            $('#modal_exito').modal('show')
                            $('[data-target=".info_residencial"]').click()
                        }else{
                            this.dataChange(response.data.mesage)
                            this.mesage = response.data.mesage
                            $('#modal_error').modal('show')
                        }
                    })
                    .catch(error => {
                        this.dataChange('Ha Ocurrido un error, Por Favor vuelva a intentarlo más tarde.')
                        this.mesage = 'Ha Ocurrido un error, Por Favor vuelva a intentarlo más tarde.'
                        $('#modal_error').modal('show')
                    })
            },
            formatDate(){
                return moment(String(this.paciente.fecha_nac)).format('DD/MM/YYYY');
            },
            changedContacto(){
                this.txtEmail = this.paciente.email
                this.txtFono1 = this.paciente.telefono_uno
                this.txtFono2 = this.paciente.telefono_dos
            },
            changedPersonal(){
                this.txtRut = this.paciente.rut
                this.txtNombre = this.paciente.nombres
                this.txtApellido1 = this.paciente.apellido_uno
                this.txtApellido2 = this.paciente.apellido_dos
                this.txtSexo = this.paciente.sexo
                this.txtFechaNac = this.paciente.fecha_nac
                this.txtPrevision = this.paciente.id_prevision
            },
            changedResidencia(){
                this.txtDireccion = this.direccion.direccion
                this.txtComuna = this.direccion.id_ciudad
                this.txtNumDir = this.direccion.numero_dir
                this.txtRegion = this.direccion.Region
                this.getInfoCiudad()
            },
            dataChange(mensaje){
                this.$emit('msg', mensaje)
                this.msg = mensaje
                this.mesage = mensaje
            }
        }
    }
</script>
