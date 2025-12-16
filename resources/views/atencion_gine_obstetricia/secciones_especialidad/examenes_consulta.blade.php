<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 ">
        <div class="row mx-0">
            <div class="col-md-12">
                <input type="hidden" name="tipo_examen_especial" id="tipo_examen_especial" value="{{ $lista_examen_especial }}">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="gine" role="tablist">
                    @php
                        $cantida_ex_esp = 0;
                    @endphp
                    @foreach ($examen_tipo as $ex_tipo)
                        @php
                            $activo = '';
                            if($cantida_ex_esp == 0)
                            {
                                $cantida_ex_esp++;
                                $activo = 'active';
                            }
                            else
                                $activo = '';
                        @endphp
                        <li class="nav-item-secciones">
                            <a class="nav-secciones {{ $activo }} text-uppercase" id="{{ $ex_tipo->ExamenEspecialidadTemplate->alias }}_tab" data-toggle="tab" href="#{{ $ex_tipo->ExamenEspecialidadTemplate->alias }}" role="tab" aria-controls="{{ $ex_tipo->ExamenEspecialidadTemplate->alias }}" aria-selected="true">{{ $ex_tipo->nombre }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="tab-content" id="gine-contenido">

    @php
        $cantida_ex_esp = 0;
    @endphp
    @foreach ($examen_tipo as $ex_tipo)
        @php
            $activo = '';
            if($cantida_ex_esp == 0)
            {
                $cantida_ex_esp++;
                $activo = 'show active';
            }
            else
                $activo = '';
        @endphp
        <div class="tab-pane fade {{ $activo }}" id="{{ $ex_tipo->ExamenEspecialidadTemplate->alias }}" role="tabpanel" aria-labelledby="{{ $ex_tipo->ExamenEspecialidadTemplate->alias }}_tab">
            {!! $ex_tipo->ExamenEspecialidadTemplate->cuerpo !!}
        </div>
    @endforeach

    <!-- MODALES PROCEDIMIENTOS -->
    @include('atencion_gine_obstetricia.formularios.modal_atencion_especialidad.gineco_obst.m_biopsia_go')
    @include('atencion_gine_obstetricia.formularios.modal_atencion_especialidad.gineco_obst.modal_anticonceptivo')
    @include('atencion_gine_obstetricia.formularios.modal_atencion_especialidad.gineco_obst.otros_procedimientos')

</div>

<script>

    function ver_seccion_otros_proc()
    {
        var valor = $('#tipo_proced').val();

        $('#div_seccion_biopsia').hide();
        $('#div_seccion_pap').hide();
        $('#div_seccion_diu').hide();
        $('#div_seccion_otro_procedimiento').hide();

        $.each(valor, function (index, value)
        {
            switch (parseInt(value)) {
                case 1: //Toma Biopsia
                    $('#div_seccion_biopsia').show();
                    // $('#div_seccion_pap').hide();
                    // $('#div_seccion_diu').hide();
                    // $('#div_seccion_otro_procedimiento').hide();
                    break;
                case 2: //Instalación DIU
                    // $('#div_seccion_biopsia').hide();
                    // $('#div_seccion_pap').hide();
                    $('#div_seccion_diu').show();
                    // $('#div_seccion_otro_procedimiento').hide();
                    break;
                case 3: //Cambio DIU
                    // $('#div_seccion_biopsia').hide();
                    // $('#div_seccion_pap').hide();
                    $('#div_seccion_diu').show();

                    // $('#div_seccion_otro_procedimiento').hide();
                    break;
                case 4: //Toma de Muestra PAP
                    // $('#div_seccion_biopsia').show();
                    $('#div_seccion_pap').show();
                    // $('#div_seccion_diu').hide();
                    // $('#div_seccion_otro_procedimiento').hide();
                    break;
                case 5: //Electro-Cauterio o Radiofrecuencia
                    // $('#div_seccion_biopsia').hide();
                    // $('#div_seccion_pap').hide();
                    // $('#div_seccion_diu').hide();
                    $('#div_seccion_otro_procedimiento').show();
                    break;
                case 6: //Otro
                    // $('#div_seccion_biopsia').hide();
                    // $('#div_seccion_pap').hide();
                    // $('#div_seccion_diu').hide();
                    $('#div_seccion_otro_procedimiento').show();
                    break;
                default:
                    // $('#div_seccion_biopsia').hide();
                    // $('#div_seccion_pap').hide();
                    // $('#div_seccion_diu').hide();
                    // $('#div_seccion_otro_procedimiento').hide();
                    break;
            }
        });
    }

</script>
