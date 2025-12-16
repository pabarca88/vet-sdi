<template>
  
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Agenda</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <router-link to="/Asistente_Laboratorio" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item">
                                    <router-link to="/Asistente_Laboratorio/Agenda_Laboratorio">Agenda</router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
             <!--Pacientes y pagos-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <p class="f-18 d-inline text-white">
                                    <span><strong>Laboratorio</strong></span><br><!--Nombre del Laboratorio-->
                                    <span>Laboratorio Clínico</span><!--Tipo de Laboratorio-->
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                        <label class="floating-label-activo">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="nacimiento_paciente" id="nacimiento_paciente">
                                    </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="floating-label">Laboratorio</label>
                                            <select id="comuna_paciente" name="comuna_paciente" class="form-control form-control-sm">
                                                <option>Seleccione una opción</option>
                                                <option>Centro Médico Santiago Centro</option>
                                                <option>Centro Médico Rancagua</option>
                                                <option>Centro Médico Viña del Mar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-info btn-block btn-sm">Filtrar</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="agenda_laboratorio" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-wrap text-center align-middle">Acción</th>
                                                <th class="text-wrap text-center align-middle">Pago</th>
                                                <th class="text-wrap text-center align-middle">Hora</th>
                                                <th class="text-center align-middle">Sucursal</th>
                                                <th class="text-wrap text-center align-middle">Paciente</th>
                                                <th class="text-center align-middle">Contacto Paciente</th>
                                                <th class="text-center align-middle">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-info btn-sm rounded-circle" data-toggle="tooltip" data-placement="top" title="Confirmar Hora"><i class="feather icon-check"></i></button>
                                                    <button href="#!" class="btn btn-danger btn-sm rounded-circle" data-toggle="tooltip" data-placement="top" title="Anular Hora"><i class="feather icon-x"></i></button>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="btn-group">
                                                        <button class="btn btn-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pago</button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal_venta_bonos_api" style="cursor: pointer;">Vender Bono</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal_recepcion_bonos_api" style="cursor: pointer;">Recibir Bono o Programa</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal_boleta_electronica" style="cursor: pointer;">Particular</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    08:00 hrs
                                                </td>
                                                <td class="text-center align-middle">
                                                    <span>
                                                        <strong>Centro Prueba</strong>
                                                    </span>
                                                    <br>
                                                    <span>Valparaiso, por ahi #710</span>
                                                    <br>
                                                    <span>Valparaiso</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    Juan Perez
                                                    <br>
                                                    11.111.111-1
                                                </td>
                                                <td class="text-center align-middle">
                                                    a@a.com
                                                    <br>
                                                    +5691234567
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-success">Hora confirmada</span>
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

}
</script>
