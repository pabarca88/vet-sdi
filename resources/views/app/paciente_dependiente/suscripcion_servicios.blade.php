@extends('template.usuario.template')
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.home') }}"
                                        data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Suscripciones y servicios cercanos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
        </div>

         <div class="row  mt-n5 mx-1">
            <div class="col-sm-12 mt-n5">
                <div class="card">
                    <div class="card-body">
                      <div class="form-row">
                          <!-- Input group buscador -->
                          <div class="form-group col-md-4">
                                <label class="floating-label-activo-sm">¿Que buscas?</label>
                                <select class="custom-select" id="searchCategory">
                                  <option selected>Seleccione servicio</option>
                                  <option value="1">Centro Veterinario</option>
                                  <option value="1">Pet Shop</option>
                                  <option value="1">Centro Veterinario y Pet Shop</option>
                                  <option value="2">Farmacia Veterinaria</option>
                                  <option value="3">Peluquería</option>
                                  <option value="3">Hotel de mascotas</option>
                                </select>
                          </div>
                          <div class="col-">
                                <button type="button"  class="btn btn-info" onclick="getLocation()"><i class="feather icon-search"></i> Buscar</button>
                          </div>

                          <!--QUE APAREZCAN TODAS LAS COMUNAS DE CHILE-->
                          <!--<div class="col-md-2">
                            <select class="custom-select mb-2" id="comuna">
                              <option selected>📍 ¿Dónde te encuentras?</option>
                              <option>Santiago</option>
                              <option>Providencia</option>
                              <option>Las Condes</option>
                              <option>Ñuñoa</option>
                              <option>La Florida</option>
                              <option>Maipú</option>
                              <option>Puente Alto</option>
                              <option>San Bernardo</option>
                              <option>Valparaíso</option>
                              <option>Viña del Mar</option>
                              <option>Quilpué</option>
                              <option>Concepción</option>
                              <option>Talcahuano</option>
                              <option>Chillán</option>
                              <option>Temuco</option>
                              <option>Valdivia</option>
                              <option>Osorno</option>
                              <option>Puerto Montt</option>
                              <option>Antofagasta</option>
                              <option>Calama</option>
                              <option>La Serena</option>
                              <option>Coquimbo</option>
                              <option>Iquique</option>
                              <option>Arica</option>
                            </select>
                          </div>-->
            
                         <div class="col">
                                <button type="button"  class="btn btn-outline-info" onclick="getLocation()"><i class="fas fa-map-marker-alt"></i> Obtener mi ubicación</button>
                          </div>
                      </div>
                      </div>
                  </div>
            </div>
          </div>

         <div class="row mx-1 ">
             <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white border-bottom">
                        <h4 class=" f-20 text-dark pt-2">Lugares adheridos a nuestra comunidad</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="col-6">
                            <div id="map" style="height: 500px;"></div>
                          </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">

                                <div class="card-lineal">
                                    <div class="card-header-lineal">
                                        <h4 class="f-18 text-dark">Información del lugar seleccionado</h4>
                                    </div>
                                    <div class="card-body-lineal p-4">
                                            <img class="wid-120 text-center mt-1 mb-3" src="{{ asset('images/otroslogos/logo-local.png') }}">
                                            <h5 class="f-18 text-dark">Pet Shop Perro Loco</h5>
                                            <p>Esmeralda 381, Los Andes, Región de Valparaíso.</p><br>
                                            <h6 class="text-dark text-uppercase">Horario</h6>
                                            <p><strong>Lunes a Viernes: </strong>10:00 am - 20:30 pm</p>
                                            <p><strong>Sábado: </strong>10:00 am - 15:00 pm</p>
                                            <p><strong>Domingo:</strong> Cerrado</p>

                                             <h6 class="text-dark text-uppercase mt-3">Servicios</h6><!--EL LUGAR PUEDE OFRECER MAS DE UNO-->
                                 
                                            <h6><span class="badge badge-purple-light">Centro Veterinario</span></h6>
                                            <h6><span class="badge badge-purple-light">Farmacia Veterinaria</span></h6>
                                            <h6><span class="badge badge-purple-light">Pet Shop</span></h6>
                                            <h6><span class="badge badge-purple-light">Centro Veterinario y Pet Shop</span></h6>
                                            <h6><span class="badge badge-purple-light">Peluquería</span></h6>
                                            <h6><span class="badge badge-purple-light">Hotel de mascotas</span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mx-1">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-info pt-1 pb-0" role="alert">
                            <p class="p-13 pb-0 mb-1">Indique los alimentos o productos que desea registrar para recibir de forma mensual.</p>
                        </div>
                        <div class="form-row mb-0">
                            <div class="form-group col-md-9">
                                <label class="floating-label-activo-sm mb-0">Alimento</label>
                                <input type="text" id="medicamentos" class="form-control form-control-sm ui-autocomplete-input" onblur="getDosis_sdi()" autocomplete="off" wfd-id="id8">
                                <input type="hidden" name="id_medicamentos" id="id_medicamentos" value="861" wfd-id="id9">
                            </div>

                            <div class="form-group col-md-3 ">
                                <label class="floating-label-activo-sm mb-0">Cantidad</label>
                                <input class="form-control form-control-sm" type="number" id="cantidad" name="cantidad" wfd-id="id10">
                            </div>
                            <div class="form-group col-md-9 ">
                                <label class="floating-label-activo-sm mb-0">Presentación</label>
                                <select class="form-control form-control-sm" type="text" id="dosis" name="dosis">

                                <option value="0">Seleccione</option><option value="1" data-id="862" data-cant_comp="1">42 comp.</option><option value="1" data-id="863" data-cant_comp="1">98 comp.</option></select>
                            </div>
                            <div class="form-group col-md-3 ">
                                <label></label>
                                <button type="button" class="btn btn-info btn-sm btn-block mt-n3" onclick="agregar_medicamento()" name="button" id="button"><i class="feather icon-check"></i> Añadir</button>
                            </div>
                        </div>

                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr class="text-center">
                                <th class="align-middle" scope="col">Alimento</th>
                                <th class="align-middle" scope="col">Cantidad</th>
                                <th class="align-middle" scope="col">Presentación</th>
                                <th class="align-middle" scope="col">Quitar</th>
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


@endsection

@section('page-script')



@endsection