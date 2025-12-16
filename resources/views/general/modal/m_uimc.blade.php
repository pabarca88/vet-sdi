<div id="modal_calcimc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_calcimc" aria-hidden="true">
	<div class=" modal-dialog modal modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white" id="modal_IMCLabel"><strong> Calculadora de IMC</strong></h5>
				<button type="button" class="close"  data-dismiss="modal" aria-label="Close" onclick="cerrarimc();"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-4 col-md-4">
                        <label class=" text-c-blue f-18 col-form-label">
                            <strong>Altura (cm)</strong>
                        </label>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        <input class="form-control" id="height" type="number">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-4 col-md-4">
                        <label class=" text-c-blue f-18 col-form-label">
                            <strong>Peso (kg)</strong>
                        </label>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        <input class="form-control" id="weight" type="number">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <button type="button" class="buttonimc btn btn-block btn-primary" onclick="calcularimc();">Calcular</button>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-4 col-md-4">
                        <label class=" text-c-blue f-18 col-form-label">
                            <strong>IMC</strong>
                        </label>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        <input disabled class="form-control" style="color:red; font-size: 16px;" id="resultado" type="number">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                    <h3 id="text_area"></h3>
                </div>
            </div>
        </div>
    </div>
</div>



<script>



    function imc() {
        $('#modal_calcimc').modal('show');
    }

  

    function calcularimc() {
        var height = document.getElementById("height").value / 100;
        var weight = document.getElementById("weight").value;


        var imc = Math.round(weight / (height ** 2));
        var text=""
        if (imc < 16) {
            text="Paciente con bajo peso severo"}
        else if (imc < 17) {
            text="Paciente con bajo peso moderado"}
        else if (imc < 19) {
            text="Paciente con bajo peso leve"}
        else if (imc < 24.9) {
            text="Paciente con peso normal"}
        else if (imc < 29.9) {
            text="Paciente con  sobrepeso debe bajar de peso"}
        else if (imc < 34.9) {
            text="Paciente con obesidad leve"}
        else if (imc < 39.9) {
            text="Paciente con obesidad media"}
        else if (imc > 39.9) {
             text="Paciente con obesidad morbida"}

        document.getElementById("text_area").innerText=text
        document.getElementById('resultado').value = imc;
    }
</script>

