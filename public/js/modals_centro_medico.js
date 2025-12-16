/*-Modals personal-*/

/*-Modals profesional de la salud-*/
function registrar_profesional() {
    $('#registrar_profesional_cm').modal('show');
}

function editar_datos_profesional() {
    $('#editar_profesional_cm').modal('show');
}



function asociar_profesional() {
    $('#agregar_profesional_btn_buscar_rut').removeAttr('disabled');
    $('#div_agregar_profesional_busqueda').show();
    $('#div_agregar_profesional_ver_info_prof').hide();
    $('#div_agregar_profesional_formulario_nuevo_prof').hide();
    $('#asociar_profesional_cm').modal('show');
}


/*-Modals asistentes-*/



function rol_permisos_asistente() {
    $('#rol_permisos_asistente_cm').modal('show');
}

function asociar_asistente() {
    $('#asociar_asistente_cm').modal('show');
}

/*-Modals personal administrativo-*/
function registrar_administrativo() {
    $('#registrar_administrativo_cm').modal('show');
}

function editar_datos_administrativo() {
    $('#editar_administrativo_cm').modal('show');
}

function rol_permisos_administrativo() {
    $('#rol_permisos_administrativo_cm').modal('show');
}

function asociar_administrativo() {
    $('#asociar_administrativo_cm').modal('show');
}

/*-Modals limpieza mantencion-*/
function registrar_limpieza_mantencion() {
    $('#registrar_limpieza_mantencion_cm').modal('show');
}

function editar_datos_limpieza_mantencion() {
    $('#editar_limpieza_mantencion_cm').modal('show');
}

function rol_permisos_limpieza_mantencion() {
    $('#rol_permisos_limpieza_mantencion_cm').modal('show');
}

function asociar_limpieza_mantencion() {
    $('#asociar_limpieza_mantencion_cm').modal('show');
}

/*-Modals insumos-*/
function agregar_producto() {
    $('#agregar_producto_cm').modal('show');
}

function quitar_producto() {
    $('#quitar_producto_cm').modal('show');
}

function editar_producto() {
    $('#editar_producto_cm').modal('show');
}

/*-Gastos-*/
function agregar_gasto() {
    $('#agregar_gasto_cm').modal('show');
}


/*-Proveedores-*/
function agregar_proveedor() {
    $('#agregar_proveedor_cm').modal('show');
}

function editar_proveedor(id) {
    let url = "/getProveedor/" + id;
    $.get(url, function (data) {
        let proveedor = data;
        // json_decode(data);
        proveedor = JSON.parse(proveedor);
        console.log(proveedor);
        $('#id_proveedor').val(proveedor.id)
        // agregar el atributo action al formulario de editar proveedor con la ruta post para editar proveedor
        $('#editar_proveedor_cm form').attr('action', '/editarProveedor');
        // agregar method post
        $('#editar_proveedor_cm form').attr('method', 'post');
        
        $('#editar_proveedor_cm').modal('show');
        $('#editar_proveedor_cm #nombre').val(proveedor.nombre);
        $('#editar_proveedor_cm #prov_prod_').val(proveedor.id_tipo_producto);
        $('#editar_proveedor_cm #rut').val(proveedor.rut);
        $('#editar_proveedor_cm #rol_').val(proveedor.rol_tributario);
        $('#editar_proveedor_cm #direccion').val(proveedor.direccion);
        $('#editar_proveedor_cm #numero').val(proveedor.numero);
        $('#editar_proveedor_cm #telefono').val(proveedor.telefono);
        $('#editar_proveedor_cm #email').val(proveedor.email);
        $('#editar_proveedor_cm #region_editar').val(proveedor.id_region);
        // lo que se cumpla la funcion buscar_ciudad_editar asignar el valor de id_comuna a comunas_editar
        buscar_ciudad_editar().then(()=>{
            $('#comunas_editar').val(proveedor.id_comuna);
        }).catch((error)=>{
            console.error(error);
        });
    });
}
