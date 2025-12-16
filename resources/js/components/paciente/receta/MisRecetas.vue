<template>
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Mis Recetas</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link to="/Paciente" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/Paciente/Receta_Online" data-toggle="tooltip" data-placement="top" title="Volver a inicio de receta online">
                                    Receta Online
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/Paciente/Receta_Online/Mis_Recetas">Mis Recetas</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-c-blue f-20 d-inline ml-4 my-1 py-1">Mis Recetas</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <table id="tabla_recetas_paciente_ro" 
                                    class="display table table-striped table-hover dt-responsive nowrap table-sm" 
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Profesional</th>
                                            <th class="text-center align-middle">Diagnóstico</th>
                                            <th class="text-center align-middle">Estado</th>
                                            <th class="text-center align-middle">Receta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="r in recetas" :key="r.id">
                                            <td class="text-wrap text-center align-middle">
                                                {{ r.fechaReceta }}
                                            </td>
                                            <td class="align-middle text-center">
                                                <strong>{{ r.Profesional.nombre }}
                                                    {{ r.Profesional.apellido_uno }}
                                                    {{ r.Profesional.apellido_dos }}
                                                </strong>
                                                <br>
                                                {{ r.Profesional.Especialidad }}
                                            </td>
                                            <td class="align-middle text-center">{{ r.Diagnostico }}
                                            </td>
                                            <td class="align-middle text-center">Enviado</td>
                                            <td class="text-center align-middle">
                                                
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
</template>
<script>
    export default {
        data() {
            return {
                recetas: [],
                dataTable: null
            }
        },
        mounted() {
            this.misRecetas(),
            this.dataTable = $('#tabla_recetas_paciente_ro').DataTable({
                responsive: true,
                columnDefs: [
                    {
                        targets: 0,
                        className: 'text-wrap text-center align-middle'
                    },
                    {
                        targets: [1,2,3],
                        className: 'align-middle text-center'
                    },
                    {
                        targets: 4,
                        className: 'text-center align-middle'
                    },
                ],
            });
        },
        methods: {
            async misRecetas() {
                await this.axios.get('../../api/paciente/getRecetas')
                    .then(response => {
                        this.recetas = response.data.Recetas
                        this.recetas.forEach(re => {
                            this.dataTable.row.add([
                                re.fechaReceta,
                                '<strong>'+re.Profesional.nombre+
                                ' '+re.Profesional.apellido_uno+
                                ' '+re.Profesional.apellido_dos+
                                '</strong><br>'+
                                re.Profesional.Especialidad,
                                re.Diagnostico,
                                'Enviado',
                                '<button href="#!" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#m_cons_receta">'
                                +'<i class="feather icon-file-plus"></i>Ver Receta</button>'
                            ]).draw(false)
                        })
                        
                    })
                    .catch(error => {
                        this.recetas = [];
                    })
            },
        },
    }
</script>
