<template>
    <div class="tab-pane fade" id="laboratorio" role="tabpanel" aria-labelledby="laboratorio-tab">
      <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="dental" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="laboratorio-clinica-tab" data-toggle="tab" href="#laboratorio-clinica" role="tab" aria-controls="laboratorio-clinica" aria-selected="true">Laboratorios asociados</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="orden-lab-clinica-tab" data-toggle="tab" href="#orden-lab-clinica" role="tab" aria-controls="orden-lab" aria-selected="false">Ordenes de laboratorio</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="laboratorio">
            <Ordenes></Ordenes>
            <Asociados></Asociados>
        </div>
    </div>
</template>
<script>
import Ordenes from './Ordenes.vue';
import Asociados from './Asociados.vue';

    export default {
        components: {
            Ordenes,
            Asociados,
        },
    }
</script>