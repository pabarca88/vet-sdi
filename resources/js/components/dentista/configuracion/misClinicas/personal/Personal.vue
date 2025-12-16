<template>
    <div class="tab-pane fade" id="asistentes" role="tabpanel" aria-labelledby="asistentes-tab">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="dental" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="asistentes-clinica-tab" data-toggle="tab" href="#asistentes-clinica" role="tab" aria-controls="asistentes-clinica" aria-selected="true">Asistentes</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="asistente-dental-clinica-tab" data-toggle="tab" href="#asistente-dental-clinica" role="tab" aria-controls="asistente-dental" aria-selected="false">Asistentes dentales</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="limpieza-mantencion-clinica-tab" data-toggle="tab" href="#limpieza-mantencion-clinica" role="tab" aria-controls="limpieza-mantencion-clinica" aria-selected="false">Limpieza y mantención</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="configuracion_clinica_dental">
            <Asistente></Asistente>
            <AsistenteDental></AsistenteDental>
            <Limpieza></Limpieza>
        </div>                          
    </div>
</template>
<script>
import Asistente from './Asistente.vue';
import AsistenteDental from './AsistenteDental.vue';
import Limpieza from './Limpieza.vue';

    export default {
        components: {
            Asistente,
            AsistenteDental,
            Limpieza,
        },
    }
</script>