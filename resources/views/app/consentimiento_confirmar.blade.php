<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Consentimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="max-width: 500px; margin: 40px auto;">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Confirmar Consentimiento
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('consentimiento.confirmar') }}">
                @csrf
                <input type="hidden" name="id_consentimiento" value="{{ request('id_consentimiento') }}">
                <input type="hidden" name="id_ficha_atencion" value="{{ request('id_ficha_atencion') }}">
                <input type="hidden" name="id_paciente" value="{{ request('id_paciente') }}">
                <input type="hidden" name="id_profesional" value="{{ request('id_profesional') }}">
                <div class="mb-3">
                    <label for="numero_carnet" class="form-label">Número de Carnet</label>
                    <input type="text" class="form-control" id="numero_carnet" name="numero_carnet" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="acepta_consentimiento" name="acepta_consentimiento" value="1" required>
                    <label class="form-check-label" for="acepta_consentimiento">Acepto el consentimiento informado</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Registrar</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
