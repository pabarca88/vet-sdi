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
                                <li class="breadcrumb-item">
                                    <a href="{{ ROUTE('paciente.home') }}">Mi Escritorio </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row ">
            <div class="col-12 text-center">
                 <h4 class="text-white f-24">Promociones especiales</h4>
                </div>
        </div>
                </div>
            </div>
            <!--Cierre: Header-->

        </div>
        
            <div class="row mt-n5 mx-1">
                <div class="col-sm-12 mt-n5">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row align-items-center">

                              <!-- Input group buscador -->
                              <div class="col-md-8">
                                <div class="input-group mb-2">
                                  
                                  <div class="input-group-prepend">
                                    <select class="custom-select" id="searchCategory">
                                      <option selected>Categoría</option>
                                      <option value="3">Ver todo</option>
                                      <option value="1">Alimento</option>
                                      <option value="2">Medicamentos</option>
                                      <option value="3">Peluquería</option>
                                      <option value="3">Hotel</option>
                                      <option value="3">Procedimiento</option>
                                      <option value="3">Servicios</option>
                                      <option value="3">Entretención</option>
                                    </select>
                                  </div>

                                  <input 
                                    type="text" 
                                    class="form-control" 
                                    placeholder="¿Que estás buscando?"
                                    aria-label="Buscar"
                                  >

                                  <div class="input-group-append">
                                    <button class="btn btn-purple" style="border-bottom-left-radius: 0px; border-top-left-radius: 0px;" type="button">
                                      <i class="feather icon-search"></i> Buscar
                                    </button>
                                  </div>

                                </div>
                              </div>

                              <!-- Select comuna Chile -->
                              <div class="col-md-4">
                                <select class="custom-select mb-2" id="comuna">
                                  <option selected>¿Dónde te encuentras?</option>
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
                              </div>

                            </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="row mx-1">
                <div class="col-md-12">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade shadow border-xl" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="{{ asset('images/promociones/slider1.jpg') }}" class="d-block w-100 rounded-xxl" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="{{ asset('images/promociones/banner2.jpg') }}" class="d-block w-100 rounded-xxl" alt="...">
                        </div>
                      </div>
                      <!--<button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </button>-->
                    </div>
                </div>
            </div>
            <div class="row mx-1">
                <div class="col-12 mt-5">
                    <h3>Cupones</h3>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="card">
                      <img src="{{ asset('images/promociones/promo2.jpg') }}"  class="card-img-top" alt="...">
                      <div class="card-body text-center">
                        <button type="button" class="btn btn-outline-info btn-sm">Copiar cupón</button>
                        <a type="button" class="btn btn-info btn-outline-purple btn-sm" href="#" target="_blank">Ir al sitio</a>
                      </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="card">
                      <img src="{{ asset('images/promociones/promo2.jpg') }}"  class="card-img-top" alt="...">
                      <div class="card-body text-center">
                        <button type="button" class="btn btn-outline-info btn-sm">Copiar cupón</button>
                        <a type="button" class="btn btn-info btn-outline-purple btn-sm" href="#" target="_blank">Ir al sitio</a>
                      </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="card">
                      <img src="{{ asset('images/promociones/promo2.jpg') }}"  class="card-img-top" alt="...">
                      <div class="card-body text-center">
                        <button type="button" class="btn btn-outline-info btn-sm">Copiar cupón</button>
                        <a type="button" class="btn btn-info btn-outline-purple btn-sm" href="#" target="_blank">Ir al sitio</a>
                      </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="card">
                      <img src="{{ asset('images/promociones/promo2.jpg') }}"  class="card-img-top" alt="...">
                      <div class="card-body text-center">
                        <button type="button" class="btn btn-outline-info btn-sm">Copiar cupón</button>
                        <a type="button" class="btn btn-info btn-outline-purple btn-sm" href="#" target="_blank">Ir al sitio</a>
                      </div>
                    </div>
                </div>
            </div>
            <div class="row mx-1">
                <div class="col-12 mt-4">
                    <h3>Promociones</h3>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4">
                    <div class="card border-xl">
                      <img class="border-xl" src="{{ asset('images/promociones/promo1.jpg') }}"  alt="...">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4">
                    <div class="card border-xl">
                      <img class="border-xl" src="{{ asset('images/promociones/promo1.jpg') }}"  alt="...">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4">
                    <div class="card border-xl">
                      <img class="border-xl" src="{{ asset('images/promociones/promo1.jpg') }}"  alt="...">
                    </div>
                </div>
            </div>
             <div class="row mx-1 mt-4">
                <div class="col-12">
                    <h3>Ofertas</h3>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="card">
                      <img src="{{ asset('images/promociones/venta1.jpg') }}"  class="card-img-top" alt="...">
                      <div class="card-body text-center">
                        <h6>Alimento para Pájaros Pretty Pets 500 g</h6>
                        <p><s>$5.990</s></p>
                        <h4>$990</h4>
                        <a type="button" class="btn btn-outline-purple btn-sm" href="#" target="_blank">Ir al descuento</a>
                      </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="card">
                      <img src="{{ asset('images/promociones/venta1.jpg') }}"  class="card-img-top" alt="...">
                      <div class="card-body text-center">
                        <h6>Alimento para Pájaros Pretty Pets 500 g</h6>
                        <p><s>5.990</s></p>
                        <h4>$990</h4>
                       <a type="button" class="btn btn-outline-purple btn-sm" href="#" target="_blank">Ir al descuento</a>
                      </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="card">
                      <img src="{{ asset('images/promociones/venta2.jpg') }}"  class="card-img-top" alt="...">
                      <div class="card-body text-center">
                        <h6>Juguete Para Gato Pájaro Volador Con Sonido</h6>
                        <p><s>15.990</s></p>
                        <h4>$5.990</h4>
                        <button type="button" class="btn btn-outline-purple btn-sm">Ir al descuento</button>
                      </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="card">
                      <img src="{{ asset('images/promociones/venta3.jpg') }}"  class="card-img-top" alt="...">
                      <div class="card-body text-center">
                        <h6>Bravery Pork Mini Adult alimento para perro</h6>
                        <p><s>CLP 46,990</s></p>
                        <h4>CLP 22.990</h4>
                        <p><i>En Mercado Libre</i></p>
                        <button type="button" class="btn btn-outline-purple btn-sm">Ir al descuento</button>
                      </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

  <script>
  function formatComuna (comuna) {
    if (!comuna.id) {
      return '<i class="fas fa-map-marker-alt text-danger"></i> Seleccionar comuna';
    }
    return '<i class="fas fa-map-marker-alt text-primary"></i> ' + comuna.text;
  }

  $('#comuna').select2({
    placeholder: 'Seleccionar comuna',
    allowClear: true,
    width: '100%',
    templateResult: formatComuna,
    templateSelection: formatComuna,
    escapeMarkup: function (markup) { return markup; }
  });
</script>