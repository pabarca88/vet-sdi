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

// /** Atenciones previas **/
// $(document).ready(function() {
//     $('#aten_previas').DataTable({
//         responsive: true,
//     });
// });

/** MODALS **/
/** MODALS FORMULARIOS GENERALES **/

function rx_ped() {
    $('#modal_ex_radiologicoped').modal('show');
}

$(document).ready(function() {
    $('#btn_recien_nacido').click(function () {
        $('#recien_nacido').toggle();
    });
});

/** Datos recien nacido **/
$(document).ready(function() {
    $('#btn_vac_part_puerp').click(function() {
        $('#vac_part_puerp').toggle();
    });
});

/** Datos recien nacido **/
$(document).ready(function() {
    $('#btn_extamiz').click(function() {
        $('#extamiz').toggle();
    });
});
/** examen fisico pediatria **/
function ant_parto() {
    $('#neonat_modal').modal('show');
}
/** pautas femenino **/
function tunner() {
    $('#tunner_modal').modal('show');
    cargar_tunner('f');
}

/** pautas masculino */
function tunner_m() {
    $('#tunner_modal_m').modal('show');
    cargar_tunner('m');
}

function per_cef_v() {
    $('#per_cef_ninos').modal('show');
}

function talla_edad_v() {
    $('#talla_edad_ninos519').modal('show');
}

function talla_25_v() {
    $('#talla_edad_ninos25').modal('show');
}

function talla_02_v() {
    $('#talla_edad_ninos02').modal('show');
}

function pesotalla_25_v() {
    $('#peso_talla_ninos25').modal('show');
}

function pesotalla_02_v() {
    $('#peso_talla_v02').modal('show');
}

function pesoedad_510_v() {
    $('#peso_edad_v510').modal('show');
}

function pesoedad_25_v() {
    $('#peso_edad_v510').modal('show');
}

function pesoedad_v() {
    $('#peso_edad_v').modal('show');
}

function percint_v() {
    $('#per_cint519v').modal('show');
}

function presion_v() {
    $('#presion_v').modal('show');
}

function per_cef_f() {
    $('#per_cef_f').modal('show');
}

function talla_edad_f519() {
    $('#talla_edad_f519').modal('show');
}

function talla_25_f() {
    $('#talla_edad_f25').modal('show');
}

function talla_02_f() {
    $('#talla_edad_f024').modal('show');
}

function pesotalla_25_f() {
    $('#peso_talla_f25').modal('show');
}

function pesotalla_02_f() {
    $('#peso_talla_f024').modal('show');
}

function pesoedad_510_f() {
    $('#peso_edad_f510').modal('show');
}

function pesoedad_25_f() {
    $('#peso_edad_f25').modal('show');
}

function pesoedad_f02() {
    $('#peso_edad_f024').modal('show');
}

function percint_f() {
    $('#per_cint519f').modal('show');
}

function presion_f() {
    $('#presion_f').modal('show');
}

function eval_dent() {
    $('#eval_dent').modal('show');
}

function perimetro() {
    $('#perimetro').modal('show');
}

function adams() {
    $('#adams').modal('show');
}




function prev_acc() {
    $('#modal_prev_acc').modal('show');
}

function calcular_imc() {
    $('#modal_calcimc').modal('show');
}

function ipostparto() {
    $('#modal_iposparto').modal('show');
}

function ilactan() {
    $('#modal_ilactancia').modal('show');
}

function tlactan() {
    $('#modal_tlactancia').modal('show');
}

function test_edimburgo() {
    $('#modal_edimburgo').modal('show');
}

function apgar() {
    $('#apgar_modal').modal('show');
}

function imc519() {
    $('#imc_519v').modal('show');
}

function imc_519f() {
    $('#imc_519f').modal('show');
}

function inst_eval() {
    $('#instrum').modal('show');
}




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

/** Antecedentes del parto infante**/
function ant_parto() {
    $('#neonat_modal').modal('show');
}
/** Antecedentes del parto infante**/
function cal_apgar() {
    $('#apgar_modal').modal('show');
}

/** sufrimiento fetal **/
function showcontentsuffet() {
    element = document.getElementById("contentsuffet");
    check = document.getElementById("chksuffet");
    if (check.checked) {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}

/** Exámenes hormonales **/
function hormonas() {
    $('#hormona_modal').modal('show');
}


/** interconsultas **/
function inter() {
    $('#modal_interconsulta').modal('show');
}

/** carne vacuna**/
function carnet_vac() {
    $('#carnet_vac_modal').modal('show');
}

/** OTRAS VACUNAS **/
function otras_vac() {
    $('#otras_vac_modal').modal('show');
}

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
    $('#eco_obst_modal').modal('show');
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
$(document).ready(function() {
    $('#menarquia_gt').DataTable({
        responsive: true,
    });
});

/** Ciclo menstrual **/
$(document).ready(function() {
    $('#ciclo_menstrual_gt').DataTable({
        responsive: true,
    });
});

/** Modal método anticonceptivo
    /** Hormonales **/
$(document).ready(function() {
    $('#hormonales_gt').DataTable({
        responsive: true,
    });
});

/** Mecánicos **/
$(document).ready(function() {
    $('#mecanicos_gt').DataTable({
        responsive: true,
    });
});

/** Modal antecedentes de embarazo y puerperio**/
$(document).ready(function() {
    $('#embarazo_gt').DataTable({
        responsive: true,
    });
});

/** Modal antecedentes mamas**/
$(document).ready(function() {
    $('#ant_mamas_gt').DataTable({
        responsive: true,
    });
});

/** Modal antecedentes hormonales**/
$(document).ready(function() {
    $('#ant_hormonales_gt').DataTable({
        responsive: true,
    });
});

/** Modal Tunner**/
$(document).ready(function() {
    $('#ev_tunner_gt').DataTable({
        responsive: true,
    });
});

/** Modal riesgo embarazo**/
/** Antecedentes progenitores**/
$(document).ready(function() {
    $('#ant_prog_gt').DataTable({
        responsive: true,
    });
});

/** Antecedentes factores de riesgo actual**/
$(document).ready(function() {
    $('#riesg_act_gt').DataTable({
        responsive: true,
    });
});

/** Antecedentes partos anteriores**/
$(document).ready(function() {
    $('#partos_ant_gt').DataTable({
        responsive: true,
    });
});



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

/** datos recien nacido **/
$('#signos_vitales_ped').click(function() {
    $('#form_3_ped').toggle();
});
/** apgar **/
$('#apgar').click(function() {
    $('#form_2_ped').toggle();
});
/** id recien nacido **/
$('#datos_rn').click(function() {
    $('#form_1_rn').toggle();
});
/** examen fisico rn **/
$('#ex_fis_rn').click(function() {
    $('#form_3_rn').toggle();
});

/** respiracion rn **/
$('#resp_rn').click(function() {
    $('#form_4_rn').toggle();
});

/** neurológico rn **/
$('#neurol_rn').click(function() {
    $('#form_5_rn').toggle();
});

/** referido a rn **/
$('#referencia_rn').click(function() {
    $('#form_7_rn').toggle();
});

/** edad gestacional rn **/
$('#eg_rn').click(function() {
    $('#form_6_rn').toggle();
});

/** Autorizacion menor de edad para vacunación **/
$('#vac_menor').click(function() {
    $('#formulario_vac').toggle();
});
/** Controles de crecimiento y desarrollo **/
/** Datos recien nacido **/
$('#btn_recien_nacido').click(function() {
    $('#recien_nacido').toggle();
});

/** Datos recien nacido **/
$('#btn_vac_part_puerp').click(function() {
    $('#vac_part_puerp').toggle();
});

/** Datos recien nacido **/
$('#btn_extamiz').click(function() {
    $('#extamiz').toggle();
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

/** Modal desarrollo tunner **/
$('#grado_tunner_ped_m').click(function() {
    $('#form_11_ped').toggle();
});
$('#grado_tunner_ped_f').click(function() {
    $('#form_12_ped').toggle();
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
