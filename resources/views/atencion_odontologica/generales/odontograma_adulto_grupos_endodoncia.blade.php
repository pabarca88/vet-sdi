
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
        grid-template-columns: repeat(8, 1fr);
        gap: 5px;
}

    .pieza_endodoncia {
        border: 1px solid #749ef1;
        background-color: #ddecff;
        text-align: center;
        padding: 3px 5px;
        cursor: pointer;
        border-radius: 13px;
        transition: 0.1s ease;
        font-size:0.95rem;
        color: #2353b5;
        font-weight: 600;
}


    .pieza_endodoncia.seleccionada {
        background-color: #a366d1;
        color: #fff;
        border-color: #601886;
}

    </style>
    <div class="odontograma">
        <!-- Fila superior (1.8 al 1.1 y 2.1 al 2.8) -->
        <div class="fila">
            @for($i = 18; $i >= 11; $i--)
                <div class="pieza_endodoncia" data-pieza_end="1.{{ $i % 10 }}">1.{{ $i % 10 }}</div>
            @endfor

            @for($i = 21; $i <= 28; $i++)
                <div class="pieza_endodoncia" data-pieza_end="2.{{ $i % 10 }}">2.{{ $i % 10 }}</div>
            @endfor
        </div>

        <!-- Fila inferior (4.8 al 4.1 y 3.1 al 3.8) -->
        <div class="fila">
            @for($i = 48; $i >= 41; $i--)
                <div class="pieza_endodoncia" data-pieza_end="4.{{ $i % 10 }}">4.{{ $i % 10 }}</div>
            @endfor

            @for($i = 31; $i <= 38; $i++)
                <div class="pieza_endodoncia" data-pieza_end="3.{{ $i % 10 }}">3.{{ $i % 10 }}</div>
            @endfor
        </div>
    </div>


