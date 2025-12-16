
<header>
    <div class="contenido-encabezado-uno">
        <div class="contenido-logo">
            <!-- <img style="width: 100%;" class="logo" src="{{ asset('images/pdf/sdi-logo.svg') }}"> -->
            <img style="width: 100%;" class="logo" src="https://med-sdi.cl/images/pdf/sdi-logo.svg">
        </div>
        <div class="contenido-infoprof">
            <p><strong>{{ Str::upper( $receta->profesional->nombre.' '.$receta->profesional->apellido_uno) }}</strong></p>
            <p>{{ $receta->profesional->nombre_especialidades .' '.
                    ((!empty($receta->profesional->nombre_tipo_especialidad)?strtoupper($receta->profesional->nombre_tipo_especialidad):'')) .' '.
                    ((!empty($receta->profesional->nombre_sub_tipo_especialidad)?strtoupper($receta->profesional->nombre_sub_tipo_especialidad):''))
                }}</p>
            <p>Rut: {{ $receta->profesional->rut }}</p>
            <p>RCM: 00000-0</p>
            <p>Arlegui 934, Viña del Mar</p>
            <p>V región</p>
        </div>
    </div>
    <div class="contenido-encabezado-dos">
        <h2 class="text-blue centrar mb-1">{{ $titulo }}</h2>
        <table>
            <tbody>
                <tr>
                    <td style="padding: 0px;"><strong>Paciente:</strong></td>
                    <td style="padding-top: 8px;">{{ $receta->paciente->nombres .' '.$receta->paciente->apellido_uno .' '.$receta->paciente->apellido_dos }}</td>
                    <td style="padding: 0px;"><strong>Rut:</strong></td>
                    <td style="padding-top: 8px;">{{ $receta->paciente->rut }}</td>
                    <td style="padding: 0px;"><strong>Sexo:</strong></td>
                    <td style="padding-top: 8px;">{{ $receta->paciente->sexo }}</td>
                    <td style="padding: 0px;"><strong>Edad:</strong></td>
                    <td style="padding-top: 8px;">{{ \Carbon\Carbon::parse($receta->paciente->fecha_nac)->age }}</td>
                </tr>
                <tr>
                    <td><strong>Dirección:</strong></td>
                    <td>{{
                        $receta->paciente->direccion .' #'. $receta->paciente->numero_dir .'; '. $receta->paciente->ciudad_nombre .'; '. $receta->paciente->region_nombre }}</td>
                    <!--Calle, Nº, Comuna. Región-->
                </tr>
            </tbody>
        </table>
    </div>
    <hr class="">
    {{-- <div class="fecha"><strong>Fecha:</strong> {{ $receta->ficha_atencion->created_at }}</div> --}}
</header>
