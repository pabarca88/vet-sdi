// Test específico para verificar el middleware de conversión
async function testMiddlewareConversion() {
    console.log('🔧 Testing middleware conversion...');
    
    const token = localStorage.getItem('authToken');
    if (!token) {
        console.error('❌ No token found');
        return;
    }
    
    console.log('✅ Token:', token.substring(0, 20) + '...');
    
    try {
        // Test: Enviar SOLO X-Auth-Token (sin Authorization)
        console.log('\n🧪 Test: SOLO X-Auth-Token');
        const response = await fetch('https://med-sdi.cl/api/debug-auth-paso-a-paso', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Auth-Token': token
                // NO incluir Authorization para ver si el middleware lo convierte
            }
        });
        
        const data = await response.json();
        console.log('Status:', response.status);
        
        if (data.resultados) {
            console.log('\n🔍 Headers después del middleware:');
            console.log('authorization:', data.resultados.headers_recibidos?.authorization || data.resultados.paso1_headers?.authorization);
            console.log('x_auth_token:', data.resultados.headers_recibidos?.x_auth_token || data.resultados.paso1_headers?.x_auth_token);
            console.log('bearer_token:', data.resultados.headers_recibidos?.bearer_token || data.resultados.paso1_headers?.bearer_token);
            
            // Mostrar toda la estructura para debug
            console.log('\n📋 Estructura completa:', JSON.stringify(data.resultados, null, 2));
            
            // Verificar si se convirtió
            const authHeader = data.resultados.headers_recibidos?.authorization || data.resultados.paso1_headers?.authorization;
            if (authHeader) {
                console.log('✅ Middleware FUNCIONÓ - Authorization header presente');
            } else {
                console.log('❌ Middleware NO funcionó - Authorization header ausente');
            }
        }
        
        // Test 2: Enviar directamente con Authorization para comparar
        console.log('\n🧪 Test: Authorization directo');
        const response2 = await fetch('https://med-sdi.cl/api/debug-auth-paso-a-paso', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token
            }
        });
        
        const data2 = await response2.json();
        console.log('Status:', response2.status);
        
        if (data2.resultados) {
            console.log('\n🔍 Headers con Authorization directo:');
            console.log('authorization:', data2.resultados.headers_recibidos?.authorization || data2.resultados.paso1_headers?.authorization);
            console.log('auth_api_check:', data2.resultados.auth_api_check || data2.resultados.paso2_auth_api_check);
            console.log('auth_sanctum_check:', data2.resultados.auth_sanctum_check || data2.resultados.paso3_auth_sanctum_check);
            
            // Mostrar estructura completa del test 2
            console.log('\n📋 Test 2 estructura completa:', JSON.stringify(data2.resultados, null, 2));
        }
        
    } catch (error) {
        console.error('❌ Error:', error);
    }
}

// Ejecutar
console.log('Ejecuta testMiddlewareConversion() para probar la conversión del middleware');