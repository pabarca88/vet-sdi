<div id="modal_codfonasa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_codfonasa" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Buscador de código FONASA</h5>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close"  onclick="cerrarfonasa();"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <!--Búsqueda por código-->
                <form>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 mb-2">
                            <h5>Búsqueda por código<h5>
                        </div>
                        <div class="input-group col-sm-12 col-md-12 mb-3">
                            <input type="number" class="form-control form-control-sm" placeholder="Ingresar código" name="modal_codfonasa_codigo" id="modal_codfonasa_codigo">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-sm" type="button" id="button-addon2" onclick="buscar_por_codigo();">Buscar</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 mb-2">
                            <h6>Resultado de la búsqueda<h6>
                        </div>
                        <div class="col-sm-12 col-md-12" name="modal_codfonasa_mensaje_codigo" id="modal_codfonasa_mensaje_codigo">
                            <div class="alert alert-info" role="alert">
                                Ingrese valor para realizar la busqueda
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <!--Búsqueda por nombre-->
                <form>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 mb-2">
                            <h5 class="text-c-blue">Búsqueda por nombre<h5>
                        </div>
                        <div class="input-group col-sm-12 col-md-12 mb-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Ingresar nombre" name="modal_codfonasa_nombre" id="modal_codfonasa_nombre">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-sm" type="button" id="button-addon2" onclick="buscar_por_nombre();">Buscar</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 mb-2">
                            <h6>Resultado de la búsqueda<h6>
                        </div>
                        <div class="col-sm-12 col-md-12" name="modal_codfonasa_mensaje_nombre" id="modal_codfonasa_mensaje_nombre">
                            <div class="alert alert-info" role="alert">
                                Ingrese valor para realizar la busqueda
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    /*CIERRE MODALS*/
    function cerrarfonasa()
    {
        $('#modal_codfonasa').modal('show');
    }
    function cerrarimc() {
        $('#modal_codfonasa').modal ('hide');
      }
      /*CIERRE: CIERRE MODALS*/

    function ufonasa (){
        $('#modal_codfonasa').modal('show');
    }

    function buscar_por_codigo()
    {
        $('#modal_codfonasa_mensaje_codigo').html('');
        let url = "{{ route('fonasa.buscar.por.codigo') }}";
        var valor = $('#modal_codfonasa_codigo').val();
        if(valor != '')
        {
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    valor:valor
                },
                success: (resp)=>{
                    if(resp.estado==1)
                    {
                        var texto = '';
                        if(resp.cantidad>0)
                        {
                            $.each(resp.registros, function (key, value) {
                                texto += '<strong>'+value.codigo+'</strong> - '+value.nombre+'<br>';
                            });
                            $('#modal_codfonasa_mensaje_codigo').html('<div class="alert alert-success" role="alert">'+texto+'</div>');
                        }
                        else
                        {
                            $('#modal_codfonasa_mensaje_codigo').html('<div class="alert alert-danger" role="alert">No se han encontrado resultados de tu búsqueda</div>');
                        }
                    }
                    else
                    {
                        $('#modal_codfonasa_mensaje_codigo').html('<div class="alert alert-danger" role="alert">No se han encontrado resultados de tu búsqueda</div>');
                    }
                },
                error: (resp)=>{
                    console.warn(resp);
                }
            });
        }
        else
        {
            $('#modal_codfonasa_mensaje_codigo').html('<div class="alert alert-danger" role="alert">No ha ingresado valor para realizar la busqueda, intente nuevamente</div>');
        }
    }

    function buscar_por_nombre()
    {
        $('#modal_codfonasa_mensaje_nombre').html('');
        let url = "{{ route('fonasa.buscar.por.nombre') }}";
        var valor = $('#modal_codfonasa_nombre').val();
        if(valor != '')
        {
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    valor:valor
                },
                success: (resp)=>{
                    if(resp.estado==1)
                    {
                        var texto = '';
                        if(resp.cantidad>0)
                        {
                            $.each(resp.registros, function (key, value) {
                                texto += '<strong>'+value.codigo+'</strong> - '+value.nombre+'<br>';
                            });
                            $('#modal_codfonasa_mensaje_nombre').html('<div class="alert alert-success" role="alert">'+texto+'</div>');
                        }
                        else
                        {
                            $('#modal_codfonasa_mensaje_nombre').html('<div class="alert alert-danger" role="alert">No se han encontrado resultados de tu búsqueda</div>');
                        }
                    }
                    else
                    {
                        $('#modal_codfonasa_mensaje_nombre').html('<div class="alert alert-danger" role="alert">No se han encontrado resultados de tu búsqueda</div>');
                    }
                },
                error: (resp)=>{
                    console.warn(resp);
                }
            });
        }
        else
        {
            $('#modal_codfonasa_mensaje_nombre').html('<div class="alert alert-danger" role="alert">No ha ingresado valor para realizar la busqueda, intente nuevamente</div>');
        }
    }
</script>
