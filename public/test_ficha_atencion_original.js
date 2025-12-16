// Test para la ruta original /paciente/ficha-atencion-app (sin middleware)
async function testFichaAtencionOriginal() {
    console.log('🔧 Testing ruta original /paciente/ficha-atencion-app...');

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
        diagnosticos: "Test desde app móvil - RUTA ORIGINAL",
        examenes: "Examen de rutina",
        medicamentos: "Aspirina 500mg",
        rut_dependiente: "",
        token: "mobile-original-" + Date.now()
    };

    try {
        const response = await fetch('https://med-sdi.cl/api/paciente/ficha-atencion-app', {
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
            console.log('🎉 ¡FICHA DE ATENCIÓN GUARDADA CON RUTA ORIGINAL!');
            console.log('ID de ficha:', data.data?.id);
            console.log('Usuario autenticado:', data.user_authenticated?.email);
            console.log('Mensaje:', data.message);
        } else {
            console.error('❌ Error guardando ficha:', data.message);
            if (data.errors) {
                console.error('Errores de validación:', data.errors);
            }
        }

    } catch (error) {
        console.error('❌ Error en petición:', error);
    }
}

console.log('Ejecuta testFichaAtencionOriginal() para probar la ruta original modificada');
