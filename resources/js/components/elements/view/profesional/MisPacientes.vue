<template>
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Mis pacientes</h5>
                        </div>

                        <ul class="breadcrumb" v-if="view == 'DENTAL'">
                            <li class="breadcrumb-item">
                                <router-link to="/Dental" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/Dental/Mis_Pacientes">Mis pacientes</router-link>
                            </li>
                        </ul>

                        <ul class="breadcrumb" v-else-if="view = 'ASIS_LAB'">
                            <li class="breadcrumb-item">
                                <router-link to="/Asistente_Laboratorio"  data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/Asistente_Laboratorio/Mis_Pacientes">Mis pacientes</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!-- Tabla mis pacientes --><!--Este formulario muestra los pacientes que alguna vez atendió el profesional (relacion: id_paciente/id_profesional)-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-center bg-info">
                    <div class="row">
                        <div class="col-md-12 align-botton">
                            <h4 class="text-white f-20 d-inline ml-4 mt-1 float-left">Mis Pacientes</h4>
                            <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#agregar_paciente_profesional">
                                <i class="feather icon-plus"></i> Registrar Paciente
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tabla_pacientes" class="display table table-striped table-hover dt-responsive nowrap table-xs" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Paciente</th>
                                <th class="text-center align-middle">Fecha <br> nacimiento</th>
                                <th class="text-center align-middle">Convenio</th>
                                <th class="text-center align-middle">Contacto</th>
                                <th class="text-center align-middle">Acción</th>
                                <th class="text-center align-middle">Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="p in pacientes" :key="p.id">
                                <td class="text-center align-middle">
                                    {{ p.nombres }}
                                    {{ p.apellido_uno }}
                                    {{ p.apellido_dos }}
                                    <br>
                                    {{ p.rut }}
                                    <br>
                                </td>
                                <td class="text-center align-middle">
                                    {{ format_date(p.fecha_nac) }}
                                </td>
                                <td class="text-center align-middle">
                                    {{ p.Previcion }}
                                </td>
                                <td class="text-center align-middle">
                                    {{ p.email }}
                                    <br>
                                    {{ p.telefono_uno }}
                                </td>
                                <td class="text-center align-middle">
                                    <router-link v-bind:to="'/Dental/Paciente/Atenciones_previas/' + p.code" target="_blank" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Atenciones Previas">
                                        <i class="feather icon-activity"></i>
                                    </router-link>                                  
                                    <a href="../ficha_medica_unica/acceso_fmu.php" target="_blank" class="btn btn-warning btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Ficha Médica Única"><i class="feather icon-file-plus"></i></a>
                                    <a href="../escritorio_profesional/editar_perfil_pacientes_profesional.php" class="btn btn-secondary btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Editar Perfil del Paciente"><i class="feather icon-edit"></i></a>
                                    <a target="_blank" class="btn btn-icon btn-success text-white" data-toggle="tooltip" data-placement="top" title="Enviar Email"><i class="fas feather icon-mail"></i></a>
                                </td>
                                <td class="text-left align-middle">
                                    <span class="badge badge-warning" v-if="p.Premiun">Premium</span>
                                    <span class="badge badge-primary" v-else-if="!p.Premiun">Básico</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Cierre: Tabla mis pacientes -->
    </div>
</template>
<script>
import moment from 'moment';
    export default {
        data() {
            return {
                pacientes: [],
                dataTable: null,
                view: window.view,
            }
        },
        mounted() {
            this.getPacientes()
        },
        methods: {
            async getPacientes() {
                await this.axios.get('/api/Profesional/getMisPacientes',{ 
                        params:{
                            code: window.code,
                            view: window.view,
                        }
                    })
                    .then(response => {
                        this.pacientes = response.data.pacientes
                    })
                    .catch(error => {
                        this.pacientes = []
                    })
                if(this.dataTable == null){
                    this.dataTable = $('#tabla_pacientes').DataTable({
                        responsive: true,
                    });
                }
            },
            format_date(value){
                if (value) {
                    return moment(String(value)).format('DD/MM/YYYY')
                }
            },
        },
    }
</script>
