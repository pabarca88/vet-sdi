<footer>
    <div class="contenido-footer">
        <table class="text-center" >
            <tbody>
                <tr>
                    @if (!empty($cuerpo['array_carnet']['qr_id']))
                        <th style="width: 50%;">
                            <div class="div-qr">
                                <img src="data:image/svg+xml;base64,{{ base64_encode($cuerpo['array_carnet']['qr']) }}" style="width: 100%;">
                            </div>
                            <div style="line-height: 10px; font-weight: bold; font-family: Poppins;">Valide este documento<br>escaneando el código</div>
                        </th>
                        <th style="width: 50%;">
                            <div class="div-qr">
                                <img src="data:image/svg+xml;base64,{{ base64_encode($cuerpo['array_carnet']['qr_id']) }}" style="width: 80%;">
                            </div>
                        </th>
                    @else
                        {{--  --}}
                    @endif

                </tr>
            </tbody>
        </table>
    </div>
</footer>
