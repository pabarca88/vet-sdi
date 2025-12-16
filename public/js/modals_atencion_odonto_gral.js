/* orden trabajo menor */
$('#formularios_odontologia').on('click', ".accion_modal_orden_trabajo", function () {
    console.log("abrir modal accion_modal_orden_trabajo");
    $('#modal_orden_trabajo').modal();
    });

    /* orden trabajo mayor */
$('#formularios_odontologia').on('click', ".accion_modal_orden_trabajoM", function () {
    console.log("abrir modal accion_modal_orden_trabajo Mayor");
    $('#modal_orden_trabajoM').modal();
    });

    /* INSUMOS */
    $('#formularios_odontologia').on('click', ".accion_modal_pedido_insumos", function () {
    console.log("abrir modal accion_modal_insumos");
    $('#modal_pedido_insumos').modal();
    }
    );

    /* Pedido de insumos y materiales */
    /* Pedido de insumos */
    $('#formularios_odontologia').on('click', ".accion_modal_pedido_insumos", function () {
        console.log("abrir modal accion_modal_pedido_insumos");
        $('#modal_pedido_insumos').modal();
        });
        /* Pedido de materiales */
        $('#formularios_odontologia').on('click', ".accion_modal_pedido_materiales", function () {
            console.log("abrir modal accion_modal_pedido_materiales");
        $('#modal_pedido_materiales').modal();
    });

