<style>
    .odontograma {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-bottom:20px;
        margin-top:10px;
    }

    .fila {
        display: grid;
        grid-template-columns: repeat(10, 1fr);
        gap: 8px;
    }

    .pieza_odped_urg {
        border: 1px solid #749ef1;
        background-color: #ddecff;
        text-align: center;
        padding: 8px 5px;
        cursor: pointer;
        border-radius: 13px;
        transition: 0.1s ease;
        font-size:0.85rem;
        color: #2353b5;
        font-weight: 600;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 80px;
        position: relative;
    }

    .pieza_odped_urg img {
        width: 35px;
        height: 35px;
        object-fit: contain;
        margin-bottom: 5px;
        pointer-events: none;
    }

    .pieza_odped_urg.seleccionada {
        background-color: #a366d1;
        color: #fff;
        border-color: #601886;
    }
</style>
    <div class="odontograma">
        <!-- Fila superior (5.5 al 5.1 y 6.1 al 6.5) -->
        <div class="fila">
            @for($i = 55; $i >= 51; $i--)
                @php
                    $codigoPieza = '5.' . ($i % 10);
                    $codigoPiezaImagen = '5' . ($i % 10);

                    // Siempre usar imagen de diente normal/sano
                    $imagen = "images/dientes/d{$codigoPiezaImagen}.png";
                @endphp
                <div class="pieza_odped_urg" data-pieza_odpediat_urg="{{ $codigoPieza }}">
                    <img src="{{ asset($imagen) }}" alt="{{ $codigoPieza }}">
                    <span>{{ $codigoPieza }}</span>
                </div>
            @endfor

            @for($i = 61; $i <= 65; $i++)
                @php
                    $codigoPieza = '6.' . ($i % 10);
                    $codigoPiezaImagen = '6' . ($i % 10);

                    // Siempre usar imagen de diente normal/sano
                    $imagen = "images/dientes/d{$codigoPiezaImagen}.png";
                @endphp
                <div class="pieza_odped_urg" data-pieza_odpediat_urg="{{ $codigoPieza }}">
                    <img src="{{ asset($imagen) }}" alt="{{ $codigoPieza }}">
                    <span>{{ $codigoPieza }}</span>
                </div>
            @endfor
        </div>

        <!-- Fila inferior (8.5 al 8.1 y 7.1 al 7.5) -->
        <div class="fila">
            @for($i = 85; $i >= 81; $i--)
                @php
                    $codigoPieza = '8.' . ($i % 10);
                    $codigoPiezaImagen = '8' . ($i % 10);

                    // Siempre usar imagen de diente normal/sano
                    $imagen = "images/dientes/d{$codigoPiezaImagen}.png";
                @endphp
                <div class="pieza_odped_urg" data-pieza_odpediat_urg="{{ $codigoPieza }}">
                    <img src="{{ asset($imagen) }}" alt="{{ $codigoPieza }}">
                    <span>{{ $codigoPieza }}</span>
                </div>
            @endfor

            @for($i = 71; $i <= 75; $i++)
                @php
                    $codigoPieza = '7.' . ($i % 10);
                    $codigoPiezaImagen = '7' . ($i % 10);

                    // Siempre usar imagen de diente normal/sano
                    $imagen = "images/dientes/d{$codigoPiezaImagen}.png";
                @endphp
                <div class="pieza_odped_urg" data-pieza_odpediat_urg="{{ $codigoPieza }}">
                    <img src="{{ asset($imagen) }}" alt="{{ $codigoPieza }}">
                    <span>{{ $codigoPieza }}</span>
                </div>
            @endfor
        </div>
    </div>
