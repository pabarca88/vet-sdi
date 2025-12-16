<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>{{ $titulo }}</title>
        <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
    </head>
    <div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cód. Indetificador {{ $cuerpo['array_ficha_atencion']['token'] }}</div>

    @include('PDF.header')
    @include('PDF.footer')

    <main>


    id_fichas_atenciones
    id_ficha_otorrino

    ** Motivo Solicitud
    solicitado_id_profesional
    solicitado_nombre
    solicitado_apellido
    solicitado_rut
    solicitado_email
    solicitado_telefono
    motivo
    antec_especialidad

    id_paciente
    **Nariz y fosas nasales
    muc_nasal_permeab
    cornetes
    tabique
    tumor

    **Rinofaringe
    rinofaringe

    **Orofaringe
    orofaringe

    **Laringe
    cuerdas
    movilidad
    cierre_glotico

    **imagenes

    **nfo
    diag_endos

    **Diagnostico
    observaciones_endos
    estado

    </main>
</html>
