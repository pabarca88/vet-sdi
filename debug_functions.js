// Funciones de debug para Laravel API Authentication - VET-SDI
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
        const response = await fetch('http://med-sdi.cl/api/debug-basic-auth', {
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

            // Análisis específico de los guards
            if (result.step2_guard_tests) {
                console.log('🔐 Análisis de Guards:');

                if (result.step2_guard_tests.api_check === true) {
                    console.log('✅ auth(\'api\')->check() = FUNCIONANDO');
                } else {
                    console.log('❌ auth(\'api\')->check() = ERROR:', result.step2_guard_tests.api_check);
                }

                if (result.step2_guard_tests.sanctum_check === true) {
                    console.log('✅ auth(\'sanctum\')->check() = FUNCIONANDO');
                } else {
                    console.log('❌ auth(\'sanctum\')->check() = ERROR:', result.step2_guard_tests.sanctum_check);
                }

                if (result.step2_guard_tests.default_check === true) {
                    console.log('✅ auth()->check() = FUNCIONANDO');
                } else {
                    console.log('❌ auth()->check() = ERROR:', result.step2_guard_tests.default_check);
                }
            }

            // Información de configuración
            if (result.debug_info) {
                console.log('⚙️ Configuración:');
                console.log('- Guard por defecto:', result.debug_info.default_guard);
                console.log('- Driver guard API:', result.debug_info.api_guard_driver);
                console.log('- Bearer token length:', result.debug_info.bearer_token_length);
            }

        } else {
            const errorText = await response.text();
            console.log('❌ Error basic auth:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error basic auth:', error);
    }
}

async function fixApiRoutes() {
    console.log('🔧 Corrigiendo rutas API en el servidor...');

    try {
        const response = await fetch('/api/fix-api-routes', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        console.log('📡 Status fix-api-routes:', response.status);

        if (response.ok) {
            const result = await response.json();
            console.log('✅ API routes corregidas:', result);

            if (result.success) {
                console.log('🎉 ¡ARCHIVO API.PHP CORREGIDO EN EL SERVIDOR!');
                console.log('📋 Ahora ejecuta testBasicAuth() para probarlo');
            } else {
                console.log('❌ Error corrigiendo rutas:', result.message);
            }
        } else {
            const errorText = await response.text();
            console.log('❌ Error fix-api-routes:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error fix-api-routes:', error);
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

// Nueva función para probar directamente con Sanctum
async function testSanctumAuth() {
    const token = '24|FONkF9YGTW2X1AKM2kB99NvtXgW0OjBWMkCRgCrk';

    console.log('🔐 Probando autenticación directa con Sanctum...');

    try {
        const response = await fetch('http://med-sdi.cl/api/debug-token-test', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + token,
                'X-Auth-Token': token,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        console.log('📡 Status Sanctum test:', response.status);

        if (response.ok) {
            const result = await response.json();
            console.log('✅ Sanctum auth result:', result);

            if (result.token_found) {
                console.log('🎉 ¡TOKEN VÁLIDO EN BASE DE DATOS!');
                console.log('🆔 Token ID:', result.token_id);
                console.log('👤 User ID:', result.tokenable_id);
                console.log('📅 Creado:', result.created_at);
            }
        } else {
            const errorText = await response.text();
            console.log('❌ Error Sanctum auth:', response.status, errorText);
        }
    } catch (error) {
        console.error('❌ Error Sanctum auth:', error);
    }
}

// Mostrar ayuda al cargar el archivo
console.log(`
🔧 Laravel API Authentication Debug - VET-SDI
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
- testSanctumAuth() - 🆕 PROBAR TOKEN DIRECTAMENTE EN BASE DE DATOS

🏥 Tests de Rutas Finales:
- testPacienteRoutesWithXAuth() - Probar rutas de paciente con X-Auth-Token

🚀 Test Automatizado:
- runAllTests() - Ejecutar todos los tests en secuencia

🚨 PROBLEMA ACTUAL:
- Middleware funciona ✅ (convierte X-Auth-Token a Authorization)
- auth('api')->check() está causando error ❌
- Necesitamos identificar configuración correcta del guard

🔥 PRÓXIMO PASO:
1. Subir api.php corregido al servidor
2. Ejecutar testBasicAuth() para probar diferentes guards
3. Usar testSanctumAuth() para verificar token en BD

===============================================
`);
