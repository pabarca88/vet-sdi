<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotización {{ $cotizacion->numero }} - MediChile Sistema</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
            margin: 0;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 18px;
            margin-bottom: 25px;
            color: #2c3e50;
        }

        .info-box {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            border-left: 4px solid #007bff;
        }

        .info-box h3 {
            color: #495057;
            margin-bottom: 15px;
            font-size: 16px;
            font-weight: 600;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            padding: 5px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .info-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .info-label {
            font-weight: 600;
            color: #6c757d;
        }

        .info-value {
            color: #2c3e50;
            font-weight: 500;
        }

        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .products-table th {
            background-color: #495057;
            color: white;
            padding: 12px 8px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
        }

        .products-table td {
            padding: 10px 8px;
            border-bottom: 1px solid #e9ecef;
            font-size: 13px;
        }

        .products-table tr:last-child td {
            border-bottom: none;
        }

        .products-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .text-center { text-align: center; }
        .text-right { text-align: right; }

        .totals-box {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 15px;
        }

        .total-final {
            display: flex;
            justify-content: space-between;
            font-size: 20px;
            font-weight: 700;
            color: #007bff;
            padding-top: 15px;
            border-top: 2px solid #007bff;
            margin-top: 15px;
        }

        .validity-notice {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
            color: #856404;
        }

        .validity-notice strong {
            color: #b8860b;
        }

        .contact-info {
            background-color: #d1ecf1;
            border: 1px solid #bee5eb;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            color: #0c5460;
        }

        .contact-info h4 {
            margin-bottom: 15px;
            color: #155724;
        }

        .footer {
            background-color: #495057;
            color: #ffffff;
            padding: 25px 30px;
            text-align: center;
            font-size: 14px;
        }

        .footer p {
            margin-bottom: 8px;
        }

        .footer .company-name {
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background: linear-gradient(45deg, #007bff, #0056b3);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            margin: 20px 0;
            text-align: center;
        }

        .btn:hover {
            background: linear-gradient(45deg, #0056b3, #007bff);
        }

        @media screen and (max-width: 600px) {
            .container {
                margin: 0;
                border-radius: 0;
            }

            .header, .content, .footer {
                padding: 20px;
            }

            .info-row {
                flex-direction: column;
            }

            .info-label {
                margin-bottom: 5px;
            }

            .products-table {
                font-size: 12px;
            }

            .products-table th,
            .products-table td {
                padding: 8px 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>🏥 MediChile Sistema</h1>
            <p>Su cotización está lista</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Estimado/a {{ $cotizacion->cliente_nombre ?? 'Cliente' }},
            </div>

            <p>
                Nos complace enviarle la cotización solicitada. A continuación encontrará el detalle
                de los productos y servicios cotizados según sus requerimientos.
            </p>

            <!-- Información de la Cotización -->
            <div class="info-box">
                <h3>📋 Información de la Cotización</h3>
                <div class="info-row">
                    <span class="info-label">Número de Cotización:</span>
                    <span class="info-value"><strong>{{ $cotizacion->numero }}</strong></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Fecha de Emisión:</span>
                    <span class="info-value">{{ \Carbon\Carbon::parse($cotizacion->fecha)->format('d/m/Y') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Válida hasta:</span>
                    <span class="info-value">{{ \Carbon\Carbon::parse($cotizacion->valida_hasta)->format('d/m/Y') }}</span>
                </div>
                @if($cotizacion->profesional)
                <div class="info-row">
                    <span class="info-label">Profesional a cargo:</span>
                    <span class="info-value">{{ $cotizacion->profesional->nombre }}</span>
                </div>
                @endif
            </div>

            <!-- Detalle de Productos -->
            <h3>🛍️ Productos Cotizados</h3>
            <table class="products-table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th class="text-center">Cant.</th>
                        <th class="text-right">Precio Unit.</th>
                        <th class="text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cotizacion->detalles as $detalle)
                    <tr>
                        <td>
                            <strong>{{ $detalle->producto_nombre }}</strong>
                            @if($detalle->producto_codigo)
                                <br><small style="color: #6c757d;">Código: {{ $detalle->producto_codigo }}</small>
                            @endif
                            @if($detalle->descuento_porcentaje > 0)
                                <br><small style="color: #28a745;">Descuento: {{ $detalle->descuento_porcentaje }}%</small>
                            @endif
                        </td>
                        <td class="text-center">{{ $detalle->cantidad }}</td>
                        <td class="text-right">${{ number_format($detalle->precio_unitario, 0, ',', '.') }}</td>
                        <td class="text-right"><strong>${{ number_format($detalle->subtotal, 0, ',', '.') }}</strong></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Totales -->
            <div class="totales-box">
                <div class="total-row">
                    <span>Subtotal:</span>
                    <span>${{ number_format($cotizacion->subtotal, 0, ',', '.') }}</span>
                </div>
                @if($cotizacion->descuento_total > 0)
                <div class="total-row" style="color: #28a745;">
                    <span>Descuento Total:</span>
                    <span>-${{ number_format($cotizacion->descuento_total, 0, ',', '.') }}</span>
                </div>
                @endif
                <div class="total-row">
                    <span>IVA (19%):</span>
                    <span>${{ number_format($cotizacion->iva, 0, ',', '.') }}</span>
                </div>
                <div class="total-final">
                    <span>TOTAL:</span>
                    <span>${{ number_format($cotizacion->total, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Aviso de Validez -->
            <div class="validity-notice">
                <strong>⚠️ Importante:</strong> Esta cotización tiene una validez hasta el
                <strong>{{ \Carbon\Carbon::parse($cotizacion->valida_hasta)->format('d/m/Y') }}</strong>.
                Los precios están sujetos a cambios posterior a esta fecha.
            </div>

            @if($cotizacion->observaciones)
            <!-- Observaciones -->
            <div class="info-box">
                <h3>📝 Observaciones</h3>
                <p>{{ $cotizacion->observaciones }}</p>
            </div>
            @endif

            @if($cotizacion->forma_pago)
            <!-- Forma de Pago -->
            <div class="info-box">
                <h3>💳 Forma de Pago</h3>
                <p>{{ $cotizacion->forma_pago }}</p>
            </div>
            @endif

            <!-- Información de Contacto -->
            <div class="contact-info">
                <h4>📞 ¿Necesita más información?</h4>
                <p>
                    Estamos aquí para ayudarle. No dude en contactarnos si tiene alguna pregunta
                    sobre esta cotización o requiere información adicional.
                </p>
                @if($cotizacion->lugarAtencion)
                <p>
                    <strong>{{ $cotizacion->lugarAtencion->nombre }}</strong><br>
                    @if($cotizacion->lugarAtencion->telefono)
                        📞 {{ $cotizacion->lugarAtencion->telefono }}<br>
                    @endif
                    @if($cotizacion->lugarAtencion->email)
                        📧 {{ $cotizacion->lugarAtencion->email }}<br>
                    @endif
                    @if($cotizacion->lugarAtencion->direccion)
                        📍 {{ $cotizacion->lugarAtencion->direccion->direccion ?? '' }}
                        @if($cotizacion->lugarAtencion->direccion->ciudad)
                            - {{ $cotizacion->lugarAtencion->direccion->ciudad->nombre }}
                        @endif
                    @endif
                </p>
                @endif
            </div>

            <p style="margin-top: 30px;">
                Agradecemos su interés en nuestros productos y servicios. Esperamos poder atenderle pronto.
            </p>

            <p style="margin-top: 20px; color: #6c757d; font-style: italic;">
                <strong>Nota:</strong> Esta cotización se ha enviado adjunta en formato PDF para su conveniencia.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="company-name">MediChile Sistema</div>
            <p>Soluciones integrales en salud auditiva</p>
            <p>{{ date('Y') }} - Todos los derechos reservados</p>
            <p style="font-size: 12px; margin-top: 15px; opacity: 0.8;">
                Este es un mensaje automático, por favor no responda directamente a este correo.
            </p>
        </div>
    </div>
</body>
</html>
