<template>
    <div id="editar_contacto_emergencia" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="editar_contacto_emergencia" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white text-center">Editar contacto de emergencia</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" v-on:click="cerrarModal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Rut</label>
                                    <input type="person" class="form-control" v-model="contacto.rut">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Nombres</label>
                                    <input type="text" class="form-control" v-model="contacto.nombre">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Apellidos Uno</label>
                                    <input type="text" class="form-control" v-model="contacto.apellido_uno">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Apellidos Dos</label>
                                    <input type="text" class="form-control" v-model="contacto.apellido_dos">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Dirección</label>
                                    <input type="address" class="form-control" v-model="direccion.direccion">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Numero</label>
                                    <input type="address" class="form-control" v-model="direccion.numero_dir">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Region</label>
                                    <select class="form-control" v-model="txtRegion" v-on:change="getInfoCiudad()">
                                        <option v-for="r in region" :key="r.id" :value="r.id">{{ r.sigla }}&ensp;{{ r.nombre }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Comuna</label>
                                    <select class="form-control" v-model="txtComuna">
                                        <option v-for="c in ciudad" :key="c.id" :value="c.id">{{ c.nombre }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" v-model="contacto.email">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Teléfono</label>
                                    <input type="tel" class="form-control" v-model="contacto.telefono">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Parentezco</label>
                                    <select class="form-control" v-model="contacto.relacion">
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
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Prioridad</label>
                                    <select class="form-control" v-model="contacto.prioridad">
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="cerrarModal">Cancelar</button>
                    <button type="submit" class="btn btn-info" v-on:click="setUpdPaciente">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            contacto: [],
            direccion: [],
            region: [],
            ciudad: [],
            
            txtRegion: null,
            txtComuna: null,
        }
    },
    props:['rutupd'],
    methods : {
        async getUpdPaciente(){
            await this.axios.get('../api/getContacto',{ 
                params:{
                        rut: this.rutupd,
                        code: window.code,
                    }
                })
                .then(response => {
                    this.contacto = response.data.Contacto
                    this.direccion = response.data.Direccion
                    this.txtRegion = response.data.Direccion.Region
                    this.txtComuna = response.data.Direccion.id_ciudad
                    this.getInfoRegiones()
                    this.getInfoCiudad()
                    $('#editar_contacto_emergencia').modal('show')
                })
                .catch(error => {
                    console.log(error)
                    this.contacto = []
                    this.direccion = []
                    this.txtRegion = null
                    this.txtComuna = null
                    this.rutupd = ''
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
        async setUpdPaciente(){
            this.direccion.id_ciudad = this.txtComuna;
            await this.axios.get('/api/setContacto',{ 
                params:{
                        contacto: this.contacto,
                        direccion: this.direccion,
                        code: window.code,
                    }
                })
                .then(response => {
                    if(response.data.status == 0){
                        $('#editar_contacto_emergencia').modal('hide')
                        this.$root.$emit('reset', '')
                    }else{
                        alert('fallo');
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        },  
        cerrarModal(){
            $('#editar_contacto_emergencia').modal('hide')
        }
    },
    watch: { 
        rutupd: function(newVal, oldVal) {
            if(newVal != ''){
                this.getUpdPaciente()
                this.$root.$emit('changed-rutupd', '')
            }
        }
    }
};
</script>