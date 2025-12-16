@extends('template.profesional.template')
@section('content')

 <!--Container Completo-->
 <div class="pcoded-main-container">
     <div class="pcoded-content">
         <!--Header-->
         <div class="page-header">
             <div class="page-block">
                 <div class="row align-items-center">
                     <div class="col-md-12">
                         <div class="page-header-title">
                             <h5 class="m-b-10 font-weight-bold">Contratar asistente</h5>
                         </div>
                         <ul class="breadcrumb">
                             <li class="breadcrumb-item"><a href="escritorio_dental.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                             <li class="breadcrumb-item"><a href="configuraciones_profesional.php" data-toggle="tooltip" data-placement="top" title="Volver a panel de configuración">Panel de configuración</a></li>
                             <li class="breadcrumb-item">
                                 <a href="#">Contratar asistente</a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
         <!--Cierre: Header-->
         <!--Botones-->
         <div class="user-profile user-card mt-0 px-4"style="background-color: #ecf0f5!important;">
             <div class="row">
                 <div class="col-md-10 py-0 px-2 shadow-none mx-auto text-center">
                     <h5 class="mb-1 mt-3 f-20">Buscar asistente</h5>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-10 mx-auto px-2 mt-3">
                     <div class="card">
                         <div class="card-body pb-1 pt-3">
                             <div class="row">
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label class="floating-label-activo-sm">Región</label>
                                         <select class="form-control form-control-sm">
                                             <option>Seleccione</option>¡
                                             <option>Región</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label class="floating-label-activo-sm">Comuna</label>
                                         <select class="form-control form-control-sm">
                                             <option>Seleccione</option>¡
                                             <option>Viña del Mar</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label class="floating-label-activo-sm">Atención</label>
                                         <select class="form-control form-control-sm">
                                             <option>Seleccione</option>
                                             <option>Presencial</option>
                                             <option>Online</option>

                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <button type="button" class="btn btn-info btn-block btn-sm">Buscar</button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="row mx-0">
                 <div class="col-md-12 text-center">
                     <h5 class="mb-1 mt-3 p-16">Resultados de la búsqueda</h5>
                 </div>
             </div>
             <div class="row m-b-10">
                 <div class="col-md-10 mx-auto mt-1 pt-1 pb-5 px-1">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="card border my-2">
                                 <div class="card-body p-2 shadow-none">
                                     <div class="row">
                                         <div class="col-md-4 text-center">
                                             <img src="../assets/images/iconos/usuario_asistente.svg" class="img-fluid rounded-circle" width="90" alt="Especialista">
                                         </div>
                                         <div class="col-md-8 text-center">
                                             <ul class="mb-1">
                                                 <li><strong>Pepita Sanchez Díaz</strong></li>
                                                 <li class="text-secondary ">Viña del Mar - V Región</li>
                                                 <li class="text-secondary "><strong>Atención: </strong>Presencial - Online</li>
                                             </ul>
                                             <button type="button" class="btn btn-info btn-sm mt-0" data-toggle="modal" data-target="#invitar_asist">Invitar</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="card border my-2">
                                 <div class="card-body p-2 shadow-none">
                                     <div class="row">
                                         <div class="col-md-4 text-center">
                                             <img src="../assets/images/iconos/usuario_asistente.svg" class="img-fluid rounded-circle" width="90" alt="Especialista">
                                         </div>
                                         <div class="col-md-8 text-center">
                                             <ul class="mb-1">
                                                 <li><strong>Pepita Sanchez Díaz</strong></li>
                                                 <li class="text-secondary">Viña del Mar - V Región</li>
                                                 <li class="text-secondary"><strong>Atención: </strong>Presencial</li>
                                             </ul>
                                             <button type="button" class="btn btn-info btn-sm mt-0">Invitar</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="card border my-2">
                                 <div class="card-body p-2 shadow-none">
                                     <div class="row">
                                         <div class="col-md-4 text-center">
                                             <img src="../assets/images/iconos/usuario_asistente.svg" class="img-fluid rounded-circle" width="90" alt="Especialista">
                                         </div>
                                         <div class="col-md-8 text-center">
                                             <ul class="mb-1">
                                                 <li><strong>Pepita Sanchez Díaz</strong></li>
                                                 <li class="text-secondary">Viña del Mar - V Región</li>
                                                 <li class="text-secondary"><strong>Atención: </strong>Online</li>
                                             </ul>
                                             <button type="button" class="btn btn-info btn-sm mt-0">Invitar</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="card border my-2">
                                 <div class="card-body p-2 shadow-none">
                                     <div class="row">
                                         <div class="col-md-4 text-center">
                                             <img src="../assets/images/iconos/usuario_asistente.svg" class="img-fluid rounded-circle" width="90" alt="Especialista">
                                         </div>
                                         <div class="col-md-8 text-center">
                                             <ul class="mb-1">
                                                 <li><strong>Pepita Sanchez Díaz</strong></li>
                                                 <li class="text-secondary">Viña del Mar - V Región</li>
                                                 <li class="text-secondary"><strong>Atención: </strong>Online</li>
                                             </ul>
                                             <button type="button" class="btn btn-info btn-sm mt-0">Invitar</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="card border my-2">
                                 <div class="card-body p-2 shadow-none">
                                     <div class="row">
                                         <div class="col-md-4 text-center">
                                             <img src="../assets/images/iconos/usuario_asistente.svg" class="img-fluid rounded-circle" width="90" alt="Especialista">
                                         </div>
                                         <div class="col-md-8 text-center">
                                             <ul class="mb-1">
                                                 <li><strong>Pepita Sanchez Díaz</strong></li>
                                                 <li class="text-secondary">Viña del Mar - V Región</li>
                                                 <li class="text-secondary"><strong>Atención: </strong>Presencial - Online</li>
                                             </ul>
                                             <button type="button" class="btn btn-info btn-sm mt-0">Invitar</button>
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
 </div>
 <!--Cierre: Container Completo-->
 <!--Modal invitar asistente-->
 <div id="invitar_asist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="invitar_asist" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-12">
                         <h6 class="text-c-blue mb-0">Nombre</h6>
                         <p>Pepita Sanchez Díaz (28 años)</p>
                     </div>
                     <div class="col-md-12">
                         <h6 class="text-c-blue mb-0">Residencia</h6>
                         <p>Viña del Mar, Región de Valparaíso</p>
                     </div>
                     <div class="col-md-12">
                         <h6 class="text-c-blue mb-0">Contacto</h6>
                         <p>+569 34565434 - asistente@gmail.com</p>
                     </div>
                 </div>
                 <hr class="my-2">
                 <div class="row">
                     <div class="col-md-12 mb-3">
                         <p class="titulo-uno mb-1">Seleccione el lugar de atención que desea invitar para colaborar</p>
                         <select class="form-control form-control-sm">
                             <option>Seleccione</option>
                             <option>Cemical</option>
                             <option>La ligua</option>
                             <option>Los Andes Kriman</option>
                         </select>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12">
                         <p class="titulo-uno mb-1">Modalidad de trabajo</p>
                         <select class="form-control form-control-sm">
                             <option>Seleccione</option>
                             <option>Presencial</option>
                             <option>Online</option>
                             <option>Presencial y Online</option>
                         </select>
                     </div>
                 </div>
                 <div class="row mt-3">
                     <div class="col-md-12 text-center">
                         <button type="button" class="btn btn-sm btn-info">Enviar invitación</button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!--Mas informacion asistente-->
 <div id="invitar_asist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="invitar_asist" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-12 mb-3">
                         <p class="titulo-uno mb-1">Seleccione el lugar de atención que desea invitar para colaborar</p>
                         <select class="form-control form-control-sm">
                             <option>Seleccione</option>
                             <option>Cemical</option>
                             <option>La ligua</option>
                             <option>Los Andes Kriman</option>
                         </select>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12">
                         <p class="titulo-uno mb-1">Modalidad de trabajo</p>
                         <select class="form-control form-control-sm">
                             <option>Seleccione</option>
                             <option>Presencial</option>
                             <option>Online</option>
                             <option>Presencial y Online</option>
                         </select>
                     </div>
                 </div>
                 <div class="row mt-3">
                     <div class="col-md-12 text-center">
                         <button type="button" class="btn btn-sm btn-info">Enviar invitación</button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
