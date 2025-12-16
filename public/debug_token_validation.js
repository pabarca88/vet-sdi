// Función para verificar el token en la base de datos
async function debugTokenValidation() {
    console.log('🔧 Debug token validation...');

    const token = localStorage.getItem('authToken');
    if (!token) {
        console.error('❌ No token found');
        return;
    }

    console.log('✅ Token completo:', token);

    // Dividir el token (formato: ID|TOKEN)
    const tokenParts = token.split('|');
    if (tokenParts.length === 2) {
        console.log('📊 Token ID:', tokenParts[0]);
        console.log('📊 Token Hash:', tokenParts[1].substring(0, 20) + '...');
    } else {
        console.log('⚠️ Formato de token no estándar');
    }

    // Test 1: Verificar formato Bearer completo
    console.log('\n🧪 Test con Bearer completo:');
    const fullBearerToken = 'Bearer ' + token;
    console.log('📤 Authorization header:', fullBearerToken.substring(0, 30) + '...');

    try {
        const response = await fetch('https://med-sdi.cl/api/debug-auth-paso-a-paso', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': fullBearerToken
            }
        });

        const data = await response.json();
        console.log('Status:', response.status);

        if (data.resultados) {
            console.log('\n🔍 Resultados detallados:');
            console.log('Headers recibidos:', data.resultados.headers_recibidos || data.resultados.paso1_headers);
            console.log('auth_api_check:', data.resultados.auth_api_check || data.resultados.paso2_auth_api_check);
            console.log('auth_sanctum_check:', data.resultados.auth_sanctum_check || data.resultados.paso3_auth_sanctum_check);
            console.log('auth_api_user:', data.resultados.auth_api_user || data.resultados.paso4_auth_api_user);
        }

        // Test 2: Verificar específicamente auth:sanctum
        console.log('\n🧪 Test directo auth:sanctum:');
        const responseSanctum = await fetch('https://med-sdi.cl/api/debug-con-auth-sanctum', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': fullBearerToken
            }
        });

        console.log('Status auth:sanctum:', responseSanctum.status);
        const dataSanctum = await responseSanctum.json();
        console.log('Response auth:sanctum:', dataSanctum);

    } catch (error) {
        console.error('❌ Error:', error);
    }
}

// Ejecutar
console.log('Ejecuta debugTokenValidation() para verificar los tokens en detalle');
