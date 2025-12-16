<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cotización {{ $cotizacion->numero }}</title>
    <style>
        body { font-family: Poppins, sans-serif; font-size: 12px; }
        .header { text-align: left; margin-bottom: 20px; }
        .company-info { margin-bottom: 20px; font-size:10px; margin-top: 20px;}
        .client-info { margin-bottom: 30px; font-size: 11px; line-height: 1; border-left: 3px solid #1a49a3; padding-left: 7px;}
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border-bottom: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #1a49a3; color: white; }
        .text-right { text-align: right; }
        .totals { width: 40%; margin-left: auto; background-color: #EFEFEF;}
        .footer { margin-top: 40px; font-size: 10px; text-align: left; }
        .company-logo {
            max-width: 100px;
            object-fit: contain;
            border-radius: 4px;
        }
        .logo-placeholder {
            background-color: #4a90e2;
            color: white;
            border-radius: 8px;
            font-size: 40px;
            font-weight: bold;
            display: inline-block;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .info-cotizacion { line-height: 1; text-align: left; float: left; display: inline;}
        .color-azul{ color:#1a49a3;}
        .bg-azul { background-color: #1a49a3;}
        .color-white {  color: #fff; }
        .logo-footer { margin-top: 10px; text-align: left; float: left; display: inline;}
        h1 { margin-bottom: 5px!important;}
        .mb2 {margin-bottom: 2px;}

        .notas{
            font-size: 11px;
            text-align: justify;
        }

        .ml0{ margin-left: 0px;" }
    </style>
</head>
<body>
    <!-- Encabezado -->
    <div class="header">
        <!-- Logo y título en la misma línea -->
            <!-- Logo de la empresa (usando foto_perfil) -->
            @php
                $logo_url = $foto_perfil ?? ($cotizacion->foto_perfil ?? null);
            @endphp
            @if($logo_url)
                @if(filter_var($logo_url, FILTER_VALIDATE_URL))
                    <!-- Si la foto es una URL completa -->
                    <img style="width: 150px; margin-left:0px;" src="{{ $logo_url }}" alt="Logo empresa" class="company-logo">
                @elseif(file_exists(public_path($logo_url)))
                    <!-- Si la foto está en public/ -->
                    <img style="width: 150px; margin-left:0px;" src="{{ asset($logo_url) }}" alt="Logo empresa" class="company-logo">
                @elseif(file_exists(storage_path('app/public/' . $logo_url)))
                    <!-- Si la foto está en storage -->
                    <img style="width: 150px; margin-left:0px;" src="{{ asset('storage/' . $logo_url) }}" alt="Logo empresa" class="company-logo">
                @else
                    <!-- Logo por defecto si no se encuentra la foto -->
                    <div class="logo-placeholder">Logo</div>
                @endif
            @else
                <!-- Logo por defecto cuando no hay foto configurada -->
                <div class="logo-placeholder">MediChile</div>
            @endif
                <!-- Títulos -->
                <div style="margin-bottom:150px;">
                    <div class="info-cotizacion">
                        <strong style="margin-bottom: 2px; font-size: 25px; color:#1a49a3;">COTIZACIÓN</strong><br class="mb2">
                        <strong style="margin-bottom: 5px 0 0 0; font-size: 16px;  color:#000;">Nº {{ $cotizacion->numero }}</strong>
                        <div class="color-azul">
                        <strong>Fecha:</strong> {{
                            is_object($cotizacion->fecha) && method_exists($cotizacion->fecha, 'format')
                                ? $cotizacion->fecha->format('d-m-Y')
                                : \Carbon\Carbon::parse($cotizacion->fecha)->format('d-m-Y')
                        }}<br>
                        
                        <strong>Válida hasta:</strong> {{
                            is_object($cotizacion->valida_hasta) && method_exists($cotizacion->valida_hasta, 'format')
                                ? $cotizacion->valida_hasta->format('d-m-Y')
                                : \Carbon\Carbon::parse($cotizacion->valida_hasta)->format('d-m-Y')
                        }}
                        </div>
                    </div>
                    <div style="text-align: left; float: right; display: inline;">
                         <!-- Información del cliente -->
                        <div class="client-info">
                            <strong style="font-size:11px; color:#1a49a3;">DATOS DEL CLIENTE</strong><br class="mb2">
                            <strong>Nombre:</strong> {{ $cotizacion->cliente_nombre }}<br class="mb2">
                            <strong>RUT:</strong> {{ $cotizacion->cliente_rut }}<br class="mb2">
                            @if($cotizacion->cliente_telefono)
                                <strong>Teléfono:</strong> {{ $cotizacion->cliente_telefono }}<br class="mb2">
                            @endif
                            @if($cotizacion->cliente_email)
                                <strong>Email:</strong> {{ $cotizacion->cliente_email }}<br class="mb2">
                            @endif
                        </div>
                    </div>
                </div>    

    <!--<hr style="border: 1px solid #1a49a3; margin-bottom: 50px;">-->
  
    <!-- Tabla de productos -->
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Código</th>
                <th>Producto</th>
                <th>Cant.</th>
                <th class="text-right">Precio Unit.</th>
                <th class="text-right">Desc. %</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cotizacion->detalles as $index => $detalle)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $detalle->producto_codigo ?? $detalle['producto_codigo'] ?? '' }}</td>
                <td>{{ $detalle->producto_nombre ?? $detalle['producto_nombre'] ?? '' }}</td>
                <td>{{ $detalle->cantidad ?? $detalle['cantidad'] ?? 0 }}</td>
                <td class="text-right">${{ number_format($detalle->precio_unitario ?? $detalle['precio_unitario'] ?? 0, 0, ',', '.') }}</td>
                <td class="text-right">{{ ($detalle->descuento_porcentaje ?? $detalle['descuento_porcentaje'] ?? 0) }}%</td>
                <td class="text-right">${{ number_format(($detalle->subtotal_final ?? $detalle['subtotal_final'] ?? $detalle->subtotal ?? $detalle['subtotal'] ?? 0), 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Totales -->
    <table class="totals">
        <tr>
            <td><strong>Subtotal:</strong></td>
            <td class="text-right">${{ number_format($cotizacion->subtotal, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>Descuento Total:</strong></td>
            <td class="text-right">-${{ number_format($cotizacion->descuento_total, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>IVA (19%):</strong></td>
            <td class="text-right">${{ number_format($cotizacion->iva, 0, ',', '.') }}</td>
        </tr>
        <tr style="background: #1a49a3;">
            <td class="color-white"><strong>TOTAL:</strong></td>
            <td class="text-right color-white"><strong>${{ number_format($cotizacion->total, 0, ',', '.') }}</strong></td>
        </tr>
    </table>

    <!-- Pie de página -->
    <div class="footer" style="margin-bottom:10px;">
        <p class="color-azul" style="font-size: 14px; margin-top: -95px; margin-bottom:10px;">Esta cotización es válida hasta el <strong>{{
            is_object($cotizacion->valida_hasta) && method_exists($cotizacion->valida_hasta, 'format')
                ? $cotizacion->valida_hasta->format('d-m-Y')
                : \Carbon\Carbon::parse($cotizacion->valida_hasta)->format('d-m-Y')
        }}</strong></p>
        <p style="font-size:10px;">Documento generado electrónicamente - MediChile Sistema</p>
    </div>
    <hr style="border: 1px solid #1a49a3;">
    <div class="notas" style="margin-top: 8px;">
        <strong>Formas de pago:</strong><br>Efectivo, Transferencia bancaria, Cheque al día, tarjeta de débito y tarjeta de crédito.<br>
    </div>
    <div class="notas" style="margin-top: 20px;">
        <strong>El valor incluye:</strong>
        <ul>
            <li>Control gratuito de audífonos por toda la vida útil del mismo en Sucursales Auralmed. • Pilas de audífonos para 1 año, equivalente a 24 pilas de cualquier medida.</li>
            <li>1 cepillo de limpieza.</li>
            <li>1 caja rígida para audífonos que usen pila.</li>
            <li>1 audiometría anual sin costo en sucursales Auralmed.</li>
            <li>Asistencia telefónica.</li>
            <li>SEGURO DE ROBO, PÉRDIDA O ACCIDENTE: ante cualquier evento catastrófico con su audífono, ocurrido durante el primer año de uso, puede acceder a un Descuento del 35% del precio de lista actual para poder hacer reemplazo de éste.</li>
        </ul>
    </div>

    <!-- Observaciones -->
    @if($cotizacion->observaciones)
    <div class="notas" style="margin-top: 20px; margin-top: 10px;">
        <strong>Observaciones:</strong><br>
        {{ $cotizacion->observaciones }}
    </div>
    @endif

    

      <!-- Información de la empresa -->
       <!-- Títulos -->
                <div style="position: absolute;
                  bottom: 70px;
                  left: 0;
                  width: 100%;
                  padding: 10px;">
                    <hr style="border: 1px solid #1a49a3;">
                    <div class="logo-footer">
                        <!-- Logo de la empresa (usando foto_perfil) -->
            @php
                $logo_url = $foto_perfil ?? ($cotizacion->foto_perfil ?? null);
            @endphp
            @if($logo_url)
                @if(filter_var($logo_url, FILTER_VALIDATE_URL))
                    <!-- Si la foto es una URL completa -->
                    <img style="width: 300px; margin-left:0px;" src="{{ $logo_url }}" alt="Logo empresa" class="company-logo">
                @elseif(file_exists(public_path($logo_url)))
                    <!-- Si la foto está en public/ -->
                    <img style="width: 300px; margin-left:0px;" src="{{ asset($logo_url) }}" alt="Logo empresa" class="company-logo">
                @elseif(file_exists(storage_path('app/public/' . $logo_url)))
                    <!-- Si la foto está en storage -->
                    <img style="width: 300px; margin-left:0px;" src="{{ asset('storage/' . $logo_url) }}" alt="Logo empresa" class="company-logo">
                @else
                    <!-- Logo por defecto si no se encuentra la foto -->
                    <div class="logo-placeholder">Logo</div>
                @endif
            @else
                <!-- Logo por defecto cuando no hay foto configurada -->
                <div class="logo-placeholder">MediChile</div>
            @endif
            </div>
                <div style="text-align: left; float: right; display: inline;">
                     <!-- Información del cliente -->
                    <div class="company-info">
                        {{ $cotizacion->lugarAtencion->nombre ?? '' }}<br>
                        {{ $cotizacion->lugarAtencion->direccion->direccion ?? '' }} - {{ $cotizacion->lugarAtencion->direccion->ciudad->nombre ?? '' }}<br>
                         <strong>Teléfono:</strong> {{ $cotizacion->lugarAtencion->telefono ?? '' }}<br>
                         <strong>Email:</strong> {{ $cotizacion->lugarAtencion->email ?? '' }}
                    </div>
                </div>
            </div>

    
</body>
</html>
