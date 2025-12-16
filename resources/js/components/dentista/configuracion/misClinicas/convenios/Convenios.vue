<template>
    <div class="tab-pane fade" id="convenios" role="tabpanel" aria-labelledby="laboratorio-tab">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="dental" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="interconsultas-clinica-tab" data-toggle="tab" href="#interconsultas-clinica" role="tab" aria-controls="interconsultas-clinica" aria-selected="true">Interconsultas</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="convenios-clinica-tab" data-toggle="tab" href="#convenios-clinica" role="tab" aria-controls="convenios" aria-selected="false">Convenios</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="convenios">
            <Interconsultas></Interconsultas>
            <ConveniosClinicos></ConveniosClinicos>

            
        </div>                                   
    </div>
</template>
<script>
import Interconsultas from './Interconsultas.vue';
import ConveniosClinicos from './ConveniosClinicos.vue';


    export default {
        components: {
            Interconsultas,
            ConveniosClinicos
        },
    }
</script>