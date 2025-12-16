<template>
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Mis Profesionales</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link to="/Paciente" data-toggle="tooltip" data-placement="top"
                                    title="Volver a mi escritorio">
                                    <i class="feather icon-home" />
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/Paciente/Mis_Profesionales">Mis Profesionales</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills bg-white" id="myTab" role="tablist">
                            <li class="nav-item" v-for="e in especialidades" :key="e">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" 
                                id="user2-tab" data-toggle="tab" role="tab" aria-controls="user2" aria-selected="false">
                                    {{ e }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" role="tabpanel" aria-labelledby="user2-tab">
                        <div class="row mb-n4">
                            <!--Card Tomar Hora Perfil Médico -->
                            <div class="col-md-4" v-for="p in profesionales" :key="p.id">
                                <div class="card user-card user-card-1 mt-4">
                                    <div class="card-body pt-0">
                                        <div class="user-about-block text-center">
                                            <div class="row align-items-end">
                                                <div class="col"></div>
                                                <div class="col">
                                                    <div class="position-relative d-inline-block">
                                                        <img class="img-radius img-fluid wid-80"
                                                            src="/images/iconos/usuario_profesional.svg"
                                                            alt="Mis médicos">
                                                    </div>
                                                </div>
                                                <div class="col text-right pb-3">
                                                    <div class="dropdown" style="cursor:pointer">
                                                        <a class="drp-icon dropdown-toggle" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="feather icon-more-horizontal"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Opciones"/>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Desvincular profesional</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <a href="#!" data-toggle="modal" data-target="#modal-report">
                                                <span class="badge badge-primary mt-2">{{ p.especialidad }}</span>
                                                <h5 class="mb-1 mt-2">{{ p.nombre }} {{ p.apellido_uno }} {{ p.apellido_dos }}</h5>
                                            </a>
                                            <p class="mb-3 text-muted">
                                                <i class="feather icon-calendar"></i>
                                                Próxima hora 27/08/2021
                                            </p>
                                            <a class="btn btn-sm btn-info" href="#" role="button">Ver Agenda</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                profesionales: [],
                especialidades: [],
            }
        },
        mounted() {
            this.misProfesionales()
        },
        methods: {
            async misProfesionales() {
                await this.axios.get('../api/paciente/mis_profesionales')
                    .then(response => {
                        this.profesionales = response.data.Profesionales
                        this.especialidades = response.data.Especialidad
                    })
                    .catch(error => {
                        this.profesionales = [];
                        this.especialidades = [];
                    })
            },
        },
    }
</script>
