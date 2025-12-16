<div class="card">
    <div class="card-header">
        <h5 class="card-title">Total de productos ingresados: {{ $ingresos->count() }}</h5>
    </div>
    <div class="card-body">
        <table class="table w-100 my-2" id="tabla_reporte_diario_ingresados">
            <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingresos as $reporte)
                    <tr>
                        <td>{{ $reporte->fecha_emision }}</td>
                        <td><img src="{{ $reporte->image_path }}" alt="prod" style="width: 100px"></td>
                        <td>{{ $reporte->producto }}</td>
                        <td>{{ $reporte->cantidad }}</td>
                        <td>$ {{ number_format($reporte->precio_compra,0,',','.') }}</td>
                        <td>$ {{ number_format(($reporte->precio_compra * $reporte->cantidad),0,',','.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Total de productos entregados: {{ $pedidos->count() }}</h5>
    </div>
    <div class="card-body">
        <table class="table w-100 my-2" id="tabla_reporte_diario_entregas">
            <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Receptor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $reporte)
                    <tr>
                        <td>{{ $reporte->fecha_emision }}</td>
                        <td><img src="{{ $reporte->image_path }}" alt="prod" style="width: 100px"></td>
                        <td>{{ $reporte->producto }}</td>
                        <td>{{ $reporte->cantidad_entregada }}</td>
                        <td>{{ $reporte->usuario }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#tabla_reporte_diario_entregas').DataTable();
        $('#tabla_reporte_diario_ingresados').DataTable();
    });
</script>
