<footer>
    <div class="contenido-footer">
        <table class="text-center" >
            <tbody>
            <tr>
                @if (!empty($cuerpo['array_ficha_atencion']['qr_id']))
                    <th style="width: 33%;">
                        <div class="div-qr">
                            <img src="data:image/svg+xml;base64,{{ base64_encode($cuerpo['array_ficha_atencion']['qr']) }}" style="width: 100%;">
                        </div>
                        <div style="line-height: 10px; font-weight: bold; font-family: Arial;">Valide este documento<br>escaneando el código</div>
                    </th>
                    <th style="width: 33%;">
                        <div class="div-qr">
                            <img src="data:image/svg+xml;base64,{{ base64_encode($cuerpo['array_ficha_atencion']['qr_id']) }}" style="width: 80%;">
                        </div>
                    </th>
                    <th style="padding-top: 10px;width: 33%;">
                        <div class="div-qr">
                            <img src="data:image/svg+xml;base64,{{ base64_encode($cuerpo['array_profesional']['qr']) }}" style="width: 100%;">
                        </div>
                        <div style="line-height: 10px; font-weight: lighter; font-family: Arial; font-size: 10px;">Firma Digital Avanzada SDI</div>
                        <div style="line-height: 10px; font-weight: bold; font-family: Arial;">Dr. {{ $cuerpo['array_profesional']['nombre'] }}</div>
                        <div style="line-height: 10px; font-weight: lighter; font-family: Arial;">{{ $cuerpo['array_profesional']['token'] }}</div>
                    </th>
                @else
                    <th style="width: 50%;">
                        <div class="div-qr">
                            <img src="data:image/svg+xml;base64,{{ base64_encode($cuerpo['array_ficha_atencion']['qr']) }}" style="width: 100%;">
                        </div>
                        <div style="line-height: 10px; font-weight: bold; font-family: Arial;">Valide este documento<br>escaneando el código</div>
                    </th>
                    <th style="padding-top: 10px;width: 50%;">
                        <div class="div-qr">
                            <img src="data:image/svg+xml;base64,{{ base64_encode($cuerpo['array_profesional']['qr']) }}" style="width: 100%;">
                        </div>
                        <div style="line-height: 10px; font-weight: lighter; font-family: Arial; font-size: 10px;">Firma Digital Avanzada SDI</div>
                        <div style="line-height: 10px; font-weight: bold; font-family: Arial;">Dr. {{ $cuerpo['array_profesional']['nombre'] }}</div>
                        {{-- <div style="line-height: 10px; font-weight: lighter; font-family: Arial;">{{ $cuerpo['array_profesional']['token'] }}</div> --}}
                    </th>
                @endif

            </tr>
            </tbody>
        </table>
    </div>
</footer>
