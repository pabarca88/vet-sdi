
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revocación Enviada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="max-width: 600px; margin: 40px auto;">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark text-center">
            <h4 class="mb-0">Solicitud de Revocación Enviada</h4>
        </div>
        <div class="card-body text-center">
            <img src="https://cdn-icons-png.flaticon.com/512/463/463612.png" alt="Revocación" style="width: 80px; margin-bottom: 20px;">
            <p class="fs-5 mb-3">Has solicitado revocar tu consentimiento informado.</p>
            <p class="fs-5 mb-3">Para confirmar la revocación, haz clic en el siguiente botón y completa el proceso de confirmación.</p>
            <a href="{{ route('consentimiento.revocar.form', [
                        'token' => $detalle['body']['token'] ?? '',
                        'id_consentimiento' => $detalle['body']['id_consentimiento'] ?? '',
                        ]) }}"
               style="display:inline-block; background:#ff9800; color:#fff; font-size:16px; font-weight:600; border-radius:6px; padding:10px 24px; text-decoration:none; margin-top:20px;"
               target="_blank">
               Confirmar Revocación
            </a>
        </div>
    </div>
</div>
</body>
</html>
