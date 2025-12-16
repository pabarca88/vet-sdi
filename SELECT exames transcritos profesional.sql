SELECT
    fichas_atenciones.id,
    fichas_atenciones.id_lugar_atencion,
    lugares_atencion.nombre,
    fichas_atenciones.motivo,
    fichas_atenciones.antecedentes,
    fichas_atenciones.examen_fisico,
    fichas_atenciones.hipotesis_diagnostico,
    fichas_atenciones.diagnostico_ce10,
    fichas_atenciones.cronico,
    fichas_atenciones.ges,
    fichas_atenciones.confidencial,
    fichas_atenciones.profesional_visible,
    fichas_atenciones.temperatura,
    fichas_atenciones.pulso,
    fichas_atenciones.frecuencia_reposo,
    fichas_atenciones.peso,
    fichas_atenciones.talla,
    fichas_atenciones.imc,
    fichas_atenciones.estado_nutricional,
    fichas_atenciones.presion_bi,
    fichas_atenciones.presion_bd,
    fichas_atenciones.presion_de_pie,
    fichas_atenciones.presion_sentado,
    fichas_atenciones.ct_estado_conciencia,
    fichas_atenciones.ct_lenguaje,
    fichas_atenciones.ct_traslado,
    fichas_atenciones.id_paciente,
    fichas_atenciones.id_profesional,
    fichas_atenciones.finalizada,

    examen_especialidad.id,
    examen_especialidad.id_tipo,
    examen_especialidad.id_template,
    examen_especialidad.id_examen_tipo,
    examen_especialidad.id_sub_tipo_especialidad,
    examen_especialidad.id_ficha_atencion,
    examen_especialidad.id_ficha_especialidad,
    examen_especialidad.id_paciente,
    examen_especialidad.id_profesional,
    examen_especialidad.id_asistente,
    examen_especialidad.nombre,
    examen_especialidad.cuerpo,
    examen_especialidad.estado,

    -- examen_especialidad_img.id,
    -- examen_especialidad_img.id_examen,
    -- examen_especialidad_img.url,
    -- examen_especialidad_img.nombre,
    -- examen_especialidad_img.otro,
    -- examen_especialidad_img.estado

    pacientes.id,
    pacientes.rut,
    pacientes.nombres,
    pacientes.apellido_uno,
    pacientes.apellido_dos,
    pacientes.telefono_uno,
    pacientes.email,
    pacientes.fecha_nac,

    asistentes.id,
    asistentes.rut,
    asistentes.nombres,
    asistentes.apellido_uno,
    asistentes.apellido_dos,
    asistentes.telefono_uno,
    asistentes.email,

    horas_medicas.id,
    horas_medicas.fecha_consulta,
    horas_medicas.hora_inicio,
    horas_medicas.hora_termino,
    horas_medicas.tipo_hora_medica,
    horas_medicas.alias_examen,
    horas_medicas.descripcion,
    horas_medicas.fecha_realizacion_consulta,
    horas_medicas.id_ficha_atencion,
    horas_medicas.id_estado

FROM fichas_atenciones
INNER JOIN lugares_atencion on lugares_atencion.id = fichas_atenciones.id_lugar_atencion
INNER JOIN examen_especialidad on examen_especialidad.id_ficha_atencion = fichas_atenciones.id
INNER JOIN examen_especialidad_template on examen_especialidad_template.id = examen_especialidad.id_template
-- INNER JOIN examen_especialidad_img on examen_especialidad_img.id_examen = examen_especialidad.id
INNER JOIN pacientes on pacientes.id = fichas_atenciones.id_paciente
INNER JOIN asistentes ON asistentes.id = examen_especialidad.id_asistente
INNER JOIN horas_medicas ON horas_medicas.id_ficha_atencion = fichas_atenciones.id


WHERE fichas_atenciones.id_profesional = 2730
    AND fichas_atenciones.finalizada IN(2, 3);
