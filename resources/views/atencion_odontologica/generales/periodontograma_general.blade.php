@php
    $piezas = [
        ['numero' => 18, 'etiqueta' => '1.8', 'color' => 'nl-purple'],
        ['numero' => 17, 'etiqueta' => '1.7', 'color' => 'nl-purple'],
        ['numero' => 16, 'etiqueta' => '1.6', 'color' => 'nl-purple'],
        ['numero' => 15, 'etiqueta' => '1.5', 'color' => 'nl-purple'],
        ['numero' => 14, 'etiqueta' => '1.4', 'color' => 'nl-purple'],
        ['numero' => 13, 'etiqueta' => '1.3', 'color' => 'nl-purple'],
        ['numero' => 12, 'etiqueta' => '1.2', 'color' => 'nl-purple'],
        ['numero' => 11, 'etiqueta' => '1.1', 'color' => 'nl-purple'],
        ['numero' => 21, 'etiqueta' => '2.1', 'color' => 'nl-verde'],
        ['numero' => 22, 'etiqueta' => '2.2', 'color' => 'nl-verde'],
        ['numero' => 23, 'etiqueta' => '2.3', 'color' => 'nl-verde'],
        ['numero' => 24, 'etiqueta' => '2.4', 'color' => 'nl-verde'],
        ['numero' => 25, 'etiqueta' => '2.5', 'color' => 'nl-verde'],
        ['numero' => 26, 'etiqueta' => '2.6', 'color' => 'nl-verde'],
        ['numero' => 27, 'etiqueta' => '2.7', 'color' => 'nl-verde'],
        ['numero' => 28, 'etiqueta' => '2.8', 'color' => 'nl-verde'],
        ['numero' => 48, 'etiqueta' => '4.8', 'color' => 'nl-naranjo'],
        ['numero' => 47, 'etiqueta' => '4.7', 'color' => 'nl-naranjo'],
        ['numero' => 46, 'etiqueta' => '4.6', 'color' => 'nl-naranjo'],
        ['numero' => 45, 'etiqueta' => '4.5', 'color' => 'nl-naranjo'],
        ['numero' => 44, 'etiqueta' => '4.4', 'color' => 'nl-naranjo'],
        ['numero' => 43, 'etiqueta' => '4.3', 'color' => 'nl-naranjo'],
        ['numero' => 42, 'etiqueta' => '4.2', 'color' => 'nl-naranjo'],
        ['numero' => 41, 'etiqueta' => '4.1', 'color' => 'nl-naranjo'],
        ['numero' => 31, 'etiqueta' => '3.1', 'color' => 'nl-info'],
        ['numero' => 32, 'etiqueta' => '3.2', 'color' => 'nl-info'],
        ['numero' => 33, 'etiqueta' => '3.3', 'color' => 'nl-info'],
        ['numero' => 34, 'etiqueta' => '3.4', 'color' => 'nl-info'],
        ['numero' => 35, 'etiqueta' => '3.5', 'color' => 'nl-info'],
        ['numero' => 36, 'etiqueta' => '3.6', 'color' => 'nl-info'],
        ['numero' => 37, 'etiqueta' => '3.7', 'color' => 'nl-info'],
        ['numero' => 38, 'etiqueta' => '3.8', 'color' => 'nl-info'],
    ];

    $seleccionadas = collect($piezas_periodonto)->pluck('pieza')->map(fn($p) => (int)$p)->toArray();
@endphp

<ul class="nav nav-tabs-aten nav-fill" id="gral_od_adulto" role="tablist">
    @foreach ($piezas as $pieza)
        @php
            $numero = $pieza['numero'];
            $etiqueta = $pieza['etiqueta'];
            $color = $pieza['color'];
            $isActive = $loop->first;
            $isSelected = in_array($numero, $seleccionadas);
        @endphp
        <li class="nav-item">
            <a class="{{ $color }} text-reset pieza-tab {{ $isActive ? 'active' : '' }} {{ $isSelected ? 'pieza_seleccionada' : '' }}"
               id="eval_{{ $numero }}_tab"
               data-toggle="tab"
               href="#eval_{{ $numero }}"
               role="tab"
               aria-controls="eval_{{ $numero }}"
               aria-selected="{{ $isActive ? 'true' : 'false' }}">
                {{ $etiqueta }}
                @if($isSelected)
                    <i class="fas fa-check-circle text-success"></i>
                @endif
            </a>
        </li>
    @endforeach
</ul>
