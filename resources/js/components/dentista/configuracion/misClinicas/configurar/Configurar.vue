<template>
    <div class="tab-pane fade show active" id="configurar" role="tabpanel" aria-labelledby="configurar-tab">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="dental" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="clinicas-dental-tab" data-toggle="tab" href="#clinicas-dental" role="tab" aria-controls="clinicas-dental" aria-selected="true">Mis clínicas</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="tiempo-atencion-clinica-tab" data-toggle="tab" href="#tiempo-atencion-clinica" role="tab" aria-controls="tiempo-atencion-clinica" aria-selected="false">Tiempo de atención</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="oficinas-box-clinica-tab" data-toggle="tab" href="#oficinas-box-clinica" role="tab" aria-controls="oficinas-box-clinica" aria-selected="false">Oficinas y box</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="dental-contenido">
            <MisClinicas></MisClinicas>
            <Box></Box>
            <TiempoAtencion></TiempoAtencion>
        </div>
    </div>
</template>
<script>
import MisClinicas from './MisClinicas.vue';
import Box from './Box.vue';
import TiempoAtencion from './TiempoAtencion.vue';

    export default {
        components: {
            MisClinicas,
            Box,
            TiempoAtencion,
        },
    }
</script>