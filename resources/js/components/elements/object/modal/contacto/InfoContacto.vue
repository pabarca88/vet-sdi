<template>
    <div id="info_contacto_emergencia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info_contacto_emergencia" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Información de contacto</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" v-on:click="cerrarModal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th scope="row">Rut</th>
                                        <td>{{ contacto.rut }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nombre</th>
                                        <td>{{ contacto.nombre }}
                                            <br>
                                            {{ contacto.apellido_uno }} {{ contacto.apellido_dos }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dirección</th>
                                        <td>{{ direccion.direccion }} #{{ direccion.numero_dir }},
                                            <br>
                                            {{ direccion.Ciudad }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Teléfono</th>
                                        <td>{{ contacto.telefono }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{ contacto.email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="cerrarModal">Cerrar</button>
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
        }
    },
    props:['rutinfo'],
    methods : {
        async getInfoPaciente(){
            await this.axios.get('/api/getContacto',{ 
                params:{
                        rut: this.rutinfo,
                        code: window.code,
                    }
                })
                .then(response => {
                    this.contacto = response.data.Contacto
                    this.direccion = response.data.Direccion
                    $('#info_contacto_emergencia').modal('show')
                })
                .catch(error => {
                    this.contacto = []
                    this.direccion = []
                })
        },  
        cerrarModal(){
            $('#info_contacto_emergencia').modal('hide')
        }
    },
    watch: { 
        rutinfo: function(newVal, oldVal) {
            if(newVal != ''){
                this.getInfoPaciente()
                this.$root.$emit('changed-rutinfo', '')
            }
            
        }
    }
};
</script>