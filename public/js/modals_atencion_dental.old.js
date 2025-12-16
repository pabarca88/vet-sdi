5/* Formularios generales */
/* Formulario certificado de reposo */
$('#formularios_atencion').on('click', ".accion_modal_certificado_reposo", function () {
	console.log("abrir modal accion_modal_certificado_reposo");
	$('#modal_certificado_reposo').modal();
});

/* Formulario de interconsulta */
$('#formularios_atencion').on('click', ".accion_modal_interconsulta", function () {
	console.log("abrir modal accion_modal_interconsulta");
	$('#modal_interconsulta').modal();
});

/* Formulario de informe médico */
$('#formularios_atencion').on('click', ".accion_modal_inf_medico", function () {
	console.log("abrir modal accion_modal_inf_medico");
	$('#modal_inf_medico').modal();
});

/* Formulario de uso personal */
$('#formularios_atencion').on('click', ".accion_modal_uso_personal", function () {
	console.log("abrir modal accion_modal_uso_personal");
	$('#modal_uso_personal').modal();
});

/* Formularios de notificacion */
/* Constancia GES */
$('#formularios_atencion').on('click', ".accion_modal_constancia_ges", function () {
	console.log("abrir modal accion_modal_constancia_ges");
	$('#modal_constancia_ges').modal();
});
/* Enfermedades enfermedades_declaracion obligatoria */
$('#formularios_atencion').on('click', ".accion_modal_enfermedades_declaracion_obligatoria", function () {
	console.log("abrir modal accion_modal_enfermedades_declaracion_obligatoria");
	$('#modal_enfermedades_declaracion_obligatoria').modal();
});
/* Reembolso Médico */
$('#formularios_atencion').on('click', ".accion_modal_reembolso_medico", function () {
	console.log("abrir modal accion_modal_reembolso_medico");
	$('#modal_reembolso_medico').modal();
});
/* Reembolso dentales */
$('#formularios_atencion').on('click', ".accion_modal_reembolso_dental", function () {
	console.log("abrir modal accion_modal_reembolso_dental");
	$('#modal_reembolso_dental').modal();
});

/* Consentimientos informados */
/* Anestesia */
$('#formularios_dentales').on('click', ".accion_modal_anestesia", function () {
	console.log("abrir modal accion_modal_anestesia");
	$('#modal_anestesia').modal();
});
/* consentimiento */
$('#formularios_dentales').on('click', ".accion_m_aconsentcir", function () {
	console.log("abrir modal accion_m_aconsentcir");
	$('#m_aconsentcir').modal();
});
$('#formularios_dentales').on('click', ".accion_m_aconsentcirm", function () {
	console.log("abrir modal accion_m_aconsentcirm");
	$('#m_aconsentcirm').modal();
});
/* Ordenes de Trabajo */
/* orden trabajo menor */
$('#formularios_dentales').on('click', ".accion_modal_orden_trabajo", function () {
	console.log("abrir modal accion_modal_orden_trabajo");
	$('#modal_orden_trabajo').modal();
});
/* orden trabajo etiquetado y control */
$('#formularios_dentales').on('click', ".accion_modal_control_trabajo", function () {
	console.log("abrir modal accion_modal_control_trabajo");
	$('#modal_control_trabajo').modal();
});
/* orden trabajo mayor */
$('#formularios_dentales').on('click', ".accion_modal_orden_trabajoM", function () {
	console.log("abrir modal accion_modal_orden_trabajoM");
	$('#modal_orden_trabajoM').modal();
});
/* Pedido de insumos y materiales */
/* Pedido de insumos */
$('#formularios_dentales').on('click', ".accion_modal_pedido_insumos", function () {
	console.log("abrir modal accion_modal_pedido_insumos");
	$('#modal_pedido_insumos').modal();
});
/* Pedido de materiales */
$('#formularios_dentales').on('click', ".accion_modal_pedido_materiales", function () {
	console.log("abrir modal accion_modal_pedido_materiales");
	$('#modal_pedido_materiales').modal();
});
/* Pedido de examenes dentales */
/* Pedido de biopsia */
$('#formularios_dentales').on('click', ".accion_modal_examenbiopsia", function () {
	console.log("abrir modal accion_modal_examenbiopsia");
	$('#modal_examenbiopsia').modal();
});
/* Pedido de radiografias */
$('#formularios_dentales').on('click', ".accion_modal_examenradiologico", function () {
	console.log("abrir modal accion_modal_examenradiologico");
	$('#modal_examenradiologico').modal();
});
$('#form_derperi').on('click', ".accion_modal_interconsulta_period", function () {
	console.log("abrir modal accion_modal_interconsulta_period");
	$('#modal_interconsulta_period').modal();
});
/* Gastos materiales en consulta */
$('#formularios_dentales').on('click', ".accion_modal_gastosmaterial_gen", function () {
	console.log("abrir modal .accion_modal_gastosmaterial_gen");
	$('#modal_gastosmaterial_gen').modal();
});



$('#formularios_atencion').on('click', ".accion_modal_cid", function () {
	console.log("abrir modal accion_modal_cid");
	$('#modal_cid').modal();
});




/* Modal pagos responsable*/
function respon_pago_dent() {
	$('#m_resp_pagodental').modal('show');
}

/* Modal evaluación adulto*/
/* Maxilar superior*/
function maxilar_superior() {
	$('#tratamiento_maxilar_superior').modal('show');
}

/* Maxilar superior*/
function maxilar_inferior() {
	$('#tratamiento_maxilar_inferior').modal('show');
}
/* Boca completa*/
function boca_completa() {
	$('#tratamiento_boca_completa').modal('show');
}

/* Modal evaluación pediatrica*/
/* Maxilar superior*/
function maxilar_superior_inf() {
	$('#tratamiento_maxilar_superiorinf').modal('show');
}

/* Maxilar superior*/
function maxilar_inferior_inf() {
	$('#tratamiento_maxilar_inferiorinf').modal('show');
}
/* Boca completa*/
function boca_completa_inf() {
	$('#tratamiento_boca_completainf').modal('show');
}
/* Indicar medicamento y examen*/
function i_examen() {
	$('#indicar_examen').modal('show');
}
/* derivacion a tratamiento */

function d_deriv_tto() {
	$('#derivacion_a_tratamiento').modal('show');
}
/* Periodontograma */

function d_periodoncista() {
	$('#modal_interconsulta_period').modal('show');
}
function d_periodoncista1() {
	$('#modal_inter_periodoncista').modal('show');
}
/* Presupuesto */
function presupuesto() {
	$('#modal_presupuesto').modal('show');
}

/* Presupuesto Ortodoncia */
function presupuesto_orto() {
	$('#modal_presup_ortodoncico').modal('show');

}
/* Odontograma */
function info_odontograma() {
	$('#modal_odontograma').modal('show');
}
/* info antecedentes*/
function abrir_modal_anestesia() {

	$('#form_antecedente_anestesia').trigger("reset");
	$('#procedimiento_anestesia_ficha_atencion').val('');
	$('#lugar_anestesia_ficha_atencion').val('');
	$('#rut_anestesia_ficha_atencion').val('');
	$('#tratamiento_anestesia_ficha_atencion').val('');
	$('#modal_anestesia').modal('show');
}
function abrir_modal_hemorragia() {

	$('#form_antecedente_hemorragia').trigger("reset");
	$('#procedimiento_hemorragia_ficha_atencion').val('');
	$('#lugar_hemorragia_ficha_atencion').val('');
	$('#rut_hemorragia_ficha_atencion').val('');
	$('#tratamiento_hemorragia_ficha_atencion').val('');
	$('#modal_hemorragia').modal('show');
}
function abrir_modal_fractura() {

	$('#form_antecedente_fractura').trigger("reset");
	$('#procedimiento_fractura_ficha_atencion').val('');
	$('#lugar_fractura_ficha_atencion').val('');
	$('#rut_fractura_ficha_atencion').val('');
	$('#tratamiento_fractura_ficha_atencion').val('');
	$('#modal_fractura').modal('show');
}

/* agregar proveedores*/
function agregar_proveedor() {
	$('#agregar_proveedor').modal('show');
}

function editar_proveedor() {
	$('#editar_proveedor').modal('show');
}

function productos_proveedor() {
	$('#productos_proveedor').modal('show');
}
