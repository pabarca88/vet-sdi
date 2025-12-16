<template>
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Cotización de exámenes</h5>
                        </div>
                        
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link to="/Asistente_Laboratorio" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/Asistente_Laboratorio/Cotizar_Examen">Cotización de exámenes</router-link>
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
                        <div class="card-header bg-info pb-2 pt-2">
                            <h5 class="text-white d-inline ml-4 mt-4">Paciente</h5>
                            <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4 pb-0 pt-0" data-toggle="modal" data-target="#agregar_paciente_laboratorio">
                                <i class="feather icon-plus"></i>Registrar Paciente
                            </button>
                        </div>
                        <div class="card-body">
                            <!--Paciente-->
                            <div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label">Rut</label>
                                        <input type="number" class="form-control form-control-sm form-control-sm-activo" name="orden" id="orden">
                                    </div>
                                </div>
                                <!--Inputs bloqueados porque se autocompleta al ingresar rut-->
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label">Nombres</label>
                                        <input type="text" class="form-control form-control-sm" name="nombres" id="nombres">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label">Apellidos</label>
                                        <input type="text" class="form-control form-control-sm" name="apellidos" id="apellidos">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-4 mb-2">
                                    <div class="form-group">
                                        <label class="floating-label-activo">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control form-control-sm" name="nacimiento" id="nacimiento">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label">Edad</label>
                                        <input type="number" class="form-control form-control-sm" name="edad" id="edad">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label">Sexo</label>
                                        <input type="text" class="form-control form-control-sm" name="sexo" id="sexo">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 col-md-8">
                                    <div class="form-group">
                                        <label class="floating-label">Dirección</label>
                                        <input type="text" class="form-control form-control-sm" name="direccion" id="direccion">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label">Comuna</label>
                                        <select id="comuna_paciente" name="comuna_paciente" class="form-control form-control-sm">
                                            <option>Seleccione una opción</option>
                                            <optgroup label="Valparaíso">
                                                <option>Viña del Mar</option>
                                                <option>La Calera</option>
                                                <option>Valparaíso</option>
                                            </optgroup> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--Seleccionar exámenes para añadir-->
                <div class="col-md-6 h-100">
                    <div class="card">
                        <div class="card-header bg-info pb-1 pt-2">
                            <h5 class="text-white">Exámenes</h5>
                        </div>
                        <div class="card-body">
                            <form class="form-inline mb-2">
                                <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Buscar examen" aria-label="Search">
                            </form>
                            <div class="table-responsive">
                                <table class="table table-xs text-center align-middle">
                                    <thead>
                                        <tr>
                                            <th>Añadir</th>
                                            <th>Código</th>
                                            <th>Examen</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-white">
                                                <a class="btn btn-success btn-sm" v-on:click="pruebaAñadir()">
                                                    <i class="feather icon-plus"></i>
                                                    Añadir
                                                </a>
                                            </td>
                                            <td>5874</td>
                                            <td>Prueba</td>
                                            <td>$ 0</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Exámenes añadidos-->
                <div class="col-md-6 h-100">
                    <div class="card">
                        <div class="card-header bg-info pb-1 pt-2">
                            <h5 class="text-white">Cotización de exámenes</h5>
                        </div>
                        <div class="card-body">
                            <form class="form-inline mb-2">
                                <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Buscar examen" aria-label="Search">
                            </form>
                            <div class="table-responsive">
                                <table class="table table-xs text-center align-middle">
                                    <thead>
                                        <tr>
                                            <th>Añadir</th>
                                            <th>Código</th>
                                            <th>Examen</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- 
                                        <tr>
                                            <td class="text-white"><a class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i> Quitar</a></td>
                                            <td>627162872</td>
                                            <td>Nombre examen</td>
                                            <td>$0</td>
                                        </tr>
                                        -->
                                        <tr class="table-secondary">
                                            <th colspan="3" class="text-right">Monto total</th>
                                            <th colspan="1">$0</th>
                                        </tr>
                                        <tr class="table-secondary">
                                            <th colspan="3" class="text-right">Total bonificación</th>
                                            <th colspan="1">$0</th>
                                        </tr>
                                        <tr class="table-warning">
                                            <th colspan="3" class="text-right">Total Copago</th>
                                            <th colspan="1">$0</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-white text-center">
                            <button type="submit" class="btn btn-success btn-sm"><i class="feather feather icon-send"></i> Enviar por correo</button>
                            <button class="btn btn-info btn-sm"><i class="feather feather icon-printer"></i> Imprimir</button>
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
                seleccionados: [],
            }
        },
        mounted() {
            
        },
        methods: {
           pruebaAñadir(){
               alert('Funciona')
           }
        },
    }
</script>
