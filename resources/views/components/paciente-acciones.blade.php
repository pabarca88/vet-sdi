
@if($p->id_usuario)
    <a href="{{ ROUTE('check_sdi', ['id_recept' => $p->id_usuario,'urla'=> 'Profesional/Mis_pacientes','urln' => 'Mi_Ficha_Medica']) }}"
        class="btn btn-primary btn-icon" data-toggle="tooltip"
        data-placement="top" title="Ficha Médica Única"><i
            class="feather icon-file-plus"></i></a>
    @endif
    <a href="{{ ROUTE('profesional.atenciones_previas_paciente', $p->id) }}"
        class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top"
        title="Atenciones previas"><i class="feather icon-activity"></i></a>

        <!--EMITIR DOCUMENTOS-->
        <a href="#"
        class="btn btn-icon btn-orange" onclick="emitir_doc()" data-toggle="tooltip" data-placement="top"
        title="Emitir documentos"><i class="feather icon-file-text"></i></a>

    <!--<a onclick="autorizacion_ficha_medica_unica({{ $p->id }});"
        class="btn btn-warning btn-sm btn-icon" data-toggle="tooltip"
        data-placement="top" title="Ficha Médica Única"><i
            class="feather icon-file-plus"></i></a>-->
    @if($p->id_usuario)
    <a href="{{ ROUTE('check_sdi', ['id_recept' => $p->id_usuario,'urla'=> 'Profesional/Mis_pacientes','urln' => 'Profesional/Editar_paciente/'.$p->id, 'id_tipo' => 9]) }}"
        class="btn btn-secondary btn-sm btn-icon" data-toggle="tooltip"
        data-placement="top" title="Editar datos medicos del paciente"><i
            class="feather icon-edit"></i></a>
    @endif
    @if($profesional->id_especialidad == 2)
        <button
            class="btn btn-secondary btn-sm btn-icon"
            data-toggle="tooltip"
            data-placement="top"
            title="Historial de presupuestos"
            onclick="verPresupuestos({{ $p->id }})"
        >
            <i class="fas fa-check"></i>
        </button>
    @endif
