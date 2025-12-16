<div id="c_pass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_pass" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
		<div class="modal-content" >
			<div class="modal-header">
				<h5 class="modal-title text-c-blue mt-1">Cambiar contraseña</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<form>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Contraseña actual</label>
                            <input type="password" class="form-control form-control-sm" id="c_pass_contrasena_actual">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Contraseña nueva</label>
                            <input type="password" class="form-control form-control-sm" id="c_pass_password_registro">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Repetir contraseña nueva</label>
                            <input type="password" class="form-control form-control-sm" id="c_pass_password_confirmacion_registro">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    		<button type="button" class="btn btn-info" onclick="actualizar_contrasena();">Guardar</button>
                    	</div>
                    </div>
                </form>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function pass() {
        $('#c_pass').modal('show');
    }

    function actualizar_contrasena()
    {
        var contrasena_actual = $('#c_pass_contrasena_actual').val();
        var password_registro = $('#c_pass_password_registro').val();
        var password_confirmacion_registro = $('#c_pass_password_confirmacion_registro').val();

        // var url = '{{ route('perfil.cambio_contrasena') }}';
        var url = '{{ route('paciente.perfil.contrasena.liberar.bienvenida') }}';

        $.ajax({
            url: url,
            type: "get",
            data: {
                contrasena_actual:contrasena_actual,
                password_registro:password_registro,
                password_confirmacion_registro:password_confirmacion_registro,
            },
            dataType: "json",
        })
        .done(function(data) {
            if (data != '' || data == null)
            {
                if(data.estado == 1)
                {
                    $('#c_pass').modal('hide');

                    swal({
                        title: "Modificacion de contraseña .",
                        text:"Cambio de contraseña Exitosa.\n debe iniciar sesion nuevamente",
                        icon: "success",
                    });

                    setTimeout(function (){
                        // location.href = '{{ route('home.ingreso') }}';
                        location.reload();
                    }, 3000);
                }
                else
                {
                    swal({
                        title: "Modificacion de contraseña .",
                        text:"Falla en actualizacion",
                        icon: "error",
                    });
                }
            }
            else
            {
                swal({
					title: "Modificacion de contraseña .",
					text:"Falla en actualizacion",
					icon: "error",
				});
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }


</script>

