// Test específico para tokens de aplicación móvil
async function testTokenFromMobileApp() {
    console.log('🔧 Testing token from mobile app...');

    const token = localStorage.getItem('authToken');
    if (!token) {
        console.error('❌ No token found in localStorage');
        return;
    }

    console.log('✅ Token encontrado:', token.substring(0, 20) + '...');

    try {
        // Test 1: Ruta sin autenticación (para verificar que llega al servidor)
        console.log('\n🧪 Test 1: Sin autenticación');
        const response1 = await fetch('https://med-sdi.cl/api/debug-sin-auth', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        const data1 = await response1.json();
        console.log('Status:', response1.status, 'Response:', data1);

        // Test 2: Ruta con auth:api
        console.log('\n🧪 Test 2: auth:api');
        const response2 = await fetch('https://med-sdi.cl/api/debug-con-auth-api', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Auth-Token': token
            }
        });

        const data2 = await response2.json();
        console.log('Status:', response2.status, 'Response:', data2);

        // Test 3: Ruta con auth:sanctum
        console.log('\n🧪 Test 3: auth:sanctum');
        const response3 = await fetch('https://med-sdi.cl/api/debug-con-auth-sanctum', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Auth-Token': token
            }
        });

        const data3 = await response3.json();
        console.log('Status:', response3.status, 'Response:', data3);

        // Test 4: Debug paso a paso
        console.log('\n🧪 Test 4: Debug paso a paso');
        const response4 = await fetch('https://med-sdi.cl/api/debug-auth-paso-a-paso', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Auth-Token': token
            }
        });

        const data4 = await response4.json();
        console.log('Status:', response4.status, 'Response:', data4);

        // DETALLAR EL DEBUG PASO A PASO
        if (data4.resultados) {
            console.log('\n🔍 DETALLES DEL DEBUG:');
            console.log('Headers recibidos:', data4.resultados.headers_recibidos);
            console.log('auth() sin guard:', data4.resultados.auth_sin_guard);
            console.log('auth(api):', data4.resultados.auth_api);
            console.log('auth(sanctum):', data4.resultados.auth_sanctum);
        }

        // Resumen
        console.log('\n📊 RESUMEN:');
        console.log('auth:api status:', response2.status);
        console.log('auth:sanctum status:', response3.status);

        if (response2.status === 200) {
            console.log('✅ auth:api FUNCIONA');
        }
        if (response3.status === 200) {
            console.log('✅ auth:sanctum FUNCIONA');
        }

    } catch (error) {
        console.error('❌ Error:', error);
    }
}

// Ejecutar
console.log('Ejecuta testTokenFromMobileApp() para probar los tokens desde la app');
