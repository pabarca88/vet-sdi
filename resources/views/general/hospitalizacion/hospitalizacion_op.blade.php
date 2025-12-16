<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
               <ul class="nav nav-tabs-secciones mb-3" id="pediatria_general" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="sala-tab" data-toggle="tab" href="#sala" role="tab" aria-controls="sala" aria-selected="true">Sala Hospitalización</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="informe-tab" data-toggle="tab" href="#informe" role="tab" aria-controls="informe" aria-selected="false">Informe Terápia</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="tab-content" id="at-hosp">
                    <!--Sala-->
                    <div class="tab-pane fade show active" id="sala" role="tabpanel" aria-labelledby="sala-tab">
                         @include('general.hospitalizacion.seccion_ficha_hospitalizacion.sala_hospitalizacion_op')
                    </div>
                    <!--PROCEDIMIENTOS-->
                    <div class="tab-pane fade show " id="informe" role="tabpanel" aria-labelledby="informe-tab">
                        @include('general.hospitalizacion.seccion_ficha_hospitalizacion.informe_op')
                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
