/** TABLAS **/
/** Exámenes **/
// $(document).ready(function() {
//     $('#bandeja_entrada').DataTable({
//         responsive: true,
//     });
// });

// $(document).ready(function() {
//     $('#exam_radiologicos').DataTable({
//         responsive: true,
//     });
// });

// $(document).ready(function() {
//     $('#exam_general').DataTable({
//         responsive: true,
//     });
// });

/** Atenciones previas **/
// $(document).ready(function() {
//     $('#aten_previas').DataTable({
//         responsive: true,
//     });
// });

/** MODALS **/
/** MODALS FORMULARIOS GENERALES **/

/** Indicar examen **/
function i_examen() {
    $('#indicar_examen').modal('show');
}

/** Autorización **/

/** MODALS FORMULARIOS DE ESPECIALIDAD **/
/** Ciclo menstrual **/
function ciclo() {
    $('#ciclo_modal').modal('show');
}


/** Métodos anticonceptivos **/
function anticoncep() {
    $('#anticonceptivo_modal').modal('show');
}

/** Antecedentes embarazo **/
// function embarazos() {
//     $('#embarazos_modal').modal('show');
// }

/** Antecedentes mamas **/
// function mamas_ant() {
//     $('#mamas_ant_modal').modal('show');
// }

/** Grado de tunner **/
// function tunner() {
//     $('#tunner_modal').modal('show');
// }

/** PAP **/
function ex_pap() {
    $('#m_exesppap').modal('show');
}

/** Examen clínico de mamas **/
// function ex_mamas() {
//     $('#modal_mamas').modal('show');
// }

/** Factores de riesgo (embarazo) **/
function riesgo_emb() {
    $('#embarazoriesgo_modal').modal('show');
}

/** Autorización examen menor de edad **/
// function solicitar_autorizacion (){
//         $('#m_acomp1').modal('show');
//     }

/** Ecografía obstetrica **/
function eco_obst() {
    $('#ecoobstetrica_modal').modal('show');
}

/** Control diabetes **/
function control_aro2() {
    $('#modal_aro_2').modal('show');
}

/** Control hipertensión **/
function control_aro1() {
    $('#modal_aro_1').modal('show');
}

/** Control otros **/
function control_aro3() {
    $('#modal_aro_3').modal('show');
}


/** TABLAS DE MODALS **/
/** Modal ciclo mentrual **/
/** Menarquia **/
// $(document).ready(function() {
//     $('#menarquia_gt').DataTable({
//         responsive: true,
//     });
// });

/** Ciclo menstrual **/
// $(document).ready(function() {
//     $('#ciclo_menstrual_gt').DataTable({
//         responsive: true,
//     });
// });

/** Modal método anticonceptivo
    /** Hormonales **/
// $(document).ready(function() {
//     $('#hormonales_gt').DataTable({
//         responsive: true,
//     });
// });

/** Mecánicos **/
// $(document).ready(function() {
//     $('#mecanicos_gt').DataTable({
//         responsive: true,
//     });
// });

/** Modal antecedentes de embarazo y puerperio**/
// $(document).ready(function() {
//     $('#embarazo_gt').DataTable({
//         responsive: true,
//     });
// });

/** Modal antecedentes mamas**/
// $(document).ready(function() {
//     $('#ant_mamas_gt').DataTable({
//         responsive: true,
//     });
// });

/** Modal antecedentes hormonales**/
// $(document).ready(function() {
//     $('#ant_hormonales_gt').DataTable({
//         responsive: true,
//     });
// });

/** Modal Tunner**/
// $(document).ready(function() {
//     $('#ev_tunner_gt').DataTable({
//         responsive: true,
//     });
// });

/** Modal riesgo embarazo**/
/** Antecedentes progenitores**/
// $(document).ready(function() {
//     $('#ant_prog_gt').DataTable({
//         responsive: true,
//     });
// });

/** Antecedentes factores de riesgo actual**/
// $(document).ready(function() {
//     $('#riesg_act_gt').DataTable({
//         responsive: true,
//     });
// });

/** Antecedentes partos anteriores**/
// $(document).ready(function() {
//     $('#partos_ant_gt').DataTable({
//         responsive: true,
//     });
// });



/** TOGGLE **/
/** Atención ginecológica **/
/** Paciente menor de edad **/
$('#menor_edad_gine').click(function() {
    $('#form_0_gine').toggle();
});

/** Presión arterial **/
$('#p_arterial_gine').click(function() {
    $('#form_1_gine').toggle();
});

/** Comuncación y traslado **/
$('#com_trasl_gine').click(function() {
    $('#form_2_gine').toggle();
});

/** Comuncación y traslado **/
$('#signos_vitales_ped').click(function() {
    $('#form_3_ped').toggle();
});

/** Modal ciclo menstrual **/
/**Menarquia**/
$('#menarquia_gine').click(function() {
    $('#form_4_gine').toggle();
});
/**Ciclo menstrual**/
$('#ciclo_menst_gine').click(function() {
    $('#form_5_gine').toggle();
});

/** Modal metodos anticonceptivos **/
/**Hormonales**/
$('#hormonales_gine').click(function() {
    $('#form_6_gine').toggle();
});
/**Mecánicos**/
$('#mecanicos_gine').click(function() {
    $('#form_7_gine').toggle();
});

/** Modal embarazo y puerperio **/
$('#emb_puerp_gine').click(function() {
    $('#form_8_gine').toggle();
});

/** Modal Antecedentes mamas **/
$('#ant_mamas_gine').click(function() {
    $('#form_9_gine').toggle();
});

/** Modal Antecedentes hormonales **/
$('#ant_hormo_gine').click(function() {
    $('#form_10_gine').toggle();
});

$('#gine_mecanicos').click(function() {
    $('#mecanicos_go').toggle();
});

/** Modal desarrollo tunner **/
$('#grado_tunner_gine').click(function() {
    $('#form_11_gine').toggle();
});

/** Modal factores de riesgo embarado **/
$('#fact_riesg_emb').click(function() {
    $('#form_12_gine').toggle();
});


/** Atención obstétrica **/
/** Paciente menor de edad **/
$('#menor_edad_obste').click(function() {
    $('#form_0_obste').toggle();
});

/** Presión arterial **/
$('#p_arterial_obste').click(function() {
    $('#form_1_obste').toggle();
});

/** Comuncación y traslado **/
$('#com_trasl_obste').click(function() {
    $('#form_2_obste').toggle();
});

/** Comuncación y traslado **/
$('#signos_vitales_obste').click(function() {
    $('#form_3_obste').toggle();
});

/** Atención obstétrica alto riesgo **/
/** Paciente menor de edad **/
$('#menor_edad_obst_ar').click(function() {
    $('#form_0_obst_ar').toggle();
});

/** Paciente de alto riesgo obstétrico**/
$('#altriesg_obst_ar').click(function() {
    $('#form_4_obst_ar').toggle();
});

/** Presión arterial **/
$('#p_arterial_obst_ar').click(function() {
    $('#form_1_obst_ar').toggle();
});

/** Comuncación y traslado **/
$('#com_trasl_obst_ar').click(function() {
    $('#form_2_obst_ar').toggle();
});

/** Comuncación y traslado **/
$('#signos_vitales_obst_ar').click(function() {
    $('#form_3_obst_ar').toggle();
});

/** Puerperio **/
/** Control puerperal **/
$('#cont_puerperal').click(function() {
    $('#form_0_puerp').toggle();
});

/** Presión arterial **/
$('#p_arterial_puerp').click(function() {
    $('#form_1_puerp').toggle();
});

/** Comuncación y traslado **/
$('#com_trasl_puerp').click(function() {
    $('#form_2_puerp').toggle();
});

/** Comuncación y traslado **/
$('#signos_vitales_puerp').click(function() {
    $('#form_3_puerp').toggle();
});

function abrir_div(nombre_div)
{
    $('#'+nombre_div).toggle();
}
