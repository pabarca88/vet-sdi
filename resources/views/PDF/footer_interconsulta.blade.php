<footer>
    <div class="contenido-footer">
        <table class="text-center" >
            <tbody>
            <tr>
                <th style="width: 50%;">
                    <div class="div-qr">
                        @if(!empty($cuerpo['array_ficha_atencion_resp']))
                            <img src="data:image/svg+xml;base64,{{ base64_encode($cuerpo['array_ficha_atencion_resp']['qr']) }}" style="width: 100%;">
                        @else
                            <img src="data:image/svg+xml;base64,{{ base64_encode($cuerpo['array_ficha_atencion_soli']['qr']) }}" style="width: 100%;">
                        @endif
                    </div>
                    <div style="line-height: 10px; font-weight: bold; font-family: Poppins;">Valide este documento<br>escaneando el código</div>
                </th>
                <th style="padding-top: 10px;width: 50%;">
                    <div class="div-qr">
                        @if(!empty($cuerpo['array_ficha_atencion_resp']))
                            <img src="data:image/svg+xml;base64,{{ base64_encode($cuerpo['array_profesional_resp']['qr']) }}" style="width: 100%;">
                        @else
                            <img src="data:image/svg+xml;base64,{{ base64_encode($cuerpo['array_profesional_soli']['qr']) }}" style="width: 100%;">
                        @endif
                    </div>
                    <div style="line-height: 10px; font-weight: lighter; font-family: Poppins; font-size: 10px;">Firma Digital Avanzada SDI</div>
                    @if(!empty($cuerpo['array_ficha_atencion_resp']))
                        <div style="line-height: 10px; font-weight: bold; font-family: Poppins;">Dr. {{ $cuerpo['array_profesional_resp']['nombre'] }}</div>
                        {{-- <div style="line-height: 10px; font-weight: lighter; font-family: Poppins;">{{ $cuerpo['array_profesional_resp']['token'] }}</div> --}}
                    @else
                        <div style="line-height: 10px; font-weight: bold; font-family: Poppins;">Dr. {{ $cuerpo['array_profesional_soli']['nombre'] }}</div>
                        {{-- <div style="line-height: 10px; font-weight: lighter; font-family: Poppins;">{{ $cuerpo['array_profesional_soli']['token'] }}</div> --}}
                    @endif
                </th>
            </tr>
            </tbody>
        </table>
    </div>
</footer>
