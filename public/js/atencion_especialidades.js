/** TABLAS **/
/** Exámenes **/
$(document).ready(function() {
    $('#bandeja_entrada').DataTable({
        responsive: true,
    });
});

$(document).ready(function() {
    $('#exam_radiologicos').DataTable({
        responsive: true,
    });
});

$(document).ready(function() {
    $('#exam_general').DataTable({
        responsive: true,
    });
});

/** Atenciones previas **/
$(document).ready(function() {
    $('#aten_previas').DataTable({
        responsive: true,
    });
});

/** MODALS **/
/** MODALS FORMULARIOS GENERALES **/
function ind_endoscopia() {
    $('#ind_endoscopia_modal').modal('show');
}
function ind_endoscopia() {
    $('#ind_endoscopia_modal').modal('show');
}


function r_ingreso() {
    $('#modal_ireqingreso').modal('show');
}

/** Indicar Audífono **/
function i_audif() {
    cargar_receta_audifono();
    $('#indicar_audif').modal('show');
}


/** Indicar examen **/
function i_examen() {
    $('#indicar_examenes').modal('show');
}

function i_examen_esporl() {
    ver_examenes_ficha_medica();
    ver_examenes_ficha_medica_esp();
    $('#indicar_examen_orl').modal('show');
}

function i_examen_rxorl() {
    $('#indicar_examenrx_orl').modal('show');
}

function i_examen_rx() {
    $('#modal_indicar_examen_rx').modal('show');
}

function i_examen_espuro() {
    $('#indicar_examen_uro').modal('show');
}

function i_examen_derm() {
    $('#indicar_examen_derm').modal('show');
}

function i_biopsiaderm() {
    $('#m_biopsia_dermat').modal('show');
}

function i_biopsiaorl() {
    $('#m_biopsia_orl').modal('show');
}

function i_biopsia() {
    $('#m_biopsia_cir').modal('show');
}

function i_exvenereas() {
    $('#modal_ex_venereas').modal('show');
}

function i_indic_derm() {
    $('#indicaciones_modal').modal('show');
}

function i_examen_espoft() {
    $('#indicar_examen_oft').modal('show');
}
/**psicologia */

function cons_tto_psi() {
    $('#m_aconsentcirm').modal('show');
}

function psi_rorsch() {
    $('#test_rorsch').modal('show');
}
/**nutricion */
function cons_tto_nutri() {
    $('#m_aconsentcirm').modal('show');
}


/** fonoaudiologia **/
function interfono() {
    $('#modal_interfono').modal('show');
}

function informefono() {
    $('#informe_fono').modal('show');
}

function examenes_fono() {
    $('#indicar_examen_fono').modal('show');
}

// function est_ofa() {
//     $('#est_ofa').modal('show');
// }

function est_hpa() {
    $('#est_habpreart').modal('show');
}

function habla() {
    $('#m_habla').modal('show');
}

function e_plan() {
    $('#plan').modal('show');
}

// function e_praxias() {
//     $('#praxias').modal('show');
// }

// function e_voz() {
//     $('#m_voz').modal('show');
// }

// function e_espasmo() {
//     $('#m_eval_espasmof').modal('show');
// }

function l_praxias() {
    $('#modal_lam_praxias').modal('show');
}

function l_ling() {
    $('#modal_lam_ling').modal('show');
}

function tede() {
    $('#modal_tede').modal('show');
}

// function pragma() {
//     $('#h_pragmati').modal('show');
// }

function fon_r() {
    $('#fonema_r').modal('show');
}

function fon_p() {
    $('#fonema_p').modal('show');
}

function sopa_l() {
    $('#sopa').modal('show');
}

function tede_l() {
    $('#tede_1').modal('show');
}


/** kinesiologia **/

function interkine() {
    $('#modal_interkine').modal('show');
}

function informekine() {
    $('#informe_kine').modal('show');
}

function examenes_kine() {
    $('#indicar_examen_kine').modal('show');
}

function e_plan() {
    $('#plan').modal('show');
}

function postura() {
    $('#postura').modal('show');
}

function metria() {
    $('#metria').modal('show');
}

function fuerza_sup() {
    $('#fuerza_sup').modal('show');
}

function fuerza_inf() {
    $('#fuerza_inf').modal('show');
}

function tono_sup() {
    $('#tono_sup').modal('show');
}

function tono_inf() {
    $('#tono_inf').modal('show');
}

function reflejos() {
    $('#reflejos').modal('show');
}

function sensibilidad() {
    $('#sensibilidad').modal('show');
}

function func_global() {
    $('#func_global').modal('show');
}

/** nutrición **/

function internutri() {
    $('#modal_interconsulta_nutri').modal('show');
}

function informeNutri() {
    $('#informe_nutri').modal('show');
}

function examenes_nutri() {
    $('#indicar_examen_nutri').modal('show');
}

function e_plan_nutri() {
    $('#plan_nutri').modal('show');
}



function postura() {
    $('#postura').modal('show');
}

function metria() {
    $('#metria').modal('show');
}

function fuerza_sup() {
    $('#fuerza_sup').modal('show');
}

function fuerza_inf() {
    $('#fuerza_inf').modal('show');
}

function tono_sup() {
    $('#tono_sup').modal('show');
}

function tono_inf() {
    $('#tono_inf').modal('show');
}

function reflejos() {
    $('#reflejos').modal('show');
}

function sensibilidad() {
    $('#sensibilidad').modal('show');
}

function func_global() {
    $('#func_global').modal('show');
}

/** Exámenes hormonales **/
// function hormonas() {
//     $('#hormona_modal').modal('show');
// }



/** interconsultas **/
function inter() {
    $('#modal_interconsulta').modal('show');
}



/** consentimientos sidebar **/
// function solicitar_autorizacion() {
//     $('#m_acomp1').modal('show');
// }
// function cons_tto() {
//     $('#m_aconsentcirm').modal('show');
// }

// function solalta() {
//     $('#solalta').modal('show');
// }

// function c_faltante() {
//     $('#cfaltante').modal('show');
// }

// function f_faltante() {
//     $('#ffaltante').modal('show');
// }

// function sugerencias() {
//     $('#fsugerencias').modal('show');
// }

// function cons_revtto() {
//     $('#m_rev_cons').modal('show');
// }

// function rechtto() {
//     $('#m_rech_tto').modal('show');
// }






/** TOGGLE **/
/** Atención especialidad **/
/** Paciente menor de edad **/
$('#menor_edad_esp').click(function() {
    $('#form_esp').toggle();
});
$('#menor_edad_esp1').click(function() {
    $('#form_esp1').toggle();
});
/** signos vitales **/
$('#signos_vitales_esp').click(function() {
    $('#form_sv_esp').toggle();
});
/** Presión arterial **/
$('#p_arterial_esp').click(function() {
    $('#form_1_esp').toggle();
});

/** Comuncación y traslado **/
$('#com_trasl_esp').click(function() {
    $('#form_2_esp').toggle();
});
/** receta lentes **/
$('#receta_cerca').click(function() {
    $('#cerca').toggle();
});
$('#receta_inter').click(function() {
    $('#inter').toggle();
});
$('#receta_lejos').click(function() {
    $('#lejos').toggle();
});
/** fonoaudiologia**/
$('#ant_fam_fono').click(function() {
    $('#ant_fono').toggle();
});
$('#e_fono_lenguaje').click(function() {
    $('#fono_lenguaje').toggle();
});
$('#e_fono_comunicacion').click(function() {
    $('#fono_comunicacion').toggle();
});
/** kinesiologia**/
$('#e_kine_neuro').click(function() {
    $('#kine_neuro').toggle();
});
$('#e_kine_respiracion').click(function() {
    $('#kine_respiracion').toggle();
});
$('#e_kine_comunicacion').click(function() {
    $('#kine_comunicacion').toggle();
});
