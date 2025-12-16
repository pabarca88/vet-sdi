-- Ejemplo de consultas SQL para la tabla ficha_atencion_app

-- Verificar estructura de la tabla
DESCRIBE ficha_atencion_app;

-- Insertar datos de ejemplo
INSERT INTO ficha_atencion_app (
    id_paciente,
    rut_profesional,
    nombre_profesional,
    correo_profesional,
    telefono_profesional,
    especialidad,
    tipo_especialidad,
    sub_tipo_especialidad,
    diagnosticos,
    examenes,
    medicamentos,
    rut_dependiente,
    token,
    estado,
    created_at,
    updated_at
) VALUES (
    '3',
    '17.174.188-2',
    'francisco rojo',
    'francisco@gmail.com',
    '56932659812d',
    NULL,
    NULL,
    NULL,
    'qwdwq',
    'examenes',
    'aspirina',
    NULL,
    'example-token-123',
    1,
    NOW(),
    NOW()
);

-- Consultar todas las fichas
SELECT * FROM ficha_atencion_app;

-- Consultar fichas por paciente
SELECT * FROM ficha_atencion_app WHERE id_paciente = '3' AND estado = 1;

-- Consultar fichas por profesional
SELECT * FROM ficha_atencion_app WHERE rut_profesional = '17.174.188-2' AND estado = 1;

-- Consultar ficha por token
SELECT * FROM ficha_atencion_app WHERE token = 'example-token-123' AND estado = 1;

-- Consultar fichas con información completa
SELECT
    id,
    id_paciente,
    nombre_profesional,
    correo_profesional,
    diagnosticos,
    examenes,
    medicamentos,
    token,
    created_at
FROM ficha_atencion_app
WHERE estado = 1
ORDER BY created_at DESC;

-- Actualizar una ficha
UPDATE ficha_atencion_app
SET diagnosticos = 'Diagnóstico actualizado',
    examenes = 'Exámenes actualizados',
    updated_at = NOW()
WHERE id = 1 AND estado = 1;

-- Desactivar una ficha (soft delete)
UPDATE ficha_atencion_app
SET estado = 0, updated_at = NOW()
WHERE id = 1;

-- Estadísticas básicas
SELECT
    COUNT(*) as total_fichas,
    COUNT(DISTINCT id_paciente) as total_pacientes,
    COUNT(DISTINCT rut_profesional) as total_profesionales
FROM ficha_atencion_app
WHERE estado = 1;

-- Fichas por fecha
SELECT
    DATE(created_at) as fecha,
    COUNT(*) as fichas_creadas
FROM ficha_atencion_app
WHERE estado = 1
GROUP BY DATE(created_at)
ORDER BY fecha DESC;
