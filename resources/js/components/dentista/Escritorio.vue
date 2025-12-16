<template>

    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10 font-weight-bold">Escritorio profesional</h5>
                    </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link to="/Dental">Mi Escritorio </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--Botones superiores-->
        <div class="row">
            <div class="col-md-12">
                <div class="card-deck m-b-30">
                    <div class="card subir">
                        <a href="#">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="/images/iconos/agenda.svg">
                                <h5 class="mt-2">Mi Agenda</h5>
                            </div>
                        </a>
                    </div>
                    <div class="card subir">
                        <router-link to="/Dental/Mis_Pacientes">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-80 text-center" src="/images/iconos/pacientes.svg">
                                <h5 class="mt-2">Mis Pacientes</h5>
                            </div>
                        </router-link>
                    </div>
                    <div class="card subir">
                        <router-link to="/Dental/Panel_Configuracion">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="/images/iconos/panel_configuracion.svg">
                                <h5 class="mt-2"> Panel de Configuración</h5>
                            </div>
                        </router-link>
                    </div>
                    <div class="card subir">
                        <a href="#">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="/images/iconos/ficha_2.svg">
                                <h5 class="mt-2">Receta Online</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Tabla agenda del día y Farmacrónicos-->
        <div class="row">
            <div class="col-md-8 m-b-30">
                <div class="card h-100 pb-0">
                    <div class="card-header text-center bg-c-info">
                          <div class="row">
                            <div class="col-sm-8 d-inline text-left">
                                <h5 class="text-white my-2" style="font-size: 1.1rem;">Mi agenda del día</h5>
                            </div>
                            <div class="col-sm-4 d-inline text-right mt-1">
                                <input type="date" class="form-control form-control-sm" id="date">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-0 pt-4">
                        <div class="dt-responsive table-responsive align-middle pb-0">
                            <table id="simpletable" class="table table-striped table-bordered nowrap table-sm" style="height: 100px">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Hora</th>
                                        <th class="text-center align-middle">Paciente</th>
                                        <th class="text-center align-middle">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">09:00</td>
                                        <td class="text-center align-middle bg-estado-light-verde text-white">
                                            <strong><span>Daniela Sepúlveda Bravo</span><br style="line-height: 1%;"></strong><span> 18.382-693-K</span>
                                            </td>
                                            <!--el color de la celda del nombre y rut depende del estado (confirmada tel; email ;personalmente; lo mismo el rehazo; rechazo por medico;prioridad médico etc)-->
                                        <td class="text-center align-middle">
                                            <button href="#!" class="btn btn-info btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Atender Paciente"><i class="feather icon-check"></i></button>
                                            <button href="#!" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Anular Hora"><i class="feather icon-x"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">12:15</td>
                                        <td class="text-center align-middle bg-estado-light-amarillo text-white">
                                            <strong><span>José Cortés Pino</span><br style="line-height: 1%;"></strong><span> 24.234-324-5</span>
                                        </td>
                                        <td class="text-center align-middle">
                                        <button href="#!" class="btn btn-info btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Atender Paciente"><i class="feather icon-check"></i></button>
                                        <button href="#!" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Anular Hora"><i class="feather icon-x"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">17:40</td>
                                        <td class="text-center align-middle text-white bg-estado-light-rojo">
                                            <strong><span>Elionor Montenegro Ruiz</span></strong><br style="line-height: 1%;"><strong><span> 12.345-895-0</span></strong></td>
                                        <td class="text-center align-middle">
                                        <button href="#!" class="btn btn-info btn-icon" data-toggle="tooltip" data-placement="top" title="Atender Paciente"><i class="feather icon-check"></i></button>
                                        <button href="#!" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Anular Hora"><i class="feather icon-x"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 m-b-30">
                <div class="card subir text-center h-100">
                    <img class="img-fluid card-img-top" src="/images/iconos/inscripciones_1.svg" alt="Farmacrónicos">
                    <a href="#" class="btn  btn-arrastre" type="button">
                        <div class="card-body">
                            <h5 style="font-size: 1.2rem;" class="card-title pt-2">Farmacrónicos</h5>
                            <p class="card-text">Inscriba a sus pacientes en Farmacrónicos para que obtengan sus medicamentos</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!--Botones-->
        <div class="row">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card social-widget-card bg-c-info opacidad">
                        <a href="#" class="btn" type="button">
                        <div class="card-body">
                            <img class="wid-40 mb-2" src="/images/iconos/estadisticas.svg">
                            <h5 class="my-auto text-white">Mis Estadísticas</h5>
                        </div>
                        </a>
                    </div>
                    <div class="card social-widget-card bg-c-info opacidad px-0">
                        <a href="https://www.cronicos.cl/" class="btn" type="button">
                        <div class="card-body">
                            <img class="wid-40 mb-2" src="/images/iconos/cronicos.svg">
                            <h5 class="my-auto text-white">Portal Crónicos</h5>
                        </div>
                        </a>
                    </div>
                    <div class="card social-widget-card bg-c-info opacidad px-0">
                        <a href="#" class="btn" type="button">
                        <div class="card-body">
                            <img class="wid-30 mb-3" src="/images/iconos/otros_servicios.svg">
                            <h5 class="my-auto text-white">Otros Servicios<br>(provisorio atención dental)</h5>
                        </div>
                        </a>
                    </div>
                    <div class="card social-widget-card bg-c-info opacidad px-0">
                        <router-link to="/Dental/Flujo_Caja" class="btn" type="button">
                            <div class="card-body">
                                <img class="wid-30 mb-3" src="/images/iconos/flujo_caja_3.svg">
                                <h5 class="my-auto text-white">Flujo de Caja</h5>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Botones-->
    </div>

</template>
