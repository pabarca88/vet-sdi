// Test para ficha_atencion_app con autenticación manual
async function testFichaAtencionManual() {
    console.log('🔧 Testing ficha_atencion_app con auth manual...');

    const token = localStorage.getItem('authToken');
    if (!token) {
        console.error('❌ No token found');
        return;
    }

    console.log('✅ Token:', token.substring(0, 20) + '...');

    // Datos de prueba para la ficha
    const fichaData = {
        id_paciente: "3",
        rut_profesional: "17.174.188-2",
        nombre_profesional: "francisco rojo",
        correo_profesional: "francisco@gmail.com",
        telefono_profesional: "56932659812",
        especialidad: "Medicina General",
        tipo_especialidad: "Consulta",
        sub_tipo_especialidad: "Rutina",
        diagnosticos: "Test desde app móvil con auth manual",
        examenes: "Examen de rutina",
        medicamentos: "Aspirina 500mg",
        rut_dependiente: "",
        token: "mobile-test-" + Date.now()
    };

    try {
        const response = await fetch('https://med-sdi.cl/api/paciente/ficha-atencion-app-manual', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Auth-Token': token
            },
            body: JSON.stringify(fichaData)
        });

        const data = await response.json();
        console.log('📍 Status:', response.status);
        console.log('📋 Response:', data);

        if (response.status === 201) {
            console.log('🎉 ¡FICHA DE ATENCIÓN GUARDADA EXITOSAMENTE!');
            console.log('ID de ficha:', data.ficha_id);
            console.log('Usuario autenticado:', data.user_authenticated?.email);
        } else {
            console.error('❌ Error guardando ficha:', data.message);
        }

    } catch (error) {
        console.error('❌ Error en petición:', error);
    }
}

console.log('Ejecuta testFichaAtencionManual() para probar la nueva ruta');
