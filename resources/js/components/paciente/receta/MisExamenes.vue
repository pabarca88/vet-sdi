<template>
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Mis Exámenes</h5>
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
                                <router-link to="/Paciente/Receta_Online/Mis_Examenes">Mis Exámenes</router-link>
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
                                <h4 class="text-c-blue f-20 d-inline ml-4">Mis Exámenes</h4>
                                <button type="button" class="btn btn-success btn-sm d-inline float-right mr-4"
                                    data-toggle="modal" data-target="#agregar_examen_profesional_ro">
                                    <i class="feather icon-plus"></i> Agregar examen
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <table id="tabla_examenes_paciente_ro"
                                    class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Nº de Orden</th>
                                            <th class="text-center align-middle">Profesional</th>
                                            <th class="text-center align-middle">Nombre del examen</th>
                                            <th class="text-center align-middle">Comentarios</th>
                                            <th class="text-center align-middle">Estado</th>
                                            <th class="text-center align-middle">Examen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Pendiente
                                        <tr>
                                            <td class="text-wrap text-center align-middle">11/09/2020</td>
                                            <td class="text-wrap text-center align-middle">12344434</td>
                                            <td class="align-middle text-center">
                                                <strong>Jaime Kriman Astorga</strong><br>
                                                Otorrinolaringólogo</td>
                                            <td class="align-middle text-center">Hemograma Completo</td>
                                            <td class="align-middle text-center">Comentarios
                                            <td class="align-middle text-center">Enviado</td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-toggle="modal" data-target="#m_cons_ex"><i
                                                        class="feather icon-file-plus"></i> Ver Examen</button>
                                            </td>
                                        </tr>
                                        -->
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
                examenes: [],
                dataTable: null
            }
        },
        mounted() {
            this.misRecetas(),
            this.dataTable = $('#tabla_examenes_paciente_ro').DataTable({
                responsive: true,
                columnDefs: [
                    {
                        targets: [0,1],
                        className: 'text-wrap text-center align-middle'
                    },
                    {
                        targets: [2,3,4,5],
                        className: 'align-middle text-center'
                    },
                    {
                        targets: 6,
                        className: 'text-center align-middle'
                    },
                ],
            });
        },
        methods: {
            async misRecetas() {
                await this.axios.get('../../api/paciente/getExamenes')
                    .then(response => {
                        this.examenes = response.data.Examenes
                        this.examenes.forEach(ex => {
                            console.log(ex)
                            this.dataTable.row.add([
                                ex.fechaExamen,
                                ex.id,
                                '<strong>'+ex.Profesional.nombre+
                                ' '+ex.Profesional.apellido_uno+
                                ' '+ex.Profesional.apellido_dos+
                                '</strong><br>'+
                                ex.Profesional.Especialidad,
                                ex.tipo_examen,
                                'Comentario',
                                ex.Diagnostico,
                                '<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#m_cons_ex">'+
                                '<i class="feather icon-file-plus"></i> Ver Examen</button>',
                            ]).draw(false)
                        })
                    })
                    .catch(error => {
                        console.log(error)
                        this.examenes = [];
                    })
            },
        },
    }
</script>