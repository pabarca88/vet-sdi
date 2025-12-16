<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detalle Cotización #{{ $cotizacion->numero }} - Sistema Medichile</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .cotizacion-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .card {
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border-radius: 15px;
            margin-bottom: 20px;
        }

        .card-header {
            border-radius: 15px 15px 0 0 !important;
            border-bottom: none;
            padding: 20px 25px;
        }

        .card-body {
            padding: 25px;
        }

        .info-label {
            font-weight: 600;
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .info-value {
            font-weight: 500;
            color: #2c3e50;
            font-size: 1rem;
        }

        .estado-badge {
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 600;
        }

        .tabla-productos {
            font-size: 0.95rem;
        }

        .tabla-productos th {
            background-color: #f8f9fa;
            font-weight: 600;
            border-top: none;
            padding: 15px 10px;
            color: #495057;
        }

        .tabla-productos td {
            padding: 15px 10px;
            vertical-align: middle;
        }

        .totales-box {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            padding: 25px;
            border-left: 5px solid #007bff;
        }

        .btn-custom {
            border-radius: 25px;
            padding: 10px 25px;
            font-weight: 600;
            margin: 5px;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-print {
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
        }

        .btn-print:hover {
            background: linear-gradient(45deg, #20c997, #28a745);
            color: white;
            transform: translateY(-2px);
        }

        .detalle-producto {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 3px;
        }

        .numero-cotizacion {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .fecha-info {
            opacity: 0.9;
            font-size: 1.1rem;
        }

        .total-final {
            font-size: 2rem;
            font-weight: 700;
            color: #007bff;
        }

        .icono-seccion {
            width: 20px;
            text-align: center;
            margin-right: 10px;
        }

        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background: white !important;
            }

            .card {
                box-shadow: none !important;
                border: 1px solid #dee2e6 !important;
            }

            .cotizacion-header {
                background: #6c757d !important;
                -webkit-print-color-adjust: exact;
            }
        }

        @media (max-width: 768px) {
            .cotizacion-header {
                padding: 20px;
                text-align: center;
            }

            .numero-cotizacion {
                font-size: 2rem;
            }

            .table-responsive {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <!-- Header Principal -->
        <div class="row">
            <div class="col-12">
                <div class="cotizacion-header">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="numero-cotizacion">
                                <i class="fas fa-file-invoice icono-seccion"></i>
                                {{ $cotizacion->numero }}
                            </div>
                            <div class="fecha-info">
                                Generada el {{ \Carbon\Carbon::parse($cotizacion->fecha)->format('d/m/Y') }}
                                - Válida hasta {{ \Carbon\Carbon::parse($cotizacion->valida_hasta)->format('d/m/Y') }}
                            </div>
                        </div>
                        <div class="col-md-4 text-md-end mt-3 mt-md-0">
                            @php
                                $estadoClass = [
                                    'borrador' => 'bg-secondary',
                                    'generada' => 'bg-success',
                                    'enviada' => 'bg-info',
                                    'aceptada' => 'bg-primary',
                                    'rechazada' => 'bg-warning',
                                    'anulada' => 'bg-danger'
                                ];
                            @endphp
                            <span class="badge estado-badge {{ $estadoClass[$cotizacion->estado] ?? 'bg-secondary' }}">
                                {{ ucfirst($cotizacion->estado) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Información del Cliente y Profesional -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-user icono-seccion"></i>
                            Información del Cliente
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <div class="info-label">RUT:</div>
                                <div class="info-value">{{ $cotizacion->cliente_rut ?: 'No especificado' }}</div>
                            </div>
                            <div class="col-sm-8">
                                <div class="info-label">Nombre:</div>
                                <div class="info-value">{{ $cotizacion->cliente_nombre ?: ($cotizacion->paciente->nombre_completo ?? 'No especificado') }}</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="info-label">Teléfono:</div>
                                <div class="info-value">{{ $cotizacion->cliente_telefono ?: 'No especificado' }}</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="info-label">Email:</div>
                                <div class="info-value">{{ $cotizacion->cliente_email ?: 'No especificado' }}</div>
                            </div>
                        </div>
                        @if($cotizacion->forma_pago)
                        <div class="row">
                            <div class="col-12">
                                <div class="info-label">Forma de Pago:</div>
                                <div class="info-value">{{ $cotizacion->forma_pago }}</div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-user-md icono-seccion"></i>
                            Información del Profesional
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="info-label">Profesional:</div>
                                <div class="info-value">
                                    {{ $cotizacion->profesional->nombre ?? 'No especificado' }}
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="info-label">Especialidad:</div>
                                <div class="info-value">
                                    {{ $cotizacion->profesional->especialidad->nombre ?? 'No especificado' }}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="info-label">RUT:</div>
                                <div class="info-value">
                                    {{ $cotizacion->profesional->rut ?? 'No especificado' }}
                                </div>
                            </div>
                        </div>
                        @if($cotizacion->fecha_envio_email)
                        <div class="row">
                            <div class="col-12">
                                <div class="info-label">Enviado por email:</div>
                                <div class="info-value">{{ \Carbon\Carbon::parse($cotizacion->fecha_envio_email)->format('d/m/Y H:i') }}</div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Detalle de Productos -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-box icono-seccion"></i>
                            Productos Cotizados ({{ $cotizacion->detalles->count() }} productos)
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped tabla-productos mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 15%;">Código</th>
                                        <th style="width: 35%;">Producto</th>
                                        <th style="width: 10%;" class="text-center">Cantidad</th>
                                        <th style="width: 12%;" class="text-end">Precio Unit.</th>
                                        <th style="width: 10%;" class="text-center">Descuento</th>
                                        <th style="width: 13%;" class="text-end">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cotizacion->detalles as $index => $detalle)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>
                                            <strong>{{ $detalle->producto_codigo }}</strong>
                                            @if($detalle->producto && $detalle->producto->numero_serie)
                                                <div class="detalle-producto">S/N: {{ $detalle->producto->numero_serie }}</div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $detalle->producto_nombre }}</strong>
                                            @if($detalle->producto_descripcion)
                                                <div class="detalle-producto">{{ Str::limit($detalle->producto_descripcion, 100) }}</div>
                                            @endif
                                            @if($detalle->producto && $detalle->producto->marca)
                                                <div class="detalle-producto">
                                                    <i class="fas fa-tag"></i> {{ $detalle->producto->marca->nombre }}
                                                </div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-light text-dark">{{ number_format($detalle->cantidad, 0) }}</span>
                                        </td>
                                        <td class="text-end">
                                            ${{ number_format($detalle->precio_unitario, 0, ',', '.') }}
                                        </td>
                                        <td class="text-center">
                                            @if($detalle->descuento_porcentaje > 0)
                                                <span class="badge bg-warning">{{ $detalle->descuento_porcentaje }}%</span>
                                                <div class="detalle-producto">-${{ number_format($detalle->descuento_monto, 0, ',', '.') }}</div>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <strong>${{ number_format($detalle->subtotal, 0, ',', '.') }}</strong>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Observaciones y Totales -->
        <div class="row">
            <div class="col-lg-8">
                @if($cotizacion->observaciones)
                <div class="card">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">
                            <i class="fas fa-comment icono-seccion"></i>
                            Observaciones
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ $cotizacion->observaciones }}</p>
                    </div>
                </div>
                @endif

                @if($cotizacion->motivo_anulacion)
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-times-circle icono-seccion"></i>
                            Motivo de Anulación
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-1">{{ $cotizacion->motivo_anulacion }}</p>
                        <small class="text-muted">
                            Anulado el {{ \Carbon\Carbon::parse($cotizacion->fecha_anulacion)->format('d/m/Y H:i') }}
                        </small>
                    </div>
                </div>
                @endif
            </div>

            <div class="col-lg-4">
                <div class="totales-box">
                    <h5 class="mb-4">
                        <i class="fas fa-calculator icono-seccion"></i>
                        Resumen de Totales
                    </h5>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal:</span>
                        <strong>${{ number_format($cotizacion->subtotal, 0, ',', '.') }}</strong>
                    </div>

                    @if($cotizacion->descuento_total > 0)
                    <div class="d-flex justify-content-between mb-3 text-success">
                        <span>Descuento:</span>
                        <strong>-${{ number_format($cotizacion->descuento_total, 0, ',', '.') }}</strong>
                    </div>
                    @endif

                    <div class="d-flex justify-content-between mb-3">
                        <span>IVA (19%):</span>
                        <strong>${{ number_format($cotizacion->iva, 0, ',', '.') }}</strong>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Total:</h5>
                        <div class="total-final">${{ number_format($cotizacion->total, 0, ',', '.') }}</div>
                    </div>

                    <div class="mt-3 text-center">
                        <small class="text-muted">
                            <i class="fas fa-info-circle"></i>
                            Precios en pesos chilenos (CLP)
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botones de Acción -->
        <div class="row no-print">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <button type="button" class="btn btn-print btn-custom" onclick="window.print()">
                            <i class="fas fa-print"></i> Imprimir
                        </button>

                        @if($cotizacion->pdf_path)
                        <a href="{{ url('laboratorio/cotizaciones/descargar-pdf/' . $cotizacion->id) }}"
                           class="btn btn-primary btn-custom" target="_blank">
                            <i class="fas fa-download"></i> Descargar PDF
                        </a>
                        @endif

                        <button type="button" class="btn btn-secondary btn-custom" onclick="history.back()">
                            <i class="fas fa-arrow-left"></i> Volver
                        </button>

                        @if($cotizacion->estado !== 'anulada' && $cotizacion->estado !== 'aceptada')
                        <button type="button" class="btn btn-info btn-custom" onclick="enviarPorEmail()">
                            <i class="fas fa-envelope"></i> Enviar por Email
                        </button>
                        @endif

                        @if($cotizacion->estado !== 'anulada')
                        <button type="button" class="btn btn-danger btn-custom" onclick="anularCotizacion()">
                            <i class="fas fa-times"></i> Anular
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function enviarPorEmail() {
            swal({
                title: 'Enviar por Email',
                text: 'Ingrese el email de destino:',
                content: "input",
                buttons: {
                    cancel: "Cancelar",
                    confirm: {
                        text: "Enviar",
                        value: true,
                    },
                },
            }).then((email) => {
                if (email) {
                    if (!isValidEmail(email)) {
                        swal('Error', 'Por favor ingrese un email válido', 'error');
                        return;
                    }

                    $.ajax({
                        url: "{{ url('laboratorio/cotizaciones/enviar-email') }}",
                        method: 'POST',
                        data: {
                            cotizacion_id: {{ $cotizacion->id }},
                            email_destino: email,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            swal('Enviado', 'Email enviado exitosamente a ' + email, 'success');
                        },
                        error: function() {
                            swal('Error', 'No se pudo enviar el email', 'error');
                        }
                    });
                }
            });
        }

        function anularCotizacion() {
            swal({
                title: '¿Anular cotización?',
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: 'Cancelar',
                        visible: true,
                        closeModal: true,
                    },
                    confirm: {
                        text: 'Sí, anular',
                        value: true,
                        closeModal: true
                    }
                },
                dangerMode: true
            }).then((willCancel) => {
                if (willCancel) {
                    $.ajax({
                        url: "{{ url('laboratorio/cotizaciones/anular/' . $cotizacion->id) }}",
                        method: 'PUT',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            swal('Anulada', 'Cotización anulada exitosamente', 'success')
                            .then(() => {
                                location.reload();
                            });
                        },
                        error: function() {
                            swal('Error', 'No se pudo anular la cotización', 'error');
                        }
                    });
                }
            });
        }

        function isValidEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Mostrar alerta si la cotización está próxima a vencer
        @if(\Carbon\Carbon::parse($cotizacion->valida_hasta)->diffInDays(now()) <= 3 && $cotizacion->estado !== 'anulada')
        $(document).ready(function() {
            const diasRestantes = {{ \Carbon\Carbon::parse($cotizacion->valida_hasta)->diffInDays(now()) }};
            if (diasRestantes <= 3) {
                swal({
                    title: 'Cotización próxima a vencer',
                    text: `Esta cotización vence en ${diasRestantes} día(s)`,
                    icon: 'warning',
                    timer: 4000
                });
            }
        });
        @endif
    </script>
</body>
</html>
