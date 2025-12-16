// Test para verificar si auth:sanctum funciona correctamente
async function testSanctumAuth() {
    console.log('🔧 Iniciando test de auth:sanctum...');

    // Obtener el token del localStorage
    const token = localStorage.getItem('authToken');
    if (!token) {
        console.error('❌ No se encontró token en localStorage');
        return;
    }

    console.log('✅ Token encontrado:', token);

    try {
        // Test 1: Ruta sin autenticación (debe funcionar)
        console.log('\n🧪 Test 1: Ruta sin autenticación');
        const response1 = await fetch('https://med-sdi.cl/api/debug-sin-auth', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        const data1 = await response1.json();
        console.log('📍 Status:', response1.status);
        console.log('📋 Response:', data1);

        // Test 2: Ruta con auth:sanctum
        console.log('\n🧪 Test 2: Ruta con auth:sanctum');
        const response2 = await fetch('https://med-sdi.cl/api/debug-con-auth-sanctum', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Auth-Token': token
            }
        });

        const data2 = await response2.json();
        console.log('📍 Status:', response2.status);
        console.log('📋 Response:', data2);

        if (response2.status === 200) {
            console.log('🎉 ¡auth:sanctum FUNCIONA!');

            // Test 3: Ahora probar la ruta de ficha-atencion-app
            console.log('\n🧪 Test 3: Ruta ficha-atencion-app con auth:sanctum');

            const fichaData = {
                id_paciente: "3",
                rut_profesional: "17.174.188-2",
                nombre_profesional: "francisco rojo",
                correo_profesional: "francisco@gmail.com",
                telefono_profesional: "56932659812",
                diagnosticos: "Test desde sanctum",
                examenes: "Examen test",
                medicamentos: "Aspirina",
                token: "test-sanctum-" + Date.now()
            };

            const response3 = await fetch('https://med-sdi.cl/api/paciente/ficha-atencion-app', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-Auth-Token': token
                },
                body: JSON.stringify(fichaData)
            });

            const data3 = await response3.json();
            console.log('📍 Status ficha-atencion-app:', response3.status);
            console.log('📋 Response ficha-atencion-app:', data3);

            if (response3.status === 200 || response3.status === 201) {
                console.log('🎉 ¡Ficha de atención guardada con auth:sanctum!');
            } else {
                console.error('❌ Error guardando ficha con auth:sanctum');
            }

        } else {
            console.error('❌ auth:sanctum NO funciona, status:', response2.status);
        }

    } catch (error) {
        console.error('❌ Error en test:', error);
    }
}

// Ejecutar el test
console.log('Ejecuta testSanctumAuth() en la consola para probar');
