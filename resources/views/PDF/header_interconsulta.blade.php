
<header>
    <div class="contenido-encabezado-uno">
        <div class="contenido-logo">
            <!-- <img style="width: 100%;" class="logo" src="{{ asset('images/pdf/sdi-logo.svg') }}"> -->
            <img style="width: 100%;" class="logo" src="https://med-sdi.cl/images/pdf/sdi-logo.svg">
        </div>
        <div class="contenido-infoprof">
            @if(!empty($cuerpo['array_profesional_resp']))
                <p><strong>{{ $cuerpo['array_profesional_resp']['nombre'] }}</strong></p>
                <p>{{ $cuerpo['array_profesional_resp']['especialidad'] }}</p>
                <p>Rut: {{ $cuerpo['array_profesional_resp']['rut'] }}</p>
                <p>RCM: 00000-0</p>
                <p>Arlegui 934, Viña del Mar</p>
                <p>V región</p>
            @else
                <p><strong>{{ $cuerpo['array_profesional_soli']['nombre'] }}</strong></p>
                <p>{{ $cuerpo['array_profesional_soli']['especialidad'] }}</p>
                <p>Rut: {{ $cuerpo['array_profesional_soli']['rut'] }}</p>
                <p>RCM: 00000-0</p>
                <p>Arlegui 934, Viña del Mar</p>
                <p>V región</p>
            @endif
        </div>
    </div>
    <div class="contenido-encabezado-dos">
        <h2 class="text-blue centrar mb-1">{{ $titulo }}</h2>
        <table>
            <tbody>
                <tr>
                    <td style="padding: 0px;"><strong>Paciente:</strong></td>
                    <td style="padding-top: 8px;">{{ $cuerpo['array_paciente']['nombre'] }}</td>
                    <td style="padding: 0px;"><strong>Rut:</strong></td>
                    <td style="padding-top: 8px;">{{ $cuerpo['array_paciente']['rut'] }}</td>
                    <td style="padding: 0px;"><strong>Sexo:</strong></td>
                    <td style="padding-top: 8px;">{{ $cuerpo['array_paciente']['sexo'] }}</td>
                    <td style="padding: 0px;"><strong>Edad:</strong></td>
                    <td style="padding-top: 8px;">{{ \Carbon\Carbon::parse($cuerpo['array_paciente']['fecha_nac'])->age }}</td>
                </tr>
                <tr>
                    <td><strong>Dirección:</strong></td>
                    <td>{{ $cuerpo['array_paciente']['direccion'] }}</td>
                    <!--Calle, Nº, Comuna. Región-->
                </tr>
            </tbody>
        </table>
    </div>
    <hr class="">
    @if(!empty($cuerpo['array_ficha_atencion_resp']))
        <div class="fecha"><strong>Fecha:</strong> {{ $cuerpo['array_ficha_atencion_resp']['created_at'] }}</div>
    @else
        <div class="fecha"><strong>Fecha:</strong> {{ $cuerpo['array_ficha_atencion_soli']['created_at'] }}</div>
    @endif
</header>
