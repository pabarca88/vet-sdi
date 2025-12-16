<template>
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Mis Licencias</h5>
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
                                <router-link to="/Paciente/Receta_Online/Mis_Certificados">Mis Certificados</router-link>
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
                                <h4 class="text-c-blue f-20 d-inline ml-4">Mis Certificados</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <table id="tabla_certificado_paciente_ro"
                                    class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-wrap text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Profesional</th>
                                            <th class="text-center align-middle">Tipo de certificado</th>
                                            <th class="text-center align-middle">Estado</th>
                                            <th class="text-center align-middle">Certificado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                certificados: [],
                dataTable: null
            }
        },
        mounted() {
            this.misLicencias(),
            this.dataTable = $('#tabla_certificado_paciente_ro').DataTable({
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
            async misLicencias() {
                await this.axios.get('../../api/paciente/getCertificados')
                    .then(response => {
                        this.certificados = response.data.Certificados
                        this.certificados.forEach(ce => {
                            this.dataTable.row.add([
                                ce.fechaCertificado,
                                '<strong>'+ce.Profesional.nombre+
                                ' '+ce.Profesional.apellido_uno+
                                ' '+ce.Profesional.apellido_dos+
                                '</strong><br>'+
                                ce.Profesional.Especialidad,
                                ce.Diagnostico,
                                'Enviado',
                                '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#m_cons_ex">'+
                                '<i class="feather icon-file-plus"></i> Ver Certificado</button>',
                            ]).draw(false)
                        })
                        
                    })
                    .catch(error => {
                        this.certificados = [];
                    })
            },
        },
    }
</script>
