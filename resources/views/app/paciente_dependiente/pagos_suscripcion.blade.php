@extends('template.paciente.template')
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
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip"
                                    data-placement="top" title="Volver a mi escritorio"><i
                                        class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="
                                #">Suscripciones y facturación</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <style>


  .pricing-card {
    border: 2px solid transparent;
    border-radius: 12px;
    transition: 0.3s;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);

    /* MISMO TAMAÑO */
    height: 100%;
  }

  .pricing-card.selected {
    border: 2px solid #007bff;
    box-shadow: 0 0 0 3px rgba(0,123,255,0.15);
  }

  .card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 320px; /* ajusta según necesidad */
  }

  .price {
    font-size: 2rem;
    font-weight: bold;
  }

  .features {
    flex-grow: 1;

  }
</style>


        <!--Cierre: Header-->
       
    <div class="row">
        <div class="col-md-3 mb-4 d-flex">
          <div class="card pricing-card  w-100">
            <div class="card-body">
              <div class="text-center">
                <h5>Plan Gratuito</h5>
                <div class="price">$0</div>
              </div>
               <button class="btn btn-dark select-btn">Comenzar <i class="feather icon-arrow-right"></i></button>
              <div class="features text-left mt-3">
                <hr>
                <h5 class="text-dark">Funciones</h5>
                <p>✔ Registro de 1 mascota.</p>
                <p>✔ Agendamiento de citas.</p>
                <p>✔ Confirmación y recordatorios automáticos vía email.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4 d-flex">
          <div class="card pricing-card text-center w-100">
            <div class="card-body">
              <div>
                <h5>Plan Básico</h5>
                <div class="price">$2.990</div>
                <h6>(Anual)</h6>
                <h6 class="text-purple">Mascota extra: +$990</h6>
              </div>
               <button class="btn btn-dark select-btn">Comenzar <i class="feather icon-arrow-right"></i></button>
                <div class="features text-left mt-3">
                    <hr>
                    <h5 class="text-dark">Funciones</h5>
                    <p>✔ Registro de hasta 1–2 mascotas.</p>
                    <p>✔ Carnet de vacunas y desparasitaciones.</p>
                    <p>✔ Agendamiento de citas.</p>
                    <p>✔ Confirmación y recordatorios automáticos vía email.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-4 d-flex">
          <div class="card pricing-card text-center w-100">
            <div class="card-body">

              <div>
                <h5>Plan Vet Plus</h5>
                <div class="price">$5.990</div>
                <h6>(Anual)</h6>
                <h6 class="text-purple">Mascota extra: +$990</h6>
              </div>
              <button class="btn btn-dark select-btn">Comenzar <i class="feather icon-arrow-right"></i></button>
               <div class="features text-left mt-3">
                 <hr>
                <h5 class="text-dark">Funciones</h5>
                <p>✔ Registro de hasta 5 mascotas.</p>
                <p>✔ Historial veterinario disponible 24/7.</p>
                <p>✔ Acceso a exámenes, recetas y consentimientos.</p>
                <p>✔ Carnet de vacunas y desparasitaciones.</p>
                <p>✔ App móvil (iOS y Android).</p>
                <p>✔ Autorización de procedimientos.</p>
                <p>✔ Historial de veterinarios por atención.</p>
                <p>✔ Agendamiento de citas.</p>
                <p>✔ Confirmación y recordatorios automáticos vía email.</p>
                <p>✔ Búsqueda y suscripción de servicios veterinarios cercanos.</p>

              </div>

            </div>
          </div>
        </div>
    </div>
    
<!--Cierre: Container Completo-->

@endsection

<script>
  const buttons = document.querySelectorAll(".select-btn");

  buttons.forEach(btn => {
    btn.addEventListener("click", function () {

      // quitar selección previa
      document.querySelectorAll(".pricing-card").forEach(card => {
        card.classList.remove("selected");
      });

      // agregar a la card actual
      this.closest(".pricing-card").classList.add("selected");
    });
  });
</script>