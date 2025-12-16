
<header>
    <div class="contenido-encabezado-uno">
        <div class="contenido-logo">
            <!-- <img style="width: 100%;" class="logo" src="{{ asset('images/pdf/sdi-logo.svg') }}"> -->
            <img style="width: 100%;" class="logo" src="https://med-sdi.cl/images/pdf/sdi-logo.svg">
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
</header>
