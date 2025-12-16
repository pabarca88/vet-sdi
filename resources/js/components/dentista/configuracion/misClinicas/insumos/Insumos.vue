<template>
    <div class="tab-pane fade" id="insumos" role="tabpanel" aria-labelledby="insumos-tab">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="dental" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="equipaliento-clinica-tab" data-toggle="tab" href="#equipaliento-clinica" role="tab" aria-controls="equipamiento" aria-selected="false">Equipamiento</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="insumos-clinica-tab" data-toggle="tab" href="#insumos-clinica" role="tab" aria-controls="insumos-clinica" aria-selected="true">Insumos generales</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="farmacia-clinica-tab" data-toggle="tab" href="#farmacia-clinica" role="tab" aria-controls="farmacia" aria-selected="false">Insumos farmacia</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="proveedores-clinica-tab" data-toggle="tab" href="#proveedores-clinica" role="tab" aria-controls="proveedores" aria-selected="false">Proveedores</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="insumos">
            
            <Equipamientos></Equipamientos>
            <InsumosGenerales></InsumosGenerales>
            <InsumosFarmacia></InsumosFarmacia>
            <Proveedores></Proveedores>

        </div>                                 
    </div>
</template>
<script>
import InsumosGenerales from './InsumosGenerales.vue';
import InsumosFarmacia from './InsumosFarmacia.vue';
import Equipamientos from './Equipamientos.vue';
import Proveedores from './Proveedores.vue';

    export default {
        components: {
            InsumosGenerales,
            InsumosFarmacia,
            Equipamientos,
            Proveedores,
        },
    }
</script>