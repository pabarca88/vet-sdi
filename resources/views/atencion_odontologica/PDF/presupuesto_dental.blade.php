<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Odontograma - Tabla</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container my-2">
          <!-- Cabecera -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
          <h5>Resumen del Presupuesto Dental</h5>
        </div>
        <div class="card-body">
          <p><strong>Paciente:</strong> {{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}</p>
          <p><strong>Total a pagar:</strong> {{number_format($valores_odontograma[0] + $valores_odontograma[1] + $valores_odontograma[2],0,',','.')  }}</p>
          <p><strong>Fecha:</strong> {{ date('Y-m-d') }}</p>
        </div>
      </div>
    </div>
  <div class="container mt-4">
    <h5>Odontograma - Detalle de Tratamientos</h5>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead class="table-primary">
          <tr>
            <th>Pieza Dental</th>
            <th>Diagnóstico</th>
            <th>Tratamiento</th>
            <th>Caras</th>
            <th>Valor</th>
            <th>Comentarios</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($odontograma as $index => $odonto)
                @if($odonto->presupuesto == 1)
                <tr>
                    <td>{{ $odonto->pieza }}</td>
                    <td>{{ $odonto->diagnostico }}</td>
                    <td>{{ $odonto->tratamiento }}</td>
                    <td>{{ $odonto->caras ?: '-' }}</td>
                    <td>${{ number_format($odonto->valor,0,',','.') }}</td>
                    <td>{{ $odonto->observaciones ?: '-' }}</td>
                </tr>
                @endif
            @endforeach
            @foreach ($maxilar_superior_gral_diagnostico as $diagnostico)
            @if($diagnostico->presupuesto == 1)
                <tr>
                    <td>{{ $diagnostico->localizacion }}</td>
                    <td></td>
                    <td>{{ $diagnostico->diagnostico_tratamiento }}</td>
                    <td>-</td>
                    <td>${{ number_format($diagnostico->valor,0,',','.') }}</td>
                    <td></td>
                </tr>
                @endif
            @endforeach
            @foreach ($maxilar_superior_gral_tratamiento as $diagnostico)
            @if($diagnostico->presupuesto == 1)
                <tr>
                    <td>{{ $diagnostico->localizacion }}</td>
                    <td></td>
                    <td>{{ $diagnostico->diagnostico_tratamiento }}</td>
                    <td>-</td>
                    <td>${{ number_format($diagnostico->valor,0,',','.') }}</td>
                    <td></td>
                </tr>
                @endif
            @endforeach
            @foreach ($maxilar_superior_gral_diagnosticos_endo as $diagnostico)
            @if($diagnostico->presupuesto == 1)
                <tr>
                    <td>{{ $diagnostico->localizacion }}</td>
                    <td></td>
                    <td>{{ $diagnostico->diagnostico_tratamiento }}</td>
                    <td>-</td>
                    <td>${{ number_format($diagnostico->valor,0,',','.') }}</td>
                    <td></td>
                </tr>
                @endif
            @endforeach
            @foreach ($maxilar_superior_gral_tratamientos_endo as $diagnostico)
            @if($diagnostico->presupuesto == 1)
                <tr>
                    <td>{{ $diagnostico->localizacion }}</td>
                    <td></td>
                    <td>{{ $diagnostico->diagnostico_tratamiento }}</td>
                    <td>-</td>
                    <td>${{ number_format($diagnostico->valor,0,',','.') }}</td>
                    <td></td>
                </tr>
                @endif
            @endforeach
            @foreach ($maxilar_inferior_gral_diagnostico as $diagnostico)
            @if($diagnostico->presupuesto == 1)
                <tr>
                    <td>{{ $diagnostico->localizacion }}</td>
                    <td></td>
                    <td>{{ $diagnostico->diagnostico_tratamiento }}</td>
                    <td>-</td>
                    <td>${{ number_format($diagnostico->valor,0,',','.') }}</td>
                    <td></td>
                </tr>
                @endif
            @endforeach
            @foreach ($maxilar_inferior_gral_tratamiento as $diagnostico)
            @if($diagnostico->presupuesto == 1)
                <tr>
                    <td>{{ $diagnostico->localizacion }}</td>
                    <td></td>
                    <td>{{ $diagnostico->diagnostico_tratamiento }}</td>
                    <td>-</td>
                    <td>${{ number_format($diagnostico->valor,0,',','.') }}</td>
                    <td></td>
                </tr>
                @endif
            @endforeach
            @foreach ($maxilar_inferior_gral_diagnosticos_endo as $diagnostico)
            @if($diagnostico->presupuesto == 1)
                <tr>
                    <td>{{ $diagnostico->localizacion }}</td>
                    <td></td>
                    <td>{{ $diagnostico->diagnostico_tratamiento }}</td>
                    <td>-</td>
                    <td>${{ number_format($diagnostico->valor,0,',','.') }}</td>
                    <td></td>
                </tr>
                @endif
            @endforeach
            @foreach ($maxilar_inferior_gral_tratamientos_endo as $diagnostico)
            @if($diagnostico->presupuesto == 1)
                <tr>
                    <td>{{ $diagnostico->localizacion }}</td>
                    <td></td>
                    <td>{{ $diagnostico->diagnostico_tratamiento }}</td>
                    <td>-</td>
                    <td>${{ number_format($diagnostico->valor,0,',','.') }}</td>
                    <td></td>
                </tr>
                @endif
            @endforeach
            @foreach ($boca_completa_gral_diagnostico as $diagnostico)
            @if($diagnostico->presupuesto == 1)
                <tr>
                    <td>{{ $diagnostico->localizacion }}</td>
                    <td></td>
                    <td>{{ $diagnostico->diagnostico_tratamiento }}</td>
                    <td>-</td>
                    <td>${{ number_format($diagnostico->valor,0,',','.') }}</td>
                    <td></td>
                </tr>
                @endif
            @endforeach
            @foreach ($boca_completa_gral_tratamiento as $diagnostico)
            @if($diagnostico->presupuesto == 1)
                <tr>
                    <td>{{ $diagnostico->localizacion }}</td>
                    <td></td>
                    <td>{{ $diagnostico->diagnostico_tratamiento }}</td>
                    <td>-</td>
                    <td>${{ number_format($diagnostico->valor,0,',','.') }}</td>
                    <td></td>
                </tr>
                @endif
            @endforeach
            @foreach ($boca_completa_gral_diagnostico_endo as $diagnostico)
            @if($diagnostico->presupuesto == 1)
                <tr>
                    <td>{{ $diagnostico->localizacion }}</td>
                    <td></td>
                    <td>{{ $diagnostico->diagnostico_tratamiento }}</td>
                    <td>-</td>
                    <td>${{ number_format($diagnostico->valor,0,',','.') }}</td>
                    <td></td>
                </tr>
                @endif
            @endforeach
            @foreach ($boca_completa_gral_tratamiento_endo as $diagnostico)
            @if($diagnostico->presupuesto == 1)
                <tr>
                    <td>{{ $diagnostico->localizacion }}</td>
                    <td></td>
                    <td>{{ $diagnostico->diagnostico_tratamiento }}</td>
                    <td>-</td>
                    <td>${{ number_format($diagnostico->valor,0,',','.') }}</td>
                    <td></td>
                </tr>
                @endif
            @endforeach
            @foreach ($insumos as $i)
            @if($i->presupuesto == 1)
                <tr>
                    <td>{{ $i->insumos }}</td>
                    <td>{{ $i->cantidad }}</td>
                    <td>{{ $i->tipo_insumo }}</td>
                    <td>-</td>
                    <td>${{ number_format($i->valor * $i->cantidad,0) }}</td>
                </tr>
            @endif

            @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
