// Test directo del middleware
async function testMiddlewareDirecto() {
    console.log('🔧 Test directo del middleware...');

    const token = localStorage.getItem('authToken');
    if (!token) {
        console.error('❌ No token found');
        return;
    }

    console.log('✅ Token:', token.substring(0, 20) + '...');

    try {
        // Test con ruta que tiene middleware
        const response = await fetch('https://med-sdi.cl/api/debug-con-auth-sanctum', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Auth-Token': token
            }
        });

        const data = await response.json();
        console.log('Status:', response.status);
        console.log('Response:', data);

        if (response.status === 200) {
            console.log('🎉 ¡EL MIDDLEWARE FUNCIONÓ!');
            console.log('Usuario autenticado:', data.user_id);
        } else {
            console.log('❌ Middleware aún no funciona');
        }

    } catch (error) {
        console.error('❌ Error:', error);
    }
}

console.log('Ejecuta testMiddlewareDirecto() para test simple');
