<footer>
    <div class="contenido-footer">
        <table class="text-center" >
            <tbody>
                <tr>
                    <th style="width: 33%;">
                        {{-- <div class="div-qr">
                            <img src="data:image/svg+xml;base64,{{ base64_encode($receta->qr->documento) }}" style="width: 100%;">
                        </div>
                        <div style="line-height: 10px; font-weight: bold; font-family: Poppins;">Valide este documento<br>escaneando el código</div> --}}
                    </th>
                    <th style="width: 33%;">
                        {{-- <div class="div-qr">
                            @if ($receta->qr_id)
                                <img src="data:image/svg+xml;base64,{{ base64_encode( $receta->qr_id ) }}" style="width: 80%;">
                            @endif
                        </div> --}}
                    </th>
                    <th style="padding-top: 10px;width: 33%;">
                        {{-- <div class="div-qr">
                            <img src="data:image/svg+xml;base64,{{ base64_encode($receta->qr_prof->profesional) }}" style="width: 100%;">
                        </div>
                        <div style="line-height: 10px; font-weight: lighter; font-family: Poppins; font-size: 10px;">Firma Digital Avanzada SDI</div> --}}
                        <div style="line-height: 10px; font-weight: bold; font-family: Poppins;">Dr. {{ strtoupper($cuerpo['array_profesional']['nombre']) }}</div>
                        <div style="line-height: 9px; font-weight: lighter; font-family: Poppins;"> {{ strtoupper($cuerpo['array_profesional']['especialidad']) }}</div>
                        {{-- @if (isset($receta->cod_auto))
                            <div style="line-height: 10px; font-weight: lighter; font-family: Poppins;">{{ $receta->cod_auto }}</div>
                        @endif --}}
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</footer>
