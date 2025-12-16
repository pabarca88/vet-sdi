<template>
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Reservar Hora Médica</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link to="/Paciente" data-toggle="tooltip" data-placement="top"
                                    title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/Paciente/Reservar_Hora_Medica">Reservar Hora Médica</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--Buscador de pacientes-->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-white bg-light">
                        <h4 class="f-20 text-c-blue text-center mb-0">Reserve su hora médica</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3 justify-content-center" id="Buscadores" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link text-uppercase active" id="buscar_especialidad-tab" data-toggle="tab"
                                    href="#buscar_especialidad" role="tab" aria-controls="home"
                                    aria-selected="true">Especialidad</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" id="buscar_profesional-tab" data-toggle="tab"
                                    href="#buscar_profesional" role="tab" aria-controls="buscar_profesional"
                                    aria-selected="false">Profesional</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-uppercase" id="buscar_videoconsulta-tab" data-toggle="tab"
                                    href="#buscar_videoconsulta" role="tab" aria-controls="buscar_videoconsulta"
                                    aria-selected="false">Videoconsulta</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="BuscadoresContent">
                            <div class="tab-pane fade show active" id="buscar_especialidad" role="tabpanel"
                                aria-labelledby="buscar_especialidad-tab">
                                <input type="hidden" name="view" value="1">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <h6 class="mb-4 mt-2">Ingrese los datos solicitados para buscar hora por
                                                especialidad</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label">Especialidad</label>
                                            <input type="text" class="form-control" v-model="txtespecialidad">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label">Convenio</label>
                                            <select class="form-control" v-model="txtconvenio">
                                                <option value="S">Seleccione una opción</option>
                                                <option value="Particular">Particular</option>
                                                <option value="Fonasa">Fonasa</option>
                                                <option value="Banmédica">Banmédica</option>
                                                <option value="Colmena">Colmena</option>
                                                <option value="Cruz blanca">Cruz blanca</option>
                                                <option value="Nueva MasVida">Nueva MasVida</option>
                                                <option value="Vida tres">Vida tres</option>
                                                <option value="Consalud">Consalud</option>
                                                <option value="Control sin costo">Control sin costo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label">Región / Comuna</label>
                                            <select class="form-control" v-model="txtregion">>
                                                <option value="S">Seleccione una opción</option>
                                                <optgroup label="Valparaíso">
                                                    <option value="Viña del Mar">Viña del Mar</option>
                                                    <option value="La Calera">La Calera</option>
                                                    <option value="Valparaíso">Valparaíso</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="registro_alternativo_paciente" checked="">
                                                <label for="registro_alternativo_paciente" class="cr"></label>
                                            </div>
                                            <label>Buscar horas para los próximos 7 días</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="registro_alternativo_paciente2" checked="">
                                                <label for="registro_alternativo_paciente2" class="cr"></label>
                                            </div>
                                            <label>Buscar horas para las próximas 24 horas</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <button class="btn btn-info" v-on:click="buscarProfesional1">Buscar hora</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="buscar_profesional" role="tabpanel"
                                aria-labelledby="buscar_profesional-tab">
                                <input type="hidden" name="view" value="2">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <h6 class="mb-4 mt-2">Ingrese los datos solicitados para buscar hora por
                                                profesional</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label">Nombre o Rut del profesional</label>
                                            <input type="text" class="form-control " v-model="txtnombrerut">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label">Región / Comuna</label>
                                            <select class="form-control" v-model="txtregion">
                                                <option value="S">Seleccione una opción</option>
                                                <optgroup label="Valparaíso">
                                                    <option value="Viña del Mar">Viña del Mar</option>
                                                    <option value="La Calera">La Calera</option>
                                                    <option value="Valparaíso">Valparaíso</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="registro_alternativo_paciente" checked="">
                                                <label for="registro_alternativo_paciente" class="cr"></label>
                                            </div>
                                            <label>Buscar horas para los próximos 7 días</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="registro_alternativo_paciente2" checked="">
                                                <label for="registro_alternativo_paciente2" class="cr"></label>
                                            </div>
                                            <label>Buscar horas para las próximas 24 horas</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <button class="btn btn-info" v-on:click="buscarProfesional2">Buscar hora</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="buscar_videoconsulta" role="tabpanel"
                                aria-labelledby="buscar_videoconsulta-tab">
                                <input type="hidden" name="view" value="3">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <h6 class="mb-4 mt-2">Ingrese los datos solicitados para buscar hora por
                                                videoconsulta</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label">Especialidad</label>
                                            <input type="text" class="form-control" v-model="txtespecialidad">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label">Convenio</label>
                                            <select class="form-control" v-model="txtconvenio">
                                                <option value="S">Seleccione una opción</option>
                                                <option value="Particular">Particular</option>
                                                <option value="Fonasa">Fonasa</option>
                                                <option value="Banmédica">Banmédica</option>
                                                <option value="Colmena">Colmena</option>
                                                <option value="Cruz blanca">Cruz blanca</option>
                                                <option value="Nueva MasVida">Nueva MasVida</option>
                                                <option value="Vida tres">Vida tres</option>
                                                <option value="Consalud">Consalud </option>
                                                <option value="Control sin costo">Control sin costo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label">Región / Comuna</label>
                                            <select class="form-control" v-model="txtregion">
                                                <option value="S">Seleccione una opción</option>
                                                <optgroup label="Valparaíso">
                                                    <option value="Viña del Mar">Viña del Mar</option>
                                                    <option value="La Calera">La Calera</option>
                                                    <option value="Valparaíso">Valparaíso</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="registro_alternativo_paciente" checked="">
                                                <label for="registro_alternativo_paciente" class="cr"></label>
                                            </div>
                                            <label>Buscar horas para los próximos 7 días</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="registro_alternativo_paciente2" checked="">
                                                <label for="registro_alternativo_paciente2" class="cr"></label>
                                            </div>
                                            <label>Buscar horas para las próximas 24 horas</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <button class="btn btn-info" v-on:click="buscarProfesional3">Buscar hora</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!--Card Tomar Hora Perfil Médico -->
            <div class="col-md-4" v-for="p in profesionales" :key="p.id">
                <div class="card user-card user-card-1 mt-4">
                    <div class="card-body pt-0">
                        <div class="user-about-block text-center">
                            <div class="row align-items-end">
                                <div class="col"><img class="img-radius img-fluid wid-70"
                                        src="/images/iconos/usuario_profesional.svg" alt="Nombre del Médico">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#!" data-toggle="modal" data-target="#modal-report">
                                <span class="badge badge-primary mt-2">{{ p.especialidad }}</span>
                                <h5 class="mb-1 mt-2">{{ p.nombre }} {{ p.apellido_uno }} {{ p.apellido_dos }}</h5>
                            </a>
                            <p class="mb-3 text-muted"><i class="feather icon-calendar"></i>Próxima hora 27/08/2021</p>
                            <a class="btn btn-sm btn-info" href="#" role="button">Ver Agenda</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--CIERRE: Card Tomar Hora Perfil Médico -->
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                profesionales: [],
                txtespecialidad: null,
                txtconvenio: null,
                txtregion: null,
                txtnombrerut: null,
            }
        },
        methods: {
            async buscarProfesional1() {
                await this.axios.get('../api/paciente/buscar_profesional_1',{ 
                    params:{
                            especialidad: this.txtespecialidad,
                            convenios: this.txtconvenio,
                            comuna: this.txtregion,
                        }
                    })
                    .then(response => {
                        this.profesionales = response.data.Profesionales
                    })
                    .catch(error => {
                       this.profesionales = []
                    })
            },
            async buscarProfesional2() {
                await this.axios.get('../api/paciente/buscar_profesional_2',{ 
                    params:{
                            comuna: this.txtregion,
                            rut: this.txtnombrerut,
                        }
                    })
                    .then(response => {
                        this.profesionales = response.data.Profesionales
                    })
                    .catch(error => {
                       this.profesionales = []
                    })
            },
            async buscarProfesional3() {
                await this.axios.get('../api/paciente/buscar_profesional_3',{ 
                    params:{
                            especialidad: this.txtespecialidad,
                            convenios: this.txtconvenio,
                            comuna: this.txtregion,
                        }
                    })
                    .then(response => {
                        this.profesionales = response.data.Profesionales
                    })
                    .catch(error => {
                       this.profesionales = []
                    })
            },
        },

    }

</script>
