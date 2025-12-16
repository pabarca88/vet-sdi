

<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="pediatria_general" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="ingreso-tab" data-toggle="tab" href="#ingreso"role="tab" aria-controls="ingreso" aria-selected="false">Ingreso paciente</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="protocolo-tab" data-toggle="tab" href="#protocolo" role="tab" aria-controls="protocolo" aria-selected="false">Protocolo operatorio</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="recuperacion-tab" data-toggle="tab" href="#recuperacion" role="tab" aria-controls="recuperacion"  aria-selected="false">Recuperación</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="sala-tab" data-toggle="tab" href="#sala" role="tab" aria-controls="sala" aria-selected="false">Sala Hospitalización</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="alta-tab" data-toggle="tab" href="#alta" role="tab" aria-controls="alta" aria-selected="false">Epicrisis y carnet de alta</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12">
                <!--Contenido de tab -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="at-hosp">
                            <!--Ingreso de paciente-->
                            <div class="tab-pane fade show active" id="ingreso" role="tabpanel" aria-labelledby="ingreso-tab">
                                @include('cirugia.secciones_cirugia.ingreso_hosp')
                            </div>

                            <!--Protocolo de cirugia-->
                            <div class="tab-pane fade" id="protocolo" role="tabpanel" aria-labelledby="protocolo-tab">
                                @include('cirugia.secciones_cirugia.protocolo')
                            </div>

                            <!--Recuperación-->
                            <div class="tab-pane fade" id="recuperacion" role="tabpanel" aria-labelledby="recuperacion-tab">
                                @include('cirugia.secciones_cirugia.recuperacion')
                            </div>

                            <!--Sala-->
                            <div class="tab-pane fade" id="sala" role="tabpanel" aria-labelledby="sala-tab">
                                @include('cirugia.secciones_cirugia.sala')
                            </div>

                            <!--Epicrisis y carnet de alta-->
                            <div class="tab-pane fade" id="alta" role="tabpanel" aria-labelledby="alta-tab">
                                @include('cirugia.secciones_cirugia.epicrisis_alta_medica')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


