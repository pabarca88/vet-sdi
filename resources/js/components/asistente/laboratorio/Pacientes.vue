<template>
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Pacientes</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link to="/Asistente_Laboratorio" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </router-link>
                            </li>

                            <li class="breadcrumb-item">
                                <router-link to="/Asistente_Laboratorio/Pacientes">Pacientes</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
         <!--Pacientes-->
            <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="row">
                            <div class="col-md-12 align-botton">
                                <h4 class="text-white f-20 d-inline ml-4 mt-3">Pacientes</h4>
                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#agregar_paciente_laboratorio">
                                    <i class="feather icon-plus"></i>Registrar Paciente
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <table id="tabla_pacientes_laboratorio" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Paciente</th>
                                        <th class="text-center align-middle">Nacimiento</th>
                                        <th class="text-center align-middle">Sexo</th>
                                        <th class="text-center align-middle">Contacto</th>
                                        <th class="text-center align-middle">Convenio</th>
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
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ p.fecha_nac }}
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ p.sexo}}
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ p.Direccion }}
                                            <br>
                                            {{ p.email }}
                                            <br>
                                            {{ p.telefono_uno }}
                                        </td>
                                        <td class="text-center align-middle">{{ p.Previcion }}</td>
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
</template>
<script>
    export default {
        data() {
            return {
                pacientes: [],
                dataTable: null,
            }
        },
        mounted() {
            this.getPacientes()
        },
        methods: {
            async getPacientes() {
                await this.axios.get('../api/asistente/laboratorio/getPacientes')
                    .then(response => {
                        this.pacientes = response.data.pacientes
                    })
                    .catch(error => {
                        this.pacientes = []
                    })
                if(this.dataTable == null){
                    this.dataTable = $('#tabla_pacientes_laboratorio').DataTable({
                        responsive: true,
                    });
                }
    
            },
        },
    }
</script>