<div id="modal_calcimc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_calcimc" aria-hidden="true">
	<div class=" modal-dialog modal modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white" id="modal_IMCLabel"><strong>Calculadora de índice de masa corporal (IMC) </strong></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-row">
						<!--Los checks hay que programarlos, se agregaron porque faltaba el sexo en la calculadora de IMC-->
						<div class="form-group col-sm-6 text-left">
							<label class="font-weight-bolder">Sexo</label>
						</div>
						<div class="form-group col-sm-6">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
								<label class="form-check-label" for="inlineRadio1">Masculino</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
								<label class="form-check-label" for="inlineRadio2">Femenino</label>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-sm-6 text-left">
							<label class="font-weight-bolder">Ingrese el peso en Kg.</label>
						</div>
						<div class="form-group col-sm-6">
							<input class="form-control form-control-sm" type="number" placeholder=" Ingrese el peso en Kg." name="peso" id="peso">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-sm-6 text-left">
							<label class="font-weight-bolder">Ingrese talla en Cms.</label>
						</div>
						<div class="col-sm-6 text-center">
							<input class="form-control form-control-sm" type="number" placeholder="Ingrese el talla en cms." name="altura" id="altura">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-sm-12">
							<button type="button" class="btn btn-warning btn-block btn-sm" onclick="calculaIMC()">Calcular IMC</button>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-sm-6 text-left">
							<label class="font-weight-bolder">Resultado de IMC</label>
						</div>
						<div class="col-sm-6 text-center">
							<input class="form-control form-control-sm" type="text" name="imc" id="imc">
						</div>
					</div>
					<div class="form-group row my-2">
						<div class="col-sm-12 ">
							<label class="font-weight-bolder">Recomendación</label>
						</div>
						<div class="col-sm-12 ">
							<input type="text" class="form-control" name="leyenda" id="leyenda" size="50" maxlength="140" aria-multiline="True" contenteditable="true" style="background-color: #FFFFFF;text-align:center;color:red">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">

		function calculaIMC() {

			var peso, altura, imc, leyenda;

			const peso =parseFloat( document.getElementById("peso").value);
            const altura =parseFloat( document.getElementById("altura").value);
			altura = document.getElementById("altura").value / 100;

			const imc = peso / (altura * altura);

			document.getElementById("imc").value = imc.toFixed(1);

			if (imc <= 20.5) {

				leyenda = "Está delgado. debe engordar " + (altura * altura * 20.5 - peso).toFixed(1) + " kilos";
			}
			else if (imc >= 25.5) {

				leyenda = "Tiene sobrepeso. debe adelgazar " + (peso - altura * altura * 25.5).toFixed(1) + " kilos";
			}
			else {
				leyenda = "Esta en  peso ideal";
			}

			document.getElementById("leyenda").value = leyenda;
		}
	</script>
</div>
