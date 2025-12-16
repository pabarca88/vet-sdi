<div id="registrar_mutcajas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_mutcajas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar Mutualidades y Cajas</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut Empresa </label>
                                <input type="text" class="form-control form-control-sm" name="rut_emp" id="rut_emp">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Mes a Pagar</label>
                                <select class="form-control form-control-sm" name="mes_pago" id="mes_pago">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha de Pago</label>
                                <input class="form-control form-control-sm" name="f_pago" id="f_pago" type="date" >
                            </div>
                        </div>
                    </div>
                    <div  class="modal-header">
                        <h5 class="modal-title text-black text-center">Mutualidades </h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group fill">
                               <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Mutuales</label>
                                    <select class="form-control form-control-sm" id="mutuales">
                                        <option value="0">Seleccione  opci&oacute;n</option>
                                        <option value="AL">Asoc Chilena Seguridad</option>
                                        <option value="LA">Mutual de Seguridad</option>
                                        <option value="VA">IST</option>
                                        <option value="VA">Otras</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">N&deg; Trabajadores</label>
                                <input class="form-control form-control-sm" name="n_trabajadores_mutuales" id="n_trabajadores_mutuales" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Porcentaje</label>
                                <input class="form-control form-control-sm" name="porcentaje_mutuales" id="porcentaje_mutuales" type="text">
                            </div>
                        </div>
                    </div>
                    <div  class="modal-header">
                        <h5 class="modal-title text-black text-center">Cajas de Compensaci&oacuten </h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                           <div class="form-group fill">
                                 <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Cajas</label>
                                    <select class="form-control form-control-sm" id="caja_compensacion">
                                        <option value="0">Seleccione  opci&oacute;n</option>
                                        <option value="AL">Los Heroes</option>
                                        <option value="LA">Chilena Consolidada</option>
                                        <option value="VA">etc</option>
                                        <option value="VA">Otras</option>
                                    </select>
                                 </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">N&deg; Trabajadores</label>
                                <input class="form-control form-control-sm" name="n_trabajadores_caja_compensacion" id="n_trabajadores_caja_compensacion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Porcentaje</label>
                                <input class="form-control form-control-sm" name="porcentaje_caja_compensacion" id="porcentaje_caja_compensacion" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Pago de Prestamos y Otros</label>
                                <input class="form-control form-control-sm" name="pago_otros" id="pago_otros" type="number" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Informar Pago al Director por correo electr&oacute;nico</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" onclick="registrar_multicaja()">Registrar </button>
            </div>
        </div>
    </div>
</div>

<script>
    function registrar_multicaja(){
        let rut_empresa = $('#rut_emp').val();
        let mes_pago = $('#mes_pago').val();
        let fecha_pago = $('#f_pago').val();

        // MUTUALES
        let mutual = $('#mutuales').val();
        let n_trabajadores_mutuales = $('#n_trabajadores_mutuales').val();
        let porcentaje_mutual = $('#porcentaje_mutuales').val();

        // CAJAS DE COMPENSACION
        let caja_compensacion = $('#caja_compensacion').val();
        let n_trabajadores_caja_compensacion = $('#n_trabajadores_caja_compensacion').val();
        let porcentaje_caja_compensacion = $('#porcentaje_caja_compensacion').val();

        // OTROS
        let pago_otros = $('#pago_otros').val();

        // AVISO POR CORREO
        let correo = $('#correo-1').val();

        let valido = 1;
        let mensaje = "";

        if(rut_empresa == ''){
            valido = 0;
            mensaje += "<li>Campo requerido Rut Empresa </li>";
        }
        if(mes_pago == 0 || fecha_pago == ''){
            valido = 0;
            mensaje += "<li>Campo requerido Fecha ó Mes Pago </li>";
        }

        if(mutual != 0){
            let n_trabajadores_mutuales = $('#n_trabajadores_mutuales').val();
            let porcentaje_mutuales = $('#porcentaje_mutuales').val();
            if(n_trabajadores_mutuales == '' || n_trabajadores_mutuales == 0 || n_trabajadores_mutuales < 0){
                valido = 0;
                mensaje += "<li>Campo requerido N° Trabajadores Mutual </li>";
            }
            if(porcentaje_mutuales == '' || porcentaje_mutuales == 0){
                valido = 0;
                mensaje += "<li>Campo requerido Porcentaje Mutual </li>";
            }
        }

        if(caja_compensacion != 0){
            let n_trabajadores_caja_compensacion = $('#n_trabajadores_caja_compensacion').val();
            let porcentaje_caja_compensacion = $('#porcentaje_caja_compensacion').val();
            if(n_trabajadores_caja_compensacion == '' || n_trabajadores_caja_compensacion == 0 || n_trabajadores_caja_compensacion < 0){
                valido = 0;
                mensaje += "<li>Campo requerido N° Trabajadores Caja de compensación </li>";
            }
            if(porcentaje_caja_compensacion == '' || porcentaje_caja_compensacion == 0){
                valido = 0;
                mensaje += "<li>Campo requerido Porcentaje Caj de compensación </li>";
            }
        }

        if(valido == 0){
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        let data = {
            rut_empresa: rut_empresa,
            mes_pago: mes_pago,
            fecha_pago: fecha_pago,
            mutual: mutual,
            n_trabajadores_mutuales: n_trabajadores_mutuales,
            porcentaje_mutual: porcentaje_mutual,
            caja_compensacion: caja_compensacion,
            n_trabajadores_caja_compensacion: n_trabajadores_caja_compensacion,
            porcentaje_caja_compensacion: porcentaje_caja_compensacion,
            pago_otros:pago_otros,
            _token: CSRF_TOKEN,
        }

        let url = "{{ ROUTE('adm_cm.registrar_multicaja') }}";

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }
</script>
