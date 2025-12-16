// Funciones de debug para Laravel API Authentication - Med-SDI
// Creado para solucionar problemas de autenticación con headers filtrados

async function createMiddlewareOnServer() {
    console.log('🔧 Creando middleware en el servidor...');

    try {
        const response = await fetch('/api/create-middleware', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        console.log('📡 Status create-middleware:', response.status);

        if (response.ok) {
            const result = await response.json();
            console.log('✅ Middleware creado:', result);

            if (result.success) {
                console.log('🎉 ¡MIDDLEWARE CREADO EXITOSAMENTE EN EL SERVIDOR!');
                console.log('📁 Ubicación:', result.path);
                console.log('📋 Ahora ejecuta testMiddleware() para probarlo');
            } else {
                console.log('❌ Error creando middleware:', result.message);
            }
        } else {
            const errorText = await response.text();
            console.log('❌ Error create-middleware:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error create-middleware:', error);
    }
}

async function testBasicAuth() {
    const token = '24|FONkF9YGTW2X1AKM2kB99NvtXgW0OjBWMkCRgCrk';
    
    console.log('🔍 Probando autenticación básica paso a paso...');
    
    try {
        const response = await fetch('/api/debug-basic-auth', {
            method: 'GET',
            headers: {
                'X-Auth-Token': token,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });
        
        console.log('📡 Status basic auth:', response.status);
        
        if (response.ok) {
            const result = await response.json();
            console.log('✅ Basic auth result:', result);
        } else {
            const errorText = await response.text();
            console.log('❌ Error basic auth:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error basic auth:', error);
    }
}

async function testDebugAuthConfig() {
    console.log('🔧 Probando configuración de autenticación...');

    try {
        const response = await fetch('/api/debug-auth-config', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        console.log('📡 Status debug-auth-config:', response.status);

        if (response.ok) {
            const result = await response.json();
            console.log('✅ Configuración de auth:', result);
        } else {
            const errorText = await response.text();
            console.log('❌ Error debug-auth-config:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error debug-auth-config:', error);
    }
}

async function testAlternativeHeaders() {
    const token = '24|FONkF9YGTW2X1AKM2kB99NvtXgW0OjBWMkCRgCrk';

    console.log('🔧 Probando headers alternativos...');

    try {
        const response = await fetch('/api/debug-headers', {
            method: 'GET',
            headers: {
                'X-Auth-Token': token,
                'X-API-Token': token,
                'API-Token': token,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        console.log('📡 Status debug-headers alternativo:', response.status);

        if (response.ok) {
            const result = await response.json();
            console.log('✅ Headers alternativos:', result);
        } else {
            const errorText = await response.text();
            console.log('❌ Error debug-headers alternativo:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error debug-headers alternativo:', error);
    }
}

async function testMiddleware() {
    const token = '24|FONkF9YGTW2X1AKM2kB99NvtXgW0OjBWMkCRgCrk';

    console.log('🔧 Probando middleware específicamente...');

    try {
        const response = await fetch('/api/debug-middleware-test', {
            method: 'GET',
            headers: {
                'X-Auth-Token': token,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        console.log('📡 Status middleware test:', response.status);

        if (response.ok) {
            const result = await response.json();
            console.log('✅ Middleware test result:', result);

            if (result.converted_authorization) {
                console.log('🎉 ¡MIDDLEWARE FUNCIONA! X-Auth-Token convertido a Authorization');
            } else {
                console.log('❌ Middleware no está convirtiendo el header');
            }
        } else {
            const errorText = await response.text();
            console.log('❌ Error middleware test:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error middleware test:', error);
    }
}

async function testSimpleAuth() {
    const token = '24|FONkF9YGTW2X1AKM2kB99NvtXgW0OjBWMkCRgCrk';

    console.log('🔐 Probando autenticación simple con X-Auth-Token...');

    try {
        const response = await fetch('/api/test-simple-auth', {
            method: 'GET',
            headers: {
                'X-Auth-Token': token,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        console.log('📡 Status simple auth:', response.status);

        if (response.ok) {
            const result = await response.json();
            console.log('✅ Simple auth result:', result);

            if (result.user_id) {
                console.log('🎉 ¡AUTENTICACIÓN EXITOSA! Usuario:', result.user_email);
            } else {
                console.log('❌ Usuario no autenticado');
            }
        } else {
            const errorText = await response.text();
            console.log('❌ Error simple auth:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error simple auth:', error);
    }
}

async function testXAuthTokenAuth() {
    const token = '24|FONkF9YGTW2X1AKM2kB99NvtXgW0OjBWMkCRgCrk';

    console.log('🔑 Probando autenticación con X-Auth-Token...');

    try {
        const response = await fetch('/api/test-auth', {
            method: 'GET',
            headers: {
                'X-Auth-Token': token,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        console.log('📡 Status X-Auth-Token auth:', response.status);

        if (response.ok) {
            const result = await response.json();
            console.log('✅ ¡Autenticación con X-Auth-Token FUNCIONA!:', result);
        } else {
            const errorText = await response.text();
            console.log('❌ Error X-Auth-Token auth:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error X-Auth-Token auth:', error);
    }
}

async function testPacienteRoutesWithXAuth() {
    const token = '24|FONkF9YGTW2X1AKM2kB99NvtXgW0OjBWMkCRgCrk';

    console.log('🏥 Probando rutas de paciente con X-Auth-Token...');

    const routes = [
        '/api/paciente/mi_ficha_medica',
        '/api/paciente/mis_profesionales',
        '/api/paciente/mis_horas_medicas'
    ];

    for (const route of routes) {
        try {
            console.log(`\n🔍 Probando: ${route}`);
            const response = await fetch(route, {
                method: 'GET',
                headers: {
                    'X-Auth-Token': token,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            console.log(`📡 Status ${route}: ${response.status}`);

            if (response.ok) {
                const result = await response.json();
                console.log(`✅ ${route} FUNCIONA:`, result);
            } else {
                const errorText = await response.text();
                console.log(`❌ Error ${route}:`, response.status, errorText);
            }
        } catch (error) {
            console.error(`❌ Error ${route}:`, error);
        }
    }
}

async function runAllTests() {
    console.log('\n🚀 EJECUTANDO TODOS LOS TESTS EN SECUENCIA...\n');

    console.log('1️⃣ Creando middleware...');
    await createMiddlewareOnServer();

    console.log('\n2️⃣ Probando middleware...');
    await testMiddleware();

    console.log('\n3️⃣ Probando autenticación simple...');
    await testSimpleAuth();

    console.log('\n4️⃣ Probando autenticación X-Auth-Token...');
    await testXAuthTokenAuth();

    console.log('\n5️⃣ Probando rutas de paciente...');
    await testPacienteRoutesWithXAuth();

    console.log('\n🎉 ¡TODOS LOS TESTS COMPLETADOS!');
}

// Mostrar ayuda al cargar el archivo
console.log(`
🔧 Laravel API Authentication Debug - Med-SDI
===============================================

📋 FUNCIONES DISPONIBLES:

🚨 CRÍTICO - Crear Middleware:
- createMiddlewareOnServer() - CREAR MIDDLEWARE EN EL SERVIDOR (¡EJECUTAR PRIMERO!)

🔧 Tests de Configuración:
- testDebugAuthConfig() - Ver configuración de auth
- testAlternativeHeaders() - Probar headers alternativos (X-Auth-Token, etc.)
- testMiddleware() - Probar si el middleware funciona
- testBasicAuth() - 🆕 PROBAR AUTENTICACIÓN PASO A PASO

🔐 Tests de Autenticación:
- testSimpleAuth() - Probar autenticación simple con X-Auth-Token
- testXAuthTokenAuth() - Probar autenticación completa con X-Auth-Token

🏥 Tests de Rutas Finales:
- testPacienteRoutesWithXAuth() - Probar rutas de paciente con X-Auth-Token

🚀 Test Automatizado:
- runAllTests() - Ejecutar todos los tests en secuencia

🚨 PROBLEMA ACTUAL:
- Middleware funciona ✅ (convierte X-Auth-Token a Authorization)
- Todas las rutas de autenticación devuelven error 500 ❌
- Necesitamos identificar qué está causando el error específicamente

🔥 PRÓXIMO PASO:
1. Ejecutar testBasicAuth() para diagnosticar el problema paso a paso
2. Revisar qué guard o configuración está fallando

===============================================
`);
