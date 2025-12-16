<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    require_once('../include/head.php');
    ?>
</head>
<style type="text/css">
	.auth-wrapper{
	background-size: cover;
	background-image: url(../assets/images/background_5.jpg);
	background-position: center center;
	background-repeat: no-repeat;
	background-attachment: fixed;
	}
</style>
<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <!--Ingreso a profesional no inscrito-->
            <div class="card">
                <div class="card-body">
                	<div class="row">
	            		<div class="col-sm-12 text-center">
                            <img src="{{ asset('images/iconos/candado.svg') }}" alt="" class="img-fluid mb-4 wid-50">
		                    <p style="font-size: 14px;" class="f-w-400 mb-3">¿Dónde desea recibir sus códigos de seguridad?</p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 mb-3">
							<div class="form-check">
								  <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio1" value="option1">
								  <label class="form-check-label" for="inlineRadio1">SMS</label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
								  <label class="form-check-label" for="inlineRadio2">WhatsApp</label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
								  <label class="form-check-label" for="inlineRadio2">Email</label>
							</div>
						</div>
					</div>
					<div class="row">
	            		<div class="col-sm-12">
							<button class="btn btn-block btn-info mb-2">
							Enviar Códigos de Seguridad
							</button>
							<p class="mb-2 text-muted text-center">Recibí mis códigos de seguridad,<br> quiero <a href="acceso_profesional_no_inscrito.php" class="f-w-400"> acceder a atención de profesional no inscrito</a></p>
		                </div>
		            </div>
                </div>
            </div>
           <!-- Cierre: Ingreso a profesional no inscrito-->
        </div>
    </div>

    <?php
    require_once('../include/nocomplatible.php');
    ?>

    <script src="../assets/js/vendor-all.min.js"></script>
    <script src="../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../assets/js/ripple.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>
</body>

</html>
