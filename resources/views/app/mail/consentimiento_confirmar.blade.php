<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Consentimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="max-width: 1100px; margin: 40px auto;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Confirmar Consentimiento</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6" style="border-right:1px solid #e0e0e0;">
                    <div style="max-height: 600px; overflow-y: auto; padding-right: 10px;">
                        {!! $texto_consentimiento ?? '' !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <form method="POST" action="{{ route('consentimiento.confirmar') }}">
                        @csrf
                        <input type="hidden" name="id_consentimiento" value="{{ request('id_consentimiento') }}">
                        <input type="hidden" name="id_ficha_atencion" value="{{ request('id_ficha_atencion') }}">
                        <input type="hidden" name="id_paciente" value="{{ request('id_paciente') }}">
                        <input type="hidden" name="id_profesional" value="{{ request('id_profesional') }}">
                        <input type="hidden" name="token" value="{{ request('token') }}">
                        <div class="mb-3">
                            <label for="numero_carnet" class="form-label">Número de Carnet</label>
                            <input type="text" class="form-control" id="numero_carnet" name="numero_carnet" required>
                        </div>
                        <div class="mb-3">
                            <label for="numero_serie" class="form-label">Número de Serie</label>
                            <input type="text" class="form-control" id="numero_serie" name="numero_serie" required>
                        </div>
                        <div class="form-check mb-4">
                            <input type="checkbox" class="form-check-input" onclick="evaluar_checkbox()" id="acepta_consentimiento" name="acepta_consentimiento" value="1" required>
                            <label class="form-check-label" for="acepta_consentimiento">DECLARO QUE: He leído y acepto el consentimiento informado.</label>
                        </div>
                        <button type="submit" id="btn_autorizar" class="btn btn-primary w-100" disabled>Autorizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#btn_autorizar').prop('disabled', true);
    });
    function evaluar_checkbox() {
        if ($('#acepta_consentimiento').is(':checked')) {
            $('#btn_autorizar').prop('disabled', false);
        } else {
            $('#btn_autorizar').prop('disabled', true);
        }
    }
</script>
</body>
</html>


