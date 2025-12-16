<template>
    <div id="m_cons_archivos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_archivosLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="m_cons_archivosLabel" style="font-size: 1.3rem; color: #3366CC;">Archivos subidos con la Consulta .... </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <table id="atenciones_previas_3" class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Tipo</th>                                              
                                    <th class="text-center align-middle">Nombre</th>
                                    <th class="text-center align-middle">Ver</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center align-middle">27/07/2021</td>
                                    <td class="text-center align-middle">Sangre</td>
                                    <td class="text-center align-middle">Hemograma y vhs</td>
                                    <td class="text-center align-middle"><button href="#!" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m_cons_archivos"><i class="feather icon-folder"></i> vVer Archivo</button></td>
                                </tr>
                                <tr>
                                    <td class="text-center align-middle">27/07/2021</td>
                                    <td class="text-center align-middle">Otorrinolaríngologico</td>
                                    <td class="text-center align-middle">Rinomanometría</td>
                                    <td class="text-center align-middle"><button href="#!" class="btn btn-success btn-sm" data-toggle="modal" data-target="#m_cons_archivos"><i class="feather icon-folder"></i> Ver Archivo</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <!--fin autollenado-->
                    <div class="modal-footer">
                        <button type="button mt-5" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>     
    </div>
</template>