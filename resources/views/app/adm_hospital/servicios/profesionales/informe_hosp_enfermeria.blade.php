<div class="card-a">
    <div class="card-header-a" id="hosp_enf">
        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed"
            type="button" data-toggle="collapse" data-target="#hosp_enf_urg" aria-expanded="false"
            aria-controls="hosp_enf_urg">
            Informe de hospitalización enfermería
        </button>
    </div>
    <div id="hosp_enf_urg" class="collapse" aria-labelledby="hosp_enf" data-parent="#hosp_enf">
        <div class="card-body-aten-a">
            <div id="form-hosp_enf_urg">
                <div class="col-md-12 py-40 px-0">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            @include('general.hospitalizacion.seccion_ficha_hospitalizacion.hospitalizar_enf_urgencia')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @include('page.general.modal_enfermeria.barthel')
@include('page.general.modal_enfermeria.cudyr')
@include('page.general.modal_enfermeria.glasgow')
@include('page.general.modal_enfermeria.braden')
@include('page.general.modal_enfermeria.caidas')
@include('page.general.modal_enfermeria.eva')
@include('page.general.modal_enfermeria.balance_hidrico')
@include('page.general.modal_enfermeria.pie_diab')
@include('page.general.modal_enfermeria.pie_diab_guia')
@include('page.general.modal_enfermeria.curaciones_hda')
@include('page.general.modal_enfermeria.curaciones_guia')
@include('page.general.modal_enfermeria.quemados')

@include('page.general.secciones_ficha.hospitalizacion.modals.ingreso_hosp')
@include('page.general.secciones_ficha.hospitalizacion.modals.in_solic_pabellon') --}}



<script>
    /** MENSAJE*/
    /** CARGAR mensaje */
    $('#mensaje_ficha').html(' Usted puede guardar la evolución solo guarde la ficha cuando el paciente es dado de alta o se traslade ');
    $('#mensaje_ficha').show();
    setTimeout(function() {
        $('#mensaje_ficha').hide();
    }, 5000);
    /** cronico */
    $(document).ready(function() {
        $('#pie_ant').select2();
        $('#tpo_aposc').select2();
        $('#u_med').select2();
        $('#pat_prop').select2();
        $('#pat_propq').select2();
        $('#sint_act').select2();
        $('#med_quem').select2();
        $('#ants_qm').select2();
        $('#tpo_aposqm').select2();

    });


    function cargarIgual(input) {

        let actual = $('#' + input);
        let equivalentes = $('#' + input).attr('data-input_igual').split(',');
        $.each(equivalentes, function(index, value) {
            var equivalente = $('#' + value);
            equivalente.val(actual.val());
        });

    }

    function evaluar_para_carga_detalle(select, div, input, valor) {
        var valor_select = $('#' + select + '').val();
        if (valor_select == valor) $('#' + div + '').show();
        else {
            $('#' + div + '').hide();
            $('#' + input + '').val('');
        }
    }
    /* Ponemos "agregarEvolucion" en el ámbito de toda la página */
    function agregarTratamiento() {
        var html = '';
        html += '<div id="contenedor_tratamiento">';
        html += '<div id="tratamiento" class="row border">';
        html += '<div class="col-sm-12 col-md-12 m-t-5">';
        html += '<div class="form-row">';
        html += '<div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        var f = new Date();
        html += ' <input class="form-control form-control-sm" name="fecha" type="hidden" value="' + f.getFullYear() +
            " -/ " + (f.getMonth() + 1) + "-" + f.getDate() + '">';
        html += ' <input class="form-control form-control-sm" name="hora" type="hidden" value="' + f.getHours() + ":" +
            f.getMinutes() + '">';
        html += f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear() + " -/ " + f.getHours() + ":" + f
            .getMinutes() + " min.";
        html += '(Rut responsable)';
        html += '</div>';
        html += '<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '  <div class="form-group">';
        html += '     <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Responsable</label>';
        html += '     <select name="resp_tto"  id="resp_tto" class="form-control form-control-sm">';
        html += '             <option  value="0">Seleccione</option>';
        html += '             <option  value="1">Juana Perez </option>';
        html += '             <option  value="2">Maria la del Barrio</option>';
        html += '             <option  value="3">alumna en práctica</option>';
        html += '             <option  value="4">Otro/a<option>';
        html += '          <select>';
        html += '     </div>';
        html += '  </div>';
        html += '<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">';
        html += '  <div class="form-group">';
        html += '     <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Indicado Por:</label>';
        html += '     <select name="resp_tto"  id="resp_tto" class="form-control form-control-sm">';
        html += '             <option  value="0">Seleccione</option>';
        html += '             <option  value="1">Juana Perez </option>';
        html += '             <option  value="2">Maria la del Barrio</option>';
        html += '             <option  value="3">alumna en práctica</option>';
        html += '             <option  value="4">Otro/a<option>';
        html += '      <select>';
        html += '   </div>';
        html += '</div>';
        html += '<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '  <div class="form-group">';
        html += '     <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Vía de Administración:</label>';
        html += '     <select name="resp_tto"  id="resp_tto" class="form-control form-control-sm">';
        html += '             <option  value="0">Seleccione</option>';
        html += '             <option  value="1">Oral</option>';
        html += '             <option  value="2">IM</option>';
        html += '             <option  value="3">EV Directa</option>';
        html += '             <option  value="4">EV Suero<option>';
        html += '             <option  value="3">Rectal</option>';
        html += '             <option  value="4">Subcutánea<option>';
        html += '          <select>';
        html += '  </div>';
        html += '</div>';
        html += '<div class="col-sm-12 col-md-12 m-t-5">';
        html += '  <div class="form-row">';
        html += '<div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1">';


        html += '</div>';
        html += '    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '       <div class="form-group">';
        html +=
            '        <label class="floating-label-activo-sm t-blue" for="obs_av_autorefrac_oi">Medicamento</i></label>';
        html +=
            '        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>';
        html += '    </div>';
        html += '  </div>';
        html += '  <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">';
        html += '       <div class="form-group">';

        html += '        <label class="floating-label-activo-sm t-blue" for="obs_av_autorefrac_oi">Dosis</i></label>';
        html +=
            '        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>';
        html += '     </div>';
        html += '   </div>';
        html += '  <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '  <div class="form-group">';

        html +=
            '      <label class="floating-label-activo-sm t-blue" for="obs_av_autorefrac_oi">Tolerancia/efectos adversos</i></label>';
        html +=
            '      <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>';
        html += '  </div>';
        html += '  </div>';
        html += ' <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += ' <div class="switch switch-success d-inline m-r-10">';
        html += '  <input type="checkbox" id="registro_alternativo_paciente" checked="">';
        html += ' <label for="registro_alternativo_paciente" class="cr"></label>';
        html += ' </div>';
        html += '  <label>Listo</label>';
        html += '</div>';
        html += '    </div>';
        html += '    </div>';
        html += ' </div>';
        html += '<div class="form-row">';
        html += '</div>';
        html += '</div>';
        html += '</form>';
        html += ' </div>';
        html += '</div>';
        html += '</div>';
        html += '       ';
        html += '    </div>';
        html += '</div>';

        $('#contenedor_tratamiento').append(html);
    } // agregarEvolucion
    $(document).ready(function() {
        /* Sacar la funcion "agregarPieza de este ámbito */
        $('.btn-agregar-tratamiento').click(function() {
            //agregarTratamiento();
        });
    });

    function agregarProcedimiento() {
        var html = '';
        html += '<div class=" border  px-2 pt-3 pb-1 mb-4 rounded shadow mx-2">';
        html += '<div id="contenedor_procedimiento">';
        html += '<div id="procedimiento" class="row">';
        html += ' <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">';
        html += ' <div class="form-row">';
        html += ' <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += ' <div class="form-group">';
        html += ' <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Responsable</label>';
        html += ' <select name="resp_pto"  id="resp_pto" class="form-control form-control-sm">';
        html += ' <option  value="0">Seleccione</option>';
        html += ' <option  value="1">Juana Perez </option>';
        html += ' <option  value="2">Maria la del Barrio</option>';
        html += ' <option  value="3">alumna en práctica</option>';
        html += ' </select>';
        html += ' </div>';
        html += ' </div>';
        html += ' <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += ' <div class="form-group">';
        html += ' <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Indicado por:</label>';
        html += ' <select name="resp_pto"  id="resp_pto" class="form-control form-control-sm">';
        html += ' <option  value="0">Seleccione</option>';
        html += ' <option  value="1">Juana Perez </option>';
        html += ' <option  value="2">Maria la del Barrio</option>';
        html += ' <option  value="3">alumna en práctica</option>';
        html += ' </select>';
        html += ' </div>';
        html += ' </div>';
        html += ' <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3">';
        html += ' <div class="form-group">';
        html += ' <label class="floating-label-activo-sm t-red" for="proc_enf_urg">Procedimiento</label>';
        html += ' <select name="proc_enf_urg"  id="proc_enf_urg" class="form-control form-control-sm">';
        html += ' <option value="0">Seleccione</option>';
        html += ' <option  value="1">Reanimación</option>';
        html += ' <option  value="2">Nebulización</option>';
        html += ' <option  value="3">Curación</option>';
        html += ' <option  value="4">Sonda Folley</option>';
        html += ' <option  value="5">Sonda Nasogástrica</option>';
        html += ' <option  value="6">Inmovilización Fx.</option>';
        html += ' <option  value="7">Otro/a<option>';
        html += ' </select>';
        html += ' </div>';
        html += ' </div>';
        html += ' <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
        html += '  <div class="custom-control custom-switch">';
        html += ' <input type="checkbox" class="custom-control-input" id="procedimiento_1">';
        html += '  <label class="custom-control-label" for="procedimiento_1">Finalizado</label>';
        html += ' </div>';
        html += ' </div>';
        html += ' </div>';
        html += ' <div class="form-row">';
        html += ' <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 col-xxl-11 col-xxxl-11">';
        html += ' <div class="form-group">';
        html += ' <label class="floating-label-activo-sm" for="obs_proc_enf_urg">Observaciones</label>';
        html +=
            ' <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_proc_enf_urg" id="obs_proc_enf_urg"></textarea>';
        html += ' </div>';
        html += ' </div>';
        html += ' <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-1 col-xxxl-1">';
        html +=
        ' <button type="button" class="btn btn-icon btn-danger-light-c"><i class="feather icon-x"></i></button>';
        html +=
            ' <button type="button" class="btn btn-icon btn-info-light-c"><i class="feather icon-save"></i></button>';
        html += ' </div>';
        html += ' </div>';
        html += ' </div>';
        html += ' </div>';
        html += ' </div>';
        html += '</div>';
        html += ' </div>';
        $('#contenedor_procedimiento').append(html);
    } // agregarEvolucion
    $(document).ready(function() {
        /* Sacar la funcion "agregarPieza de este ámbito */
        $('.btn-agregar-procedimiento').click(function() {
            agregarProcedimiento();
        });
    });
</script>
