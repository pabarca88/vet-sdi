
/*-Tablas Administrador-*/
$(document).ready(function () {
    $('#tabla_administradores_sdi').DataTable({
        responsive: true,
    });
});
$(document).ready(function () {
    $('#tabla_profesionalesT').DataTable({
        responsive: true,
    });
});
$(document).ready(function () {
    $('#tabla_adm_comerciales').DataTable({
        responsive: true,
    });
});
$(document).ready(function () {
    $('#tabla_personal_adm').DataTable({
        responsive: true,
    });
});
$(document).ready(function () {
    $('#tabla_personal_apoyo').DataTable({
        responsive: true,
    });
});
$(document).ready(function () {
    $('#tabla_profesionales_Inscritos').DataTable({
        responsive: true,
    });
});

/*-funciones Administrador-*/
/*-cargos -*/

function descripCargoP() {
    $('#desc_cargoP').modal('show');
}
function descripCargoMT() {
    $('#desc_cargoMT').modal('show');
}
function descripCargoAC() {
    $('#desc_cargoAC').modal('show');
}
function desc_cargoPersAdm() {
    $('#desc_cargoPersAdm').modal('show');
}
function desc_cargoPersApoyo() {
    $('#desc_cargoPersApoyo').modal('show');
}

/*-autorización de roles -*/

function Aut_rolesAG() {
    $('#rol_permisos_adm_gen').modal('show');
}
/*-cabiar estado -*/

function CambiarEst() {
    $('#CambiarEstado').modal('show');
}

/*-contactos -*/

function Contactoadm() {
    $('#contactoadm').modal('show');
}
function Contactoprof() {
    $('#contacto_prof').modal('show');
}
function ContactoAC() {
    $('#contactoadmAC').modal('show');
}
function ContactoPersAdm() {
    $('#contacto_persAdm').modal('show');
}

/*-autorización de menu -*/

function Aut_menuAG() {

    $('#rol_menu_adm_gen').modal('show');
}
/*-asociar/desasociar usuarios -*/

function desasociar() {
    $('#eliminar').modal('show');
}
function asociarAdm() {
    $('#asociar_administ').modal('show');
}
function asociarAdmC() {
    $('#asociar_administC').modal('show');
}
function asociarmedturno() {
    $('#asociar_profesionalT').modal('show');
}
function asociarPersAdm() {
    $('#asociar_profesionalT').modal('show');
}
function asociarPersApoyo() {
    $('#asociar_pers_Apoyo').modal('show');
}

/*-registar usuarios -*/

function registroNuevoAdmr() {
    $('#registrar_administrador').modal('show');
}
function registroNuevoAdmrC() {
    $('#registrar_administradorC').modal('show');
}
function registroNuevoMt() {
    $('#registrar_profesional').modal('show');
}
function registroNuevoPerAp() {
    $('#registrar_pers_adm').modal('show');
}
function registroNuevoPAdm() {
    $('#registrar_persApoyo').modal('show');
}





